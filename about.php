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
<title>About Us </title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
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

<body>
<div class="shadow1">
<div class="navbar navbar-default navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
        	<a href="index.php" class="navbar-brand"><img src="images/sfm.png" width="100px" height="100px"></a>
        </div>
        <div class="navbar-collapse">
        	<ul class="nav nav-tabs">
            	<li><a href="index.php">Home</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="#loginModal" data-toggle="modal">Login</a></li>
                <li><a href="#inquiry" data-toggle="modal">Inquiry</a></li>
            </ul>
        </div>
	</div> 
</div>
<br><br><br>
<div class="col-md-2">
</div>
<div class="col-md-8" >
<table>
	<tr >
    	<th width="200px"><h1>About Us:</h1></th><th></th>
    </tr>
	<tr >
    	<td></td>
        <td><p>This software is created to maintain the franhisee of company. This Software is created to Simplify the maintance of Company. This software is for Pre-school franchisee management.<br><br> In this software, User can maintain the data of new created company as well as the branches of created company. <br><br>In order to stop access of user who not paid renewable amount. There is a facility of disable of company or branches. So that the user cant access untill he paid the amount for software and as soon as it paid the amount the authorization is roll back to him with his previous information.   </p></td>	

    </tr>
</table>
</div>



<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<div class="modal fade" role="dialog" tabindex="-1" id="loginModal" aria-hidden="true">
	<div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
    	<h3> Login </h3>	
    </div>
    <div class="modal-body">
    <form><table width="266" border="0" align="center" cellpadding="0" cellspacing="0">
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
<div class="container">
        <table  width="75%" align="center">
            <tr >
            	<th>
                	<h2>Contact Us:</h2>
                </th><th></th>
            </tr>
            <tr>
            	<th>Name:</th><td> School Franchisee Management.</td>
            </tr>
            <tr>
            	<th>Address:</th><td>203, ABC Plaza, Nr. XYZ wadi, PQR road, Surat.-395119 </td>
            </tr>
            <tr>
            	<th>Contact No.:</th><td>9898989898, 999999999.</td>
            </tr>
            <tr>
            	<th>Email:</th><td>franchisee@gmail.com</td>
            </tr>
           
		</table>
</div>
<br><br>
</div>

<div style="background:#FFF" class="footer" style="margin-top:90px">
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
</div>
</body>
</html>
