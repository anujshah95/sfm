<?php
session_start();
$hname = $_SESSION['hname'];
$cname = $_SESSION['c_name'];
$code = $_SESSION['center_code'];
if(isset($_GET['done']))
{
	include("connect.php");
	$img1 = $_GET['img1'];
	$img2=$_GET['img2'];
	$img3 = $_GET['img3'];
	$img4 = $_GET['img4'];
	$img5 = $_GET['img5'];
	mysql_query("update base set img1 ='$img1', img2='$img2', img3='$img3', img4='$img4', img5='$img5' where code='$code'",$link);
	header("location:schooladmin_home.php");
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
<form>
 
<div class="navbar navbar-default navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
        	<a href="#" class="navbar-brand">SFM</a>
        </div>
        <div class="navbar-collapse">
        	<ul class="nav nav-tabs">
            	<li><a href="#">Home</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="#loginModal" data-toggle="modal">Login</a></li>
            </ul>
        </div>
	</div> 
</div>



	<div class="container">
 		<div class="row">
           	<div class="col-lg-12">
      			<div class="progress progress-striped">
					<div class="progress-bar" style="width:70%">Registration | Fill Information</div>
				</div>      	
            </div>
        </div>
    </div>
		    
    <div class="well">
    	<div class="container">
        	
	         <div class="row">
            	<div class="col-md-2"></div>
            	<div class="col-md-8">
                	<h2><center>Images for SlideShow</center></h2>
                </div>
            	<div class="col-md-2"></div>
            </div>	
            <div class="row">
            	<div class="col-md-2"></div>
            	<div class="col-md-3">
                	<h4>Image1</h4>
                </div>
                 <div class="col-md-5">
                	<input type="file" name="img1" id="img1" placeholder="Image 1"/>
                </div>
                <div class="col-md-2"></div>
            </div>
            
             <div class="row">
            	<div class="col-md-2"></div>
            	<div class="col-md-3">
                	<h4>Image2: </h4>
                </div>
                 <div class="col-md-5">
                	<input type="file" name="img2" id="img2" placeholder="Image 2"/>
                </div>
                <div class="col-md-2"></div>
            </div>


             <div class="row">
            	<div class="col-md-2"></div>
            	<div class="col-md-3">
                	<h4>Image3: </h4>
                </div>
                 <div class="col-md-5">
                	<input type="file" name="img3" id="img3" placeholder="Image 3"/>
                </div>
                <div class="col-md-2"></div>
            </div>


             <div class="row">
            	<div class="col-md-2"></div>
            	<div class="col-md-3">
                	<h4>Image4: </h4>
                </div>
                 <div class="col-md-5">
                	<input type="file" name="img4" id="img4" placeholder="Image 4"/>
                </div>
                <div class="col-md-2"></div>
            </div>


             <div class="row">
            	<div class="col-md-2"></div>
            	<div class="col-md-3">
                	<h4>Image5: </h4>
                </div>
                 <div class="col-md-5">
                	<input type="file" name="img5" id="img5" placeholder="Image 5"/>
                </div>
                <div class="col-md-2"></div>
            </div>
            
			<div class="row">
            	<div class="col-md-2"></div>
            	<div class="col-md-3">
                	<h4></h4>
                </div>
                 <div class="col-md-3">
                	<input type="submit" name="done" id="done" class="btn btn-primary pull-right" value="Done"/>
                </div>
            	<div class="col-md-2"></div>
            </div>


        </div>
    </div>
    </form>
</body>
</html>