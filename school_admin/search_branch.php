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
	$del = $_GET["id"];
		
	}				

		include('connect.php');
		$qry=mysql_query("select * from branch where bcode = '$del'",$link);
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




<form  id="form1" name="form1" method="post" action="">
<?php include("menu.php");?>

<br/><br/>

<div class="col-md-2"></div>
<div class="well col-md-8">  
  
<table class="table table-striped"  border="0" align="center">
     
    <td colspan="3" class="headin">Branch Detail</td>
  </tr>
  <tr>
    <th>Branch Name</th>
    <td><?php echo $name;?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th>Branch Location</th>
    <td><?php echo $address;?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th>branch Code</th>
    <td><?php echo $del;?></td>
    </tr>
  <tr>
    <th>Phone No.</th>
    <td><?php echo $phone;?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th>Branch HeadName</th>
    <td><?php echo $hname;?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th>Password</th>
    <td><?php echo $pass;?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"><a class="btn btn-info btn-lg btn-block" href="edit.php?id=<?php echo $del; ?>">EDIT</a></td>
    
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


if (isset($_POST['submit']) or isset($_POST['update']) or isset($_POST['delete']))
{
	 $name = $_POST['bname'];
	 $pass = $_POST['password'];
	 $address = $_POST['location'];
	 $code = $_POST['codelist'];
	 $hname = $_POST['headname'];
	 $phone = $_POST['phone'];
 
if(isset($_POST['delete']))
	mysql_query("delete from branch where bcode='$code'",$link);
else if(isset($_POST['update']))
	mysql_query("update branch set bname='$name', baddress='$address', bphone='$phone', bheadname='$hname', bpassword='$pass' where bcode='$code'");
else
	{
		mysql_query("insert into branch values('$name','$address','$code','$phone','$hname','$pass','$center')",$link);
	mysql_query("insert into branch_admin values('$code','$pass','$center')",$link);
	}}

  $query = mysql_query("select * from school_admin",$link);
	while($row= mysql_fetch_array($query))
	{
	if($school_admin == $row['username'])
	  {
		  $center = $row['code'];
		  }
	}

?>



</body>
</html>