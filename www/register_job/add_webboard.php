<?
		session_start();
		header('Content-Type: text/html; charset=UTF-8');
		include "admin/connectDb.php"; 
		$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
		mysqli_set_charset($conn, "utf8");
		error_reporting(~E_NOTICE);
		
		$strSQL = "INSERT INTO questions (topic,detail,name, status, email,created) VALUES ('".$_POST["topic"]."', '".$_POST["detail"]."', '".$_POST["name"]."', '".$_POST["status"]."', '".$_POST["email"]."', NOW())";  							
			$objQuery = mysqli_query($conn, $strSQL);	
			if (!$objQuery) {
				die('Invalid query: ' . mysql_error());
			}
?>
    	<script>
			alert("บันทึกข้อมูลเรียบร้อยแล้ว");
			window.location.href = "comment.php";
        </script>
