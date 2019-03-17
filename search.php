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
  <input type="button" name="search_btn" id="search_btn" value="Search"/>
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
<?php
if(isset($_GET['search_btn'])){
     $keyword=$_GET['search'];
	$query="select * from products where keyword like '%$keyword%'";
$runquery=mysqli_query($con,$query);
while($rowdata=mysqli_fetch_array($runquery)){
$product_title=$rowdata['product_title'];
$product_id=$rowdata['product_id'];
$product_img=$rowdata['img1'];
$product_price=$rowdata['product_price'];
echo"
<section class='products'>   
 <div class='product-card'>
    <div class='product-image'>
      <img src='adminarea/productphotos/$product_img'>
    </div>
    <div class='product-info'>
     <a href='Details.php?prod_id=$product_id'><h5>$product_title</h5></a>
      <h6>$product_price</h6>
    </div>
	</div>
  </section>
";
}
		
	}
?>
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