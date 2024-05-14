<div id="left">
<ul id="menu" class="collapse">
<? if($_SESSION["status"] == '1'){ ?>
	<li class="panel ">
        <a href="../index.php" >
            <i class="icon icon-home"></i> หน้าเว็บ
        </a>                   
    </li>
    <li class="panel">
        <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#detail">
            <i class="icon-th-list"></i> ข้อมูลพื้นฐาน

            <span class="pull-right">
                <i class="icon-angle-left"></i>
            </span>
        </a>
        <ul class="collapse" id="detail">
           
            <li><a href="list_titlename.php"><i class="icon-angle-right"></i> ข้อมูลคำนำหน้าชื่อ</a></li>
            <li><a href="list_year.php"><i class="icon-angle-right"></i> ข้อมูลปีการศึกษา</a></li>
            <li><a href="list_dep.php"><i class="icon-angle-right"></i> ข้อมูลคณะ</a></li>
            <li><a href="list_saka.php"><i class="icon-angle-right"></i> ข้อมูลสาขาวิชา</a></li>
            <li><a href="list_po.php"><i class="icon-angle-right"></i> ข้อมูลตำแหน่งงาน</a></li>
        </ul>
    </li>
    
    <li class="panel ">
        <a href="list_club.php" >
            <i class="icon-building"></i> ข้อมูลสถานประกอบการ
        </a>                   
    </li>
    
    <li class="panel ">
        <a href="list_emp.php" >
            <i class="icon-user"></i> ข้อมูลคณาจารย์
        </a>                   
    </li>
    
    <li class="panel ">
        <a href="list_member.php" >
            <i class="icon-group"></i> ข้อมูลนักศึกษา
        </a>                   
    </li>
    <li class="panel ">
        <a href="list_aj.php" >
            <i class="icon-check"></i> กำหนดอาจารที่ปรึกษา
        </a>                   
    </li>
    <li class="panel ">
        <a href="list_interview.php" >
            <i class="icon-volume-up"></i> ประกาศการสัมภาษณ์
        </a>                   
    </li>
    
    
    <li class="panel ">
        <a href="../logout.php" >
            <i class="icon-signout"></i> ออกจากระบบ
        </a>                   
    </li>
<? }else{ ?>
<li class="panel ">
        <a href="../index.php" >
            <i class="icon icon-home"></i> หน้าเว็บ
        </a>                   
    </li>
    <li class="panel ">
        <a href="view_profile.php" >
            <i class="icon-user"></i> ข้อมูลส่่วนตัว
        </a>                   
    </li>
    <li class="panel ">
        <a href="list_register.php" >
            <i class="icon-ok"></i> ข้อมูลการสมัครสหกิจศึกษา
        </a>                   
    </li>
    <li class="panel ">
        <a href="list_calendar.php" >
            <i class="icon-calendar"></i> การนัดนิเทศงานและประเมิน
        </a>                   
    </li>
    <li class="panel ">
        <a href="list_about.php" >
            <i class="icon-edit"></i> ประเมินการนำเสนอผลงาน
        </a>                   
    </li>
    <li class="panel ">
        <a href="list_book.php" >
            <i class="icon-bookmark"></i> ประเมินรูปเล่มสมบูรณ์
        </a>                   
    </li>
    
    <li class="panel">
        <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#report">
            <i class="icon-list"></i> ออกรายงาน

            <span class="pull-right">
                <i class="icon-angle-left"></i>
            </span>
        </a>
        <ul class="collapse" id="report">
        	<li><a href="report_student.php"><i class="icon-angle-right"></i> รายงานนักศึกษาสหกิจศึกษา</a></li>
            <li><a href="report_member.php"><i class="icon-angle-right"></i> รายงานการคัดเลือกนักศึกษา</a></li>
            <li><a href="report_work_report.php"><i class="icon-angle-right"></i> รายงานบันทึกรายงานประจำวัน</a></li>
            <li><a href="report_calendar.php"><i class="icon-angle-right"></i> รายงานบันทึกการนิเทศงาน</a></li>
            <!--<li><a href="report_count.php"><i class="icon-angle-right"></i> รายงานสรุปผลการประเมินผล</a></li>-->
        </ul>
    </li>
    
    <li class="panel ">
        <a href="../logout.php" >
            <i class="icon-signout"></i> ออกจากระบบ
        </a>                   
    </li>
<? } ?>    
</ul>

</div>