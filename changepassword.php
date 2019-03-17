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
	$Email=$_SESSION['Email'];
	$qt="select * from customer where Email='$Email'";
	$runqt=mysqli_query($con,$qt);
	$rowqt=mysqli_fetch_array($runqt);
	$customer_id=$rowqt['customer_id'];
	$customer_password=$rowqt['password'];
?>
<form type="post" enctype="multipart/form-data"> 
<table align="center" border="1" style="border:5px solid #25373D;position:relative;top:200px;" >
<tr>
<td align="center" style="background-color:#25373D;color:white;">Your Previous Password</td>
<td><input type="password" name="past_password" size="30" placeholder="type previous password"/></td>
</tr>
<tr>
<td align="center" style="background-color:#FEC606;color:white;">New Password</td>
<td><input type="password" name="new_password" size="30" placeholder="type new password"/></td>
</tr>
<tr>
<td align="center" style="background-color:#F29B34;color:white;position:relative;left:110px;"><input type="submit" name="save"  value="save" style="background-color:#E3000E;color:white; width:100px;height:30px;" /></td>
</tr>
</table>
</form>
<?php 
if(isset($_POST['save'])){
	$past_password=$_POST['past_password'];
	$new_password=$_POST['new_password'];
	$yt="update customer set password='$new_password' where Email='$Email'";
		$runquery=mysqli_query($con,$yt);
		if($runquery){
			echo'<script>alert("Password has been updated")</script>';
			echo"<script>window.open('changepassword.php','_self')</script>";
		}

}}else{
echo"You have to be logged in";	
}
?>
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