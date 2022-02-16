<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends Web_Controller{
    
    function  __construct(){
        parent::__construct();
        $this->userdata = is_user_login();
        if(!$this->userdata){
            $result['status']=0;
            $result['message']='Please Login....';
            echo json_encode($result);die;
        }
        if(empty($this->cart->contents())){
            $result['status']=0;
            $result['message']='Your cart is Empty.';
            echo json_encode($result);die;
        }
    }

    public function conf_checkout(){
        
        $shipping_address= $this->input->post('old_address');
        $paymenttype= $this->input->post('payment_method');
        if(empty($shipping_address)){
            $result['status']=0;
            $result['message']='Shipping Address is Required.';
            echo json_encode($result);die;
        }
        if(empty($paymenttype)){
            $result['status']=0;
            $result['message']='Payment Method is Required.';
            echo json_encode($result);die;
        }
        
        $randid=gen_rand_id();
        $cartItems = $this->cart->contents();
        
        $flag= 1;
        
        $G_total = $this->cart->total()+$this->shipping_charge;

        foreach ($cartItems as $key => $value) {
            $pro_data=$this->db->get_where($this->tbl_product, ['id'=>$value['id']])->row_array();

            $order_product=array(
                'product_id'=>$pro_data['id'],
                'customer_id'=> $this->userdata['id'],
                'seller_id'=>0,
                'order_id'=>$randid,
                'image'=>$pro_data['image'],
                'product_name'=>$pro_data['name'],
                'quantity'=>$value['qty'],
                'sell_price'=>$value['price'],
                'sub_total'=>$value['subtotal']
            );
            $res=$this->db->insert($this->tbl_ecom_order_product, $order_product);
            if(!$res){
                $flag=0;
            }
        }
        if($flag){
            $order = array(
                    'customer_id'=>$this->userdata['id'],
                    'seller_id'=>0,
                    'order_id'=>$randid,
                    'username'=>$this->userdata['username'],
                    'email'=>$this->userdata['email'],
                    'contact'=>$this->userdata['contact'],
                    'address'=>$shipping_address,
                    'shipping_charge'=>$this->shipping_charge,
                    'grand_total'=>$G_total,
                    'payment_type'=>$paymenttype,
                    'status'=>6
                );
            $data2=$this->db->insert($this->tbl_ecom_orders, $order);

            if($data2){
                $this->cart->destroy();
                $result['status']=1;
                $result['message']='Your Product Checkout successful';
            }
        }else{
            $result['status']=0;
            $result['message']='Failed to Checkout Product...';
        }
        echo json_encode($result);die;  

    }
    
}