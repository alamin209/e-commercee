<!doctype html>
<?php
session_start();
include ("function/functions.php");

?>
<html>
<head>
<title> this is bd e-commerce site</title>
<link rel="stylesheet"  href="style/style.css"/>

</head>
<body>
<div class="main">
<div class ="header">
<img id="logo" src="images/bd.jpg"/>
<img id="bd" src="images/logo.png"/>

</div>
<div class="menubar">
<ul id="menu">
<li><a href="index.php">home</a></li>

<li><a href="product.php">In our store</a></li>
<li><a href="myaccount.php">MY status</a></li>
<li><a href="card.php">buying card</a></li>
<li><a href="">Sign up</a></li>
<li><a href="#">contact us</a></li>
</ul>

<div id="form">
<form method="get" action="search.php" enctype="multipart/form-data">
<input type="text" name="user" placeholder="serch for the product"/>
<input type="submit" name= "search" value="search"/>
</form>

</div>

</div>
<div class="contain">
<div id="sidebar"> 
<div id="sidetitle"> my account</div>
<?php
$user=$_SESSION['email'];

$user_s="select * from customer where customer_email='$user'";
$run_img=mysqli_query($con,$user_s);
 $row_img=mysqli_fetch_array($run_img);
 $customer_image=$row_img['customer_image'];
  $customer_name=$row_img['customer_name'];

 echo"<img src='customer/customer_image/$customer_image' width='80' height='80'/>";
 
?>

<div id="sidetitle"> </div>

<li><a href="myaccount.php?orderaccount">my order</a></li>

<li><a href= "myaccount.php?editaccount">edit account</a></li>
<li><a href="myaccount.php?changaccount">change pass</a></li>
</div>
</ul>
</div>


<div id="contain_product"> 
	<span style="float:right;font-size:px; padding=8px ;color:red"> 
<?php
 if(isset($_SESSION['email']))
 {
	 echo"<br>here you are </b>" .$_SESSION['email']."<b style='color:yellow'>your</b>";
 }
else
{ 
 
echo "<b>WELCOME GUST</b>";
}

?> 

Shopping card  total iteam:
<?php 
item();
?> 
<?php
getIp();
?>

 prices:
 <?php 
 price();
 ?>
 
<b><a href="card.php"> Go to card</a></b> 
<?php
if(!isset($_SESSION['email']))
{
echo"<a href='check.php'>Login</a>";
}
 else 
 {
 echo "<a href='Logout.php'>Logout</a>";

  }

?> 
</span>
 <?php

echo addcard();

?>
<div id="product_detail">
<h2> Welcome here is you!!: <?php echo  $customer_name; ?> </h2>

<?php
if(!isset($_GET['orderaccount'])){	

  if(!isset($_GET['editaccount'])){	
	
  if(!isset($_GET['changaccount'])){	
	

  if(!isset($_GET['delateccount'])){	

echo "<h3> you can see your order is being progress by <a href='myaccount.php?orderaccount'>this link </a></h3>";


  }	
 }
 }	
 }
?>
<?php 

if(isset($_GET['orderaccount']))
{
include("orderaccount.php");	
	
}

if(isset($_GET['editaccount']))
{
include("editaccount.php");	
	
}

if(isset($_GET['changaccount']))
{
include("changaccount.php");	

}


?>


<?php
serch();
?>

</div>
</div>
<div id="footer ">
</div>
</div>


</body>