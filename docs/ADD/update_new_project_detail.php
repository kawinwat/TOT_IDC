<!DOCTYPE html>
<html>
<head>
	<title>UPDATE</title>
	<meta charset="utf-8">
</head>
<body>
	<?php
		require_once("connectdb.php");
		$Txtcode = $_POST["Txtcode"];
		$pro_id = $_POST["pro_id"];
        $mp_id = $_POST["mp_id"];
        $st_id = $_POST["st_id"];
		$cs_id = $_POST["cs_id"];
        $ct_id = $_POST["ct_id"];
        $sp_id = $_POST["sp_id"];
        $ip = $_POST["ip"];
		$location = $_POST["location"];
        $rack_no = $_POST["rack_no"];
        $pd_note = $_POST["pd_note"];
		
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
		$sql = " INSERT INTO `project_detail`(`pd_id`, `pro_id`, `mp_id` , `st_id`,`cs_id`,`ct_id`,`sp_id` , `ip`,`location`,`rack_no`,`pd_note`   )

				VALUES ('$Txtcode','$pro_id','$mp_id','$st_id','$cs_id','$ct_id','$sp_id','$ip','$location','$rack_no','$pd_note')";

		    //echo"<br>   sql-->$sql";
			//-->ส่งคำสั่งไปให้ dbms run sql
			$result = mysqli_query($con,$sql);
		}
			?>
		<meta http-equiv="refresh" content="0;http://127.0.0.1/TOT/docs/ADD/add_working.php" > 
</body>
</html>