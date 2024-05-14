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
  		<h3>การบันทึกแผนการปฏิบัติงาน</h3>
        <div class="breadcrumb1">
            <ul>
                <li class="icon6"><a href="index.php">หน้าหลัก</a></li>
                <li class="current-page">การบันทึกแผนการปฏิบัติงาน</li>
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
         <div class="panel-body">
                            <div class="table-responsive">
                            <div align="center"><h2>การบันทึกแผนการปฏิบัติงาน</h2></div>
                            <a href="form_plan.php" class="btn btn-primary btn-sm">เพิ่มการบันทึก</a>
                            <br><br>
                            <?
								if($_GET["Action"] == "Del")
								{
									$strSQL = "DELETE FROM diary WHERE diary_id = '".$_GET["diary_id"]."' ORDER BY  diary_id DESC  ";
									$stmt = mysqli_query($conn,$strSQL);
								}
								$num=1;
								$strSQL = "SELECT * FROM diary where mem_id = '".$_SESSION[mem_id]."' ";
								$stmt  = mysqli_query($conn,$strSQL);
								$numrow = mysqli_num_rows($stmt);
								if($numrow != ''){ 
							?>
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center; width:8%;">วันที่บันทึก</th>
                                            <th style="text-align:center; width:30%;">รายงานการปฏิบัติงาน</th>
                                            <th style="text-align:center; width:5%;">พิมพ์</th>
                                            <th style="text-align:center; width:10%;">จัดการ</th>
                                        </tr>
                                    </thead>
                                    <?
                                          
                                          while($row = mysqli_fetch_array($stmt)){
                                    ?>
                                        <tr>
                                          <td style="text-align:center;"><?=date('d/m', strtotime($row[diary_date]));?>/<?=date('Y', strtotime($row[diary_date]))+543;?></td>

                                          <td><?=$row[diary_report];?></td>
                                          <td style="text-align:center;"><a href="print_diary.php?diary_id=<?=$row["diary_id"];?>" class="btn btn-info btn-sm" target="_blank"><i class="fa fa-print"></i></a></td>
                                          <td style="text-align:center;">
                                          	<a href="edit_today.php?diary_id=<?=$row["diary_id"];?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                            <a href="JavaScript:if(confirm('ยืนยันลบการบันทึก ?')==true){window.location='<?=$_SERVER["PHP_SELF"];?>?Action=Del&diary_id=<?=$row["diary_id"];?>';}" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></a>
                                          </td>
                                        </tr>
                                     <? $num++; } ?>
                                    </tbody>
                                </table>
                                <? }else{ echo '<div align="center">---ยังไม่มีการบันทึกแผนการปฏิบัติงาน---</div>'; } ?>
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