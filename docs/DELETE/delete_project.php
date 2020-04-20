<?php
$pro_id=$_GET['pro_id'];//รับค่าGET ที่ส่งมาจากไฟล์ show
require_once("connectdb.php");//เรียกใช้ไฟล์การเชื่อมต่อDATABASE SERVERและฐานข้อมูล

		$sqlcheck="SELECT * FROM working WHERE pro_id='$pro_id'";
        $dbquery=mysqli_query($con,$sqlcheck);
		$numrow =mysqli_num_rows($dbquery);
		if($numrow==0){		
			$sql="DELETE FROM `project` WHERE `project`.`pro_id` ='$pro_id'";//คำสั่งลบข้อมูล
				
			$result = mysqli_query($con,$sql);
		}else{
			echo "<script>";
				echo "alert(\" ไม่สามารถลบได้ เพราะมีการใช้งานโครงการนี้อยู่\");"; 
				echo "window.history.back()";
			echo "</script>";
		}
?>
	<meta http-equiv="refresh" content="0;http://127.0.0.1/TOT/docs/project.php" > 