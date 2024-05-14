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
      <h3>แก้ไขตำแหน่งงาน</h3>
        <div class="breadcrumb1">
            <ul>
                <li class="icon6"><a href="index.php">หน้าหลัก</a></li>
                <li class="current-page">แก้ไขตำแหน่งงาน</li>
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

         <div class="panel-body">
                    <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">แก้ไขตำแหน่งงาน</h2>
                </div>
            </div>
                     
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
          
        </header>
        <?
			$strSQL = "SELECT * FROM club_work where work_id = '".$_GET["work_id"]."' ";
            $stmt  = mysqli_query($conn,$strSQL);
			$row = mysqli_fetch_array($stmt)
		?>
        <div id="div-1" class="accordion-body collapse in body">
            <form method="post" action="update_work.php" class="form-horizontal" enctype="multipart/form-data">
            <input type="hidden" name="work_id" value="<?=$_GET["work_id"];?>">
              <h4 class="form-signin-heading" align="center"></h4>
              	  <div class="form-group">
                      <label class="control-label col-sm-3">สาขา :</label>
                      <div class="col-sm-8">
                      	<select name="saka_id" class="form-control" required>
                      <?
                          $sql_saka = "SELECT * FROM saka where saka_status != 'C' ORDER BY saka_name ASC ";
                          $stm_saka = mysqli_query($conn,$sql_saka);
                          while($row_saka = mysqli_fetch_array($stm_saka)){
                      ?>
                              <option value="<?=$row_saka[saka_id];?>" <? if($row_saka[saka_id] == $row[saka_id]){echo 'selected'; } ?>><?=$row_saka[saka_name];?></option>
                      <?	} ?>
                    </select>
                      </div>
                  </div>
              	  <div class="form-group">
                      <label class="control-label col-sm-3">ตำแหน่งงาน :</label>
                      <div class="col-sm-8">
                      		<input name="work_name" class="form-control" type="text" placeholder="ตำแหน่งงาน"  value="<?=$row[work_name];?>" required>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-3">รายละเอียดงาน :</label>
                      <div class="col-sm-8">
                          	<textarea name="work_detail" class="form-control" rows="5" placeholder="รายละเอียดงาน" required><?=$row[work_detail];?></textarea>
                      </div>
                      
                  </div>
                  
                  <div class="form-group">
                      <label class="control-label col-sm-3">จำนวนที่รับ (คน) :</label>
                      <div class="col-sm-3">
                          	<input name="work_num" class="form-control" type="number" min="1" placeholder="0" value="<?=$row[work_num];?>" required>
                      </div>
                      
                  </div>
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
