<?
		session_start();
		header('Content-Type: text/html; charset=UTF-8');
		include "connectDb.php"; 
		$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
		mysqli_set_charset($conn, "utf8");
		error_reporting(~E_NOTICE);
		
		$sql="Select user_type_name from user_type Where user_type_name='".$_POST[user_type_name]."' and user_type_id != '$_POST[user_type_id]' ";
		$rs=mysqli_query($conn,$sql);
		if(mysqli_num_rows($rs)>0){
?>
		<script>
			alert("ประเภทผู้ใช้งาน <?=$_POST[user_type_name];?> มีในระบบแล้ว");
			window.history.back();
        </script>
<?
		}else{
			$strSQL = "update user_type set user_type_name = '$_POST[user_type_name]' where user_type_id = '$_POST[user_type_id]' ";  							
			$objQuery = mysqli_query($conn,$strSQL);	

?>
    	<script>
			alert("บันทึกข้อมูลเรียบร้อย");
			window.location.href = "list_usertype.php";
        </script>
<?
		}
?>