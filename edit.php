<?php
require_once 'functions.php'; // Adjust the path if needed

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Call to editVideo function here
    editVideo(
        $_GET['id'],
        $_POST['task'],
        $_POST['description']
    );
    echo '<div class="alert alert-success">Task updated successfully.</div>';
}

if (isset($_GET['id'])) {
    // Call to getVideoById function here
    $video = getVideoById($_GET['id']);
    if ($video !== null) {
?>
<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Edit Task</h3>
    </div>
    <form action="index.php?page=edit&id=<?php echo $video['id']; ?>" method="post">
        <div class="card-body">
            <div class="form-group">
                <label>Task</label>
                <input type="text" class="form-control" name="task" value="<?php echo htmlspecialchars($video['task']); ?>" required>
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" name="description"><?php echo isset($video['description']) ? htmlspecialchars($video['description']) : ''; ?></textarea>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" name="submit" class="btn btn-info">Update Task</button>
            <button type="button" class="btn btn-default" onclick="window.location.href='index.php?page=view';">Cancel</button>
        </div>
    </form>
</div>
<?php
    } else {
        echo '<div class="alert alert-warning">Video not found.</div>';
    }
} else {
    echo '<div class="alert alert-danger">No video ID specified.</div>';
}
?>
