<?php
	session_start();
	include "admin/connectDb.php"; 
	$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
	mysqli_set_charset($conn, "utf8");
	error_reporting(~E_NOTICE);
?>
<!DOCTYPE HTML>
<html>
<head>
<title>ระบบการจัดการงานสหกิจศึกษา</title>
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
<link href='//fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700' rel='stylesheet' type='text/css'>
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
<!----Calender -------->
  <link rel="stylesheet" href="css/clndr.css" type="text/css" />
  <script src="js/underscore-min.js" type="text/javascript"></script>
  <script src= "js/moment-2.2.1.js" type="text/javascript"></script>
  <script src="js/clndr.js" type="text/javascript"></script>
  <script src="js/site.js" type="text/javascript"></script>
  <link href="css/fontcss.css" rel='stylesheet' type='text/css' />
<!----End Calender -------->
</head>
<body>
<? include 'menu.php'; ?>
<!-- banner -->
<div class="courses_banner">
  	<div class="container">
  		<h3>หน้าหลัก</h3>
  		<div class="breadcrumb1">
            <ul>
              
            </ul>
        </div>
        <br>
  	</div>
  </div>
    <!-- //banner -->
  
  <div class="grid_1">
     	<div class="container">
     		<div class="col-md-4">
                <div class="news">
                    <!--<h3>ปฏิทินกิจกรรม</h3>-->
                    <div class="section-content">
                    
                    <? include 'prac_fullcalendar.php'; ?>
                    
                    <ul class="posts">
                    	<h3>ข่าวประชาสัมพันธ์</h3>
                    <?
					  $strSQL_news = "SELECT * FROM news order by news_date DESC  LIMIT 0 , 3 ";
					  $stmt_news  = mysqli_query($conn,$strSQL_news);
					  while($row_news = mysqli_fetch_array($stmt_news)){
					?>
                      <li>
						<article class="entry-item">
                        	<div class="entry-thumb pull-left">
                                <img src="admin/<?=$row_news[pic];?>" class="img-responsive" alt=""/>
                            </div>
                            <div class="entry-content">
                                <h6><a href="view_news.php?news_id=<?=$row_news[news_id];?>"><?=$row_news[news_name];?></a></h6>
                                <p><a href="#"><?=date('d/m', strtotime($row_news[news_date]));?>/<?=date('Y', strtotime($row_news[news_date]))+543;?></p>
                            </div>
                            <div class="clearfix"> </div>
                        </article>
                    </li>
                    <? } ?>
                    </div><!-- /.section-content -->
                    <a href="news.php" class="read-more">ดูทั้งหมด</a>
                </div><!-- /.news-small -->
            </div>
            <div class="col-md-8 grid_1_right">
              <!--<h3>ปฏิทินกิจกรรม</h3>
		      <div class="but_list">
		       <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
				<ul id="myTab" class="nav nav-tabs nav-tabs1" role="tablist">
                  <?
				  	  $thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม"); 
				  	  $numdate = 1;
					  $strSQL_ca = "SELECT * FROM calendar where calendar_end > '".date('Y-m-d ')."' group by month(calendar_start) order by calendar_start ASC  ";
					  $stmt_ca  = mysqli_query($conn,$strSQL_ca);
					  while($row_ca = mysqli_fetch_array($stmt_ca)){
						  if($numdate == 1 && $_GET[numdate] == ''){
							  $active = 'class="active"';
							  $mm_main = date('m', strtotime($row_ca[calendar_start])-1);
						  }else{
							  if($_GET[numdate] == $numdate){
							  	$active = 'class="active"';
							  }else{
								$active = '';
							  }
						  }
				  ?>
				  <li role="presentation" <?=$active;?>>
                  <a href="index.php?mm=<?=date('m', strtotime($row_ca[calendar_start])-1);?>&numdate=<?=$numdate;?>" ><font color="#FFFFFF"><?=$thaimonth[date('m', strtotime($row_ca[calendar_start]))-1];?> <?=date('Y', strtotime($row_ca[calendar_start]))+543;?></font></a></li>
                  <? $numdate++ ; } ?>
				</ul>
                
			<div id="myTabContent" class="tab-content">
			  <div role="tabpanel" class="tab-pane active" id="profile-tab" aria-labelledby="profile-tab">
			    <div class="events_box">
                	<?
					  if($_GET[mm] == ''){
						  $mm = $mm_main;
					  }else{
						  $mm = $_GET[mm];
					  }
					  $strSQL_ca2 = "SELECT * FROM calendar where month(calendar_end) = '".$mm."' and calendar_end > '".date('Y-m-d H:i:s')."' order by calendar_start ASC  ";
					  $stmt_ca2  = mysqli_query($conn,$strSQL_ca2);
					 // echo $strSQL_ca2;
					  while($row_ca2 = mysqli_fetch_array($stmt_ca2)){
					?>
			    	<div class="event_left"><div class="event_left-item">
			    		
			    		<div class="icon_2"></div>
			    		<div class="icon_2">
			    		  <div class="speaker">
			    			  
			    			  <div class="clearfix"></div></div>
			    		  </div>
			    		</div>
			    	</div>
			    	<div class="event_right">
			    		  <h3><a href="view_calendar.php?calendar_id=<?=$row_ca2[calendar_id];?>"><?=$row_ca2[calendar_name];?></a></h3>
						  <p><a href="view_calendar.php?calendar_id=<?=$row_ca2[calendar_id];?>" ><span class="badge badge-primary">อ่านต่อ >></span></a></p>
		    	    </div>
                    <br>
		    	    <div class="clearfix"></div>
                    <? } ?>
			   </div>
			   
			</div>-->
   	 		<br /><br />
           <h3>การประกาศการสัมภาษณ์</h3>
           <br />
             <table class="table_working_hours">
                <tbody>
                <?
					$strSQL_in = "SELECT * FROM interview 
						inner join register_work on register_work.re_id = interview.re_id
						inner join member on member.mem_id = register_work.mem_id
						inner join titlename on titlename.title_id = member.title_id
						inner join club_work on club_work.work_id = register_work.work_id
						inner join club on club.club_id = club_work.club_id
						where interview.interview_id != '".$_GET[interview_id]."' order by interview.interview_date DESC LIMIT 0 , 5 ";
                    $stmt_in = mysqli_query($conn,$strSQL_in);
					while($row_in = mysqli_fetch_array($stmt_in)){
				?>
                    <tr class="opened_1">
                        <td ><?=date('d/m', strtotime($row_in[interview_date]));?>/<?=date('Y', strtotime($row_in[interview_date]))+543;?> เวลา: <?=date('H:i', strtotime($row_in[interview_time]));?> น.</td>
                        <td><?=$row_in[club_name];?><br>ตำแหน่ง: <?=$row_in[work_name];?></td>
                        <td ><?=$row_in[title_name];?><?=$row_in[mem_name];?> <?=$row_in[mem_last];?></td>
                        <td>สถานที่: <?=$row_in[interview_place];?></td>
                    </tr>
                <?
					}
				?>
                </tbody>
            </table>
     		<div style="margin-top:20px;"></div>
        	<a href="interview.php" class="read-more">ดูทั้งหมด</a>
            <br /><br />
     <h2>บทความ</h2>
     <div class="col-md-12">
     	<?
		  $strSQL_article = "SELECT * FROM article order by article_date DESC  LIMIT 0 , 5 ";
		  $stmt_article = mysqli_query($conn,$strSQL_article);
		  while($row_article = mysqli_fetch_array($stmt_article)){
		?>
        	<div class="event-page">
	       	 <div class="row">
	       	 	<div class="col-xs-4 col-sm-4">
	       	 	  <div class="event-img">
	       	 		<a href="#"><img src="admin/<?=$row_article[pic];?>" class="img-responsive" alt=""/></a>
	       	 		<div class="over-image"></div>
	       	 	  </div>
	       	 	</div>
	       	 	<div class="col-xs-8 col-sm-8 event-desc">
	       	 		<h2><a href="view_article.php?article_id=<?=$row_article[article_id];?>"><?=$row_article[article_name];?></a></h2>
	       	 	    <div class="event-info-text">
	       	 		   <div class="event-info-middle"><br />
                       <p style="display:inline;"><span class="event-bold"><a href="view_article.php?article_id=<?=$row_article[article_id];?>"><?=substr($row_article[article_detail],0,300);?></a></span></p>
                       <br />
       	 				   <p><span class="event-bold"></span><?=date('d/m', strtotime($row_article[article_date]));?>/<?=date('Y', strtotime($row_article[article_date]))+543;?></p>
	       	 		   </div>
	       	 	    </div>
	       	  </div>
	       	</div>
          </div>
        <? } ?>
        <div style="margin-top:20px;"></div>
        <a href="news.php" class="read-more">ดูทั้งหมด</a>
     </div>
     </div>
                
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