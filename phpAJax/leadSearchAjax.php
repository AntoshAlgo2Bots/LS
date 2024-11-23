<?php

include('../dbconnection/db.php');

date_default_timezone_set("Asia/Kolkata");

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    
    if (isset($_GET['getUSerDataByUserName'])) {
        
        
        // include('../db.php');
        include('../dbconnection/db.php');


        $recordNo = $_GET['recordNo'];
        
        // $user_id = $_GET['userid'];


        // Updated by Antosh Kumar Pandey 03-11-2024
        $sql ="SELECT * FROM lead_details_header_form a inner JOIN lead_details_middle_level_form b ON a.record_no=b.record_no where a.record_no = '$recordNo'";
        $sql2 ="SELECT * FROM lead_details_items where record_id = '$recordNo'";

//         $sql ="SELECT * FROM lead_details_header_form a INNER JOIN lead_details_middle_level_form b ON a.record_no = b.record_no INNER JOIN lead_details_items c ON a.record_no = c.record_id
//  where a.record_no = '$recordNo'";



        // $sql = "SELECT * FROM lead_details_header_form a JOIN  lead_details_middle_level_form b  ON a.record_no = b.recond_no  where a.record_no = '$recordNo' ;";
        // $sql2 = "SELECT * FROM daily_txn_book.user_role a JOIN  user_role b  ON a.id = b.user_id  where a.user_name = '$user_name' ; ";





        $result = mysqli_query($con, $sql);
        $result2 = mysqli_query($con, $sql2);



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


        if ($result2) {
            $response['success'] = true;
            $response['soData'] = mysqli_fetch_all($result2, MYSQLI_ASSOC);
        } else {
            // $response['success'] = false;
            // $response['message'] = mysqli_error($con);
            $response['soData'] = [];
        }
        




        header('Content-Type: application/json');

        echo json_encode($response);



    }

//     if (isset($_GET['getSoDataUsingRecordNo'])) {
        
        
//         // include('../db.php');
//         include('../dbconnection/db.php');


//         $recordNo = $_GET['recordNo'];
        
//         // $user_id = $_GET['userid'];


//         // Updated by Antosh Kumar Pandey 03-11-2024
//         $sql ="SELECT * FROM lead_details_items where a.record_no = '$recordNo'";
// //         $sql ="SELECT * FROM lead_details_header_form a INNER JOIN lead_details_middle_level_form b ON a.record_no = b.record_no INNER JOIN lead_details_items c ON a.record_no = c.record_id
// //  where a.record_no = '$recordNo'";



//         // $sql = "SELECT * FROM lead_details_header_form a JOIN  lead_details_middle_level_form b  ON a.record_no = b.recond_no  where a.record_no = '$recordNo' ;";
//         // $sql2 = "SELECT * FROM daily_txn_book.user_role a JOIN  user_role b  ON a.id = b.user_id  where a.user_name = '$user_name' ; ";





//         $result = mysqli_query($con, $sql);



//         if ($result) {





//             $data = [];


            
//             while ($row = mysqli_fetch_assoc($result)) {







//                 $data[] = $row;



//             }
//             ;



//             $response['success'] = true;
//             $response['data'] = $data;




//         } else {
//             $response['success'] = false;
//             $response['message'] = mysqli_error($con);
//         }






//         echo json_encode($response);



//     }
}


?>