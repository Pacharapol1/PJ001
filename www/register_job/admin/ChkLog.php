<?
	@session_start();
	include "connectDb.php"; 
	$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
	mysqli_set_charset($conn, "utf8");
	error_reporting(~E_NOTICE);
	
	if($_POST["user"] == 'admin' && $_POST["pass"] == '1234'){
		$_SESSION["full_name"] = 'ADMIN';
		$_SESSION["emp_id"] = '0';
		$_SESSION["status"] = '1';
		$_SESSION["title"] = 'ระบบการจัดการงานสหกิจศึกษา';
	?>
		<script>
            window.location.href = 'list_club.php';
        </script>
	<?
	
	}else{
		$query = "SELECT * FROM employee WHERE username = '".$_POST["user"]."' AND password = '".$_POST["pass"]."' and emp_status != 'C' ";
				
		$objQuery = mysqli_query($conn,$query) or die ("Error Query [".$query."]");
		$row = mysqli_fetch_array($objQuery);
		$strAdd = $row['emp_id'];
			if($strAdd == ''){
		?>
				<script>
					alert("ชื่อผู้ใช้งาน หรือ รหัสผ่าน ไม่ถูกต้อง");
					window.location.href = 'index.php';
				</script>
		<? 
			}else{

			$_SESSION["full_name"] = $row[emp_name];
			$_SESSION["emp_id"] = $row[emp_id];
			$_SESSION["club_id"] = $row[club_id];
			$_SESSION["title"] = 'ระบบการจัดการงานสหกิจศึกษา';
			$_SESSION["status"] = '2';
?>
			  <script>
                  window.location.href = 'list_calendar.php';
              </script>
<?
			}
	}
	mysql_close();
?>