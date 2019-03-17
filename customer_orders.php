<?php
require 'database/config.php';
include("functions/function.php");
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Mainpage</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color:#E0E4CC" id="bodystyle" >

<div class="topnav" id="myTopnav">

<img src="logopic.png" />
  <a class="active" href="index.php">Home</a>
  <a href="#news">News</a>
  <a href="#contact">Contact</a>
  <a href="#about">About</a>
  <a href="Myaccount.php">My Account</a>
   <form method="get" action="search.php" enctype="multipart/form-data">
  <label id="searchlabel">Search</label>
  <input type="search" id="search" name="search"/>
  <input type="submit" name="search_btn" id="search_btn" value="Search"/>
</form>
<div id="item">
<h5 style="position:relative;bottom:20px; right:30px;"><?php item();?></h5>
<h5 style="position:relative; bottom:60px;right:20px;"><?php
if(!isset($_SESSION['Email'])){
	echo "<a href='customer_login.php'>Login</a>";
}else{
	echo "<a href='logout.php'>Logout</a>";
}
?></h5>
<h5 style=" float:right;position:relative;bottom:115px;left:60px;">
<?php
if(!isset($_SESSION['Email'])){
	echo "Welcome guest!";
}
else{
	echo $_SESSION['Email'];
}
?></h5>
</div>
 <a href="cart.php" class="logo"><img src="cart.png" id="carticon" style="postion:"/></a>
  </div> 
<div id="pagelayout">
<h3 style="position:relative;left:300px;top:300px;">Offline payments Details</h3>
<table  width="800" align="center"style="border:3px solid #25373D;position:relative;top:300px;">
<tr style="background-color:#25373D;color:white;">
<th>Order no</th>
<th>Due Amount</th>
<th>Invoice No</th>
<th>Total Product</th>
<th>Paid/Unpaid</th>
<th>Status</th>
</tr>
<?php
if(isset($_SESSION['Email'])){
	$Email=$_SESSION['Email'];
	$qt="select * from customer where Email='$Email'";
	$runqt=mysqli_query($con,$qt);
	$rowqt=mysqli_fetch_array($runqt);
	$customer_id=$rowqt['customer_id'];
	$query="select * from customer_orders where customer_id='$customer_id'";
	$runquery=mysqli_query($con,$query);
	$query1="select * from paypal where customer_id='$customer_id'";
	$runquery1=mysqli_query($con,$query1);
	while($row=mysqli_fetch_array($runquery)){
	$order_id=$row['order_id'];	
	$due_amount=$row['due_amount'];
	$invoice_no=$row['invoice_no'];
	$total_product=$row['total_products'];
	$order_date=$row['order_date'];
	$order_status=$row['order_status'];
	
?>

<tr>
<td><center><?php echo $order_id;?></center></td>
<td><center>$<?php echo $due_amount;?></center></td>
<td><center><?php echo $invoice_no;?></center></td>
<td><center><?php echo $total_product;?></center></td>
<td><center><?php echo $order_status;?></center></td>
<td><a href="Pay.php" style="color:#E3000E;">Confirm if Paid</a></td>
</tr>
<?php } }
else{
	echo"You need to be logged in";
}?>
</table>
<h3 style="position:relative;left:300px;top:500px;">Online Payments Details</h3>
<table  width="800" align="center"style="border:3px solid #25373D;position:relative;top:500px;">
<tr style="background-color:#25373D;color:white;">
<th>Payment Id</th>
<th>Transection Id</th>
<th>Amount</th>
<th>Status</th>
</tr>
<?php
if(isset($_SESSION['Email'])){
	$Email=$_SESSION['Email'];
	$qt="select * from customer where Email='$Email'";
	$runqt=mysqli_query($con,$qt);
	$rowqt=mysqli_fetch_array($runqt);
	$customer_id=$rowqt['customer_id'];
	$query1="select * from paypal where customer_id='$customer_id'";
	$runquery1=mysqli_query($con,$query1);
	while($row1=mysqli_fetch_array($runquery1)){
	$order_id=$row1['payment_id'];	
	$due_amount=$row1['transection_no'];
	$invoice_no=$row1['amount'];
	$order_status=$row1['status'];
	
?>

<tr>
<td><center><?php echo $order_id;?></center></td>
<td><center><?php echo $due_amount;?></center></td>
<td><center>$<?php echo $invoice_no;?></center></td>
<td><center><?php echo $order_status;?></center></td>
</tr>
<?php } }
else{
	echo"You need to be logged in";
}?>
</table>
</div>
<div id="cat">
<table width="230" style="height:300px;" style="position:absolute;right:5px;" border="2">
<tr style="">
<td align="center" style="background-color:#25373D;color:white;width:300px;"><b>My Account</b></td>
</tr>
<tr>
<td align="center" style="width:300px; color:black;" ><a href="Profile.php"style="color:#2C82C9;">Profile</a></td>
</tr>
<tr>
<td align="center"style="width:300px; color:black;"><a href="customer_orders.php" style="color:#2C82C9;">Orders</a></td>
</tr>
<tr>
<td align="center"style="width:300px; color:black;"><a href="Editprofile.php" style="color:#2C82C9;">Edit The Profile</a></td>
</tr>
<tr>
<td align="center"style="color:#25373D;"><a href="changepassword.php"style="color:#2C82C9;">Change Password</a></td>
</tr>
</table>
</div>
</body>
</html>