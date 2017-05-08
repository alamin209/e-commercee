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
<input type="text" name="input" placeholder="serch for the product"/>
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
	
<div id="product_detail">
<?php



if(isset($_GET['product_id']))
{
		$product_id = $_GET["product_id"];

	
	$getproduction="select * from product where product_id='$product_id'";
	$run_production=mysqli_query($con,$getproduction);
	while ($row_production=mysqli_fetch_array($run_production))
	{
		$product_id=$row_production['product_id'];
		$product_cat=$row_production['product_cat'];
		$product_brand=$row_production['product_brand'];
		$product_title=$row_production['product_title'];
		$product_price=$row_production['product_price'];
		$product_descri=$row_production['product_descri'];
		$product_image=$row_production['product_image'];
      echo  "
	   <div id='each_product'>
	   <h3>$product_title</h3>
	   <img src='adminpanel/productimage/$product_image' width='300' height='300'/>
	   <h3> price:$$product_price</h3>
	   <h3>$product_descri</h3>
	    <a href='index.php?product_id=$product_id'> <button style='float:left'>press to go back</button></a>
	   	<a href='index.php?product_id=$product_id'><button style='float:right'>add card</button></a>

	   </div>
	   
	   ";
	}	
}
	
	
	
	


?>

</div>


</body>