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
<script src="module/editor/jscripts/tiny_mce/tiny_mce.js"></script>   
    <!-- END PAGE LEVEL  STYLES -->
   <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
<script language="javascript">
	function addRow(tableID) {

			var table = document.getElementById(tableID);

			var rowCount = table.rows.length;
			var row = table.insertRow(rowCount);
			
			var colCount = table.rows[0].cells.length;
			
			for(var i=0; i<colCount; i++) {
				var newcell	= row.insertCell(i);
				newcell.innerHTML = table.rows[1].cells[i].innerHTML;
				//alert(newcell.childNodes);
				switch(newcell.childNodes[0].type) {
					case "text":
							newcell.childNodes[0].value = "";
							break;
					case "checkbox":
							newcell.childNodes[0].checked = false;
							break;
					case "select-one":
							newcell.childNodes[0].selectedIndex = 0;
							break;
				}
			}
			document.getElementById('numtb').value = rowCount ;
		}

		function deleteRow(tableID2) {
			try {
			var table2 = document.getElementById(tableID2);
			var rowCount2 = table2.rows.length;
			for(var r=1; r<rowCount2; r++) {
				var row2 = table2.rows[r];
				var chkbox2 = row2.cells[0].childNodes[0];
				if(null != chkbox2 && true == chkbox2.checked) {
					table2.deleteRow(r);
					rowCount2--;
					r--;
					document.getElementById('numtb').value = rowCount2-1 ;
				}
			}
			
			}catch(e) {
				alert(e);
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
       <? include 'editor.php'; ?>
        <!--END MENU SECTION -->

       <!--PAGE CONTENT -->
        <div id="content">
           
                <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">แก้ไขภาพกิจกรรม</h2>
                </div>
            </div>
                     
                    
                    
                                

<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>กรอกรายละเอียด</h5>
        </header>
        <?
			$strSQL = "SELECT * FROM portfolio where portfolio_id = '$_GET[portfolio_id]' ";
			$stmt  = mysqli_query($conn,$strSQL);
			$row = mysqli_fetch_array($stmt);
		?>
        <div id="div-1" class="accordion-body collapse in body">
            <form method="post" action="update_act.php" class="form-horizontal" enctype="multipart/form-data">
              <input type="hidden" name="portfolio_id" value="<?=$row[portfolio_id];?>">
              <h4 class="form-signin-heading" align="center"></h4>
                  <div class="form-group">
                      <label class="control-label col-sm-3">ชื่อกิจกรรม :</label>
                      <div class="col-sm-5">
                          <input type="text" class="form-control" placeholder="ชื่อกิจกรรม" value="<?=$row[portfolio_name];?>" name="portfolio_name" required>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-3">รายละเอียด :</label>
                      <div class="col-sm-5">
                          <textarea name="portfolio_detail" class="form-control" rows="10"><?=$row[portfolio_detail];?></textarea>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-3">ภาคเรียนที่ :</label>
                      <div class="col-sm-3">
                          <select name="year_term" class="form-control" required>
                            <option value="">เลือก</option>
                            <option value="1" <? if($row[year_term] == 1){echo 'selected'; } ?>>1</option>
                            <option value="2" <? if($row[year_term] == 2){echo 'selected'; } ?>>2</option>
                            <option value="3" <? if($row[year_term] == 3){echo 'selected'; } ?>>3</option>
                          </select>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-3">ปีการศึกษา :</label>
                      <div class="col-sm-3">
                          <select name="year_id" class="form-control" required>
                            <option value="">เลือกปีการศึกษา</option>
                            <?
								$sql_year = "SELECT * FROM tb_year 
									where year_end >= '".date('Y-m-d')."' ORDER BY year_name ASC ";
								$stm_year = mysqli_query($conn,$sql_year);
								while($row_year = mysqli_fetch_array($stm_year)){
							  ?>
                                <option value="<?=$row_year[year_id];?>" <? if($row_year[year_id] == $row[year_id]){echo 'selected'; } ?>><?=$row_year[year_name];?></option>
                            <?  } ?>
                          </select>
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-3"> ภาพกิจกรรม </label>

                    <div class="col-sm-6">
                        <input type="button" value="+ เพิ่ม" class="btn btn-success btn-sm" onclick="addRow('dataTable')">
                        <input type="button" value="- ลบ" class="btn btn-danger btn-sm" onclick="deleteRow('dataTable')">
                        <table class="table table-bordered table-hover" id="dataTable">
                        <thead>
                            <tr>
                                <th style="width:10%; text-align:center;">ลบ</th>
                                <th style="width:90%; text-align:center;">ภาพ</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?
							$num=1;
							$strSQL_pic = "SELECT * FROM portfolio_pic where portfolio_id = '$_GET[portfolio_id]' ";
							$stmt_pic  = mysqli_query($conn,$strSQL_pic);
							while($row_pic = mysqli_fetch_array($stmt_pic)){
						?>
                            <tr>
                                <td style="width:2%;"><INPUT type="checkbox" name="chk" checked/></td>
                                <td>
                                <? if($row_pic[portfolio_pic] != ''){ ?>
                                <img src="portfolio/<?=$row_pic[portfolio_pic];?>" width="300">
                                <? } ?>
                                <input type="hidden" name="hdnOldFile<?=$num;?>" value="<?=$row_pic[portfolio_pic];?>">
                                <input class="form-control" id="portfolio_pic<?=$num;?>" type="file" name="portfolio_pic<?=$num;?>" >
                                </td>
                            </tr>
                        <? $num++; } ?>
                        <? if($num ==1){ $num = 2; }else{ $num = $num; } ?>
                        <input type="hidden" name="numtb" id="numtb" value="<?=$num-1;?>" />
                        </tbody>
                    </table>
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
