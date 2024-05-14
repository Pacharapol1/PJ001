<?
		session_start();
		header('Content-Type: text/html; charset=UTF-8');
		include "connectDb.php"; 
		$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
	mysqli_set_charset($conn, "utf8");
	error_reporting(~E_NOTICE);
		
		$sql="Select * from provinces Where prov_name='".$_POST[prov_name]."' and prov_status != 'C' ";
		$rs=mysqli_query($conn,$sql);
		if(mysqli_num_rows($rs)>0){
?>
		<script>
			alert("จังหวัด <?=$_POST[prov_name];?> มีในระบบแล้ว");
			window.history.back();
        </script>
<?
		}else{ 
		
			$strSQL = "INSERT INTO provinces (prov_id, prov_name) VALUES (NULL, '".$_POST["prov_name"]."')";  							
			$objQuery = mysqli_query($conn,$strSQL);	

?>
    	<script>
			alert("บันทึกข้อมูลเรียบร้อย");
			window.location.href = "list_prov.php";
        </script>
<?	} ?>