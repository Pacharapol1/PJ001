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
    <link href="assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
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
       <? include 'editor.php'; ?>
        <!--END MENU SECTION -->


        <!--PAGE CONTENT -->
        <div id="content">

            <div class="inner">
                <div class="row">
                    <div class="col-lg-12">


                        <h2>แบบประเมินผล </h2>



                    </div>
                </div>
                <hr />


             
                <div class="row">
                <div class="col-lg-12">   
                 <div class="panel panel-info">
                        <div class="panel-heading">
                            แบบประเมินผล
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <?
								  $num=1;
								  $strSQL = "SELECT * FROM calendar 
										inner join club_work on club_work.club_id = calendar.club_id
										inner join position on position.po_id = club_work.work_name
										inner join register_work on register_work.work_id = club_work.work_id
										inner join member on member.mem_id = register_work.mem_id
										inner join titlename on titlename.title_id = member.title_id
										where calendar.club_id = '".$_GET["club_id"]."' and calendar.calendar_id = '".$_GET["calendar_id"]."'
										group by calendar.emp_id
										ORDER BY calendar.calendar_id DESC ";
								  $stmt  = mysqli_query($conn,$strSQL);
								  $numrow = mysqli_num_rows($stmt);
								  if($numrow != ''){ 
							  ?>
								  <table class="table table-striped table-bordered table-hover" id="dataTables-example">
									  <thead>
										  <tr>
											  <th style="text-align:center;">รหัสนักศึกษา</th>
											  <th style="text-align:center;">ชื่อ-นามสกุล</th>
											  <th style="text-align:center;">ตำแหน่งงาน</th>
                                              <th style="text-align:center;">ประเมินผล (อาจารย์)</th>
											  <th style="text-align:center;">ประเมินผล (ผู้ประกอบการ)</th>
											  <th style="text-align:center;">ประเมินคุณภาพ</th>
										  </tr>
									  </thead>
									  <?
											
											while($row = mysqli_fetch_array($stmt)){
									  ?>
										  <tr>
											<td style="text-align:center;"><?=$row[mem_code];?></td>
											<td><?=$row[title_name];?><?=$row[mem_name];?> <?=$row[mem_last];?></td>
											<td><?=$row[po_name];?></td>
                                            <td style="text-align:center;">
											  <? if($row[calendar_status_aj] == ''){ ?>
													<a href="form_ass_aj.php?club_id=<?=$_GET[club_id];?>&re_id=<?=$row[re_id];?>&mem_id=<?=$row[mem_id];?>&calendar_id=<?=$_GET[calendar_id];?>" class="btn btn-success btn-sm"><i class="icon-check"></i> ประเมิน</a>
											 <? }else{ ?>
												<a href="../print_ass_aj.php?club_id=<?=$_GET[club_id];?>&re_id=<?=$row[re_id];?>&mem_id=<?=$row[mem_id];?>&ass_aj_date=<?=$row[ass_aj_date];?>&calendar_id=<?=$_GET[calendar_id];?>" class="btn btn-primary btn-sm" target="_blank"><i class="icon-print"></i> พิมพ์</a>
											 <? } ?>
											</td>
											<td style="text-align:center;">
											  <? if($row[calendar_office] == 'Y'){ ?>
													<a href="../print_ass_office.php?club_id=<?=$_GET[club_id];?>&re_id=<?=$row[re_id];?>&mem_id=<?=$row[mem_id];?>&calendar_id=<?=$_GET[calendar_id];?>" class="btn btn-primary btn-sm" target="_blank"><i class="icon-print"></i> พิมพ์</a>
											 <? }else{ echo '<font color="#FF6600">รอประเมิน</font>';} ?>
											</td>
											<td style="text-align:center;">
											  <? if($row[calendar_status_quality] == 'Y'){ ?>
													<a href="../print_quality.php?club_id=<?=$_GET[club_id];?>&re_id=<?=$row[re_id];?>&mem_id=<?=$row[mem_id];?>&calendar_id=<?=$_GET[calendar_id];?>" class="btn btn-primary btn-sm" target="_blank"><i class="icon-print"></i> พิมพ์</a>
											 <? }else{ echo '<font color="#FF6600">รอประเมิน</font>';} ?>
											</td>
										  </tr>
									   <? $num++; } ?>
									  </tbody>
								  </table>
								  <? }else{ echo '<div align="center">---ยังไม่มีการนัดนิเทศงาน---</div>'; } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            </div>
        </div>
       <!--END PAGE CONTENT -->
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
        <!-- PAGE LEVEL SCRIPTS -->
    <script src="assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="assets/plugins/dataTables/dataTables.bootstrap.js"></script>
     <script>
         $(document).ready(function () {
				$('#dataTables-example').dataTable({
					"order": [[ 0, "asc" ]]
				} );
            });
    </script>
     <!-- END PAGE LEVEL SCRIPTS -->
</body>
     <!-- END BODY -->
</html>
