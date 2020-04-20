<?php
//this is upload page
include('connectdb.php');

$username = $_POST["username"];
$name = $_POST["name"];
$password = $_POST["password"];
$confirm_password = $_POST["confirm_password"];
$level = $_POST["level"];
//echo $Password;
//echo $confirm_password;
//Confirm password
$sql1 = " SELECT * FROM `account` WHERE username='$username'";
$record = mysqli_query($con, $sql1);
$data = mysqli_fetch_assoc($record);
//echo $data;
if ($data['username'] == $username) {
    echo "username: ซ้ำ กรุณากรอกใหม่";
    echo "<script>";
    echo "alert(\"username 'ซ้ำ' กรุณากรอกใหม่\");";
    echo "window.history.back()";
    echo "</script>";
}else {
    if ($password == $confirm_password) {
        $sql = "INSERT INTO account(username,ac_name,password,level)
            VALUES('$username','$name','$password','$level')";
        echo $sql;
        $result = mysqli_query($con, $sql) or die("Error in query: $sql " . mysqli_error());
        mysqli_close($con);
        header("Location:index_page.php");
    } else {
        echo "<script>";
        echo "alert(\"password ไม่ตรงกัน\");";
        echo "window.history.back()";
        echo "</script>";
    }
}

    



?>
<!-- <button><a href="index.php">index</a></button> -->