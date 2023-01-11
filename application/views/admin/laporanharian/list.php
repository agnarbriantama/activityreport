<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
	<link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css">
</head>

<body id=" page-top">

	<?php $this->load->view("admin/_partials/navbar.php") ?>
	<div id="wrapper">

		<?php $this->load->view("admin/_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">
				<?php $this->load->view("admin/_partials/breadcrumb.php") ?>
				<!-- // ! Alert -->
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
						<a class="btn btn-primary" href="<?php echo site_url('admin/LaporanHarian/relasi') ?>"><i class="fas fa-plus"></i> Tambah Data</a>
					</div>
					<!-- // ! view sortir by date -->
					<div class="card-body">
						<div class="row">
							<div class="col col-8"></div>
							<div class="col col-2 text-center">
								<label style="font-size: 14px;" for="startdate">Mulai Tanggal</label>
								<input class="form-control text-center" type="text" id="min" name="min" placeholder="Tanggal Mulai" />
							</div>
							<div class="col col-2 text-center">
								<label style="font-size: 14px;" for="enddate">Akhir Tanggal</label>
								<input class="form-control text-center" type="text" id="max" name="max" placeholder="Tanggal Selesai" />
							</div>
						</div>
						<hr>
						<!-- // ! datatable -->
						<div class="table-responsive">
							<table class="table cell-border table-hover table-striped text-center display" id="dataTables" width="100%" cellspacing="0">
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
										<th>Username</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($LaporanHarian as $datpan) : ?>
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
											<td >
												<?php echo $datpan->username ?>
											</td>
											
											<!-- // ! action -->
											<td>
												<a style="width: 100px;" href="<?php echo site_url('admin/laporanharian/edit/' . $datpan->id_kegiatan) ?>" class="btn btn-small btn-warning mb-3 w-60"><i class="fas fa-edit"></i> Ubah</a>
												<a style="width: 100px;" onclick="deleteConfirm('<?php echo site_url('admin/laporanharian/delete/' . $datpan->id_kegiatan) ?>')" href="#!" class="btn btn-small btn-danger mb-3 w-60"><i class="fas fa-trash"></i> Hapus</a>
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
			<?php $this->load->view("admin/_partials/footer.php") ?>

		</div>
		<!-- /.content-wrapper -->

	</div>
	<!-- /#wrapper -->

	<?php $this->load->view("admin/_partials/scrolltop.php") ?>
	<?php $this->load->view("admin/_partials/modal.php") ?>
	<?php $this->load->view("admin/_partials/js.php") ?>

	<script>
		// ! untuk hapus
		function deleteConfirm(url) {
			$('#btn-delete').attr('href', url);
			$('#deleteModal').modal();
		}


		// ! untuk datatable
		$(document).ready(function() {
			// $('#dataTables thead tr')
			// 	.clone(true)
			// 	.addClass('filters')
			// 	.appendTo('#dataTables thead');

			var table = $('#dataTables').DataTable({
				"bInfo": false,
				lengthChange: true,
				"scrollCollapse": true,
				"paging": true,

				dom: 'Bfrtip',
				buttons: [{
						title: 'Data Laporan Harian Karyawan',
						extend: 'copyHtml5',
						text: 'COPY <i class="fa fa-files-o"></i>',
						titleAttr: 'Copy',
						className: 'btn-default',
						exportOptions: {
							columns: [0, 1, 2, 3, 4, 5, 6],
							// stripHtml: false
						}

					},
					{
						title: 'Data Laporan Harian Karyawan',
						extend: 'excelHtml5',
						text: 'EXCEL <i class="fa fa-file-excel-o"></i>',
						titleAttr: 'Excel',
						className: 'btn-success',
						exportOptions: {
							columns: [0, 1, 2, 3, 4, 5, 6],
							// stripHtml: false
						}
					},
					{
						title: 'Data Laporan Harian Karyawan',
						extend: 'csvHtml5',
						text: 'CSV <i class="fa fa-file-text-o"></i>',
						titleAttr: 'CSV',
						className: 'btn-info',
						exportOptions: {
							columns: [0, 1, 2, 3, 4, 5, 6],
							// stripHtml: false
						}
					},
					{
						title: 'Data Laporan Harian Karyawan',
						extend: 'pdfHtml5',
						// orientation: 'landscape',
						text: 'PDF <i class="fa fa-file-pdf-o"></i>',
						titleAttr: 'PDF',
						className: 'btn-danger',
						exportOptions: {
							columns: [0, 1, 2, 3, 4, 5, 6],
							// stripHtml: false
						}
					},
					{
						title: 'Data Laporan Harian Karyawan',
						extend: 'print',
						// orientation: 'landscape',	
						text: 'PRINT <i class="fa fa-print"></i>',
						titleAttr: 'print',
						className: 'btn-warning text-white',
						exportOptions: {
							columns: [0, 1, 2, 3, 4, 5, 6],
							stripHtml: false
						},
						customize: function(win) {
							$(win.document.body)
								.css('font-size', '10pt');

							$(win.document.body).find('table')
								.addClass('compact')
								.css('font-size', 'inherit');
						}
					},
				],
				dom: "<'row'<'col-md-3'l><'col-md-5'B><'col-md-4'f>>" +
					"<'row'<'col-md-12'tr>>" +
					"<'row'<'col-md-5'i><'col-md-7'p>>",
				lengthMenu: [
					[5, 10, 25, 50, -1],
					[5, 10, 25, 50, "All"]
				],
				lengthChange: true,
			});


			table.buttons().container()
				.appendTo('#dataTables_wrapper .col-md-6:eq(0)');
		});

		// ! sortir by date
		var minDate, maxDate;

		$.fn.dataTable.ext.search.push(
			function(settings, data, dataIndex) {
				var min = minDate.val();
				var max = maxDate.val();
				var date = new Date(data[2]);

				if (
					(min === null && max === null) ||
					(min === null && date <= max) ||
					(min <= date && max === null) ||
					(min <= date && date <= max)
				) {
					return true;
				}
				return false;
			}
		);

		$(document).ready(function() {
			// Create date inputs
			minDate = new DateTime($('#min'), {
				format: 'YYYY MMMM Do '
			});
			maxDate = new DateTime($('#max'), {
				format: 'YYYY MMMM Do'
			});

			// DataTables initialisation
			var table = $('#dataTables').DataTable();

			// Refilter the table
			$('#min, #max').on('change', function() {
				table.draw();
			});

			// ! sortir per column
			$(".filterhead").not(":eq(9), :eq(10), :eq(11), :eq(12)").each(function(i) {
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
