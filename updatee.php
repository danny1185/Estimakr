<?php
    session_start();
    include('database_connection/connection.php');
    include('includes/variables.php');
    $query = "select * from estimation where  user_id = ". $_SESSION['user_id'] .  " AND id = " . $_GET['uid'] ;
    $row = $db->rawQueryOne($query);
    if(!isset($_SESSION['email'])){
      header("Location:signIn.php");
     }   
   
?>
<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Bootstrap CSS -->
<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.11/css/mdb.min.css" rel="stylesheet">

<link href="https://fonts.googleapis.com/css?family=Lora&display=swap" rel="stylesheet">
<link rel="stylesheet" href="style.css" type="text/css">
<title>Update Estimte</title>


        <style>
          li {
		        margin-right: 15px;
	        }
          th {
            font-family: 'lora';
          }
          
          #companyLogo {
            /* border: solid 1px black; */
            text-align: left;
            margin: 2% 2% 0 0;
          }
          h5 {
            font-family: 'playfair';
            font-size: 26px;
            margin-bottom: -35px;
          }
          
          .md-form {
            margin-bottom: -10px;
          }
          /* MAIN NAVBAR START */
          /* #mainNavBar {
            
          } */
          #brandLink {
            font-family: 'lora', serif;
            margin-left:50px;
            color: #0c4153;
            font-size: 22px;
          }
          #mainNavDropDown {
            background-color: rgb(50, 74, 95, 0.9);
           
          }
          #mainNavLink {
            color: #0c4153;
          }
          #navbarDropdown {
            color: #0c4153;
          }
          #dropdownLink {
            color: white;
          }
          #dropdownLink:hover {
            color: #0c4153;
          }
          /* MAIN NAVBAR END */
          #businessInfoCardContainer {
            padding-bottom: 30px;
          }
          #jobInfoCardContainer {
            padding-bottom: 30px;
          }
          #customerInfoCardContainer {
            padding-bottom: 30px;
          }
          .btn-circle {
            width: 30px;
            height: 30px;
            padding: 0px 0px;
            border-radius: 15px;
            text-align: center;
            font-size: 20px;
            line-height: 1.42857;
            color: white;
          }
          .fa-plus {
            color: white;
          }
          #laborType {
            width: 30px;
          }
          #laborTypeHeaderCol {
            color: white;
          }
          .page-footer {
            background-color: #1C2331; }
    
        </style>
</head>
<body>
<div class="">
   <!-- NAVBAR CONTAINER START -->
<!--<nav class="navbar navbar-expand-lg z-depth-0" id="mainNavBar"> <a class="navbar-brand" id="brandLink" href="#" >Estimakr</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav col-md-3 ml-md-auto" style="margin-right:150px;">
      </ul>
      <form class="form-inline my-2 my-lg-0" style="margin-right:100px;">
      <button class="btn btn-outline-success" id="printBtn" onclick="myFunction()">Print this page</button>
        <ul class="navbar-nav mr-auto" >
		<li class="nav-item"> <a class="nav-link" href="VehicleEstimate.php" id="mainNavLink" tabindex="-1" aria-disabled="true"><i class="fa fa-clipboard mr-2"></i>Estimate Requests</a> </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['firstName']; ?></a>
            <div class="dropdown-menu" id="mainNavDropDown" aria-labelledby="navbarDropdown"> 
              <a class="dropdown-item" id="dropdownLink" href="estimateForm.php">New Estimate</a> 
              <a class="dropdown-item" id="dropdownLink" href="estimateStatus.php">Saved Estimates</a> 
              <a class="dropdown-item" id="dropdownLink" href="update_profile.php">Settings</a> 
              <a class="dropdown-item" id="dropdownLink" href="ticket.php">Help</a>
              <a class="dropdown-item" id="dropdownLink" href="shopProfile.php">Profile</a>  
 
            </div>
          </li>
          <li class="nav-item"> <a class="nav-link" id="mainNavLink" href="<?php echo BASE_URL?>controllers/logout.php" tabindex="-1" aria-disabled="true">LogOut</a> </li>
        </ul>
      </form>
    </div>
  </nav>-->
  <?php 
        if(!$_SESSION['role_id'])
        {
            require_once('components/visitorMainNav.php');
        }else if($_SESSION['role_id'] == 1)
        {
            require_once('components/customerMainNav.php');
        }else if($_SESSION['role_id'] == 2)
        {
            require_once('components/shopMainNav.php');
        }
    ?>
  <!-- NAVBAR CONTAINER END -->
  <nav class="navbar z-depth-2 mb-5" style="background-color: #324a5f; color: white; height: 55px; font-size: 26px; font-family: playfair;">

<ol class="breadcrumb mr-auto" style="font-size: 18px;">
    <li class="breadcrumb-item active text-white ml-4" >Update Estimate</li>
  </ol>
</nav>
<!-- PAGE HEADER END -->

<!-- FORM PAGE SELECTION ONCLICK MENU -->
  <!-- FORMS TO BE SWITCHED ON RADIO CLICK START ------------------------------------->
  <!--BUSINESS AND CUSTOMER INFORMATION START-->
  <form action="<?php echo BASE_URL?>controllers/estimation.php" method="post" name="cart" >
  <div class="bg-white ml-5 mr-5 jumbotron pt-4 pb-4">
    <!-- BUSINESS INFORMATION FORM INPUT START -->
    
<!-- SHOP AND CUSTOMER INFORMATION MAIN CONTAINER START -->
      <div class="row">
      <div class="" id="companyLogo">
        <?php if ( isset($_SESSION['logo'])):?>
          <img width="250" height="250" src="<?php echo BASE_URL?>images/logo/<?php if ( isset($_SESSION['logo'])){ echo  $_SESSION['logo']; }?>" >
        <?php endif;?>
      </div>
<!-- BUSINESS INFORMATION INPUT START -->
        <div class="col-xl-3 z-depth-1 mr-5" id="businessInfoCardContainer">
          <h5 class="text-center py-4 d-block">Business Information</h5>
          <div class="md-form">
            <input type="text" id="bName" class="form-control" name="b_name" value="<?php echo $row['b_name']; ?>">
            <label for="bName">Business Name</label>
          </div>
          <input type="hidden" class="form-control" name="id" value="<?php echo $_GET['uid']; ?>">
          
          <div class="form-row">
            <div class="md-form col-md-6">
              <input type="text" id="bFirstName" class="form-control" name="b_first_name" value="<?php echo $row['b_first_name']; ?>" >
              <label for="bFirstName">First Name</label>
            </div>
            <div class="md-form col-md-6">
              <input type="text" id="bLastName" class="form-control" name='b_last_name' value="<?php echo $row['b_last_name']; ?>">
              <label for="bLastName">Last Name</label>
            </div>
          </div>
          <div class="md-form">
            <input type="text" id="bAddress" class="form-control" name="b_address" value="<?php echo $row['b_address']; ?>">
            <label for="bAddress">Street Address</label>
          </div>
          <div class="form-row ">
            <div class="md-form col-md-4">
              <input type="text" id="bCity" class="form-control" name="b_city" value="<?php echo $row['b_city']; ?>">
              <label for="bCity">City</label>
            </div>
            <div class="md-form col-md-4">
              <input type="text" id="bState" class="form-control" name="b_state" value="<?php echo $row['b_state']; ?>">
              <label for="bState">State</label>
            </div>
            <div class="md-form col-md-4">
              <input type="text" id="bZipCode" class="form-control" name="b_zipcode" value="<?php echo $row['b_zipcode']; ?>">
              <label for="bZipCode">Zip Code</label>
            </div>
          </div>
          <div class="form-row">
            <div class=" md-form col-xl-6" >
              <input type="email" id="bEmail" class="form-control" name="b_email" value="<?php echo $row['b_email']; ?>">
              <label for="bEmail">Email</label>
            </div>
            <div class="md-form col-xl-6">
              <input type="tel" id="bPhone" class="form-control" name="b_phone" value="<?php echo $row['b_phone']; ?>">
              <label for="bPhone">Phone Number</label>
            </div>
          </div>
        </div>
        <!-- BUSINESS INFORMATION FORM INPUT END -->
        <!-- JOB INFORMATION INPUT START -->
        <div class="col-xl-2 z-depth-1 mr-5 ml-5" id="jobInfoCardContainer">
          <h5 class="text-center py-4 d-block">Job Information</h5>
          <tr>
            <div class="form-row ml-auto mr-auto">
              <div class="md-form col-xl-12">
              <input type="text" id="jYear" class="form-control" name="year" value="<?php echo $row['year']; ?>">
                <label for="jYear">Year</label>
              </div>
              <div class="md-form col-xl-12">
              <input type="text" id="jMake" class="form-control" name="make" value="<?php echo $row['make']; ?>">
              <label for="jMake">Make</label>
              </div>
              <div class="md-form col-xl-12">
              <input type="text" id="jModel" class="form-control" name="model" value="<?php echo $row['model']; ?>">
              <label for="jModel">Model</label>  
              </div>
              <div class="md-form col-xl-12">
              <input type="text" id="jStatus" class="form-control " name="status" value="<?php echo $row['status']; ?>">
              <label for="jStatus">Status</label>
              </div>
            </div>
          </tr>
        </div>
        <!-- JOB INFORMATION INPUT END -->
        <!-- CUSTOMER INFORMATION INPUT START -->
        <div class="col-xl-3 z-depth-1 ml-5" id="customerInfoCardContainer">
          <h5 class="text-center py-4 d-block">Customer Information</h5>
          <div class="md-form">
          <input type="text" id="cName" class="form-control" name="c_name" value="<?php echo $row['c_name']; ?>">
          <label for="cName">Business Name</label>        
          </div>
          <div class="form-row">
            <div class="md-form col-md-6">
              <input type="text" id="cFirstName" class="form-control" name="c_first_name" value="<?php echo $row['c_first_name']; ?>">
              <label for="cFirstName">First Name</label>
            </div>
            <div class="md-form col-md-6">
              <input type="text" id="cLastName" class="form-control " name="c_last_name" value="<?php echo $row['c_last_name']; ?>">
              <label for="cLastName">Last Name</label>
            </div>
          </div>
          <div class="md-form">
          <input type="text" id="cAddress" class="form-control" name="c_address" value="<?php echo $row['c_address']; ?>">
          <label for="cAddress">Address</label>
          </div>
          <div class="form-row ">
            <div class="md-form col-md-4">
              <input type="text" id="cCity" class="form-control" name="c_city" value="<?php echo $row['c_city']; ?>">
              <label for="cCity">City</label>
            </div>
            <div class="md-form col-md-4">
              <input type="text" id="cState" class="form-control" name="c_state" value="<?php echo $row['c_state']; ?>">
              <label for="cState">State</label>
            </div>
            <div class="md-form col-md-4">
              <input type="text" id="cZipCode" class="form-control" name="c_zipcode" value="<?php echo $row['c_zipcode']; ?>">
              <label for="cZipCode">Zip Code</label>
            </div>
          </div>
          <div class="row">
            <div class="md-form col-sm-6" >
              <input type="email" id="cEmail" class="form-control" name="c_email" value="<?php echo $row['c_email']; ?>">
              <label class="ml-3" for="cEmail">Email</label>
            </div>
            <div class="md-form col-sm-6">
              <input type="tel" id="cPhone" class="form-control" name="c_phone" value="<?php echo $row['c_phone']; ?>">
              <label for="cPhone">Phone Number</label>
            </div>
          </div>
        </div>
        <!-- CUSTOMER INFORMATION INPUT END -->
      </div>
   
  </div>
 <!-- SHOP AND CUSTOMER INFORMATION MAIN CONTAINER END -->

  <!-- ESTIMATE TABLE START -->
  <!-- Editable table -->
 
    <div class="card">
      <h3 class="card-header text-center font-weight-bold text-uppercase py-4" style="font-family: 'playfair-display';">Estimate Table</h3>
      <div class="card-body">
        <table class="table table-bordered table-responsive-md table-striped text-center">
          <thead>
            <tr>
              <th>Labor Type</th>
              <th>Labor Options</th>
              <th>Description</th>
              <th>Part Type</th>
              <th>Part Number</th>
              <th>Tax</th>
              <th>Hourly Rate</th>
              <th>Labour Unit</th>
              <th>Price</th>
              <th>Cost</th>
              <!--  <th>Rowup/RowDown</th> -->
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php
                
              $query = "select * from estimation_table where  estimation_id = " . $_GET['uid'];
              $estimation = $db->rawQuery($query);
              $count = 1;
              if ( $estimation ):?>
                <?php foreach ($estimation as $key => $estimate):?>
                  <tr name="line_items">
                    <td class="pt-3-half" style="width: 120px; height: 45px;"><select id="laborType" class="custom-select mr-sm-2" name="labour_type[]" onchange="costCalculation();" style="width: 120px; height: 35px;">
                        <option <?php if ( $estimate['labour_type'] == "body") echo "selected" ?> value="body" id="1" >Body</option>
                        <option <?php if ( $estimate['labour_type'] == "refinish") echo "selected" ?> value="refinish" id="2">Refinish</option>
                        <option <?php if ( $estimate['labour_type'] == "mechanical") echo "selected" ?> value="mechanical" id="3">Mechanical</option>
                        <option <?php if ( $estimate['labour_type'] == "frame") echo "selected" ?> value="frame" id="4">Frame</option>
                        <option <?php if ( $estimate['labour_type'] == "material") echo "selected" ?> value="material" id="5">Material</option>
                        <option <?php if ( $estimate['labour_type'] == "glass") echo "selected" ?> value="glass" id="6">Glass</option>
                        <option <?php if ( $row['labour_type'] == "carbon-fiber") echo "selected" ?> value="carbon-fiber" id="7">Carbon Fiber</option>
                        <option <?php if ( $row['labour_type'] == "fleet") echo "selected" ?> value="fleet" id="8">Fleet</option>
                      </select>
                    </td>
                    <!-- LABOR TYPE SELECTION END -->
                    <!-- LABOR OPTIONS SELECTION START -->
                    <td class="pt-3-half" style="width: 140px; height: 45px;"><select class="custom-select mr-sm-2" id="laborOptionsDropdown" name="labor_option[]" style="width: 140px; height: 35px;">
                        <option <?php if ( $estimate['labour_type'] == "remove-replace") echo "selected" ?> value="remove-replace">Remove/Replace</option>
                        <option <?php if ( $estimate['labour_type'] == "repair") echo "selected" ?> value="repair">Repair</option>
                        <option <?php if ( $estimate['labour_type'] == "remove-install") echo "selected" ?> value="remove-install">Remove/Install</option>
                        <option <?php if ( $estimate['labour_type'] == "align") echo "selected" ?> value="align">Align</option>
                        <option <?php if ( $estimate['labour_type'] == "overhaul") echo "selected" ?> value="overhaul">Overhaul</option>
                        <option <?php if ( $estimate['labour_type'] == "Access-inspect") echo "selected" ?> value="Access-inspect">Access/Inspect</option>
                        <option <?php if ( $estimate['labour_type'] == "check-adjust") echo "selected" ?> value="check-adjust">Check/Adjust</option>
                        <option <?php if ( $estimate['labour_type'] == "paintless-repair") echo "selected" ?> value="paintless-repair">Paintless Repair</option>
                        <option <?php if ( $estimate['labour_type'] == "blend") echo "selected" ?> value="blend">blend</option>
                      </select>
                    </td>
                    <!-- LABOR OPTIONS END -->
                    <!-- DESCRIPTION NOTES START -->
                    <td class="pt-3-half" style="width: 305px; height: 45px;"><input type="text" id="partDescription" style="width:300px; height: 35px;" name="description[]" maxlength="55" value="<?php echo $estimate['description']; ?>" ></td>
                    <!-- DESCRIPTION NOTES END -->
                    <!-- PART TYPE SELECTION START -->
                    <td class="pt-3-half" style="width: 140px; height: 45px;"><select class="custom-select mr-sm-2" id="partType" name="part_type[]" style="width: 140px; height: 35px;">
                        <option <?php if ( $estimate['labour_type'] == "existing") echo "selected" ?>  value="existing">Existing</option>
                        <option <?php if ( $estimate['labour_type'] == "new") echo "selected" ?> value="new">New</option>
                        <option <?php if ( $estimate['labour_type'] == "aftermarket-new") echo "selected" ?> value="aftermarket-new">Aftermarket(New)</option>
                        <option <?php if ( $estimate['labour_type'] == "remanufactured") echo "selected" ?> value="remanufactured">Remanufactured</option>
                        <option <?php if ( $estimate['labour_type'] == "recycled-part") echo "selected" ?> value="recycled-part">Qual Recycled</option>
                        <option <?php if ( $estimate['labour_type'] == "sublet") echo "selected" ?> value="sublet">Sublet</option>
                        <option <?php if ( $estimate['labour_type'] == "rechromed") echo "selected" ?> value="rechromed">Rechromed</option>
                        <option <?php if ( $estimate['labour_type'] == "oe-surplus") echo "selected" ?> value="oe-surplus">OE Surplus</option>
                        <option <?php if ( $estimate['labour_type'] == "recored") echo "selected" ?> value="recored">Recored</option>
                      </select>
                    </td>
                    <!-- PART TYPE SELECTION END -->
                    <!-- PART NUMBER INPUT START -->
                    <td class="pt-3-half" style="width: 95px; height: 45px;"><input type="text" id="partNumber" style="width:90px; height: 35px;" name="part_number[]" maxlength="25" value="<?php echo $estimate['part_number']; ?>"></td>
                    <!-- PART NUMBER INPUT END -->
                    <!-- TAX CHECKBOX START -->
                    <td class="pt-3-half" style="width: 55px; height: 45px;">
                      <input <?php if ( $estimate['tax'] == 1) echo "selected" ?> type="checkbox" value="" id="tax" name="tax[]" style="height: 35px;" onchange="costCalculation();">
                    </td>
                    <!-- TAX CHECKBOX END -->
                    <td class="pt-3-half" style="width: 80px; height: 45px;"><input class="text-center" type="text" name="hourly_rate[]" value="<?php echo $estimate['hourly_rate']; ?>" style="width:50px; height: 35px;" onchange="costCalculation();" style="width:50px; height: 35px;"></td>
                    <td class="pt-3-half" style="width: 80px; height: 45px;"><input class="text-center" type="text" name="labour_unit[]" value="<?php echo $estimate['labour_unit']?>" style="width:50px; height: 35px;" onchange="costCalculation();" style="width:50px; height: 35px;" value="<?php echo $estimate['unit']; ?>"></td>
                    <td class="pt-3-half" style="width: 80px; height: 45px;"><input class="text-center" type="text" id="price" name="price[]" value="<?php echo $estimate['price']; ?>" style="width:50px; height: 35px;"  onchange="costCalculation();" style="width:50px; height: 35px;"></td>
                    <td class="pt-3-half" style="width: 80px; height: 45px;"><input class="text-center" type="text" name="cost1[]" id="cost1" style="width:80px; height: 35px;" value="<?php echo $estimate['cost']; ?>" jAutoCalc="{hourlyRate} * {laborUnit}"  onchange="costCalculation();"></td>
                    <td style="width: 55px; height: 45px;">
                      <button type="button" class="btn btn-circle my-0" name="remove" style="color:white; background-color:#B30000; "><i class="fa fa-minus"></i></button>
                      </td>
                  </tr>
                <?php endforeach?>
               <tr>
                <td colspan="10">&nbsp;</td>
                <td><button name="add" id="addRowBtn" class="btn btn-circle" style="background-color:#236B8E;"><i class="fa fa-plus"></i></button></td>
              </tr>
              <?php endif;?>
      </table>
         
        
        <table style="float:right;">
          <tr>
            <td colspan="">&nbsp;</td>
            <td>Subtotal</td>
            <td>&nbsp;</td>
            <td><input type="text"  value="<?php echo $row['sub_total']; ?>" name="sub_total" class="form-control" id="sub_total" value="" jAutoCalc="SUM({cost})" onchange="costCalculation();"></td>
          </tr>



          <tr>
                  <td colspan="" >&nbsp;</td>
                  <td class=""> 
                    <div class="row">
                        <p class="mt-auto mb-auto">Tax: % </p>
                        <input type="text" name="taxRate" id="taxRate" class="form-control mr-4" value="<?php echo $row['tax_percent']; ?>" style="width:70px;" onchange="costCalculation();">
                    </div>
                  </td>
                  <td>&nbsp;</td>
                  <td><input type="text" name="tax_total" id="tax_total" class="form-control" value="<?php echo $row['total_tax']; ?>" onchange="costCalculation();"></td>
                </tr>





         
          <tr>
            <td colspan="">&nbsp;</td>
            <td>Total</td>
            <td>&nbsp;</td>
            <td><input type="text" name="grand_total" id="grand_total"  class="form-control" value="<?php echo $row['total']; ?>" onchange="costCalculation();"></td>
          </tr>
        </table>
      </div>
    </div>
    <div class="row justify-content-center">
        <input type="submit" name="update" value="update" class="btn btn-success text-white">
    </div>
   </form>
</div>
</i>
</button>
</td>
</tr>
</tbody>
</table>
</div>
</div>
<!-- <div class="row justify-content-center">
    <input type="submit" name="submit" class="btn btn-success">
    </div> -->
</div>
</div>
</body>
</html>
</div>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="dist/jautocalc.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.11/js/mdb.min.js"></script>  </body>
<script type="text/javascript">
        <!--
            $(document).ready(function() {

                function autoCalcSetup() {
                    $('form[name=cart]').jAutoCalc('destroy');
                    $('form[name=cart] tr[name=line_items]').jAutoCalc({keyEventsFire: true, decimalPlaces: 2, emptyAsZero: true});
                    $('form[name=cart]').jAutoCalc({decimalPlaces: 2});
                }
                autoCalcSetup();


                $('button[name=remove]').click(function(e) {
                    e.preventDefault();

                    var form = $(this).parents('form')
                    $(this).parents('tr').remove();
                    autoCalcSetup();

                });

                $('button[name=add]').click(function(e) {
                    e.preventDefault();

                    var $table = $(this).parents('table');
                    var $bottom = $table.find('tr[name=line_items]').last();
                    var $new = $bottom.clone(true);

                    $new.jAutoCalc('destroy');
                    $new.insertAfter($bottom);
                    $new.find('input[type=text]').val('');
                    autoCalcSetup();

                });

            });
        //-->
        </script>
<script type="text/javascript">
 
  function costCalculation(){
    var tax = $("input:checkbox:checked").map(function(){
      return $(this).val();
    }).get();
    console.log(tax);
    var price = $("input[name='price[]']").map(function(){
      return $(this).val();
    }).get();
    

    var hourly_rate = $("input[name='hourly_rate[]']").map(function(){
      return $(this).val();
    }).get();
    
    var labour_unit = $("input[name='labour_unit[]']").map(function(){
      return $(this).val();
    }).get();

    var len = labour_unit.length;
    var sum = 0;
    var cost = 0;
    var costArray = new Array();
    var sub_total = 0;
    var totalTax = 0;
    for(var i=0; i < len; i++){
      //price[i] != "" &&
      if (  hourly_rate[i] != "" && labour_unit[i] != ""){
        if ( price[i] == ""){
          price[i] = 0;
        }
        cost =  parseFloat(hourly_rate[i]) * parseFloat( labour_unit[i])  + parseFloat(price[i]);
        costArray[i] = cost;
        sub_total = sub_total + cost;
        var taxRate = parseFloat(document.getElementById("taxRate").value);
        taxRate = taxRate/100;
        if ( $('#tax').is(":checked")){
          totalTax = price[i] * taxRate;
        }
        var laborType = document.getElementById("laborType").value;
       
        if( $('#tax').is(":checked") && laborType == "material"){
          totalTax = cost * taxRate;
        }
      }
    }
    
    document.getElementById("tax_total").value= totalTax;
    $("input[name='cost1[]']").map(function(i = 0){
      $(this).val( costArray[i]);
      i++;
    }).get();
    $("#tax_total").val(totalTax.toFixed(2));
    $("#sub_total").val(sub_total.toFixed(2));
    total = totalTax + sub_total;
    $("#grand_total").val(total.toFixed(2));
  }

  function myFunction() {
  window.print();
}
</script>
<!-- TAX CALCULATION FUNCTION END -->
</body>
</html>
