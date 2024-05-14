<?
		session_start();
		header('Content-Type: text/html; charset=UTF-8');
		include "admin/connectDb.php"; 
		$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
		mysqli_set_charset($conn, "utf8");
		error_reporting(~E_NOTICE);
		
		$strSQL = "update diary set diary_date = '$_POST[diary_date]', diary_report = '$_POST[diary_report]', diary_question = '$_POST[diary_question]', diary_modify = '$_POST[diary_modify]' where diary_id = '$_POST[diary_id]' ";  							
		$objQuery = mysqli_query($conn,$strSQL);
?>
    	<script>
			alert("บันทึกข้อมูลเรียบร้อย");
			window.location.href = "list_today.php";
        </script>
