<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Addmission Form</title>

</head>
<body>
<table width="355" border = "1" class="table table-bordered">
<?php if(isset($_GET['view']))
	{}
	else{	

?>
<tr>
    <th> Student GRNo.</th>
    <th> Student Name </th>
    <th colspan="2" class="pull-right"><a href="../pdf/pdf9.php" target="_blank">Generate PDF</a></th>
    </tr>
<?php 
	}
include("connect.php");

$user = $_SESSION['admin'];
$admission = strtolower($user)."new_add_std";
$parent = strtolower($user)."parent_details";
$extra = strtolower($user)."extra_detail";
 $qry= mysql_query("select * from $admission where branch_name='$user'",$link);
$count = mysql_num_rows($qry);
 if(isset($_GET['view']))
	{}
	else{
while($row = mysql_fetch_array($qry))
{
	?>
    <tr>
    <td><?php echo $row['fno'] ?></td>
    <td> <?php echo $row['fname']?> </td>
    <td> <a href="stud_admi.php?view=<?php echo $row['fno']?>">View</a></td>
    <td> <a href="stud_admi.php?del=<?php echo $row['fno']?>">Delete
    </a></td>
    </tr> 

<?php
	}}?>
    </table>
    <?php
	if(isset($_GET['del']))
	{
		$del = $_GET['del'];
		$view_qry = mysql_query("select * from $admission where fno='$del'");
		while($row = mysql_fetch_array($view_qry))
		{
			$name = $row['fname'];
			}
		mysql_query("delete from $admission where fno='$del'");
		mysql_query("delete from $parent where fno='$del'");
		mysql_query("delete from $extra where addmission_form='$del'");
		
		if($_GET['ret'])
			header("location:search.php?id=$name");
		else
			header("location:stud_admi.php");
		}
	if(isset($_GET['view']))
	{
		$view=$_GET['view'];
		$view_qry = mysql_query("select * from $admission where fno='$view'");
		while($row = mysql_fetch_array($view_qry))
		{
		
?>

<form name="student_info" method="post" action="admin_form_process.php">
<table class="table table-responsive" width="auto" border="1" align="center">
<tr>
	<td colspan="2"><h2><u>Student Details</u></h2><div class="pull-right"><a class="btn btn-info" target="_blank" href="../pdf/pdf8.php?view=<?php echo $view;?>">Generate PDF</a></div></td>
</tr>
  <tr>
    <td width="355">Branch Name: <?php echo $row['branch_name'];?>
   </td>
    <td width="285">Form No: <?php echo $row['fno'];?></td>
  </tr>
  <tr>
    <td>Full Name: <?php echo $row['fname'];?></td>
    <td>Date of Addmission: <?php echo $row['doa'];?> </td>
  </tr>
  <tr>
  	<?php
	if($row['gender']=="Male")
    echo "<td>Gender: Male </td>";
	else
	echo "<td>Gender: Female</td>";
	?>
    <td>Date of Birth: <?php echo $row['dob'];?> </td>
  </tr>
  <tr>
    <td height="53" colspan="2">Address: <?php echo $row['address'];?> </td>
    
  </tr>
  <tr>
    <td>State: <?php echo $row['state'];?> </td>
    <td>City: <?php echo $row['city'];?> </td>
  </tr>
  <tr>
    <td>Pincode: <?php echo $row['pincode'];?> </td>
    <td>Mobile:
		<?php echo $row['mob'];?> </td>
  </tr>
  <tr>
 <?php
 	if($row['addmission_type']== "fresher")
  	echo "<td colspan='2'>Addmission Type: Fresher    </td>";
	else
	echo "<td colspan='2'>Addmission Type: Transfer    </td>"; 
		}
	$view_qry = mysql_query("select * from $parent where fno='$view'");
		while($row = mysql_fetch_array($view_qry))
		{

?>
  </tr>
  <tr>
    <td colspan="2"><h3><u>Parent Details</u></h3></td>
  </tr>
  <tr>
    <td>Parent's Name: <?php echo $row['pname'];?> </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Occupation: <?php echo $row['poccup'];?> </td>
    <td>Qualification: <?php echo $row['edu_quali'];?> </td>
  </tr>
  <tr>
    <td>Mobile No: <?php echo $row['pmob'];?> </td>
    <td>Email: <?php echo $row['email'];?> </td>
  </tr>
  <?php 
  
  		}
	$view_qry = mysql_query("select * from $extra where addmission_form='$view'",$link);
		while($row = mysql_fetch_array($view_qry))
		{
  ?>
  <tr>
    <td colspan="2"><h3><u>Extra Information</u></h3></td>
  </tr>
  
  <tr>
    <td>Do you want tranport facility: <?php echo $row['transport_facility'];?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Medical history: <?php echo $row['medical_history'];?> </td>
    <td>Student Hobbies: <?php echo $row['child_hobbies'];?> </td>
  </tr>
   
  <?php 
  $edit_attr = $row['addmission_form'];}?>
   <tr>
   <?php
      echo "<td colspan='2'>" ?> <a class='btn btn-primary' href="edit_form.php?id=<?php echo $edit_attr ?>">Edit</a>
    <?php echo "</td>";

	}
	?>
  </tr>
</table>
</form>
<script type="text/javascript" src="js/jquery.js"></script>
<script src="js/fullcalendar.js"></script>
</body>
</html>