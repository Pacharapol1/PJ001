<?
		session_start();
		header('Content-Type: text/html; charset=UTF-8');
		include "connectDb.php"; 
		$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
		mysqli_set_charset($conn, "utf8");
		error_reporting(~E_NOTICE);
		
		$sql="Select * from club Where club_name='".$_POST[club_name]."' and club_id != '$_POST[club_id]' ";
		$rs=mysqli_query($conn,$sql);
		if(mysqli_num_rows($rs)>0){
?>
		<script>
			alert("ชื่อสถานประกอบการ <?=$_POST[club_name];?> มีในระบบแล้ว");
			window.history.back();
        </script>
<?
		}else{
			$strSQL = "update club set club_name = '$_POST[club_name]', club_eng = '$_POST[club_eng]', club_tel = '$_POST[club_tel]', club_office = '$_POST[club_office]', club_tum = '$_POST[club_tum]', club_aum = '$_POST[club_aum]', prov_id = '$_POST[prov_id]', club_zip = '$_POST[club_zip]', club_contact = '$_POST[club_contact]' where club_id = '$_POST[club_id]' ";  							
			$objQuery = mysqli_query($conn,$strSQL);	

?>
    	<script>
			alert("บันทึกข้อมูลเรียบร้อย");
			window.location.href = "list_club.php";
        </script>
<?
		}
?>