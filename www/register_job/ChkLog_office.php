<?
	@session_start();
	header('Content-Type: text/html; charset=UTF-8');
	include "admin/connectDb.php"; 
	$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
	mysqli_set_charset($conn, "utf8");
	error_reporting(~E_NOTICE);
	
	$query = "SELECT * FROM club WHERE club_email = '".$_POST["user"]."' AND password = '".$_POST["pass"]."' and club_status != 'C' ";
			
	$objQuery = mysqli_query($conn,$query) or die ("Error Query [".$query."]");
	$row = mysqli_fetch_array($objQuery);
	$strAdd = $row['club_id'];
		if($strAdd == ''){
	?>
			<script>
				alert("ชื่อผู้ใช้งาน หรือ รหัสผ่าน ไม่ถูกต้อง");
				window.history.back();
			</script>
	<? 
		}else{

			$_SESSION["full_name"] = $row[club_name];
			$_SESSION["club_id"] = $row[club_id];
			$_SESSION["regis_status"] = 'office';
			$_SESSION["title"] = 'ระบบการจัดการงานสหกิจศึกษา';

?>
					<script>
						window.location.href = 'profile_office.php';
					</script>
<?
		}
		//
	mysql_close();
?>