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
      <h3>การบันทึกรายงานประจำวัน</h3>
        <div class="breadcrumb1">
            <ul>
                <li class="icon6"><a href="index.php">หน้าหลัก</a></li>
                <li class="current-page">การบันทึกรายงานประจำวัน</li>
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
                    <h2 class="page-header">การบันทึกรายงานประจำวัน</h2>
                </div>
            </div>
                     
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
          
        </header>
        <div id="div-1" class="accordion-body collapse in body">
            <form method="post" action="add_today.php" class="form-horizontal" enctype="multipart/form-data">
            <input type="hidden" name="mem_id" value="<?=$_SESSION["mem_id"];?>">
              <h4 class="form-signin-heading" align="center"></h4>
              	  <div class="form-group">
                      <label class="control-label col-sm-4">วันที่บันทึก :</label>
                      <div class="col-sm-4">
                            <input class="form-control" name="diary_date" type="date" min="<?=date('Y-m-d');?>" value="<?=date('Y-m-d');?>" required >
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-4">รายงานการปฏิบัติงาน :</label>
                      <div class="col-sm-8">
                          	<textarea name="diary_report" class="form-control" rows="5" placeholder="รายงานการปฏิบัติงาน" required></textarea>
                      </div>
                      
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-4">ปัญหาที่พบจากการปฏิบัติงาน :</label>
                      <div class="col-sm-8">
                          	<textarea name="diary_question" class="form-control" rows="5" placeholder="ปัญหาที่พบจากการปฏิบัติงาน" required></textarea>
                      </div>
                      
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-4">แนวทางการแก้ไขปัญหา :</label>
                      <div class="col-sm-8">
                          	<textarea name="diary_modify" class="form-control" rows="5" placeholder="แนวทางการแก้ไขปัญหา" required></textarea>
                      </div>
                      
                  </div>
                  <div class="form-group">
              			<label class="control-label col-sm-4"></label>
                        <button class="btn btn-primary" type="submit">บันทึก</button> 
                        <button type="button" class="btn btn-danger" onClick="window.history.back();">ยกเลิก</button>
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
