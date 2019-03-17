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
	echo "<a href='CheckOut.php'>Login</a>";
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
 <a href="cart.php" class="logo"><img src="cart.png" id="carticon"/></a>
  </div>
<div id="pagelayout">
<form method="post" enctype="multipart/form-data">
<table width="900" align="center" bgcolor="#E0E4CC" style="border-radius:5%; border:10px;">
<tr align="center" style="background-color:#FEC606;color:white;">
<th>Remove</th>
<th>Product</th>
<th>Product Title</th>
<th>Quantity</th>
<th>Price</th>
<th>Sub Total</th>
</tr>
<ul></ul>
<?php cartdisplay();?>
</table>
</div>
<div id="cat">
<div id="cate">
<h3 align="center">Categories</h3>
</div>
<center>
<?php cat();?>
</center>
<div id="brand">
<h3 align="center">Brands</h3>
</div>
<center>
<?php brand();?>
</center>
</div>

</body>
</html>