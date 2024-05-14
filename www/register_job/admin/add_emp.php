<?
		session_start();
		header('Content-Type: text/html; charset=UTF-8');
		include "connectDb.php"; 
		$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
		mysqli_set_charset($conn, "utf8");
		error_reporting(~E_NOTICE);
		
		$sql="Select * from employee Where emp_email='".$_POST[emp_email]."' and emp_status != 'C' ";
		$rs=mysqli_query($conn,$sql);
		if(mysqli_num_rows($rs)>0){
?>
		<script>
			alert("Email: <?=$_POST[emp_email];?> มีในระบบแล้ว");
			window.history.back();
        </script>
<?
		}else{
			
			$strSQL = "INSERT INTO employee (emp_id, title_id, emp_name, emp_surname, emp_sex, emp_num, emp_tum, emp_aum, prov_id, emp_zip, emp_mobile, emp_email, dep_id, saka_id, po_id, username, password, emp_date) VALUES (NULL, '".$_POST["title_id"]."', '".$_POST["emp_name"]."', '".$_POST["emp_surname"]."', '".$_POST["emp_sex"]."', '".$_POST["emp_num"]."', '".$_POST["emp_tum"]."', '".$_POST["emp_aum"]."', '".$_POST["prov_id"]."', '".$_POST["emp_zip"]."', '".$_POST["emp_mobile"]."', '".$_POST["emp_email"]."', '".$_POST["dep_id"]."', '".$_POST["saka_id"]."', '".$_POST["po_id"]."', '".$_POST["username"]."', '".$_POST["password"]."', NOW())";  							
			$objQuery = mysqli_query($conn,$strSQL);	
				
			
?>
				<script>
					alert("บันทึกข้อมูลเรียบร้อย");
					window.location.href = "list_emp.php";
				</script>
<?	
		}
?>