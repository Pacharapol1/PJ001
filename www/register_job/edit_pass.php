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
  		<h3>แก้ไขรหัสผ่าน</h3>
        <div class="breadcrumb1">
            <ul>
                <li class="icon6"><a href="index.php">หน้าหลัก</a></li>
                <li class="current-page">แก้ไขรหัสผ่าน</li>
            </ul>
        </div>
  	</div>
  </div>
    <!-- //banner -->
     <?
		$strSQL = "SELECT * FROM employee where emp_id = '".$_GET[emp_id]."'";
		$stmt  = mysqli_query($conn,$strSQL);
		$row = mysqli_fetch_array($stmt);
	?>
	<div class="courses_box1">
	   <div class="container">
	   	  <form class="login" method="post" action="update_pass.php">
          <input type="hidden" class="required form-control" name="emp_id" value="<?=$row[emp_id];?>" required>
                <p class="lead">แก้ไขรหัสผ่าน</p>
                <div class="form-group">
                    <input type="password" class="required form-control" placeholder="รหัสผ่านเดิม *" name="password_old"  required>
                </div>
                <div class="form-group">
                    <input type="password" class="required form-control" placeholder="รหัสผ่านใหม่ *" name="password_new" required>
                </div>
                <div class="form-group">
                    <input type="password" class="required form-control" placeholder="ยืนยันรหัสผ่าน *" name="password_con" required>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="submit" value="บันทึก">
                    <button type="button" class="btn btn-danger" onClick="window.history.back()">ย้อนกลับ</button>
                </div>
            </form>
	   </div>
	</div>
   <div class="footer">
    	<? include 'footer.php'; ?>
    </div>
</body>
</html>	