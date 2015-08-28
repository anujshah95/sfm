<style type="text/css">
#edit {
	border-top-color: #FFF;
	border-right-color: #FFF;
	border-bottom-color: #FFF;
	border-left-color: #FFF;
}
</style>

<?php
if(empty($_SESSION['company']))
$_SESSION['company'] = "active";
if(isset($_POST['show']))
{
	if($_POST['display'] == "active")
		$_SESSION['company'] = "active";
	else if($_POST['display'] == "inactive")
		$_SESSION['company'] = "inactive";
	else
	{
		$_SESSION['company'] = "both";
		}

}

if(isset($_POST['pdf1']))
{
	if($_POST['display'] == "active")
		header("location:../pdf/pdf1.php");
	else if($_POST['display'] == "inactive")
		header("location:../pdf/pdf2.php");
	else
	{
		header("location:../pdf/pdf3.php");
		}

}

if($_SESSION['company'] == "active")
{	
	include("active.php");
}
else if($_SESSION['company'] == "inactive")		
	include("inactive.php");
else
	{
		include("active.php");
		echo "<hr><hr>";
		include("inactive.php");
		}
?>

