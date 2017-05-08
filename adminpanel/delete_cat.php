<?php
include("db.php");
if(isset($_GET['delete_cat']))
{
	$delete_id=$_GET['delete_cat'];
	$delete_cat="delete from catagories where cat_id='$delete_id'";
	$run_delete = mysqli_query($con,$delete_cat);
	if($run_delete)
	{
		echo"<script>alert('product  has been added deleted ')</script>";
    echo"<script>window.open('index.php?insert_viewcat','_self')</script>";
		
	}
	
}
?>