<?
		session_start();
		header('Content-Type: text/html; charset=UTF-8');
		include "connectDb.php"; 
		$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
		mysqli_set_charset($conn, "utf8");
		error_reporting(~E_NOTICE);
		
		$strSQL_mem = "SELECT * FROM employee where emp_id = '".$_POST[emp_id]."'";
		$stmt_mem  = mysqli_query($conn,$strSQL_mem);
		$row_mem = mysqli_fetch_array($stmt_mem);
		if($_POST[password_old] != $row_mem[password]){
?>
		<script>
			alert("คุณกรอกรหัสเดิมไม่ถูกต้อง กรุณากรอกรหัสเดิมอีกครั้ง");
			window.history.back();
        </script>

<?
		}else if($_POST[password_new] != $_POST[password_con]){
?>
		<script>
			alert("คุณยืนยันรหัสใหม่ไม่ตรงกัน กรุณายืนยันอีกครั้ง");
			window.history.back();
        </script>

<?
		}else{
			$strSQL = "update employee set password = '".$_POST["password_new"]."' where emp_id = '".$_POST["emp_id"]."' ";  							
			$objQuery = mysqli_query($conn,$strSQL);	
		
		session_start();
		session_destroy();
?>
		<script>
			alert("บันทึกข้อมูลเรียบร้อย กรุณาเข้าสู่ระบบ");
			window.location.href = "list_emp.php";
        </script>
<?		} ?>