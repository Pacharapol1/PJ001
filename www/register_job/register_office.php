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
<link href="css/fontcss.css" rel='stylesheet' type='text/css' />
<!----font-Awesome----->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!----font-Awesome----->
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
  		<h3>สมัครโครงการสหกิจศึกษา</h3>
  		<p class="description">
             ยินดีต้อนรับสู่การสมัครสมาชิก
        </p>
        <div class="breadcrumb1">
            <ul>
                <li class="icon6"><a href="index.php">หน้าหลัก</a></li>
                <li class="current-page">สมัครสมาชิก</li>
            </ul>
        </div>
  	</div>
  </div>
    <!-- //banner -->
	<div class="courses_box1">
	   <div class="container">
       <div class="col-lg-5">
	   	  <form method="post" action="add_register_office.php" enctype="multipart/form-data">
                <p class="lead"><h2>สมัครโครงการสหกิจศึกษา</h2></p>
                <div class="form-group">
                	<input type="text" class="form-control" placeholder="ชื่อสถานประกอบการ" name="club_name" required>
                </div>
                <div class="form-group">
                	<input type="text" class="form-control" placeholder="ชื่อสถานประกอบการภาษาอังกฤษ" name="club_eng" required>
                </div>
                <div class="form-group">
                	<input type="text" class="form-control" placeholder="ที่อยู่" name="club_office" required>
                </div>
                <div class="form-group">
                	<input type="text" class="form-control" placeholder="ตำบล" name="club_tum" required>
                </div>
                <div class="form-group">
                	<input type="text" class="form-control" placeholder="อำเภอ" name="club_aum" required>
                </div>
                <div class="form-group">
                    <select name="prov_id" class="form-control" required>
                            <option value="">เลือกจังหวัด</option>
                            <?
								$sql_prov = "SELECT * FROM provinces where prov_status = '' ORDER BY prov_name ASC ";
								$stm_prov = mysqli_query($conn,$sql_prov);
								while($row_prov = mysqli_fetch_array($stm_prov)){
							  ?>
                                <option value="<?=$row_prov[prov_id];?>"><?=$row_prov[prov_name];?></option>
                            <?  } ?>
                          </select>
                </div>
                
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="รหัสไปรษณีย์" name="club_zip" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="เบอร์ติดต่อ" name="club_tel" required>
                </div>
                
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="ชื่อผู้ติดต่อ" name="club_contact" required>
                </div>

                <div class="form-group">
                    <input type="email" class="required form-control" placeholder="Email" name="club_email" value="" required>
                </div>
                <div class="form-group">
                    <input type="password" class="required form-control" placeholder="Password" name="password" value="" required>
                </div>
                <!--<div class="form-group">
                	<label>เอกสารประกอบการทางธุรกิจ</label>
                    <input class="form-control" type="file" name="club_file" required>
                </div>-->
                <div class="form-group">
                    <input type="submit" class="btn btn-success btn-lg1 btn-block" name="submit" value="สมัครสมาชิก">
                </div>
                <p>คุณเป็นสมาชิกอยู่แล้ว <a href="login_office.php">เข้าสู่ระบบ</a></p>
            </form>
         </div>
       
       <div class="col-lg-7">
       	<br><br><br>
       	<img src="images/office_wall.jpg" class="img-responsive">
       </div>
       
       
       
	   </div>
	</div>
   <div class="footer">
    	<? include 'footer.php'; ?>
    </div>
</body>
</html>	