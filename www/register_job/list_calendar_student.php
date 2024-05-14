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
  		<h3>การนัดนิเทศงาน</h3>
        <div class="breadcrumb1">
            <ul>
                <li class="icon6"><a href="index.php">หน้าหลัก</a></li>
                <li class="current-page">การนัดนิเทศงาน</li>
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
		<?
			$strSQL_club = "SELECT * FROM club where club_id = '".$_SESSION["club_id"]."' ";
			$stmt_club  = mysqli_query($conn,$strSQL_club);
			$row_club = mysqli_fetch_array($stmt_club);
		?>
         <div class="panel-body">
          <div class="table-responsive">
              <div align="center"><h2>การนัดนิเทศงาน</h2></div>
          <?
		  	  if($_GET["Action"] == "No")
			  {
				  $strSQL = "UPDATE calendar SET calendar_status = 'C' WHERE calendar_id = '".$_GET["calendar_id"]."' ";
				  $stmt = mysqli_query($conn,$strSQL);
			  }
			  if($_GET["Action"] == "Yes")
			  {
				  $strSQL = "UPDATE calendar SET calendar_status = '1' WHERE calendar_id = '".$_GET["calendar_id"]."' ";
				  $stmt = mysqli_query($conn,$strSQL);
			  }
              $num=1;
              $strSQL = "SELECT * FROM calendar 
					inner join club on club.club_id = calendar.club_id
					inner join club_work on club_work.club_id = club.club_id
					inner join register_work on register_work.work_id = club_work.work_id
					inner join work_report on work_report.re_id = register_work.re_id
                    where work_report.mem_id = '".$_SESSION["mem_id"]."'
					ORDER BY calendar.calendar_id DESC ";
              $stmt  = mysqli_query($conn,$strSQL);
              $numrow = mysqli_num_rows($stmt);
              if($numrow != ''){ 
          ?>
              <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                  <thead>
                      <tr>
                          <th style="text-align:center;">วันที่นัด</th>
                          <th style="text-align:center;">เวลา</th>
                          <th style="text-align:center;">ชื่ผู้ประกอบการ</th>
                          <th style="text-align:center;">ประเมิน COOP11</th>
                          <th style="text-align:center; width:15%;">ประเมิน</th>
                      </tr>
                  </thead>
                  <?
                        
                        while($row = mysqli_fetch_array($stmt)){
                  ?>
                      <tr>
                        <td style="text-align:center;"><?=date('d/m', strtotime($row[calendar_date]));?>/<?=date('Y', strtotime($row[calendar_date]))+543;?></td>
                        <td style="text-align:center;"><?=date('H:i', strtotime($row[calendar_date]));?> น.</td>
                        <td><?=$row[club_name];?></td>
                        <td style="text-align:center;">
                          <?
                              if($row[calendar_status_student] == ''){
                                  echo '<font color="#FF6600">รอประเมิน</font>';
                              }else{
                                  echo '<font color="#009900">ประเมินผลแล้ว</font>';
                              }
                          ?>
                        </td>
                        <td style="text-align:center;">
                        <? if($row[calendar_status_student] == ''){ ?>
                          	<a href="form_ass_student.php?club_id=<?=$row[club_id];?>&re_id=<?=$row[re_id];?>&mem_id=<?=$row[mem_id];?>" class="btn btn-success btn-sm"><i class="fa fa-check"></i> ประเมิน</a>
                         <? }else{ ?>
                         	<a href="print_ass_student.php?club_id=<?=$row[club_id];?>&re_id=<?=$row[re_id];?>&mem_id=<?=$row[mem_id];?>" class="btn btn-info btn-sm" target="_blank"><i class="fa fa-print"></i> พิมพ์</a>
                         <? } ?>
                         </td>
                      </tr>
                   <? $num++; } ?>
                  </tbody>
              </table>
              <? }else{ echo '<div align="center">---ยังไม่มีการนัดนิเทศงาน---</div>'; } ?>
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