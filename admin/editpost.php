<? include "files/header.php";?>
<? require "files/right_p.php";?>


<?php

$id=$_GET['id'];

$sql="SELECT * FROM posts WHERE p_id = '".$id."' ";
$query=mysqli_query($connect,$sql);
$m=mysqli_fetch_object($query);

$p_title=$_POST['p_title'];
$p_img=$_FILES['p_img']['name'];
$p_img_tmp = $_FILES['p_img']['tmp_name'];
$p_sub=$_POST['p_sub'];
$p_date=date(" d/m/y");
$p_cat=$_POST['p_cat'];

move_uploaded_file($p_img_tmp,"images/'".$p_img."'");

if(isset($_POST['update'])){
if(empty($p_title) && empty($p_img) && empty($p_sub)){
	echo '<div class="error" style="width:880px; margin-top:10px;">جميع البينات مطلوبة</div>';
}
else{
	$updatepost= mysqli_query($connect,"UPDATE posts SET 
     	p_title='$p_title',
		p_img='$p_img',
		p_sub='$p_sub',
		p_cat='$p_cat'
		
		WHERE p_id = '".$id."'
		
	");
	if(isset($updatepost)){
		header("location: post.php");
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
		   <input type="text" value="<?php echo $m->p_title ; ?>" name="p_title" style="width:400px; margin-bottom:5px;" class="form-control"/>
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
		   		   <div id="lable">محتوى التدوينة</div>
           <textarea name="p_sub" style="width:400px; margin-bottom:5px;" class="form-control"><?php echo $m->p_sub ; ?></textarea>
           <input type="submit" name="update" style="font-family:tahoma; margin-bottom:5px;"  value="تحديث" class="btn btn-warning"/>
		   </form>
		</div>
		
	</div>
		
</div>
		
<? include "files/footer.php";?>