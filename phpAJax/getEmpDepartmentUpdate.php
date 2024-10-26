<?php

include('../dbconnection/db.php');

header('Content-Type: application/json'); // Set the response content type to JSON

$response = []; // Initialize a response array

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['department_name'])) {
        $departmentName = $_POST['department_name'];
        $departmentName = mysqli_real_escape_string($con, $departmentName);

        $sql = "SELECT DISTINCT job_role FROM add_emp_attribute WHERE department_name = '$departmentName'";
        $result = mysqli_query($con, $sql);

        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                $response['success'] = true;
                while ($row = mysqli_fetch_assoc($result)) {
                    $response['jobRoles'][] = $row['job_role']; // Collect all job roles
                }
            } else {
                $response['message'] = "No job roles found for the specified department.";
            }
        } else {
            $response['message'] = "Query execution failed: " . mysqli_error($con);
        }
    } else {
        $response['message'] = "No department name provided.";
    }

    // echo json_encode($response);
}
header('Content-Type: application/json');
// Send the JSON response back to the frontend
echo json_encode($response);
?>