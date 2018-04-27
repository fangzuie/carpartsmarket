<?php
date_default_timezone_set('Asia/Bangkok');
  $con = mysqli_connect("localhost","root","","carparts");
  mysqli_set_charset($con, "utf8");

	require('include\fpdf17\fpdf.php');

  define('FPDF_FONTPATH','include/fpdf17/font/');

  class PDF extends FPDF
	{
    function Header(){
			$this->AddFont('angsa','','angsa.php');
			$this->SetFont('angsa','',13);
	 		$this->Cell(0,0,iconv( 'UTF-8','TIS-620','หน้าที่ '.$this->PageNo()),0,1,"R");
			$this->Ln(9);
		}

		function Footer(){
			$this->AddFont('angsa','','angsa.php');
			$this->SetFont('angsa','',13);
			$this->SetY(-15);
			$this->Cell(0,0,iconv( 'UTF-8','TIS-620','วันที่ออกรายงาน : '.date("Y-m-d H:i:s")),0,1,"R");
		}

	}

	$pdf=new PDF();
	$pdf->SetMargins( 5,5,5 );
	$pdf->AddPage();
	$pdf->AddFont('angsa','','angsa.php');
	$pdf->SetFont('angsa','',17);
  $pdf->Ln(0);
  $pdf->Cell(0,0,iconv( 'UTF-8','TIS-620','รายงานเบิกเงินยูสเซอร์'),0,1,"L");
  $pdf->Ln(7);
  $pdf->Cell(0,0,iconv( 'UTF-8','TIS-620','ระบบตลาดอะไหล่รถยนต์ออนไลน์'),0,1,"L");
  $pdf->Ln(0);
  $pdf->Cell(65,0,iconv( 'UTF-8','TIS-620',''),0,1,"C");
  $pdf->Line(5,28,200,28);
  $pdf->Ln(12);
  $pdf->Cell(0,0,iconv( 'UTF-8','TIS-620','ตารางรายงานรายงานเบิกเงินยูสเซอร์'),0,1,"C");
  $pdf->Ln(6);
  $pdf->Cell(15,8,iconv( 'UTF-8','TIS-620',''),0,0,"C");
  $pdf->Cell(15,8,iconv( 'UTF-8','TIS-620','ลำดับที่'),1,0,"C");
  $pdf->Cell(25,8,iconv( 'UTF-8','TIS-620','รหัสรายงาน'),1,0,"C");
  $pdf->Cell(40,8,iconv( 'UTF-8','TIS-620','จำนวนเงิน'),1,0,"C");
  $pdf->Cell(40,8,iconv( 'UTF-8','TIS-620','สถานะการเบิกเงิน'),1,0,"C");
  $pdf->Cell(40,8,iconv( 'UTF-8','TIS-620','วันที่เบิกเงิน'),1,0,"C");
  $pdf->Ln(8);
  $pdtimestamp = '2017-11-14';
  $sql = "select * from cp_reportrequestmoney order by report_id desc";
  $query = mysqli_query($con, $sql);
  $s = 1;
  while ($result = mysqli_fetch_assoc($query)) {
  $pdf->Cell(15,8,iconv( 'UTF-8','TIS-620',''),0,0,"C");
  $pdf->Cell(15,8,iconv( 'UTF-8','TIS-620',''.$s),1,0,"C");
  $pdf->Cell(25,8,iconv( 'UTF-8','TIS-620',''.$result['report_id']),1,0,"C");
  $pdf->Cell(40,8,iconv( 'UTF-8','TIS-620',''.$result['report_money']),1,0,"C");
  $pdf->Cell(40,8,iconv( 'UTF-8','TIS-620',''.$result['report_status']),1,0,"C");
  $pdf->Cell(40,8,iconv( 'UTF-8','TIS-620',''.$result['report_date']),1,0,"C");
  $pdf->Ln(8);
  $s++;
}
	$pdf->Output();
?>
