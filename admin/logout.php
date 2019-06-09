<?php

$logincoo=$_COOKIE['adminlogin'];

if($logincoo != 1){
	header("location:login.php");
}
else{
 setcookie("admincookie","",time()+60*60*24);
 setcookie("adminlogin","",time()+60*60*24);
 
 header("location:login.php");
}






?>