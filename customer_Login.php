<!doctype html>
<?php
include ("include/db.php");
?>
<head>
     <script>
      function validate()
      {
      
         if( document.myform.email.value == "" )
         {
            alert( "Please provide your email!" );
            document.myform.email.focus() ;
            return false;
         }
         
         if( document.myform.pass.value == "" )
         {
            alert( "Please provide your password!" );
            document.myform.pass.focus() ;
            return false;
         }
         
        
   
      }
  
</script>
      
   </head>

<div>
<form name="myform"  method ="post"   onsubmit="return validate() ;"   >
<table width="700" align="center" bgcolor= " #33fff3 ">

<tr align ="center">
<td><h2>Login  or register </h2></td>
</tr>
<tr align="center">
<td>Email:</td>
<td><input type="text" name="email" placeholder="" ></td>
</tr>
<tr align="center">
<td>Password:</td>
<td colspan="4"><input type="password" name="pass" placeholder=""  /></td>
</tr>
<tr align="right">
<td colspan="2"><a href="check.php?forget password" style="text-decoration:none"><b>Forget password or reset??</b></a></td>
</tr>
<tr align="right">
<td colspan="4"><input type="submit"  name="login" value="login"/></td>
</tr>
<tr align="right" >
<td colspan="4"><a href="customer_registation.php"  style= "text-decoration:none" ><b>new? plz registation </b></a></td>
</tr>
</table>
</form>
</div>
<?php  
if(isset($_POST['login']))
{
$email=$_POST['email'];
$pass=$_POST['pass'];
$select_customer= "select * from customer where customer_email='$email' AND customer_pass='$pass'";
$run_customer=mysqli_query($con,$select_customer);
$check_customer=mysqli_num_rows($run_customer);
if($check_customer==0 )
    {
		$_SESSION['email']=$email;
echo "<script>alert('password or email is false or fill the from first ')</script>";
	
exit();
	}
    

  $ip=getIp();
   $select_card="select * from  card where ip_address='$ip'";
  $run_card=mysqli_query($con,$select_card);
   $check_card=mysqli_num_rows($run_card);

if($email=="" || $email==null )
{

$_SESSION['email']=$email;

echo "<script>alert('email can not be empty')</script>";

exit();
}
if($pass=="" || $pass==null )
{

$_SESSION['email']=$email;

echo "<script>alert('provide pass word c')</script>";

exit();
}




   if($check_card==0 AND $check_customer>0)
   {
   $_SESSION['email']=$email;
  echo"<script>alert('you are login successfully ,thank you')</script>";
  echo"<script>window.open('myaccount.php','_self')</script>";
   }
  else 
  { $_SESSION['email']=$email;
	  
   echo"<script>alert('you are login successfully ,thank you ')</script>";
echo"<script>window.open('check.php','_self')</script>";
  }
}
?>