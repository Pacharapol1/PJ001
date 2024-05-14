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
<link href="css/bootstrap-3.1.1.min.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

<!-- Custom Theme files -->
<link href="css/fontcss.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/jquery.countdown.css" />
<!----font-Awesome----->
<link href="css/font-awesome.css" rel="stylesheet"> 
<link rel="stylesheet" href="gl/lightbox.css">
<script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
<!----font-Awesome----->
<link rel="stylesheet" href="css/viewbox.css">
</head>

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
    <br><br>
    <div class="row">
    	<div class="col-md-12">
        <div class="col-md-10">
        <?
		  $strSQL_ac = "SELECT * FROM portfolio where portfolio_id = '".$_GET[portfolio_id]."' ";
		  $stmt_ac  = mysqli_query($conn,$strSQL_ac);
		  $row_ac = mysqli_fetch_array($stmt_ac);
		?>
        <h3><?=$row_ac[portfolio_name];?></h3>
        <p><i class="fa fa-clock-o"></i> <?=date('d/m', strtotime($row_ac[portfolio_date]));?>/<?=date('Y', strtotime($row_ac[portfolio_date]))+543;?></p>
        <p><?=str_replace("picture/editor/","admin/picture/editor/",$row_ac['portfolio_detail']);?></p>
        
        <br><br>
        </div>
         <?
		  $strSQL_por = "SELECT * FROM portfolio_pic where portfolio_id = '".$_GET[portfolio_id]."' ";
		  $stmt_por  = mysqli_query($conn,$strSQL_por);
		  while($row_por = mysqli_fetch_array($stmt_por)){
		?>
          <div class="col-md-3">
              <a href="admin/portfolio/<?=$row_por[portfolio_pic];?>" class="thumbnail" title="<?=$row_por[portfolio_name];?>">
                  <img src="admin/portfolio/<?=$row_por[portfolio_pic];?>" style="width:100%; height:200px;" alt="">
              </a>
          </div>
	   	  <? } ?>
	   	  </div>
	</div>
    <br><br>
    <div class="footer">
    	<? include 'footer.php'; ?>
    </div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
	<script src="js/jquery.viewbox.min.js"></script>
	<script>
		$(function(){
			
			$('.thumbnail').viewbox();
			$('.thumbnail-2').viewbox();

			(function(){
				var vb = $('.popup-link').viewbox();
				$('.popup-open-button').click(function(){
					vb.trigger('viewbox.open');
				});
				$('.close-button').click(function(){
					vb.trigger('viewbox.close');
				});
			})();
			
		});
	</script>
</body>
</html>	