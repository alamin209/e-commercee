<!doctype html>
<?php
session_start();
if (!isset($_SESSION['user_email']))
{
	echo"<script> window.open('login.php?not_admin=you are not admin','_self')</script>";
}

else
  {
	
 ?>




<?php
include("db.php");
if (isset($_GET['edit_product']))
{
	$get_id=$_GET['edit_product'];
	
$get_pro="select * from product where product_id='$get_id'";
$run_product=mysqli_query($con,$get_pro);
$row_pro=mysqli_fetch_array($run_product);
	 $product_id  =$row_pro['product_id'];
	$product_title= $row_pro['product_title'];
	$product_image= $row_pro['product_image'];
	$product_price= $row_pro['product_price'];
     $product_cat=$row_pro['product_cat'];
    $product_brand=$row_pro['product_brand'];
     $product_descri=$row_pro['product_descri'];
     $prdouct_keyword=$row_pro['prdouct_keyword'];
	
}
?>

<html>
<head>
<title> update product </title>
</head>
<body bgcolor="yellow">
<form action="" method="post" enctype="multipart/form-data">
<table align="center" width="750"border="2" bgcolor="skyblue">

<tr align="center">
<td colspan="2"> <h2>update  producct </h2></td> 
</tr>
<tr>
<td>product title:</td>
<td><input type="text" name="product_title" size="50" value="<?php echo $product_title; ?>"/></td>
</tr>

<tr>
<td>product Category :</td>
<td>
<select name="product_cat"  placeholder="plz choose the catagory">

<option><?php echo $product_cat; ?></option>
<?php
$cats="select * from catagories";
	$runcats=mysqli_query($con,$cats);
	while($rowcats=mysqli_fetch_array($runcats))
	{
		$cat_id=$rowcats['cat_id'];
		$cat_title=$rowcats['cat_title'];
		echo"<option value='$cat_id'>$cat_title</option>";
	}
?>


</select>

</tr>
<tr>
<td>product brands:</td>
<td>
<select name ="product_brand" placeholder="plz select the band">
<option> <?php echo $product_brand; ?> </option>
<?php
$brands="select * from brands";
	$runbrands=mysqli_query($con,$brands);
	while($rowcats=mysqli_fetch_array($runbrands))
	{
		$brand_id=$rowcats['brand_id'];
		$brand_title=$rowcats['brand_title'];
		echo"<option value='$brand_id'>$brand_title</option>";
	}
	
?>
</td>
</select>
</tr>

<tr>
<td>product image:</td>
<td><input type="file" name="product_image"/> <img src="productimage/<?php echo $product_image; ?>"  width="60px" height="60px"/></td>

<tr>
<td>product price:</td>
<td><input type="text" name="product_price" value="<?php echo $product_price; ?>"/></td>
</tr>
<tr>
<td>product description:</td>
<td><textarea name="product_descri" cols="20" rows="10" ><?php echo $product_descri;  ?>" ></textarea> <td>
</tr>
<tr>
<td>product keyword:</td>
<td><input type="text" name="prdouct_keyword" size="50" value="<?php echo $prdouct_keyword; ?>" ></td>
</tr>
<tr align="right">
<td colspan="8"><input type="submit" name="update" value="edit the product"/></td>
</tr>
</table>
</form>
</body>
</html>
<?php
if(isset($_POST['update']))

{   $update=$product_id ;
	if (isset($_POST["product_title"]))
{
	$product_title = $_POST["product_title"];
	
}
$product_cat=$_POST['product_cat'];
$product_brand=$_POST['product_brand'];
$product_descri=$_POST['product_descri'];
$prdouct_keyword=$_POST['prdouct_keyword'];

	if (isset($_POST["product_price"]))
{
	$product_price = $_POST["product_price"];
	
}

$product_image=$_FILES ['product_image']['name'];
$product_imge_tmp=$_FILES['product_image']['tmp_name'];
move_uploaded_file($product_imge_tmp,"productimage/$product_image");

$update_product="UPDATE product set product_cat='$product_cat',product_brand='$product_brand',product_title='$product_title',
product_price='$product_price',product_descri='$product_descri',product_image='$product_image',prdouct_keyword='$prdouct_keyword' where product_id='$update'";
$run_product=mysqli_query($con,$update_product);
if($run_product){
	echo"<script>alert('product  has been added sucessfully')</script>";
   echo"<script>window.open('index.php,'_self')</script>";
}
else
{
	
	echo "<script>alert('product is not added')</script>";
}	
	
}

?>

<?php 
  }
  ?>