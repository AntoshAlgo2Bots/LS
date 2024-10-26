<?php
include('./dbconnection/db.php');

$response = [];

// Insert operation
if (isset($_REQUEST['po_number'])) {
    $created_by = 'admin';
    $created_date = date('Y-m-d');
    $updated_by = 'rg1';
    $updated_date = date('Y-m-d H:i:s'); // Use Y-m-d H:i:s format

    // Prepare the SQL statement
    $sql = "INSERT INTO gate_entry_form_tbl (po_number, invoice_number, no_of_boxes, fireght_charges, weight, mode_of_transport, vehicle_number, recieved_by, vendor_name, received_date, received_time, item_name, finish, dimension, box_detail, checked_by, approved_by, remarks, created_by, created_date, updated_by, updated_date) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)";

    // Prepare the statement
    $stmt = $con->prepare($sql);

    if ($stmt) {
        // Bind parameters
        $stmt->bind_param(
            'isssssssssssssssssssss',
            $_REQUEST['po_number'],
            $_REQUEST['invoice_number'],
            $_REQUEST['no_of_boxes'],
            $_REQUEST['fireght_charges'], // Corrected here
            $_REQUEST['weight'],
            $_REQUEST['mode_of_transport'],
            $_REQUEST['vehicle_number'],
            $_REQUEST['recieved_by'],           
            $_REQUEST['vendor_name'],
            $_REQUEST['received_date'],
            $_REQUEST['received_time'],
            $_REQUEST['item_name'],
            $_REQUEST['finish'],
            $_REQUEST['dimension'],
            $_REQUEST['box_detail'],
            $_REQUEST['checked_by'],
            $_REQUEST['approved_by'],
            $_REQUEST['remarks'],
            $created_by,
            $created_date,
            $updated_by,
            $updated_date
        );

        // Execute the statement
        if ($stmt->execute()) {
            $response["success"] = true;
            $response["message"] = 'Entry created successfully';
            $response['inserted_id'] = $stmt->insert_id;
        } else {
            $response['success'] = false;
            $response['message'] = 'Something went wrong, please try again';
            $response['sql_error'] = $stmt->error;
        }

        $stmt->close();
    } else {
        $response['success'] = false;
        $response['message'] = 'Statement preparation failed: ' . $con->error;
    }
}

// Search operation
if (isset($_REQUEST['srch'])) {
    $searchData = $con->real_escape_string($_REQUEST['srch']); // Sanitize input to prevent SQL injection

    $db = $con->query("SELECT * FROM gate_entry_form_tbl WHERE s_no = '$searchData'"); // Use quotes for string values
    if ($db) {
        $data = mysqli_fetch_assoc($db);
        if ($data) {
            $response["success"] = true;
            $response["message"] = "Data retrieved successfully";
            $response['data'] = $data;
        } else {
            $response['success'] = false;
            $response['message'] = "No results found.";
        }
    } else {
        $response['success'] = false;
        $response['message'] = "Query failed: " . mysqli_error($con);
    }
}

$con->close();
echo json_encode($response);
?>
