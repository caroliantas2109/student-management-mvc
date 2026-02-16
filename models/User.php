<!--in this file we will create a User class that will handle all user-related operations such as registration and login. We will use PDO for database interactions to ensure security and prevent SQL injection.--> 

<?php
require_once __DIR__ . "/../config/db.php";

class User {
    private $conn; // Database connection

    public function __construct() {
        $db = new Database(); // Create a new instance of the Database class
        $this->conn = $db->getConnection(); // Get the database connection and assign it to the $conn property
    }

    // Create new user (register)
    public function create($username, $email, $password) {
        $hash = password_hash($password, PASSWORD_DEFAULT); // Hash the password for security

        $sql = "INSERT INTO users (username, email, password_hash)
                VALUES (?, ?, ?)"; // Prepare the SQL statement to insert a new user into the database

        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$username, $email, $hash]); // Execute the statement with the provided username, email, and hashed password
    }

    // Find user by email (for login)
    public function findByEmail($email) {
        $sql = "SELECT * FROM users WHERE email = ? LIMIT 1"; // Prepare the SQL statement to select a user by email from the database

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$email]); // Execute the statement with the provided email

        return $stmt->fetch(PDO::FETCH_ASSOC); // Fetch the user data as an associative array and return it
    }
}