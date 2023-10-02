<?php  require('include/top.php') ;
session_start();

 echo "<script>window.open('login.php','_blank')</script>";

session_destroy();

?>