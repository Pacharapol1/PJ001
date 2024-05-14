<? 
@session_start();
include 'connectDb.php';
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
      <meta charset="UTF-8" />
    <title><?=$_SESSION["title"];?></title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/css/theme.css" />
    <link rel="stylesheet" href="assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="assets/plugins/Font-Awesome/css/font-awesome.css" />
    <!--END GLOBAL STYLES --> 

    <!-- PAGE LEVEL STYLES -->
    
 <link href="assets/css/jquery-ui.css" rel="stylesheet" />
<link rel="stylesheet" href="assets/plugins/uniform/themes/default/css/uniform.default.css" />
<link rel="stylesheet" href="assets/plugins/inputlimiter/jquery.inputlimiter.1.0.css" />
<link rel="stylesheet" href="assets/plugins/chosen/chosen.min.css" />
<link rel="stylesheet" href="assets/plugins/colorpicker/css/colorpicker.css" />
<link rel="stylesheet" href="assets/plugins/tagsinput/jquery.tagsinput.css" />
<link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker-bs3.css" />
<link rel="stylesheet" href="assets/plugins/datepicker/css/datepicker.css" />
<link rel="stylesheet" href="assets/plugins/timepicker/css/bootstrap-timepicker.min.css" />
<link rel="stylesheet" href="assets/plugins/switch/static/stylesheets/bootstrap-switch.css" />
 <script src="module/editor/jscripts/tiny_mce/tiny_mce.js"></script>   
    <!-- END PAGE LEVEL  STYLES -->
   <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

</head>
     <!-- END HEAD -->
     <!-- BEGIN BODY -->
<body class="padTop53 " >

       <!-- MAIN WRAPPER -->
    <div id="wrap">


          <!-- HEADER SECTION -->
        <? include 'top_menu.php'; ?>
        <!-- END HEADER SECTION -->



        <!-- MENU SECTION -->
       <? include 'left_menu.php'; ?>
        <!--END MENU SECTION -->
		<? //include 'editor.php'; ?>
       <!--PAGE CONTENT -->
        <div id="content">
           
                <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">แบบประเมินผลรายงานสหกิจศึกษา</h2>
                </div>
            </div>
                     
                    
                    
                                

<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>กรอกแบบประเมินผลรายงานสหกิจศึกษา</h5>
        </header>
        <div id="div-1" class="accordion-body collapse in body">
            <form method="post" action="add_aj.php" class="form-horizontal" enctype="multipart/form-data">
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
                    <td><strong>1. กิตติกรรมประกาศ  (Acknowledgement)</strong></td>
                    <td style="text-align:center;">5<input type="hidden" name="ass_aj_fullscore1" value="5"></td>
                    <td style="text-align:center;"><input type="number" class="form-control" name="ass_aj_score1" max="5" min="0" required></td>
                  </tr>
                  <tr>
                    <td><strong>2. บทคัดย่อ (Abstract)</strong></td>
                    <td style="text-align:center;">5<input type="hidden" name="ass_aj_fullscore2" value="5"></td>
                    <td style="text-align:center;"><input type="number" class="form-control" name="ass_aj_score2" max="5" min="0" required></td>
                  </tr>
                  <tr>
                    <td><strong>3. สารบัญ  สารบัญรูป และสารบัญตาราง  (Table of contents)</strong></td>
                    <td style="text-align:center;">5<input type="hidden" name="ass_aj_fullscore3" value="5"></td>
                    <td style="text-align:center;"><input type="number" class="form-control" name="ass_aj_score3" max="5" min="0" required></td>
                  </tr>
                  <tr>
                    <td><strong>4. วัตถุประสงค์ (Objective)</strong></td>
                    <td style="text-align:center;">5<input type="hidden" name="ass_aj_fullscore4" value="5"></td>
                    <td style="text-align:center;"><input type="number" class="form-control" name="ass_aj_score4" max="5" min="0" required></td>
                  </tr>
                  <tr>
                    <td><strong>5. วิธีการศึกษา (Method of Education)</strong></td>
                    <td style="text-align:center;">20<input type="hidden" name="ass_aj_fullscore5" value="20"></td>
                    <td style="text-align:center;"><input type="number" class="form-control" name="ass_aj_score5" max="20" min="0" required></td>
                  </tr>
                  <tr>
                    <td><strong>6. ผลการศึกษา  (Result)</strong></td>
                    <td style="text-align:center;">10<input type="hidden" name="ass_aj_fullscore6" value="10"></td>
                    <td style="text-align:center;"><input type="number" class="form-control" name="ass_aj_score6" max="10" min="0" required></td>
                  </tr>
                  <tr>
                    <td><strong>7. วิเคราะห์ผลการศึกษา (Analysis)</strong></td>
                    <td style="text-align:center;">10<input type="hidden" name="ass_aj_fullscore7" value="10"></td>
                    <td style="text-align:center;"><input type="number" class="form-control" name="ass_aj_score7" max="10" min="0" required></td>
                  </tr>
                  <tr>
                    <td><strong>8. สรุปผลการศึกษา  (Conclusion)</strong></td>
                    <td style="text-align:center;">5<input type="hidden" name="ass_aj_fullscore8" value="5"></td>
                    <td style="text-align:center;"><input type="number" class="form-control" name="ass_aj_score8" max="5" min="0" required></td>
                  </tr>
                  <tr>
                    <td><strong>9. ข้อเสนอแนะหรือความคิดเห็น  (Comment)</strong></td>
                    <td style="text-align:center;">10<input type="hidden" name="ass_aj_fullscore9" value="10"></td>
                    <td style="text-align:center;"><input type="number" class="form-control" name="ass_aj_score9" max="10" min="0" required></td>
                  </tr>
                  <tr>
                    <td><strong>10. เอกสารอ้างอิง  (References)</strong></td>
                    <td style="text-align:center;">5<input type="hidden" name="ass_aj_fullscore10" value="5"></td>
                    <td style="text-align:center;"><input type="number" class="form-control" name="ass_aj_score10" max="5" min="0" required></td>
                  </tr>
                  <tr>
                    <td><strong>11. สำนวนการเขียนและการสื่อความหมาย (Idiom and meaning)</strong></td>
                    <td style="text-align:center;">5<input type="hidden" name="ass_aj_fullscore11" value="5"></td>
                    <td style="text-align:center;"><input type="number" class="form-control" name="ass_aj_score11" max="5" min="0" required></td>
                  </tr>
                  <tr>
                    <td><strong>12. ความถูกต้องของตัวสะกด  (Spelling)</strong></td>
                    <td style="text-align:center;">5<input type="hidden" name="ass_aj_fullscore12" value="5"></td>
                    <td style="text-align:center;"><input type="number" class="form-control" name="ass_aj_score12" max="5" min="0" required></td>
                  </tr>
                  <tr>
                    <td><strong>13. รูปแบบ และความสวยงาม ของรูปเล่ม (Pattern)</strong></td>
                    <td style="text-align:center;">5<input type="hidden" name="ass_aj_fullscore13" value="5"></td>
                    <td style="text-align:center;"><input type="number" class="form-control" name="ass_aj_score13" max="5" min="0" required></td>
                  </tr>
                  <tr>
                    <td><strong>14. ภาคผนวก (Appendix)</strong></td>
                    <td style="text-align:center;">5<input type="hidden" name="ass_aj_fullscore14" value="5"></td>
                    <td style="text-align:center;"><input type="number" class="form-control" name="ass_aj_score14" max="5" min="0" required></td>
                  </tr>
                  <tr>
                    <td colspan="3"><strong>ข้อคิดเห็นเพิ่มเติม</strong>
                    <br> <textarea name="ass_aj_detail" class="form-control" rows="3" required></textarea></td>
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
    <? include 'footer.php'; ?>
    <!--END FOOTER -->


     <!-- GLOBAL SCRIPTS -->
    <script src="assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->


      <!-- PAGE LEVEL SCRIPT-->
 <script src="assets/js/jquery-ui.min.js"></script>
 <script src="assets/plugins/uniform/jquery.uniform.min.js"></script>
<script src="assets/plugins/inputlimiter/jquery.inputlimiter.1.3.1.min.js"></script>
<script src="assets/plugins/chosen/chosen.jquery.min.js"></script>
<script src="assets/plugins/colorpicker/js/bootstrap-colorpicker.js"></script>
<script src="assets/plugins/tagsinput/jquery.tagsinput.min.js"></script>
<script src="assets/plugins/validVal/js/jquery.validVal.min.js"></script>
<script src="assets/plugins/daterangepicker/daterangepicker.js"></script>
<script src="assets/plugins/daterangepicker/moment.min.js"></script>
<script src="assets/plugins/datepicker/js/bootstrap-datepicker.js"></script>
<script src="assets/plugins/timepicker/js/bootstrap-timepicker.min.js"></script>
<script src="assets/plugins/switch/static/js/bootstrap-switch.min.js"></script>
<script src="assets/plugins/jquery.dualListbox-1.3/jquery.dualListBox-1.3.min.js"></script>
<script src="assets/plugins/autosize/jquery.autosize.min.js"></script>
<script src="assets/plugins/jasny/js/bootstrap-inputmask.js"></script>
       <script src="assets/js/formsInit.js"></script>
        <script>
            $(function () { formInit(); });
        </script>
        
     <!--END PAGE LEVEL SCRIPT-->
     
</body>
     <!-- END BODY -->
</html>
