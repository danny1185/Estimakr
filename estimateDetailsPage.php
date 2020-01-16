<?php
    session_start();
    include('database_connection/connection.php');
    include('includes/variables.php');
    if(!isset($_SESSION['email'])){
        header("Location:signIn.php");
       }  
     
     $userid = $_SESSION['user_id'] ; 
     $est_id = $_GET['est_id'];
     $user = $db->rawQueryOne('select * from register where id = "'.$userid.'"'); 
     
     $getestimatedetails = $db->rawQueryOne('select * from estimation where id = "'.$_GET['est_id'].'"');
     
     $getvehicle		 =  $db->rawQueryOne('select * from vehicle where vehicle_id = '.$getestimatedetails['vehicle_id']); 
     $vehcileimage 		 = $db->rawQuery('select * from vehicle_image where vehicle_id = "'.$getvehicle['vehicle_id'].'"');
     $estimatestatus 	 = $db->rawQuery('select * from estimatestatus where estimate_id = "'.$_GET['est_id'].'"');
     $ig 				 = 0;
     $qetcutomerinfo = $db->rawQueryOne('select * from register where id = "'.$getestimatedetails['user_id'].'"');
     
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
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.11/css/mdb.min.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="./css/estimateDetailsPage.css">

<title>Estimate Requests</title>
<script>// Tooltips Initialization
$(function () {
$('[data-toggle="tooltip"]').tooltip()
})</script>
</head>

<body>

</head>
<body>
 
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
<nav class="navbar mb-5" style="background-color: #324a5f; color: white; height: 55px; font-size: 26px; font-family: playfair;">

<ol class="breadcrumb mr-auto" style="font-size: 18px;">
    <li class="breadcrumb-item active text-white" ><a class="text-primary" href="VehicleEstimate.php">New Estimate Requests</a></li>
    <li class="breadcrumb-item active text-white" >Estimate Details</li>

  </ol>
</nav>
<!-- PAGE HEADER END -->
<div class="container-fluid row" id="vehicleInfoContainer">
<!-- VEHICLE IMAGE CAROUSEL START -->
<div id="vehicleImageCarousel" class="carousel col-xl-4 container-fluid slide carousel-fade " data-ride="carousel">
    <div class="carousel-inner container-fluid col-md-12 mr-auto ml-0" id="carouselControlContainer">
        <?php 
    	foreach($vehcileimage as $image){ 
    	$imgelist = $ig++;
    ?>
    <div class="carousel-item <?php if($imgelist == 0){ echo 'active' ;} ?>">
      <img class="card-img-top" style="height: 300px; width: 100%;" id="vehicleImageCard" src="<?php echo BASE_URL ; ?>photo_gallery/<?php echo $image['image'] ; ?>" alt="Card image cap">
    </div>
    <?php } ?>
      
    </div>
    <a class="carousel-control-prev" href="#vehicleImageCarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#vehicleImageCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>
<!-- VEHICLE IMAGE CAROUSEL END -->

<!-- VEHICLE INFORMATION START -->
<div class="col-xl-4">
    <div id="vehicleEstimateDetails">
        <div id="vehicleEstimateSubContainer">
            <h3 id="vehicleInfoTitle"><?php echo $getvehicle['year'].' '.$getvehicle['make'].' '.$getvehicle['model'] ; ?></h3>
            <p>Posted: <?php echo time_elapsed_string($getvehicle['created_on']); ; ?></p>
        </div>
        <div id="vehicleEstimateSubContainer">
            <p class="font-weight-bold lead" id="vehicleDescriptionHeader"><span >Description:</p>
            <p><?php echo $getvehicle['description'] ; ?></p>
        </div> 
        <div id="vehicleEstimateSubContainer">
            <p class="font-weight-bold lead" id="vehicleDescriptionHeader"><span >VIN:</p>
            <p><?php echo $getvehicle['vin_number'] ; ?></p>
        </div>
        <hr>
        <div class="row" id="vehicleEstimateSubContainer">
          <h6 class="ml-3" style="font-family: 'playfair';">Status:</h6>
          <h6 class="text-warning mb-0" style="font-family: 'playfair';"><?php if($getestimatedetails['eststatus'] == 0){ echo 'Estimate Submitted';}else if($getestimatedetails['eststatus'] == 1) { echo 'Estimate Accepted' ;}else if($getestimatedetails['eststatus'] == 2){ echo 'Vehicle Droped Off';}else if($getestimatedetails['eststatus'] == 3){ echo 'Vehicle Ready';}else if($getestimatedetails['eststatus'] == 4){ echo 'Vehicle Picked Up';}else if($getestimatedetails['eststatus'] == 5){ echo 'Complete' ;} ?></h6>
        </div>
        <button class="btn btn-sm btn-outline-blue-grey ml-0" id="statusUpdateButton" <?php if($getestimatedetails['status'] == 'pending'){ echo 'disable';}?> <?php if($getestimatedetails['eststatus'] == 1){ echo "onclick='dropdunction()'";}else if($getestimatedetails['eststatus'] == 2){ echo "onclick='readydunction()'" ;}else if($getestimatedetails['eststatus'] == 3){ echo "onclick='pickeddunction()'";}else if($getestimatedetails['eststatus'] == 4){ echo "onclick='completedunction()'";} ?>><i class="fas fa-car mr-1"></i> <?php if($getestimatedetails['eststatus'] == 1){ echo 'Vehicle dropped off' ; }else if($getestimatedetails['eststatus'] == 2){ echo 'Vehicle Ready For Pickup';}else if($getestimatedetails['eststatus'] == 3){ echo 'Vehicle Picked Up';}else if($getestimatedetails['eststatus'] == 4){ echo 'Completed';}?></button>
        <button class="btn btn-sm btn-outline-success ml-0" id="statusUpdateButton" data-toggle="modal" data-target="#modalEstimate"><i class="fas fa-clipboard mr-1"></i> View Estimate</button>
        <button class="btn btn-sm btn-outline-primary ml-0 mt-3"><i class="far fa-envelope mr-1"></i>Send Message</button>
        <div class="row" id="vehicleEstimateSubContainer">
         <?php $dropofget = $db->rawQueryOne('select * from estimatestatus where status = "Vehicle Droped Off" AND  estimate_id = '.$est_id); ?>
          <h6 class="ml-3 mr-1" style="font-family: 'playfair';">Drop Off Date: </h6>
          <h6 class="mb-0" style="font-family: 'playfair';"> <?php if(count($dropofget) > 0){ echo date('d/m/Y H:i A',strtotime($dropofget['created_on'])) ;} ?></h6>
        </div>
      </div>

      <!-- REVEIW AND RATING CONTAINER START ---------------------------------------->
      <div class="col-sm-12 z-depth-1 mt-3 p-0">
              <div class="review-block">
                <?php 
                	$userreviews = $db->rawQuery('select * from userratings where  estimate_id ="'.$est_id.'"');
                	foreach($userreviews as $rev){
                	$userget = $db->rawQueryOne('select * from register where  id ="'.$rev['from_id'].'"');
                	?>
                <div class="row">
                  <div class="col-sm-3">
                    <div class="review-block-name mb-0"><p style="font-family: 'playfair'; font-size: 18px;"><?php echo $userget['firstName'].' '. $userget['lastName'] ; ?></p></div>
                    <div class="review-block-date"><?php echo date('M d, Y',strtotime($rev['created_on'])) ; ?><br/><?php echo time_elapsed_string($rev['created_on']); ; ?></div>
                  </div>
                  <div class="col-sm-9">
                    <div class="review-block-rate mt-2">
                    	<?php for($rs = 0; $rs<$rev['ratings'] ; $rs++){ ?>
                        <i class="fas fa-star fa-2x text-warning" aria-hidden="true"></i>
                      <?php } ?>
                    </div>

                    <div class="review-block-description ml-2">
                      <p class="mb-0" style="font-family: 'lora'; font-size: 16px; font-weight: 600;">Comment:</p>
                      <p style="font-family: 'lora';"><?php echo $rev['message'] ; ?></p>
                    </div>
                  </div>
                </div>
                <hr/>
                <?php } ?>
              </div>
        </div>
      <!-- REVEIW AND RATING CONTAINER END ------------------------------------------>
</div> 
<!-- VEHICLE INFORMATION END -->

<!-- STATUS UPDATE LOG START -->
<div class="col-xl-2 col-md-4">
    <div id="statusUpdateMainContainer">
      <h4 style="font-family: 'playfair';">Status Update Log</h4>
        <?php foreach($estimatestatus as $estatus){ ?>
        <div class="mb-0" id="statusUpdateSubContainer">
          <h6 class="mb-0" style="font-family: 'lora';"><?php echo $estatus['status'] ; ?>: </h6>
          <h6 class="mb-0 blue-grey-text" style="font-family: 'lora';"> <?php echo date('m/d/Y H:i:s',strtotime($estatus['created_on'])) ; ?></h6>
        </div>
        <?php } ?>
        
      </div>
</div> 



</div>
<!-- STATUS UPDATE LOG END -->

<!-- ESTIMATE MODAL START ----------------------------------------------------------------------------------------->


<?php 
        if(!$_SESSION['role_id'])
        {
            require_once('');
        }else if($_SESSION['role_id'] == 1)
        {
            require_once('components/customerEstimateModal.php');
        }else if($_SESSION['role_id'] == 2)
        {
            require_once('components/shopEstimateModal.php');
        }
    ?>



<!-- ESTIMATE MODAL END ------------------------------------------------------------------------------------------------------------------>

<!-- PAGE HEADER START -->

<nav class="navbar mt-5" style="background-color: #324a5f; color: white; height: 45px; font-size: 26px; font-family: playfair;">
<?php if($getestimatedetails['eststatus'] == 2){ ?>
<ol class="breadcrumb mr-auto" style="font-size: 18px;">
    <li class="breadcrumb-item active text-white" >Custom Updates</li>
  </ol>
<?php } ?>  
</nav>
<!-- PAGE HEADER END -->
<div class="row mb-5 pb-5">
<!-- BUTTON TRIGGER MODAL START -->
<div class="customUpdateButtonContainer">
  <button type="button" id="customUpdateButton" data-toggle="modal" data-target="#customUpdateModal">
  Create Update<br><i class="fa fa-plus-circle"></i>
  </button>
</div>

<!-- BUTTON TRIGGER MODAL END -->

<!-- MODAL START -->
<div class="modal fade" id="customUpdateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Send an Update</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="text-white">&times;</span>
        </button>
      </div>
      <form class="updatesadd validate">
      <div class="modal-body">
       <div class="update_result"></div>
       <br>
      <h5>Upload update photos <a href="#" data-toggle="tooltip" title="Upload a few photo's. Maybe the cars ready for paint?"><i class="fas fa-question-circle blue-grey-text"></i></a></h5>
     
      <div class="custom-file">
      	
        <input type="file" class="custom-file-input" name="file" id="inputGroupFile01"
          aria-describedby="inputGroupFileAddon01">
        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
      </div>
        <!-- UPDATE TITLE INPUT START -->
      <div class="md-form">
        <input type="text" id="form1" name="text" class="form-control">
        <label for="form1">Enter Update Title <a href="#" data-toggle="tooltip" title="Use a short and sweet update!"><i class="fas fa-question-circle blue-grey-text"></i></a></label>
      </div>
      <!-- UPDATE TITLE INPUT END -->
      <input type="hidden" name="estimate_id" value="<?php echo $est_id ; ?>"></input>
      
      </div>
      <div class="modal-footer ml-auto mr-auto">
        <button type="submit" class="btn btn-sm btn-primary btn-updateextimate">Submit Update</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- MODAL END -->

<!-- Card -->
<?php 
	$getupdates = $db->rawQuery('select * from estimate_updates where estimate_id = "'.$est_id.'"');
	foreach($getupdates as $update){
?>	
<div id="updateCardContainer" class="bg-white">
  <!-- Card image ADD CAROUSEL / MAXIMUM AMOUNT OF IMAGES TO UPLOAD 3-->
<div class="row pl-4 mt-0 ml-auto mr-auto">
  <p class="ml-5 mb-0 font-weight-bold blue-grey-text" style="font-family: 'playfair'; font-size: 22px;">Update</p>
  <a class="float-right ml-auto" href="<?php echo BASE_URL ; ?>controllers/CustomUpdates.php?updateid=<?php echo $update['update_id'] ; ?>&est_id=<?php echo $est_id ; ?>"><i class="far fa-times-circle fa-warning" data-toggle="tooltip" title="Delete Update"></i></a>
</div>
  <img class="img-thumbnail hoverable" src="<?php echo BASE_URL ; ?>images/customupdate/<?php echo $update['image'] ; ?>" alt="Card image cap">
  
  <!-- Card content -->
  <hr class="mt-2 mb-2">
  <div class="container-fluid mt-2 rounded">
    <!-- Title -->
    <p class="card-title text-center" id="updateCardTitle"><?php echo $update['title'] ; ?></p>
  </div>
<hr class="mt-0">
</div>
<?php } ?>
<!-- Card -->



</div>

<!-- Footer -->
<footer class="page-footer font-small fixed-bottom" style="overflow: hidden; margin-top: 100px;">
<!-- Copyright -->
    <div class="footer-copyright text-center py-3" style="background-color: #324A5F;">© 2018 Copyright:
        <a href="www.estimakr.com"> Estimakr</a>
    </div>
<!-- Copyright -->
</footer>
      <!-- Footer -->







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
<script src="<?php echo BASE_URL ; ?>js/jquery.form.js"></script>
	<script src="<?php echo BASE_URL ; ?>js/jquery.validate.min.js"></script>
  <script type="text/javascript" src="<?php echo BASE_URL ; ?>js/logger.js"></script>
<script type="text/javascript">
	function dropdunction()
	{
		if(confirm('Confirm Vehicle is Dropped Off at Your Shop'))
		{
			window.location= "<?php echo BASE_URL ; ?>controllers/EstimateStatus.php?dropoff=2&est_id=<?php echo $est_id ;?>";
		}
		
	}
	
	
	function pickeddunction()
	{
		if(confirm('Confirm Vehicle is Pick Up'))
		{
			window.location= "<?php echo BASE_URL ; ?>controllers/EstimateStatus.php?dropoff=4&est_id=<?php echo $est_id ;?>";
		}	
	}
	function readydunction()
	{
		if(confirm('Confirm Vehicle is Ready'))
		{
			window.location= "<?php echo BASE_URL ; ?>controllers/EstimateStatus.php?dropoff=3&est_id=<?php echo $est_id ;?>";
		}	
	}
	
	function completedunction()
	{
		if(confirm('Confirm Vehicle Completed'))
		{
			window.location= "<?php echo BASE_URL ; ?>controllers/EstimateStatus.php?dropoff=5&est_id=<?php echo $est_id ;?>";
		}	
	}
</script>
</body>
</html>
</div>
</body>
</html>