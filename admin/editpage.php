<?php include "files/header.php"; ?>
<?php
$id=$_GET['id'];

$selectPI=mysqli_query($connect,"SELECT * FROM page WHERE pg_id='".$id."'");
$fetchPI=mysqli_fetch_object($selectPI);

$pg_title=$_POST['pg_title'];
$pg_cont=$_POST['pg_cont'];

if(isset($_POST['update'])){
	$updatePage=mysqli_query($connect,"UPDATE page SET 
	  pg_title='$pg_title',
	  pg_cont='$pg_cont'
	  WHERE pg_id='".$id."'
	");
	if(isset($updatePage)){
		header("location:pages.php");
	}
}

?>

    <div class="leftpanle">
		<div class="panle">
		
		<div class="panletitle">تعديل الصفحة</div>
		<div class="panlebody">
		   <form action="" method="post" enctype="multipart/form-data">
		   <div id="lable">عنوان الصفحة</div>
		   <input type="text" value="<?php echo $fetchPI->pg_title ;?>" name="pg_title" style="width:400px; margin-bottom:5px;" class="form-control"/>
		   		   <div id="lable">محتوى الصفحة</div>
            <textarea name="pg_cont" style="width:400px; margin-bottom:5px;" class="form-control"><?php echo $fetchPI->pg_cont ;?></textarea>      
           <input type="submit" name="update" style="font-family:tahoma; margin-bottom:5px;"  value="تحديث" class="btn btn-warning"/>
		   </form>
		</div>
		
	</div>
		
</div>
<?php include "files/right_p.php"; ?>

<?php include "files/footer.php"; ?>
