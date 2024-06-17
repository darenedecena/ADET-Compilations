<?php
require_once 'functions.php'; // Adjust the path if needed

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Call the addVideo function from functions.php
    addVideo(
        $_POST['task'],
        $_POST['description']
    );
    // Display a success message
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Task added successfully.
            <button type="button" class="close" data-dismiss="alert" aria-label="
 <span aria-hidden="true">&times;</span>
            </button>
        </div>';
}

?>
<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Add New Task</h3>
    </div>
    <form action="index.php?page=add" method="post">
        <div class="card-body">
            <div class="form-group">
                <label>Task</label>
                <input type="text" class="form-control" name="task" required>
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" name="description"></textarea>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-info">Add Task</button>
            <button type="button" class="btn btn-default" onclick="window.location.href='index.php?page=view';">Cancel</button>
        </div>
    </form>
</div>
