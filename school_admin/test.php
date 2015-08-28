<?php 
	session_start();
	$code = $_SESSION['center_code'];
	include("connect.php");
	$qry=mysql_query("select * from base where code='$code'",$link);
	while($row = mysql_fetch_array($qry))
	{
	echo $clogo = $row['clogo'];
	echo $des = $row['description'];
	echo $img1 = $row['img1'];
	echo $img2 = $row['img2'];
	echo $img3 = $row['img3'];
	echo $img4 = $row['img4'];
	echo $img5 = $row['img5'];
	}
    ?>
	<form>
             <div class="row">
            	<div class="col-md-2"></div>
            	<div class="col-md-5">
                	<h2><center>Basic Info of Company</center></h2>
                </div>
            	<div class="col-md-2"></div>
            </div>	
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
                	<textarea name="address" id="address" value="" placeholder="Enter Description"><?php echo $des;?></textarea>
                </div>
                
     			<div class="row">
            	<div class="col-md-2"></div>
            	<div class="col-md-3">
                	<h4></h4>
                </div>
                 <div class="col-md-3">
                	<input type="submit" name="done" id="done" class="btn btn-primary pull-right" value="Done"/>
                </div>
            	<div class="col-md-2"></div>

               
            </div>
</form>            
            



    

