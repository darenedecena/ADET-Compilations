<?php
session_start();

$register_error = '';
$register_success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirmPassword = trim($_POST['confirmPassword']);

    if (empty($username) || empty($email) || empty($password) || empty($confirmPassword)) {
        $register_error = 'All fields are required.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $register_error = 'Invalid email address.';
    } elseif ($password !== $confirmPassword) {
        $register_error = 'Passwords do not match.';
    } else {
        // File to store user data
        $file = 'users.json';

        // Read existing users from the file
        if (file_exists($file)) {
            $users = json_decode(file_get_contents($file), true);
        } else {
            $users = [];
        }

        // Check if the username or email already exists
        foreach ($users as $user) {
            if ($user['username'] == $username || $user['email'] == $email) {
                $register_error = 'Username or email already exists.';
                break;
            }
        }

        // If no errors, save the new user
        if (empty($register_error)) {
            $newUser = [
                'username' => $username,
                'email' => $email,
                'password' => password_hash($password, PASSWORD_DEFAULT)
            ];
            $users[] = $newUser;
            file_put_contents($file, json_encode($users));
            $register_success = 'Registration successful. <a href="login.php">Login here</a>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        .form-control.error {
            border-color: #dc3545 !important;
        }
        .error-message {
            color: #dc3545;
            font-size: 0.875rem;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title text-center">Register</h3>

                    <?php if ($register_error): ?>
                        <div class="alert alert-danger"><?= $register_error ?></div>
                    <?php endif; ?>

                    <?php if ($register_success): ?>
                        <div class="alert alert-success"><?= $register_success ?></div>
                    <?php endif; ?>

                    <form id="registerForm" action="register.php" method="POST">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                            <div class="invalid-feedback error-message" id="usernameError"></div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                            <div class="invalid-feedback error-message" id="emailError"></div>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                            <div class="invalid-feedback error-message" id="passwordError"></div>
                        </div>
                        <div class="form-group">
                            <label for="confirmPassword">Confirm Password</label>
                            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                            <div class="invalid-feedback error-message" id="confirmPasswordError"></div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </form>
                    <div class="text-center mt-3">
                        <p>Already have an account? <a href="login.php">Login here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Custom script for form validation -->
<script>
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            var form = document.getElementById('registerForm');
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        }, false);
    })();
</script>

</body>
</html>