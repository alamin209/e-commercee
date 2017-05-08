<!doctype html>
<?php
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
<li><a href="customeraccount.php">MY status</a></li>
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
<div id="sidetitle"> Catagories</div>
<ul id="title">
<?php
 Cats();
?>


</ul>
<div id="sidetitle"> Brands</div>
<ul id="title">
<?php
Brands();
?>

</ul>

</div>
<div id="contain_product"> 
	<span style="float:right;font-size:px; padding=10px ;color:red"> Welcome Gust ! <b style="color:yellow">Shopping card  total iteam:  prices: <a href="cart.php">  Go to card</a></b> </span>
<div id="product_detail">
<?php


?>

</div>
</div>
<div id="footer ">
<h2 style="text-align:center; padding-top:30px;">&copy by ALAMIN and ALvi BY web tech section D</h2>

</div>
</div>


</body>