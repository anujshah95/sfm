<?php 
session_start();
$admin = $_SESSION['admin'];
include("connect.php");

$emp = $admin."employee_details";
mysql_query("CREATE TABLE IF NOT EXISTS $emp(
  `emp_id` varchar(10) NOT NULL COMMENT 'Employee ID',
  `emp_name` varchar(20) NOT NULL COMMENT 'Employee Name',
  `address` varchar(30) NOT NULL COMMENT 'Address of employee',
  `gender` varchar(20) NOT NULL COMMENT 'Employee gender',
  `age` int(3) NOT NULL COMMENT 'Age of employee',
  `status` varchar(25) NOT NULL COMMENT 'Status i.e. Permanent or temporary or inactive',
  `contact_no` varchar(11) NOT NULL COMMENT 'Contact number of employee',
  `email` varchar(25) NOT NULL COMMENT 'Email of employee',
  `doj` date NOT NULL COMMENT 'Date of Joining of employee',
  `salary` int(12) NOT NULL COMMENT 'Current salary of employee',
  `qual` varchar(50) NOT NULL COMMENT 'Qualification of employee',
  `bcode` varchar(20) NOT NULL COMMENT 'Branch code',
  PRIMARY KEY (`emp_id`)
)",$link);

$admission = $admin."new_add_std";
mysql_query("CREATE TABLE IF NOT EXISTS $admission(
  `fname` varchar(20) NOT NULL,
  `doa` date NOT NULL,
  `fno` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(20) NOT NULL,
  `state` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `pincode` int(10) NOT NULL,
  `mob` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `addmission_type` varchar(10) NOT NULL,
  `branch_name` varchar(100) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
)",$link);

$parent = $admin."parent_details";
mysql_query("CREATE TABLE IF NOT EXISTS $parent(
  `fno` varchar(20) NOT NULL,
  `pname` varchar(20) NOT NULL,
  `poccup` varchar(10) NOT NULL,
  `pmob` varchar(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  `pincome` varchar(20) NOT NULL,
  `edu_quali` varchar(100) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
)",$link);

$extra = $admin."extra_detail";
mysql_query("CREATE TABLE IF NOT EXISTS $extra(
  `addmission_form` varchar(10) NOT NULL COMMENT 'Addimission Form No.',
  `transport_facility` varchar(25) NOT NULL COMMENT 'Transport Facility',
  `physical_disability` varchar(25) NOT NULL COMMENT 'Any physical disability',
  `session_want` varchar(25) NOT NULL COMMENT 'Which session you want',
  `medical_history` varchar(25) NOT NULL COMMENT 'Any medical hisory',
  `child_hobbies` varchar(100) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
)",$link);

?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>HomePage</title>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.js"></script><link href="../themes/1/js-image-slider.css" rel="stylesheet" type="text/css" />
<script src="../themes/1/js-image-slider.js" type="text/javascript"></script>
</head>

<link href="../generic.css" rel="stylesheet" type="text/css" />
</head>

<body>
<form>
<?php 

if(@$_GET['id'] == "fee")
{
	?> 

 <div class="col-md-3"></div>
 <div class="col-md-6">
  <table class="table table-striped" width="1000" height="235" border="0" align="center">
<br /><br /><br /><br />
<?php

$qry = mysql_query("select * from fees where branch_name = 'default'",$link);
if(mysql_num_rows($qry) != 0)
{
while($row = mysql_fetch_array($qry))
{
	$tut = $row['tution'];
	$equip=$row['equipment'];
	$enrol=$row['enrollment'];
	$welfare=$row['welfare'];
	$icard=$row['icard'];
	$admin = $row['admission'];
	$meal=$row['meal'];
}
}
?>
<tr>
<th colspan="2"><h1>Fees Structure</h1></th>
</tr>


<tr>
<th>Tuition fees</th>
<td><input type="textbox" value="<?php echo $tut;?>" id="tut" name = "tut" ></td>
</tr>

<tr>
<th>Equipment Fees</th>
<td><input type="textbox" value="<?php echo $equip;?>" id="equip" name = "equip" ></td>
</tr>

<tr>
<th>Enrollment Fees</th>
<td><input type="textbox" value="<?php echo $enrol;?>" id="enrol" name = "enrol" ></td>
</tr>

<tr>
<th>Student Welfare</th>
<td><input type="textbox" value="<?php echo $welfare;?>" id="welfare" name = "welfare" ></td>
</tr>

<tr>
<th>Icard Fees</th>
<td><input type="textbox" value="<?php echo $icard;?>" id="icard" name = "icard" ></td>
</tr>

<tr>
<th>Admission Fees</th>
<td><input type="textbox" value="<?php echo $admin;?>" id="admi" name = "admi" ></td>
</tr>

<tr>
<th>Meal Fees</th>
<td><input type="textbox" value="<?php echo $meal;?>" id="meal" name = "meal" ></td>
</tr>

<tr>
<th colspan="2"><input class="btn btn-success btn-block pull-right" type="submit" value = "Done" id="done" name="done" /></th>
</tr>

</table>
</div>
<?php	
	}
else{
?>

<div class="col-md-3">
    </div>
    <div class="well col-md-6">
	<table class="table table-striped" width="200" border="0">
  <tr>
    <td colspan="3"><center><h2> Time Table </h2></center></td>
     </tr>
<?php

if($_GET["id"] == 1)
	{
		$section = "afternoon";

?>
	
  <tr>
    <td colspan="2"><h3>Afternoon Session</h3></td>
  </tr> <?php ;} else { $section="morning";?>
  
  <tr>
    <td colspan="2"><h3>Morning Session</h3></td>
  </tr>
  <?php ;}?>
    <tr>
    <th> Time </th>
    <th> Activities </th>
    <td>&nbsp;</td>
  </tr>

<?php
			include("connect.php");
			$qry = mysql_query("select * from timetable where section='$section'",$link);
			$count = mysql_num_rows($qry);
		
			$i=1;
			while($row = mysql_fetch_array($qry))
			{	
				?>
     				<tr>
    					<td> <?php echo $row['time'];?> </td>
    					<td> <input type="text" name="activity<?php echo $i; ?>" id="activity<?php echo $i; ?>" value ="<?php echo $row['activity'];?>" size="25" > </td>
    	
       				<td>&nbsp;</td>
 				    </tr>		 
	 
	 <?php

				$i++;}
?>
 <tr>					<?php if($_GET["id"]==0){?>
    					<td colspan="3"> <input class="btn btn-success btn-sm pull-right" type="submit" name="next" id="next" value ="Next" ><b class="icon-next"></b> </td>
    					<td>&nbsp;</td><?php }?>
                        <?php if($_GET["id"]==1){?>
    					<td colspan="3"> <input  class="btn btn-success btn-sm pull-right" type="submit" name="fee" id="fee" value ="Set Fee Structure" > </td>
    					<td>&nbsp;</td><?php }?>
 				    </tr>
</table>
    </div>

<?php }?>
</form>
</body>
</html>

<?php
	if(isset($_GET['next']))
	{	
		$tim = strtolower($admin)."_timetable";
		mysql_query("CREATE TABLE IF NOT EXISTS $tim (
				  `section` varchar(20) NOT NULL,
  					`time` varchar(20) NOT NULL,
				  `activity` varchar(40) NOT NULL,
  					UNIQUE KEY `time` (`time`)
						)");
	 	$act1 = $_GET['activity1'];
		$act2 = $_GET['activity2'];
	 	$act3 = $_GET['activity3'];
		$act4 = $_GET['activity4'];
		$act5 = $_GET['activity5'];
		$act6 = $_GET['activity6'];
		$act7 = $_GET['activity7'];
		$act8 = $_GET['activity8'];
		$act9 = $_GET['activity9'];
		
						
		mysql_query("INSERT INTO $tim (`section`, `time`, `activity`) VALUES
				('morning', '1st - 8:45 - 9:00', '$act1'),
				('morning', '2nd - 9:00', '$act2'),
				('morning', '3rd - 9:15 - 10:00', '$act3'),
				('morning', '4th - 10:00 - 10:30', '$act4'),
				('morning', '5th - 10:30 - 10:45', '$act5'),
				('morning', '6th - 10:45 - 11:30', '$act6'),
				('morning', '7th - 11:30 - 11:35', '$act7'),
				('morning', '8th - 11:35 - 11:45', '$act8'),
				('morning', '9th - 11:45 - 12:30', '$act9')
			");
		header("location:createdb.php?id=1");
		}
	if(isset($_GET['fee']))
	{
		$tim = strtolower($admin)."_timetable";
		$act1 = $_GET['activity1'];
		$act2 = $_GET['activity2'];
		$act3 = $_GET['activity3'];
		$act4 = $_GET['activity4'];
		$act5 = $_GET['activity5'];
		$act6 = $_GET['activity6'];
		$act7 = $_GET['activity7'];
		$act8 = $_GET['activity8'];
		
		mysql_query("INSERT INTO $tim (`section`, `time`, `activity`) VALUES
					('afternoon', '1:00 - 1:15', '$act1'),
					('afternoon', '1:15 - 1:30', '$act2'),
					('afternoon', '1:30 - 2:30', '$act3'),
					('afternoon', '2:30 - 3:00', '$act4'),
					('afternoon', '3:00 - 3:15', '$act5'),
					('afternoon', '3:15 - 3:20', '$act6'),
					('afternoon', '3:20 - 3: 35', '$act7'),
					('afternoon', '3:35 - 4:00', '$act8')
						",$link);
		
		header("location:createdb.php?id=fee");
		}
if(@$_GET['done'])
{
	
include("../connect.php"); 

	 $tut = $_GET['tut'];
	 $equip = $_GET['equip'];
	 $enrol = $_GET['enrol'];
	 $welfare = $_GET['welfare'];
	 $icard = $_GET['icard'];
	 $admin = $_GET['admi'];
	 $meal = $_GET['meal'];	
	 $branch = $_SESSION['admin']; 
	 mysql_query("insert into fees values('$tut', '$equip', '$enrol', '$welfare','$icard', '$admin', '$meal','$branch')",$link);
		
		header("location:index.php");
	}

?>
