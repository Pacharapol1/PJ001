<?
	session_start();
	include "admin/connectDb.php"; 
	$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
	mysqli_set_charset($conn, "utf8");
	error_reporting(~E_NOTICE);
?>
<!DOCTYPE HTML>
<html>
<head>
<title><?=$_SESSION["title"];?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Learn Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap-3.1.1.min.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/jquery.countdown.css" />
<link href="css/fontcss.css" rel='stylesheet' type='text/css' />

<!----font-Awesome----->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!----font-Awesome----->
<script>
$(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');       
        }
    );
});
</script>
</head>
<body onLoad="window.print()">
<? //include 'menu.php'; ?>
<!-- banner -->
    <!-- //banner -->
	<div class="courses_box1">
        <?
			function DateTimeDiff($strDateTime1,$strDateTime2){//datetime formate Y-m-d H:i	
			$date = 0;
			$hour = 0;
			$min = 0;
			$day1=0;
			$escape=0;
				$diff = strtotime($strDateTime2) - strtotime($strDateTime1);
				$date  = floor($diff/(60*60*24));
				$hour = floor(($diff-($date*60*60*24))/(60*60));
				$min = floor(($diff-($date*60*60*24)-($hour*60*60))/60);	
	
				$day1 =date('N',strtotime($strDateTime1));  // php5.1.0 ขึ้นไป ถ้าไม่ใช่ไปอัพเดท  :>
				$escape =(int)($date/7)*2;  
				$mod=$date%7;
				if($mod !=0){
	
					if($day1 ==6 ) $escape++;
					if($day1==7)$escape++;
					if($day1 ==6 && $mod>1)$escape++;
					//if($mod ==6) $escape++;  แก้เอาออก มันซ้ำ
					if($day1+$mod>5 && $day1<6)$escape++;
					if($day1+$mod>6 && $day1<6)$escape++;
				}
				 return $date-$escape;
		}		
			$strSQL = "SELECT * FROM leavela 
				inner join employee on employee.emp_id = leavela.emp_id
				inner join titlename on titlename.title_id = employee.title_id
				inner join position on position.po_id = employee.po_id
				inner join department on department.dep_id = employee.dep_id
				WHERE leavela.id = '".$_GET["id"]."' ";
			$stmt  = mysqli_query($conn, $strSQL);
			$row = mysqli_fetch_array($stmt);
			$thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม"); 
			$strSQL_tyla = "SELECT * FROM type_leave WHERE  tleave_id = '".$row['type_leave']."' ";
			$stmttyla =  mysqli_query($conn,$strSQL_tyla);
			$row_tyla = mysqli_fetch_array($stmttyla);
			
			$DateStart = date('d', strtotime($row['leave_date'])); //วันเริ่มต้น
			$MonthStart = date('m', strtotime($row['leave_date'])); //เดือนเริ่มต้น
			$YearStart = date('Y', strtotime($row['leave_date'])); //ปีเริ่มต้น
			
			$DateEnd = date('d', strtotime($row['leave_enddate'])); //วันสิ้นสุด
			$MonthEnd = date('m', strtotime($row['leave_enddate'])); //เดือนสิ้นสุด
			$YearEnd = date('Y', strtotime($row['leave_enddate'])); //ปีสิ้นสุด
			
			$End = mktime(0,0,0,$MonthEnd,$DateEnd,$YearEnd);
			$Start = mktime(0,0,0,$MonthStart ,$DateStart ,$YearStart);
			
			$total_date = ceil(($End-$Start)/86400); // 28
			
			//echo $total_date+1;
				
			$date1 = $row['leave_date'];
			$date2 = $row['leave_enddate'];
			$diff = DateTimeDiff($date1,$date2);
			$showdiff = $diff+1;
		?>
		<div class="col-md-12">
                <table width="80%" border="0" align="center">
                  <tr>
                    <td colspan="2" style="text-align:center;"><h4>แบบใบลา</h4></td>
                  </tr>
                  <tr>
                    <td width="50%">&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>วันที่ <?=date('d', strtotime($row['date_la']));?> <?=$thaimonth[date('m', strtotime($row['date_la']))-1];?> <?=date('Y', strtotime($row['date_la']))+543;?></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>เรื่อง ขอลา<?=$row_tyla[tleave_name];?></td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>เรียน หัวหน้าสำนักงานคณะบริหารธุรกิจและอุตสาหกรรมบริการ</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ข้าพเจ้า <?=$row[title_name];?><?=$row[emp_name];?> ตำแหน่ง  <?=$row[po_name];?> หน่วยงาน <?=$row[dep_name];?> ข้าพเจ้าขอลา <?=$row_tyla[tleave_name];?> ตั้งแต่วันที่ <?=date('d', strtotime($row['leave_date']));?> <?=$thaimonth[date('m', strtotime($row['leave_date']))-1];?> <?=date('Y', strtotime($row['leave_date']))+543;?> ถึงวันที่ <?=date('d', strtotime($row['leave_enddate']));?> <?=$thaimonth[date('m', strtotime($row['leave_enddate']))-1];?> <?=date('Y', strtotime($row['leave_enddate']))+543;?> เป็นเวลา <?=$showdiff;?> วัน<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เนื่องจาก <?=$row[detail_leave];?></td>
                  </tr>
                  <tr>
                    <td colspan="2"></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>ขอแสดงความนับถือ</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>(<?=$row[title_name];?><?=$row[emp_name];?>)</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td><strong><u>ความเห็นผู้บังคับบัญชา</u></strong></td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td colspan="2"><hr></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>(.....................................................)</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>วันที่............../...................../............</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td><strong><u>คำสั่ง</u></strong></td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td><input type="checkbox" name="checkbox" id="checkbox"> อนุญาต</td>
                    <td><input type="checkbox" name="checkbox" id="checkbox"> ไม่อนุญาต</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>(.....................................................)</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>วันที่............../...................../............</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                </table>

		    <div class="clearfix"> </div>
	   </div>
	</div>
<!-- FlexSlider -->
<link href="css/flexslider.css" rel='stylesheet' type='text/css' />
  <script defer src="js/jquery.flexslider.js"></script>
  <script type="text/javascript">
	$(function(){
	  SyntaxHighlighter.all();
	});
	$(window).load(function(){
	  $('.flexslider').flexslider({
		animation: "slide",
		start: function(slider){
		  $('body').removeClass('loading');
		}
	  });
	});
  </script>
<!-- FlexSlider -->
</body>
</html>	