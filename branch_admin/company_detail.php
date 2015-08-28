<?php
			session_start();
			if($_SESSION['login'] == "")
				header("Location:http://localhost/sfm/");		
			$admin = $_SESSION['admin'];
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
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Employee Details</title>
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

<form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post" name="form1" id="form1">
<?php include("menu.php"); ?>
  <table class="table table-striped" width="1000" height="235" border="0" align="center">
      
    <tr>
    <td width="942"><b> <center>Employee Details</center></b> </td>
     </tr>
    <tr> 
    <td><?php include("edit_delete.php");?></td>
    </tr>
    </table>
</form>

<?php include_once("footer.php"); ?>
</body>
</html>