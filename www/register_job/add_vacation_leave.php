<?
		session_start();
		header('Content-Type: text/html; charset=UTF-8');
		include "admin/connectDb.php"; 
		$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
		mysqli_set_charset($conn, "utf8");
		error_reporting(~E_NOTICE);
		
			$sql="Select id_Vacation from department Where id_Vacation='".$_POST[id_Vacation]."'";
		$rs=mysqli_query($conn,$sql);
		if(mysqli_num_rows($rs)>0){
?>
		<script>
			alert("หน่วยงาน <?=$_POST[id_Vacation];?> มีในระบบแล้ว");
			window.history.back();
        </script>
<?
		}else{ 
		
		$strSQL = "INSERT INTO vacation_leave (id_Vacation, date_Vacation, subject_Vacation, to_Vacation, cumulative_Vacation, total_Vacation, address_Vacation, la_today, la_ago) VALUES (NULL, NOW(), '".$_POST["id_Vacation"]."', '".$_POST["date_Vacation"]."', '".$_POST["subject_Vacation"]."',  '".$_POST["to_Vacation"]."', '".$_POST["cumulative_Vacation"]."', '".$_POST["total_Vacation"]."', '".$_POST["address_Vacation"]."', '".$_POST["la_today"]."', '".$_POST["la_ago"]."')";  							
		$objQuery = mysqli_query($conn,$strSQL);	
			
?>
    	<script>
			alert("ส่งข้อมูลการลาเรียบร้อยแล้ว");
			window.location.href = "list_la.php";
        </script>
<?	} ?>