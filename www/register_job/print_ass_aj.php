<?php
ob_start();
session_start();
include "admin/connectDb.php"; 
$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
mysqli_set_charset($conn, "utf8");
error_reporting(~E_NOTICE);
$thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม"); 

$strSQL = "SELECT * FROM ass_aj 
	inner join register_work on register_work.re_id = ass_aj.re_id
	inner join club_work on club_work.work_id = register_work.work_id
	inner join club on club.club_id = club_work.club_id
	inner join member on member.mem_id = ass_aj.mem_id
	inner join titlename on titlename.title_id = member.title_id
	inner join department on department.dep_id = member.dep_id
	inner join saka on saka.saka_id = member.saka_id
	WHERE register_work.re_id = '".$_GET[re_id]."' and ass_aj.mem_id = '".$_GET[mem_id]."' and ass_aj.calendar_id = '".$_GET[calendar_id]."' ";
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
$pdf->Image('pdf/ass_aj1.jpg',15,0,180,290); 

$pdf->SetFont('angsa','',14);
$pdf->SetY(105);
$pdf->SetX(55);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row['title_name'].' '.$row['mem_name']),0,0,"L");
$pdf->SetX(150);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row['mem_code']),0,0,"L");

$pdf->SetY(112);
$pdf->SetX(35);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row['dep_name']),0,0,"L");
$pdf->SetX(120);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row['saka_name']),0,0,"L");

$pdf->SetY(119);
$pdf->SetX(50);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row['club_name']),0,0,"L");

$pdf->SetFont('angsa','B',16);
$strSQL_score = "SELECT * FROM ass_aj WHERE re_id = '".$row[re_id]."' and mem_id = '".$row[mem_id]."' and calendar_id = '".$_GET[calendar_id]."' ";
$stmt_score  = mysqli_query($conn,$strSQL_score);
while($row_score = mysqli_fetch_array($stmt_score)){
	if($row_score[ass_aj_item] == 1){
		$pdf->SetY(149);
		$pdf->SetX(180);
		$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row_score['ass_aj_score']),0,0,"L");
	}else if($row_score[ass_aj_item] == 2){
		$pdf->SetY(168);
		$pdf->SetX(180);
		$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row_score['ass_aj_score']),0,0,"L");
	}else if($row_score[ass_aj_item] == 3){
		$pdf->SetY(186);
		$pdf->SetX(180);
		$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row_score['ass_aj_score']),0,0,"L");
	}else if($row_score[ass_aj_item] == 4){
		$pdf->SetY(203);
		$pdf->SetX(180);
		$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row_score['ass_aj_score']),0,0,"L");
	}else if($row_score[ass_aj_item] == 5){
		$pdf->SetY(218);
		$pdf->SetX(180);
		$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row_score['ass_aj_score']),0,0,"L");
	}else if($row_score[ass_aj_item] == 6){
		$pdf->SetY(235);
		$pdf->SetX(180);
		$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row_score['ass_aj_score']),0,0,"L");
	}else if($row_score[ass_aj_item] == 7){
		$pdf->SetY(251);
		$pdf->SetX(180);
		$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row_score['ass_aj_score']),0,0,"L");
	}else if($row_score[ass_aj_item] == 8){
		$pdf->SetY(268);
		$pdf->SetX(180);
		$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row_score['ass_aj_score']),0,0,"L");
	}
}

$pdf->AddPage();//สร้างหน้ากระดาษใหม่
$pdf->SetMargins(6,5,5);//กำหนดขนาดขอบกระดาษ
$pdf->AddFont('angsa','','angsa.php');//กำหนดอักษรเป็น THSarabun
$pdf->AddFont('angsa','B','angsa Bold.php');//กำหนดอักษรเป็น THSarabun ตัวหน้า
$pdf->Image('pdf/ass_aj2.jpg',15,0,180,297); 

$pdf->SetFont('angsa','B',16);
$strSQL_score = "SELECT * FROM ass_aj WHERE re_id = '".$row[re_id]."' and mem_id = '".$row[mem_id]."' and calendar_id = '".$_GET[calendar_id]."' ";
$stmt_score  = mysqli_query($conn,$strSQL_score);
while($row_score = mysqli_fetch_array($stmt_score)){
	$ass_aj_score += $row_score[ass_aj_score];
	$ass_aj_detail = $row_score[ass_aj_detail];
	if($row_score[ass_aj_item] == 9){
		$pdf->SetY(32);
		$pdf->SetX(182);
		$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row_score['ass_aj_score']),0,0,"L");
	}else if($row_score[ass_aj_item] == 10){
		$pdf->SetY(52);
		$pdf->SetX(182);
		$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row_score['ass_aj_score']),0,0,"L");
	}else if($row_score[ass_aj_item] == 11){
		$pdf->SetY(73);
		$pdf->SetX(182);
		$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row_score['ass_aj_score']),0,0,"L");
	}else if($row_score[ass_aj_item] == 12){
		$pdf->SetY(95);
		$pdf->SetX(182);
		$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row_score['ass_aj_score']),0,0,"L");
	}else if($row_score[ass_aj_item] == 13){
		$pdf->SetY(116);
		$pdf->SetX(182);
		$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row_score['ass_aj_score']),0,0,"L");
	}else if($row_score[ass_aj_item] == 14){
		$pdf->SetY(137);
		$pdf->SetX(182);
		$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row_score['ass_aj_score']),0,0,"L");
	}
}

$pdf->SetY(159);
$pdf->SetX(182);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$ass_aj_score),0,0,"L");

$pdf->SetFont('angsa','',14);
$pdf->SetY(183);
$pdf->SetX(25);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$ass_aj_detail),0,0,"L");
	
$pdf->Output(); //คำสั่งสร้าง file pdf
?>