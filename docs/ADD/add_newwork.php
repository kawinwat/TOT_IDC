<form name="form" method="post" action="ADD/update_newwork.php">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title">การทำงาน</h5>

        </div>
        <div class="card-body">

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputEmail4">วันที่</label>
              <input name="work_date" readonly type="date" class="form-control" id="textfield" min="0" value="<?php echo $original = date("Y-m-d");
                                                                                                              $newDate = date("d-m-Y", strtotime($original));  ?>" size="15" required autofocus>
            </div>
            <div class="form-group col-md-6">
              <label for="inputEmail4">รหัสการทำงาน</label>
              <input name="workid" readonly type="text" class="form-control" id="textfield" value="<?php  echo date("Ymd"). $workid ?>" size="4">
            </div>

          </div>
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title">ป้อนข้อมูล</h5>

        </div>

      </div>
    </div>

    <div class="col-md-8">

      <div class="card">
        <div class="card-header">
          <h5 class="card-title">เพิ่มข้อมูลโครงการ</h5>

        </div>
        <div class="card-body">

          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="inputEmail4">รหัสโครงการ</label>
              <input name="proid" readonly type="text" class="form-control" id="textfield" value="<?php echo date("Ymd");
                                                                                                  echo $proid ?>" size="20">

            </div>
            <div class="form-group col-md-6">
              <label for="inputEmail4">ชื่อโครงการ</label>
              <input name="pro_name" type="text" class="form-control" id="textname" value="<?php echo $rs['pro_name']; ?>" size="15" required autofocus>

            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputEmail4">วันที่เรื่ม</label>
              <input name="date_start" type="date" class="form-control" id="textname" value="<?php echo $rs['date_start']; ?>" size="15" required autofocus>

            </div>
            <div class="form-group col-md-6">
              <label for="inputAddress">วันที่สิ้นสุด</label>
              <input name="date_end" type="date" class="form-control" id="textID" min="0" value="<?php echo $rs['date_end']; ?>" size="15" required autofocus>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-3 ">
              <label for="inputEmail4">รหัสรายละเอียด</label>
              <input name="Txtcode1" readonly type="text" class="form-control" id="textfield" value="<?php echo $pdid ?>" size="20">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputEmail4">ชื่อผู้จัดการโครงการ</label>
              <input name="mp_name" type="text" class="form-control" id="textfield" value="<?php echo $rs['mp_name']; ?>" size="20">

            </div>
            <div class="form-group col-md-6 ">
              <label for="inputEmail4">นามสกุลผู้จัดการโครงการ</label>
              <input name="mp_lname" type="text" class="form-control" id="textname" value="<?php echo $rs['mp_lname']; ?>" size="15" required autofocus>

            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6 ">
              <label for="inputEmail4">เบอร์ติดต่อ</label>
              <input name="mp_phone" type="phone" class="form-control" id="textfield" value="<?php echo $rs['mp_phone']; ?>" size="20">
            </div>
          </div>


          <div class="form-row">
            <div class="form-group col-md-3">
              <label for="inputState">ประเภทลูกค้า</label>
              <select id="inputState" class="form-control" name="ct_id" class="form-control" required="required">
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
              </select>
            </div>
            <div class="form-group col-md-3">
              <label for="inputState">Service Plan</label>
              <select id="inputState" class="form-control" name="sp_id" class="form-control" required="required">
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
              </select>
            </div>


            <div class="form-group col-md-3">
              <label for="inputState">สถานะลูกค้า</label>
              <select id="inputState" class="form-control" name="cs_id" class="form-control" required="required">
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
              </select>
            </div>
            <div class="form-group col-md-3">
              <label for="inputState">ประเภทบริการ</label>
              <select id="inputState" class="form-control" name="st_id" class="form-control" required="required">
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
              </select>
            </div>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4">สถานที่</label>
            <input name="location" type="text" class="form-control" id="textname" value="<?php echo $rs['location']; ?>" size="15" required autofocus>

          </div>
          <div class="form-group col-md-6">
            <label for="inputAddress">IP</label>
            <input name="ip" type="text" class="form-control" id="textID" min="0" value="<?php echo $rs['ip']; ?>" size="15" required autofocus>
          </div>
          <div class="form-group col-md-2">
            <label for="inputAddress">Rack NO</label>
            <input name="rack_no" type="text" class="form-control" id="textID" min="0" value="<?php echo $rs['rack_no']; ?>" size="15" required autofocus>
          </div>
          <div class="form-group col-md-2">
            <label for="inputAddress">Rack Unit</label>
            <input name="rack_unit" type="text" class="form-control" id="textID" min="0" value="<?php echo $rs['rack_unit']; ?>" size="15" required autofocus>
          </div>
        </div>

        <div class="form-group">
          <label for="inputAddress">Note</label>
          <input name="pd_note" type="text" class="form-control" id="textID" min="0" value="<?php echo $rs['pd_note']; ?>" size="15" required autofocus>

        </div>
      </div>



    </div>

    <div class="col-md-4">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title">เพิ่มข้อมูลบริษัท</h5>

          </div>
          <div class="form-row">
            <div class="form-group col-md-6 ">
              <label for="inputEmail4">รหัสบริษัท</label>
              <input name="comid" readonly type="text" class="form-control" id="textfield" value="<?php echo $comid ?>" size="10">

            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputEmail4">ชื่อบริษัท(ภาษาไทย)</label>
              <input name="com_name_TH" type="text" class="form-control" id="textname" value="<?php echo $rs['com_name_TH']; ?>" size="15" required autofocus>

            </div>
            <div class="form-group col-md-6">
              <label for="inputPassword4">ชื่อบริษัท(ภาษาอังกฤษ)</label>
              <input name="com_name_EN" type="text" class="form-control" id="textlname" min="0" value="<?php echo $rs['com_name_EN']; ?>" size="15" required autofocus>
            </div>
          </div>

        </div>

      </div>

      <div class="card">
        <div class="card-header">
          <h5 class="card-title">เพิ่มข้อมูลผู้มาติดต่อ</h5>

        </div>
        <d iv class="card-body">

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputEmail4">รหัส</label>
              <input name="visid" readonly type="text" class="form-control" id="textfield" value="<?php echo $visid ?>" size="10">

            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="inputEmail4">ชื่อ</label>
              <input name="vis_name" type="text" class="form-control" id="textname" value="<?php echo $rs['vis_name']; ?>" size="15" required autofocus>

            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="inputPassword4">นามสกุล</label>
              <input name="vis_lname" type="text" class="form-control" id="textlname" min="0" value="<?php echo $rs['vis_lname']; ?>" size="15" required autofocus>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="inputAddress"><input type="checkbox" id="myCheck" onclick="myFunction()">เลขบัตรประชาชน</label>
              <label for="inputAddress"><input type="checkbox" id="myCheck2" onclick="myFunction2()">Passport</label>
              <p id="text" style="display:none"><input name="textID" type="text" class="form-control" id="textID" min="0" value="<?php echo $rs['ID_card']; ?>" size="15" placeholder="เลขบัตรประชาชน" maxlength="13"></p>
              <p id="text2" style="display:none"><input name="Passport" type="text" class="form-control" id="Passport" min="0" value="<?php echo $rs['ID_card']; ?>" size="15" placeholder="Passport"></p>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="inputAddress2">เบอร์โทร</label>
              <input name="phone" type="text" class="form-control" id="textphone" min="0" value="<?php echo $rs['phone']; ?>" size="15" required autofocus>
            </div>
          </div>
          <div class="form-group col-md-12">
            <label for="inputEmail4">email</label>
            <input name="emails" type="email" class="form-control" id="emails" min="0" value="<?php echo $rs['email']; ?>" size="15" required autofocus>
          </div>
          <div class="form-row">


          </div>
      </div>


    </div>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<script>
  function myFunction() {
    var checkBox = document.getElementById("myCheck");
    var text = document.getElementById("text");
    if (checkBox.checked == true) {
      text.style.display = "block";
    } else {
      text.style.display = "none";
    }
  }

  function myFunction2() {
    var checkBox = document.getElementById("myCheck2");
    var text = document.getElementById("text2");
    if (checkBox.checked == true) {
      text.style.display = "block";
    } else {
      text.style.display = "none";
    }
  }
</script>