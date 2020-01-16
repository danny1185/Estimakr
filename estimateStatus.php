<?php 
  session_start();
  include('includes/variables.php');
  require 'database_connection/connection.php';
  if(!isset($_SESSION['email'])){
	header("Location:signIn.php");
 }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Estimate Status</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="google" content="notranslate">
	<link href="https://fonts.googleapis.com/css?family=Lora&display=swap" rel="stylesheet">
<!-- Data Tables -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.jqueryui.min.css">
<link rel="stylesheet" type="text/css" href="css/util.css">
<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<link href="css/addons/datatables.min.css" rel="stylesheet">
<!-- Data Tables -->

<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.11/css/mdb.min.css" rel="stylesheet">

<link rel="stylesheet" text="text/css" href="./css/estimateStatus.css">
</head>
<body>





<div class="fluid">
	
  <!-- NAVBAR CONTAINER START -->

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
<!-- HEADER CONTAINER START -->
<nav class="navbar z-depth-2 mb-5" style="background-color: #324a5f; color: white; height: 55px; font-size: 26px; font-family: playfair;">

<ol class="breadcrumb mr-auto" style="font-size: 18px;">
    <li class="breadcrumb-item active text-white ml-4" >Estimate Status</li>
  </ol>
</nav>
<!-- HEADER CONTAINER END -->
<!-- PAGE HEADER END -->
<div class="container-fluid" id="savedEstimatesContainer">




<div class="container-table100 contianer-fluid bg-white">
		<!-- <div class="input-group md-form form-sm form-2 pl-0 w-25 mr-auto">
				<input class="form-control my-0 py-1" type="text" placeholder="Search" aria-label="Search">
				<div class="input-group-append">
				  <span class="input-group-text white lighten-3" id="searchIcon"><i class="fas fa-search text-grey"
					  aria-hidden="true"></i></span>
				</div>
			  </div>	 -->
</div>
<br>
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
<table id="dtEstimateStatus" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
		<thead>
			<tr class="text-center" id="columnLabel">
				<th id="rowNumber">#</th>
				<th id="columnLabelLg"><h5 id="label">Customer Name</h5></th>
				<th id="columnLabelLg"><h5 id="label">Job Title</h5></th>
				<th id="columnLabelSm"><h5 id="label">Status</h5></th>
				<th id="columnLabelSm"><h5 id="label">Invoice/Estimate #</h5></th>
				<th id="columnLabelSm"><h5 id="label">Date</h5></th>
				<th id="iconColumnLabelXs"><h5 id="label">Total$</h5></th>
				<th id="iconColumnLabelXs"><h5 id="label">Edit/View</h5></th>
				<th id="iconColumnLabelXs"><h5 id="label">Delete</h5></th>
			</tr>
		</thead>
		<div id="estimateListBody">
		<tbody>
			<?php
				$query = "select * from estimation where  user_id = ". $_SESSION['user_id'];
				$estimation = $db->rawQuery($query);
				
				$count = 1;
				if ( $estimation ){
					foreach ($estimation as $key => $row) {
					    $getcustomervehicle = $db->rawQueryOne("select * from vehicle where  vehicle_id = ". $row['vehicle_id']);
					    $getcustomername = $db->rawQueryOne("select * from register where  id = ". $row['user_id']);
						?>
						<tr>
							<td><?php echo $count++ ?></td>
							<td id="individualRowContainer"> 
								<?php echo $getcustomername['firstName']; echo "&nbsp"; echo $getcustomername['lastName']; ?>
							</td>
							<td ><?php echo $getcustomervehicle['year'].' '.$getcustomervehicle['make'].' '.$getcustomervehicle['model'] ; ?> <?php echo $row['year']; echo "&nbsp"; echo $row['make']; echo "&nbsp"; echo $row['model']; ?></td>
							<td ><?php echo $row['status']; ?></td>
							<td ><?php echo $row['id']; ?></td>
							<td ><?php echo $row['created_at']; ?></td>
							<td >$<?php echo $row['total']; ?></td>
							<td id="iconBtn">
								<?php if($row['status'] != 'Accepted'){ ?><a href="updatee.php?uid=<?php echo $row['id']; ?>" id="updatee">
								<button><i class="fas fa-edit fa-lg text-primary"></i></button>
                </a><?php } ?>
                <a href="#" data-toggle="modal" data-target="#modalEstimate<?php echo $row['id']; ?>" id="estimateModalBtn" class="ml-sm-auto mr-auto"><i class="fas fa-clipboard fa-1x mr-1"></i></a>

							</td>
							<td id="iconBtn">
								<a href="<?php echo BASE_URL?>controllers/estimation.php?estimation_id=<?php echo $row['id']; ?>" class="delete" onclick="return confirm('Are you sure ,you want to delete?')";>
								
								<button><i class="fas fa-minus-circle fa-lg text-danger"></i></button>
							</a>
							</td>
						</tr>
						<?php
					}	
				}else{
				   echo '<tr><td style="text-align:center" colspan="9">No Record Found <br><a role="button" href="estimateForm.php" style="font-size: 18px; font-weight: 400; color: #0C6EAF;" >Write Your First Estimate</a></td></tr>';
				}
			?>
		</tbody>
	</div>
		<tfoot>
		</tfoot>
	</table>
</div>
</div>

<?php foreach($estimation as $est){ 
$qetcutomerinfo = $db->rawQueryOne('select * from register where id = "'.$est['user_id'].'"');
?>
<!-- Modal: modalCart -->
<div class="modal fade" id="modalEstimate<?php echo $est['id'] ; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header" style="background-color: #324A5F;">
        <h4 class="modal-title" id="myModalLabel" style="color: white;"><?php echo $qetcutomerinfo['businessname'] ; ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span  aria-hidden="true" style="color: white; font-size: 26px;">×</span>
        </button>
      </div>
      <div class="row mt-4"> 
      <div class="col-md-4 ml-xl-5 ml-lg-5 ml-md-5 ml-0">
      	 <img class="car-img-top img-fluid" src="<?php echo BASE_URL ; ?>images\logo\<?php echo $qetcutomerinfo['logo'] ; ?>" alt="Card image cap">
      </div> 
       
        <div class="col-md-6 ml-5 ml-xl-5 ml-lg-5 ml-md-5 ml-0 mr-auto">
            <p class="blue-grey-text" style="font-family: 'lora'; margin-bottom: 0;"><span class="font-weight-bold">Customer:</span> <?php echo $qetcutomerinfo['firstName'] ; ?></p>    
            <p class="blue-grey-text" style="font-family: 'lora'; margin-bottom: 0;"><span class="font-weight-bold">Address:</span> <?php echo $qetcutomerinfo['address'].' '.$qetcutomerinfo['city'].' '.$qetcutomerinfo['state'] ; ?></p>    
            <p class="blue-grey-text" style="font-family: 'lora'; margin-bottom: 0;"><span class="font-weight-bold">Phone:</span> <?php echo $qetcutomerinfo['phone'] ; ?></p>    
            <p class="blue-grey-text" style="font-family: 'lora'; margin-bottom: 0;"><span class="font-weight-bold">Email:</span> <?php echo $qetcutomerinfo['email'] ; ?></p>    
            <p class="blue-grey-text" style="font-family: 'lora'; margin-bottom: 0;"><span class="font-weight-bold">Invoice Number:</span> <?php echo $est['id'] ; ?></p>    
        </div>
        </div>
        
    <!--Body-->
      <div class="modal-body">

        <table class="table table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>Labor Type</th>
              <th class="hiddenEstimateColumn">Labor Option</th>
              <th>Description</th>
              <th class="hiddenEstimateColumn">Part Type</th>
              <th class="hiddenEstimateColumn">Part Number</th>
              <th class="hiddenEstimateColumn">Tax</th>
              <th class="hiddenEstimateColumn">Hours</th>
              <th class="hiddenEstimateColumn">Labor Unit</th>
              <th>Price</th>
              <th>Cost</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            	$estimationdetails = $db->rawQuery('select * from estimation_table where estimation_id ='.$est['id']);
            	$lab = 1;
            	foreach($estimationdetails as $detl){ 
            ?>	
            
            <tr>
              <th scope="row"><?php echo $lab++; ?></th>
              <td><?php echo $detl['labour_type']; ?></td>
              <td class="hiddenEstimateColumn"><?php echo $detl['labour_option']; ?></td>
              <td><?php echo $detl['description']; ?></td>
              <td class="hiddenEstimateColumn"><?php echo $detl['part_type']; ?></td>
              <td class="hiddenEstimateColumn"><?php echo $detl['part_number']; ?></td>
              <td class="hiddenEstimateColumn"><i class="fas fa-times"></i></td>
              <td class="hiddenEstimateColumn"><?php echo $detl['hourly_rate']; ?></td>
              <td class="hiddenEstimateColumn"><?php echo $detl['labour_unit']; ?></td>

              <td><?php echo $detl['price']; ?></td>
              <td style="text-align:right;"><?php echo $detl['cost']; ?></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
        <hr>
        <!-- TOTALS START -->
            <div class="mt-4 mb-4 row pl-0 ml-auto mr-auto">

            <div class="container col-xl-8 col-lg-8 col-md-7 col-12 float-left ml-3 ml-auto mr-auto"> 
              <p class="mb-0" style="font-family: 'lora'; font-weight: bold; color: lightgrey;">Notes:</p>
              <hr class="mb-2 mt-0">
              <div class="">
                <p style="font-family: 'lora';">We can definately have this done and back on the road</p>
              </div>  
            </div>

            <div class="col-xl-3 col-lg-3 col-md-4 col-11 ml-auto mr-auto mt-3">
                <div class="row " style="font-family: 'lora';">
                    <h5 class=" font-weight-bold">Sub Total</h5>
                    <p class="mr-4 ml-auto">$<?php echo $est['sub_total'] ; ?></p>
                </div>
                <div class="row " style="font-family: 'lora';">
                    <h5 class="mr-5 font-weight-bold" >Tax</h5>
                    <p class="mr-4 ml-auto" style="margin-left: 30px;">$<?php echo $est['tax_percent'] ; ?></p>
                </div>
                <div class="row " style="font-family: 'lora';">
                    <h5 class="mr-3 font-weight-bold">Total</h5>
                    <p class="mr-4 ml-auto">$<?php echo $est['total_tax'] ; ?></p>
                </div>
              </div>
            </div>
        <!-- TOTALS END -->
        <!-- LABOR RATES START -->
            <table class="table table-hover container-fluid">
                <thead class="z-depth-2" style="background-color: #324A5F;">
                    <tr>
                        <th style="font-size: 18px; color: white;">Labor Type</th>
                        <th style="font-size: 18px; color: white;">Labor Rate</th>
                    </tr>
                </thead>
                <tbody>
                
                   <?php foreach($estimationdetails as $detls){ ?>
                    <tr>
                        <td><?php echo $detls['labour_type'] ; ?></td>
                        <td><?php echo $detls['labour_unit'] ; ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
            <!-- LABOR RATES END -->
      </div>
      <!--Footer-->          
      <button type="button" class="btn btn-outline-success btn-sm col-11 ml-auto mr-auto" data-dismiss="modal" >Accept Supplement</button>

      <div class="modal-footer row col-12 ml-auto mr-auto ">
      
          <a class="mr-xl-auto ml-xl-3 mr-lg-auto ml-lg-3 mr-md-auto ml-md-0 mr-sm-auto ml-sm-0 mr-auto ml-0" href="#" ><p id="modalEstimateHistoryBtn">Estimate <span class="mt-auto mb-auto" style="font-size: 13px; color: #324a5f;">12/24/2019 <span class="blue-grey-text">1:47pm</span></span></p></a>
          <a class="mr-xl-3 ml-xl-3 mr-lg-3 ml-lg-3 mr-md-0 ml-md-0 mr-sm-0 ml-sm-0 mr-auto ml-0" href="#" ><p id="modalEstimateHistoryBtn">Estimate <span class="mt-auto mb-auto" style="font-size: 13px; color: #324a5f;">12/25/2019 <span class="blue-grey-text">12:23pm</span></span></p></a>
          <a class="mr-xl-3 ml-xl-auto mr-lg-3 ml-lg-auto mr-md-1 ml-md-auto mr-sm-1 ml-sm-auto mr-auto ml-0" href="#" ><p id="modalEstimateHistoryBtn">Estimate <span class="mt-auto mb-auto" style="font-size: 13px; color: #324a5f;">12/27/2019 <span class="blue-grey-text">2:20pm</span></span></p></a>
     
     </div>
        
    </div>
  </div>
</div>
<?php } ?>




<script>
	$(document).ready(function () {
$('#dtEstimateStatus').DataTable();
$('.dataTables_length').addClass('bs-select');
});
	</script>
	<script>
	// Basic example
$(document).ready(function () {
$('#dtEstimateStatus').DataTable({
"searching": false // false to disable search (or any other option)
});
$('.dataTables_length').addClass('bs-select');
});
	</script>
<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.11/js/mdb.min.js"></script>

<!-- MDBootstrap Datatables  -->
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.jqueryui.min.js"></script>
<!-- MDBootstrap Datatables  -->
<script type="text/javascript" src="js/addons/datatables.min.js"></script>
<script src="js/main1.js"></script>
</body>
</html>