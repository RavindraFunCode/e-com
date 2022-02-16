<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fabcart</title>
    <style>
        body{
            background-color: #F6F6F6; 
            margin: 0;
            padding: 0;
              -webkit-print-color-adjust: exact;
        }
        h1,h2,h3,h4,h5,h6{
            margin: 0;
            padding: 0;
        }
        p{
            margin: 0;
            padding: 0;
        }
        .container{
            width: 80%;
            margin-right: auto;
            margin-left: auto;
        }
        .brand-section{
             -webkit-print-color-adjust: exact;
           background-color: #0d1033 !important;
           padding: 10px 40px;
        }
        .logo{
            width: 50%;
        }

        .row{
            display: flex;
            flex-wrap: wrap;
        }
        .col-6{
            width: 50%;
            flex: 0 0 auto;
        }
        .text-white{
            color: #fff;
        }
        .company-details{
            float: right;
            text-align: right;
        }
        .body-section{
            padding: 16px;
            border: 1px solid gray;
        }
        .heading{
            font-size: 20px;
            margin-bottom: 08px;
        }
        h2.sub-heading{
             color: #000;
            margin-bottom: 5px;
            text-transform: uppercase;
            font-size: 20px;
                }
        p.sub-heading {
          color: #333;
            margin-bottom: 5px;
            text-transform: capitalize;
            font-size: 14px;
            line-height: 23px;
            font-family: sans-serif;
        }
        table{
            background-color: #fff;
            width: 100%;
            border-collapse: collapse;
        }
        table thead tr{
            border: 1px solid #111;
            background-color: #f2f2f2;
        }
        table td {
            vertical-align: middle !important;
            text-align: center;
        }
        table th, table td {
            padding-top: 08px;
            padding-bottom: 08px;
        }
        .table-bordered{
           box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;
        }
        .table-bordered td, .table-bordered th {
            border: 1px solid #dee2e6;
        }
        .text-right{
            text-align: end;
        }
        .w-20{
            width: 20%;
        }
        .float-right{
            float: right;
        }
        .hgiugsgdiufs {
            text-align: right;
            padding: 0 0 0 50px;
        }
        img.logo-img {
            width: 240px;
            height: 65px;
            background-size: cover;
            background-repeat: no-repeat;
        }
        img.sigunature{
         width: 240px;
            height: 56px;
            background-size: cover;
            background-repeat: no-repeat;
                float: right;
        }
        .row.secons-rowa1 {
            padding: 20px 0;
        }
        .row.secons-rowa2 {
            padding: 20px 0;
        }
        span.state-deatils {
            font-size: 16px;
            color: #000;
            font-weight: 600;
        }
        span.state-deatils-small {
            font-size: 16px;
        }
        table, td, th {
          border: 1px solid black;
        }
        span.state-deatils-footer {
            font-size: 15px;
                float: left;
                text-align: center;
        }
        span.state-deatils-footer-small {
            font-size: 11px;
                float: left;
                text-align: center;
                padding: 3px 0;
        }
        .company-details p {
            font-size: 20px;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="brand-section">
            <div class="row">
                <div class="col-6">
                    <img src="<?php  echo base_url();  ?>assets/web/assets/images/logo_invoice.jpg" class="logo-img">
                </div>
                <div class="col-6">
                    <div class="company-details">
                        <p class="text-white">Tax Invoice/Bill of Supply/Cash Memo</p>
                        <p class="text-white">(Original for Recipient)</p>
                        <p class="text-white">+91 888555XXXX</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="body-section" style="border-bottom:none">
            <div class="row">
                <div class="col-6 first-receive-left">
                     <h2 class="sub-heading">Sold By :</h2>
                    <p class="sub-heading">Appario Retail Private Ltd</p>                  
                    <p class="sub-heading">*
                         Khasra numbers:444(P),445(P),459(P),
                        460,461,462,463,464,465,466,467,468,469,
                        75(P),476,477,478, 479,480, 481,482,483(P),491,492,493(P)
                        Village - Bhaukapur, Tehsil - Sarojini Nagar, Mohan Road,
                        Lucknow - 226401 Logigo LLP Pvt Ltd.
                        LUCKNOW, UTTAR PRADESH, 226401
                        IN</p>
                   
                </div>
                <div class="col-6 first-receive-right">
                    <div class="hgiugsgdiufs">
                      <h2 class="sub-heading">Billing Address :</h2>
                    <p class="sub-heading col-define">Deepak Maurya
                    27-institutional Area, Vipul Khand
                    6, Gomti Nagar, Vipul khand-6
                    LUCKNOW, UTTAR PRADESH,
                    226010
                    IN</p>
                   
                    <p><span class="state-deatils">State/UT Code:</span><span class="state-deatils-small">09</span></p>
                    </div>
                </div>
            </div>
               <div class="row secons-rowa1">
                <div class="col-6">
  <p><span class="state-deatils">PAN No:</span><span class="state-deatils-small">09</span></p>
   <p><span class="state-deatils">GST Registration No:</span><span class="state-deatils-small">AALCA0171E</span></p>                      
                   
                </div>
                <div class="col-6">
                    <div class="hgiugsgdiufs">
                      <h2 class="sub-heading">Shipping Address :</h2>
                    <p class="sub-heading col-define">Deepak Maurya
                    27-institutional Area, Vipul Khand
                    6, Gomti Nagar, Vipul khand-6
                    LUCKNOW, UTTAR PRADESH,
                    226010
                    IN</p>

 <p><span class="state-deatils">State/UT Code:</span><span class="state-deatils-small">09</span></p>
 <p><span class="state-deatils">Place of supply:</span><span class="state-deatils-small">UTTAR PRADESH</span></p>
 <p><span class="state-deatils">Place of delivery:</span><span class="state-deatils-small">UTTAR PRADESH</span></p>

                    
                    </div>
                </div>
            </div>
             <div class="row secons-rowa2">
                <div class="col-6">
 <p><span class="state-deatils">Order Number:</span><span class="state-deatils-small">171-6633610-3422754</span></p> 
 <p><span class="state-deatils">Order Number:</span><span class="state-deatils-small">171-6633610-3422754</span></p> 
 <p><span class="state-deatils">Order Number:</span><span class="state-deatils-small">171-6633610-3422754</span></p>  
  <p><span class="state-deatils">Order Number:</span><span class="state-deatils-small">171-6633610-3422754</span></p>                   
                </div>
                <div class="col-6">
                    <div class="hgiugsgdiufs">
                             

<p><span class="state-deatils">Invoice Number : </span><span class="state-deatils-small">LKO1-1024873 </span></p>
<p><span class="state-deatils">Invoice Details :</span><span class="state-deatils-small">UP-LKO1-1034-2122</span></p> 
<p><span class="state-deatils">Invoice Date : </span><span class="state-deatils-small">UP-LKO1-1034-2122</span></p>  

                    </div>
                </div>
            </div>
        </div>
          
         
        <div class="body-section">
            <h3 class="heading">Ordered Items</h3>
            <br>
      
            <table>
  <tr>
    <th>Sl.No</th>
    <th>Description</th>
     <th>Unit Price</th>
      <th>Discount</th>
       <th>Qty</th>
        <th>Net Amount</th>
         <th>Tax Rate</th>
         <th>Tax Type</th>
         <th>Tax Amount</th>
          <th>Total Amount</th>
         

  </tr>
  <tr>
    <td>1</td>
    <td> Boult Audio ProBass Qcharge in-Ear Earphones with Fast</td>
     <td>₹677.12</td>
    <td>₹677.12</td> 
    <td>2</td>
    <td>₹677.12</td> 
    <td>37%</td>
    <td>₹677.12</td> 
    <td>₹677.12</td>
    <td>₹677.12</td>
  </tr>
  <tr>
  <td>2</td>
    <td> Boult Audio ProBass Qcharge in-Ear Earphones with Fast</td>
     <td>₹677.12</td>
    <td>₹677.12</td> 
    <td>2</td>
    <td>₹677.12</td> 
    <td>37%</td>
    <td>₹677.12</td> 
    <td>₹677.12</td>
    <td>₹677.12</td>
  </tr>
     <tr>
     <td colspan="8" ><span style="float:left;">Total</span></td>
     <td>₹677.12</td>
    <td>₹677.12</td>   
  </tr>
   <tr>
     <td colspan="10" style="border: none;padding:15px;">
        <p style="float:left;">Amount in Words:</p><br>
         <p style="float:left;">Seven Hundred Ninety-nine only</p>

     </td>
  </tr>
   <tr>
     <td colspan="10" style="border-bottom: none;padding:15px;">
        <p style="float:right;">For Appario Retail Private Ltd:</p>      
     </td>  
  </tr>
<tr>
    <td colspan="10" style="border: none;padding:15px;">
       <p><img src="<?php  echo base_url();  ?>assets/web/assets/images/logo_invoice.jpg" class="sigunature"></p>    
     </td>  
</tr>
<tr>
      <td colspan="10" style="border: none;padding:15px;">
        <p style="float:right;">Seven Hundred Ninety-nine only</p>     
     </td>  
</tr>


  
</table>

            <br>

            <h3 class="heading" style="padding:15px;">Payment Status: Paid</h3><br>
            <div class="brand-sectionjj" style="padding:15px;">
            <div class="row">
                <div class="col-6">
                    <img src="<?php  echo base_url();  ?>assets/web/assets/images/logo_invoice.jpg" class="logo-img">
                </div>
                <div class="col-6">
                    <div class="company-details">
                        <p class="">Tax Invoice/Bill of Supply/Cash Memo</p>
                        <p class="">(Original for Recipient)</p>
                        <p class="">+91 888555XXXX</p>
                    </div>
                </div>
            </div>
        </div>
        <table>
  <tr>
    <th><span class="state-deatils-footer">Payment Transaction ID:</span> <span class="state-deatils-footer-small">3UQYxlSqcPleRa9lbx0c </span></th>
     <th><span class="state-deatils-footer">Date & Time:</span> <span class="state-deatils-footer-small">28/10/2021, 13:51:24 hrs </span></th>
 <th><span class="state-deatils-footer">s Invoice Value:</span> <span class="state-deatils-footer-small">799.00 </span></th>
 <th><span class="state-deatils-footer">Mode of Payment:</span> <span class="state-deatils-footer-small">Credit Card </span></th>

  </tr>
 
</table>
        </div>

        <div class="body-section">
            <p>&copy; Copyright 2021 - Fabcart. All rights reserved. 
                <a href="https://www.fundaofwebit.com/" class="float-right">www.fundaofwebit.com</a>
            </p>
        </div>      
    </div>      

</body>
</html>