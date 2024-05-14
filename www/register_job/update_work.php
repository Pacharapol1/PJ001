<?
		session_start();
		header('Content-Type: text/html; charset=UTF-8');
		include "admin/connectDb.php"; 
		$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
		mysqli_set_charset($conn, "utf8");
		error_reporting(~E_NOTICE);
		
		$strSQL = "update club_work set work_name = '$_POST[work_name]', saka_id = '$_POST[saka_id]', work_num = '$_POST[work_num]', work_detail = '$_POST[work_detail]' where work_id = '$_POST[work_id]' ";  							
		$objQuery = mysqli_query($conn,$strSQL);
?>
    	<script>
			alert("บันทึกข้อมูลเรียบร้อย");
			window.location.href = "list_club_work.php";
        </script>
