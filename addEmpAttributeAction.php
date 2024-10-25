<?php

include("./dbconnection/db.php");

session_start();


$created_by = $_SESSION["username"];
$created_date = date("Y-m-d H:i:s");
$department_name = $_POST["department_name"];
$job_role = $_POST["job_role"];
$start_date = $_POST["start_date"];
$end_date = $_POST["end_date"];

$sql = "INSERT INTO add_emp_attribute(created_by, created_date, department_name, job_role, start_date, end_date) 
VALUES ('$created_by', '$created_date', '$department_name', '$job_role', '$start_date', '$end_date')";

if ($con->query($sql) === TRUE) {
  $response['status'] = true;
  $response['message'] = 'Data Inserted Successfully';
  // echo "New record created successfully";
} else {
  $response['status'] = false;
  $response['message'] = 'Data Not Inserted';
  // echo "Error: " . $sql . "<br>" . $conn->error;

}

echo json_encode($response);

$con->close();




?>