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
<script type="text/javascript">
	function reset_file(name)
{
var elem=document.myform(name);
elem.parentNode.innerHTML=elem.parentNode.innerHTML;
return false;
}
function clickupload()
{
if(document.myform.fileupload.value.length==0)
{
alert("Please select file to upload");
return false;
}
alert("Now uploading please wait");
document.myform.btn.disabled=true;
return true;
}
function uploadok(pathfile)
{
document.myform.fileupload.style.display="none";
document.myform.btn.style.display="none";
document.myform.txt.style.display="";
document.myform.txt.value=pathfile;
alert("Upload complete\n"+pathfile);
return true;
}
function over_size(size)
{
alert("File not over 200 KB\n"+size+" KB");
reset_file("fileupload");
document.myform.btn.disabled=false;
return false;
}
function wrong_type(type)
{
alert("Please upload only file type\nGif, Jpg, Png, Pdf, Doc, Docx, Tiff\n"+type);
reset_file("fileupload");
document.myform.btn.disabled=false;
return false;
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
	?>
	<div class="courses_box1">
	   <div class="container">
	   	  <form method="post" class="form-horizontal" action="add_la.php" enctype="multipart/form-data"  onsubmit="return clickupload();">
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
                  <?php $subject = $_GET['subject'];
                        $detail_leave = $_GET['detail_leave'];
               ?>
                  <label class="control-label col-sm-3">เรื่อง :</label>
                      <div class="col-sm-3">
                          <input type="text" class="form-control" name="subject_leave" value="<?php if($subject==""){ echo "";}else{ echo $subject;}?>" required>
                      </div>
                      </div>
                  <div class="form-group">
                      <label class="control-label col-sm-3">ประเภทการลา :</label>
                      <div class="col-sm-3">
                          <select  name="type_la" id="type_la" class="form-control" required>
                          		<option value="">กรุณาเลือกประเภทการลา</option>
                            <?
								$sql_po = "SELECT * FROM type_leave where tleave_status != 'C' ORDER BY tleave_name ASC ";
								$stm_po = mysqli_query($conn,$sql_po);
								while($row_po = mysqli_fetch_array($stm_po)){
							?>
                            	<option value="<?=$row_po[tleave_id];?>" <? if($row_po[tleave_id] == $row[tleave_id]){echo 'selected'; } ?>><?=$row_po[tleave_name];?></option>
                            <?	} ?>
                          </select>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-3">ตั้งแต่วันที่ :</label>
                      <div class="col-sm-3">
                          <input class="form-control" type="date" name="leave_date" min="<?=date('Y-m-d'); ?>" value="<?=date('Y-m-d'); ?>" required>
                      </div>
                  </div>
                  
                  <div class="form-group">
                      <label class="control-label col-sm-3">ถึงวันที่ :</label>
                      <div class="col-sm-3">
                      	  <input class="form-control" type="date" name="leave_enddate" min="<?=date('Y-m-d'); ?>" value="<?=date('Y-m-d'); ?>" required>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-3">เนื่องจาก :</label>
                      <div class="col-sm-5">
                        <textarea name="detail_leave" id="detail_leave" rows="3" class="form-control" required><?php if($detail_leave == ""){ echo "";}else{ echo $detail_leave; } ?></textarea>
                      </div>
                  </div>
                  
                  <div class="form-group">
                      <label class="control-label col-sm-3">เอกสารการลา :</label>
                      <div class="col-sm-5">
                          <input type="file" name="applicant_files" id="applicant_files" /> 
                          <label ><font color="red">*อัพโหลดไฟล์เป็น pdf เท่านั้น</label>
                        </div>
                  </div>
               
                  <div class="form-group">
              			<label class="control-label col-sm-3"></label>
                        <button class="btn btn-primary" type="submit" >บันทึก</button> 
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