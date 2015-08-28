<?php
			session_start();
			if($_SESSION['login'] == "")
				header("Location:http://localhost/sfm/");
?>

<?php 
if(isset($_POST['logout']))
		{
			session_start();
			$_SESSION['login'] = "";
			session_destroy();
			header("Location:http://localhost/sfm/");
		}
	include("connect.php");
	$check = 0;		
?>


<?php

//function testfield($data,$field)
//{
//	if(empty($data))
//	{
//		$msg = "Required field";
//		}
//	else
//	{
//		if($field == "cname" or $field == "location" or $field == "headname")
//		{
//			//if(!preg_match("/[a-zA-Z]*$/")){$msg="Name should contain only characters";}
//			
//		}
//	}
//}
$msg;  $ename= $epass= $euser= $eloc= $ecode= $ehead= $eno= $eemail= " ";
$name = $pass = $user = $address = $code = $phone = $email = $hname = " ";
if (isset($_POST['submit']))
{ 
	
	 if ($_POST['cname'] == " ")
	  {
		  $ename = "Name is required";
	  	  $msg = "Error" ;	
	  }
	  else 
 	 {
		 if(preg_match('/^[A-Za-z ]{1,25}$/',$_POST['cname']))
			 $name=ucfirst($_POST['cname']);
		else
			{$ename = "Name contain only character and space";
				$msg = "error";
				}	 
	 }
	if ($_POST['password'] == " ")
	  {
		  $epass = "Password is required";
	  		$msg="error";
	  }
	  else 
	  {
		  if(preg_match('/^(?=.*[0-9])(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,15}$/',$_POST['password']))
 	  			$pass = $_POST['password'];
		  else
		    { 
			  $epass = "Password must contain atlest one number, one special character(%,$,#,etc),1 capital letter; length of password must be between 8 to 15";
			  $msg = "error";
				} 		
	  }
	 
	 if ($_POST['username'] == " ")
	  {
	  $euser = "username is required";
	  $msg="error";
	  }
	  else 
 	 {
		  	$username = mysql_query("select * from company");
			while($row = mysql_fetch_array($username))
			{	
				$check_u = $_POST['username'];
				if($row['uname'] != $check_u)
		 		{
					
				 	 }
				else {$check = 1;}
			}
			
		 if($check == 1)
		 {
			 $msg = "error";
			 $euser = "This username is already used";
			 }
		else
		{
			 if(preg_match('/^[0-9A-Za-z ]{1,25}$/',$_POST['username']))
			 	 $user=$_POST['username'];
			else
				{
				$euser = "Username cannot contain special characters";
				$msg = "error";
				}	 
	 	}
	 }
	 
	if ($_POST['location']==" ")
	  {
		  	$eloc = "Location is required";
	  		$msg = "error";
	  }
	  else 
	 $address = ucfirst($_POST['location']);

	if ($_POST['code'] == " ")
	{
	  $ecode = "Code is required";
		$msg = "Error";
	}
	  else 
	 $code = strtoupper($_POST['code']);
	
	if ($_POST['headname'] == " ")
	{
	  $ehead = "Headname is required";
		$msg = "Error";
	}
	  else 
 	 {
		 if(preg_match('/^[A-Za-z ]{1,25}$/',$_POST['headname']))
			 $hname = ucfirst($_POST['headname']);
		else
			{$ehead = "Headname contain only character and space";
				$msg = "error";
				}	 
	 }
	 
	if ($_POST['contactno'] == " ")
	{
	  $eno = "Contact number is required";
		$msg = "Error";
	}
	  else 
 	 {
		 if(preg_match('/^[0-9]{10}$/',$_POST['contactno']))
		 $phone = $_POST['contactno'];
		else
			{$eno = "Phone number is not valid";
				$msg = "error";
				}	 
	 }


	if ($_POST['email'] == " ")
	{
	  $eemail = "Email is required";
		$msg = "Error";
	}
	   else 
 	 {
		// if(preg_match('/^[\w\-]+ \@[\w\-] + \. + \[\w\-]$/',$_POST['email']))
			$email = $_POST['email'];
		//else
//			{$eemail = "Email is not valid";
//				$msg = "error";
//				}	 
 }
	 
	
		
 include_once("connect.php");
if(isset($_POST['delete']))
	mysql_query("delete from company where code='$code'",$link);
else if(isset($_POST['update']) and empty($msg))
	mysql_query("update company set c_name='$name', c_location='$address', number='$phone', headname='$hname', password='$pass', uname='$user', email='$email' where code='$code'");
else
	if(empty($msg))
	 	{mysql_query("insert into company values('$name','$address','$code','$user','$pass','$hname','$phone','$email')",$link);
		mysql_query("insert into school_admin values('$user','$pass','$code')",$link);
	$name = $pass = $user = $address = $code = $phone = $email = $hname = " ";
	echo "<script>alert('Company created')</script>";
	header("Location:admin_home.php");
	}
	
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Create Company</title>
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
.maincontent {
	font-size: medium;
	font-weight: bold;
	padding: 10px;
	margin:4% auto;
	height: 600px;
	width: 800px;
	border: 2px 2 #666;
}
.shadow1{
	/*
	-moz-box-shadow: 10px 10px 10px #000;
	-webkit-box-shadow: 10px 10px 10px #000;
	box-shadow: 10px 10px 10px #000;
	*/
	-moz-box-shadow: 0 0 5px 5px #888;
	-webkit-box-shadow: 0 0 5px 5px#888;
	box-shadow: 0 0 5px 5px #888;
	/* For IE 8 */
	-ms-filter: "progid:DXImageTransform.Microsoft.Shadow(Strength=4, Direction=135, Color='#000000')";
	/* For IE 5.5 - 7 */
	filter:progid:DXImageTransform.Microsoft.Shadow(color='#000000',direction='120',strength='20');
}
.shadow1 .content {
        position: relative; /* This protects the inner element from being blurred */
        padding: 100px;
        background-color: #DDD;
}
</style>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.js"></script>

</head>

<body>
<div class="shadow1">
<form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post" name="form1" id="form1">
<?php include("menu.php");?>
<br /><br />
<div class="container">
	<div  class="col-md-3"></div>
	<div class="well col-md-6">
  <table class="table table-striped" width="1000" height="235" border="0" align="center">
    <tr>
      <td colspan="3" class="headin"><h1>Create School</h1></td>
    </tr>
    <tr>
      <td width="250">
      <span class="error">*<?php echo "Required Field"; ?></span>
      </td>
      <td width="728">&nbsp;</td>
    </tr>
	<tr></tr>
    <tr>
      <td>School Name</td>
      <td colspan="2"><label>
        <input type="text" name="cname" id="cname" value = "<?php echo $name ;?>" placeholder="Enter company name"/><span class="error">*<?php echo $ename; ?></span>
      </label></td>
      <td width="8">&nbsp;</td>
    </tr>
    <tr>
      <td>Headquarter</td>
      <td colspan="2"><input type="text" name="location" id="location" value = "<?php echo $address ;?>" placeholder="Enter Location"/><span class="error">*<?php echo $eloc; ?></span></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Centre Code</td>
      <td colspan="2"><input type="text" name="code" id="code" value = "<?php echo $code ;?>" placeholder="Enter center code"/><span class="error">*<?php echo $ecode; ?></span></td>
      <td>&nbsp;</td>
    </tr>
<tr>
      <td>Headname</td>
      <td colspan="2"><input type="text" name="headname" id="headname" value="<?php echo $hname; ?>" placeholder="Enter Headname"/><span class="error">*<?php echo $ehead; ?></span></td>
    	  <td>&nbsp;</td>
    </tr>

    <tr>
      <td>Username</td>
      <td colspan="2"><input type="text" name="username" id="username" value = "<?php echo $user; ?>" placeholder="Enter Username"/><span class="error">*<?php echo $euser; ?></span></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Password</td>
      <td colspan="2"><input type="password" name="password" id="password"  title="Password must contain atlest one number, one special character(%,$,#,etc),1 capital letter; length of password must be between 8 to 15  "/><span class="error">*<?php echo $epass; ?></span></td>
      <td>&nbsp;</td>
    </tr>
    	    <tr>
      <td>Contact Number</td>
      <td colspan="2"><input type="text" name="contactno" id="contactno" value = "<?php echo $phone; ?>" placeholder="Enter contact number"/><span class="error">*<?php echo $eno; ?></span></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Email Address</td>
      <td colspan="2"><input type="text" name="email" id="email" value = "<?php echo $email; ?>" placeholder="Enter Email"/><span class="error">*<?php echo $eemail; ?></span></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      
      <td colspan="2">
        <input type="submit" name="submit" id="submit" class="btn btn-lg btn-block btn-success pull-right" value="Create Company" />
      </td>
      
    </tr>
  </table></div></div>
<?php include("footer.php"); ?>
</form>
</div>

</body>
</html>