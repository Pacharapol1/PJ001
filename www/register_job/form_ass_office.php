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
      <h3>แบบประเมินผลการปฏิบัติงานสหกิจศึกษา</h3>
        <div class="breadcrumb1">
            <ul>
                <li class="icon6"><a href="index.php">หน้าหลัก</a></li>
                <li class="current-page">แบบประเมินผลการปฏิบัติงานสหกิจศึกษา</li>
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
                    <h2 class="page-header">แบบประเมินผลการปฏิบัติงานสหกิจศึกษา</h2>
                </div>
            </div>
                     
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
          
        </header>
        <div id="div-1" class="accordion-body collapse in body">
            <form method="post" action="add_office_score.php" class="form-horizontal" enctype="multipart/form-data">
            <input type="hidden" name="club_id" value="<?=$_GET["club_id"];?>">
            <input type="hidden" name="re_id" value="<?=$_GET["re_id"];?>">
            <input type="hidden" name="mem_id" value="<?=$_GET["mem_id"];?>">
            <input type="hidden" name="calendar_id" value="<?=$_GET["calendar_id"];?>">
              <h4 class="form-signin-heading" align="center"></h4>
              	  <table class="table table-bordered">
                  <tr>
                    <th style="text-align:center; width:80%;">หัวข้อประเมิน</th>
                    <th style="text-align:center; width:10%;">คะแนนเต็ม</th>
                    <th style="text-align:center; width:10%;">คะแนนที่ได้</th>
                  </tr>
                  <tr>
                    <td><strong>1. ปริมาณงาน (Quantity of work)</strong>
                    <br>ปริมาณงานที่ปฏิบัติสำเร็จตามหน้าที่หรือตามที่ได้รับมอบหมายภายในระยะเวลาที่กำหนด และเทียบกับนักศึกษาทั่ว ๆ ไป
					</td>
                    <td style="text-align:center;">20<input type="hidden" name="ass_office_fullscore1" value="20"></td>
                    <td style="text-align:center;"><input type="number" class="form-control" name="ass_office_score1" max="20" min="0" required></td>
                  </tr>
                  <tr>
                    <td><strong>2. คุณภาพงาน (Quality of work)</strong>
                    <br>ทำงานได้ถูกต้องครบถ้วนสมบูรณ์ มีความปราณีตเรียบร้อย มีความรอบคอบ ไม่เกิดปัญหาติดตามมา งานไม่ค้างคา ทำงานเสร็จทันเวลาหรือก่อนเวลาที่กำหนด                            
					</td>
                    <td style="text-align:center;">20<input type="hidden" name="ass_office_fullscore2" value="20"></td>
                    <td style="text-align:center;"><input type="number" class="form-control" name="ass_office_score2" max="20" min="0" required></td>
                  </tr>
                  <tr>
                    <td><strong>3. ความรู้ความสามารถทางวิชาการ (Academic ability)</strong>
                    <br>นักศึกษามีความรู้ทางวิชาการเพียงพอ ที่จะทำงานตามที่ได้รับมอบหมาย                            
					</td>
                    <td style="text-align:center;">15<input type="hidden" name="ass_office_fullscore3" value="15"></td>
                    <td style="text-align:center;"><input type="number" class="form-control" name="ass_office_score3" max="15" min="0" required></td>
                  </tr>
                  <tr>
                    <td><strong>4. ความสามารถในการเรียนรู้และประยุกต์วิชาการ (Ability to learn and apply knowledge)</strong>
                    <br>ความรวดเร็วในการเรียนรู้ เข้าใจข้อมูล ข่าวสาร และวิธีการทำงาน ตลอดจนการนำ ความรู้ไปประยุกต์ใช้งาน    
					</td>
                    <td style="text-align:center;">10<input type="hidden" name="ass_office_fullscore4" value="10"></td>
                    <td style="text-align:center;"><input type="number" class="form-control" name="ass_office_score4" max="10" min="0" required></td>
                  </tr>
                  <tr>
                    <td><strong>5. ความรู้ความชำนาญในการปฏิบัติการ (Practical ability)</strong>
                    <br>เช่น การปฏิบัติการในภาคสนามหรือในห้องปฏิบัติการ
					</td>
                    <td style="text-align:center;">15<input type="hidden" name="ass_office_fullscore5" value="15"></td>
                    <td style="text-align:center;"><input type="number" class="form-control" name="ass_office_score5" max="15" min="0" required></td>
                  </tr>
                  <tr>
                    <td><strong>6. วิจารณญาณและการตัดสินใจ (Judgement  and  decision  making)</strong>
                    <br>     ตัดสินใจได้ดี ถูกต้อง รวดเร็ว มีการวิเคราะห์ ข้อมูลและปัญหาต่างๆ อย่างรอบคอบ ก่อนการตัดสินใจ สามารถแก้ปัญหาเฉพาะหน้า สามารถไว้วางใจให้ตัดสินใจได้ด้วยตนเอง
					</td>
                    <td style="text-align:center;">10<input type="hidden" name="ass_office_fullscore6" value="10"></td>
                    <td style="text-align:center;"><input type="number" class="form-control" name="ass_office_score6" max="10" min="0" required></td>
                  </tr>
                  <tr>
                    <td><strong>7. การจัดการและวางแผน (Organization and planning)</strong>
                    <br>     การลำดับความสำคัญของงาน  การกำหนดขอบเขตและสัมฤทธิ์ผลของการปฏิบัติงาน
					</td>
                    <td style="text-align:center;">10<input type="hidden" name="ass_office_fullscore7" value="10"></td>
                    <td style="text-align:center;"><input type="number" class="form-control" name="ass_office_score7" max="10" min="0" required></td>
                  </tr>
                  <tr>
                    <td><strong>8. ทักษะการสื่อสาร (Communication skills)</strong>
                    <br>ความสามารถในการติดต่อสื่อสาร การพูด การเขียน การนำเสนอ (Presentation) และการประสานงาน  สามารถสื่อให้เข้าใจได้ง่าย เรียบร้อย ชัดเจน ถูกต้อง รัดกุม มีลำดับขั้นตอนที่ดี ไม่ก่อให้เกิดความสับสนต่อการทำงาน  รู้จักสอบถาม รู้จักชี้แจงผลการปฏิบัติงานและข้อขัดข้องให้ทราบ
					</td>
                    <td style="text-align:center;">10<input type="hidden" name="ass_office_fullscore8" value="10"></td>
                    <td style="text-align:center;"><input type="number" class="form-control" name="ass_office_score8" max="10" min="0" required></td>
                  </tr>
                  <tr>
                    <td><strong>9. ความเหมาะสมต่อตำแหน่งงานที่ได้รับมอบหมาย (Suitability for Job position)</strong>
                    <br>สามารถพัฒนาตนเองให้ปฏิบัติงานตาม Job position และ Job description ที่มอบหมาย
					</td>
                    <td style="text-align:center;">10<input type="hidden" name="ass_office_fullscore9" value="10"></td>
                    <td style="text-align:center;"><input type="number" class="form-control" name="ass_office_score9" max="10" min="0" required></td>
                  </tr>
                  <tr>
                    <td><strong>10. ความรับผิดชอบและเป็นผู้ที่ไว้วางใจได้ (Responsibility  and  dependability)</strong>
                    <br>ดำเนินงานให้สำเร็จลุล่วงโดยคำนึงถึงเป้าหมาย และความสำเร็จของงานเป็นหลัก ยอมรับผลการทำงานอย่างมีเหตุผล สามารถปล่อยให้ทำงาน ได้โดยไม่ต้องควบคุมขั้นตอน ในการทำงานตลอดเวลา  สามารถไว้วางใจได้และรับผิดชอบงานที่ได้รับมอบหมายได้ทุกสถานการณ์ 
					</td>
                    <td style="text-align:center;">10<input type="hidden" name="ass_office_fullscore10" value="10"></td>
                    <td style="text-align:center;"><input type="number" class="form-control" name="ass_office_score10" max="10" min="0" required></td>
                  </tr>
                  <tr>
                    <td><strong>11. ความสนใจ อุตสาหะในการทำงาน (Interest in work)</strong>
                    <br>ความสนใจและความกระตือรือร้นในการทำงาน มีความอุตสาหะ ความพยายาม ความตั้งใจที่จะทำงานได้สำเร็จ ความมานะบากบั่น ไม่ย่อท้อต่ออุปสรรคและปัญหา
					</td>
                    <td style="text-align:center;">10<input type="hidden" name="ass_office_fullscore11" value="10"></td>
                    <td style="text-align:center;"><input type="number" class="form-control" name="ass_office_score11" max="10" min="0" required></td>
                  </tr>
                  <tr>
                    <td><strong>12. ความสามารถเริ่มต้นทำงานได้ด้วยตนเอง (Initiative or self  motivated)</strong>
                    <br>เมื่อได้รับคำชี้แนะ สามารถเริ่มทำงานได้เอง โดยไม่ต้องรอคำสั่ง (กรณีงานประจำ) เสนอตัว เข้าช่วยงานแทบทุกอย่าง มาขอรับงานใหม่ ๆ ไปทำ การไม่ปล่อยเวลาว่างให้ล่วงเลยไปโดยเปล่าประโยชน์
					</td>
                    <td style="text-align:center;">10<input type="hidden" name="ass_office_fullscore12" value="10"></td>
                    <td style="text-align:center;"><input type="number" class="form-control" name="ass_office_score12" max="10" min="0" required></td>
                  </tr>
                  <tr>
                    <td><strong>13. การตอบสนองต่อการสั่งการ (Response to supervision)</strong>
                    <br>ยินดีรับคำสั่ง คำแนะนำ คำวิจารณ์ ไม่แสดงความอึดอัดใจ เมื่อได้รับคำติเตือนและวิจารณ์ความรวดเร็วในการปฏิบัติตามคำสั่ง การปรับตัวปฏิบัติตามคำแนะนำ ข้อเสนอแนะและวิจารณ์
					</td>
                    <td style="text-align:center;">10<input type="hidden" name="ass_office_fullscore13" value="10"></td>
                    <td style="text-align:center;"><input type="number" class="form-control" name="ass_office_score13" max="10" min="0" required></td>
                  </tr>
                  <tr>
                    <td><strong>14. บุคลิกภาพและการวางตัว (Personality)</strong>
                    <br>มีบุคลิกภาพและวางตัวได้เหมาะสม เช่น ทัศนคติ วุฒิภาวะ ความอ่อนน้อมถ่อมตน การแต่งกาย กิริยาวาจา การตรงต่อเวลา และอื่น ๆ
					</td>
                    <td style="text-align:center;">10<input type="hidden" name="ass_office_fullscore14" value="10"></td>
                    <td style="text-align:center;"><input type="number" class="form-control" name="ass_office_score14" max="10" min="0" required></td>
                  </tr>
                  <tr>
                    <td><strong>15. มนุษยสัมพันธ์ (Interpersonal skills)</strong>
                    <br>สามารถร่วมงานกับผู้อื่น การทำงานเป็นทีม สร้างมนุษยสัมพันธ์ได้ดี เป็นที่รักใคร่ ชอบพอของผู้ร่วมงาน เป็นผู้ที่ช่วยก่อให้เกิดความร่วมมือประสานงาน
					</td>
                    <td style="text-align:center;">10<input type="hidden" name="ass_office_fullscore15" value="10"></td>
                    <td style="text-align:center;"><input type="number" class="form-control" name="ass_office_score15" max="10" min="0" required></td>
                  </tr>
                  <tr>
                    <td><strong>16. ความมีระเบียบวินัย ปฏิบัติตามวัฒนธรรมขององค์กร </strong>
                    <br>ความสนใจเรียนรู้ ศึกษา กฎระเบียบ นโยบาย ต่าง ๆ และปฏิบัติตามโดยเต็มใจ      การปฏิบัติตามระเบียบบริหารงานบุคคล (การเข้างาน ลางาน) ปฏิบัติตามกฎการรักษา ความปลอดภัยในโรงงาน การควบคุมคุณภาพ 5 ส และอื่น ๆ
					</td>
                    <td style="text-align:center;">10<input type="hidden" name="ass_office_fullscore16" value="10"></td>
                    <td style="text-align:center;"><input type="number" class="form-control" name="ass_office_score16" max="10" min="0" required></td>
                  </tr>
                  <tr>
                    <td><strong>17. คุณธรรมและจริยธรรม (Ethics and morality)</strong>
                    <br>มีความซื่อสัตย์ สุจริต มีจิตใจสะอาด รู้จักเสียสละ ไม่เห็นแก่ตัว เอื้อเฟื้อช่วยเหลือผู้อื่น
					</td>
                    <td style="text-align:center;">10<input type="hidden" name="ass_office_fullscore17" value="10"></td>
                    <td style="text-align:center;"><input type="number" class="form-control" name="ass_office_score17" max="10" min="0" required></td>
                  </tr>
                  <tr>
                    <td colspan="3"><strong>18. จุดเด่นของนักศึกษา / Strength</strong>
                    <br> <textarea name="ass_office_score_strength" class="form-control" rows="3" required></textarea></td>
                  </tr>
                  <tr>
                    <td colspan="3"><strong>19. ข้อควรปรับปรุงของนักศึกษา / Needed  Improvement</strong>
                    <br><textarea name="ass_office_score_need" class="form-control" rows="3" required></textarea>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="3"><strong>20. ข้อคิดเห็นเพิ่มเติม / Other comments</strong>
                    <br> <textarea name="ass_office_score_detail" class="form-control" rows="3" required></textarea></td>
                  </tr>
                  <tr>
                    <td><strong>หากนักศึกษาผู้นี้สำเร็จการศึกษาแล้ว ท่านจะรับเข้าทำงานในสถานประกอบการนี้หรือไม่ </strong></td>
                    <td colspan="2" style="text-align:center;">
                    	<input name="ass_office_score_chk" type="radio" value="Y" required> รับ <input name="ass_office_score_chk" type="radio" value="N" required> ไม่รับ
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
