<?php
session_start();
	echo "<br><br><br>";
	$code = $_SESSION['code'];
			if($_SESSION['login'] == "")
				header("Location:http://localhost/sfm/");
			 
if(isset($_GET['logout']))
		{
			session_start();
			$_SESSION['login'] = "";
			session_destroy();
			header("Location:http://localhost/sfm/");
		}
		
	include("connect.php");
	
?>

<?php 
	if(isset($_GET['search_btn']))
	{	$var = $_GET['search'];
		header("location:search.php?id=$var");
		}
		if(isset($_POST['search_btn']))
	{	$var = $_POST['search'];
		header("location:search.php?id=$var");
		}


?>

<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>HomePage</title>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.js"></script><link href="../themes/1/js-image-slider.css" rel="stylesheet" type="text/css" />
<script src="../themes/1/js-image-slider.js" type="text/javascript"></script>
<style>
.shadow1{
	/*
	-moz-box-shadow: 10px 10px 10px #000;
	-webkit-box-shadow: 10px 10px 10px #000;
	box-shadow: 10px 10px 10px #000;
	*/
	-moz-box-shadow: 0 0 5px 5px #888;
	-webkit-box-shadow: 0 0 5px 5px#888;
	box-shadow: 0 0 5px 5px #888;
	/* For IE 8 */
	-ms-filter: "progid:DXImageTransform.Microsoft.Shadow(Strength=4, Direction=135, Color='#000000')";
	/* For IE 5.5 - 7 */
	filter:progid:DXImageTransform.Microsoft.Shadow(color='#000000',direction='120',strength='20');
}
.shadow1 .content {
        position: relative; /* This protects the inner element from being blurred */
        padding: 100px;
        background-color: #DDD;
}

</style>
</head>

<link href="../generic.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="shadow1">
<form>

<?php include("menu.php");?>

<div class="maincontent" style="margin-top:60px;">
 <div id="sliderFrame">
        <div id="slider">

<?php 
	$sql_01=mysql_query("select * from tbl_images where code='$code'");
	if(mysql_num_rows($sql_01) == 0)
	{	$sql_01=mysql_query("select * from tbl_images where code='default'");
		while($data=mysql_fetch_assoc($sql_01))
	{
?>            
            <img src="../images/<?php echo $data['img_name'];?>" alt="" />
<?php 
	}
		}
	else{	
	while($data=mysql_fetch_assoc($sql_01))
	{
?>            
            <img src="../images/<?php echo $data['img_name'];?>" alt="" />
<?php 
	}}
?>  
  </div>
</div>
<br>

<div class="footer" style="margin-bottom:10px">
	<div class="container">
		<table width="80%" align="center">
			<tr>
				<td> <center>The Website developed by</center></td></tr><tr>
				<td> <center>Chirag Sanghvi | Anuj Shah</center> </td></tr><tr>
				<td> <center>&copy;2013 - <?php echo date("Y"); ?></center> </td> 
			</tr>
		</table>
       
	</div> 
</div>
    
</form>
</div>
</body>

</html>

