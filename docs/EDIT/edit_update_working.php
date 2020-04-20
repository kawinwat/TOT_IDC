<html>
<head>
	<meta charset="UTF-8">
</head>
<body>
<?php
require_once("connectdb.php");

 $Txtcode = $_POST["Txtcode"]; 
 $pro_id = $_POST["pro_id"];
 $vis_id = $_POST["vis_id"];
 $work_date = $_POST["work_date"];





			$sql = "UPDATE working 
			SET `pro_id` = '$pro_id' , 
				`vis_id` 	= '$vis_id',
                `work_date` = '$work_date'  
			where `work_id`='$Txtcode'";

	 //echo"<br>   sql-->$sql";
	//-->ส่งคำสั่งไปให้ dbms run sql
	$result = mysqli_query($con,$sql);


?>

<meta http-equiv="refresh" content="0;http://127.0.0.1/TOT/docs/working.php" >
</body>
</html>