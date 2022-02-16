<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brand extends MY_Controller {
    
    function __construct(){
        parent::__construct();
		$this->load->model('auth_model');
		$this->my_name = "Brand";
	}

	public function index($id='')
	{
		$header['title']='Add '.$this->my_name;
        $header['sub_title']='Home'; 
        if(!empty($id)){
        	$header['title']='Edit '.$this->my_name;
	        $id=encryptor('decrypt', $id);
	        $data['edit_item']=$this->db->get_where($this->tbl_ecom_brand, ['id'=>$id])->row();
	    }
        $data['all_category'] = [];
		$this->load->view('backend/include/header', $header);
		$this->load->view('backend/catalogue/brand-save', $data);
		$this->load->view('backend/include/footer');
		
	}
	public function all()
	{
		$header['title']=$this->my_name.' List';
        $header['sub_title']='Home';
		$this->load->view('backend/include/header', $header);
		$this->load->view('backend/catalogue/brand-list');
		$this->load->view('backend/include/footer');
		
	}

	public function save()
	{
	    $edit_id=$this->input->post('edit_id');
	    $data['name'] = $this->input->post('name');
	    $data['is_active'] = $this->input->post('is_active');
    	$attach_img=$_FILES['image'];

	    if(empty($data['name'])){
	      $result['status']=0;
	      $result['message']='Brand Name is required';
	      echo json_encode($result);die; 
	    }
	    if(!empty($edit_id))
	    {
	      $check_where['id !=']=$edit_id;
	    }
	    if(!empty($data['name']))
	    {
	      $check_where['name']=$data['name'];
	    }
	    $check=getValueByColumn($this->tbl_ecom_brand, 'id', $check_where);
	    if(!empty($check))
	    {
	      $result['status']=0;
	      $result['message']='Brand already exist!';
	      echo json_encode($result);die;
	    }
	    $data['slug'] = remove_special_characters($data['name'], true);
	    // $data['slug'] = strtolower(str_replace(' ', '-', trim($data['name'], " ")));

	    if(!empty($attach_img['name']))
		{
			$row=doUpload('image', $this->upload_brand);
			if($row['status'])
			{
				$data['image']=$row['file_name'];
		        if(!empty($edit_id)) {
		        	$old_img = $this->db->get_where($this->tbl_ecom_brand, ['id'=>$edit_id])->row();
					removeFile($old_img->image, $this->upload_brand);
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
	      $this->db->update($this->tbl_ecom_brand, $data,['id'=>$edit_id]);
	      $result['status']=1;
	      $result['message']=$this->my_name.' update successful';
	    }else{
	      $this->db->insert($this->tbl_ecom_brand, $data);
	      $result['status']=1;
	      $result['message']=$this->my_name.' add successful';
	    }
	    echo json_encode($result);die;
	}

	public function getdatalist()
	{ 
	    $column = array('id', 'name');
	    $search_column = array('name');
	    $query = " SELECT * FROM ".$this->tbl_ecom_brand." WHERE id>0 ";
 
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
	      $sub_array[] = $val->name;
	      // $sub_array[] = getValueByColumn($this->tbl_ecom_brand, 'name', ['slug'=>$val->parent_cat]) ;
	      $sub_array[] = '<img src="'.get_files($this->upload_brand, $val->image).'" title="attach image" style="width: 50%;">';
	      
	      $sub_array[] = STATUS[$val->is_active];
	      $sub_array[] = '
	      <div>
	      
	        <a href="' . base_url() . 'dashboard/catalogue/brand/index/' .encryptor('encrypt',  $val->id) . '" class="btn btn-xs btn-secondary" style="border-radius: 0px;"> <i class="fas fa-edit"></i></a>

	        <a  id="' . $val->id . '" name="delete"  href="javascript:void(0)" class="btn btn-xs btn-danger delete" style="border-radius: 0px;" onclick="delete_data(`'.encryptor('encrypt',  $val->id) .'`);"> 
	        <i class="fas fa-trash-alt"></i> </a>
	      </div>';
	      $data[] = $sub_array;
	    }

	    $output = array(
	             "draw"         =>  intval($_POST["draw"]),
	             "recordsTotal"     =>  $this->db->get_where($this->tbl_ecom_brand)->num_rows(),
	             "recordsFiltered"  =>  $number_filter_row,
	             "data"         =>  $data
	            );
	    echo json_encode($output);
	}

	public function deleteitem() {
      $delete_id=$this->input->post('delete_id');
      $delete_id=encryptor('decrypt', $delete_id);
      $data = $this->db->get_where($this->tbl_ecom_brand, ['id'=>$delete_id])->row();
      if($data->image){
        removeFile($data->image, $this->upload_brand);
      }
      $row=$this->db->delete($this->tbl_ecom_brand, ['id'=>$delete_id]);
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
