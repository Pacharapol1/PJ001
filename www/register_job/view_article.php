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
<title>ระบบสารสนเทศชมรมคอมพิวเตอร์</title>
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
  		<h3>บทความวิชาการ</h3>
  		<div class="breadcrumb1">
            <ul>
                <li class="icon6"><a href="index.php">หน้าหลัก</a></li>
                <li class="current-page">บทความวิชาการ</li>
            </ul>
        </div>
        <br>
  	</div>
  </div>
    <!-- //banner -->
	<div class="courses_box1">
	   <div class="container">
	   	  <div class="col-md-3">
	       
	      <ul class="posts">
	      	<h3>บทความวิชาการ</h3>
            <?
			  $strSQL_article = "SELECT * FROM article where article_id != '".$_GET[article_id]."' order by article_date DESC ";
			  $stmt_article  = mysqli_query($conn,$strSQL_article);
			  while($row_article = mysqli_fetch_array($stmt_article)){
			?>
			<li>
				<article class="entry-item">
					<div class="entry-thumb pull-left">
						<img src="admin/<?=$row_article[pic];?>" class="img-responsive" alt=""/>
					</div>
					<div class="entry-content">
						<h6><a href="view_article.php?article_id=<?=$row_article[article_id];?>"><?=$row_article[article_name];?></a></h6>
						<p><i class="fa fa-clock-o"></i> <?=date('d/m', strtotime($row_article[article_date]));?>/<?=date('Y', strtotime($row_article[article_date]))+543;?></p>
					</div>
					<div class="clearfix"> </div>
				</article>
                <hr>
			</li>
            <? } ?>
         </ul>
		</div>
        <?
			$strSQL_article_detail = "SELECT * FROM article where article_id = '".$_GET[article_id]."' ";
			$stmt_article_detail  = mysqli_query($conn,$strSQL_article_detail);
			$row_article_detail = mysqli_fetch_array($stmt_article_detail);
		?>
		<div class="col-md-9 detail">
			<img src="admin/<?=$row_article_detail[pic];?>" class="img-responsive" alt=""/>
			<h3><?=$row_article_detail[article_name];?></h3>
			<p><?=str_replace("picture/editor/","admin/picture/editor/",$row_article_detail['article_detail']);?></p>
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