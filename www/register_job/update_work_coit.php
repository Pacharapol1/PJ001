<?
		session_start();
		header('Content-Type: text/html; charset=UTF-8');
		include "admin/connectDb.php"; 
		$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
		mysqli_set_charset($conn, "utf8");
		error_reporting(~E_NOTICE);
		
		$strSQL = "update work_report set work_title = '$_POST[work_title]', work_detail = '$_POST[work_detail]', work_step = '$_POST[work_step]' where workre_id = '$_POST[workre_id]' ";  							
		$objQuery = mysqli_query($conn,$strSQL);
?>
    	<script>
			alert("บันทึกข้อมูลเรียบร้อย");
			window.location.href = "view_work_coit.php?mem_id=<?=$_POST[work_title];?>";
        </script>
