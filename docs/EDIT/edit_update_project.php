<html>

<head>
	<meta charset="UTF-8">
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
	$today= date('Y-m-d');
	require_once("connectdb.php");

	$pro_id = $_POST["pro_id"];
	$pd_id = $_POST["pd_id"];
	$pro_name = $_POST["pro_name"];
	$date_start = $_POST["date_start"];
	$date_end = $_POST["date_end"];
	$mp_name = $_POST["mp_name"];
	$mp_lname = $_POST["mp_lname"];
	$mp_phone = $_POST["mp_phone"];
	$st_id = $_POST["st_id"];
	$cs_id = $_POST["cs_id"];
	$ct_id = $_POST["ct_id"];
	$sp_id = $_POST["sp_id"];
	$rack_no = $_POST["rack_no"];
	$rack_unit = $_POST["rack_unit"];
	$IP = $_POST["IP"];
	$location = $_POST["location"];
	$pd_note = $_POST["pd_note"];




	$sql = "UPDATE project 
			SET `pro_name` = '$pro_name' , 
				`date_start` 	= '$date_start' ,
                `date_end` 	= '$date_end'         
			where `pro_id`='$pro_id'";

	 //echo"<br>   sql-->$sql";
	//-->ส่งคำสั่งไปให้ dbms run sql
	$result = mysqli_query($con, $sql);

	$sql1 = "UPDATE project_detail
	SET `pro_id` = '$pro_id' , 
		`st_id` 	= '$st_id' ,
		`cs_id` 	= '$cs_id' ,
		`ct_id` = '$ct_id' , 
		`sp_id` 	= '$sp_id' ,
		`ip` 	= '$IP' ,
		`location` = '$location' , 
		`rack_no` 	= '$rack_no' ,
		`rack_unit` 	= '$rack_unit' ,
		`pd_note` 	= '$pd_note'  ,
		`mp_name` 	= '$mp_name' ,
		`mp_lname` = '$mp_lname' , 
		`mp_phone` 	= '$mp_phone',
		`pro_editor` 	= '$ac_name' ,
		`pro_date_editor` 	= '$today'        
	where `pd_id`='$pd_id'";
 
	 //echo"<br>   sql-->$sql1";
	//-->ส่งคำสั่งไปให้ dbms run sql
	$result = mysqli_query($con, $sql1);
	?>

	<meta http-equiv="refresh" content="0;http://127.0.0.1/TOT/docs/project.php">
</body>

</html>