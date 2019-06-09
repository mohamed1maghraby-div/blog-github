<? include "files/header.php";?>
<? require "files/right_p.php";?>


<?php
/*
CREATE TABLE  `setting` (
 `s_name` VARCHAR( 255 ) NOT NULL ,
 `s_email` VARCHAR( 255 ) NOT NULL ,
 `s_url` VARCHAR( 255 ) NOT NULL ,
 `s_abut` TEXT NOT NULL ,
 `s_key` TEXT NOT NULL ,
 `s_copy` VARCHAR( 255 ) NOT NULL ,
 `s_close` INT NOT NULL ,
 `s_mesg_close` TEXT NOT NULL
) ENGINE = MYISAM ;

*/

$sql="SELECT * FROM setting";
$query=mysqli_query($connect,$sql);
$fetch_s=mysqli_fetch_assoc($query);


$s_name=$_POST['s_name'];
$s_email=$_POST['s_email'];
$s_url=$_POST['s_url'];
$s_abut=$_POST['s_abut'];
$s_key=$_POST['s_key'];
$s_copy=$_POST['s_copy'];
$s_close=$_POST['s_close'];
$s_mesg_close=$_POST['s_mesg_close'];

if(isset($_POST['update'])){
	
	if(empty($s_name) && empty($s_copy)){
		
		echo '<div class="error" style="width:880px; margin-top:5px;">اسم الموقع وحقوق الموقع مطلوبة</div>';
	}
	else{
		
		$sql="UPDATE setting SET 
		 s_name= '$s_name',
		 s_email= '$s_email',
		 s_url= '$s_url',
		 s_abut= '$s_abut',
		 s_key= '$s_key',
		 s_copy= '$s_copy',
		 s_close= '$s_close',
		 s_mesg_close= '$s_mesg_close'
		";
		$query=mysqli_query($connect,$sql);
         if(isset($query)){
			echo '<div class="good" style="width:880px; margin-top:5px;">تم تحديث البينات بنجاح </div>
			<meta http-equiv="refresh" content="2; url="index.php"" />
			'; 
			 
		 }		
	}
}

?>
        <div class="leftpanle">
		<div class="panle">
		
		<div class="panletitle">اعدادت الموقع</div>
		<div class="panlebody">
		   <form action="" method="post">
		   <div id="lable">اسم الموقع</div>
		   <input type="text" value="<?php echo $fetch_s['s_name'] ?>" name="s_name" style="width:400px; margin-bottom:5px;" class="form-control"/>
		    <div id="lable">بريد الموقع</div>
		   <input type="text" value="<?php echo $fetch_s['s_email'] ?>" name="s_email" style="width:400px; margin-bottom:5px;" class="form-control"/>
		    <div id="lable">رابط الموقع</div>
		   <input type="text" value="<?php echo $fetch_s['s_url'] ?>" name="s_url" style="width:400px; margin-bottom:5px;" class="form-control"/>
		    <div id="lable">وصف الموقع</div>
			<textarea name="s_abut" class="form-control" style="width:400px; margin-bottom:5px;"><?php echo $fetch_s['s_abut'] ?></textarea>
			<div id="lable">كلمات مفتاحية</div>
			<textarea name="s_key" class="form-control" style="width:400px; margin-bottom:5px;"><?php echo $fetch_s['s_key'] ?></textarea>
			<div id="lable">حقوق الموقع</div>
            <input type="text" value="<?php echo $fetch_s['s_copy'] ?>" name="s_copy" style="width:400px; margin-bottom:5px;" class="form-control"/>
		    <div id="lable">حالة الموقع</div>
			<select name="s_close" class="form-control" style="width:400px; margin-bottom:5px;">
			<?
			
			if($fetch_s['s_close']== 1 ){
				
				echo '<option value="1">مفتوح</option>
			          <option value="2">مغلق</option>';
			}
			else{
					echo '<option value="2">مغلق</option>
					      <option value="1">مفتوح</option>';
				
			}
			?>
			</select>
			<div id="lable">رسالة الغلق</div>
			<textarea name="s_mesg_close" class="form-control" style="width:400px; margin-bottom:5px;"><?php echo $fetch_s['s_mesg_close'] ?></textarea>
			 <input type="submit" name="update" style="font-family:tahoma; margin-bottom:5px;"  value="تحديث" class="btn btn-warning"/>
		</div>
		
		</div>
		
		</div>
		</form>
<? include "files/footer.php";?>