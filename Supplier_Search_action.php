<?php
include("./dbconnection/db.php");
// include("./navForLogged.php");

if (isset($_REQUEST['srch'])) {


    $searchData = $_REQUEST['srch'];
    $db = $con->query("SELECT * FROM supplier_organization_details_tbl a  

JOIN supplier_address_details_tbl b ON a.supplier_code=b.supplier_code

JOIN supplier_banking_details_tbl c ON a.supplier_code=c.supplier_code where a.supplier_code = $searchData");
    $data = mysqli_fetch_assoc($db);


    if ($db) {
        $response["success"] = true;
        $response["message"] = 'user created success fully';
        $response['data'] = $data;

    } else {
        $response['success'] = false;
        $response['message'] = 'something went wrong please try again';
        $response['sql_error'] = mysqli_error($con);
    }

}

if (isset($_REQUEST['srchByName'])) {


    $searchData = $_REQUEST['srchByName'];
    $db = $con->query("SELECT * FROM supplier_organization_details_tbl a  
JOIN supplier_address_details_tbl b ON a.supplier_code=b.supplier_code
JOIN supplier_banking_details_tbl c ON a.supplier_code=c.supplier_code where a.supplier_name = $searchData");
    $data = mysqli_fetch_assoc($db);


    if ($db) {
        $response["success"] = true;
        $response["message"] = 'user created success fully';
        $response['data'] = $data;

    } else {
        $response['success'] = false;
        $response['message'] = 'something went wrong please try again';
        $response['sql_error'] = mysqli_error($con);
    }

}

echo json_encode($response);
?>