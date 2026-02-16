<!-- This file defines the Database class, which is responsible for establishing a connection to the MySQL database using PDO. The class contains properties for the database host, name, username, and password, as well as a method to get the database connection. The getConnection method attempts to create a new PDO instance with the specified database credentials and sets the error mode to exception. If the connection fails, it catches the PDOException and terminates the script with an error message. The method returns the established database connection for use in other parts of the application. -->
<?php
class Database {
    private $host = "localhost";
    private $db_name = "student_app_db";
    private $username = "root";
    private $password = "";
    public $conn;

    // Get the database connection
    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new PDO(
                "mysql:host={$this->host};dbname={$this->db_name};charset=utf8mb4",
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            die("Database connection error: " . $e->getMessage());
        }

        return $this->conn; // Return the established database connection for use in other parts of the application
    }
}
