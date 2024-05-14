<?
		session_start();
		header('Content-Type: text/html; charset=UTF-8');
		include "admin/connectDb.php"; 
		$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
		mysqli_set_charset($conn, "utf8");
		error_reporting(~E_NOTICE);
		
		$sql="Select * from document Where doc_name='".$_POST["doc_name"]."' and dep_id='".$_POST["dep_id"]."' and tdoc_id='".$_POST["tdoc_id"]."' ";
		$rs=mysqli_query($conn,$sql);
		if(mysqli_num_rows($rs)>0){
?>
		<script>
			alert("ชื่อไฟล์เอกสารมีในระบบแล้วกรุณาตรวจสอบ");
			window.history.back();
        </script>
<?
		}else{ 
			
			$sur = strrchr($_FILES['doc_file']['name'], ".");
			$newfilename = (Date("dmy_His").$sur); 
			copy($_FILES["doc_file"]["tmp_name"],"docfile/".$newfilename); 
			$file_img = "docfile/".$newfilename;

			$strSQL = "INSERT INTO document (doc_id, doc_date, dep_id, tdoc_id, doc_name, doc_file) VALUES (NULL, NOW(), '".$_POST["dep_id"]."', '".$_POST["tdoc_id"]."', '".$_POST["doc_name"]."', '$file_img')";  							
			$objQuery = mysqli_query($conn,$strSQL);	
			if (!$objQuery) {
				die('Invalid query: ' . mysql_error());
			}
		}
?>
    	<script>
			alert("บันทึกข้อมูลเรียบร้อย");
			window.location.href = "view_doc.php?dep_id=<?=$_POST["dep_id"];?>";
        </script>
