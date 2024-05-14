<?
		session_start();
		header('Content-Type: text/html; charset=UTF-8');
		include "connectDb.php"; 
		$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
		mysqli_set_charset($conn, "utf8");
		error_reporting(~E_NOTICE);
		
		$strSQL = "update member set emp_id1 = '".$_POST[emp_id1]."', emp_id2 = '".$_POST[emp_id2]."', year_id = '".$_POST[year_id]."' where mem_id = '$_POST[mem_id]' ";  							
		$objQuery = mysqli_query($conn,$strSQL);

?>
    	<script>
			alert("บันทึกข้อมูลเรียบร้อย");
			window.location.href = "list_aj.php";
        </script>
