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
                <?php include('header.php');?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <a href="<?php echo site_url()?>add_projects" class="btn my-2 btn-primary float-right">
    Add Projects
</a>

                    <h1 class="h3 mb-2 text-gray-800">Projects List</h1>
                    <br>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">List of Client Projects</h6>
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
                                            <th>Client_Name</th>
                                            <th>Project_Start_Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                    </thead>
<!-- View - clients_list.php -->
<tbody>
    <?php foreach ($projects as $project): ?>
    <tr>
        <td><?= $project['project_id'] ?></td>
        <td><?= $project['project_name'] ?></td>
        
        <td>
            <?php foreach($list_project as $data)
            {
                if($data['client_id'] == $project['client_id'])
                { ?>
                <?php echo $data['client_name']; ?>
            <?php 
                 }
                
            }
             ?>
        </td>
        <td><?= $project['project_start_date'] ?></td>
        
        <td>
                <div class="dropdown">
                    <button class="btn btn-sm btn-<?php echo $project['status'] == 'active' ? 'success' : 'danger' ?> dropdown-toggle" type="button" id="statusDropdown<?= $project['project_id'] ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo ucfirst($project['status']) ?>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="statusDropdown<?= $project['project_id'] ?>">
                        <a class="dropdown-item" href="<?php echo site_url('change_status1/' . $project['project_id'] . '/active') ?>">Active</a>
                        <a class="dropdown-item" href="<?php echo site_url('change_status1/' . $project['project_id'] . '/inactive') ?>">Inactive</a>
                    </div>
                </div>
            </td>
            <td>
                <a href="<?= site_url('edit_project/' . $project['project_id']) ?>" class="btn btn-sm btn-primary">
                    <i class="fas fa-edit"></i> <!-- Edit icon -->
                </a>
                <a href="<?= site_url('delete_project/' . $project['project_id']) ?>" class="btn btn-sm btn-danger delete-project">
                    <i class="fas fa-trash"></i> <!-- Delete icon -->
                </a>
            </td>
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