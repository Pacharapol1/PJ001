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
        <h3>การจัดการข้อมูลไฟล์เอกสาร</h3>
        <div class="breadcrumb1">
            <ul>
                <li class="icon6"><a href="index.php">หน้าหลัก</a></li>
                <li class="current-page">การจัดการข้อมูลไฟล์เอกสาร</li>
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
                       
                        <a href="form_doc.php?dep_id=<?=$_SESSION["dep_id"];?>"><button class="btn btn-primary dropdown-toggle"><i class="icon-plus"></i> เพิ่มไฟล์เอกสาร</button></a>
                        </h3>
      

         <div class="panel-body">
                            
                             <table class="table table-bordered table-hover table-responsive">
                                   <thead>
                                        <tr>
                                         <th style="text-align:center; width:20%">วันที่บันทึกไฟล์</th>
                                          <th style="text-align:center; width:20%">ประเภทเอกสาร</th>
                                          <th style="text-align:center; width:65%">ชื่อไฟล์เอกสาร</th>
                                            <th colspan="2" style="text-align:center; width:15%">จัดการ</th>
                                        </tr>
                                    </thead>
                                   <?
                      $num=1;
                      if($_GET["Action"] == "Del")
                      {
                        $strSQL = "delete from document WHERE doc_id = '".$_SESSION["dep_id"]."'  " ;
                        $stmt = mysqli_query($conn,$strSQL);
                      }
                      $strSQL = "SELECT * FROM document
                        inner join type_doc on type_doc.tdoc_id = document.tdoc_id
                      where dep_id = '".$_SESSION["dep_id"]."' ";
                      $stmt  = mysqli_query($conn,$strSQL);
                      while($row = mysqli_fetch_array($stmt)){
                  ?>
                                        <tr>
                                          <td style="text-align:center;"><?=date('d/m', strtotime($row[doc_date]));?>/<?=date('Y', strtotime($row[doc_date]))+543;?></td>
                                          <td><?=$row[tdoc_name];?></td>
                                          <td><?=$row[doc_name];?></a></td>
                                          <td style="text-align:center;">
                                            <a href="edit_doc.php?doc_id=<?=$row["doc_id"];?>&dep_id=<?=$_GET[dep_id];?>" class="btn btn-warning btn-sm">แก้ไข</a></td>
                                           <td> <a href="JavaScript:if(confirm('คุณต้องการลบไฟล์เอกสาร?')==true){window.location='<?=$_SERVER["PHP_SELF"];?>?Action=Del&doc_id=<?=$row["doc_id"];?>';}" class="btn btn-danger btn-sm">ลบ</a></td>
                                           
                                        </tr>
                                     <? $num++; } ?>
                                       </thead>
                                    </tbody>
                                    </tbody>
                                </table>

                                 </div>
                            </div>
                        </div>
            <div class="clearfix"> </div>
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