<?
		session_start();
		header('Content-Type: text/html; charset=UTF-8');
		include "connectDb.php"; 
		$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
		mysqli_set_charset($conn, "utf8");
		error_reporting(~E_NOTICE);

			
		$strSQL_up = "update calendar set calendar_status = 'P', calendar_answer = 'W' where calendar_id = '$_POST[calendar_id]' ";  							
		$objQuery_up = mysqli_query($conn,$strSQL_up);
		
		$sur = strrchr($_FILES['applicant_files']['name'], ".");
		$newfilename = (Date("dmy_His").$sur); 
		copy($_FILES["applicant_files"]["tmp_name"],"portfolio_files/".$newfilename); 
		$file_img = "portfolio_files/".$newfilename;
	
		$strSQL = "INSERT INTO portfolio (portfolio_id, calendar_id, portfolio_files, portfolio_detail, portfolio_date) VALUES (NULL, '".$_POST["calendar_id"]."', '".$file_img."', '".$_POST["portfolio_detail"]."', NOW())";  							
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
			window.location.href = "list_portfolio.php";
        </script>
