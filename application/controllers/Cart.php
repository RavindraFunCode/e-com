<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cart extends Web_Controller {
    public function __construct() {
        parent::__construct();
    }
    function insertCart() {
        $qty = 1;
        $id = $this->input->post('id');
        $result = $this->db->get_where($this->tbl_product, ['id' => $id])->row_array();
        
        if (!empty($result)) {
            $data = array('id' => $result['id'], 'name' => $result['slug'], 'price' => $result['sell_price'], 'qty' => $qty, 'options' => array('image' => $result['image']));
        }
        if ($this->cart->insert($data)) {
            $result['status']=1;
            $result['message']='Product Added';
        } else {
            $result['status']=0;
            $result['message']='Product not Added';
        }
        echo json_encode($result);
    }
    function getCart() {
        $html = '';
        $cartItems = $this->cart->contents();
        $discount_price = 0;
        $product_details_url=base_url()."product-details/";
        foreach ($cartItems as $key => $value) {
            $CheckoutURL = base_url() . "checkout";
            $result = $this->db->get_where($this->tbl_product, ['id' => $value['id']])->row_array();
            if (!empty($result['image'])) {
                $imageURL = base_url() . "uploads/product/" . $result['image'] . '';
            } else {
                $imageURL = base_url() . "assets/web/img/noproductimage.png";
            }
            $discount_price+= !empty($result) ? $result['discount_price'] : 0;
            $html.= '
                    <div class="product product-cart">
                        <div class="product-detail">
                            <a href="'.$product_details_url.$result['slug'].'" class="product-name">' . $result['name'] . '</a>
                            <div class="price-box">
                                <span class="product-quantity">' . $value['qty'] . '</span>
                                <span class="product-price">₹ .' . $result['price'] . '</span>
                            </div>
                        </div>
                        <figure class="product-media">
                            <a href="'.$product_details_url.$result['slug'].'">
                                <img src="' . $imageURL . '" alt="product" height="84"
                                    width="94" />
                            </a>
                        </figure>
                        <button class="btn btn-link btn-close" aria-label="button" onclick="remove_from_cart(`'.$value['rowid'].'`)">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
            ';
        }
        
        $output['cartdata']=$html;
        $output['total_price']="₹ ".$this->cart->total();
        $output['cart_num']=$this->cart->total_items();
        echo json_encode($output);
    }
    function clear() {
        $this->cart->destroy();
        redirect(base_url('shop'));
    }
    function updateItemQty() {
        $update = 0;
        // Get cart item info
        $rowid = $this->input->post('id');
        $qty = $this->input->post('qty');
        // Update item in the cart
        if (!empty($rowid) && !empty($qty)) {
            $data = array('rowid' => $rowid, 'qty' => $qty);
            $update = $this->cart->update($data);
        }
        // Return response
        if($update){
            $row = $this->cart->get_item($rowid);
            $result['sub_total']=$row ? "₹ ".$row['subtotal'] : 0;
            $result['subtotal']="₹ ".($this->cart->total());
            $result['total']="₹ ".($this->cart->total()+$this->shipping_charge);
            $result['status']=1;
            $result['message']='Product Quantity Updated';
        } else {
            $result['status']=0;
            $result['message']='Product Quantity not Update';
        }
        echo json_encode($result);
    }
    function remove_from_cart() {
        // Remove item from cart
        $rowid = $this->input->post('id');
        $remove = $this->cart->remove($rowid);
        if($remove){
            $result['status']=1;
            $result['message']='Product Removed';
        } else {
            $result['status']=0;
            $result['message']='Product not Remove';
        }
        echo json_encode($result);
        
    }
}
