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
                        <h2>รายงานผลประเมินโครงการ</h2>
                    </div>
                </div>
                <hr />

                <div class="row">
                <div class="col-lg-12">   
                 <div class="panel panel-info">
                        <div class="panel-heading">
                            รายงานผลประเมินโครงการ
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                            <?
								if($_POST[club_id] == 'all' && $_POST[calendar_id] == 'all'){
									$strSQL_gp = "SELECT * FROM injo_project 
									  inner join calendar on calendar.calendar_id = injo_project.calendar_id
									  inner join club on club.club_id = calendar.club_id
									  group by injo_project.calendar_id ";
								}else if($_POST[club_id] == 'all' && $_POST[calendar_id] != 'all'){
									$strSQL_gp = "SELECT * FROM injo_project 
									  inner join calendar on calendar.calendar_id = injo_project.calendar_id
									  inner join club on club.club_id = calendar.club_id
									  where calendar.calendar_id = '".$_POST[calendar_id]."' group by injo_project.calendar_id ";
								}else if($_POST[club_id] != 'all' && $_POST[calendar_id] == 'all'){
									$strSQL_gp = "SELECT * FROM injo_project 
									  inner join calendar on calendar.calendar_id = injo_project.calendar_id
									  inner join club on club.club_id = calendar.club_id
									  where calendar.club_id = '".$_POST[club_id]."' group by injo_project.calendar_id ";
								}else if($_POST[club_id] != 'all' && $_POST[calendar_id] != 'all'){
									$strSQL_gp = "SELECT * FROM injo_project 
									  inner join calendar on calendar.calendar_id = injo_project.calendar_id
									  inner join club on club.club_id = calendar.club_id
									  where calendar.club_id = '".$_POST[club_id]."' and calendar.calendar_id = '".$_POST[calendar_id]."' group by injo_project.calendar_id ";
								}
								$stmt_gp  = mysqli_query($conn,$strSQL_gp);
								$row_gp = mysqli_fetch_array($stmt_gp);
							?>
                            	<div align="center">
                                <h3><?=$row_gp[club_name];?></h3>
                                </div>
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example2">
                                    <thead>
                                        <tr>
                                        
                                        	<th style="text-align:center;">วันที่เริ่ม</th>
                                            <th style="text-align:center;">วันที่สิ้นสุด</th>
                                            <th style="text-align:center;">ชื่อโครงการ</th>
                                            <th style="text-align:center;">ผลการประเมิน</th>
                                        </tr>
                                    </thead>
                                    <?
										  $num=1;
										  $strSQL = "SELECT * FROM calendar 
												inner join club on club.club_id = calendar.club_id
												where calendar.calendar_id = '".$row_gp[calendar_id]."' and calendar.calendar_answer != '' ORDER BY calendar.calendar_id DESC";
										  $stmt  = mysqli_query($conn,$strSQL);
										  while($row = mysqli_fetch_array($stmt)){
									?>
                                        <tr>
                                         
                                          <td style="text-align:center;"><?=date('d/m', strtotime($row[calendar_start]));?>/<?=date('Y', strtotime($row[calendar_start]))+543;?></td>

                                          <td style="text-align:center;"><?=date('d/m', strtotime($row[calendar_end]));?>/<?=date('Y', strtotime($row[calendar_end]))+543;?></td>
                                          
                                          <td><?=$row[calendar_name];?></td>
                                          <td style="text-align:center;">
                                          	<?
												if($row[calendar_answer] == 'W'){
													echo '<font color="#FF6600">รอคณะกรรมการประเมิน</font>';
												}else if($row[calendar_answer] == 'Y'){
													echo '<font color="#009900">ผ่าน</font>';
												}else if($row[calendar_answer] == 'C'){
													echo '<font color="#FF0000">ไม่ผ่าน</font>';
												}
											?>
                                          </td>
                                        </tr>
                                     <? $num++; } ?>
                                    </tbody>
                                </table>
                                <div align="center">
                                <a href="print_report_project_p.php?club_id=<?=$_POST[club_id];?>&calendar_id=<?=$_POST[calendar_id];?>" class="btn btn-primary" target="_blank">พิมพ์รายงาน</a> 
                        		<button type="button" class="btn btn-danger" onClick="window.history.back();">ย้อนกลับ</button>
                        		</div>
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
