<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {
    
    function __construct(){
        parent::__construct();
		$this->load->model('auth_model');
	}

	public function index()
	{   
		$header['title']='Dashboard';
        $header['sub_title']='Home'; 

		$this->load->view('backend/include/header', $header);
		$this->load->view('backend/index');
		$this->load->view('backend/include/footer');

	}

	public function profile()
	{   
		$header['title']='Profile';
        $header['sub_title']='Home'; 

		$data['profile']=$this->db->get_where('tbl_user')->row();
		$this->load->view('backend/include/header', $header);
		$this->load->view('backend/profile',$data);
		$this->load->view('backend/include/footer');

	}
    
	public function update_profile()
	{
	  $id = $this->input->post('id');
	  $old_image = $this->input->post('oldImage');
	  if($_FILES['image']['name']){
		 
		  if(file_exists("uploads".$old_image)){
			unlink("uploads".$old_image);
		 }

		 $config = array(
			 'upload_path'=>'uploads',
			 'allowed_types'=>'jpg|jpeg|gif|png',
			 );
		 $this->load->library('upload',$config);
		 $this->upload->do_upload('image');
		 $img=$this->upload->data();
		 $updateArray['image'] = $img['file_name'];
	 }

	 $updateArray['username'] = $this->input->post('username');
	 $updateArray['email'] = $this->input->post('email');
	 $updateArray['contact'] = $this->input->post('contact');
	 $updateArray['about'] = $this->input->post('about');
	 $this->db->update('tbl_user',$updateArray,['id'=>$id]);
	 $this->session->set_flashdata('info','Your details has been updated');
	 redirect($_SERVER['HTTP_REFERER']);

   }

    public function password()
	{
		$header['title']='Password';
        $header['sub_title']='Home'; 

		$this->load->view('backend/include/header', $header);
		$this->load->view('backend/password');
		$this->load->view('backend/include/footer');

	}
	

	public function update_password()
	{
		$id = $this->input->post('id');
		$password = $this->input->post('password');
		$new_password = $this->input->post('new_password');
		$repeat_password = $this->input->post('repeat_password');
		
		$check=1;
		$row=$this->db->get_where('tbl_user',['id'=>$id,'password'=>$password])->row();
		if(empty($row))
		{  $check=0;
			$this->session->set_flashdata('error','Your psassword not match!');
		}
		
		if($new_password!=$repeat_password)
		{   $check=0;
			$this->session->set_flashdata('error','New psassword and repeat password not match!');
		}
		if($check)
		{
			$updateArray = array('password'=>$new_password);
			$this->db->update('tbl_user',$updateArray,['id'=>$id]);
			$this->session->set_flashdata('info','Your Psassword has been updated');  
		}
		redirect($_SERVER['HTTP_REFERER']);
	 }
}
