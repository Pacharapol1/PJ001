<? 
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
    <title><?=$_SESSION[title];?></title>
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
<script language="JavaScript">
  function chkNumber(ele)
  {
  	var vchar = String.fromCharCode(event.keyCode);
 	 if ((vchar<'0' || vchar>'9') && (vchar != '.')){
		alert("กรุณากรอกเฉพาะตัวเลขเท่านั้น");
		return false;
	 }else{
  		ele.onKeyPress=vchar;
	 }
  }
</script>

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

       <!--PAGE CONTENT -->
        <div id="content">
           
                <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">แต่งตั้งอาจารย์ที่ปรึกษา</h2>
                </div>
            </div>
                     
                    
                    
                                

<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>กรอกรายละเอียด</h5>
        </header>
        <div id="div-1" class="accordion-body collapse in body">
        <?
			$strSQL = "SELECT * FROM member where mem_id = '$_GET[mem_id]' ";
			$stmt  = mysqli_query($conn,$strSQL);
			$row = mysqli_fetch_array($stmt);
		?>
            <form method="post" action="update_con.php" class="form-horizontal" enctype="multipart/form-data">
            <input type="hidden" class="form-control" name="mem_id" value="<?=$row[mem_id];?>" required>
              <h4 class="form-signin-heading" align="center"></h4>
              	  <div class="form-group">
                      <label class="control-label col-sm-3">ภาคเรียนที่ :</label>
                      <div class="col-sm-3">
                          <select name="year_id" class="form-control" required>
                            <option value="">เลือก</option>
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
                      <label class="control-label col-sm-3">อาจารย์ที่ปรึกษาหลัก :</label>
                      <div class="col-sm-5">
                          <select name="emp_id1" class="form-control" required>
                            <option value="">เลือก</option>
                            <?
								$sql_dep = "SELECT * FROM employee 
									inner join titlename on titlename.title_id = employee.title_id
									where employee.emp_status != 'C' ORDER BY employee.emp_name ASC ";
								$stm_dep = mysqli_query($conn,$sql_dep);
								while($row_dep = mysqli_fetch_array($stm_dep)){
							  ?>
                                <option value="<?=$row_dep[emp_id];?>" <? if($row_dep[emp_id] == $_GET[emp_id]){echo 'selected'; } ?>><?=$row_dep[title_name];?><?=$row_dep[emp_name];?> <?=$row_dep[emp_surname];?></option>
                            <?  } ?>
                          </select>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-3">อาจารย์ที่ปรึกษาร่วม :</label>
                      <div class="col-sm-5">
                          <select name="emp_id2" class="form-control" required>
                          	<option value="">เลือก</option>
                            <?
								$sql_saka = "SELECT * FROM employee 
									inner join titlename on titlename.title_id = employee.title_id
									where employee.emp_status != 'C' ORDER BY employee.emp_name ASC ";
								$stm_saka = mysqli_query($conn,$sql_saka);
								while($row_saka = mysqli_fetch_array($stm_saka)){
							?>
                            		<option value="<?=$row_saka[emp_id];?>" ><?=$row_saka[title_name];?><?=$row_saka[emp_name];?> <?=$row_saka[emp_surname];?></option>
                            <?	} ?>
                          </select>
                      </div>
                  </div>
                  <div class="form-group">
              			<label class="control-label col-sm-3"></label>
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
