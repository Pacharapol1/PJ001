<nav class="navbar navbar-default" role="navigation">
	<div class="container">
	    <div class="navbar-header">
	        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
	        </button>
	         <a class="navbar-brand" href="index.php">ระบบการจัดการงานสหกิจศึกษา</a>
	    </div>
	    <!--/.navbar-header-->
	    <div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1" style="height: 1px;">
	        <ul class="nav navbar-nav">
                <li class="dropdown">
		            <a href="index.php"><span>รายชื่อสถานประกอบการ</span></a>
		        </li>
                <? if($_SESSION["full_name"] == ''){ ?>
                <li class="dropdown">
		        	<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span><i class="fa fa-user"></i> เข้าสู่ระบบ</span></a>
		        	   <ul class="dropdown-menu">
		            		<li><a href="login.php"><span>สำหรับนักศึกษา</span></a></li>
                            <li><a href="admin/index.php"><span>สำหรับเจ้าหน้าที่</span></a></li>
                            <li><a href="admin/index.php"><span>สำหรับคณาจารย์</span></a></li>
                            <li><a href="login_office.php"><span>สำหรับผู้ประกอบการ</span></a></li>
                       </ul>
		        </li>
                <? }else{ ?>
                	<? if($_SESSION["status"] == '1'){ ?>
                    	<li class="dropdown">
                            <a href="admin/list_club.php"><span><i class="fa fa-user"></i> <?=$_SESSION["full_name"];?></span></a>
                        </li>
                    <? }else if($_SESSION["status"] == '2'){ ?>
                    	<li class="dropdown">
                            <a href="admin/list_calendar.php"><span><i class="fa fa-user"></i> <?=$_SESSION["full_name"];?></span></a>
                        </li>
                    <? }else{ ?>
                    	<? if($_SESSION["regis_status"] == 'office'){ ?>
                            <li class="dropdown">
                                <a href="profile_office.php"><span><i class="fa fa-user"></i> <?=$_SESSION["full_name"];?></span></a>
                            </li>
                         <? }if($_SESSION["regis_status"] == 'student'){ ?>
                            <li class="dropdown">
                                <a href="profile.php"><span><i class="fa fa-user"></i> <?=$_SESSION["full_name"];?></span></a>
                            </li>
                         <? } ?>
                    <? } ?>
                <li class="dropdown">
		            <a href="logout.php"><span><i class="fa fa-sign-out"></i> ออกจากระบบ</span></a>
		        </li>
                <? } ?>
		     </ul>
	    </div>
	    <div class="clearfix"> </div>
	  </div>
	    <!--/.navbar-collapse-->
</nav>

