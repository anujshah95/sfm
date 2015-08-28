<?php
			session_start();
			if($_SESSION['login'] == "")
				header("Location:http://localhost/sfm/");
			$branch_admin = $_SESSION['admin'];	
			include_once("connect.php");
					
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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

</style>
</head>

<body>

<form id="form1" name="form1" method="post" action="">
<?php include("menu.php");
	$qry = mysql_query("select * from branch where bcode = '$branch_admin'",$link);
	while($row = mysql_fetch_array($qry))
	{
?>

<br/><br/>
<div class="col-md-3"></div>
<div class="well col-md-6">  
<table class="table table-striped" width="1000" height="235" border="0" align="center">
   
    <td colspan="3" class="headin"><h1>Create Branch</h1></td>
  </tr>
  <tr>
    <td><h4>Company code :</h4></td>
    <td> <?php echo $row['code'];?>
       </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><h4>Branch Name</h4></td>
    <td>    <label>
        <?php echo $row['bname'];?>
      </label>
    </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><h4>City name</h4></td>
    <td><?php echo $row['baddress'];?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><h4>branch Code</h4></td>
    <td><?php echo $row['bcode'];?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><h4>Phone No.</h4></td>
    <td>
    <?php if(@$_GET['id'] == "update") {?>
    <input type="text" name="phone" id="phone" value="<?php echo $row['bphone'];?>" /></td>
    <?php ;} else { echo $row['bphone']; }?>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><h4>Branch HeadName</h4></td>
    <?php if(@$_GET['id'] == "update") {?>
       <td><input type="text" name="headname" id="headname" value="<?php echo $row['bheadname'];?>"/>
          </td>
         <?php ;} else { ?> 
         <td><?php echo $row['bheadname']; }?></td> 
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><h4>Password</h4></td>
    <td><?php echo $row['bpassword'];?> | <a class="btn btn-primary btn-sm" href="password.php"> Change Password </a></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <?php }?>
    <td colspan="2">
    	<?php if(@$_GET['id'] == "update") {?>
    	 <input class="btn btn-block btn-success" type="submit" name="done" id="done" value="DONE" />
         <?php ;} else {?>
        <input class="btn btn-block btn-info" type="submit" name="submit" id="submit" value="Update Branch" />
        
      	 <?php ;}?>	
      </td>
    <td>&nbsp;</td>
  </tr>
</table></div>
</form>

<?php

if (isset($_POST['submit']))
{
	header("location:update.php?id=update");
	 
}
if (isset($_POST['done']))
{	
	$branch_name = $_SESSION['admin'];
	$hname = $_POST['headname'];
	$phone = $_POST['phone'];
 	mysql_query("update branch set bphone='$phone', bheadname='$hname' where bcode='$branch_name'",$link);
	header("location:update.php");
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



</body>
</html>