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
  		<h3>โครงการของชมรม</h3>
        <div class="breadcrumb1">
            <ul>
                <li class="icon6"><a href="index.php">หน้าหลัก</a></li>
                <li class="current-page">โครงการของชมรม</li>
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
			$strSQL_club = "SELECT * FROM club where club_id = '".$_GET[club_id]."' ";
			$stmt_club  = mysqli_query($conn,$strSQL_club);
			$row_club = mysqli_fetch_array($stmt_club);
		?>
         <div class="panel-body">
                            <div class="table-responsive">
                            	<div align="center"><h2><?=$row_club[club_name];?></h2></div>
                                <br><br>
                            <?
								if($_GET["Action"] == "Yes")
								{
									if($_SESSION["mem_status"] != 'Y'){
							?>
									<script>
                                        alert("สมาชิกยังไม่ได้รับการยืนยัน กรุณาตรวจสอบข้อมูล");
                                        window.location.href = "profile.php";
                                    </script>
                            
                            <?
									}else{
										$strSQL_in = "INSERT INTO injo_project (injo_id, mem_id, calendar_id, injo_date, injo_status) VALUES (NULL, '".$_GET["mem_id"]."', '".$_GET["calendar_id"]."', NOW(), 'W')";  							
										$objQuery_in = mysqli_query($conn, $strSQL_in);
							?>
									<script>
                                        window.location.href = "list_club.php?club_id=<?=$_GET[club_id];?>";
                                    </script>
                            
                            <?
									}
								}
								$num=1;
								$strSQL = "SELECT * FROM calendar
								  inner join club on club.club_id = calendar.club_id
								  where calendar.calendar_end > '".date('Y-m-d')."' and calendar.club_id = '".$_GET[club_id]."' ";
								$stmt  = mysqli_query($conn,$strSQL);
								$numrow = mysqli_num_rows($stmt);
								if($numrow != ''){ 
							?>
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center;">วันที่เริ่ม</th>
                                            <th style="text-align:center;">วันที่สิ้นสุด</th>
                                            <th style="text-align:center;">ชื่อโครงการ</th>
                                            <? if($_GET[club_id] == $_SESSION[club_id]){ ?>
                                            <th style="text-align:center;">เข้าร่วม</th>
                                            <? } ?>
                                        </tr>
                                    </thead>
                                    <?
                                          
                                          while($row = mysqli_fetch_array($stmt)){
                                    ?>
                                        <tr>
                                          <td style="text-align:center;"><?=date('d/m', strtotime($row[calendar_start]));?>/<?=date('Y', strtotime($row[calendar_start]))+543;?></td>

                                          <td style="text-align:center;"><?=date('d/m', strtotime($row[calendar_end]));?>/<?=date('Y', strtotime($row[calendar_end]))+543;?></td>
                                          
                                          <td><a href="view_calendar.php?calendar_id=<?=$row[calendar_id];?>" target="_blank"><?=$row[calendar_name];?></a></td>
                                          <? if($_GET[club_id] == $_SESSION[club_id]){ ?>
                                          <?
										  		$strSQL_pro = "SELECT * FROM injo_project where mem_id = '".$_SESSION[mem_id]."' ";
												$stmt_pro = mysqli_query($conn,$strSQL_pro);
												$row_pro = mysqli_fetch_array($stmt_pro);
												$num_pro = mysqli_num_rows($stmt_pro);
												if($num_pro == ''){
										  ?>
                                                  <td style="text-align:center;">
                                                        <a href="JavaScript:if(confirm('คุณต้องเข้าร่วมโครงการ?')==true){window.location='<?=$_SERVER["PHP_SELF"];?>?Action=Yes&calendar_id=<?=$row["calendar_id"];?>&mem_id=<?=$_SESSION[mem_id];?>&club_id=<?=$_GET[club_id];?>';}" class="btn btn-success btn-sm"><i class="fa fa-check"></i> เข้าร่วมโครงการ</a>
                                                  </td>
                                          <?
												}else if($row_pro[injo_status] == 'W'){
													echo '<td style="text-align:center;"><font color="#FF6600">รออนุมัติ</font></td>';
												}else if($row_pro[injo_status] == 'Y'){
													echo '<td style="text-align:center;"><font color="#009900">อนุมัติ</font></td>';
												}else if($row_pro[injo_status] == 'N'){
													echo '<td style="text-align:center;"><font color="#FF0000">ไม่อนุมัติ</font></td>';
												}
										?>
                                        		</td>
                                        <?
										   	  }
											?>
                                        </tr>
                                     <? $num++; } ?>
                                    </tbody>
                                </table>
                                <? }else{ echo '<div align="center">---ยังไม่มีโครงการของชมรม---</div>'; } ?>
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