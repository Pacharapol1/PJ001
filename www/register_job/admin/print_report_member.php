﻿<? 
@session_start();
include 'connectDb.php';
$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
	mysqli_set_charset($conn, "utf8");
	error_reporting(~E_NOTICE);
	if($_SESSION["full_name"] == ''){
?>
	<script>
		alert("กรุณาเข้าสู่ระบบ");
		window.location.href = "../index.php";
	</script>
<?	} ?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
     <meta charset="UTF-8" />
    <title><?=$_SESSION["title"];?></title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/css/theme.css" />
    <link rel="stylesheet" href="assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="assets/plugins/Font-Awesome/css/font-awesome.css" />
    <!--END GLOBAL STYLES -->

    <!-- PAGE LEVEL STYLES -->
    <link href="assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
<style type="text/css" media="print">
  @page { size: landscape; }
</style>
</head>
     <!-- END HEAD -->
     <!-- BEGIN BODY -->
<body onLoad="window.print()">
<br><br>
<?
	$strSQL_club = "SELECT * FROM club where club_id = '".$_GET[club_id]."' ";
	$stmt_club = mysqli_query($conn,$strSQL_club);
	$row_club = mysqli_fetch_array($stmt_club);
?>
 <div align="center">
 	<h2> รายงานข้อมูลสมาชิก</h2>
    <h3><?=$row_club[club_name];?></h3>
 </div>
<br><br>
  <table class="table table-striped table-bordered table-hover" id="dataTables-example2">
      <thead>
          <tr>
              <th style="text-align:center; width:5%">รหัส</th>
              <th style="text-align:center; width:12%">ชื่อ-นามสกุล</th>
              <th style="text-align:center; width:7%">เบอร์โทร</th>
              <th style="text-align:center; width:15%">คณะ</th>
              <th style="text-align:center; width:15%">สาขา</th>
              <th style="text-align:center; width:12%">สถานะ</th>
          </tr>
      </thead>
      <?
           $num=1;
           if($_GET[mem_status] != 'all'){
               $ss = " and member.mem_status = '".$_GET[mem_status]."' ";
           }else{
               $ss = " ";
           }
            $strSQL = "SELECT * FROM member 
              inner join titlename on titlename.title_id = member.title_id
              inner join department on department.dep_id = member.dep_id
              inner join saka on saka.saka_id = member.saka_id
              inner join club on club.club_id = member.club_id
              where club.club_id = '".$_GET[club_id]."' $ss ";
            $stmt  = mysqli_query($conn,$strSQL);
            while($row = mysqli_fetch_array($stmt)){
      ?>
          <tr>
            <td style="text-align:center;"><?=$row[mem_id];?></td>
            <td><?=$row[title_name];?><?=$row[mem_name];?></td>
            <td style="text-align:center;"><?=$row[mem_mobile];?></td>
            <td><?=$row[dep_name];?></td>
            <td><?=$row[saka_name];?></td>
            <td style="text-align:center;">
              <?
                  if($row[mem_status] == 'W'){
                      echo '<font color="#FF6600">รอชำระเงิน</font>';
                  }else if($row[mem_status] == 'P'){
                      echo '<font color="#FF6600">รอตรวจสอบยอดชำระ</font>';
                  }else if($row[mem_status] == 'Y'){
                      echo '<font color="#009900">อนุมัติเป็นสมาชิก</font>';
                  }else if($row[mem_status] == 'Y'){
                      echo '<font color="#FF0000">ยกเลิก</font>';
                  }
              ?>
            </td>
          </tr>
       <? $num++; } ?>
      </tbody>
  </table>

</body>
     <!-- END BODY -->
</html>
