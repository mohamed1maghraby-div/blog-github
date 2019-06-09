<?php include "files/header.php"; ?>
<?php

$b_title=$_POST['b_title'];
$b_cont=$_POST['b_cont'];

if(isset($_POST['insert'])){
	$addblock=mysqli_query($connect,"INSERT INTO block(b_title,b_cont) VALUE('$b_title','$b_cont')");
      if(isset($addblock)){
		  header("location:addblock.php");
	  }
	}

?>

    <div class="leftpanle">
		<div class="panle">
		
		<div class="panletitle">اضافة قائمة</div>
		<div class="panlebody">
		   <form action="" method="post" enctype="multipart/form-data">
		   <div id="lable">عنوان القائمة</div>
		   <input type="text"  name="b_title" style="width:400px; margin-bottom:5px;" class="form-control"/>
		   		   <div id="lable">محتوى القائمة</div>
            <textarea name="b_cont" style="width:400px; margin-bottom:5px;" class="form-control"></textarea>      
           <input type="submit" name="insert" style="font-family:tahoma; margin-bottom:5px;"  value="اضافة" class="btn btn-warning"/>
		   </form>
		</div>
		
	</div>
		
</div>
<?php include "files/right_p.php"; ?>

<?php include "files/footer.php"; ?>
