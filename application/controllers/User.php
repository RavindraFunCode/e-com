<?php defined('BASEPATH') OR exit('No direct script access allowed');
class User extends Web_Controller {
    public function __construct() {
        parent::__construct();
        $this->userdata = is_user_login();
    }

    public function userauth() {

        $recaptchaResponse = trim($this->input->post('g-recaptcha-response'));
        $userIp=$this->input->ip_address();
        $secret = $this->config->item('google_secret');
        $url="https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$recaptchaResponse."&remoteip=".$userIp;
        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, $url); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        $output = curl_exec($ch); 
        curl_close($ch);      
        $status= json_decode($output, true);
        if ($status['success']) {
            $data['email'] = $this->input->post('email');
            $data['password'] = $this->input->post('password');
            $data['password'] = md5(escape($data['password']));
            $res = $this->db->get_where($this->tbl_user, $data)->row_array();
            if (!empty($res)) {
                if($res['is_active']!=1){
                    $result['status'] = 0;
                    $result['message'] = 'Your Account is Incative.';
                    echo json_encode($result);die;
                }
                $this->session->set_userdata('UserData', $res);
                $result['status'] = 1;
                $result['message'] = 'You have login successfully';
            } else {
                $result['status'] = 0;
                $result['res'] = $res;
                $result['qry'] = $this->db->last_query();
                $result['message'] = 'Email or Password not Matched.';
            }
        }else{
            $result['status'] = 0;
            $result['message'] = 'Fill google recaptcha and try again.';
        }
        echo json_encode($result);die;
    }
    
    public function userRegister() {
      
        $data['username'] = $this->input->post('username');
        $data['contact'] = $this->input->post('contact');
        $data['email'] = $this->input->post('email');
        $data['password'] = $this->input->post('password');
        $conf_password = $this->input->post('conf_password');
        if (empty($data['username'])) {
            $result['status'] = 0;
            $result['message'] = 'UserName is required';
            echo json_encode($result);die;
        }
        if (empty($data['contact'])) {
            $result['status'] = 0;
            $result['message'] = 'Contact is required';
            echo json_encode($result);die;
        }
        if (empty($data['email'])) {
            $result['status'] = 0;
            $result['message'] = 'Email is required';
            echo json_encode($result);die;
        }
        if (empty($data['password'])) {
            $result['status'] = 0;
            $result['message'] = 'Password is required';
            echo json_encode($result);die;
        }
        if (empty($conf_password)) {
            $result['status'] = 0;
            $result['message'] = 'Confirm Password is required';
            echo json_encode($result);die;
        }
        if ($data['password']!==$conf_password) {
            $result['status'] = 0;
            $result['message'] = 'Confirm Password is not Matched';
            echo json_encode($result);die;
        }

        $recaptchaResponse = trim($this->input->post('g-recaptcha-response'));
 
        $userIp=$this->input->ip_address();
     
        $secret = $this->config->item('google_secret');
   
        $url="https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$recaptchaResponse."&remoteip=".$userIp;
 
        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, $url); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        $output = curl_exec($ch); 
        curl_close($ch);      
         
        $status= json_decode($output, true);
 
        if ($status['success']) {

        $row = $this->db->insert("tbl_useraddress", $data);
        if ($row) {
            $result['status'] = 1;
            $result['message'] = 'You have Registered successfully';
        } else {
            $result['status'] = 0;
            $result['message'] = 'Failed to Register, Try Again.....';
        }

        }else{
            $result['status'] = 0;
            $result['message'] = 'Fill google recaptcha and try again.';
        }
        echo json_encode($result);die;
    }
    
    public function update_password() {

        $password = $this->input->post('password');
        $new_password = $this->input->post('new_password');
        $conf_password = $this->input->post('conf_password');
        if (empty($password)) {
            $result['status'] = 0;
            $result['message'] = 'Password is required';
            echo json_encode($result);die;
        }
        if (empty($new_password)) {
            $result['status'] = 0;
            $result['message'] = 'New Password is required';
            echo json_encode($result);die;
        }
        if (empty($conf_password)) {
            $result['status'] = 0;
            $result['message'] = 'Confirm Password is required';
            echo json_encode($result);die;
        }
        if($new_password!=$conf_password){
            $result['status'] = 0;
            $result['message'] = 'Confirm Password is not Matched';
            echo json_encode($result);die;
        }
        $userdata = $this->session->userdata('UserData');
        if(md5(escape($password))!=$userdata['password']){
            $result['status'] = 0;
            $result['message'] = 'Old Password is not Matched';
            echo json_encode($result);die;
        }
        $new_password = md5(escape($new_password));
        $row = $this->db->update($this->tbl_user, ['password'=>$new_password, 'updated_at'=>date("Y-m-d H:i:s")], ['id'=>$userdata['id'], 'email'=>$userdata['email'] ]);
        if ($row) {
            $user_data = $this->db->get_where($this->tbl_user, ['id'=>$userdata['id'], 'email'=>$userdata['email'] ])->row_array();
            $this->session->set_userdata('UserData', $user_data);
            $result['status'] = 1;
            $result['message'] = 'Your Password Updated successfully';
        } else {
            $result['status'] = 0;
            $result['message'] = 'Failed to Updated Password, Try Again.....';
        }
        echo json_encode($result);die;

    }
    
    public function forgetPassword() {
        $email = $this->input->post('email');
        $res = $this->db->get_where('tbl_user', ['email'=>$email])->row();
        if (!empty($res)) {
            //$this->sentMail("Forget_Password");
            $result['status'] = 1;
            $result['message'] = 'we have sent email to your email id, Please click link to forget-password';
        } else {
            $result['status'] = 0;
            $result['message'] = 'Email not Found.';
        }
        echo json_encode($result);die;
    }

    public function sendcontact() {
     
        $data['name'] = $this->input->post('name');
        $data['email'] = $this->input->post('email');
        $data['mobile'] = $this->input->post('mobile');
        $data['message'] = $this->input->post('message');
        
        if (empty($data['name'])) {
            $result['status'] = 0;
            $result['message'] = 'Name is required';
            echo json_encode($result);die;
        }
        
        if (empty($data['email'])) {
            $result['status'] = 0;
            $result['message'] = 'Email is required';
            echo json_encode($result);die;
        }
        if (empty($data['mobile'])) {
            $result['status'] = 0;
            $result['message'] = 'Mobile Number is required';
            echo json_encode($result);die;
        }
          if (empty($data['message'])) {
            $result['status'] = 0;
            $result['message'] = 'Confirm Password is required';
            echo json_encode($result);die;
        }
       

        $recaptchaResponse = trim($this->input->post('g-recaptcha-response'));
 
        $userIp=$this->input->ip_address();
     
        $secret = $this->config->item('google_secret');
   
        $url="https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$recaptchaResponse."&remoteip=".$userIp;
 
        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, $url); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        $output = curl_exec($ch); 
        curl_close($ch);      
         
        $status= json_decode($output, true);
 
        if ($status['success']) {

        $row = $this->db->insert("tbl_contact", $data);
        if ($row) {
            $result['status'] = 1;
            $result['message'] = 'Thank you for getting in touch!';
        } else {
            $result['status'] = 0;
            $result['message'] = 'Failed to getting in touch!, Try Again.....';
        }

        }else{
            $result['status'] = 0;
            $result['message'] = 'Fill google recaptcha and try again.';
        }
        echo json_encode($result);die;
    }
    
    public function userlogout() {
        $this->session->unset_userdata('UserData');
        $userdata = $this->session->userdata('UserData');
        if (!empty($userdata)) {
            $this->session->set_flashdata('error', "Failed to Logout. Try Again....");
        } else {
            $this->session->set_flashdata('success', "Account Logout Successfully..!");
        }
        redirect(base_url());
    }
    
    public function saveaddress() {
        
        $edit_id = $this->input->post('edit_id');
        $data['billing_name'] = $this->input->post('billing_name');
        $data['billing_email'] = $this->input->post('billing_email');
        $data['billing_mobile_no'] = $this->input->post('billing_mobile_no');
        $data['alter_mobile_no'] = $this->input->post('alter_mobile_no');
        $data['building_name'] = $this->input->post('building_name');
        $data['road_area_colony'] = $this->input->post('road_area_colony');
        $data['landmark'] = $this->input->post('landmark');
        $data['country'] = $this->input->post('country');
        $data['state'] = $this->input->post('state');
        $data['city'] = $this->input->post('city');
        $data['pincode'] = $this->input->post('pincode');
        $data['address_type'] = $this->input->post('address_type');
        
         if (empty($data['billing_name'])) {
            $result['status'] = 0;
            $result['message'] = 'User Name is required';
            echo json_encode($result);die;
        }
        
        if (empty($data['billing_email'])) {
            $result['status'] = 0;
            $result['message'] = 'Email is required';
            echo json_encode($result);die;
        }
        
        if (empty($data['billing_mobile_no'])) {
            $result['status'] = 0;
            $result['message'] = 'Contact Number is required';
            echo json_encode($result);die;
        }
        
        if (empty($data['alter_mobile_no'])) {
            $result['status'] = 0;
            $result['message'] = 'Alternate Contact Number is required';
            echo json_encode($result);die;
        }
        
         if (empty($data['building_name'])) {
            $result['status'] = 0;
            $result['message'] = 'Building name is required';
            echo json_encode($result);die;
        }
        
        $recaptchaResponse = trim($this->input->post('g-recaptcha-response'));
 
        $userIp=$this->input->ip_address();
     
        $secret = $this->config->item('google_secret');
   
        $url="https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$recaptchaResponse."&remoteip=".$userIp;
 
        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, $url); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        $output = curl_exec($ch); 
        curl_close($ch);      
         
        $status= json_decode($output, true);
 
        if ($status['success']) {
            if(empty($edit_id)){
                $data['user_id'] = is_user_login()['id'];
                $row = $this->db->insert("tbl_useraddress", $data);
                if ($row) {
                    $result['status'] = 1;
                    $result['message'] = 'Address Add successfully';
                } else {
                    $result['status'] = 0;
                    $result['message'] = 'Failed to Register, Try Again.....';
                }
            }else{

                $this->db->update("tbl_useraddress", $data, ['id' => $edit_id]);
                $result['status'] = 1;
                $result['message'] = 'Address Update successfully';
            }
        } else{
            $result['status'] = 0;
            $result['message'] = 'Fill google recaptcha and try again.';
        }
        echo json_encode($result);die;
    }

    public function account() {
        if(!$this->userdata){
            $this->session->set_flashdata("error", "Please Login...");
            redirect(base_url());
        }
        $data['orders'] = $this->db->get_where($this->tbl_ecom_orders, ['customer_id'=>$this->userdata['id']])->result_array();
        $this->load->view('frontend/include/header');
        $this->load->view('frontend/my-account', $data);
        $this->load->view('frontend/include/footer');
    }

}
?>