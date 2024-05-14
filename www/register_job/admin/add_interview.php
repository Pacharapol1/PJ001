<?
		session_start();
		header('Content-Type: text/html; charset=UTF-8');
		include "connectDb.php"; 
		$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
		mysqli_set_charset($conn, "utf8");
		error_reporting(~E_NOTICE);

		$strSQL = "INSERT INTO interview (interview_id, re_id, year_id, interview_date, interview_time, interview_place, interview_detail, interview_date_start, interview_date_end) VALUES (NULL, '".$_POST["re_id"]."', '".$_POST["year_id"]."', '".$_POST["interview_date"]."', '".$_POST["interview_time"]."', '".$_POST["interview_place"]."', '".$_POST["interview_detail"]."', '".$_POST["interview_date_start"]."', '".$_POST["interview_date_end"]."')";  							
		$objQuery = mysqli_query($conn,$strSQL);	
		
		$strSQL_up = "UPDATE register_work SET re_status = '1' WHERE re_id = '".$_POST["re_id"]."' ";
		$stmt_up = mysqli_query($conn,$strSQL_up);

?>
    	<script>
			alert("บันทึกข้อมูลเรียบร้อย");
			window.location.href = "view_mem.php?mem_id=<?=$_POST[mem_id];?>";
        </script>
