<?
		session_start();
		header('Content-Type: text/html; charset=UTF-8');
		include "connectDb.php"; 
		$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
		mysqli_set_charset($conn, "utf8");
		error_reporting(~E_NOTICE);
		
		$calendar_date = $_POST[calendar_date].' '.$_POST[calendar_time];
		
		$strSQL = "INSERT INTO calendar (calendar_id, club_id, calendar_date, emp_id, calendar_status) VALUES (NULL, '".$_POST["club_id"]."', '".$calendar_date."', '".$_SESSION["emp_id"]."', 'W')";  							
		$objQuery = mysqli_query($conn,$strSQL);
?>
    	<script>
			alert("บันทึกข้อมูลเรียบร้อย");
			window.location.href = "list_calendar.php";
        </script>
