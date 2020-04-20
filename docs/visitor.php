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
									<input class="form-control" placeholder="รหัสผู้ติดต่อ" type="text" name="vis_id">
								</div>
								<div class="row">
									<div class="form-group col-md-6">
										<label class="form-label">ชื่อ</label>
										<input class="form-control" placeholder="ชื่อ" type="text" name="vis_name">
									</div>
									<div class="form-group col-md-6">
										<label class="form-label">นามสกุล</label>
										<input class="form-control" placeholder="นามสกุล" type="text" name="vis_lname">
									</div>
								</div>
								<div class="row">
									<div class="form-group col-md-6">
										<label class="form-label">&nbsp;เลขบัตรประชาชน &nbsp;/passpost</label>
										<input class="form-control" placeholder="เลขบัตรประชาชน/passpost" type="text" name="ID_card">
									</div>
									<div class="form-group col-md-6">
										<label class="form-label">เบอร์โทร</label>
										<input class="form-control" placeholder="เบอร์โทร" type="text" name="phone">
									</div>
								</div>
								<div class="row">
									<div class="form-group col-md-6">
										<label class="form-label">E-mail</label>
										<input class="form-control" placeholder="E-mail" type="text" name="email">
									</div>
								</div>
								<button type="submit" class="btn btn-primary" name="btnSearch" value="Search">Search</button>
								<div class="mb-2">
									<a href="visitor.php"><i class="align-middle mr-2" data-feather="rotate-cw"></i> <span class="align-middle"></span></a>
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
								<h1 class="card-title">ข้อมูลผู้มาติดต่อ</h1>
							</center>
							<div class="container">
								<!-- Trigger the modal with a button -->
								<button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary">เพิ่มผู้มาติดต่อ</button>
								<!-- Modal -->
								<div class="modal fade" id="myModal" role="dialog">
									<div class="modal-dialog modal-lg">
										<!-- Modal content-->
										<div class="modal-content">
											<div class="modal-header">
												<h4 class="modal-title">ข้อมูลผู้มาติดต่อ</h4>
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
													if ($dates == "") {
														$dates = date('Y-m-d');
														$_SESSION['date_start'] = $dates;
													}
													//echo"<br>method-->$method<br> Txtcus_id-->$Txtcus_id<br>";
													if ($method == '' || $method == 'add') {
														$SQLfindnextcode = "Select * FROM visitor order by vis_id DESC limit 1 ";
														$dbrunquery = mysqli_query($con, $SQLfindnextcode);
														$result = mysqli_fetch_array($dbrunquery);
														$numid = $result['vis_id'];
														//echo $numid ;
														$num1 = substr($numid, 4);
														//echo $num1 ;
														$count = $num1 + 1;
														//echo $count ;
														$run1 = sprintf("VS" . "%03d", $count);
														$pnum = $run1;
													}
													?>
													<?php include('ADD/add_visitor.php'); ?>
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
							$vis_id = $_POST['vis_id'];
							$vis_name = $_POST['vis_name'];
							$vis_lname = $_POST['vis_lname'];
							$ID_card = $_POST['ID_card'];
							$phone = $_POST['phone'];
							$email = $_POST['email'];
							//Do real escaping here
							$query = "SELECT * FROM visitor ";
							$conditions = array();
							if (!empty($vis_id)) {
								$conditions[] = "vis_id='$vis_id'";
							}
							if (!empty($vis_name)) {
								$conditions[] = "vis_name = '$vis_name'";
							}
							if (!empty($vis_lname)) {
								$conditions[] = "vis_lname = '$vis_lname'";
							}
							if (!empty($ID_card)) {
								$conditions[] = "ID_card = '$ID_card'";
							}
							if (!empty($phone)) {
								$conditions[] = "phone = '$phone'";
							}
							if (!empty($email)) {
								$conditions[] = "email = '$email'";
							}
							$sql = $query;
							if (count($conditions) > 0) {
								$sql .= " WHERE " . implode(' AND ', $conditions);
							}
							//echo $sql;
							$record = mysqli_query($con, $sql);
						} else {
							$sql = " SELECT * FROM visitor v,visitor_work vw,company c where vw.vis_id=v.vis_id and vw.com_id=c.com_id ORDER by v.vis_id";
						}
						//echo "<BR> ".$sql." <BR>" ;
						$record = mysqli_query($con, $sql);
						?>
						<table id="datatables-basic" class="table table-striped" style="width:100%">
							<thead>
								<tr>
									<th> &nbsp; รหัส &nbsp;</th>
									<th> &nbsp;ชื่อ &nbsp;</th>
									<th> &nbsp;นามสกุล &nbsp;</th>
									<th> &nbsp;เลขบัตรประชาชน &nbsp;/passpost</th>
									<th> &nbsp;เบอร์โทร &nbsp;</th>
									<th> &nbsp;E-mail &nbsp;</th>
									<th> &nbsp;บริษัท &nbsp;</th>
									<?php if ($level == 'admin') { ?>
										<th> &nbsp;action&nbsp;</th>
									<?php } ?>
								</tr>
							</thead>
							<?PHP
							while ($data = mysqli_fetch_assoc($record)) {
							?>
								<tbody>
									<tr>
										<td>&nbsp; <?php echo $data['vis_id']; ?> &nbsp;</td>
										<td>&nbsp; <?php echo $data['vis_name']; ?> &nbsp;</td>
										<td>&nbsp; <?php echo $data['vis_lname']; ?> &nbsp;</td>
										<td>&nbsp; <?php echo $data['ID_card']; ?> &nbsp;</td>
										<td>&nbsp; <?php echo $data['phone']; ?> &nbsp;</td>
										<td>&nbsp; <?php echo $data['email']; ?> &nbsp;</td>
										<td>&nbsp; <?php echo $data['com_name_TH']; ?> &nbsp;</td>
										<td class="table-action">
											<?php if ($level == 'admin') { ?>
												<a href="EDIT/edit_visitor.php?vis_id=<?PHP echo $data['vis_id']; ?>&method=edit"><i class="align-middle fas fa-fw fa-pen"></i></i></a>
												<a href="DELETE/delete_visitor_work.php?vw_id=<?PHP echo $data['vw_id']; ?>&method=delete"><i class="align-middle fas fa-fw fa-trash" onclick="return confirm('คุณต้องการลบข้อมูลที่เลือก')"></i></a>
											<?php } ?>
										</td>
									</tr>
								</tbody>
							<?PHP }  ?>
							<tfoot>
								<tr>
									<th> &nbsp; รหัส &nbsp;</th>
									<th> &nbsp;ชื่อ &nbsp;</th>
									<th> &nbsp;นามสกุล &nbsp;</th>
									<th> &nbsp;เลขบัตรประชาชน &nbsp;/passpost</th>
									<th> &nbsp;เบอร์โทร &nbsp;</th>
									<th> &nbsp;E-mail &nbsp;</th>
									<th> &nbsp;บริษัท &nbsp;</th>
									<?php if ($level == 'admin') { ?>
										<th> &nbsp;action&nbsp;</th>
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