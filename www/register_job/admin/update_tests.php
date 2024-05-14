<?
		session_start();
		header('Content-Type: text/html; charset=UTF-8');
		include "connectDb.php"; 
		$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
		mysqli_set_charset($conn, "utf8");
		error_reporting(~E_NOTICE);
		

		$strSQL = "update tests set year_id = '$_POST[year_id]', tests_date = '$_POST[tests_date]', tests_time = '$_POST[tests_time]', tests_place = '$_POST[tests_place]', tests_detail = '$_POST[tests_detail]', tests_date_start = '$_POST[tests_date_start]', tests_date_end = '$_POST[tests_date_end]' where tests_id = '$_POST[tests_id]' ";  							
		$objQuery = mysqli_query($conn,$strSQL);	

?>
    	<script>
			alert("บันทึกข้อมูลเรียบร้อย");
			window.location.href = "view_mem.php?mem_id=<?=$_POST[mem_id];?>";
        </script>
