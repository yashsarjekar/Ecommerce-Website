<?php 
require 'database/config.php';
if(isset($_GET['c_id'])){
	global $con;
	$c_id=$_GET['c_id'];
	$query="delete from categories where cat_idc='$c_id'";
	$runquery=mysqli_query($con,$query);
	if($runquery){
		echo'<script>alert("Categorie is Deleted")</script>';
		echo"<script>window.open('Displaycategories.php','_self')</script>";
	}
}
if(isset($_GET['b_id'])){
	global $con;
	$b_id=$_GET['b_id'];
	$query="delete from brand where brand_id='$b_id'";
	$runquery=mysqli_query($con,$query);
	if($runquery){
		echo'<script>alert("Brand is Deleted")</script>';
		echo"<script>window.open('branddisp.php','_self')</script>";
	}
}
?>