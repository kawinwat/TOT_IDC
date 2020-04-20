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
		 }$today= date('Y-m-d');

		require_once("connectdb.php");
		$Txtcode = $_POST["Txtcode"];
		$com_name_TH = $_POST["com_name_TH"];
		$com_name_EN = $_POST["com_name_EN"];
		

//---->สร้างคำสั่ง add
		if(isset($_POST["method"])){
			$method = $_POST["method"];
		}
		elseif(isset($_GET["method"]))
		{
			$method = $_GET["method"];
		}
		else
		{
			$method = '';
		}

		if($method =='' || $method == 'add'){	
		$sql = " INSERT INTO `company`(`com_id`, `com_name_TH` , `com_name_EN`, `com_creator` , `com_editor`, `com_date_creat`, `com_date_edit` )

				VALUES ('$Txtcode','$com_name_TH','$com_name_EN','$ac_name','$ac_name','$today','$today')";

		  //echo"<br>   sql-->$sql";
			//-->ส่งคำสั่งไปให้ dbms run sql
			$result = mysqli_query($con,$sql);
		}
			?>
		<meta http-equiv="refresh" content="0;http://127.0.0.1/TOT/docs/company.php" > 
</body>
</html>