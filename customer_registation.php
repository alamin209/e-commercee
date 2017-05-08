<!doctype html>
<?php
include ("function/functions.php");
include ("include/db.php");
?>
<html>
<head>
<title> this is bd e-commerce site</title>
<link rel="stylesheet"  href="style/style.css"/>
<script type="text/javascript">
	  
      function validateemail()
      {
         var emailID = document.myForm.email.value;
         atpos = emailID.indexOf("@");
         dotpos = emailID.lastIndexOf(".");
         
         if (atpos < 1 || ( dotpos - atpos < 2 )) 
         {
            alert("Please enter correct email ID")
            return false;
         }
        
      }

   <!--
      // Form validation code will come here.
      function validate()
      {
      
         if( document.myForm.name.value == "" )
         {
            alert( "Please provide your name!" );
            document.myForm.name.focus() ;
            return false;
         }
         
         if( document.myForm.email.value == "" )
         {
            alert( "Please provide your Email!" );
            document.myForm.email.focus() ;
            return false;
         }
         

       if( document.myForm.pass.value.length <6 )
         {
            alert( "Please provide your password more than six chearacter!" );
            document.myForm.pass.focus() ;
            return false;
         }
        
      if( document.myForm.image.value == "" )
         {
            alert( "Please select the image!" );
            document.myForm.image.focus() ;
            return false;
         }
    
         
         if( document.myForm.country.value == "-1" )
         {
            alert( "Please provide your country!" );
            return false;
         }
      

       if( document.myForm.city.value == "" )
         {
            alert( "city can not empty!" );
            document.myForm.city.focus() ;
            return false;
         }
    

if( document.myForm.contact.value == "" )
         {
            alert( " plz give the contact detail !" );
            document.myForm.contact.focus() ;
            return false;
         }
    if( document.myForm.address.value == "" )
         {
            alert( "addres can not empty!" );
            document.myForm.address.focus() ;
            return false;
         }
    

      }
  
</script>
</head>
<body>
<div class="main">
<div class ="header">
<img id="logo" src="images/bd.jpg"/>
<img id="bd" src="images/logo.png"/>

</div>
<div class="menubar">
<ul id="menu">
<li><a href="index.php">home</a></li>

<li><a href="product.php">In our store</a></li>
<li><a href="myaccount.php">MY status</a></li>
<li><a href="card.php">buying card</a></li>
<li><a href="">Sign up</a></li>
<li><a href="#">contact us</a></li>
</ul>

<div id="form">
<form method="get" action="search.php" enctype="multipart/form-data">
<input type="text" name="user" placeholder="serch for the product"/>
<input type="submit" name= "search" value="search"/>
</form>

</div>

</div>
<div class="contain">
<div id="sidebar"> 
<div id="sidetitle"> Catagories</div>
<ul id="title">
<?php
 Cats();
?>


</ul>
<div id="sidetitle"> Brands</div>
<ul id="title">
<?php
Brands();
?>

</ul>

</div>
<div id="contain_product"> 
	<span style="float:right;font-size:px; padding=10px ;color:red"> Welcome Gust! <b style="color:yellow">Shopping card  total iteam:
<?php 
item();
?> 
<?php
getIp();
?>

 prices:
 <?php 
 price();
 ?>
 <span><a href="card.php"> Go to card</a></b> </span>
<?php

echo addcard();

?>
<?php
serch();
?>

<form name="myForm" action =""  method ="post" enctype="multipart/form-data" onsubmit="return(validate() & validateemail() )" >
<table align="center" width="700">
<tr>
<td><h2> Create the acount<h2</td> 
</tr>
<tr>
<td align="right">Name:</td>
<td > <input type="text" name="name" /></td>
</tr>  
<tr>
<td align="right">Email:</td>
<td > <input type="text" name="email" /></td>
</tr>
<tr>
<td align="right">password:</td>
<td > <input type="password" name="pass" /></td>
</tr>
<td align="right"> Image</td>
<td > <input type="file" name="image"/></td>
</tr>

<tr>
<td align="right"> Customer country:</td>
<td> <select name="country">
            <option value="-1" selected>[choose yours country]</option>
           <option value="1">bangldesh</option>
          <option value="3">india</option>
         <option value="3">pakistan</option>
         <option value="5">srilanka</option>
         <option value="6">barma</option>
        <option value="7">kuit</option>
        <option value="8">USA</option>
        <option value="9">UK</option>
        <option value="10">afganstan</option>
 </select>
     
  
</td>
</tr>
<tr>
<td align="right"> City</td>
<td> <input type="text" name="city"/></td>
</tr>

<tr>
<td align="right"> Contact</td>
<td > <input type="text" name="contact"  /></td>
</tr>
<tr>
<td align="right"> Address</td>
<td > <input type="text" name="address" width="60" /></td>
</tr>

<tr align="center">
<td colspan="7"> <input type="submit" name="registation" value="Create your account"/></td>
</tr>

</table>
</form>
</body>
</html>

<?php

if(isset($_POST['registation']))
	
	{
		$ip=getIp();
		$name=$_POST['name'];
		$email=$_POST['email'];
		$pass=$_POST['pass'];
		$image=$_FILES['image']['name'];
		$image_tmp=$_FILES['image']['tmp_name'];
		$country=$_POST['country'];
		$city=$_POST['city'];
		$contact=$_POST['contact'];
		$address=$_POST['address'];
		
		move_uploaded_file($image_tmp,"customer/customer_image/$image");
		$insert_customer="insert into customer (customer_ip,customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_image,customer_address)VALUES
		('$ip','$name','$email','$pass','$country','$city','$contact','$image','$address')";
		$customer_run=mysqli_query($con,$insert_customer);
		if($customer_run)
		$select_card="select * from card  where ip_address='$ip'";
	$run_card=mysqli_query($con,$select_card);
	$run_check=mysqli_num_rows($run_card);
if($name=="" || $name==null )
{

$_SESSION['email']=$email;

echo "<script>alert('name can not be empty')</script>";
exit();
}

if($email=="" || $email==null )
{

$_SESSION['email']=$email;

echo "<script>alert('email can not be empty')</script>";

exit();
}

if($pass."length"<6 )
{

$_SESSION['email']=$email;

echo "<script>alert(' plza give six chaeacter password')</script>";

exit();
}

if($country="" || $country==null )
{

$_SESSION['email']=$email;

echo "<script>alert('select the country ')</script>";

exit();
}

if($city="" || $city==null )
{

$_SESSION['email']=$email;

echo "<script>alert('plz select the city')</script>";

exit();
}
if($contact="" || $contact==null )
{

$_SESSION['email']=$email;

echo "<script>alert('plz give the contact information')</script>";

exit();
}
if($address="" || $address==null )
{

$_SESSION['email']=$email;

echo "<script>alert('plz give ha detail address ')</script>";

exit();
}



else if($run_check==0)
		
		 {   $_SESSION['email']=$email;
			echo "<script>alert('you done awosome work account is created')</script>";
			echo "<script>window.open('myaccount.php','_self')</script>";
			
			
			
		}
		else   
		
		 {       
			echo "<script>alert('you done awosome work account is created,thank you')</script>";
			echo "<script>window.open('payment.php','_self')</script>";
			
			
			
		}
		
	}


?>