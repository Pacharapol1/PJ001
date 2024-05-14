<?
		@session_start();
		header('Content-Type: text/html; charset=UTF-8');
		include "connectDb.php"; 
		$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
		mysqli_set_charset($conn, "utf8");
		error_reporting(~E_NOTICE);
		
		$sql="Select * from club Where club_name='".$_POST[club_name]."'";
		$rs=mysqli_query($conn,$sql);
		if(mysqli_num_rows($rs)>0){
?>
		<script>
			alert("สถานประกอบการ <?=$_POST[club_name];?> มีในระบบแล้ว");
			window.history.back();
        </script>
<?
		}else{ 
		
			$strSQL = "INSERT INTO club (club_id, club_name, club_eng, club_tel, club_office, club_tum, club_aum, prov_id, club_zip, club_contact, club_email, password, club_file) VALUES (NULL, '".$_POST["club_name"]."', '".$_POST["club_eng"]."', '".$_POST["club_tel"]."', '".$_POST["club_office"]."', '".$_POST["club_tum"]."', '".$_POST["club_aum"]."', '".$_POST["prov_id"]."', '".$_POST["club_zip"]."', '".$_POST["club_contact"]."', '".$_POST["club_email"]."', '".$_POST["password"]."', '".$file_img."')";  							
			$objQuery = mysqli_query($conn, $strSQL);		
?>
    	<script>
			alert("บันทึกข้อมูลเรียบร้อย");
			window.location.href = "list_club.php";
        </script>
<?	} ?>