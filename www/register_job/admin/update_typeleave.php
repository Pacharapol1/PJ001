<?
		session_start();
		header('Content-Type: text/html; charset=UTF-8');
		include "connectDb.php"; 
		$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
		mysqli_set_charset($conn, "utf8");
		error_reporting(~E_NOTICE);
		
		$sql="Select tleave_name from type_leave Where tleave_name='".$_POST[tleave_name]."' and tleave_id != '$_POST[tleave_id]' ";
		$rs=mysqli_query($conn,$sql);
		if(mysqli_num_rows($rs)>0){
?>
		<script>
			alert("ประเภทการลา <?=$_POST[tleave_name];?> มีในระบบแล้ว");
			window.history.back();
        </script>
<?
		}else{
			$strSQL = "update type_leave set tleave_name = '$_POST[tleave_name]' where tleave_id = '$_POST[tleave_id]' ";  							
			$objQuery = mysqli_query($conn,$strSQL);	

?>
    	<script>
			alert("บันทึกข้อมูลเรียบร้อย");
			window.location.href = "list_typeleave.php";
        </script>
<?
		}
?>