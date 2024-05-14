<?php
	ini_set('display_errors', 1);
	error_reporting(~0);

   $serverName = "localhost";
   $userName = "root";
   $userPassword = "root";
   $dbName = "register_job";
  
	$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
	mysqli_set_charset($conn, "utf8");
	if (mysqli_connect_errno())
	{
		echo "Database Connect Failed : " . mysqli_connect_error();
	}
	date_default_timezone_set("Asia/Bangkok");
	set_time_limit(300);
	ini_set('max_execution_time', 300);
	mysqli_close($conn);
?>