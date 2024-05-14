<?
		session_start();
		header('Content-Type: text/html; charset=UTF-8');
		include "connectDb.php"; 
		$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
		mysqli_set_charset($conn, "utf8");
		error_reporting(~E_NOTICE);
		
		$sql="Select year_name from tb_year Where year_name='".$_POST["year_name"]."'";
		$rs=mysqli_query($conn,$sql);
		if(mysqli_num_rows($rs)>0){
?>
		<script>
			alert("ปีการศึกษา <?=$_POST[year];?> มีในระบบแล้ว");
			window.history.back();
        </script>
<?
		}else{
			
			if($_POST["year_end"] < $_POST["year_start"]){
?>
				<script>
                    alert("วันที่สิ้นสุดน้อยกว่าวันที่เริ่มปีการศึกษา กรุณาเลือกวันใหม่");
                    window.history.back();
                </script>
<?
			}else{
			
				$strSQL = "INSERT INTO tb_year (year_id, year_term, year_start, year_end, year_name) VALUES (NULL, '".$_POST["year_term"]."', '".$_POST["year_start"]."', '".$_POST["year_end"]."', '".$_POST["year_name"]."')";  	  							
				$objQuery = mysqli_query($conn,$strSQL);	
?>
    	<script>
			alert("บันทึกข้อมูลเรียบร้อย");
			window.location.href = "list_year.php";
        </script>
<?
			}
		}
?>