<?
		session_start();
		header('Content-Type: text/html; charset=UTF-8');
		include "connectDb.php"; 
		$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
		mysqli_set_charset($conn, "utf8");
		error_reporting(~E_NOTICE);
		
		$strSQL_up = "update portfolio set year_term = '".$_POST[year_term]."', year_id = '".$_POST[year_id]."', portfolio_name = '".$_POST[portfolio_name]."',portfolio_detail = '".$_POST[portfolio_detail]."' where portfolio_id = '$_POST[portfolio_id]' ";  							
		mysqli_query($conn,$strSQL_up);	
			
		$pic_del = "DELETE FROM portfolio_pic where portfolio_id= '".$_POST[portfolio_id]."' ";
		$sql_del = mysqli_query($conn,$pic_del);
		
		for($p=1;$p<=$_POST[numtb];$p++){	
		
			if($_FILES["portfolio_pic".$p]["name"] != "")
			{		
				@unlink("portfolio/".$_POST["hdnOldFile".$p]);
			
				$sur = strrchr($_FILES['portfolio_pic'.$p]['name'], ".");
				$newfilename = (Date("dmy_His".$p).$sur); 
				copy($_FILES["portfolio_pic".$p]["tmp_name"],"portfolio/".$newfilename); 
				$file_img = $newfilename;
			}else{
				$file_img = $_POST["hdnOldFile".$p];
			}

			$pic = "INSERT INTO portfolio_pic (proid, portfolio_id, portfolio_pic) values(NULL, '".$_POST[portfolio_id]."','".$file_img."')";
			$sql_pic = mysqli_query($conn,$pic);
		}
?>
    	<script>
			alert("บันทึกข้อมูลเรียบร้อย");
			window.location.href = "list_act.php";
        </script>
