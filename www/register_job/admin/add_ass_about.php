<?
		session_start();
		header('Content-Type: text/html; charset=UTF-8');
		include "connectDb.php"; 
		$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
		mysqli_set_charset($conn, "utf8");
		error_reporting(~E_NOTICE); 
		
		for($i=1;$i<=12;$i++){
			$strSQL = "INSERT INTO ass_about (ass_about_id, ass_about_date, about_id, ass_about_item, ass_about_score, ass_about_detail, emp_id) VALUES (NULL, NOW(), '".$_POST["about_id"]."', '".$i."', '".$_POST["ass_about_score".$i]."', '".$_POST["ass_about_detail"]."', '".$_SESSION[emp_id]."')";  							
			$objQuery = mysqli_query($conn, $strSQL);
		}
		
		$sql_up = "UPDATE about SET about_ass = 'Y' WHERE about_id = '".$_POST["about_id"]."' ";
		mysqli_query($conn, $sql_up);
?>
		<script>
			alert("บันทึกข้อมูลเรียบร้อย");
			window.location.href = "list_about.php";
        </script>
