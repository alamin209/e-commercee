<?php
session_start();
if (!isset($_SESSION['user_email']))
{
	echo"<script> window.open('login.php?not_admin=you are not admin','_self')</script>";
}

else
  {
	
 ?>


<!doctype html>
<html>
<head>
<title> this is bd e-commerce site</title>
<h2> this is adminpanel</h2>
<h3 style="text-align:center">THE contain magement system</h3>
<link rel="stylesheet"  href="style/new.css"/>
</head>
<div class="contain_product">
<body >
<h3 style="text-align:center"><a href ="index.php?insert_product">insert new producet</a></h3>
<h3 style="text-align:center"><a href ="index.php?view_product"> view the  producets</a></h3>
<h3 style="text-align:center"><a href ="index.php?insert_newcat">insert new catagory</a></h3>
<h3 style="text-align:center"><a href ="index.php?insert_viewcat">all catagory producet</a></h3>
<h3 style="text-align:center"><a href ="index.php?_product">insert new brandproducet</a></h3>
<h3 style="text-align:center"><a href ="index.php?insert_product">view all  producet</a></h3>
<h3 style="text-align:center"><a href ="index.php?insert_product">insert new producet</a></h3>
<h3 style="text-align:center"> <a href ="index.php?insert_product">insert new producet</a></h3>
<h3 style="text-align:center"><a href ="logout.php">louout</a></h3>
</body>
</div>
<div id="footer">
THis is the end of the adminpanel--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
</div>
<?php
if(isset($_GET['insert_product']))
{
	include("insert_product.php");
}	
if(isset($_GET['view_product']))
{
	include("viewproduct.php");
}
if(isset($_GET['edit_product']))
{
	include("edit_product.php");
}

if(isset($_GET['insert_newcat']))
{
	include("insert_newcat.php");
}
if(isset($_GET['insert_viewcat']))
{
	include("insert_viewcat.php");
}
?>


<?php 
}
?>