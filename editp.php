<?php include "files/header.php"; ?>
<?php
$edit=intval($_GET['editp']);
if($id_cookie != $edit){
	
	header("location: index.php");
}

$u_name = $_POST['u_name'];
$u_pass = $_POST['u_pass'];
$u_email = $_POST['u_email'];
$u_job = $_POST['u_job'];
$u_talant = $_POST['u_talant'];
$u_country = $_POST['u_country'];


if(isset($_POST['update'])){
	
	if(empty($u_name) && empty($u_pass) && empty($u_email)){
		
		echo'<div class="error">name or pass or email is empty</div>';
		
	}
	
	else{
		$sql="UPDATE users SET 
		u_name = '$u_name',
		u_pass = '$u_pass',
		u_email = '$u_email',
		u_job = '$u_job',
		u_talant = '$u_talant',
		u_country = '$u_country'
         WHERE u_id = '".$edit."'
         ";
		$query=mysqli_query($connect,$sql);
		
		if(isset($query)){
			
			echo'<div class="good"> data hass been updated  </div>';
		   refresh(3,'index.php');
		}
	}
}



$sql="SELECT * FROM users WHERE u_id='".$edit."'";
$query=mysqli_query($connect,$sql);
$userfetch=mysqli_fetch_assoc($query);

?>
<div class="panle r">
    <div class="panleTitle">rigster in the site</div>
    <div class="panlecont">
         <form action="" method="post">
             <div class="lable">name</div>
             <input type="text" value="<? echo $userfetch['u_name']; ?>" name="u_name" style="width:300px; margin-bottom:8px;" class="form-control" />     
		     <br /> 
			  <div class="lable">password</div>
             <input type="text" value="<? echo $userfetch['u_pass']; ?>" name="u_pass" style="width:300px; margin-bottom:8px;" class="form-control" />
			 <div class="lable">email</div>
             <input type="text" value="<? echo $userfetch['u_email']; ?>" name="u_email" style="width:300px; margin-bottom:8px;" class="form-control" />
			 <div class="lable">url img</div>
             <input type="text" name="u_img" style="width:300px; margin-bottom:8px;" class="form-control" />
			 			 <div class="lable">job:</div>
             <input type="text" value="<? echo $userfetch['u_job']; ?>" name="u_job" style="width:300px; margin-bottom:8px;" class="form-control" />
			 			 <div class="lable">tlant:</div>
             <input type="text" value="<? echo $userfetch['u_talant']; ?>" name="u_talant" style="width:300px; margin-bottom:8px;" class="form-control" />
			 			 <div class="lable">country:</div>
             <input type="text" value="<? echo $userfetch['u_country']; ?>" name="u_country" style="width:300px; margin-bottom:8px;" class="form-control" />
			 <input type="submit" name="update" style="margin-bottom:8px; font-family:tahoma;" class="btn btn-info" value="update"/>
		 </form>
    </div>
</div>
<?php include "files/block.php"; ?>
<?php include "files/footer.php"; ?>
