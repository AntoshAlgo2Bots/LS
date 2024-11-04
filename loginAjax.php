<?php
include('./dbconnection/db.php');

session_start(); // Start the session

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare a statement to prevent SQL injection
    $query = "SELECT * FROM user_management WHERE user_name = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        // User found
        $user = $result->fetch_assoc();
        
        // Verify the password (assuming password is hashed in the database)
            $_SESSION["username"] = $user['user_name']; // Fix key to match your table
            $_SESSION["role"] = $user['role']; // Assuming the 'role' column exists

            header("Location: dashboard.php");
        
    } else {
        // Handle invalid credentials
        echo "Invalid username or password.";
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection if necessary
$con->close();


?>
