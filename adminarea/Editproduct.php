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
  <a class="active" href="Dashboard.php">Dashboard</a>
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
<?php if(isset($_SESSION['username'])){
	if(isset($_GET['p_id'])){
		$pro_id=$_GET['p_id'];
		$query="select * from products where product_id='$pro_id'";
		$runquery=mysqli_query($con,$query);
		$row=mysqli_fetch_array($runquery);
		$product_title=$row['product_title'];
		$prod_img1=$row['img1'];
		$prod_img2=$row['img2'];
		$prod_price=$row['product_price'];
		$prod_cat=$row['cat_idc'];
		$prod_brand=$row['brand_id'];
		$prod_desc=$row['description'];
		$prod_keyword=$row['keyword'];
		$prod_status=$row['status'];
		$query1="select * from categories where cat_idc='$prod_cat'";
		$runquery1=mysqli_query($con,$query1);
		$rowquery1=mysqli_fetch_array($runquery1);
		$cat_title=$rowquery1['cat_title'];
		$query2="select * from brand where brand_id='$prod_brand'";
		$runquery2=mysqli_query($con,$query2);
		$rowquery2=mysqli_fetch_array($runquery2);
		$brand_title=$rowquery2['brand_title'];
	}?>  
<form method="post" action="Editproduct.php" enctype="multipart/form-data">
<table border="2" align="center" style="background-color:#7CEECE;position:relative;top:200px;">
<tr>
<td><center><h2>Insert Product</h2></center></td>
</tr>
<tr>
<td>Product Title </td>
<td><input type="text" name="product_title" value="<?php echo $product_title;?>"/></td>
</tr>
<tr>
<td>Product Categories </td>
<td><select name="cat_idc">
<option><?php echo $cat_title;?></option>
<?php
$check="select * from categories";
$run=mysqli_query($con,$check);
while($rowcat=mysqli_fetch_array($run)){
$catid=$rowcat['cat_idc'];
$cat_title=$rowcat['cat_title'];
echo "<option value='$catid'>$cat_title</option>";
}
 ?>
</select>
</td>
</tr>
<tr>
<td>Product Brand </td>
<td><select name="brand_id">
<option><?php echo $brand_title;?></option>
<?php
$check="select * from brand";
	$run=mysqli_query($con,$check);
	while($rowbrand=mysqli_fetch_array($run)){
		$brand_id=$rowbrand['brand_id'];
		$brand_title=$rowbrand['brand_title'];
	echo "<option value='$brand_id'>$brand_title</option>";
	}
	?>
</select></td>
</tr>
<tr>
<td>Product image1 </td>
<td><img src="productphotos/<?php echo $prod_img1;?>" style="width:50px;height:50px;"/></td>
<td><input type="file" name="img1" value="<img src='<?php echo $prod_img1;?>'/>"/></td>
</tr>
<tr>
<td>Product image2 </td>
<td><img src="productphotos/<?php echo $prod_img2;?>" style="width:50px;height:50px;"/></td>
<td><input type="file" name="img2"/></td>
</tr>
<tr>
<td>Product price</td>
<td><input type="text" name="product_price" value="<?php echo $prod_price;?>"/></td>
</tr>
<tr>
<td>Product description </td>
<td><textarea name="description" cols="35" rows="10"><?php echo $prod_desc;?></textarea></td>
</tr>
<tr>
<td>Product Keyword </td>

<td><input type="text" name="keyword" value="<?php echo $prod_keyword;?>"/></td>
</tr>
<tr>
<td>Product status</td>
<td><input type="text" name="status" value="<?php echo $prod_status;?>"/></td>
</tr>
<tr>
<td colspan="4"><center><input name="edit" type="submit" value="Edit" style="background-color:#FFC153;width:150px;height:40px;color:white;"/></center></td>
</tr>
</table border="2">
</form>
	<?php }else{
	echo "<h5 style='float:right;position:relative;right:500px;'>You need to be logged in</h5>";
}?>
<div id="dito" style="width:300px;height:800px;background-color:#25373D;position:relative;bottom:462px;right:10px;">
<table>
<tr>
<th style="color:white;width:303px;height:80px;background-color:#112233;position:relative;bottom:50px;font-size:40px;"><b>Admin area</b></th>
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
<th style="color:white;width:300px;height:80px; position:relative;bottom:2px;font-size:25px;"><a href="insertproduct.php" style="color:white;">View Orders</a></th>
</tr>
<tr>
<th style="color:white;width:300px;height:80px; position:relative;bottom:2px;font-size:25px;"><a href="insertproduct.php" style="color:white;">No Of Accounts</a></th>
</tr>
</table>
</div>
</body>
</html>
<?php
		if(isset($_POST['edit'])){
			$title=$_POST['product_title'];
			$cat=$_POST['cat_idc'];
			$brand=$_POST['brand_id'];
			$product_img1=$_FILES['img1']['name'];
	$product_img2=$_FILES['img2']['name'];
	//temp name of images//
    $tempname1=$_FILES['img1']['tmp_name'];
    $tempname2=$_FILES['img2']['tmp_name'];
			$price=$_POST['product_price'];
			$filepath="productphotos/$product_img1";
$filepath1="productphotos/$product_img2";	
		$keyword=$_POST['keyword'];
			$desc=$_POST['description'];
			$status=$_POST['status'];
			move_uploaded_file($tempname1,$filepath);
		move_uploaded_file($tempname2,$filepath1);
			$qt="update products set product_title='$title',cat_idc='$cat',brand_id='$brand',img1='$product_img1',img2='$product_img2',product_price='$price',keyword='$keyword',status='$status',description='$desc' where product_id='$pro_id'";
			$runqt=mysqli_query($con,$qt);
			if($runqt){
				echo'<script>alert("Product has been updated successfully")</script>';
				echo"<script>window.open('Displayproduct.php','_self')</script>";
			}
		}

?>