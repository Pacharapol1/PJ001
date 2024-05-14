<?php
ob_start();
session_start();
include "admin/connectDb.php"; 
$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
mysqli_set_charset($conn, "utf8");
error_reporting(~E_NOTICE);
$thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม"); 

$strSQL = "SELECT * FROM ass_book 
	inner join book on book.book_id = ass_book.book_id
	inner join work_report on work_report.mem_id = book.mem_id
	inner join member on member.mem_id = book.mem_id
	inner join titlename on titlename.title_id = member.title_id
	inner join department on department.dep_id = member.dep_id
	inner join saka on saka.saka_id = member.saka_id
	WHERE ass_book.book_id = '".$_GET[book_id]."' ";
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
$pdf->Image('pdf/book.jpg',0,0,210,297); 

$pdf->SetFont('angsa','',14);
$pdf->SetY(30);
$pdf->SetX(45);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row['title_name'].' '.$row['mem_name']),0,0,"L");

$pdf->SetY(38);
$pdf->SetX(35);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row['saka_name']),0,0,"L");
$pdf->SetX(130);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row['mem_code']),0,0,"L");

$pdf->SetFont('angsa','B',16);
$strSQL_score = "SELECT * FROM ass_book WHERE book_id = '".$row[book_id]."' ";
$stmt_score  = mysqli_query($conn,$strSQL_score);
while($row_score = mysqli_fetch_array($stmt_score)){
	$ass_book_detail = $row_score[ass_book_detail];
	$ass_book_chk = $row_score[ass_book_chk];
	if($row_score[ass_book_item] == 1){
		$pdf->SetY(91);
		$pdf->SetX(170);
		$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row_score['ass_book_score']),0,0,"L");
	}else if($row_score[ass_book_item] == 2){
		$pdf->SetY(106);
		$pdf->SetX(170);
		$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row_score['ass_book_score']),0,0,"L");
	}else if($row_score[ass_book_item] == 3){
		$pdf->SetY(119);
		$pdf->SetX(170);
		$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row_score['ass_book_score']),0,0,"L");
	}
}

$strSQL_sum1 = "SELECT *, sum(ass_book_score) as sum1 FROM ass_book WHERE (ass_book_item >= 1 and ass_book_item <= 3) and book_id = '".$_GET[book_id]."' group by book_id ";
$stmt_sum1 = mysqli_query($conn,$strSQL_sum1);
$row_sum1 = mysqli_fetch_array($stmt_sum1);

$pdf->SetY(133);
$pdf->SetX(170);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$row_sum1['sum1']),0,0,"L");

$avg = number_format($row_sum1['sum1']/2,2);

$pdf->SetY(146);
$pdf->SetX(168);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$avg),0,0,"L");

$pdf->SetFont('angsa','',14);
$pdf->SetY(178);
$pdf->SetX(20);
$pdf->Cell(100,0,iconv('UTF-8','TIS-620',$ass_book_detail),0,0,"L");

if($ass_book_chk == 'Y'){
	$pdf->Image('pdf/check.png',20,210,10,10);
}else{
	$pdf->Image('pdf/check.png',100,210,10,10);
}

$pdf->Output(); //คำสั่งสร้าง file pdf
?>