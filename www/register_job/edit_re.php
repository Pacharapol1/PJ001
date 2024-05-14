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
  		<h3>แก้ไขรายงานตัวเข้าปฏิบัติงาน</h3>
        <div class="breadcrumb1">
            <ul>
                <li class="icon6"><a href="index.php">หน้าหลัก</a></li>
                <li class="current-page">แก้ไขรายงานตัวเข้าปฏิบัติงาน</li>
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
	       </div>

		</div>
     <?
		$strSQL_re = "SELECT * FROM report where re_id = '".$_GET[re_id]."' ";
		$stmt_re= mysqli_query($conn, $strSQL_re);
		$numre = mysqli_num_rows($stmt_re);
		$row_re= mysqli_fetch_array($stmt_re);
	?>
	<div class="col-md-9">
    	<h3>แก้ไขรายงานตัวเข้าปฏิบัติงาน</h3>
        <hr>
	   	  <form method="post" class="form-horizontal" action="update_report.php">
          <input type="hidden" class="form-control" name="mem_id" value="<?=$row_re[mem_id];?>" required>
          <input type="hidden" class="form-control" name="re_id" value="<?=$_GET[re_id];?>" required>
          <input type="hidden" class="form-control" name="rew_id" value="<?=$_GET[rew_id];?>" required>
              <h4 class="form-signin-heading" align="center">รายละเอียดเกียวกับที่พักระหว่างปฏิบัติงาน</h4>
              	<div class="form-group">
                    <label class="control-label col-sm-3">ที่อยู่ :</label>
                    <div class="col-sm-8">
                          <input type="text" class="form-control" placeholder="ที่อยู่" name="re_add" value="<?=$row_re[re_add];?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">ตำบล :</label>
                    <div class="col-sm-8">
                          <input type="text" class="form-control" placeholder="ตำบล" name="re_tam" value="<?=$row_re[re_tam];?>"  required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">อำเภอ :</label>
                    <div class="col-sm-8">
                          <input type="text" class="form-control" placeholder="อำเภอ" name="re_aum" value="<?=$row_re[re_aum];?>"  required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">จังหวัด :</label>
                    <div class="col-sm-8">
                          <select name="prov_id" class="form-control" required>
                            <?
								$sql_prov = "SELECT * FROM provinces where prov_status = '' ORDER BY prov_name ASC ";
								$stm_prov = mysqli_query($conn,$sql_prov);
								while($row_prov = mysqli_fetch_array($stm_prov)){
							  ?>
                                <option value="<?=$row_prov[prov_id];?>" <? if($row_prov[prov_id] == $row[prov_id]){echo 'selected'; } ?>><?=$row_prov[prov_name];?></option>
                            <?  } ?>
                          </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">รหัสไปรษณีย์ :</label>
                    <div class="col-sm-8">
                          <input type="text" class="form-control" placeholder="รหัสไปรษณีย์" name="re_zip" value="<?=$row_re[re_zip];?>" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-sm-3">เบอร์ติดต่อ :</label>
                    <div class="col-sm-8">
                          <input type="text" class="form-control" placeholder="เบอร์ติดต่อ" name="re_mobile" value="<?=$row_re[re_mobile];?>" required>
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