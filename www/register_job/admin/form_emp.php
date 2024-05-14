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
                    <h2 class="page-header">เพิ่มข้อมูลคณาจารย์</h2>
                </div>
            </div>
                     
                    
                    
                                

<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>กรอกรายละเอียดข้อมูลคณาจารย์</h5>
        </header>
        <div id="div-1" class="accordion-body collapse in body">
            <form method="post" action="add_emp.php" class="form-horizontal" enctype="multipart/form-data">
              <h4 class="form-signin-heading" align="center"></h4>
                  <div class="form-group">
                      <label class="control-label col-sm-3">คณะ :</label>
                      <div class="col-sm-5">
                          <select name="dep_id" class="form-control" onchange="window.location='?club_id=<?=$_GET[club_id];?>&title_id=<?=$_GET[title_id];?>&dep_id='+this.value" required>
                            <option value="">คณะ</option>
                            <?
								$sql_dep = "SELECT * FROM department where dep_status != 'C' ORDER BY dep_name ASC ";
								$stm_dep = mysqli_query($conn,$sql_dep);
								while($row_dep = mysqli_fetch_array($stm_dep)){
							  ?>
                                <option value="<?=$row_dep[dep_id];?>" <? if($row_dep[dep_id] == $_GET[dep_id]){echo 'selected'; } ?>><?=$row_dep[dep_name];?></option>
                            <?  } ?>
                          </select>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-3">สาขา :</label>
                      <div class="col-sm-5">
                          <select name="saka_id" class="form-control" onchange="window.location='?club_id=<?=$_GET[club_id];?>&dep_id=<?=$_GET[dep_id];?>&saka_id='+this.value" required>
                          	<option value="">สาขา</option>
                            <?
								$sql_saka = "SELECT * FROM saka where saka_status != 'C' and dep_id = '".$_GET[dep_id]."' ORDER BY saka_name ASC ";
								$stm_saka = mysqli_query($conn,$sql_saka);
								while($row_saka = mysqli_fetch_array($stm_saka)){
							?>
                            		<option value="<?=$row_saka[saka_id];?>" <? if($row_saka[saka_id] == $_GET[saka_id]){echo 'selected'; } ?>><?=$row_saka[saka_name];?></option>
                            <?	} ?>
                          </select>
                      </div>
                  </div>
                  
                  <div class="form-group">
                      <label class="control-label col-sm-3">ชื่อ-นามสุกล :</label>
                      <div class="col-sm-2">
                          <select name="title_id" class="form-control" required>
                          	<option value="">คำนำหน้า</option>
                            <?
								$sql = "SELECT * FROM titlename where title_status != 'C' ORDER BY title_name ASC ";
								$stm = mysqli_query($conn,$sql);
								while($row = mysqli_fetch_array($stm)){
							?>
                            		<option value="<?=$row[title_id];?>" <? if($row[title_id] == $_GET[title_id]){echo 'selected'; } ?>><?=$row[title_name];?></option>
                            <?	} ?>
                          </select>
                      </div>
                      <div class="col-sm-3">
                      		<input type="text" class="form-control" placeholder="ชื่อ" name="emp_name" required>
                      </div>
					  <div class="col-sm-3">
                      		<input type="text" class="form-control" placeholder="นามสุกล" name="emp_surname" required>
                      </div>
                  </div>
                  
                  <div class="form-group">
                      <label class="control-label col-sm-3">ตำแหน่ง :</label>
                      <div class="col-sm-5">
                          <select name="po_id" class="form-control" required>
                          	<option value="">ตำแหน่ง</option>
                            <?
								$sql_po = "SELECT * FROM position where po_status != 'C' ORDER BY po_name ASC ";
								$stm_po = mysqli_query($conn,$sql_po);
								while($row_po = mysqli_fetch_array($stm_po)){
							?>
                            		<option value="<?=$row_po[po_id];?>" <? if($row_po[po_id] == $row[po_id]){echo 'selected'; } ?>><?=$row_po[po_name];?></option>
                            <?	} ?>
                          </select>
                      </div>
                  </div>
                  
                  <div class="form-group">
                      <label class="control-label col-sm-3">เพศ :</label>
                      <div class="col-sm-3">
                          <select name="emp_sex" class="form-control" required>
                      <option value="">เพศ</option>
                      <option value="ชาย" <? if($_GET[mem_sex] == 'ชาย'){echo 'selected'; } ?>>ชาย</option>
                      <option value="หญิง" <? if($_GET[mem_sex] == 'หญิง'){echo 'selected'; } ?>>หญิง</option>
                    </select>
                      </div>
                  </div>
                  
                  <div class="form-group">
                      <label class="control-label col-sm-3">เบอร์โทรศัพท์ :</label>
                      <div class="col-sm-3">
                          <input type="text" class="form-control" placeholder="เบอร์โทรศัพท์" maxlength="10" name="emp_mobile" OnKeyPress="return chkNumber(this)" required>
                      </div>
                  </div>
                  
                  <div class="form-group">
                      <label class="control-label col-sm-3">อีเมล์ :</label>
                      <div class="col-sm-3">
                          <input type="email" class="form-control" placeholder="อีเมล์" name="emp_email" required>
                      </div>
                  </div>
					  
					  <div class="form-group">
                      <label class="control-label col-sm-3">ที่อยู่ :</label>
                      <div class="col-sm-3">
                          <input  type="text" class="form-control" placeholder="ที่อยู่" name="emp_num" required>
                      </div>
                  </div>
					   <div class="form-group">
                      <label class="control-label col-sm-3">ตำบล :</label>
                      <div class="col-sm-3">
                          <input  type="text" class="form-control" placeholder="ตำบล" name="emp_tum" required>
                      </div>  
                  </div>
					   <div class="form-group">
                      <label class="control-label col-sm-3">อำเภอ :</label>
                      <div class="col-sm-3">
                          <input  type="text" class="form-control" placeholder="อำเภอ" name="emp_aum" required>
                      </div>  
                  </div>
					   <div class="form-group">
                      <label class="control-label col-sm-3">จังหวัด :</label>
                      <div class="col-sm-3">
                         <select name="prov_id" class="form-control" required>
                            <?
								$sql_pro = "SELECT * FROM provinces where prov_status != 'C' ORDER BY prov_name ASC ";
								$stm_pro = mysqli_query($conn,$sql_pro);
								while($row_pro = mysqli_fetch_array($stm_pro)){
							?>
                            		<option value="<?=$row_pro[prov_id];?>" <? if($row_pro[prov_id] == $row[prov_id]){echo 'selected'; } ?>><?=$row_pro[prov_name];?></option>
                            <?	} ?>
                          </select>
                      </div>  
                  </div>
					 <div class="form-group">
                      <label class="control-label col-sm-3">รหัสไปรษณีย์ :</label>
                      <div class="col-sm-3">
                          <input  type="text" class="form-control" placeholder="รหัสไปรษณีย์" name="emp_zip" required>
                      </div>  
                  </div> 
					  <div class="form-group">
                      <label class="control-label col-sm-3">รหัสคณาจารย์ :</label>
                      <div class="col-sm-3">
                          <input  type="text" class="form-control" placeholder="รหัสคณาจารย์" name="username"  maxlength="8" required>
                      </div>  
                  </div> 
                  
                  
                  <div class="form-group">
                      <label class="control-label col-sm-3">Password :</label>
                      <div class="col-sm-3">
                          <input type="password" class="form-control" placeholder="Password " name="password" required>
                      </div>
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
