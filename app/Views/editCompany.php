<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('header_script.php');?>
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
                <?php include('header.php'); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <h1 class="h3 mb-2 text-gray-800">Edit Company</h1>
                    <br>

                    <!-- Edit Form -->
                    <form action="<?php echo site_url('update-company/' . $company['id']); ?>"  method="post">
                        <input type="hidden" name="id" value="<?php echo $company['id']; ?>">
                        <div class="form-group">
                            <label for="companyname">Company Name:</label>
                            <input type="text" class="form-control" id="companyname" name="companyname" value="<?php echo $company['companyname']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="address">Address:</label>
                            <input type="text" class="form-control" id="address" name="address" value="<?php echo $company['address']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $company['email']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="contact">Contact:</label>
                            <input type="text" class="form-control" id="contact" name="contact" value="<?php echo $company['contact']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="website">Website:</label>
                            <input type="text" class="form-control" id="website" name="website" value="<?php echo $company['website']; ?>">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    <!-- End Edit Form -->
                </div>
                <!-- /.container-fluid -->
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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <a class="btn btn-primary" href="<?php echo site_url()?>">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <?php include('footer_script.php');?>
</body>
</html>
