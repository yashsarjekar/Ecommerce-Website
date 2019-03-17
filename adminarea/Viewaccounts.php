<?php
require 'database/config.php';
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Insert Product</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body style="height:1000px;" background="city.jpg">
<div class="topnav" id="myTopnav">
<img src="logopic.png" style="width:100px;" />
  <a class="active" href="index.php">Dashboard</a>
<h2 style="position:relative;left:450px;"><b>Manage Your Contents</b></h2>
<h5 style="position:relative; bottom:60px;left:1200px;"><?php
if(!isset($_SESSION['username'])){
	echo "<a href='Admin_login.php'>Login</a>";
}else{
	echo "<a href='Admin_logout.php'>Logout</a>";
}
?></h5>
<h5 style=" float:left;position:relative;bottom:67px;left:1250px;">
<?php
if(!isset($_SESSION['username'])){
	echo "Welcome guest!";
}
else{
	echo $_SESSION['username'];
}
?></h5>
  </div>
  <table align="center" style="background-color:#3E4651;color:white;position:relative;top:100px;width:800px;">
  <tr style="background-color:#FCB941;">
  <th>customer id</th>
   <th>customer name</th>
    <th>Email</th>
	 <th>password</th>
	  <th>country</th>
	   <th>city</th>
	     <th>contacts</th>
		   <th>address</th>
		     <th>customer image</th>
  </tr>
<?php if(isset($_SESSION['username'])){
	$query="select * from customer";
	$runquery=mysqli_query($con,$query);
while($rowquery=mysqli_fetch_array($runquery)){
	$Payment_id=$rowquery['customer_id'];
	$customer_id=$rowquery['customer_name'];
	$invoice_no=$rowquery['Email'];
	$product_id=$rowquery['password'];
	$qty=$rowquery['country'];
	$order_status=$rowquery['city'];
	$contact=$rowquery['contact'];
	$address=$rowquery['address'];
	$customer_img=$rowquery['customer_img'];
	?>
<tr>
<td><center><?php echo $Payment_id;?></center></td>
<td><center><?php echo $customer_id;?></center></td>
<td><center><?php echo $invoice_no;?></center></td>
<td><center><?php echo $product_id;?></center></td>
<td><center><?php echo $qty;?></center></td>
<td><center><?php echo $order_status;?></center></td>
<td><center><?php echo $contact;?></center></td>
<td><center><?php echo $address;?></center></td>
<td><center><img src="customerphoto/<?php echo $customer_img;?>" style="width:100px;height:100px;"></center></td>
</tr>	
<?php }?>
</table>
<?php }else{
	echo "<h5 style='float:right;position:relative;right:500px;'>You need to be logged in</h5>";
}?>
<div id="dito" style="width:300px;height:900px;background-color:#25373D;position:relative;bottom:219px;right:10px;">
<table>
<tr>
<th style="color:white;width:300px;height:80px;background-color:#112233;position:relative;bottom:50px;font-size:40px;"><b>Admin area</b></th>
</tr>
<tr>
<th  style="color:white;width:300px;height:80px; position:relative;bottom:2px;font-size:25px;"><a href="insertproduct.php" style="color:white;">Insert Product</a></th>
</tr>
<tr>
<th style="color:white;width:300px;height:80px; position:relative;bottom:2px;font-size:25px;"><a href="Displayproduct.php" style="color:white;">Display All Products</a></th>
</tr>
<tr>
<th style="color:white;width:300px;height:80px; position:relative;bottom:2px;font-size:25px;"><a href="insertcat.php" style="color:white;">Insert Categories</a></th>
</tr>
<tr>
<th style="color:white;width:300px;height:80px; position:relative;bottom:2px;font-size:25px;"><a href="Displaycategories.php" style="color:white;">Display All Categories</a></th>
</tr>
<tr>
<th style="color:white;width:300px;height:80px; position:relative;bottom:2px;font-size:25px;"><a href="insertbrand.php" style="color:white;">Insert Brands</a></th>
</tr>
<tr>
<th style="color:white;width:300px;height:80px; position:relative;bottom:2px;font-size:25px;"><a href="branddisp.php" style="color:white;">Display All Brands</a></th>
</tr>
<tr>
<th style="color:white;width:300px;height:80px; position:relative;bottom:2px;font-size:25px;"><a href="Vieworder.php" style="color:white;">View Orders</a></th>
</tr>
<tr>
<th style="color:white;width:300px;height:80px; position:relative;bottom:2px;font-size:25px;"><a href="Viewpaypalorder.php" style="color:white;">View Paypal Orders</a></th>
</tr>
<tr>
<th style="color:white;width:300px;height:80px; position:relative;bottom:2px;font-size:25px;"><a href="Viewaccounts.php" style="color:white;">No Of Accounts</a></th>
</tr>
</table>
</div>
</body>
</html>