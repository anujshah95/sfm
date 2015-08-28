<table class="table table-striped">
<?php
$branch_name=$_SESSION['admin'];
$tut = $equip = $enrol = $welfare = $icard = $admin = $meal = "";
include("../connect.php"); 
if(isset($_POST['update']))
{	 $tut = $_POST['tut'];
	 $equip = $_POST['equip'];
	 $enrol = $_POST['enrol'];
	 $welfare = $_POST['welfare'];
	 $icard = $_POST['icard'];
	 $admin = $_POST['admi'];
	 $meal = $_POST['meal'];	
	 mysql_query("update fees set tution='$tut', equipment='$equip', enrollment='$enrol', welfare='$welfare',icard='$icard', admission='$admin',meal = '$meal' where branch_name = '$branch_name'",$link);
	$_SESSION['var'] = 0;
 header("location:fee.php");
	}

$qry = mysql_query("select * from fees where branch_name = '$branch_name'",$link);
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
	$meal=$row['meal'];}}
$sum = array($tut,$equip,$enrol,$welfare,$icard,$admin,$meal);
$_SESSION['sum'] = array_sum($sum);

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
		<th class="pull-right">Total</th>
		<td><?php echo $_SESSION['sum'];?></td>
	</tr>
<tr>
<th colspan="2"><input class="btn btn-success pull-right" type="submit" value = "Save Update" id="update" name="update" /></th>
</tr>
</table>