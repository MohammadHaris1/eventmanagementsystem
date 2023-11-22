<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
if(isset($_GET['cancel']))
		  {
		          mysqli_query($conn,"update event set eventStatus='0' where id = '".$_GET['id']."'");
                  $_SESSION['msg']="Event cancelled !!";
		  }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Vendor | Event History</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<link rel="icon" href="../../static/image/favi.ico">
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="../vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="../vendor/themify-icons/themify-icons.min.css">
		<link rel="stylesheet" href="../assets/css/styles.css">
	</head>
	<body>
		<div id="app">		
<?php include('include/sidebar.php');?>
			<div class="app-content">
				

					<?php include('include/header.php');?>
				<!-- end: TOP NAVBAR -->
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle">Vendor  | Event History</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>Vendor </span>
									</li>
									<li class="active">
										<span>Event History</span>
									</li>
								</ol>
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: BASIC EXAMPLE -->
						<div class="container-fluid container-fullw bg-white">
						

									<div class="row">
								<div class="col-md-12">
									
									<p style="color:red;"><?php echo htmlentities($_SESSION['msg']);?>
								<?php echo htmlentities($_SESSION['msg']="");?></p>	
									<table class="table table-hover" id="sample-table-1">
										<thead>
											<tr>
												<th class="center">#</th>
												<th class="hidden-xs">User Name</th>
												<th>Category</th>
												<th> Fee</th>
												<th>Event Date / Time </th>
												<th>Event Creation Date  </th>
												<th>Current Status</th>
												<th>Action</th>
												
											</tr>
										</thead>
										<tbody>
												<?php
												$sql=mysqli_query($conn,"select users.fullName as fname,event.*  from event join users on users.id=event.userId where event.userId='".$_SESSION['id']."'");
												$cnt=1;
												while($row=mysqli_fetch_array($sql))
												{
												?>

											<tr>
												<td class="center"><?php echo $cnt;?>.</td>
												<td class="hidden-xs"><?php echo $row['fname'];?></td>
												<td><?php echo $row['Category'];?></td>
												<td><?php echo $row['venFees'];?></td>
												<td><?php echo $row['eventDate'];?> / <?php echo
												 $row['eventTime'];?>
												</td>
												<td><?php echo $row['postingDate'];?></td>
												<td>
												<?php if(($row['userStatus']==1) && ($row['eventStatus']==1))  
												{
													echo "Active";
												}
												if(($row['userStatus']==0) && ($row['eventStatus']==1))  
												{
													echo "Cancel by user";
												}

												if(($row['userStatus']==1) && ($row['eventStatus']==0))  
												{
													echo "Cancel by you";
												}



												?></td>
												<td >
												<div class="visible-md visible-lg hidden-sm hidden-xs">
												<?php if(($row['userStatus']==1) && ($row['eventStatus']==1))  
												{ ?>

																									
													<a href="appointment-history.php?id=<?php echo $row['id']?>&cancel=update" onClick="return confirm('Are you sure you want to cancel this appointment ?')"class="btn btn-transparent btn-xs tooltips" title="Cancel Appointment" tooltip-placement="top" tooltip="Remove">Cancel</a>
													<?php } else {

														echo "Canceled";
														} ?>
												</div>
												<div class="visible-xs visible-sm hidden-md hidden-lg">
													<div class="btn-group" dropdown is-open="status.isopen">
														<button type="button" class="btn btn-primary btn-o btn-sm dropdown-toggle" dropdown-toggle>
															<i class="fa fa-cog"></i>&nbsp;<span class="caret"></span>
														</button>
														<ul class="dropdown-menu pull-right dropdown-light" role="menu">
															<li>
																<a href="#">
																	Edit
																</a>
															</li>
															<li>
																<a href="#">
																	Share
																</a>
															</li>
															<li>
																<a href="#">
																	Remove
																</a>
															</li>
														</ul>
													</div>
												</div></td>
											</tr>
											
											<?php 
$cnt=$cnt+1;
											 }?>
											
											
										</tbody>
									</table>
								</div>
							</div>
								</div>
						
						<!-- end: BASIC EXAMPLE -->
						<!-- end: SELECT BOXES -->
						
					</div>
				</div>
			</div>
			<!-- start: FOOTER -->
	<?php include('include/footer.php');?>
			<!-- end: FOOTER -->
		
		</div>
		<!-- start: MAIN JAVASCRIPTS -->
		<script src="../vendor/jquery/jquery.min.js"></script>
		<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
		
		<script src="../assets/js/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
	
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
