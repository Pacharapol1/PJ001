<?
	session_start();
	include "admin/connectDb.php"; 
	$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
	mysqli_set_charset($conn, "utf8");
	error_reporting(~E_NOTICE); 
if($_SESSION["full_name"] == ''){
?>
    <script>
        alert("กรุณาเข้าสู่ระบบ");
        window.location.href = "login.php";
    </script>
<?  } ?>
<!DOCTYPE HTML>
<html>
<head>
<title><?=$_SESSION["title"];?></title>
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
<link href="css/fontcss.css" rel='stylesheet' type='text/css' />

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
</head>
<body>
<? include 'menu.php'; ?>
<!-- banner -->
  <div class="courses_banner">
  	<div class="container">
  		<h3>โครงการที่เข้าร่วม</h3>
        <div class="breadcrumb1">
            <ul>
                <li class="icon6"><a href="index.php">หน้าหลัก</a></li>
                <li class="current-page">โครงการที่เข้าร่วม</li>
            </ul>
        </div>
  	</div>
   </div>
    <!-- //banner -->
	<div class="courses_box1">
	   <div class="container">
       <div class="col-md-3">
			<div class="courses_box1-left">
            	<? include 'menu_profile.php'; ?>
                <div style="height:20px;"></div>      
	       </div>

		</div>
		<div class="col-md-9">
         <div class="panel-body">
                            <div class="table-responsive">
                            <?
								$num=1;
								$strSQL = "SELECT * FROM injo_project 
								  inner join calendar on calendar.calendar_id = injo_project.calendar_id
								  inner join club on club.club_id = calendar.club_id
								  where injo_project.mem_id = '".$_SESSION[mem_id]."' ";
								$stmt  = mysqli_query($conn,$strSQL);
								$numrow = mysqli_num_rows($stmt);
								if($numrow != ''){ 
							?>
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center;">วันที่เริ่ม</th>
                                            <th style="text-align:center;">วันที่สิ้นสุด</th>
                                            <th style="text-align:center;">ชื่อโครงการ</th>
                                            <th style="text-align:center;">เข้าร่วม</th>
                                        </tr>
                                    </thead>
                                    <?
                                          
                                          while($row = mysqli_fetch_array($stmt)){
                                    ?>
                                        <tr>
                                          <td style="text-align:center;"><?=date('d/m', strtotime($row[calendar_start]));?>/<?=date('Y', strtotime($row[calendar_start]))+543;?></td>

                                          <td style="text-align:center;"><?=date('d/m', strtotime($row[calendar_end]));?>/<?=date('Y', strtotime($row[calendar_end]))+543;?></td>
                                          
                                          <td><a href="view_calendar.php?calendar_id=<?=$row[calendar_id];?>" target="_blank"><?=$row[calendar_name];?></a></td>
                                          <td style="text-align:center;">
									   <?
											if($row[injo_status] == 'W'){
												echo '<font color="#FF6600">รออนุมัติ</font>';
											}else if($row[injo_status] == 'Y'){
												echo '<font color="#009900">อนุมัติ</font>';
											}else if($row[injo_status] == 'N'){
												echo '<font color="#FF0000">ไม่อนุมัติ</font>';
											}
										?>
                                          </td>
                                        </tr>
                                     <? $num++; } ?>
                                    </tbody>
                                </table>
                                <? }else{ echo '<div align="center">---ยังไม่มีโครงการของชมรม---</div>'; } ?>
                            </div>
                        </div>
		    <div class="clearfix"> </div>
	   </div>
	</div>
    </div>
	</div>
	<!--<div class="footer">
    	<? include 'footer.php'; ?>
    </div>-->
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