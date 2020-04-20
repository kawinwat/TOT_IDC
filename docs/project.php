<?php include('head.php'); ?>
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
								<div class="form-group">
									<label class="form-label">รหัสโครงการ</label>
									<input class="form-control" placeholder="code" type="text" name="pro_id">
								</div>
								<div class="form-group">
									<label class="form-label">ชื่อโครงการ</label>
									<input class="form-control" placeholder="name" type="text" name="pro_name">
								</div>
								<div class="form-group">
									<label class="form-label">วันที่เริ่ม</label>
									<input class="form-control" placeholder="date" type="date" name="date_start">
								</div>
								<div class="form-group">
									<label class="form-label">วันที่สิ้นสุด</label>
									<input class="form-control" placeholder="date" type="date" name="date_end">
								</div>
								<button type="submit" class="btn btn-primary" name="btnSearch" value="Search">Search</button>
								<div class="mb-2">
									<a href="project.php"><i class="align-middle mr-2" data-feather="rotate-cw"></i> <span class="align-middle"></span></a>
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
								<h1 class="card-title">ข้อมูลโครงการ</h1>
							</center>
							<div class="container">
								<!-- Trigger the modal with a button -->
								<button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary">เพิ่มข้อมูลโครงการ</button>
								<!-- Modal -->
								<div class="modal fade" id="myModal" role="dialog">
									<div class="modal-dialog modal-lg">
										<!-- Modal content-->
										<div class="modal-content">
											<div class="modal-header">
												<h4 class="modal-title">เพิ่มข้อมูลโครงการ</h4>
												<button type="button" class="close" data-dismiss="modal">&times;</button>
											</div>
											<div class="modal-body">
												<div class="input-group">
													<?php
													require_once("connectdb.php");
													ini_set('display_errors', 0);
													?>
													<form name="form1" method="post" action="ADD/add_update_project.php ">
														<?php
														$method = $_POST["method"];
														if (!$method) {
															$method = $_GET["method"];
														}
														//echo"<br>method-->$method<br> Txtcus_id-->$Txtcus_id<br>";
														if ($method == '' || $method == 'add') {
															$SQLfindnextcode = "Select * FROM project order by pro_id DESC limit 1";
															$dbrunquery = mysqli_query($con, $SQLfindnextcode);
															$result = mysqli_fetch_array($dbrunquery);
															$numid = $result['pro_id'];
															//echo $numid ;
															$num1 = substr($numid, 14);
															$date = substr($numid, 0, 8);
															//echo $num1;
															//echo $date;
															if (date("Ymd") == $date) {
																//echo $num1 ;
																//echo $num11 ;
																$count = $num1 + 1;
																//echo $count ;
																$run1 = sprintf("PIDC" . "%03d", $count);
																$pnum = $run1;
															} else {
																$num1 = 0;
																$count = $num1 + 1;
																//echo $count ;
																$run1 = sprintf("PIDC" . "%03d", $count);
																$pnum = $run1;
															}
														}
														//echo $proid;
														$method = $_POST["method"];
														if (!$method) {
															$method = $_GET["method"];
														}
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
																$pnum1 = $run;
															} elseif ($num >= 10) {
																$count1 = $num + 1;
																//echo $count ;
																$run = sprintf("PD" . "%02d", $count1);
																$pnum1 = $run;
															}
															$count1 = $num + 1;
															//echo $count ;
															$run = sprintf("PD" . "%03d", $count1);
															$pnum1 = $run;
														}
														?>
														<?php include('ADD/add_project.php'); ?>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?PHP
							include('connectdb.php');
							if (isset($_POST['btnSearch'])) {
								$pro_id = $_POST['pro_id'];
								$pro_name = $_POST['pro_name'];
								$date_start = $_POST['date_start'];
								$date_end = $_POST['date_end'];
								//Do real escaping here
								$query = "SELECT * FROM project";
								$conditions = array();
								if (!empty($pro_id)) {
									$conditions[] = "pro_id='$pro_id'";
								}
								if (!empty($pro_name)) {
									$conditions[] = "pro_name = '$pro_name'";
								}
								if (!empty($date_start)) {
									$conditions[] = "date_start = '$date_start'";
								}
								if (!empty($date_end)) {
									$conditions[] = "date_end = '$date_end'";
								}
								$sql = $query;
								if (count($conditions) > 0) {
									$sql .= " WHERE " . implode(' AND ', $conditions);
								}
								//echo $sql;
								$record = mysqli_query($con, $sql);
							} else {
								$sql = " SELECT * FROM project WHERE 1 order by pro_id ";
							}
							// echo "<BR> ".$sql." <BR>" ;
							function DateDiff($strDate1, $strDate2)
							{
								return (strtotime($strDate2) - strtotime($strDate1)) /  (60 * 60 * 24);  // 1 day = 60*60*24
							}
							$record = mysqli_query($con, $sql);
							?>
							<table id="datatables-basic" class="table table-striped" style="width:100%">
								<thead>
									<tr>
										<th> &nbsp; รหัสโครงการ &nbsp;</th>
										<th> &nbsp; ชื่อโครงการ &nbsp;</th>
										<th> &nbsp; วันเริ่ม &nbsp;</th>
										<th> &nbsp; วันสิ้นสุด &nbsp;</th>
										<th> &nbsp; สถานะ &nbsp;</th>
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
											<td>&nbsp;<p><a href="Zoom_project.php?pro_id=<?PHP echo $data['pro_id']; ?>&method=zoom"><?php echo $data['pro_id']; ?> </a></p>&nbsp;</td>
											<td>&nbsp; <?php echo $data['pro_name']; ?> &nbsp;</td>
											<td>&nbsp; <?php echo $data['date_start']; ?> &nbsp;</td>
											<td>&nbsp; <?php echo $data['date_end']; ?> &nbsp;</td>
											<?php
											$date = date("Y-m-d");
											$date_end = $data['date_end'];
											//echo "Date Diff = ".DateDiff("$date","2020-05-1")."<br>";
											//echo $date;		
											$sum =  DateDiff("$date", "$date_end");
											//echo $sum;
											if ($sum <= 10) {
											?>
												<td><span class="badge badge-danger">Deleted</span></td>
											<?PHP
											}
											if ($sum >= 11  && $sum <= 29) {
											?><td><span class="badge badge-warning">Inactive</span></td>
											<?php
											}
											if ($sum >= 30) {
											?>
												<td><span class="badge badge-success">Active</span></td>
											<?php
											}
											?>
											<?php
											//echo $data['date_end']; 
											?> &nbsp;</td>
											<td class="table-action">
												<?php if ($level == 'admin') { ?>
													<a href="EDIT/edit_project.php?pro_id=<?PHP echo $data['pro_id']; ?>&method=edit"><i class="align-middle fas fa-fw fa-pen"></i></i></a>
													<a href="DELETE/delete_project.php?pro_id=<?PHP echo $data['pro_id']; ?>&method=delete"><i class="align-middle fas fa-fw fa-trash" onclick="return confirm('คุณต้องการลบข้อมูลที่เลือก')"></i></a>
												<?php } ?>
											</td>
										</tr>
									</tbody>
								<?PHP }  ?>
								<tfoot>
									<tr>
										<th> &nbsp; รหัสโครงการ &nbsp;</th>
										<th> &nbsp; ชื่อโครงการ &nbsp;</th>
										<th> &nbsp; วันเริ่ม &nbsp;</th>
										<th> &nbsp; วันสิ้นสุด &nbsp;</th>
										<th> &nbsp; สถานะ &nbsp;</th>
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