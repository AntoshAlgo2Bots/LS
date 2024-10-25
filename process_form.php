<?php
// Database configuration
$host = 'localhost'; // Database host
$dbname = 'finished_goods'; // Database name
$username = 'root'; // Database username
$password = 'root'; // Database password

try {
    // Create a new PDO instance
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Collect and sanitize form data
        $itemSerialNo = filter_input(INPUT_POST, 'item_serial_no', FILTER_SANITIZE_STRING);
        $itemName = filter_input(INPUT_POST, 'item_name', FILTER_SANITIZE_STRING);
        $itemQty = filter_input(INPUT_POST, 'item_qty', FILTER_SANITIZE_NUMBER_INT);
        $itemRate = filter_input(INPUT_POST, 'item_rate', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $itemTotal = filter_input(INPUT_POST, 'item_total', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $itemSoNumber = filter_input(INPUT_POST, 'item_so_number', FILTER_SANITIZE_NUMBER_INT);
        $createdBy = filter_input(INPUT_POST, 'created_by', FILTER_SANITIZE_STRING);
        $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);

        // Prepare an SQL statement for execution
        $stmt = $pdo->prepare("INSERT INTO items (item_serial_no, item_name, item_qty, item_rate, item_total, item_so_number, created_by, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        
        // Execute the statement with the form data
        $stmt->execute([$itemSerialNo, $itemName, $itemQty, $itemRate, $itemTotal, $itemSoNumber, $createdBy, $status]);

        // Return a success response
        $response = [
            'status' => 'success',
            'message' => 'Data successfully inserted',
            'data' => [
                'serial_no' => $itemSerialNo,
                'name' => $itemName,
                'qty' => $itemQty,
                'rate' => $itemRate,
                'total' => $itemTotal,
                'so_number' => $itemSoNumber,
                'created_by' => $createdBy,
                'status' => $status,
            ]
        ];

        header('Content-Type: application/json');
        echo json_encode($response);
    } else {
        // Invalid request method
        http_response_code(405);
        echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
    }
} catch (PDOException $e) {
    // Handle connection error
    echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
}
?>
