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
  		<h3>การนำเสนอผลงาน</h3>
        <div class="breadcrumb1">
            <ul>
                <li class="icon6"><a href="index.php">หน้าหลัก</a></li>
                <li class="current-page">การนำเสนอผลงาน</li>
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
			$strSQL_club = "SELECT * FROM club where club_id = '".$_SESSION["club_id"]."' ";
			$stmt_club  = mysqli_query($conn,$strSQL_club);
			$row_club = mysqli_fetch_array($stmt_club);
		?>
         <div class="panel-body">
          <div class="table-responsive">
              <div align="center"><h2>การนำเสนอผลงาน</h2></div>
              <a href="form_about.php" class="btn btn-primary btn-sm">เพิ่มผลงาน</a>
              <br><br>
          <?
		  	  if($_GET["Action"] == "Del")
			  {
				  $strSQL = "UPDATE about SET about_status = 'C' WHERE about_id = '".$_GET["about_id"]."' ";
				  $stmt = mysqli_query($conn,$strSQL);
			  }
              $num=1;
              $strSQL = "SELECT * FROM about where mem_id = '".$_SESSION["mem_id"]."' and about_status != 'C' ";
              $stmt  = mysqli_query($conn,$strSQL);
              $numrow = mysqli_num_rows($stmt);
              if($numrow != ''){ 
          ?>
              <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                  <thead>
                      <tr>
                          <th style="text-align:center; width:15%;">วันที่ส่งผลงาน</th>
                          <th style="text-align:center; width:15%;">ไฟล์ผลงาน</th>
                          <th style="text-align:center; width:15%;">-</th>
                      </tr>
                  </thead>
                  <?
                        
                        while($row = mysqli_fetch_array($stmt)){
                  ?>
                      <tr>
                        <td style="text-align:center;"><?=date('d/m', strtotime($row[about_date]));?>/<?=date('Y', strtotime($row[about_date]))+543;?></td>
                        <td><a href="<?=$row[about_file];?>" target="_blank">ไฟล์นำเสนอผลงาน</a></td>
                        <td style="text-align:center;">
                        <? if($row[about_status] == ''){ ?>
                            <a href="JavaScript:if(confirm('คุณต้องการลบไฟล์ผลงาน ?')==true){window.location='<?=$_SERVER["PHP_SELF"];?>?Action=Del&about_id=<?=$row["about_id"];?>';}" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></a>
                        <? 
							}else if($row[about_status] == 'C'){ 
								echo '<font color="#FF0000">ผลงานไม่ผ่านการอนุมัติ</font>';
							}else {
								echo '<font color="#009900">ผลงานผ่านการอนุมัติ</font>';
							}
						?>
                        </td>
                      </tr>
                   <? $num++; } ?>
                  </tbody>
              </table>
              <? }else{ echo '<div align="center">---ยังไม่มีผลงาน---</div>'; } ?>
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