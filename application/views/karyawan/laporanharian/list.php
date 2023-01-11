<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("karyawan/_partials/head.php") ?>
</head>

<body id=" page-top">

	<?php $this->load->view("karyawan/_partials/navbar.php") ?>
	<div id="wrapper">

		<?php $this->load->view("karyawan/_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">
				<?php $this->load->view("karyawan/_partials/breadcrumb.php") ?>

				<?php if ($this->session->flashdata('success')) : ?>
					<div class="alert alert-success" role="alert">
						<?php echo $this->session->flashdata('success'); ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php $this->session->unset_userdata('success') ?>
				<?php endif; ?>

				<?php if ($this->session->flashdata('berhasil')) : ?>
					<div class="alert alert-success" role="alert">
						<?php echo $this->session->flashdata('berhasil'); ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php $this->session->unset_userdata('berhasil') ?>
				<?php endif; ?>

				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						<a class="btn btn-primary" href="<?php echo site_url('karyawan/LaporanHarian/tambah_data') ?>"><i class="fas fa-plus"></i> Tambah Data</a>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table cell-border table-hover table-striped text-center" id="dataTables" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th class="filterhead">No</th>
										<th class="filterhead">Kegiatan</th>
										<th class="filterhead">Tanggal</th>
										<th class="filterhead">Jam</th>
									</tr>
									<tr>
										<th>No</th>
										<th>Kegiatan</th>
										<th>Tanggal</th>
										<th>Jam</th>
										<th>Tempat</th>
										<th>Penyelenggara</th>
										<th width="500px">Keterangan</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($pantauan_user as $datpan) : ?>
										<tr>
											<td width="m10">
												<?php echo $no++ ?>
											</td>
											<td>
												<?php echo $datpan->nama_kegiatan ?>
											</td>
											<td>
												<?php echo $datpan->tgl_kegiatan ?>
											</td>
											<td>
												<?php echo $datpan->jam_mulai ?> - <?php echo $datpan->jam_selesai ?>
											</td>
											<td>
												<?php echo $datpan->tempat ?>
											</td>
											<td>
												<?php echo $datpan->penyelenggara ?>
											</td>
											<td >
												<?php echo $datpan->keterangan ?>
											</td>
										</tr>
									<?php endforeach; ?>

								</tbody>
							</table>
						</div>
					</div>
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

	<!-- <script>
		function deleteConfirm(url) {
			$('#btn-delete').attr('href', url);
			$('#deleteModal').modal();
		}
	</script>

	<script>
		$(document).ready(function() {
			var table = $('#dataTables').DataTable({
				"bInfo": false,
				"scrollX": true,
				"scrollY": "350px",
				"scrollCollapse": true,
				"paging": true,
				lengthChange: true,
			});
			table.buttons().container()
				.appendTo('#dataTables_wrapper .col-md-6:eq(0)');
		});
	</script> -->

	<script>
		// ! untuk hapus
		function deleteConfirm(url) {
			$('#btn-delete').attr('href', url);
			$('#deleteModal').modal();
		}

		// ! untuk datatable
		$(document).ready(function() {
			var table = $('#dataTables').DataTable({
				"bInfo": false,
				lengthChange: true,
				"scrollCollapse": true,
				"paging": true,
				lengthMenu: [
					[5, 10, 25, 50, -1],
					[5, 10, 25, 50, "All"]
				],
				lengthChange: true,
			});
			$(".filterhead").not(":eq(7), :eq(8)").each(function(i) {
				var select = $('<select><option value=""></option></select>')
					.appendTo($(this).empty())
					.on('change', function() {
						var term = $(this).val();
						table.column(i).search(term, false, false).draw();
					});
				table.column(i).data().unique().sort().each(function(d, j) {
					select.append('<option value="' + d + '">' + d + '</option>')
				});
			});
		});
	</script>

</body>

</html>
