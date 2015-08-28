<?php
session_start();
?>
<?php
$msg="";

if(@$_GET['submit']=="submit")
{	
	$_SESSION['login'] = " ";
	$name=$_GET['name'];
	$pass=$_GET['pass'];
	$user=$_GET['user'];
	{
	include_once("school_admin/connect.php");
	$query = mysql_query("select * from $user",$link);
	while($row= mysql_fetch_array($query))
	{
	if($name==$row['username'] and $pass==$row['password'])
	  {
		$_SESSION['login']="login";
	    $_SESSION['admin']= $name; 
		
		if($user == "admin")
		header("Location:admin/admin_home.php");
		else if ($user == "school_admin")
		{	$code=$row['code'];
			$_SESSION['center_code'] = $row['code'];
			$qry= mysql_query("select * from company where code='$code'",$link);
			while($row= mysql_fetch_array($qry))
			{
				$_SESSION['c_name'] = $row['c_name'];
				$_SESSION['hname'] = $row['headname'];
				
				}
			
			header("Location:school_admin/");
		}
		else
		{
		$_SESSION['var'] =0;
		header("Location:branch_admin/");
		}}
	}
//	else if($name != "admin")
		echo "<script>alert('Invalid Username Or Password')</script>";
		$msg = "Invalid Username Or Password";
//	else if($pass != "1234")
//		$msg = "Incorrect Password";
	
	}
}
?>

<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>HomePage</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
</head>

<body>
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
        		<li><p clas="lead"> This ppt is about bootstrap</p>
                <li><dl class="dl-horizontal">
                <dt> Bootstrap</dt>
                <dd> This page explain about typography of bootstrap</dd>
                </dl>
            </ul>
            
        </div>
	</div> 
</div>


<div id="sfmimg" class="carousel slide">
	<ol class="carousel-indicators">
		<li data-target="#sfmimg" data-slide-to="0" class="active"></li>
        <li data-target="#sfmimg" data-slide-to="1"></li>
        <li data-target="#sfmimg" data-slide-to="2"></li>
    </ol>

	<div class="carousel-inner">
    	<div class="item active">
			<center><img src="school_admin/images/1.jpg"  height="500" width="614" /></center>
        	<div class="container">
            	<div class="carousel-caption" style="color:#000">
                	<h1> School Franchisee Management </h1>
                    <p>This is all about Pre-School Franchisee</p>
                    <p><a href="#loginModal" data-toggle="modal" class="btn btn-large btn-primary">Login</a></p>
                </div>
            </div>        	
        </div>
        
        <div class="item">
			<center><img src="school_admin/images/2.jpg"  height="500" width="614"/></center>
        	<div class="container">
            	<div class="carousel-caption"  style="color:#000">
                	<h1> School Franchisee Management </h1>
                    <p>This is all about Pre-School Franchisee</p>
                    <p><a href="#loginModal" data-toggle="modal" class="btn btn-large btn-primary">Login</a></p>
                </div>
            </div>        	
        </div>
        
        <div class="item">
			<center><img src="school_admin/images/3.jpg" height="500" width="614"/></center>
        	<div class="container">
            	<div class="carousel-caption"  style="color:#000">
                	<h1> School Franchisee Management </h1>
                    <p>This is all about Pre-School Franchisee</p><br/>
                    <a href="#loginModal" data-toggle="modal" class="btn btn-primary">Login</a>
                </div>
            </div>        	
        </div>
        
    </div>
    <a class="left carousel-control" href="#sfmimg" data-slide="prev">
        	<span class="glyphicon glyphicon-align-left">&lsaquo;</span>
     </a>
    <a class="right carousel-control" href="#sfmimg" data-slide="next">
        	<span class="glyphicon glyphicon-align-right">&gtaquo;</span>
        </a>	
</div>

<div class="modal fade" role="dialog" tabindex="-1" id="loginModal" aria-hidden="true">
	<div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
    	<h3> Login </h3>	
    </div>
    <div class="modal-body">
    <form><table class="table table-striped " width="266" border="0" align="center" cellpadding="0" cellspacing="0">
   		<tr>
    		<td class="info" width="125">User type:</td>
    		<td class="success" align="center"><label>
					<select name="user">
        				<option value = "admin" selected>Admin </option>
        				<option value="school_admin">School Admin </option>
        				<option value="branch_admin">Branch Admin</option>
        			</select>
    		</label></td>
  		</tr>

  		<tr>
    		<td class="warning" width="125">Name</td>
    		<td class="error"  align="center"><label>
      			<input type="text" name="name" placeholder="enter name" required />
    		</label></td>
  		</tr>
  		
        <tr>
    		<td>Password</td>
    		<td align="center"><label>
      		<input type="password" name="pass" placeholder="enter password" required/>
		    </label></td>
  		</tr>
  		
        <tr>
    	<td colspan="2"><b><center><font color="#FF0000"><?php echo $msg; ?></font></center></b></td>
  		</tr>
  
  		<tr><td></td>
    		<td colspan="6" class="pull-right">
      		<label>
      		<input class="btn btn-success" type="submit" name="submit" id="submit" value="submit" />
      		</label>
    		</td>
    	</tr>
</table></form>
    </div>
    <div class="modal-footer">
    	<button data-dismiss="modal" aria-hidden="true" class="btn">Close </button> 
    </div>
</div></div></div>

<div class="footer">
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

</body>
</html>