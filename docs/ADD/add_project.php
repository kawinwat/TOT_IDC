<centor>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title">เพิ่มข้อมูลโครงการ</h5>

        </div>
        <div class="card-body">
          <form name="form2" method="post" action="ADD/add_update_project.php">
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="inputEmail4">รหัสโครงการ</label>
                <input name="Txtcode" readonly type="text" class="form-control" id="textfield" value="<?php echo date("Ymd");
                                                                                                      echo $pnum ?>" size="20">

              </div>
              <div class="form-group col-md-8">
                <label for="inputEmail4">ชื่อโครงการ</label>
                <input name="pro_name" type="text" class="form-control" id="textname" value="<?php echo $rs['pro_name']; ?>" size="15" required autofocus>

              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputEmail4">วันที่เริ่ม</label>
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
                <input name="Txtcode1" readonly type="text" class="form-control" id="textfield" value="<?php echo $pnum1 ?>" size="20">
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


      </div><button type="submit" class="btn btn-primary">Submit</button>
      </form>


    </div>
  </div>
</centor>