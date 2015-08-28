<?php 
	if(isset($_GET['search_btn']))
	{	
		$var = $_GET['search'];
		header("location:search.php?id=$var");
		}
	
	if(isset($_POST['search_btn']))
	{	
		$var = $_POST['search'];
		header("location:search.php?id=$var");
		}
?>
<title>View Search</title>

<div class="navbar navbar-default navbar-fixed-top form-search">
	<div class="container">
		<div class="navbar-header">
        	<a href="index.php" class="navbar-brand"><img src="images/sfm2.png" width="100px" height="100px"></a>
        </div>
        <div class="navbar-collapse" id="navi">
        	<ul class="nav nav-tabs">
            	<li><a href="index.php">Home</a></li>
                <li><a href="company_detail.php">Employee Details</a></li>
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Student Details<b class="caret"></b></a>
                <ul class="dropdown-menu">
                      <li><a href="stud_admi.php?id=1">New Addmission</a></li>
              		  <li><a href="stud_admi.php?id=0">View &amp; Update</a></li>
                </ul>
                </li>
            	<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Time Table<b class="caret"></b></a>
                <ul class="dropdown-menu">
                      <li><a href="time_tble.php?id=2">Morning Session</a></li>
              		  <li><a href="time_tble.php?id=1">Afternoon Session</a></li>
                </ul>
                
               	
                </li><li><a href="fee.php">Fee structure</a></li>
                <li><input placeholder="Search by name" style="margin-top:10px" type="text" class="search-query" name="search" id="search" /><i class="icon-search"></i><input style="margin-top:10px" type="submit" class="search-query" name="search_btn" id="search_btn" class="btn" Value="Search"/></li>
                	
                <li class="dropdown pull-right"><a class="dropdown-toggle" data-toggle="dropdown" href="#">(<?php echo $_SESSION['admin'];?>)<b class="caret"></b></a>
                <ul class="dropdown-menu">
                	<li><a href="update.php"> Branch Profile</a> </li>
                    <li><a href="password.php"> Change Password </a></li>
                    <li> <div class="divider"></div></li>
                    <li><input name="logout" class="btn btn-link" type="submit" id="logout" value="Logout" /></li> 
                </ul>
                </li>
                
            </ul>
        </div>
	</div> 
</div>

<br /> <br/><br /> <br/>