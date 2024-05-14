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
  		<h3>เอกสารสมัครเข้าร่วมโครงการสหกิจศึกษา</h3>
        <div class="breadcrumb1">
            <ul>
                <li class="icon6"><a href="index.php">หน้าหลัก</a></li>
                <li class="current-page">เอกสารสมัครเข้าร่วมโครงการสหกิจศึกษา</li>
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
              <div align="center"><h2>เอกสารสมัครเข้าร่วมโครงการสหกิจศึกษา</h2></div>
              <!--<a href="form_book.php" class="btn btn-primary btn-sm">เพิ่มไฟล์เอกสาร</a>-->
          <?
		  	  if($_GET["Action"] == "Del")
			  {
				  $strSQL = "UPDATE book SET book_status = 'C' WHERE book_id = '".$_GET["book_id"]."' ";
				  $stmt = mysqli_query($conn,$strSQL);
			  }
              $num=1;
              $strSQL = "SELECT * FROM tb_file where mem_id = '".$_SESSION["mem_id"]."' and re_id = '".$_GET["re_id"]."' ";
              $stmt  = mysqli_query($conn,$strSQL);
			  $row = mysqli_fetch_array($stmt);
              $numrow = mysqli_num_rows($stmt);
          ?>
              <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                  <thead>
                      <tr>
                          <!--<th style="text-align:center; width:15%;">วันที่ส่ง</th>-->
                          <th style="text-align:center; width:80%;">เอกสารที่ต้องแนบ</th>
                          <th style="text-align:center; width:20%;">แนบเอกสาร</th>
                      </tr>
                  </thead>
                  <?
				  			$namebook = array('','resume (ภาษาไทยและภาษาอังกฤษ)', 'หนังสือรับรองสถานภาพนักศึกษาและใบแสดงผลการเรียนฉบับยังไม่สำเร็จการศึกษา', 'Transcript กิจกรรม', 'แผนที่ตั้งบริษัทที่สมัคร (ไม่ใช้เอกสาร Google Map)', 'รูปถ่าย 2 นิ้ว จำนวน 2 รูป');
                        	
							$book_status=$row[book_status];

							for($i=1;$i<=5;$i++){
                  ?>
                              <tr>
                                <!--<td style="text-align:center;"><?=date('d/m', strtotime($row[book_date]));?>/<?=date('Y', strtotime($row[book_date]))+543;?></td>-->
                                <td><?=$namebook[$i];?></td>
                                <td style="text-align:center;">
                                	<? if($row[file_file.$i] != ''){ ?>
                                		<a href="<?=$row[file_file.$i];?>" target="_blank">เอกสาร</a><br>
                                        <a href="edit_file.php?file_file=<?=$i;?>&file_id=<?=$row[file_id];?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                    <? }else{ ?>
                                    	<a href="form_file.php?file_file=<?=$i;?>&re_id=<?=$_GET[re_id];?>" class="btn btn-primary btn-sm">เพิ่มไฟล์เอกสาร</a>
                                    <? } ?>
                                 </td>
                              </tr>
                            <? } ?> 
                   <? $num++; ?>
                   		
                  </tbody>
              </table>
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