<?
		session_start();
		header('Content-Type: text/html; charset=UTF-8');
		include "admin/connectDb.php"; 
		$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
		mysqli_set_charset($conn, "utf8");
		error_reporting(~E_NOTICE);
		
		$strSQL = "update report set re_add = '".$_POST[re_add]."', re_tam = '".$_POST[re_tam]."', re_aum = '".$_POST[re_aum]."', prov_id = '".$_POST[prov_id]."', re_zip = '".$_POST[re_zip]."', re_mobile = '".$_POST[re_mobile]."' where re_id = '".$_POST[re_id]."' ";  							
		$objQuery = mysqli_query($conn,$strSQL);
?>
    	<script>
			alert("บันทึกข้อมูลเรียบร้อย");
			window.location.href = "form_report.php?mem_id=<?=$_POST[mem_id];?>&re_id=<?=$_POST[rew_id];?>";
        </script>
