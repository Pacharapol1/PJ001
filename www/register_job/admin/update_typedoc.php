<?
		session_start();
		header('Content-Type: text/html; charset=UTF-8');
		include "connectDb.php"; 
		$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
		mysqli_set_charset($conn, "utf8");
		error_reporting(~E_NOTICE);
		
		$sql="Select tdoc_name from type_doc Where tdoc_name='".$_POST[tdoc_name]."' and tdoc_id != '$_POST[tdoc_id]' ";
		$rs=mysqli_query($conn,$sql);
		if(mysqli_num_rows($rs)>0){
?>
		<script>
			alert("ประเภทเอกสาร <?=$_POST[tdoc_name];?> มีในระบบแล้ว");
			window.history.back();
        </script>
<?
		}else{
			$strSQL = "update type_doc set tdoc_name = '$_POST[tdoc_name]' where tdoc_id = '$_POST[tdoc_id]' ";  							
			$objQuery = mysqli_query($conn,$strSQL);	

?>
    	<script>
			alert("บันทึกข้อมูลเรียบร้อย");
			window.location.href = "list_typedoc.php";
        </script>
<?
		}
?>