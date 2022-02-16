<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {
    
    function __construct(){
        parent::__construct();
		$this->load->model('auth_model');
		$this->my_name = "User";
	}

	public function index($id='')
	{
		$header['title']='Add '.$this->my_name;
        $header['sub_title']='Home'; 
        if(!empty($id)){
        	$header['title']='Edit '.$this->my_name;
	        $id=encryptor('decrypt', $id);
	        $data['edit_item']=$this->db->get_where($this->tbl_user, ['id'=>$id])->row();
	    }
        $data['all'] = [];
		$this->load->view('backend/include/header', $header);
		$this->load->view('backend/users-add',$data);
		$this->load->view('backend/include/footer');
		
	}
	public function all()
	{
		$header['title']=$this->my_name .' List';
        $header['sub_title']='Home'; 
        $data['all'] = [];
		$this->load->view('backend/include/header', $header);
		$this->load->view('backend/users-list',$data);
		$this->load->view('backend/include/footer');
	}
	public function save()
	{
	    $edit_id=$this->input->post('edit_id');
	    $data['username'] = $this->input->post('username');
	    $data['email'] = $this->input->post('email');
	    $data['contact'] = $this->input->post('contact');
	    $data['password'] = $this->input->post('password');
	    $data['about'] = $this->input->post('about');
	    $conf_password = $this->input->post('conf_password');
	    $data['is_active'] = $this->input->post('is_active');
    	$attach_img=$_FILES['image'];

	    if(empty($data['username'])){
	      $result['status']=0;
	      $result['message']='Username is required';
	      echo json_encode($result);die; 
	    }
	    if(empty($data['email'])){
	      $result['status']=0;
	      $result['message']='Email is required';
	      echo json_encode($result);die; 
	    }
	    if(empty($data['contact'])){
	      $result['status']=0;
	      $result['message']='Contact No. is required';
	      echo json_encode($result);die; 
	    }
	    if(empty($edit_id) && empty($data['password'])){
	      $result['status']=0;
	      $result['message']='Password is required';
	      echo json_encode($result);die; 
	    }
	    if(empty($edit_id) && empty($conf_password)){
	      $result['status']=0;
	      $result['message']='Confirm Password is required';
	      echo json_encode($result);die; 
	    }
	    if(empty($edit_id) && $data['password']!==$conf_password){
	      $result['status']=0;
	      $result['message']='Confirm Password is not Matched.';
	      echo json_encode($result);die; 
	    }else{
	    	$data['password'] = md5(escape($data['password']));
	    }

	    if(!empty($edit_id))
	    {
	      $check_where['id !=']=$edit_id;
	    }
	    if(!empty($data['email']))
	    {
	      $check_where['email']=$data['email'];
	    }
	    $check=getValueByColumn($this->tbl_user, 'email', $check_where);
	    if(!empty($check))
	    {
	      $result['status']=0;
	      $result['message']='Email already exist!';
	      echo json_encode($result);die;
	    }
	    
	    if(!empty($attach_img['name']))
		{
			$row=doUpload('image', $this->upload_user);
			if($row['status'])
			{
				$data['image']=$row['file_name'];
		        if(!empty($edit_id)) {
		        	$old_img = $this->db->get_where($this->tbl_user, ['id'=>$edit_id])->row();
					removeFile($old_img->image, $this->upload_user);
		        }
			}else{
				$result['status']=0;
				$result['message']=$row['file_name'];
				echo json_encode($result);die;	
			}
		}

	    if(!empty($edit_id))
	    {
	      $data['updated_at']=date("Y-m-d H:i:s");
	      $this->db->update($this->tbl_user, $data,['id'=>$edit_id]);
	      $result['status']=1;
	      $result['message']=$this->my_name.' update successful';
	    }else{
	      $this->db->insert($this->tbl_user, $data);
	      $result['status']=1;
	      $result['message']=$this->my_name.' add successful';
	    }
	    echo json_encode($result);die;
	}


	public function getdatalist()
	{ 
	    $column = array('id', 'username', 'email', 'contact');
	    $search_column = array('', 'username', 'email', 'contact');
	    $query = " SELECT * FROM ".$this->tbl_user." WHERE id>0 ";
 
	    if (isset($_POST['search']['value']) && !empty($_POST['search']['value'])) {
            foreach ($search_column as $key => $value) {
                $query.= ($key == 0 ? " AND " : " OR ");
                $query.= $value . " LIKE '%" . $_POST['search']['value'] . "%' ";
            }
        }

	    if(isset($_POST['order']))
	    {
	       $query .= ' ORDER BY  '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
	    }
	    else
	    {
	       $query .= ' ORDER BY id DESC ';
	    }
	    $number_filter_row= $this->db->query($query)->num_rows();
	    if(isset($_POST["length"])&&$_POST["length"] != -1)
	    {
	      $query .= ' LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
	    }

	    $result =$this->db->query($query)->result();
	    $data = array();
	    foreach ($result as $key => $val) {
	      $sub_array = array();
	      $sub_array[] = ++$key;
	      $sub_array[] = $val->username;
	      $sub_array[] = $val->email;
	      $sub_array[] = $val->contact;
	      // $sub_array[] = getValueByColumn($this->tbl_user, 'name', ['slug'=>$val->parent_cat]) ;
	      // $sub_array[] = '<img src="'.get_files($this->upload_user, $val->image).'" title="attach image" style="width: 50%;">';
	      
	      $sub_array[] = STATUS[$val->is_active];
	      $sub_array[] = '
	      <div>
	      
	        <a href="' . base_url() . 'dashboard/users/index/' .encryptor('encrypt',  $val->id) . '" class="btn btn-xs btn-secondary" style="border-radius: 0px;"> <i class="fas fa-edit"></i></a>

	        <a  id="' . $val->id . '" name="delete"  href="javascript:void(0)" class="btn btn-xs btn-danger delete" style="border-radius: 0px;" onclick="delete_data(`'.encryptor('encrypt',  $val->id) .'`);"> 
	        <i class="fas fa-trash-alt"></i> </a>
	      </div>';
	      $data[] = $sub_array;
	    }

	    $output = array(
	             "draw"         =>  intval($_POST["draw"]),
	             "recordsTotal"     =>  $this->db->get_where($this->tbl_user)->num_rows(),
	             "recordsFiltered"  =>  $number_filter_row,
	             "data"         =>  $data
	            );
	    echo json_encode($output);
	}

	public function deleteitem() {
      $delete_id=$this->input->post('delete_id');
      $delete_id=encryptor('decrypt', $delete_id);
      $data = $this->db->get_where($this->tbl_user, ['id'=>$delete_id])->row();
      if($data->image){
        removeFile($data->image, $this->upload_user);
      }
      $row=$this->db->delete($this->tbl_user, ['id'=>$delete_id]);
      if($row) {
          $result['status']=1;
          $result['message']='Your '.$this->my_name.' has been deleted';
      }else{
          $result['status']=0;
          $result['message']='Your '.$this->my_name.' not deleted';
      }
      echo json_encode($result);die;  
    }
}
