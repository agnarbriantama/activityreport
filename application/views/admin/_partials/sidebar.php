<!-- Sidebar -->
<ul class="sidebar navbar-nav">
	<li class="nav-item <?php echo $this->uri->segment(2) == 'Overview' ? 'active' : '' ?>">
		<a class="nav-link" href="<?php echo site_url('admin/Overview') ?>">
			<i class="fas fa-tachometer-alt"></i>
			<span> Dashboard</span>
		</a>
	</li>

	<!-- <div class="ml-2">Data Master</div> -->

	

	<li class="nav-item <?php echo $this->uri->segment(2) == 'LaporanHarian' ? 'active' : '' ?>">
		<a class="nav-link" href="<?php echo site_url('admin/LaporanHarian') ?>">
			<i class="fa fa-book"></i>
			<span> Data Laporan Harian</span>
		</a>
	</li>

	<li class="nav-item <?php echo $this->uri->segment(2) == 'User' ? 'active' : '' ?>">
		<a class="nav-link" href="<?php echo site_url('admin/User') ?>">
			<i class="fa fa-info"></i>
			<span> Data Pengguna</span>
		</a>
	</li>



	<!-- <div class="ml-2">Logout</div>
	<li class="nav-item">
		<a class="nav-link" style="color: #909294;" href="#" data-toggle="modal" data-target="#logoutModal"><i class="fa fa-sign-out"></i> Logout</a>
	</li> -->
</ul>
