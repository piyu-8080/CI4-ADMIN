<!DOCTYPE html>
<html lang="en">

<head>

<?php include('header_script.php');?>
<link href="<?php echo site_url(); ?>public/assets/css/search.css" rel="stylesheet">
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
                <?php include('header.php');?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <a href="<?php echo site_url()?>add_seo_projects" class="btn my-2 btn-primary float-right">
                        Add SEO Projects
                    </a>

                    <h1 class="h3 mb-2 text-gray-800">SEO project list</h1>
                    
                    <br>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">List of SEO Projects</h6>
                            <input type="text" id="searchInput" class="float-right bg-light border-1 small" placeholder="Search for..."
                        aria-label="Search" aria-describedby="basic-addon2">
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Project_Name</th>
                                            <th>SEO_Work_Title</th>
                                            <th>SEO_Work_Discription</th>
                                            <th>Discription</th>
                                            <th>Progress</th>
                                        </tr>
                                    </thead>
                                    <!-- View - clients_list.php -->
                                    <tbody>
                                        <?php 
                                        // Define progress mapping
                                        $progressNames = array(
                                            '0' => 'Not Started',
                                            '1' => 'In Progress',
                                            '2' => 'Completed'
                                        );

                                        // Loop through projects
                                        foreach ($projects as $project): ?>
                                            <tr>
                                                <td><?php echo $project['id']; ?></td>
                                                <td><?php echo $project['project_name']; ?></td>
                                                <td><?php echo $project['seo_title']; ?></td>
                                                <td><?php echo $project['seo_description']; ?></td>
                                                <td><?php echo $project['description']; ?></td>
                                                <td><?php echo $progressNames[$project['progress']]; ?></td> <!-- Display progress name -->
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

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
                    <a class="btn btn-primary" href="<?php echo site_url()?>">Logout</a>
                </div>
            </div>
        </div>
    </div>


<?php include('footer_script.php');?>
</body>

</html>
