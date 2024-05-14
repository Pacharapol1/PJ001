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
  		<h3>กระดานถาม-ตอบ</h3>
  		<div class="breadcrumb1">
            <ul>
                <li class="icon6"><a href="index.php">หน้าหลัก</a></li>
                <li class="current-page">กระดานถาม-ตอบ</li>
            </ul>
        </div>
        <br>
  	</div>
  </div>
    <!-- //banner -->
    <?
		$sql = "SELECT * FROM questions WHERE id='$_GET[id]' ";
		$query = mysqli_query($conn,$sql);
		$result = mysqli_fetch_assoc($query);
		
		// answer
		$sql_a = "SELECT * FROM answers WHERE question_id='$_GET[id]' ";
		$query_a = mysqli_query($conn,$sql_a);
		$rows_a = mysqli_num_rows($query_a);
		
		// update view
		$sql_u = "UPDATE questions SET view=view+1 WHERE id='$_GET[id]' ";
		mysqli_query($conn,$sql_u);
	?>
    
	<div class="courses_box1">
	   <div class="container">
		<div class="col-md-12 detail">
			<h1>รายละเอียดการสอบถามปัญหา</h1>
            <br><br>
            
            	<div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <?php echo $result['topic']; ?>
                        </div>
                        <div class="panel-body">
                        	<table class="table">
                                  <tbody>
                                      <tr>
                                       <td style="width:25%;">
                                       <h3><font color="#990000"><?php echo nl2br($result['detail']); ?></font></h3>
                                       <p>ชื่อผู้ตั้งคำถาม : <?=$result['name']; ?></p><br>
                                       <p>อีเมลผู้ตั้งคำถาม : <?=$result['email']; ?></p><br>
                                       <p>วันที่ : <?=date('d/m', strtotime($result[created]));?>/<?=date('Y', strtotime($result[created]))+543;?> เวลา : <?=date('H:i', strtotime($result[created]));?> น.</p>
                                       
                                       
                                      </tr>
                                  </tbody>
                              </table>
                        </div>
                    </div>
                </div>
             <?php
				 if ($rows_a > 0) {
				 $i = 1;
				 while($result_a = mysqli_fetch_assoc($query_a)){
		 	?>
                <div class="col-lg-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            ตอบคำถาม : <?php echo $result['topic']; ?>
                        </div>
                        <div class="panel-body">
                        	<table class="table">
                                  <tbody>
                                      <tr>
                                       <td style="width:25%;">
                                        <h3><font color="#990000"><?php echo nl2br($result_a['detail']); ?></font></h3>
                                       <p>ชื่อผู้ตอบ : ผู้ดูแลระบบ</p><br>
                                       
                                       <p>วันที่ : <?=date('d/m', strtotime($result[date_ans]));?>/<?=date('Y', strtotime($result[date_ans]))+543;?> เวลา : <?=date('H:i', strtotime($result[date_ans]));?> น.</p>
                                       </td>
                                     
                                      </tr>
                                  </tbody>
                              </table>
                        </div>
                    </div>
                </div>
            
             <? 
					} 
				} else {
             ?>
             	<p style="text-align: center;color: red;">ไม่มีคำตอบ</p>
             <?
             }
             ?>
            
            <div class="col-md-12 detail">
            <div class="col-md-2 detail"></div>
            <? if($_SESSION["status"] ==1){ ?>
        	<div class="col-md-6 detail">
               
    
               
                    <div class="clearfix"> </div>	
                </form>
             </div>
             <? } ?>
           </div> 
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