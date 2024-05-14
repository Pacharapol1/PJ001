<?
		session_start();
		header('Content-Type: text/html; charset=UTF-8');
		include "connectDb.php"; 
		$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
	mysqli_set_charset($conn, "utf8");
	error_reporting(~E_NOTICE);
		
		$sql="Select po_name from position Where po_name='".$_POST[po_name]."' and po_status != 'C' ";
		$rs=mysqli_query($conn,$sql);
		if(mysqli_num_rows($rs)>0){
?>
		<script>
			alert("ตำแหน่ง <?=$_POST[po_name];?> มีในระบบแล้ว");
			window.history.back();
        </script>
<?
		}else{ 
		
			$strSQL = "INSERT INTO position (po_id, po_name) VALUES (NULL, '".$_POST["po_name"]."')";  							
			$objQuery = mysqli_query($conn,$strSQL);	

?>
    	<script>
			alert("บันทึกข้อมูลเรียบร้อย");
			window.location.href = "list_po.php";
        </script>
<?	} ?>