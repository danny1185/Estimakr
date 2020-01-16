<?php 
  session_start();
  include('includes/variables.php');
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
          <li class="nav-item">
                <a class="nav-link" href="shopMessageBox.php" id="d_messageNavBtn" role="button" style="color: #324A5F;">Inbox<i class="fa fa-envelope ml-2"></i></a>
              </li> 
      
      
          
          <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['firstName']; ?></a>
                  <div class="dropdown-menu" id="mainNavDropDown" aria-labelledby="navbarDropdown"> 
                    <a class="dropdown-item" id="dropdownLink" href="estimateForm.php">New Estimate</a> 
                    <a class="dropdown-item" id="dropdownLink" href="estimateStatus.php">Saved Estimates</a> 
                    <a class="dropdown-item" id="dropdownLink" href="update_profile.php">Settings</a> 
                    <a class="dropdown-item" id="dropdownLink" href="ticket.php">Help</a>
                    <a class="dropdown-item" id="dropdownLink" href="shopProfile.php">Profile</a>  
                    <a class="dropdown-item" id="dropdownLink" href="shopsAcceptedEstimates.php">Accepted Estimates</a>
       
                  </div>
                </li>
                <li class="dropdown">
                <a href="#" class="dropdown-toggle waves-classic" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"></span> <i class="fa fa-bell mt-2" style="font-size:18px; color: #0c4153;"></i></a>
                <ul class="dropdown-menu"></ul>
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
    <li class="breadcrumb-item active text-white ml-4" >Estimate Form</li>
  </ol>
</nav>
<!-- PAGE HEADER END -->

        <div>
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

  <form class="validate" id="estimate_form" name="cart" >
    <div class="bg-white m-5 pl-5 pr-5 jumbotron row">
      
    <!-- BUSINESS INFORMATION FORM INPUT START -->
      <!-- COMPANY LOGO START -->
  <div class="" id="companyLogo">
      <?php if ( isset($_SESSION['logo'])):?>
        <img width="250" height="250" src="<?php echo BASE_URL?>images/logo/<?php if ( isset($_SESSION['logo'])){ echo  $_SESSION['logo']; }?>" >
      <?php endif;?>
  </div>
<!-- COMPANY LOGO END -->

      <div class="col-md-3">
          <h5 class="text-center py-4">Business Information</h5>
          <hr style="box-shadow: 0 0 1px black;">
          <div class="md-form">
          <input type="text" class="form-control" id="bName" name="b_name">
          <label for="bName">Business Name</label> 
        </div>
          <div class="form-row">
            <div class="md-form col-md-6">
              <input type="text" class="form-control" id="bFirstName" name="b_first_name">
              <label for="bFirstName">First Name</label>
            </div>
            <div class="md-form col-md-6">
              <input type="text" class="form-control" id="bLastName" name='b_last_name'>
              <label for="bLastName">Last Name</label>
            </div>
          </div>
          <div class="md-form">
          <input type="text" class="form-control" id="bAddress" name="b_address">
          <label for="bAddress">Street Address</label>
          </div>
          <div class="form-row ">
            <div class="md-form col-md-4">
              <input type="text" class="form-control" id="bCity" name="b_city">
              <label for="bCity">City</label>
            </div>
            <div class="md-form col-md-4">
              <input type="text" class="form-control" id="bState" name="b_state">
              <label for="bState">State</label>
            </div>
            <div class="md-form col-md-4">
              <input type="text" class="form-control" id="bZipCode" name="b_zipcode">
              <label for="bZipCode">Zip Code</label>
            </div>
          </div>
          <div class="form-row">
            <div class=" md-form col-md-6" >
              <input type="email" class="form-control" id="bEmail" name="b_email">
              <label for="bEmail">Email</label>
            </div>
            <div class="md-form col-md-6">
              <input type="tel" class="form-control" id="bPhone" name="b_phone">
              <label for="bPhone">Phone Number</label>
            </div>
          </div>
        </div>
        <!-- BUSINESS INFORMATION FORM INPUT END -->

        <!-- JOB INFORMATION INPUT START -->
        <div class="col-2 container" >
          <h5 class="text-center py-4">Job Information</h5>
          <hr style="box-shadow: 0 0 1px black; width: 70%;">
          
            <div class="form-row justify-content-center">
              <div class="md-form">
                <input type="text" class="form-control" id="jYear" name="year">
                <label for="jYear">Year</label>
              </div>
              <div class="md-form">
                <input type="text" class="form-control"  id="jMake" name="make">
                <label for="jMake">Make</label>
              </div>
              <div class="md-form">
                <input type="text" class="form-control " id="jModel" name="model">
                <label for="jModel">Model</label>
              </div>  
            <div class="md-form">
              <input type="text" class="form-control " id="jStatus" name="status">
              <label for="jStatus">Status</label>
            </div>
          </div>
          
        </div>
        <!-- JOB INFORMATION INPUT END -->

        <!-- CUSTOMER INFORMATION INPUT START -->
        <div class="col-3" >
          <h5 class="text-center py-4 d-block">Customer Information</h5>
          <hr style="box-shadow: 0 0 1px black;">
          <div class="md-form">
            <input type="text" class="form-control" id="cName" name="c_name">
            <label for="cName">Business Name</label> 
          </div>
          <div class="form-row">
            <div class="md-form col-md-6">
              <input type="text" class="form-control" id="cFirstName" name="c_first_name">
              <label for="cFirstName">First Name</label>
            </div>
            <div class="md-form col-md-6">
              <input type="text" class="form-control" id="cLastName" name='c_last_name'>
              <label for="cLastName">Last Name</label>
            </div>
          </div>
          <div class="md-form">
          <input type="text" class="form-control" id="cAddress" name="c_address">
          <label for="cAddress">Street Address</label>
          </div>
          <div class="form-row ">
            <div class="md-form col-md-4">
              <input type="text" class="form-control" id="cCity" name="c_city">
              <label for="cCity">City</label>
            </div>
            <div class="md-form col-md-4">
              <input type="text" class="form-control" id="cState" name="c_state">
              <label for="cState">State</label>
            </div>
            <div class="md-form col-md-4">
              <input type="text" class="form-control" id="cZipCode" name="c_zipcode">
              <label for="cZipCode">Zip Code</label>
            </div>
          </div>
          <div class="form-row">
            <div class=" md-form col-md-6" >
              <input type="email" class="form-control" id="cEmail" name="c_email">
              <label for="cEmail">Email</label>
            </div>
            <div class="md-form col-md-6">
              <input type="tel" class="form-control" id="cPhone" name="c_phone">
              <label for="cPhone">Phone Number</label>
            </div>
          </div>
        </div>
       
        <!-- CUSTOMER INFORMATION INPUT END -->
      </div>
          
  </div>
  <!--BUSINESS AND CUSTOMER INFORMATION END-->
  <!-- ESTIMATE TABLE START -->
  <!-- Editable table -->
    
    <div class="card">
      <h3 class="card-header text-center font-weight-bold text-uppercase py-4" style="font-family: 'playfair-display'; color: #0C6EAF;">Estimate Table</h3>
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

        
      </div>
    </div>



    <div class="row justify-content-center">
        <input type="hidden" name="submit" class="submit" value="save">
        <input type="button" name="submit" value="save" class="btn btn-success estimate-btn" style="color: white;" id="saveEstimateBtn">
        <input type="button" name="preview" value="Preview" class="btn btn-success preview-btn" style="color: white;" id="saveEstimateBtn">
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

<!-- Modal -->


<div class="modal newmodal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h2>Download Pdf</h2>
        <a href="" class="pdfmodalfile">Download</a>
        <br>
        <span>OR</span>
        <h2>Send Email</h2>
        <div id="resultstatus"></div>
        <form class="emailsendform validate" id="emailsendform">
            <input type="email" name="email" class="email" placeholder="Enter Email address">
            <input type="hidden" name="sendemail" value="sendemail" class="sendemail form-control">
            <input type="hidden" name="pdffile" value="" class="pdffile">
            <input type="button" name="submit" class="sendemail-btn btn btn-primary text-white" value="submit" >
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>




<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.11/js/mdb.min.js"></script>  </body>

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
<!-- TAX CALCULATION FUNCTION START -->
<!-- FORMS TO BE SWITCHED ON RADIO CLICK START ------------------------------------->
 
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
      //if (  hourly_rate[i] != "" && labour_unit[i] != ""){
        if ( price[i] == ""){
          price[i] = 0;
        }
        if (  hourly_rate[i] == ""){
          hourly_rate[i] = 0;
        }
        if(labour_unit[i] == ""){
          labour_unit[i] = 0;
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
      //}
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
