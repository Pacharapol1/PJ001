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
$pdf->Image('../pdf/send.jpg',5,10,170,280); 

$pdf->SetFont('angsa','',18);
$pdf->SetY(60);
$pdf->SetX(110);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',date('d')),0,0,"L");
$pdf->SetX(120);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$thaimonth[date('m')-1]),0,0,"L");
$pdf->SetX(140);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',date('Y')+543),0,0,"L");

$pdf->SetY(70);
$pdf->SetX(30);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620','ขอส่งตัว '.$row['title_name'].$row['mem_name'].' '.$row['mem_last']),0,0,"L");

$pdf->SetY(85);
$pdf->SetX(30);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row['club_name']),0,0,"L");

$pdf->SetY(100);
$pdf->SetX(30);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620','เนื่องด้วย '.$row['title_name'].$row['mem_name'].' '.$row['mem_last'].' ได้รับการคัดเลือกเข้าปฏิบัติงานกับ '.$row['club_name']),0,0,"L");


$pdf->Output(); //คำสั่งสร้าง file pdf
?>