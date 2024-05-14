﻿<? 
@session_start();
include 'connectDb.php';
$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
	mysqli_set_charset($conn, "utf8");
	error_reporting(~E_NOTICE);
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
   
    <!-- END PAGE LEVEL  STYLES -->
   <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
<script src="module/editor/jscripts/tiny_mce/tiny_mce.js"></script>
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
		<? include 'editor.php'; ?>
       <!--PAGE CONTENT -->
        <div id="content">
           
                <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">แก้ไขประกาศการทดสอบ</h2>
                </div>
            </div>
                     
                    
                    
                                

<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>กรอกข้อมูลประกาศการทดสอบ</h5>
        </header>
        <?
			$strSQL = "SELECT * FROM tests where tests_id = '$_GET[tests_id]' ";
			$stmt  = mysqli_query($conn,$strSQL);
			$row = mysqli_fetch_array($stmt);
		?>
        <div id="div-1" class="accordion-body collapse in body">
            <form method="post" action="update_tests.php" class="form-horizontal" enctype="multipart/form-data">
              <input type="hidden" name="tests_id" value="<?=$_GET[tests_id];?>">
              <input type="hidden" name="mem_id" value="<?=$_GET[mem_id];?>">
              <input type="hidden" name="tests_count" value="<?=$_GET[tests_count];?>">
              <h4 class="form-signin-heading" align="center"></h4>
                  <div class="form-group">
                      <label class="control-label col-sm-3">ภาคเรียนที่ :</label>
                      <div class="col-sm-3">
                          <select name="year_id" class="form-control" required>
                            <?
								$sql_year = "SELECT * FROM tb_year 
									where year_end >= '".date('Y-m-d')."' ORDER BY year_name ASC ";
								$stm_year = mysqli_query($conn,$sql_year);
								while($row_year = mysqli_fetch_array($stm_year)){
							  ?>
                                <option value="<?=$row_year[year_id];?>" <? if($row_year[year_id] == $row[year_id]){echo 'selected'; } ?>><?=$row_year[year_term];?>/<?=$row_year[year_name];?></option>
                            <?  } ?>
                          </select>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-3">วันที่นัดสัมภาษณ์  :</label>
                      <div class="col-sm-3">
                           <input class="form-control" type="date" name="tests_date" value="<?=$row[tests_date];?>" required>
                      </div> 
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-3">เวลานัดสัมภาษณ์  :</label>
                      <div class="col-sm-3">
                           <input class="form-control" type="time" name="tests_time" value="<?=$row[tests_time];?>" required>
                      </div> 
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-3">สถานที่  :</label>
                      <div class="col-sm-5">
                           <input class="form-control" type="text" name="tests_place" value="<?=$row[tests_place];?>" required>
                      </div> 
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-3">รายละเอียด  :</label>
                      <div class="col-sm-5">
                           <textarea name="tests_detail" class="form-control" rows="3"><?=$row[tests_detail];?></textarea>
                      </div> 
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-3">วันที่ประกาศ  :</label>
                      <div class="col-sm-3">
                           <input class="form-control" type="date" name="tests_date_start" min="<?=date('Y-m-d');?>" value="<?=$row[tests_date_start];?>" required>
                      </div> 
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-3">วันที่สิ้นสุด  :</label>
                      <div class="col-sm-3">
                           <input class="form-control" type="date" name="tests_date_end" min="<?=date('Y-m-d');?>" value="<?=$row[tests_date_end];?>" required>
                      </div> 
                  </div>
                  <div class="form-group">
              			<label class="control-label col-sm-3"></label>
                        <div class="col-sm-3">
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