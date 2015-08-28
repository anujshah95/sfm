
<table class="table table-condensed">
<?php 

$branch_name=$_SESSION['admin'];
if(isset($_POST['update']))
{
	$_SESSION['var'] = 1;
	header("location:fee.php");
	}
include("connect.php");
$qry = mysql_query("select * from fees where branch_name = '$branch_name'",$link);
if(mysql_num_rows($qry) != 0)
{
while($row = mysql_fetch_array($qry))
{
$sum = array($row['tution'],$row['enrollment'],$row['welfare'],$row['icard'],$row['admission'],$row['meal'],$row['equipment']);
$_SESSION['sum'] = array_sum($sum);
?>

<tr>
<th colspan="2"><h1>Fees Structure</h1></th>
</tr>


<tr>
<th>Tuition fees</th>
<td><?php echo $row['tution'];?></td>
</tr>

<tr>
<th>Equipment Fees</th>
<td><?php echo $row['equipment'];?></td>
</tr>

<tr>
<th>Enrollment Fees</th>
<td><?php echo $row['enrollment'];?></td>
</tr>

<tr>
<th>Student Welfare</th>
<td><?php echo $row['welfare'];?></td>
</tr>

<tr>
<th>Icard Fees</th>
<td><?php echo $row['icard'];?></td>
</tr>

<tr>
<th>Admission Fees</th>
<td><?php echo $row['admission'];?></td>
</tr>

<tr>
<th>Meal Fees</th>
<td><?php echo $row['meal'];?></td>
</tr>

 <tr>
<th class="pull-right">Total</th>
<td><?php echo $_SESSION['sum'];?></td>
</tr>
<?php }}?>
<tr>
<th colspan="3"><input class="btn btn-primary pull-right" type="submit" value = "Update Fees Structure" id="update" name="update" /></th>
</tr>


</table>