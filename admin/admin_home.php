<?php
			session_start();
			if($_SESSION['login'] == "")
				header("Location:http://localhost/sfm/");
			$_SESSION['dropdown']="";	
?>

<?php 
if(isset($_GET['logout']))
		{
			session_start();
			$_SESSION['login'] = "";
			session_destroy();
			header("Location:http://localhost/sfm/index.php");
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

body
{
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
	margin: auto;
	height: 335px;
	width: 800px;
	border: 2px 2 #666;
}
</style>
<link href="../themes/1/js-image-slider.css" rel="stylesheet" type="text/css" />
    <script src="../themes/1/js-image-slider.js" type="text/javascript"></script>
    <link href="../generic.css" rel="stylesheet" type="text/css" />

</head>

<body >
<div class="shadow1">
<form>
<?php include("menu.php");?>

<br /><br />

<div class="maincontent">
	 <div id="sliderFrame">
        <div id="slider">
            <img src="../images/1.jpg" alt="" />
            <img src="../images/2.jpg" />
            <img src="../images/3.jpg" />
            <img src="../images/4.jpg" />
            <img src="../images/5.jpg" />
            <img src="../images/6.jpg" />
            <img src="../images/7.jpg" />
            <img src="../images/8.jpg" />
            <img src="../images/9.jpg" />
          </div>
        <div id="htmlcaption" style="display: none;">
            <em>HTML</em> caption. Link to <a href="http://www.google.com/">Google</a>.
        </div>
        </div>
    </div>
 <div class="col-md-2">
</div>
<div class="col-md-8" >
<table>
	<tr >
    	<th width="100px"><h3>Introduction:</h3></th><th></th>
    </tr>
	<tr>
    	<td></td>
        <td><p>This software is created to maintain the franchisee of company. <br> In this software, User can maintain the data of new created company as well as the branches of created company. <br>In order to stop access of user who not paid renewable amount. There is a facility of disable of company or branches. So that the user cant access untill he paid the amount for software and as soon as it paid the amount the authorization is roll back to him with his previous information.   </p></td>	

    </tr>
</table>
</div>

 
  <div class="footer">
	<div class="container">
        <table width="80%"  align="center">
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