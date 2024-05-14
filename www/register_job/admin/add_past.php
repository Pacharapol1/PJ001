<?
		session_start();
		header('Content-Type: text/html; charset=UTF-8');
		include "connectDb.php"; 
		$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
		mysqli_set_charset($conn, "utf8");
		error_reporting(~E_NOTICE);

		$strSQL = "INSERT INTO past (past_id, re_id, past_date, past_time, past_detail, re_status) VALUES (NULL, '".$_POST["re_id"]."', '".$_POST["past_date"]."', '".$_POST["past_time"]."', '".$_POST["past_detail"]."', '".$_POST["re_status"]."')";  							
		$objQuery = mysqli_query($conn,$strSQL);	
		
		$strSQL_up = "UPDATE register_work SET re_status = '2' WHERE re_id = '".$_POST["re_id"]."' ";
		$stmt_up = mysqli_query($conn,$strSQL_up);

?>
    	<script>
			alert("บันทึกข้อมูลเรียบร้อย");
			window.location.href = "view_mem.php?mem_id=<?=$_POST[mem_id];?>";
        </script>
