<? include "files/header.php";?>
<? require "files/right_p.php";?>


<?php

$p_title=$_POST['p_title'];
$p_img=$_FILES['p_img']['name'];
$p_img_tmp = $_FILES['p_img']['tmp_name'];
$p_sub=$_POST['p_sub'];
$p_date=date(" d/m/y");
$p_cat=$_POST['p_cat'];

move_uploaded_file($p_img_tmp,"images/'".$p_img."'");

if (isset($_POST['insert'])){
	if(empty($p_title) && empty($p_img) && empty($p_date)){
		echo '<div class="error" style="width:880px; margin-top:5px;">جميع البينات مطلوبة</div>';
		
	}
	else{
		
		
		$insetpost=mysqli_query($connect,"INSERT INTO posts(p_title,p_img,p_sub,p_date,p_cat) VALUE('$p_title','$p_img','$p_sub','$p_date','$p_cat')");
          if(isset($insetpost)){
			  			echo '<div class="good" style="width:880px; margin-top:5px;">تم اضافة التدوينة بنجاح</div>
			<meta http-equiv="refresh" content="2; url="addpost.php"" />
			'; 
			  
		 }
	}
}
?>
        <div class="leftpanle">
		<div class="panle">
		
		<div class="panletitle">اضافة تدوينة</div>
		<div class="panlebody">
		   <form action="" method="post" enctype="multipart/form-data">
		   <div id="lable">عنوان التدوينة</div>
		   <input type="text"  name="p_title" style="width:400px; margin-bottom:5px;" class="form-control"/>
		   		   <div id="lable">صورة التدوينة</div>
		   <input type="file"  name="p_img" style="width:400px; margin-bottom:5px;" class="form-control"/>
		   		   		   <div id="lable">تصنيف التدوينة</div>
						   <?php
						   
						   $selectCatP =mysqli_query($connect,"SELECT * FROM category");
						   echo'
						   <select name="p_cat" style="width:400px; margin-bottom:5px;" class="form-control">
						   ';
						   while ($row =mysqli_fetch_assoc($selectCatP)){
							   
							   echo'<option value="'.$row['c_id'].'">'.$row['c_title'].'</option>';
						   }
						   echo'
						   </select>
						   ';
						   
						   ?>
		   <input type="file"  name="p_img" style="width:400px; margin-bottom:5px;" class="form-control"/>
		   		   <div id="lable">محتوى التدوينة</div>
           <textarea name="p_sub" style="width:400px; margin-bottom:5px;" class="form-control"></textarea>
           <input type="submit" name="insert" style="font-family:tahoma; margin-bottom:5px;"  value="تحديث" class="btn btn-warning"/>
		   </form>
		</div>
		
	</div>
		
</div>
		
<? include "files/footer.php";?>