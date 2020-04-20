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
	require_once("connectdb.php");
	$Txtcode = $_POST["Txtcode"];
	$vis_name = $_POST["vis_name"];
	$vis_lname = $_POST["vis_lname"];
	$textID = $_POST["textID"];
	$Passport = $_POST["Passport"];
	$phone = $_POST["phone"];
	$emails = $_POST["emails"];
	$comid = $_POST["comid"];
	$today= date('Y-m-d');
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
		$sql = " INSERT INTO `visitor`(`vis_id`, `vis_name` , `vis_lname` , `ID_card` , `phone` , `email`, `vis_creator`, `vis_editor`, `vis_date_creat`, `vis_date_edit` )

				VALUES ('$Txtcode','$vis_name','$vis_lname','$textID $Passport','$phone','$emails','$ac_name','$ac_name','$today','$today')";

		//echo "<br>   sql-->$sql";
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
	$count1 = $num + 1;
	//echo $count ;
	$run = sprintf("VW" . "%04d", $count1);
	$vw_id = $run;

	if ($method == '' || $method == 'add') {
		$sql = " INSERT INTO `visitor_work`(`vw_id`, `vis_id` , `com_id`  )

					VALUES ('$vw_id','$Txtcode','$comid')";

		//echo "<br> visitor_work  sql-->$sql";
		//-->ส่งคำสั่งไปให้ dbms run sql
		$result = mysqli_query($con, $sql);
	}
	?>
	<meta http-equiv="refresh" content="0;http://127.0.0.1/TOT/docs/visitor.php">
</body>

</html>