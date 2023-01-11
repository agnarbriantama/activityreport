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

				<!-- Card  -->
				<div class="card mb-3">
					<div class="card-header">

						<a href="<?php echo site_url('admin/LaporanHarian/') ?>"><i class="fas fa-arrow-left"></i>
							Back</a>
					</div>
					<div class="card-body">

						<?php foreach ($LaporanHarian as $datpan) : ?>

							<form action="<?php echo base_url('admin/LaporanHarian/update_data/' . $datpan->id_kegiatan); ?>" method="POST" enctype="multipart/form-data">
								<input type="hidden" name="id_kegiatan" value="<?php echo $datpan
								->id_kegiatan; ?>" />

								<div class="form-group">
									<label for="nama_tim">Nama Kegiatan</label>
									<input class="form-control <?php echo form_error('nama_kegiatan') ? 'is-invalid' : '' ?>" type="text" name="nama_kegiatan" placeholder="Nama Kegiatan" value="<?php echo $datpan->nama_kegiatan; ?>" />
								</div>
								<div class="form-group">
								<label for="tgl_pantauan">Tanggal Kegiatan</label>
								<input class="form-control" type="date" name="tgl_kegiatan" value="<?php echo $datpan->tgl_kegiatan; ?>" required />
							</div>
							<div class="form-row">
			   				 <div class="form-group col-md-1">
			    		 <label for="tgl_pantauan">Jam Mulai</label>
						<input class="form-control" type="time" name="jam_mulai" required value="<?php echo $datpan->jam_mulai; ?>" />
							</div>
			   			 <div class="form-group col-md-1">
			   		   <label for="tgl_pantauan">Jam Selesai</label>
								<input class="form-control" type="time" name="jam_selesai" required value="<?php echo $datpan->jam_selesai; ?>" />
							</div>
			 			 </div>
							<div class="form-group">
								<label for="tempat">Tempat Kegiatan</label>
								<input class="form-control" type="text" name="tempat" placeholder="Tempat Kegiatan" value="<?php echo $datpan->tempat; ?>" required />
							</div>
							<div class="form-group">
								<label for="penyelenggara">Penyelenggara</label>
								<input class="form-control" type="text" name="penyelenggara" placeholder="Penyelenggara Kegiatan" value="<?php echo $datpan->penyelenggara; ?>" required />
							</div>
							<div class="form-group">
								<label for="penyelenggara">Keterangan</label>
								<textarea class="form-control" type="text" name="keterangan" placeholder="Keterangan"  required /><?php echo $datpan->keterangan; ?></textarea>
							</div>
								<input class="btn btn-success" type="submit" name="btn" value="Save" />
							</form>

						<?php endforeach; ?>

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
