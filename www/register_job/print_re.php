<?php
ob_start();
session_start();
include "admin/connectDb.php"; 
$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
mysqli_set_charset($conn, "utf8");
error_reporting(~E_NOTICE);
$thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม"); 

$strSQL = "SELECT *, club.club_id as clubid, club.prov_id as clubpro FROM register_work 
	inner join club_work on club_work.work_id = register_work.work_id
	inner join club on club.club_id = club_work.club_id
	inner join member on member.mem_id = register_work.mem_id
	inner join titlename on titlename.title_id = member.title_id
	inner join department on department.dep_id = member.dep_id
	inner join saka on saka.saka_id = club_work.saka_id
	inner join provinces on provinces.prov_id = member.prov_id
	WHERE register_work.re_id = '".$_GET[re_id]."' ";
$stmt  = mysqli_query($conn,$strSQL);
$row = mysqli_fetch_array($stmt);

$sql_prov = "SELECT * FROM provinces where prov_id = '".$row[clubpro]."' ";
$stm_prov = mysqli_query($conn,$sql_prov);
$row_prov = mysqli_fetch_array($stm_prov);

$strSQL_re = "SELECT * FROM report 
	inner join provinces on provinces.prov_id = report.prov_id
	where report.mem_id = '".$row[mem_id]."' ";
$stmt_re= mysqli_query($conn, $strSQL_re);
$row_re= mysqli_fetch_array($stmt_re);

$strSQL_off = "SELECT * FROM emp_office where office_id = '".$row[office_id]."' ";
$stmt_off = mysqli_query($conn, $strSQL_off);
$row_off = mysqli_fetch_array($stmt_off);

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
$pdf->Image('pdf/report.jpg',5,0,200,300); 

$pdf->SetFont('angsa','',14);
/*$pdf->SetY(60);
$pdf->SetX(110);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',date('d')),0,0,"L");
$pdf->SetX(120);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$thaimonth[date('m')-1]),0,0,"L");
$pdf->SetX(140);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',date('Y')+543),0,0,"L");*/

$pdf->SetY(82);
$pdf->SetX(90);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row['club_name']),0,0,"L");

$pdf->SetY(89);
$pdf->SetX(30);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row['club_office']),0,0,"L");
$pdf->SetX(150);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row['club_tum']),0,0,"L");

$pdf->SetY(96);
$pdf->SetX(45);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row['club_aum']),0,0,"L");
$pdf->SetX(90);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row_prov['prov_name']),0,0,"L");
$pdf->SetX(155);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row['club_zip']),0,0,"L");

$pdf->SetY(103);
$pdf->SetX(35);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row['club_tel']),0,0,"L");
$pdf->SetX(150);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row['club_email']),0,0,"L");

$pdf->SetY(117);
$pdf->SetX(100);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row['title_name'].$row['mem_name'].' '.$row['mem_last']),0,0,"L");

$pdf->SetY(124);
$pdf->SetX(40);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row['mem_code']),0,0,"L");
$pdf->SetX(80);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row['saka_name']),0,0,"L");
$pdf->SetX(150);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row['dep_name']),0,0,"L");

$pdf->SetY(131);
$pdf->SetX(110);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',date('d')),0,0,"L");
$pdf->SetX(140);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$thaimonth[date('m')-1]),0,0,"L");
$pdf->SetX(170);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',date('Y')+543),0,0,"L");


$pdf->SetY(152);
$pdf->SetX(33);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row_re['re_add']),0,0,"L");
$pdf->SetX(150);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row_re['re_tam']),0,0,"L");

$pdf->SetY(159);
$pdf->SetX(45);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row_re['re_aum']),0,0,"L");
$pdf->SetX(90);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row_re['prov_name']),0,0,"L");
$pdf->SetX(155);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row_re['re_zip']),0,0,"L");

$pdf->SetY(166);
$pdf->SetX(35);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row_re['re_mobile']),0,0,"L");
$pdf->SetX(150);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row['mem_email']),0,0,"L");


$pdf->SetY(182);
$pdf->SetX(50);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row_off['office_name'].' '.$row_off['office_last']),0,0,"L");
$pdf->SetX(150);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row_off['office_po']),0,0,"L");

$pdf->SetY(188);
$pdf->SetX(30);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row['club_office']),0,0,"L");
$pdf->SetX(150);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row['club_tum']),0,0,"L");

$pdf->SetY(196);
$pdf->SetX(45);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row['club_aum']),0,0,"L");
$pdf->SetX(90);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row_prov['prov_name']),0,0,"L");
$pdf->SetX(155);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row['club_zip']),0,0,"L");

$pdf->SetY(203);
$pdf->SetX(35);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row['club_tel']),0,0,"L");
$pdf->SetX(150);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row['club_email']),0,0,"L");


$pdf->SetY(231);
$pdf->SetX(40);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row['title_name'].$row['mem_name'].' '.$row['mem_last']),0,0,"L");

$pdf->SetY(245);
$pdf->SetX(40);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',date('d')),0,0,"L");
$pdf->SetX(50);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$thaimonth[date('m')-1]),0,0,"L");
$pdf->SetX(70);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',date('Y')+543),0,0,"L");


$pdf->Output(); //คำสั่งสร้าง file pdf
?>