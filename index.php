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
	include_once("connect.php");

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
		{	
			$code=$row['code'];
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
		$_SESSION['code'] = $row['code'];	
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


if(@$_GET['fill']=="Fill")
{	include("connect.php");
	$name = $_GET['name'];
	$address = $_GET['address'];
	$phone = $_GET['phone'];
	$time = $_GET['time'];
	$place = $_GET['place'];
	mysql_query("insert into admin_inquiry values('$name','$address','$phone','$time','$place','0')",$link);
	echo '<script>Your inquiry form is submited. We will back to you shortly</script>';
	header("location:index.php");
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
        	<a href="#" class="navbar-brand"><img src="images/sfm.png" width="100px" height="100px"></a>
        </div>
        <div class="navbar-collapse">
        	<ul class="nav nav-tabs">
            	<li><a href="#">Home</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="#loginModal" data-toggle="modal">Login</a></li>
                <li><a href="#inquiry" data-toggle="modal">Inquiry</a></li>
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
			<center><img src="images/1.jpg"  height="600" width="650" /></center>
        	<div class="container">
            	<div class="carousel-caption" style="color:#000">
                	<h1> School Franchisee Management </h1>
                    <p> This is a software is to manage the franchisee of pre-school.</p>
                    
                </div>
            </div>        	
        </div>
        
        <div class="item">
			<center><img src="images/2.jpg"  height="600" width="650"/></center>
        	<div class="container">
            	<div class="carousel-caption"  style="color:#000">
                	<h1> School Franchisee Management </h1>
                    <p> This is a software is to manage the franchisee of pre-school.</p>
                    
                </div>
            </div>        	
        </div>
        
        <div class="item">
			<center><img src="images/3.jpg" height="600" width="650"/></center>
        	<div class="container">
            	<div class="carousel-caption"  style="color:#000">
                	<h1> School Franchisee Management </h1>
                    <p> This is a software is to manage the franchisee of pre-school.</p><br/>
                    
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
    <form>
		<table width="266" border="0" align="center" cellpadding="0" cellspacing="0">
   		<tr>
    		<td width="125">User type:</td>
    		<td  align="center"><label>
					<select name="user">
        				<option value = "admin" selected>Admin </option>
        				<option value="school_admin">School Admin </option>
        				<option value="branch_admin">Branch Admin</option>
        			</select>
    		</label></td>
  		</tr>

  		<tr>
    		<td width="125">Name</td>
    		<td  align="center"><label>
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

<div class="modal fade" role="dialog" tabindex="-1" id="inquiry" aria-hidden="true">
	<div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
    	<h3> Inquiry Form </h3>	
    </div>
    <div class="modal-body">
    <form><table width="294" class="table table-striped">
		<tr>
			<th width="118">Name:</th>
			<td width="164"> <input type="text" name="name" placeholder="enter name" required value=""  /></td>
		</tr>
		<tr>
            <th>Email Address:</th>
            <td><label>
             <input type="text" name="address" placeholder="enter address" required value=""  />
            </label></td>
        </tr>
        <tr>
            <th>Phone:</th>
            <td><label>
              <INPUT TYPE = "Text" name = "phone" >
            </label></td>
        </tr>
        <tr>
            <th>Start-up Timeframe:</th>
            <td><select name="time">
            	<option value="-">-</option>
        		<option value="3">Less than 3 months</option>
        		<option value="3-6">3-6 months</option>
        		<option value="6-12">6-12 months</option>
    			</select></td>
          </tr>

          <tr>
            <th>Start-up Location:</th>
            <td><select name="place">
            	<option value="-">-</option>
        		<option value="surat">Surat</option>
        		<option value="gandhinagar">Gandhinagar</option>
        		<option value="ahmedabad">Ahmedabad</option>
				<option value="rajkot">Rajkot</option>
        		<option value="baroda">Baroda</option>
		        <option value="others">Others</option>
    			</select></td>
          </tr>
          <tr>
            <td align="center" colspan="2">
               <input type="submit" name="fill" id="fill" class="btn btn-group-sm btn-info pull-right" value="Fill"></td>
                  </tr>
</table>
</form>
    </div>
    <div class="modal-footer">
    	<button data-dismiss="modal" aria-hidden="true" class="btn">Close</button> 
    </div>
</div></div></div>


<div class="footer" style="margin-bottom:5px">
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
