<?php
			session_start();
			if($_SESSION['login'] == "")
				header("Location:http://localhost/sfm/");
			$_SESSION['dropdown']="";	
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

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
</script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<style type="text/css">
.headin {	text-align: center;
	font-size: larger;
	font-family: Calibri, "Comic Sans MS", Arial;
}
.error {color:#F00;}

#form1 table tr .headin strong {
}
</style>
</head>

<body>
</table>
<form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post" name="form1" id="form1">
  <table width="1000" height="235" border="0" align="center">
    <tr>
      <td colspan="2"><?php include("body.php"); ?></td>
    </tr>
    <tr>
      <td colspan="2"><?php include("menu.php"); ?></td>
    </tr>
    <tr>
    <td>
    <a href="company_detail.php">View Company details </a>
    </td>
    </tr>
    <tr>
    <td>
    <a href="company.php">Create Company </a>
    </td>
    </tr>
    <tr>
    <td>
    <a href="edit.php"> Edit Company </a>
    </td>
    </tr>
    
      </table>
</form>

<?php include_once("footer.php"); ?>
</body>
</html>