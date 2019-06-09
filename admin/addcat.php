<? include "files/header.php";?>
<? require "files/right_p.php";?>


<?php

$c_title= $_POST['c_title'];

if(isset($_POST['insert'])){
	
	if(empty($c_title)){
		echo'<div class="error" style="width:880px; margin-top:10px;">جميع البينات مطلوبة</div>';
	}	
		else{
			$insertC=mysqli_query($connect,"INSERT INTO category(c_title) VALUE ('$c_title')");
			mysqli_query($connect,"SET NAMES utf8");
			if (isset($insertC)){header("location:addcat.php");}


	}
}

?>
        <div class="leftpanle">
		<div class="panle">
		
		<div class="panletitle">اضافة تصنيف</div>
		<div class="panlebody">
		   <form action="" method="post" enctype="multipart/form-data">
		   <div id="lable">اسم التصنيف</div>
		   <input type="text"  name="c_title" style="width:400px; margin-bottom:5px;" class="form-control"/>

           <input type="submit" name="insert" style="font-family:tahoma; margin-bottom:5px;"  value="تحديث" class="btn btn-warning"/>
		   </form>
		</div>
		
	</div>
		
</div>
		
<? include "files/footer.php";?>