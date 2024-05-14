<?
		session_start();
		header('Content-Type: text/html; charset=UTF-8');
		include "admin/connectDb.php"; 
		$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
		mysqli_set_charset($conn, "utf8");
		error_reporting(~E_NOTICE); 
		
		$re_date_time = $_POST["re_office_date"].' '.$_POST["re_office_time"];
		
		$strSQL_up = "UPDATE register_work SET re_date_time = '".$re_date_time."', re_office_place = '".$_POST[re_office_place]."', re_status_office = 1 WHERE re_id = '".$_POST["re_id"]."' ";
		mysqli_query($conn, $strSQL_up);
		
?>
		<script>
			alert("บันทึกข้อมูลเรียบร้อย");
			window.location.href = "list_member_work.php";
        </script>
