<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('header_script.php'); ?>
    <link href="<?php echo site_url(); ?>public/assets/css/search.css" rel="stylesheet">
    
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
                            <h1 class="h4 text-gray-900 mb-4">Add SEO Project Details</h1>
                        </div>

                        <form class="user" action="<?php echo site_url('addseoprojects')?>" method="post">
                        <?php
                        // Retrieve validation errors from session if available
                        $validationErrors = session()->getFlashdata('validation_errors');
                        ?>


                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="project_id">Project Name</label>
        <select class="form-control form-control-user1" id="project_id" name="project_id" onchange="updateProjectName()">
        <option value="#"disable>--Select project--</option>
            <?php foreach ($projects as $project) { ?>

                <option value="<?php echo $project['project_id']; ?>"><?php echo $project['project_name']; ?></option>
            <?php } ?>
        </select>
        <input type="hidden" id="project_name" name="project_name">                         
                                </div>
                                <div class="col-sm-6">
                                    <label for="seo_title">SEO Title</label>
                                    <input type="text" class="form-control form-control-user1" id="seo_title" name="seo_title">
                                    <?php if ($validationErrors && isset($validationErrors['seo_title'])) : ?>
                                        <div class="text-danger"><?= esc($validationErrors['seo_title']) ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="seo_description">SEO Description</label>
                                    <textarea class="form-control form-control-user1" id="seo_description" name="seo_description"></textarea>
                                    <?php if ($validationErrors && isset($validationErrors['seo_description'])) : ?>
                                        <div class="text-danger"><?= esc($validationErrors['seo_description']) ?></div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-sm-6">
                                    <label for="description">Description</label>
                                    <textarea class="form-control form-control-user1" id="description" name="description"></textarea>
                                    <?php if ($validationErrors && isset($validationErrors['description'])) : ?>
                                        <div class="text-danger"><?= esc($validationErrors['description']) ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="progress">Progress</label>
                                    <select class="form-control form-control-user1" id="progress" name="progress">
                                        <option value="0">No Progress</option>
                                        <option value="1">Intermediate</option>
                                        <option value="2">Completed</option>
                                    </select>
                                    <?php if ($validationErrors && isset($validationErrors['progress'])) : ?>
                                        <div class="text-danger"><?= esc($validationErrors['progress']) ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="center text-center">
                                <input type="submit" class="btn btn-center btn-primary btn-user1" name="add_seo_project" value="Add SEO Project">
                            </div>

                        </form>

                    </div>
                </div>
            </div>
            <!-- End of Main Content -->
            <script>
    function updateProjectName() {
    var projectId = document.getElementById("project_id").value;
    var projectName = document.getElementById("project_id").options[document.getElementById("project_id").selectedIndex].text;
    document.getElementById("project_name").value = projectName;
}

</script>

            <!-- Footer -->
            <?php include('footer.php');?>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

</body>

</html>
