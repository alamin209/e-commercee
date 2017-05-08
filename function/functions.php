
<?php
	$con=mysqli_connect("localhost","root", "","e-commerce");
	if(! $con )
{
  die('Could not connect: ' . mysql_error());
}
    function getIp() {
     
        $ip = $_SERVER['REMOTE_ADDR'];

     

        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {

            $ip = $_SERVER['HTTP_CLIENT_IP'];

        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {

            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];

        }

     

        return $ip;

    }
	
	function price()
	{
		$total=0;
		global $con;
		$ip=getIp();
		$sel_price = "select * from card where  ip_address ='$ip'";
		$run_price = mysqli_query($con,$sel_price);
		while($p_price=mysqli_fetch_array($run_price))
		{
			
			$pro_id=$p_price['product_id'];
			$pro_price="select * from product where product_id='$pro_id'";
			
			$run_pro_price=mysqli_query($con,$pro_price);
			while($pp_price=mysqli_fetch_array($run_pro_price)){
				
				$product_price =array($pp_price['product_price']);
				$value=array_sum($product_price);
				$total=$total+$value;
				
				
				
			}
			
		
		}
		echo "$".$total;
		
		
	}
	
	
	
	
	
		
function addcard(){
     if(isset($_GET['add_card']))
	 {
		 global $con;
		 $ip=getIp();
		 
		$product_id=$_GET['add_card'];
		$vari_product="select * from  card where ip_address='$ip' AND product_id='$product_id'";
		 $run_vari=mysqli_query($con,$vari_product);
		 if(mysqli_num_rows($run_vari)>0)
		 {
			 
		 echo"";
		 }
		 else {
			 
			 $insert_prodcucts="INSERT  into card(product_id, ip_address)values('$product_id','$ip')";
			 
			 
			 $run_product=mysqli_query($con,$insert_prodcucts);
			 echo"<script> window.open('index.php','_self')</script>";
			 
		    }
		 
	    }

    }

	function item(){
     if(isset($_GET['add_card']))
	 {
		 global $con;
		 $ip=getIp();
		 
		$product_id=$_GET['add_card'];
		$iteam_product="select * from  card where ip_address='$ip'";
		 $run_item=mysqli_query($con,$iteam_product);
		 $count_item=mysqli_num_rows($run_item);
		
	 }
	 
	 
		 else  {
			 
			global $con;
		    $ip=getIp();
		$iteam_product="select * from  card where ip_address='$ip'";
		 $run_item=mysqli_query($con,$iteam_product);
		 $count_item=mysqli_num_rows($run_item);
			 
		    }
			
			echo $count_item;
		 
	    

    }

	
	
	
	


function Cats()
{
	global $con;
$cats="select * from catagories";
	$runcats=mysqli_query($con,$cats);
	while($rowcats=mysqli_fetch_array($runcats))
	{
		$cat_id=$rowcats['cat_id'];
		$cat_title=$rowcats['cat_title'];
		echo"<li><a href='index.php?cat=$cat_id'>$cat_title</a></li><br/>";
	}
	
}

function Brands()
{
	global $con;
$brands="select * from brands";
	$runbrands=mysqli_query($con,$brands);
	while($rowcats=mysqli_fetch_array($runbrands))
	{
		$brand_id=$rowcats['brand_id'];
		$brand_title=$rowcats['brand_title'];
		echo"<li><a href='index.php?brand=$brand_id'>$brand_title</a></li><br/>";
	}
	
}

function getproduct()
{
	if(!isset($_GET['cat']))
 {
		if(!isset($_GET['brand'])){
	global $con;
	
	$getproduction="select * from product order by RAND()LIMIT 0,20";
	$run_production=mysqli_query($con,$getproduction);
	while ($row_production=mysqli_fetch_array($run_production))
	{
		$product_id=$row_production['product_id'];
		$product_cat=$row_production['product_cat'];
		$product_brand=$row_production['product_brand'];
		$product_title=$row_production['product_title'];
		$product_price=$row_production['product_price'];
		$product_descri=$row_production['product_descri'];
		$product_image=$row_production['product_image'];
      echo  "
	   <div id='each_product'>
	   <h3>$product_title</h3>
	   <img src='adminpanel/productimage/$product_image' width='170' height='120'/>
	   <h3> $product_price</h3>
	    <a href='detail.php?product_id=$product_id'> Detail</a>
	   	<a href='index.php?add_card=$product_id'><button style='float:right'>add card</button></a>

	   </div>
	   
	   ";
		
    }
  }
 }
	
}

function catinfo()
{
	if(isset($_GET['cat']))
 {  
      $catshow=$_GET['cat'];
	global $con;
	
	$catshow="select * from product where product_cat='$catshow'";
	$run_catshow=mysqli_query($con,$catshow);
	$count_cat=mysqli_num_rows($run_catshow);
	if($count_cat==0)
	    { 
			echo"<script>alert('the   product  catgorey is sell or out of market')</script>";
		}

	while ($cats=mysqli_fetch_array($run_catshow))
	{
		$product_id=$cats['product_id'];
		$product_cat=$cats['product_cat'];
		$product_brand=$cats['product_brand'];
		$product_title=$cats['product_title'];
		$product_price=$cats['product_price'];
		$product_descri=$cats['product_descri'];
		$product_image=$cats['product_image'];
		
		
      echo  "
	   <div id='each_product'>
	   <h3>$product_title</h3>
	   <img src='adminpanel/productimage/$product_image' width='170' height='120'/>
	   <h3> $$product_price</h3>
	    <a href='detail.php?product_id=$product_id'> Detail</a>
	   	<a href='index.php?add_card=$product_id'><button style='float:right'>add card</button></a>

	   </div>
	   
	   ";
		
    }
  
 }
	
}
function brand()
{
	if(isset($_GET['brand']))
 {  
      $brand=$_GET['brand'];
	global $con;
	
	$brandhow="select * from product where product_brand='$brand'";
	$run_brandshow=mysqli_query($con,$brandhow);
	$count_band=mysqli_num_rows($run_brandshow);
	if($count_band==0)
	{
		echo"<script>alert('this band is  sell or out of market')</script>";
	}
	
	while ($brand=mysqli_fetch_array($run_brandshow))
	{
		$product_id=$brand['product_id'];
		$product_cat=$brand['product_cat'];
		$product_brand=$brand['product_brand'];
		$product_title=$brand['product_title'];
		$product_price=$brand['product_price'];
		$product_descri=$brand['product_descri'];
		$product_image=$brand['product_image'];
      echo  "
	   <div id='each_product'>
	   <h3>$product_title</h3>
	   <img src='adminpanel/productimage/$product_image' width='170' height='120'/>
	   <h3> $$product_price</h3>
	    <a href='detail.php?product_id=$product_id'> Detail</a>
	   	<a href='index.php?add_card=$product_id'><button style='float:right'>add card</button></a>

	   </div>
	   
	   ";
		
    }
  
 }
	
}
function product()
{

	global $con;
	
	$getproduction="select * from product";
	$run_production=mysqli_query($con,$getproduction);
	while ($row_production=mysqli_fetch_array($run_production))
	{
		$product_id=$row_production['product_id'];
		$product_cat=$row_production['product_cat'];
		$product_brand=$row_production['product_brand'];
		$product_title=$row_production['product_title'];
		$product_price=$row_production['product_price'];
		$product_descri=$row_production['product_descri'];
		$product_image=$row_production['product_image'];
      echo  "
	   <div id='each_product'>
	   <h3>$product_title</h3>
	   <img src='adminpanel/productimage/$product_image' width='170' height='120'/>
	   <h3> $$product_price</h3>
	    <a href='detail.php?product_id=$product_id'> Detail</a>
	   	<a href='index.php?add_card=$product_id'><button style='float:right'>add card</button></a>

	   </div>
	   
	   ";
		
    }
  
 }
 
 function serch()
{

    if(isset ($_GET["search"]))
	{
		$search=$_GET["user"];
		
	global $con;
	
	$getproduction="select * from product where prdouct_keyword like '%$search%'";
	$run_production=mysqli_query($con,$getproduction);
	$count_production=mysqli_num_rows($run_production);
	$getproduction="select * from product where prdouct_keyword not like '%$search%'";
	
	while ($row_production=mysqli_fetch_array($run_production))
	{
		$product_id=$row_production['product_id'];
		$product_cat=$row_production['product_cat'];
		$product_brand=$row_production['product_brand'];
		$product_title=$row_production['product_title'];
		$product_price=$row_production['product_price'];
		$product_descri=$row_production['product_descri'];
		$product_image=$row_production['product_image'];
      echo  "
	   <div id='each_product'>
	   <h3>$product_title</h3>
	   <img src='adminpanel/productimage/$product_image' width='170' height='120'/>
	   <h3> $$product_price</h3>
	    <a href='detail.php?product_id=$product_id'> Detail</a>
	   	<a href='index.php?add_card=$product_id'><button style='float:right'>add card</button></a>

		
		
	   </div>
	   
	   ";
		
    }
  
	}
}



?>