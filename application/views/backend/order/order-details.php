<div class="row">
   <div class="col-lg-12">
      <div class="card">
         <div class="card-body">
            <div class="invoice-title">
               <h4 class="float-end font-size-16">Order # <?php echo $order->order_id;  ?></h4>
               <div class="mb-4">
                  <img src="<?php  echo base_url() ?>assets/admin/assets/images/logo-light.png" alt="logo" height="20"/>
               </div>
            </div>
            <hr>
            <div class="row">
               <?php
                  // $shipping_id=$order->shipping_address;
                  // $address=$this->db->get_where('tbl_ecom_useraddress',['id'=> $shipping_id])->row();
                  $orderitems=$this->db->get_where('tbl_ecom_order_product',['order_id'=> $order->order_id])->result();
                  $address=$this->db->get_where('tbl_useraddress',['id'=> $order->address])->row();
                  
                  
                   // print_r($orderitems);
                  ?>
               <div class="col-sm-6">
                  <address>
                     <strong>Billed To / Ship to:</strong><br><br>
                     <?php 
                        echo $address->billing_name;
                     ?>
                        <br>
                     <?php echo $address->building_name  ?><br>
                     <?php echo $address->city  ?>
                     <?php echo $address->state  ?>, <?php echo $address->country  ?>, <?php echo $address->pincode  ?><br>
                  </address>
               </div>
               <div class="col-sm-6 text-sm-end">
                  <address class="mt-2 mt-sm-0">
                     <strong>Seller Details :</strong><br>
                     <?php //echo getValueByColumn($this->tbl_ecom_orders,'seller_id',['order_id'=>$order->id]); ?> ,<br>
                     <?php //echo getValueByColumn('tbl_ecom_product','restaurent_address',['id'=>$order->id]); ?>
                     <!--Groci Food & Grocery Private Limited<br>-->
                     <!-- G-5 Mathura Vihar <br>-->
                     <!-- Lucknow 221016 Uttar Pradesh<br>-->
                  </address>
               </div>
            </div>
            <div class="row">
               <div class="col-sm-6 mt-3">
                  <address>
                     <strong>Payment Method:</strong><br>
                     <?php echo $order->payment_type;  ?><br>
                  </address>
               </div>
               <div class="col-sm-6 mt-3 text-sm-end">
                  <address>
                     <strong>Order Date:</strong><br>
                     <?php echo date("d-M-Y", strtotime($order->created_at));  ?><br><br>
                  </address>
               </div>
            </div>
            <div class="py-2 mt-3">
               <h3 class="font-size-15 fw-bold">Order summary</h3>
            </div>
            <div class="table-responsive">
               <table class="table table-nowrap">
                  <thead class="table-light">
                     <tr>
                        <th style="width: 70px;">No.</th>
                        <th>Product</th>
                        <th>Unit Price</th>
                        <th>Quantity</th>
                        <th class="text-end">Net Amount</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php 
                        $subtotal=0;
                        $delivery_charge=0;
                        foreach($orderitems as $row)
                        {
                         // $delivery_charge = 20;
                         // $gsttax = 20;
                         // $subtotal += $row->sub_total;
                        
                        // $G_TOTAL=  $delivery_charge + $subtotal + $gsttax;
                        ?>
                     <tr>
                        <td>01</td>
                        <td><?php  echo $row->product_name; ?></td>
                        <td><?php  echo $row->quantity; ?></td>
                        <td><?php  echo $row->sell_price; ?></td>
                        <td class="text-end"><?php echo number_format($row->sub_total,2); ?></td>
                     </tr>
                     <?php
                        }
                        ?>
                     <tr>
                        <td colspan="4" class="border-0 text-end">
                           <strong>Delivery Charge : </strong>
                        </td>
                        <td class="border-0 text-end">Rs <?php  echo number_format( $order->shipping_charge, 2); ?></td>
                     </tr>
                     <tr>
                        <td colspan="4" class="border-0 text-end">
                           <strong> Tax : </strong>
                        </td>
                        <td class="border-0 text-end">Rs 0.00<?php //echo number_format($gsttax,2); ?></td>
                     </tr>
                     <hr>
                     <tr>
                        <td colspan="4" class="border-0 text-end">
                           <strong> Grand Total :  </strong>
                        </td>
                        <td class="border-0 text-end">
                           <h4 class="m-0">Rs <?php  echo number_format($order->grand_total,2); ?> </h4>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
            <div class="d-print-none">
               <div class="float-end">
                  <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light me-1"><i class="fa fa-print"></i> Print Invoice</a>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- end row -->