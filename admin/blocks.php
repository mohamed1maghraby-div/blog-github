<?php include "files/header.php";?>
<?php include "files/right_p.php";?>
<?php

$b_id=$_GET['b_id'];

if($_GET['delete'] == "block"){
	$deleteblock=mysqli_query($connect,"DELETE FROM block WHERE b_id ='".$b_id."'");
	if(isset($deleteblock)){
		header("location:blocks.php");
	}
}

$seleBloc=mysqli_query($connect,"SELECT * FROM block");
if(mysqli_num_rows($seleBloc) == 0){
	echo '<div class="error" style="width:880px; margin-top:10px;">لاتوجد اى قوائم</div>';
}
else{
	$selectB=mysqli_query($connect,"SELECT * FROM block");
	echo'
	<div class="leftpanle">
	<table class="table table-bordered" >
	<tr>
	<th>#</th>
	<th>عنوان القائمة</th>
	<th>الاعدادت</th>
	</tr>';
	while($row=mysqli_fetch_assoc($selectB)){
		echo'<tr>
		<td>'.$row['b_id'].'</td>
		<td>'.$row['b_title'].'</td>
		<td><a href="blocks.php?delete=block&b_id='.$row['b_id'].'" class="btn btn-danger">حذف</a>
			 <a href="editblock.php?id='.$row['b_id'].'" class="btn btn-info">تعديل</a></td>
		</tr>';
	}
	echo'
	</table>
	</div>
	';
}


?>

<? include "files/footer.php";?>