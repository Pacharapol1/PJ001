<?php
ob_start();
session_start();
include "admin/connectDb.php"; 
$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
mysqli_set_charset($conn, "utf8");
error_reporting(~E_NOTICE);
$thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม"); 

$strSQL = "SELECT * FROM ass_about 
	inner join about on about.about_id = ass_about.about_id
	inner join work_report on work_report.mem_id = about.mem_id
	inner join member on member.mem_id = about.mem_id
	inner join titlename on titlename.title_id = member.title_id
	inner join department on department.dep_id = member.dep_id
	inner join saka on saka.saka_id = member.saka_id
	WHERE ass_about.about_id = '".$_GET[about_id]."' ";
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
$pdf->Image('pdf/about.jpg',0,0,210,297); 

$pdf->SetFont('angsa','',14);
$pdf->SetY(30);
$pdf->SetX(45);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row['title_name'].$row['mem_name'].' '.$row['mem_last']),0,0,"L");

$pdf->SetY(37);
$pdf->SetX(35);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row['work_title']),0,0,"L");

$pdf->SetFont('angsa','B',16);
$strSQL_score = "SELECT * FROM ass_about WHERE about_id = '".$row[about_id]."' ";
$stmt_score  = mysqli_query($conn,$strSQL_score);
while($row_score = mysqli_fetch_array($stmt_score)){
	$ass_about_detail = $row_score[ass_about_detail];
	if($row_score[ass_about_item] == 1){
		$pdf->SetY(65);
		$pdf->SetX(188);
		$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row_score['ass_about_score']),0,0,"L");
	}else if($row_score[ass_about_item] == 2){
		$pdf->SetY(73);
		$pdf->SetX(188);
		$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row_score['ass_about_score']),0,0,"L");
	}else if($row_score[ass_about_item] == 3){
		$pdf->SetY(82);
		$pdf->SetX(188);
		$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row_score['ass_about_score']),0,0,"L");
	}else if($row_score[ass_about_item] == 4){
		$pdf->SetY(117);
		$pdf->SetX(188);
		$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row_score['ass_about_score']),0,0,"L");
	}else if($row_score[ass_about_item] == 5){
		$pdf->SetY(125);
		$pdf->SetX(188);
		$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row_score['ass_about_score']),0,0,"L");
	}else if($row_score[ass_about_item] == 6){
		$pdf->SetY(132);
		$pdf->SetX(188);
		$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row_score['ass_about_score']),0,0,"L");
	}else if($row_score[ass_about_item] == 7){
		$pdf->SetY(141);
		$pdf->SetX(188);
		$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row_score['ass_about_score']),0,0,"L");
	}else if($row_score[ass_about_item] == 8){
		$pdf->SetY(150);
		$pdf->SetX(188);
		$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row_score['ass_about_score']),0,0,"L");
	}else if($row_score[ass_about_item] == 9){
		$pdf->SetY(185);
		$pdf->SetX(188);
		$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row_score['ass_about_score']),0,0,"L");
	}else if($row_score[ass_about_item] == 10){
		$pdf->SetY(194);
		$pdf->SetX(188);
		$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row_score['ass_about_score']),0,0,"L");
	}else if($row_score[ass_about_item] == 11){
		$pdf->SetY(201);
		$pdf->SetX(188);
		$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row_score['ass_about_score']),0,0,"L");
	}else if($row_score[ass_about_item] == 12){
		$pdf->SetY(209);
		$pdf->SetX(188);
		$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row_score['ass_about_score']),0,0,"L");
	}
}

$strSQL_sum1 = "SELECT sum(ass_about_score) as sum1 FROM ass_about WHERE (ass_about_item >= 1 and ass_about_item <= 3) and about_id = '".$_GET[about_id]."' group by about_id ";
$stmt_sum1 = mysqli_query($conn,$strSQL_sum1);
$row_sum1 = mysqli_fetch_array($stmt_sum1);

$pdf->SetY(89);
$pdf->SetX(187);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row_sum1['sum1']),0,0,"L");

$strSQL_sum2 = "SELECT *, sum(ass_about_score) as sum2 FROM ass_about WHERE (ass_about_item >= 4 and ass_about_item <= 8) and about_id = '".$_GET[about_id]."' group by about_id ";
$stmt_sum2 = mysqli_query($conn,$strSQL_sum2);
$row_sum2 = mysqli_fetch_array($stmt_sum2);

$pdf->SetY(158);
$pdf->SetX(187);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row_sum2['sum2']),0,0,"L");

$strSQL_sum3 = "SELECT sum(ass_about_score) as sum3 FROM ass_about WHERE (ass_about_item >= 9 and ass_about_item <= 12) and about_id = '".$_GET[about_id]."' group by about_id ";
$stmt_sum3 = mysqli_query($conn,$strSQL_sum3);
$row_sum3 = mysqli_fetch_array($stmt_sum3);

$pdf->SetY(217);
$pdf->SetX(187);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row_sum3['sum3']),0,0,"L");

$pdf->SetFont('angsa','',14);
$pdf->SetY(232);
$pdf->SetX(20);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$ass_about_detail),0,0,"L");


$strSQL_emp = "SELECT * FROM employee 
	inner join titlename on titlename.title_id = employee.title_id
	WHERE employee.emp_id = '".$row[emp_id]."'";
$stmt_emp = mysqli_query($conn,$strSQL_emp);
$row_emp = mysqli_fetch_array($stmt_emp);

$pdf->SetFont('angsa','',14);
$pdf->SetY(276);
$pdf->SetX(150);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row_emp['title_name'].$row_emp['emp_name'].' '.$row_emp['emp_surname']),0,0,"L");

$pdf->SetFont('angsa','',14);
$pdf->SetY(283);
$pdf->SetX(150);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',date('d/m/Y', strtotime($row['ass_about_date']))),0,0,"L");

$pdf->Output(); //คำสั่งสร้าง file pdf
?>