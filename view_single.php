<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once 'functions.php'; // Include the functions.php file

if (isset($_GET['id'])) {
    $video = getVideoById($_GET['id']);
    if ($video !== null) {
?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Task Details</h3>
    </div>
    <div class="card-body">
        <p><strong>Task:</strong> <?php echo htmlspecialchars($video['task']); ?></p>
        <p><strong>Description:</strong> <?php echo htmlspecialchars($video['description']); ?></p>
    </div>
    <div class="card-footer">
        <button type="button" class="btn btn-secondary" onclick="history.back();">Back</button>
    </div>
</div>
<?php
    } else {
        echo '<div class="alert alert-warning">task not found.</div>';
    }
} else {
    echo '<div class="alert alert-danger">No task ID specified.</div>';
}
?>
