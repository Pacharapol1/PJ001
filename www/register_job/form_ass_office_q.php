<?
  @session_start();
  include "admin/connectDb.php"; 
  $conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
  mysqli_set_charset($conn, "utf8");
  error_reporting(~E_NOTICE); 
?>
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
      <h3>แบบประเมินความพึงพอใจต่อโครงการสหกิจศึกษา</h3>
        <div class="breadcrumb1">
            <ul>
                <li class="icon6"><a href="index.php">หน้าหลัก</a></li>
                <li class="current-page">แบบประเมินความพึงพอใจต่อโครงการสหกิจศึกษา</li>
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

         <div class="panel-body">
                    <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">แบบประเมินความพึงพอใจต่อโครงการสหกิจศึกษา</h2>
                </div>
            </div>
                     
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
          
        </header>
        <div id="div-1" class="accordion-body collapse in body">
            <form method="post" action="add_office_q.php" class="form-horizontal" enctype="multipart/form-data">
            <input type="hidden" name="club_id" value="<?=$_GET["club_id"];?>">
            <input type="hidden" name="re_id" value="<?=$_GET["re_id"];?>">
            <input type="hidden" name="mem_id" value="<?=$_GET["mem_id"];?>">
            <input type="hidden" name="calendar_id" value="<?=$_GET["calendar_id"];?>">
              <h4 class="form-signin-heading" align="center"></h4>
              	<div align="center">5 =พึงพอใจมากที่สุด,   4 = พึงพอใจมาก,   3 = พึงพอใจปานกลาง,  2 = พึงพอใจน้อย,    1 = พึงพอใจน้อยที่สุด</div>
              	  <table class="table table-bordered">
                  <tr>
                    <th style="text-align:center; width:75%;">คำถาม</th>
                    <th style="text-align:center; width:5%;">5</th>
                    <th style="text-align:center; width:5%;">4</th>
                    <th style="text-align:center; width:5%;">3</th>
                    <th style="text-align:center; width:5%;">2</th>
                    <th style="text-align:center; width:5%;">1</th>
                  </tr>
                  <tr>
                    <td><strong>ด้านกระบวนการ</strong></td>
                    <td colspan="5" bgcolor="#999999"></td>
                  </tr>
                  <tr>
                    <td>1.โครงการสหกิจศึกษาให้ประโยชน์ต่อองค์กรของท่าน</td>
                    <td style="text-align:center;"><input name="chk1" type="radio" value="5" required></td>
                    <td style="text-align:center;"><input name="chk1" type="radio" value="4" required></td>
                    <td style="text-align:center;"><input name="chk1" type="radio" value="3" required></td>
                    <td style="text-align:center;"><input name="chk1" type="radio" value="2" required></td>
                    <td style="text-align:center;"><input name="chk1" type="radio" value="1" required></td>
                  </tr>
                  <tr>
                    <td>2.ช่วงเวลาของการฝึกปฏิบัติสหกิจศึกษามีความเหมาะสม (4 เดือน)</td>
                    <td style="text-align:center;"><input name="chk2" type="radio" value="5" required></td>
                    <td style="text-align:center;"><input name="chk2" type="radio" value="4" required></td>
                    <td style="text-align:center;"><input name="chk2" type="radio" value="3" required></td>
                    <td style="text-align:center;"><input name="chk2" type="radio" value="2" required></td>
                    <td style="text-align:center;"><input name="chk2" type="radio" value="1" required></td>
                  </tr>
                  <tr>
                    <td>3.เอกสารที่ได้รับจากมหาวิทยาลัยมีความชัดเจนและถูกต้อง</td>
                    <td style="text-align:center;"><input name="chk3" type="radio" value="5" required></td>
                    <td style="text-align:center;"><input name="chk3" type="radio" value="4" required></td>
                    <td style="text-align:center;"><input name="chk3" type="radio" value="3" required></td>
                    <td style="text-align:center;"><input name="chk3" type="radio" value="2" required></td>
                    <td style="text-align:center;"><input name="chk3" type="radio" value="1" required></td>
                  </tr>
                  <tr>
                    <td>4.สถานประกอบการได้รับข้อมูลจากมหาวิทยาลัยเกี่ยวกับสหกิจศึกษาครบถ้วน</td>
                    <td style="text-align:center;"><input name="chk4" type="radio" value="5" required></td>
                    <td style="text-align:center;"><input name="chk4" type="radio" value="4" required></td>
                    <td style="text-align:center;"><input name="chk4" type="radio" value="3" required></td>
                    <td style="text-align:center;"><input name="chk4" type="radio" value="2" required></td>
                    <td style="text-align:center;"><input name="chk4" type="radio" value="1" required></td>
                  </tr>
                  <tr>
                    <td>5.จำนวนครั้งการนิเทศของอาจารย์ที่ปรึกษาเหมาะสม (ไม่น้อยกว่า 1 ครั้ง)</td>
                    <td style="text-align:center;"><input name="chk5" type="radio" value="5" required></td>
                    <td style="text-align:center;"><input name="chk5" type="radio" value="4" required></td>
                    <td style="text-align:center;"><input name="chk5" type="radio" value="3" required></td>
                    <td style="text-align:center;"><input name="chk5" type="radio" value="2" required></td>
                    <td style="text-align:center;"><input name="chk5" type="radio" value="1" required></td>
                  </tr>
                  <tr>
                    <td><strong>ด้านขั้นตอนให้บริการ</strong></td>
                    <td colspan="5" bgcolor="#999999"></td>
                  </tr>
                  <tr>
                    <td>1.หนังสือแจ้งข้อมูลนักศึกษา และอาจารย์ที่ปรึกษาสหกิจศึกษา เพื่อสะดวกต่อการติดต่อประสานงาน</td>
                    <td style="text-align:center;"><input name="chk6" type="radio" value="5" required></td>
                    <td style="text-align:center;"><input name="chk6" type="radio" value="4" required></td>
                    <td style="text-align:center;"><input name="chk6" type="radio" value="3" required></td>
                    <td style="text-align:center;"><input name="chk6" type="radio" value="2" required></td>
                    <td style="text-align:center;"><input name="chk6" type="radio" value="1" required></td>
                  </tr>
                  <tr>
                    <td>2.แบบประเมินการปฏิบัติงานสหกิจศึกษา (COOP.11) มีความเหมาะสม</td>
                    <td style="text-align:center;"><input name="chk7" type="radio" value="5" required></td>
                    <td style="text-align:center;"><input name="chk7" type="radio" value="4" required></td>
                    <td style="text-align:center;"><input name="chk7" type="radio" value="3" required></td>
                    <td style="text-align:center;"><input name="chk7" type="radio" value="2" required></td>
                    <td style="text-align:center;"><input name="chk7" type="radio" value="1" required></td>
                  </tr>
                  <tr>
                    <td><strong>ด้านผู้ให้บริการ</strong></td>
                    <td colspan="5" bgcolor="#999999"></td>
                  </tr>
                  <tr>
                    <td>1.อาจารย์ที่ปรึกษาให้ข้อมูลเกี่ยวกับนักศึกษาได้ดี</td>
                    <td style="text-align:center;"><input name="chk8" type="radio" value="5" required></td>
                    <td style="text-align:center;"><input name="chk8" type="radio" value="4" required></td>
                    <td style="text-align:center;"><input name="chk8" type="radio" value="3" required></td>
                    <td style="text-align:center;"><input name="chk8" type="radio" value="2" required></td>
                    <td style="text-align:center;"><input name="chk8" type="radio" value="1" required></td>
                  </tr>
                  <tr>
                    <td>2.อาจารย์ที่ปรึกษาให้ข้อมูลเกี่ยวกับสหกิจศึกษาได้ดี</td>
                    <td style="text-align:center;"><input name="chk9" type="radio" value="5" required></td>
                    <td style="text-align:center;"><input name="chk9" type="radio" value="4" required></td>
                    <td style="text-align:center;"><input name="chk9" type="radio" value="3" required></td>
                    <td style="text-align:center;"><input name="chk9" type="radio" value="2" required></td>
                    <td style="text-align:center;"><input name="chk9" type="radio" value="1" required></td>
                  </tr>
                  <tr>
                    <td>3.นักศึกษามีมารยาทในการติดต่อสื่อสารกับองค์กรท่านอย่างเหมาะสม</td>
                    <td style="text-align:center;"><input name="chk10" type="radio" value="5" required></td>
                    <td style="text-align:center;"><input name="chk10" type="radio" value="4" required></td>
                    <td style="text-align:center;"><input name="chk10" type="radio" value="3" required></td>
                    <td style="text-align:center;"><input name="chk10" type="radio" value="2" required></td>
                    <td style="text-align:center;"><input name="chk10" type="radio" value="1" required></td>
                  </tr>
                  <tr>
                    <td>4.นักศึกษาประพฤติปฏิบัติตามกฎระเบียบขององค์กรอย่างเคร่งครัด</td>
                    <td style="text-align:center;"><input name="chk11" type="radio" value="5" required></td>
                    <td style="text-align:center;"><input name="chk11" type="radio" value="4" required></td>
                    <td style="text-align:center;"><input name="chk11" type="radio" value="3" required></td>
                    <td style="text-align:center;"><input name="chk11" type="radio" value="2" required></td>
                    <td style="text-align:center;"><input name="chk11" type="radio" value="1" required></td>
                  </tr>
                  <tr>
                    <td><strong>ด้านสิ่งอำนวยความสะดวก</strong></td>
                    <td colspan="5" bgcolor="#999999"></td>
                  </tr>
                  <tr>
                    <td>1.ช่องทางในการติดต่อกับสถาบันมีความเหมาะสม</td>
                    <td style="text-align:center;"><input name="chk12" type="radio" value="5" required></td>
                    <td style="text-align:center;"><input name="chk12" type="radio" value="4" required></td>
                    <td style="text-align:center;"><input name="chk12" type="radio" value="3" required></td>
                    <td style="text-align:center;"><input name="chk12" type="radio" value="2" required></td>
                    <td style="text-align:center;"><input name="chk12" type="radio" value="1" required></td>
                  </tr>
                  <tr>
                    <td>1.1 e-mail coopmail@east.spu.ac.th</td>
                    <td style="text-align:center;"><input name="chk13" type="radio" value="5" required></td>
                    <td style="text-align:center;"><input name="chk13" type="radio" value="4" required></td>
                    <td style="text-align:center;"><input name="chk13" type="radio" value="3" required></td>
                    <td style="text-align:center;"><input name="chk13" type="radio" value="2" required></td>
                    <td style="text-align:center;"><input name="chk13" type="radio" value="1" required></td>
                  </tr>
                  <tr>
                    <td>1.2 โทรศัพท์</td>
                    <td style="text-align:center;"><input name="chk14" type="radio" value="5" required></td>
                    <td style="text-align:center;"><input name="chk14" type="radio" value="4" required></td>
                    <td style="text-align:center;"><input name="chk14" type="radio" value="3" required></td>
                    <td style="text-align:center;"><input name="chk14" type="radio" value="2" required></td>
                    <td style="text-align:center;"><input name="chk14" type="radio" value="1" required></td>
                  </tr>
                  <tr>
                    <td>1.3 โทรสาร</td>
                    <td style="text-align:center;"><input name="chk15" type="radio" value="5" required></td>
                    <td style="text-align:center;"><input name="chk15" type="radio" value="4" required></td>
                    <td style="text-align:center;"><input name="chk15" type="radio" value="3" required></td>
                    <td style="text-align:center;"><input name="chk15" type="radio" value="2" required></td>
                    <td style="text-align:center;"><input name="chk15" type="radio" value="1" required></td>
                  </tr>
                  <tr>
                    <td colspan="6">ข้อเสนอแนะ<br>
                    	<textarea name="quality_detail" cols="" rows="3" required class="form-control"></textarea>
                    </td>
                  </tr>
                </table>
                
                <div class="form-group">
              			<label class="control-label col-sm-5"></label>
                        <button class="btn btn-primary" type="submit">บันทึก</button> 
                        <button type="button" class="btn btn-danger" onClick="window.history.back();">ยกเลิก</button>
                        </div>
                  </div>
            </form>
        </div>
    </div>
</div>
   
    </div>

                    </div>
                    
                    
                  </div>  
        <!-- END PAGE CONTENT -->

                </div>
        
    
       <!--END MAIN WRAPPER -->

   <!-- FOOTER -->
    <div class="footer">
      <? include 'footer.php'; ?>
    </div>
    <!--END FOOTER -->

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
</html>
