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
<body>
<? include 'menu.php'; ?>
<!-- banner -->
  <div class="courses_banner">
  	<div class="container">
  		<h3>รายงานการขออนุมัติลา</h3>
        <div class="breadcrumb1">
            <ul>
                <li class="icon6"><a href="index.php">หน้าหลัก</a></li>
                <li class="current-page">รายงานการขออนุมัติลา</li>
            </ul>
        </div>
  	</div>
   </div>
    <!-- //banner -->
	<div class="courses_box1">
	   <div class="container">
	   	  <div class="col-md-3">
			<div class="courses_box1-left">
            	<? include 'menu_profile.php'; ?>
                <div style="height:20px;"></div>      
	       </div>
		</div>
        <?
			if($_GET["Action"] == "Yesconhead")
			{
				$strSQL = "UPDATE leavela SET status_la = 'Y' ,stamp_con = '".$_SESSION["emp_id"]."', date_con = NOW() WHERE id = '".$_GET["id"]."' ";
				$stmt = mysqli_query($conn,$strSQL);
		?>
				<script>
					alert("อนุมัติการลาเรียบร้อย");
					window.location.href = "list_la.php";
				</script>
		<?
			}
			if($_GET["Action"] == "Noconhead")
			{
				$strSQL = "UPDATE leavela SET status_la = 'N' ,stamp_con = '".$_SESSION["emp_id"]."', date_con = NOW() WHERE id = '".$_GET["id"]."' ";
				$stmt = mysqli_query($conn,$strSQL);
		?>
				<script>
					alert("ไม่อนุมัติการลา");
					window.location.href = "list_la.php";
				</script>
		<?
			}
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
				inner join user_type on user_type.user_type_id = employee.user_type_id
				WHERE leavela.id = '".$_GET["id"]."' ";
			$stmt  = mysqli_query($conn, $strSQL);
			$row = mysqli_fetch_array($stmt);
			$thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม"); 
		?>
		<div class="col-md-9">
        		<p class="lead">ข้อมูลการลา</p>
               <!-- <div class="form-group">
                    <label class="col-md-2">รหัส : </label><?=$row[emp_id];?>
                </div>
                <div class="form-group">
                    <label class="col-md-2">ชื่อ-นามสกุล : </label><?=$row[title_name];?><?=$row[emp_name];?>
                </div>
                <div class="form-group">
                    <label class="col-md-2">เบอร์โทรศัพท์ : </label><?=$row[emp_mobile];?>
                </div>
                <div class="form-group">
                    <label class="col-md-2">ตำแหน่ง : </label><?=$row[po_name];?>
                </div>
                <div class="form-group">
                    <label class="col-md-2">หน่วยงาน : </label><?=$row[dep_name];?>
                </div>
                <div class="form-group">
                    <label class="col-md-2">Email : </label><?=$row[emp_email];?>
                </div>
                <div class="form-group">
                    <label class="col-md-2">สิทธิการใช้งาน : </label><?=$row[user_type_name];?>
					
                </div>-->

                <div class="form-group">
                    <label class="col-md-2">เรื่อง : </label><?=$row[subject_leave];?>
                </div>
                <div class="form-group">
                    <label class="col-md-2">ประเภทการลา : </label>
					<?
						$strSQL_tyla = "SELECT * FROM type_leave WHERE  tleave_id = '".$row['type_leave']."' ";
						$stmttyla =  mysqli_query($conn,$strSQL_tyla);
						$row_tyla = mysqli_fetch_array($stmttyla);
						
						$strSQL_la = "SELECT * FROM leavela where id = '".$_GET[id]."'";
						$stmt_la  = mysqli_query($conn, $strSQL_la);
						$row_la = mysqli_fetch_array($stmt_la);

						echo $row_tyla[tleave_name];
					?> 
                </div>
                <div class="form-group">
                    <label class="col-md-2">วันที่ลา : </label><?=date('d', strtotime($row['leave_date']));?> <?=$thaimonth[date('m', strtotime($row['leave_date']))-1];?> <?=date('Y', strtotime($row['leave_date']))+543;?>
                </div>
                <div class="form-group">
                <label class="col-md-2">ถึงวันที่ : </label><?=date('d', strtotime($row['leave_enddate']));?> <?=$thaimonth[date('m', strtotime($row['leave_enddate']))-1];?> <?=date('Y', strtotime($row['leave_enddate']))+543;?>
                </div>
                <div class="form-group">
                <?
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
                <label class="col-md-2">จำนวน : </label><font color="#FF0000"><?=$showdiff;?> วัน</font>
                </div>
                <div class="form-group">
                    <label class="col-md-2">เนื่องจาก : </label><?=$row[detail_leave];?>
                </div>
                
                <div class="form-group">
                    <label class="col-md-2">สถานะ : </label>
					<? if($row['status_la'] == 'Y'){  ?>
                        <button class="btn btn-success btn-xs">อนุมัติการลา</button>
                    <? }if($row['status_la'] == 'N'){   ?>
                        <button class="btn btn-danger btn-xs">ไม่อนุมัติการลา</button>
                    <? }if($row['status_la'] == ''){   ?>
                        <button class="btn btn-warning btn-xs">รออนุมัติ</button>
                    <? } ?>
                </div>
                
                
              
                <? 
					if($row['status_la'] == '' && $_SESSION["status"] == '3'){ ?>
					 <div class="form-group">
                    <label class="col-md-2">ไฟล์เอกสารการลา : </label>
                     <a href="<?=$row_la['file_pdf'];?>"  class="btn btn-default" target="_blank">ดาวน์โหลดไฟล์</a>	
                </div>         
                

                <div class="form-group">
                  <label class="col-md-2">ไฟล์เอกสารที่อนุมัติ </label>       

                <a href="form_file.php?id=<?=$row["id"];?>"  class="btn btn-default">อัพโหลดเอกสารการอนุมัติ</a>&nbsp;</div>
										<a href="JavaScript:if(confirm('ยืนยันไม่อนุมัติการลา ?')==true){window.location='<?=$_SERVER["PHP_SELF"];?>?Action=Noconhead&id=<?=$row["id"];?>';}" class="btn btn-danger">ไม่อนุมัติ</a>	
 
							
				<?  } ?>
				
                
		    <div class="clearfix"> </div>
	   </div>
	</div>
    <div style="height:100px;"></div>
	<div class="footer">
    	<? include 'footer.php'; ?>
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