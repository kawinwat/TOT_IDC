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
	$today= date('Y-m-d');
		require_once("connectdb.php");
		$pro_id= $_POST["Txtcode"];
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
		$mp_phone= $_POST["mp_phone"];

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
		$sql = " INSERT INTO `project`(`pro_id`, `pro_name` , `date_start`,`date_end`   )

				VALUES ('$pro_id','$pro_name','$date_start','$date_end')";
		
		$sql1 = " INSERT INTO `project_detail`(`pd_id`, `pro_id`, `st_id`,`cs_id`,`ct_id`,`sp_id` , `ip`,`location`,`rack_no`,`rack_unit`,`pd_note`,`mp_name`,`mp_lname`,`mp_phone`, `pro_creator`, `pro_editor`, `pro_date_creator`, `pro_date_editor`)

				VALUES ('$Txtcode1','$pro_id','$st_id','$cs_id','$ct_id','$sp_id','$ip','$location','$rack_no','$rack_unit','$pd_note','$mp_name','$mp_lname','$mp_phone','$ac_name','$ac_name','$today','$today')";



		  //echo"<br>   sql-->$sql";
		  //echo"<br>   sql-->$sql1";
			//-->ส่งคำสั่งไปให้ dbms run sql
			$result = mysqli_query($con,$sql);
			$result = mysqli_query($con,$sql1);
		}
			?>
		<meta http-equiv="refresh" content="0;http://127.0.0.1/TOT/docs/project.php">
</body>
</html>