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
  		<h3>ข่าวประชาสัมพันธ์</h3>
  		<div class="breadcrumb1">
            <ul>
                <li class="icon6"><a href="index.php">หน้าหลัก</a></li>
                <li class="current-page">ข่าวประชาสัมพันธ์</li>
            </ul>
        </div>
        <br>
  	</div>
  </div>
    <!-- //banner -->
	<div class="courses_box1">
	   <div class="container">
	   	 
	   	  	
		<div class="col-md-12 detail">
        <?
		  $strSQL_news = "SELECT * FROM news where news_id != '".$_GET[news_id]."' order by news_date DESC ";
		  $stmt_news  = mysqli_query($conn,$strSQL_news);
		  while($row_news = mysqli_fetch_array($stmt_news)){
		?>
	       <div class="event-page">
	       	 <div class="row">
	       	 	<div class="col-xs-4 col-sm-4">
	       	 	  <div class="event-img">
	       	 		<a href="view_news.php?news_id=<?=$row_news[news_id];?>"><img src="admin/<?=$row_news[pic];?>" class="img-responsive" alt=""/></a>
	       	 		<div class="over-image"></div>
	       	 	  </div>
	       	 	</div>
	       	 	<div class="col-xs-8 col-sm-8 event-desc">
	       	 		<h2><a href="view_news.php?news_id=<?=$row_news[news_id];?>"><?=$row_news[news_name];?></a></h2>
	       	 	    <div class="event-info-text">
	       	 		   <div class="event-info-middle"><p style="display:inline;"></p>
       	 				   <p><span class="event-bold"><i class="fa fa-clock-o"></i></span> <?=date('d/m', strtotime($row_news[news_date]));?>/<?=date('Y', strtotime($row_news[news_date]))+543;?></p>
       	 				   <p><?=str_replace("picture/editor/","admin/picture/editor/",substr($row_news['news_detail'],0,900));?>...</p>
                           <p><a href="view_news.php?news_id=<?=$row_news[news_id];?>" ><span class="badge badge-primary">อ่านต่อ >></span></a></p>
	       	 		   </div>
	       	 	    </div>
	       	  </div>
	       	</div>
		   </div>
		 <? } ?>
		  <!--<ul class="pagination event_pagination">
	   	 	<li class="active"><a href="#">1</a></li>
	   	 	<li><a href="#">2</a></li>
	   	 </ul>-->
		 </div>
	     <div class="clearfix"> </div>
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