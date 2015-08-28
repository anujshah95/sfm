<?php

include("connect.php");
$ccode = $_SESSION['center_code'];
$retrive=mysql_query("select * from branch where code = '$ccode'",$link);
	
	echo "<select name='codelist' id='codelist'>";
	if(!empty($_SESSION['dropdown']))
	{
		while($row=mysql_fetch_array($retrive))
		{if($_SESSION['dropdown']==$row['bcode'])
			echo "<option value=".$row['bcode']." selected='selected'>".$row['bcode']."</option>";
		else
			echo "<option value=".$row['bcode'].">".$row['bcode']."</option>";		
		}
	}
	else
		while($row=mysql_fetch_array($retrive))
		{
	echo "<option value=".$row['bcode'].">".$row['bcode']."</option>";
	}
echo "</select>";


?>


