<?php
// $con=mysqli_connect("localhost","root","Algo@123","for_office") or die("connection failed");

session_start();

include('../dbconnection/db.php');

date_default_timezone_set("Asia/Kolkata");

$createdby= $_SESSION['username'];
$created_date=date('d-m-Y');

if (isset($_REQUEST['organization_name'])) {
    // Prepare an SQL statement
    $stmt = $con->prepare("INSERT INTO warehouse_deatails(organization_name, organaization_code, location, start_date, end_date, status, gst_number, pan_number, tan_number, tin_number, state, created_by, created_date) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?)");

    // Bind parameters
    $stmt->bind_param("sssssssssssss", 
        $_REQUEST['organization_name'],
        $_REQUEST['organaization_code'],
        $_REQUEST['location'],
        $_REQUEST['start_date'],
        $_REQUEST['end_date'],
        $_REQUEST['status'],
        $_REQUEST['gst_number'],
        $_REQUEST['pan_number'],
        $_REQUEST['tan_number'],
        $_REQUEST['tin_number'],
        $_REQUEST['state'],
        $createdby,     
        $created_date   
    );

    // Execute the statement and check for success
    if ($stmt->execute()) {
        $response["success"] = true;
        $response["message"] = "User created successfully";
        $response['inserted_id'] = $stmt->insert_id;
    } else {
        $response['success'] = false;
        $response['message'] = 'Something went wrong, please try again';
        $response['sql_error'] = $stmt->error;
    }

    // Close the statement
    $stmt->close();
}




if (isset($_REQUEST['srch'])) {


    $searchData = $_REQUEST['srch'] ;
    $db = $con->query("SELECT * FROM warehouse_deatails where warehouse_id = $searchData"); 
    $data=mysqli_fetch_assoc($db);
    

    if ($db) {
        $response["success"] = true;
        $response["message"] = 'user created success fully';
        $response['data']  = $data;

    } else {
        $response['success'] = false;
        $response['message'] = 'something went wrong please try again';
        $response['sql_error'] = mysqli_error($con);
    }

}           

echo json_encode($response);

?>