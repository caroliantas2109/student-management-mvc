<!-- This file defines the Student class, which is responsible for managing student records in the database. The class includes methods for retrieving all students, creating a new student, and deleting a student by ID. The constructor establishes a connection to the database using the Database class defined in the config/db.php file. The all method retrieves all student records from the database and returns them as an associative array. The create method inserts a new student record into the database with the provided student ID, name, and email. The deleteById method deletes a student record from the database based on the provided ID. -->
<?php
require_once __DIR__ . "/../config/db.php";

class Student {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function all() {
        $sql = "SELECT * FROM students ORDER BY id DESC";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($student_id, $name, $email) {
        $sql = "INSERT INTO students (student_id, name, email)
                VALUES (?, ?, ?)";

        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$student_id, $name, $email]);
    }

    public function deleteById($id) {
        $sql = "DELETE FROM students WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$id]);
    }
}
