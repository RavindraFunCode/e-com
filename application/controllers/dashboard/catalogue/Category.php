<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends MY_Controller {
    
    function __construct(){
        parent::__construct();
		$this->load->model('auth_model');
	}

	public function index($id='')
	{
		$header['title']='Add Category';
        $header['sub_title']='Home'; 
        if(!empty($id)){
        	$header['title']='Edit Category';
	        $id=encryptor('decrypt', $id);
	        $data['edit_item']=$this->db->get_where($this->tbl_category, ['id'=>$id])->row();
	    }
        $data['all_category'] = $this->db->get_where($this->tbl_category, ['parent_cat'=>'0'])->result();
		$this->load->view('backend/include/header', $header);
		$this->load->view('backend/catalogue/category-save', $data);
		$this->load->view('backend/include/footer');
		
	}
	public function all()
	{
		$header['title']='Category List';
        $header['sub_title']='Home';
		$this->load->view('backend/include/header', $header);
		$this->load->view('backend/catalogue/category-list');
		$this->load->view('backend/include/footer');
		
	}

	public function save()
	{
	    $edit_id=$this->input->post('edit_id');
	    $data['parent_cat'] = $this->input->post('parent_cat');
	    $data['cat_name'] = $this->input->post('cat_name');
	    $data['icon'] = $this->input->post('icon');
	    $data['description'] = $this->input->post('description');
	    $data['is_menu'] = $this->input->post('is_menu');
	    $data['is_active'] = $this->input->post('is_active');
    	$attach_img=$_FILES['image'];
	  
	    if(empty($data['parent_cat'])){
	      $data['parent_cat']=0;
	    }
	    if(empty($data['cat_name'])){
	      $result['status']=0;
	      $result['message']='Category Name is required';
	      echo json_encode($result);die; 
	    }
	    if(empty($data['description'])){
	      $result['status']=0;
	      $result['message']='Description is required';
	      echo json_encode($result);die; 
	    }
	    if(!empty($edit_id))
	    {
	      $check_where['id !=']=$edit_id;
	    }
	    if(!empty($data['cat_name']))
	    {
	      $check_where['cat_name']=$data['cat_name'];
	    }
	    $check=getValueByColumn($this->tbl_category, 'id', $check_where);
	    if(!empty($check))
	    {
	      $result['status']=0;
	      $result['message']='Category already exist!';
	      echo json_encode($result);die;
	    }
	    $data['slug'] = remove_special_characters($data['cat_name'], true);
	    // $data['slug'] = strtolower(str_replace(' ', '-', trim($data['cat_name'], " ")));

	    if(!empty($attach_img['name']))
		{
			$row=doUpload('image', $this->upload_category);
			if($row['status'])
			{
				$data['image']=$row['file_name'];
		        if(!empty($edit_id)) {
		        	$old_img = $this->db->get_where($this->tbl_category, ['id'=>$edit_id])->row();
							removeFile($old_img->image, $this->upload_category);
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
	      $this->db->update($this->tbl_category, $data,['id'=>$edit_id]);
	      $result['status']=1;
	      $result['message']='Category update successful';
	    }else{
	      $this->db->insert($this->tbl_category, $data);
	      $result['status']=1;
	      $result['message']='Category add successful';
	    }
	    echo json_encode($result);die;
	}

	public function getdatalist()
	{
	    $column = array('id', 'cat_name', 'image', 'parent_cat', 'description');
	    $search_column = array('cat_name');
	    $query = " SELECT * FROM ".$this->tbl_category." WHERE id>0 ";
 
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
	      $sub_array[] = $val->cat_name;
	      $sub_array[] = getValueByColumn($this->tbl_category, 'cat_name', ['slug'=>$val->parent_cat]) ;
	      $sub_array[] = '<img src="'.get_files($this->upload_category, $val->image).'" title="attach image" style="width: 50%;">';
	      $sub_array[] = $val->icon;
	      $sub_array[] = $val->description;
	      $sub_array[] = $val->is_menu==1 ? "Yes" : "No";
	      
	      $sub_array[] = STATUS[$val->is_active];
	      $sub_array[] = '
	      <div>
	      
	        <a href="' . base_url() . 'dashboard/catalogue/category/index/' .encryptor('encrypt',  $val->id) . '" class="btn btn-xs btn-secondary" style="border-radius: 0px;"> <i class="fas fa-edit"></i></a>

	        <a  id="' . $val->id . '" name="delete"  href="javascript:void(0)" class="btn btn-xs btn-danger delete" style="border-radius: 0px;" onclick="delete_data(`'.encryptor('encrypt',  $val->id) .'`);"> 
	        <i class="fas fa-trash-alt"></i> </a>
	      </div>';
	      $data[] = $sub_array;
	    }

	    $output = array(
	             "draw"         =>  intval($_POST["draw"]),
	             "recordsTotal"     =>  $this->db->get_where($this->tbl_category)->num_rows(),
	             "recordsFiltered"  =>  $number_filter_row,
	             "data"         =>  $data
	            );
	    echo json_encode($output);
	}

	public function deleteitem() {
      $delete_id=$this->input->post('delete_id');
      $delete_id=encryptor('decrypt', $delete_id);
      $data = $this->db->get_where($this->tbl_category, ['id'=>$delete_id])->row();
      if($data->image){
        removeFile($data->image, $this->upload_category);
      }
      $row=$this->db->delete($this->tbl_category, ['id'=>$delete_id]);
      if($row) {
          $result['status']=1;
          $result['message']='Your Category has been deleted';
      }else{
          $result['status']=0;
          $result['message']='Your Category not deleted';
      }
      echo json_encode($result);die;  
    }
}
