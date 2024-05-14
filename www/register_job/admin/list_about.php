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
                        <h2>ประเมินการนำเสนอผลงาน </h2>
                    </div>
                </div>
                <hr />


             
                <div class="row">
                <div class="col-lg-12">   
                 <div class="panel panel-info">
                        <div class="panel-heading">
                            ประเมินการนำเสนอผลงาน
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                        
                                        	<th style="text-align:center;">วันที่ส่งผลงาน</th>
                                            <th style="text-align:center;">ชื่อผู้ประกอบการ</th>
                                            <th style="text-align:center;">ชื่อนักศึกษา</th>
                                            <th style="text-align:center;">ไฟล์ผลงาน</th>
                                            <th style="text-align:center; width:15%;">ประเมิน</th>
                                        </tr>
                                    </thead>
                                    <?
										 $num=1;
										 if($_GET["Action"] == "Del")
										  {
											  $strSQL = "UPDATE about SET about_status = 'C' WHERE about_id = '".$_GET["about_id"]."' ";
											  $stmt = mysqli_query($conn,$strSQL);
										  }
										  if($_GET["Action"] == "Yes")
										  {
											  $strSQL = "UPDATE about SET about_status = 'Y' WHERE about_id = '".$_GET["about_id"]."' ";
											  $stmt = mysqli_query($conn,$strSQL);
										  }
									  
										  $num=1;
										  $strSQL = "SELECT * FROM about ";
										  $stmt  = mysqli_query($conn,$strSQL);
										  while($row = mysqli_fetch_array($stmt)){
											  $sqlq = "SELECT * FROM member
												inner join register_work on register_work.mem_id = member.mem_id
												inner join club_work on club_work.work_id = register_work.work_id
												inner join club on club.club_id = club_work.club_id
												inner join titlename on titlename.title_id = member.title_id
												where member.mem_id = '".$row[mem_id]."' ";
											  $stmtq  = mysqli_query($conn,$sqlq);
										      $rowq = mysqli_fetch_array($stmtq);
									?>
                                        <tr>
                                         
                                          <td style="text-align:center;"><?=date('d/m', strtotime($row[about_date]));?>/<?=date('Y', strtotime($row[about_date]))+543;?></td>
										  <td><?=$rowq[club_name];?></td>
                                          <td><?=$rowq[title_name];?><?=$rowq[mem_name];?> <?=$rowq[mem_last];?></td>
                                          <td style="text-align:center;">
                                          	<a href="../<?=$row[about_file];?>" target="_blank">ไฟล์นำเสนอผลงาน</a>
                                          </td>
                                          <td style="text-align:center;">
                                          <? if($row[about_status] == ''){ ?>
                                            <a href="JavaScript:if(confirm('คุณต้องการอนุมัติไฟล์ผลงาน ?')==true){window.location='<?=$_SERVER["PHP_SELF"];?>?Action=Yes&about_id=<?=$row["about_id"];?>';}" class="btn btn-success btn-sm"><i class="icon-check"></i></a>
                                            <a href="JavaScript:if(confirm('คุณไม่ต้องการอนุมัติไฟล์ผลงาน ?')==true){window.location='<?=$_SERVER["PHP_SELF"];?>?Action=Del&about_id=<?=$row["about_id"];?>';}" class="btn btn-danger btn-sm"><i class="icon-trash"></i></a>
                                           <? }else if($row[about_status] == 'Y' && $row[about_ass] == ''){ ?>
                                           		<a href="form_ass_about.php?about_id=<?=$row[about_id];?>" class="btn btn-success btn-sm"><i class="icon-check"></i> ประเมิน</a>
										   <? }else{ ?>
                                           		<a href="../print_about.php?about_id=<?=$row[about_id];?>" class="btn btn-primary btn-sm" target="_blank"><i class="icon-print"></i> พิมพ์</a>
                                           <? } ?>
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
				$('#dataTables-example').dataTable({
					"order": [[ 0, "asc" ]]
				} );
            });
    </script>
     <!-- END PAGE LEVEL SCRIPTS -->
</body>
     <!-- END BODY -->
</html>
