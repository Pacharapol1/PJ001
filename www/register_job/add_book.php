<?
		session_start();
		header('Content-Type: text/html; charset=UTF-8');
		include "admin/connectDb.php"; 
		$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
		mysqli_set_charset($conn, "utf8");
		error_reporting(~E_NOTICE); 
		
		$strSQL = "SELECT * FROM book where mem_id = '".$_SESSION["mem_id"]."' and book_status != 'C' ";
		$stmt  = mysqli_query($conn,$strSQL);
		$row = mysqli_fetch_array($stmt);
		$numrow = mysqli_num_rows($stmt);

		$i = $_POST[i];
		$sur = strrchr($_FILES['book_file'.$i]['name'], ".");
		$newfilename = (date("dmy_His").$sur); 
		copy($_FILES["book_file".$i]["tmp_name"],"book_file/".$newfilename); 
		$file_img.$i = "book_file/".$newfilename;
		
		$pic = 'book_file'.$_POST[i];
		
		if($numrow == ''){
			$strSQL = "INSERT INTO book (book_id, book_date, book_file1, book_file2, book_file3, book_file4, book_file5, book_file6, book_file7, book_file8, book_file9, book_file10, book_file11, book_file12, book_file13, mem_id) VALUES (NULL, NOW(), '".$file_img1."', '".$file_img2."', '".$file_img3."', '".$file_img4."', '".$file_img5."', '".$file_img6."', '".$file_img7."', '".$file_img8."', '".$file_img9."', '".$file_img10."', '".$file_img11."', '".$file_img12."', '".$file_img13."', '".$_POST["mem_id"]."')";  		
			mysqli_query($conn, $strSQL);
			
			$strSQL = "UPDATE book SET $pic = '".$file_img.$i."' WHERE mem_id = '".$_SESSION["mem_id"]."' ";
			mysqli_query($conn, $strSQL);
		}else{
			$strSQL = "UPDATE book SET $pic = '".$file_img.$i."' WHERE mem_id = '".$_SESSION["mem_id"]."' ";
			mysqli_query($conn, $strSQL);
		}
		
?>
		<script>
			alert("บันทึกข้อมูลเรียบร้อย");
			window.location.href = "list_book.php";
        </script>
