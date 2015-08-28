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
<input type="hidden" id="id" name="id" value="<?php if(isset($_REQUEST["id"])) echo $_REQUEST["id"]; ?>"  />
<?php include("menu.php"); 
	$id = $_GET['id'];
	include("connect.php");
	$admin= $_SESSION['admin'];
	$tab = $_GET['tab'];	
	$emp = strtolower($tab)."employee_details";

	$sql_01=mysql_query("select * from $emp where emp_name like '%$id%' or emp_id like '%$id%'",$link);
		while($data_01=mysql_fetch_assoc($sql_01))
		{
		?>
	<div class="wel col-md-3"></div>
  <div class="well col-md-6">
  <table class="table table-striped" width="1000" height="235" border="0" align="center">
      
 <tr>
    <td colspan="3"><h2> <center>Employee Details</center></h2> </td>
 </tr>
    

<tr>
<th> Employee ID </th>
<td><?php echo $data_01['emp_id']; $id = $data_01['emp_id'];?></td>
</tr>

<tr>
<th> Name </th>
<td><?php echo $data_01['emp_name']; ?></td>
</tr>

<tr>
<th> Address </th>
<td><?php echo $data_01['address']; ?></td>
</tr>

<tr>
<th> Gender </th>
<td><?php echo $data_01['gender']; ?></td>
</tr>

<tr>
<th> Age</th>
<td><?php echo $data_01['age']; ?></td>
</tr>

<tr>
<th> Date of Joining</th>
<td><?php echo $data_01['doj']; ?></td>
</tr>

<tr>
<th> Phone No.</th>
<td><?php echo $data_01['contact_no']; ?></td>
</tr>

<tr>
<th> Email</th>
<td><?php echo $data_01['email']; ?></td>
</tr>

<tr>
<th> Status </th>
<td><?php echo $data_01['status']; ?></td>
</tr>

<tr>
<th> Salary </th>
<td><?php echo $data_01['salary']; ?></td>
</tr>

<tr>
<th> Qualification </th>
<td><?php echo $data_01['qual']; ?></td>
</tr>

 

<?php }?>     
    </table></div>

</form>

<?php include_once("footer.php"); ?>
</body>
</html>


