<?php
include('../dbconnection/db.php');

date_default_timezone_set("Asia/Kolkata");


if (isset($_REQUEST['srch'])) {
    $searchData = $con->real_escape_string($_REQUEST['srch']); // Sanitize input to prevent SQL injection

    $db = $con->query("SELECT * FROM requisition_table_header a INNER JOIN requisition_table b ON a.header_id=b.s_no WHERE a.header_id = '$searchData'"); // Use quotes for string values
    if ($db) {
        // $data = mysqli_fetch_assoc($db);
        if ($db) {
            $response["success"] = true;
            $response["message"] = "Data retrieved successfully";


                        
            $rowData = [];


            while ($row = mysqli_fetch_assoc($db)) {

                $rowData[] = $row;
            }




            $response['data'] = $rowData;
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