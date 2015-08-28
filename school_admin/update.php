<?php
session_start();
$selectedcode = $_SESSION['center_code'];
$msg;  $ename= $epass= $euser= $eloc= $ecode= $ehead= $eno= $eemail= " ";
$name = $pass = $user = $address = $code = $phone = $email = $hname = " ";
$selctedcode = $_SESSION['center_code'];
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
		$email = $row['email'];}

if (isset($_POST['update']))
{ 
	if ($_SERVER['REQUEST_METHOD']=="POST")
	{
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
 include_once("../admin/connect.php");
 if(isset($_POST['update']) and empty($msg))
	{mysql_query("update company set c_location='$address', number='$phone', headname='$hname', uname='$user', email='$email' where code='$selectedcode'");
	mysql_query("update school_admin set username ='$user', password='$pass' where code='$selectedcode'",$link);
	mysql_query("update base set hname = '$hname' where code ='$selectedcode')",$link);
	$_SESSION['admin'] = $user;
	echo "<script>alert('Profile Updated')</script>";
	header("location:index.php");
	}
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.js"></script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Update School</title>

</head>

<body>

<form method="post" name="form1" id="form1">
  <?php include("menu.php");?>
<?php
	include('connect.php');
	$qry=mysql_query("select * from company where code = '$selectedcode'",$link);
	while($row=mysql_fetch_array($qry))
	{
		?>
        <div class="col-md-2"></div>
<div class="col-md-8 well">  
  	<div class="container">
        		<div class="row"><center>
                	<div class="col-md-8">
             			<h2>Company Profile</h2>       	
                    </div>
                    </center>
                </div>
                  
            	<div class="row">
                	<div class="col-md-2">
             			<h4>Company Name</h4>       	
                    </div>
                    <div class="col-md-3">
              		      <?php echo $row['c_name'];?>     	
                    </div>
                </div>
                
                <div class="row">
                	<div class="col-md-2">
             			<h4>Company Code</h4>       	
                    </div>
                    <div class="col-md-3">
               			<?php echo $row['code'];?>     	
                    </div>
                </div>
                
                
                <div class="row">
                	<div class="col-md-2">
             			<h4>HeadQuarter</h4>       	
                    </div>
                    <div class="col-md-3">
               			<?php if(isset($_GET['id'])==1) { ?><input type="text" name="location" id="location" value = "<?php echo $address ;?>" placeholder="Enter Location"/><span class="error">*<?php echo $eloc; ?><?php ;} else echo $row['c_location'];?>     	
                    </div>
                </div>
            
             	<div class="row">
                	<div class="col-md-2">
             			<h4>Username</h4>       	
                    </div>
                    <div class="col-md-3">
               			<?php if(isset($_GET['id'])==1) { ?><input type="text" name="username" id="username" value = "<?php echo $user; ?>" placeholder="Enter Username"/><span class="error">*<?php echo $euser; ?></span><?php ;} else echo $row['uname'];?>     	
                    </div>
                </div>
                
             	<div class="row">
                	<div class="col-md-2">
             			<h4>Password</h4>       	
                    </div>
                    <div class="col-md-3">
               			<?php echo "********";?>     	
                    
               			<a href="password.php" class="btn"><u>Change Password</u></a>  	
                    </div>
                </div>
                
                <div class="row">
                	<div class="col-md-2">
             			<h4>Headname</h4>       	
                    </div>
                    <div class="col-md-3">
               			<?php if(isset($_GET['id']) == 1){?><input type="text" name="headname" id="headname" value="<?php echo $hname; ?>" placeholder="Enter Headname"/><span class="error">*<?php echo $ehead; ?></span><?php ;} else echo $row['headname'];?>     	
                    </div>
                </div>
                
               	<div class="row">
                	<div class="col-md-2">
             			<h4>Contact No</h4>       	
                    </div>
                    <div class="col-md-3">
               			<?php if(isset($_GET['id'])==1) {?><input type="text" name="contactno" id="contactno" value = "<?php echo $phone; ?>" placeholder="Enter contact number"/><span class="error">*<?php echo $eno; ?></span>
      <?php ;} else echo $row['number'];?>     	
                    </div>
                </div>
                
               	<div class="row">
                	<div class="col-md-2">
             			<h4>Email</h4>       	
                    </div>
                    <div class="col-md-4">
               			<?php if(isset($_GET['id']) == 1) {?><input type="text" name="email" id="email" value = "<?php echo $email; ?>" placeholder="Enter Email"/><span class="error">*<?php echo $eemail; ?></span><?php ;} else echo $row['email'];?>     	
                    </div>
                </div>
                
               	<div class="row">
                	<div class="col-md-4" class="pull-right">
                    		<?php if(isset($_GET['id'])==1) {?>
        			        <input type="submit" name="update" id="update" class="btn btn-success" value="Save Updates" /><?php ;} else { ?>
                            <a href="update.php?id=1" class="btn btn-primary">Update Profile</a> <?php ;}?>        
                    </div>                    
                </div>
            </div>
        </div>
  
<?php
}
?>
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

</body>
</html>