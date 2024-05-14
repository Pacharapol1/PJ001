<?
		session_start();
		header('Content-Type: text/html; charset=UTF-8');
		include "connectDb.php"; 
		$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
		mysqli_set_charset($conn, "utf8");
		error_reporting(~E_NOTICE);
		
		$calendar_date = $_POST[calendar_date].' '.$_POST[calendar_time];
		
		$strSQL = "INSERT INTO calendar_admin (calendar_admin_id, club_id, mem_id, calendar_admin_date, emp_id) VALUES (NULL, '".$_POST["club_id"]."', '".$_POST["mem_id"]."', '".$calendar_date."', '".$_POST["emp_id"]."')";  							
		$objQuery = mysqli_query($conn,$strSQL);
		
		$sql_up = "UPDATE member SET calendar = 'Y' WHERE mem_id = '".$_POST["mem_id"]."' ";
		mysqli_query($conn,$sql_up);
?>

    	<script>
			alert("บันทึกข้อมูลเรียบร้อย");
			window.location.href = "view_emp.php?emp_id=<?=$_POST["emp_id"];?>";
        </script>
