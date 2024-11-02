<?php
session_start();

include("../dbconnection/db.php");


    $userInputsData = $_POST['userInputData'];

    $username = isset($userInputsData['username']) ? $userInputsData['username'] : null;
    $user_address = isset($userInputsData['user_address']) ? $userInputsData['user_address'] : null;
    $user_phone_number = isset($userInputsData['user_phone_number']) ? $userInputsData['user_phone_number'] : null;
    $user_email = isset($userInputsData['user_email']) ? $userInputsData['user_email'] : null;
    $installation_is_required = isset($userInputsData['installation_is_required']) ? $userInputsData['installation_is_required'] : " ";
    $installation_need_by_date = isset($userInputsData['tentative_installation_date']) ? $userInputsData['tentative_installation_date'] : null;
    $tntative_installation = isset($userInputsData['tntative_installation']) ? $userInputsData['tntative_installation'] : null;
    $lead_head_id = $userInputsData['lead_head_id'];
    $perform_invoice = isset($userInputsData['perform_invoice']) ? $userInputsData['perform_invoice'] : null;
    $quotation_shared_date = isset($userInputsData['quotation_shared_date']) ? $userInputsData['quotation_shared_date'] : null;
    $remarks = isset($userInputsData['remarks']) ? $userInputsData['remarks'] : null;
    $current_user = isset($_SESSION['username']) ? $_SESSION['username'] : null;

    $current_date = date('Y-m-d H:i:s');

    $query = "INSERT INTO `sale_order_header` (`username`, `user_address`, `user_phone_number`, `user_email`, `installation_is_required`, `installation_need_by_date`, `tntative_installation`, `perform_invoice`, `quotation_shared_date`, `remarks`,`created_by`,`created_date`,`lead_head_id`) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?,?);";

    $stmt = $con->prepare($query);

    // Bind parameters: the types string (s) and integer (i) need to be defined here
// Assuming all the values are strings except installation_is_required which might be an integer
    $stmt->bind_param(
        "ssisssssssssi",  // Types for each parameter (all strings in this case)
        $username,
        $user_address,
        $user_phone_number,
        $user_email,
        $installation_is_required,
        $installation_need_by_date,
        $tntative_installation,
        $perform_invoice,
        $quotation_shared_date,
        $remarks,
        $current_user,
        $current_date,
        $lead_head_id

    );

    $itemData = $_POST['inItems'];





    // Execute the statement
    if ($stmt->execute()) {


        $so_number = $stmt->insert_id;

















        foreach ($itemData as $key => $value) {


            $item_type = $value['item_type'];
            $itemcode = $value['item_name'];
            $itemname = $value['item_name'];
            $quantuty = (int) $value['item_qty'];
            $rate = (int) $value['item_rate'];
            $total_price = $rate * $quantuty;
            $so_number;
            $created_by = $_SESSION['username'];
            $created_date = date("y-m-h");
            $img = $value['ImagePreview'];

            $shippingaddress = "shippingaddress";




            $sql = "INSERT INTO `for_office`.`sale_order_items_lines` (`so_number`, `item_code`, `item_name`, `qty`, `rate`, `total`, `shipping_address`, `item_image_path`, `item_type`, `created_by`, `created_date`)
                     VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";











            $stmt = $con->prepare($sql);
            $stmt->bind_param("sssiiisssss", $so_number, $itemcode, $itemname, $quantuty, $rate, $total_price, $shippingaddress, $img, $item_type, $created_by, $created_date);



            if ($stmt->execute()) {


                // $sql = "UPDATE `for_office`.`lead_details_header_form` SET `$lead_head_id` = '121' WHERE (`record_no` = '$record_number');";


                $sql = "UPDATE `for_office`.`lead_details_header_form` SET `so_number` = '$so_number' WHERE (`record_no` = '$lead_head_id');";


                $result = mysqli_query($con, $sql);








                $response['success'] = true;
                $response['message'] = 'successfully data inserted';
            } else {
                $response['success'] = false;
                $response['message'] = $stmt->error;
            }
        }










        $response['so_number'] = $so_number;
    } else {



        $response['itemdata'] = $itemData;
        $response['success'] = false;
        $response['message'] = $stmt->error;
    }





    $response['post_data'] = $userInputsData;
    $response['inItems'] = $_POST['inItems'];



    echo json_encode($response);










?>