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
		window.location.href = "index.php";
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


                        <h2> กระดาษถาม-ตอบ </h2>



                    </div>
                </div>

                <hr />


                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                           กระดาษถาม-ตอบ
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                        	<th style="width: 8%; text-align: center;">ลำดับ</th>
                                             <th style="width: 42%; text-align: center;">หัวข้อกระทู้</th>
                                             <th style="width: 10%; text-align: center;">อ่าน</th>
                                             <th style="width: 10%; text-align: center;">ตอบ</th>
                                             <th style="width: 20%; text-align: center;">วันที่ตั้งกระทู้</th>
                                             <th style="width: 10%; text-align: center;">ลบกระทู้</th>
                                        </tr>
                                    </thead>
                                    <?
										if($_GET["Action"] == "Del")
										{
											$strSQL = "DELETE FROM questions WHERE id = '".$_GET["id"]."' ";
											$stmt = mysqli_query($conn,$strSQL);

											$strSQL = "DELETE FROM answers WHERE question_id = '".$_GET["id"]."' ";
											$stmt = mysqli_query($conn,$strSQL);
										}
									
										$i=1;
										$sql = "SELECT * FROM questions ORDER BY id DESC ";
										$query = mysqli_query($conn,$sql);
										while ($result = mysqli_fetch_assoc($query)){
									?>
                                        <tr class="odd gradeX">
                                          <td style="text-align: center;"><?php echo $i; ?></td>
                                         <td><a href="view_topic_admin.php?id=<?php echo $result['id']; ?>" target="_blank"><?php echo $result['topic']; ?></a></td>
                                         <td style="text-align: center;"><?php echo $result['view']; ?></td>
                                         <td style="text-align: center;"><?php echo $result['reply']; ?></td>
                                         <td style="text-align: center;"><?=date('d/m', strtotime($result[created]));?>/<?=date('Y', strtotime($result[created]))+543;?><br><?=date('H:i', strtotime($result[created]));?> น.</td>
                                         <td style="text-align: center;"><a href="JavaScript:if(confirm('ยืนยันการลบกระทู้ ?')==true){window.location='<?=$_SERVER["PHP_SELF"];?>?Action=Del&id=<?=$result["id"];?>';}" class="btn btn-danger btn-sm"> ลบ</a></td>
                                        </tr>
                                       <? $i++; } ?>
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
