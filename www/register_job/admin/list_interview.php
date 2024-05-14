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

                        <h2> การประกาศสัมภาษณ์</h2>
                    </div>
                </div>

                <hr />
                <!--<p><a href="form_interview.php"><button class="btn btn-primary dropdown-toggle"><i class="icon-plus"></i> เพิ่มประกาศ</button></a></p>-->

                <div class="row">
                <div class="col-lg-12">   
                 <div class="panel panel-info">
                        <div class="panel-heading">
              
                            การประกาศสัมภาษณ์
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                        	<th style="text-align:center; width:10%;">วันที่นัด</th>
                                            <th style="text-align:center; width:20%;">บริษัท</th>
                                        	<th style="text-align:center; width:20%;">ชื่อ-นามสกุล</th>
                                            <th style="text-align:center; width:20%;">สถานที่</th>
                                            <th style="text-align:center; width:10%;">จัดการ</th>
                                        </tr>
                                    </thead>
                                    <?
										 $num=1;
										 if($_GET["Action"] == "Del")
										  {
											  $strSQL = "delete from interview WHERE interview_id = '".$_GET["interview_id"]."' ";
											  $stmt = mysqli_query($conn,$strSQL);
										  }
									  
										  $num=1;
										  $strSQL = "SELECT * FROM interview 
										  	inner join register_work on register_work.re_id = interview.re_id
											inner join member on member.mem_id = register_work.mem_id
											inner join titlename on titlename.title_id = member.title_id
											inner join club_work on club_work.work_id = register_work.work_id
											inner join club on club.club_id = club_work.club_id
											where interview.interview_id != '".$_GET[interview_id]."' order by interview_date DESC ";
                                          
										  $stmt  = mysqli_query($conn,$strSQL);
										  while($row = mysqli_fetch_array($stmt)){
											  
											  $strSQL_past = "SELECT * FROM past where re_id = '".$row[re_id]."' ";
											  $stmt_past = mysqli_query($conn,$strSQL_past);
											  $row_past = mysqli_fetch_array($stmt_past);
									?>
                                        <tr>
                                          <td style="text-align:center;"><?=date('d/m', strtotime($row[interview_date]));?>/<?=date('Y', strtotime($row[interview_date]))+543;?><br><?=date('H:i', strtotime($row[interview_time]));?> น.</td>
                                          <td><?=$row[club_name];?><br>ตำแหน่ง: <?=$row[work_name];?></td>
                                          <td><?=$row[title_name];?><?=$row[mem_name];?> <?=$row[mem_last];?></td>
                                          <td><?=$row[interview_place];?></td>
                                        <td style="text-align:center;">
                                        	<? if($row_past[re_status] == ''){ ?>
                                        	<a href="edit_interview.php?interview_id=<?=$row["interview_id"];?>" class="btn btn-warning"><i class="icon-edit"></i></a>
                                        	<a href="JavaScript:if(confirm('คุณต้องการลบการประกาศสัมภาษณ์ ?')==true){window.location='<?=$_SERVER["PHP_SELF"];?>?Action=Del&interview_id=<?=$row["interview_id"];?>';}" class="btn btn-danger"><i class="icon-trash"></i></a></td>
                                            <? }else{ ?>
                                          	<a href="view_interview.php?interview_id=<?=$row["interview_id"];?>" class="btn btn-info">ผลการสัมภาษณ์</a>
                                            <? } ?>
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
