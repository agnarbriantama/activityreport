<nav class="navbar navbar-expand navbar-dark fixed-top" style=" background-color: #99ccff; font-weight: 600;">

	<a><img src="<?php echo base_url('assets/logoweb/logo-baru.png') ?>" width="150px" height="50px" alt=""></a>

	<button class="btn btn-link btn-sm text-dark order-1 order-sm-0" id="sidebarToggle" style="color: #99ccff;" href="#">
		<i class="fas fa-bars"></i>
	</button>

	<!-- Navbar Search -->
	<form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
	</form>

	<!-- Navbar -->
	<ul class="navbar-nav ml-auto ml-md-0">
		<!-- <li class="nav-item dropdown no-arrow">
			<a class="nav-link dropdown-toggle text-dark" style="font-size: 15px;" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<i class="fas fa-user-circle fa-fw"></i> <?= $users['username'] ?>
			</a>
			<div class="dropdown-menu dropdown-menu-right badge-danger" aria-labelledby="userDropdown">
				 <a class="dropdown-item" href="#">Settings</a>
                <a class="dropdown-item" href="#">Activity Log</a> -->
		<!-- <div class="dropdown-divider"></div> -->
		<!-- <a class="dropdown-item badge-danger text-light text-center" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a> -->
		<!-- </div> -->
		<!-- </li> -->
		<div class="dropdown show">
			<a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<i class="fas fa-user-circle fa-fw"></i> <?= $users['username'] ?>
			</a>

			<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
				<p class="dropdown-item text-center" style="pointer-events: none;">Admin</p>
				<a class="dropdown-item text-center logout" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
			</div>
		</div>
	</ul>

</nav>
