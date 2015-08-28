<?php
session_start();
$hname = $_SESSION['hname'];
$cname = $_SESSION['c_name'];
$code = $_SESSION['center_code'];
 
if(isset($_GET['logout']))
		{
			session_start();
			$_SESSION['login'] = "";
			session_destroy();
			header("Location:http://localhost/sfm/");
		}
		
	include("connect.php");
	$sql_01=mysql_query("select * from tbl_images");
	$no = mysql_num_rows($sql_01);
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
</head>

<link href="../generic.css" rel="stylesheet" type="text/css" />
</head>

<body>
<form>

<div class="navbar navbar-default navbar-fixed-top>
	<div class="container">
		<div class="navbar-header">
        	<a href="index.php" class="navbar-brand">SFM</a>
        </div>
        <div class="navbar-collapse" id="navi">
        	<ul class="nav nav-tabs">
            	<li><a href="index.php">Home</a></li>
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Activities<b class="caret"></b></a>
                <ul class="dropdown-menu">
                	<li><a href="branch.php"> Create Branch</a> </li>
                    <li><a href="edit.php"> Update Branch </a></li>
                </ul>
                </li>
                <li><a href="company_detail.php">View all schools</a></li>
                <li class="dropdown pull-right"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="glyphicon-user"></i>(<?php echo $_SESSION['admin'];?>)<b class="caret"></b></a>
                <ul class="dropdown-menu">
                	<li><a href="update.php"> Company Profile</a> </li>
                    <li><a href="settin.php"> Settings </a></li>
                    <li><a href="password.php"> Change Password </a></li>
                    <li> <div class="divider"></div></li>
                    <li><input name="logout" class="btn btn-link" type="submit" id="logout" value="Logout" /></li> 
                </ul>
                </li>
                
            </ul>
        </div>
	</div> 
</div>
<div class="maincontent" style="margin-top:60px;">
 <div id="sliderFrame">
        <div id="slider">

<div id="sfmimg" class="carousel slide">
	<ol class="carousel-indicators">
		<li data-target="#sfmimg" data-slide-to="0" class="active"></li>
        <?php 
			for($i = 1; $i < $no;$i++)
			{
				?>
        	<li data-target="#sfmimg" data-slide-to="<?php echo $i;?>" ></li>
		<?php
				}
		
		?>
     </ol>
<?php 
	$sql_01=mysql_query("select * from tbl_images");
	$i=0;
	while($data=mysql_fetch_assoc($sql_01))
	{
?>            
	<div class="carousel-inner">
    	<?php 
			if($i==0) 
				{?>
         <div class="item active">
		<?php } else { ?>
       <div class="item"> <?php }?>
        	<center><img src="../images/<?php echo $data['img_name'];?>" alt="" /></center>
        	<div class="container">
            	<div class="carousel-caption" style="color:#000">
                	<h1> School Franchisee Management </h1>
                    <p><?php echo $data['img_caption'];?></p>
             	</div>
            </div>        	
        </div>
 	</div>  		    
  
             
<?php 
	$i++;}
?> 
    <a class="left carousel-control" href="#sfmimg" data-slide="prev">
        	<span class="glyphicon glyphicon-align-left">&lsaquo;</span>
     </a>
    <a class="right carousel-control" href="#sfmimg" data-slide="next">
        	<span class="glyphicon glyphicon-align-right">&gtaquo;</span>
        </a>	
</div>


  

<div class="footer" style="margin-top:60px;">
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
</body>

</html>

