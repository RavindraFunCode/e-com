<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Web extends Web_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->library("cart");
    }
    public function index() {
        $this->load->view('frontend/include/header');
        $this->load->view('frontend/index');
        $this->load->view('frontend/include/footer');
    }
    public function shop($cat_slug='') {
        $data['category'] = $this->db->get_where($this->tbl_category, ['is_active' => 1])->result();

        $data['size'] = $this->db->get_where($this->tbl_ecom_size, ['is_active' => 1])->result();
        $data['color'] = $this->db->get_where($this->tbl_ecom_color, ['is_active' => 1])->result();
        $data['brand'] = $this->db->get_where($this->tbl_ecom_brand, ['is_active' => 1])->result();
        $data['cat_url']=base_url()."shop/";
        // $data['cat_slug'] = $cat_slug ;
        $data['cat_slug'] = isset($_GET['category']) && !empty($_GET['category']) ? $_GET['category'] : '' ;
        $data['search'] =isset($_GET['search']) && !empty($_GET['search']) ? $_GET['search'] : '' ;
        $this->load->view('frontend/include/header');
        $this->load->view('frontend/shop', $data);
        $this->load->view('frontend/include/footer');
    }
    public function contact() {
        $this->load->view('frontend/include/header');
        $this->load->view('frontend/contact');
        $this->load->view('frontend/include/footer');
    }
     public function order_track() {
        $this->load->view('frontend/include/header');
        $this->load->view('frontend/order-track');
        $this->load->view('frontend/include/footer');
    }
      public function my_order_tracking() {
        $this->load->view('frontend/include/header');
        $this->load->view('frontend/my-order-tracking');
        $this->load->view('frontend/include/footer');
    }

    /*public function account() {
        $this->load->view('frontend/include/header');
        $this->load->view('frontend/my-account');
        $this->load->view('frontend/include/footer');
    }*/
    public function cart() {
        $this->load->view('frontend/include/header');
        $this->load->view('frontend/cart');
        $this->load->view('frontend/include/footer');
    }
    public function wishlist() {
        $this->load->view('frontend/include/header');
        $this->load->view('frontend/wishlist');
        $this->load->view('frontend/include/footer');
    }
    public function checkout() {
        $this->load->view('frontend/include/header');
        $this->load->view('frontend/checkout');
        $this->load->view('frontend/include/footer');
    }
    public function login() {
        $this->load->view('frontend/login');
    }
    public function registration() {
        $this->load->view("frontend/registration");
    }
    public function forgot_password() {
        $this->load->view('frontend/forgot-password');
    }
    public function address($id='') {
        if(!empty($id)){
         $data['address']=$this->db->get_where('tbl_useraddress',['id'=>$id])->row();
        }else{
         $data['address']= '';    
        }
        $this->load->view('frontend/include/header');
        $this->load->view('frontend/address',$data);
        $this->load->view('frontend/include/footer');
    }
    public function save_contact()
    {
        $data['name'] = $this->input->post('name');
        $data['email'] = $this->input->post('email');
        $data['contact'] = $this->input->post('contact');
        $data['message'] = $this->input->post('message');

        if(empty($data['name'])){
          $result['status']=0;
          $result['message']='Your Name is required';
          echo json_encode($result);die; 
        }
        if(empty($data['email'])){
          $result['status']=0;
          $result['message']='Your email is required';
          echo json_encode($result);die; 
        }
        if(empty($data['contact'])){
          $result['status']=0;
          $result['message']='Your contact is required';
          echo json_encode($result);die; 
        }
        if(empty($data['message'])){
          $result['status']=0;
          $result['message']='Your message is required';
          echo json_encode($result);die; 
        }
        
        $res = $this->db->insert($this->tbl_contact_us, $data);
        if($res)
        {
          $result['status']=1;
          $result['message']='Contact Message send successful';
        }else{
          $result['status']=1;
          $result['message']='Failed to send Contact Message ';
        }
        echo json_encode($result);die;
    }
}
?>