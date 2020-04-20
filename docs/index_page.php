<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Bootstrap 4 Admin &amp; Dashboard Template">
	<meta name="author" content="Bootlab">

	<title>TOT-IDC</title>

	<link href="css/modern.css" rel="stylesheet">
	<?php
	session_start();
	$ac_id = $_SESSION['ac_id'];
	$ac_name = $_SESSION['ac_name'];
	$level = $_SESSION['level'];
	if ($level != 'admin' && $level != 'user') {
		Header("Location:logout.php");
	}
	?>
</head>

<body>
	<div class="splash active">
		<div class="splash-icon"></div>
	</div>
	<section class="pt-7 pb-5 landing-bg text-white overflow-hidden">
		<div class="container py-4">
			<div class="row">
				<div class="col-xl-11 mx-auto">
					<div class="row">
						<div class="col-md-12 col-xl-8 text-center mx-auto">
							<div class="d-block my-4">
								<img src="https://noc.totidc.net/images/head2logo.png" alt="TOT IDC Operation Center">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<div class="py-3 bg-white landing-nav">
		<div class="container text-center">
			<a target="_blank" href="company.php" class="btn btn-lg btn-pill btn-link text-dark">ข้อมูลบริษัท</a>
			<a target="_blank" href="visitor.php" class="btn btn-lg btn-pill btn-link text-dark">ข้อมูลผู้มาติดต่อ</a>
			<a target="_blank" href="project.php" class="btn btn-lg btn-pill btn-link text-dark">ข้อมูลโครงการ</a>
			<a target="_blank" href="working.php" class="btn btn-lg btn-pill btn-link text-dark">ข้อมูลการทำงาน</a>
			<a href="logout.php" class="btn btn-lg btn-danger">ออกจากระบบ</a>
			<?php if ($level == 'admin') { ?>
				<a href="signup.php" class="btn btn-lg btn-primary">สมัครสมาชิก</a>
			<?php } ?>
		</div>
	</div>
	<section class="py-5">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-6 mx-auto">
					<div class="d-block my-4">
						<h1>TOT IDC Operation Center</h1>
						<p class="font-black-light">เป็นสถานที่รับฝากข้อมูลและอุปกรณ์สารสนเทศของลูกค้าให้ความปลอดภัยและจัดเตรียมสิ่งอำนวยความสะดวกสำหรับอุปกรณ์และข้อมูลสำคัญของลูกค้าให้สามารถใช้งานได้ตลอดเวลา</p>
						<nav>
							<ul>
								<li>Co-Location</li>
								<li>Web & Email Hosting Servers</li>
								<li>Virtual Private Server</li>
								<li>Storage, Communication Equipment</li>
							</ul>
						</nav>
						<hr>
						<p class="font-black-light ">มาตรฐานระบบ Facilities ของ TOT IDC</p>
						<nav>
							<ul>
								<li>ISO 27001</li>
								<li>TIA-942 : Telecom Infrastructure Standard for Data Center</li>
								<li>UPTIME Institute</li>
							</ul>
						</nav>
						<p class="lead font-weight-light mb-3 landing-text">ข้อมูลเพิ่มเติม</p>
						<p>โทร. 1100 TOT contact center (โทรฟรี 24 ช.ม.) หรือ

							สอบถามด้านบริการ โทร. 0 2575 5905-6

							สอบถามด้านเทคนิค โทร. 0 2575 8554, 0 2575 8510, 0 2575 8525

							ศูนย์บริการลูกค้า ทีโอที ทั่วประเทศ</p>
					</div>
					</a>
				</div>
			</div>
		</div>
	</section>
	<svg width="0" height="0" style="position:absolute">
		<defs>
			<symbol viewBox="0 0 512 512" id="ion-ios-pulse-strong">
				<path d="M448 273.001c-21.27 0-39.296 13.999-45.596 32.999h-38.857l-28.361-85.417a15.999 15.999 0 0 0-15.183-10.956c-.112 0-.224 0-.335.004a15.997 15.997 0 0 0-15.049 11.588l-44.484 155.262-52.353-314.108C206.535 54.893 200.333 48 192 48s-13.693 5.776-15.525 13.135L115.496 306H16v31.999h112c7.348 0 13.75-5.003 15.525-12.134l45.368-182.177 51.324 307.94c1.229 7.377 7.397 11.92 14.864 12.344.308.018.614.028.919.028 7.097 0 13.406-3.701 15.381-10.594l49.744-173.617 15.689 47.252A16.001 16.001 0 0 0 352 337.999h51.108C409.973 355.999 427.477 369 448 369c26.511 0 48-22.492 48-49 0-26.509-21.489-46.999-48-46.999z">
				</path>
			</symbol>
		</defs>
	</svg>
	<script src="js/app.js"></script>
</body>

</html>