<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top">

	<?php $this->load->view("admin/_partials/navbar.php") ?>
	<div id="wrapper">

		<?php $this->load->view("admin/_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">

				<?php $this->load->view("admin/_partials/breadcrumb.php") ?>

				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/LaporanHarian/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

						<form action="<?php echo site_url('admin/LaporanHarian/add'); ?>" method="POST" enctype="multipart/form-data">
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
				<?php $this->load->view("admin/_partials/footer.php") ?>

			</div>
			<!-- /.content-wrapper -->

		</div>
		<!-- /#wrapper -->


		<?php $this->load->view("admin/_partials/scrolltop.php") ?>
		<?php $this->load->view("admin/_partials/modal.php") ?>
		<?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>
