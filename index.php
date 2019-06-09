<?php include"files/header.php"?>
<?php
  
  if(!isset($_GET['page'])){
	  $page=1;
  }
  else{
	  $page=(int)$_GET['page'];
  }
  $post_at_page=4;
  $queryselect=mysqli_query($connect,"SELECT * FROM posts");
  $post_count=mysqli_num_rows($queryselect);
  mysqli_free_result($queryselect);
  $page_count=(int)ceil($post_count/$post_at_page);
  
  if(($page>$page_count || ($page <= 0))){
	  echo'<div class="error">Sorry the page you are looking for is not available</div>';
  }
  $start=($page -1 )* $post_at_page;
  $end = $post_at_page;
  
  $selectposts=mysqli_query($connect,"SELECT * FROM posts ORDER BY p_id DESC LIMIT $start,$end");
  
  while($row=mysqli_fetch_assoc($selectposts)){
	  $selectCATp=mysqli_query($connect,"SELECT * FROM category WHERE c_id = '".$row['p_cat']."'");
	  $fetchCATp=mysqli_fetch_object($selectCATp);
	  echo '<div class="right_p r" style="margin-bottom:20px;"> 
  
        <div class="post_info">
         <a href="post.php?id='.$row['p_id'].'">'.$row[p_title].'</a>
		 <div id="about_post">
		     <ul> 
			   <li>writer : <a href="#">mohamed maghraby</a> |</li>
			   <li>in : <a href="#"> '.$row['p_date'].' </a> |</li>
			   <li>categories : <a href="category.php?id='.$fetchCATp->c_id.'">'.$fetchCATp->c_title.'</a></li>
		     <div class="clear"></div>
			 </ul>
		 </div>
        </div>
		<div class="post">
		 <div id="post_img" class="r">
		  <img src="admin/images/'.$row['p_img'].'" class="img-thumbnail" width="270" height="175" />
		   </div>
		   <div id="post_sub" class="l">'.mb_substr($row['p_sub'],'0','200','utf-8').'...</div>
		   <div class="rm l" ><a href="#">more</a></div>
		   <div class="clear"></div>
		</div>
  </div>';
	  
  }
  echo'<ul class="pagination">';
  for($i = 1 ; $i <=$page_count ; $i++){
	  if($page==$i){
		  echo'<li><a>'.$page.'</a></li>';
	  }
	  else{
		  echo'<li><a href="index.php?page='.$i.'">'.$i.'</a></li>';
	  }
  }
  
  echo'</ul>';
?>  


<!-- body end /by mohamed maghrby  -->

<?php include"files/block.php"?>
<?php include"files/footer.php"?>