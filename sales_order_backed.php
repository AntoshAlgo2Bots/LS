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
        $itemQty = filter_input(INPUT_POST, 'item_qty[]', FILTER_SANITIZE_NUMBER_INT);
        $itemRate = filter_input(INPUT_POST, 'item_rate', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $itemTotal = filter_input(INPUT_POST, 'item_total[]', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $itemSoNumber = filter_input(INPUT_POST, 'item_so_number', FILTER_SANITIZE_NUMBER_INT);
        $createdBy = filter_input(INPUT_POST, 'created_by', FILTER_SANITIZE_STRING);
        $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);

        // Validate and set defaults for quantity and other fields if necessary
        $itemQty = $itemQty !== null && $itemQty !== '' ? (int) $itemQty : 0; // Default to 0 if empty
        $itemRate = $itemRate !== null && $itemRate !== '' ? (float) $itemRate : 0.0; // Default to 0.0 if empty
        $itemTotal = $itemTotal !== null && $itemTotal !== '' ? (float) $itemTotal : 0.0; // Default to 0.0 if empty

        // Escape values for use in SQL
        $itemSerialNo = $pdo->quote($itemSerialNo);
        $itemName = $pdo->quote($itemName);
        $itemQty = (int) $itemQty; // Cast to int
        $itemRate = (float) $itemRate; // Cast to float
        $itemTotal = (float) $itemTotal; // Cast to float
        $itemSoNumber = (int) $itemSoNumber; // Cast to int
        $createdBy = $pdo->quote($createdBy);
        $status = $pdo->quote($status);

        // Construct the SQL statement
        $sql = "INSERT INTO items (item_serial_no, item_name, item_qty, item_rate, item_total, item_so_number, created_by, status) 
                VALUES ($itemSerialNo, $itemName, $itemQty, $itemRate, $itemTotal, $itemSoNumber, $createdBy, $status)";

        // Execute the SQL statement
        $pdo->exec($sql);

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