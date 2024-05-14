<div class="agileits_top_menu">
		<div class="w3l_header_left">
				<ul>
					<li><i class="fa fa-phone" aria-hidden="true"></i> 02 000 0000</li>
					<li><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="mailto:info@example.com">info@example.com</a></li>
				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
		<div class="content white agile-info">
			<nav class="navbar navbar-default" role="navigation">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
						<a class="navbar-brand" href="index.html">
							<h2>สำนักงานคณบดี<label>คณะบริหารธุรกิจและอุตสาหกรรมบริการ</label></h2>
						</a>
					</div>
					<!--/.navbar-header-->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<nav class="link-effect-2" id="link-effect-2">
							<ul class="nav navbar-nav">
								<li><a href="index.php" class="effect-3"><i class="fa fa-home fa-2x"></i></a></li>
								<li><a href="news.php" class="effect-3">ข่าวประชาสัมพันธ์</a></li>
                                <li class="dropdown">
									<a href="#" class="dropdown-toggle effect-3" data-toggle="dropdown">ดาวน์โหลดเอกสาร <b class="caret"></b></a>
									<ul class="dropdown-menu">
                                    	<?
										  $strSQL = "SELECT * FROM department where dep_status != 'C' ";
										  $stmt  = mysqli_query($conn,$strSQL);
										  while($row = mysqli_fetch_array($stmt)){
										?>
											<li><a href="list_doc.php?dep_id=<?=$row[dep_id];?>">หน่วยงาน<?=$row[dep_name];?></a></li>
                                        <? } ?>
									</ul>
								</li>
								<li><a href="gallery.html" class="effect-3">ภาพกิจกรรม</a></li>
								
								<li><a href="contact.html" class="effect-3">กระทู้ถามตอบ</a></li>
							</ul>
						</nav>
					</div>
					<!--/.navbar-collapse-->
					<!--/.navbar-->
				</div>
			</nav>
		</div>
	</div>