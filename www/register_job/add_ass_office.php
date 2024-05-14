<?
		session_start();
		header('Content-Type: text/html; charset=UTF-8');
		include "admin/connectDb.php"; 
		$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
		mysqli_set_charset($conn, "utf8");
		error_reporting(~E_NOTICE); 
		
		for($i=1;$i<=21;$i++){
			$strSQL = "INSERT INTO ass_office (ass_office_id, ass_office_date, re_id, mem_id, ass_office_item, ass_office_fullscore, ass_office_score) VALUES (NULL, NOW(), '".$_POST["re_id"]."', '".$_POST["mem_id"]."', '".$i."', '".$_POST["ass_office_fullscore".$i]."', '".$_POST["ass_office_score".$i]."')";  							
			$objQuery = mysqli_query($conn, $strSQL);
			if($i >= 18){
				$strSQL = "INSERT INTO ass_office (ass_office_id, ass_office_date, re_id, mem_id, ass_office_score_strength, ass_office_score_need, ass_office_score_detail, ass_office_score_chk) VALUES (NULL, NOW(), '".$_POST["re_id"]."', '".$_POST["mem_id"]."', '".$_POST["ass_office_score_strength"]."', '".$_POST["ass_office_score_need"]."', '".$_POST["ass_office_score_detail"]."', '".$_POST["ass_office_score_chk"]."')";  							
				$objQuery = mysqli_query($conn, $strSQL);
			}
		}
		
		$sql_up = "UPDATE register_work SET re_ass_office = 'Y' WHERE re_id = '".$_POST["re_id"]."' ";
		mysqli_query($conn, $sql_up);
?>
		<!--<script>
			alert("บันทึกข้อมูลเรียบร้อย");
			window.location.href = "view_student.php?club_id=<?=$_POST["club_id"];?>";
        </script>-->
