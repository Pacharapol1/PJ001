<?
		session_start();
		header('Content-Type: text/html; charset=UTF-8');
		include "connectDb.php"; 
		$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
		mysqli_set_charset($conn, "utf8");
		error_reporting(~E_NOTICE);

			
		if($_POST["year_end"] < $_POST["year_start"]){
?>
			<script>
				alert("วันที่สิ้นสุดน้อยกว่าวันที่เริ่มปีการศึกษา กรุณาเลือกวันใหม่");
				window.history.back();
			</script>
<?
		}else{
		
			$strSQL = "update tb_year set year_term = '$_POST[year_term]', year_start = '$_POST[year_start]', year_end = '$_POST[year_end]', year_name = '$_POST[year_name]' where year_id = '$_POST[year_id]' ";  							
			$objQuery = mysqli_query($conn,$strSQL);

?>
    	<script>
			alert("บันทึกข้อมูลเรียบร้อย");
			window.location.href = "list_year.php";
        </script>
<?
		}
?>