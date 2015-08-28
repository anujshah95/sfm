<?php
			session_start();
			if($_SESSION['login'] == "")
				header("Location:http://localhost/sfm/");
			$school_admin = $_SESSION['admin'];	
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
;	
	}


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

$msg; 
$ename = $eaddress = $eheadname = $eno = $ecode = $epass = " ";
	
		?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.js"></script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
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

.headin {	text-align: center;
	font-size: larger;
	font-family: Calibri, "Comic Sans MS", Arial;
}
.error {color:#F00;}

#form1 table tr .headin strong {
}

body
{

font-family:Arial, Helvetica, sans-serif;
padding:10px;
color:#FFF;
font-size:medium;
margin:0 auto;
color: #0e4354;
}
</style>

</head>

<body>
<div class="shadow1">



<form  id="form1" name="form1" method="post" action="">
<?php include("menu.php");?>

<br/><br/>

<div class="col-md-2"></div>
<div class="col-md-8">  
<table class="table table-striped" border="0" align="center">     
    <td colspan="3" class="headin">Updation of Branch</td>
  </tr>
  <tr>
    <td><h4>Branch Name</h4></td>
    <td>    <label>
        <input type="text" name="bname" id="bname" value=<?php echo $name;?>><span class="error">*<?php echo $ename; ?></span>
      </label>
    </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><h4>Branch Location</h4></td>
    <td><input type="text" name="location" id="location" value=<?php echo $address;?>><span class="error">*<?php echo $eaddress; ?></span></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><h4>branch Code</h4></td>
    <td><label for="code"></label>
        <?php include("dropdown.php") ?><input type="submit" name="getdata" id="getdata" value="get" /></td>
    </tr>
  <tr>
    <td><h4>Phone No.</h4></td>
    <td><input type="text" name="phone" id="phone" value=<?php echo $phone;?>><span class="error">*<?php echo $eno; ?></span></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><h4>Branch HeadName</h4></td>
    <td><input type="text" name="headname" id="headname" value=<?php echo $hname;?>><span class="error">*<?php echo $eheadname; ?></span></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><h4>Password</h4></td>
    <td><input type="password" name="password" id="password" value=<?php echo $pass;?>><span class="error">*<?php echo $epass; ?></span></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input class="btn btn-primary" type="submit" name="update" id="update" value="Update Branch" /></td>
    <td>&nbsp;</td>
  </tr>
</table>
</div>
<div class="footer">
	<div class="container">
		<table width="80%" align="center">
			<tr>
				<td> <center>The Website developed by</center></td></tr><tr>
				<td> <center>Chirag Sanghvi | Anuj Shah</center> </td></tr><tr>
				<td> <center>&copy;2013 - <?php echo date("Y"); ?></center> </td> 
			</tr>
		</table>
       
	</div> 
</div>

</form>

<?php

if (isset($_POST['update']))
{		
	 if($_POST['bname'] == " ")
		{
			$ename = "Branch name is required";
		  	$msg = "Error" ;	
			}
	else 
 	 {
		 if(preg_match('/^[A-Za-z ]{1,25}$/',$_POST['bname']))
			 $name=ucfirst($_POST['bname']);
		else
			{
				$ename = "Name contain only character and space";
				$msg = "error";
				}	 
	 }
	
	if($_POST['location'] == " ")
		{
			$eaddress = "City name is required";
		  	$msg = "Error" ;	
			}
	else 
 	 {
		 if(preg_match('/^[A-Za-z ]{1,25}$/',$_POST['location']))
			 $address =ucfirst($_POST['location']);
		else
			{
				$eaddress = "Name contain only character and space";
				$msg = "error";
				}	 
	 }
	 
	 if($_POST['headname'] == " ")
		{
			$eheadname = "Headname is required";
		  	$msg = "Error" ;	
			}
	else 
 	 {
		 if(preg_match('/^[A-Za-z ]{1,25}$/',$_POST['headname']))
			 $hname = ucfirst($_POST['headname']);
		else
			{
				$eheadname = "Name contain only character and space";
				$msg = "error";
				}	 
	 }
	 
	 
	 if(empty($_POST['password']))
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
	
	if (empty($_POST['phone']))
	{
	  $eno = "Contact number is required";
		$msg = "Error";
	}
	  else 
 	 {
		 if(preg_match('/^[0-9]{10}$/',$_POST['phone']))
		 $phone = $_POST['phone'];
		else
			{$eno = "Phone number is not valid";
				$msg = "error";
				}	 
	 }
	 
	 $code = $_POST['codelist'];
	
 if(isset($_POST['update']))
	{mysql_query("update branch set bname='$name', baddress='$address', bphone='$phone', bheadname='$hname', bpassword='$pass' where bcode='$code'");
		header("location:index.php");
	}
}

  $query = mysql_query("select * from school_admin",$link);
	while($row= mysql_fetch_array($query))
	{
	if($school_admin == $row['username'])
	  {
		  $center = $row['code'];
		  }
	}

?>


</div>
</body>
</html>