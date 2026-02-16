<!--This file is the AuthController.php which will handle user authentication-related actions such as showing the registration and login forms, processing registration and login requests, and logging out users. It interacts with the User model to perform database operations related to users.-->

<?php
require_once __DIR__ . "/../models/User.php";

class AuthController {

    public function showRegister() { // Show the registration form
        require __DIR__ . "/../views/auth/register.php"; // Include the registration view which contains the HTML form for user registration
    }

    public function showLogin() {
        require __DIR__ . "/../views/auth/login.php"; // Include the login view which contains the HTML form for user login
    }

    public function register() {
        $username = trim($_POST['username'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        if ($username === '' || $email === '' || $password === '') {
            $_SESSION['error'] = "Please fill all fields.";
            header("Location: index.php?action=register");
            exit; // If any of the fields are empty, set an error message in the session and redirect back to the registration page
        }

        $userModel = new User(); // Create a new instance of the User model to interact with the users table in the database

        // Check if email already exists
        if ($userModel->findByEmail($email)) {
            $_SESSION['error'] = "Email already registered.";
            header("Location: index.php?action=register");
            exit; // If the email is already registered, set an error message in the session and redirect back to the registration page
        }

        $userModel->create($username, $email, $password);

        $_SESSION['success'] = "Account created! Please login.";
        header("Location: index.php?action=login");
        exit; // After successful registration, set a success message in the session and redirect to the login page
    }

    public function login() {
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        if ($email === '' || $password === '') {
            $_SESSION['error'] = "Please fill all fields.";
            header("Location: index.php?action=login");
            exit; // If either the email or password field is empty, set an error message in the session and redirect back to the login page
        }

        $userModel = new User();
        $user = $userModel->findByEmail($email);

        if (!$user || !password_verify($password, $user['password_hash'])) {
            $_SESSION['error'] = "Invalid email or password.";
            header("Location: index.php?action=login");
            exit; // If the user is not found or the password does not match, set an error message in the session and redirect back to the login page
        }

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];

        header("Location: index.php?action=students");
        exit; // If login is successful, store the user's ID and username in the session and redirect to the students page
    }

    public function logout() {
        session_destroy();
        header("Location: index.php?action=login");
        exit; // Destroy the session to log out the user and redirect to the login page
    }
}