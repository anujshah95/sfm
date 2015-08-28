<table class="table table-striped" border="2">
<tr><td colspan="10" align="center"><h1 style="color:#39F">Active Schools</h1></td>
</tr>
<th> </th>
<th>Edit</th>
<th>Company Name</th>
<th>Company Location</th>
<th>Company Code</th>
<th>Username</th>
<th>Password</th>
<th>Headname</th>
<th>Number</th>
<th>Email</th>


<?php
include_once("connect.php");
$qry = mysql_query("select * from company",$link);
$i = 1;
while($row = mysql_fetch_array($qry))
{
	$cname=$row['c_name'];
	$location=$row['c_location'];
	$code=$row['code'];
	$uname=$row['uname'];
	$password=$row['password'];
	$headname=$row['headname'];
	$number=$row['number'];
	$email=$row['email'];
	$del = $row['code'];

?>
	<tr>
    	<td><input type='checkbox' name="d<?php echo $i;?>" value ="<?php echo $del; ?>"/></td>
        <td><a href="edit.php?id=<?php echo $del; ?>">EDIT</a></td>
    	<td><?php echo $cname; ?></td>
        <td><?php echo $location; ?></td>
        <td><?php echo $code; ?></td>
		<td><?php echo $uname; ?></td>
        <td><?php echo $password; ?></td>
        <td><?php echo $headname; ?></td>
        <td><?php echo $number; ?></td>
        <td><?php echo $email; ?></td>	
    	
    </tr>
<?php $i++;}?>
    <!--echo "<tr>";
	echo "<td rowspan='3'><input type='checkbox' name='d$i' value ='$del'/> </td>";

	echo "<td rowspan='3'><a href='edit.php?id=$del'>EDIT</a></td>";
       echo "<th> Location </th>";
	echo "<td>".$row['c_location']."</td>";
	echo "<td></td>";
	echo "<th> </th>";
	echo "<td> </td>";
	echo "<td></td>";
	echo "<th>Headname</th>";
	echo "<td>".$row['headname']."</td>";
 	echo "</tr>";

	echo "<tr>";
	echo "<th>Code</th>";
	echo "<td>".$row['code']."</td>";
	echo "<td></td>";
	echo "<th>Username</th>";
	echo "<td>".$row['uname']."</td>";
	echo "<td></td>";
	echo "<th>Password</th>";
	echo "<td>".$row['password']."</td>";
 	echo "</tr>";
	
	echo "<tr>";
	echo "<th>ContactNo.</th>";
	echo "<td>".$row['number']."</td>";
	echo "<td></td>";
	echo "<th> </th>";
	echo "<td> </td>";
	echo "<td></td>";
	echo "<th>Email</th>";
	echo "<td>".$row['email']."</td>";
 	echo "</tr>";
		$i++;
	
		
}-->
<?php 
if(isset($_POST['delete']))
{	
	 $total = $_POST['total'];
	$i=0;
	for($i=1;$i<$total;$i++)
	{
		$abc=$_POST["d$i"];
		if(isset($_POST["d$i"]))
		{	
			mysql_query("delete from company where code='$abc'",$link);
			mysql_query("delete from school_admin where code='$abc'",$link);
			mysql_query("delete from branch where code='$abc'",$link);
			mysql_query("delete from branch_admin where code='$abc'",$link);
			header("Location:company_detail.php");
			
		}
	}	
}
if(isset($_POST['disable']))
{
	$total = $_POST['total'];
	$i=0;
	for($i=1;$i<$total;$i++)
	{
		$abc=$_POST["d$i"];	
		if(isset($_POST["d$i"]))
		{	
			$qry = mysql_query("select * from company where code='$abc'",$link);
			while($row = mysql_fetch_array($qry))
				{
				$code = $row['code'];
				$name= $row['c_name'];
				$address = $row['c_location'];
				$user = $row['uname'];
				$pass = $row['password'];
				$hname = $row['headname'];
				$phone = $row['number'];
				$email = $row['email'];
					}
			$qry = mysql_query("select * from branch where code='$abc'",$link);
			while($row = mysql_fetch_array($qry))
				{
				$bcode = $row['bcode'];
				$bname= $row['bname'];
				$baddress = $row['baddress'];
				$center = $row['code'];
				$bpass = $row['bpassword'];
				$bhname = $row['bheadname'];
				$bphone = $row['bphone'];
			mysql_query("insert into disable_branch values('$bname','$baddress','$bcode','$bphone','$bhname','$bpass','$center')",$link);
					}

		
			mysql_query("insert into disable values('$name','$address','$code','$user','$pass','$hname','$phone','$email')",$link);	
			mysql_query("delete from company where code='$abc'",$link);
			mysql_query("delete from school_admin where code='$abc'",$link);
			mysql_query("delete from branch where code='$abc'",$link);
			mysql_query("delete from branch_admin where code='$abc'",$link);
			header("Location:company_detail.php");
			
		}
	}
}

?>
<tr> 
<td colspan="10"><input type="submit" class="btn btn-danger pull-right" name="delete" id="delete" value="Delete"/><div class="nav-divider"><input type="submit" name="disable" id="disable" class="btn btn-warning pull-right" value="Disable"/><input type = "hidden" name="total" value="<?php echo @$i ?>"/> 
</td>
</tr></table>
