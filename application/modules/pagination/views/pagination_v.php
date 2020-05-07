<?php defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view("pagination/_part/head.php") ?>
<!DOCTYPE html>
<html lang="en">


<body class="hold-transition sidebar-mini">
	<div class="wrapper">
		<!-- Navbar -->
		<?php $this->load->view("pagination/_part/navbar.php") ?>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<?php $this->load->view("pagination/_part/sidebar.php") ?>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<div class="content-header">
				<?php $this->load->view("pagination/_part/breadcrumb.php") ?>
			</div>
			<!-- /.content-header -->
			<div class="table-responsive">
				<table class="table table-hover" width="100%" cellspacing="0">
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>Alamat</th>
						<th>Pekerjaan</th>
					</tr>
					<?php
					$no = $this->uri->segment('3') + 1;
					foreach ($user as $u) {
					?>
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $u->nama ?></td>
							<td><?php echo $u->alamat ?></td>
							<td><?php echo $u->pekerjaan ?></td>
						</tr>
					<?php } ?>
				</table>
				<br />
				<?php
				echo $this->pagination->create_links();
				?>
				<!-- /.content-wrapper -->
			</div>
			<!-- Control Sidebar -->
			<aside class="control-sidebar control-sidebar-dark">
				<!-- Control sidebar content goes here -->
			</aside>
			<!-- /.control-sidebar -->

			<!-- Main Footer -->
			<?php $this->load->view("pagination/_part/footer.php") ?>
		</div>
		<!-- jQuery -->
		<script src="<?php echo base_url('./assets/plugins/jquery/jquery.min.js') ?>"></script>
		<!-- Bootstrap 4 -->
		<script src="<?php echo base_url('./assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
		<!-- AdminLTE App -->
		<script src="<?php echo base_url('./assets/js/adminlte.min.js') ?>"></script>
</body>

</html>