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
</head>
<link href="css/fontcss.css" rel='stylesheet' type='text/css' />
<body>
<? include 'menu.php'; ?>
<!-- banner -->
  <div class="courses_banner">
  	<div class="container">
  		<h3>ภาพกิจกรรม</h3>
  		<div class="breadcrumb1">
            <ul>
                <li class="icon6"><a href="index.php">หน้าหลัก</a></li>
                <li class="current-page">ภาพกิจกรรม</li>
            </ul>
        </div>
        <br>
  	</div>
  </div>
    <!-- //banner -->
	<div class="admission">
	   <div class="container">
	   	 <div class="faculty_top">
         <?
		  $strSQL_por = "SELECT * FROM portfolio inner join portfolio_pic on portfolio_pic.portfolio_id = portfolio.portfolio_id group by portfolio_pic.portfolio_id order by portfolio.portfolio_date DESC ";
		  $stmt_por  = mysqli_query($conn,$strSQL_por);
		  while($row_por = mysqli_fetch_array($stmt_por)){
		?>
        	<a href="view_portfolio.php?portfolio_id=<?=$row_por[portfolio_id];?>">
	   	  <div class="col-md-4 faculty_grid">
	   	  	<figure class="team_member">
	   	  		<img src="admin/portfolio/<?=$row_por[portfolio_pic];?>" width="500" height="300" alt=""/>
	   	  		<div></div>
	   	  		<figcaption><h5 class="person-title"><a href="view_portfolio.php?portfolio_id=<?=$row_por[portfolio_id];?>"><font color="#FFFFFF"><?=$row_por[portfolio_name];?></font></a></h5>
	   	  			<span class="person-deg"><i class="fa fa-clock-o"></i> <?=date('d/m', strtotime($row_por[portfolio_date]));?>/<?=date('Y', strtotime($row_por[portfolio_date]))+543;?></span>
	   	  	   </figcaption>
	   	  	 </figure>
	   	  </div>
	   	  <? } ?>
	   	  <div class="clearfix"> </div>
	   	 </div>
         </a>
	    <!-- <ul class="pagination">
	   	 	<li class="active"><a href="#">1</a></li>
	   	 	<li><a href="#">2</a></li>
	   	 </ul>-->
	  </div>
	</div>
    <div class="footer">
    	<? include 'footer.php'; ?>
    </div>
</body>
</html>	