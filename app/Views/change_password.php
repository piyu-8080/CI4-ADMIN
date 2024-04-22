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
 hr {
    margin-top: 4rem;
    margin-bottom: 1rem;
    border: 0;
    border-top: 1px solid rgba(0, 0, 0, .1);
}
.center{
    text-align:center !important;
    margin-left: 390px;
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
                <div class="col-lg-7">
                        <div class="p-5">
                            <!-- Success Message -->
                            <?php if (session()->has('success_message')) : ?>
                                <div class="alert alert-success" role="alert">
                                    <?= session('success_message') ?>
                                </div>
                            <?php endif; ?>
                            <!-- Error Message -->
                            <?php if (session()->has('error_message')) : ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= session('error_message') ?>
                                </div>
                            <?php endif; ?>
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Change Password</h1>
                            </div>
                            <form class="user" method="post" action="<?= site_url('change-password'); ?>">
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="email">Email</label>
                                    <input type="email" class="form-control form-control-user1" name="email"
                                        id="email">
                                </div>
                                <div class="col-sm-6">
                                <label for="old password">Old Password</label>
                                    <input type="password" class="form-control form-control-user1" name="old_password"
                                        id="old_password">
                                </div>
                            </div>
                            <div class="form-group row">
                               <div class="col-sm-6 mb-3 mb-sm-0">
                               <label for="old password">New Password</label>
                                    <input type="password" class="form-control form-control-user1" name="new_password"
                                        id="new_password">
                                </div>
                                <div class="col-sm-6">
                                <label for="confirm password">Confirm New Password</label>
                                    <input type="password" class="form-control form-control-user1" name="confirm_new_password"
                                        id="confirm_new_password">
                                </div>
                                <hr>
                                <div class="center text-center">
                                <input type="submit" class="btn btn-center btn-primary btn-user1" name="change_password"
                                    value="Change Password">
                               </div>
                            </div>
                            </form>
                            

                
                        </div>
                    </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include('footer.php');?>
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