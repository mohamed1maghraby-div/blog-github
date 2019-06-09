<?php include "files/header.php"; ?>
<?php

$pg_title=$_POST['pg_title'];
$pg_cont=$_POST['pg_cont'];

if(isset($_POST['insert'])){
	if(empty($pg_title) && empty($pg_cont)){
		echo '<div class="error" style="width:880px; margin-top:10px; ">عذرا جميع الحقول مطلوبة</div>';	
	}
	else{
		$addpage=mysqli_query($connect,"INSERT INTO page(pg_title,pg_cont) VALUE('$pg_title','$pg_cont')");
		if(isset($addpage)){
			header("location:addpage.php");
		}
	}

}

?>

    <div class="leftpanle">
		<div class="panle">
		
		<div class="panletitle">اضافة صفحة</div>
		<div class="panlebody">
		   <form action="" method="post" enctype="multipart/form-data">
		   <div id="lable">عنوان الصفحة</div>
		   <input type="text" name="pg_title" style="width:400px; margin-bottom:5px;" class="form-control"/>
		   		   <div id="lable">محتوى الصفحة</div>
            <textarea name="pg_cont" style="width:400px; margin-bottom:5px;" class="form-control"></textarea>      
           <input type="submit" name="insert" style="font-family:tahoma; margin-bottom:5px;"  value="اضافة" class="btn btn-warning"/>
		   </form>
		</div>
		
	</div>
		
</div>
<?php include "files/right_p.php"; ?>

<?php include "files/footer.php"; ?>
