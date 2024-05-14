<?
		session_start();
		header('Content-Type: text/html; charset=UTF-8');
		include "admin/connectDb.php"; 
		$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
		mysqli_set_charset($conn, "utf8");
		error_reporting(~E_NOTICE); 
		
		$strSQL = "SELECT * FROM tb_file where mem_id = '".$_SESSION["mem_id"]."' and re_id = '".$_POST["re_id"]."' ";
		$stmt  = mysqli_query($conn,$strSQL);
		$row = mysqli_fetch_array($stmt);
		$numrow = mysqli_num_rows($stmt);

		$i = $_POST[i];
		$sur = strrchr($_FILES['file_file'.$i]['name'], ".");
		$newfilename = (date("dmy_His").$sur); 
		copy($_FILES["file_file".$i]["tmp_name"],"file_file/".$newfilename); 
		$file_img.$i = "file_file/".$newfilename;
		
		$pic = 'file_file'.$_POST[i];
		
		if($numrow == ''){
			$strSQL = "INSERT INTO tb_file (file_id, file_date, re_id, file_file1, file_file2, file_file3, file_file4, file_file5, file_file6, mem_id) VALUES (NULL, NOW(), '".$_POST["re_id"]."', '".$file_img1."', '".$file_img2."', '".$file_img3."', '".$file_img4."', '".$file_img5."', '".$file_img6."', '".$_POST["mem_id"]."')";  		
			mysqli_query($conn, $strSQL);
			
			$strSQL = "UPDATE tb_file SET $pic = '".$file_img.$i."' WHERE mem_id = '".$_SESSION["mem_id"]."' and re_id = '".$_POST["re_id"]."' ";
			mysqli_query($conn, $strSQL);
		}else{
			$strSQL = "UPDATE tb_file SET $pic = '".$file_img.$i."' WHERE mem_id = '".$_SESSION["mem_id"]."' and re_id = '".$_POST["re_id"]."' ";
			mysqli_query($conn, $strSQL);
		}
		
?>
		<script>
			alert("บันทึกข้อมูลเรียบร้อย");
			window.location.href = "list_file.php?re_id=<?=$_POST["re_id"];?>";
        </script>
