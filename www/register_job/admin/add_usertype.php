<?
		session_start();
		header('Content-Type: text/html; charset=UTF-8');
		include "connectDb.php"; 
		$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
	mysqli_set_charset($conn, "utf8");
	error_reporting(~E_NOTICE);
		
		$sql="Select user_type_name from user_type Where user_type_name='".$_POST[user_type_name]."' and user_type_status != 'C' ";
		$rs=mysqli_query($conn,$sql);
		if(mysqli_num_rows($rs)>0){
?>
		<script>
			alert("ประเภทผู้ใช้งาน <?=$_POST[user_type_name];?> มีในระบบแล้ว");
			window.history.back();
        </script>
<?
		}else{ 
		
			$strSQL = "INSERT INTO user_type (user_type_id, user_type_name) VALUES (NULL, '".$_POST["user_type_name"]."')";  							
			$objQuery = mysqli_query($conn,$strSQL);	
?>
    	<script>
			alert("บันทึกข้อมูลเรียบร้อย");
			window.location.href = "list_usertype.php";
        </script>
<?	} ?>