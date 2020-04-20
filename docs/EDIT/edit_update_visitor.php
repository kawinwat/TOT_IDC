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
	require_once("connectdb.php");
	
	$Txtcode = $_POST["Txtcode"];
	$vis_name = $_POST["vis_name"];
	$vis_lname = $_POST["vis_lname"];
	$ID_card = $_POST["ID_card"];
	$phone = $_POST["phone"];
	$emails = $_POST["emails"];
	$today= date('Y-m-d');
	//echo $Txtcode, $vis_name, $vis_lname, $ID_card, $phone, $emails;

	$sql = "UPDATE visitor 
			SET `vis_name` = '$vis_name' , 
				`vis_lname` 	= '$vis_lname' ,
                `ID_card` 	= '$ID_card' ,
                `phone` 	= '$phone' ,
                `email` 	= '$emails' ,
				`vis_editor` 	= '$ac_name' ,
				`vis_date_edit` 	= '$today'     
			where `vis_id`='$Txtcode'";

	 //echo"<br>   sql-->$sql";
	//-->ส่งคำสั่งไปให้ dbms run sql
	$result = mysqli_query($con, $sql);
	?>

	<meta http-equiv="refresh" content="0;http://127.0.0.1/TOT/docs/visitor.php">
</body>

</html>