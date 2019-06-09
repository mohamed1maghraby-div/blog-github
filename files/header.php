<?php ob_start(); ?>
<?php include "inc/confag.php";?>
<?php include "function.php";?>
<?php
$id_cookie = $_COOKIE['id'];
$login_cookie = $_COOKIE['login'];

$select_user= mysqli_query($connect,"SELECT * FROM users WHERE u_id='".$id_cookie."'");
$fetch_user=mysqli_fetch_assoc($select_user);


$selects=mysqli_query($connect,"SELECT * FROM setting");
$fetchs=mysqli_fetch_object($selects);
?>

<!DOCTYPE html>
<html>
<head>
  <title> <?php echo $fetchs->s_name; ?></title>
  <meta http-equiv="Content-Type" content="text/html; charset=windows-1256" />
  <meta name="key" content="<?php echo $fetchs->s_key; ?>" />
    <meta name="decrpion" content="<?php echo $fetchs->s_abut; ?>" />
  <link rel="stylesheet" type="text/css" href="css/style.css" />

  <link href='http://fonts.googleapis.com/earlyaccess/droidarabickfi.css' rel='stylesheet' type='text/css'/> 
  <link href='http://fonts.googleapis.com/earlyaccess/droidarabicnaskh.css' rel='stylesheet' type='text/css' />
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

  <!-- Latest compiled and minified JavaScript -->
  <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>-->
</head>
<?
if($fetchs->s_close == 2){
	
	echo '<div class="error" style="width:100%; text-align:center; padding:15px 0px;">'.$fetchs->s_mesg_close.'</div>';
	exit();
	
}

?>
<body>
<!-- header start  -->
  <div class="headertop">
  <ul class="content">
   <?php
   $selecpage=mysqli_query($connect,"SELECT * FROM page");
   while($row=mysqli_fetch_assoc($selecpage)){
	   echo'<li><a href="page.php?id='.$row['pg_id'].'">'.$row['pg_title'].'<a/></li>';
   }
   ?>
<?php
if($login_cookie==1){
	if($_GET['type'] == 'logout'){
			setcookie("id","",time()+60*60*48);
				setcookie("login","",time()+60*60*48);
				
				refresh(1,'index.php');
		
	}
	echo' <li><a href="profile.php?user='.$id_cookie.'">'.$fetch_user['u_name'].'</a></li>';
	echo' <li><a href="index.php?type=logout">logout</a></li>';
	
}
else{
	
	echo'   <li><a href="register.php">register</a></li>
      <li><a href="login.php">login</a></li>';
}
?>
  </ul>
  </div>
 <div class="content">
  <div class="logo r"><img src="http://localhost/blog/img/1.png" width="150px"/> </div>
  <div class="ads l" style="margin-top:25px; margin-left:50px;">  
     <a href="#" ><img src="img/ads.jpg" width="680" /></a>
  </div>
  <div class="clear">  </div>
 </div>
 <div class="menubar">
     <ul class="content"> 
	 <li class="home"><a href="index.php">home</a></li>
     <?php
	 $selectAllCat=mysqli_query($connect,"SELECT * FROM category");
	 while($row=mysqli_fetch_assoc($selectAllCat)){
		 echo '<li><a href="category.php?id='.$row['c_id'].'">'.$row['c_title'].'</a></li>';
	 }
	 ?>
	 <div class="clear"></div>
     </ul>
 </div>
<!-- header end / by mohamed maghraby -->
<!-- body start  -->

<div style="margin-top:20px; margin-bottom:20px;" class="content">
<div style="width:680px; float:right;">