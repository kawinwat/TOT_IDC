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
        $vis_id = $_POST["vis_id"];
        $work_date = $_POST["work_date"];
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
		$sql = " INSERT INTO `working`(`work_id`, `pro_id` , `vis_id`,work_date  )

				VALUES ('$Txtcode','$pro_id','$vis_id','$work_date')";

		 // echo"<br>   sql-->$sql";
			//-->ส่งคำสั่งไปให้ dbms run sql
			$result = mysqli_query($con,$sql);
		}
			?>
		<meta http-equiv="refresh" content="0;http://127.0.0.1/TOT/docs/working.php" >
</body>
</html>