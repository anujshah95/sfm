<?php
session_start();
include("connect.php");

if(isset($_POST['submit']))
{
	      $aname=$_SESSION['username'];
			$cname = $_POST['name'];
		   $description = $_POST['description'];
	       $price = $_POST['select1'];
		   $qty = $_POST['select2'];
		   $total = $_POST['txtDisplay'];
		   $com = $_POST['textboxNew'];
		   $date=$_POST['date'];
		   $order_status = $_POST['pending'];
		   $result = mysql_query("Insert into transaction(agentname,clientname,description,price,qty,total,com,date,order_status) values('$aname','$cname','$description','$price','$qty','$total','$com','$date','$order_status')");
		   $msg = "New record is saved";
}	
?>
<?php if(isset($_GET['logout']))
		{
			session_destroy();
			header("Location:login.php");
		}
	?>

<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><style type="text/css">
<!--
body {
	background-image: url(../../vidhi12/abc.gif);
}
body,td,th {
	color: #660000;
}
-->
</style><title>Welcome to the sfm...</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>

</head>
<body>

  <table width="1000" border="0" cellspacing="5" cellpadding="0" align="center">
    
          </td>
    </tr>
    <tr><td colspan="3" >
     </td></tr>
    
    <tr>
      <td><form NAME ="" action="" method="post">
        <div class="span8">
<table width="294" class="table table- striped">
<thead>
<tr class="bg-danger">
<th colspan="2" align="center"><h1>Inquiry Form</h1></th>
</tr>
<thead>
<tr>
<td width="118">Name:</td>
<td width="164"> <input type="text" name="name" placeholder="enter name" required value=""  /></td>
</tr>
<tr>
            <td>Email Address:</td>
            <td><label>
             <input type="text" name="address" placeholder="enter address" required value=""  />
            </label></td>
          </tr>
          <tr>
            <td>Phone:</td>
            <td><label>
              <INPUT TYPE = "Text" name = "phone" >
            </label></td>
          </tr>
          <tr>
            <td>Start-up Timeframe:</td>
            <td><select name="time">
            <option value="-">-</option>
        <option value="3">Less than 3 months</option>
        <option value="3-6">3-6 months</option>
        <option value="6-12">6-12 months</option>
    </select></td>
          </tr>

          <tr>
            <td>Start-up Location:</td>
            <td><select name="place">
            <option value="-">-</option>
        <option value="surat">Surat</option>
        <option value="gandhinagar">Gandhinagar</option>
        <option value="ahmedabad">Ahmedabad</option>
		<option value="rajkot">Rajkot</option>
        <option value="baroda">Baroda</option>
        <option value="others">Others</option>
    </select></td>
          </tr>
          <tr>
            <td align="center">
              
              <input type="submit" name="submit" class="btn btn-group-sm btn-info btn-block" value="submit">              </td>
            <td align="center" colspan="2">&nbsp;</td>
          </tr>
</table>
</div>

      </form></td>
    </tr>
    <tr>
    
      <td align="right"><?php include_once("footer.php");?>        </td>
    </tr>
  </table>

</body>
</html>