<?php
			session_start();
			$user = $_SESSION['admin'];
			if($_SESSION['login'] == "")
				header("Location:login.php");
?>
<?php 
if(isset($_POST['logout']))
		{
			session_start();
			$_SESSION['login'] = "";
			session_destroy();
			header("Location:index.php");
		}
?>

<?php 
if(isset($_POST['submit']))
{
	$pwd = $_POST['current1'];
	$new = $_POST['new1'];
	$confirm = $_POST['confirm'];
	$link = mysql_connect("localhost","root");
	mysql_select_db("sfm",$link);
	$qry = mysql_query("SELECT * FROM admin where username='$user'",$link);
	 while($row = mysql_fetch_array($qry))
	{
		if($row['username'] == $user)
		{
		$password = $row['password'];
		}
	}
	
	if($pwd == $password)
	{
	if($new == $confirm)
		{
		mysql_query("UPDATE admin SET password = '$new' WHERE username='$user'",$link);
		
			session_start();
			$_SESSION['login'] = "";
			session_destroy();
			header("Location:login.php");
			}
		else
			$msg = "New password must be Match with Confirm Password";
		}
	else 
		$msg = "Current Password is invalid";
		
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
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



</table>
<form id="form1" name="form1" method="post" action="">
  
<table width="1000" height="235" border="0" align="center">
  <tr>
    <td colspan="2"><?php include("body.php"); ?></td>
  </tr>
   <tr>
    <td colspan="2">
    <table width="832" border="0" cellpadding="0" cellspacing="0">
    <tr>
    <td width="48"><a href = "branch.php"><img src="" width="41" height="41" /></a> </td> 
    <td width="575"></td>
	<td width="209" align="right"> <p>(<?php echo $_SESSION['admin']; ?>)
    <input name="logout" type="submit" id="logout" value="Logout" /></p></td>     
  </tr>
  </table>
  </tr> 
  <tr>
    <td colspan="3" class="headin">Change Password</td>
  </tr>
  <tr>
    <td>Enter Current Password</td>
    <td>    <label>
        <input type="text" name="current1" id="current1" />
      </label>
    </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Enter New Password</td>
    <td><input type="text" name="new1" id="new1" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Re-Enter New Password<br /></td>
    <td><input type="text" name="confirm" id="confirm" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td></td>
    <td><b><font color="#FF0000"><center>
	<?php echo @ $msg;?></center></font></b></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>
      <label>
        <input type="submit" name="submit" id="submit" value="Submit" />
      </label>
      </tr>
</table>
</form>



<?php include_once("footer.php"); ?>


</body>
</html>