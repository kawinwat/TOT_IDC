<footer class="footer">
					<div class="container-fluid">
						<div class="row text-muted">
							<div class="col-8 text-left">

								<ul class="list-inline">
									<li class="list-inline-item">
										<a class="text-muted" href="#">Support</a>
									</li>
									<li class="list-inline-item">
										<a class="text-muted" href="#">Privacy</a>
									</li>
									<li class="list-inline-item">
										<a class="text-muted" href="#">Terms of Service</a>
									</li>
									<li class="list-inline-item">
										<a class="text-muted" href="#">Contact</a>
									</li>
								</ul>
								<div class="card">
								<div class="card-header">
									<h5 class="card-title">Footer</h5>
									
								</div>
								<div class="card-body text-center">
										
									<div>
										<button class="btn mb-1 btn-facebook"><i class="align-middle fab my-1 fa-facebook"></i></button>
										<button class="btn mb-1 btn-twitter"><i class="align-middle fab my-1 fa-twitter"></i></button>
										<button class="btn mb-1 btn-google"><i class="align-middle fab my-1 fa-google"></i></button>
										<button class="btn mb-1 btn-youtube"><i class="align-middle fab my-1 fa-youtube"></i></button>
										<button class="btn mb-1 btn-vimeo"><i class="align-middle fab my-1 fa-vimeo"></i></button>
										<button class="btn mb-1 btn-dribbble"><i class="align-middle fab my-1 fa-dribbble"></i></button>
										<button class="btn mb-1 btn-github"><i class="align-middle fab my-1 fa-github"></i></button>
										<button class="btn mb-1 btn-instagram"><i class="align-middle fab my-1 fa-instagram"></i></button>
										<button class="btn mb-1 btn-pinterest"><i class="align-middle fab my-1 fa-pinterest"></i></button>
										<button class="btn mb-1 btn-flickr"><i class="align-middle fab my-1 fa-flickr"></i></button>
										<button class="btn mb-1 btn-bitbucket"><i class="align-middle fab my-1 fa-bitbucket"></i></button>
									</div>
								</div>
							</div> 
							</div>
							<div class="col-4 text-right">
								<p class="mb-0">
									&copy; 2019 - <a href="dashboard-default.html" class="text-muted">Spark</a>
								</p>
							</div>
						</div>
					</div>
                </footer>
                </div>

		</div>

		<svg width="0" height="0" style="position:absolute">
		<defs>
		<symbol viewBox="0 0 512 512" id="ion-ios-pulse-strong">
			<path
			d="M448 273.001c-21.27 0-39.296 13.999-45.596 32.999h-38.857l-28.361-85.417a15.999 15.999 0 0 0-15.183-10.956c-.112 0-.224 0-.335.004a15.997 15.997 0 0 0-15.049 11.588l-44.484 155.262-52.353-314.108C206.535 54.893 200.333 48 192 48s-13.693 5.776-15.525 13.135L115.496 306H16v31.999h112c7.348 0 13.75-5.003 15.525-12.134l45.368-182.177 51.324 307.94c1.229 7.377 7.397 11.92 14.864 12.344.308.018.614.028.919.028 7.097 0 13.406-3.701 15.381-10.594l49.744-173.617 15.689 47.252A16.001 16.001 0 0 0 352 337.999h51.108C409.973 355.999 427.477 369 448 369c26.511 0 48-22.492 48-49 0-26.509-21.489-46.999-48-46.999z">
			</path>
		</symbol>
		</defs>
	</svg>
		<script src="js/app.js"></script>

		<script>
			$(function() {
				// Datatables basic
				$('#datatables-basic').DataTable({
					responsive: true
				});
				// Datatables with Buttons
				var datatablesButtons = $('#datatables-buttons').DataTable({
					lengthChange: !1,
					buttons: ["copy", "print"],
					responsive: true
				});
				datatablesButtons.buttons().container().appendTo("#datatables-buttons_wrapper .col-md-6:eq(0)")
			});
		</script>
	</body>

</html>