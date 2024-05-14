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


                        <h2>การนัดนิเทศงาน </h2>



                    </div>
                </div>
                <p><a href="form_calendar.php"><button class="btn btn-primary dropdown-toggle"><i class="icon-plus"></i> เพิ่มการนัดนิเทศงาน</button></a></p>
                <hr />


             
                <div class="row">
                <div class="col-lg-12">   
                 <div class="panel panel-info">
                        <div class="panel-heading">
                            การนัดนิเทศงาน
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                        	<th style="text-align:center;">ชื่อผู้ประกอบการ</th>
                                        	<th style="text-align:center;">วันที่นัด</th>
                                            <th style="text-align:center;">เวลา</th>
                                            <th style="text-align:center;">ผู้นัดหมาย</th>
                                            
                                            <th style="text-align:center;">รายชื่อนักศึกษา</th>
                                            <th style="text-align:center;">สถานะ</th>
                                            <th style="text-align:center; width:15%;">จัดการ</th>
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
										  $strSQL = "SELECT * FROM calendar 
											inner join club on club.club_id = calendar.club_id
											ORDER BY calendar.calendar_id DESC";
										  $stmt  = mysqli_query($conn,$strSQL);
										  while($row = mysqli_fetch_array($stmt)){
											  
											  $strSQL_emp = "SELECT * FROM employee 
											  	inner join titlename on titlename.title_id = employee.title_id
												where employee.emp_id = '".$row[emp_id]."' ";
										  		$stmt_emp = mysqli_query($conn,$strSQL_emp);
										     $row_emp = mysqli_fetch_array($stmt_emp);
									?>
                                        <tr>
                                         	<td><?=$row[club_name];?></td>
                                          <td style="text-align:center;"><?=date('d/m', strtotime($row[calendar_date]));?>/<?=date('Y', strtotime($row[calendar_date]))+543;?></td>
										  <td style="text-align:center;"><?=date('H:i', strtotime($row[calendar_date]));?> น.</td>		
                                          <td><?=$row_emp[title_name];?><?=$row_emp[emp_name];?> <?=$row_emp[emp_surname];?></td>
                                          
                                          <td style="text-align:center;"><a href="view_student.php?club_id=<?=$row[club_id];?>&calendar_id=<?=$row[calendar_id];?>" class="btn btn-info btn-sm"><i class="icon-list"></i> รายชื่อนักศึกษา</a></td>
                                          <td style="text-align:center;">
                                          	<?
												if($row[calendar_status] == 'W'){
													echo '<font color="#FF6600">รอตอบรับ</font>';
												}else if($row[calendar_status] == '1'){
													echo '<font color="#FF6600">ตอบรับนัดหมาย</font>';
												}else if($row[calendar_status] == 'C'){
													echo '<font color="#FF0000">ปฏิเสธการนัด</font>';
												}else{
													echo '<font color="#009900">ประเมินผลแล้ว</font>';
												}
											?>
                                          </td>
                                          <td style="text-align:center;">
                                          <? if($row[calendar_status] == 'W'){ ?>
                                            <a href="edit_calendar.php?calendar_id=<?=$row["calendar_id"];?>" class="btn btn-warning"><i class="icon-edit"></i></a>
                                            <a href="JavaScript:if(confirm('คุณต้องการลบรายการกิจกรรม ?')==true){window.location='<?=$_SERVER["PHP_SELF"];?>?Action=Del&calendar_id=<?=$row["calendar_id"];?>';}" class="btn btn-danger"><i class="icon-trash"></i></a>
                                           <? }else{ ?>
                                           		<font color="#00CC00">รับการตอบรับแล้ว</font>
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
