<?
		session_start();
		header('Content-Type: text/html; charset=UTF-8');
		include "admin/connectDb.php"; 
		$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
		mysqli_set_charset($conn, "utf8");
		error_reporting(~E_NOTICE);
		
			
		$sur = strrchr($_FILES['file_file'.$_POST[i]]['name'], ".");
		$newfilename = (Date("dmy_His").$sur); 
		copy($_FILES['file_file'.$_POST[i]]["tmp_name"],"file_file/".$newfilename); 
		$file_img = "file_file/".$newfilename;
		
		$file_file = 'file_file'.$_POST[i];
		
		$strSQL = "UPDATE tb_file SET file_file = '".$file_img."' WHERE file_id = '".$_POST['file_id']."' ";
		$objQuery = mysqli_query($conn,$strSQL);		
		
			
?>
    	<script>
			alert("แก้ไขเรียบร้อย");
			window.location.href = "list_file.php";
        </script>
