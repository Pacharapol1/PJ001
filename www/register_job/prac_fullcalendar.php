<?
	session_start();
	include "admin/connectDb.php"; 
	$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
	mysqli_set_charset($conn, "utf8");
	error_reporting(~E_NOTICE);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ปฏิทินกิจกรรม</title>
<link rel='stylesheet' type='text/css' href='fullcalendar/redmond/theme.css' />
<link rel='stylesheet' type='text/css' href='fullcalendar/fullcalendar.css' />
<link href="css/font-awesome.css" rel="stylesheet"> 
<script type='text/javascript' src='fullcalendar/jquery/jquery.js'></script>
<script type='text/javascript' src='fullcalendar/jquery/jquery-ui-custom.js'></script>
<script type="text/javascript" src="fullcalendar/fullcalendar.min.js"></script>
<script type="text/javascript">
$(function(){
    $('#calendar').fullCalendar({
        header: {
                left: 'month,agendaWeek,agendaDay',
                center: 'title',
                right: 'prev,next today'
              	
        },
        /*editable: true,*/
        theme:true,
        events: "getCalendar.php?gData=1",
		lang: "th",
        loading: function(bool) {
                if (bool) $('#loading').show();
                else $('#loading').hide();
        }
        // put your options and callbacks here
    });
     
});
</script>
</head>
 
<body>
<br />
<br />
 
<div id='calendar'></div>
 
 
</body>
</html>