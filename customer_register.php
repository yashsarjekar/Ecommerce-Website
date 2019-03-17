<?php
require 'database/config.php';
include("functions/function.php");
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Customer_login</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body background="register.jpg">
<form method="post" enctype="multipart/form-data">
<table width="400" align="center" style="background-color:#25373D; height:500px; position:relative;top:100px;" border="1">
<tr align="center">
<td align="center" style="background-color:#1DABB8;color:white; width:100px; height:80px; position:relative;left:125px;">REGISTER</td>
</tr>
<tr>
<td align="center" style="color:white;" width="200">Customer Name</td>
<td><input type="text" name="customer_name" placeholder="type customer name" size="35" required/></td>
</tr>
<tr>
<td align="center" style="color:white;" width="200">Email</td>
<td><input type="text" name="Email" placeholder="type Email"  size="35" required/></td>
</tr>
<tr>
<td align="center" style="color:white;" width="200">Password</td>
<td><input type="password" name="password" placeholder="type password"  size="35" required/></td>
</tr>
<tr>
<td align="center" style="color:white;" width="200">Country</td>
<td><input type="text" name="country" placeholder="type country" size="35" required/></td>
</tr>
<tr>
<td align="center" style="color:white;" width="200">City</td>
<td><input type="text" name="city" placeholder="type city"  size="35" required/></td>
</tr>
<tr>
<td align="center" style="color:white;" width="200">Contact</td>
<td><input type="text" name="contact" placeholder="contact" size="35" required/></td>
</tr>
<tr>
<td align="center" style="color:white;" width="200">Address</td>
<td><input type="text" name="address" placeholder="Address" size="35" required/></td>
</tr>
<tr>
<td align="center" style="color:white;" width="200">Customer image</td>
<td><input type="file" name="img1" /></td>
</tr>
<tr>
<td align="center" style="position:relative;left:125px;"><input type="submit" name="register_btn" value="REGISTER"style="background-color:#F04903;color:white;width:150px;height:40px;" /></td>
</tr>
</table>
</form>
</body>
</html>
<?php
if(isset($_POST['register_btn'])){
$customer_name=$_POST['customer_name'];
$Email=$_POST['Email'];
$password=$_POST['password'];
$country=$_POST['country'];
$city=$_POST['city'];
$contact=$_POST['contact'];
$address=$_POST['address'];
$ip=getUserIpAddr();
$img1=$_FILES['img1']['name'];
$temp_name=$_FILES['img1']['tmp_name'];
$filepath="customerphoto/$img1";
	move_uploaded_file($temp_name,$filepath);
$query="insert into customer(customer_name,Email,password,country,city,contact,address,customer_img,customer_ip) values('$customer_name','$Email','$password','$country','$city','$contact','$address','$img1','$ip')";
$runquery=mysqli_query($con,$query);
if($runquery){
	echo'<script>alert("Account has been register")</script>';
}	
}
?>