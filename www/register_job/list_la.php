<?
	session_start();
	include "admin/connectDb.php"; 
	$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
	mysqli_set_charset($conn, "utf8");
	error_reporting(~E_NOTICE); 
if($_SESSION["full_name"] == ''){
?>
    <script>
        alert("กรุณาเข้าสู่ระบบ");
        window.location.href = "index.php";
    </script>
<?  } ?>
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
		<div class="col-md-9">

        <?
			
			if($_GET["Action"] == "Del")
			{
				$strSQL = "DELETE FROM leavela WHERE id = '".$_GET["id"]."' ";
				$stmt = mysqli_query($conn,$strSQL);
			}
			
			if($_SESSION["status"] == '1' || $_SESSION["status"] == '3'){
				$strSQL = "SELECT * FROM leavela ORDER BY id DESC  ";
			}else{
				$strSQL = "SELECT * FROM leavela WHERE emp_id = '".$_SESSION["emp_id"]."' ORDER BY id DESC ";
			}
			$stmt  = mysqli_query($conn, $strSQL);
			$numrow = mysqli_num_rows($stmt);
			if($numrow != ''){
		?>
        	<table class="table table-bordered table-hover table-responsive">
              <thead>
                  <tr>
                  	<!--<th style="width:8%; text-align:center;">เลขที่ใบลา</th>-->
                    <th style="width:10%; text-align:center;">วันที่ยื่นลา</th>
                    <th style="width:18%; text-align:center;">เรื่อง</th>
                    <th style="width:10%; text-align:center;">ประเภทลา</th>
                    <!--<th style="width:10%; text-align:center;">วันที่ลา</th>-->
                    <th style="width:5%; text-align:center;">จำนวนวัน</th>
                    <th style="width:10%; text-align:center;">ผลการอนุมัติ</th>
                    <th style="width:12%; text-align:center;">สถานะ</th>
                    <th colspan="3" style="width:12%; text-align:center;">จัดการ</th>
                  </tr>
                  <?
					 $num = 0;
					 $i=0;
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
						while($row = mysqli_fetch_array($stmt))
						{
							
							$strSQL_user = "SELECT * FROM employee WHERE  emp_id = '".$row['emp_id']."' ";
							$stmtuser =  mysqli_query($conn,$strSQL_user);
							$rowuser = mysqli_fetch_array($stmtuser);
					?>

                  <tr>
                    <!--<td align="center"><a href="view_detail.php?no_la=<?=$row['no_la'];?>"><?=$row['no_la'];?></a></td>-->
                    <td align="center">
                        <?
                            $date_la = date('Y', strtotime($row['date_la']))+543;
                            echo date('d/m', strtotime($row['date_la'])).'/'.$date_la;
                        ?>
                    </td>
                    <td align="center"><?=$row['subject_leave'];?></td>
                    
                    <td align="center">
                        <?
							$strSQL_tyla = "SELECT * FROM type_leave WHERE  tleave_id = '".$row['type_leave']."' ";
							$stmttyla =  mysqli_query($conn,$strSQL_tyla);
							$row_tyla = mysqli_fetch_array($stmttyla);
							
                            echo $row_tyla[tleave_name];
                        ?> 
                    </td>
                    <!--<td align="center">
                        <?
                            $sy = date('Y', strtotime($row['leave_date']))+543;
                            echo date('d/m', strtotime($row['leave_date'])).'/'.$sy;
                        ?>
                        -
                        <?
                            $ey = date('Y', strtotime($row['leave_enddate']))+543;
                            echo date('d/m', strtotime($row['leave_enddate'])).'/'.$ey;
                        ?>
                    </td>-->
                    <td align="center">
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
                            echo $showdiff;
                        ?>
                    </td>
                    <td align="center"><? if($row['file_pdf'] != ''){ ?><a href="<?=$row['file_pdf'];?>" target="_blank"><i class="fa fa-file-o fa-2x"></i></a><? } ?></td>
                        <? if($row['status_la'] == 'Y'){  ?>
                            <td align="center" style="color:#060;"><button class="btn btn-success btn-xs">อนุมัติการลา</button></td>
                        <? }if($row['status_la'] == 'N'){   ?>
                            <td align="center" style="color:#FF0000;"><button class="btn btn-danger btn-xs">ไม่อนุมัติการลา</button></td>
                        <? }if($row['status_la'] == ''){   ?>
                            <td align="center" style="color:#000000;"><button class="btn btn-warning btn-xs">รออนุมัติ</button></td>
                        <? } ?>
                  
                    <? if($row['status_la'] == ''){  ?>
                   
                    	<? if($_SESSION["status"] == '3'){ ?>
                        <td  align="center"> <a href="view_detail.php?id=<?=$row['id'];?>" class="btn btn-info btn-sm"><i class="fa fa-search"></i></a> </td>
                        <? }else{ ?>
                        <td  align="center">
                        <a href="view_detail.php?id=<?=$row['id'];?>" class="btn btn-primary btn-sm" ><i class="fa fa-search"></i></a></td>
                         <td align="center">
                        <a href="edit_la.php?id=<?=$row["id"];?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a></td>
                        <td align="center">
                        <a href="JavaScript:if(confirm('ยืนยันลบประวัติการลา ?')==true){window.location='<?=$_SERVER["PHP_SELF"];?>?Action=Del&id=<?=$row["id"];?>';}" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></a></td>
                        <? } ?>
                        
                    </td>
                    <? }else{ ?>
                        <? if($row['status_la'] == 'Y'){  ?>
                        <td colspan="3" align="center">
                            <a href="view_detail.php?id=<?=$row['id'];?>" class="btn btn-info btn-sm"><i class="fa fa-search"></i></a>
                        
                        <? } ?>
                        <? if($row['status_la'] == 'N'){  ?>
                        <td align="center">
                            <a href="view_detail.php?id=<?=$row['id'];?>" class="btn btn-info btn-sm"><i class="fa fa-search"></i></a>
                        </td>
                        <? } ?>
                    <? } ?>
                    </tr>
                <? } ?>
              </thead>
              <tbody>
              </tbody>
          </table>
			<? }else{ ?>
            	<div align="center"><h1>---ไม่มีรายการลา---</h1></div>
            <?	} ?>
		    <div class="clearfix"> </div>
	   </div>
	</div>
    </div>
	</div>
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