<?php
require 'database/config.php';

function getUserIpAddr(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //ip pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
function delete_cart(){
	global $con;
	if(isset($_GET['product_id'])){
		$cart_id=$_GET['product_id'];
	$query="delete from cart where cart_id='$cart_id'";
	$runquery=mysqli_query($con,$query);
	if($runquery){
		echo"<script>alert('product has been Deleted')</script>";
		echo"<script>window.open('cart.php','_self')</script>";
	}
	}
	}
function Custdelete_cart(){
	global $con;
	if(isset($_GET['product_id'])){
		$cart_id=$_GET['product_id'];
	$query="delete from cart where cart_id='$cart_id'";
	$runquery=mysqli_query($con,$query);
	if($runquery){
		echo"<script>alert('product has been Deleted')</script>";
		echo"<script>window.open('Custcart.php','_self')</script>";
	}
	}
	}
function cartdisplay(){
	global $con;
	$ip=getUserIpAddr();
	$query="select * from cart where ip_add='$ip'";
	$runquery=mysqli_query($con,$query);
	$nettotal=0;
	if(isset($_POST['save'])){
		$quantity=$_POST['qty'];
		foreach($quantity as $key=>$value){
			$update="update cart set qty='$value' where cart_id='$key'";
			$run=mysqli_query($con,$update);
			if($run){
				echo"<script>window.open('cart.php','_self')</script>";
			}
		}
	}
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
		echo"<tr align='center'>
		<td><a href='Delete.php?product_id=$product_id'>Delete</a></td>
		<td><img src='adminarea/productphotos/$product_img' style='width:120px; height:180px;'></td>
		<td>$product_title</td>
		<td><input type='text' name='qty[".$row['cart_id']."]' value='$qty' size='2' style='height:25px;border-radius:10%; '/><input type='submit' name='save'  value='save' style='border:2px solid #25373D; border-radius:10%; background-color:#FFFFF7; height:30px; width:50px; color:#C82647;'/></td>
		<td>$$product_price</td>
		<td>";
		$subtotal=$product_price*$qty;
		echo "$".$subtotal;
		$nettotal=$nettotal+$subtotal;
		echo"</td>
		</tr>
		";
	}
	}
	echo"<tr align='center'>
	<td><button style='border:2px solid #25373D; border-radius:10%; background-color:#FFFFF7; height:50px; width:150px; color:#E3000E;'><a href='index.php'>Continue Shopping</a></button></td>
	<td><button style='border:2px solid #25373D; border-radius:10%; background-color:#92F22A; height:50px; width:150px; color:white;'><a href='CheckOut.php'>CheckOut</a></button></td>
	<td style='float:right; position:relative;left:50px;top:15px;'>TOTAL:</td>
	<td >$$nettotal</td>
	</tr>";
}
function Custcartdisplay(){
	global $con;
	$ip=getUserIpAddr();
	$query="select * from cart where ip_add='$ip'";
	$runquery=mysqli_query($con,$query);
	$nettotal=0;
	if(isset($_POST['save'])){
		$quantity=$_POST['qty'];
		foreach($quantity as $key=>$value){
			$update="update cart set qty='$value' where cart_id='$key'";
			$run=mysqli_query($con,$update);
			if($run){
				echo"<script>window.open('Custcart.php','_self')</script>";
			}
		}
	}
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
		echo"<tr align='center'>
		<td><a href='Custdelete.php?product_id=$product_id'>Delete</a></td>
		<td><img src='adminarea/productphotos/$product_img' style='width:120px; height:180px;'></td>
		<td>$product_title</td>
		<td><input type='text' name='qty[".$row['cart_id']."]' value='$qty' size='2' style='height:25px;border-radius:10%; '/><input type='submit' name='save'  value='save' style='border:2px solid #25373D; border-radius:10%; background-color:#FFFFF7; height:30px; width:50px; color:#C82647;'/></td>
		<td>$product_price</td>
		<td>";
		$subtotal=$product_price*$qty;
		echo "$".$subtotal;
		$nettotal=$nettotal+$subtotal;
		echo"</td>
		</tr>
		";
	}
	}
	echo"<tr align='center'>
	<td><button style='border:2px solid #25373D; border-radius:10%; background-color:#FFFFF7; height:50px; width:150px; color:#E3000E;'><a href='Mainpage.php'>Continue Shopping</a></button></td>
	<td><button style='border:2px solid #25373D; border-radius:10%; background-color:#92F22A; height:50px; width:150px; color:white;'><a href='Payment.php'>CheckOut</a></button></td>
	<td style='float:right; position:relative;left:50px;top:15px;'>TOTAL:</td>
	<td >$$nettotal</td>
	</tr>";
}
function item(){
	if(isset($_GET['prod_id'])){
		global $con;
		$ip=getUserIpAddr();
		$tq="select * from cart where ip_add='$ip'";
		$runtq=mysqli_query($con,$tq);
		$count=mysqli_num_rows($runtq);
		
	}
	else{
		global $con;
		$ip=getUserIpAddr();
		$tq="select * from cart where ip_add='$ip'";
		$runtq=mysqli_query($con,$tq);
		$count=mysqli_num_rows($runtq);
	}
	echo $count;
}

function Custitem(){
	if(isset($_GET['prod_id'])){
		global $con;
		$ip=getUserIpAddr();
		$tq="select * from cart where ip_add='$ip'";
		$runtq=mysqli_query($con,$tq);
		$count=mysqli_num_rows($runtq);
		
	}
	else{
		global $con;
		$ip=getUserIpAddr();
		$tq="select * from cart where ip_add='$ip'";
		$runtq=mysqli_query($con,$tq);
		$count=mysqli_num_rows($runtq);
	}
	echo $count;
}
function addtocart(){
	if(isset($_GET['prod_id'])){
		global $con;
		$ip=getUserIpAddr();
		$product_id=$_GET['prod_id'];
		$query="select * from cart where cart_id='$product_id' AND ip_add='$ip'";
		$runquery=mysqli_query($con,$query);
		if(mysqli_num_rows($runquery)>0){
			echo"";
		}
        else{
			$tt="insert into cart(cart_id,ip_add,qty) values('$product_id','$ip','1')";
			$runtt=mysqli_query($con,$tt);
		}
	}
}
function Custaddtocart(){
	if(isset($_GET['prod_id'])){
		global $con;
		$ip=getUserIpAddr();
		$product_id=$_GET['prod_id'];
		$query="select * from cart where cart_id='$product_id' AND ip_add='$ip'";
		$runquery=mysqli_query($con,$query);
		if(mysqli_num_rows($runquery)>0){
			echo"";
		}
        else{
			$tt="insert into cart(cart_id,ip_add,qty) values('$product_id','$ip','1')";
			$runtt=mysqli_query($con,$tt);
		}
	}
}
function Normaldisplay(){
	global $con;
	if(!isset($_GET['cat_id'])){
		if(!isset($_GET['brand_id'])){
	$query="select * from products order by rand() LIMIT 0,12";
$runquery=mysqli_query($con,$query);
while($rowdata=mysqli_fetch_array($runquery)){
$product_title=$rowdata['product_title'];
$product_id=$rowdata['product_id'];
$product_img=$rowdata['img1'];
$product_price=$rowdata['product_price'];
echo"
<section class='products'>   
 <div class='product-card'>
    <div class='product-image'>
      <img src='adminarea/productphotos/$product_img'>
    </div>
    <div class='product-info'>
     <a href='Details.php?prod_id=$product_id'><h5>$product_title</h5></a>
      <h6>$$product_price</h6>
    </div>
	</div>
  </section>
";
}
		}
	}
}
function CustNormaldisplay(){
	global $con;
	if(!isset($_GET['cat_id'])){
		if(!isset($_GET['brand_id'])){
	$query="select * from products order by rand() LIMIT 0,12";
$runquery=mysqli_query($con,$query);
while($rowdata=mysqli_fetch_array($runquery)){
$product_title=$rowdata['product_title'];
$product_id=$rowdata['product_id'];
$product_img=$rowdata['img1'];
$product_price=$rowdata['product_price'];
echo"
<section class='products'>   
 <div class='product-card'>
    <div class='product-image'>
      <img src='adminarea/productphotos/$product_img'>
    </div>
    <div class='product-info'>
     <a href='Custdetails.php?prod_id=$product_id'><h5>$product_title</h5></a>
      <h6>$product_price</h6>
    </div>
	</div>
  </section>
";
}
		}
	}
}
function Normaldisplaycategories(){
	global $con;
	if(isset($_GET['cat_id'])){
     $cat_id=$_GET['cat_id'];
	$query="select * from products where cat_idc='$cat_id'";
$runquery=mysqli_query($con,$query);
while($rowdata=mysqli_fetch_array($runquery)){
$product_title=$rowdata['product_title'];
$product_id=$rowdata['product_id'];
$product_img=$rowdata['img1'];
$product_price=$rowdata['product_price'];
echo"
<section class='products'>   
 <div class='product-card'>
    <div class='product-image'>
      <img src='adminarea/productphotos/$product_img'>
    </div>
    <div class='product-info'>
     <a href='Details.php?prod_id=$product_id'><h5>$product_title</h5></a>
      <h6>$$product_price</h6>
    </div>
	</div>
  </section>
";
}
		
	}
}
function CustNormaldisplaycategories(){
	global $con;
	if(isset($_GET['cat_id'])){
     $cat_id=$_GET['cat_id'];
	$query="select * from products where cat_idc='$cat_id'";
$runquery=mysqli_query($con,$query);
while($rowdata=mysqli_fetch_array($runquery)){
$product_title=$rowdata['product_title'];
$product_id=$rowdata['product_id'];
$product_img=$rowdata['img1'];
$product_price=$rowdata['product_price'];
echo"
<section class='products'>   
 <div class='product-card'>
    <div class='product-image'>
      <img src='adminarea/productphotos/$product_img'>
    </div>
    <div class='product-info'>
     <a href='Custdetails.php?prod_id=$product_id'><h5>$product_title</h5></a>
      <h6>$$product_price</h6>
    </div>
	</div>
  </section>
";
}
		
	}
}
function Normaldisplaybrand(){
	global $con;
	if(isset($_GET['brand_id'])){
     $brand_id=$_GET['brand_id'];
	$query="select * from products where brand_id='$brand_id'";
$runquery=mysqli_query($con,$query);
while($rowdata=mysqli_fetch_array($runquery)){
$product_title=$rowdata['product_title'];
$product_id=$rowdata['product_id'];
$product_img=$rowdata['img1'];
$product_price=$rowdata['product_price'];
echo"
<section class='products'>   
 <div class='product-card'>
    <div class='product-image'>
      <img src='adminarea/productphotos/$product_img'>
    </div>
    <div class='product-info'>
     <a href='Details.php?prod_id=$product_id'><h5>$product_title</h5></a>
      <h6>$$product_price</h6>
    </div>
	</div>
  </section>
";
}
		
	}
}
function CustNormaldisplaybrand(){
	global $con;
	if(isset($_GET['brand_id'])){
     $brand_id=$_GET['brand_id'];
	$query="select * from products where brand_id='$brand_id'";
$runquery=mysqli_query($con,$query);
while($rowdata=mysqli_fetch_array($runquery)){
$product_title=$rowdata['product_title'];
$product_id=$rowdata['product_id'];
$product_img=$rowdata['img1'];
$product_price=$rowdata['product_price'];
echo"
<section class='products'>   
 <div class='product-card'>
    <div class='product-image'>
      <img src='adminarea/productphotos/$product_img'>
    </div>
    <div class='product-info'>
     <a href='Custdetails.php?prod_id=$product_id'><h5>$product_title</h5></a>
      <h6>$product_price</h6>
    </div>
	</div>
  </section>
";
}
		
	}
}
function cat(){
	global $con;
$check="select * from categories";
$run=mysqli_query($con,$check);
while($rowcat=mysqli_fetch_array($run)){
$catid=$rowcat['cat_idc'];
$cat_title=$rowcat['cat_title'];
echo "<tr><td><div class='catcolor'>
<li><a href='index.php?cat_id=$catid'>$cat_title</a></li></div></td></tr>";	
}	
}
function Custcat(){
	global $con;
$check="select * from categories";
$run=mysqli_query($con,$check);
while($rowcat=mysqli_fetch_array($run)){
$catid=$rowcat['cat_idc'];
$cat_title=$rowcat['cat_title'];
echo "<div class='catcolor'>
<li><a href='Custmainpage.php?cat_id=$catid'>$cat_title</a></li></div>";	
}	
}
function brand(){
	global $con;
	$check="select * from brand";
	$run=mysqli_query($con,$check);
	while($rowbrand=mysqli_fetch_array($run)){
		$brand_id=$rowbrand['brand_id'];
		$brand_title=$rowbrand['brand_title'];
	echo "<tr><td><div class='brandcolor'>
	<li><a href='index.php?brand_id=$brand_id'>$brand_title</a></li></div></td></tr>";
	}
}
function Custbrand(){
	global $con;
	$check="select * from brand";
	$run=mysqli_query($con,$check);
	while($rowbrand=mysqli_fetch_array($run)){
		$brand_id=$rowbrand['brand_id'];
		$brand_title=$rowbrand['brand_title'];
	echo "<div class='brandcolor'>
	<li><a href='Custmainpage.php?brand_id=$brand_id'>$brand_title</a></li></div>";
	}
}
?>