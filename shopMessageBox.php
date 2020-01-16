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
<meta name="google" content="notranslate">
<!-- Bootstrap CSS -->
<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.11/css/mdb.min.css" rel="stylesheet">
<title>Car Details</title>
<link rel="stylesheet" href="css/shopMessageBox.css">
</head>

<body>
<style>
  .my-custom-scrollbar {
      position: relative;
      height: 550px;
      overflow: auto;
    }
    .card-img-35 {
      width: 35px;
    }
    .mt-3p {
      margin-top: 3px;
    }

</style>

</head>
<body>
  <!-- NAVBAR CONTAINER START -->
<!--<nav class="navbar navbar-expand-lg z-depth-0" id="mainNavBar"> <a class="navbar-brand" id="brandLink" href="#" >Estimakr</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav col-md-3 ml-md-auto" style="margin-right:150px;">
      </ul>
      <form class="form-inline my-2 my-lg-0" style="margin-right:100px;">
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
<!-- PAGE HEADER START -->
<nav class="navbar" style="background-color: #324a5f; color: white; height: 55px; font-size: 18px; font-family: playfair;">
<ul class="navbar-nav">
  <li class="nav-item ml-5">Messages</li>
</ul>
</nav>
<!-- PAGE HEADER END -->




<div class="container-fluid row p-0 mb-5">
  <div class="container-fluid col-xl-3" id="userSelectMainContainer">
    <ul>
      <!-- USER SELECT INDIVIDUAL CONTAINER -->
     
        <li class="row"  id="userSelectIndividualContainer">
          <i class="fa fa-user-circle fa-3x" id="userSelectAvatar"></i>
        <div  id="userSelectShopInfo">
          <p class="title mb-0" id="userSelectShopName">Bruce Wayne</p>
          <div class="row" id="userSelectSecondLine">
          <a href="estimateDetailsPage.php" class="nav-item" id="userSelectEstimateDetailsBtn">2004 Honda Accord</a>
          <p id="userSelectDate"><span class="text-success" id="userSelectLastMessage">Last Message:</span> 12/13/2019</p>
        </div>
        </div>
      </li>
    
      <!-- USER SELECT INDIVIDUAL CONTAINER -->
      <!-- USER SELECT INDIVIDUAL CONTAINER -->
     
      <li class="row"  id="userSelectIndividualContainer">
          <i class="fa fa-user-circle fa-3x" id="userSelectAvatar"></i>
        <div  id="userSelectShopInfo">
          <p class="title mb-0" id="userSelectShopName">Jesse James</p>
          <div class="row" id="userSelectSecondLine">
          <a href="estimateDetailsPage.php" class="nav-item" id="userSelectEstimateDetailsBtn">2004 Honda Accord</a>
          <p id="userSelectDate"><span class="text-success" id="userSelectLastMessage">Last Message:</span> 12/13/2019</p>
        </div>
        </div>
      </li>
    
      <!-- USER SELECT INDIVIDUAL CONTAINER -->
      <!-- USER SELECT INDIVIDUAL CONTAINER -->
     
      <li class="row"  id="userSelectIndividualContainer">
          <i class="fa fa-user-circle fa-3x" id="userSelectAvatar"></i>
        <div  id="userSelectShopInfo">
          <p class="title mb-0" id="userSelectShopName">Barry Allen</p>
          <div class="row" id="userSelectSecondLine">
          <a href="estimateDetailsPage.php" class="nav-item" id="userSelectEstimateDetailsBtn">2004 Honda Accord</a>
          <p id="userSelectDate"><span class="text-success" id="userSelectLastMessage">Last Message:</span> 12/13/2019</p>
        </div>
        </div>
      </li>
    
      <!-- USER SELECT INDIVIDUAL CONTAINER -->
      <!-- USER SELECT INDIVIDUAL CONTAINER -->
     
      <li class="row"  id="userSelectIndividualContainer">
          <i class="fa fa-user-circle fa-3x" id="userSelectAvatar"></i>
        <div  id="userSelectShopInfo">
          <p class="title mb-0" id="userSelectShopName">John Jones</p>
          <div class="row" id="userSelectSecondLine">
          <a href="estimateDetailsPage.php" class="nav-item" id="userSelectEstimateDetailsBtn">2004 Honda Accord</a>
          <p id="userSelectDate"><span class="text-success" id="userSelectLastMessage">Last Message:</span> 12/13/2019</p>
        </div>
        </div>
      </li>
    
      <!-- USER SELECT INDIVIDUAL CONTAINER -->
      
    </ul>
  </div>

  
  <div class="container-fluid col-xl-8">

<!-- Section: Block Content -->
<section>
  <div class="card">
    <!-- CHAT BOX SHOP MENU START -->
    <nav class="navbar z-depth-0" >
          <ul class="navbar-nav col-12" id="chatBoxUserMenu">
          <li class="row" >
              <i class="fa fa-user-circle fa-2x" id="chatBoxShopAvatar"></i>
            
              <h1 id="chatBoxUserMenuShopName">Jesse James</h1>
             
                
<!-- ESTIMATE SUBMIT MODEL START ------------------------------------------------------------------ -->

<!-- Button trigger modal -->
<a type="button" class="ml-4 mr-2 mt-auto mb-auto" data-toggle="modal" data-target="#basicExampleModal" style="font-size: 14px;">
  View most recent estimate<i class="ml-1 fas fa-question-circle"></i>
</a>

<!-- Modal -->
<div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-fluid container" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Jesse James</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Import Recent Estimate</button>
        <button type="button" class="btn btn-primary btn-sm btn-outline-blue-grey">Submit Estimate</button>
      </div>
    </div>
  </div>
</div>

<!-- ESTIMATE SUBMIT MODEL END ------------------------------------------------------------------ -->

<!-- ESTIMATE SUBMIT MODEL START ------------------------------------------------------------------ -->

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#basicExampleModal">
  <i class="fas fa-clipboard mr-2"></i>Submit Estimate
</button>

<!-- Modal -->
<div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-fluid container" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Jesse James</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Import Recent Estimate</button>
        <button type="button" class="btn btn-primary btn-sm btn-outline-blue-grey">Submit Estimate</button>
      </div>
    </div>
  </div>
</div>

<!-- ESTIMATE SUBMIT MODEL END ------------------------------------------------------------------ -->

            </li>
          </ul>
        </nav>
     <!-- CHAT BOX SHOP MENU END -->
    <div class="card-body my-custom-scrollbar">
      <div class="media mb-3">
        <i class="avatar rounded-circle  z-depth-1 d-flex mr-3 fa fa-user-circle fa-2x text-primary"></i>
        <div class="media-body">
          <p class="mt-0 font-weight-bold small mb-0" id="chatBoxIndividualMessageName">Me<span class="text-muted small mt-3p ml-2" id="chatBoxIndividualMessageDate">12 Nov 3:00 PM</span></p>
          <p class="mb-0 font-weight-light small  lighten-2 rounded" id="chatBoxIndividualMessage">Doe's your car have pearl in the paint job?</p>
        </div>
      </div>

       
      
      <div class="media mb-3">
        <i class="avatar rounded-circle  z-depth-1 d-flex mr-3 fa fa-user-circle fa-2x "></i>
        <div class="media-body">
          <p class="mt-0 font-weight-bold small mb-0" id="chatBoxIndividualMessageName">Jesse<span class="text-muted small mt-3p ml-2" id="chatBoxIndividualMessageDate">12 Nov 3:05 PM</span></p>
          <p class="mb-0 font-weight-light small lighten-2 rounded" id="chatBoxIndividualMessage">You better believe it!</p>
        </div>
      </div>


        <div class="media mb-3">
        <i class="avatar rounded-circle  z-depth-1 d-flex mr-3 fa fa-user-circle fa-2x text-primary"></i>
        <div class="media-body">
          <p class="mt-0 font-weight-bold small mb-0" id="chatBoxIndividualMessageName">Me<span class="text-muted small mt-3p ml-2" id="chatBoxIndividualMessageDate">12 Nov 3:16 PM</span></p>
          <p class="mb-0 font-weight-light small lighten-2 rounded" id="chatBoxIndividualMessage">Great. Just making sure. Thanks</p>
        </div>
      </div>


      <div class="media mb-3">
        <i class="avatar rounded-circle  z-depth-1 d-flex mr-3 fa fa-user-circle fa-2x "></i>
        <div class="media-body">
          <p class="mt-0 font-weight-bold small mb-0" id="chatBoxIndividualMessageName">Jesse<span class="text-muted small mt-3p ml-2" id="chatBoxIndividualMessageDate">12 Nov 3:22 PM</span></p>
          <p class="mb-0 font-weight-light small lighten-2 rounded" id="chatBoxIndividualMessage">No problem.</p>
        </div>
      </div>
    </div>
    <h5 class="mb-0 container-fluid pl-3 z-depth-2" id="chatBoxAutoBodyHeader">Customer Message</h5>
  
    <div class="card-footer white py-3">
      <div class="form-group mb-0">
        <textarea class="form-control rounded-0" id="exampleFormControlTextarea1" rows="1" placeholder="Type message..."></textarea>
        <div class="text-right pt-2">
          <button class="btn btn-primary btn-sm mb-0 mr-0">Send</button>
        </div>
      </div>
    </div>
  </div>

</section>
<!-- Section: Block Content -->

</div>
 
  

  
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
<script>var myCustomScrollbar = document.querySelector('.my-custom-scrollbar');
var ps = new PerfectScrollbar(myCustomScrollbar);

var scrollbarY = myCustomScrollbar.querySelector('.ps.ps--active-y>.ps__scrollbar-y-rail');

myCustomScrollbar.onscroll = function() {
  scrollbarY.style.cssText = `top: ${this.scrollTop}px!important; height: 250px; right: ${-this.scrollLeft}px`;
}
</script>
<script>// Data Picker Initialization
$('.datepicker').pickadate();</script>
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

</body>
</html>
</div>
</body>
</html>