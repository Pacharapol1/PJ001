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
		window.location.href = "../login.php";
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


                        <h2> ข้อมูลการสมัครสหกิจศึกษา</h2>



                    </div>
                </div>

                <hr />
<!--<p><a href="form_club.php"><button class="btn btn-primary dropdown-toggle"><i class="icon-plus"></i> เพิ่มข้อมูลสถานประกอบการ</button></a></p>-->

                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                           ข้อมูลการสมัครสหกิจศึกษา
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                        	<th style="text-align:center;">วันที่สมัคร</th>
                                            <th style="text-align:center;">ชื่อผู้สมัคร</th>
                                            <th style="text-align:center;">ชื่อบริษัท</th>
                                            <th style="text-align:center;">ตำแหน่งงาน</th>
                                            <th style="text-align:center;">สถานะ</th>
                                            <th style="text-align:center;">ดูรายละเอียด</th>
                                        </tr>
                                    </thead>
                                    <?
										 $num=1;
										 $strSQL = "SELECT * FROM register_work
										  inner join club_work on club_work.work_id = register_work.work_id
										  inner join position on position.po_id = club_work.work_name
										  inner join club on club.club_id = club_work.club_id
										  inner join member on member.mem_id = register_work.mem_id ";
										$stmt  = mysqli_query($conn,$strSQL);
										  while($row = mysqli_fetch_array($stmt)){
									?>
                                        <tr>
                                          <td style="text-align:center;"><?=date('d/m', strtotime($row[re_date]));?>/<?=date('Y', strtotime($row[re_date]))+543;?></td>
										  <td><?=$row[mem_name];?> <?=$row[mem_last];?></td>
                                          <td><?=$row[club_name];?></td>
                                          
                                          <td><?=$row[po_name];?></td>
                                          <td style="text-align:center;">
                                          <?
                                               if($row[re_status] == 'W'){
													echo '<font color="#FF6600">รออนุมัติ</font>';
												}else if($row[re_status] == '1'){
													echo '<font color="#FF6600">รอผลสัมภาษณ์</font>';
												}else if($row[re_status] == '1N'){
													echo '<font color="#FF0000">ไม่ผ่านการสัมภาษณ์</font>';
												}else if($row[re_status] == '2'){
													echo '<font color="#FF6600">รอผลการทดสอบ</font>';
												}else if($row[re_status] == 'Y'){
													echo '<font color="#009900">ผ่านการเข้างาน</font>';
												}else if($row[re_status] == '3' && $row[re_status_office] == ''){
													echo '<font color="#FF6600">รอผู้ประกอบการนัดหมาย</font>';
												}else if($row[re_status] == '3' && $row[re_status_office] == '1'){
													echo '<font color="#FF6600">รอผลการคัดเลือก</font>';
												}else if($row[re_status] == 'C'){
													echo '<font color="#FF0000">ไม่อนุมัติ</font>';
												}else if($row[re_status] == 'N'){
													echo '<font color="#FF0000">ไม่ผ่านการเข้างาน</font>';
												}
                                          ?>
                                          </td>
                                          <td style="text-align:center;">
                                                <a href="view_register.php?re_id=<?=$row["re_id"];?>&mem_id=<?=$row["mem_id"];?>" class="btn btn-info btn-sm"><i class="icon-search"></i> รายละเอียด</a>
                                          </td>
                                        </tr>
                                     <? $num++; } ?>
                                    </tbody>
                                </table>
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
             $('#dataTables-example').dataTable();
         });
    </script>
     <!-- END PAGE LEVEL SCRIPTS -->
</body>
     <!-- END BODY -->
</html>
