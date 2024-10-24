<?php
session_start();

include('../dbconnection/db.php');

// $created_by = $_SESSION["created_by"];
date_default_timezone_set("Asia/Kolkata");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {







  if (isset($_POST['leadGenReateToDbhHeader'])) {



    $created_by = $_SESSION["username"];
    $created_date = date('Y-m-d H:i:s');
    $lead_source = $_POST['lead_source'];
    $ref_By = $_POST['ref_By'];
    $ref_phone_no = $_POST['ref_phone_no'];
    $lead_type = $_POST['lead_type'];
    $contact_person_name = $_POST['contact_person_name'];
    $contact_person_phone_no = $_POST['contact_person_phone_no'];
    $contact_person_email = $_POST['contact_person_email'];
    $contact_person_address = $_POST['contact_person_address'];
    $lead_received_date = $_POST['lead_received_date'];


    $sql = "INSERT INTO lead_details_header_form(created_by, created_date, lead_source, ref_By, ref_phone_no, lead_type, contact_person_name, contact_person_phone_no, contact_person_email, contact_person_address, lead_received_date) 
VALUES('$created_by','$created_date', '$lead_source', '$ref_By', '$ref_phone_no', '$lead_type', '$contact_person_name', '$contact_person_phone_no', '$contact_person_email', '$contact_person_address', '$lead_received_date')";

    $response = [];

    if ($con->query($sql) === TRUE) {
      $response['status'] = true;
      $response['message'] = 'data successfylly inserted';
      $record_id = $con->insert_id;
      $response['Record_Number'] = $record_id;



      // echo "data inserted";
    } else {
      // echo "Error: " . $sql . "<br>" . $con->error;
      $response['status'] = false;
    }
   


    echo json_encode($response);

    $con->close();
  }







  if (isset($_POST['leadGenReateToDbhMiddle'])) {



    $record_no = $_POST['record_no'];
    $created_date = date('Y-m-d H:i:s');
    $assigned_to = $_POST['assigned_to'];
    $query_start_date = $_POST['query_start_date'];
    $follow_up = $_POST['follow_up'];
    $followup_reminder_frequency = $_POST['followup_reminder_frequency'];
    $no_of_times = $_POST['no_of_times'];
    $query_end_date = $_POST['query_end_date'];
    $installation_required = $_POST['installation_required'];
    $tentative_installation = $_POST['tentative_installation'];
    $tentative_delivery_date = $_POST['tentative_delivery_date'];

    $sql = "INSERT INTO for_office.lead_details_middle_level_form(record_no, created_date, assigned_to, query_start_date, follow_up, followup_reminder_frequency, no_of_times, query_end_date, installation_required, tentative_installation, tentative_delivery_date) 
    VALUES ('$record_no','$created_date', '$assigned_to', '$query_start_date', '$follow_up', '$followup_reminder_frequency', '$no_of_times', '$query_end_date', '$installation_required', '$tentative_installation', '$tentative_delivery_date')";


    $response = [];

    if ($con->query($sql) === TRUE) {
      $response['status'] = true;
      $response['message'] = 'data successfylly inserted';

    } else {
      // echo "Error: " . $sql . "<br>" . $con->error;
      $response['status'] = false;
    }
    echo json_encode($response);


    // echo json_encode($response);

    $con->close();


    
    
    
  }

}




?>