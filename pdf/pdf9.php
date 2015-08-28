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
		
	
	$pkt11='<span style="text-align: center;"><strong><h1>School Franchise Management System<h1></strong><br><h3><strong>List of Students</strong></h3></span>
	<p align="left"><strong></strong></p>';	
	$pkt11.='<center><table border="0" width="auto;">
		<tr><th style="width:255px;" ></th><th style="width:30px;">Gr. No</th><th style="width:3px;">|</th><th style="width:250px;">Student Name</th></tr><hr />';
		$user = $_SESSION['admin'];
		$admission = strtolower($user)."new_add_std";
		$q1= mysql_query("select * from $admission where branch_name='$user'",$link);
		while($data1=mysql_fetch_assoc($q1))
		{
		
			$pkt11.='<tr><td></td><td>'.$data1['fno'].'</td><th>|</th><td>'.$data1['fname'].'</td>';
			
			$pkt11.='</tr>';
		}
	$pkt11.= '</table></center></html>';
	$pdf->writeHTML($pkt11, true, 0, true, 0);
	
	$pdf->Ln(5);

	$pdf->SetFont('times', '', 10);


    
	

	
	

	$pdf->Output('inactive_school_report.pdf', 'I');
	
	
	

	

	//============================================================+



	// END OF FILE                                                



	//============================================================+

