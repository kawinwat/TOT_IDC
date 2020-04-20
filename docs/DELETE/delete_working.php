<?php
$work_id=$_GET['work_id'];//รับค่าGET ที่ส่งมาจากไฟล์ show
require_once("connectdb.php");//เรียกใช้ไฟล์การเชื่อมต่อDATABASE SERVERและฐานข้อมูล
$sql="DELETE FROM `working` WHERE `working`.`work_id` ='$work_id'";//คำสั่งลบข้อมูล
    
$result = mysqli_query($con,$sql);
?>
	<meta http-equiv="refresh" content="0;http://127.0.0.1/TOT/docs/working.php" > 