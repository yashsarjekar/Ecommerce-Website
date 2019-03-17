<?php
require 'database/config.php';
include("functions/function.php");
session_start();
if(!isset($_SESSION['Email'])){
	include("customers_login.php");
}else{
	include("Payment.php");
}
?>