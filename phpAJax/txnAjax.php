<?php

include("../dbconnection/db.php");

date_default_timezone_set("Asia/Kolkata");


if ($_SERVER['REQUEST_METHOD'] == "GET") {

    if (isset($_GET['getUSerDataByUserName'])) {


        // include('../db.php');


        $txnNo = $_GET['txnNo'];
        // $user_id = $_GET['userid'];






        $sql = "SELECT * FROM txn_book where transaction_no = '$txnNo' ; ";
        // $sql2 = "SELECT * FROM daily_txn_book.user_role a JOIN  user_role b  ON a.id = b.user_id  where a.user_name = '$user_name' ; ";





        $result = mysqli_query($con, $sql);



        if ($result) {





            $data = [];


            
            while ($row = mysqli_fetch_assoc($result)) {







                $data[] = $row;



            }
            ;



            $response['success'] = true;
            $response['data'] = $data;




        } else {
            $response['success'] = false;
            $response['message'] = mysqli_error($con);
        }






        echo json_encode($response);



    }
}


?>