<?php
session_start();
include("cn.php");
include("common.php");
checklogin();
?>

<?php
if(isset($_POST['Delete']))
{
	$total = $_POST['total'];
	$td = 0;
	$i = 0;
	
	for($i = 1; $i <= $total; $i++)
	{
		if(isset($_POST["d$i"]))
		{
			mysql_query("DELETE FROM client WHERE cid=".$_POST["d$i"],$link);
			$td++;
		}
	}

//	$msg = "$td record(s) deleted!";
}



$result = mysql_query("Select * from client",$link);
$num = mysql_num_rows($result);
$n = 0;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to the BMS ...</title>

<style type="text/css">
#Delete {
	background-color: #FFF;
	border-top-color: #FFF;
	border-right-color: #FFF;
	border-bottom-color: #FFF;
	border-left-color: #FFF;
}
</style>
</head>
<body bgcolor="#CCCCFF">

<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td width="500" colspan="2"><?php include_once("head.php");?></td>
  </tr>
  
 <tr>
    <td colspan="2">    </td>
  </tr>
  <tr>
    <td width="500">Welcome <strong><font color="#0033CC" size="6"><?php echo $_SESSION['username'];?></font></strong> | <a href="logout.php">Logout</a></td>
    <td width="500" align="right"><?php echo date("dMY"); ?>&nbsp;&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><?php include_once("menu.php");?></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><form id="form1" name="form1" method="post" action="">
      <table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td colspan="2" bgcolor="#0033CC" align="center"><a href="clientinsert.php"><font size="5" color="#FFFFFF">Add</font></a></td>
          <td colspan="8" align="center" bgcolor="#0033CC"><a href="clientinsert.php"></a><font size="5" color="#FFFFFF">Client</font></td>
          </tr>
          <?php while($row = mysql_fetch_array($result, MYSQL_BOTH)){$n++;?>
    	  
          <tr>
            <td width="50" align="center" bgcolor="#CC99FF">&nbsp;</td>
            <td width="50" align="center" bgcolor="#CC99FF">&nbsp;</td>
            <td rowspan="6"><table width="700" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td colspan="2" bgcolor="#CC99FF">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="2" >&nbsp;<strong><font color="#0033CC" >Name : </font></strong><?php echo $row['cname']; ?></td>
              </tr>
              <tr>
                <td colspan="2" >&nbsp;<strong><font color="#0033CC">Address : </font></strong><?php echo $row['caddress'];?></td>
              </tr>
              <tr>
                <td width="350" >&nbsp;<strong><font color="#0033CC">City : </font></strong><?php echo $row['ccity'];?></td>
                <td width="350" >&nbsp;<strong><font color="#0033CC">State : </font></strong><?php echo $row['cstate'];?></td>
              </tr>
              <tr>
                <td>&nbsp;<strong><font color="#0033CC">PhoneNo : </font></strong><?php echo $row['cphone'];?></td>
                <td>&nbsp;<strong><font color="#0033CC">Mobile : </font></strong><?php echo $row['cmobile'];?></td>
              </tr>
              <tr>
                <td bgcolor="#CC99FF">&nbsp;</td>
                <td bgcolor="#CC99FF">&nbsp;</td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td width="50" align="center" bgcolor="#FFFFFF">&nbsp;</td>
            <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td width="50" align="center" bgcolor="#FFFFFF"><a href="clientinsert.php?cid=<?php echo $row['cid']?>">Edit</a></td>
            <td align="center" bgcolor="#FFFFFF"><input type="checkbox" name="d<?php echo $n;?>"  value="<?php echo $row['cid'];?>"/></td>
          </tr>
          <tr>
            <td width="50" align="center" bgcolor="#FFFFFF">&nbsp;</td>
            <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td width="50" align="center" bgcolor="#FFFFFF">&nbsp;</td>
            <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td width="50" align="center" bgcolor="#CC99FF">&nbsp;</td>
            <td align="center" bgcolor="#CC99FF">&nbsp;</td>
          </tr>
        <?php

 }?>
        <tr>
          <td colspan="2">&nbsp;</td>
          <td colspan="6"><label>
            <input type="submit"  name="Delete" id="Delete" value="Delete" />
          <input name="total" type="hidden" id="total" value="<?php echo $n?>"></label></td>
        </tr>
      </table>
        </form>    </td>
  </tr>
  <tr></tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr><td colspan="2"><?php include_once("footer.php");?></td></tr>
</table>
</body>
</html>
