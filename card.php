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
	<span style="float:right;font-size:px; padding=10px ;color:red"> Welcome Gust! <b style="color:yellow">Shopping card  total iteam:
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
 <a href="index.php"> back hompage</a></b> 
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

<?php
serch();
?>
<form action ="card.php" method="post" enctype="multipart/form-data">
<table align= "center" width="800" 	bgcolor=" #33ffaf ">
<tr align="center">

<th>Remove</th>
<th>products</th>
<th>quantity</th>
<th>price</th>

</tr>
<?php  
        $total=0;
		global $con;
		$ip=getIp();
		$sel_price = "select * from card where  ip_address ='$ip'";
		$run_price = mysqli_query($con,$sel_price);
		while($p_price=mysqli_fetch_array($run_price))
		{
			
			$pro_id=$p_price['product_id'];
			$pro_price="select * from  product where product_id='$pro_id'";
			
			$run_pro_price=mysqli_query($con,$pro_price);
			while($pp_price=mysqli_fetch_array($run_pro_price)){
				
				$product_price =array($pp_price['product_price']);
				$product_title=$pp_price['product_title'];
				$product_image =$pp_price['product_image'];
				$single_price =$pp_price['product_price'];
				$value=array_sum($product_price);
				
				$total=$total+$value;
		
?>


<tr align="center">
	   <td ><input type="checkbox" name="remove[]" value="<?php echo $pro_id;?> " /></td>
	   	    <td><?php echo $product_title ?><br>
             <img src="adminpanel/productimage/<?php echo $product_image ?>" width='70' height='60'/>

		   	</td>

			  <td><input type="text" name="qty" value=" <?php 
			  echo $_SESSION['qty'];     
			  ?>"/></td>
			  <?php
			  if(isset($_POST['update']))
				  
				{   
					$qty =$_POST['qty'];
					 $update ="update card set  p_quantity ='$qty'";
					 $run_qty=mysqli_query($con,$update);
					  $_SESSION['qty']=$qty;
                     $total=$total*$qty;
                    //her is a problem 
					  
				}
			  
			  
			  ?>
                <td>
				 <?php
				 echo "$".$single_price;
				?>
			</td>
				    
				   
				   
	   </tr>
	   <?php  
			}
		}	
		
		?>
		<tr align="right">
		<td colspan="4"> Total price</td>
	   <td><?php


	   echo "$".$total; 
	   
	   ?></td>
		
		</tr>
		<tr align="center">
		<td><input type ="submit" name="delete" value="delete"/></td>
		<td><input type ="submit" name="update" value="update"/></td>
		<td><input type="submit" name="continue" value="continue"/></td>
		<td><span><b><a href ="check.php" style="text-decoration:none">PLz go for check</a></b></span>
		<td></td>
		</tr>
				
</table>
</form>
<?php
function update()

{
if(isset($_POST['delete']))
{
	global $con;
	$ip=getIp();
	foreach($_POST['remove'] as $delet_id){
		
		$delet_product ="delete from card where product_id='$delet_id' AND  ip_address='$ip'";
		$run_delet=mysqli_query($con,$delet_product);
		
		if($run_delet)
		{
			
		echo"<script>window.open('card.php','_self') </script>";	
			
		}
	}
}
	
	    if(isset($_POST['continue']))
		{
			echo"<script>window.open('index.php','_self') </script>";
			
			
		}
}
echo @$update=update();
?>



</div>
</div>
<div id="footer ">
<h2 style="text-align:center; padding-top:30px;">&copy by ALAMIN and ALvi BY web tech section D</h2>

</div>
</div>


</body>