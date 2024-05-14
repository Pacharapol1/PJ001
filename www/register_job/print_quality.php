<?php
ob_start();
session_start();
include "admin/connectDb.php"; 
$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
mysqli_set_charset($conn, "utf8");
error_reporting(~E_NOTICE);
$thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม"); 

$strSQL = "SELECT * FROM quality 
	inner join register_work on register_work.re_id = quality.re_id
	inner join club_work on club_work.work_id = register_work.work_id
	inner join club on club.club_id = club_work.club_id
	inner join member on member.mem_id = quality.mem_id
	inner join titlename on titlename.title_id = member.title_id
	inner join department on department.dep_id = member.dep_id
	inner join saka on saka.saka_id = member.saka_id
	WHERE register_work.re_id = '".$_GET[re_id]."' ";
$stmt  = mysqli_query($conn,$strSQL);
$row = mysqli_fetch_array($stmt);

require('fpdf.php'); //ดึงไฟล์การเขียน fpdf 
define('FPDF_FONTPATH','font/'); //กำหนดอักษร
$pdf=new FPDF(); //สร้าง FPDF
$pdf->SetAutoPageBreak(false);//กำหนดขอบกระดาษ
$pdf->AddPage();//สร้างหน้ากระดาษใหม่
$pdf->SetMargins(6,5,5);//กำหนดขนาดขอบกระดาษ
$pdf->AddFont('angsa','','angsa.php');
$pdf->AddFont('angsa','B','angsab.php');
$pdf->AddFont('angsa','I','angsai.php');
$pdf->AddFont('angsa','BI','angsaz.php');
$pdf->Image('pdf/quality.jpg',0,0,210,297); 

$pdf->SetFont('angsa','',14);
$n=1;
$rowY=145;
$strSQL_score = "SELECT * FROM quality WHERE re_id = '".$row[re_id]."' ";
$stmt_score  = mysqli_query($conn,$strSQL_score);
while($row_score = mysqli_fetch_array($stmt_score)){
	$quality_detail = $row_score[quality_detail];
	if($row_score[quality_item] == $n){
		if($row_score[quality_score] == 5){
			$pdf->Image('pdf/check.png',155,$rowY,5,5);
		}else if($row_score[quality_score] == 4){
			$pdf->Image('pdf/check.png',165,$rowY,5,5);
		}else if($row_score[quality_score] == 3){
			$pdf->Image('pdf/check.png',175,$rowY,5,5);
		}else if($row_score[quality_score] == 2){
			$pdf->Image('pdf/check.png',185,$rowY,5,5);
		}else if($row_score[quality_score] == 1){
			$pdf->Image('pdf/check.png',195,$rowY,5,5);
		}
	}
	if($n == 5 || $n == 12){
		$rowY = $rowY+14;
	}else{
		$rowY = $rowY+7;
	}
	$n++;
}

$pdf->SetFont('angsa','',14);
$pdf->SetY(278);
$pdf->SetX(20);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$quality_detail),0,0,"L");
	
$pdf->Output(); //คำสั่งสร้าง file pdf
?>