<?
		session_start();
		header('Content-Type: text/html; charset=UTF-8');
		include "connectDb.php"; 
		$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
		mysqli_set_charset($conn, "utf8");
		error_reporting(~E_NOTICE); 
		
		for($i=1;$i<=14;$i++){
			$strSQL = "INSERT INTO ass_aj (ass_aj_id, ass_aj_date, calendar_id, re_id, mem_id, ass_aj_item, ass_aj_fullscore, ass_aj_score, ass_aj_detail) VALUES (NULL, NOW(), '".$_POST["calendar_id"]."', '".$_POST["re_id"]."', '".$_POST["mem_id"]."', '".$i."', '".$_POST["ass_aj_fullscore".$i]."', '".$_POST["ass_aj_score".$i]."', '".$_POST["ass_aj_detail"]."')";  							
			$objQuery = mysqli_query($conn, $strSQL);
		}
		
		$sql_up = "UPDATE register_work SET re_ass_aj = 'Y' WHERE re_id = '".$_POST["re_id"]."' ";
		mysqli_query($conn, $sql_up);
		
		$sql_up_ca = "UPDATE calendar SET calendar_status_aj = 'Y' WHERE calendar_id = '".$_POST["calendar_id"]."' ";
		mysqli_query($conn, $sql_up_ca);
?>
		<script>
			alert("บันทึกข้อมูลเรียบร้อย");
			window.location.href = "view_student.php?club_id=<?=$_POST["club_id"];?>&calendar_id=<?=$_POST["calendar_id"];?>";
        </script>
