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
                $num=1;
                $strSQL = "SELECT * FROM register_work
                  inner join club_work on club_work.work_id = register_work.work_id
				  inner join club on club.club_id = club_work.club_id
				  
                  where club.club_id = '".$_SESSION["club_id"]."' and (register_work.re_status = 'Y' or register_work.re_status = 'Y')
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
                            <th style="text-align:center;">พนักงานที่ปรึกษา</th>
                            <th style="text-align:center;">เลือกพนักงาน</th>
                        </tr>
                    </thead>
                    <?
                          
                          while($row = mysqli_fetch_array($stmt)){
							$strSQL_mem = "SELECT * FROM member 
								inner join titlename on titlename.title_id = member.title_id
								where member.mem_id = '".$row[mem_id]."'";
							$stmt_mem= mysqli_query($conn,$strSQL_mem);
							$row_mem = mysqli_fetch_array($stmt_mem);
							
							$strSQL_po = "SELECT * FROM emp_office 
								inner join titlename on titlename.title_id = emp_office.title_id
								where emp_office.office_id = '".$row[office_id]."'";
							$stmt_po= mysqli_query($conn,$strSQL_po);
							$row_po = mysqli_fetch_array($stmt_po);
							  	
                    ?>
                        <tr>
                          <td style="text-align:center;"><?=date('d/m', strtotime($row[re_date]));?>/<?=date('Y', strtotime($row[re_date]))+543;?></td>
                          <td><?=$row_mem[title_name];?><?=$row_mem[mem_name];?> <?=$row_mem[mem_last];?></td>
                          
                          <td><?=$row[work_name];?></td>
                          <td>
                          	<?
                            	if($row[office_id] == ''){
									echo '<font color="#FF6600">รอคัดเลือก</font>';
								}else{
							?>
                            <?=$row_po[title_name];?><?=$row_po[office_name];?> <?=$row_po[office_last];?>
                            <?
								}
							?>
                          </td>
                          <td style="text-align:center;">
						  	<?
                            	if($row[office_id] == ''){
							?>
                          		<a href="form_cons.php?re_id=<?=$row["re_id"];?>" class="btn btn-info btn-sm">เลือกพนักงาน</a>
                            <?
								}else{
							?>
                            	<a href="edit_cons.php?re_id=<?=$row["re_id"];?>&office_id=<?=$row["office_id"];?>" class="btn btn-warning btn-sm">เปลี่ยนพนักงาน</a>
                            <? } ?>
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