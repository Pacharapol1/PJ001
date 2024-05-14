<?
		session_start();
		header('Content-Type: text/html; charset=UTF-8');
		include "connectDb.php"; 
		$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
		mysqli_set_charset($conn, "utf8");
		error_reporting(~E_NOTICE);
		

$sql="Select article_name from article Where article_name='".$_POST[article_name]."' and article_id != '$_POST[article_id]'  ";
		$rs=mysqli_query($conn,$sql);
		if(mysqli_num_rows($rs)>0){
?>
		<script>
			alert("บทความวิชาการ <?=$_POST[article_name];?> มีในระบบแล้ว");
			window.history.back();
        </script>
<?
		}else{ 



		if($_FILES["applicant_files"]["name"] != "")
		{
			//*** Delete Old File ***//			
			@unlink("article/".$_POST["hdnOldFile"]);
			
			$sur = strrchr($_FILES['applicant_files']['name'], ".");
			$newfilename = (Date("dmy_His").$sur); 
			copy($_FILES["applicant_files"]["tmp_name"],"article/".$newfilename); 
			$file_img = "article/".$newfilename;
			
			//*** Update New File ***//
			$strSQL = "UPDATE article ";
			$strSQL .=" SET pic = '".$file_img."' WHERE article_id = '".$_POST['article_id']."' ";
			$objQuery = mysqli_query($conn,$strSQL);		
		}
		
		$strSQL = "update article set article_name = '$_POST[article_name]', article_detail = '$_POST[article_detail]' where article_id = '$_POST[article_id]' ";  							
		$objQuery = mysqli_query($conn,$strSQL);	

?>
    	<script>
			alert("บันทึกข้อมูลเรียบร้อย");
			window.location.href = "list_article.php";
        </script>
<?
}
?>