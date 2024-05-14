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


                        <h2>ข้อมูลคณาจารย์</h2>



                    </div>
                </div>

                <hr />


                <div class="row">
                
                <div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>รายละเอียดคณาจารย์</h5>
        </header>
        <div id="div-1" class="accordion-body collapse in body">
        <?
			$strSQL = "SELECT * FROM employee 
				inner join titlename on titlename.title_id = employee.title_id
				inner join department on department.dep_id = employee.dep_id
				inner join saka on saka.saka_id = employee.saka_id
				inner join provinces on provinces.prov_id = employee.prov_id
				where employee.emp_id = '$_GET[emp_id]' ";
			$stmt  = mysqli_query($conn,$strSQL);
			$row = mysqli_fetch_array($stmt);
		?>

            <form method="post" class="form-horizontal" enctype="multipart/form-data">
            <input type="hidden" class="form-control" name="emp_id" value="<?=$row[emp_id];?>" required>
             
				<div class="form-group">
                    <label class="col-md-2">รหัส : </label><?=$row[username];?>
                </div>
                <div class="form-group">
                    <label class="col-md-2">ชื่อ-นามสกุล : </label><?=$row[title_name];?><?=$row[emp_name];?> <?=$row[emp_surname];?>
                </div>
                <div class="form-group">
                    <label class="col-md-2">เพศ : </label><?=$row[emp_sex];?>
                </div>
                <div class="form-group">
                    <label class="col-md-2">ที่อยู่ : </label><?=$row[emp_num];?> ต.<?=$row[emp_tum];?> อ.<?=$row[emp_aum];?> จ.<?=$row[prov_name];?> <?=$row[emp_zip];?>
                </div>
                <div class="form-group">
                    <label class="col-md-2">เบอร์โทรศัพท์ : </label><?=$row[emp_mobile];?>
                </div>
                <div class="form-group">
                    <label class="col-md-2">Email : </label><?=$row[emp_email];?>
                </div>
                <div class="form-group">
                    <label class="col-md-2">คณะ : </label><?=$row[dep_name];?>
                </div>
                <div class="form-group">
                    <label class="col-md-2">สาขา : </label><?=$row[saka_name];?>
                </div>
                
               
            </form>
        </div>
    </div>
</div>
                
                
                
                <div class="col-lg-12">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            รายชื่อนักศึกษา
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                            <?
								$strSQL = "SELECT * FROM member WHERE emp_id1 = '".$_GET["emp_id"]."' or emp_id2 = '".$_GET["emp_id"]."' ";
								$stmt  = mysqli_query($conn, $strSQL);
								$numrow = mysqli_num_rows($stmt);
								if($numrow != ''){
							?>
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                        
                                        	<th style="text-align:center;">รหัส</th>
                                            <th style="text-align:center;">ชื่อ-นามสกุล</th>
                                            <th style="text-align:center;">เบอร์โทร</th>
                                            <th style="text-align:center; width:15%;">ดูบันทึกรายงาน</th>
                                            <th style="text-align:center; width:15%;">ขอนิเทศ</th>
                                        </tr>
                                    </thead>
                                    <?
										 $num=1;
										 if($_GET["Action"] == "Del")
										  {
											  $strSQL = "delete from calendar WHERE calendar_id = '".$_GET["calendar_id"]."' ";
											  $stmt = mysqli_query($conn,$strSQL);
										  }
									  
										  $num=1;
										  $strSQL = "SELECT * FROM member 
										  	inner join titlename on titlename.title_id = member.title_id
											inner join register_work on register_work.mem_id = member.mem_id
											inner join club_work on club_work.work_id = register_work.work_id
											inner join club on club.club_id = club_work.club_id
											WHERE member.emp_id1 = '".$_GET["emp_id"]."' or member.emp_id2 = '".$_GET["emp_id"]."' ";
										  $stmt  = mysqli_query($conn,$strSQL);
										  while($row = mysqli_fetch_array($stmt)){
									?>
                                        <tr>
                                         
                                          <td style="text-align:center;"><?=$row[username];?></td>
                                          <td><?=$row[title_name];?><?=$row[mem_name];?> <?=$row[mem_last];?></td>
                                          <td style="text-align:center;"><?=$row[mem_mobile];?></td>
                                          <td style="text-align:center;">
                                            <a href="view_today.php?mem_id=<?=$row[mem_id];?>" class="btn btn-primary"><i class="icon-search"></i></a>
                                           </td>
                                           <td style="text-align:center;">
                                           <? if($row[calendar] == ''){ ?>
                                            <a href="form_calendar_admin.php?mem_id=<?=$row[mem_id];?>&club_id=<?=$row[club_id];?>&emp_id=<?=$_GET[emp_id];?>" class="btn btn-info"><i class="icon-plus"></i></a>
                                           <? }else{ echo 'นัดแล้ว'; } ?> 
                                           </td>
                                        </tr>
                                     <? $num++; } ?>
                                    </tbody>
                                </table>
                                <? }else{ ?>
                                    <div align="center"><h1>---ไม่มีรายชื่อนักศึกษา---</h1></div>
                                <?	} ?>
                                
                                <div align="center"><a href="print_cal.php?emp_id=<?=$_GET[emp_id];?>" class="btn btn-success" target="_blank">พิมพ์แบบฟอร์มขอนิเทศ</a></div>
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
