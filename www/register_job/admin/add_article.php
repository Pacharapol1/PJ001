<?
		session_start();
		header('Content-Type: text/html; charset=UTF-8');
		include "connectDb.php"; 
		$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
		mysqli_set_charset($conn, "utf8");
		error_reporting(~E_NOTICE);
	
	
		$sql="Select article_name from article Where article_name='".$_POST[article_name]."' ";
		$rs=mysqli_query($conn,$sql);
		if(mysqli_num_rows($rs)>0){
?>
		<script>
			alert("บทความวิชาการ <?=$_POST[article_name];?> มีในระบบแล้ว");
			window.history.back();
        </script>
<?
		}else{ 
			
		$sur = strrchr($_FILES['applicant_files']['name'], ".");
		$newfilename = (Date("dmy_His").$sur); 
		copy($_FILES["applicant_files"]["tmp_name"],"article/".$newfilename); 
		$file_img = "article/".$newfilename;

		$strSQL = "INSERT INTO article (article_id, article_name, article_detail, article_date, pic) VALUES (NULL, '".$_POST["article_name"]."', '".$_POST["article_detail"]."', NOW(), '$file_img')";  							
		$objQuery = mysqli_query($conn,$strSQL);	

?>
    	<script>
			alert("บันทึกข้อมูลเรียบร้อย");
			window.location.href = "list_article.php";
        </script>
<?	} ?>