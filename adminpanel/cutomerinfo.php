<table width="700px" bgcolor="skyblue">
<tr>
<td><h2>View all product</h2></td>
</tr>
<tr align="center">
<th>customer SN</th>
<th>id</th>
<th>name</th>
<th>email</th>
<td>delete</th>
</tr>

<?php
	$conn = mysqli_connect("localhost", "id874670_ecommerce", "Alamin209@","id874670_ecommerce");
	
if(! $con )
{
  die('Could not connect: ' . mysqli_error());
  
}
 ?>
<?php  

$allc="select * from  customer  ";
$run_c=mysqli_query($con,$allc);
$i=0;
while ($c_row=mysqli_fetch_array($run_c)){
	$c_id  =$c_row['customer_id'];
	$c_name= $c_row['customer_name'];
	$c_email= $c_row['customer_email'];
	$i++;	

?>
<tr align ="center">
<td><?php echo $i;?></td>
<td> <?php echo $c_id; ?></td>
<td> <?php echo $c_name; ?></td>
<td> <?php echo $c_email; ?></td>
<td><a href="delete_c.php?delete_c=<?php echo $c_id ;?>">Delete</a></td>
</tr>

<?php } ?>

</table>