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





        <!--PAGE CONTENT -->
        <div id="content">

            <div class="inner">
                <div class="row">
                    <div class="col-lg-3">
					<?
						$strSQL_dep = "SELECT * FROM department where dep_id = '".$_GET[dep_id]."' ";
						$stmt_dep  = mysqli_query($conn,$strSQL_dep);
						$row_dep = mysqli_fetch_array($stmt_dep);
					?>
					
                        <h3> รายการจัดการข้อมูลไฟล์เอกสารของหน่วยงาน [<?=$row_dep[dep_name];?>]
                        <a href="form_doc.php?dep_id=<?=$_GET[dep_id];?>"><button class="btn btn-primary dropdown-toggle"><i class="icon-plus"></i> เพิ่มไฟล์เอกสาร</button></a>
                        </h3>



                    </div>
                </div>

                <hr />


                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            หน่วยงาน [<?=$row_dep[dep_name];?>]
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                        	<th style="text-align:center; width:20%">ประเภทเอกสาร</th>
                                        	<th style="text-align:center; width:65%">ชื่อไฟล์เอกสาร</th>
                                            <th style="text-align:center; width:15%">จัดการ</th>
                                        </tr>
                                    </thead>
                                    <?
										  $num=1;
										  if($_GET["Action"] == "Del")
										  {
											  $strSQL = "delete from document WHERE doc_id = '".$_GET["doc_id"]."' ";
											  $stmt = mysqli_query($conn,$strSQL);
										  }
										  $strSQL = "SELECT * FROM document
										  	inner join type_doc on type_doc.tdoc_id = document.tdoc_id
											where dep_id = '".$_GET[dep_id]."' ";
										  $stmt  = mysqli_query($conn,$strSQL);
										  while($row = mysqli_fetch_array($stmt)){
									?>
                                        <tr>
                                          <td><?=$row[tdoc_name];?></td>
                                          <td><?=$row[doc_name];?></a></td>
                                          <td style="text-align:center;">
                                            <a href="edit_doc.php?doc_id=<?=$row["doc_id"];?>&dep_id=<?=$_GET[dep_id];?>" class="btn btn-warning btn-sm">แก้ไข</a>
                                            <a href="JavaScript:if(confirm('คุณต้องการลบไฟล์เอกสาร?')==true){window.location='<?=$_SERVER["PHP_SELF"];?>?Action=Del&doc_id=<?=$row["doc_id"];?>';}" class="btn btn-danger btn-sm">ลบ</a>
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
