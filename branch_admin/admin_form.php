<?php 
include("connect.php");
$user = $_SESSION['admin'];
$admission = strtolower($user)."new_add_std";
$qry= mysql_query("select max(fno) as fno from $admission",$link);
while($data=mysql_fetch_assoc($qry))
{
	$max=$data['fno'];	
}
$max1=$max+1;

include("admin_form_process.php");
?>
<form name="student_info" method="post" >
<table class="table table-hover" width="auto" border="1" align="center">
<tr>
	<td colspan="2"><H2><u>Student Details</u></H2></td>
</tr>
  <tr>
    <td width="355">Branch Name:<input type="text" name="bname" id="bname" readonly="readonly" value="<?php echo $user; ?>"/>
   </td>
    <td width="285">Form No:<input type="number" name="grno" id="grno" readonly="readonly" value="<?php echo $max1;?>"/></td>
  </tr>
  <tr>
    <td>Full Name:<input type="text" name="name" id="name" /></td>
    <td>Date of Addmission:<input type="text" name="doa" id="doa" value="<?php echo date("Y/m/d")?>"/></td>
  </tr>
  <tr>
    <td>Gender:<input type="radio" name="gender" id="gender" value="Male" checked="checked"/>Male<input type="radio" name="gender" id="gender" value="Female"/>Female</td>
    <td>Date of Birth:<input type="text" name="dob" id="dob" /></td>
  </tr>
  <tr>
    <td height="53" colspan="2">Address:<textarea name="address" id="address"></textarea></td>
    
  </tr>
  <tr>
    <td>State:<input type="text" name="state" id="state" /></td>
    <td>City:<input type="text" name="city" id="city" /></td>
  </tr>
  <tr>
    <td>Pincode:<input type="text" name="pincode" id="pincode" /></td>
    <td>Mobile:
      <input type="text" name="smobile" id="smobile" /></td>
  </tr>
  <tr><td colspan="2">Addmission Type:
        <input type="radio" name="add_type" id="add_type" value="fresher" checked="checked" />
        <label for="fresher">Fresher</label>
        <input type="radio" name="add_type" id="add_type" value="transfer" />
        <label for="transfer">Transfer</label>
    </td>
  </tr>
  <tr>
    <td colspan="2"><h3><u>Parent Details</u></h3></td>
  </tr>
  <tr>
    <td>Parent's Name: <input type="text" name="pname" id="pname" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Occupation:<input type="text" name="occupation" id="occupation" /></td>
    <td>Qualification:<input type="text" name="quali" id="quali" /></td>
  </tr>
  <tr>
    <td>Mobile No:<input type="text" name="pmob" id="pmob" /></td>
    <td>Email:<input type="text" name="pemail" id="pemail" /></td>
  </tr>
  <tr>
    <td colspan="2"><h3><u>Extra Infromation</u></h3></td>
  </tr>
  <tr>
    <td>Do you want tranport facility: <input type="text" name="tran_fac" id="tran_fac" placeholder="(y/n)" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Medical history:<input type="text" name="med_history" id="med_history" /></td>
    <td>Student Hobbies:<input type="text" name="hobbies" id="hobbies" /></td>
  </tr>
   <tr>
    <td colspan="2"><input type="submit" name="submit" id="submit" value="Submit" />
    </td>
  </tr>
</table>
</form>
<script type="text/javascript" src="js/jquery.js"></script>
<script src="js/fullcalendar.js"></script>
