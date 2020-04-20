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
          <br>
          <font color="#0066CC" size="10">Edit</font></br>
        </tr>
      </tbody>
    </table>
    <br>
    </br>
    <form name="form1" method="post" action="edit_update_project.php">

      <?php
      //  รับค่าตัวแปรจากกดปุ่ม แก้ไขTxtPOS_ID=0&method
      // Input from POST

      $method = $_POST["method"];
      if (!$method) {
        $method = $_GET["method"];
      }
      if ($dates == "") {
        $dates = date('Y-m-d');
        $_SESSION['date_start'] = $dates;
      }
      //echo"<br>method-->$method<br> Txtcus_id-->$Txtcus_id<br>";

      $pro_id = $_GET["pro_id"];
      echo "<input type='hidden' name ='method' value = 'edit'>";



      $sql = "SELECT * FROM project p,project_detail pd,service_type st,customer_status cs,customer_type ct,service_plan sp WHERE p.pro_id=pd.pro_id and pd.st_id=st.st_id and pd.cs_id=cs.cs_id and pd.ct_id=ct.ct_id and pd.sp_id=sp.sp_id and pd.pro_id='$pro_id'";
      $dbquery = mysqli_query($con, $sql);
      $numrow = mysqli_num_rows($dbquery);
      //echo"<br>sql-->$sql<br>numrow-->$numrow<BR>";
      $rs = mysqli_fetch_array($dbquery);
      $run1 = $rs['pro_id'];
      $run2 = $rs['pd_id'];
      //echo $run1;

      ?>
      <table cellpadding="0" cellspacing="0">
        <tr>
          <td><span class="fonts">
              <font color="#000000">รหัสโครงการ &nbsp;</td>
          <td><input name="pro_id" readonly type="text" id="textfield" value="<?php echo $run1 ?>" size="20"> </td>
        </tr>
        <tr>
          <td><span class="fonts">
              <font color="#000000">รหัสรายละเอียด &nbsp;</td>
          <td><input name="pd_id" readonly type="text" id="textfield" value="<?php echo $run2 ?>" size="20"> </td>


          <td><span class="fonts">
              <font color="#000000">ชื่อโครงการ&nbsp;</td>
          <td><input name="pro_name" type="text" id="textfield" value="<?php echo $rs['pro_name']; ?>" size="15"> </td>
        </tr>


        <tr>
          <td><span class="fonts">
              <font color="#000000">วันที่เริ่ม &nbsp;</td>
          <td><input name="date_start" type="date" id="textfield" min="0" value="<?php echo $rs['date_start']; ?>" size="15"> </td>

          <td><span class="fonts">
              <font color="#000000">วันที่สิ้นสุด &nbsp;</td>
          <td><input name="date_end" type="date" id="textfield" min="0" value="<?php echo $rs['date_end']; ?>" size="15"> </td>
        </tr>
        <tr>
          <td><span class="fonts">
              <font color="#000000">ชื่อผู้จัดการโครงการ &nbsp;</td>
          <td><input name="mp_name" type="text" id="textfield" min="0" value="<?php echo $rs['mp_name']; ?>" size="15"> </td>

          <td><span class="fonts">
              <font color="#000000">นามสกุลผู้จัดการโครงการ &nbsp;</td>
          <td><input name="mp_lname" type="text" id="textfield" min="0" value="<?php echo $rs['mp_lname']; ?>" size="15"> </td>

        </tr>
        <tr>
          <td><span class="fonts">
              <font color="#000000">เบอร์ติดต่อผู้จัดการโปรเจค &nbsp;</td>
          <td><input name="mp_phone" type="text" id="textfield" min="0" value="<?php echo $rs['mp_phone']; ?>" size="15"> </td>

        </tr>

        <tr>
          <td><span class="fonts">
              <font color="#000000">ประเภทการบริการ &nbsp;</td>
          <td><select name="st_id" class="form-control" id="textfield">
              <option value="<?php echo $rs['st_id']; ?>"><?php echo $rs['st_name']; ?></option>
              <?php
              $sqlx = "SELECT * FROM `service_type`";
              $dbquery = mysqli_query($con, $sqlx);
              while ($rs1 = mysqli_fetch_assoc($dbquery)) {
                if ($rs['st_id'] != $rs1['st_id']) {
              ?>
                  <option value="<?php echo $rs1['st_id']; ?>"><?php echo $rs1['st_name']; ?></option>

              <?php }
              } ?>
            </select></td>

          <td><span class="fonts">
              <font color="#000000"> สถานะลูกค้า &nbsp;</td>
          <td><select name="cs_id" class="form-control" >
              <option value="<?php echo $rs['cs_id']; ?>"><?php echo $rs['cs_name']; ?></option>
              <?php
              $sqlx = "SELECT * FROM `customer_status`";
              $dbquery = mysqli_query($con, $sqlx);
              while ($rs1 = mysqli_fetch_assoc($dbquery)) {
                if ($rs['cs_id'] != $rs1['cs_id']) {
              ?>
                  <option value="<?php echo $rs1['cs_id']; ?>"><?php echo $rs1['cs_name']; ?></option>

              <?php }
              } ?>
            </select></td>
        </tr>
        <tr>
          <td><span class="fonts">
              <font color="#000000">ประเภทลูกค้า &nbsp;</td>
          <td><select name="ct_id" class="form-control" >
              <option value="<?php echo $rs['ct_id']; ?>"><?php echo $rs['ct_name']; ?></option>
              <?php
              $sqlx = "SELECT * FROM `customer_type`";
              $dbquery = mysqli_query($con, $sqlx);
              while ($rs1 = mysqli_fetch_assoc($dbquery)) {
                if ($rs['ct_id'] != $rs1['ct_id']) {
              ?>
                  <option value="<?php echo $rs1['ct_id']; ?>"><?php echo $rs1['ct_name']; ?></option>

              <?php }
              } ?>
            </select></td>

          <td><span class="fonts">
              <font color="#000000">service_plan &nbsp;</td>
          <td><select name="sp_id" class="form-control" >
              <option value="<?php echo $rs['sp_id']; ?>"><?php echo $rs['sp_name']; ?></option>
              <?php
              $sqlx = "SELECT * FROM `service_plan`";
              $dbquery = mysqli_query($con, $sqlx);
              while ($rs1 = mysqli_fetch_assoc($dbquery)) {
                if ($rs['sp_id'] != $rs1['sp_id']) {
              ?>
                  <option value="<?php echo $rs1['sp_id']; ?>"><?php echo $rs1['sp_name']; ?></option>

              <?php }
              } ?>
            </select></td>
        </tr>
        <tr>
          <td><span class="fonts">
              <font color="#000000">IP &nbsp;</td>
          <td><input name="IP" type="text" id="textfield" min="0" value="<?php echo $rs['ip']; ?>" size="15"> </td>
          <td><span class="fonts">
              <font color="#000000">rack_no &nbsp;</td>
          <td><input name="rack_no" type="text" id="textfield" min="0" value="<?php echo $rs['rack_no']; ?>" size="15"> </td>
          <td><span class="fonts">
              <font color="#000000">rack_unit &nbsp;</td>
          <td><input name="rack_unit" type="text" id="textfield" min="0" value="<?php echo $rs['rack_unit']; ?>" size="15"> </td>
        </tr>
        <tr>
          <td><span class="fonts">
              <font color="#000000">สถานที่ &nbsp;</td>
          <td><input name="location" type="text" id="textfield" min="0" value="<?php echo $rs['location']; ?>" size="15"> </td>
        </tr>

        <tr>
          <td><span class="fonts">
              <font color="#000000">NOTE &nbsp;</td>
          <td><input name="pd_note" type="text" id="textfield" min="0" value="<?php echo $rs['pd_note']; ?>" size="30"> </td>
        </tr>

        <td colspan="3" align="center" colspan="2"> </br>
          <input id="btnOrange" type="submit" name="Submit" value="Save">
          <input id="btnOrange" type="button" name="Reset" value="Cancel" onclick=window.history.back() value=back>
        </td>
      </table>
    </form>
  </center>
</body>

</html>