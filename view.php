<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$videos = isset($_SESSION['videos']) ? $_SESSION['videos'] : [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View All Tasks</title>
    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2.0/dist/css/adminlte.min.css">
    <style>
        .custom-card {
            max-width: 120%; /* Adjust the width as needed */
            margin: 0 auto;
        }
    </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>All Tasks</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card custom-card">
                    <div class="card-header">
                        <h3 class="card-title">All Tasks</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Task</th>
                                        <th>description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (count($videos) > 0) {
                                        foreach ($videos as $video) {
                                            echo "<tr>";
                                            echo "<td>" . htmlspecialchars($video['task']) . "</td>";
                                            echo "<td>" . htmlspecialchars($video['description']) . "</td>";
                                            echo "<td>
                                                <a href='index.php?page=edit&id={$video['id']}' class='btn btn-info'>Edit</a>
                                                <a href='index.php?page=delete&id={$video['id']}' class='btn btn-danger'>Delete</a>
                                                <a href='index.php?page=view_single&id={$video['id']}' class='btn btn-primary'>View Details</a>
                                                </td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='4' class='text-center'>No tasls found</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- /.content-wrapper -->
    <!-- Main Footer -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2023 Your Company.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.2.0
        </div>
    </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2.0/dist/js/adminlte.min.js"></script>
</body>
</html>
