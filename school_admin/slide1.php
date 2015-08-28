<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form action="slide_process.php" method="post" class="form-horizontal" enctype="multipart/form-data">
<div class="control-group">
	<label class="control-label">Image Upload</label>
  <div class="controls">
	<div class="fileupload fileupload-new" data-provides="fileupload">
	<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
	<div>
		<span class="btn btn-file"><span class="fileupload-new">Select image</span>
		<span class="fileupload-exists">Change</span>
			<input name="uploaded_file" type="file" class="default" /></span>
			<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
			</div>
		</div>
	<span class="label label-important">NOTE!</span>
	<span>
		Attached image thumbnail is
		supported in Latest Firefox, Chrome
    </span></div>
	</div>		
									
	<div class="control-group">
		<label class="control-label">Sort Order</label>
		<div class="controls">
			<input type="text" name="sort_order" id="sort_order" >                 
		</div>
	</div>		
	
    <div class="form-actions">
    	<input type="submit" class="btn blue" value="Submit">
		<button type="button" class="btn">Cancel</button>                            
	</div>
</form>
</body>
</html>