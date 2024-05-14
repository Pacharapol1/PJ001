<?
		session_start();
		header('Content-Type: text/html; charset=UTF-8');
		include "connectDb.php"; 
		$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
		mysqli_set_charset($conn, "utf8");
		error_reporting(~E_NOTICE);
		
		$sql="Select dep_name from department Where dep_name='".$_POST[dep_name]."' and dep_id != '$_POST[dep_id]' ";
		$rs=mysqli_query($conn,$sql);
		if(mysqli_num_rows($rs)>0){
?>
		<script>
			alert("ชื่อคณะ <?=$_POST[dep_name];?> มีในระบบแล้ว");
			window.history.back();
        </script>
<?
		}else{
			$strSQL = "update department set dep_name = '$_POST[dep_name]' where dep_id = '$_POST[dep_id]' ";  							
			$objQuery = mysqli_query($conn,$strSQL);	

?>
    	<script>
			alert("บันทึกข้อมูลเรียบร้อย");
			window.location.href = "list_dep.php";
        </script>
<?
		}
?>