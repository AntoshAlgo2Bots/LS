<?php
session_start();




// if ($_SERVER['REQUEST_METHOD'] == 'GET') {





//     if (isset($_GET['getLineDataByPoNumber'])) {

//         // include('../db.php');
//         include('../dbconnection/db.php');

//         $ponumber = $_GET['po_id'];
//         $response['ponumber is '] = $ponumber;


//         $sql = "SELECT * FROM purchase_order_line where po_number=$ponumber; ";


//         $result = mysqli_query($con, $sql);




//         if ($result) {

//             $data = [];



//             while ($row = mysqli_fetch_assoc($result)) {


//                 $data[] = $row;
//             }


//             $response["data"] = $data;

//             $response['success'] = true;
//         } else {
//             $response["error"] = "";
//             $response['mysqlerror'] = mysqli_error($con);
//             $response['sql'] = mysqli_error($con);
//             $response['success'] = false;
//         }








//         echo json_encode($response);


//     }




// }


date_default_timezone_set("Asia/Kolkata");



if ($_SERVER['REQUEST_METHOD'] == 'POST') {




    if (isset($_POST['updatePrStatus'])) {



        // include("../db.php");
        include('../dbconnection/db.php');

        $checkedData = $_POST['checkedData'];

        if($_POST['updatePrStatus']=='create'){

            $status = "Approved";
        }else{
            
            $status = "Reject";
        }

        $current_user = $_SESSION['username'];
        $dateTime = date('Y-m-d H:i:s');
       


        foreach ($checkedData as $key => $value) {

            $stmt = $con->prepare("UPDATE `requisition_table_header` SET `status` = '$status', `updated_by` = ?, `updated_date` = ? WHERE (`header_id` = ?);");


            $stmt->bind_param("ssi", $current_user,$dateTime,$value);


            if ($stmt->execute()) {



                $response['success'] = true;
            } else {


                $response['error'] = $stmt->error;
            }

        }


        $response['checkedData'] = $checkedData;



        echo json_encode($response);


    }



}













?>