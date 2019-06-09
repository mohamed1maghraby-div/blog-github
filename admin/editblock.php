<?php include "files/header.php"; ?>
<?php

$id=$_GET['id'];

$sql="select * from block where b_id = '".$id."'";
$query =mysqli_query($connect,$sql);
$fetch=mysqli_fetch_object($query);

$b_title=$_POST['b_title'];
$b_cont=$_POST['b_cont'];

if(isset($_POST['update'])){
	$updateQuery=mysqli_query($connect,"UPDATE block SET
	b_title = '$b_title',
	b_cont='$b_cont'
	WHERE b_id='".$id."'
	");
	if(isset($updateQuery)){
		header("location:blocks.php");
	}
}
?>

    <div class="leftpanle">
		<div class="panle">
		
		<div class="panletitle">اضافة قائمة</div>
		<div class="panlebody">
		   <form action="" method="post" enctype="multipart/form-data">
		   <div id="lable">عنوان القائمة</div>
		   <input type="text" value="<?php echo $fetch->b_title; ?>" name="b_title" style="width:400px; margin-bottom:5px;" class="form-control"/>
		   		   <div id="lable">محتوى القائمة</div>
            <textarea name="b_cont" style="width:400px; margin-bottom:5px;" class="form-control"><?php echo $fetch->b_cont; ?></textarea>      
           <input type="submit" name="update" style="font-family:tahoma; margin-bottom:5px;"  value="تحديث" class="btn btn-warning"/>
		   </form>
		</div>
		
	</div>
		
</div>
<?php include "files/right_p.php"; ?>

<?php include "files/footer.php"; ?>
