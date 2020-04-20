<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <h5 class="card-title">เพิ่มข้อมูล</h5>

    </div>
    <div class="card-body">
      <form name="form2" method="post" action="ADD/add_update_visitor.php">
        <div class="form-row">
          <div class="form-group col-md-2">
            <label for="inputEmail4">รหัส</label>
            <input name="Txtcode" readonly type="text" class="form-control" id="textfield" value="<?php echo $pnum ?>" size="10">

          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4">ชื่อ</label>
            <input name="vis_name" type="text" class="form-control" id="textname" value="<?php echo $rs['vis_name']; ?>" size="15" required autofocus>

          </div>
          <div class="form-group col-md-6">
            <label for="inputPassword4">นามสกุล</label>
            <input name="vis_lname" type="text" class="form-control" id="textlname" min="0" value="<?php echo $rs['vis_lname']; ?>" size="15" required autofocus>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputAddress"><input type="checkbox" id="myCheck" onclick="myFunction()">เลขบัตรประชาชน</label>
            <label for="inputAddress"><input type="checkbox" id="myCheck2" onclick="myFunction2()">Passport</label>
            <p id="text" style="display:none"><input name="textID" type="text" class="form-control" id="textID" min="0" value="<?php echo $rs['ID_card']; ?>" size="15" placeholder="เลขบัตรประชาชน" maxlength="13"></p>
            <p id="text2" style="display:none"><input name="Passport" type="text" class="form-control" id="Passport" min="0" value="<?php echo $rs['ID_card']; ?>" size="15" placeholder="Passport"></p>
          </div>
          <div class="form-group col-md-6">
            <label for="inputAddress2">เบอร์โทร</label>
            <input name="phone" type="text" class="form-control" id="textphone" min="0" value="<?php echo $rs['phone']; ?>" size="15" required autofocus>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4">email</label>
            <input name="emails" type="email" class="form-control" id="emails" min="0" value="<?php echo $rs['email']; ?>" size="15" required autofocus>
          </div>


          <div class="form-group col-md-4">
            <label for="inputState">บริษัท</label>
            <select id="inputState" class="form-control" name="comid" class="form-control" required="required">
              <option value="<?php echo $rs['com_id']; ?>"><?php echo $rs['com_name_TH']; ?></option>
              <?php
              $sqlx = "SELECT * FROM `company`";
              $dbquery = mysqli_query($con, $sqlx);
              while ($rs1 = mysqli_fetch_assoc($dbquery)) {
                if ($rs['com_id'] != $rs1['com_id']) {
              ?>
                  <option value="<?php echo $rs1['com_id']; ?>"><?php echo $rs1['com_name_TH']; ?></option>

              <?php }
              } ?>
            </select>
          </div>

        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>

  </div>
</div>


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