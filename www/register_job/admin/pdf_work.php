<?php
ob_start();
session_start();
include "connectDb.php"; 
$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
mysqli_set_charset($conn, "utf8");
error_reporting(~E_NOTICE);
$thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม"); 

$strSQL = "SELECT *, club.club_id as clubid FROM register_work 
	inner join club_work on club_work.work_id = register_work.work_id
	inner join club on club.club_id = club_work.club_id
	inner join member on member.mem_id = register_work.mem_id
	inner join titlename on titlename.title_id = member.title_id
	inner join department on department.dep_id = member.dep_id
	inner join saka on saka.saka_id = club_work.saka_id
	inner join provinces on provinces.prov_id = member.prov_id
	WHERE register_work.work_id = '".$_GET[work_id]."' ";
$stmt  = mysqli_query($conn,$strSQL);
$row = mysqli_fetch_array($stmt);

require('../fpdf.php'); //ดึงไฟล์การเขียน fpdf 
define('FPDF_FONTPATH','font/'); //กำหนดอักษร
$pdf=new FPDF(); //สร้าง FPDF
$pdf->SetAutoPageBreak(false);//กำหนดขอบกระดาษ
$pdf->AddPage();//สร้างหน้ากระดาษใหม่
$pdf->SetMargins(6,5,5);//กำหนดขนาดขอบกระดาษ
$pdf->AddFont('angsa','','angsa.php');
$pdf->AddFont('angsa','B','angsab.php');
$pdf->AddFont('angsa','I','angsai.php');
$pdf->AddFont('angsa','BI','angsaz.php');
$pdf->Image('../pdf/work1.jpg',15,10,180,297); 

$pdf->SetFont('angsa','',14);
$pdf->SetY(74);
$pdf->SetX(55);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row['club_name']),0,0,"L");

$pdf->SetY(82);
$pdf->SetX(35);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row['club_office']),0,0,"L");
$pdf->SetX(105);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row['club_tum']),0,0,"L");
$pdf->SetX(155);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row['club_aum']),0,0,"L");

$pdf->SetY(90);
$pdf->SetX(35);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row['prov_name']),0,0,"L");
$pdf->SetX(95);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row['club_zip']),0,0,"L");
$pdf->SetX(145);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row['club_tel']),0,0,"L");

$pdf->SetY(97);
$pdf->SetX(125);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row['club_email']),0,0,"L");

if($row[saka_id] == '001'){
	$pdf->Image('../pdf/check.png',22,138,5,5);
	
	$pdf->SetY(142);
	$pdf->SetX(80);
	$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row['work_num']),0,0,"L");
	$pdf->SetX(125);
	$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row['work_name']),0,0,"L");
}else if($row[saka_id] == '002'){
	$pdf->Image('../pdf/check.png',22,153,5,5);
	
	$pdf->SetY(156);
	$pdf->SetX(85);
	$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row['work_num']),0,0,"L");
	$pdf->SetX(125);
	$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row['work_name']),0,0,"L");
}else{
	$pdf->Image('../pdf/check.png',22,168,5,5);
	
	$pdf->SetY(171);
	$pdf->SetX(107);
	$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row['work_num']),0,0,"L");
	$pdf->SetX(140);
	$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row['work_name']),0,0,"L");
}

$pdf->SetY(193);
$pdf->SetX(45);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row['club_contact']),0,0,"L");

$pdf->SetY(208);
$pdf->SetX(40);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row['club_tel']),0,0,"L");
$pdf->SetX(125);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row['club_email']),0,0,"L");

$pdf->SetY(228);
$pdf->SetX(45);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row['saka_name']),0,0,"L");
$pdf->SetX(155);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row['work_num']),0,0,"L");

$pdf->SetY(257);
$pdf->SetX(100);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row['work_detail']),0,0,"L");

$pdf->AddPage();//สร้างหน้ากระดาษใหม่
$pdf->SetMargins(6,5,5);//กำหนดขนาดขอบกระดาษ
$pdf->AddFont('angsa','','angsa.php');//กำหนดอักษรเป็น THSarabun
$pdf->AddFont('angsa','B','angsa Bold.php');//กำหนดอักษรเป็น THSarabun ตัวหน้า
$pdf->Image('../pdf/work2.jpg',15,0,180,297); 

$strSQL_office = "SELECT * FROM emp_office 
	inner join titlename on titlename.title_id = emp_office.title_id
	inner join club on club.club_id = emp_office.club_id
	where club.club_id = '".$row[clubid]."' ";
$stmt_office = mysqli_query($conn,$strSQL_office);
$row_office = mysqli_fetch_array($stmt_office);

$pdf->SetY(180);
$pdf->SetX(50);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row_office['title_name'].$row_office['office_name'].' '.$row_office['office_last']),0,0,"L");
$pdf->SetX(140);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row_office['office_po']),0,0,"L");

$pdf->SetY(188);
$pdf->SetX(130);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row_office['office_tel']),0,0,"L");

$pdf->SetY(263);
$pdf->SetX(117);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row[club_contact]),0,0,"L");

$pdf->SetY(286);
$pdf->SetX(117);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',date('d')),0,0,"L");
$pdf->SetX(130);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$thaimonth[date('m')-1]),0,0,"L");
$pdf->SetX(145);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',date('Y')+543),0,0,"L");
	
$pdf->Output(); //คำสั่งสร้าง file pdf
?>