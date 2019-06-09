<?php include "files/header.php"; ?>
<?php


$user = intval($_GET[user]);

if($id_cookie != $user){
	
	header("location: index.php");
}

/*
ALTER TABLE  `users` ADD  `u_job` VARCHAR( 255 ) NOT NULL ,
ADD  `u_talant` VARCHAR( 255 ) NOT NULL ,
ADD  `u_country` VARCHAR( 255 ) NOT NULL ;
*/

echo $user;
$sql="SELECT * FROM users WHERE u_id='".$user."'";
$query=mysqli_query($connect,$sql);
$fetchu=mysqli_fetch_object($query);
?>
<div class="panel r"></div>
  <div class="panleTitle">information : <? echo $fetchu->u_name; ?></div>
  <br />
  <div style="width:300px;" class="r">
       <div><img src="img/post1.jpg" width="280px" class="img-thumbnail" /></div>
	 <div style="width:360px; backgroung:#fff;" class="l">
	      <div id="userI">email: <? echo $fetchu->u_email; ?></div>
		  <div id="userI">job : <? echo $fetchu->u_job; ?></div>
		  <div id="userI">hobe : <? echo $fetchu->u_talant; ?></div>
		  <div id="userI">country : <? echo $fetchu->u_country; ?></div>
		  <div id="userI"><a href="<?php echo 'editp.php?editp='.$user.''; ?>">edit to personal file</a></div>
	 </div>
	 <div class="clear"></div>
  </div>
<?php include "files/block.php"; ?>
<?php include "files/footer.php"; ?>

