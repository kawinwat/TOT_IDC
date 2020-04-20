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
									<label class="form-label">รหัสผู้ติดต่อ</label>
									<input class="form-control" placeholder="รหัสผู้ติดต่อ" type="text" name="com_id">
								</div>
								<div class="row">
									<div class="form-group col-md-6">
										<label class="form-label">ชื่อภาษาไทย</label>
										<input class="form-control" placeholder="ชื่อภาษาไทย" type="text" name="com_name_TH">
									</div>
									<div class="form-group col-md-6">
										<label class="form-label">ชื่อภาษาอังกฤษ</label>
										<input class="form-control" placeholder="ชื่อภาษาอังกฤษ" type="text" name="com_name_EN">
									</div>

								</div>


								<button type="submit" class="btn btn-primary" name="btnSearch" value="Search">Search</button>
								<div class="mb-2">
									<a href="company.php"><i class="align-middle mr-2" data-feather="rotate-cw"></i> <span class="align-middle"></span></a>
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
								<h1 class="card-title">ข้อมูลบริษัท</h1>
							</center>
							<div class="container">

								<!-- Trigger the modal with a button -->
								<button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary">เพิ่มข้อมูลบริษัท</button>

								<!-- Modal -->
								<div class="modal fade" id="myModal" role="dialog">
									<div class="modal-dialog modal-lg">

										<!-- Modal content-->

										<div class="modal-content">
											<div class="modal-header">
												<h4 class="modal-title">ข้อมูลบริษัท</h4>
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
														$SQLfindnextcode = "Select * FROM company order by com_id DESC limit 1 ";
														$dbrunquery = mysqli_query($con, $SQLfindnextcode);
														$result = mysqli_fetch_array($dbrunquery);
														$numid = $result['com_id'];
														//echo $numid ;
														$num1 = substr($numid, 3);
														//echo $num1 ;
														$count = $num1 + 1;
														//echo $count ;
														$run1 = sprintf("C" . "%03d", $count);
														$pnum = $run1;
													}
													?>
													<?php include('ADD/add_company.php'); ?>
												</div>
											</div>

										</div>
									</div>
								</div>

							</div>

						</div>

						<?PHP
						include('connectdb.php');
						if (isset($_POST['btnSearch'])) {
							$com_id = $_POST['com_id'];
							$com_name_TH = $_POST['com_name_TH'];
							$com_name_EN = $_POST['com_name_EN'];


							//Do real escaping here

							$query = "SELECT * FROM company";
							$conditions = array();

							if (!empty($com_id)) {
								$conditions[] = "com_id='$com_id'";
							}
							if (!empty($com_name_TH)) {
								$conditions[] = "com_name_TH = '$com_name_TH'";
							}
							if (!empty($com_name_EN)) {
								$conditions[] = "com_name_EN = '$com_name_EN'";
							}

							$sql = $query;
							if (count($conditions) > 0) {
								$sql .= " WHERE " . implode(' AND ', $conditions);
							}
							//echo $sql;
							$record = mysqli_query($con, $sql);
						} else {
							$sql = " SELECT * FROM company WHERE 1 order by com_id ";
						}

						echo "<BR> " . $sql1 . " <BR>";

						$record = mysqli_query($con, $sql);

						?>
						<table id="datatables-basic" class="table table-striped" style="width:100%">
							<thead>
								<tr>

									<th> &nbsp; รหัสบริษัท &nbsp;</th>
									<th> &nbsp;ชื่อบริษัท(ภาษาไทย) &nbsp;</th>
									<th> &nbsp;ชื่อบริษัท(ภาษาอังกฤษ) &nbsp;</th>
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
										<td>&nbsp; <?php echo $data['com_id']; ?> &nbsp;</td>
										<td>&nbsp; <?php echo $data['com_name_TH']; ?> &nbsp;</td>
										<td>&nbsp; <?php echo $data['com_name_EN']; ?> &nbsp;</td>
										<td class="table-action">
											<?php if ($level == 'admin') { ?>
												<a href="EDIT/edit_com.php?com_id=<?PHP echo $data['com_id']; ?>&method=edit"><i class="align-middle fas fa-fw fa-pen"></i></i></a>
												<a href="DELETE/delete_com.php?com_id=<?PHP echo $data['com_id']; ?>&method=delete"><i class="align-middle fas fa-fw fa-trash" onclick="return confirm('คุณต้องการลบข้อมูลที่เลือก')"></i></a>
											<?php } ?>
										</td>

									</tr>

								</tbody>
							<?PHP }  ?>
							<tfoot>
								<tr>
									<th> &nbsp; รหัสบริษัท &nbsp;</th>
									<th> &nbsp;ชื่อบริษัท(ภาษาไทย) &nbsp;</th>
									<th> &nbsp;ชื่อบริษัท(ภาษาอังกฤษ) &nbsp;</th>
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