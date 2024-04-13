<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('header_script.php'); ?>
</head>
<body id="page-top">
    <div id="wrapper">
        <?php include('sidebar.php'); ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- Your HTML content for the delete page goes here -->
                <div class="container-fluid">
                    <h1 class="h3 mb-2 text-gray-800">Delete User</h1>
                    <p>Are you sure you want to delete this user?</p>
                    <a href="<?php echo base_url('confirm_delete/'.$user['id']); ?>" class="btn btn-danger">Yes, Delete</a>
                    <a href="<?php echo base_url('cancel_delete'); ?>" class="btn btn-secondary">Cancel</a>
                </div>
            </div>
            <?php include('footer_script.php'); ?>
        </div>
    </div>
</body>
</html>
