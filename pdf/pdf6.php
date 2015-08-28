<?php
include("../connect.php"); 


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
	$pdf->SetFont('helvetica', '', 10);
	
	$sn=1;
		//$bill_query = mysql_query("SELECT * FROM  `project` WHERE  id='$id'");
		//$bill_result = mysql_fetch_array($bill_query);
		
	
	$pkt11='<span style="text-align: center;"><strong><h1>School Franchise Management System<h1></strong><br><h3><strong>Active School</strong></h3></span>
	<p align="left"><strong></strong></p>';	
	$pkt11.='<table border="1" align:left; width="870px;">
		<tr><th style="width:30px;">Sr.No</th><th>Center Code</th><th style="width:50px;">Branch Name</th><th style="width:60px;">Branch Address</th><th style="width:40px;">Branch Code</th><th>Head Name</th><th style="width:40px;">Phone No</th></tr>';
		$q1=mysql_query("select * from branch");
		while($data1=mysql_fetch_assoc($q1))
		{
		
			$pkt11.='<tr><td>'.$sn++.'</td><td>'.$data1['code'].'</td>';
			$pkt11.='<td>'.$data1['bname'].'</td>';
			$pkt11.='<td>'.$data1['baddress'].'</td><td>'.$data1['bcode'].'</td><td>'.$data1['bheadname'].'</td><td>'.$data1['bphone'].'</td></tr>';
		}
	$pkt11.= '</table>';

	$pkt11.='<span style="text-align: center;"><br><h3><strong>Inactive School</strong></h3></span>
	<p align="left"><strong></strong></p>';	
	$pkt11.='<table border="1" align:left; width="870px;">
		<tr><th style="width:30px;">Sr.No</th><th>Center Code</th><th style="width:50px;">Branch Name</th><th style="width:60px;">Branch Address</th><th style="width:40px;">Branch Code</th><th>Head Name</th><th style="width:40px;">Phone No</th></tr>';
		$q1=mysql_query("select * from disable_branch");
		while($data1=mysql_fetch_assoc($q1))
		{
		
			$pkt11.='<tr><td>'.$sn++.'</td><td>'.$data1['code'].'</td>';
			$pkt11.='<td>'.$data1['bname'].'</td>';
			$pkt11.='<td>'.$data1['baddress'].'</td><td>'.$data1['bcode'].'</td><td>'.$data1['bheadname'].'</td><td>'.$data1['bphone'].'</td></tr>';
		}
	$pkt11.= '</table></html>';


	$pdf->writeHTML($pkt11, true, 0, true, 0);
	
	$pdf->Ln(5);

	$pdf->SetFont('times', '', 10);

	

	
	

	$pdf->Output('active_school_report.pdf', 'I');
	
	
	

	

	//============================================================+



	// END OF FILE                                                



	//============================================================+

