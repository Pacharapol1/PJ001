<?
		session_start();
		header('Content-Type: text/html; charset=UTF-8');
		include "admin/connectDb.php"; 
		$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
		mysqli_set_charset($conn, "utf8");
		error_reporting(~E_NOTICE); 
		
		$sur = strrchr($_FILES['about_file']['name'], ".");
		$newfilename = (Date("dmy_His").$sur); 
		copy($_FILES["about_file"]["tmp_name"],"about_file/".$newfilename); 
		$file_img = "about_file/".$newfilename;
		
		$strSQL = "INSERT INTO about (about_id, about_date, about_file, mem_id) VALUES (NULL, NOW(), '".$file_img."', '".$_POST["mem_id"]."')";  							
		$objQuery = mysqli_query($conn, $strSQL);
?>
		<script>
			alert("บันทึกข้อมูลเรียบร้อย");
			window.location.href = "list_about.php";
        </script>
