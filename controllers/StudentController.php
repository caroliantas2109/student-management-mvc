<!-- This is the StudentController class, which is responsible for handling requests related to student management in the application. It includes methods for listing all students, showing the form to create a new student, processing the creation of a new student, and deleting a student. The controller interacts with the Student model to perform database operations and uses views to render the appropriate HTML output for each action. The controller also handles form validation and sets session messages for success or error feedback to the user. -->
<?php
require_once __DIR__ . "/../models/Student.php";

class StudentController {
  // List all students
    public function index() {
        $model = new Student();
        $students = $model->all();
        require __DIR__ . "/../views/students/index.php";
    }
  // Show the form to create a new student
    public function showCreate() {
        require __DIR__ . "/../views/students/create.php";
    }
  // Process the creation of a new student
    public function store() {
        $student_id = trim($_POST['student_id'] ?? '');
        $name = trim($_POST['name'] ?? '');
        $email = trim($_POST['email'] ?? '');

        if ($student_id === '' || $name === '' || $email === '') {
            $_SESSION['error'] = "Please fill all fields.";
            header("Location: index.php?action=student_create");
            exit;
        }

        $model = new Student();
        $model->create($student_id, $name, $email);

        $_SESSION['success'] = "Student added successfully!";
        header("Location: index.php?action=students");
        exit; // After successfully creating a new student, set a success message in the session and redirect to the students listing page
    }

  // Delete a student
    public function delete() {
        $id = $_GET['id'] ?? null;

        if ($id) {
            $model = new Student();
            $model->deleteById($id);
        }

        header("Location: index.php?action=students");
        exit;
    }
}
