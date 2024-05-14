<?
		session_start();
		header('Content-Type: text/html; charset=UTF-8');
		include "connectDb.php"; 
		$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
		mysqli_set_charset($conn, "utf8");
		error_reporting(~E_NOTICE);
		
		$strSQL = "update register_work set re_interview = '$_POST[re_interview]', re_status = '1N' where re_id = '$_POST[re_id]' ";  							
		$objQuery = mysqli_query($conn,$strSQL);	
		
		$sql_up_work = "UPDATE club_work SET work_amount = work_amount-1 WHERE work_id = '".$_POST[work_id]."' ";
		mysqli_query($conn,$sql_up_work);
?>
    	<script>
			alert("บันทึกข้อมูลเรียบร้อย");
			window.location.href = "view_register.php?re_id=<?=$_POST[re_id];?>&mem_id=<?=$_POST[mem_id];?>";
        </script>
