<?php
header('Content-Type: text/html; charset=UTF-8');             
header("Cache-Control: no-store, no-cache, must-revalidate");             
header("Cache-Control: post-check=0, pre-check=0", false);   
session_start();
include "admin/connectDb.php"; 
$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
mysqli_set_charset($conn, "utf8");
error_reporting(~E_NOTICE);

if($_GET['gData']){
    $event_array=array();
    $i_event=0;
    $q="SELECT * FROM calendar WHERE date(calendar_start)>='".date("Y-m-d",$_GET['start'])."'  ";
    $q.=" AND date(calendar_end)<='".date("Y-m-d",$_GET['end'])."' ";
	
    $qr=mysqli_query($conn,$q);
    while($rs=mysqli_fetch_array($qr)){
		
        $event_array[$i_event]['id']=$rs['calendar_id'];
        $event_array[$i_event]['title']=$rs['calendar_name'];
        $event_array[$i_event]['start']=$rs['calendar_start'];
		$event_array[$i_event]['end']=$rs['calendar_end'];
		$event_array[$i_event]['url']="view_calendar.php?calendar_id=".$rs['calendar_id'];
        $i_event++;
    }
    echo json_encode($event_array);
    exit;   
}
?>