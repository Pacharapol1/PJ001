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
    
    <script>
function checkEmail(){
	if(document.getElementById("type_la").value == "")
		{
			alert('กรุณาเลือกประเภทการลา');
			document.getElementById("type_la").focus();
			return false;
		}	
	if(document.getElementById("type_la").value == "2")
		{
		if(document.getElementById("datepicker-th-la").value == "")
			{
				alert('กรุณาเลือกวันที่ลา');
				document.getElementById("datepicker-th-la").focus();
				return false;
			}
		if(document.getElementById("datepicker-th2-la").value == "")
			{
				alert('กรุณาเลือกวันที่ลา');
				document.getElementById("datepicker-th2-la").focus();
				return false;
			}
		}
	else if(document.getElementById("type_la").value == "1")
		{
		if(document.getElementById("datepicker-th").value == "")
			{
				alert('กรุณาเลือกวันที่ลา');
				document.getElementById("datepicker-th").focus();
				return false;
			}
		if(document.getElementById("datepicker-th2").value == "")
			{
				alert('กรุณาเลือกวันที่ลา');
				document.getElementById("datepicker-th2").focus();
				return false;
			}
		}
	else if(document.getElementById("type_la").value == "3")
		{
		if(document.getElementById("datepicker-th").value == "")
			{
				alert('กรุณาเลือกวันที่ลา');
				document.getElementById("datepicker-th").focus();
				return false;
			}
		if(document.getElementById("datepicker-th2").value == "")
			{
				alert('กรุณาเลือกวันที่ลา');
				document.getElementById("datepicker-th2").focus();
				return false;
			}
		}

	document.adduser.submit();
}
</script>
</head>
<body>
<? include 'menu.php'; ?>
<!-- banner -->
  <div class="courses_banner">
  	<div class="container">
  		<h3>กรอกข้อมูลขออนุมัติการลา</h3>
        <div class="breadcrumb1">
            <ul>
                <li class="icon6"><a href="index.php">หน้าหลัก</a></li>
                <li class="current-page">กรอกข้อมูลขออนุมัติการลา</li>
            </ul>
        </div>
  	</div>
  </div>
    <!-- //banner -->
     <?
		$strSQL = "SELECT * FROM employee where emp_id = '".$_SESSION[emp_id]."'";
		$stmt  = mysqli_query($conn, $strSQL);
		$row = mysqli_fetch_array($stmt);
		
		$strSQL_la = "SELECT * FROM leavela where id = '".$_GET[id]."'";
		$stmt_la  = mysqli_query($conn, $strSQL_la);
		$row_la = mysqli_fetch_array($stmt_la);
	?>
	<div class="courses_box1">
	   <div class="container">
	   	  <form method="post" class="form-horizontal" action="update_la.php" enctype="multipart/form-data" onSubmit="JavaScript:return checkEmail();">
          <input type="hidden" class="form-control" name="emp_id" value="<?=$row[emp_id];?>" required>
          <input type="hidden" class="form-control" name="id" value="<?=$_GET[id];?>" required>
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
                          <select name="title_id" class="form-control" readonly>
                            <?
								$sql_ti = "SELECT * FROM titlename where title_status != 'C' ORDER BY title_name ASC ";
								$stm_ti = mysqli_query($conn,$sql_ti);
								while($row_ti = mysqli_fetch_array($stm_ti)){
							?>
                            		<option value="<?=$row_ti[title_id];?>" <? if($row_ti[title_id] == $row[title_id]){echo 'selected'; } ?>><?=$row_ti[title_name];?></option>
                            <?	} ?>
                          </select>
                      </div>
                      <div class="col-sm-3">
                      		<input type="text" class="form-control" placeholder="ชื่อ-นามสุกล" name="emp_name" value="<?=$row[emp_name];?>" readonly>
                      </div>
                  </div>
                    <div class="form-group">
                  <label class="control-label col-sm-3">เรื่อง :</label>
                      <div class="col-sm-3">
                          <input type="text" class="form-control" placeholder="เรื่อง" name="subject_leave" value="<?=$row_la[subject_leave];?>"  >
                      </div>
                      </div>
                  <div class="form-group">
                      <label class="control-label col-sm-3">ประเภทการลา :</label>
                      <div class="col-sm-3">
                          <select  name="type_la" id="type_la" class="form-control" >
                            <?
								$sql_po = "SELECT * FROM type_leave where tleave_status != 'C' ORDER BY tleave_name ASC ";
								$stm_po = mysqli_query($conn,$sql_po);
								while($row_po = mysqli_fetch_array($stm_po)){
							?>
                            	<option value="<?=$row_po[tleave_id];?>" <? if($row_po[tleave_id] == $row_la[type_leave]){echo 'selected'; } ?>><?=$row_po[tleave_name];?></option>
                            <?	} ?>
                          </select>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-3">ตั้งแต่วันที่ :</label>
                      <div class="col-sm-3">
                         <input type="date" name="leave_date" class="form-control" value="<?=$row_la[leave_date];?>"  /> 
                      </div>
                  </div>
                  
                  <div class="form-group">
                      <label class="control-label col-sm-3">ถึงวันที่ :</label>
                      <div class="col-sm-3">
                      	  <input type="date" name="leave_enddate" class="form-control" value="<?=$row_la[leave_enddate];?>" />
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-3">เนื่องจาก :</label>
                      <div class="col-sm-5">
                          <textarea name="detail_leave" id="detail_leave" rows="3" class="form-control"><?=$row_la[detail_leave];?></textarea>
                      </div>
                  </div>
                  
                  <? if($row_la['file_pdf'] != ''){ ?>
                  <div class="form-group">
                      <label class="control-label col-sm-3">เอกสารการลา :</label>

                      
                      	  <a href="<?=$row_la['file_pdf'];?>" target="_blank">เอกสารการลา[เดิม]</a>
                      
                  </div>
                  <? } ?>
                  
                  <div class="form-group">
                      <label class="control-label col-sm-3"></label>
                      <div class="col-sm-5">
                      	  <input type="hidden" name="hdnOldFile" value="<?=$row_la['file_pdf'];?>">
                          <input type="file" name="applicant_files" />
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