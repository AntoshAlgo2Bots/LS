<?php


include '../controllers/db_functions.php';
include '../dbconnection/db.php';

session_start();

$current_user = $_SESSION['username'];

$current_date = date('Y-m-d H:i:s');


if ($_SERVER['REQUEST_METHOD'] == 'GET') {



    if ((isset($_GET['getItemsData']))) {



        echo  json_encode(getTableData("item_master_main"));
    }

    if ((isset($_GET['getSupliers']))) {

        $item_code = $_GET['item_code'];


        echo  json_encode(getTableColumnDataById("asl_header_level","supplier_name","item_code",$item_code));
    }



}




if ($_SERVER['REQUEST_METHOD'] == 'POST') {



    if ((isset($_POST['addingSupliier']))) {

        $suppliers = $_POST['suppliers'];
        $item_code = $_POST['item_code'];

        // var_dump($_POST);



        foreach ($suppliers as $key => $value) {
            

            $sql = "INSERT INTO `asl_header_level` (`item_code`, `created_by`, `created_date`,  `supplier_name`) 
                VALUES ('$item_code', '$current_user', '$current_date',  '$value')";



            $check_query = "SELECT * FROM asl_header_level where item_code='$item_code' and supplier_name='$value';";


            $check_result = mysqli_query($con, $check_query);
                        
            // if (mysqli_num_rows($check_result) > 0) {
            //     continue;
            // }else{

            //     $sql = "UPDATE `asl_header_level` SET `supplier_name` = 'sws' WHERE `item_code` = '$itm' and  `supplier_name`='$value';";
            // }




            $result = mysqli_query($con, $sql);

            if ($result) {
                $response['success'] = true;
                $response['message'] = "Supplier added successfully";
            } else {
                $response['success'] = false;
                $response['message'] = "Failed to add supplier";
                $response['error'] = mysqli_errno($con);
            }
       
       

       
       
        }
        echo json_encode($response);
    }
}
