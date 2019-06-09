</div>
<div class="left_p l">
  <div id="p_title">search</div>
  <div id="p_cont">
  <form action="search.php" method="post">
     <input type="text" style="width:185px; float:right;" name="search" class="form-control" placeholder="search here..." />
	 <input type="submit" name="submit" class="btn btn-danger" value="search"  />
  </form>
  </div>
</div>
<?php

$selectBlok=mysqli_query($connect,"SELECT * FROM block");
while($row=mysqli_fetch_assoc($selectBlok)){
	echo'
	<div class="left_p l">
      <div id="p_title">'.$row['b_title'].'</div>
	  <div id="p_cont">'.$row['b_cont'].'</div>
	</div>
	
	';
}

?>
<div class="l">
<img src="./img/mobile_content_js250x2501a.gif" />
</div>
<div class="l">
<img src="./img/large_gaa2 copy.jpg" />
</div>
<div class="l">
<img src="./img/unnamed.png" />
</div>

<div class="clear"></div>
</div>
<!-- body end /by mohamed maghrby  -->