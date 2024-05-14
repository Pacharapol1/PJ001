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
        	<div class="col-md-6 detail">
                <h1>กระดานถาม-ตอบ</h1>
                <form  action="add_webboard.php" method="post" class="comment-form">
                <input type="hidden" class="form-control" name="status" value="<?=$_SESSION["status"];?>">
                    <div class="col-md-12 comment-form-left">
                        <label>หัวข้อเรื่อง <span><font color="#FF0000">*</font></span></label>
                        <input type="text" class="form-control" name="topic" id="topic" required>
                    </div>
                    <div class="clearfix"></div>
                    
                    <div class="col-md-12 comment-form-left">
                        <label>รายละเอียด <span><font color="#FF0000">*</font></span></label>
                        <textarea class="form-control" name="detail" rows="6" required></textarea>
                    </div>
                    <div class="clearfix"></div>
                    
                    <div class="col-md-12 comment-form-left">
                        <label>ผู้ตั้งหัวข้อ <span><font color="#FF0000">*</font></span></label>
                        <input type="text" class="form-control" name="name" required />
                    </div>
                    <div class="clearfix"></div>
                    
                    <div class="col-md-12 comment-form-left">
                        <label>อีเมลล์ <span><font color="#FF0000">*</font></span></label>
                        <input type="email" class="form-control" name="email" required />
                    </div>
                    <div class="clearfix"> </div>	
                    
                    <div class="col-md-3 comment-form-left">					
                        <input name="submit" type="submit" id="submit" class="submit_1 btn btn-primary btn-block" value="ตั้งหัวข้อ"> 
                    </div>
                    <div class="clearfix"> </div>	
                </form>
             </div>
             
             <div class="col-md-6 detail">
             	<img src="images/qu.png" style="width:100%;">
             </div>
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