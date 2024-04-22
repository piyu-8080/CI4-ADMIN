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
                            <h1 class="h4 text-gray-900 mb-4">Add Project Details</h1>
                        </div>

                        <form class="user" method="post">
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="project_name">Project Name</label>
                                    <input type="text" class="form-control form-control-user1" id="project_name" name="project_name">
                                    <?= session()->has('validation_errors') && isset(session('validation_errors')['project_name']) ? '<div class="text-danger">' . esc(session('validation_errors')['project_name']) . '</div>' : '' ?>
                                </div>
                                <div class="col-sm-6">
                                    <label for="client_name">Client Name</label>
                                    <select class="form-control form-control-user1" id="client_id" name="client_id">
    <?php foreach ($clients as $client) { ?>
        <option value="<?php echo $client['client_id']; ?>"><?php echo $client['client_name']; ?></option>
    <?php } ?>
</select>


                                    <?= session()->has('validation_errors') && isset(session('validation_errors')['client_name']) ? '<div class="text-danger">' . esc(session('validation_errors')['client_name']) . '</div>' : '' ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="project_start_date">Project Start Date</label>
                                    <input type="date" class="form-control form-control-user1" id="project_start_date" name="project_start_date">
                                    <?= session()->has('validation_errors') && isset(session('validation_errors')['project_start_date']) ? '<div class="text-danger">' . esc(session('validation_errors')['project_start_date']) . '</div>' : '' ?>
                                </div>
                                <div class="col-sm-6">
                                    <label for="status">Status</label>
                                    <select class="form-control form-control-user1" id="status" name="status">
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                    <?= session()->has('validation_errors') && isset(session('validation_errors')['status']) ? '<div class="text-danger">' . esc(session('validation_errors')['status']) . '</div>' : '' ?>
                                </div>
                            </div>

                            <div class="center text-center">
                                <input type="submit" class="btn btn-center btn-primary btn-user1" name="add_project" value="Add Project">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include('footer.php');?>
            <!-- End of Footer -->
        </div>
    </div>
</body>

</html>
