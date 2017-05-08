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
<input type="text" name="new_cat" required/>
<input type="submit" name="add_cat" value="add new catagory"/>
</div>
</form>
<?php
	

include("db.php");
 if(isset($_POST['add_cat']))
 {
	 $newcat=$_POST['new_cat'];
	 $newcatadd="INSERT  into  catagories (cat_title) values('$newcat')";
	 $run_addnew=mysqli_query($con,$newcatadd);
	 if ($run_addnew)
	 {
	 echo"<script>alert('new catagory  has been added sucessfully')</script>";
   echo"<script>window.open('index.php?insert_newcat,'_self')</script>";
	 }
	 
	 
	 
 }

?>

<?php
  }

?>