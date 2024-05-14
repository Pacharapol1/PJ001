<?
	session_start();
	include "admin/connectDb.php"; 
	$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
	mysqli_set_charset($conn, "utf8");
	error_reporting(~E_NOTICE); 
if($_SESSION["full_name"] == ''){
?>
    <script>
        alert("กรุณาเข้าสู่ระบบ");
        window.location.href = "login.php";
    </script>
<?  } ?>
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
  		<h3>แก้ไขรายชื่อพนักงานที่ปรึกษา</h3>
        <div class="breadcrumb1">
            <ul>
                <li class="icon6"><a href="index.php">หน้าหลัก</a></li>
                <li class="current-page">แก้ไขรายชื่อพนักงานที่ปรึกษา</li>
            </ul>
        </div>
  	</div>
   </div>
    <!-- //banner -->
	<div class="courses_box1">
	   <div class="container">
       <div class="col-md-3">
			<div class="courses_box1-left">
            	<? include 'menu_profile_office.php'; ?>
                <div style="height:20px;"></div>      
	       </div>

		</div>
		<div class="col-md-9">
		<?
			$strSQL_club = "SELECT * FROM emp_office where office_id = '".$_GET["office_id"]."' ";
			$stmt_club  = mysqli_query($conn,$strSQL_club);
			$row = mysqli_fetch_array($stmt_club);
		?>
         <div class="panel-body">
          <div class="table-responsive">
              	<form class="login" method="post" action="update_emp_office.php" enctype="multipart/form-data">
                <input type="hidden" class="form-control" name="office_id" value="<?=$_GET[office_id];?>" required>
                <p class="lead">แก้ไขรายชื่อพนักงานที่ปรึกษา</p>
                
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
                      		<img id="imgAvatar" width="200" src="<?=$row[office_pic];?>">
                            <input type="hidden" name="hdnOldFile" value="<?=$row[office_pic];?>">
                          	<input class="form-control" type="file" name="office_pic" accept="image/*" OnChange="showPreview(this)">
                  </div>

                <div class="form-group">
                      <select name="title_id" class="form-control" required>
						<?
                            $sql_ti = "SELECT * FROM titlename where title_status != 'C' ORDER BY title_name ASC ";
                            $stm_ti = mysqli_query($conn,$sql_ti);
                            while($row_ti = mysqli_fetch_array($stm_ti)){
                        ?>
                                <option value="<?=$row_ti[title_id];?>" <? if($row_ti[title_id] == $row[title_id]){echo 'selected'; } ?>><?=$row_ti[title_name];?></option>
                        <?	} ?>
                      </select>
                    </select>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" placeholder="ชื่อ" name="office_name" value="<?=$row[office_name];?>" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="นามสุกล" name="office_last" value="<?=$row[office_last];?>" required>
                </div>
                
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="ตำแหน่ง" name="office_po" value="<?=$row[office_po];?>" required>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" placeholder="เบอร์โทรศัพท์" maxlength="10" name="office_tel" value="<?=$row[office_tel];?>" OnKeyPress="return chkNumber(this)" required>
                </div>
                
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Line id" name="office_line" value="<?=$row[office_line];?>" required>
                </div>
                
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Face Book" name="office_fb" value="<?=$row[office_fb];?>" required>
                </div>
                
                <div class="form-group">
                    <input type="submit" class="btn btn-success btn-lg1 btn-block" name="submit" value="บันทึก">
                </div>
            </form>
              
          </div>
      </div>
		    <div class="clearfix"> </div>
	   </div>
	</div>
    </div>
	</div>
	<!--<div class="footer">
    	<? include 'footer.php'; ?>
    </div>-->
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