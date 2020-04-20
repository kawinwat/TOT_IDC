<html>

<head>
	<meta charset="UTF-8">
</head>

<body>
	<?php
	require_once("connectdb.php");
	session_start();
	$ac_id = $_SESSION['ac_id'];
	$ac_name = $_SESSION['ac_name'];
	$level = $_SESSION['level'];
	if ($level != 'admin' && $level != 'user') {
	Header("Location:logout.php");
	}

	$Txtcode = $_POST["Txtcode"];
	$com_name_TH = $_POST["com_name_TH"];
	$com_name_EN = $_POST["com_name_EN"];
	$today= date('Y-m-d');




	$sql = "UPDATE company 
			SET `com_name_TH` = '$com_name_TH' , 
				`com_name_EN` 	= '$com_name_EN' ,
				`com_editor` 	= '$ac_name' ,
				`com_date_edit` 	= '$today' 
			where `com_id`='$Txtcode'";

	// echo"<br>   sql-->$sql";
	//-->ส่งคำสั่งไปให้ dbms run sql
	$result = mysqli_query($con, $sql);


	?>

	<meta http-equiv="refresh" content="0;http://127.0.0.1/TOT/docs/company.php">
</body>

</html>