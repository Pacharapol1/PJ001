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
<title>ระบบการจัดการงานสหกิจศึกษา</title>
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
  		<h3>การประกาศการสัมภาษณ์</h3>
  		<div class="breadcrumb1">
            <ul>
                <li class="icon6"><a href="index.php">หน้าหลัก</a></li>
                <li class="current-page">การประกาศการสัมภาษณ์</li>
            </ul>
        </div>
        <br>
  	</div>
  </div>
    <!-- //banner -->
	<div class="courses_box1">
	   <div class="container">
		<div class="col-md-12 detail">
			<h1>การประกาศการสัมภาษณ์</h1>
            <br><br>
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
              <thead>
                  <tr>
                      <th style="text-align:center; width:10%;">วันที่นัด</th>
                      <th style="text-align:center; width:20%;">บริษัท</th>
                      <th style="text-align:center; width:20%;">ชื่อ-นามสกุล</th>
                      <th style="text-align:center; width:20%;">สถานที่</th>
                  </tr>
              </thead>
              <tbody>
              <? $num=1;
				 if($_GET["Action"] == "Del")
				  {
					  $strSQL = "delete from interview WHERE interview_id = '".$_GET["interview_id"]."' ";
					  $stmt = mysqli_query($conn,$strSQL);
				  }
			  
				  $num=1;
				  $strSQL = "SELECT * FROM interview 
					inner join register_work on register_work.re_id = interview.re_id
					inner join member on member.mem_id = register_work.mem_id
					inner join titlename on titlename.title_id = member.title_id
					inner join club_work on club_work.work_id = register_work.work_id
					inner join club on club.club_id = club_work.club_id
					where interview.interview_id != '".$_GET[interview_id]."' order by interview_date DESC ";
				  
				  $stmt  = mysqli_query($conn,$strSQL);
				  while($row = mysqli_fetch_array($stmt)){
			?>
				<tr>
				  <td style="text-align:center;"><?=date('d/m', strtotime($row[interview_date]));?>/<?=date('Y', strtotime($row[interview_date]))+543;?><br><?=date('H:i', strtotime($row[interview_time]));?> น.</td>
				  <td><?=$row[club_name];?><br>ตำแหน่ง: <?=$row[work_name];?></td>
				  <td><?=$row[title_name];?><?=$row[mem_name];?> <?=$row[mem_last];?></td>
				  <td><?=$row[interview_place];?></td>
				</tr>
			 <? $num++; } ?>
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