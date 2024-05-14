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
        window.location.href = "login_office.php";
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
  		<h3>ข้อมูลสถานประกอบการ</h3>
        <div class="breadcrumb1">
            <ul>
                <li class="icon6"><a href="index.php">หน้าหลัก</a></li>
                <li class="current-page">ข้อมูลสถานประกอบการ</li>
            </ul>
        </div>
  	</div>
   </div>
    <!-- //banner -->
	<div class="courses_box1">
	   <div class="container">
	   	  <div class="col-md-3">
			<div class="courses_box1-left">
            	<? include 'menu_profile_office.php'; ?>
	       </div>

		</div>
        <?
			$strSQL = "SELECT * FROM club 
				inner join provinces on provinces.prov_id = club.prov_id
				where club.club_id = '".$_SESSION[club_id]."'";
			$stmt  = mysqli_query($conn,$strSQL);
			$row = mysqli_fetch_array($stmt);
		?>
		<div class="col-md-9">
        		<p class="lead">ข้อมูลสถานประกอบการ</p>
                <div class="form-group">
                    <label class="col-md-3">ชื่อ : </label><?=$row[club_name];?>
                </div>
                <div class="form-group">
                    <label class="col-md-3">ชื่อภาษาอังกฤษ : </label><?=$row[club_eng];?>
                </div>
                <div class="form-group">
                    <label class="col-md-3">ที่อยู่ : </label>เลขที่ <?=$row[club_office];?> ต.<?=$row[club_tum];?> อ.<?=$row[club_aum];?> จ.<?=$row[prov_name];?> <?=$row[club_zip];?>
                </div>
                <div class="form-group">
                    <label class="col-md-3">ชื่อผู้ติดต่อ : </label><?=$row[title_name];?><?=$row[club_contact];?>
                </div>
                <div class="form-group">
                    <label class="col-md-3">เบอร์โทรศัพท์ : </label><?=$row[club_tel];?>
                </div>
                <div class="form-group">
                    <label class="col-md-3">อีเมล์ : </label><?=$row[club_email];?>
                </div>
                <div class="form-group">
                    <label class="col-md-3">เอกสาร : </label><a href="<?=$row["club_file"];?>" class="btn btn-default btn-sm" target="_blank">เอกสาร</a>
                </div>
                <div class="form-group">
                    <label class="col-md-3">สถานะ : </label>
					<?
                    	if($row[club_status] == ''){
							echo '<font color="#FF6600">รออนุมัติ</font>';
						}else if($row[club_status] == 'Y'){
							echo '<font color="#009900">อนุมัติ</font>';
						}else if($row[club_status] == 'N'){
							echo '<font color="#FF0000">ไม่อนุมัติ</font><br><p>'.$row[club_detail].'</p>';
						}
					?>
					
                </div>
                <div style="height:30px;"></div>
				<!--<a href="edit_profile.php?emp_id=<?=$row[emp_id];?>" class="btn btn-warning">แก้ไขข้อมูลส่วนตัว</a>
                <a href="edit_pass.php?emp_id=<?=$row[emp_id];?>" class="btn btn-primary">แก้ไขรหัสผ่าน</a>-->
		    <div class="clearfix"> </div>
	   </div>
	</div>
    <div style="height:100px;"></div>
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