<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends MY_Controller {
    
    function __construct(){
        parent::__construct();
		$this->my_name = "Payment";
	}

	public function all()
	{
		$header['title']=$this->my_name.' List';
        $header['sub_title']='Home';
		$this->load->view('backend/include/header', $header);
		$this->load->view('backend/order/payment-list');
		$this->load->view('backend/include/footer');
		
	}

	public function getdatalist() {
        $column = array('id', 'order_id', 'username', 'contact', 'grand_total', 'payment_type', 'status', 'created_at');
        $query = " SELECT * FROM $this->tbl_orders";
        $query.= " WHERE id > 0";
        if (isset($_POST['order'])) {
            $query.= ' ORDER BY ' . $column[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {
            $query.= ' ORDER BY id DESC ';
        }
        $number_filter_row = $this->db->query($query)->num_rows();
        if (isset($_POST["length"]) && $_POST["length"] != - 1) {
            $query.= ' LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }
        $result = $this->db->query($query)->result();
        $data = array();
        $status = array('1' => 'Placed', '2' => 'Packecd', '3' => 'On The Way', '4' => 'Delivered');
        foreach ($result as $key => $order) {
            $sub_array = array();
            $sub_array[] = ++$key;
            $sub_array[] = $order->order_id;
            $sub_array[] = $order->username;
            $sub_array[] = $order->contact;
            $sub_array[] = 'Rs &nbsp' . number_format($order->grand_total, 2) . '';
            $sub_array[] = $order->payment_type;
            $status = '<select class="form-control payment_status" id="'.$order->order_id.'">';
                foreach (PAYMENT_STATUS as $key => $value) {
                    $status .='<option value="'.$key.'" '.($key==$order->status ? "selected" : "" ).' >'.$value.'</option>';
                }
                $status .=  '</select>';
            $sub_array[] = '
		       <div>
		        <a href="javascript:void(0)"  class="btn btn-danger waves-effect waves-light"    data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg" style="color: white;border-radius: 0px;"  ><i class="fa fa-wrench"></i></a>
		        <a href="' . base_url() . 'dashboard/order/order/order_details/' . $order->id . '" class="btn btn-xs btn-secondary" style="    border-radius: 0px;"><i class="fa fa-print"></i></a>
		        <a id="' . $order->id . '" name="delete"  class="btn btn-danger waves-effect waves-light delete" style="border-radius: 0px;"><i class="fas fa-trash-alt"></i></a>
		        </div>';
            $data[] = $sub_array;
        }
       
        $draw = !empty($_POST["draw"]) ? $_POST["draw"] : 1;
        $output = array("draw" => intval($draw), "recordsTotal" => $this->count_all_data(), "recordsFiltered" => $number_filter_row, "data" => $data);
        echo json_encode($output);
    }
    public function count_all_data() {
        $query = " SELECT * FROM  $this->tbl_orders ";
        $query.= " WHERE id > 0 ";
        $row = $this->db->query($query);
        return $row->num_rows();
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
    public function change_payment_status() {
        $id = $this->input->post('id');
        $data['payment_status'] = $this->input->post('status');
        if(!$id || $data['payment_status']){
          $result['status']=0;
          $result['message']='Something went wrong..., Please Refresh the page';
        }
        $data['updated_at']=date("Y-m-d H:i:s");
        $res = $this->db->update($this->tbl_ecom_orders, $data, ['order_id'=>$id]);
        if($res){
          $result['status']=1;
          $result['message']='Payment Status Updated';
        }else{
          $result['status']=0;
          $result['message']='Failed to Update Payment Status';
        }
        echo json_encode($result);die; 
        
    }
}
