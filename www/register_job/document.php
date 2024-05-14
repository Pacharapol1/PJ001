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
<title>การจัดการเอกสารสำนักงานคณบดี คณะบริหารธุรกิจและอุตสาหกรรมบริการ</title>
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
<link href="css/fontcss.css" rel='stylesheet' type='text/css' />
</head>

<body>
<? include 'menu.php'; ?>
<!-- banner -->
  <div class="courses_banner">
  	<div class="container">
  		<h3>ดาวน์โหลดเอกสาร</h3>
  		<div class="breadcrumb1">
            <ul>
                <li class="icon6"><a href="index.php">หน้าหลัก</a></li>
                <li class="current-page">ดาวน์โหลดเอกสาร</li>
            </ul>
        </div>
        <br>
  	</div>
  </div>
    <!-- //banner -->
	<div class="courses_box1">
	   <div class="container">
	   	  <div class="col-md-3">
	       
	      <ul class="posts">
	      	<h3>ประเภทเอกสาร</h3>
            <?
			  $strSQL_doct = "SELECT * FROM document 
			  	inner join type_doc on type_doc.tdoc_id = document.tdoc_id
				where document.dep_id = '".$_GET[dep_id]."' order by type_doc.tdoc_id ASC ";
			  $stmt_doct  = mysqli_query($conn,$strSQL_doct);
			  //echo $strSQL_doct;
			  while($row_doct = mysqli_fetch_array($stmt_doct)){
			?>
			<li>
				<article class="entry-item">
					<div class="entry-content">
						<h6><i class="fa fa-tag"></i> <a href="document.php?dep_id=<?=$row_doct[dep_id];?>&tdoc_id=<?=$row_doct[tdoc_id];?>"><?=$row_doct[tdoc_name];?></a></h6>
					</div>
					<div class="clearfix"> </div>
				</article>
                <hr>
			</li>
            <? } ?>
         </ul>
		</div> 
	   	  	
		<div class="col-md-9">
        <?
		  $strSQL_dep = "SELECT * FROM department where dep_id = '".$_GET[dep_id]."' ";
		  $stmt_dep  = mysqli_query($conn,$strSQL_dep);
		  $row_dep = mysqli_fetch_array($stmt_dep);
		?>
        <h2>หน่วยงาน<?=$row_dep[dep_name];?></h2>
			<div class="course_list">
                <div class="table-header clearfix">
                	<div class="id_col">ดาวน์โหลด</div>
                	<div class="name_col">เอกสาร</div>
    			</div>
                <ul class="table-list">
				  <?
				  	if($_GET[tdoc_id] != ''){
						$ss = " and document.tdoc_id = '".$_GET[tdoc_id]."' ";
					}
                    $strSQL_doc = "SELECT * FROM document 
						inner join type_doc on type_doc.tdoc_id = document.tdoc_id
						where document.dep_id = '".$_GET[dep_id]."' $ss order by type_doc.tdoc_id ASC ";
                    $stmt_doc  = mysqli_query($conn,$strSQL_doc);
                    while($row_doc = mysqli_fetch_array($stmt_doc)){
                  ?>
	       			<li class="clearfix">
    					<div class="id_col"><i class="fa fa-file-o"></i></div>
        				<div class="name_col"><a href="<?=$row_doc[doc_file];?>" target="_blank"><?=$row_doc[doc_name];?></a></div>
    				</li>

		 		<? } ?>
              </ul>
		 </div>
       </div>
	     <div class="clearfix"> </div>
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