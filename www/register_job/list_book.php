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
  		<h3>รูปเล่มสมบูรณ์</h3>
        <div class="breadcrumb1">
            <ul>
                <li class="icon6"><a href="index.php">หน้าหลัก</a></li>
                <li class="current-page">รูปเล่มสมบูรณ์</li>
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
              <div align="center"><h2>รูปเล่มสมบูรณ์</h2></div>
              <!--<a href="form_book.php" class="btn btn-primary btn-sm">เพิ่มไฟล์เอกสาร</a>-->
          <?
		  	  if($_GET["Action"] == "Del")
			  {
				  $strSQL = "UPDATE book SET book_status = 'C' WHERE book_id = '".$_GET["book_id"]."' ";
				  $stmt = mysqli_query($conn,$strSQL);
			  }
              $num=1;
              $strSQL = "SELECT * FROM book where mem_id = '".$_SESSION["mem_id"]."' and book_status != 'C' ";
              $stmt  = mysqli_query($conn,$strSQL);
			  $row = mysqli_fetch_array($stmt);
              $numrow = mysqli_num_rows($stmt);
          ?>
              <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                  <thead>
                      <tr>
                          <!--<th style="text-align:center; width:15%;">วันที่ส่ง</th>-->
                          <th style="text-align:center; width:15%;">ชื่อไฟล์เอกสาร</th>
                          <th style="text-align:center; width:15%;">เอกสาร</th>
                      </tr>
                  </thead>
                  <?
				  			$namebook = array('','ชื่อเรื่อง', 'บทคัดย่อ', 'กิตติกรรมประกาศ', 'คำนำ', 'สารบัญ', 'บทที่ 1', 'บทที่ 2', 'บทที่ 3', 'บทที่ 4', 'บทที่ 5', 'บรรณานุกรม', 'ภาคผนวก', 'ประวัติผู้จัดทำ');
                        	
							$book_status=$row[book_status];

							for($i=1;$i<13;$i++){
                  ?>
                              <tr>
                                <!--<td style="text-align:center;"><?=date('d/m', strtotime($row[book_date]));?>/<?=date('Y', strtotime($row[book_date]))+543;?></td>-->
                                <td><?=$namebook[$i];?></td>
                                <td style="text-align:center;">
                                	<? if($row[book_file.$i] != ''){ ?>
                                		<a href="<?=$row[book_file.$i];?>" target="_blank">เอกสาร</a>
                                    <? }else{ ?>
                                    	<a href="form_book.php?book_file=<?=$i;?>" class="btn btn-primary btn-sm">เพิ่มไฟล์เอกสาร</a>
                                    <? } ?>
                                 </td>
                              </tr>
                            <? } ?> 
                   <? $num++; ?>
                   		<tr>
                        	<td colspan="2" style="text-align:center;">
                            	<? if($book_status == ''){ 
									 echo '<font color="#FF9900">รอตรวจรูปเล่ม</font>';
								?>
                                    <!--<a href="JavaScript:if(confirm('คุณต้องการลบไฟล์รูปเล่มสมบูรณ์ ?')==true){window.location='<?=$_SERVER["PHP_SELF"];?>?Action=Del&book_id=<?=$row["book_id"];?>';}" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></a>-->
                                    
                                <? 
                                    }else if($row[book_status] == 'C'){ 
                                        echo '<font color="#FF0000">รูปเล่มไม่ผ่านการอนุมัติ</font>';
                                    }else {
                                        echo '<font color="#009900">รูปเล่มผ่านการอนุมัติ</font>';
                                    }
                                ?>
                            </td>
                        </tr>
                  </tbody>
              </table>
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