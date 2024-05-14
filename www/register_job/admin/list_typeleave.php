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


                        <h2> การจัดการข้อมูลประเภทการลา </h2>



                    </div>
                </div>

                <hr />

                <p><a href="form_typeleave.php"><button class="btn btn-primary dropdown-toggle"><i class="icon-plus"></i> เพิ่มข้อมูลประเภทการลา</button></a></p>
                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            ข้อมูลประเภทการลา
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                        	<th style="text-align:center; width:15%">#</th>
                                            <th style="text-align:center; width:70%">ชื่อประเภทการลา</th>
                                            <th style="text-align:center; width:15%">จัดการ</th>
                                        </tr>
                                    </thead>
                                    <?
										 $num=1;
										 if($_GET["Action"] == "Del")
										  {
											  $strSQL = "update type_leave set tleave_status = 'C' WHERE tleave_id = '".$_GET["tleave_id"]."' ";
											  $stmt = mysqli_query($conn,$strSQL);
										  }
									  
										  $num=1;
										  $strSQL = "SELECT * FROM type_leave where tleave_status != 'C' ";
										  $stmt  = mysqli_query($conn,$strSQL);
										  while($row = mysqli_fetch_array($stmt)){
											  $strSQL_emp = "SELECT * FROM leavela where type_leave = '".$row["tleave_id"]."' ";
										  	  $stmt_emp  = mysqli_query($conn,$strSQL_emp);
										  	  $row_num = mysqli_num_rows($stmt_emp);
									?>
                                        <tr>
                                          <td style="text-align:center;"><?=$row[tleave_id];?></td>
                                          <td><?=$row[tleave_name];?></a></td>
                                          <td style="text-align:center;">
                                            <a href="edit_typeleave.php?tleave_id=<?=$row["tleave_id"];?>" class="btn btn-warning"><i class="icon-edit"></i></a>
                                            <? if($row_num == ''){ ?>
                                            <a href="JavaScript:if(confirm('คุณต้องการลบประเภทการลาชื่อ?')==true){window.location='<?=$_SERVER["PHP_SELF"];?>?Action=Del&tleave_id=<?=$row["tleave_id"];?>';}" class="btn btn-danger"><i class="icon-trash"></i></a>
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
             $('#dataTables-example').dataTable();
         });
    </script>
     <!-- END PAGE LEVEL SCRIPTS -->
</body>
     <!-- END BODY -->
</html>
