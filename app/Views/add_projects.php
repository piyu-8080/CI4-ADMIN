<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('header_script.php'); ?>
    <style>
        .col-lg-7 {
            margin-left: 155px;
            margin-top: 70px;
        }

        .p-5 {
            width: 1000px;
            box-shadow: 1px 2px 6px 1px;
        }

        .text-danger {
            color: red; /* Style for error messages */
        }
    </style>
</head>

<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        <?php include('sidebar.php') ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <?php include("header.php"); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                </div>
                <!-- /.container-fluid -->
                <div class="col-lg-7 float-center">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Add Projects Details</h1>
                        </div>

                        <form class="user" action="<?php echo site_url('addclients'); ?>" method="post">


                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="clientname">Project Name</label>
                                    <input type="text" class="form-control form-control-user1" id="client_name" name="client_name">
                                    <?= session()->has('validation_errors') && session('validation_errors')['client_name'] ? '<div class="text-danger">' . esc(session('validation_errors')['client_name']) . '</div>' : '' ?>
                                </div>
                                <div class="col-sm-6">
                                    <label for="email">Client Id</label>
                                    <input type="text" class="form-control form-control-user1" id="client_email" name="client_email">
                                    <?= session()->has('validation_errors') && session('validation_errors')['client_email'] ? '<div class="text-danger">' . esc(session('validation_errors')['client_email']) . '</div>' : '' ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="clientlocation">Project_Start_Date</label>
                                    <input type="text" class="form-control form-control-user1" name="client_location" id="client_location">
                                    <?= session()->has('validation_errors') && session('validation_errors')['client_location'] ? '<div class="text-danger">' . esc(session('validation_errors')['client_location']) . '</div>' : '' ?>
                                </div>
                                <div class="col-sm-6">
                                    <label for="status">Status</label>
                                    <select class="form-control form-control-user1" name="status" id="status">
                                        <option value="" disabled>Select value--</option>
                                        <option value="active">Active</option>
                                        <option value="inactive">Deactive</option>
                                    </select>
                                    <?= session()->has('validation_errors') && isset(session('validation_errors')['status']) ? '<div class="text-danger">' . esc(session('validation_errors')['status']) . '</div>' : '' ?>

                                </div>
                            </div>

                            

                            <div class="center text-center">
                                <input type="submit" class="btn btn-center btn-primary btn-user1" name="clientDetails" value="Add Project Details">
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
        </
