 <?php              
  	include("../connect.php");
	$qry=mysql_query("select * from base where code='$selectedcode'",$link);
	while($row = mysql_fetch_array($qry))
	{
	$clogo = $row['clogo'];
	$des = $row['description'];
	$img1 = $row['img1'];
	$img2 = $row['img2'];
	$img3 = $row['img3'];
	$img4 = $row['img4'];
	$img5 = $row['img5'];
	}
if(isset($_GET['done']))
{

	$clogo = $_GET['logo'];

	$des = $_GET['address'];
	$img1 = $_GET['img1'];
	$img2 =	$_GET['img2'];
	$img3 = $_GET['img3'];
	$img4 = $_GET['img4'];
	$img5 = $_GET['img5'];
	mysql_query("update base set clogo='$clogo', description='$des', img1 ='$img1', img2='$img2', img3='$img3', img4='$img4', img5='$img5' where code='$code'",$link);
	header("location:index.php");
		}
?>

         <div class="row">
            	<div class="col-md-2"></div>
            	<div class="col-md-5">
                	<h2><center>Basic Info of Company</center></h2>
                </div>
            	<div class="col-md-2"></div>
            </div>	
            <form>
            <div class="row">
            	<div class="col-md-2"></div>
            	<div class="col-md-3">
                	<h4>Company Name</h4>
                </div>
                 <div class="col-md-5">
                
                	<input type="text" name="cname" id="cname" readonly value="<?php echo $cname;?>"/>
                </div>
                <div class="col-md-2"></div>
            </div>
            <div class="row">
            	<div class="col-md-2"></div>
            	<div class="col-md-3">
                	<h4>Company Logo</h4>
                </div>
                 <div class="col-md-5">
                	<input type="file" name="logo" id="logo" value="<?php echo $clogo;?>" placeholder="Upload the logo of company"/>
                </div>
                <div class="col-md-2"></div>
            </div>
            
            <div class="row">
            	<div class="col-md-2"></div>
            	<div class="col-md-3">
                	<h4>Creator's Name</h4>
                </div>
                 <div class="col-md-5">
                	<input type="text" name="hname" id="hname" placeholder="" readonly value="<?php echo $hname;?>"/>
                </div>
            	<div class="col-md-2"></div>
            </div>
            
            <div class="row">
            	<div class="col-md-2"></div>
            	<div class="col-md-3">
                	<h4>Description [For Introduction Part]</h4>
                </div>
                 <div class="col-md-6">
                	<textarea name="address" id="address"><?php echo $des;?></textarea>
                </div>
                
     			<div class="row">
            	<div class="col-md-2"></div>
            	<div class="col-md-3">
                	<h4></h4>
                </div>
                 <div class="col-md-3">
                	<input type="submit" name="done" id="done" class="btn btn-primary pull-right" value="Done"/>
                </div>
                </form>
 
            	<div class="col-md-2"></div>

               
            </div>
            
            



    

