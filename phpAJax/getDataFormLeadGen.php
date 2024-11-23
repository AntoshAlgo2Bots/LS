<?php

include("../dbconnection/db.php");

date_default_timezone_set("Asia/Kolkata");


$query = isset($_GET['query']) ? $_GET['query'] : '';


$query = $con->real_escape_string($query);


$sql = "SELECT a.*, b.*, c.item_so_number FROM lead_details_header_form a inner JOIN lead_details_middle_level_form b ON
 a.record_no=b.record_no inner JOIN lead_details_items c ON  b.record_no = c.record_id where a.lead_source LIKE '%$query%'";
$result = $con->query($sql);

$data = [];


if ($result) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    $response["success"] = true ;


    $response["message"] = "Data fetchded success fully" ;
    $response["data"] = $data ;


}








echo json_encode($response);

?>