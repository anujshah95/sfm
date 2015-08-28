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
.error {color:#F00;}

</style>
</head>

<body>

<form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post" name="form1" id="form1">
<?php include("menu.php"); ?>
  <div class="wel col-md-3"></div>
  <div class="well col-md-6">
 <input type="hidden" id="id" name="id" value="<?php if(isset($_REQUEST["id"])) echo $_REQUEST["id"]; ?>"  />
<?php 
	include("connect.php");
	$admin= $_SESSION['admin'];
	$emp = strtolower($admin)."employee_details";
	$serch_name = $_GET['id'];
	$qry = mysql_query("select * from $emp where bcode='$admin' and emp_name like '%$serch_name%'");
	$count_emp = mysql_num_rows($qry);	
	if(mysql_num_rows($qry) != 0)
	{	?>
		<table class="table table-striped">
		<tr>
        <td colspan="4"><center>
        	<h2> Employee's Detail </h2></center>
        </td>
        </tr>
        <tr>
            <th>Employee ID</th>
            <th>Employee Name</th>
            <th></th>
            <th></th>
        </tr>
  <?php
		while($row = mysql_fetch_array($qry))
		{ ?>
			<tr>
            	<td><?php echo $row['emp_id']?></td>
                <td><?php echo $row['emp_name']?></td>
                <td><a class="btn btn-info" href="view_search.php?id=<?php echo $row['emp_id']; ?>">View</a></td>
                <td><a class="btn btn-danger" href="test.php?id=<?php echo $row['emp_id']; ?>&search=s">Delete</a></td>
            </tr>
<?php			}
		}

?>      
</table>
<br /><br />
<?php

 $user = $_SESSION['admin'];
$admission = strtolower($user)."new_add_std";
$parent = strtolower($user)."parent_details";
$extra = strtolower($user)."extra_detail";
 $qry= mysql_query("select * from $admission where branch_name='$user' and fname like '%$serch_name%'",$link);
$count = mysql_num_rows($qry);
if($count != 0)
{
	?>
    <table class="table table-striped">
		<tr>
        <td colspan="4"><center>
        	<h2> Student's Detail </h2></center>
        </td>
        </tr><tr>
            <th>Student Id</th>
            <th>Student Name</th>
            <th></th>
            <th></th>
        </tr>
     <?php   
while($row = mysql_fetch_array($qry))
{
	
	?>
    <tr>
    <td><?php echo $row['fno'] ?></td>
    <td> <?php echo $row['fname']?> </td>
    <td> <a class="btn btn-info" href="stud_admi.php?view=<?php echo $row['fno']?>">View</a></td>
    <td> <a class="btn btn-danger" href="stud_admi.php?del=<?php echo $row['fno']?>&ret=ret">Delete
    </a></td>
    </tr> 
<?php
	}
	if(isset($_GET['del']))
	{
		$del = $_GET['del'];
		mysql_query("delete from $admission where fno='$del'");
		mysql_query("delete from $parent where fno='$del'");
		mysql_query("delete from $extra where fno='$del'");
		header("location:stud_admi.php");
		}


?>


</table>
<?php }
if($count_emp == 0 and $count == 0)
{
?>
<table class="table table-responsive">
<tr><center>
	<th colspan="4"><h4> No Records Found </h4></th>
</center></tr>
</table>
<?php }?>




</div>
</form>

<?php include_once("footer.php"); ?>
</body>
</html>