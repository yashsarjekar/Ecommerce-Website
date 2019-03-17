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
<?php
	if(isset($_GET['prod_id'])){
     $product_id=$_GET['prod_id'];
	$query="select * from products where product_id='$product_id'";
$runquery=mysqli_query($con,$query);
while($rowdata=mysqli_fetch_array($runquery)){
$product_title=$rowdata['product_title'];
$product_id=$rowdata['product_id'];
$product_img=$rowdata['img1'];
$product_price=$rowdata['product_price'];
$product_desc=$rowdata['description'];
$product_img1=$rowdata['img2'];
$product_status=$rowdata['status']; 
echo"<table>
<tr rowspan='3'>
<td><img src='adminarea/productphotos/$product_img'> </td>
<td><img src='adminarea/productphotos/$product_img1'> </td>
</tr>
<tr>
<td>Product Title:</td>
<td><h5>$product_title</h5></td>
</tr>
<tr>
<td>Product Price:</td>
<td><h5>$product_price</h5></td>
</tr>
<tr>
<td>Product Description:</td>
<td><h5>$product_desc</h5></td>
</tr>
<tr>
<td>Product Status:</td>
<td><h5>$product_status</h5></td>
</tr>
<tr>
<td colspan='2'><center><a href='Details.php?prod_id=$product_id'><input method='post' type='submit' name='addtocart'style='background-color:#FD5B03; color:white; width:120px; height:50px;' value='ADDTOCART' /></a></center></td>
</tr>
</table>

";
}
		
	}

addtocart();

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