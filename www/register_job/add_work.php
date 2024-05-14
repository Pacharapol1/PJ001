<?
		session_start();
		header('Content-Type: text/html; charset=UTF-8');
		include "admin/connectDb.php"; 
		$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
		mysqli_set_charset($conn, "utf8");
		error_reporting(~E_NOTICE);
		
		$sql="Select * from club_work Where work_name='".$_POST["work_name"]."' and club_id='".$_POST["club_id"]."' and work_status = '0' ";
		$rs=mysqli_query($conn,$sql);
		if(mysqli_num_rows($rs)>0){
?>
		<script>
			alert("ตำแหน่งซ้ำกับข้อมูลในระบบกรุณาตรวจสอบ");
			window.history.back();
        </script>
<?
		}else{ 
			$strSQL = "INSERT INTO club_work (work_id, club_id, saka_id, work_name, work_num, work_detail, work_date) VALUES (NULL, '".$_POST["club_id"]."', '".$_POST["saka_id"]."', '".$_POST["work_name"]."', '".$_POST["work_num"]."', '".$_POST["work_detail"]."', NOW())";  							
			$objQuery = mysqli_query($conn,$strSQL);	
			if (!$objQuery) {
				die('Invalid query: ' . mysql_error());
			}
		}
?>
    	<script>
			alert("บันทึกข้อมูลเรียบร้อย");
			window.location.href = "list_club_work.php";
        </script>
