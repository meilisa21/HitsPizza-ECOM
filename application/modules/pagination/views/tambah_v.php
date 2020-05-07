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

            <div class="card mb-3">
                <div class="card-header">
                    <a href="<?php echo site_url('pagination') ?>"><i class="fas fa-arrow-left"></i> Back</a>
                </div>
                <div class="card-body">

                    <form action="<?php echo site_url('pagination/pagination/tambah') ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Nomor*</label>
                            <input class="form-control <?php echo form_error('id') ? 'is-invalid' : '' ?>" type="number" name="id" placeholder="Nomor" />
                            <div class="invalid-feedback">
                                <?php echo form_error('id') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name">Nama*</label>
                            <input class="form-control <?php echo form_error('nama') ? 'is-invalid' : '' ?>" type="text" name="nama" placeholder="Nama" />
                            <div class="invalid-feedback">
                                <?php echo form_error('nama') ?>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="name">Alamat*</label>
                            <input class="form-control <?php echo form_error('alamat') ? 'is-invalid' : '' ?>" type="text" name="alamat" placeholder="Alamat" />
                            <div class="invalid-feedback">
                                <?php echo form_error('alamat') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name">Pekerjaan*</label>
                            <input class="form-control <?php echo form_error('pekerjaan') ? 'is-invalid' : '' ?>" type="text" name="pekerjaan" placeholder="Pekerjaan" />
                            <div class="invalid-feedback">
                                <?php echo form_error('alamat') ?>
                            </div>
                        </div>

                        <input class="btn btn-success" type="submit" name="btn" value="Save" />
                    </form>

                </div>

                <div class="card-footer small text-muted">
                    * required fields
                </div>


            </div>


        </div>
        <!-- /.content-wrapper -->

    </div>
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