<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
    class Shop  extends Web_Controller {
        public function __construct(){
            parent::__construct();
            $this->load->library('pagination');
            $this->load->library("cart");
            $this->load->model("Product_filter_model");
        }
        public function index(){
            
            $this->load->view('frontend/include/header');
            $this->load->view('frontend/index');
            $this->load->view('frontend/include/footer');

        }
        public function product_details($slug='') {
            $data['product_data'] = $this->db->get_where($this->tbl_product, ['slug'=>$slug])->row();
            // echo $slug;
            // print_r($data['product_data']);die;
            if(empty($data['product_data'])){
                redirect(base_url('shop'));
            }
            $this->load->view('frontend/include/header');
            $this->load->view('frontend/product-details', $data);
            $this->load->view('frontend/include/footer');
        }
        function fetch_data()
        {
            sleep(2);
            $minimum_price = $this->input->post('minimum_price');
            $maximum_price = $this->input->post('maximum_price');
            // $minimum_price =10;
            // $maximum_price = 200;
            $size = $this->input->post('size');
            $color = $this->input->post('color');
            $brand = $this->input->post('brand');
            $price = $this->input->post('price');
            $discount = $this->input->post('discount');
            $category = $this->input->post('category');
             
            $sort_product = '';//$this->input->post('sort_product');
            $search_query = $this->input->post('search_query');
              
            $config = array();
            $config['base_url'] = 'javascript:void(0);';
            $config['total_rows'] = $this->Product_filter_model->count_all($minimum_price, $maximum_price,$price,$discount,$category, $sort_product, $search_query, $size, $color, $brand);
            $config['per_page'] = 24;
            $config["uri_segment"] = 3;
            $config['use_page_numbers'] = TRUE;

            $config['full_tag_open'] = '<ul class="pagination">';
            $config['full_tag_close'] = '</ul>';
            $config['attributes'] = ['class' => 'page-link'];
            $config['first_link'] = false;
            $config['last_link'] = false;
            $config['first_tag_open'] = '<li class="page-item">';
            $config['first_tag_close'] = '</li>';
            $config['prev_link'] = '&laquo';
            $config['prev_tag_open'] = '<li class="page-item">';
            $config['prev_tag_close'] = '</li>';
            $config['next_link'] = '&raquo';
            $config['next_tag_open'] = '<li class="page-item">';
            $config['next_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li class="page-item">';
            $config['last_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
            $config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
            $config['num_tag_open'] = '<li class="page-item">';
            $config['num_tag_close'] = '</li>';
                         
            $config['num_links'] = 3;
            $this->pagination->initialize($config);
            $page = $this->uri->segment(3);
            
            $start = ($page - 1) * $config['per_page'];

            $output = array(
               'product_list' => $this->Product_filter_model->fetch_data($config["per_page"],$start, $minimum_price, $maximum_price,$price,$discount,$category, $sort_product, $search_query, $size, $color, $brand),
               'pagination_link'  => $this->pagination->create_links()
            );
            echo json_encode($output);
        }
       
  
    }
?>