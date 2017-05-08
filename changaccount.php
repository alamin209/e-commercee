<?php 
$pagetitle="this is contact alamin"; 

include('include/header.php'); ?> 
<div class="container">
	
	<h2>this is contact</h2>

	
 <?php    if($_SERVER['REQUEST_METHOD']=="POST")
			$name=$_POST["fname"];
			$email=$_POST["email"];
			$message=$_POST["message"];
             $email_body="";
			$email_body= $email_body ."Name " .$name. "\n";
			$email_body = $email_body."Email " .$email."\n";
			$email_body= $email_body."Message " .$message;
			echo $email_body;
	header("Location:contact.php?status=thank");
	exit;
	?> <h2>Contact Deatils</h2>
         <?php 
          if(isst $_Get ($_Get['status'])=="thank")  { ?>
         
       <p>We will communicate with you shortly</p>
       <?php } ?>
       else <?php { ?>
      <?php  include('include/header.php'); ?> 
      <form action="contact.php" method="post">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <input type="text" name="fname" class="form-control" required="required" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <input type="text" name="email" class="form-control" required="required" placeholder="Email address">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <textarea name="message" id="message" required="required" class="form-control" rows="3" placeholder="Message"></textarea>
                            </div>
                       <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit Request</button>
                                </div>
                           </div>
                    </div>
                </form>
      
</div>
<?php include('include/footer.php'); ?>