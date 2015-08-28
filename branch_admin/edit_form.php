<?php
			session_start();
			if($_SESSION['login'] == "")
				header("Location:login.php");
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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.js"></script>

<title>Update Student Record</title>

</head>
<body>
<?php include("menu.php"); ?>
<table class="table table-bordered" border = "1">
<?php 

include("../connect.php");
$user = $_SESSION['admin'];
$admission = strtolower($user)."new_add_std";
$parent = strtolower($user)."parent_details";
$extra = strtolower($user)."extra_detail";

if(isset($_POST['edit']))
{
 $bname=$_POST['bname'];
 $grno=$_POST['grno'];
 $name=$_POST['name'];
 $doa=$_POST['doa'];
 $gender=$_POST['gender'];
 $dob=$_POST['dob'];
 $address=$_POST['address'];
$state=$_POST['state'];
$city=$_POST['city'];
$pincode=$_POST['pincode'];
$add_type=$_POST['add_type'];
$occup=$_POST['occupation'];
$qual=$_POST['quali'];
$pmob=$_POST['pmob'];
$pemail=$_POST['pemail'];
$pname=$_POST['pname'];
$tran_fac=$_POST['tran_fac'];
$med_history=$_POST['med_history'];
$hobbies=$_POST['hobbies'];
$smobile=$_POST['smobile'];

mysql_query("update $admission set fname ='$name', doa='$doa', gender='$gender', address='$address', state='$state', city='$city', pincode='$pincode',mob='$smobile',dob='$dob',addmission_type='$add_type',branch_name='$bname' where fno='$grno'",$link) or die(mysql_error());


mysql_query("update `$parent` set pname='$pname', poccup='$occup', pmob='$pmob', email='$pemail',pincome='two cr.', edu_quali='$qual' where fno='$grno'",$link)or die(mysql_error());

mysql_query("update `$extra` set transport_facility='$tran_fac',physical_disability = '', session_want ='', medical_history='$med_history',child_hobbies='$hobbies' where addmission_form='$grno'",$link)or die(mysql_error());
echo '<script> Record Updated </script>';
header("location:stud_admi.php?id=2");
	}
$qry= mysql_query("select * from $admission where branch_name='$user'",$link);


		$view=$_GET['id'];
		$view_qry = mysql_query("select * from $admission where fno='$view'");
		while($row = mysql_fetch_array($view_qry))
		{
		
?>

<form name="student_info" method="post" action="">
<table class="table table-responsive" width="auto" border="1" align="center">
<tr>
	<td colspan="2"><H2><u>Student Details</u></H2></td>
</tr>
  <tr>
    <td width="355">Branch Name:<input type="text" name="bname" id="bname" readonly="readonly" value="<?php echo $row['branch_name'];?>"/>
   </td>
    <td width="285">Form No:<input type="number" name="grno" id="grno" readonly="readonly" value="<?php echo $row['fno'];?>"/></td>
  </tr>
  <tr>
    <td>Full Name:<input type="text" name="name" id="name" readonly="readonly" value="<?php echo $row['fname'];?>"/></td>
    <td>Date of Addmission:<input type="text" name="doa" readonly="readonly" id="doa" value="<?php echo $row['doa'];?>"/></td>
  </tr>
  <tr>
  	<?php
	if($row['gender']=="Male")
    echo "<td>Gender:<input type='radio' name='gender' id='gender' value='Male' checked='checked'/>Male<input type='radio' name='gender' id='gender' value='Female'/>Female</td>";
	else
	echo "<td>Gender:<input type='radio' name='gender' id='gender' value='Male' />Male<input type='radio' name='gender' id='gender' value='Female' checked='checked'/>Female</td>";
	?>
    <td>Date of Birth:<input value="<?php echo $row['dob'];?>" type="text" name="dob" id="dob" /></td>
  </tr>
  <tr>
    <td height="53" colspan="2">Address:<textarea name="address" id="address"><?php echo $row['address'];?></textarea></td>
    
  </tr>
  <tr>
    <td>State:<input type="text" name="state" value="<?php echo $row['state'];?>" id="state" /></td>
    <td>City:<input value="<?php echo $row['city'];?>" type="text" name="city" id="city" /></td>
  </tr>
  <tr>
    <td>Pincode:<input type="text" name="pincode" value="<?php echo $row['pincode'];?>" id="pincode" /></td>
    <td>Mobile:
      <input value="<?php echo $row['mob'];?>" type="text" name="smobile" id="smobile" /></td>
  </tr>
  <tr>
 <?php
 	if($row['addmission_type']== "fresher")
  	echo "<td colspan='2'>Addmission Type:
        <input type='radio' name='add_type' id='add_type' value='fresher' checked='checked' />
        <label for='fresher'>Fresher</label>
        <input type='radio' name='add_type' id='add_type' value='transfer' />
        <label for='transfer'>Transfer</label>
    </td>";
	else
	echo "<td colspan='2'>Addmission Type:
        <input type='radio' name='add_type' id='add_type' value='fresher'/>
        <label for='fresher'>Fresher</label>
        <input type='radio' name='add_type' id='add_type' value='transfer'  checked='checked' />
        <label for='transfer'>Transfer</label>
    </td>"; 
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
    <td>Parent's Name: <input type="text"  value="<?php echo $row['pname'];?>" name="pname" id="pname" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Occupation:<input  value="<?php echo $row['poccup'];?>" type="text" name="occupation" id="occupation" /></td>
    <td>Qualification:<input type="text" name="quali"  value="<?php echo $row['edu_quali'];?>" id="quali" /></td>
  </tr>
  <tr>
    <td>Mobile No:<input  value="<?php echo $row['pmob'];?>" type="text" name="pmob" id="pmob" /></td>
    <td>Email:<input type="text" name="pemail"  value="<?php echo $row['email'];?>" id="pemail" /></td>
  </tr>
  <?php 
  
  		}
	$view_qry = mysql_query("select * from $extra where addmission_form='$view'",$link);
		while($row = mysql_fetch_array($view_qry))
		{
  ?>
  <tr>
    <td colspan="2"><h3><u>Extra Infromation</u></h3></td>
  </tr>
  
  <tr>
    <td>Do you want tranport facility: <input  type="text" value="<?php echo $row['transport_facility'];?>" name="tran_fac" id="tran_fac" placeholder="(y/n)" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Medical history:<input value="<?php echo $row['medical_history'];?>" type="text" name="med_history" id="med_history" /></td>
    <td>Student Hobbies:<input value="<?php echo $row['child_hobbies'];?>" type="text" name="hobbies" id="hobbies" /></td>
  </tr>
   
  <?php 
  $edit_attr = $row['addmission_form'];}?>
   <tr>
   <?php
      echo "<td colspan='2'><input type='submit' name='edit' id='edit' value='Update Student's Data' /><input type='hidden' name='edit' id='edit' value='$edit_attr' />
    </td>";

	
	?>
  </tr>
</table>
</form>
<script type="text/javascript" src="../js/jquery.js"></script>
<script src="../js/fullcalendar.js"></script>
</body>
</html>