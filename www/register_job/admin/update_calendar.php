<?
		session_start();
		header('Content-Type: text/html; charset=UTF-8');
		include "connectDb.php"; 
		$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
		mysqli_set_charset($conn, "utf8");
		error_reporting(~E_NOTICE);
		
		$calendar_date = $_POST[calendar_date].' '.$_POST[calendar_time];

		$strSQL = "update calendar set club_id = '".$_POST[club_id]."', calendar_date = '".$calendar_date."' where calendar_id = '$_POST[calendar_id]' ";  							
		$objQuery = mysqli_query($conn,$strSQL);
?>
    	<script>
			alert("บันทึกข้อมูลเรียบร้อย");
			window.location.href = "list_calendar.php";
        </script>
