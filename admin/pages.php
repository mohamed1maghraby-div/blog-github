<?php include "files/header.php"; ?>
<?php include "files/right_p.php"; ?>
<?php
$pg_id=$_GET['pg_id'];
if($_GET['delete']=="page"){
	$deletePage=mysqli_query($connect,"DELETE FROM page WHERE pg_id='".$pg_id."'");
	if(isset($deletePage)){
		header("location:pages.php");
	}
}

$selectQ=mysqli_query($connect,"SELECT * FROM page");
if(mysqli_num_rows($selectQ) == 0){
	echo'<div class="error" style="width:880;margin-top:10px;">Аг йФло гЛ ущмгй</div>';
}
else{
	$selectQuery=mysqli_query($connect,"SELECT * FROM page");
	echo'
	 <div class="leftpanle">
	   <table class="table table-bordered">
	     <tr>
		 <th>#</th>
		 <th>зДФгД гАущми</th>
		 <th>гАгзогогй</th>
		 </tr>
		 ';
		 while($row=mysqli_fetch_assoc($selectQuery)){
			 echo'
			  <tr>
			    <td>'.$row['pg_id'].'</td>
				<td>'.$row['pg_title'].'</td>
			<td><a href="pages.php?delete=page&pg_id='.$row['pg_id'].'" class="btn btn-danger">мпщ</a>
			 <a href="editpage.php?id='.$row['pg_id'].'" class="btn btn-info">йзоМА</a></td>
			  </tr>
			 ';
		 }
		 echo'
	   </table>
	 </div>
	';
}
?>
<?php include "files/footer.php"; ?>