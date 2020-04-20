<?php
$vw_id=$_GET['vw_id'];
//รับค่าGET ที่ส่งมาจากไฟล์ show
require_once("connectdb.php");//เรียกใช้ไฟล์การเชื่อมต่อDATABASE SERVERและฐานข้อมูล
$sql="DELETE FROM `visitor_work` WHERE `visitor_work`.`vw_id` ='$vw_id'";//คำสั่งลบข้อมูล
    
$result = mysqli_query($con,$sql);
?>
	<meta http-equiv="refresh" content="0;http://127.0.0.1/TOT/docs/visitor.php" > 