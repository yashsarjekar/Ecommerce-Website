<!DOCTYPE HTML>
<html>
<head>
<title>Payment Page</title>
</head>
<body background="bb2.jpg">
<?php
require 'database/config.php';
session_start();
?>
<h3 style="position:relative;left:570px;top:240px;color:#FF7416;" >Online Payments please Click On Pay Now  </h3>
<?php
$ip=getUserIpAddr();
$email=$_SESSION['Email'];
$query="select * from customer where Email='$email'";
$run=mysqli_query($con,$query);
$rowquery=mysqli_fetch_array($run);
$customer_id=$rowquery['customer_id'];

$ip=getUserIpAddr();
	$query="select * from cart where ip_add='$ip'";
	$runquery=mysqli_query($con,$query);
	$countpro=mysqli_num_rows($runquery);
	$nettotal=0;
	$status='Pending';
	$invoice_no=mt_rand();
	echo'<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
  <input type="hidden" name="cmd" value="_cart">
  <input type="hidden" name="business" value="yashsarjekar005@gmail.com">
  <input type="hidden" name="upload" value="1">';
  $x=0;
	while($row=mysqli_fetch_array($runquery)){
	$prod_id=$row['cart_id'];
	$qty=$row['qty'];
	$tt="select * from products where product_id='$prod_id'";
	$at=mysqli_query($con,$tt);
	$x++;
	while($rowdata=mysqli_fetch_array($at)){
		$product_id=$rowdata['product_id'];
		$product_title=$rowdata['product_title'];
		$product_price=$rowdata['product_price'];
		$product_img=$rowdata['img1'];
		$subtotal=$product_price*$qty;
		$nettotal=$nettotal+$subtotal;		
 echo' <!-- Specify details about the item that buyers will purchase. -->
  <input type="hidden" name="item_name_'.$x.'" value="'.$product_title.'">
    <input type="hidden" name="item_number_'.$x.'" value="'.$product_id.'">
  <input type="hidden" name="amount_'.$x.'" value="'.$product_price.'">
  <input type="hidden" name="quantity_'.$x.'" value="'.$qty.'">';

}
}
echo' 
   <!-- Return and cancel_return. -->
 <input type="hidden" name="return" value="http://www.thepoliticalcircle.com/paypalsuccess.php">
  <input type="hidden" name="cancel_return" value="http://www.thepoliticalcircle.com/paypal.php">
  <input type="image" name="submit" style="position:relative;left:540px;top:250px;"
    src="http://samedayexpress.ca/wp-content/uploads/2014/04/paynow_button.png"
    alt="PayPal - The safer, easier way to pay online">
</form>';
?>
<h3 style="position:relative;left:570px;top:280px;color:#FF7416;" >Offline Payments please Click On Pay Now  </h3>
<h5><a href="order.php?c_id=<?php echo $customer_id;?>"><button name="payment" style="position:relative;left:570px;top:300px;color:#3C3741;width:350px;height:120px;font-size:40px;border-radius:50%;background-color:#FEC606;">Pay Offline</button></h5>
</form>
</body>
</html>