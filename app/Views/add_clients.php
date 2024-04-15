<!DOCTYPE html>
<html lang="en">

<head>

    
   <?php include('header_script.php');?>
   <style>
    .col-lg-7 {
        margin-left: 155px;
    margin-top: 70px;
}
.p-5 {
    width: 1000px;
    box-shadow: 1px 2px 6px 1px;
}
    </style>


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include('sidebar.php')?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
               <?php
               include("header.php");
               ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    

                </div>
                <!-- /.container-fluid -->
                <div class="col-lg-7 float-center">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Add Clients Details</h1>
                            </div>
                            

                            <form class="user" action="<?php echo site_url();?>addclients" method="post">
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="clientname">Client Name</label>
                                    <input type="text" class="form-control form-control-user1" id="client_name" name="client_name">
                                    <?php if (session()->has('validation_errors') && session('validation_errors')['client_name'] ?? null) : ?>
                                        <div class="text-danger text-center">
                                            <?= esc(session('validation_errors')['client_name']) ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-sm-6">
                                    <label for="email">Client Email</label>
                                    <input type="text" class="form-control form-control-user1" id="client_email" name="client_email">
                                    <?php if (session()->has('validation_errors') && session('validation_errors')['client_email'] ?? null) : ?>
                                        <div class="text-danger text-center">
                                            <?= esc(session('validation_errors')['client_email']) ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="clientlocation">Client Location</label>
                                    <input type="text" class="form-control form-control-user1" name="client_location" id="client_location">
                                    <?php if (session()->has('validation_errors') && session('validation_errors')['client_location'] ?? null) : ?>
                                        <div class="text-danger text-center">
                                            <?= esc(session('validation_errors')['client_location']) ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-sm-6">
                                    <label for="status">Status</label>
                                    <select class="form-control form-control-user1" name="status" id="status">
                                    <option value="" disabled>Select value--</option>
                                        <option value="active">Active</option>
                                        <option value="inactive">Deactive</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="client_address">Client Address</label>
                                <textarea class="form-control form-control-user1" id="client_address" name="client_address"></textarea>
                                <?php if (session()->has('validation_errors') && session('validation_errors')['client_address'] ?? null) : ?>
                                    <div class="text-danger text-center">
                                        <?= esc(session('validation_errors')['client_address']) ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="center text-center">
                                <input type="submit" class="btn btn-center btn-primary btn-user1" name="clientDetails" value="Add Client Details">
                            </div>

                            </form>
                            
                        </div>
                    </div>

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?php echo site_url()?>login">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="public/assets/vendor/jquery/jquery.min.js"></script>
    <script src="public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="public/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="public/assets/js/sb-admin-2.min.js"></script>

</body>

</html>