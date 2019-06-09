<?php include "files/header.php"; ?>
<?php
$id=$_GET['id'];
$selectPageInfo=mysqli_query($connect,"SELECT * FROM page WHERE pg_id = '".$id."'");
$fetchPageInfo=mysqli_fetch_assoc($selectPageInfo);
if(mysqli_num_rows($selectPageInfo) == 0){
	echo'<div class="error">عذرا الصفحة التى تبحث عنها غير متوفرة</div>';
}
else{
	if(isset($_GET['id'])){
		echo'
		<div class="panle r">
		<div class="postT">'.$fetchPageInfo['pg_title'].'</div>
		<div class="post">'.$fetchPageInfo['pg_cont'].'</div>
		</div>
		';
	}
}

?>
<?php include "files/block.php"; ?>
<?php include "files/footer.php"; ?>