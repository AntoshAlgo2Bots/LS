<?php

include('../dbconnection/db.php');


$recordNo = $_POST["record_no"];
$assigned_to = $_POST['assigned_to'];
$query_start_date = $_POST['query_start_date'];
$follow_up = $_POST['follow_up'];
$followup_reminder_frequency = $_POST['followup_reminder_frequency'];
$no_of_times = $_POST['no_of_times'];
$query_end_date = $_POST['query_end_date'];
$installation_required = $_POST['installation_required'];
$tentative_installation = $_POST['tentative_installation'];
$tentative_delivery_date = $_POST['tentative_delivery_date'];

$sql = "INSERT INTO lead_details_middle_level_form(record_no, assigned_to, query_start_date, follow_up, followup_reminder_frequency, no_of_times, query_end_date, installation_required, tentative_installation, tentative_delivery_date) 
VALUES ('$recordNo', '$assigned_to', '$query_start_date', '$follow_up', '$followup_reminder_frequency', '$no_of_times', '$query_end_date', '$installation_required', '$tentative_installation', '$tentative_delivery_date')";

$response = [];

if ($con->query($sql) === TRUE) {
  // echo "Record updated successfully";
  $response['status'] = 'success';
  $response['message']='Data Added Successfully';

} else {
  echo "Error updating record: " . $con->error;
}

echo json_encode( $response );




?>