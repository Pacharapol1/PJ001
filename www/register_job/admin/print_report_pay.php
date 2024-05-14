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
<style type="text/css" media="print">
  @page { size: landscape; }
</style>
</head>
     <!-- END HEAD -->
     <!-- BEGIN BODY -->
<body onLoad="window.print()">

     <!-- MAIN WRAPPER -->
    <div id="wrap">

<div align="center"><h2>รายงานรายรับประจำวันที่ <?=date('d/m/Y',strtotime($_GET[start_date]));?> ถึงวันที่ <?=date('d/m/Y',strtotime($_GET[start_date]));?></h2></div>
      <table class="table table-striped table-bordered table-hover" id="dataTables-example2">
          <thead>
              <tr>
              
                  <th style="text-align:center;">วันที่รับ</th>
                  <th style="text-align:center;">ชื่อ-นามสกุล</th>
                  <th style="text-align:center;">ชมรม</th>
                  <th style="text-align:center;">ยอดชำระ</th>
              </tr>
          </thead>
          <?
                $num=1;
                $strSQL = "SELECT * FROM payment 
                      inner join member on member.mem_id = payment.mem_id
                      inner join club on club.club_id = member.club_id
                      where payment.pay_date between '$_GET[start_date]' and '$_GET[end_date]' and payment.pay_status = 'Y' 
                      group by payment.mem_id
                      ORDER BY payment.pay_date DESC";
                $stmt  = mysqli_query($conn,$strSQL);
                while($row = mysqli_fetch_array($stmt)){
                    $total += 50;
          ?>
              <tr>
               
                <td style="text-align:center;"><?=date('d/m', strtotime($row[pay_date]));?>/<?=date('Y', strtotime($row[pay_date]))+543;?></td>

                <td><?=$row[title_name];?><?=$row[mem_name];?></td>
                
                <td><?=$row[club_name];?></td>
                <td style="text-align:right;">50.00</td>
              </tr>
           <? $num++; } ?>
              <tr>
                  <td colspan="3" style="text-align:right;"><strong>รวมยอดทั้งหมด</strong></td>
                  <td style="text-align:right;"><strong><?=number_format($total,2);?></strong></td>
              </tr>
          </tbody>
      </table>
</body>
     <!-- END BODY -->
</html>
