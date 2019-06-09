<?php
ob_start();

$loginc =$_COOKIE['adminlogin'];

if($loginc != 1){

header("location:login.php");
}

?>