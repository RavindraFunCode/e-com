<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public function __construct(){
        parent::__construct();
		// Check Session Login
		$this->is_login = is_login();
		$this->user_photo = get_user('image');
		$this->username = get_user('username');
		
		$this->page_limit = 10;

		//all tables
		$this->tbl_user = "tbl_user";
		$this->upload_user = 'user';
		$this->tbl_category = "tbl_ecom_category";
		$this->upload_category = "category";
		$this->tbl_ecom_brand = "tbl_ecom_brand";
		$this->upload_brand = "brand";
		$this->tbl_ecom_size = "tbl_ecom_size";
		$this->tbl_ecom_unit = "tbl_ecom_unit";
		$this->tbl_ecom_color = "tbl_ecom_color";

		$this->tbl_product = 'tbl_ecom_product';
        $this->tbl_product_image = 'tbl_ecom_product_image';
		$this->tbl_ecom_orders = 'tbl_ecom_orders';
		$this->tbl_ecom_order_product = 'tbl_ecom_order_product';
		$this->tbl_ecom_mainslider = 'tbl_ecom_mainslider';
		$this->tbl_contact_us = 'tbl_contact_us';

	}
}
class Web_Controller extends CI_Controller {

	public function __construct(){
        parent::__construct();
		
		$this->page_limit = 10;
		$this->shipping_charge = 50;

		//all tables
		$this->tbl_user = "tbl_user";
		$this->upload_user = 'user';
		$this->tbl_category = "tbl_ecom_category";
		$this->upload_category = "category";
		$this->tbl_ecom_brand = "tbl_ecom_brand";
		$this->upload_brand = "brand";
		$this->tbl_ecom_size = "tbl_ecom_size";
		$this->tbl_ecom_unit = "tbl_ecom_unit";
		$this->tbl_ecom_color = "tbl_ecom_color";

		$this->tbl_product = 'tbl_ecom_product';
		$this->upload_product = "product";
        $this->tbl_product_image = 'tbl_ecom_product_image';

		$this->tbl_ecom_orders = 'tbl_ecom_orders';
		$this->tbl_ecom_order_product = 'tbl_ecom_order_product';
		$this->tbl_ecom_mainslider = 'tbl_ecom_mainslider';
		$this->tbl_contact_us = 'tbl_contact_us';

	}

}
