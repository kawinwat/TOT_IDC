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
    <form name="form1" method="post" action="edit_update_working.php">
            
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
     
          $work_id = $_GET["work_id"];
          echo"<input type='hidden' name ='method' value = 'edit'>";


           
          $sql="SELECT * FROM `working` w,visitor_work vw,project p,company c,visitor v WHERE  w.pro_id=p.pro_id AND w.vis_id=v.vis_id AND vw.vis_id=v.vis_id and vw.com_id=c.com_id and w.work_id='$work_id'";
          $dbquery=mysqli_query($con,$sql);
          $numrow =mysqli_num_rows($dbquery);
          //echo"<br>sql-->$sql<br>numrow-->$numrow<BR>";
          $data=mysqli_fetch_array($dbquery);
          $run1=$data['work_id'];
          //echo $run1;
         

    ?>    
      <table  cellpadding="0" cellspacing="0">
              <tr>
                <td><span class="fonts"><font color="#000000">รหัสการทำงาน &nbsp;</td>
                <td><input name="Txtcode" readonly type="text" id="textfield" value="<?php echo $run1 ?>" size="20"> </td>
              </tr>
              <tr>
                <td><span class="fonts"><font color="#000000">โครงการ &nbsp;</td>
                <td><select name="pro_id" class="form-control" required="required" >
                <option value="<?php echo $data['pro_id']; ?>"><?php  echo $data['pro_name'];?></option>
                              <?php
                              $sqlx="SELECT * FROM `project`";
                              $dbquery=mysqli_query($con ,$sqlx);
                              while($rs1 = mysqli_fetch_assoc($dbquery)) {
                                echo $rs1;
                                
                                if($rs['pro_id']!=$rs1['pro_id']){
                                  echo $rs;
                              ?>
                              <option value="<?php echo $rs1['pro_id']; ?>"><?php  echo $rs1['pro_name'];?></option>
                             
                              <?php } } ?>
                          </select></td>
                                       
              
              <tr>
              <tr>
                <td><span class="fonts"><font color="#000000">ชื่อ-นามสกุล ผู้ติดต่อ &nbsp;</td>
                <td><select name="vis_id" class="form-control" required="required" >
                <option value="<?php echo $data['vis_id']; ?>"><?php  echo $data['vis_name']; echo"  "; echo $data['vis_lname'];?></option>
                              <?php
                              $sqlx="SELECT * FROM `visitor`";
                              $dbquery=mysqli_query($con ,$sqlx);
                              while($rs1 = mysqli_fetch_assoc($dbquery)) {
                                echo $rs1;
                                
                                if($rs['vis_id']!=$rs1['vis_id']){
                                  echo $rs;
                              ?>
                              <option value="<?php echo $rs1['vis_id']; ?>"><?php  echo $rs1['vis_name']; echo"  "; echo $rs1['vis_lname'];?></option>
                             
                              <?php } } ?>
                          </select></td>
                                       
              
              <tr>
              <tr>
                <td><span class="fonts"><font color="#000000">บริษัท &nbsp;</td>
                <td><select name="com_id" class="form-control" required="required" >
                <option value="<?php echo $data['com_id']; ?>"><?php  echo $data['com_name_TH']; ?></option>
                              <?php
                              $sqlx="SELECT * FROM `company`";
                              $dbquery=mysqli_query($con ,$sqlx);
                              while($rs1 = mysqli_fetch_assoc($dbquery)) {
                                echo $rs1;
                                
                                if($rs['com_id']!=$rs1['com_id']){
                                  echo $rs;
                              ?>
                              <option value="<?php echo $rs1['com_id']; ?>"><?php  echo $rs['com_name_TH']; ?></option>
                             
                              <?php } } ?>
                          </select></td>
                                       
              
              <tr>
                <td><span class="fonts"><font color="#000000">วันที่ติดต่อ&nbsp;</td>
                <td><input name="work_date" type="date" id="textfield" min="0" value="<?php echo date("Y-m-d");	 ?>" size="15" required autofocus> </td>
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

   

