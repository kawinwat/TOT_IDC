<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Bootstrap 4 Admin &amp; Dashboard Template">
	<meta name="author" content="Bootlab">

	<title>TOT IDC</title>

	<!-- PICK ONE OF THE STYLES BELOW -->
	<!-- <link href="css/modern.css" rel="stylesheet"> -->
	<!-- <link href="css/classic.css" rel="stylesheet"> -->
	<!-- <link href="css/dark.css" rel="stylesheet"> -->
	<!-- <link href="css/light.css" rel="stylesheet"> -->

	<!-- BEGIN SETTINGS -->
	<!-- You can remove this after picking a style -->
	<style>
		body {
			opacity: 0;
		}
	</style>
	<script src="js/settings.js"></script>
	<!-- END SETTINGS -->
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
	<div class="wrapper">
		<nav id="sidebar" class="sidebar">
			<a class="sidebar-brand" href="index_page.php">
				<img src="https://noc.totidc.net/images/head2logo.png" alt="TOT IDC Operation Center">
			</a>
			<div class="sidebar-content">
				<div class="sidebar-user">
					<h3>STAFF LOGIN</h3>
					<div class="font-weight-bold"><?php echo"Hi.". $ac_name; ?></div>
					<div>
						<a href="logout.php" class="btn btn-lg btn-danger"> ออกจากระบบ</a>
					</div>
					
				</div>
				<ul class="sidebar-nav">
					<li class="sidebar-header">
						working
					</li>
					<li class="sidebar-item">
						<a href="#dashboards" data-toggle="collapse" class="sidebar-link collapsed">
							<i class="align-middle mr-2 fas fa-fw fa-home"></i> <span class="align-middle">การทำงาน</span>
						</a>
						<ul id="dashboards" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="http://127.0.0.1/TOT/docs/working.php">ข้อมูลการทำงาน</a></li>
						</ul>
					</li>
					<li class="sidebar-item">
					<li class="sidebar-header">
						Data
					</li>
					<a href="#pages" data-toggle="collapse" class="sidebar-link collapsed">
						<i class="align-middle mr-2 fas fa-fw fa-file"></i> <span class="align-middle">ข้อมูล</span>
					</a>
					<ul id="pages" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
						<li class="sidebar-item"><a class="sidebar-link" href="http://127.0.0.1/TOT/docs/project.php">ข้อมูลโครงการ</a></li>
						<li class="sidebar-item"><a class="sidebar-link" href="http://127.0.0.1/TOT/docs/company.php">ข้อมูลบริษัท </a></li>
						<li class="sidebar-item"><a class="sidebar-link" href="http://127.0.0.1/TOT/docs/visitor.php">ข้อมูลผู้ติดต่อ</a></li>
					</ul>
					</li>
				</ul>
			</div>
		</nav>
		<div class="main">
			<nav class="navbar navbar-expand navbar-theme">
				<a class="sidebar-toggle d-flex mr-2">
					<i class="hamburger align-self-center"></i>
				</a>
				<div class="navbar-collapse collapse">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item dropdown active">

							
							<?php if ($level == 'admin') { ?>
								<a href="signup.php" class="btn btn-lg btn-primary">สมัครสมาชิก</a>
							<?php } ?>
						</li>
					</ul>
				</div>
			</nav>
			<div class="container-fluid">
				<div class="header">
				</div>
				<div class="row">
					<div class="col-12 col-xl-12">
					</div>
				</div>
			</div>