<?php
$com_id=$_GET['com_id'];//รับค่าGET ที่ส่งมาจากไฟล์ show
require_once("connectdb.php");//เรียกใช้ไฟล์การเชื่อมต่อDATABASE SERVERและฐานข้อมูล
$sqlcheck="SELECT * FROM visitor_work WHERE com_id='$com_id'";
        $dbquery=mysqli_query($con,$sqlcheck);
		$numrow =mysqli_num_rows($dbquery);
		if($numrow==0){		
			$sql="DELETE FROM `company` WHERE `company`.`com_id` ='$com_id'";//คำสั่งลบข้อมูล
    
			$result = mysqli_query($con,$sql);
			}else{
				echo "<script>";
					echo "alert(\" ไม่สามารถลบได้ เพราะมีการใช้งานอยู่\");"; 
					echo "window.history.back()";
				echo "</script>";
			}

?>
	<meta http-equiv="refresh" content="0;http://127.0.0.1/TOT/docs/company.php" > 