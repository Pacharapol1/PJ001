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
<style type="text/css" media="print">
  @page { size: landscape; }
</style>
</head>
     <!-- END HEAD -->
     <!-- BEGIN BODY -->
<body onLoad="window.print()">

<?
	if($_GET[club_id] != 'all'){
		$strSQL_club = "SELECT * FROM club where club_id = '".$_GET[club_id]."' ";
	}else{
		$strSQL_club = "SELECT * FROM club ";
	}
	$stmt_club = mysqli_query($conn,$strSQL_club);
	$row_club = mysqli_fetch_array($stmt_club);
?>
<?
	if($_GET[club_id] != 'all'){
?>
	<h2>รายงานข้อมูลโครงการ : <?=$row_club[club_name];?></h2>
<?
	}else{
?>
	<h2>รายงานข้อมูลโครงการ : ทุกชมรม</h2>
<?
	}
?>                                
<table class="table table-striped table-bordered table-hover" id="dataTables-example2">
	<thead>
		<tr>
		
			<th style="text-align:center;">วันที่เริ่ม</th>
			<th style="text-align:center;">วันที่สิ้นสุด</th>
			<th style="text-align:center;">ชื่อโครงการ</th>
			<th style="text-align:center;">ชมรม</th>
		</tr>
	</thead>
	<?
		if($_GET[club_id] != 'all'){
			$ss = " and club.club_id = '".$_GET[club_id]."' ";
		}else{
			$ss = " ";
		}
		  $num=1;
		  $strSQL = "SELECT * FROM calendar 
				inner join club on club.club_id = calendar.club_id
				where calendar.calendar_start between '$_GET[start_date]' and '$_GET[end_date]' $ss ORDER BY calendar.calendar_id DESC";
		  $stmt  = mysqli_query($conn,$strSQL);
		  while($row = mysqli_fetch_array($stmt)){
	?>
		<tr>
		 
		  <td style="text-align:center;"><?=date('d/m', strtotime($row[calendar_start]));?>/<?=date('Y', strtotime($row[calendar_start]))+543;?></td>

		  <td style="text-align:center;"><?=date('d/m', strtotime($row[calendar_end]));?>/<?=date('Y', strtotime($row[calendar_end]))+543;?></td>
		  
		  <td><?=$row[calendar_name];?></td>
		  <td><?=$row[club_name];?></td>
		</tr>
	 <? $num++; } ?>
	</tbody>
</table>
</body>
     <!-- END BODY -->
</html>
