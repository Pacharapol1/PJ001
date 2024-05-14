<?php
ob_start();
session_start();
include "admin/connectDb.php"; 
$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
mysqli_set_charset($conn, "utf8");
error_reporting(~E_NOTICE);
$thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม"); 

$strSQL = "SELECT * FROM ass_office 
	inner join register_work on register_work.re_id = ass_office.re_id
	inner join club_work on club_work.work_id = register_work.work_id
	inner join club on club.club_id = club_work.club_id
	inner join member on member.mem_id = ass_office.mem_id
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
$pdf->Image('pdf/ass_office1.jpg',15,0,180,290); 

$pdf->SetFont('angsa','',14);
$pdf->SetY(126);
$pdf->SetX(65);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row['title_name'].' '.$row['mem_name']),0,0,"L");
$pdf->SetX(150);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row['mem_code']),0,0,"L");

$pdf->SetY(133);
$pdf->SetX(35);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row['dep_name']),0,0,"L");
$pdf->SetX(120);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row['saka_name']),0,0,"L");

$pdf->SetY(140);
$pdf->SetX(60);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row['club_contact']),0,0,"L");

$pdf->SetFont('angsa','B',16);
$strSQL_score = "SELECT * FROM ass_office WHERE re_id = '".$row[re_id]."' ";
$stmt_score  = mysqli_query($conn,$strSQL_score);
while($row_score = mysqli_fetch_array($stmt_score)){
	if($row_score[ass_office_item] == 1){
		$pdf->SetY(173);
		$pdf->SetX(178);
		$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row_score['ass_office_score']),0,0,"L");
	}else if($row_score[ass_office_item] == 2){
		$pdf->SetY(195);
		$pdf->SetX(178);
		$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row_score['ass_office_score']),0,0,"L");
	}else if($row_score[ass_office_item] == 3){
		$pdf->SetY(232);
		$pdf->SetX(178);
		$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row_score['ass_office_score']),0,0,"L");
	}else if($row_score[ass_office_item] == 4){
		$pdf->SetY(251);
		$pdf->SetX(178);
		$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row_score['ass_office_score']),0,0,"L");
	}else if($row_score[ass_office_item] == 5){
		$pdf->SetY(270);
		$pdf->SetX(178);
		$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row_score['ass_office_score']),0,0,"L");
	}
}

$pdf->AddPage();//สร้างหน้ากระดาษใหม่
$pdf->SetMargins(6,5,5);//กำหนดขนาดขอบกระดาษ
$pdf->AddFont('angsa','','angsa.php');//กำหนดอักษรเป็น THSarabun
$pdf->AddFont('angsa','B','angsa Bold.php');//กำหนดอักษรเป็น THSarabun ตัวหน้า
$pdf->Image('pdf/ass_office2.jpg',15,0,180,297); 

$pdf->SetFont('angsa','B',16);
$strSQL_score = "SELECT * FROM ass_office WHERE re_id = '".$row[re_id]."' ";
$stmt_score  = mysqli_query($conn,$strSQL_score);
while($row_score = mysqli_fetch_array($stmt_score)){
	if($row_score[ass_office_item] == 6){
		$pdf->SetY(30);
		$pdf->SetX(182);
		$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row_score['ass_office_score']),0,0,"L");
	}else if($row_score[ass_office_item] == 7){
		$pdf->SetY(52);
		$pdf->SetX(182);
		$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row_score['ass_office_score']),0,0,"L");
	}else if($row_score[ass_office_item] == 8){
		$pdf->SetY(74);
		$pdf->SetX(182);
		$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row_score['ass_office_score']),0,0,"L");
	}else if($row_score[ass_office_item] == 9){
		$pdf->SetY(103);
		$pdf->SetX(182);
		$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row_score['ass_office_score']),0,0,"L");
	}else if($row_score[ass_office_item] == 10){
		$pdf->SetY(146);
		$pdf->SetX(182);
		$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row_score['ass_office_score']),0,0,"L");
	}else if($row_score[ass_office_item] == 11){
		$pdf->SetY(175);
		$pdf->SetX(182);
		$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row_score['ass_office_score']),0,0,"L");
	}else if($row_score[ass_office_item] == 12){
		$pdf->SetY(196);
		$pdf->SetX(182);
		$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row_score['ass_office_score']),0,0,"L");
	}else if($row_score[ass_office_item] == 13){
		$pdf->SetY(226);
		$pdf->SetX(182);
		$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row_score['ass_office_score']),0,0,"L");
	}
}

$pdf->AddPage();//สร้างหน้ากระดาษใหม่
$pdf->SetMargins(6,5,5);//กำหนดขนาดขอบกระดาษ
$pdf->AddFont('angsa','','angsa.php');//กำหนดอักษรเป็น THSarabun
$pdf->AddFont('angsa','B','angsa Bold.php');//กำหนดอักษรเป็น THSarabun ตัวหน้า
$pdf->Image('pdf/ass_office3.jpg',15,0,180,297); 

$pdf->SetFont('angsa','B',16);
$strSQL_score = "SELECT * FROM ass_office WHERE re_id = '".$row[re_id]."' ";
$stmt_score  = mysqli_query($conn,$strSQL_score);
while($row_score = mysqli_fetch_array($stmt_score)){
	$sum_score += $row_score['ass_office_score'];
	if($row_score[ass_office_item] == 14){
		$pdf->SetY(40);
		$pdf->SetX(180);
		$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row_score['ass_office_score']),0,0,"L");
	}else if($row_score[ass_office_item] == 15){
		$pdf->SetY(62);
		$pdf->SetX(180);
		$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row_score['ass_office_score']),0,0,"L");
	}else if($row_score[ass_office_item] == 16){
		$pdf->SetY(82);
		$pdf->SetX(180);
		$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row_score['ass_office_score']),0,0,"L");
	}else if($row_score[ass_office_item] == 17){
		$pdf->SetY(118);
		$pdf->SetX(180);
		$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row_score['ass_office_score']),0,0,"L");
	}else if($row_score[ass_office_item] == 18){
		$ass_office_score_strength = $row_score['ass_office_score_strength'];
		$ass_office_score_need = $row_score['ass_office_score_need'];
		$ass_office_score_detail = $row_score['ass_office_score_detail'];
		$ass_office_score_chk = $row_score['ass_office_score_chk'];
	}
}

$pdf->SetY(134);
$pdf->SetX(178);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$sum_score),0,0,"L");


$pdf->SetFont('angsa','',14);
$pdf->SetY(172);
$pdf->SetX(25);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$ass_office_score_strength),0,0,"L");
$pdf->SetX(110);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$ass_office_score_need),0,0,"L");

if($ass_office_score_chk == 'Y'){
	$pdf->SetFont('angsa','B',90);
	$pdf->SetY(213);
	$pdf->SetX(31);
	$pdf->Cell(100,0,iconv('UTF-8','TIS-620','.'),0,0,"L");
}else if($ass_office_score_chk == 'N'){
	$pdf->SetFont('angsa','B',90);
	$pdf->SetY(213);
	$pdf->SetX(127);
	$pdf->Cell(100,0,iconv('UTF-8','TIS-620','.'),0,0,"L");
}

$pdf->SetFont('angsa','',14);
$pdf->SetY(238);
$pdf->SetX(25);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$ass_office_score_detail),0,0,"L");


/*$pdf->SetY(279);
$pdf->SetX(87);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',date('d')),0,0,"L");
$pdf->SetX(98);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$thaimonth[date('m')-1]),0,0,"L");
$pdf->SetX(115);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',date('Y')+543),0,0,"L");*/


	
$pdf->Output(); //คำสั่งสร้าง file pdf
?>