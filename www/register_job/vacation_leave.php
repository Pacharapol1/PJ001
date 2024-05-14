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
    
    <link type="text/css" href="css/ui-lightness/jquery-ui-1.8.10.custom.css" rel="stylesheet" />	
		<script type="text/javascript" src="js/jquery-1.4.4.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui-1.8.10.offset.datepicker.min.js"></script>
		<script type="text/javascript">
		  $(function () {
		    var d = new Date();
		    var toDay = d.getDate() + '/' + (d.getMonth() + 1) + '/' + (d.getFullYear() + 543);


		    // กรณีต้องการใส่ปฏิทินลงไปมากกว่า 1 อันต่อหน้า ก็ให้มาเพิ่ม Code ที่บรรทัดด้านล่างด้วยครับ (1 ชุด = 1 ปฏิทิน)

		    $("#datepicker-th").datepicker({ dateFormat: 'dd/mm/yy', minDate: 0, isBuddhist: true, defaultDate: toDay, dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
              dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
              monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
              monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']});
			
			$("#datepicker-th-la").datepicker({ dateFormat: 'dd/mm/yy', isBuddhist: true, defaultDate: toDay, dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
              dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
              monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
              monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']});
			 
			$("#datepicker-th2").datepicker({ dateFormat: 'dd/mm/yy', minDate: 0, isBuddhist: true, defaultDate: toDay, dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
              dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
              monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
              monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']});
			
			$("#datepicker-th2-la").datepicker({ dateFormat: 'dd/mm/yy', isBuddhist: true, defaultDate: toDay, dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
              dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
              monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
              monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']});

     		    $("#datepicker-en").datepicker({ dateFormat: 'dd/mm/yy'});
				

		    $("#inline").datepicker({ dateFormat: 'dd/mm/yy', inline: true });
			

			});
		</script>
<style type="text/css">

			.demoHeaders { margin-top: 2em; }
			#dialog_link {padding: .4em 1em .4em 20px;text-decoration: none;position: relative;}
			#dialog_link span.ui-icon {margin: 0 5px 0 0;position: absolute;left: .2em;top: 50%;margin-top: -8px;}
			ul#icons {margin: 0; padding: 0;}
			ul#icons li {margin: 2px; position: relative; padding: 4px 0; cursor: pointer; float: left;  list-style: none;}
			ul#icons span.ui-icon {float: left; margin: 0 4px;}
			ul.test {list-style:none; line-height:30px;}
		</style>
<script>
// คืนค่าวันที่ปัจจุบันลง Textbox แบบซ่อน ที่ชื่อ dc1
function displayDate() {
var now = new Date();
var formatedDate = now.getDate() + "/" + (now.getMonth() + 1) + "/" + now.getFullYear();
document.getElementById("dc1").value = formatedDate;
}
</script>
    
    
    <script> function showDiv(elem){
	   if(elem.value == "2"){
		  document.getElementById('hidden_div').style.display = "block";
		  document.getElementById('hidden_div2').style.display = "none";
		  document.getElementById('hidden_div3').style.display = "block";
		  document.getElementById('hidden_div4').style.display = "none";
		}else{
		  document.getElementById('hidden_div').style.display = "none";
		  document.getElementById('hidden_div2').style.display = "block";
		  document.getElementById('hidden_div3').style.display = "none";
		  document.getElementById('hidden_div4').style.display = "block";
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
	?>
	<div class="courses_box1">
	   <div class="container">
	   	  <form method="post" class="form-horizontal" action="add_Vacation_leave.php" enctype="multipart/form-data" onSubmit="JavaScript:return checkEmail();">
          <input type="hidden" class="form-control" name="emp_id" value="<?=$row[emp_id];?>" required>
              <h4 class="form-signin-heading" align="center"></h4>
                  <div class="form-group">
                      <label class="control-label col-sm-3">เรื่อง :</label>
                      <div class="col-sm-3">
                          <select  name="subject_Vacation" id="subject_Vacation" class="form-control" >
                          		<option value="">กรุณาเลือกเรื่อง</option>
                          		<option value="ลาพักผ่อน">ลาพักผ่อน</option>
                          		<option value="ลาพักผ่อนต่างประเทศ">ลาพักผ่อนต่างประเทศ</option>
                         	 </select>
                      </div>
                  </div>

                   <div class="form-group">
                      <label class="control-label col-sm-3">เรียน:</label>
                      <div class="col-sm-3">
                          <input type="text" class="form-control"  name="to_Vacation"  >
                      </div>
                  </div>

						<div class="form-group">
                      <label class="control-label col-sm-3">วันลาพักผ่อนสะสม :</label>
                      <div class="col-sm-3">
                          <input type="text" class="form-control"  name="cumulative_Vacation"  >
                      </div>
                  </div>

                   <div class="form-group">
                      <label class="control-label col-sm-3">รวมวันลาพักผ่อนสะสม:</label>
                      <div class="col-sm-3">
                          <input type="text" class="form-control"  name="total_Vacation"  >
                      </div>
                  </div>

                  
                    <div class="form-group">
                      <label class="control-label col-sm-3">ลามาแล้ว:</label>
                      <div class="col-sm-3">
                          <input type="text" class="form-control"  name="la_ago"  >
                      </div>
                  </div>
                   <div class="form-group">
                      <label class="control-label col-sm-3">ลาครั้งนี้:</label>
                      <div class="col-sm-3">
                          <input type="text" class="form-control"  name="la_today"  >
                      </div>
                  </div>


                  <div class="form-group">
                      <label class="control-label col-sm-3">ระหว่างลาจะติดต่อข้าพเจ้าได้ที่ :</label>
                      <div class="col-sm-5">
                          <textarea name="address_Vacation" id="address_Vacation" rows="3" class="form-control"></textarea>
                      </div>
                  </div>


                  
                
              			<label class="control-label col-sm-3"></label>
              			<button class="btn btn-primary" type="submit" >บันทึก</button> 
 						<button type="button" class="btn btn-danger" onClick="window.history.back();">ย้อนกลับ</button>
                        
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