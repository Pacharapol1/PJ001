<?
		@session_start();
		header('Content-Type: text/html; charset=UTF-8');
		include "connectDb.php"; 
		$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
		mysqli_set_charset($conn, "utf8");
		error_reporting(~E_NOTICE);
		
		$sql="Select dep_name from department Where dep_name='".$_POST[dep_name]."'";
		$rs=mysqli_query($conn,$sql);
		if(mysqli_num_rows($rs)>0){
?>
		<script>
			alert("คณะ <?=$_POST[dep_name];?> มีในระบบแล้ว");
			window.history.back();
        </script>
<?
		}else{ 
		
			$strSQL = "INSERT INTO department (dep_id, dep_name) VALUES (NULL, '".$_POST["dep_name"]."')";  							
			$objQuery = mysqli_query($conn,$strSQL);	
?>
    	<script>
			alert("บันทึกข้อมูลเรียบร้อย");
			window.location.href = "list_dep.php";
        </script>
<?	} ?>