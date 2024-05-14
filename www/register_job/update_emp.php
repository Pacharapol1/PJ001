<?
		session_start();
		header('Content-Type: text/html; charset=UTF-8');
		include "admin/connectDb.php"; 
		$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
		mysqli_set_charset($conn, "utf8");
		error_reporting(~E_NOTICE);

		$strSQL = "update employee set title_id = '$_POST[title_id]', emp_name = '$_POST[emp_name]', emp_mobile = '$_POST[emp_mobile]', emp_email = '$_POST[emp_email]', po_id = '$_POST[po_id]', dep_id = '$_POST[dep_id]' where emp_id = '$_POST[emp_id]' ";  							
		$objQuery = mysqli_query($conn,$strSQL);	
?>
    	<script>
			alert("บันทึกข้อมูลเรียบร้อย");
			window.location.href = "profile.php";
        </script>
