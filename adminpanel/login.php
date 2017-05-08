<!doctype html>
<html>
<head>
<style>
body {
    background-color: lightblue;
}
</style>

<h2> Login form</h2>
<script>  
function validateform(){  
var name=document.myform.pass.value;  
  
if (pass==null || pass==""){  
  alert("Name can't be blank");  
  return false;  
}
}
  function emailval()
  {
  var email=document.myform.email.value;
 if (email==null || email==""){  
  alert("email can't be blank");  
  return false; 
  }  
}



</script>  




</head>
<body>
<div>
<form name="myfrom"action="login.php" method="post" onsubmit="return (validateform() & emailval()& emailval());">
<table> 


<h3> this is admin login</h3>
<td>Email:</td>
<td><input type="text" name="email" placeholder="plz give your email "  /></td>
</tr>
<tr align="center">
<td>Password:</td>
<td colspan="4"><input type="password" name="pass" placeholder="plz give your pass word"></td>
</tr
<tr>
<td><button type="submit"  name="login" value="login">login</button></td>
</tr>
</table>
</form>
<?php

	$con=mysqli_connect("localhost","root", "","e-commerce");
	
if(! $con )
{
  die('Could not connect: ' . mysql_error());
  
}
 
session_start();
if(isset($_POST['login']))
{
$email=mysql_real_escape_string($_POST['email']);
$pass=mysql_real_escape_string($_POST['pass']);	
	
	$selst_user="select * from admin where user_email='$email' AND user_pass='$pass'";
	$run=mysqli_query($con,$selst_user);
	$check=mysqli_num_rows($run);
	if ($check==0)
	{   $_SESSION['user_email']=$email;
		echo"<script>alert('PASSWORD OR email wrong')</script>";
		
	}
	else
		
	
	     {    
	
		$_SESSION['user_email']=$email;
	    echo"<script> window.open('index.php?logged_in=you are succeful','_self')</script>";
         }



}

?>


