<?php
			session_start();
			if($_SESSION['login'] == "")
				header("Location:http://localhost/sfm/");
			$school_admin = $_SESSION['admin'];	
			$update = $_GET['id'];
			echo $_GET['id'];
			$_SESSION['update']= "$update";
			header("location:company_detail.php");
			include_once("connect.php");
			$center = "";
			$query = mysql_query("select * from school_admin",$link);
			while($row= mysql_fetch_array($query))
			{
				if($school_admin == $row['username'])
	  		{
		  	$center = $row['code'];
		  		}
			$size = strlen($center)
;		}
?>

<?php 
if(isset($_POST['logout']))
		{
			session_start();
			$_SESSION['login'] = "";
			session_destroy();
			header("Location:http://localhost/sfm/");
		}
		$code =$name=$address=$phone=$hname=$pass=$center=" ";
		if(!empty($_SESSION['dropdown']))
		{  
		$selctedcode = $_SESSION['dropdown'];
		include('connect.php');
		$qry=mysql_query("select * from branch where bcode = '$selctedcode'",$link);
		while($row = mysql_fetch_array($qry))		
		{
		$code = $row['bcode'];
		$name=$row['bname'];
		$address=$row['baddress'];
		$phone=$row['bphone'];
		$hname=$row['bheadname'];
		$pass=$row['bpassword'];
		$center=$row['code'];
		}
	
	}
if(isset($_POST['getdata']))
{	$selctedcode = $_POST['codelist'];
	include('connect.php');
	$qry= mysql_query("select * from branch where bcode = '$selctedcode'",$link);
	while($row = mysql_fetch_array($qry))		
	{
		$code = $row['bcode'];
		$name=$row['bname'];
		$address=$row['baddress'];
		$phone=$row['bphone'];
		$hname=$row['bheadname'];
		$pass=$row['bpassword'];
		$center=$row['code'];
		}
	$_SESSION['dropdown'] = $_POST['codelist'];
		}		
	$eid = $ename = $add = $gender = $age = $date = $phonenumber = $email = $status = $salary = $quali = "";
		?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
.headin {	text-align: center;
	font-size: larger;
	font-family: Calibri, "Comic Sans MS", Arial;
}
.error {color:#F00;}

#form1 table tr .headin strong {
}

body
{
background:url(../images/bg.jpg) no-repeat center top #310b28;
font-family:Arial, Helvetica, sans-serif;
padding:10px;
color:#FFF;
font-size:medium;
margin:0 auto;
color: #0e4354;
}
a:link
{
	color:#0F3;	
}
a:hover
{
	color:#9F0;	
}
a:visited
{
	color:#FFF;
}
.maincontent {
	font-size: medium;
	font-weight: bold;
	padding: 10px;
	margin:4% auto;
	color:#FFF;
	height: 600px;
	width: 800px;
	border: 2px 2 #666;
}
</style>

</head>

<body>



</table>
<form style="color:#FFF" id="form1" name="form1" method="post" action="">
  
<table width="1000" height="235" border="0" align="center">
  <tr>
    <td colspan="2"><?php include("body.php"); ?></td>
  </tr>
    <tr>
      <td colspan="2"><?php include("menu.php"); ?></td>
    </tr>
   <tr>
     <td colspan="2"></tr> 
  <tr>
    <td colspan="3" class="headin">Update Employee Info.</td>
  </tr>
  <tr>
    <td>Employee ID</td>
    <td>    <label>
        <input type="text" name="eid" id="eid" value=<?php echo $eid;?>>
      </label>
    </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Employee Name</td>
    <td><input type="text" name="ename" id="ename" value=<?php echo $ename;?>></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Address</td>
    <td><input type="text" name="add" id="add" value=<?php echo $add;?>></td>
      <td>&nbsp;</td></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Gender</td>
    <td><input type="radio" name="gender" id="gender" value="Male" checked="checked" />Male
    <input type="radio" name="gender" id="gender" value="Female">Female</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Age</td>
    <td><input type="text" name="age" id="age" value=<?php echo $age;?>></td>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td>Date Of Joining</td>
    <td><input type="date" name="date" id="date" value=<?php echo $date;?>></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Phone Number</td>
    <td><input type="text" name="phonenumber" id="phonenumber" value=<?php echo $phonenumber;?>></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Email</td>
    <td><input type="text" name="email" id="email" value=<?php echo $email;?>></td>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td>Status</td>
    <td><select name="display" id="display">
    <option value="" selected="selected">--- Select Option ---</option>
    <option value="permanent" >Permanent</option>
    <option value="temporary">Temporary</option>
    <option value="inactive">Inactive</option>
	</select>  </td>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td>Salary</td>
    <td><input type="text" name="salary" id="salary" value=<?php echo $salary;?>></td>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td>Qualification</td>
    <td><input type="text" name="quali" id="quali" value=<?php echo $quali;?>></td>
    <td>&nbsp;</td>
  </tr>
  
  
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="update" id="update" value="Update Branch" /></td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>

<?php


if (isset($_POST['submit']) or isset($_POST['update']) or isset($_POST['delete']))
{
	 $eid = $_POST['eid'];
	 $ename = $_POST['ename'];
	 $add = $_POST['add'];
	 $gender = $_POST['gender'];
	 $age = $_POST['age'];
	 $date = $_POST['date'];
	 $phonenumber = $_POST['phonenumber'];
	 $email = $_POST['email'];
	 $status = $_POST['phone'];
	 $salary = $_POST['salary'];
	 $quali = $_POST['quali'];
	 
 
If(isset($_POST['update']))
	mysql_query("update branch set emp_name='$ename', address='$add', gender='$gender', age='$age',doj='$date',contact_no='$phonenumber',email='$email',status='$permanent',salary='$salary',qual='$quali' where emp_id='$eid'",$link);
else
	{
		mysql_query("insert into branch values('$name','$address','$code','$phone','$hname','$pass','$center')",$link);
	mysql_query("insert into branch_admin values('$code','$pass','$center')",$link);
	}}
?>
<?php include_once("footer.php"); ?>
</body>
</html>