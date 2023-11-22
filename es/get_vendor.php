<?php
include('include/config.php');
if(!empty($_POST["categoryid"])) 
{

 $sql=mysqli_query($conn,"select vendorName,id from vendor where category='".$_POST['categoryid']."'");?>
 <option selected="selected">Select Vendor </option>
 <?php
 while($row=mysqli_fetch_array($sql))
 	{?>
  <option value="<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['vendorName']); ?></option>
  <?php
}
}


if(!empty($_POST["vendor"])) 
{

 $sql=mysqli_query($conn,"select Fees from vendor where id='".$_POST['vendor']."'");
 while($row=mysqli_fetch_array($sql))
 	{?>
 <option value="<?php echo htmlentities($row['Fees']); ?>"><?php echo htmlentities($row['Fees']); ?></option>
  <?php
}
}

?>

