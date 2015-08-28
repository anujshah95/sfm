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
	
if(isset($_GET["id"]))
{	
	$_SESSION['dropdown'] = $_GET["id"];
	header("Location:edit.php");	
	}				
?>


<?php
$msg;  $ename= $epass= $euser= $eloc= $ecode= $ehead= $eno= $eemail= " ";
$name = $pass = $user = $address = $code = $phone = $email = $hname = " ";

if (isset($_POST['submit']) or isset($_POST['update']) or isset($_POST['delete']))
{ 
	if ($_SERVER['REQUEST_METHOD']=="POST")
	{
	 if (empty($_POST['cname']))
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
	if (empty($_POST['password']))
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
	 if (empty($_POST['username']))
	  {
	  $euser = "username is required";
	  $msg="error";
	  }
	  else 
 	 {
		 if(preg_match('/^[0-9A-Za-z ]{1,25}$/',$_POST['username']))
	 	 $user=$_POST['username'];
		else
			{$euser = "Username cannot contain special characters";
				$msg = "error";
				}	 
	 }

	if (empty($_POST['location']))
	  {
		  $eloc = "Location is required";
	  		$msg = "error";
	  }
	  else 
	 $address = ucfirst($_POST['location']);

	 $code = strtoupper($_POST['codelist']);
	
	if (empty($_POST['headname']))
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
	 
	 	if (empty($_POST['contactno']))
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


	if (empty($_POST['email']))
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
	 
	
		}
 include_once("connect.php");
if(isset($_POST['delete']))
	mysql_query("delete from company where code='$code'",$link);
else if(isset($_POST['update']) and empty($msg))
	{mysql_query("update company set c_name='$name', c_location='$address', number='$phone', headname='$hname', password='$pass', uname='$user', email='$email' where code='$code'");
	mysql_query("update school_admin set username ='$user',password='$pass' where code ='$code'",$link);
	$name = $pass = $user = $address = $code = $phone = $email = $hname = " ";
	
	echo "<script>alert('Company Updated')</script>";
	header("Location:admin_home.php");
	
	}
	else
	if(empty($msg))
	 	{mysql_query("insert into company values('$name','$address','$code','$user','$pass','$hname','$phone','$email')",$link);
		mysql_query("insert into school_admin values('$user','$pass','$code')",$link);
	$name = $pass = $user = $address = $code = $phone = $email = $hname = " ";
	echo "<script>alert('Record Inserted')</script>";
	
	}
	
}
if(!empty($_SESSION['dropdown']))
{  $selctedcode = $_SESSION['dropdown'];
	include('connect.php');
	$qry=mysql_query("select * from company where code = '$selctedcode'",$link);
	while($row=mysql_fetch_array($qry))
	{
		$name=$row['c_name'];
		$address = $row['c_location'];
		$user = $row['uname'];
		$pass = $row['password'];
		$hname = $row['headname'];
		$phone = $row['number'];
		$email = $row['email'];
				}
	
	}
if(isset($_POST['getdata']))
{	$selctedcode = $_POST['codelist'];
	include('connect.php');
	$qry= mysql_query("select * from company where code = '$selctedcode'",$link);
	while($row=mysql_fetch_array($qry))
	{
		$name=$row['c_name'];
		$address = $row['c_location'];
		$user = $row['uname'];
		$pass = $row['password'];
		$hname = $row['headname'];
		$phone = $row['number'];
		$email = $row['email'];
				}
	$_SESSION['dropdown'] = $_POST['codelist'];
		}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
</script>

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
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.js"></script>

</head>
<body>
<div class="container">
	<div class="col-md-3"></div>
	<div class="well col-md-6">

<form method="post" name="form1" id="form1">
  <?php include("menu.php"); ?>
<br /><br />
  <table class="table table-striped" width="1000" height="235" border="0" align="center">
    <tr>
      <td colspan="4" class="headin"><h1>Update School</h1></td>

    </tr>
        <tr> <td width="207">School  Name</td>
      <td colspan="2" width="711"><label>
        <input type="text" name="cname" id="cname" value = "<?php echo $name ;?>" placeholder="Enter company name"/><span class="error">*<?php echo $ename; ?></span>
      </label></td>
      <td width="1">&nbsp;</td>
    </tr>
    <tr>
      <td>Headquarter</td>
      <td colspan="2"><input type="text" name="location" id="location" value = "<?php echo $address ;?>" placeholder="Enter Location"/><span class="error">*<?php echo $eloc; ?></span></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Centre Code</td>
      <td colspan="2"><label for="code"></label>
        <?php include("dropdown.php") ?><input type="submit" name="getdata" id="getdata" value="get" /></td>
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
      <td colspan="2"><input type="text" name="password" id="password" value="<?php echo $pass; ?>" title="Password must contain atlest one number, one special character(%,$,#,etc),1 capital letter; length of password must be between 8 to 15  "/><span class="error">*<?php echo $epass; ?></span></td>
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

      <td colspan="4">       
        <input class="btn btn-lg btn-block btn-success pull-right" type="submit" name="update" id="update" value="Update Company" /><input type="hidden" name="selectval" id="select_hidden"><td width="51"></td>
      
    </tr>
  </table>
</form>
</div></div>
<?php include_once("footer.php"); ?>
</body>
</html>