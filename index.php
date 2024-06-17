<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do-List-App</title>
    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2.0/dist/css/adminlte.min.css">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Custom CSS for background image -->
    <style>
        body {
            background-position: center center;
            height: 100vh;
            margin: 0;
            padding: 0;
            background-color: #E6C97E; /* Background color for the whole page */
        }
        .brand-link {
            background-color: #007bff !important; /* Background color for the title */
            color: #E6C97E !important; /* Text color for the title */
        }
    </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Navbar -->
    <?php include 'menu.php'; ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <?php
                $page = isset($_GET['page']) ? $_GET['page'] : 'home'; // Default to home page if no specific page request
                switch ($page) {
                    case 'add':
                        include 'add.php';
                        break;
                    case 'edit':
                        include 'edit.php';
                        break;
                    case 'delete':
                        include 'delete.php';
                        break;
                    case 'view':
                        include 'view.php';
                        break;
                    case 'view_single':
                        include 'view_single.php';
                        break;
                    default:
                        echo '<div class="alert alert-info">Welcome to the your own TO-DO-LIST APP!</div>';
                        break;
                }
                ?>
            </div>
        </section>
    </div>
    <!-- Main Footer -->
    <footer class="main-footer">
        <strong>Copyright &copy; Snoopy.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.2.0
        </div>
    </footer>
</div>
<!-- REQUIRED SCRIPTS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2.0/dist/js/adminlte.min.js"></script>
</body>
</html>
