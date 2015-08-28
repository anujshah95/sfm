<?php
include("../connect.php"); 
session_start();

//============================================================+



// File name   : example_047.php



// Begin       : 2009-03-19



// Last Update : 2010-08-08



//



// Description : Example 047 for TCPDF class



//               Transactions



//



// Author: Nicola Asuni



//



// (c) Copyright:



//               Nicola Asuni



//               Tecnick.com LTD



//               Manor Coach House, Church Hill



//               Aldershot, Hants, GU12 4RQ



//               UK



//               www.tecnick.com



//               info@tecnick.com



//============================================================+







/*



 * Creates an example PDF TEST document using TCPDF



 * @package com.tecnick.tcpdf



 * @abstract TCPDF - Example: Transactions



 * @author Nicola Asuni



 * @since 2009-03-19



 */

//error_reporting(0);



require_once('config/lang/eng.php');

require_once('tcpdf.php');
class MYPDF extends TCPDF {

	// Colored table

}

// create new PDF document

$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information



$pdf->SetCreator(PDF_CREATOR);

//$pdf->SetHeaderData($imm, 160);

$pdf->setPageOrientation('L',true,10);

// set default header data

// set header and footer fonts




$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));

$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins

$pdf->SetMargins(PDF_MARGIN_LEFT, 10, PDF_MARGIN_RIGHT);

$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);

$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//set auto page breaks

$pdf->SetAutoPageBreak(FALSE);

$pdf->SetPrintHeader(false);
$pdf->SetPrintFooter(false);
//set image scale factor
include("../connect.php"); 
//$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings

$pdf->setLanguageArray($l);

// ---------------------------------------------------------



// set font

$count=0;

// add a page

	

	$hea = 'Header Information';



	//$pdf->writeHTML($hea, true, 0, true, 0);

	
$pdf->AddPage();
	$pdf->SetFont('helvetica', '', 9);
	
	$sn=1;
		//$bill_query = mysql_query("SELECT * FROM  `project` WHERE  id='$id'");
		//$bill_result = mysql_fetch_array($bill_query);
		
	
	$pkt11='<span style="text-align: center;"><strong><h1>School Franchise Management System<h1></strong><br></span>
	<p align="left"><strong></strong></p>';	
	$pkt11.='<table cellpadding="3" cellspacing="1" border="1" align="left" width="auto;">';
		$view = $_GET['view'];
		$user = $_SESSION['admin'];
		$admission = strtolower($user)."new_add_std";
		$parent = strtolower($user)."parent_details";
		$extra = strtolower($user)."extra_detail";
		$view_qry = mysql_query("select * from $admission where fno='$view'");
		while($row = mysql_fetch_array($view_qry))
		{
			$pkt11.='<tr><td colspan="2" style="text-align:center"><h1><u>Information of '. $row['fname'] .'</u></h1></td></tr>';
			
			$pkt11.='<tr><td width="400">Branch Name: '.$row['branch_name'].' </td>
    					<td width="355">Form No:'.$row['fno'].'</td></tr>';
			if($row['gender']=="Male")
    			$gen = "Male";
			else
				$gen = "Female";
			if($row['addmission_type']== "fresher")
  				$ad_type = "Fresher";
			else
				$ad_type = "Transfer";
			$pkt11.='<tr><td>Full Name:'. $row['fname'].'</td><td>Date of Addmission:'.$row['doa'].' </td></tr>';
			$pkt11.='<tr><td>Gender:'.$gen.'</td><td>Date of Birth:'. $row['dob'].' </td>  </tr>';
			$pkt11.='<tr><td height="53" colspan="2">Address:'. $row['address'].' </td> </tr>';
			$pkt11.='<tr><td>State:'. $row['state'].' </td><td>City:'. $row['city'].' </td></tr>';
			$pkt11.='<tr><td>Pincode:'. $row['pincode'].' </td> <td>Mobile:'. $row['mob'].' </td></tr>';
			$pkt11.='<tr><td colspan="2">Addmission Type:'.$ad_type.'</td></tr>';
			}
		
		$view_qry = mysql_query("select * from $parent where fno='$view'");
		while($row = mysql_fetch_array($view_qry))
		{
			$pkt11.='<tr><td colspan="2"></td></tr><tr><td style="text-align:center" colspan="2"><h1><b><u>Parent Details</u></b></h1></td></tr>';
			$pkt11.='<tr><td>Father Name:'. $row['pname'].' </td> <td>&nbsp;</td></tr>';
			$pkt11.='<tr><td>Occupation:'. $row['poccup'].' </td><td>Qualification:'. $row['edu_quali'].' </td> </tr>';
			$pkt11.='<tr><td>Mobile No:'. $row['pmob'].'</td><td>Email:'. $row['email'].' </td></tr>';
			}

		$view_qry = mysql_query("select * from $extra where addmission_form='$view'",$link);
		while($row = mysql_fetch_array($view_qry))
		{
			$pkt11.='<tr><td colspan="2"></td></tr><tr><td style="text-align:center" colspan="2"><h1><b><u>Extra Information</u></b></h1></td></tr>';
			$pkt11.='<tr><td>Do you want tranport facility:'. $row['transport_facility'].'</td><td>&nbsp;</td></tr>';
			$pkt11.='<tr><td>Medical history:'. $row['medical_history'].'</td><td>Student Hobbies:'.$row['child_hobbies'].'</td> </tr>';
			}
	$pkt11.= '</table></html>';
	$pdf->writeHTML($pkt11, true, 0, true, 0);
	
	$pdf->Ln(5);

	$pdf->SetFont('times', '', 10);


    
	

	
	

	$pdf->Output('inactive_school_report.pdf', 'I');
	
	
	

	

	//============================================================+



	// END OF FILE                                                



	//============================================================+

