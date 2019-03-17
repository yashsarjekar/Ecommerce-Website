<?php
require 'database/config.php';
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Customer_login</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body background="register.jpg">
<div id="Mainwrapper">
<form method="post" enctype="multipart/form-data">
<table align="center" style="color:white; width:365px; position:relative; top:200px; height:300px;" border="1">
<tr style="position:relative; ">
<td style="position:relative; left:50px;bottom:5px; background-color:#1D2247;"><center><h3>LOGIN FROM</h3></center></td>
</tr>
<tr>
<td><center><b>Username<b></center></td>
<td><input type="text" name="Email" placeholder="type the Email" size="30" style="height:25px;"/></td>
</tr>
<tr>
</tr>
<tr>
<td><center><b>Password<b></center></td>
<td><input type="password" name="password" placeholder="type the Password" size="30" style="height:25px;"/></td>
</tr>
<tr rowspan="1">
<td><center><input type="submit" name="login_btn" value="SignIn" style="background-color:#42729B;color:white; width:100px; height:40px; position:relative; top:5px;"/></center></td>
<td><center><a href="Mainpage.php"><input type="button" name="register" value="Register" style="background-color:#FEC606;color:white; width:150px; height:40px; position:relative; top:5px;"/></a></center></td>
</tr>
</table>
</form>
</div>
</body>
</html>
<?php
session_start();
if(isset($_POST['login_btn'])){
$Email=$_POST['Email'];
$password=$_POST['password'];
$query="select * from adminlogin where username='$Email' AND password='$password'";
$runquery=mysqli_query($con,$query);
if(mysqli_num_rows($runquery)>0){
	$_SESSION['username']=$Email;
header('location:index.php');
}
else{
	echo '<script>alert("Invalid Username and password")</script>';
}
}
?>
