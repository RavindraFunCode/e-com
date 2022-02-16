<?php

class Product_filter_model extends CI_Model
{
    public function __construct(){
        parent::__construct();
        
        $this->tbl_product = 'tbl_ecom_product';
        $this->upload_product = "product";
        $this->tbl_category = "tbl_ecom_category";

    }
    function fetch_filter_type($type)
    {
      $this->db->distinct();
      $this->db->select($type);
      $this->db->from($this->tbl_product);
        //  $this->db->where('status', '1');
      return $this->db->get();
    }

    function make_query($minimum_price, $maximum_price,$price, $discount, $category, $sort_product, $search_query, $size, $color, $brand)
    {
        $sql = " SELECT * FROM ".$this->tbl_product."  WHERE is_active = '1'  ";

        if (isset($price) && !empty($price)) {
            $sql .= " AND (";
            foreach ($price as $key => $value) {
              $a = explode(',',$value);
              if($key>0)
              {
                 $sql .= "  OR ";
              }
              if(isset($a[0]) && !empty($a[0]) && !empty($a[1]))
              {
                 $sql .= "  sell_price BETWEEN '".$a[0]."' AND '".$a[1]."' ";
              }
            }
            $sql .= " )";
        }
      
        if (isset($discount) && !empty($discount)) {
            $sql .= " AND (";
            foreach ($discount as $key => $value) {
              $a = explode(',',$value);
              if($key>0)
              {
                 $sql .= "  OR ";
              }
              if(isset($a[0]) && !empty($a[0]) && !empty($a[1]))
              {
                 $sql .= "  discount_price BETWEEN '".$a[0]."' AND '".$a[1]."' ";
              }
            }
            $sql .= " )";
        }

        // print_r($a);die();

       // $prices = implode(",", $price);
       //  echo  ($prices);
       //   die();
       // $minimum_price = min(explode(',',$price));
       // $maximum_price = max(explode(',',$price));

      /*if(isset($a[0]) && !empty($a[0]) && !empty($a[1]))
       {
         $sql .= "
       AND sell_price BETWEEN '".$a[0]."' AND '".$a[1]."' 
      ";
       }*/



       //     if(isset($minimum_price, $maximum_price) && !empty($minimum_price) && !empty($maximum_price))
       //     {
       //       $sql .= "
    			//  AND sell_price BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."' w
    			// ";
       //     }
     
        if(isset($size))
         {
          $size_filter = implode("','", $size);
          $sql .= " AND size IN('".$size_filter."') ";
         }
         if(isset($color))
         {
          $color_filter = implode("','", $color);
          $sql .= " AND color IN('".$color_filter."') ";
         }
         if(isset($brand))
         {
          $brand_filter = implode("','", $brand);
          $sql .= " AND brand IN('".$brand_filter."') ";
         }
         if(isset($category))
         {
          $category_filter = implode("','", $category);
          $sql .= " AND category IN('".$category_filter."') ";
         }
          if(isset($search_query)){
             $sql .= "AND name LIKE '%".$search_query."%' ";
         }
         if(isset($sort_product) && $sort_product>0 && $sort_product<3)
         {
             $sortby='';//asc, desc
             $sortwith='';//name, price
            switch ($sort_product) {
                case '1':
                    $sortby='ASC';
                    $sortwith='name';
                    break;
                case '2':
                    $sortby='DESC';
                    $sortwith='name';
                    break;
                default:
                    # code...
                    break;
            }
            $sql .= "  ORDER BY ".$sortwith." ".$sortby." ";
        }
        return $sql;
    }

    function fetch_data($limit, $start, $minimum_price, $maximum_price,$price,$discount,$category, $sort_product, $search_query, $size, $color, $brand)
    {
        $sql = $this->make_query($minimum_price, $maximum_price, $price,$discount,$category, $sort_product, $search_query, $size, $color, $brand);

        $sql .= ' LIMIT '.$start.', ' . $limit; 

      
        $data = $this->db->query($sql);

        // echo $this->db->last_query();
        //  die();
        $resetURL= base_url()."shop";  
        $output = '';
        if($data->num_rows() > 0)
        {
            if(isset($sort_product) && $sort_product>2 && $sort_product<5)
            {
                 $sortby='';//asc, desc
                 $sortwith='';//name, price
                 switch ($sort_product)
                 {
                    case '3':
                        $sortby='ASC';
                        $sortwith='price';
                        break;
                    case '4':
                        $sortby='DESC';
                        $sortwith='price';
                        break;
                    
                    default:
                        # code...
                        break;
                }
            }
            foreach($data->result_array() as $value)
            {         
                 $userdata=$this->session->userdata('usersdata');
                 $login_url= base_url()."Web/login";  
                 $product_details_url=base_url()."product-details/".$value['slug'].'';
                 $imageURL='';
                 $new_sell_price='';
                 if(!empty($value['image'])){
                     $imageURL=base_url()."uploads/".$this->upload_product."/".$value['image'].'';
                 }else{
                     $imageURL=base_url()."assets/web/img/noproductimage.png";
                 }
                 $encrypt_id = $value['id'];//encryptor('encrypt', $value['id']);
                             
                 $output.='<div class="product-wrap">
                             <div class="product text-center">
                                <figure class="product-media">
                                   <a href="'.$product_details_url.'">
                                   <img src="'.$imageURL.'" alt="Product" width="300"
                                      height="338" />
                                   </a>
                                   <div class="product-action-horizontal">
                                      <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                         title="Add to cart" onclick="addtocart(`'.$encrypt_id.'`)"></a>
                                      <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                         title="Wishlist"></a>
                                      <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                         title="Compare"></a>
                                      <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                         title="Quick View"></a>
                                   </div>
                                </figure>
                                <div class="product-details">
                                   <div class="product-cat">
                                      <a href="shop-banner-sidebar.html">'.getValueByColumn($this->tbl_category, 'cat_name', ['slug'=>$value['category']]).'</a>
                                   </div>
                                   <h3 class="product-name">
                                      <a href="'.$product_details_url.'">'.$value['name'].'</a>
                                   </h3>
                                   <div class="ratings-container">
                                      <div class="ratings-full">
                                         <span class="ratings" style="width: 100%;"></span>
                                         <span class="tooltiptext tooltip-top"></span>
                                      </div>
                                      <a href="javascript:void(0)" class="rating-reviews">(3 reviews)</a>
                                   </div>
                                   <div class="product-pa-wrapper">
                                      <div class="product-price">
                                         ₹ .'.$value['sell_price'].'
                                      </div>
                                   </div>
                                </div>
                             </div>
                          </div>';
            }

        }else{
             $output.='<div class="col-md-12 contact-box" style="text-align: center;height: 300px;padding-top: 100px;margin: 20px;background-color: #eeeeee;;;">
                         <b> No matching Product. </b>
                         <P> Try resetting the filters <p>
                         <a href="'.$resetURL.'" class="btn btn-color" style="margin-top: 15px;background: #d8d4dc;color: black;font-weight: 600;"> Reset Filters </a>
                      </div>';
        }
        return $output;
    }


    function count_all($minimum_price, $maximum_price,  $price,$discount,$category, $sort_product, $search_query, $size, $color, $brand)
    {
      $sql = $this->make_query($minimum_price, $maximum_price,$price,$discount,$category, $sort_product, $search_query, $size, $color, $brand);
      $data = $this->db->query($sql);
      return $data->num_rows();
     }
     
     function searchQuery($qry){
        $data=NULL;
        $psql = "
            SELECT * FROM ".$this->tbl_product." 
            WHERE name LIKE '%$qry%'
            ";
        $pdata = $this->db->query($psql)->result();
        if(!empty($pdata))
            $data['product']=$pdata;

        if(empty($qry)){
            $csql = "
                SELECT * FROM ".$this->tbl_product." 
                WHERE id>0'
                ";
        }else{
            $csql = "
                SELECT * FROM ".$this->tbl_product." 
                WHERE category_name LIKE '%$qry%'
                ";
        }
        
        $cdata = $this->db->query($csql)->result();
        if(!empty($cdata))
            $data['category']=$cdata;
        return $data;
     }
}
?>