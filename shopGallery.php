<?php
    session_start();
    include('database_connection/connection.php');
    include('includes/variables.php'); 
    $query = "select * from register where  id = ". $_SESSION['user_id'];
    $user = $db->rawQueryOne($query);
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
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" />
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" />
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.11/css/mdb.min.css" rel="stylesheet" />
<link rel="stylesheet" text="text/css" href="./css/estimateForm.css" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
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
    #profileContainer {
        margin-top: 50px;
    }
    label {
        font-family: 'lora';
        font-size: 20px;
    }
    h4 {
        font-size: 36px;
        font-weight: 500;
        font-family: 'lora';
        color: grey;
        margin-bottom: 25px;
        letter-spacing: 2px;
    }
    .logoInput {
	width: 0.1px;
	height: 0.1px;
	opacity: 0;
	overflow: hidden;
	position: absolute;
	z-index: -1;
}
.logoInput + label {
    font-size: 20px;
    font-weight: 500;
    font-family: 'lora';
    color: white;
    border: solid 2px #0C6EAF;
    background-color: #0C6EAF;
    display: inline-block;
    padding: 10px 25px;
    transition: 0.5s;
    box-shadow: 0 0 5px black;
    cursor: pointer;
}

.logoInput:focus + label,
.logoInput + label:hover {
    background-color: rgba(12, 110, 175, 0);
    transition: 0.5s;
    color: #0C6EAF;
    box-shadow: 0 0 8px black;
}
.saveChangesBtn {
    font-size: 18px;
    font-weight: 500;
    font-family: 'lora';
    color: white;
    background-color: green; 
    border: solid 2px green;
    border-radius: 4px;
    padding: 5px 15px;
    width: 150px;
    /* box-shadow: 0 0 5px black; */
    transition: 0.5s;
}
.saveChangesBtn:hover {
    box-shadow: 0 0 5px black;
    transition: 0.5s;
    border: solid 2px green;
    background-color: transparent;
    color: green;
}

.previewBox {
  text-align: center;
  position: relative;
  width: 150px;
  height: 150px;
  margin-right: 10px;
  margin-bottom: 20px;
  float: left;
}
.previewBox img {
  height: 150px;
  width: 150px;
  padding: 5px;
  border: 1px solid rgb(232, 222, 189);
}
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
                <a class="dropdown-item" id="dropdownLink" href="shopProfile.php?userid=<?php echo $_SESSION['user_id'] ; ?>">Profile</a>  
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
    <li class="breadcrumb-item active text-white ml-4" >Profile Settings</li>
  </ol>
</nav>
<!-- PAGE HEADER END -->

    <div class="container" id="profileContainer">
    <div class="row">
        <div class="col-md-4">
          <?php if( isset($_SESSION['error'])): ?>
              <div class="alert alert-danger" id="error_message">	
                  <button type="button" class="close" data-dismiss="alert">&times;</button>				
                  <?php echo $_SESSION['error'];
                    unset($_SESSION['error']); 
                  
                  ?>							
              </div>
          <?php endif ?>
          <?php if( isset($_SESSION['success'])): ?>
              <div class="alert alert-success" id="success_messsage">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>				
                  <?php echo $_SESSION['success']; unset($_SESSION['success']);  ?>							
              </div>
          <?php endif ?>
          </div>
    </div>
    <div class="jumbotron bg-white">
        
        
             <form action="<?php echo BASE_URL ; ?>controllers/shop_gallery.php" method="post" enctype="multipart/form-data">
              <div class="row">
                  <div class="col-md-6">
                      <input type="file" class="form-control" id="images" name="images[]" onchange="preview_images();" multiple/>
                  </div>
                  <div class="col-md-6">
                      <input type="submit" class="btn btn-primary" name='submit_image' value="Upload Multiple Image"/>
                  </div>
              </div>
             </form>
        
             <div class="row" id="image_preview">
                 <?php 
                     $galleryquery = "select * from shopgallery where  user_id = ". $_SESSION['user_id'];
                     $gallery = $db->rawQuery($galleryquery);
                     foreach($gallery as $row)
                     {
                         echo "<div class='col-md-3'><img class='img-fluid' src='".BASE_URL.'images/gallery/'.$row['image']."'></div>";
                     }
                ?>     
             </div>
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

<!-- TAX CALCULATION FUNCTION START -->
<!-- FORMS TO BE SWITCHED ON RADIO CLICK START ------------------------------------->
<script type="text/javascript">
    
   
</script>
<!-- TAX CALCULATION FUNCTION END -->
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
<script>
function preview_images() 
{
 var total_file=document.getElementById("images").files.length;
 for(var i=0;i<total_file;i++)
 {
  $('#image_preview').append("<div class='col-md-3'><img class='img-fluid' src='"+URL.createObjectURL(event.target.files[i])+"'></div>");
 }
}
</script>


</body>
</html>
