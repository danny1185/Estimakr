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
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- Bootstrap core CSS -->
<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet"> -->
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.7/css/mdb.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Lora&display=swap" rel="stylesheet">
<link rel="stylesheet" href="style.css" type="text/css">
<title>Estimate Form</title>
<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" text="text/css" href="./css/estimateForm.css">
<script type="text/javascript" src="dist/jautocalc.js"></script>
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
        </script>
        <style>
          h5 {
            font-family: 'playfair';
            font-size: 26px;
            margin-bottom: -35px;
          }
          #printBtn {
            /* margin-right: 220px; */
          }
          #businessInfoContainer {
            margin-right: 3%;
          }
          #companyLogo {
            /* border: solid 1px black; */
            text-align: left;
            margin: 3% 3% 3% 3%;
          }
          #cardHeader {
           
          }
        </style>
</head>
<body>
<div class="">
  <!-- NAVBAR CONTAINER START -->
  <nav class="navbar navbar-expand-lg" style="background-color: #0c6eaf;"> <a class="navbar-brand" id="brandLink" href="#" >Estimakr</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav col-md-3 ml-md-auto" style="margin-right:150px;">
      </ul>
      <form class="form-inline my-2 my-lg-0" style="margin-right:100px;">
      <button class="btn btn-outline-success" id="printBtn" onclick="myFunction()">Print this page</button>

        <ul class="navbar-nav mr-auto" >
          <li class="nav-item dropdown">
            <!-- ADD USERS NAME BELOW -->
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['firstName']; ?></a>
            <!-- ADD USERS NAME ABOVE -->
            <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color:#226e90;"> 
              <a class="dropdown-item" id="dropdownLink" href="estimateForm.php">New Estimate</a> 
              <a class="dropdown-item" id="dropdownLink" href="estimateStatus.php">Saved Estimates</a> 
              <a class="dropdown-item" id="dropdownLink" href="update_profile.php">Profile</a> 
              <a class="dropdown-item" id="dropdownLink" href="ticket.php">Help</a> 
            </div>
          </li>
          <!-- <li class="nav-item dropdown"> -->
            <!-- ADD USERS NAME BELOW -->
            <!-- <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Settings </a> -->
            <!-- ADD USERS NAME ABOVE -->
            <!-- <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color:#226e90;"> 
              <a class="dropdown-item" id="dropdownLink" href="ticket.php">Help</a> 
              <a class="dropdown-item" id="dropdownLink" href="update_profile.php">Profile</a> 
            </div>
          </li> -->
          
          <li class="nav-item"> <a class="nav-link" href="<?php echo BASE_URL?>controllers/logout.php" tabindex="-1" aria-disabled="true">LogOut</a> </li>
        </ul>
      </form>
    </div>
  </nav>
  <!-- NAVBAR CONTAINER END -->

 <!-- FORM PAGE SELECTION ONCLICK MENU -->
 <!-- <div class="btn-group btn-group-toggle" id="subMenuContainer" data-toggle="buttons" style="background-color: #0b567e; padding:0px;">
  
  <label class="btn form-check-label" onclick="window.location = 'profile.html';" id="subMenuBtnProfileRates">   
    <input class="form-check-input" type="radio" name="options" autocomplete="off"> 
    Profile Rates
  </label>

  <label class="btn form-check-label active" id="subMenuBtnEstimate">
    <input class="form-check-input" type="radio" name="options" autocomplete="off"> 
    Estimate
  </label>
</div> -->
<!-- FORM PAGE SELECTION ONCLICK MENU -->
  
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

  <form action="<?php echo BASE_URL?>controllers/estimation.php" method="post" name="cart" >
    <div class="bg-light ml-5 mr-5 jumbotron">
    <!-- BUSINESS INFORMATION FORM INPUT START -->
      <div class="row">

        <!-- COMPANY LOGO START -->
  <div class="" id="companyLogo">
    <?php if ( isset($_SESSION['logo'])):?>
      <img width="200" height="200" src="<?php echo BASE_URL?>images/logo/<?php if ( isset($_SESSION['logo'])){ echo  $_SESSION['logo']; }?>" >
    <?php endif;?>
  </div>
    <!-- COMPANY LOGO END -->

      <div class="col-md-3">
          <h5 class="text-center py-4 d-block">Business Information</h5>
          <hr style="box-shadow: 0 0 1px black;">
          <input type="text" class="form-control" placeholder="Business Name" name="b_name">
          <div class="form-row">
            <div class="form-group col-md-6">
              <input type="text" class="form-control"  placeholder="First Name" name="b_first_name">
            </div>
            <div class="form-group col-md-6">
              <input type="text" class="form-control " placeholder="Last Name" name='b_last_name'>
            </div>
          </div>
          <input type="text" class="form-control" placeholder="Street Address" name="b_address">
          <div class="form-row ">
            <div class="form-group col-md-4">
              <input type="text" class="form-control" placeholder="City" name="b_city">
            </div>
            <div class="form-group col-md-4">
              <input type="text" class="form-control" placeholder="State" name="b_state">
            </div>
            <div class="form-group col-md-4">
              <input type="text" class="form-control" placeholder="Zip Code" name="b_zipcode">
            </div>
          </div>
          <div class="form-row">
            <div class="col-sm-6" >
              <input type="email" class="form-control" placeholder="Email" name="b_email">
            </div>
            <div class="col-sm-6">
              <input type="Phone" class="form-control" placeholder="Phone number" name="b_phone">
            </div>
          </div>
        </div>
        <!-- BUSINESS INFORMATION FORM INPUT END -->
        <!-- JOB INFORMATION INPUT START -->
        <div class="col-2 container" >
          <h5 class="text-center py-4 d-block">Job Information</h5>
          <hr style="box-shadow: 0 0 1px black;">
          <tr>
            <div class="form-row ">
              <input type="text" class="form-control" placeholder="Year" name="year">
              <input type="text" class="form-control"  placeholder="Make" name="make">
              <input type="text" class="form-control " placeholder="Model" name="model">
              <input type="text" class="form-control " placeholder="Status" name="status">
            </div>
          </tr>
        </div>
        <!-- JOB INFORMATION INPUT END -->
        <!-- CUSTOMER INFORMATION INPUT START -->
        <div class="col-4" id="businessInfoContainer">
          <h5 class="text-center py-4 d-block">Customer Information</h5>
          <hr style="box-shadow: 0 0 1px black;">
          <input type="text" class="form-control" placeholder="Business Name" name="c_name">
          <div class="form-row">
            <div class="form-group col-md-6">
              <input type="text" class="form-control"  placeholder="First Name" name="c_first_name">
            </div>
            <div class="form-group col-md-6">
              <input type="text" class="form-control " placeholder="Last Name" name="c_last_name">
            </div>
          </div>
          <input type="text" class="form-control" placeholder="Street Address" name="c_address">
          <div class="form-row ">
            <div class="form-group col-md-4">
              <input type="text" class="form-control" placeholder="City" name="c_city">
            </div>
            <div class="form-group col-md-4">
              <input type="text" class="form-control" placeholder="State" name="c_state">
            </div>
            <div class="form-group col-md-4">
              <input type="text" class="form-control" placeholder="Zip Code" name="c_zipcode">
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6" >
              <input type="email" class="form-control" placeholder="Email" name="c_email">
            </div>
            <div class="col-sm-6">
              <input type="Phone" class="form-control" placeholder="Phone number" name="c_phone">
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
      <h3 id="cardHeader" class="card-header text-center font-weight-bold text-uppercase py-4" style="font-family: 'playfair-display'; color: #0C6EAF;">Estimate Table</h3>
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
              <td><button name="add" id="addRowBtn" class="btn btn-circle" style="background-color:#236B8E;"><i class="fa fa-plus"></i></button></td>
            </tr>
			</table>
         
        
        <table style="float:right;">
          <tr>
            <td colspan="">&nbsp;</td>
            <td>Subtotal</td>
            <td>&nbsp;</td>
            <td><input type="text" name="sub_total" class="form-control" id="sub_total" value="" jAutoCalc="SUM({cost})" onchange="costCalculation();"></td>
          </tr>
          <tr>
            <td colspan="">&nbsp;</td>
            <td> Tax:
              <input type="text" name="taxRate" id="taxRate" class="form-control" value="0" style="width:30px;" onchange="costCalculation();">
              <p> % </p></td>
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
    </div>
    <div class="row justify-content-center">
        <input type="submit" name="submit" value="save" class="btn btn-success" style="color: white;" id="saveEstimateBtn">
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

</div>
<!-- TAX CALCULATION FUNCTION START -->
<!-- FORMS TO BE SWITCHED ON RADIO CLICK START ------------------------------------->
<script src="<?php echo BASE_URL ; ?>js/jquery-3.4.1.min.js"></script>
 <script type="text/javascript" src="js/bootstrap.min.js"></script>
 <script type="text/javascript" src="dist/jautocalc.js"></script>
<script type="text/javascript">
      var base_url = '<?php echo BASE_URL ;?>';
  </script>
  <script type="text/javascript" src="js/logger.js"></script>

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
