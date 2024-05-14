<?
		session_start();
		header('Content-Type: text/html; charset=UTF-8');
		include "admin/connectDb.php"; 
		$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
		mysqli_set_charset($conn, "utf8");
		error_reporting(~E_NOTICE); 
		
		$strSQL = "INSERT INTO report (re_id, mem_id, re_add, re_tam, re_aum, prov_id, re_zip, re_mobile, re_date) VALUES (NULL, '".$_POST["mem_id"]."', '".$_POST["re_add"]."', '".$_POST["re_tam"]."', '".$_POST["re_aum"]."', '".$_POST["prov_id"]."', '".$_POST["re_zip"]."', '".$_POST["re_mobile"]."', NOW())";  
		$objQuery = mysqli_query($conn, $strSQL);	
		
		$strSQL_up = "update register_work set report_id = 'Y' where re_id = '$_POST[re_id]' ";  							
		mysqli_query($conn,$strSQL_up);
		
		
		
?>
		<script>
			alert("บันทึกข้อมูลเรียบร้อย");
			window.location.href = "form_report.php?mem_id=<?=$_POST[mem_id];?>&re_id=<?=$_POST[re_id];?>";
        </script>
