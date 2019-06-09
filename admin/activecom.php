<? include "files/header.php";?>
<? require "files/right_p.php";?>
<?php
$c_id=$_GET['c_id'];

if($_GET['delete'] == "comment"){
	$deleteComment=mysqli_query($connect,"DELETE FROM comment WHERE c_id='".$c_id."'");
	if(isset($deleteComment)){
		header("location:activecom.php");
	}
}
if($_GET['active'] == "comment"){
	$activeComment=mysqli_query($connect,"UPDATE comment SET c_active='2' WHERE c_id='".$c_id."'");
	if(isset($activeComment)){
		header("location:activecom.php");
	}
}

$selectcomment=mysqli_query($connect,"SELECT * FROM comment WHERE c_active = '1' ");
if(mysqli_num_rows($selectcomment) == 0){
	echo '<div class="error" style="width:880px; margin-top:10px;"> لا توجد اة تعليقات غير مفعلة</div>';
}
else{
	$selectCatW=mysqli_query($connect,"SELECT * FROM category");
	echo'
		<div class="leftpanle">
	       <table class="table table-bordered">
		<tr>
		<th>#</th>
		<th>صاحب التعليق</th>
		<th>نص التعليق</th>
		<th>تاريخ التعليق</th>
		<th>التدوينة المعلق عليها</th>
		<th>الاعدادات</th>
		</tr>
		';
		$selectCom=mysqli_query($connect,"SELECT * FROM comment WHERE c_active = '1' ");
      while($row=mysqli_fetch_assoc($selectCom)){
		  $selectu=mysqli_query($connect,"SELECT * FROM users WHERE u_id ='".$row['c_user']."'");
		  $fetchu=mysqli_fetch_assoc($selectu);
		$selectp=mysqli_query($connect,"SELECT * FROM posts WHERE p_id ='".$row['c_post']."'");
		$fetchp=mysqli_fetch_assoc($selectp);
		echo '
		 <tr>
		 <td>'.$row['c_id'].'</td>
		 <td>'.$fetchu['u_name'].'</td>
		 <td>'.$row['c_comment'].'</td>
		 <td>'.$row['c_time'].'</td>
		 <td>'.$fetchp['p_title'].'</td>
		 <td>
			<a href="activecom.php?delete=comment&c_id='.$row['c_id'].'" class="btn btn-danger">حذف</a>
			<a href="activecom.php?active=comment&c_id='.$row['c_id'].'" class="btn btn-info">تفعيل</a>
		</td>
		 </tr>
		 '; 
	  }
		echo'
		</table>
		</div>
			 ';
 }

 
	



?>

<? include "files/footer.php";?>