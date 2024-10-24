<?php
// Database connection
$host = 'localhost'; 
$username = 'root'; 
$password = 'root'; 
$db_name = 'finished_goods'; 

try {
    // Create a new PDO instance
    $pdo = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}

// Check if the form data is sent via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the data from the form
    $item_serial_no = $_POST['item_serial_no'];
    $item_name = $_POST['item_name'];
    $item_qty = $_POST['item_qty'];
    $item_rate = $_POST['item_rate'];
    $item_total = $_POST['item_total'];
    $item_so_number = $_POST['item_so_number'];
    $created_by = $_POST['created_by'];
    $status = $_POST['status'];

    // Construct the SQL statement using prepared statement
    $sql = "INSERT INTO items (item_serial_no, item_name, item_qty, item_rate, item_total, item_so_number, created_by, status) 
            VALUES (:item_serial_no, :item_name, :item_qty, :item_rate, :item_total, :item_so_number, :created_by, :status)";

    // Prepare the statement
    $stmt = $pdo->prepare($sql);

    // Bind parameters
    $stmt->bindParam(':item_serial_no', $item_serial_no);
    $stmt->bindParam(':item_name', $item_name);
    $stmt->bindParam(':item_qty', $item_qty, PDO::PARAM_INT);
    $stmt->bindParam(':item_rate', $item_rate);
    $stmt->bindParam(':item_total', $item_total);
    $stmt->bindParam(':item_so_number', $item_so_number);
    $stmt->bindParam(':created_by', $created_by);
    $stmt->bindParam(':status', $status);

    // Execute the prepared statement
    if ($stmt->execute()) {
        echo "New record created successfully.";
    } else {
        echo "Error: Could not execute the query.";
    }
} else {
    echo "Invalid request method.";
}
?>
