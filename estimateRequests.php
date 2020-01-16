<?php 
  session_start();
  include('includes/variables.php');
  require 'database_connection/connection.php';
  if(!isset($_SESSION['email'])){
	header("Location:signIn.php");
 }
 $ig = 0;
 $vehicle_id = $_GET['vehicle_id'] ;  
 $vehicle = $db->rawQueryOne('select * from vehicle where vehicle_id = "'.$vehicle_id.'"'); 
 $vehcileimage = $db->rawQuery('select * from vehicle_image where vehicle_id = "'.$vehicle['vehicle_id'].'"');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Estimate Status</title>
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
<title>Estimate Form</title>

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
  ul li {
    padding: 0px;
}
   ul li a {
      color: #fbffff ;
       text-decoration: none;
   }
    


.nav-link {
    color: #324a5f;
}
.navbar-nav {
	margin-right: 60px;
}
#brandLink {
    font-family: 'lora', serif;
    margin-left:50px;
    color: #324a5f;
	font-size: 24px;
}
.dropdown-menu {
    background-color: #324a5f;
    opacity: 0.9;
    box-shadow: 0 0 10px darkslategray;
}
#dropdownLink {
    color: white;
}
#dropdownLink:hover {
    color: #324a5f;
    background-color: #d4d4d6;
}
/* TABS END */
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
#vehicleImages {
    height: 300px;
    image-orientation: from-image;
}
/* Footer color for sake of consistency with Navbar */
.page-footer {
    background-color: #1C2331; }
    

        </style>
</head>
<body>





<div class="fluid">
	
  <!-- NAVBAR CONTAINER START -->
 <!-- <nav class="navbar navbar-expand-lg"> <a class="navbar-brand" id="brandLink" href="#" >Estimakr</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav col-md-3 ml-md-auto" style="margin-right:150px;">
      </ul>
      <form class="form-inline my-2 my-lg-0" style="margin-right:100px;">

        <ul class="navbar-nav mr-auto" >
		<li class="nav-item"> <a class="nav-link" href="VehicleEstimate.php" tabindex="-1" aria-disabled="true"><i class="fa fa-clipboard mr-2"></i>Estimate Requests</a> </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['firstName']; ?></a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown"> 
              <a class="dropdown-item" id="dropdownLink" href="estimateForm.php">New Estimate</a> 
              <a class="dropdown-item" id="dropdownLink" href="estimateStatus.php">Saved Estimates</a> 
              <a class="dropdown-item" id="dropdownLink" href="update_profile.php">Settings</a> 
              <a class="dropdown-item" id="dropdownLink" href="ticket.php">Help</a>
              <a class="dropdown-item" id="dropdownLink" href="shopProfile.php">Profile</a>  
 
            </div>
          </li>
          <li class="nav-item"> <a class="nav-link" href="<?php echo BASE_URL?>controllers/logout.php" tabindex="-1" aria-disabled="true">LogOut</a> </li>
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
<!-- PAGE HEADER START -->
<nav class="navbar z-depth-2 mb-5" style="background-color: #324a5f; color: white; height: 55px; font-size: 26px; font-family: playfair;">

<ol class="breadcrumb mr-auto" style="font-size: 18px;">
    <li class="breadcrumb-item active text-white" >Estimate Requests</li>
  </ol>
</nav>
<!-- PAGE HEADER END -->


    <div class="container ml-auto mr-auto mb-5 z-depth-2 p-5 col-xl-7 bg-white row" >


 <!-- Card image -->
  <div id="demo" class="carousel slide col-xl-6" data-ride="carousel">



  <!-- The slideshow -->
  <div class="carousel-inner">
  	
    <?php 
    	foreach($vehcileimage as $image){ 
    	$imgelist = $ig++;
    ?>
    <div class="carousel-item <?php if($imgelist == 0){ echo 'active' ;} ?>">
     <img class="z-depth-2" id="vehicleImages" src="<?php echo BASE_URL ; ?>photo_gallery/<?php echo $image['image'] ; ?>" alt="Card image cap">
    </div>
    <?php } ?>
    
  </div>

  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>

</div>
  <!-- Card content -->
  <!-- CAR INFORMATION -->
	


    <div  class="text-left ml-5">
        <h2><?php echo $vehicle['year'].' '.$vehicle['make'].' '.$vehicle['model'] ; ?></h2>
        <p>Posted 2 days ago</p>
        <hr>
        <p><?php echo $vehicle['description'] ; ?></p>
        <p>VIN # <?php echo $vehicle['vin_number'] ; ?></p>
        
    </div>

    </div>


<!-- OPTIONAL TABS FOR ESTIMATE FORMS START -->
<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <!--<li class="nav-item ml-auto">
    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Simple Estimate Form</a>
  </li>-->
  <li class="nav-item mr-auto active">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Full Estimate Form</a>
  </li>
</ul>
<!-- OPTIONAL TABS FOR ESTIMATE FORMS END -->

<div class="tab-content" id="pills-tabContent">
      <!-- SIMPLE ESTIMATE FORM START --------------------------------------------------------------------------------------------------------------->
  <!--<div class="tab-pane fade container  " id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
      
  <div class="card ml-auto mr-auto">
  <h3 class="card-header py-4 bg-white" style="font-family: 'playfair-display'; color: #0C6EAF;">Add an Item Charge</h3>
  <div class="card-body ">
  <form class="halfform">
  <div class="samllformresult"></div>
  <table class="table table-sm table-hover text-center table-borderless">
  <thead>
            <tr>
              <th>Price</th>  
              <th>Description</th>
              <th>Tax</th>
              <th>Cost</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
          <tr name="line_items">
            <td class="md-form" style="width: 10%;">
                <input class="text-center form-control" contenteditable="true" type="text" name="cost1[]" id="halfcost1" value="" style="width:80px; height: 35px;" jAutoCalc="{hourlyRate} * {laborUnit}" onchange="costCalculation2();">
                <label></label>
                <input class="pt-3-half" contenteditable="true" type="hidden" name="cost" id="cost" value="" style="width:60px;" jAutoCalc="{price} + {cost1}" >
            </td>
                
              
            <td class="md-form" style="width: 70%;">
                <input class="form-control" contenteditable="true" type="text" placeholder="Description (i.e. side door repair and paint)" id="partDescription" style="width: 95%; height: 35px;" name="description[]" maxlength="55">
                
            </td>
          <td class="custom-control custom-checkbox mt-4">
          <input class="custom-control-input" contenteditable="true" type="checkbox"  value="" id="halformtaxtax" name="tax[]" style="height: 35px;" onchange="costCalculation2();">
          <label class="custom-control-label" for="tax">Tax?</label>
        </td>
          <td class="md-form" style="width: 80px;">
          <input class="text-center form-control" contenteditable="true" type="text" id="price" onchange="costCalculation()" name="price[]" value="0" style="width:50px; height: 35px;">
            <label></label>
        </td>
              
              <td style="width: 55px;">
              
                  <button type="button" class="btn btn-circle mt-4" name="remove" style="color:white; background-color:#B30000; "><i class="fa fa-minus"></i></button>              
              </td>
          </tr>
          <tr>
              <td style="visibility: hidden">&nbsp;</td>
              <td style="visibility: hidden">&nbsp;</td>
              <td style="visibility: hidden">&nbsp;</td>
              <td style="visibility: hidden">&nbsp;</td>

              <td><button type="button" name="add" id="addRowBtn" class="btn btn-circle" style="background-color:#236B8E;"><i class="fa fa-plus"></i></button></td>
            </tr>
          </tbody>
  </table>

	

	<div class="row">
        
        <div class="form-group shadow-textarea col-md-8 mr-auto">
          <textarea class="form-control z-depth-1" id="exampleFormControlTextarea6" rows="5" placeholder="Notes:"></textarea>
        </div>
        
       
          <table class=" mr-3">
            <tr >
              <td colspan="">&nbsp;</td>
              <td >Subtotal</td>
              <td>&nbsp;</td>
              <td class="md-form">
                  <input type="text" name="sub_total" class="form-control" id="halformsub_total" value="" jAutoCalc="SUM({cost})" onchange="costCalculation2();">
                </td>
            </tr>
            <tr>
              <td colspan="" >&nbsp;</td>
              <td class="md-form"> 
                <div class="row">
                    <p class="mt-auto mb-auto mr-2">Tax: % </p>
                    <input type="text" name="taxRate" id="halformtaxRate" class="form-control mr-4" value="0" style="width:40px;" onchange="costCalculation2();">
                </div>
              </td>
              <td>&nbsp;</td>
              <td class="md-form">
                  <input type="text" name="tax_total" id="halfformtax_total" class="form-control" value="0" onchange="costCalculation2();">
                </td>
            </tr>
            <tr>
              <td colspan="">&nbsp;</td>
              <td>Total</td>
              <td>&nbsp;</td>
              <td class="md-form">
                  <input type="text" name="grand_total" id="halformgrand_total" class="form-control" value="" jAutoCalc="{sub_total} + {tax_total}" onchange="costCalculation2();">
                </td>
            </tr>
        </table>  
      
    
  </div>																																								
	    
	<div class="row justify-content-center">
	  		<input type="hidden" name="submit" value="halfform"></input>
	  		<input type="hidden" name="vehicle_id" value="<?php echo $vehicle_id ; ?>"></input>
	  		<input type="hidden" name="vehicleuser_id" value="<?php echo $vehicle['user_id'] ; ?>"></input>
	  		<input type="hidden" name="customer_id" value="<?php echo $_SESSION['user_id'] ; ?>"></input>
	        <input type="button" name="" class="btn btn-primary savehalfform" value="Save" >
	  </div>    
  </form>	
  </div>

  </div>


  </div>-->
    <!-- SIMPLE ESTIMATE FORM END --------------------------------------------------------------------------------------------------------------->

  <!-- FULL ESTIMATE FORM START --------------------------------------------------------------------------------------------------------------->
  <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"><div>
          <?php if(isset($_SESSION['success']) || !empty($_SESSION['success'])){ ?>
              <div class="alert alert-success" id="error_message">	
                  <button type="button" class="close" data-dismiss="alert">&times;</button>				
                  <?php echo $_SESSION['success'];
                    unset($_SESSION['success']); 
                  
                  ?>							
              </div>
          <?php  ?>
          <?php }else if( isset($_SESSION['error']) || !empty($_SESSION['error'])){ ?>
              <div class="alert alert-danger" id="success_messsage">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>				
                  <?php echo print_r($_SESSION['error']); unset($_SESSION['error']);  ?>							
              </div>
          <?php } ?>
    </div>

  <form class="validate container-fluid" id="estimate_form" name="cart" >
      
    
  <!-- ESTIMATE TABLE START -->
  <!-- Editable table -->
    
    <div class="card">
      <h3 class="card-header text-center font-weight-bold text-uppercase py-4" style="font-family: 'playfair-display'; color: #0C6EAF;">Estimate Table</h3>
      <div class="card-body">
      <div id="resultstatus"></div>
        <table class="table table-striped text-center">
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
              <th> Add/Remove Row</th>
            </tr>
          </thead>
          <tbody>
            <tr name="line_items">
             
              <!-- LABOR TYPE SELECTION START -->
              <td class="pt-3-half" style="width: 120px; height: 45px;"><select id="laborType" class="custom-select" name="labour_type[]" onchange="costCalculation();" style="width: 120px; height: 35px;">
                  <option value="" id="">Choose...</option>
                  <option value="body" id="1" >Body</option>
                  <option value="refinish" id="2">Refinish</option>
                  <option value="mechanical" id="3">Mechanical</option>
                  <option value="frame" id="4">Frame</option>
                  <option value="material" id="5">Material</option>
                  <option value="glass" id="6">Glass</option>
                  <option value="carbon-fiber" id="7">Carbon Fiber</option>
                  <option value="fleet" id="8">Fleet</option>
                </select>
              </td>
              <!-- LABOR TYPE SELECTION END -->
              <!-- LABOR OPTIONS SELECTION START -->
              <td class="pt-3-half" style="width: 140px; height: 45px;"><select class="custom-select mr-sm-2" id="laborOptionsDropdown" name="labour_option[]" style="width: 140px; height: 35px;">
                  <option value="">Choose...</option>
                  <option value="remove-replace">Remove/Replace</option>
                  <option value="repair">Repair</option>
                  <option value="remove-install">Remove/Install</option>
                  <option value="align">Align</option>
                  <option value="overhaul">Overhaul</option>
                  <option value="Access-inspect">Access/Inspect</option>
                  <option value="check-adjust">Check/Adjust</option>
                  <option value="paintless-repair">Paintless Repair</option>
                  <option value="blend">blend</option>
                </select>
              </td>
              <!-- LABOR OPTIONS END -->
              <!-- DESCRIPTION NOTES START -->
              <td class="pt-3-half" style="width: 305px; height: 45px;"><input contenteditable="true" type="text" id="partDescription" style="width:300px; height: 35px;" name="description[]" maxlength="55"></td>
              <!-- DESCRIPTION NOTES END -->
              <!-- PART TYPE SELECTION START -->
              <td class="pt-3-half" style="width: 140px; height: 45px;"><select class="custom-select mr-sm-2" id="partType" name="part_type[]" style="width: 140px; height: 35px;" >
                  <option value="">Choose...</option>
                  <option value="existing">Existing</option>
                  <option value="new">New</option>
                  <option value="aftermarket-new">Aftermarket(New)</option>
                  <option value="remanufactured">Remanufactured</option>
                  <option value="recycled-part">Qual Recycled</option>
                  <option value="sublet">Sublet</option>
                  <option value="rechromed">Rechromed</option>
                  <option value="oe-surplus">OE Surplus</option>
                  <option value="recored">Recored</option>
                </select>
              </td>
              <!-- PART TYPE SELECTION END -->
              <!-- PART NUMBER INPUT START -->
              <td class="pt-3-half" style="width: 95px; height: 45px;"><input ntenteditable="true" type="text" id="partNumber" style="width:90px; height: 35px;" name="part_number[]" maxlength="25" ></td>
              <!-- PART NUMBER INPUT END -->
              <!-- TAX CHECKBOX START -->
              <td class="pt-3-half" style="width: 55px; height: 45px;"><input contenteditable="true" type="checkbox"  value="" id="tax" name="tax[]" style="height: 35px;" onchange="costCalculation();">
              </td>
              <!-- TAX CHECKBOX END -->
              <td class="pt-3-half" style="width: 80px; height: 45px;"><input class="text-center" contenteditable="true"id="hourly_rate" type="text" onchange="costCalculation()" name="hourly_rate[]" value="0" style="width:50px; height: 35px;"></td>
              <td class="pt-3-half" style="width: 80px; height: 45px;"><input class="text-center" contenteditable="true" type="text" id="labour_unit" onchange="costCalculation()" name="labour_unit[]" value="0" style="width:50px; height: 35px;"></td>
              <td class="pt-3-half" style="width: 80px; height: 45px;"><input class="text-center" contenteditable="true" type="text" id="price" onchange="costCalculation()" name="price[]" value="0" style="width:50px; height: 35px;"></td>
              <td class="pt-3-half" style="width: 80px; height: 45px;"><input class="text-center" contenteditable="true" type="text" name="cost1[]" id="cost1" value="" style="width:80px; height: 35px;" jAutoCalc="{hourlyRate} * {laborUnit}"></td>
              <input class="pt-3-half" contenteditable="true" type="hidden" name="cost" id="cost" value="" style="width:60px;" jAutoCalc="{price} + {cost1}" ></td>
              <td style="width: 55px; height: 45px;">
              
                  <button type="button" class="btn btn-circle my-0" name="remove" style="color:white; background-color:#B30000; "><i class="fa fa-minus"></i></button>
               
              </td>
            </tr>
            <tr>
              <td colspan="10">&nbsp;</td>
              <td><button type="button" name="add" id="addRowBtn" class="btn btn-circle" style="background-color:#236B8E;"><i class="fa fa-plus"></i></button></td>
            </tr>
          </tbody>
			</table>
         
        <!-- TOTAL TABLE START -->

        <div class="row">
        
            <div class="form-group shadow-textarea col-md-8 mr-auto">
              <textarea class="form-control z-depth-1" id="exampleFormControlTextarea6" rows="5" placeholder="Notes:"></textarea>
            </div>
            
           
              <table class=" mr-3">
                <tr >
                  <td colspan="">&nbsp;</td>
                  <td >Subtotal</td>
                  <td>&nbsp;</td>
                  <td><input type="text" name="sub_total" class="form-control" id="sub_total" value="" jAutoCalc="SUM({cost})" onchange="costCalculation();"></td>
                </tr>
                <tr>
                  <td colspan="" >&nbsp;</td>
                  <td class=""> 
                    <div class="row">
                        <p class="mt-auto mb-auto">Tax: % </p>
                        <input type="text" name="taxRate" id="taxRate" class="form-control mr-4" value="0" style="width:70px;" onchange="costCalculation();">
                    </div>
                  </td>
                  <td>&nbsp;</td>
                  <td><input type="text" name="tax_total" id="tax_total" class="form-control" value="0" onchange="costCalculation();"></td>
                </tr>
                <tr>
                  <td colspan="">&nbsp;</td>
                  <td>Total</td>
                  <td>&nbsp;</td>
                  <td><input type="text" name="grand_total" id="grand_total" class="form-control" value="" jAutoCalc="{sub_total} + {tax_total}" onchange="costCalculation();"></td>
                </tr>
            </table>  
          
       
      </div>
        <!-- TOTAL TABLE END -->
	  <div class="row justify-content-center">
	  		<input type="hidden" name="submit" value="fullform"></input>
	  		<input type="hidden" name="vehicle_id" value="<?php echo $vehicle_id ; ?>"></input>
	  		<input type="hidden" name="vehicleuser_id" value="<?php echo $vehicle['user_id'] ; ?>"></input>
	  		<input type="hidden" name="customer_id" value="<?php echo $_SESSION['user_id'] ; ?>"></input>
	        <input type="button" name="" class="btn btn-primary savefullform" value="Save" style="display:none">
	  </div>
        
    </div>
</div>
          </form>
</div>
</div>
  <!-- FULL ESTIMATE FORM START --------------------------------------------------------------------------------------------------------------->


<!-- Footer -->
<footer class="page-footer font-small" style="overflow: hidden; margin-top: 100px;">
<!-- Copyright -->
    <div class="footer-copyright text-center py-3" style="background-color: #324A5F;">© 2018 Copyright:
        <a href="www.estimakr.com"> Estimakr</a>
    </div>
<!-- Copyright -->
</footer>
      <!-- Footer -->






<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.11/js/mdb.min.js"></script>

<script src="<?php echo BASE_URL ; ?>js/jquery-3.4.1.min.js"></script>

 <script type="text/javascript" src="dist/jautocalc.js"></script>
<script type="text/javascript">
      var base_url = '<?php echo BASE_URL ;?>';
  </script>
  <script type="text/javascript" src="js/logger.js"></script>
  <script type="text/javascript">
      
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
        </script>
</body>
</html>
</div>
 
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
    if(total > 0)
    {
		$('.savefullform').show();
	}
    $("#grand_total").val(total.toFixed(2));
  }
  
  function costCalculation2(){
    var tax = $("input:checkbox:checked").map(function(){
      return $(this).val();
    }).get();
    console.log(tax);
    var price = $("input[name='price[]']").map(function(){
      return $(this).val();
    }).get();
    

    var len = price.length;
    var sum = 0;
    var cost = 0;
    var costArray = new Array();
    var sub_total = 0;
    var totalTax = 0;
    for(var i=0; i < len; i++){
      //price[i] != "" &&
      
        if ( price[i] == ""){
          price[i] = 0;
        }
        costArray[i] = cost;
        sub_total = sub_total + cost;
        var taxRate = parseFloat(document.getElementById("halformtaxRate").value);
        taxRate = taxRate/100;
        if ( $('#halformtax').is(":checked")){
          totalTax = price[i] * taxRate;
        }
       
        if( $('#tax').is(":checked") ){
          totalTax = cost * taxRate;
        }
      
    }
    
    document.getElementById("halfformtax_total").value= totalTax;
    $("input[name='cost1[]']").map(function(i = 0){
      $(this).val( costArray[i]);
      i++;
    }).get();
    $("#halfformtax_total").val(totalTax.toFixed(2));
    $("#halformsub_total").val(sub_total.toFixed(2));
    total = totalTax + sub_total;
    if(total > 0)
    {
		$('.savefullform').show();
	}
    $("#halformgrand_total").val(total.toFixed(2));
  }

  function myFunction() {
  window.print();
}
</script>
</body>
</html>