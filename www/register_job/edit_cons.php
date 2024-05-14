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
  		<h3>รายชื่อพนักงานที่ปรึกษา</h3>
        <div class="breadcrumb1">
            <ul>
                <li class="icon6"><a href="index.php">หน้าหลัก</a></li>
                <li class="current-page">รายชื่อพนักงานที่ปรึกษา</li>
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
        <div class="col-md-9">
         <div class="panel-body">
            <div class="table-responsive">
                <div align="center"><h2>รายชื่อพนักงานที่ปรึกษา</h2></div>
                <form method="post" action="update_cons.php" class="form-horizontal" enctype="multipart/form-data">
                <input name="re_id" type="hidden" value="<?=$_GET[re_id];?>" required>
            <?
                $num=1;
                $strSQL = "SELECT * FROM emp_office 
					inner join titlename on titlename.title_id = emp_office.title_id
					inner join club on club.club_id = emp_office.club_id
					where emp_office.office_status = '' and club.club_id = '".$_SESSION[club_id]."' ";
                $stmt  = mysqli_query($conn,$strSQL);
                $numrow = mysqli_num_rows($stmt);
            ?>
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                        	<th style="text-align:center;">รูป</th>
                            <th style="text-align:center;">ชื่อ-นามสกุล</th>
                            <th style="text-align:center;">ตำแหน่งงาน</th>
                            <th style="text-align:center;">เบอร์โทร</th>
                            <th style="text-align:center;">Line id</th>
                            <th style="text-align:center;">Facebook</th>
                            <th style="text-align:center;">เลือก</th>
                        </tr>
                    </thead>
                    <?
                          
                          while($row = mysqli_fetch_array($stmt)){
							  	
                    ?>
                        <tr>
                          <td style="text-align:center;"><img src="<?=$row[office_pic];?>" width="80"></td>
                          <td><?=$row[title_name];?><?=$row[office_name];?> <?=$row[office_last];?></td>
                          <td><?=$row[office_po];?></td>
                          <td style="text-align:center;"><?=$row[office_tel];?></td>
                          <td><?=$row[office_line];?></td>
                          <td><?=$row[office_fb];?></td>
                          <td style="text-align:center;">
							<input name="office_id" type="radio" value="<?=$row[office_id];?>" <? if($_GET[office_id] ==  $row[office_id]){echo 'checked'; } ?>  required>
                        </td>
                        </tr>
                     <? $num++; } ?>
                    </tbody>
                </table>
                	<div align="center"><button class="btn btn-primary" type="submit">บันทึก</button>
                    <button type="button" class="btn btn-danger" onClick="window.history.back();">ย้อนกลับ</button></div>
                </form>
            </div>
        </div>
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