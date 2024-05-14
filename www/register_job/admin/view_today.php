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
                        <h2>การบันทึกรายงานประจำวัน</h2>
                    </div>
                </div>
                <hr />


             
                <div class="row">
                <div class="col-lg-12">   
                 <div class="panel panel-info">
                        <div class="panel-heading">
                            การบันทึกรายงานประจำวัน
                        </div>
                        <div class="panel-body">
                        	<?
                        		$strSQL = "SELECT * FROM diary where mem_id = '".$_GET[mem_id]."' ";
								$stmt  = mysqli_query($conn,$strSQL);
								$numrow = mysqli_num_rows($stmt);
								if($numrow != ''){ 
							?>
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center; width:8%;">วันที่บันทึก</th>
                                            <th style="text-align:center; width:42%;">รายงานการปฏิบัติงาน</th>
                                            <th style="text-align:center; width:5%;">พิมพ์</th>
                                        </tr>
                                    </thead>
                                    <?
                                          
                                          while($row = mysqli_fetch_array($stmt)){
                                    ?>
                                        <tr>
                                          <td style="text-align:center;"><?=date('d/m', strtotime($row[diary_date]));?>/<?=date('Y', strtotime($row[diary_date]))+543;?></td>

                                          <td><?=$row[diary_report];?></td>
                                          <td style="text-align:center;"><a href="../print_diary.php?diary_id=<?=$row["diary_id"];?>" class="btn btn-info btn-sm" target="_blank"><i class="icon icon-print"></i></a></td>
                                        </tr>
                                     <? $num++; } ?>
                                    </tbody>
                                </table>
                                <? }else{ echo '<div align="center">---ยังไม่มีการบันทึกรายงานประจำวัน---</div>'; } ?>
                            </div>
                        </div>
                        <div align="center"><button class="btn btn-danger" type="button" onClick="window.history.back();">ย้อนกลับ</button>
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
