<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Login Laporan Harian</title>
	<link rel="icon" href="<?php echo base_url('assets/logoweb/logo.png') ?>" type="image/x-icon">

	<!-- Bootstrap core CSS-->
	<link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('css/style.css') ?>" rel="stylesheet">
	<style>
		body {
			background-image: url("<?php echo base_url('assets/logoweb/login.jpg') ?>");
			background-size: cover;
		}

		.card {
			background-image: url("<?php echo base_url('assets/logoweb/l.jpg') ?>");
			opacity: 1;
			background-size: cover;
		}
	</style>
</head>

<body>
	<?php if ($this->session->flashdata('error')) : ?>
		<div class="alert alert-danger" role="alert">
			<?php echo $this->session->flashdata('error'); ?>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<?php $this->session->unset_userdata('error') ?>
	<?php endif; ?>
	<div class="card mx-auto border-info shadow-lg" style="max-width: 90vh; max-height: 600px; margin: 5%;">
		<div class="d-flex justify-content-center align-items-center login-container">
			<form action="<?= base_url('auth/login'); ?>" method="POST" class="login-form text-center">
				<h1 class="mb-4 font-weight-light font-weight-bold text-uppercase">Login</h1>
				<h1 class="mb-2 font-weight-light font-weight-bold text-sentence case">MyActivityReport</h1>
				<?php echo $this->session->flashdata('login'); ?>
				<div class="form-group">
					<label class="d-flex flex-row font-weight-bold" for="username">Username</label>
					<input type="text" name="username" class="form-control rounded-pill form-control-lg" placeholder="Username">
				</div>
				<div class="form-group">
					<label class="d-flex flex-row font-weight-bold" data-toggle="password" for="password">Password</label>
					<input type="password" class="form-control rounded-pill form-control-lg" name="password" placeholder="Password">
				</div>
				<button type="submit" class="btn mt-5 rounded-pill btn-lg btn-custom btn-block text-uppercase">Log in</button>
			</form>
		</div>
	</div>
	<!-- Sticky Footer -->
	<footer class="sticky-footer" style="color: black; font-style: italic;">
		<div class="container my-auto">
			<div class="copyright text-center my-auto">
				<span>Copyright <?php echo SITE_NAME . " " . Date('Y') ?></span>
			</div>
		</div>
	</footer>

</body>

</html>
