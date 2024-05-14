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
  		<h3>ตำแหน่งงานที่เปิดรับ</h3>
        <div class="breadcrumb1">
            <ul>
                <li class="icon6"><a href="index.php">หน้าหลัก</a></li>
                <li class="current-page">ตำแหน่งงานที่เปิดรับ</li>
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
                <div style="height:20px;"></div>      
	       </div>

		</div>
		<div class="col-md-9">
		<?
			$strSQL_club = "SELECT * FROM club where club_id = '".$_SESSION["club_id"]."' ";
			$stmt_club  = mysqli_query($conn,$strSQL_club);
			$row_club = mysqli_fetch_array($stmt_club);
		?>
         <div class="panel-body">
          <div class="table-responsive">
              <div align="center"><h2><?=$row_club[club_name];?></h2></div>
              <a href="form_work.php" class="btn btn-primary btn-sm">เพิ่มตำแหน่งงาน</a>
              <br><br>
          <?
		  	  if($_GET["Action"] == "Del")
			  {
				  $strSQL = "UPDATE club_work SET work_status = 'C' WHERE work_id = '".$_GET["work_id"]."' ";
				  $stmt = mysqli_query($conn,$strSQL);
			  }
              $num=1;
              $strSQL = "SELECT * FROM club 
                      inner join club_work on club_work.club_id = club.club_id
                      where club_work.club_id = '".$_SESSION["club_id"]."' and club_work.work_status != 'C' ";
              $stmt  = mysqli_query($conn,$strSQL);
              $numrow = mysqli_num_rows($stmt);
              if($numrow != ''){ 
          ?>
              <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                  <thead>
                      <tr>
                          <th style="text-align:center; width:8%;">วันที่เปิด</th>
                          <th style="text-align:center; width:15%;">ตำแหน่งงาน</th>
                          <th style="text-align:center; width:20%;">รายละเอียด</th>
                          <th style="text-align:center; width:5%;">จำนวนที่รับ</th>
                          <th style="text-align:center; width:5%;">จำนวนคงเหลือ</th>
                          <th style="text-align:center; width:8%;">-</th>
                      </tr>
                  </thead>
                  <?
                        
                        while($row = mysqli_fetch_array($stmt)){
                  ?>
                      <tr>
                        <td style="text-align:center;"><?=date('d/m', strtotime($row[work_date]));?>/<?=date('Y', strtotime($row[work_date]))+543;?></td>
                        <td><?=$row[work_name];?></td>
                        <td><?=$row[work_detail];?></td>
                        <td style="text-align:center;"><?=$row[work_num];?></td>
                        <td style="text-align:center;"><?=$row[work_num]-$row[work_amount];?></td>
                        <td style="text-align:center;">
							<a href="edit_work.php?work_id=<?=$row["work_id"];?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                            <a href="JavaScript:if(confirm('คุณต้องการลบตำแหน่ง ?')==true){window.location='<?=$_SERVER["PHP_SELF"];?>?Action=Del&club_id=<?=$row["club_id"];?>&work_id=<?=$row["work_id"];?>';}" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></a>
                        </td>
                      </tr>
                   <? $num++; } ?>
                  </tbody>
              </table>
              <? }else{ echo '<div align="center">---ยังไม่มีตำแหน่งงานว่าง---</div>'; } ?>
          </div>
      </div>
		    <div class="clearfix"> </div>
	   </div>
	</div>
    </div>
	</div>
	<!--<div class="footer">
    	<? include 'footer.php'; ?>
    </div>-->
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