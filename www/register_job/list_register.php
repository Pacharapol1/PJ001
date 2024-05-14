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
  		<h3>ข้อมูลการสมัครสหกิจศึกษา</h3>
        <div class="breadcrumb1">
            <ul>
                <li class="icon6"><a href="index.php">หน้าหลัก</a></li>
                <li class="current-page">ข้อมูลการสมัครสหกิจศึกษา</li>
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
                <div align="center"><h2>ข้อมูลการสมัครสหกิจศึกษา</h2></div>
                <br><br>
            <?
                $num=1;
                $strSQL = "SELECT * FROM register_work
                  inner join club_work on club_work.work_id = register_work.work_id
				  inner join club on club.club_id = club_work.club_id
                  where register_work.mem_id = '".$_GET[mem_id]."' ";
                $stmt  = mysqli_query($conn,$strSQL);
                $numrow = mysqli_num_rows($stmt);
                if($numrow != ''){ 
            ?>
            	
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                        	<th style="text-align:center;">วันที่สมัคร</th>
                            <th style="text-align:center;">ชื่อบริษัท</th>
                            <th style="text-align:center;">ตำแหน่งงาน</th>
                            <th style="text-align:center;">เอกสาร</th>
                            <th style="text-align:center;">สถานะ</th>
                            <? if($row[re_status] == 'W'){ ?>
                            <th style="text-align:center;">ลบ</th>
                            <? }else{ ?>
                            <th style="text-align:center;">วันนัดหมาย</th>
                            <? } ?>
                        </tr>
                    </thead>
                    <?
                          
                          while($row = mysqli_fetch_array($stmt)){
                    ?>
                        <tr>
                          <td style="text-align:center;"><?=date('d/m', strtotime($row[re_date]));?>/<?=date('Y', strtotime($row[re_date]))+543;?></td>

                          <td><?=$row[club_name];?></td>
                          
                          <td><?=$row[work_name];?></td>
                          <td  style="text-align:center;"><a href="list_file.php?re_id=<?=$row[re_id];?>" class="btn btn-success btn-sm"><i class="fa fa-upload"></i></a>
                          <td style="text-align:center;">
                          <?
						  		if($row[re_status] == 'W'){
									echo '<font color="#FF6600">รออนุมัติ</font>';
								}else if($row[re_status] == '1'){
									echo '<font color="#FF6600">รอผลสัมภาษณ์</font>';
								}else if($row[re_status] == '1N'){
									echo '<font color="#FF0000">ไม่ผ่านการสัมภาษณ์</font>';
								}else if($row[re_status] == '2'){
									echo '<font color="#FF6600">รอผลการทดสอบ</font>';
								}else if($row[re_status] == 'Y'){
									echo '<font color="#009900">ผ่านการเข้างาน</font>';
								}else if($row[re_status] == '3' && $row[re_status_office] == ''){
									echo '<font color="#FF6600">รอผู้ประกอบการนัดหมาย</font>';
								}else if($row[re_status] == '3' && $row[re_status_office] == '1'){
									echo '<font color="#FF6600">รอผลการคัดเลือก</font>';
								}else if($row[re_status] == 'C'){
									echo '<font color="#FF0000">ไม่อนุมัติ</font>';
								}else if($row[re_status] == 'N'){
									echo '<font color="#FF0000">ไม่ผ่านการเข้างาน</font>';
								}
						  ?>
                          </td>
                          <td style="text-align:center;">
                          	<? if($row[re_status] == 'W'){ ?>
                                <a href="JavaScript:if(confirm('คุณต้องการลบการสมัคร ?')==true){window.location='<?=$_SERVER["PHP_SELF"];?>?Action=Del&re_id=<?=$row["re_id"];?>';}" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></a>
                            <? }else{ ?>
								<? if($row[re_date_time] != '0000-00-00'){ ?>
                                <?=date('d/m', strtotime($row[re_date_time]));?>/<?=date('Y', strtotime($row[re_date_time]))+543;?>
                                <? }else{ echo '-'; }  ?>
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