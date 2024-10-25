<?php
include('./dbconnection/db.php');


// Search operation
if (isset($_REQUEST['srch'])) {
    $searchData = $con->real_escape_string($_REQUEST['srch']); // Sanitize input to prevent SQL injection

    $db = $con->query("SELECT *
FROM employee_head a
INNER JOIN employee_info_line b ON a.id = b.employee_id
WHERE a.id = '$searchData'"); // Use quotes for string values
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