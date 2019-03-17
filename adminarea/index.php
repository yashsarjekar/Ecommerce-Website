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
<?php if(isset($_SESSION['username'])){?>  

<?php }else{
	echo "<h5 style='float:right;position:relative;right:500px;'>You need to be logged in</h5>";
}?>
<div id="dito" style="width:300px;height:900px;background-color:#25373D;position:relative;top:40px;right:10px;">
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
<?php 
if(isset($_POST['insert_btn'])){
	$product_title=$_POST['product_title'];
	$cat_idc=$_POST['cat_idc'];
	$brand_id=$_POST['brand_id'];
	$product_price=$_POST['product_price'];
	$description=$_POST['description'];
	$keyword=$_POST['keyword'];
	$status='on';
	//image//
	$product_img1=$_FILES['img1']['name'];
	$product_img2=$_FILES['img2']['name'];
	//temp name of images//
    $tempname1=$_FILES['img1']['tmp_name'];
    $tempname2=$_FILES['img2']['tmp_name'];
//file path//
$filepath="productphotos/$product_img1";
$filepath1="productphotos/$product_img2";	
		move_uploaded_file($tempname1,$filepath);
		move_uploaded_file($tempname2,$filepath1);
		$yash="insert into products(cat_idc,brand_id,date,product_title,img1,img2,product_price,description,status,keyword) values('$cat_idc','$brand_id',NoW(),'$product_title','$product_img1','$product_img2','$product_price','$description','$status','$keyword')";
		$runyash=mysqli_query($con,$yash);
		if($runyash){
			echo'<script>alert("Product has been inserted successfully")</script>';
		}
	
	
}


?>