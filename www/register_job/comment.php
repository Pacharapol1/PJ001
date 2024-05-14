<?
	session_start();
	include "admin/connectDb.php"; 
	$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
	mysqli_set_charset($conn, "utf8");
	error_reporting(~E_NOTICE);
?>
<!DOCTYPE HTML>
<html>
<head>
<title>การจัดการเอกสารสำนักงานคณบดี คณะบริหารธุรกิจและอุตสาหกรรมบริการ</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Learn Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap-3.1.1.min.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/jquery.countdown.css" />
<!----font-Awesome----->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!----font-Awesome----->
<script>
$(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');       
        }
    );
});
</script>
<link href="css/fontcss.css" rel='stylesheet' type='text/css' />
</head>
<body>
<? include 'menu.php'; ?>
<!-- banner -->
<div class="courses_banner">
  	<div class="container">
  		<h3>กระดานถาม-ตอบ</h3>
  		<div class="breadcrumb1">
            <ul>
                <li class="icon6"><a href="index.php">หน้าหลัก</a></li>
                <li class="current-page">กระดานถาม-ตอบ</li>
            </ul>
        </div>
        <br>
  	</div>
  </div>
    <!-- //banner -->
	<div class="courses_box1">
	   <div class="container">
		<div class="col-md-12 detail">
			<h1>กระดานถาม-ตอบ</h1>
			<div align="left"><a href="form_webboard.php" class="btn btn-success"><i class="icon-plus-sign"></i> <span>ตั้งหัวข้อ</span></a></div>
            <br><br>
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
              <thead>
                  <tr>
                       <th style="width: 8%; text-align: center;">ลำดับ</th>
                       <th style="width: 42%; text-align: center;">หัวข้อคำถาม</th>
                       <th style="width: 10%; text-align: center;">อ่าน</th>
                       <th style="width: 10%; text-align: center;">ตอบ</th>
                       <th style="width: 20%; text-align: center;">วันที่ตั้งคำถาม</th>
                      <!-- <th style="width: 10%; text-align: center;">ลบกระทู้</th>-->
                  </tr>
              </thead>
              <tbody>
              <?
                  if($_GET["Action"] == "Del")
                  {
                      $strSQL = "DELETE FROM questions WHERE id = '".$_GET["id"]."' ";
                      $stmt = mysqli_query($conn,$strSQL);

                      $strSQL = "DELETE FROM answers WHERE question_id = '".$_GET["id"]."' ";
                      $stmt = mysqli_query($conn,$strSQL);
                  }
              
                  $i=1;
                  $sql = "SELECT * FROM questions ORDER BY id DESC ";
                  $query = mysqli_query($conn,$sql);
                  while ($result = mysqli_fetch_assoc($query)){
              ?>
                  <tr class="odd gradeX">
                    <td style="text-align: center;"><?php echo $i; ?></td>
                   <td><a href="view_topic.php?id=<?php echo $result['id']; ?>"><?php echo $result['topic']; ?></a></td>
                   <td style="text-align: center;"><?php echo $result['view']; ?></td>
                   <td style="text-align: center;"><?php echo $result['reply']; ?></td>
                   <td style="text-align: center;"><?=date('d/m', strtotime($result[created]));?>/<?=date('Y', strtotime($result[created]))+543;?><br><?=date('H:i', strtotime($result[created]));?></td>
                   <!--<td style="text-align: center;"><a href="JavaScript:if(confirm('ยืนยันการลบกระทู้ ?')==true){window.location='<?=$_SERVER["PHP_SELF"];?>?Action=Del&id=<?=$result["id"];?>';}" class="btn btn-danger btn-sm"><i class="icon-remove"></i> ลบ</a></td>-->
                  </tr>
                 <? $i++; } ?>
              </tbody>
          </table>
		</div>
    </div>
 </div>
    <div class="footer">
    	<? include 'footer.php'; ?>
    </div>
<!-- FlexSlider -->
<link href="css/flexslider.css" rel='stylesheet' type='text/css' />
  <script defer src="js/jquery.flexslider.js"></script>
  <script type="text/javascript">
	$(function(){
	  SyntaxHighlighter.all();
	});
	$(window).load(function(){
	  $('.flexslider').flexslider({
		animation: "slide",
		start: function(slider){
		  $('body').removeClass('loading');
		}
	  });
	});
  </script>
<!-- FlexSlider -->
</body>
</html>	