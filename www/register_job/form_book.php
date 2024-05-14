<?
  @session_start();
  include "admin/connectDb.php"; 
  $conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
  mysqli_set_charset($conn, "utf8");
  error_reporting(~E_NOTICE); 
if($_SESSION["full_name"] == ''){
?>
    <script>
        alert("กรุณาเข้าสู่ระบบ");
        window.location.href = "index.php";
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
				$namebook = array('','ชื่อเรื่อง', 'บทคัดย่อ', 'กิตติกรรมประกาศ', 'คำนำ', 'สารบัญ', 'บทที่ 1', 'บทที่ 2', 'บทที่ 3', 'บทที่ 4', 'บทที่ 5', 'บรรณานุกรม', 'ภาคผนวก', 'ประวัติผู้จัดทำ');
			?>
         <div class="panel-body">
                    <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header"><?=$namebook[$_GET[book_file]];?></h2>
                </div>
            </div>
                     
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
          
        </header>
        <div id="div-1" class="accordion-body collapse in body">
        	
            <form method="post" action="add_book.php" class="form-horizontal" enctype="multipart/form-data">
            <input type="hidden" name="mem_id" value="<?=$_SESSION["mem_id"];?>">
            <input type="hidden" name="i" value="<?=$_GET[book_file];?>">
              <h4 class="form-signin-heading" align="center"></h4>
                  <div class="form-group">
                      <label class="control-label col-sm-3"><?=$namebook[$_GET[book_file]];?> :</label>
                      <div class="col-sm-5">
                          	<input class="form-control" type="file" name="book_file<?=$_GET[book_file];?>" required>
                      </div>
                      
                  </div>
                  <!--<div class="form-group">
                      <label class="control-label col-sm-3">2. บทคัดย่อ :</label>
                      <div class="col-sm-5">
                          	<input class="form-control" type="file" name="book_file2" required>
                      </div>
                      
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-3">3. กิตติกรรมประกาศ :</label>
                      <div class="col-sm-5">
                          	<input class="form-control" type="file" name="book_file3" required>
                      </div>
                      
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-3">4. คำนำ :</label>
                      <div class="col-sm-5">
                          	<input class="form-control" type="file" name="book_file4" required>
                      </div>
                      
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-3">5. สารบัญ :</label>
                      <div class="col-sm-5">
                          	<input class="form-control" type="file" name="book_file5" required>
                      </div>
                      
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-3">6. บทที่ 1 :</label>
                      <div class="col-sm-5">
                          	<input class="form-control" type="file" name="book_file6" required>
                      </div>
                      
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-3">7. บทที่ 2 :</label>
                      <div class="col-sm-5">
                          	<input class="form-control" type="file" name="book_file7" required>
                      </div>
                      
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-3">8. บทที่ 3 :</label>
                      <div class="col-sm-5">
                          	<input class="form-control" type="file" name="book_file8" required>
                      </div>
                      
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-3">9. บทที่ 4 :</label>
                      <div class="col-sm-5">
                          	<input class="form-control" type="file" name="book_file9" required>
                      </div>
                      
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-3">10. บทที่ 5 :</label>
                      <div class="col-sm-5">
                          	<input class="form-control" type="file" name="book_file10" required>
                      </div>
                      
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-3">11. บรรณานุกรม :</label>
                      <div class="col-sm-5">
                          	<input class="form-control" type="file" name="book_file11" required>
                      </div>
                      
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-3">12. ภาคผนวก :</label>
                      <div class="col-sm-5">
                          	<input class="form-control" type="file" name="book_file12" required>
                      </div>
                      
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-3">13. ประวัติผู้จัดทำ :</label>
                      <div class="col-sm-5">
                          	<input class="form-control" type="file" name="book_file13" required>
                      </div>
                      
                  </div>-->
                  <div class="form-group">
              			<label class="control-label col-sm-3"></label>
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
