
<div class="form-group">
<a href="profile.php"><button class="btn" style="width:100%; background-color:#8c0005; color:#FFF; text-align:left;" ><i class="fa fa-user"></i> ข้อมูลส่วนตัว</button></a>
<div style="height:5px;"></div>
<a href="list_register.php?mem_id=<?=$_SESSION[mem_id];?>"><button class="btn" style="width:100%; background-color:#8c0005; color:#FFF; text-align:left;" ><i class="fa fa-edit"></i> ข้อมูลการสมัครสหกิจศึกษา</button></a>
<div style="height:5px;"></div>
<?
  $strSQL_re = "SELECT * FROM register_work where mem_id = '".$_SESSION[mem_id]."' and re_status = 'Y' ";
  $stmt_re = mysqli_query($conn,$strSQL_re);
  $numrow_re = mysqli_num_rows($stmt_re);
  $row_re = mysqli_fetch_array($stmt_re);
if($numrow_re != ''){
?>
<a href="list_today.php"><button class="btn" style="width:100%; background-color:#8c0005; color:#FFF; text-align:left;" ><i class="fa fa-pencil"></i> บันทึกรายงานประจำวัน</button></a>
<div style="height:5px;"></div>
<?
  $strSQL_about = "SELECT * FROM about where mem_id = '".$_SESSION[mem_id]."' and about_status = 'Y' ";
  $stmt_about = mysqli_query($conn,$strSQL_about);
  $numrow_about = mysqli_num_rows($stmt_re);
  $row_about = mysqli_fetch_array($stmt_about);
  if($numrow_about != ''){
?>
<a href="list_book.php"><button class="btn" style="width:100%; background-color:#8c0005; color:#FFF; text-align:left;" ><i class="fa fa-bookmark"></i> รูปเล่มสมบูรณ์</button></a>
<div style="height:5px;"></div>
<?
  }
}
?>

</div>