<?php
    session_start();
    include('database_connection/connection.php');
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
<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>


<style>
/* Style the form */
/* #regForm {
  background-color: #ffffff;
  margin: 100px auto;
  padding: 40px;
  width: 70%;
  min-width: 300px;
} */

input[type="file"] {
  display: block;
}
.imageThumb {
  max-height: 75px;
  border: 2px solid;
  padding: 1px;
  cursor: pointer;
}
.vehileimage .pip .remove
{
	display : none;
}

.pip {
  display: inline-block;
  margin: 10px 10px 0 0;
}
.remove {
  display: block;
  background: #444;
  border: 1px solid black;
  color: white;
  text-align: center;
  cursor: pointer;
}
.remove:hover {
  background: white;
  color: black;
}

#brandLink {
    font-family: 'lora', serif;
    margin-left:50px;
    color: #324a5f;
    font-size: 22px;
}
/* Style the input fields */
input {
  padding: 10px;
  width: 100%;
  font-size: 22px;
  font-family: 'lora';
  border: 1px solid #aaaaaa;
}


/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 25px;
  width: 25px;
  margin: 0 2px;
  background-color:;
  border: none;
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

/* Mark the active step: */
.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #4CAF50;
}
.btnChange {
    background-color: transparent;
    color: #37474F;
    border: solid 2px #3F729B;
    border-radius: 20px;
    width: 120px;
    height: 40px;
    transition: 0.5s;
    box-shadow: 0 0 5px #37474F;
    font-family: 'lora';
    font-weight: 500;
}
.btnChange:hover {
    transition: 0.5s;
    background-color: #3F729B;
    border: solid 2px #3F729B;
    color: white;
    border-radius: 20px;
    box-shadow: 0 0 15px #37474F;
}
</style>
</head>


<body>
  <!--DRIVER NAVBAR CONTAINER START -->
<!--<nav class="navbar navbar-expand-lg"> <a class="navbar-brand" id="brandLink" href="#" >Estimakr</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <i class="fa fa-bars" style="color: #324a5f;"></i>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav col-md-3 ml-md-auto" style="margin-right:150px;">
    </ul>
    <form class="form-inline my-2 my-lg-0" style="margin-right:100px;">

      <ul class="navbar-nav mr-auto" >
        <li class="nav-item">
          <a class="nav-link" href="customerDashboard.php" id="d_dashboardNavBtn" role="button" style="color: #324A5F;"><?php echo $_SESSION['firstName']; ?><i class="fa fa-user-circle ml-2"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" id="d_messageNavBtn" role="button" style="color: #324A5F;"><i class="fa fa-envelope"></i></a>
        </li>
        
        <a href="addCarPage.php">
         <button class="btn btn-sm" type="button" style="background-color: #324A5F; color: white; font-family: 'lora';">Add a Car</button>
        </a>
      <li class="nav-item"> <a class="nav-link" style="color: #324A5F;" href="<?php echo BASE_URL?>controllers/logout.php" tabindex="-1" aria-disabled="true">LogOut</a> 
      </li>
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
<!-- DRIVER NAVBAR CONTAINER END -->


<form id="regForm" class="jumbotron bg-white container mt-5" action="<?php echo BASE_URL ; ?>controllers/addcar.php" method="post"  enctype="multipart/form-data">

<h1 style="font-family: 'playfair'; color: #7283a7; ">Add Your Car:</h1>

<!-- One "tab" for each step in the form: -->

    <!-- YEAR MAKE MODEL INPUT START -->
<div class="tab">
    <div class="md-form">
    <input type="text" id="c_carYear" name="year" class="form-control" onchange="changevalue(this)" data-ids="year">
    <label for="c_carYear">Year</label>
    </div>
    <div class="md-form">
    <input type="text" id="c_carMake" name="make" class="form-control" onchange="changevalue(this)" data-ids="make">
    <label for="c_carMake">Make</label>
    </div>
    <div class="md-form">
    <input type="text" id="c_carModel" name="model" class="form-control" onchange="changevalue(this)" data-ids="model">
    <label for="c_carModel">Model</label>
    </div>
    <div class="md-form">
    <input type="text" id="c_carVin" name="vin_number" class="form-control" onchange="changevalue(this)" data-ids="vin">
    <label for="c_carVin">Vin Number</label>
    </div>
    <h5>Choose how far are you willing to travel for an auto shop</h5>
    <!-- Basic dropdown -->
    <select class="form-control mb-5" name="distance" name="distance">
    	<option value="10">10 Miles</option>
    	<option value="15">15 Miles</option>
    	<option value="20">20 Miles</option>
    	<option value="25">25 Miles</option>
    	<option value="30">30 Miles</option>
    	<option value="100">100 Miles</option>
    </select>
<!-- <button class="btn btn-primary dropdown-toggle mr-4"  type="button" data-toggle="dropdown"
  aria-haspopup="true" aria-expanded="false">Basic dropdown</button> -->


<!-- Basic dropdown -->
</div>
    <!-- YEAR MAKE MODEL INPUT END -->

    <!-- VEHICLE DAMAGE PHOTO UPLOAD START -->
<div class="tab mb-5">
Upload photos of vehicle damage
  <input type="file" id="files" name="files[]" multiple>
  
  <div id="seelctedimage"></div>
  <br></br>
  <!--<input type="submit" value="Upload Image" name="submit">-->
 
</div>

    <!-- VEHICLE DAMAGE PHOTO UPLOAD START -->


<div class="tab">
  <h4 style="font-family: 'playfair';">Review your information and add a description</h4>
  <div class="row">
  <div class="col-md-6 jumbotron" style="height: 400px;">
    <h1>Vehicle Images</h1>
    <div class="vehileimage"></div>
</div>

<div class="jumbotron bg-white col-md-5 mt-auto ml-5" style="height: 200px;">
<h3 style="text-align: center; margin-top: -40px;">Car Summary</h3>
  <h6>Year: <span class="year"></span></h6>
  <h6>Make: <span class="make"></span></h6>
  <h6>Model: <span class="model"></span></h6>
  <h6>Vin Number: <span class="vin"></span></h6>
</div>
</div>
  <div class="md-form col-md-6">
      <input type="text" id="c_carDamageDescription" name="description" class="form-control" oninput="this.className">
      <label class="ml-3" for="c_carDamageDescription">Description</label>
  </div>

</div>

<div style="overflow:auto;">
  <div style="float:right;">
    <button class="btnChange previous" type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
    <button class="btnChange next" type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
    
  </div>
</div>
<input type="hidden" name="submit" value="save"></input>
<!-- Circles which indicates the steps of the form: -->
<div class="" style="text-align:center;margin-top:40px;">
  <span class="step btn-circle blue-gradient"></span>
  <span class="step btn-circle blue-gradient"></span>
  <span class="step btn-circle blue-gradient"></span>
</div>

</form>





<!-- Footer -->
<footer class="page-footer font-small fixed-bottom" style="overflow: hidden;">
<!-- Copyright -->
    <div class="footer-copyright text-center py-3" style="background-color: #324A5F;">© 2018 Copyright:
        <a href="www.estimakr.com"> Estimakr</a>
    </div>
<!-- Copyright -->
</footer>
      <!-- Footer -->

<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form ...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  // ... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
    
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
   
  }
  // ... and run a function that displays the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
 
  // Hide the current tab:
  if(currentTab == 2)
  {
  	
  }else
  {
  	x[currentTab].style.display = "none";
  }
  
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  
  if(currentTab == 2)
  {
  	var imagesselect = $('#seelctedimage').html();
  	$('.vehileimage').html(imagesselect)
  
  	
  }else if(currentTab == 3)
  {
  		$('#nextBtn').attr('type','submit');
  		
  }else
  {
  	$('#nextBtn').attr('type','button');
  }
  // if you have reached the end of the form... :
  if (currentTab == x.length) {
 
    
  }else
  {
  	// Otherwise, display the correct tab:
  	showTab(currentTab);
  }
  	
  
  
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false:
      valid = true;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class to the current step:
  x[n].className += " active";
}


function changevalue(n)
{
	var value = n.value;
	var attr  = n.getAttribute("data-ids");
	$('.'+attr).text(value)
}



$(document).ready(function() {
  if (window.File && window.FileList && window.FileReader) {
    $("#files").on("change", function(e) {
      var files = e.target.files,
        filesLength = files.length;
      for (var i = 0; i < filesLength; i++) {
        var f = files[i]
        var fileReader = new FileReader();
        fileReader.onload = (function(e) {
          var file = e.target;
          var imagefile = $("<span class=\"pip\">" +
            "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
            "<br/><span class=\"remove\">Remove image</span>" +
            "</span>");
            $("#seelctedimage").append(imagefile);
          $(".remove").click(function(){
            $(this).parent(".pip").remove();
          });
          
          // Old code here
          /*$("<img></img>", {
            class: "imageThumb",
            src: e.target.result,
            title: file.name + " | Click to remove"
          }).insertAfter("#files").click(function(){$(this).remove();});*/
          
        });
        fileReader.readAsDataURL(f);
      }
    });
  } else {
    alert("Your browser doesn't support to File API")
  }
});


</script>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.11/js/mdb.min.js"></script>  

<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.js"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/additional-methods.js"></script>

</body>
</html>
</div>
</body>
</html>
