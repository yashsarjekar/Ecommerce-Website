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
<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
Normaldisplay();
Normaldisplaycategories();
Normaldisplaybrand();
?>
</div>
<div id="cat">
<div id="cate">
<h3 align="center">Categories</h3>
</div>
<table align="center">
<?php cat();?>
</table>
<div id="brand">
<h3 align="center">Brands</h3>
</div>
<table align="center">
<?php brand();?>
</table>
</div>

</body>
</html>