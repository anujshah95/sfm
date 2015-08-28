<?php
session_start();
$hname = $_SESSION['hname'];
$cname = $_SESSION['c_name'];


if(isset($_GET['next']))
{
	include("connect.php");
	$code = $_SESSION['center_code'];
	$cname=$_GET['cname'];
	$clogo = $_GET['logo'];
	$hname = $_GET['hname'];
	$des = $_GET['address'];
	mysql_query("insert into base(code,cname,clogo,hname,description) values('$code','$cname','$clogo','$hname','$des')",$link);
	}
	if($_GET['next'] == "Next")
	header("location:img.php");
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
					<div class="progress-bar" style="width:40%"></div>
				</div>      	
            </div>
        </div>
    </div>
		    
    <div class="well">
    	<div class="container">
        	
	         <div class="row">
            	<div class="col-md-2"></div>
            	<div class="col-md-8">
                	<h2><center>Basic Info of Company</center></h2>
                </div>
            	<div class="col-md-2"></div>
            </div>	
            <div class="row">
            	<div class="col-md-2"></div>
            	<div class="col-md-3">
                	<h4>Company Name</h4>
                </div>
                 <div class="col-md-5">
                	<input type="text" name="cname" id="cname" readonly value="<?php echo $cname;?>"/>
                </div>
                <div class="col-md-2"></div>
            </div>
            <div class="row">
            	<div class="col-md-2"></div>
            	<div class="col-md-3">
                	<h4>Company Logo</h4>
                </div>
                 <div class="col-md-5">
                	<input type="file" name="logo" id="logo" placeholder="Upload the logo of company"/>
                </div>
                <div class="col-md-2"></div>
            </div>
            
            <div class="row">
            	<div class="col-md-2"></div>
            	<div class="col-md-3">
                	<h4>Creator's Name</h4>
                </div>
                 <div class="col-md-5">
                	<input type="text" name="hname" id="hname" placeholder="" readonly value="<?php echo $hname;?>"/>
                </div>
            	<div class="col-md-2"></div>
            </div>
            
            <div class="row">
            	<div class="col-md-2"></div>
            	<div class="col-md-3">
                	<h4>Description [For Introduction Part]</h4>
                </div>
                 <div class="col-md-6">
                	<textarea name="address" id="address" placeholder="Enter Description"></textarea>
                </div>
               
            </div>
            
            

		      <div class="row">
            	<div class="col-md-2"></div>
            	<div class="col-md-3">
                	<h4></h4>
                </div>
                 <div class="col-md-3">
                	<input type="submit" name="next" id="next" class="btn btn-primary pull-right" value="Next"/>
                </div>
            	<div class="col-md-2"></div>
            </div>

        </div>
    </div>
    
</form>
</body>

</html>

