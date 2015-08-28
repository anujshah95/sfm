<?php
			session_start();
			$user = $_SESSION['admin'];
			if($_SESSION['login'] == "")
				header("Location:http://localhost/sfm/");
?>
<?php 
if(isset($_POST['logout']))
		{
			session_start();
			$_SESSION['login'] = "";
			session_destroy();
			header("Location:http://localhost/sfm/");
		}
?>
<?php 
$emsg;$epass = "";
if(isset($_POST['submit']))
{	
	
	$pwd = $_POST['current1'];
	$new = $_POST['new1'];
	$confirm = $_POST['confirm'];
	$link = mysql_connect("localhost","root");
	mysql_select_db("sfm",$link);
	$qry = mysql_query("SELECT * FROM branch_admin where username='$user'",$link);
	 while($row = mysql_fetch_array($qry))
	{
		if($row['username'] == $user)
		{
		$password = $row['password'];
		}
	}
	
	if($pwd == $password)
	{
	if(empty($_POST['new1']))
	  {
		  $epass = "Password is required";
	  		$emsg="error";
	  }
	  else 
	  {
		  if(preg_match('/^(?=.*[0-9])(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,15}$/',$_POST['new1']))
 	  			$pass = $_POST['new1'];
		  else
		    { 
		  $epass = "Password must contain atlest one number, one special character(%,$,#,etc),1 capital letter; length of password must be between 8 to 15";
			  $emsg = "error";
				} 		
	  }
	if($new == $confirm and empty($emsg))
		{
		mysql_query("UPDATE branch_admin SET password = '$new' WHERE username='$user'",$link);
		
			session_start();
			$_SESSION['login'] = "";
			session_destroy();
			header("Location:http://localhost/sfm/");
			}
		else if(empty($emsg))
			$msg = "New password must be Match with Confirm Password";
		}
	else 
		$msg = "Current Password is invalid";
		
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
.error {color:#F00;}
<!--
.headin {
	text-align: center;
	font-size: larger;
	font-family: Calibri, "Comic Sans MS", Arial;
}
#form1 table tr .headin blockquote blockquote p {
	text-align: right;
	font-weight: bold;
}
-->
</style>
</head>

<body>



<form id="form1" name="form1" method="post" action="">
  <?php include("menu.php");?>
<br />
<div class="col-md-1"></div>
<div class="well col-md-9"><table class="table" border="0" align="center">
   <tr>
    <td colspan="3" class="headin"><h2>Change Password</h2></td>
  </tr>
  <tr>
    <td width="300px"><h4>Enter Current Password</h4></td>
    <td><input  type="text" name="current1" id="current1" />
    </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><h4>Enter New Password</h4></td>
    <td><input type="text" name="new1" id="new1" /></td>
    <td><span class="error"><?php echo $epass; ?></span></td>
  </tr>
  <tr>
    <td><h4>Re-Enter New Password</h4><br /></td>
    <td><input type="text" name="confirm" id="confirm" /></td>
    <td></td>
  </tr>
  <tr>
    
    <td colspan="3"><b><font color="#FF0000"><center>
	<?php echo @ $msg;?></center></font></b></td>
    
  </tr>
  <tr>

    <td colspan="3">

        <input type="submit" class="btn  btn-lg btn-success pull-right" name="submit" id="submit" value="Submit" />
      </td></tr>
</table></div>
<center><?php include("footer.php"); ?></center>
</form>
</body>
</html>