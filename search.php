<?php include"files/header.php"?>
<?php
  
$search=$_POST['search'];

$sql="select * from posts where p_title like '%$search%'";
$query=mysqli_query($connect,$sql);
if(mysqli_num_rows($query)==0){
	echo'<div class="error">لا توجد اى بينات تبحث عنها</div>';
}
else{


  

  
  while($row=mysqli_fetch_assoc($query)){
	  $selectCATp=mysqli_query($connect,"SELECT * FROM category WHERE c_id = '".$row['p_cat']."'");
	  $fetchCATp=mysqli_fetch_object($selectCATp);
	  echo '<div class="right_p r" style="margin-bottom:20px;"> 
  
        <div class="post_info">
         <a href="post.php?id='.$row['p_id'].'">'.$row[p_title].'</a>
		 <div id="about_post">
		     <ul> 
			   <li>الكاتب : <a href="#">محمد مغربى</a> |</li>
			   <li>فى : <a href="#"> '.$row['p_date'].' </a> |</li>
			   <li>التصنيفات : <a href="category.php?id='.$fetchCATp->c_id.'">'.$fetchCATp->c_title.'</a></li>
		     <div class="clear"></div>
			 </ul>
		 </div>
        </div>
		<div class="post">
		 <div id="post_img" class="r">
		  <img src="admin/images/'.$row['p_img'].'" class="img-thumbnail" width="270" height="175" />
		   </div>
		   <div id="post_sub" class="l">'.mb_substr($row['p_sub'],'0','200','utf-8').'...</div>
		   <div class="rm l" ><a href="#">المزيد</a></div>
		   <div class="clear"></div>
		</div>
  </div>';
	  
  }
}

?>  


<!-- body end /by mohamed maghrby  -->

<?php include"files/block.php"?>
<?php include"files/footer.php"?>