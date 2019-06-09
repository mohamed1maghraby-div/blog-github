<?php
ob_start();
session_start();

include "../inc/confag.php";

$a_name=$_POST['a_name'];
$a_pass=$_POST['a_pass'];



?>



<!DOCTYPE html>
<html>
<head>
<title>لوحة التحكم</title>
<meta charset="utf-8" />
<link rel="stylesheet" type="text/css" href="../css/adminstyle.css" />
<link rel="stylesheet" href="../css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body>
   <div class="adminlogin">
   <?php
if(isset($_POST['login'])){
	
	if($a_name == "" && $a_pass == ""){
		
		echo '<div class="error"> جميع البينات مطلوبة </div>';
		
	}
	
	else{
		
		$sql="SELECT * FROM admin WHERE a_name = '".$a_name."' AND a_pass = '".$a_pass."'";
		$query=mysqli_query($connect,$sql);
		if(mysqli_num_rows($query) == 1){
			$fetch=mysqli_fetch_assoc($query);
             $aname=$fetch['a_name'];
            setcookie("admincookie",$aname,time()+60*60*24);
			setcookie("adminlogin",1,time()+60*60*24);
              echo '<div class="good">اهلا وسهلا بك فى لوحة التحكم</div>';

                header("location:ok.php");
			  
		}
		else{
			
			echo '<div class="error">البينات المدخلة غير الصحيحة</div>';
			
		}
	}
}

?>
   <form action="" method="post">
      <input type="text" name="a_name" placeholder="اسم العضوية" style="font-family:tahhoma; margin-bottom:10px;" class="form-control" /> 
      <input type="password" name="a_pass" placeholder="كلمة السر" style="font-family:tahhoma; margin-bottom:10px;" class="form-control" /> 
      <input type="submit" name="login" value="دخول" style="font-family:tahhoma; margin-bottom:5px;" class="form-control" /> 	  
   </form>
   </div>
</body>
</html>