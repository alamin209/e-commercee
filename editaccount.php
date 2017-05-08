<!doctype html>
<?php
include ("include/db.php");
?>

<div id="form">
</form>
<?php

$users_s="select * from customer where customer_email='$user'";
$run_imgs=mysqli_query($con,$users_s);
 $row_img=mysqli_fetch_array($run_imgs);
        $customer_id=$row_img['customer_id'];
		$name=$row_img['customer_name'];
		$email=$row_img['customer_email'];
		$pass=$row_img['customer_pass'];
		$image=$row_img['customer_image'];
		$country=$row_img['customer_country'];
		$city=$row_img['customer_city'];
		$contact=$row_img['customer_contact'];
		$address=$row_img['customer_address'];
		
 
?>

<form action ="" method ="post" enctype="multipart/form-data" >
<table align="center" width="700">
<tr>
<td><h2> update acount<h2</td> 
</tr>
<tr>
<td align="right">Name:</td>
<td > <input type="text" name="name" value="<?php echo $name; ?>"/></td>
</tr>  
<tr>
<td align="right">Email:</td>
<td > <input type="text" name="email" value="<?php echo $email; ?>" /></td>
</tr>
<tr>
<td align="right">password:</td>
<td > <input type="password" name="pass" value="<?php echo $pass; ?>" /></td>
</tr>
<td align="right"> Image</td>
<td > <input type="file" name="image"> <img src="customer/customer_image/<?php echo $image; ?>"  width='100px' height='100px'/></td>
</tr>

<tr>
<td align="right"> Customer country:</td>
<td > <select name="country"  disabled >
     
     <option><?php echo $country; ?>"</option>
	 <option>India </option>
	 <option>Bharma </option>
	 <option>Srilanke </option>
	 <option>pakistan </option>
	 <option>Americe </option>
	 <option>Indonisia </option>
	 <option>Africa </option>
	 <option>Chine</option>
	 <option>Afginstan </option>
</select>
</td>
</tr>
<tr>
<td align="right"> City</td>
<td> <input type="text" name="city"value="<?php echo $city; ?>"/></td>
</tr>

<tr>
<td align="right"> Contact</td>
<td > <input type="text" name="contact"value="<?php echo $contact; ?>" /></td>
</tr>
<tr>
<td align="right"> Address</td>
<td > <input type="text" name="address" width="60" value="<?php echo $address; ?>"/></td>
</tr>

<tr align="center">
<td colspan="7"> <input type="submit" name="update" value="updat account"/></td>
</tr>

</table>
</form>
</body>
</html>




<?php

if(isset($_POST['update']))
	
	{
		$customer_id=$customer_id;
		$ip=getIp();
		$name=$_POST['name'];
		$email=$_POST['email'];
		$pass=$_POST['pass'];
		$image=$_FILES['image']['name'];
		$image_tmp=$_FILES['image']['tmp_name'];
		$city=$_POST['city'];
		$contact=$_POST['contact'];
		$address=$_POST['address'];
		
		move_uploaded_file($image_tmp,"customer/customer_image/$image");
        
		$update_c= "UPDATE customer SET customer_name='$name', customer_email='$email',customer_pass='$pass',customer_city='$city',customer_contact='$contact',customer_image='$image',customer_address='address'
		WHERE customer_id='$customer_id'";
		
		/*$insert_customer="insert into customer (customer_ip,customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_image,customer_address)VALUES
		('$ip','$name','$email','$pass','$country','$city','$contact','$image','$address')";
		$customer_run=mysqli_query($con,$insert_customer);
		if($customer_run)
		$select_card="select * from card  where ip_address='$ip'";*/
	$run_update=mysqli_query($con,$update_c);

	if($run_update)
		
		 {
			echo "<script>alert('your account update is ')</script>";
			echo "<script>window.open('myaccount.php','_self')</script>";
		}
	else 
	{
		echo "there is an erro";
		
	}
			
			
    }

?>
<?php
//echo $customer_id;
?>
<?php
//echo $name;
?>



