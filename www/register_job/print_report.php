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
    <!-- โดยสมัชชัย -->
    <?php 
          $dep_id = $_GET['dep_id']; 
          $name = $_GET['name'];

          $strSQL_user = "SELECT * FROM employee em, leavela le, titlename tn, type_leave tl, department dm WHERE em.title_id = tn.title_id AND em.emp_id = le.emp_id AND em.dep_id = dm.dep_id AND em.dep_id = '$dep_id' AND le.type_leave = tl.tleave_id";
      $stmtuser =  mysqli_query($conn, $strSQL_user);  
      $num_result = mysqli_num_rows($stmtuser); 
    ?>
		<div class="col-md-12">
    <center><h2>รายงานการลา<?php echo $name;?></h2></center>
                <table width="80%" border="1" align="center">
                  <tr>
                    <!--<th style="width:8%; text-align:center;">เลขที่ใบลา</th>-->
                    <th><center>ลำดับที่</center></th>
                    <th><center>วันที่ยื่นลา</center></th>
                    <th><center>ชื่อ-นามสกุล</center></th>
                    <th><center>ประเภทลา</center></center></th>
                    <!--<th style="width:10%; text-align:center;">วันที่ลา</th>-->
                    <th ><center>จำนวนวัน</center></th>
                 </tr>
                  <?
            $count = 0;
            while($row = mysqli_fetch_array($stmtuser))
            {
              $count++;
          ?>

                  <tr>
                    <td align="center"><?php echo $count;?></td>
                    <td align="center">

                       <?
                            $date_la = date('Y', strtotime($row['date_la']))+543;
                            echo date('d/m', strtotime($row['date_la'])).'/'.$date_la;
                        ?>
                  </td>
                    <td align="center"><?php echo $row['title_name'].$row['emp_name'];?></td>
                    <td align="center"><?php echo $row['tleave_name'];?></td>
                    <td align="center"><?php echo $row['total_day'];?></td>
                    </tr>
                <? } ?>
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