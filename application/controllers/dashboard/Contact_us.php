<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_us extends MY_Controller {
    
    function __construct(){
        parent::__construct();
		$this->my_name = "Contact Us";
	}

	public function all()
	{
		$header['title']=$this->my_name.' List';
        $header['sub_title']='Home';
		$this->load->view('backend/include/header', $header);
		$this->load->view('backend/contact_us-list');
		$this->load->view('backend/include/footer');
		
	}

	public function getdatalist()
	{ 
	    $column = array('id', 'name', 'email', 'contact', 'message');
	    $search_column = array('','name', 'email', 'contact', 'message');
	    $query = " SELECT * FROM ".$this->tbl_contact_us." WHERE id>0 ";
 
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
	      $sub_array[] = $val->email;
	      $sub_array[] = $val->contact;
	      $sub_array[] = $val->message;
	      $sub_array[] = '
	      <div>

	        <a  id="' . $val->id . '" name="delete"  href="javascript:void(0)" class="btn btn-xs btn-danger delete" style="border-radius: 0px;" onclick="delete_data(`'.encryptor('encrypt',  $val->id) .'`);"> 
	        <i class="fas fa-trash-alt"></i> </a>
	      </div>';
	      
	      $data[] = $sub_array;
	    }

	    $output = array(
	             "draw"         =>  intval($_POST["draw"]),
	             "recordsTotal"     =>  $this->db->get_where($this->tbl_contact_us)->num_rows(),
	             "recordsFiltered"  =>  $number_filter_row,
	             "data"         =>  $data
	            );
	    echo json_encode($output);
	}

	public function deleteitem() {
      $delete_id=$this->input->post('delete_id');
      $delete_id=encryptor('decrypt', $delete_id);
      
      $row=$this->db->delete($this->tbl_contact_us, ['id'=>$delete_id]);
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
