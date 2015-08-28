<?php
if(isset($_POST['submit']))
{
include('connect.php');
$admission = strtolower($user)."new_add_std";
$parent = strtolower($user)."parent_details";
$extra = strtolower($user)."extra_detail";
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

mysql_query("INSERT INTO $admission(`fname`, `doa`, `fno`, `gender`, `address`, `state`, `city`, `pincode`, `mob`, `dob`, `addmission_type`, `branch_name`) VALUES ('$name','$doa','$grno','$gender','$address','$state','$city','$pincode','$smobile','$dob','$add_type','$bname')",$link) or die(mysql_error());


mysql_query("INSERT INTO `$parent`(`fno`, `pname`, `poccup`, `pmob`, `email`, `pincome`, `edu_quali`) VALUES ($grno,'$pname','$occup','$pmob','$pemail','two cr.','$qual')",$link)or die(mysql_error());

mysql_query("INSERT INTO `$extra`(`addmission_form`, `transport_facility`, `physical_disability`, `session_want`, `medical_history`, `child_hobbies`) VALUES ('$grno','$tran_fac','','','$med_history','$hobbies')",$link)or die(mysql_error());
header("location:stud_admi.php?id=1");
}

?>