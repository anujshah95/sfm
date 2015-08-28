<?php
			session_start();
			if($_SESSION['login'] == "")
				header("Location:http://localhost/sfm/");
			$_SESSION['dropdown']="";	
?>

<?php 
if(isset($_GET['logout']))
		{
			session_start();
			$_SESSION['login'] = "";
			session_destroy();
			header("Location:http://localhost/sfm/index.php");
		}
		
?>

<?php 
	include("connect.php");
	$qry = mysql_query("select * from admin_inquiry where status='0'");
	$count = mysql_num_rows($qry);
	if($count == 0)
	{
		header("location:admin_home.php");
		}
	if(@$_GET['stat'])
	{	$email = $_GET['stat'];
		mysql_query("update admin_inquiry set status = '1' where email='$email'",$link);
		echo "<script>alert('Request for Company is Approved')</script>";
		//header("location:inquiry.php");
		}
	
	if(@$_GET['del'])
	{	echo $_GET['del'];
		$email = $_GET['del'];
		mysql_query("delete from admin_inquiry where email='$email'",$link);
		echo "<script>alert('Request for Company is Rejected')</script>";
		//header("location:inquiry.php");
		}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.js"></script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>School Franchise Management</title>

</head>

<body>
<form>
<?php include("menu.php"); ?>
<br /><br /><br />
<div class="col-md-2"></div>
<div class="col-md-8" style="height:500px">
<form><table  class="table table-striped" ">
		<tr><th colspan="60" style="text-align:center">Notifications</th></tr>
        <tr>
			<th width="118">Name:</th>
			<th>Email Address:</th>
            <th>Phone:</th>
            <th>Start-up Timeframe:</th>
            <th>Start-up Location:</th>
            <th>Approved/Disapproved:</th>
         </tr>
         <?php
		 if(!empty($qry))
		 {	$i = 1;
			 while($row = mysql_fetch_array($qry))
			 {	
				?> 
				<tr>
					<td><?php echo $row['name'];?></td>
					<td><?php echo $row['email'];?></td>
		            <td><?php echo $row['phone'];?></td>
        		    <td><?php echo $row['timeframe'];?></td>
            		<td><?php echo $row['location'];?></td>
                    <td><a href="inquiry.php?stat=<?php echo $row['email'];?>">Approved</a></td>
                    <td><a href="inquiry.php?del=<?php echo $row['email'];?>">Disapproved</a></td>
                    
         		</tr>
        <?php	
		$i++;
				 }
		 }
		 
		  ?>
         
         </table>
</form>
</div>
</body>
<?php include("footer.php");?>
</html>
