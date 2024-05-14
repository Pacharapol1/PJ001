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
  		<h3>ข้อมูลส่วนตัว</h3>
        <div class="breadcrumb1">
            <ul>
                <li class="icon6"><a href="index.php">หน้าหลัก</a></li>
                <li class="current-page">ข้อมูลส่วนตัว</li>
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
	       </div>

		</div>
        <?
			$strSQL = "SELECT * FROM member 
				inner join titlename on titlename.title_id = member.title_id
				inner join department on department.dep_id = member.dep_id
				inner join saka on saka.saka_id = member.saka_id
				inner join provinces on provinces.prov_id = member.prov_id
				where member.mem_id = '".$_SESSION[mem_id]."'";
			$stmt  = mysqli_query($conn,$strSQL);
			$row = mysqli_fetch_array($stmt);
		?>
		<div class="col-md-9">
        		<p class="lead">ข้อมูลส่วนตัว</p>
                <div class="form-group">
                    <label class="col-md-2">รูป : </label><img src="<?=$row[mem_pic];?>" width="100">
                </div>
                
                <div class="form-group">
                    <label class="col-md-2">รหัสประจำตัว : </label><?=$row[mem_code];?>
                </div>
                <div class="form-group">
                    <label class="col-md-2">ชื่อ-นามสกุล : </label><?=$row[title_name];?><?=$row[mem_name];?> <?=$row[mem_last];?>
                </div>
                <div class="form-group">
                    <label class="col-md-2">เพศ : </label><?=$row[mem_sex];?>
                </div>
                <div class="form-group">
                    <label class="col-md-2">ที่อยู่ : </label>เลขที่ <?=$row[mem_add];?> ต.<?=$row[mem_tam];?> อ.<?=$row[mem_aum];?> จ.<?=$row[prov_name];?> <?=$row[mem_zip];?>
                </div>
                <div class="form-group">
                    <label class="col-md-2">เบอร์โทรศัพท์ : </label><?=$row[mem_mobile];?>
                </div>
                
                <div class="form-group">
                    <label class="col-md-2">คณะ : </label><?=$row[dep_name];?>
                </div>
                <div class="form-group">
                    <label class="col-md-2">สาขา : </label><?=$row[saka_name];?>
                </div>
                <?
					$strSQL = "SELECT * FROM register_work
					  inner join club_work on club_work.work_id = register_work.work_id
					  inner join club on club.club_id = club_work.club_id
					  where register_work.mem_id = '".$_SESSION[mem_id]."' ";
					$stmt  = mysqli_query($conn,$strSQL);
					$row = mysqli_fetch_array($stmt);
				?>
                <? if($row[re_id] != ''){ ?>
                <div class="form-group">
                    <label class="col-md-2">เอกสาร : </label><a href="list_file.php?re_id=<?=$row[re_id];?>" class="btn btn-success btn-sm"><i class="fa fa-upload"></i></a>
                </div>
                <? } ?>
                
                
                
                <!--<div class="form-group">
                    <label class="col-md-2">สถานะ : </label>
					<?
                    	if($row[mem_status] == 'W'){
							echo '<font color="#FF6600">รออนุมัติ</font>';
						}else if($row[mem_status] == 'Y'){
							echo '<font color="#009900">อนุมัติแล้ว</font>';
						}else if($row[mem_status] == 'C'){
							echo '<font color="#FF0000">ยกเลิก</font>';
						}
					?>
					
                </div>-->
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