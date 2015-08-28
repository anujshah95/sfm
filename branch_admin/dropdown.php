<?php
include("connect.php");
$retrive=mysql_query("select * from emploee_detail",$link);
	
	echo "<select name='codelist' id='codelist'>";
	if(!empty($_SESSION['dropdown']))
	{
		while($row=mysql_fetch_array($retrive))
		{if($_SESSION['dropdown']==$row['emp_id'])
			echo "<option value=".$row['emp_id']." selected='selected'>".$row['emp_id']."</option>";
		else
			echo "<option value=".$row['emp_id'].">".$row['emp_id']."</option>";		
		}
	}
	else
		while($row=mysql_fetch_array($retrive))
		{
	echo "<option value=".$row['emp_id'].">".$row['emp_id']."</option>";
	}
echo "</select>";


?>


