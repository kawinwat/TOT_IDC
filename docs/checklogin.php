<?php 
session_start();
        if(isset($_POST['username'])){
                  include("connectdb.php");
                  $username = $_POST['username'];
                  $password = $_POST['password'];

                  $sql="SELECT * FROM account 
                  WHERE  username='".$username."' 
                  AND  password='".$password."' ";
                  $result = mysqli_query($con,$sql);
                  echo $sql;
				
                  if(mysqli_num_rows($result)==1){
                      $row = mysqli_fetch_array($result);

                      $_SESSION["ac_id"] = $row["ac_id"];
                      $_SESSION["ac_name"] = $row["ac_name"];
                      $_SESSION["level"] = $row["level"];
                      if($_SESSION["level"]=="admin"||$_SESSION["level"]=="user"){ 
                        Header("Location: index_page.php");
                      }
                  }else{
                    echo "<script>";
                        echo "alert(\" user หรือ  password ไม่ถูกต้อง\");"; 
                        echo "window.history.back()";
                    echo "</script>";
 
                  }
        }else{

             Header("Location: index.php"); //user & password incorrect back to login again
 
        }
?>