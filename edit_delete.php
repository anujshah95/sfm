<?php
If(isset($_POST['delete']))
{
	include_once("connect.php");
		
	mysql_query("delete from company where code='d$i'",$link);

	
	}

?>
<?php
include_once("connect.php");
$qry = mysql_query("select * from company",$link);
echo "<table border = '1'>";
while($row = mysql_fetch_array($qry))
{
	$i = 1;
		$del = $row['code'];
	echo "<tr>";
	
	echo "<th rowspan='3'> Edit </th>";

	echo "<th> Location </th>";
	echo "<td>".$row['c_location']."</td>";
	echo "<td>";
	echo "<th> </th>";
	echo "<td> </td>";
	echo "<td>";
	echo "<th>Headname</th>";
	echo "<td>".$row['headname']."</td>";
 	echo "</tr>";

	echo "<tr>";
	echo "<th>Code</th>";
	echo "<td>".$row['code']."</td>";
	echo "<td>";
	echo "<th>Username</th>";
	echo "<td>".$row['uname']."</td>";
	echo "<td>";
	echo "<th>Password</th>";
	echo "<td>".$row['password']."</td>";
 	echo "</tr>";
	
	echo "<tr>";
	echo "<th>ContactNo.</th>";
	echo "<td>".$row['number']."</td>";
	echo "<td>";
	echo "<th> </th>";
	echo "<td> </td>";
	echo "<td>";
	echo "<th>Email</th>";
	echo "<td>".$row['email']."</td>";
 	echo "</tr>";
		$i++;
		}
?>
<tr> 
<td><input type="submit" name="delete" id="delete" value="Delete"/>
</td>
</tr>
</table>