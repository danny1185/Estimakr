<?php
    session_start();
    include('database_connection/connection.php');
    include('includes/variables.php');
    if(!isset($_SESSION['email'])){
        header("Location:signIn.php");
       }  
     $vehicle_id = $_GET['vehicle_id'] ;  
     $ig = 0;
     $vehicle = $db->rawQueryOne('select * from vehicle where vehicle_id = "'.$vehicle_id.'"'); 
     $vehcileimage = $db->rawQuery('select * from vehicle_image where vehicle_id = "'.$vehicle['vehicle_id'].'"');
     $estimation = $db->rawQuery('select * from estimation where vehicle_id ='.$vehicle_id);
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
<link rel="stylesheet" text="text/css" href="./css/carDetails.css">

<title>Car Details</title>
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
<!-- DRIVER NAVBAR CONTAINER END -->
<!-- PAGE HEADER START -->
<nav class="navbar" style="background-color: #324a5f; color: white; height: 55px; font-size: 26px; font-family: playfair;">

<ol class="breadcrumb mr-auto" style="font-size: 18px;">
    <li class="breadcrumb-item"><a class="text-info" href="customerDashboard.php">Dashboard</a></li>
    <li class="breadcrumb-item active text-white" >Car Details</li>
  </ol>
</nav>
<!-- PAGE HEADER END -->

<div class="row container-fluid ml-auto mr-auto">
<!-- SIDE INFO CONTAINER START -->

<div class="container text-left col-xl-4 col-lg-5 col-md-8 col-sm-10 col-10   mr-auto ml-auto mt-5" id="carInfoContainer">

  <!--MAIN CUSTOMER VEHICLE IMAGE -->
  <!-- Card image -->
  <div id="demo" class="carousel slide" data-ride="carousel">



  <!-- The slideshow -->
  <div class="carousel-inner z-depth-2">
  	
    <?php 
    	foreach($vehcileimage as $image){ 
    	$imgelist = $ig++;
    ?>
    <div class="carousel-item <?php if($imgelist == 0){ echo 'active' ;} ?>">
     <img class="card-img-top " src="<?php echo BASE_URL ; ?>photo_gallery/<?php echo $image['image'] ; ?>" alt="Card image cap">
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
  <div class="ml-1">

  <h2 class="card-title mt-3" style="font-family: 'playfair';">Description</h2>
    
  
    <!-- Subtitle -->
    <p class="blue-grey-text" style="font-family: 'lora';"><?php echo $vehicle['description'] ; ?></p>
    <hr class="my-2">
    <p class="blue-grey-text" style="font-family: 'lora';"><span class="font-weight-bold">Vin:</span> <?php echo $vehicle['vin_number'] ; ?></p>
  
    <hr class="my-2">
    <p class="blue-grey-text" style="font-family: 'lora'; font-size: 16px;"><i class="fa fa-clipboard text-danger mr-2"></i><?php echo count($estimation) ; ?> Estimate found</p>
    <hr class="my-2">
    <p class="blue-grey-text" style="font-family: 'lora'; font-size: 16px;"><span class="font-weight-bold">Posted:</span> <?php echo time_elapsed_string($vehicle['created_on']); ; ?></p>
  
    <!-- Grid row -->
    
    
  
  
    <!-- Grid row -->
  
    
  <!--Social-->
  
              <ul class="social list-unstyled row">
                <li class="nav-item"><a href="#" class="icons-md fb-ic nav-link"><i class="fab fa-facebook-f "> </i></a></li>
                <li class="nav-item"><a href="#" class="icons-md pin-ic nav-link"><i class="fab fa-instagram"> </i></a></li>
                <li class="nav-item"><a href="#" class="icons-md tw-ic nav-link"><i class="fab fa-twitter"> </i></a></li>
              </ul>
          
            <!--/Social-->
            <div class="row">
             <button href="<?php echo BASE_URL; ?>controllers/addcar.php?vehicle_id=<?php echo $vehicle['vehicle_id'] ; ?>"  class="btn btn-toolbar btn-sm btn-danger" id="deleteBtnIcon" onClick="return confirm('Are you absolutely sure you want to delete?')" data-toggle="tooltip" data-placement="top" title="Delete car and all it's data?"><i class="fas fa-trash fa-2x m-auto"></i></button>
            </div>

  </div>


</div>

<!-- SIDE INFO CONTAINER END -->

<div class="container col-lg-7 col-md-10 col-sm-11 " style="margin-bottom: 100px; padding-bottom: 50px;" id="estimateCardContainer">
<!-- ESTIMATE CARD START 1 ------------------------------------------------------------------------------->
<?php 
	foreach($estimation as $est){ 
	$qetcutomerinfo = $db->rawQueryOne('select * from register where id = "'.$est['user_id'].'"');
	$userreviews = $db->rawQuery('select * from userratings where user_id ='.$est['user_id']);
     $totalreview = 0;
     if(count($userreviews) > 0)
     {
	 	 foreach($userreviews as $review)
	     {
		 	$totalreview += $review['ratings'];
		 }
	     $totlreviews = round(($totalreview/count($userreviews)));
	 }else
	 {
	 	$totalreview = 0;
	 }
     
?>

<div class="card col-md-12 ml-auto mr-auto mt-5 hoverable" id="cardContainer">
  <h5 class="card-header h5 row" id="estimateCardHeader" style="font-family: 'playfair';"><?php echo $qetcutomerinfo['businessname'] ; ?><a class="ml-auto mr-3" href="acceptedEstimatePage.php?vehicle_id=<?php echo $vehicle['vehicle_id'] ; ?>&estimate_id=<?php echo $est['id'] ; ?>">
      <span><h5 class="font-weight-bold" id="estimateAcceptedBtn"><?php if($est['status'] == 'Accepted'){ echo '<i class="fa fa-info-circle mr-2"></i><span id="estimateInfoText">Estimate Accepted</span>';} ?></h5></span></a></h5>
  <div class="card-body col-12 row" id="estimateCardBody">
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-0 col-xs-0">  
        <img class="car-img-top" src="<?php echo BASE_URL ; ?>images\logo\<?php echo $qetcutomerinfo['logo'] ; ?>" alt="Card image cap">
    </div>
<!-- DATE, RATING AND PROFILE START -->
    <div id="cardShopInfo" class=" col-xl-4 col-lg-4 col-md-4 col-sm-5 col-12 z-depth-sm-1">
    <h5 class="card-title" style="font-family: 'lora';"><?php echo $qetcutomerinfo['city'].', '.$qetcutomerinfo['state'] ; ?></h5>
    <p class="card-text" style="font-family: 'lora';">Rating:</span>
        <?php 
	        if($totalreview > 0)
	        {
				for($r=0; $r<$totlreviews;$r++){
			
        ?>
        	<i class="fa fa-star text-warning"></i>
        <?php } } else{ ?>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <?php } ?>(<?php echo $totalreview ; ?>)
    </p>
    <a href="shopProfile.php?userid=<?php echo $est['user_id'] ; ?>" style="font-family: 'lora';" class="text-warning">View Shop Profile</a>
  </div>
<!-- DATE, RATING AND PROFILE END -->

<!-- TOTAL, TURNAROUND TIME, MESSAGE SHOP START -->
  <div id="cardEstimateInfo" class=" col-xl-4 col-lg-4 col-md-4 col-sm-5 col-12">
    <h5 class="card-title">$<?php echo $est['total'] ; ?></h5>
    <p class="card-text">Turnaround Time:</span> <?php echo time_elapsed_string($est['created_at']); ; ?></p>
    <a href="#" data-toggle="modal" data-target="#chatmodal<?php echo $est['user_id'] ; ?>" style="font-family: 'lora';" class=""><i class="fa fa-envelope mr-2"></i>Message Shop</a>
  </div>
  <!-- TOTAL, TURNAROUND TIME, MESSAGE SHOP END -->

</div>
    <div class="mt-0 ">
        <hr>
        <div class="row ">

            <a href="#" data-toggle="modal" data-target="#modalEstimate<?php echo $est['id'] ; ?>"  id="estimateModalBtn" class="ml-sm-auto mr-auto"><i class="fas fa-clipboard fa-cb mr-1"></i><span id="viewEstimateText">View Estimate</span></a>
            <a href="<?php echo BASE_URL ; ?>controllers/AcceptEstimate.php?estimation_id=<?php echo $est['id'] ; ?>&vehicle_id=<?php echo $est['vehicle_id'] ; ?>" class="ml-auto mr-sm-auto text-danger mb-3" id="deleteEstimateBtn" onClick="return confirm('Are you absolutely sure you want to delete?')"><i class="fas fa-trash fa-tr"></i><span id="cardDeleteText">Delete Estimate</span> </a>
        </div>
    </div>
</div>


<!-- ESTIMATE MODAL START ----------------------------------------------------------------------------------------->
<div id="chatmodal<?php echo $est['user_id'] ; ?>" class="modal fade chatmodel" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        
        <h4 class="modal-title">Send a Message</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body popup-first-message">
        <div class="popup-main popupmain<?php echo $est['user_id'] ; ?> message row">
		  <aside class="col-md-3">
		    <figure>
		      
              <img alt="" src="<?php echo BASE_URL ; ?>images\logo\<?php echo $qetcutomerinfo['logo'] ; ?>" class="avatar" width="100">
		      <figcaption>
		        <?php echo $qetcutomerinfo['firstName']; ?><span class="user-away"><?php if($qetcutomerinfo['is_login'] == 1){ echo 'Online';}else{ echo 'Away' ; } ?></span>
		      </figcaption>
		    </figure>
		  </aside>
		  <form class="col-md-8 messageform<?php echo $est['user_id'] ; ?>" enctype="multipart/form-data">
		    
		  
		    <div class="type_msg">
            
            <div class="row" data-emojiarea data-type="image" data-global-picker="false">
            	<div class="col-md-12">
            		<div class="input_msg_write ta-container">
		              <textarea  class="write_msg<?php echo $est['user_id'] ; ?>" name="message" placeholder="Type a message" onkeyup="countChar(this)"></textarea>
		              <ul class="attachments js-attachments-stop" id="queuess"></ul>
		              <div class="controls">
				          <span class="char-count">
				            <strong>0</strong><!-- react-text: 34 --> / <!-- /react-text --><!-- react-text: 35 -->2500<!-- /react-text -->
				          </span>
				          <div class="message-action-bar">
					  <ul>
					    
					    
					    <li><span class="tooltips hint--top" data-hint="Max 1GB"><input type="file" name="message-attachment[]" class="image_file" id="first-message-attachments" multiple=""></span></li>
					    
					  </ul>
					</div>
				      </div>
		            </div>
		            
            	</div>
            	<div class="col-md-12">
            		
            	</div>
            </div>
          </div>
          <input type="button" class="btn-standard btn-green-grad btn-send" value="Send" data-ids="<?php echo $est['user_id'] ; ?>"></input>
		      <input type="hidden" name="shop_id" value="<?php echo $qetcutomerinfo['id'] ; ?>"></input>
		      <input type="hidden" name="customer_id" value="<?php echo $_SESSION['user_id'] ; ?>"></input>
		       <input type="hidden" name="sender_roleid" value="<?php echo $_SESSION['role_id'] ; ?>"></input>
		  </form>
		  <!-- react-empty: 40 -->
		</div>
		<div class="successmessage succesmsg<?php echo $est['user_id'] ; ?> row">
			<div class="col-md-12 text-center">
				<div class="progress-indicator"><div class="back-layer"></div><svg width="30" height="30" viewBox="-1 -1 71 71"></svg></div>
				<h3>Message Sent Successfully</h3>
				<br></br>
			</div>
		</div>
      </div>
    </div>

  </div>
</div>

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




<?php } ?>
<!-- ESTIMATE CARD END  --------------------------------------------------------------------------------------->

</div>

</div>


<!-- Footer -->
<footer class="page-footer font-small fixed-bottom" style="overflow: hidden; margin-top: 50px;">
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
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});

function countChar(val) 
		{
	        var len = val.value.length;
	        
	        $('.controls strong').text(len);
	        if (len >= 2500) {
	          $('.controls').addClass('max-length')
	        } else {
	          $('.controls').removeClass('max-length')
	        }
      };
      
      $('.btn-send').click(function(e){
      	var id = $(this).data('ids');
      	
	    var formData = $('.messageform'+id).serialize(); 
	    
        if($('.write_msg'+id).val() != '')
        {
	        var request = $.ajax({
	        type: 'POST',
	        url: '<?php echo BASE_URL ; ?>controllers/newChat.php',
	        dataType:'json',
	        data: formData,
	        success: function(data){                            
	            if(data.success)
	            {
					$('.succesmsg'+id).show('slow');
					$('.popupmain'+id).hide();
					$(".messageform"+id)[0].reset();
		            
					setTimeout(function(){
						//$('.successmessage').hide();
						$('#chatmodal'+id).modal('hide');
						//$('.popup-main').show('slow');
						
					},3000)
				}else
				{
					$('.succesmsg'+id).hide();
					$('.popupmain'+id).show('slow');
				}
	        },
	        error: function(msg){
	            alert(JSON.stringify(msg,null,4));
	        }
	    });
        }
      })
      
</script>
</body>
</html>