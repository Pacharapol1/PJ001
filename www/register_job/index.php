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
<body>
<? include 'menu.php'; ?>
<!-- banner -->
  <div class="courses_banner">
  	<div class="container">
  		<h3>รายชื่อสถานประกอบการและตำแหน่งงาน</h3>
        <div class="breadcrumb1">
            <ul>
                <li class="icon6"><a href="index.php">หน้าหลัก</a></li>
                <li class="current-page">รายชื่อสถานประกอบการและตำแหน่งงาน</li>
            </ul>
        </div>
  	</div>
   </div>
    <!-- //banner -->
	<div class="courses_box1">
	   <div class="container">
        <form action="#" method="get">
        <div class="col-md-12">
          <div class="col-md-4">
              <label>ค้นหา : </label>
               <select name="s_type" class="form-control" onchange="window.location='?s_type='+this.value" required >
                  <option value="">--เลือกการค้นหา--</option>
                  <option value="1" <? if($_GET[s_type] == 1){echo 'selected';} ?>>ตำแหน่งงาน</option>
                  <option value="2" <? if($_GET[s_type] == 2){echo 'selected';} ?>>ชื่อสถานประกอบการ</option>
               </select>
           </div> 
           
           <? if($_GET[s_type] == 1){ ?>
           <div class="col-md-5">
              <label>ตำแหน่งงาน : </label>
              <input name="work_name" class="form-control" type="text" placeholder="ตำแหน่งงาน"  value="<?=$_GET[work_name];?>" required>
           </div> 
           <? }else{ ?> 
           <div class="col-md-5">
              <label>ชื่อสถานประกอบการ : </label>
              <input type="text" name="club_name" class="form-control" value="<?=$_GET[club_name];?>" placeholder="ชื่อสถานประกอบการ" required>
           </div>
           <? } ?>
           <div class="col-md-3">
              <br>
              <button type="submit" class="btn btn-success">ค้นหา</button>
           </div>
      </div>  
     </form>
     <br><br><br><br>
      <?
		  if($_GET["Action"] == "Yes")
		  {
			  if($_SESSION["mem_id"] == ''){
	  ?>
			  <script>
				  alert("กรุณาเข้าสู่ระบบ เพื่อเข้าร่วมงาน");
				  window.location.href = "login.php";
			  </script>
	  
	  <?
			  }else{
				  echo 'dddd';
				  $strSQL_mem = "SELECT * FROM member where mem_id = '".$_SESSION[mem_id]."' ";
				  $stmt_mem = mysqli_query($conn,$strSQL_mem);
				  $row_mem = mysqli_fetch_array($stmt_mem);
				  if($row_mem[mem_status] != 'Y'){
	  ?>
					  <script>
                          alert("ยังไม่ได้รับการอนุมัติ การสมัครสมาชิก");
                          window.location.href = "view_club.php";
                      </script>
	  
	  <?
				  }else{
					  $strSQL_in = "INSERT INTO register_work (re_id, re_date, mem_id, work_id, re_status) VALUES (NULL, NOW(), '".$_SESSION["mem_id"]."', '".$_GET["work_id"]."', 'W')";  		
					  mysqli_query($conn, $strSQL_in);
					  
					  $strSQL_club = "SELECT * FROM club_work where work_id = '".$_GET[work_id]."' ";
					  $stmt_club  = mysqli_query($conn,$strSQL_club);
					  $row_club = mysqli_fetch_array($stmt_club);
					  $work_amount = $row_club[work_amount]+1;
					  
					  $sql_up = "UPDATE club_work SET work_amount = '".$work_amount."' WHERE work_id = '".$row_club[work_id]."' ";
					  mysqli_query($conn,$sql_up);
	  ?>
				  <script>
                      window.location.href = "list_register.php?mem_id=<?=$_SESSION[mem_id];?>";
                  </script>
	  
	  <?
				  }
			  }
		  }
        if($_GET[po_id] != ''){
            $ss = " and club_work.work_name LIKE '%".$_GET[work_name]."%' ";
        }
        $strSQL_gp = "SELECT * FROM club 
          inner join club_work on club_work.club_id = club.club_id
          inner join position on position.po_id = club_work.work_name
          where club.club_status = 'Y' $ss
          group by club_work.work_name ";
        $stmt_gp = mysqli_query($conn,$strSQL_gp);
        while($row_gp = mysqli_fetch_array($stmt_gp)){
      ?>
          <div align="center"><h2><?=$row_gp[po_name];?></h2></div><br><br>
          <table class="table table-bordered data-table table-hover table-striped">
            <thead>
              <tr>
                <th style="width:5%; text-align:center; background-color:#8c0005; color:#FFF;">ลำดับ</th>
                <th style="width:15%; text-align:center; background-color:#8c0005; color:#FFF;"">ชื่อสถานประกอบการ</th>
                <th style="width:25%; text-align:center; background-color:#8c0005; color:#FFF;"">ที่อยู่</th>
                <th style="width:10%; text-align:center; background-color:#8c0005; color:#FFF;"">เบอร์โทร</th>
                <th style="width:10%; text-align:center; background-color:#8c0005; color:#FFF;"">จำนวนที่รับ</th>
                <th style="width:10%; text-align:center; background-color:#8c0005; color:#FFF;"">สมัครงาน</th>
              </tr>
            </thead>
            <tbody>
                  <?
                    if($_GET[club_name] != ''){
                        $sn = " and club.club_name LIKE '%".$_GET[club_name]."%'  ";
                    }
					$num=1;
                    $strSQL = "SELECT * FROM club 
                      inner join club_work on club_work.club_id = club.club_id
                      where club_work.work_name = '".$row_gp[work_name]."' and club.club_status = 'Y' $sn ";
                    $stmt  = mysqli_query($conn,$strSQL);
                    while($row = mysqli_fetch_array($stmt)){
						$work_amount = $row[work_num]-$row[work_amount];
                  ?>
                  
                  <tr class="gradeX">
                    <td style="text-align:center;"><?=$num;?></td>
                    <td><?=$row[club_name];?></td>
                    <td><?=$row[club_office];?></td>
                    <td><?=$row[club_tel];?></td>
                    <td style="text-align:center;"><?=$work_amount;?></td>
                    <td style="text-align:center;">
                    	<? if($work_amount != 0){ ?>
                        	<?
								$strSQL_re = "SELECT * FROM register_work
								  inner join club_work on club_work.work_id = register_work.work_id
								  inner join club on club.club_id = club_work.club_id
								  where register_work.mem_id = '".$_SESSION[mem_id]."' and register_work.work_id = '".$row["work_id"]."' ";
								$stmt_re  = mysqli_query($conn,$strSQL_re);
								$numrow_re = mysqli_num_rows($stmt_re);
								if($numrow_re == ''){
							?>
                                    <a href="JavaScript:if(confirm('คุณต้องเข้าร่วมงาน?')==true){window.location='<?=$_SERVER["PHP_SELF"];?>?Action=Yes&work_id=<?=$row["work_id"];?>';}" class="btn btn-success btn-sm"><i class="fa fa-check"></i> เข้าร่วมงาน</a>
                            <?
								}else{ echo 'เข้าร่วมแล้ว'; }
							?>
                        <? }else{ echo '-'; } ?>
                    </td>
                  </tr>
                   
                 <? $num++; } ?>
                 
                 </tbody>
              </table>
          <? } ?>
				
                
		    <div class="clearfix"> </div>
	   </div>
	</div>
    <div style="height:100px;"></div>
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