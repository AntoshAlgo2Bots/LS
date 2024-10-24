<?php

include('../dbconnection/db.php');


$record_no = $_POST['record_no'];
$follow_up_start_date = $_POST['follow_up_start_date'];
$follow_up_end_date = $_POST['follow_up_end_date'];
$remarks = $_POST['remarks'];
$remind_date = $_POST['remind_date'];


$sql = "INSERT INTO lead_gen_followup_data (record_no, follow_up_start_date, follow_up_end_date, remarks, remind_date) 
VALUES ('$record_no','$follow_up_start_date', '$follow_up_end_date', '$remarks', '$remind_date')";

$response = [];

if ($con->query($sql) === TRUE) {
  // echo "Record updated successfully";
  $response['status'] = 'success';
  $response['message']='Data Added Successfully';
  
} else {
  $response['status'] = 'false';
  $response['message']='Data Not Addeed';
  // echo "Error updating record: " . $conn->error;
}

echo json_encode( $response );






?>