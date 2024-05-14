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


                        <h2>ข้อมูลนักศึกษา</h2>



                    </div>
                </div>

                <hr />


                <div class="row">
                
                <div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>รายละเอียดนักศึกษา</h5>
        </header>
        <div id="div-1" class="accordion-body collapse in body">
        <?
			if($_GET["Action"] == "Con")
			{
				$strSQL = "UPDATE member SET mem_status = 'Y' WHERE mem_id = '".$_GET["mem_id"]."' ";
				$stmt = mysqli_query($conn,$strSQL);
				
				$strSQL_up = "UPDATE payment SET pay_status = 'Y' WHERE pay_id = '".$_GET["pay_id"]."' ";
				$stmt_up = mysqli_query($conn,$strSQL_up);
			}
			if($_GET["Action"] == "No")
			{
				$strSQL = "UPDATE member SET mem_status = 'C' WHERE mem_id = '".$_GET["mem_id"]."' ";
				$stmt = mysqli_query($conn,$strSQL);
				
				$strSQL_up = "UPDATE payment SET pay_status = 'C' WHERE pay_id = '".$_GET["pay_id"]."' ";
				$stmt_up = mysqli_query($conn,$strSQL_up);
			}
			
			$strSQL = "SELECT * FROM member 
				inner join titlename on titlename.title_id = member.title_id
				inner join department on department.dep_id = member.dep_id
				inner join saka on saka.saka_id = member.saka_id
				inner join register_work on register_work.mem_id = member.mem_id
				inner join provinces on provinces.prov_id = member.prov_id
				where member.mem_id = '$_GET[mem_id]' ";
			$stmt  = mysqli_query($conn,$strSQL);
			$row = mysqli_fetch_array($stmt);
		?>

            <form method="post" class="form-horizontal" enctype="multipart/form-data">
            <input type="hidden" class="form-control" name="mem_id" value="<?=$row[mem_id];?>" required>
             
				<div class="form-group">
                    <label class="col-md-2">รหัส : </label><?=$row[mem_code];?>
                </div>
                <div class="form-group">
                    <label class="col-md-2">ชื่อ-นามสกุล : </label><?=$row[title_name];?><?=$row[mem_name];?> <?=$row[mem_last];?>
                </div>
                <div class="form-group">
                    <label class="col-md-2">ที่อยู่ : </label><?=$row[mem_add];?> ต.<?=$row[mem_tam];?> อ.<?=$row[mem_aum];?> จ.<?=$row[prov_name];?> <?=$row[mem_zip];?>
                </div>
                <div class="form-group">
                    <label class="col-md-2">เบอร์โทรศัพท์ : </label><?=$row[mem_mobile];?>
                </div>
                
                <div class="form-group">
                    <label class="col-md-2">คณะ : </label><?=$row[dep_name];?>
                </div>
                <div class="form-group">
                    <label class="col-md-2">สาขา : </label><?=$row[saka_name];?>
                </div>
                
                <div class="form-group">
                    <label class="col-md-2">อาจารย์ที่ปริกษาหลัก : </label>
					<? if($row[emp_id1] == ''){ ?>
                    	<a href="form_con.php?mem_id=<?=$row["mem_id"];?>" class="btn btn-success btn-sm">เพิ่มอาจารย์</a>
                    <? }else{
						
						$strSQL1 = "SELECT * FROM employee 
							inner join titlename on titlename.title_id = employee.title_id
							where employee.emp_id = '$row[emp_id1]' ";
						$stmt1  = mysqli_query($conn,$strSQL1);
						$row1 = mysqli_fetch_array($stmt1);
						 echo $row1[title_name].$row1[emp_name].' '.$row1[emp_surname]; 
					 } ?>
                </div>
                <div class="form-group">
                    <label class="col-md-2">อาจารย์ที่ปริกษาร่วม : </label>
					<? if($row[emp_id2] == ''){ ?>
                    	<a href="form_con.php?mem_id=<?=$row["mem_id"];?>" class="btn btn-success btn-sm">เพิ่มอาจารย์</a>
                    <? }else{
						
						$strSQL2 = "SELECT * FROM employee 
							inner join titlename on titlename.title_id = employee.title_id
							where employee.emp_id = '$row[emp_id2]' ";
						$stmt2  = mysqli_query($conn,$strSQL2);
						$row2 = mysqli_fetch_array($stmt2);
						 echo $row2[title_name].$row2[emp_name].' '.$row2[emp_surname]; 
					 } ?>
                </div>
               
            </form>
        </div>
    </div>
</div>
                
                
                
                <div class="col-lg-12">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            ข้อมูลการสมัครสหกิจศึกษา
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                            <?
								if($_GET["Action"] == "Con")
								{
									$strSQL_up = "UPDATE register_work SET re_status = '1' WHERE re_id = '".$_GET["re_id"]."' ";
									$stmt_up = mysqli_query($conn,$strSQL_up);
								}
								if($_GET["Action"] == "No")
								{
									$strSQL_up = "UPDATE register_work SET re_status = 'C' WHERE re_id = '".$_GET["re_id"]."' ";
									$stmt_up = mysqli_query($conn,$strSQL_up);
									
									$sql_up_work = "UPDATE club_work SET work_amount = work_amount-1 WHERE work_id = '".$_GET[work_id]."' ";
				  					mysqli_query($conn,$sql_up_work);
								}
								if($_GET["Action"] == "Past")
								{
									$strSQL_up = "UPDATE register_work SET re_status = '2' WHERE re_id = '".$_GET["re_id"]."' ";
									$stmt_up = mysqli_query($conn,$strSQL_up);
								}
								if($_GET["Action"] == "Test")
								{
									$strSQL_up = "UPDATE register_work SET re_status = '3' WHERE re_id = '".$_GET["re_id"]."' ";
									$stmt_up = mysqli_query($conn,$strSQL_up);
								}
								$strSQL = "SELECT * FROM register_work 
									inner join club_work on club_work.work_id = register_work.work_id
									inner join club on club.club_id = club_work.club_id
									inner join position on position.po_id = club_work.work_name
									WHERE register_work.mem_id = '".$row["mem_id"]."'";
								$stmt  = mysqli_query($conn, $strSQL);
								$numrow = mysqli_num_rows($stmt);
								if($numrow != ''){
							?>
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center;">วันที่สมัคร</th>
                                            <th style="text-align:center;">ชื่อบริษัท</th>
                                            <th style="text-align:center;">ตำแหน่งงาน</th>
                                            <th style="text-align:center;">สถานะ</th>
                                            <th style="text-align:center;">หมายเหตุ</th>
                                            <th style="text-align:center;">จัดการ</th>
                                        </tr>
                                    </thead>
                                    <?
										  $num=1;
										  $strSQL = "SELECT * FROM register_work 
										  	inner join club_work on club_work.work_id = register_work.work_id
											inner join position on position.po_id = club_work.work_name
											inner join club on club.club_id = club_work.club_id
											where register_work.mem_id = '".$_GET[mem_id]."' ";
										  $stmt  = mysqli_query($conn,$strSQL);
										  while($row = mysqli_fetch_array($stmt)){
									?>
                                        <tr>
                                         <td style="text-align:center;"><?=date('d/m', strtotime($row[re_date]));?>/<?=date('Y', strtotime($row[re_date]))+543;?></td>

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
                                          <td>
                                          <?
                                                if($row[re_status] == '1N'){
                                                    echo $row[re_interview];
                                                }else if($row[re_status] == '2N'){
                                                    echo $row[re_test];
                                                }else if($row[re_status] == '3'){
                                         			if($row[re_date_time] != '0000-00-00 00:00:00'){ 
										  ?>
                                					<div align="center"><?=date('d/m', strtotime($row[re_date_time]));?>/<?=date('Y', strtotime($row[re_date_time]))+543;?></div>
                               			  <? }else{ echo '-'; } 
                                                }
                                          ?>
                                          </td>
                                          <td style="text-align:center;">
                                          <? if($row[re_status] == 'W'){ ?>
                                                <a href="JavaScript:if(confirm('คุณต้องการอนุมัติการเข้าร่วมสหกิจศึกษา ?')==true){window.location='<?=$_SERVER["PHP_SELF"];?>?Action=Con&mem_id=<?=$row["mem_id"];?>&re_id=<?=$row["re_id"];?>';}" class="btn btn-success btn-sm">อนุมัติ</a>
                                				<a href="JavaScript:if(confirm('คุณไม่ต้องการอนุมัติการเข้าร่วมสหกิจศึกษา ?')==true){window.location='<?=$_SERVER["PHP_SELF"];?>?Action=No&mem_id=<?=$row["mem_id"];?>&re_id=<?=$row["re_id"];?>&work_id=<?=$row["work_id"];?>';}" class="btn btn-danger btn-sm">ไม่อนุมัติ</a>
                                          <? }else if($row[re_status] == '1'){ ?>
                                          		<a href="JavaScript:if(confirm('ผ่านการสัมภาษณ์ ?')==true){window.location='<?=$_SERVER["PHP_SELF"];?>?Action=Past&mem_id=<?=$row["mem_id"];?>&re_id=<?=$row["re_id"];?>';}" class="btn btn-success btn-sm">ผ่านการสัมภาษณ์</a>
                                                <a href="edit_inter_no.php?mem_id=<?=$row["mem_id"];?>&re_id=<?=$row["re_id"];?>" class="btn btn-danger btn-sm">ไม่ผ่าน</a>
                                          <? }else if($row[re_status] == '2'){ ?>
                                          		<a href="JavaScript:if(confirm('ผ่านการทดสอบ ?')==true){window.location='<?=$_SERVER["PHP_SELF"];?>?Action=Test&mem_id=<?=$row["mem_id"];?>&re_id=<?=$row["re_id"];?>';}" class="btn btn-success btn-sm">ผ่านการทดสอบ</a>
                                                <a href="edit_test_no.php?mem_id=<?=$row["mem_id"];?>&re_id=<?=$row["re_id"];?>" class="btn btn-danger btn-sm">ไม่ผ่าน</a>
                                          <? }else{ echo '-'; } ?>
                                          </td>
                                        </tr>
                                     <? $num++; } ?>
                                    </tbody>
                                </table>
                                <? }else{ ?>
                                    <div align="center"><h1>---ไม่มีข้อมูลการสมัครสหกิจศึกษา---</h1></div>
                                <?	} ?>
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
