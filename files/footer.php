<!--footer start -->
<?php

$selectLastPost=mysqli_query($connect,"SELECT * FROM  posts ORDER BY p_id DESC LIMIT 0,4");


?>
<div class="footer">
<ul class="content">
<li>
   <div id="footerT">who am I?</div>
   <div id="footerC"><?php echo $fetchs->s_abut; ?></div>
</li>
<li>
   <div id="footerT">Latest posts</div>
   <div id="footerC">
     <ul>
         <?php
		 
		  while($row=mysqli_fetch_assoc($selectLastPost)){
			  echo'<li><a href="post.php?id='.$row['p_id'].'">'.$row['p_title'].'</a></li>';
		  }
		 
		 ?>	 
	 </ul>
   </div>
</li>
<li>
   <div id="footerT">categories</div>
      <div id="footerC">
	     <?php
		 
		 $selectCategory=mysqli_query($connect,"SELECT * FROM category ");
		 while($row=mysqli_fetch_object($selectCategory)){
			 echo'<a href="category.php?id='.$row->c_id.'" style="float:right; padding-left:5px;">'.$row->c_title.'<br></a> ';		 
		 }
		 ?>
	  </div>
</li>
</ul>
  <div class="clear"></div>
</div>
<div id="right">
  <?php echo $fetchs->s_copy; ?>
</div>
<!--footer end / by mohamed maghraby -->
</body>
</html>