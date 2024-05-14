<? 
@session_start();
include 'connectDb.php';
$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
	mysqli_set_charset($conn, "utf8");
	error_reporting(~E_NOTICE);
	if($_SESSION["full_name"] == ''){
?>
	<script>
		alert("กรุณาเข้าสู่ระบบ");
		window.location.href = "../index.php";
	</script>
<?	} ?>
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


                        <h2> รายงานผู้เข้าร่วมโครงการ</h2>



                    </div>
                </div>

                <hr />

                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            รายชื่อ
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
                                <h4><?=$row_gp[calendar_name];?></h4>
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example2">
                                    <thead>
                                        <tr>
                                        	<th style="text-align:center; width:5%">รหัส</th>
                                            <th style="text-align:center; width:15%">ชื่อ-นามสกุล</th>
                                            <th style="text-align:center; width:8%">เบอร์โทร</th>
                                            <th style="text-align:center; width:12%">คณะ</th>
                                            <th style="text-align:center; width:15%">สาขา</th>
                                            <th style="text-align:center; width:10%">สถานะ</th>
                                        </tr>
                                    </thead>
                                    <?
										  $num=1;
										  $strSQL = "SELECT * FROM injo_project 
										  	inner join member on member.mem_id = member.mem_id
										  	inner join titlename on titlename.title_id = member.title_id
											inner join department on department.dep_id = member.dep_id
											inner join saka on saka.saka_id = member.saka_id
											inner join club on club.club_id = member.club_id
											where injo_project.calendar_id = '".$row_gp[calendar_id]."' group by injo_project.calendar_id ";
										  $stmt  = mysqli_query($conn,$strSQL);
										  while($row = mysqli_fetch_array($stmt)){
									?>
                                        <tr>
                                          <td style="text-align:center;"><?=$row[mem_id];?></td>
                                          <td><?=$row[title_name];?><?=$row[mem_name];?></td>
                                          <td style="text-align:center;"><?=$row[mem_mobile];?></td>
                                          <td><?=$row[dep_name];?></td>
                                          <td><?=$row[saka_name];?></td>
                                          <td style="text-align:center;">
                                          	<?
												if($row[injo_status] == 'W'){
													echo '<font color="#FF6600">รออนุมัติ</font>';
												}else if($row[injo_status] == 'Y'){
													echo '<font color="#009900">อนุมัติ</font>';
												}else if($row[injo_status] == 'N'){
													echo '<font color="#FF0000">ไม่อนุมัติ</font>';
												}
											?>
                                           </td>
                                        </tr>
                                     <? $num++; } ?>
                                    </tbody>
                                </table>
                                <div align="center">
                                <a href="print_report_info.php?club_id=<?=$_POST[club_id];?>&calendar_id=<?=$_POST[calendar_id];?>" class="btn btn-primary" target="_blank">พิมพ์รายงาน</a> 
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
				});	
            });
    </script>
     <!-- END PAGE LEVEL SCRIPTS -->
</body>
     <!-- END BODY -->
</html>
