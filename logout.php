<?php 
session_destroy();
session_start();

unset($_SESSION['login_id']);
header("location:home.php");



 ?>