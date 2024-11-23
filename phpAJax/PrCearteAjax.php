<?php
session_start();


date_default_timezone_set("Asia/Kolkata");


if (isset($_POST['department_name'])) {
    // if (isset($_REQUEST['department_name'])) {
        $response = [];
        $created_by = 'admin';
        $created_date = date('Y-m-d');
    
        // Prepare the SQL statement
        $sql = "INSERT INTO requisition_table_header(department_name, created_by, created_date) 
                VALUES (?, ?, ?, ?,?)";
    
        // Prepare the statement
        $stmt = $con->prepare($sql);
    
        if ($stmt) {
            // Bind parameters
            $stmt->bind_param(
                'sssss',
                $_REQUEST['department_name'],
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
    // }
    echo json_encode($response);
}



if (isset($_POST['bom_creation_form'])) {
    // Assuming $con is your database connection
    $inputs_data = $_POST['inputsData'];
    // $requisition_id = $_POST['header_id'];
    $response = []; // Initialize response array

    // Prepare the statement for inserting data
    $stmt = $con->prepare("INSERT INTO `requisition_table` (requisition_id, `requisition_type`, `so_number`, `item_name`, `item_code`, `quantity`, `user_remarks`, `price`, `created_by`, `created_date`, `date_hand_hover`, `handover_over_by`, `status`, `final_remarks`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    // Check if the statement was prepared correctly
    if (!$stmt) {
        $response['success'] = false;
        $response['error'] = "Failed to prepare statement: " . $con->error;
        echo json_encode($response);
        exit;
    }

    $user = 'admin';
    $datetime = date('Y-m-d');

    foreach ($inputs_data as $value) {
        // Validate inputs here (add your own validation logic)
        $requisition_id = isset($value['requisition_id']) ? (int)$value['requisition_id'] : null; // Cast to int if needed
        $requisition_type = $value['requisition_type'] ?? null;
        $so_number = $value['so_number'] ?? null;
        $item_name = $value['item_name'] ?? null;
        $item_code = $value['item_code'] ?? null;
        $quantity = isset($value['quantity']) ? (float)$value['quantity'] : null; // Cast to float if needed
        $user_remarks = $value['user_remarks'] ?? null;
        $price = isset($value['price']) ? (float)$value['price'] : null; // Cast to float if needed
        $date_hand_hover = $value['date_hand_hover'] ?? null;
        $handover_over_by = $value['handover_over_by'] ?? null;
        $status = $value['status'] ?? null;
        $final_remarks = $value['final_remarks'] ?? null;

        // Bind parameters and execute the statement
        $stmt->bind_param("isssssssssssss", $requisition_id, $requisition_type, $so_number, $item_name, $item_code, $quantity, $user_remarks, $price, $user, $datetime, $date_hand_hover, $handover_over_by, $status, $final_remarks);

        if (!$stmt->execute()) {
            $response['success'] = false; // Indicate failure
            $response['error'] = "Execution failed: " . $stmt->error; // Capture the error
            break; // Exit loop on first failure
        } else {
            $response['success'] = true; // Indicate success
        }
    }

    // Close the statement
    $stmt->close();
    // Close the connection
    $con->close();

    // Include the original POST data in the response
    $response['data'] = $_POST;

    // Send the response back as JSON
    echo json_encode($response);
}

















?>