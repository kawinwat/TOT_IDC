<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <h5 class="card-title">เพิ่มข้อมูล</h5>

    </div>
    <div class="card-body">
      <form name="form2" method="post" action="ADD/add_update_company.php">
        <div class="form-row">
          <div class="form-group col-md-2">
            <label for="inputEmail4">รหัสบริษัท</label>
            <input name="Txtcode" readonly type="text" class="form-control" id="textfield" value="<?php echo $pnum ?>" size="10">

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
       
        

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>


  </div>
</div>