<?php

include("./dbconnection/db.php");

date_default_timezone_set("Asia/Kolkata");


$created_by = $_POST["created_by"];
$created_date = $_POST["created_date"];
$lead_source = $_POST["lead_source"];
$lead_type = $_POST["lead_type"];
$start_date = $_POST["start_date"];
$end_date = $_POST["end_date"];

$sql = "INSERT INTO lead_gen_attributes(created_by, created_date, lead_source, lead_type, start_date, end_date) 
VALUES ('$created_by', '$created_date', '$lead_source', '$lead_type', '$start_date', '$end_date')";

if ($con->query($sql) === TRUE) {
  $response['status'] = true;
  $response['message'] = 'Attribute Added Successfully';
  // echo "New record created successfully";
} else {
  $response['status'] = false;
  $response['message'] = 'Atrribute Not Added';
  // echo "Error: " . $sql . "<br>" . $con->error;

}

header('Content-Type: application/json');
echo json_encode($response);

$con->close();




?>