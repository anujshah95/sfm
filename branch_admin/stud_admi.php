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
<title>Student Admission</title>
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

<form action="" method="post" name="form1" id="form1">
<?php include("menu.php"); ?>
  <table class="table table-striped" width="1000" height="235" border="0" align="center">
    <tr><center><h2>Student Details</h2></center>
    <td width="942"><b><?php if(@$_GET['id']=='1') include("admin_form.php"); else include("view_form.php");?> </b> </td>
     </tr>
     
    <td></td>
    </tr>
    </table>
</form>

<?php include_once("footer.php"); ?>
</body>
</html> 