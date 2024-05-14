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
  		<h3>รายชื่อนักศึกษา</h3>
        <div class="breadcrumb1">
            <ul>
                <li class="icon6"><a href="index.php">หน้าหลัก</a></li>
                <li class="current-page">รายชื่อนักศึกษา</li>
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
              <div align="center"><h2>แบบประเมินผล</h2></div>
          <?
              $num=1;
              $strSQL = "SELECT * FROM calendar 
					inner join club_work on club_work.club_id = calendar.club_id
					inner join register_work on register_work.work_id = club_work.work_id
					inner join member on member.mem_id = register_work.mem_id
					inner join titlename on titlename.title_id = member.title_id
                    where calendar.club_id = '".$_SESSION["club_id"]."' and calendar.calendar_id= '".$_GET["calendar_id"]."'
					group by calendar.calendar_date
					ORDER BY calendar.calendar_id DESC ";
              $stmt  = mysqli_query($conn,$strSQL);
              $numrow = mysqli_num_rows($stmt);
              if($numrow != ''){ 
          ?>
              <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                  <thead>
                      <tr>
                          <th style="text-align:center;">รหัสนักศึกษา</th>
                          <th style="text-align:center;">ชื่อ-นามสกุล</th>
                          <th style="text-align:center;">ตำแหน่งงาน</th>
                          <th style="text-align:center;">ประเมินผล</th>
                          <th style="text-align:center;">ประเมินคุณภาพ</th>
                      </tr>
                  </thead>
                  <?
                        
                        while($row = mysqli_fetch_array($stmt)){
                  ?>
                      <tr>
                        <td style="text-align:center;"><?=$row[mem_code];?></td>
                        <td><?=$row[title_name];?><?=$row[mem_name];?> <?=$row[mem_last];?></td>
                        <td><?=$row[work_name];?></td>
                        <td style="text-align:center;">
                          <? if($row[calendar_office] == ''){ ?>
                          		<a href="form_ass_office.php?club_id=<?=$_SESSION[club_id];?>&re_id=<?=$row[re_id];?>&mem_id=<?=$row[mem_id];?>&calendar_id=<?=$row[calendar_id];?>" class="btn btn-success btn-sm"><i class="fa fa-check"></i> ประเมิน</a>
                         <? }else{ ?>
                         	<a href="print_ass_office.php?club_id=<?=$_SESSION[club_id];?>&re_id=<?=$row[re_id];?>&mem_id=<?=$row[mem_id];?>&calendar_id=<?=$row[calendar_id];?>" class="btn btn-primary btn-sm" target="_blank"><i class="fa fa-print"></i> พิมพ์</a>
                         <? } ?>
                        </td>
                        <td style="text-align:center;">
                          <? if($row[calendar_status_quality] == ''){ ?>
                          		<a href="form_ass_office_q.php?club_id=<?=$_SESSION[club_id];?>&re_id=<?=$row[re_id];?>&mem_id=<?=$row[mem_id];?>&calendar_id=<?=$row[calendar_id];?>" class="btn btn-success btn-sm"><i class="fa fa-check"></i> ประเมิน</a>
                         <? }else{ ?>
                         	<a href="print_quality.php?club_id=<?=$_SESSION[club_id];?>&re_id=<?=$row[re_id];?>&mem_id=<?=$row[mem_id];?>&calendar_id=<?=$row[calendar_id];?>" class="btn btn-primary btn-sm" target="_blank"><i class="fa fa-print"></i> พิมพ์</a>
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