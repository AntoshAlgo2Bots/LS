<?php
$con = mysqli_connect("localhost", "root", "Algo@123", "for_office");

if (!$con) {
    die(json_encode(["success" => false, "message" => "Connection failed: " . mysqli_connect_error()]));
}



if (isset($_REQUEST['srch'])) {
    $searchData = $con->real_escape_string($_REQUEST['srch']); // Sanitize input to prevent SQL injection

    $db = $con->query("SELECT *
FROM for_office.requisition_header_level a
JOIN for_office.requisition_line_level b ON a.header_id = b.requisition_id
WHERE a.header_id = '$searchData'"); // Use quotes for string values
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