<?php 
	if(isset($_GET['search_btn']))
	{	$var = $_GET['search'];
		header("location:search.php?id=$var");
		}

	if(isset($_POST['search_btn']))
	{	$var = $_POST['search'];
		header("location:search.php?id=$var");
		}

if(isset($_POST['logout']))
		{
			session_start();
			$_SESSION['login'] = "";
			session_destroy();
			header("Location:http://localhost/sfm/");
		}
if(isset($_GET['logout']))
		{
			session_start();
			$_SESSION['login'] = "";
			session_destroy();
			header("Location:http://localhost/sfm/");
		}

?>

<div class="navbar navbar-default navbar-fixed-top>
	<div class="container">
		<div class="navbar-header">
        	<a href="index.php" class="navbar-brand"><img src="images/sfm2.png" width="100px" height="100px"></a>
        </div>
        <div class="navbar-collapse" id="navi">
        	<ul class="nav nav-tabs">
            	<li><a href="index.php">Home</a></li>
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Activities<b class="caret"></b></a>
                <ul class="dropdown-menu">
                	<li><a href="branch.php"> Create Branch</a> </li>
                    <li><a href="edit.php"> Update Branch </a></li>
                </ul>
                </li>
                <li><a href="company_detail.php">View all schools</a></li>
                <li><input placeholder="Search by name" style="margin-top:10px" type="text" class="search-query" name="search" id="search" /><i class="icon-search"></i><input style="margin-top:10px" type="submit" class="search-query" name="search_btn" id="search_btn" class="btn" Value="Search"/></li>
                <li class="dropdown pull-right"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="glyphicon-user"></i>(<?php echo $_SESSION['admin'];?>)<b class="caret"></b></a>
                <ul class="dropdown-menu">
                	<li><a href="update.php"> Company Profile</a> </li>
                    <li><a href="settin.php?id=1"> Settings </a></li>
                    <li><a href="password.php"> Change Password </a></li>
                    <li> <div class="divider"></div></li>
                    <li><input name="logout" class="btn btn-link" type="submit" id="logout" value="Logout" /></li> 
                </ul>
                </li>
                
            </ul>
        </div>
	</div> 
</div>
