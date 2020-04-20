<?php include('head.php');
include('connectdb.php'); ?>
<center>
	<main class="content">
		<div class="container-fluid">

			<div class="header">
			</div>
			<div class="row">
				<div class="col-12 col-xl-6">
					<div class="card">
						<div class="card-header">
							<h5 class="card-title">Search</h5>
						</div>
						<div class="card-body">
							<form action="" method="post">
								<div class="row">
									<div class="form-group col-md-6">
										<label class="form-label">รหัสการทำงาน</label>
										<input class="form-control" placeholder="รหัสการทำงาน" type="text" name="work_id">
									</div>
									<div class="form-group col-md-6">
										<label class="form-label">ชื่อผู้มาติดต่อ</label>
										<input class="form-control" placeholder="ชื่อโครงการ" type="text" name="vis_name">
									</div>
								</div>
								<div class="row">
									<div class="form-group col-md-6">
										<label class="form-label">นามสกุลผู้มาติดต่อ</label>
										<input class="form-control" placeholder="ชื่อโครงการ" type="text" name="vis_lname">
									</div>
									<div class="form-group col-md-6">
										<label class="form-label">ชื่อโครงการ</label>
										<input class="form-control" placeholder="ชื่อผู้มาติดต่อ" type="text" name="pro_name">
									</div>
								</div>
								<div class="row">

									<div class="form-group col-md-6">
										<label class="form-label">วันที่ติดต่อ</label>
										<input class="form-control" placeholder="ชื่อผู้มาติดต่อ" type="date" name="work_date">
									</div>
									<div class="form-group col-md-6">
										<label class="form-label">บริษัท</label>
										<input class="form-control" placeholder="บริษัท" type="text" name="com_name_TH">
									</div>

								</div>


								<button type="submit" class="btn btn-primary" name="btnSearch" value="Search">Search</button>
								<div class="mb-2">
									<a href="working.php"><i class="align-middle mr-2" data-feather="rotate-cw"></i> <span class="align-middle"></span></a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12 col-xl-12">
					<div class="card">
						<div class="card-header">
							<center>
								<h1 class="card-title">การทำงาน</h1>
							</center>
							<div class="card-header">
								<div class="container">
									<!-- Trigger the modal with a button -->
									<button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary">เพิ่มข้อมูล</button>
									<!-- Modal -->
									<div class="modal fade" id="myModal" role="dialog">
										<div class="modal-dialog modal-lg">
											<!-- Modal content-->
											<div class="modal-content">
												<div class="modal-header">
													<h4 class="modal-title">เพิ่มข้อมูล</h4>
													<button type="button" class="close" data-dismiss="modal">&times;</button>
												</div>
												<div class="modal-body">
													<div class="input-group">
														<?php
														require_once("connectdb.php");

														ini_set('display_errors', 0);
														$method = $_POST["method"];
														if (!$method) {
															$method = $_GET["method"];
														}

														//echo"<br>method-->$method<br> Txtcus_id-->$Txtcus_id<br>";
														if ($method == '' || $method == 'add') {
															$SQLfindnextcode = "Select * FROM working order by work_id DESC limit 1 ";
															$dbrunquery = mysqli_query($con, $SQLfindnextcode);
															$result = mysqli_fetch_array($dbrunquery);
															$numid4 = $result['work_id'];
															//echo $numid ;
															$num4 = substr($numid4, 9);
															$date_work = substr($numid4, 0, 8);
															//echo $num4 ;
															//echo $date_work;
															if (date("Ymd") == $date_work) {

																$count4 = $num4 + 1;
																//echo $count4 ;
																$run4 = sprintf("W" . "%03d", $count4);
																$workid = $run4;
															} else {
																$num4 = 0;
																$count4 = $num4 + 1;
																//echo $count4 ;
																$run4 = sprintf("W" . "%03d", $count4);
																$workid = $run4;
															}
														}
														?>
														<?php include('ADD/add_working.php'); ?>
													</div>
												</div>

											</div>
										</div>
									</div>
									<!-- Trigger the modal with a button -->
									<button type="button" data-toggle="modal" data-target="#myModal1" class="btn btn-primary">NEW</button>
									<!-- Modal -->
									<div class="modal fade" id="myModal1" role="dialog">
										<div class="modal-dialog modal-lg">

											<!-- Modal content-->

											<div class="modal-content">
												<div class="modal-header">
													<h4 class="modal-title">เพิ่มข้อมูลผู้มาติดต่อใหม่</h4>
													<button type="button" class="close" data-dismiss="modal">&times;</button>
												</div>
												<div class="modal-body">
													<div class="input-group">
														<?php
														require_once("connectdb.php");

														ini_set('display_errors', 0);

														$method = $_POST["method"];
														if (!$method) {
															$method = $_GET["method"];
														}
														//echo"<br>method-->$method<br> Txtcus_id-->$Txtcus_id<br>";
														if ($method == '' || $method == 'add') {
															$SQLfindnextcode = "Select * FROM project order by pro_id DESC limit 1";
															$dbrunquery = mysqli_query($con, $SQLfindnextcode);
															$result = mysqli_fetch_array($dbrunquery);
															$numid1 = $result['pro_id'];
															//echo $numid ;
															$num1 = substr($numid1, 14);
															$date = substr($numid1, 0, 8);
															//echo $num1;
															//echo $date;
															if (date("Ymd") == $date) {
																//echo $num1 ;
																//echo $num11 ;
																$count1 = $num1 + 1;
																//echo $count ;
																$run1 = sprintf("PIDC" . "%03d", $count1);
																$proid = $run1;
															} else {
																$num1 = 0;
																$count1 = $num1 + 1;
																//echo $count ;
																$run1 = sprintf("PIDC" . "%03d", $count1);
																$proid = $run1;
															}
														}
														//echo $proid;
														//echo"<br>method-->$method<br> Txtcus_id-->$Txtcus_id<br>";
														if ($method == '' || $method == 'add') {
															$SQLfindnextcode1 = "Select * FROM project_detail order by pd_id DESC limit 1 ";
															$dbrunquery1 = mysqli_query($con, $SQLfindnextcode1);
															$result1 = mysqli_fetch_array($dbrunquery1);
															$numid1 = $result1['pd_id'];
															//echo $numid ;
															$num = substr($numid1, 2);
															//echo $num ;
															if ($num >= 99) {
																$count1 = $num + 1;
																//echo $count ;
																$run = sprintf("PD" . "%01d", $count1);
																$pdid = $run;
															} elseif ($num >= 10) {
																$count1 = $num + 1;
																//echo $count ;
																$run = sprintf("PD" . "%02d", $count1);
																$pdid = $run;
															}
															$count1 = $num + 1;
															//echo $count ;
															$run = sprintf("PD" . "%03d", $count1);
															$pdid = $run;
														}

														if ($method == '' || $method == 'add') {
															$SQLfindnextcode = "Select * FROM company order by com_id DESC limit 1 ";
															$dbrunquery = mysqli_query($con, $SQLfindnextcode);
															$result = mysqli_fetch_array($dbrunquery);
															$numid2 = $result['com_id'];
															//echo $numid ;
															$num2 = substr($numid2, 3);
															//echo $num1 ;
															$count2 = $num2 + 1;
															//echo $count ;
															$run2 = sprintf("C" . "%03d", $count2);
															$comid = $run2;
														}

														if ($method == '' || $method == 'add') {
															$SQLfindnextcode = "Select * FROM visitor order by vis_id DESC limit 1 ";
															$dbrunquery = mysqli_query($con, $SQLfindnextcode);
															$result = mysqli_fetch_array($dbrunquery);
															$numid3 = $result['vis_id'];
															//echo $numid ;
															$num3 = substr($numid3, 4);
															//echo $num1 ;
															$count3 = $num3 + 1;
															//echo $count ;
															$run3 = sprintf("VS" . "%03d", $count3);
															$visid = $run3;
														}
														if ($method == '' || $method == 'add') {
															$SQLfindnextcode = "Select * FROM working order by work_id DESC limit 1 ";
															$dbrunquery = mysqli_query($con, $SQLfindnextcode);
															$result = mysqli_fetch_array($dbrunquery);
															$numid4 = $result['work_id'];
															//echo $numid ;
															$num4 = substr($numid4, 9);
															$date_work = substr($numid4, 0, 8);
															//echo $num4 ;
															//echo $date_work;
															if (date("Ymd") == $date_work) {

																$count4 = $num4 + 1;
																//echo $count4 ;
																$run4 = sprintf("W" . "%03d", $count4);
																$workid = $run4;
															} else {
																$num4 = 0;
																$count4 = $num4 + 1;
																//echo $count4 ;
																$run4 = sprintf("W" . "%03d", $count4);
																$workid = $run4;
															}
														}
														?>
														<?php include('ADD/add_newwork.php'); ?>
													</div>
												</div>

											</div>
										</div>
									</div>
								</div>
							</div>
							<?PHP
							if (isset($_POST['btnSearch'])) {
								$work_id = $_POST['work_id'];
								$vis_name = $_POST['vis_name'];
								$vis_lname = $_POST['vis_lname'];
								$pro_name = $_POST['pro_name'];
								$com_name_TH = $_POST['com_name_TH'];
								$work_date = $_POST['work_date'];
								//Do real escaping here
								$query = "SELECT * FROM `working` w,project p,visitor v,visitor_work vw,company c where w.pro_id=p.pro_id AND w.vis_id=v.vis_id and vw.vis_id=v.vis_id and vw.com_id=c.com_id ";
								$conditions = array();

								if (!empty($work_id)) {
									$conditions[] = "work_id = '$work_id'";
								}
								if (!empty($vis_name)) {
									$conditions[] = "v.vis_name = '$vis_name'";
								}
								if (!empty($vis_lname)) {
									$conditions[] = "v.vis_lname = '$vis_lname'";
								}
								if (!empty($pro_name)) {
									$conditions[] = "p.pro_name = '$pro_name'";
								}
								if (!empty($com_name_TH)) {
									$conditions[] = "c.com_name_TH = '$com_name_TH'";
								}
								if (!empty($work_date)) {
									$conditions[] = "w.work_date = '$work_date'";
								}
								$sql = $query;
								if (count($conditions) > 0) {
									$sql .= " AND " . implode('AND', $conditions);
								}
								//echo $sql;
								$record = mysqli_query($con, $sql);
							} else {
								$sql = " SELECT * FROM `working` w,project p,visitor v,visitor_work vw,company c WHERE  w.pro_id=p.pro_id AND w.vis_id=v.vis_id and vw.vis_id=v.vis_id and vw.com_id=c.com_id  ORDER by w.work_id ";
							}
							// echo "<BR> ".$sql." <BR>" ;
							$record = mysqli_query($con, $sql);
							?>
							<table id="datatables-basic" class="table" style="width:100%">
								<thead>
									<tr>
										<th> &nbsp; รหัสการทำงาน &nbsp;</th>
										<th> &nbsp; ชื่อโครงการ&nbsp;</th>
										<th> &nbsp; ชื่อผู้มาติดต่อ &nbsp;</th>
										<th> &nbsp; นามสกุลผู้มาติดต่อ &nbsp;</th>
										<th> &nbsp; บริษัท &nbsp;</th>
										<th> &nbsp; วันที่มาติดต่อ &nbsp;</th>
										<?php if ($level == 'admin') { ?>
											<th> &nbsp;Actions &nbsp;</th>
										<?php } ?>
									</tr>
								</thead>
								<?PHP
								while ($data = mysqli_fetch_assoc($record)) {
								?>
									<tbody>
										<tr>
											<td>&nbsp; <?php echo $data['work_id']; ?> &nbsp;</td>
											<td>&nbsp; <?php echo $data['pro_name']; ?> &nbsp;</td>
											<td>&nbsp; <?php echo $data['vis_name']; ?> &nbsp;</td>
											<td>&nbsp; <?php echo $data['vis_lname']; ?> &nbsp;</td>
											<td>&nbsp; <?php echo $data['com_name_TH']; ?> &nbsp;</td>
											<td>&nbsp; <?php echo $data['work_date']; ?> &nbsp;</td>
											<td class="table-action">
												<?php if ($level == 'admin') { ?>
													<a href="EDIT/edit_working.php?work_id=<?PHP echo $data['work_id']; ?>&method=edit"><i class="align-middle fas fa-fw fa-pen"></i></i></a>
													<a href="DELETE/delete_working.php?work_id=<?PHP echo $data['work_id']; ?>&method=delete"><i class="align-middle fas fa-fw fa-trash" onclick="return confirm('คุณต้องการลบข้อมูลที่เลือก')"></i></a>
												<?php } ?>
											</td>
										</tr>

									</tbody>
								<?PHP }  ?>
								<tfoot>
									<tr>
										<th> &nbsp; รหัสการทำงาน &nbsp;</th>
										<th> &nbsp; รหัสบริษัท &nbsp;</th>
										<th> &nbsp; ชื่อผู้มาติดต่อ &nbsp;</th>
										<th> &nbsp; นามสกุลผู้มาติดต่อ &nbsp;</th>
										<th> &nbsp; บริษัท &nbsp;</th>
										<th> &nbsp; วันที่มาติดต่อ &nbsp;</th>
										<?php if ($level == 'admin') { ?>
											<th> &nbsp;Actions &nbsp;</th>
										<?php } ?>
									</tr>
								</tfoot>
							</table>

						</div>
					</div>
				</div>
			</div>
	</main>
</center>
<?php include('footer.php'); ?>