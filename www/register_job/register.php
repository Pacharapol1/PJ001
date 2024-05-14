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
  		<h3>สมัครสมาชิก</h3>
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
	   	  <form class="login" method="post" action="add_register.php" enctype="multipart/form-data">
                <p class="lead">สมัครสมาชิก</p>
                
                <div class="form-group">
                    <select name="dep_id" class="form-control" onchange="window.location='?club_id=<?=$_GET[club_id];?>&title_id=<?=$_GET[title_id];?>&dep_id='+this.value" required>
                      <option value="">คณะ</option>
                      <?
                          $sql_dep = "SELECT * FROM department where dep_status != 'C' ORDER BY dep_name ASC ";
                          $stm_dep = mysqli_query($conn,$sql_dep);
                          while($row_dep = mysqli_fetch_array($stm_dep)){
                        ?>
                          <option value="<?=$row_dep[dep_id];?>" <? if($row_dep[dep_id] == $_GET[dep_id]){echo 'selected'; } ?>><?=$row_dep[dep_name];?></option>
                      <?  } ?>
                    </select>
                </div>
                <div class="form-group">
                    <select name="saka_id" class="form-control" onchange="window.location='?club_id=<?=$_GET[club_id];?>&dep_id=<?=$_GET[dep_id];?>&saka_id='+this.value" required>
                      <option value="">สาขา</option>
                      <?
                          $sql_saka = "SELECT * FROM saka where saka_status != 'C' and dep_id = '".$_GET[dep_id]."' ORDER BY saka_name ASC ";
                          $stm_saka = mysqli_query($conn,$sql_saka);
                          while($row_saka = mysqli_fetch_array($stm_saka)){
                      ?>
                              <option value="<?=$row_saka[saka_id];?>" <? if($row_saka[saka_id] == $_GET[saka_id]){echo 'selected'; } ?>><?=$row_saka[saka_name];?></option>
                      <?	} ?>
                    </select>
                </div>
                
                <div class="form-group">
                    <select name="mem_sex" class="form-control" onchange="window.location='?club_id=<?=$_GET[club_id];?>&dep_id=<?=$_GET[dep_id];?>&saka_id=<?=$_GET[dep_id];?>&mem_sex='+this.value" required>
                      <option value="">เพศ</option>
                      <option value="ชาย" <? if($_GET[mem_sex] == 'ชาย'){echo 'selected'; } ?>>ชาย</option>
                      <option value="หญิง" <? if($_GET[mem_sex] == 'หญิง'){echo 'selected'; } ?>>หญิง</option>
                    </select>
                </div>

                <div class="form-group">
                    <select name="title_id" class="form-control" onchange="window.location='?club_id=<?=$_GET[club_id];?>&dep_id=<?=$_GET[dep_id];?>&saka_id=<?=$_GET[saka_id];?>&mem_sex=<?=$_GET[mem_sex];?>&title_id='+this.value" required>
                      <option value="">คำนำหน้า</option>
                      <?
                          $sql = "SELECT * FROM titlename where title_status != 'C' ORDER BY title_name ASC ";
                          $stm = mysqli_query($conn,$sql);
                          while($row = mysqli_fetch_array($stm)){
                      ?>
                              <option value="<?=$row[title_id];?>" <? if($row[title_id] == $_GET[title_id]){echo 'selected'; } ?>><?=$row[title_name];?></option>
                      <?	} ?>
                    </select>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" placeholder="ชื่อ" name="mem_name" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="นามสุกล" name="mem_last" required>
                </div>
                
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="รหัสนักศึกษา" name="mem_code" OnKeyPress="return chkNumber(this)" required>
                </div>
                
                <div class="form-group">
                    <input type="text" class="required form-control" placeholder="ที่อยู่" name="mem_add" value="" required>
                </div>
                <div class="form-group">
                    <input type="text" class="required form-control" placeholder="ตำบล" name="mem_tam" value="" required>
                </div>
                <div class="form-group">
                    <input type="text" class="required form-control" placeholder="อำเภอ" name="mem_aum" value="" required>
                </div>
                <div class="form-group">
                    <select name="prov_id" class="form-control" required>
					  <?
                          $sql_pro = "SELECT * FROM provinces where prov_status != 'C' ORDER BY prov_name ASC ";
                          $stm_pro = mysqli_query($conn,$sql_pro);
                          while($row_pro = mysqli_fetch_array($stm_pro)){
                      ?>
                              <option value="<?=$row_pro[prov_id];?>" <? if($row_pro[prov_id] == $row[prov_id]){echo 'selected'; } ?>><?=$row_pro[prov_name];?></option>
                      <?	} ?>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" class="required form-control" placeholder="รหัสไปรษณีย์" name="mem_zip" value="" required>
                </div>
                
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="เบอร์โทรศัพท์" maxlength="10" name="mem_mobile" OnKeyPress="return chkNumber(this)" required>
                </div>
                
                <div class="form-group">
                    <input type="text" class="required form-control" placeholder="Username" name="username" value="" required>
                </div>
                <div class="form-group">
                    <input type="password" class="required form-control" placeholder="Password" name="password" value="" required>
                </div>
                <div class="form-group">
                      <script language="JavaScript">
						  function showPreview(ele)
						  {
								  $('#imgAvatar').attr('src', ele.value); // for IE
								  if (ele.files && ele.files[0]) {
								  
									  var reader = new FileReader();
									  
									  reader.onload = function (e) {
										  $('#imgAvatar').attr('src', e.target.result);
									  }
					  
									  reader.readAsDataURL(ele.files[0]);
								  }
						  }
					  </script>
                      		<img id="imgAvatar" width="200">
                          	<input class="form-control" type="file" name="mem_pic" accept="image/*" OnChange="showPreview(this)" required>
                  </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success btn-lg1 btn-block" name="submit" value="สมัครสมาชิก">
                </div>
                <p>คุณเป็นสมาชิกอยู่แล้ว <a href="login.php">เข้าสู่ระบบ</a></p>
            </form>
	   </div>
	</div>
   <div class="footer">
    	<? include 'footer.php'; ?>
    </div>
</body>
</html>	