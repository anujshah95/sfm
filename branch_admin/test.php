<?php
include("connect.php");
session_start();
$user1 = $_SESSION['admin'];
$emp = strtolower($user1)."employee_details";
if(isset($_POST['delete1']))
{
	foreach($_POST['del'] as $id)
	{
			mysql_query("delete from $emp where emp_id='$id'");		
	}
}
else
{
	$id=$_GET['id'];
	if($id!='')
	{
		echo "$id";
		
		mysql_query("delete from $emp where emp_id='$id'");	
	}
}
	$msg="Successfully Deleted";
	if($_GET['search']=='s')
		{
			header("location:search.php?id=$id");
			}
	else
			
			header("location:company_detail.php?msg=$msg");	


?>