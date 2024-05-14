<?
		session_start();
		header('Content-Type: text/html; charset=UTF-8');
		include "admin/connectDb.php"; 
		$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
		mysqli_set_charset($conn, "utf8");
		error_reporting(~E_NOTICE); 
		
		$strSQL = "INSERT INTO work_report (workre_id, work_date, re_id, mem_id, work_title, work_detail, work_step) VALUES (NULL, NOW(), '".$_POST["re_id"]."', '".$_POST["mem_id"]."', '".$_POST["work_title"]."', '".$_POST["work_detail"]."', '".$_POST["work_step"]."')";  							
		$objQuery = mysqli_query($conn, $strSQL);
?>
		<script>
			alert("บันทึกข้อมูลเรียบร้อย");
			window.location.href = "view_work_coit.php?mem_id=<?=$_SESSION[mem_id];?>";
        </script>
