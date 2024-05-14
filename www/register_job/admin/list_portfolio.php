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


                        <h2> ข้อมูลการดำเนินโครงการ </h2>



                    </div>
                </div>

                <hr />
                <? if($_SESSION["status"] == '1'){ ?>
                <p><a href="form_portfolio.php"><button class="btn btn-primary dropdown-toggle"><i class="icon-plus"></i> เพิ่มข้อมูลการดำเนินโครงการ</button></a></p>
				<? } ?>
             <div class="row">
                <div class="col-lg-12">   
                 <div class="panel panel-info">
                        <div class="panel-heading">
                            ข้อมูลการดำเนินโครงการ
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                        	<th style="text-align:center;">วันที่่บันทึก</th>
                                            <th style="text-align:center;">ชื่อโครงการ</th>
                                            <th style="text-align:center;">รายงานการประชุม</th>
                                            <th style="text-align:center;">ผลการประเมิน</th>
                                            <th style="text-align:center; width:15%;">จัดการ</th>
                                        </tr>
                                    </thead>
                                    <?
										 $num=1;
										 if($_GET["Action"] == "Con")
										  {
											  $strSQL = "UPDATE calendar SET calendar_answer = 'Y' WHERE calendar_id = '".$_GET["calendar_id"]."' ";
											  $stmt = mysqli_query($conn,$strSQL);
										  }
									  	 if($_GET["Action"] == "No")
										  {
											  $strSQL = "UPDATE calendar SET calendar_answer = 'N' WHERE calendar_id = '".$_GET["calendar_id"]."' ";
											  $stmt = mysqli_query($conn,$strSQL);
										  }
										  $num=1;
										  $strSQL2 = "SELECT * FROM portfolio ORDER BY portfolio_date DESC";
										  $stmt2  = mysqli_query($conn,$strSQL2);
										  while($row = mysqli_fetch_array($stmt2)){
											  	$strSQL_ca = "SELECT * FROM calendar where calendar_id = '".$row[calendar_id]."' ";
										  		$stmt_ca  = mysqli_query($conn,$strSQL_ca);
										  		$row_ca = mysqli_fetch_array($stmt_ca);
									?>
                                        <tr>
                                          <td style="text-align:center;"><?=date('d/m', strtotime($row[portfolio_date]));?>/<?=date('Y', strtotime($row[portfolio_date]))+543;?></td>
                                          <td><a href="../view_portfolio.php?portfolio_id=<?=$row[portfolio_id];?>" target="_blank"><?=$row_ca[calendar_name];?></a></td>
                                          <td style="text-align:center;"><a href="<?=$row[portfolio_files];?>" target="_blank" class="btn btn-default btn-sm"><i class="icon-folder-open"></i> เอกสาร</a></td>
                                          <td style="text-align:center;">
                                          	<?
												if($row_ca[calendar_answer] == 'W'){
													echo '<font color="#FF6600">รอคณะกรรมการประเมิน</font>';
												}else if($row_ca[calendar_answer] == 'Y'){
													echo '<font color="#009900">ผ่าน</font>';
												}else if($row_ca[calendar_answer] == 'C'){
													echo '<font color="#FF0000">ไม่ผ่าน</font>';
												}
											?>
                                          </td>
                                          
                                          <? if($_SESSION["status"] == '1'){ ?>
                                          <td style="text-align:center;">
                                          
                                          	<a href="../view_portfolio.php?portfolio_id=<?=$row[portfolio_id];?>" target="_blank" class="btn btn-primary"><i class="icon-search"></i></a>
                                            <? if($row_ca[calendar_answer] == 'W'){ ?>
                                            <a href="edit_portfolio.php?portfolio_id=<?=$row["portfolio_id"];?>" class="btn btn-warning"><i class="icon-edit"></i></a>
                                            <a href="JavaScript:if(confirm('คุณต้องการลบรายการกิจกรรม ?')==true){window.location='<?=$_SERVER["PHP_SELF"];?>?Action=Del&portfolio_id=<?=$row["portfolio_id"];?>';}" class="btn btn-danger"><i class="icon-trash"></i></a>
                                            <? } ?>
                                           </td>
                                           <? }else{ ?>
                                           <td style="text-align:center;">
                                          
                                          	<a href="../view_portfolio.php?portfolio_id=<?=$row[portfolio_id];?>" target="_blank" class="btn btn-primary"><i class="icon-search"></i></a>
                                            <? if($row_ca[calendar_answer] == 'W'){ ?>
                                            <a href="JavaScript:if(confirm('ผลการประเมินโครงการผ่านเกณฑ์ ^^')==true){window.location='<?=$_SERVER["PHP_SELF"];?>?Action=Con&calendar_id=<?=$row_ca["calendar_id"];?>';}" class="btn btn-success"><i class="icon-ok"></i></a>
                                            <a href="JavaScript:if(confirm('ผลการประเมินโครงการไม่ผ่านเกณฑ์!!')==true){window.location='<?=$_SERVER["PHP_SELF"];?>?Action=No&calendar_id=<?=$row_ca["calendar_id"];?>';}" class="btn btn-danger"><i class="icon-remove"></i></a>
                                            <? } ?>
                                           </td>
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
             $('#dataTables-example').dataTable();
         });
    </script>
     <!-- END PAGE LEVEL SCRIPTS -->
</body>
     <!-- END BODY -->
</html>
