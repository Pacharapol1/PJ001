<?
		session_start();
		header('Content-Type: text/html; charset=UTF-8');
		include "connectDb.php"; 
		$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
		mysqli_set_charset($conn, "utf8");
		error_reporting(~E_NOTICE);
		
		$sql="Select portfolio_name from portfolio Where portfolio_name='".$_POST[portfolio_name]."' ";
		$rs=mysqli_query($conn,$sql);
		if(mysqli_num_rows($rs)>0){
?>
		<script>
			alert("ข่าวประชาสัมพันธ์ <?=$_POST[portfolio_name];?> มีในระบบแล้ว");
			window.history.back();
        </script>
<?
		}else{ 
			
		
			$strSQL = "INSERT INTO portfolio (portfolio_id, year_term, year_id, portfolio_name, portfolio_detail, portfolio_date) VALUES (NULL, '".$_POST["year_term"]."', '".$_POST["year_id"]."', '".$_POST["portfolio_name"]."', '".$_POST["portfolio_detail"]."', NOW())";  							
			$objQuery = mysqli_query($conn,$strSQL);	
	
			
			
			$strSQL_pro = "SELECT max(portfolio_id) as max_pro FROM portfolio ";
			$stmt  = mysqli_query($conn,$strSQL_pro);
			$row = mysqli_fetch_array($stmt);
			
			for($p=1;$p<=$_POST[rows];$p++){					
				$sur = strrchr($_FILES['portfolio_pic'.$p]['name'], ".");
				$newfilename = $p.(date("dmy_His").$sur); 
				copy($_FILES["portfolio_pic".$p]["tmp_name"], "portfolio/".$newfilename); 
				$file_img = $newfilename;
				
				$pic = "INSERT INTO portfolio_pic (proid, portfolio_id, portfolio_pic) values(NULL, '".$row[max_pro]."','".$file_img."')";
				$sql_pic = mysqli_query($conn,$pic);
			}
?>
    	<script>
			alert("บันทึกข้อมูลเรียบร้อย");
			window.location.href = "list_act.php";
        </script>
<?
		}
?>