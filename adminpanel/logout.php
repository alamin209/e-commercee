<?php 
session_start();
session_destroy();
echo "<script>window.open('login.php?you have been logout','_self')</script>";
?>