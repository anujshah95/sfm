<?php
include("connect.php");
$retrive=mysql_query("select * from company",$link);
	
	echo "<select name='codelist' id='codelist'>";
	if(!empty($_SESSION['dropdown']))
	{
		while($row=mysql_fetch_array($retrive))
		{if($_SESSION['dropdown']==$row['code'])
			echo "<option value=".$row['code']." selected='selected'>".$row['code']."</option>";
		else
			echo "<option value=".$row['code'].">".$row['code']."</option>";		
		}
	}
	else
		while($row=mysql_fetch_array($retrive))
		{
	echo "<option value=".$row['code'].">".$row['code']."</option>";
	}
echo "</select>";


?>


