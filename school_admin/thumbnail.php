<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sideshow images</title>
</head>

<body>
<div class="container">
	<div class ="row">
    	<div class="col-md-12">
        	<h2> Slideshow images </h2><hr/>
        </div>
    </div>
	<div class ="row">
<?php 
	$code = $_SESSION['center_code'];
	include("connect.php");
	$sql_01=mysql_query("select * from tbl_images where code='$code'");
	while($data=mysql_fetch_assoc($sql_01))
	{
	$id = $data['img_id'];	
?>            

    
    	<div class="col-md-3">
        	<div class="thumbnail">
 				            <img src="../images/<?php echo $data['img_name'];?>" alt="" style="border-image:fill; background-size:20px" />
                            <div class="caption">
                            	<p><a href="settin.php?imgid=<?php echo $id;?>" class="btn btn-danger">Delete</a></p>
                            </div>           
            </div>
        </div>
    

<?php 
	}
?>  
</div>
    
</div>
</body>
</html>