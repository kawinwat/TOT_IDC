<!DOCTYPE html>
<html>
<head>
  <title>EDIT</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Responsive Bootstrap 4 Admin &amp; Dashboard Template">
  <meta name="author" content="Bootlab">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>
    <?php

      require_once("connectdb.php");
      //ซ่อนเออเร่อเปิด
      ini_set('display_errors', 0);
    ?>
      <center>
      <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tbody>
           <tr>
             <br><font color="#0066CC" size="10">Edit</font></br> 
          </tr>
      </tbody></table>
      <br>
      </br>
    <form name="form1" method="post" action="edit_update_company.php">
            
    <?php
    //  รับค่าตัวแปรจากกดปุ่ม แก้ไขTxtPOS_ID=0&method
    // Input from POST

      $method = $_POST["method"];
      if(!$method){
        $method = $_GET["method"];
      
      }
      if ($dates=="") {
       $dates = date('Y-m-d');$_SESSION['date_start'] = $dates;
      }
    //echo"<br>method-->$method<br> Txtcus_id-->$Txtcus_id<br>";
     
          $com_id = $_GET["com_id"];
          echo"<input type='hidden' name ='method' value = 'edit'>";



          $sql="SELECT * FROM company  WHERE  com_id='$com_id'";
          $dbquery=mysqli_query($con,$sql);
          $numrow =mysqli_num_rows($dbquery);
          //echo"<br>sql-->$sql<br>numrow-->$numrow<BR>";
          $rs=mysqli_fetch_array($dbquery);
          $run1=$rs['com_id'];
          //echo $run1;
      
    ?>    
      <table  cellpadding="0" cellspacing="0">
              <tr>
                <td><span class="fonts"><font color="#000000">รหัสบริษัท &nbsp;</td>
                <td><input name="Txtcode" readonly type="text" id="textfield" value="<?php echo $run1 ?>" size="4"> </td>
              </tr>

              <tr>
                <td><span class="fonts"><font color="#000000">ชื่อบริษัท(ภาษาไทย)&nbsp;</td>
                <td><input name="com_name_TH" type="text" id="textfield" value="<?php echo $rs['com_name_TH']; ?>" size="15"> </td>
              </tr>

               <tr>
                <td><span class="fonts"><font color="#000000">ชื่อบริษัท(ภาษาอังกฤษ) &nbsp;</td>
                <td><input name="com_name_EN" type="text" id="textfield" min="0" value="<?php echo $rs['com_name_EN']; ?>" size="15"> </td>
              </tr>

              <td colspan="3" align="center"> </br>
                  <input id="btnOrange" type="submit" name="Submit" value="Save">
                  <input id="btnOrange" type="button" name="Reset" value="Cancel" onclick=window.history.back() value=back>
                </td>
            </table>
          </form>
    </center>
</body>
</html>

   

