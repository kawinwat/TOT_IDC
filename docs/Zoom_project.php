<?php include('head.php'); ?>
<center>
	<main class="content">
		<div class="container-fluid">
			<div class="row">
				<?PHP
				include('connectdb.php');
				$pro_id = $_GET["pro_id"];
				$sql = " SELECT *  FROM `project_detail` pd,project p,customer_type ct,customer_status cs,service_type st,service_plan sp 
                         WHERE pd.pro_id=p.pro_id  AND pd.st_id=st.st_id AND pd.cs_id=cs.cs_id AND pd.ct_id=ct.ct_id AND pd.sp_id=sp.sp_id 
                         AND pd.pro_id='$pro_id'";
				//echo "<BR> " . $sql . " <BR>";
				$record = mysqli_query($con, $sql);
				while ($data = mysqli_fetch_assoc($record)) {
				?>
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
							</div>
							<div class="card-body">
								<label>
									<h2>รายละเอียดโครงการ</h2>
									<a href="DELETE/delete_prodetail.php?pd_id=<?PHP echo $data['pd_id']; ?>&method=delete"><i class="align-middle fas fa-fw fa-trash" onclick="return confirm('คุณต้องการลบข้อมูลที่เลือก')"></i></a>
								</label>
								<hr width="100%" size="20" color="#BEBEBE" align="center">
								<p>
									<div class="form-row">
										<div class="form-group col-md-6">
											<label>รหัสรายละเอียด :</label>
											<label>&nbsp; <?php echo $data['pd_id']; ?> &nbsp;</label>
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-6">

											<label>รหัสโครงการ :</label>
											<label>&nbsp; <?php echo $data['pro_id']; ?> &nbsp;</label>
										</div>
										<div class="form-group col-md-6">

											<label>ชื่อโปรเจค :</label>
											<label>&nbsp; <?php echo $data['pro_name']; ?> &nbsp;</label>
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-6">
											<label>ประเภทบริการ :</label>
											<label>&nbsp; <?php echo $data['st_name']; ?> &nbsp;</label>
										</div>
										<div class="form-group col-md-6">
											<label>สถานะลูกค้า :</label>
											<label>&nbsp; <?php echo $data['cs_name']; ?> &nbsp;</label>
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-6">
											<label>ประเภทลูกค้า :</label>
											<label>&nbsp; <?php echo $data['ct_name']; ?> &nbsp;</label>
										</div>
										<div class="form-group col-md-6">
											<label>Service Plan :</label>
											<label>&nbsp; <?php echo $data['sp_name']; ?> &nbsp;</label>
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-6">
											<label>วันที่เริ่ม "ปี-เดือน-วัน":</label>

										</div>
										<div class="form-group col-md-6">
											<label>วันที่สิ้นสุด "ปี-เดือน-วัน" :</label>

										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-6">

											<label>&nbsp; <?php echo  $data['date_start']; ?> &nbsp;</label>
										</div>
										<div class="form-group col-md-6">

											<label>&nbsp; <?php echo  $data['date_end']; ?> &nbsp;</label>
										</div>
									</div>

									<div class="form-group">
										<label>note</label>
										<label>&nbsp; <?php echo $data['pd_note']; ?> &nbsp;</label>
									</div>

									<label>
										<h2>ข้อมูลเทคนิค</h2>
									</label>
									<hr width="100%" size="20" color="#BEBEBE" align="center">
									<div class="form-row">
										<div class="form-group col-md-3">
											<label>ip :</label>
											<label>&nbsp; <?php echo $data['ip']; ?> &nbsp;</label>
										</div>
										<div class="form-group col-md-3">
											<label>สถานที่ :</label>
											<label>&nbsp; <?php echo $data['location']; ?> &nbsp;</label>
										</div>
										<div class="form-group col-md-3">
											<label>rack_no :</label>
											<label>&nbsp; <?php echo $data['rack_no']; ?> &nbsp;</label>
										</div>
										<div class="form-group col-md-3">
											<label>rack_unit :</label>
											<label>&nbsp; <?php echo $data['rack_unit']; ?> &nbsp;</label>
										</div>
									</div>
									<label>
										<h2>รายละเอียดโครงการ</h2>
									</label>
									<hr width="100%" size="20" color="#BEBEBE" align="center">
									<div class="form-row">
										<div class="form-group col-md-6 ">

											<label>ชื่อ-นามสกุล :</label>
											<label>&nbsp; <?php echo $data['mp_name']; ?> &nbsp;</label>
											<label>&nbsp; <?php echo $data['mp_lname']; ?> &nbsp;</label>
										</div>
										<div class="form-group col-md-6 ">

											<label>เบอร์ติดต่อ :</label>
											<label>&nbsp; <?php echo $data['mp_phone']; ?> &nbsp;</label>
										</div>
									</div>
									<label>
										<h2>Staff</h2>
									</label>
									<hr width="100%" size="20" color="#BEBEBE" align="center">
									<div class="form-row">
										<div class="form-group col-md-3 ">
											<label>วันที่สร้างรายการ:</label>
											<label>&nbsp; <?php echo $data['pro_date_creator']; ?> &nbsp;</label>
										</div>
										<div class="form-group col-md-3 ">

											<label>ผู้สร้าง :</label>
											<label>&nbsp; <?php echo $data['pro_creator']; ?> &nbsp;</label>
										</div>
										<div class="form-group col-md-3 ">

											<label>วันที่แก้ไข:</label>
											<label>&nbsp; <?php echo $data['pro_date_editor']; ?> &nbsp;</label>
										</div>
										<div class="form-group col-md-3 ">
											<label>ผู้แก้ไขล่าสุด:</label>
											<label>&nbsp; <?php echo $data['pro_editor']; ?> &nbsp;</label>
										</div>
									</div>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>

		</div>


	</main>
</center>
<?php include('footer.php'); ?>