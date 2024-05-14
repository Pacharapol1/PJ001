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
<script type="text/javascript">
function show_title_other()
{

    if (document.getElementById('member_edu').value == "อื่นๆ" ){
	document.getElementById('member_edu_detail').style.display = 'block';}
    else {document.getElementById('member_edu_detail').style.display = 'none';}

}
</script>
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
	<script language="JavaScript">
		  
		function chkNumber(ele)
		{
			var vchar = String.fromCharCode(event.keyCode);
			if ((vchar<'0' || vchar>'9') && (vchar != '.')){
				alert("กรอกได้เฉพาะตัวเลขเท่านั้น !!");
				return false;
			}else{
				ele.onKeyPress=vchar;
			}
		}
		
	</script>
</head>
<body>
<? include 'menu.php'; ?>
<!-- banner -->
  <div class="courses_banner">
  	<div class="container">
  		<h3>รายงานการลา</h3>
        <div class="breadcrumb1">
            <ul>
                <li class="icon6"><a href="index.php">หน้าหลัก</a></li>
                <li class="current-page">รายงานข้อมูลการลา</li>
            </ul>
        </div>
  	</div>
  </div>
    <!-- //banner -->

     <?
		$strSQL = "SELECT * FROM employee where emp_id = '".$_SESSION[emp_id]."'";
		$stmt  = mysqli_query($conn, $strSQL);
		$row = mysqli_fetch_array($stmt);
	?>
	<div class="courses_box1">
	   <div class="container">
	   	  <form method="post" class="form-horizontal" action="">
          <input type="hidden" class="form-control" name="emp_id" value="<?=$row[emp_id];?>" required>
              <h4 class="form-signin-heading" align="center"></h4>
                  
                  
                  <div class="col-md-9">
                    <div class="row">
                      <div class="col-12">
                      <form action="" method="post">
                          <div class="form-group">

                      <label class="control-label col-sm-6">เลือกหน่วยงาน:</label>
                      <div class="col-sm-4">
                          <select name="dep_id" class="form-control" required>
                            <option value="">กรุณาเลือกหน่วยงาน</option>
                            <?
                $sql_dep = "SELECT * FROM department where dep_status != 'C' ORDER BY dep_name ASC ";
                $stm_dep = mysqli_query($conn,$sql_dep);

                while($row_po = mysqli_fetch_array($stm_dep)){
              ?>

                                <option value="<?=$row_po[dep_id];?>"><?=$row_po[dep_name];?></option>
                            <?  } ?>
                          </select>  

                      </div>
                       <button type="submit" class="btn btn-success">ค้นหา</button>
                  </div>
                      </form>

                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                  <div class="col-md-12">
 </div>
        <?
      $dep_id = $_POST['dep_id'];

      $strSQL_user = "SELECT * FROM employee em, leavela le, titlename tn, type_leave tl, department dm WHERE em.title_id = tn.title_id AND em.emp_id = le.emp_id AND em.dep_id = dm.dep_id AND em.dep_id = '$dep_id' AND le.type_leave = tl.tleave_id";
      $stmtuser =  mysqli_query($conn, $strSQL_user);  
      $num_result = mysqli_num_rows($stmtuser);

      $strSQL_user2 = "SELECT * FROM department where dep_id = '$dep_id'";
      $stmtuser2 =  mysqli_query($conn, $strSQL_user2);
      $name = mysqli_fetch_array($stmtuser2);  
    ?>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <?php if(isset($dep_id)){ ?>
    <center>ตำแหน่งที่ค้นหา : <font color="red"><?php echo $name['dep_name'];?></font>, ผลลัพธ์ : <font color="red"><?php echo $num_result;?> แถว</font></center>
                 <table class="table table-bordered table-hover table-responsive">
                 <label class="control-label col-sm-7"></label>
              <thead>
                  <tr>
                    <!--<th style="width:8%; text-align:center;">เลขที่ใบลา</th>-->
                    <th style="width:10%; text-align:center;">ลำดับที่</th>
                    <th style="width:10%; text-align:center;">วันที่ยื่นลา</th>
                    <th style="width:18%; text-align:center;">ชื่อ-นามสกุล</th>
                    <th style="width:10%; text-align:center;">ประเภทลา</th>
                    <!--<th style="width:10%; text-align:center;">วันที่ลา</th>-->
                    <th style="width:5%; text-align:center;">จำนวนวัน</th>
           
                  </tr>
                  <?
            $count = 0;
            while($row = mysqli_fetch_array($stmtuser))
            {
              $count++;
          ?>

                  <tr>
                    <td align="center"><?php echo $count;?></td>
                    <td align="center">

                       <?
                            $date_la = date('Y', strtotime($row['date_la']))+543;
                            echo date('d/m', strtotime($row['date_la'])).'/'.$date_la;
                        ?>
                  </td>
                    <td align="center"><?php echo $row['title_name'].$row['emp_name'];?></td>
                    <td align="center"><?php echo $row['tleave_name'];?></td>
                    <td align="center"><?php echo $row['total_day'];?></td>
                    </tr>
                <? } ?>
              </thead>
              <tbody>
              </tbody>
          </table>
          <center>
           <div class="form-group">
                      <a href="print_report.php?dep_id=<?=$dep_id;?>&name=<?php echo $name['dep_name'];?>" class="btn btn-primary" target="_blank">พิมพ์รายงาน </a>
                        
                      <a href="profile.php"><button type="submit" class="btn btn-danger">ย้อนกลับ</button></a>  
          </div>
            <?php }else{ ?>
            <div class="form-group">
                      
                        
                      <center><a href="profile.php"><button type="submit" class="btn btn-danger">ย้อนกลับ</button></a></center>  
          </div>

            <?php } ?>
        
      </center>
              
                    
                    
            
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