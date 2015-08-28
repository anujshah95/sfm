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

	if (empty($_POST['code']))
	{
	  $ecode = "Code is required";
		$msg = "Error";
	}
	  else 
	 $code = strtoupper($_POST['code']);
	
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
	mysql_query("update company set c_name='$name', c_location='$address', number='$phone', headname='$hname', password='$pass', uname='$user', email='$email' where code='$code'");
else
	if(empty($msg))
	 	{mysql_query("insert into company values('$name','$address','$code','$user','$pass','$hname','$phone','$email')",$link);
		mysql_query("insert into school_admin values('$user','$pass','$code')",$link);
	$name = $pass = $user = $address = $code = $phone = $email = $hname = " ";
	echo "<script>alert('Company created')</script>";
	header("Locaion:admin_home.php");
	}
	
}

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
</script>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.js"></script>
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
</style>
</head>

<body>
<?php include("menu.php"); ?>

<form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post" name="form1" id="form1">
  <table width="1000" height="235" border="0" align="center">
         <tr>
      <td colspan="3" class="headin">&nbsp;</td>
    </tr>
    <tr>
      <td>
      <span class="error">*<?php echo "Required Field"; ?></span>
      </td>
      <td>&nbsp;</td>
    </tr>
	<tr></tr>
    
  </table>
</form>

<?php include_once("footer.php"); ?>
</body>
</html>