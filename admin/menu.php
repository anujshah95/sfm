<?php 
	include("connect.php");
	$qry = mysql_query("select * from admin_inquiry where status='0'");
	$count = mysql_num_rows($qry);
	$username = mysql_query("select * from company");
	while($row = mysql_fetch_array($username))
	{
		
		}
?>
<div class="navbar navbar-default navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
        	<a href="admin_home.php" class="navbar-brand"><img src="images/sfm2.png" width="100px" height="100px"></a>
        </div>
        <div class="navbar-collapse" id="navi">
        	<ul class="nav nav-tabs">
            	<li><a href="admin_home.php">Home</a></li>
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Activities<b class="caret"></b></a>
                <ul class="dropdown-menu">
                	<li><a href="company.php"> Create School</a> </li>
                    <li><a href="edit.php"> Update School</a></li>
                </ul>
                </li>
                
                <li><a href="company_detail.php">View all schools</a></li>
                <li class="pull-right"><a href="inquiry.php">Notifications(<?php echo $count;?>)</a></li>
                <li class="dropdown pull-right"><a class="dropdown-toggle" data-toggle="dropdown" href="#">(<?php echo $_SESSION['admin'];?>)<b class="caret"></b></a>
                <ul class="dropdown-menu">
                	<li><a href="password.php"> Change Password </a></li>
                    <li> <div class="divider"></div></li>
                    <li><input type="submit" name="logout" class="btn btn-link"  id="logout" value="Logout" /></li> 
                </ul>
                </li>
                
            </ul>
        </div>
	</div> 
</div>

