<?php
include("../connect.php");
session_start();
$user=$_SESSION['admin'];

$sql_96=mysql_query("SELECT max(img_id) as mid FROM tbl_images");
$data_96=mysql_fetch_assoc($sql_96);
$max=$data_96['mid'];

$max=$max+1;

 $fileName = $_FILES["uploaded_file"]["name"]; // The file name
$fileTmpLoc = $_FILES["uploaded_file"]["tmp_name"]; // File in the PHP tmp folder
$fileType = $_FILES["uploaded_file"]["type"]; // The type of file it is
$fileSize = $_FILES["uploaded_file"]["size"]; // File size in bytes
$fileErrorMsg = $_FILES["uploaded_file"]["error"]; // 0 for false... and 1 for true
$kaboom = explode(".", $fileName);

 // Split file name into an array using the dot
$fileExt = end($kaboom); 
$fileName= 'slide'.$max.'.'.$fileExt;



// Now target the last array element to get the file extension
// START PHP Image Upload Error Handling --------------------------------------------------
if (!$fileTmpLoc) { // if file not chosen
    echo "ERROR: Please browse for a file before clicking the upload button.";
    exit();
} else if($fileSize > 5242880) { // if file size is larger than 5 Megabytes
    echo "ERROR: Your file was larger than 5 Megabytes in size.";
    unlink($fileTmpLoc); // Remove the uploaded file from the PHP temp folder
    exit();
} else if (!preg_match("/.(gif|jpg|png|jpeg)$/i", $fileName) ) {
     // This condition is only if you wish to allow uploading of specific file types    
     echo "ERROR: Your image was not .gif, .jpg, or .png.";
     unlink($fileTmpLoc); // Remove the uploaded file from the PHP temp folder
     exit();
} else if ($fileErrorMsg == 1) { // if file upload error key is equal to 1
    echo "ERROR: An error occured while processing the file. Try again.";
    exit();
}
// END PHP Image Upload Error Handling ----------------------------------------------------
// Place it into your "uploads" folder mow using the move_uploaded_file() function
$moveResult = move_uploaded_file($fileTmpLoc, "../images/$fileName");
// Check to make sure the move result is true before continuing
if ($moveResult != true) {
    echo "ERROR: File not uploaded. Try again.";
    unlink($fileTmpLoc); // Remove the uploaded file from the PHP temp folder
    exit();
}
//unlink($fileTmpLoc); // Remove the uploaded file from the PHP temp folder
// ---------- Include Adams Universal Image Resizing Function --------


$name=$fileName;
$caption= "";
$active= 0;
$sort_order=$_POST['sort_order'];
$code = $_SESSION['center_code'];

mysql_query("INSERT INTO `tbl_images` (`img_name`,`img_caption`,`img_status`,`sort_order`,`user_id`,code) VALUES ('$name','$caption','$active','$sort_order','$user','$code') ");
$ins_img_id=mysql_insert_id();


$sql_01=mysql_query("SELECT * FROM `tbl_images` WHERE user_id='$user' AND sort_order>=$sort_order AND img_id!=$ins_img_id order by sort_order");
while($data_01=mysql_fetch_assoc($sql_01))
{
	$img_id=$data_01['img_id'];
	$new_sort_order=$data_01['sort_order']+1;
	mysql_query("UPDATE  `tbl_images` SET `sort_order`='$new_sort_order' WHERE `img_id`='$img_id'");
}
/*
$objquery=new query();
$data=array(
			"img_name"=>$name,
			"img_caption"=>$caption,
			

			);
$result=$objquery->submit_image($data);*/
header("location:index.php");

?>