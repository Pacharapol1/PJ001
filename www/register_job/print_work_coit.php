<?php
ob_start();
session_start();
include "admin/connectDb.php"; 
$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
mysqli_set_charset($conn, "utf8");
error_reporting(~E_NOTICE);
$thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม"); 

$strSQL = "SELECT *, work_report.work_detail as wdetail FROM work_report 
	inner join register_work on register_work.re_id = work_report.re_id
	inner join club_work on club_work.work_id = register_work.work_id
	inner join club on club.club_id = club_work.club_id
	inner join member on member.mem_id = work_report.mem_id
	inner join titlename on titlename.title_id = member.title_id
	inner join department on department.dep_id = member.dep_id
	inner join saka on saka.saka_id = member.saka_id
	WHERE work_report.workre_id = '".$_GET[workre_id]."' ";
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
$pdf->Image('pdf/work_report1.jpg',15,10,180,297); 

$pdf->SetFont('angsa','',14);
$pdf->SetY(93);
$pdf->SetX(55);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row['title_name'].$row['mem_name'].' '.$row['mem_last']),0,0,"L");
$pdf->SetX(150);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row['mem_code']),0,0,"L");

$pdf->SetY(102);
$pdf->SetX(30);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row['dep_name']),0,0,"L");
$pdf->SetX(120);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row['saka_name']),0,0,"L");

$pdf->SetY(110);
$pdf->SetX(100);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row['club_name']),0,0,"L");

$pdf->SetY(139);
$pdf->SetX(20);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row['work_title']),0,0,"L");

$pdf->SetY(172);
$pdf->SetX(20);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row['wdetail']),0,0,"L");

$pdf->SetY(208);
$pdf->SetX(20);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row['work_step']),0,0,"L");

$pdf->SetY(266);
$pdf->SetX(85);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row['title_name'].$row['mem_name'].' '.$row['mem_last']),0,0,"L");

$pdf->SetY(279);
$pdf->SetX(87);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',date('d')),0,0,"L");
$pdf->SetX(98);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$thaimonth[date('m')-1]),0,0,"L");
$pdf->SetX(115);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',date('Y')+543),0,0,"L");

$pdf->AddPage();//สร้างหน้ากระดาษใหม่
$pdf->SetMargins(6,5,5);//กำหนดขนาดขอบกระดาษ
$pdf->AddFont('angsa','','angsa.php');//กำหนดอักษรเป็น THSarabun
$pdf->AddFont('angsa','B','angsa Bold.php');//กำหนดอักษรเป็น THSarabun ตัวหน้า
$pdf->Image('pdf/work_report2.jpg',15,0,180,297); 
	
$pdf->Output(); //คำสั่งสร้าง file pdf
?>