<?
		session_start();
		header('Content-Type: text/html; charset=UTF-8');
		include "admin/connectDb.php"; 
		$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
		mysqli_set_charset($conn, "utf8");
		error_reporting(~E_NOTICE);
		
		function DateTimeDiff($strDateTime1,$strDateTime2){//datetime formate Y-m-d H:i	
		$date = 0;
		$hour = 0;
		$min = 0;
		$day1=0;
		$escape=0;
			$diff = strtotime($strDateTime2) - strtotime($strDateTime1);
			$date  = floor($diff/(60*60*24));
			$hour = floor(($diff-($date*60*60*24))/(60*60));
			$min = floor(($diff-($date*60*60*24)-($hour*60*60))/60);	

			$day1 =date('N',strtotime($strDateTime1));  // php5.1.0 ขึ้นไป ถ้าไม่ใช่ไปอัพเดท  :>
			$escape =(int)($date/7)*2;  
			$mod=$date%7;
			if($mod !=0){

				if($day1 ==6 ) $escape++;
				if($day1==7)$escape++;
				if($day1 ==6 && $mod>1)$escape++;
				//if($mod ==6) $escape++;  แก้เอาออก มันซ้ำ
				if($day1+$mod>5 && $day1<6)$escape++;
				if($day1+$mod>6 && $day1<6)$escape++;

		


			}
			 return $date-$escape;
	}		

		$DateStart = date('d', strtotime($_POST["leave_date"])); //วันเริ่มต้น
		$MonthStart = date('m', strtotime($_POST["leave_date"])); //เดือนเริ่มต้น
		$YearStart = date('Y', strtotime($_POST["leave_date"])); //ปีเริ่มต้น
		
		$DateEnd = date('d', strtotime($_POST["leave_enddate"])); //วันสิ้นสุด
		$MonthEnd = date('m', strtotime($_POST["leave_enddate"])); //เดือนสิ้นสุด
		$YearEnd = date('Y', strtotime($_POST["leave_enddate"])); //ปีสิ้นสุด
		
		$End = mktime(0,0,0,$MonthEnd,$DateEnd,$YearEnd);
		$Start = mktime(0,0,0,$MonthStart ,$DateStart ,$YearStart);
		
		$total_date = ceil(($End-$Start)/86400); // 28
		
		//echo $total_date+1;
			
		$date1 = $leave_date;
		$date2 = $leave_enddate;
		$diff = DateTimeDiff($date1,$date2);
		$showdiff = $diff+1;
		//echo $showdiff;
		
		if($_FILES['applicant_files']['name'] != ''){
			$sur = strrchr($_FILES['applicant_files']['name'], ".");

			if($sur != ".pdf")
			{ ?>
			<script>
				alert("กรุณาอัพโหลดไฟล์เป็น pdf ด้วยค่ะ!");
				window.location.href = "form_la.php?subject=<?php echo $_POST["subject_leave"];?>&detail_leave=<? echo $_POST["detail_leave"];?>";
        	</script>
			<?php }
			else{
				
				if($_POST[leave_enddate] < $_POST["leave_date"]){
?>
					<script>
                        alert("วันที่สิ้นสุดน้อยกว่าวันที่เริ่มต้น กรุณาเลือกวันที่อีกครั้ง");
                        window.history.back();
                    </script>
<?
				}else{
					$newfilename = (Date("dmy_His").$sur); 
					copy($_FILES["applicant_files"]["tmp_name"],"file/".$newfilename); 
					$file_img = "file/".$newfilename;
	
	
					$strSQL = "INSERT INTO leavela (id, date_la, emp_id,subject_leave, leave_date, leave_enddate, total_day, type_leave, detail_leave, file_pdf) VALUES (NULL, NOW(), '".$_POST["emp_id"]."', '".$_POST["subject_leave"]."', '".$_POST["leave_date"]."', '".$_POST["leave_enddate"]."', '".$showdiff."', '".$_POST["type_la"]."', '".$_POST["detail_leave"]."', '".$file_img."')";  							
					$objQuery = mysqli_query($conn,$strSQL);

		?>
		<script>
			alert("ส่งข้อมูลการลาเรียบร้อยแล้ว");
			window.location.href = "list_la.php";
        </script>
		<?php 
				}
			}

		}
		
			
?>
    	
