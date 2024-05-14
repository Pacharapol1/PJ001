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
    <div align="center"><h2>การบันทึกรายงานประจำวัน</h2></div>
    <?
		$strSQL_mem = "SELECT * FROM diary 
			inner join member on member.mem_id = diary.mem_id
			inner join titlename on titlename.title_id = member.title_id
			where diary.diary_id = '".$_GET["diary_id"]."'  ";
		$stmt_mem= mysqli_query($conn,$strSQL_mem);
		$row_mem = mysqli_fetch_array($stmt_mem);
	?>
    <?
        $strSQL = "SELECT * FROM diary 
			inner join member on member.mem_id = diary.mem_id
			inner join titlename on titlename.title_id = member.title_id
			inner join saka on saka.saka_id = member.saka_id
			where diary.diary_id = '".$_GET["diary_id"]."' ";
        $stmt  = mysqli_query($conn,$strSQL);
        $numrow = mysqli_num_rows($stmt);
    ?>
    	<br><br>
    	<div align="center">
        ชื่อ-นามสกุล <?=$row_mem[title_name];?><?=$row_mem[mem_name];?> <?=$row_mem[mem_last];?><br>
        รหัส <?=$row_mem[mem_code];?> สาขาวิชา <?=$row_mem[saka_name];?>
        </div>
        <br><br>
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr>
                    <th style="text-align:center; width:8%;">วันที่</th>
                    <th style="text-align:center; width:42%;">รายงานการปฏิบัติงาน</th>
                    <th style="text-align:center; width:5%;">ลายเซ็นนักศึกษา</th>
                </tr>
            </thead>
            <?
                  
                  while($row = mysqli_fetch_array($stmt)){
            ?>
                <tr>
                  <td style="text-align:center;"><?=date('d/m', strtotime($row[diary_date]));?>/<?=date('Y', strtotime($row[diary_date]))+543;?></td>
                  <td>
                  <strong>รายงานการปฏิบัติงาน</strong><br>
				  <?=$row[diary_report];?><br><br>
                  <strong>ปัญหาที่พบจากการปฏิบัติงาน</strong><br>
                  <?=$row[diary_question];?><br><br>
                  <strong>แนวทางการแก้ไขปัญหา</strong><br>
                  <?=$row[diary_modify];?><br><br>
                  
                  </td>
                  <td style="text-align:center;"><?=$row_mem[title_name];?><?=$row_mem[mem_name];?> <?=$row_mem[mem_last];?></td>
                </tr>
             <? $num++; } ?>
            </tbody>
        </table>
    </div>
</div>
		    <div class="clearfix"> </div>
	   </div>
	</div>
    </div>
	</div>
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