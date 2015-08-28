<?php
include('../connect.php');
session_start();
 $admin = $_SESSION['admin'];
if(isset($_GET['logout']))
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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Time Table</title>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.js"></script>
</head>

<body>
<form>
<?php include("menu.php"); ?>
<div class="col-md-3">
    </div>
    <div class="well col-md-6">
	<table class="table table-striped" width="200" border="1">
  <tr>
    <td colspan="3"><center><h2> Time Table </h2></center></td>
     </tr>
     <input type="hidden" id="id" name="id" value="<?php if(isset($_REQUEST["id"])) echo $_REQUEST["id"]; ?>"  />
<?php

		if(@$_GET["id"] == 2)
		{
		$section = "morning";

?>
	
  <tr>
    <td colspan="2"><h3>Morning Session</h3></td>
  </tr> <?php } else if($_GET['id'] == 1) { $section="afternoon";?>
  
  <tr>
    <td colspan="2"><h3>Afternoon Session</h3></td>
  </tr>
  <?php }
  
  ?>
    <tr>
    <th> Time </th>
    <th> Activities </th>
    <td>&nbsp;</td>
  </tr>

<?php
			include("connect.php");
			$tim = strtolower($admin)."_timetable";
			$qry = mysql_query("select * from $tim where section='$section'",$link);
			$i=1;
			while($row = mysql_fetch_array($qry))
			{
				?>
     				<tr>
    					<td> <?php echo $row['time'];?> </td>
    					<?php if(@$_GET['act']== "updatetbl") {?>
                        <td> <input type="text" name="activity<?php echo $i; ?>" id="activity<?php echo $i; ?>" value ="<?php echo $row['activity'];?>" size="25" > </td>
                        <?php ;} else  {?>
                        <td> <?php echo $row['activity'];?> </td><?php ;}?>
    					<td>&nbsp;</td>
 				    </tr>		 
	 
	 <?php
		$i++;		}
?>
		<tr>
        <?php if(@$_GET['act']== "updatetbl") 
		{?>
        <td colspan="3"> <input type="submit"  class="btn btn-success btn-block btn-lg" id="done" name="done" value="Done" /></td>
        <?php 
		;} 
		else 
		{?>
        <td colspan="3"> <input type="submit" class="btn btn-primary btn-block btn-lg" id="update" name="update" value="Update" /></td>
        <?php 
		;} 
		?>
        </tr>
</table>
</div>
<?php 	
include("footer.php");
echo $section;
if(isset($_GET['update']))
{	
	if($section == "morning")
header("location:time_tble.php?id=2&act=updatetbl");
	else
header("location:time_tble.php?id=1&act=updatetbl");
	}

if(isset($_GET['done']))
{
		$act1 = $_GET['activity1'];
		$act2 = $_GET['activity2'];
	 	$act3 = $_GET['activity3'];
		$act4 = $_GET['activity4'];
		$act5 = $_GET['activity5'];
		$act6 = $_GET['activity6'];
		$act7 = $_GET['activity7'];
		$act8 = $_GET['activity8'];
		if($section == "morning")
		$act9 = $_GET['activity9'];
		
						
		mysql_query("update $tim set activity = '$act1' where time = '1st - 8:45 - 9:00'");
		mysql_query("update $tim set activity = '$act2' where time = '2nd - 9:00'");
		mysql_query("update $tim set activity = '$act3' where time = '3rd - 9:15 - 10:00'");
		mysql_query("update $tim set activity = '$act4' where time = '4th - 10:00 - 10:30'");
		mysql_query("update $tim set activity = '$act5' where time = '5th - 10:30 - 10:45'");
		mysql_query("update $tim set activity = '$act6' where time = '6th - 10:45 - 11:30'");
		mysql_query("update $tim set activity = '$act7' where time = '7th - 11:30 - 11:35'");
		mysql_query("update $tim set activity = '$act8' where time = '8th - 11:35 - 11:45'");
		mysql_query("update $tim set activity = '$act9' where time = '9th - 11:45 - 12:30'");
		
		
		mysql_query("update $tim set activity = '$act1' where time = '1:00 - 1:15'");
		mysql_query("update $tim set activity = '$act2' where time = '1:15 - 1:30'");
		mysql_query("update $tim set activity = '$act3' where time = '1:30 - 2:30'");
		mysql_query("update $tim set activity = '$act4' where time = '2:30 - 3:00'");
		mysql_query("update $tim set activity = '$act5' where time = '3:00 - 3:15'");
		mysql_query("update $tim set activity = '$act6' where time = '3:15 - 3:20'");
		mysql_query("update $tim set activity = '$act7' where time = '3:20 - 3: 35'");
		mysql_query("update $tim set activity = '$act8' where time = '3:35 - 4:00'");
		
		
		if($section == "morning")
			header("location:time_tble.php?id=2");
		else
		 	header("location:time_tble.php?id=1");
		
		}
?>
</form>
</body>
</html>