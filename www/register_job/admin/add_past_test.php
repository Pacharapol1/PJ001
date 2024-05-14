<?
		session_start();
		header('Content-Type: text/html; charset=UTF-8');
		include "connectDb.php"; 
		$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
		mysqli_set_charset($conn, "utf8");
		error_reporting(~E_NOTICE);
		
		if($_POST["tests_count"] == 6){
			$strSQL = "INSERT INTO past_test (past_test_id, re_id, tests_count, past_test_date, past_test_time, past_test_detail, re_status) VALUES (NULL, '".$_POST["re_id"]."', '".$_POST["tests_count"]."', '".$_POST["past_test_date"]."', '".$_POST["past_test_time"]."', '".$_POST["past_test_detail"]."', '".$_POST["re_status"]."')";  							
			$objQuery = mysqli_query($conn,$strSQL);	
		
			$strSQL_up = "UPDATE register_work SET re_status = '3' WHERE re_id = '".$_POST["re_id"]."' ";
			$stmt_up = mysqli_query($conn,$strSQL_up);
		}else{
			$strSQL = "INSERT INTO past_test (past_test_id, re_id, tests_count, past_test_date, past_test_time, past_test_detail, re_status) VALUES (NULL, '".$_POST["re_id"]."', '".$_POST["tests_count"]."', '".$_POST["past_test_date"]."', '".$_POST["past_test_time"]."', '".$_POST["past_test_detail"]."', 'Y')";  							
			$objQuery = mysqli_query($conn,$strSQL);
		}

?>
    	<script>
			alert("บันทึกข้อมูลเรียบร้อย");
			window.location.href = "view_mem.php?mem_id=<?=$_POST[mem_id];?>";
        </script>
