<?
		@session_start();
		header('Content-Type: text/html; charset=UTF-8');
		include "connectDb.php"; 
		$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
		mysqli_set_charset($conn, "utf8");
		error_reporting(~E_NOTICE);
		
		$sql="Select * from saka Where saka_name='".$_POST[saka_name]."' and dep_id='".$_POST[dep_id]."' ";
		$rs=mysqli_query($conn,$sql);
		if(mysqli_num_rows($rs)>0){
?>
		<script>
			alert("สาขา <?=$_POST[saka_name];?> มีในระบบแล้ว");
			window.history.back();
        </script>
<?
		}else{ 
		
			$strSQL = "INSERT INTO saka (saka_id, dep_id, saka_name) VALUES (NULL, '".$_POST["dep_id"]."', '".$_POST["saka_name"]."')";  							
			$objQuery = mysqli_query($conn,$strSQL);	
?>
    	<script>
			alert("บันทึกข้อมูลเรียบร้อย");
			window.location.href = "list_saka.php";
        </script>
<?	} ?>