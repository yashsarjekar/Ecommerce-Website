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
  <table align="center" style="background-color:#3E4651;color:white;position:relative;top:100px;width:500px;">
  <tr style="background-color:#FCB941;">
  <th>Categories id</th>
   <th>Categories</th>
   <th>Delete</th>
  </tr>
<?php if(isset($_SESSION['username'])){
	$query="select * from brand";
	$runquery=mysqli_query($con,$query);
	while($rowquery=mysqli_fetch_array($runquery)){
		$b_id=$rowquery['brand_id'];
		$c_title=$rowquery['brand_title'];
	?>
<tr>
<td><center><?php echo $b_id;?></center></td>
<td><center><?php echo $c_title;?></center></td>
<td><center><a href="Deletecate.php?c_id=<?php echo $b_id;?>" style="color:white;">Delete</a></center></td>
</tr>	
	<?php }?>
	</table>
<?php	}else{
	echo "<h5 style='float:right;position:relative;right:500px;'>You need to be logged in</h5>";
}?>
<div id="dito" style="width:300px;height:900px;background-color:#25373D;position:relative;bottom:200px;right:10px;">
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
<th style="color:white;width:300px;height:80px; position:relative;bottom:2px;font-size:25px;"><a href="insertproduct.php" style="color:white;">Insert Brands</a></th>
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