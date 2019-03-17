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
<?php
if(isset($_SESSION['Email'])){
$username=$_SESSION['Email'];
$query="select * from customer where Email='$username'";
$runquery=mysqli_query($con,$query);
$row=mysqli_fetch_array($runquery);
$customer_id=$row['customer_id'];	
$customer_name=$row['customer_name'];	
$Email=$row['Email'];	
$country=$row['country'];	
$city=$row['city'];
$contact=$row['contact'];
$address=$row['address'];
$customer_img=$row['customer_img'];	
?>
<form method="post" enctype="multipart/form-data">
<table height="400" style="border-radius:10%; border:3px solid #25373D; ">
<tr><td><img src="customerphoto/<?php echo $customer_img;?>" style="border-radius:10%;"/></td>
</tr>
<tr>
<td><input type="file" name="img"/></td>
</tr>
</table>
<table width="1000" height="500" border="2"style="border:3px solid #25373D;">
<tr>
<td align="center" style="background-color:#25373D;color:white;">Customer id</td>
<td><center><?php echo $customer_id;?></center></td>
</tr>
<tr>
<td align="center" style="background-color:#25373D;color:white;">Customer name</td>
<td><center><input type="text" name="customer_name" value="<?php echo $customer_name;?>"  size="50"/></center></td>
</tr>
<tr align="center">
<td style="background-color:#25373D;color:white;">Email</td>
<td><center><input type="text" name="Email" value="<?php echo $Email;?>" size="50"/><center></td>
</tr>
<tr align="center">
<td style="background-color:#25373D;color:white;">Country</td>
<td><center><input type="text" name="country" value="<?php echo $country;?>" size="50"/></center></td>
</tr>
<tr align="center">
<td style="background-color:#25373D;color:white;">Contact</td>
<td><center><input type="text" name="contact" value="<?php echo $contact;?>" size="50"/></center></td>
</tr>
<tr align="center">
<td style="background-color:#25373D;color:white;">City</td>
<td><center><input type="text" name="city" value="<?php echo $city;?>" size="50"/></center></td>
</tr>
<tr>
<td align="center"style="background-color:#25373D;color:white;">Address</td>
<td><center><input type="text" name="address" value="<?php echo $address;?>" size="80"/></center></td>
</tr>
<tr>
<td style="background-color:#25373D;position:relative;left:400px;" ><center><input type="submit" name="Update_Profile" value="Update Profile" style="width:150px; height:40px; color:white; background-color:#FEC606;"/></center></td>
</tr>
</table>
</form>
<?php }
else{
	echo"You need to be login first  if your account is not register than register your account and than logged in  ";
}
if(isset($_POST['Update_Profile'])){
	$name=$_POST['customer_name'];
	$cust_email=$_POST['Email'];
	$cust_country=$_POST['country'];
	$cust_contact=$_POST['contact'];
	$cust_city=$_POST['city'];
	$cust_add=$_POST['address'];
	$cust_img=$_FILES['img']['name'];
	$temp_name=$_FILES['img']['tmp_name'];
	$filepath="customerphoto/$cust_img";
move_uploaded_file($temp_name,$filepath);
	$qt="update customer set customer_name='$name',Email='$cust_email',country='$cust_country',city='$cust_city',contact='$cust_contact',address='$cust_add',customer_img='$cust_img' where customer_id='$customer_id'";
	$runqt=mysqli_query($con,$qt);
	if($runqt){
		echo'<script>alert("Profile has been updated")</script>';
		echo"<script>window.open('Editprofile.php','_self')</script>";
	}
}
 ?>
</div>
<div id="cat">
<table width="230" style="height:300px;" style="position:absolute;right:5px;" border="2">
<tr style="">
<td align="center" style="background-color:#25373D;color:white;width:300px;"><b>My Account</b></td>
</tr>
<tr>
<td align="center" style="width:300px; color:black;" ><a href="Profile.php" style="color:#2C82C9;">Profile</a></td>
</tr>
<tr>
<td align="center"style="width:300px; color:black;"><a href="customer_orders.php" style="color:#2C82C9;">Orders</a></td>
</tr>
<tr>
<td align="center"style="width:300px; color:black;"><a href="Editprofile.php" style="color:#2C82C9;">Edit The Profile</a></td>
</tr>
<tr>
<td align="center"style="color:#25373D;"><a href="changepassword.php" style="color:#2C82C9;">Change Password</a></td>
</tr>
</table>
</div>
</body>
</html>