<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	function __construct(){
        parent::__construct();
		$this->load->model('auth_model');
        $this->load->library('form_validation');
        $this->tbl = "tbl_user";
	}
	
	function index(){
		$this->load->view('backend/login');
	}
	
	function login(){		
		// Check Session Login
		if(isset($_SESSION['logged_in'])){
			redirect(site_url('admin-dashboard'));
		}
		
		// Check Remember Me
		if(isset($_COOKIE['remember_me'])){			
			$this->auth_model->set_session($_COOKIE['remember_me']);
			redirect(site_url());
		}
		$this->load->view('backend/login');
	}
	
	public function login_process($check_login = false){
		// Check Session Login
		if(isset($_SESSION['logged_in'])){
			redirect(site_url('admin-dashboard'));
		}
		// Check Remember Me
		if(isset($_COOKIE['remember_me'])){			
			$this->auth_model->set_session($_COOKIE['remember_me']);
			redirect(site_url('admin-dashboard'));
		}
		$username = escape($this->input->post("username"));		
		$password = md5(escape($this->input->post("password")));


		$remember_me = escape($this->input->post("remember_me"));	
		if($username && $password){
			$check_login = $this->auth_model->check_login($username,$password);	
		}
		if($check_login){
			$id = $check_login[0]->id;
			$this->auth_model->set_session($id,$username);
			if($remember_me){
				$this->auth_model->set_cookie_remember($username);
			}
			 $this->session->set_flashdata('success', 'Admin Login Successfully..!');
			 redirect(site_url('admin-dashboard'));
		}else{
			$this->session->set_flashdata('error', 'Incorrect Login Credentials!');
			redirect(site_url('auth/login'));
		}
	}
	
	function logout(){
		$this->auth_model->unset_session();
		$this->auth_model->unset_cookie_remember();
		$this->session->set_flashdata('error', 'Admin Logout Successfully..!');
		redirect(site_url('auth/login'));
	}
}
