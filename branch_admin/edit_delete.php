
<style type="text/css">
#edit {
	background-color: #FFF;
	border-top-color: #FFF;
	border-right-color: #FFF;
	border-bottom-color: #FFF;
	border-left-color: #FFF;
}
</style>

<table border="2" class="table table-striped">
    <tr>
      <td colspan="13">
      Employee Name<input type="text" name="emp_name" id="emp_name" />
      Employee ID<input type="text" name="emp_id" id="emp_id" />
      <input type="submit" name="generate" id="generate" value="Generate"/>
      <input type="submit" name="showall" id="showall" value="Show All"/>
      <input type="submit" name="add" id="add" value="Add Record"/>
      <input type="submit" name="delete1" id="delete1" value="Delete"/>
      <a class="pull-right btn btn-info" href="../pdf/pdf7.php" target="_blank">Generate PDF</a>
      </td>
    </tr>
<tr>
<th> </th>
<th width="100px"> Edit / Delete</th>
<th> Employee ID </th>
<th> Name </th>
<th> Address </th>
<th> Gender </th>
<th> Age</th>
<th> Date of Joining</th>
<th> Phone No.</th>
<th> Email</th>
<th> Status </th>
<th> Salary </th>
<th> Qualification </th>

</tr>
<?php
include("connect.php");
$update="";
$user1= $_SESSION['admin'];
$emp = strtolower($admin)."employee_details";
if(isset($_GET['id']))
{
	$update = $_GET['id'];	
	
	}
$msg; $uname = " ";
$ename = "";	
if(isset($_POST['adddata']))
{			
			if ($_POST['aename'] == " ")
	  {
		  $ename = "Name is required";
	  	  $msg = "Error" ;	
	  }
	  else 
 	 {
		 if(preg_match('/^[A-Za-z ]{1,25}$/',$_POST['aename']))
			 $uname=ucfirst($_POST['aename']);
		else
			{$ename = "Name contain only character and space";
				$msg = "error";
				}	 
	 }
			
			$uadd=$_POST['aadd'];
			$ugender=$_POST['agender'];
			$uage=$_POST['aage'];
			$ustatus=$_POST['astatus'];
			$uphone=$_POST['aphone'];
			$uemail=$_POST['aemail'];
			$udoj=$_POST['adoj'];
			$usalary=$_POST['asalary'];
			$uqual=$_POST['aqual'];
			$usav = $_POST['aeid'];
			if(empty($msg)){
			mysql_query("insert into $emp values('$usav','$uname','$uadd','$ugender','$uage','$ustatus','$uphone','$uemail','$udoj','$usalary','$uqual','$user1')",$link);
			echo "<script>alert('Record Inserted Successful')</script>";
			}//header("location:company_detail.php");
	}
if(isset($_POST['sav']))
{	
			$usav = $_POST['save'];
			$uname=$_POST['ename'];
			$uadd=$_POST['add'];
			$ugender=$_POST['gender'];
			$uage=$_POST['age'];
			$ustatus=$_POST['status'];
			$uphone=$_POST['phone'];
			$uemail=$_POST['email'];
			$udoj=$_POST['doj'];
			$usalary=$_POST['salary'];
			$uqual=$_POST['qual'];
			$usav = $_POST['save'];
			mysql_query("update $emp set emp_name = '$uname', address = '$uadd', gender = '$ugender', age = '$uage', status = '$ustatus', contact_no = '$uphone', email = '$uemail',doj='$udoj',salary='$usalary', qual='$uqual' where emp_id = '$usav'",$link);
				header("location:company_detail.php");	
	}


if(isset($_POST['delete1']))
{
	foreach($_POST['del'] as $id)
	{
			mysql_query("delete from $emp where emp_id='$id' and bcode='$user1'");		
	}
	$msg="GOOD";
	header("location:company_detail.php?msg=$msg");
}
if(isset($_POST['add']))
			{
				?>
				<tr>
	<td width="50px"></td>
    <td width="50px"><input type="submit" id = "adddata" name="adddata" value="Add"></td>
    <td><input type="text" name="aeid" id="aeid" size="5"></td>
    <td><input value="<?php echo $uname;?>" type="text" name="aename" id="aename" size="5"><span class="error">*<?php echo $ename; ?></span></td>
    <td><input type="text" name="aadd" id="aadd" size="5"></td>
    <td><input type="text" name="agender" id="agender" size="5"></td>
    <td><input type="text" name="aage" id="aage" size="5"></td>
    <td><input type="text" name="adoj" id="adoj"></td>
    <td><input type="text" name="aphone" id="aphone" size="10"></td>
    <td><input type="text" name="aemail" id="aemail" ></td>
    <td><input type="text" name="astatus" id="astatus" size="5"></td>
    <td><input type="text" name="asalary" id="asalary" size="5"></td>
    <td><input type="text" name="aqual" id="aqual" size="5"></td>
</tr>

				<?php
				}
if(isset($_POST['generate']))
{

	$q1="select * from $emp where bcode='$user1'";
	if($_POST['emp_name']!='')
	{
		$name = $_POST['emp_name'];
		$q1.=" AND emp_name='$name'";	
	}
	if($_POST['emp_id']!='')
	{
		$id = $_POST['emp_id'];
		$q1.="AND emp_id='$id'";	
	
	}

	$sql_01=mysql_query($q1,$link);
	$count=mysql_num_rows($sql_01);
	if($count==0)
	{	echo'<tr>
      <td colspan="10">
			No Record Found.
      </td>
    </tr>';
			die();
	}
 	
}
else if(isset($_POST['showall']))
{
	$sql_01=mysql_query("select * from $emp where bcode='$user1'",$link);
			
}
else
{
	$sql_01=mysql_query("select * from $emp where bcode='$user1'",$link);
	
}

		while($data_01=mysql_fetch_assoc($sql_01))
		{
			
			$id=$data_01['emp_id'];
			$name=$data_01['emp_name'];
			$add=$data_01['address'];
			$gender=$data_01['gender'];
			$age=$data_01['age'];
			$status=$data_01['status'];
			$phone=$data_01['contact_no'];
			$email=$data_01['email'];
			$doj=$data_01['doj'];
			$salary=$data_01['salary'];
			$qual=$data_01['qual'];
			
			 if($update == $id)
			{ 
 ?>
 
<tr>
	<td width="50px"><input type='checkbox' name='del[]' value ="<?php echo $id;?>"/></td>
    <td width="50px"><input type="submit" id = "sav" name="sav" value="save"><input type="hidden" id = "save" name="save" value="<?php echo $id; ?>"></td>
    <td><?php echo $id; ?></td>
    <td><input type="text" name="ename" id="ename" value="<?php echo $name;?>" size="5"></td>
    <td><input type="text" name="add" id="add" value="<?php echo $add;?>" size="5"></td>
    <td><input type="text" name="gender" id="gender" value="<?php echo $gender;?>" size="5"></td>
    <td><input type="text" name="age" id="age" value="<?php echo $age;?>" size="5"></td>
    <td><input type="text" name="doj" id="doj" value="<?php echo $doj;?>"></td>
    <td><input type="text" name="phone" id="phone" value="<?php echo $phone;?>" size="10"></td>
    <td><input type="text" name="email" id="email" value="<?php echo $email;?>"></td>
    <td><input type="text" name="status" id="status" value="<?php echo $status;?>" size="5"></td>
    <td><input type="text" name="salary" id="salary" value="<?php echo $salary;?>" size="5"></td>
    <td><input type="text" name="qual" id="qual" value="<?php echo $qual;?>" size="5"></td>
</tr>
<?php }
else
{?>
<tr>
	<td width="50px"><input type='checkbox' name='del[]' value ="<?php echo $id;?>"/></td>
    <td width="50px"><a href="company_detail.php?id=<?php echo $id; ?>">EDIT</a> <a href="test.php?id=<?php echo $id; ?>">Delete</a></td>
    <td><?php echo $id; ?></td>
    <td><?php echo $name; ?></td>
    <td><?php echo $add; ?></td>
    <td><?php echo $gender; ?></td>
    <td><?php echo $age; ?></td>
    <td><?php echo $doj; ?></td>
    <td><?php echo $phone; ?></td>
    <td><?php echo $email; ?></td>
    <td><?php echo $status; ?></td>
    <td><?php echo $salary; ?></td>
    <td><?php echo $qual; ?></td>
</tr>
<?php }}?>
</table>