<?
		session_start();
		header('Content-Type: text/html; charset=UTF-8');
		include "connectDb.php"; 
		$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
		mysqli_set_charset($conn, "utf8");
		error_reporting(~E_NOTICE);
		

		$strSQL = "update interview set year_id = '$_POST[year_id]', interview_date = '$_POST[interview_date]', interview_time = '$_POST[interview_time]', interview_place = '$_POST[interview_place]', interview_detail = '$_POST[interview_detail]', interview_date_start = '$_POST[interview_date_start]', interview_date_end = '$_POST[interview_date_end]' where interview_id = '$_POST[interview_id]' ";  							
		$objQuery = mysqli_query($conn,$strSQL);	

?>
    	<script>
			alert("บันทึกข้อมูลเรียบร้อย");
			window.location.href = "list_interview.php";
        </script>
