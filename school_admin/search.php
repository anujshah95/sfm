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
	$ccode = $_SESSION['center_code'];
	$city = $_GET['id'];
	$qry = mysql_query("select * from branch where baddress = '$city'",$link);
	
	if(!empty($qry))
	{
		
        if(mysql_num_rows($qry) != 0){?>
        <table class="table table-striped">
		<tr>
        <td colspan="4"><center>
        	<h2> Branches of <?php echo $_GET['id'];?> </h2></center>
        </td>
        </tr>
        <tr>
            <th>Branch Code</th>
            <th>Headname</th>
            <th>Branch Name</th>
            <th>View</th>
            <th></th>
        </tr>	
		<?php }
		while($row = mysql_fetch_array($qry))
		{
			?>
			
	    <tr>
            <td><?php echo $row['bcode'];?> </td>
            <td><?php echo $row['bheadname'];?></td>
            <td><?php echo $row['bname'];?></td>
            <td><a class="btn btn-info" target="_blank" href="search_branch.php?id=<?php echo $row['bcode']; ?>">View</a></td>
            <td></td>
        </tr>
		
<?php }?>
</table>
<?php }?>

 <input type="hidden" id="id" name="id" value="<?php if(isset($_REQUEST["id"])) echo $_REQUEST["id"]; ?>"  />

<?php 
	$i=0;
	include("connect.php");
	$admin= $_SESSION['admin'];
	$code = $_SESSION['center_code'];
	$brnch_code = mysql_query("select bcode from branch where code='$code'");
	$tot = mysql_num_rows($brnch_code);
	
	while($b_code = mysql_fetch_array($brnch_code))
	{
		$bcode = $b_code['bcode'];
		
	$emp = strtolower($bcode)."employee_details";
	$serch_name = $_GET['id'];
	$qry = mysql_query("select * from $emp where bcode='$bcode' and emp_name like '%$serch_name%'");
	if(empty($qry)){} else{
	$count_emp = mysql_num_rows($qry);	
	if(mysql_num_rows($qry) != 0)
	{	if($i==0){?>
	 <table class="table table-striped">
		<tr>
        <td colspan="4"><center>
        	<h2> Employee's Detail </h2></center>
        </td>
        </tr>
        <tr>
            <th>Employee ID</th>
            <th>Employee Name</th>
            <th>Branch Code</th>
            <th></th>
            <th></th>
        </tr>	
  <?php $i=1;}
		while($row = mysql_fetch_array($qry))
		{ ?>
			<tr>
            	<td><?php echo $row['emp_id']?></td>
                <td><?php echo $row['emp_name']?></td>
                <td><?php echo $bcode;?></td>
                <td><a class="btn btn-info" target="_blank" href="view_search.php?id=<?php echo $row['emp_id']; ?>&tab=<?php echo $bcode?>">View</a></td>
                
            </tr>
<?php			}
		}
	}}
?>      
</table>
<br /><br />
</div>
</form>

<?php include_once("footer.php"); ?>
</body>
</html>