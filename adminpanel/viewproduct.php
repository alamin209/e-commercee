<table width="700px" bgcolor="skyblue">
<tr>
<td><h2>View all product</h2></td>
</tr>
<tr align="center">
<th>serilnumber</th>
<th>Title</th>
<th>image</th>
<th>price</th>
<th>Edite</th>
<th>dlete</th>
</tr>

<?php
	$con=mysqli_connect("localhost","root", "","e-commerce");
	
if(! $con )
{
  die('Could not connect: ' . mysqli_error());
  
}
 ?>
<?php  

$allproduct="select * from product";
$run_product=mysqli_query($con,$allproduct);
$i=0;
while ($product_row=mysqli_fetch_array($run_product)){
	 $product_id  =$product_row['product_id'];
	$product_title= $product_row['product_title'];
	$product_image= $product_row['product_image'];
	$product_price= $product_row['product_price'];
	$i++;	

?>
<tr align ="center">
<td><?php echo $i;?></td>
<td> <?php echo $product_title; ?></td>
<td><img src="productimage/<?php echo $product_image; ?>"  width="100px" height="100px"</td>
<td><?php echo $product_price; ?></td>
<td><a href="index.php?edit_product=<?php echo $product_id; ?>"> Edit</a></td>
<td><a href="delete_product.php?delete_product=<?php echo $product_id; ?>">Delete</a></td>
</tr>

<?php } ?>

</table>