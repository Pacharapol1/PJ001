<?
		session_start();
		header('Content-Type: text/html; charset=UTF-8');
		include "connectDb.php"; 
		$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
	mysqli_set_charset($conn, "utf8");
	error_reporting(~E_NOTICE);

		$strSQL = "update employee set title_id = '$_POST[title_id]', emp_name = '$_POST[emp_name]', emp_surname = '$_POST[emp_surname]', emp_sex = '$_POST[emp_sex]', emp_num = '$_POST[emp_num]', emp_tum = '$_POST[emp_tum]', emp_aum = '$_POST[emp_aum]', prov_id = '$_POST[prov_id]', emp_zip = '$_POST[emp_zip]', saka_id = '$_POST[saka_id]', po_id = '$_POST[po_id]', emp_mobile = '$_POST[emp_mobile]', dep_id = '$_POST[dep_id]' where emp_id = '$_POST[emp_id]' ";  							
		$objQuery = mysqli_query($conn,$strSQL);	
?>
    	<script>
			alert("บันทึกข้อมูลเรียบร้อย");
			window.location.href = "list_emp.php";
        </script>
