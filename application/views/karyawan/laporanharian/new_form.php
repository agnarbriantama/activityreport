<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("karyawan/_partials/head.php") ?>
</head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.map"></script>

<body id="page-top">

	<?php $this->load->view("karyawan/_partials/navbar.php") ?>
	<div id="wrapper">
		<?php $this->load->view("karyawan/_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">
				<?php $this->load->view("karyawan/_partials/breadcrumb.php") ?>

				<div class="card mb-3">
					<div class="card-header"></div>
					<div class="card-body">

						<form action="<?php echo site_url('karyawan/LaporanHarian/add'); ?>" method="POST" enctype="multipart/form-data">
							<?php echo $this->session->flashdata('berhasil'); ?>
							<div class="form-group"> 
								<label for="kegiatan">Kegiatan</label>
								<input class="form-control" type="text" name="nama_kegiatan" placeholder="Kegiatan" required />
							</div>
							<div class="form-group">
								<label for="tgl_pantauan">Tanggal Kegiatan</label>
								<input class="form-control" type="date" name="tgl_kegiatan" required />
							</div>
							<!-- form row -->
							<div class="form-row">
			   				 <div class="form-group col-md-1">
			    		 <label for="tgl_pantauan">Jam Mulai</label>
						<input class="form-control" type="time" name="jam_mulai" required />
							</div>
			   			 <div class="form-group col-md-1">
			   		   <label for="tgl_pantauan">Jam Selesai</label>
								<input class="form-control" type="time" name="jam_selesai" required />
							</div>
			 			 </div>

							<!-- end -->
							<div class="form-group">
								<label for="tempat">Tempat Kegiatan</label>
								<input class="form-control" type="text" name="tempat" placeholder="Tempat Kegiatan" required />
							</div>
							<div class="form-group">
								<label for="penyelenggara">Penyelenggara</label>
								<input class="form-control" type="text" name="penyelenggara" placeholder="Penyelenggara Kegiatan" required />
							</div>
							<div class="form-group">
								<label for="penyelenggara">Keterangan</label>
								<textarea class="form-control" type="text" name="keterangan" placeholder="Keterangan" required /></textarea>
							</div>
							<input class="btn btn-success float-right" type="submit" name="btn" value="Save" />

						</form>


					</div>

					<div class="card-footer small text-muted">
						* jika data tidak ada isikan (-)
						<br>
						* kolom wajib terisi semua
					</div>


				</div>
				<!-- /.container-fluid -->

				<!-- Sticky Footer -->
				<?php $this->load->view("karyawan/_partials/footer.php") ?>

			</div>
			<!-- /.content-wrapper -->

		</div>
		<!-- /#wrapper -->


		<?php $this->load->view("karyawan/_partials/scrolltop.php") ?>
		<?php $this->load->view("karyawan/_partials/modal.php") ?>
		<?php $this->load->view("karyawan/_partials/js.php") ?>

		<script>
			var x = document.getElementById("lokasi");

			function getLocation() {
				if (navigator.geolocation) {
					navigator.geolocation.getCurrentPosition(showPosition);
				} else {
					x.innerHTML = "Geolocation is not supported by this browser.";
				}
			}

			function showPosition(position) {
				// x.innerHTML = "Latitude: " + position.coords.latitude +
				// 	" || Longitude: " + position.coords.longitude;
				x.value = position.coords.latitude + "," + position.coords.longitude
			}
		</script>

</body>

</html>
