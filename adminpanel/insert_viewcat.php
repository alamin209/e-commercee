<table width="700px" bgcolor="skyblue">
<tr>
<td><h2>View all product</h2></td>
</tr>
<tr align="center">
<th>catagory id</th>
<th>Title</th>
<th>delete</th>
</tr>

<?php
	$con=mysqli_connect("localhost","root", "","e-commerce");
	
if(! $con )
{
  die('Could not connect: ' . mysqli_error());
  
}
 ?>
<?php  

$allcat="select * from  catagories ";
$run_all=mysqli_query($con,$allcat);
$i=0;
while ($cat_row=mysqli_fetch_array($run_all)){
	 $cat_id  =$cat_row['cat_id'];
	$cat_title= $cat_row['cat_title'];
	$i++;	

?>
<tr align ="center">
<td><?php echo $i;?></td>
<td> <?php echo $cat_title; ?></td>
<td><a href="delete_cat.php?delete_cat=<?php echo $cat_id ;?>">Delete</a></td>
</tr>

<?php } ?>

</table>