<!doctype html>
<?php
include("db.php");

?>
<html>
<head>
<title> inserting product</title>
</head>
<body bgcolor="yellow">
<form action="insert_product.php" method="post" enctype="multipart/form-data">
<table align="center" width="750"border="2" bgcolor="skyblue">

<tr align="center">
<td colspan="2"> <h2>insert new producct </h2></td> 
</tr>
<tr>
<td>product title:</td>
<td><input type="text" name="product_title" size="50" placeholder="please give the title"required/></td>
</tr>

<tr>
<td>product Category :</td>
<td>
<select name="product_cat"  placeholder="plz choose the catagory"required>

<option>Select the catagory</option>
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
<select name ="product_brand" placeholder="plz select the band"required>
<option> Select the brands </option>
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
<td><input type="file" name="product_image" placeholder="chose the image" required/></td>
</tr>
<tr>
<td>product price:</td>
<td><input type="text" name="product_price" placeholder=" " required/></td>
</tr>
<tr>
<td>product description:</td>
<td><textarea name="product_descri" cols="20" rows="10" placeholder="" ></textarea> <td>
</tr>
<tr>
<td>product keyword:</td>
<td><input type="text" name="prdouct_keyword" size="50" placeholder ="" required/></td>
</tr>
<tr align="right">
<td colspan="8"><input type="submit" name="insert_prduct" value="insert the product"/></td>
</tr>
</table>
</form>
</body>
</html>

<?php
if(isset($_POST['insert_prduct']))

{
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
$insert_prodcucts="INSERT  into product(product_cat,product_brand, product_title,product_price,
 product_descri,product_image,prdouct_keyword)values('$product_cat','$product_brand','$product_title','$product_price','$product_descri','$product_image','$prdouct_keyword')";
$insert_pro=mysqli_query($con,$insert_prodcucts);
if($insert_pro){
	echo"<script>alert('product  has been added sucessfully')</script>";
   echo"<script>window.open('index.php,'_self')</script>";
}
else
{
	
	echo "<script>alert('product is not added')</script>";
}	
	
}


?>