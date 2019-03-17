<?php
require 'database/config.php';
include("functions/function.php");
if(isset($_GET['c_id'])){
	$customer_id=$_GET['c_id'];
	$query6="select * from customer where customer_id='$customer_id'";
	$runquery6=mysqli_query($con,$query6);
	$rowquery6=mysqli_fetch_array($runquery6);
	$customer_email=$rowquery6['Email'];
	$customer_name=$rowquery6['customer_name'];
}
	$ip=getUserIpAddr();
	$query="select * from cart where ip_add='$ip'";
	$runquery=mysqli_query($con,$query);
	$countpro=mysqli_num_rows($runquery);
	$nettotal=0;
	$status='Pending';
	$invoice_no=mt_rand();
	$i=0;
	while($row=mysqli_fetch_array($runquery)){
	$prod_id=$row['cart_id'];
	$qty=$row['qty'];
	$tt="select * from products where product_id='$prod_id'";
	$at=mysqli_query($con,$tt);
	while($rowdata=mysqli_fetch_array($at)){
		$product_id=$rowdata['product_id'];
		$product_title=$rowdata['product_title'];
		$product_price=$rowdata['product_price'];
		$product_img=$rowdata['img1'];
		$subtotal=$product_price*$qty;
		$nettotal=$nettotal+$subtotal;
	$i++;
	$insertpending="insert into customer_pending(customer_id,invoice_no,product_id,qty,order_status) values('$customer_id','$invoice_no','$product_id','$qty','$status')";
	$runinsertpending=mysqli_query($con,$insertpending);
		$cartdelete="delete from cart where ip_add='$ip'";
	$runcartquery=mysqli_query($con,$cartdelete);

	}
	}
	 $qt="insert into customer_orders (customer_id,due_amount,invoice_no,total_products,order_date,order_status) values
('$customer_id','$nettotal','$invoice_no','$countpro',NOW(),'$status')";
$runinsert=mysqli_query($con,$qt);
  require 'PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->SMTPDebug = 0;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'yashsarjekar007@gmail.com';                 // SMTP username
$mail->Password = 'yash@123456';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('yashsarjekar007@gmail.com', 'Support');
$mail->addAddress($customer_email);     // Add a recipient
               // Name is optional
$mail->addReplyTo('yashsarjekar007@gmail.com', 'Information');

   // Optional name
$mail->isHTML(true);                                  // Set email format to HTML
$mail->Subject = 'SALE';
$mail->Body= '<b>Hello Sir '.$customer_name.' your order has been register below all your order information has been given please click on the link below for Payments </b></br>
<table>
<tr>
<td>Customer Name:</td>
<td>'.$customer_name.'</td>
</tr>
<tr>
<td>Invoice No :</td>
<td>'.$invoice_no.'</td>
</tr>
<tr>
<td>Total Product:</td>
<td>'.$countpro.'</td>
</tr>
<tr>
<td>Total Price:</td>
<td>$'.$nettotal.'</td>
</tr>
</table>
<h3><a href="http://thepoliticalcircle.com/Myaccount.php">Click the Link </a> </h3>
<h4>by clicking the link you will be directed to Account page for payments if you are not logged </br> in please Login  first then Go to Myaccount page </br> in My account page there is Order Link is is given</h4>
<h2>Thank You for your Order</h2>
';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
} else {
    echo '<script>alert("Email has been send please Check")</script>';
}

echo '<script>alert("Order has been successfully submitted,Thanks")</script>';
echo"<script>window.open('Myaccount.php','_self')</script>";
?>
