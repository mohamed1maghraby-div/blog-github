<?php ob_start(); ?>
 <?php include "files/header.php"; ?>
<?php
if($login_cookie == 1){
	header("location:index.php");

}


$username=$_POST['username'];
$password=$_POST['password'];

if(isset($_POST['login'])){
	
	if(empty($username) && empty($password)){
		
		echo'<div class="error">please compleat the form</div>';
		
	}
	else{
		
		$sql="SELECT * FROM users WHERE u_name = '".$username."' AND u_pass = '".$password."'";
		$query=mysqli_query($connect,$sql);
		if(mysqli_num_rows($query)>0){
			
			$fetch=mysqli_fetch_assoc($query);
			$id=$fetch['u_id'];
			$name=$fetch['u_name'];
			$pass=$fetch['u_pass'];
			if($username !== $name && $password != $pass ){
				
				echo'<div class="error">the data is not currect</div>';
			}
			else{
				
				setcookie("id",$id,time()+60*60*48);
				setcookie("login",1,time()+60*60*48);
				echo'<div class="good">welcom back wait to direct to home</div>';
				refresh(3,'index.php');
			}	
		}
		else{
			echo'<div class="error">ther is an error in your username or password</div>';
			
		}
	}
	
}
?>
<div class="panle r">
    <div class="panleTitle">rigster in the site</div>
    <div class="panlecont">
         <form action="" method="post">
             <div class="lable">name</div>
             <input type="text" name="username" style="width:300px; margin-bottom:8px;" class="form-control" />     
		     <br /> 
			  <div class="lable">password</div>
             <input type="text" name="password" style="width:300px; margin-bottom:8px;" class="form-control" />
			 <input type="submit" name="login" style="margin-bottom:8px; font-family:tahoma;" class="btn btn-info" value="login"/>
		 </form>
    </div>
</div>
<?php include "files/block.php"; ?>
<?php include "files/footer.php"; ?>
