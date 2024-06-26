
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo site_url()?>">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="<?php echo site_url()?>">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Interface
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Company Management:</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Company Management:</h6>
            <a class="collapse-item" href="<?php echo site_url()?>company_details">List company</a>
            <a class="collapse-item" href="<?php echo site_url()?>clients_list">List of Clients</a>
            <a class="collapse-item" href="<?php echo site_url()?>projects_list">List of Project</a>
            <a class="collapse-item" href="<?php echo site_url()?>SEO_projects">List of SEO Project</a>
        </div>
    </div>
</li>

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseExtra"
        aria-expanded="true" aria-controls="collapseExtra">
        <i class="fas fa-fw fa-cog"></i>
        <span>Client Management</span>
    </a>
    <div id="collapseExtra" class="collapse" aria-labelledby="headingExtra"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Client Details:</h6>
            <a class="collapse-item" href="<?php echo site_url()?>clients_list">List of Clients</a>
            <!-- Add more links as needed -->
        </div>
    </div>
</li>

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseExtra1"
        aria-expanded="true" aria-controls="collapseExtra1">
        <i class="fas fa-fw fa-cog"></i>
        <span>Project Management</span>
    </a>
    <div id="collapseExtra1" class="collapse" aria-labelledby="headingExtra"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Project Details:</h6>
            <a class="collapse-item" href="<?php echo site_url()?>projects_list">List of Project</a>
            <!-- Add more links as needed -->
        </div>
    </div>
</li>

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseExtra2"
        aria-expanded="true" aria-controls="collapseExtra2">
        <i class="fas fa-fw fa-cog"></i>
        <span>SEO Project Management</span>
    </a>
    <div id="collapseExtra2" class="collapse" aria-labelledby="headingExtra"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">SEO Project Details:</h6>
            <a class="collapse-item" href="<?php echo site_url()?>SEO_projects">List of SEO Project</a>
            <!-- Add more links as needed -->
        </div>
    </div>
</li>




<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Utilities</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Utilities:</h6>
            <a class="collapse-item" href="<?php echo site_url()?>utilities_color">Colors</a>
            <a class="collapse-item" href="<?php echo site_url()?>utilities_border">Borders</a>
            <a class="collapse-item" href="<?php echo site_url()?>utilities_animation">Animations</a>
            <a class="collapse-item" href="<?php echo site_url()?>utilities_other">Other</a>
        </div>
    </div>
</li>




<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Addons
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
        aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-folder"></i>
        <span>Pages</span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Login Screens:</h6>
            <a class="collapse-item" href="<?php echo site_url()?>login">Login</a>
            <a class="collapse-item" href="<?php echo site_url()?>register">Register</a>
            <a class="collapse-item" href="<?php echo site_url()?>forgot_password">Forgot Password</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Other Pages:</h6>
            <a class="collapse-item" href="<?php echo site_url()?>404">404 Page</a>
            <a class="collapse-item" href="<?php echo site_url()?>blank">Blank Page</a>
        </div>
    </div>
</li>

<!-- Nav Item - Charts -->
<li class="nav-item">
    <a class="nav-link" href="<?php echo site_url()?>charts">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Charts</span></a>
        
</li>

<!-- Nav Item - Tables -->
<li class="nav-item">
    <a class="nav-link" href="<?php echo site_url()?>tables">
        <i class="fas fa-fw fa-table"></i>
        <span>Tables</span></a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Company Management:</h6>
            <a class="collapse-item" href="<?php echo site_url()?>company_details">List company</a>
            <a class="collapse-item" href="<?php echo site_url()?>clients_list">List of Clients</a>
            <a class="collapse-item" href="<?php echo site_url()?>projects_list">List of Project</a>
            <a class="collapse-item" href="<?php echo site_url()?>SEO_projects">List of SEO Project</a>
        </div>
    </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

<!-- Sidebar Message -->
<!-- <div class="sidebar-card d-none d-lg-flex">
    <img class="sidebar-card-illustration mb-2" src="public/assets/img/undraw_rocket.svg" alt="..."> -->
    <!-- <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p> -->
    <!-- <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a> -->
<!-- </div> --> 

</ul>