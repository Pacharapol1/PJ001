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
        window.location.href = "login.php";
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
  		<h3>รายชื่อผู้เข้าสมัคร</h3>
        <div class="breadcrumb1">
            <ul>
                <li class="icon6"><a href="index.php">หน้าหลัก</a></li>
                <li class="current-page">รายชื่อผู้เข้าสมัคร</li>
            </ul>
        </div>
  	</div>
   </div>
    <!-- //banner -->
	<div class="courses_box1">
	   <div class="container">
	   	  <div class="col-md-3">
			<div class="courses_box1-left">
            	<? include 'menu_profile_office.php'; ?>
	       </div>

		</div>
        <?
			if($_GET["Action"] == "Del")
			{
				$strSQL_del = "DELETE FROM register_work WHERE re_id = '".$_GET["re_id"]."' ";
				mysqli_query($conn,$strSQL_del);
			}
			$strSQL = "SELECT * FROM member 
				inner join titlename on titlename.title_id = member.title_id
				inner join department on department.dep_id = member.dep_id
				inner join saka on saka.saka_id = member.saka_id
				where member.mem_id = '".$_SESSION[mem_id]."'";
			$stmt  = mysqli_query($conn,$strSQL);
			$row = mysqli_fetch_array($stmt);
		?>
        <div class="col-md-9">
         <div class="panel-body">
            <div class="table-responsive">
                <div align="center"><h2>รายชื่อผู้เข้าสมัคร</h2></div>
                <br><br>
            <?
				if($_GET["Action"] == "Test")
				{
					$strSQL_up = "UPDATE register_work SET re_status = 'Y', re_status_office = 'Y' WHERE re_id = '".$_GET["re_id"]."' ";
					$stmt_up = mysqli_query($conn,$strSQL_up);
				}
				if($_GET["Action"] == "TestNo")
				{
					$strSQL_up = "UPDATE register_work SET re_status = 'N', re_status_office = 'N' WHERE re_id = '".$_GET["re_id"]."' ";
					$stmt_up = mysqli_query($conn,$strSQL_up);
				}
                $num=1;
                $strSQL = "SELECT * FROM register_work
                  inner join club_work on club_work.work_id = register_work.work_id
                  inner join position on position.po_id = club_work.work_name
				  inner join club on club.club_id = club_work.club_id
				  
                  where club.club_id = '".$_SESSION["club_id"]."' and (register_work.re_status = '3' or register_work.re_status = 'Y')
                  order by register_work.re_date DESC
				   ";
                $stmt  = mysqli_query($conn,$strSQL);
                $numrow = mysqli_num_rows($stmt);
                if($numrow != ''){ 
            ?>
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                        	<th style="text-align:center;">วันที่สมัคร</th>
                            <th style="text-align:center;">ชื่อผู้สมัคร</th>
                            <th style="text-align:center;">ตำแหน่งงาน</th>
                            <th style="text-align:center;">สถานะ</th>
                            <th style="text-align:center;">วันที่นัด</th>
                            <th style="text-align:center;">สถานที่</th>
                            <th style="text-align:center;">จัดการ</th>
                        </tr>
                    </thead>
                    <?
                          
                          while($row = mysqli_fetch_array($stmt)){
							$strSQL_mem = "SELECT * FROM member 
								inner join titlename on titlename.title_id = member.title_id
								where member.mem_id = '".$row[mem_id]."'";
							$stmt_mem= mysqli_query($conn,$strSQL_mem);
							$row_mem = mysqli_fetch_array($stmt_mem);
							
							$strSQL_po = "SELECT * FROM club_work where club_work.work_id = '".$row[work_id]."'";
							$stmt_po= mysqli_query($conn,$strSQL_po);
							$row_po = mysqli_fetch_array($stmt_po);
							  	
                    ?>
                        <tr>
                          <td style="text-align:center;"><?=date('d/m', strtotime($row[re_date]));?>/<?=date('Y', strtotime($row[re_date]))+543;?></td>
                          <td><?=$row_mem[title_name];?><?=$row_mem[mem_name];?> <?=$row_mem[mem_last];?></td>
                          
                          <td><?=$row[po_name];?></td>
                          <td style="text-align:center;">
                          <?
						  		if($row[re_status_office] == ''){
									echo '<font color="#FF6600">รอนัดสัมภาษณ์</font>';
								}else if($row[re_status_office] == '1'){
									echo '<font color="#FF6600">รอผลการคัดเลือก</font><br>';
								}else if($row[re_status_office] == 'Y'){
									echo '<font color="#009900">ผ่านเข้าคัดเลือก</font>';
								}else if($row[re_status_office] == 'N'){
									echo '<font color="#FF0000">ไม่ผ่าน</font>';
								}
						  ?>
                          </td>
                          <td style="text-align:center;">
                          <? if($row[re_date_time] != '0000-00-00 00:00:00'){ ?>
						  <?=date('d/m', strtotime($row[re_date_time]));?>/<?=date('Y', strtotime($row[re_date_time]))+543;?>
                          <? }else{ echo '-'; } ?>
                          </td>
                          <td><?=$row[re_office_place];?></td>
                          <td style="text-align:center;">
                          	<? if($row[re_status_office] == ''){ ?>
                                <a href="form_time_re.php?re_id=<?=$row["re_id"];?>" class="btn btn-info btn-sm">นัดสัมภาษณ์</a>
                            <? }else if($row[re_status_office] == '1'){ ?>
                                <a href="JavaScript:if(confirm('คุณต้องการยืนยันการผ่านทดสอบ ?')==true){window.location='<?=$_SERVER["PHP_SELF"];?>?Action=Test&mem_id=<?=$row["mem_id"];?>&re_id=<?=$row["re_id"];?>';}" class="btn btn-success btn-xs">ผ่าน</a>
                                <a href="JavaScript:if(confirm('คุณต้องการยืนยันการไม่ผ่านทดสอบ ?')==true){window.location='<?=$_SERVER["PHP_SELF"];?>?Action=TestNo&mem_id=<?=$row["mem_id"];?>&re_id=<?=$row["re_id"];?>';}" class="btn btn-danger btn-xs">ไม่ผ่าน</a>
                                
                            <? }else{ echo '-'; } ?>
                            </td>
                        </tr>
                     <? $num++; } ?>
                    </tbody>
                </table>
                <? }else{ echo '<div align="center">--- ยังไม่มีการเข้าร่วมสมัครสหกิจศึกษา ---</div>'; } ?>
            </div>
        </div>
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