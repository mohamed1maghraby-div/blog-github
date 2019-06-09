<?php include"files/header.php"; ?>
<?php

$id = $_GET['id'];

$selectpostinfo = mysqli_query($connect,"SELECT * FROM posts WHERE p_id ='".$id."' ");
$fetchpostinfo=mysqli_fetch_assoc($selectpostinfo);

#=======[post]========#
/*CREATE TABLE  `comment` (
 c_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
 c_user INT NOT NULL ,
 c_comment TEXT NOT NULL ,
 c_time VARCHAR( 255 ) NOT NULL ,
 c_post INT NOT NULL ,
 c_active INT NOT NULL
) ENGINE = MYISAM ;*/
#=======[post]========#
$c_user= $id_cookie;
$c_comment=$_POST['c_comment'];
$c_time=date("d/m/y");
$c_post=$id;
$c_active=1;

if(isset($_POST['submit'])){
	$addcomment=mysqli_query($connect,"INSERT INTO comment (c_user,c_comment,c_time,c_post,c_active) VALUE('$c_user','$c_comment','$c_time','$c_post','$c_active')");
if(isset($addcomment)){
	header("location:post.php?id=".$id."");
}
	}

if(mysqli_num_rows($selectpostinfo) > 0 ){
	if(isset($_GET['id'])){
		echo '
		<div class="panle r">
		<div class="postT">'.$fetchpostinfo['p_title'].'</div>
		<div class="postI"><img src="admin/images/'.$fetchpostinfo['p_img'].'" width="660" height="300" /></div>
		<div class="postS">'.$fetchpostinfo['p_sub'].'</div>
		';
		
		
		$selectComA=mysqli_query($connect,"SELECT * FROM comment WHERE c_active= '2' AND c_post = '".$id."'");
		echo'<div class="postT" style="margin-top:20px;">comments ('.mysqli_num_rows($selectComA).')</div>';	
		if(mysqli_num_rows($selectComA)== 0){
		echo'<div class="error">لا توجد اى تعليقات كون اول من يعلق</div>';	
		}
		else{

		while($row=mysqli_fetch_assoc($selectComA)){
			$selectUserInfo=mysqli_query($connect,"SELECT * FROM users WHERE u_id = '".$row['c_user']."'");
            $fetchUserInfo=mysqli_fetch_assoc($selectUserInfo);
			echo '
			<div style="background:#f9f9f9; padding-top:8px; margin-bottom:10px; margin-bottom:1px solid #f39c12;">
			<div style="background:#EDEDED; height:51px; width:640px; margin:0px auto; margin-bottom:5px;">
			   <div style="width:50px; float:right;"><img src="'.$fetchUserInfo['u_img'].'" width="50px" height="50px"/></div>
			   <div style="padding-top:3px; float:right;">
			   <div style="padding:2px 21px 0px 0px; font-family:tahoma; color:#555; margin-bottom:5px; font-size:13px;">'.$fetchUserInfo['u_name'].'</div>
			   <div style="padding:2px 21px 0px 0px; font-family:tahoma; color:#555; margin-bottom:5px; font-size:13px;">'.$row['c_time'].'</div>
			   </div>
			   </div>
			   <div style="padding-right:10px; padding-left:10px; line-height:150%; ">
			    <div style="text-align:right;">
				 <p style="font-family:tahoma; color:#444; font-size:14px;">'.$row['c_comment'].'</p>
				</div>
			   </div>
			</div>';
		}
		}

		
		if($login_cookie ==1){
			echo '
			
			<br />
			<form action="" method="post">
			<textarea name="c_comment" class="form-control"></textarea>
			<input type="submit" name="submit" value="comment" class="btn btn-success" style="margin-top:5px; font-family:tahoma;" />
			</form>
			';
		}
		else{
			echo '<div class="error">عذرا يجب عليك تسجيل الدخول</div>';
		}
		echo'
		</div>
		';
		
	}
	else{
		echo'<div class="error">عذرا التدوينة التى تبحث عنها غير متوفرة</div>';
		
	}
	
}
else{
	
	echo'<div class="error">عذرا الصفحة التى تبحث عنها غير متوفرة</div>';
}
echo '<div style="clear:both;"></div>';
?>


<?php include"files/block.php"; ?>
<?php include"files/footer.php"; ?>