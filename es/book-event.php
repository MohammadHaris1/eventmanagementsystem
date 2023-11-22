<?php
session_start();
//error_reporting(0);
include('include/config.php');
if(!empty($_POST["email"])) {
	$email= $_POST["email"];
		
		$result =mysqli_query($conn,"SELECT email FROM users WHERE email='$email'");
		$count=mysqli_num_rows($result);
if($count>0)
{
echo "<span style='color:red'> Email already exists .</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	
	echo "<span style='color:green'> Email available for Registration .</span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}


if(isset($_POST['submit']))
{

$category=$_POST['category'];
$vendorid=$_POST['vendor'];
$userid=$_SESSION['id'];
$fees=$_POST['fees'];
$appdate=$_POST['appdate'];
$time=$_POST['apptime'];


	$query=mysqli_query($conn,"insert into event(category,vendorId,userId,Fees,eventDate,eventTime) values('$category','$vendorid','$userid','$fees','$appdate','$time')");
	if($query)
	{
		echo "<script>alert('Your event successfully booked');</script>";
	}

}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>User  | Book Event</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<link rel="icon" href="../static/image/favi.ico">
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
		
		<link rel="stylesheet" href="assets/css/styles.css">
		<script>
function getvendor(val) {
	$.ajax({
	type: "POST",
	url: "get_vendor.php",
	data:'categoryid='+val,
	success: function(data){
		$("#vendor").html(data);
	}
	});
}
</script>	


<script>
function getfee(val) {
	$.ajax({
	type: "POST",
	url: "get_vendor.php",
	data:'vendor='+val,
	success: function(data){
		$("#fees").html(data);
	}
	});
}
</script>	




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
									<h1 class="mainTitle">User | Book Event</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>User</span>
									</li>
									<li class="active">
										<span>Book Event</span>
									</li>
								</ol>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: BASIC EXAMPLE -->
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12">
									
									<div class="row margin-top-30">
										<div class="col-lg-8 col-md-12">
											<div class="panel panel-white">
												<div class="panel-heading">
													<h5 class="panel-title">Book Event</h5>
												</div>
												<div class="panel-body">
								<p style="color:red;"><?php echo htmlentities($_SESSION['msg1']);?>
								<?php echo htmlentities($_SESSION['msg1']="");?></p>	
													<form role="form" name="book" method="post" >
															<div class="form-group">
															<label for="category">
																Category
															</label>
							<select name="category" class="form-control" onChange="getvendor(this.value);" required="required">
																<option value="">Select Category</option>
																<?php $ret=mysqli_query($conn,"select * from vendorcategory");
																while($row=mysqli_fetch_array($ret))
																{
																?>
																<option value="<?php echo htmlentities($row['category']);?>">
																	<?php echo htmlentities($row['category']);?>
																</option>
																<?php } ?>
																
															</select>
														</div>
														<div class="form-group">
															<label for="vendor">
															Vendor
															</label>
															<select name="vendor" class="form-control" id="vendor" onChange="getfee(this.value);" required="required">
															<option value="">Select vendor</option>
															</select>
														</div>
														<div class="form-group">
															<label for="fees">
																 Fees
															</label>
					   										 <select name="fees" class="form-control" id="fees"  readonly>
						
															</select>
														</div>
														
														<div class="form-group">
															<label for="EventDate">
																Date
															</label>
															<input class="appdate" name="appdate"  type="date" required="required">
														</div>
														
														<div class="form-group">
															<label for="Eventtime">
														
														Time
													
															</label>
														<input class="apptime" name="apptime" type="time" required="required">
														</div>														
														
														<button type="submit" name="submit" class="btn btn-o btn-primary">
															Submit
														</button>
													</form>
												</div>
											</div>
										</div>
											
											</div>
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
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

		<script src="assets/js/main.js"></script>
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
