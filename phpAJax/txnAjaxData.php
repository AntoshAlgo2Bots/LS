<?php

include("../dbconnection/db.php");





if ($_SERVER['REQUEST_METHOD'] == 'GET') {


    if (isset($_GET['rowIdToSubmit'])) {



        $idsOfSubmit = $_GET['recordIds'];



        foreach ($idsOfSubmit as $key => $value) {

            $sql = "UPDATE `txn_book` SET `form_status` = 'SUBMIT' WHERE (`transaction_no` = '$value');";

            $result = mysqli_query($con, $sql);
            if ($result) {

                $response['success'] = true;
                $response['message'] = "data Successfully submited ";
            }else{
                $response["success"] = false;
                $response["message"] = mysqli_error( $con);
            }
    
        }




        $response['data'] = $_GET;


        echo json_encode($response);

    }

    // print_r($_GET);

}





?>