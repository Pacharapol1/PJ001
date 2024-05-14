<?
		session_start();
		header('Content-Type: text/html; charset=UTF-8');
		include "admin/connectDb.php"; 
		$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
		mysqli_set_charset($conn, "utf8");
		error_reporting(~E_NOTICE);
		
		if($_FILES['office_pic']['name'] != ''){
			$sur = strrchr($_FILES['office_pic']['name'], ".");
			$newfilename = (Date("dmy_His").$sur); 
			copy($_FILES['office_pic']["tmp_name"],"office_pic/".$newfilename); 
			$file_img = "office_pic/".$newfilename;
	
			$strSQL = "UPDATE emp_office SET office_pic = '".$file_img."' WHERE office_id = '".$_POST['office_id']."' ";
			$objQuery = mysqli_query($conn,$strSQL);	
		}
		
		$strSQL = "UPDATE emp_office SET title_id = '".$_POST[title_id]."', office_name = '".$_POST[office_name]."', office_last = '".$_POST[office_last]."', office_tel = '".$_POST[office_tel]."', office_line = '".$_POST[office_line]."', office_fb = '".$_POST[office_fb]."', office_po = '".$_POST[office_po]."' WHERE office_id = '".$_POST['office_id']."' ";
		$objQuery = mysqli_query($conn,$strSQL);
		
			
?>
    	<script>
			alert("แก้ไขเรียบร้อย");
			window.location.href = "list_member_emp.php";
        </script>
