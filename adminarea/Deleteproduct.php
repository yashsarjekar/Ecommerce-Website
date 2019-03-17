<?php
require 'database/config.php';
if($_GET['p_id']){
	global $con;
	$p_id=$_GET['p_id'];
	$query="delete from products where product_id='$p_id'";
	$runquery=mysqli_query($con,$query);
	if($runquery){
		echo'<script>alert("Product has been deleted")</script>';
		echo"<script>window.open('Displayproduct.php','_self')</script>";
	}
}

?>