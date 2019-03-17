<?php 
$amount =$_REQUEST["amt"];
$currency =$_REQUEST["cc"];
$status=$_REQUEST["st"];
$transection_id =$_REQUEST["tx"];
require 'database/config.php';
include("functions/function.php");
session_start();
$email=$_SESSION['Email'];
$query="select * from customer where Email='$email'";
$runquery=mysqli_query($con,$query);
$rowdata1=mysqli_fetch_array($runquery);
$customer_id=$rowdata1['customer_id'];
$customer_name=$rowdata1['customer_name'];
$ip=getUserIpAddr();
$query1="select * from cart where ip_add='$ip'";
$runquery1=mysqli_query($con,$query1);
while($rowdata12=mysqli_fetch_array($runquery1)){
$prod_id=$rowdata12['cart_id'];
$qty=$rowdata12['qty'];
$qt="insert into paypal (transection_no,amount,customer_id,product_id,qty,status,currency) values('$transection_id','$amount','$customer_id','$prod_id','$qty','$status','$currency')";
$runinsert=mysqli_query($con,$qt);
}

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
$mail->addAddress($email);     // Add a recipient
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
<td>Transection no</td>
<td>'.$transection_id.'</td>
</tr>
<tr>
<td>Amount:</td>
<td>$'.$amount.'</td>
</tr>
<tr>
<td>Payment Status:</td>
<td>'.$status.'</td>
</tr>
</table>
<h3><a href="http://thepoliticalcircle.com/Myaccount.php">Click the Link </a> </h3>
<h2>By clicking the link you will be transferred to www.thepoliticalcircle.com</h2>
<h2>Thank You for your Order</h2>
';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
} else {
    echo '<script>alert("Email has been send please Check")</script>';
}
$cartdelete="delete from cart where ip_add='$ip'";
	$runcartquery=mysqli_query($con,$cartdelete);
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Insert Product</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body background="bb1.jpg">
<b>Welcome Guest!</b>
<h3>You have Successfully paid payments  the product</h3>
<h4>Your transection no is <?php echo $transection_id;?> </h4>
<a href="http://www.thepoliticalcircle.com/Myaccount.php">Go To My Account</a>
</body>
</html>


