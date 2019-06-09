<?php include "files/header.php"; ?>
<?php

if($login_cookie ==1 ){
	header("location:index.php");
	
}



$u_name = $_POST['u_name'];
$u_pass = $_POST['u_pass'];
$u_email = $_POST['u_email'];
$u_img = $_POST['u_img'];

if(isset($_POST['singup'])){
	
	if( empty($u_name) && empty($u_pass) && empty($u_email) && empty($u_img) ){
		
		
		echo '<div class="error">please compleat the data</div>';
		
	}
	else{
	 $sql="INSERT INTO users (u_name,u_pass,u_email,u_img) VALUE('$u_name','$u_pass','$u_email','$u_img')";
	 $query=mysqli_query($connect,$sql);	
	if(isset($sql)){
	echo '<div class="good">congratolation please wait to redirequt to home</div>';	
	refresh(2,'index.php');
	}
	
	}
	
}

?>
<div class="panle r">
    <div class="panleTitle">rigster in the site</div>
    <div class="panlecont">
         <form action="" method="post">
             <div class="lable">name</div>
             <input type="text" name="u_name" style="width:300px; margin-bottom:8px;" class="form-control" />     
		     <br /> 
			  <div class="lable">password</div>
             <input type="text" name="u_pass" style="width:300px; margin-bottom:8px;" class="form-control" />
			 <div class="lable">email</div>
             <input type="text" name="u_email" style="width:300px; margin-bottom:8px;" class="form-control" />
			 <div class="lable">url img</div>
             <input type="text" name="u_img" style="width:300px; margin-bottom:8px;" class="form-control" />
			 <input type="submit" name="singup" style="margin-bottom:8px; font-family:tahoma;" class="btn btn-info" value="register"/>
		 </form>
    </div>
</div>
<?php include "files/block.php"; ?>
<?php include "files/footer.php"; ?>
