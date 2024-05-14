<?
		session_start();
		header('Content-Type: text/html; charset=UTF-8');
		include "admin/connectDb.php"; 
		$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
		mysqli_set_charset($conn, "utf8");
		error_reporting(~E_NOTICE); 
		
		$sql="Select * from emp_office Where office_tel='".$_POST["office_tel"]."' and office_status != 'C' ";
		$rs=mysqli_query($conn, $sql);
		if(mysqli_num_rows($rs)>0){
?>
		<script>
			alert("พนักงานชื่อ");
			window.history.back();
        </script>
<?
		}else{ 
			
			$sur = strrchr($_FILES['office_pic']['name'], ".");
			$newfilename = (Date("dmy_His").$sur); 
			copy($_FILES["office_pic"]["tmp_name"],"office_pic/".$newfilename); 
			$file_img = "office_pic/".$newfilename;

			$strSQL = "INSERT INTO emp_office (office_id, club_id, title_id, office_name, office_last, office_tel, office_line, office_fb, office_po, office_pic) VALUES (NULL, '".$_POST["club_id"]."', '".$_POST["title_id"]."', '".$_POST["office_name"]."', '".$_POST["office_last"]."', '".$_POST["office_tel"]."', '".$_POST["office_line"]."', '".$_POST["office_fb"]."', '".$_POST["office_po"]."', '".$file_img."')";  							
			$objQuery = mysqli_query($conn, $strSQL);	
			if (!$objQuery) {
				die('Invalid query: ' . mysql_error());
			}
		
		
?>
		<script>
			alert("บันทึกข้อมูลเรียบร้อย");
			window.location.href = "list_member_emp.php";
        </script>
<?		} ?>