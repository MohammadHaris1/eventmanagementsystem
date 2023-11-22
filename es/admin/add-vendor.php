<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

if(isset($_POST['submit']))
{
	$vencategory=$_POST['VendorCategory'];
$venname=$_POST['venname'];
$venfees=$_POST['venfees'];
$vencontactno=$_POST['vencontact'];
$venemail=$_POST['venemail'];
$password=md5($_POST['npass']);
$sql=mysqli_query($conn,"insert into vendor(category,vendorName,fees,contactno,venEmail,password) values('$vencategory','$venname','$venfees','$vencontactno','$venemail','$password')");
if($sql)
{
echo "<script>alert('Vendor info added Successfully');</script>";
echo "<script type='text/javascript'> document.location = 'location:manage-vendor.php'; </script>";

}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Admin | Add Vendor</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<link rel="icon" href="../../static/image/favi.ico">
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="../vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="../vendor/themify-icons/themify-icons.min.css">
	
		<link rel="stylesheet" href="../assets/css/styles.css">
<script type="text/javascript">
function valid()
{
 if(document.adddoc.npass.value!= document.adddoc.cfpass.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.adddoc.cfpass.focus();
return false;
}
return true;
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
									<h1 class="mainTitle">Admin | Add Vendor</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>Admin</span>
									</li>
									<li class="active">
										<span>Add Vendor</span>
									</li>
								</ol>
							</div>
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
													<h5 class="panel-title">Add Vendor</h5>
												</div>
												<div class="panel-body">
									
													<form role="form" name="addven" method="post" onSubmit="return valid();">
														<div class="form-group">
															<label for="VendorCategory">
																Vendor Specialization
															</label>
															<select name="VendorCategory" class="form-control" required="required">
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
															<label for="vendorname">
																 Vendor Name
															</label>
														<input type="text" name="venname" class="form-control"  placeholder="Enter Vendor Name" required>
														</div>


														
														<div class="form-group">
															<label for="venfees">
															Vendor  Fees
															</label>
														<input type="text" name="venfees" class="form-control"  placeholder="Enter Vendor Fees" required>
														</div>
	
														<div class="form-group">
														<label for="venfees">
														Vendor Contact no
															</label>
														<input required minlength="10" type="text" name="vencontact" class="form-control"  placeholder="Enter Vendor  Contact no" required>
														</div>

														<div class="form-group">
														<label for="venfees">
														Vendor Email
															</label>
														<input type="email" name="venemail" class="form-control"  placeholder="Enter Vendor  Email id" required>
														</div>



														
														<div class="form-group">
															<label for="exampleInputPassword1">
																 Password
															</label>
														<input required minlength="6" type="password" name="npass" class="form-control"  placeholder="New Password" required="required">
														</div>
														
															<div class="form-group">
															<label for="exampleInputPassword2">
																Confirm Password
															</label>
														<input required minlength="6" type="password" name="cfpass" class="form-control"  placeholder="Confirm Password" required="required">
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
									<div class="col-lg-12 col-md-12">
											<div class="panel panel-white">
												
												
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
		
		</div>
		<!-- start: MAIN JAVASCRIPTS -->
		<script src="../vendor/jquery/jquery.min.js"></script>
		<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
		
		<script src="../assets/js/main.js"></script>
	
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
