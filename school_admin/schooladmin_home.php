<?php
			session_start();
			if($_SESSION['login'] == "")
				header("Location:http://localhost/sfm/");
			$_SESSION['dropdown']="";	
			$code = $_SESSION['center_code'];
			include("connect.php");
			$qry = mysql_query("select * from base where code='$code'",$link);
			if(mysql_num_rows($qry) == 0)
				header("location:info.php");
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
<link href="../themes/1/js-image-slider.css" rel="stylesheet" type="text/css" />
    <script src="../themes/1/js-image-slider.js" type="text/javascript"></script>
    <link href="../generic.css" rel="stylesheet" type="text/css" />


<body>
</table>
<form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post" name="form1" id="form1">
  <table width="1000" height="235" border="0" align="center">
    <tr>
      <td colspan="2"><?php include("body.php"); ?></td>
    </tr>
    <tr>
      <td colspan="2"><?php include("menu.php"); ?></td>
    </tr>
   
      </table>
</form>

<div class="maincontent">
 <div id="sliderFrame">
        <div id="slider">
            
            <img src="../images/3.jpg" alt="" />
            <img src="../images/9.jpg" />
            <img src="../images/8.jpg" />
            <img src="../images/7.jpg" />
            <img src="../images/6.jpg" />
            <img src="../images/5.jpg" />
            <img src="../images/4.jpg" />
            <img src="../images/2.jpg" />
            <img src="../images/1.jpg" />
            
            
        </div>
        <div id="htmlcaption" style="display: none;">
            <em>HTML</em> caption. Link to <a href="http://www.google.com/">Google</a>.
        </div>
    </div>
</div>



<?php include_once("footer.php"); ?>
</body>
</html>