<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Product extends MY_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('auth_model');
        // Check Session Login
        if (!isset($_SESSION['logged_in'])) {
            redirect(site_url('auth/login'));
        }
        $this->tbl_ecom_type = 'tbl_ecom_producttype';
    }
    public function index($edit_id = '') {
        $header['title'] = 'Add Product';
        $header['sub_title'] = 'Home';
        $data['category'] = $this->db->get_where($this->tbl_category, ['parent_cat'=>'0', 'is_active' => 1])->result();
        $data['unit'] = $this->db->get_where($this->tbl_ecom_unit, ['is_active' => 1])->result();
        $data['brand'] = $this->db->get_where($this->tbl_ecom_brand, ['is_active' => 1])->result();
        $data['size'] = $this->db->get_where($this->tbl_ecom_size, ['is_active' => 1])->result();
        $data['type'] = $this->db->get_where($this->tbl_ecom_type, ['is_active' => 1])->result();
        $data['color'] = $this->db->get_where($this->tbl_ecom_color, ['is_active' => 1])->result();
        
        $data['product'] = '';
        if (!empty($edit_id)) {
            $data['edit_product'] = $this->db->get_where($this->tbl_product, ['id' => $edit_id])->row();
            $data['sub_category'] = $this->db->get_where($this->tbl_category, ['parent_cat'=>$data['edit_product']->category, 'is_active' => 1])->result();
        }
        $this->load->view('backend/include/header', $header);
        $this->load->view('backend/product/product', $data);
        $this->load->view('backend/include/footer');
    }
    public function all() {
        $header['title'] = 'List Product';
        $header['sub_title'] = 'Home';
        $data['product'] = $this->db->get_where($this->tbl_product, ['is_active' => 1])->result();
        $this->load->view('backend/include/header', $header);
        $this->load->view('backend/product/product-list', $data);
        $this->load->view('backend/include/footer');
    }
    public function changeStatus() {
        $id = $this->input->post('id');
        if (empty($id)) {
            echoEncodeDie(0, "Something went wrong. Please Refresh the Page...");
        }
        $row = $this->db->get_where($this->tbl_product, ['id' => $id])->row_array();
        if (!empty($row)) {
            if ($row['is_active'] == 1) {
                $data = 2;
            } else {
                $data = 1;
            }
            $res = $this->db->update($this->tbl_product, ['is_active' => $data], ['id' => $id]);
            if ($res) {
                echoEncodeDie(1, " Status Updated Successfull");
            } else {
                echoEncodeDie(0, "Failed to Update " . $usefor . " Status. Please Try Again Later...");
            }
        } else {
            echoEncodeDie(0, "Something went wrong. Please Refresh the Page...");
        }
    }
    public function save() {
        $edit_id = $this->input->post('edit_id');
        $price = $this->input->post('price');
        $discount_type = $this->input->post('discount_type');
        $discount = $this->input->post('discount');
        if (!empty($selling_price) AND $discount) {
            if ($discount_type == 'fix') {
                $selling_price = $price - $discount;
                $discount_price = $discount;
            } elseif ($discount_type == 'percentage') {
                $discount_price = ($discount / 100) * $price;
                $selling_price = $price - $discount_price;
            }
        } else {
            $discount_type = '';
            $discount = 0;
            $discount_price = 0;
            $selling_price = $price;
        }
        $data['name'] = $this->input->post('name');
        $data['category'] = $this->input->post('category');
        $data['sub_category'] = $this->input->post('sub_category');
        $data['description'] = $this->input->post('description');
        $data['specifications'] = $this->input->post('specifications');
        $data['brand'] = $this->input->post('brand');
        $data['size'] = $this->input->post('size');
        $data['unit'] = $this->input->post('unit');
        $data['color'] = $this->input->post('color');
        $data['quantity'] = $this->input->post('quantity');
        $data['price'] = $this->input->post('price');
        $data['sell_price'] = $selling_price;
        $data['discount'] = $discount;
        $data['discount_type'] = $discount_type;
        $data['discount_price'] = $discount_price;
        $data['tax'] = $this->input->post('tax');
        $data['sku_number'] = $this->input->post('sku_number');
        $data['is_active'] = $this->input->post('is_active');
        $data['product_type'] = $this->input->post('product_type');
        $data['meta_tag_title'] = $this->input->post('meta_tag_title');
        $data['meta_tag_description'] = $this->input->post('meta_tag_description');
        $data['meta_tag_keywords'] = $this->input->post('meta_tag_keywords');
        $data['tag'] = $this->input->post('tag');
        $data['slug'] = remove_special_characters($data['name'], true);
        // $data['slug'] = strtolower(str_replace(' ', '-', trim($data['name'], " ")));
        // $data['slug'] = $this->input->post('slug');
        $image = $_FILES['image'];
        if (!empty($image['name'])) {
            $row = doUpload('image', $this->tbl_product);
            if ($row['status']) {
                $data['image'] = $row['file_name'];
                if (!empty($edit_id)) {
                    $old_image = $this->input->post('old_image');
                    removeFile($old_image, $this->tbl_product);
                }
            } else {
                $result['status'] = 0;
                $result['message'] = $row['file_name'];
                echo json_encode($result);
                die;
            }
        }
        // if(!empty($data['image'])){
        //     $this->resizeImage($data['image'],300,338);
        // }
        if (!empty($edit_id)) {
            $this->db->update($this->tbl_product, $data, ['id' => $edit_id]);
            $result['status'] = 1;
            $result['message'] = 'Product update successfully ....!';
        } else {
            $this->db->insert($this->tbl_product, $data);
            $insert_id = $this->db->insert_id();
            $totalimg = count($_FILES['product_image']['name']);
            $config = array('upload_path' => 'uploads/product', 'allowed_types' => 'jpg|jpeg|gif|png',);
            $config['remove_spaces'] = TRUE;
            $this->load->library('upload', $config);
            $files = $_FILES;
            $product_image = [];
            for ($i = 0;$i < $totalimg;$i++) {
                if (!empty($files['product_image']['name'][$i]) && isset($files['image']['name'][$i])) {
                    $imagename = time() . $files['product_image']['name'][$i];
                } else {
                    $imagename = '';
                }
                $_FILES['product_image']['name'] = $imagename;
                $_FILES['product_image']['type'] = $files['product_image']['type'][$i];
                $_FILES['product_image']['tmp_name'] = $files['product_image']['tmp_name'][$i];
                $_FILES['product_image']['error'] = $files['product_image']['error'][$i];
                $_FILES['product_image']['size'] = $files['product_image']['size'][$i];
                // $image[] = $imagename;
                $this->upload->do_upload('product_image');
                $productimages[] = $this->upload->data() ['file_name'];
            }
            for ($i = 0;$i < $totalimg;$i++) {
                $insert[] = array("product_id" => $insert_id, "product_image" => $productimages[$i]);
            }
            $this->db->insert_batch($this->tbl_product_image, $insert);
            $result['status'] = 1;
            $result['message'] = 'Product add successfully ....!';
        }
        echo json_encode($result);
        die;
    }
    public function resizeImage($filename,$width,$height)
    {
          $source_path = FCPATH . 'uploads/product/' . $filename;
        $target_path = FCPATH . 'uploads/product/'.$filename;
          if (!file_exists($target_path)) {
              mkdir($target_path, 0777, true);
            }
          
         $config_manip = array(
              'image_library' => 'gd2',
              'source_image' => $source_path,
              'new_image' => $target_path,
              'width' =>$width,
              'height' => $height
          );
          // $this->load->library('image_lib', $config_manip);
         $this->load->library('image_lib');
        // Set your config up
        $this->image_lib->initialize($config_manip);
        // Do your manipulation
        // $this->image_lib->clear();
          if (!$this->image_lib->resize()) {
            echo $this->image_lib->display_errors();
          }
          $this->image_lib->clear();
    }
    public function getdatalist() {
        $column = array('id', 'image', 'category', 'product_name', 'price', 'sell_price', 'status');
        $query = " SELECT * FROM $this->tbl_product ";
        $query.= " WHERE id > 0 ";
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
        $status = array('1' => 'Active', '2' => 'Inactive');
        foreach ($result as $key => $product) {
            $ischecked = $product->is_active == "1" ? "checked" : "";
            $sub_array = array();
            $sub_array[] = '<input class="checkbox" type="checkbox">
                                                                 ' . ++$key . '';
            $sub_array[] = '<img src="' . base_url() . 'uploads/product/' . $product->image . '" style="width: 50px;height: 50px;">';
            // $sub_array[] = get_field_value('tbl_cateogery', 'category_name', ['id' => $product->category]);
            $sub_array[] = getValueByColumn($this->tbl_category, 'cat_name', ['slug'=>$product->category]) ."/". getValueByColumn($this->tbl_category, 'cat_name', ['slug'=>$product->sub_category]) ;
            $sub_array[] = $product->name;
            $sub_array[] = $product->price;
            $sub_array[] = $product->sell_price;
            $sub_array[] = '
            <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
            <input class="form-check-input" type="checkbox" id="SwitchCheckSizemd' . ++$key . '" 
              ' . $ischecked . '   onclick="changeStatus(`' . $product->id . '`)" >
            </div>';
            $sub_array[] = '
       <div>
        <a  onclick="showDetails(`' . $product->id . '`);"   class="btn btn-xs btn-primary" style="color: white;border-radius: 0px;" ><i class="fas fa-eye"></i></a>
        <a href="' . base_url() . 'dashboard/product/product/index/' . $product->id . '" class="btn btn-xs btn-secondary" style="border-radius: 0px;"> <i class="fas fa-edit"></i></a>

        <a  id="' . $product->id . '" name="delete"  href="javascript:void(0)" class="btn btn-xs btn-danger delete" style="border-radius: 0px;"> 
          <i class="fas fa-trash-alt"></i> </a>
        </div>';
            $data[] = $sub_array;
        }
        //   print_r($data);
        $draw = !empty($_POST["draw"]) ? $_POST["draw"] : 1;
        $output = array("draw" => intval($draw), "recordsTotal" => $this->count_all_data(), "recordsFiltered" => $number_filter_row, "data" => $data);
        echo json_encode($output);
    }
    public function count_all_data() {
        $query = "SELECT * FROM  $this->tbl_product";
        $query.= " WHERE id > 0 ";
        $row = $this->db->query($query);
        return $row->num_rows();
    }
    public function delete()
    {    
        $id= $_POST["delete_id"];
        $this->db->delete($this->tbl_product,['id' => $id]); 
    }
    public function showDetails() {
        $id = $this->input->post('id');
        $data = $this->db->get_where($this->tbl_product, ['id' => $id])->row();
        $html = ' <div class="table-responsive">
                            <table class="table table-bordered mb-0">';
        $html.= '<tr><th>Product:</th><td><img src="' . base_url() . 'uploads/product/' . $data->image . '" style="width: 50px;height: 50px;"></td></tr>';
        $html.= '<tr><th>Product Name:</th><td>' . $data->name . '</td></tr>';
        $html.= '<tr><th>Description:</th><td>' . $data->description . '</td></tr>';
        $html.= '<tr><th>Specifications:</th><td>' . $data->specifications . '</td></tr>';
        $html.= '<tr><th>Price : </th><td>' . $data->price . '</td></tr>';
        $html.= '<tr><th>Sell Price</th><td>' . $data->sell_price . '</td></tr>';
        $html.= '</table>
                            </div>';
        echo $html;
    }


    public function get_sub_category() {
        $cat_slug=$this->input->post('cat_slug');
        // $cat_slug=encryptor('decrypt', $cat_slug);
        $data = $this->db->get_where($this->tbl_category, ['parent_cat' => $cat_slug, 'is_active' => 1])->result();
        // echo $this->db->last_query();die;
        $opt='';
        if(!empty($data)){
          $opt.='<option value=""> Select Sub Category</option>';
          foreach ($data as $key => $value) {
            $opt.='<option value="'. $value->slug.'">'.$value->cat_name.'</option>';
          }
        }else{
          $opt='<option value="">No Sub Category Available. Please Add Sub Category...</option>';
        }
        echo $opt;die;
    }
}
