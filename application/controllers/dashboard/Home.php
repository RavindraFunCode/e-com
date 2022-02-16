<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends MY_Controller {
    function __construct() {
        parent::__construct();
         $this->load->model('auth_model');
        // Check Session Login
        if (!isset($_SESSION['logged_in'])) {
            redirect(site_url('auth/login'));
        }
    }
    public function slider($id='') {

        $header['title']='Add Slider';
        $header['sub_title']='Home'; 
        if(!empty($id)){
            $data['slider'] = $this->db->get_where('tbl_ecom_mainslider',['id'=>$id])->row();
        }else{
            $data['slider'] =''; 
        }
        $this->load->view('backend/include/header',$header);
        $this->load->view('backend/home/homeslider',$data);
        $this->load->view('backend/include/footer');
    }
    public function all_slider() {
        $header['title']='All Slider';
        $header['sub_title']='Home';
        $data['slider'] = $this->db->get_where('tbl_ecom_mainslider', ['id >' => 0])->result();
        $this->load->view('backend/include/header',$header);
        $this->load->view('backend/home/all-homeslider', $data);
        $this->load->view('backend/include/footer');
    }
    public function changeStatus() {
        $id = $this->input->post('id');
        if (empty($id)) {
            echoEncodeDie(0, "Something went wrong. Please Refresh the Page...");
        }
        $row = $this->db->get_where('tbl_ecom_mainslider', ['id' => $id])->row_array();
        if (!empty($row)) {
            if ($row['status'] == 1) {
                $data = 2;
            } else {
                $data = 1;
            }
            $res = $this->db->update('tbl_ecom_mainslider', ['status' => $data], ['id' => $id]);
            if ($res) {
                echoEncodeDie(1, " Status Updated Successfull");
            } else {
                echoEncodeDie(0, "Failed to Update " . $usefor . " Status. Please Try Again Later...");
            }
        } else {
            echoEncodeDie(0, "Something went wrong. Please Refresh the Page...");
        }
    }
    public function savesliders() {
        $edit_id = $this->input->post('edit_id');
        $old_image = $this->input->post('old_image');
        $image = $_FILES['image'];
        if (!empty($image['name'])) {
            $row = doUpload('image', 'homeslider');
            if ($row['status']) {
                $data['image'] = $row['file_name'];
                removeFile($old_image, 'homeslider');
            } else {
                $result['status'] = 0;
                $result['message'] = $row['file_name'];
                echo json_encode($result);
                die;
            }
        }
        if (!empty($edit_id)) {
            $this->db->update('tbl_ecom_mainslider', $data, ['id' => $edit_id]);
            $result['status'] = 1;
            $result['message'] = 'Slider Update Successfully';
        } else {
            $this->db->insert('tbl_ecom_mainslider', $data);
            $result['status'] = 1;
            $result['message'] = 'Slider Add Successfully';
        }
        echo json_encode($result);
        die;
    }
    public function delete() {
        $id = $_POST["id"];
        $this->db->where('id', $id);
        $this->db->delete('tbl_ecom_mainslider');
    }
    
    public function privacypolicy(){
        $header['title']='Privacy Policy';
        $header['sub_title']='Home';
        $data['websetting'] = $this->db->get_where('tbl_ecom_websetting', ['id' => 1])->row();
        $this->load->view('backend/include/header',$header);
        $this->load->view('backend/privacy-policy', $data);
        $this->load->view('backend/include/footer');   
    }
    
    public function privacypolicy_save(){
        $data['privacy_policy'] = $this->input->post('privacy_policy'); 
        $this->db->update('tbl_ecom_websetting', $data, ['id' => 1]);
        $result['status'] = 1;
        $result['message'] = 'Privacy Policy update successfully ....!';
        echo json_encode($result);
        die;
    }
    
    public function term_and_conditions(){
        $header['title']='Term and Conditions';
        $header['sub_title']='Home';
        $data['websetting'] = $this->db->get_where('tbl_ecom_websetting', ['id' => 1])->row();
        $this->load->view('backend/include/header',$header);
        $this->load->view('backend/term-and-conditions',$data);
        $this->load->view('backend/include/footer');   
    }
    
    public function term_and_conditions_save(){
        $data['term_and_conditions'] = $this->input->post('term_and_conditions'); 
        $this->db->update('tbl_ecom_websetting', $data, ['id' => 1]);
        $result['status'] = 1;
        $result['message'] = 'Term and Conditions update successfully ....!';
        echo json_encode($result);
        die;
    }
    
    public function  returns_policy(){
        $header['title']='Returns Policy';
        $header['sub_title']='Home';
        $data['websetting'] = $this->db->get_where('tbl_ecom_websetting', ['id' => 1])->row();
        $this->load->view('backend/include/header',$header);
        $this->load->view('backend/returns-policy',$data);
        $this->load->view('backend/include/footer');   
    }
    
    public function returns_policy_save(){
        $data['returns_policy'] = $this->input->post('returns_policy'); 
        $this->db->update('tbl_ecom_websetting', $data, ['id' => 1]);
        $result['status'] = 1;
        $result['message'] = 'Returns Policy update successfully ....!';
        echo json_encode($result);
        die;
    }
    
    
    
    
    
    
    
}
