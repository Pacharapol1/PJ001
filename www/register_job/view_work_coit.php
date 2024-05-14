<?
  @session_start();
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
      <h3>การจัดทำโครงงาน</h3>
        <div class="breadcrumb1">
            <ul>
                <li class="icon6"><a href="index.php">หน้าหลัก</a></li>
                <li class="current-page">การจัดทำโครงงาน</li>
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
                    <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">การจัดทำโครงงาน</h2>
                </div>
            </div>
                     
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
          
        </header>
        <div id="div-1" class="accordion-body collapse in body">
        <?
			$strSQL = "SELECT *, work_report.work_detail as wdetail FROM work_report 
				inner join register_work on register_work.re_id = work_report.re_id
				inner join club_work on club_work.work_id = register_work.work_id
				inner join club on club.club_id = club_work.club_id
				WHERE work_report.mem_id = '".$_SESSION[mem_id]."' ";
			$stmt  = mysqli_query($conn,$strSQL);
			$row = mysqli_fetch_array($stmt);
		?>
            <form method="post" action="#" class="form-horizontal" enctype="multipart/form-data">
            <input type="hidden" name="mem_id" value="<?=$_SESSION["mem_id"];?>">
            <input type="hidden" name="re_id" value="<?=$row_re["re_id"];?>">
              <h4 class="form-signin-heading" align="center"></h4>
              	  <div class="form-group">
                      <label class="control-label col-sm-3">ชื่อสถานประกอบการ :</label>
                      <div class="col-sm-6">
                      		<?=$row[club_name];?>
                      </div>
                  </div>
              	  <div class="form-group">
                      <label class="control-label col-sm-3">หัวข้อรายงาน :</label>
                      <div class="col-sm-6">
                      		<?=$row[work_title];?>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-3">วัตถุประสงค์ :</label>
                      <div class="col-sm-8">
                      		<?=$row[wdetail];?>
                      </div>
                      
                  </div>
                  
                  <div class="form-group">
                      <label class="control-label col-sm-3">วิธีการศึกษา :</label>
                      <div class="col-sm-8">
                      		<?=$row[work_step];?>
                      </div>
                      
                  </div>
                  <div class="form-group">
              			<label class="control-label col-sm-3"></label>
                        <a href="edit_work_coit.php?workre_id=<?=$row[workre_id];?>" class="btn btn-warning">แก้ไข</a> 
                        <a href="print_work_coit.php?workre_id=<?=$row[workre_id];?>" class="btn btn-primary" target="_blank">พิมพ์</a> 
                        </div>
                  </div>
            </form>
        </div>
    </div>
</div>
   
    </div>

                    </div>
                    
                    
                  </div>  
        <!-- END PAGE CONTENT -->

                </div>
        
    
       <!--END MAIN WRAPPER -->

   <!-- FOOTER -->
    <div class="footer">
      <? include 'footer.php'; ?>
    </div>
    <!--END FOOTER -->

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
</html>
