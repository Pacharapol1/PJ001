<?
		session_start();
		header('Content-Type: text/html; charset=UTF-8');
		include "admin/connectDb.php"; 
		$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
		mysqli_set_charset($conn, "utf8");
		error_reporting(~E_NOTICE);
		
		$strSQL = "INSERT INTO answers (detail,name, status, email,question_id,date_ans) VALUES ('".$_POST["detail"]."', '".$_POST["name"]."', '".$_POST["status"]."', '".$_POST["email"]."', '".$_POST["id"]."', NOW())";  							
			$objQuery = mysqli_query($conn, $strSQL);	
			if (!$objQuery) {
				die('Invalid query: ' . mysql_error());
			}
		$updateq = "UPDATE questions SET reply=reply+1 WHERE id='$_POST[id]' ";
		mysqli_query($conn, $updateq);
?>
    	<script>
			alert("บันทึกข้อมูลเรียบร้อยแล้ว");
			window.location.href = "view_topic.php?id=<?=$_POST[id];?>";
        </script>
