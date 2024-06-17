<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<!-- Main Sidebar Container -->
<aside class="main-sidebar" style="background-image: url('https://i.pinimg.com/564x/97/72/17/97721728e64ab3549991d185294d9434.jpg'); background-size: cover; background-repeat: no-repeat;">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link" style="background-color: #85A1F2;">
        <span class="brand-text font-weight-light" style="color: #FFFFFF;">To-Do</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="background-color: #8BC6FC;">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="index.php?page=add" class="nav-link" style="color: #fff;">
                        <i class="nav-icon fas fa-plus-square" style="color: #fff;"></i>
                        <p>Add Task</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?page=view" class="nav-link" style="color: #fff;">
                        <i class="fas fa-stream" style="color: #fff;"></i>
                        <p>View Tasks</p>
                    </a>
                </li>
                <!-- Logout Link -->
                <li class="nav-item">
                    <a href="logout.php" class="nav-link" style="color: #fff;">
                        <i class="nav-icon fas fa-sign-out-alt" style="color: #fff;"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <!-- /.sidebar -->
</aside>
