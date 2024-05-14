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
      <h3>แก้ไขข้อมูลไฟล์เอกสาร</h3>
        <div class="breadcrumb1">
            <ul>
                <li class="icon6"><a href="index.php">หน้าหลัก</a></li>
                <li class="current-page">แก้ไขข้อมูลไฟล์เอกสาร</li>
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
                <?
            $strSQL_dep = "SELECT * FROM department where dep_id = '".$_GET[dep_id]."' ";
            $stmt_dep  = mysqli_query($conn,$strSQL_dep);
            $row_dep = mysqli_fetch_array($stmt_dep);
          ?>
                <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">แก้ไขไฟล์เอกสารหน่วยงาน [<?=$row_dep[dep_name];?>]</h2>
                </div>
            </div>
                     
                    
                    
                                

<div class="row">
<div class="col-lg-12">
    <div class="box dark">
  
        <div id="div-1" class="accordion-body collapse in body">
        <?
      $strSQL_doc = "SELECT * FROM document where doc_id = '".$_GET[doc_id]."' ";
      $stmt_doc  = mysqli_query($conn,$strSQL_doc);
      $row_doc = mysqli_fetch_array($stmt_doc);
    ?>
            <form method="post" action="update_doc.php" class="form-horizontal" enctype="multipart/form-data">
            <input type="hidden" name="doc_id" value="<?=$_GET[doc_id];?>">
            <input type="hidden" name="dep_id" value="<?=$_GET[dep_id];?>">
              <h4 class="form-signin-heading" align="center"></h4>
                  <div class="form-group">
                      <label class="control-label col-sm-3">ประเภทเอกสาร :</label>
                      <div class="col-sm-5">
                          <select name="tdoc_id" class="form-control" required>
                            <?
                $sql_td = "SELECT * FROM type_doc ORDER BY tdoc_name ASC ";
                $stm_td = mysqli_query($conn,$sql_td);
                while($row_td = mysqli_fetch_array($stm_td)){
              ?>
                                <option value="<?=$row_td[tdoc_id];?>" <? if($row_td[tdoc_id] == $row_doc[tdoc_id]){ echo 'selected'; } ?>><?=$row_td[tdoc_name];?></option>
                            <?  } ?>
                          </select>
                      </div>
                  </div>
                  
                  <div class="form-group">
                      <label class="control-label col-sm-3">ชื่อเอกสาร :</label>
                      <div class="col-sm-5">
                            <input class="form-control" type="text" name="doc_name" value="<?=$row_doc[doc_name];?>" required>
                      </div>
                  </div>
                  
                  <div class="form-group">
                      <label class="control-label col-sm-3">ไฟล์เอกสารเดิม :</label>
                      <div class="col-sm-5">
                          <a href="<?=$row_doc[doc_file];?>" class="btn btn-default"><i class="icon-cloud-download"></i> ไฟล์เอกสารเดิม</a>
                      </div>
                      
                  </div>
                  
                  <div class="form-group">
                      <label class="control-label col-sm-3">อัฟโหลดไฟล์ใหม่ :</label>
                      <div class="col-sm-5">
                          <input type="hidden" name="hdnOldFile" value="<?=$row_doc[doc_file];?>">
                            <input class="form-control" id="fileInput" type="file" name="doc_file">
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