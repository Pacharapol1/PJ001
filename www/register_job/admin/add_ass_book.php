<?
		session_start();
		header('Content-Type: text/html; charset=UTF-8');
		include "connectDb.php"; 
		$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
		mysqli_set_charset($conn, "utf8");
		error_reporting(~E_NOTICE); 
		
		for($i=1;$i<=3;$i++){
			$strSQL = "INSERT INTO ass_book (ass_book_id, ass_book_date, book_id, ass_book_item, ass_book_score, ass_book_detail, ass_book_chk) VALUES (NULL, NOW(), '".$_POST["book_id"]."', '".$i."', '".$_POST["ass_book_score".$i]."', '".$_POST["ass_book_detail"]."', '".$_POST["ass_book_chk"]."')";  							
			$objQuery = mysqli_query($conn, $strSQL);
		}
		
		$sql_up = "UPDATE book SET book_ass = 'Y' WHERE book_id = '".$_POST["book_id"]."' ";
		mysqli_query($conn, $sql_up);
?>
		<script>
			alert("บันทึกข้อมูลเรียบร้อย");
			window.location.href = "list_book.php";
        </script>
