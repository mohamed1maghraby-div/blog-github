<?php include "files/header.php";?>
<?php include "files/right_p.php";?>
<?php

$c_id= intval($_GET['c_id']);

if($_GET['delete'] == "cat"){
	
	$deleteCat=mysqli_query($connect,"DELETE FROM category WHERE c_id ='".$c_id."'");
	if(isset($deleteCat)){
		header("location:category.php");
		
	}
}

$selectCat=mysqli_query($connect,"SELECT * FROM category");
if(mysqli_num_rows($selectCat) == 0){
	echo '<div class="error" style="width:880px; margin-top:10px; ">لا توجد اى تصنيفات</div>';	
	
}
else{
	$selectCatW=mysqli_query($connect,"SELECT * FROM category");
	echo'
		<div class="leftpanle">
	       <table class="table table-bordered">
	          <tr>
			  
			  <th>#</th>
			   <th>اسم التصنيف</th>
			   <th>اعدادات</th>
			  </tr>
		 ';
		 while($row =mysqli_fetch_assoc($selectCatW)){
			 echo'
			 <tr>
			 <td>'.$row['c_id'].'</td>
			 <td>'.$row['c_title'].'</td>
			  <td>
			 <a href="category.php?delete=cat&c_id='.$row['c_id'].'" class="btn btn-danger">حذف</a>
			 <a href="editcat.php?id='.$row['c_id'].'" class="btn btn-info">تعديل</a>
			  </td>
			 </tr>
			 ';
		 }
	echo'
	</div>
	</table>
	';	 
	
}
?>

<? include "files/footer.php";?>