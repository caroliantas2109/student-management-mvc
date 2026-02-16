<!-- This file serves as the main entry point for the student management application. It starts a session, includes necessary configuration and controller files, and handles routing based on the 'action' parameter in the URL. Depending on the action specified, it calls the appropriate method from the AuthController or StudentController to display views or perform actions such as login, registration, student management, etc. If a user is not logged in and tries to access a protected action, it redirects them to the login page. -->
<?php
session_start();

require_once __DIR__ . "/config/db.php";
require_once __DIR__ . "/controllers/AuthController.php";
require_once __DIR__ . "/controllers/StudentController.php";

$action = $_GET['action'] ?? 'login';

$auth = new AuthController();
$students = new StudentController();

// Actions that don't require login
$publicActions = ['login', 'register', 'do_login', 'do_register', 'logout'];

// If not logged in, force login page
if (!isset($_SESSION['user_id']) && !in_array($action, $publicActions)) {
    header("Location: index.php?action=login");
    exit;
}

switch ($action) {
    case 'register':
        $auth->showRegister();
        break;

    case 'do_register':
        $auth->register();
        break;

    case 'login':
        $auth->showLogin();
        break;

    case 'do_login':
        $auth->login();
        break;

    case 'logout':
        $auth->logout();
        break;

    case 'students':
        $students->index();
        break;

    case 'student_create':
        $students->showCreate();
        break;

    case 'student_store':
        $students->store();
        break;

    case 'student_delete':
        $students->delete();
        break;

    default:
        header("Location: index.php?action=login");
        exit;
}
