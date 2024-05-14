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
  		<h3>แก้ไขข้อมูลส่วนตัว</h3>
        <div class="breadcrumb1">
            <ul>
                <li class="icon6"><a href="index.php">หน้าหลัก</a></li>
                <li class="current-page">แก้ไขข้อมูลส่วนตัว</li>
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
	   	  <form method="post" class="form-horizontal" action="update_emp.php">
          <input type="hidden" class="form-control" name="emp_id" value="<?=$row[emp_id];?>" required>
              <h4 class="form-signin-heading" align="center"></h4>
                  <div class="form-group">
                      <label class="control-label col-sm-3">รหัสบุคลกร :</label>
                      <div class="col-sm-3">
                          <input type="text" class="form-control" placeholder="รหัสบุคลกร" name="emp_id" value="<?=$row[emp_id];?>" readonly>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-3">ชื่อ-นามสุกล :</label>
                      <div class="col-sm-2">
                          <select name="title_id" class="form-control" required>
                            <?
								$sql_ti = "SELECT * FROM titlename where title_status != 'C' ORDER BY title_name ASC ";
								$stm_ti = mysqli_query($conn,$sql_ti);
								while($row_ti = mysqli_fetch_array($stm_ti)){
							?>
                            		<option value="<?=$row_ti[title_id];?>" <? if($row_ti[title_id] == $row[title_id]){echo 'selected'; } ?>><?=$row_ti[title_name];?></option>
                            <?	} ?>
                          </select>
                      </div>
                      <div class="col-sm-6">
                      		<input type="text" class="form-control" placeholder="ชื่อ-นามสุกล" name="emp_name" value="<?=$row[emp_name];?>" required>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-3">เบอร์โทรศัพท์ :</label>
                      <div class="col-sm-3">
                          <input type="text" class="form-control" placeholder="เบอร์โทรศัพท์" maxlength="10" name="emp_mobile" OnKeyPress="return chkNumber(this)" value="<?=$row[emp_mobile];?>" required>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-3">อีเมล์ :</label>
                      <div class="col-sm-5">
                          <input type="email" class="form-control" placeholder="อีเมล์" name="emp_email" value="<?=$row[emp_email];?>" required>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-3">ตำแหน่ง :</label>
                      <div class="col-sm-5">
                         
              <input type="text" class="form-control" placeholder="ตำแหน่ง" name="po_id" value="<?=$row[po_id];?>" readonly>
                                
                      </div>
                  </div>
                  
                  <div class="form-group">
                      <label class="control-label col-sm-3">หน่วยงาน :</label>
                      <div class="col-sm-5">
                          <select name="dep_id" class="form-control" required>
                            <?
								$sql_dep = "SELECT * FROM department where dep_status != 'C' ORDER BY dep_name ASC ";
								$stm_dep = mysqli_query($conn,$sql_dep);
								while($row_dep = mysqli_fetch_array($stm_dep)){
							?>
                            		<option value="<?=$row_dep[dep_id];?>" <? if($row_dep[dep_id] == $row[dep_id]){echo 'selected'; } ?>><?=$row_dep[dep_name];?></option>
                            <?	} ?>
                          </select>
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
	<div class="footer">
    	<? include 'footer.php'; ?>
    </div>
</body>
</html>	