<?php

include("./db/db.php");




$created_by = $_POST["created_by"];
$created_date = $_POST["created_date"];
$main_head_name = $_POST["main_head_name"];
$sub_main_name = $_POST["sub_main_name"];
$start_date = $_POST["start_date"];
$end_date = $_POST["end_date"];

$sql = "INSERT INTO add_attribute(created_by, created_date, main_head_name, sub_main_name, start_date, end_date) 
VALUES ('$created_by', '$created_date', '$main_head_name', '$sub_main_name', '$start_date', '$end_date')";

if ($conn->query($sql) === TRUE) {
  $response['status'] = true;
  $response['message'] = 'Data Inserted Successfully';
  // echo "New record created successfully";
} else {
  $response['status'] = false;
  $response['message'] = 'Data Not Inserted';
  // echo "Error: " . $sql . "<br>" . $conn->error;

}

echo json_encode($response);

$conn->close();




?>