<?
		session_start();
		header('Content-Type: text/html; charset=UTF-8');
		include "admin/connectDb.php"; 
		$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
		mysqli_set_charset($conn, "utf8");
		error_reporting(~E_NOTICE); 
		
		$sql="Select * from member Where mem_email='".$_POST["mem_email"]."' and mem_status != 'C' ";
		$rs=mysqli_query($conn, $sql);
		if(mysqli_num_rows($rs)>0){
?>
		<script>
			alert("Username นี้มีผู้ใช้งานแล้ว กรุณากรอกข้อมูลใหม่");
			window.history.back();
        </script>
<?
		}else{ 
			
			$sur = strrchr($_FILES['mem_pic']['name'], ".");
			$newfilename = (Date("dmy_His").$sur); 
			copy($_FILES["mem_pic"]["tmp_name"],"profile/".$newfilename); 
			$file_img = "profile/".$newfilename;

			$strSQL = "INSERT INTO member (mem_id, mem_pic, mem_code, mem_sex, title_id, mem_name, mem_last, mem_add, mem_tam, mem_aum, prov_id, mem_zip, mem_mobile, club_id, dep_id, saka_id, username, password, mem_date, mem_status) VALUES (NULL, '".$file_img."', '".$_POST["mem_code"]."', '".$_POST["mem_sex"]."', '".$_POST["title_id"]."', '".$_POST["mem_name"]."', '".$_POST["mem_last"]."', '".$_POST["mem_add"]."', '".$_POST["mem_tam"]."', '".$_POST["mem_aum"]."', '".$_POST["prov_id"]."', '".$_POST["mem_zip"]."', '".$_POST["mem_mobile"]."', '".$_POST["club_id"]."', '".$_POST["dep_id"]."', '".$_POST["saka_id"]."', '".$_POST["username"]."', '".$_POST["password"]."', NOW(), 'W')";  							
			$objQuery = mysqli_query($conn, $strSQL);	
			if (!$objQuery) {
				die('Invalid query: ' . mysql_error());
			}
		
		
?>
		<script>
			alert("บันทึกข้อมูลเรียบร้อย กรุณาเข้าสู่ระบบ");
			window.location.href = "login.php";
        </script>
<?		} ?>