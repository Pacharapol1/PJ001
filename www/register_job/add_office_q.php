<?
		session_start();
		header('Content-Type: text/html; charset=UTF-8');
		include "admin/connectDb.php"; 
		$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
		mysqli_set_charset($conn, "utf8");
		error_reporting(~E_NOTICE); 
		
		for($i=1;$i<=15;$i++){
			$strSQL = "INSERT INTO quality (quality_id, quality_date, re_id, calendar_id, mem_id, quality_item, quality_score, quality_detail) VALUES (NULL, NOW(), '".$_POST["re_id"]."', '".$_POST["calendar_id"]."', '".$_POST["mem_id"]."', '".$i."', '".$_POST["chk".$i]."', '".$_POST["quality_detail"]."')";  							
			$objQuery = mysqli_query($conn, $strSQL);
		}
		
		$sql_up = "UPDATE register_work SET re_ass_office = 'Y' WHERE re_id = '".$_POST["re_id"]."' ";
		mysqli_query($conn, $sql_up);
		
		$sql_up_ca = "UPDATE calendar SET calendar_status_quality = 'Y' WHERE calendar_id = '".$_POST["calendar_id"]."' ";
		mysqli_query($conn, $sql_up_ca);
?>
		<script>
			alert("บันทึกข้อมูลเรียบร้อย");
			window.location.href = "view_student.php?club_id=<?=$_POST["club_id"];?>&calendar_id=<?=$_POST["calendar_id"];?>";
        </script>
