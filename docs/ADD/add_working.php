
    
    <div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <h5 class="card-title">เพิ่มข้อมูล</h5>

    </div>
    <div class="card-body">
      <form name="form2" method="post" action="ADD/add_update_working.php">
        <div class="form-row">
        <div class="form-group col-md-6">
              <label for="inputEmail4">วันที่</label>
              <input name="work_date" readonly type="date" class="form-control" id="textfield" min="0" value="<?php echo $original = date("Y-m-d");
                                                                                                              $newDate = date("d-m-Y", strtotime($original));  ?>" size="15" required autofocus>
            </div>
            <div class="form-group col-md-6">
              <label for="inputEmail4">รหัสการทำงาน</label>
              <input name="Txtcode" readonly type="text" class="form-control" id="textfield" value="<?php echo date("Ymd") . $workid ?>" size="4">
            </div>
        </div>
        <div class="form-row">
        <div class="form-group col-md-6">
              <label for="inputState">โครงการ</label>
              <select id="inputState" class="form-control" name="pro_id" class="form-control" required="required">
                <option value="<?php echo $rs['pro_id']; ?>"><?php echo $rs['pro_name']; ?></option>
                <?php
                $sqlx = "SELECT * FROM `working` w,project p,visitor v,visitor_work vw,company c WHERE  w.pro_id=p.pro_id AND w.vis_id=v.vis_id and vw.vis_id=v.vis_id and vw.com_id=c.com_id ";
                $dbquery = mysqli_query($con, $sqlx);
                while ($rs1 = mysqli_fetch_assoc($dbquery)) {
                  if ($rs['pro_id'] != $rs1['pro_id']) {
                ?> 
                    <option value="<?php echo $rs1['pro_id']; ?>"><?php echo $rs1['pro_name']; ?></option>

                <?php }
                } ?>
              </select>
            </div>
            <div class="form-group col-md-6">
              <label for="inputState">ผู้มาติดต่อ</label>
              <select id="inputState" class="form-control" name="vis_id" class="form-control" required="required">
                <option value="<?php echo $rs['vis_id']; ?>"><?php echo $rs['vis_name']; ?></option>
                <?php
                $sqlx = "SELECT * FROM `working` w,project p,visitor v,visitor_work vw,company c WHERE  w.pro_id=p.pro_id AND w.vis_id=v.vis_id and vw.vis_id=v.vis_id and vw.com_id=c.com_id";
                $dbquery = mysqli_query($con, $sqlx);
                while ($rs1 = mysqli_fetch_assoc($dbquery)) {
                  if ($rs['vis_id'] != $rs1['vis_id']) {
                ?>
                    <option value="<?php echo $rs1['vis_id']; ?>"><?php echo $rs1['vis_name'];  ?> &nbsp;&nbsp;<?php echo $rs1['vis_lname'];  ?> <?php echo "บริษัท:". $rs1['com_name_TH'];  ?></option>

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








                