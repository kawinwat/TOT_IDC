<!DOCTYPE html>
<html>

<head>
	<title>UPDATE</title>
	<meta charset="utf-8">
</head>

<body>
	<?php
	session_start();
	$ac_id = $_SESSION['ac_id'];
	$ac_name = $_SESSION['ac_name'];
	$level = $_SESSION['level'];
	if ($level != 'admin' && $level != 'user') {
		Header("Location:logout.php");
	}
	$today = date('Y-m-d');

	//project
	require_once("connectdb.php");
	$pro_id = $_POST["proid"];
	$pro_name = $_POST["pro_name"];
	$date_start = $_POST["date_start"];
	$date_end = $_POST["date_end"];
	$Txtcode1 = $_POST["Txtcode1"];

	$st_id = $_POST["st_id"];
	$cs_id = $_POST["cs_id"];
	$ct_id = $_POST["ct_id"];
	$sp_id = $_POST["sp_id"];
	$ip = $_POST["ip"];
	$location = $_POST["location"];
	$rack_no = $_POST["rack_no"];
	$rack_unit = $_POST["rack_unit"];
	$pd_note = $_POST["pd_note"];
	$mp_name = $_POST["mp_name"];
	$mp_lname = $_POST["mp_lname"];
	$mp_phone = $_POST["mp_phone"];

	//---->สร้างคำสั่ง add
	if (isset($_POST["method"])) {
		$method = $_POST["method"];
	} elseif (isset($_GET["method"])) {
		$method = $_GET["method"];
	} else {
		$method = '';
	}

	if ($method == '' || $method == 'add') {
		$sql = " INSERT INTO `project`(`pro_id`, `pro_name` , `date_start`,`date_end`   )

				VALUES ('$pro_id','$pro_name','$date_start','$date_end')";

		$sql1 = " INSERT INTO `project_detail`(`pd_id`, `pro_id`, `st_id`,`cs_id`,`ct_id`,`sp_id` , `ip`,`location`,`rack_no`,`rack_unit`,`pd_note`,`mp_name`,`mp_lname`,`mp_phone`, `pro_creator`, `pro_editor`, `pro_date_creator`, `pro_date_editor`    )

				VALUES ('$Txtcode1','$pro_id','$st_id','$cs_id','$ct_id','$sp_id','$ip','$location','$rack_no','$rack_unit','$pd_note','$mp_name','$mp_lname','$mp_phone','$ac_name','$ac_name','$today','$today')";



		//echo "<br> Project  sql-->$sql";
		//echo "<br> Project detail  sql-->$sql1";
		//-->ส่งคำสั่งไปให้ dbms run sql
		$result = mysqli_query($con, $sql);
		$result = mysqli_query($con, $sql1);
	}

	//company

	$comid = $_POST["comid"];
	$com_name_TH = $_POST["com_name_TH"];
	$com_name_EN = $_POST["com_name_EN"];
	//---->สร้างคำสั่ง add
	if (isset($_POST["method"])) {
		$method = $_POST["method"];
	} elseif (isset($_GET["method"])) {
		$method = $_GET["method"];
	} else {
		$method = '';
	}

	if ($method == '' || $method == 'add') {
		$sql = " INSERT INTO `company`(`com_id`, `com_name_TH` , `com_name_EN`, `com_creator` , `com_editor`, `com_date_creat`, `com_date_edit`  )

					VALUES ('$comid','$com_name_TH','$com_name_EN','$ac_name','$ac_name','$today','$today')";

		//echo "<br>  company  sql-->$sql";
		//-->ส่งคำสั่งไปให้ dbms run sql
		$result = mysqli_query($con, $sql);
	}

	//visitor
	$visid = $_POST["visid"];
	$vis_name = $_POST["vis_name"];
	$vis_lname = $_POST["vis_lname"];
	$textID = $_POST["textID"];
	$Passport = $_POST["Passport"];
	$phone = $_POST["phone"];
	$emails = $_POST["emails"];
	$com_id = $_POST["comid"];
	//echo $textID;
	//echo $Passport;
	//---->สร้างคำสั่ง add
	if (isset($_POST["method"])) {
		$method = $_POST["method"];
	} elseif (isset($_GET["method"])) {
		$method = $_GET["method"];
	} else {
		$method = '';
	}
	if ($method == '' || $method == 'add') {
		$sql = " INSERT INTO `visitor`(`vis_id`, `vis_name` , `vis_lname` , `ID_card` , `phone` , `email`, `vis_creator`, `vis_editor`, `vis_date_creat`, `vis_date_edit`   )

				VALUES ('$visid','$vis_name','$vis_lname','$textID $Passport','$phone','$emails','$ac_name','$ac_name','$today','$today')";

		//echo "<br>  visitor sql-->$sql";
		//-->ส่งคำสั่งไปให้ dbms run sql
		$result = mysqli_query($con, $sql);
	}
	//visit_work
	$SQLfindnextcode = "Select * FROM visitor_work order by vw_id DESC limit 1";
	$dbrunquery = mysqli_query($con, $SQLfindnextcode);
	$result = mysqli_fetch_array($dbrunquery);
	$numid = $result['vw_id'];
	//echo $numid ;
	$num = substr($numid, 5);
	//echo $num;
	$count = $num + 1;
	//echo $count ;
	$run = sprintf("VW" . "%04d", $count);
	$vw_id = $run;

	if ($method == '' || $method == 'add') {
		$sql = " INSERT INTO `visitor_work`(`vw_id`, `vis_id` , `com_id`  )

					VALUES ('$vw_id','$visid','$comid')";

		//echo "<br> visitor_work  sql-->$sql";
		//-->ส่งคำสั่งไปให้ dbms run sql
		$result = mysqli_query($con, $sql);
	}
	//working
	$workid = $_POST["workid"];
	$pro_id = $_POST["proid"];
	$vis_id = $_POST["visid"];
	$work_date = $_POST["work_date"];
	//---->สร้างคำสั่ง add
	if (isset($_POST["method"])) {
		$method = $_POST["method"];
	} elseif (isset($_GET["method"])) {
		$method = $_GET["method"];
	} else {
		$method = '';
	}

	if ($method == '' || $method == 'add') {
		$sql = " INSERT INTO `working`(`work_id`, `pro_id` , `vis_id`,work_date  )

				VALUES ('$workid','$pro_id','$vis_id','$work_date')";

		//echo "<br> working  sql-->$sql";
		//-->ส่งคำสั่งไปให้ dbms run sql
		$result = mysqli_query($con, $sql);
	}

	?>


	<meta http-equiv="refresh" content="0;http://127.0.0.1/TOT/docs/working.php">
</body>

</html>