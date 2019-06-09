<? include "files/header.php";?>
<? require "files/right_p.php";?>


<?php


$id= $_GET['id'];

$selectCatE = mysqli_query($connect,"SELECT * FROM category WHERE c_id = '".$id."'");
$fetchCatE=mysqli_fetch_assoc($selectCatE);

$c_title= $_POST['c_title'];

if(isset($_POST['update'])){
	if(empty($c_title)){
		echo '<div class="error" style="width:880px; margin-top:10px; ">جميع البينات مطلوبة</div>';	
	}
	else{
		$updateCatE=mysqli_query($connect,"UPDATE category SET
		c_title = '$c_title'
		WHERE c_id ='".$id."'
		");
		if(isset($updateCatE)){
			header("location:category.php");
		}
	}
}

?>
        <div class="leftpanle">
		<div class="panle">
		
		<div class="panletitle">اضافة تصنيف</div>
		<div class="panlebody">
		   <form action="" method="post" enctype="multipart/form-data">
		   <div id="lable">اسم التصنيف</div>
		   <input type="text" value="<?php echo $fetchCatE['c_title'];?>" name="c_title" style="width:400px; margin-bottom:5px;" class="form-control"/>

           <input type="submit" name="update" style="font-family:tahoma; margin-bottom:5px;"  value="تحديث" class="btn btn-warning"/>
		   </form>
		</div>
		
	</div>
		
</div>
		
<? include "files/footer.php";?>