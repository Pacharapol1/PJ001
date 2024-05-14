<?
	@session_start();
	header('Content-Type: text/html; charset=UTF-8');
	include "admin/connectDb.php"; 
	$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
	mysqli_set_charset($conn, "utf8");
	error_reporting(~E_NOTICE);
	
	$query = "SELECT * FROM member WHERE username = '".$_POST["user"]."' AND password = '".$_POST["pass"]."' and mem_status != 'C' ";
			
	$objQuery = mysqli_query($conn,$query) or die ("Error Query [".$query."]");
	$row = mysqli_fetch_array($objQuery);
	$strAdd = $row['mem_id'];
		if($strAdd == ''){
	?>
			<script>
				alert("ชื่อผู้ใช้งาน หรือ รหัสผ่าน ไม่ถูกต้อง");
				window.location.href = 'login.php';
			</script>
	<? 
		}else{

			$_SESSION["full_name"] = $row[mem_name];
			$_SESSION["mem_id"] = $row[mem_id];
			$_SESSION["club_id"] = $row[club_id];
			$_SESSION["dep_id"] = $row[dep_id];
			$_SESSION["saka_id"] = $row[saka_id];
			$_SESSION["regis_status"] = 'student';
			$_SESSION["mem_status"] = $row[mem_status];
			$_SESSION["title"] = 'ระบบการจัดการงานสหกิจศึกษา';

?>
					<script>
						window.location.href = 'profile.php';
					</script>
<?
		}
		//
	mysql_close();
?>