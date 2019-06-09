<? include "files/header.php";?>
<? require "files/right_p.php";?>
<?php

$p_id= intval($_GET['p_id']);

if($_GET['delete'] == "post"){
	
	$deletepost = mysqli_query($connect, "DELETE FROM posts WHERE p_id = '".$p_id."' ");
	if(isset($deletepost)){
		header("location:post.php");
		
	}
}

$selectPostR =mysqli_query($connect,"SELECT * FROM posts");

if(mysqli_num_rows($selectPostR) == 0){
echo '<div class="error" style="width:880px; margin-top:10px; ">عذرا لاتوجد اى تدوينات مكتوبة</div>';	
	
}
else{
	echo '<div class="leftpanle">
	       <table class="table table-bordered">
	          <tr>
			  
			  <th>#</th>
			   <th>عنوان التدوينة</th>
			   <th>صور التدوينة</th>
			   <th>تاريخ التدوينة</th>
			   <th>تصنيف التدوينة</th>
			   <th>اعدادات</th>
			  </tr>
			  ';
			  $query = mysqli_query($connect,"SELECT * FROM posts");
			  while($row = mysqli_fetch_assoc($query)){
				  
				  $selectCAT=mysqli_query($connect,"SELECT * FROM category WHERE c_id='".$row['p_cat']."'");
				  $fetchCAT=mysqli_fetch_assoc($selectCAT);
				  
				  echo '
				  <tr>
				  <td>'.$row['p_id'].'</td>
				  <td>'.$row['p_title'].'</td>
				  <td><img src="images/'.$row['p_img'].'" width="45" height="45" /></td>
				  <td>'.$row['p_date'].'</td>
				  <td>'.$fetchCAT['c_title'].'</td>
				  <td>
				   <a href="post.php?delete=post&p_id='.$row['p_id'].'" class="btn btn-danger">حذف</a>
				   <a href="editpost.php?id='.$row['p_id'].'" class="btn btn-info">تعديل</a>
				  </td>
				  </tr>
				  
				  ';
				  
			  }
			  echo '
			 </table>
	      </div>';
}

?>

<? include "files/footer.php";?>