<?php
session_start();
$hname = $_SESSION['hname'];
$cname = $_SESSION['c_name'];
$selectedcode = $_SESSION['center_code'];
 
if(isset($_GET['logout']))
		{
			session_start();
			$_SESSION['login'] = "";
			session_destroy();
			header("Location:http://localhost/sfm/");
		}
	include("connect.php");
if(isset($_GET["imgid"]))
{
	$del_data = $_GET["imgid"];
	mysql_query("delete from tbl_images where img_id='$del_data'",$link);
	header("location:settin.php?id=2");
	}

?>

<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>HomePage</title>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.js"></script>
</head>

<body>

<?php include("menu.php");?>

	<br><br>    
    <div class="well col-md-3">
    	<div class="container">
           <div class="row">
            	<div class="col-md-3">
                	<h3>Company Settings</h3>
                    <div class="divider"></div>
                    <br/>
                    
                    <a href="settin.php?id=1"> Insert SlideShow Images </a><br/><br/>
                    <a href="settin.php?id=2"> Remove SlideShow Images </a>
                    
             </div>
        </div>	
    </div>
  </div>
  
      <div class="well col-md-9">
    	<div class="container">
			
			           
  				
        	<?php if(@$_GET['id']==1) include('slide1.php');?>
            
            <?php if(@$_GET['id']==2) include('thumbnail.php');?>
    </div>
  </div> 
</body>

</html>

