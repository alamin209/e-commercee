<?php
if (!isset($_SESSION['user_email']))
{
	echo"<script> window.open('login.php?not_admin=you are not admin','_self')</script>";
}

else
  {
	
 ?>

<form action="" method="post">
<h1 align="center">Insert the new catagory</h1>
<div align="center">
<input type="text" name="new_brand" />
<input type="submit" name="add_brand" value="add new catagory"/>
</div>
</form>
<?php
	

include("db.php");
 if(isset($_POST['add_brand']))
 {
	 $newbrand=$_POST['new_brand'];
	 $newbrands="INSERT  into  brand (brand_title) values('$newbrand')";
	 $run_addnews=mysqli_query($con,$newbrands);
	 
if($newbrand=="" || $newbrand==null){

    echo "<script>alert('brand can not empty')</script>"	; 
	exit();
}
	 if ($run_addnews)
	 {
	 echo"<script>alert('new brand  has been added sucessfully')</script>";
   echo"<script>window.open('index.php?nwebrand,'_self')</script>";
	 }
	 
	 
	 
 }

?>

<?php
  }

?>