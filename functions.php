<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Initialize the videos array if it's not set
if (!isset($_SESSION['videos'])) {
    $_SESSION['videos'] = [];
}

// Add a video
function addVideo($task, $description) {
    // Initialize the videos array if it's not set
    if (!isset($_SESSION['videos'])) {
        $_SESSION['videos'] = [];
    }

    $new_id = count($_SESSION['videos']) + 1;
    $_SESSION['videos'][] = [
        'id' => $new_id,
        'task' => $task,
        'description' => $description
    ];
}

// Get a single video by ID
function getVideoById($id) {
    foreach ($_SESSION['videos'] as $video) {
        if ($video['id'] == $id) {
            return $video;
        }
    }
    return null; // Return null if video with specified ID is not found
}

// Update a video
function editVideo($id, $task, $description) {
    foreach ($_SESSION['videos'] as $key => $video) {
        if ($video['id'] == $id) {
            $_SESSION['videos'][$key] = [
                'id' => $id,
                'task' => $task,
                'description' => $description
            ];
            break;
        }
    }
}

// Delete a video
function deleteVideo($id) {
    foreach ($_SESSION['videos'] as $key => $video) {
        if ($video['id'] == $id) {
            unset($_SESSION['videos'][$key]);
            $_SESSION['videos'] = array_values($_SESSION['videos']); // Re-index array after unsetting
            return true;
        }
    }
    return false; // Return false if no video was found to delete
}
?>
