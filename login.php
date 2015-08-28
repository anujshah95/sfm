<?php
session_start();
?>
<?php
$msg="";

if(isset($_POST['submit']))
{	
	$_SESSION['login'] = " ";
	$name=$_POST['name'];
	$pass=$_POST['pass'];
	$user=$_POST['user'];
	{
	include_once("connect.php");
	$query = mysql_query("select * from $user",$link);
	while($row= mysql_fetch_array($query))
	{
	if($name==$row['username'] and $pass==$row['password'])
	  {
		$_SESSION['login']="login";
	    $_SESSION['admin']= $name; 
		
		if($user == "admin")
		header("Location:admin/admin_home.php");
		else if ($user == "school_admin")
		{
			$_SESSION['center_code'] = $row['code'];
			header("Location:school_admin/schooladmin_home.php");
		}
		else
		{
		$_SESSION['var'] =0;
		header("Location:branch_admin/branch_home.php");
		}}
	}
//	else if($name != "admin")
		$msg = "Invalid Username Or Password";
//	else if($pass != "1234")
//		$msg = "Incorrect Password";
	
	}
}
?>

<form action="" method="post"><table width="266" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr align="center">
    <td colspan="2"> 
    <a href="login.php"><img src="admin.jpg" width="41" height="41" /></a>
    <h1>Login:</h1></td>
    </tr>
  <tr>
    <td width="125">User type:</td>
    <td  align="center"><label>
		<select name="user">
        <option value = "admin" selected>Admin </option>
        <option value="school_admin">School Admin </option>
        <option value="branch_admin">Branch Admin</option>
        </select>
    </label></td>
  </tr>

  <tr>
    <td width="125">Name</td>
    <td  align="center"><label>
      <input type="text" name="name" placeholder="enter name" required />
    </label></td>
  </tr>
  <tr>
    <td>Password</td>
    <td align="center"><label>
      <input type="password" name="pass" placeholder="enter password" required/>

    </label></td>
  </tr>
  <tr>
    <td colspan="2"><b><center><font color="#FF0000"><?php echo $msg; ?></font></center></b></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
      <label>
      <input type="submit" name="submit" id="submit" value="submit" />
      </label>
    </div></td>
    </tr>
</table>
