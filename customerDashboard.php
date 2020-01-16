<?php
    session_start();
    include('database_connection/connection.php');
    include('includes/variables.php');
    if(!isset($_SESSION['email'])){
        header("Location:signIn.php");
       }  
     
     $userid = $_SESSION['user_id'] ;  
     $user = $db->rawQueryOne('select * from register where id = "'.$userid.'"'); 
     
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

<link rel="stylesheet" text="text/css" href="./css/customerDashboard.css">
<title>Dashboard</title>
</head>

<body>


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
          <a class="nav-link" href="#" id="d_dashboardNavBtn" role="button" style="color: #324A5F;"><?php echo $_SESSION['firstName']; ?><i class="fa fa-user-circle ml-2"></i></a>
        </li>
        <li class="dropdown">
        <a href="#" class="dropdown-toggle mt-2" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"></span>
        <span class="fa fa-bell " style="font-size:16px; color: #324A5F;"></span></a>
	      <ul class="dropdown-menu"></ul>
	  </li>
        <li class="nav-item">
          <a class="nav-link" href="driverMessageBox.php" id="d_messageNavBtn" role="button" style="color: #324A5F;">Inbox<i class="fa fa-envelope ml-2"></i></a>
        </li>
        
        <a href="<?php if($user['address'] != ''){ echo 'addCarPage.php';}else{ echo 'javascript:void()';} ?>" <?php if($user['address'] == ''){ echo ' data-toggle="modal" data-target="#addressmodalbox"';} ?>>
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

<!-- PAGE HEADER START -->
<nav class="navbar" style="background-color: #324a5f; color: white; height: 55px; font-size: 26px; font-family: playfair;">

<ol class="breadcrumb mr-auto" style="font-size: 18px;">
    <li class="breadcrumb-item active text-white" >Dashboard</li>
  </ol>
</nav>
<!-- PAGE HEADER END -->

<div class="row container-fluid ml-auto mr-auto">
<!-- CUSTOMER PERSONALIZED SETTINGS START  -------------------------------------------------------------------------------------------------->

<div class="container z-depth-2 text-left col-xl-4 col-md-5 col-sm-9 mt-5 ml-auto mr-auto p-5" id="customersInformationContainer">

  <!-- Title -->
  
  <h2 class="card-title">Settings</h2>
  <!-- Subtitle -->
  <p class="blue-text font-weight-bold">Your personalized settings</p>


<form class="updatprofile" >
<div class="resultprofile"></div>
	<div class="row mt-5" id="customerNameContainer">

        <div class="md-form col-md-6">
          <input  type="text" id="c_firstName" name="firstName" class="form-control" value="<?php echo $user['firstName'] ; ?>">
          <label class="ml-3" for="c_firstName">First Name</label>
        </div>
        <div class="md-form col-md-6">
          <input type="text" id="c_lastName" name="lastName" class="form-control" value="<?php echo $user['lastName'] ; ?>">
          <label class="ml-3" for="c_lastName">Last Name</label>
        </div>
        
    </div>

  <hr class="my-4">

  <!-- Grid row -->
  <div class="row d-flex justify-content-left">

    <!-- Grid column -->
  <div class="col-xl-12">

    <div class="md-form">
      <input type="text" id="c_streetAddress" name="address" class="form-control geocomplete"  value="<?php echo $user['address'] ; ?>">
      <label for="c_streetAddress">Street Address</label>
    </div>
    <div class="md-form">
      <input type="text" id="c_Address2" name="address2" class="form-control" value="<?php echo $user['address2'] ; ?>">
      <label for="c_Address2">Address</label>
    </div>
    <div class="row">
        <div class="md-form col-md-6">
          <input  type="text" id="c_city" name="city" class="form-control" data-geo="locality" value="<?php echo $user['city'] ; ?>">
          <label class="ml-3" for="c_city">City</label>
        </div>
        <div class="md-form col-md-6">
          <input type="text" id="c_state" name="state" data-geo="administrative_area_level_1" class="form-control" value="<?php echo $user['state'] ; ?>">
          <label class="ml-3" for="c_state">State</label>
        </div>
        <div class="md-form col-md-4">
          <input type="text" id="c_zip" name="zip" class="form-control" data-geo="postal_code" value="<?php echo $user['zip'] ; ?>">
          <label class="ml-3" for="c_zip">Zip</label>
        </div>
    </div>
    
    <div class="row">
    	<div class="col-md-6 col-sm-4">
    		<input type="button" class="btn btn-primary btn-sm updateprofile" value="Update"></input>
    		<input type="hidden" name="submit" value="save"></input>
    	</div>
    	<div class="col-md-6 col-sm-6 mt-3">
    		<a class="text-success" style="margin-top:-20px;" data-toggle="modal" data-target="#changePasswordModal">Change Password</a>
    	</div>
    </div>

  </div>
    <!-- Grid column -->

  </div>
  <!-- Grid row -->
</form>
  

  <!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <form class="updatepassword">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" id="changePasswordModalHeader">
        <h5 class="modal-title" id="exampleModalLabel" style="font-family: 'playfair';">Change Password</h5>
        <button type="button" class="close" id="changePasswordModalCloseBtn" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        	<div class="row">
        		<div class="col-md-12">
        			<div class="resultpassword"></div>
        			<div class="label" style="font-family: 'lora';">Enter Your New Password</div>
        			<input type="password" name="password" class="password form-control" required="" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required></input>
        			<input type="hidden" name="submit" value="save"></input>
        		</div>
        		
        	</div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger btn-sm" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-outline-dark-green btn-sm password-btn">Save changes</button>
      </div>
    </div>
  </div>
  </form>
</div>
<!--Social-->

            <ul class="social list-unstyled row">
              <li class="nav-item"><a href="#" class="icons-md fb-ic nav-link"><i class="fab fa-facebook-f"> </i></a></li>
              <li class="nav-item"><a href="#" class="icons-md pin-ic nav-link"><i class="fab fa-instagram"> </i></a></li>
              <li class="nav-item"><a href="#" class="icons-md tw-ic nav-link"><i class="fab fa-twitter"> </i></a></li>
            </ul>
        
          <!--/Social-->

</div>

<!-- Jumbotron VEHICLE CARDS START-------------------------------------------------------------------------------------------------------------------------------------------->
<div class="container row justify-content-center mt-5 p-0 col-md-7 col-sm-9 ml-auto mr-auto mb-sm-5 mb-5" id="carCardMainContainer">
<!-- CARDS ARE ADDED WHEN CARS ARE ADDED TO USER ACCOUNT -->
<?php 
	$vehicle = $db->rawQuery('select * from vehicle where user_id = "'.$userid.'"'); 

	foreach($vehicle as $vs){
	    	$ig = 0;
		$vehicleid = $vs['vehicle_id'] ;
		$estimationcount = $db->rawQuery('select * from estimation where vehicle_id ='.$vehicleid);
		$estimationcomplete = $db->rawQuery('select * from estimation where eststatus = 5 AND  vehicle_id ='.$vehicleid);
		
		
		$vehcileimage = $db->rawQuery('select * from vehicle_image where vehicle_id = "'.$vs['vehicle_id'].'"');
		
		
?>
<div class="card container col-xl-5 col-lg-8 col-md-8 col-sm-11 pt-2 mb-3 ml-auto mr-auto" id="carCardContainer">
  <!-- Card image -->
  <div id="demo<?php echo $vehicleid ; ?>" class="carousel slide" data-ride="carousel">



  <!-- The slideshow -->
  <div class="carousel-inner">
  	
    <?php 
    	foreach($vehcileimage as $image){ 
    	$imgelist = $ig++;
    ?>
    <div class="carousel-item <?php if($imgelist == 0){ echo 'active' ;} ?>">
      <img class="card-img-top" id="cardImage" src="<?php echo BASE_URL ; ?>photo_gallery/<?php echo $image['image'] ; ?>" >
    </div>
    <?php } ?>
    
  </div>

  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo<?php echo $vehicleid ; ?>" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo<?php echo $vehicleid ; ?>" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>

</div>
  <!-- Card content -->
  <!-- CAR INFORMATION -->
  <h4 class="card-title mt-3" style="text-align: center;"><?php echo $vs['year'].' '.$vs['make'].' '.$vs['model'] ; ?> </h4>
  <!-- ESTIMATE STATUS -->
  <p class="card-text text-warning" style="text-align: center; margin-top: -15px;"><?php if(count($estimationcomplete) > 0){ echo 'Completed';}else { echo count($estimationcount).' Estimate Found' ;} ?></p>
  
  <p class="card-text" style="text-align: center; margin-top: -15px;"><a class="text-danger" href="<?php echo BASE_URL; ?>controllers/addcar.php?vehicle_id=<?php echo $vs['vehicle_id'] ; ?>" onClick="return confirm('Are you absolutely sure you want to delete?')">Delete Car</a></p>
<!-- Button -->
  <a href="carDetails.php?vehicle_id=<?php echo $vs['vehicle_id'] ; ?>" class=" btn btn-sm hoverable" style="background-color: #006699; color: white;">View Details</a>
</div>
<?php  } ?>

<!-- Card -->
</div>
<!-- Jumbotron VEHICLE CARDS END-------------------------------------------------------------------------------------------------------------------------------------------->

</div>


<!-- Footer -->
<footer class="page-footer font-small fixed-bottom" style="overflow: hidden;">
<!-- Copyright -->
    <div class="footer-copyright text-center py-3" style="background-color: #324A5F;">© 2018 Copyright:
        <a href="www.estimakr.com"> Estimakr</a>
    </div>
<!-- Copyright -->
</footer>
      <!-- Footer -->

<div id="addressmodalbox" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h4 class="modal-title text-white">Address Required</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
      </div>
      <div class="modal-body">
        <h6>Please add your address so when may send your estimate request to the correct auto body shops.</h6>
        <p>Thank you</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>





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
<script type="text/javascript">
      var base_url = '<?php echo BASE_URL ;?>';
  </script>
  <script type="text/javascript" src="//maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyDle_EaikORy0q4nDhaEQPoDIas7_ubpoU"></script>
  <script src="<?php echo BASE_URL ; ?>/js/logger-google.js"></script>
	<script src="<?php echo BASE_URL ; ?>/js/jquery.geocomplete.js"></script>
<script src="<?php echo BASE_URL ; ?>js/jquery.form.js"></script>
	<script src="<?php echo BASE_URL ; ?>js/jquery.validate.min.js"></script>
  <script type="text/javascript" src="<?php echo BASE_URL ; ?>js/logger.js"></script>

</body>
</html>
</div>
</body>
</html>