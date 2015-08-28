<?php
session_start();
?>
<?php
$msg="";
if(isset($_POST['submit']))
{	
	$_SESSION['login'] = " ";
	$name=$_POST['name'];
	$pass=$_POST['pass'];
	{
	include_once("connect.php");
	$query = mysql_query("select * from school_admin",$link);
	while($row= mysql_fetch_array($query))
	{
	if($name==$row['username'] and $pass==$row['password'])
	  {$_SESSION['login']="login";
	   $_SESSION['admin']= $name; 
		header("Location:branch.php");
		  }
	}
//	else if($name != "admin")
		$msg = "Invalid Username Or Password";
//	else if($pass != "1234")
//		$msg = "Incorrect Password";
	
	}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>login</title>
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<style type="text/javascript">
window.onload function(){
<?php

?>
</style>
<style type="text/css">
<!--
.style1 {font-size: 83%}
-->
</style>
</head>

<body>
<table width="1000" height="235" border="0" align="center">
  <tr>
    <td colspan="2"><?php include("body.php"); ?></td>
  </tr>
  <tr>
    <td width="504"><h1 align="center">Welcome Admin</h1></td>
    <td width="480"><form action="" method="post"><table width="266" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr align="center">
    <td colspan="2"><h1>Login:</h1></td>
    </tr>
  <tr>
    <td width="125">Name</td>
    <td width="141" align="center"><label>
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
  <tr>
    <td colspan="2"><div align="center">
      <label>
      <input type="submit" name="submit" id="submit" value="submit" />
      </label>
    </div></td>
    </tr>
</table>
        <p>&nbsp;</p>
    </form></td>
  </tr>
  <tr>
    <td colspan="2"><div align="right">
      <?php include("footer.php"); ?>
    </div></td>
  </tr>
</table>

</body>
</html>
