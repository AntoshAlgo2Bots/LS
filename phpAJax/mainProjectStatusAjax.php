<?php
session_start();
include '../controllers/db_functions.php';
include('../dbconnection/db.php');

$current_date =  date('Y-m-d H:i:s');

$current_user = $_SESSION['username'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {










    if (isset($_POST['issueItems'])) {


        $so_line_id = $_POST['so_line_id'];


        $response['data'] = $_POST;


        //functiom to get data from database
        $table_data = getTableDataById("sale_order_items_lines", "id", $so_line_id);


        $allocated_serial_number = [];






        if ($table_data["success"]) {


            if ($table_data['data'] > 0) {

                $row  = $table_data['data'][0];


                $item_code  = $row['item_code'];
                $total_qty  = (int) $_POST['qty'];
                $so_head_id = (int) $row['so_number'];
                $remarks =  $_POST['remarks'];
                // $so_head_id = $so_head_id;

                if (is_numeric($total_qty)) {












                    $query = "INSERT INTO `project_status_table` (`item_code`, `total_qty`, `so_head_id`, `so_line_id`,`created_date` ,`created_by` ,`remarks`) VALUES (?, ?, ?, ? , ? ,?,?);";



                    $stmt = $con->prepare($query);
                    $stmt->bind_param("siiisss", $item_code, $total_qty, $so_head_id, $so_line_id, $current_date, $current_user, $remarks);

                    if ($stmt->execute()) {

                        $quer_for_update_so_line =  "UPDATE `sale_order_items_lines` SET `work_in_progress_qty` = work_in_progress_qty+$total_qty WHERE (`id` = $so_line_id);";
                        mysqli_query($con, "commit;");
                        if (mysqli_query($con, $quer_for_update_so_line)) {


                            $response['message_so'] = "Issue item successfully updated in so";




                            $process_qty = $total_qty;
                            while ($process_qty > 0) {


                                $sql = mysqli_query($con, "SELECT  * FROM mtl_inventory_transactions  where item_code='$item_code'  and sub_inventory_id=1  order by item_qty desc limit 1");

                                $result = mysqli_fetch_assoc($sql);
                                $current_id = (int) $result['id'];
                                $lot_number = $result['lot_number'];

                                $qty = (int) $result['item_qty'];


                                if ($process_qty <= $qty) {






                                    $sql = "UPDATE `mtl_inventory_transactions` SET `item_qty` = item_qty-$process_qty, `hold_qty` = hold_qty+$process_qty WHERE (`id` = '$current_id')";

                                    if (mysqli_query($con, $sql)) {



                                        $sql_to_get_serail_number = mysqli_query($con, "select * from mtl_serial_number where lot_number = '$lot_number' and status='yes' and inventory_id = 1 limit $process_qty;");


                                        while ($row_serials = mysqli_fetch_assoc($sql_to_get_serail_number)) {

                                            $allocated_serial_number[] = $row_serials;
                                        }





                                        $response['message'] = "transaction completed successfully ";







                                        $process_qty = 0;
                                    } else {

                                        exit(1);

                                        echo mysqli_error($con);
                                        $response['message'] = "transaction is not something went wrong !!! ";
                                    }
                                } else {



                                    $sql = "UPDATE `mtl_inventory_transactions` SET `item_qty` = item_qty-$qty, `hold_qty` = hold_qty+$qty WHERE (`id` = '$current_id')";




                                    if (mysqli_query($con, $sql)) {

                                        $response['message'] = "transaction completed successfully ";
                                        $process_qty = $process_qty - $qty;

                                        $response['new_qty'] = $total_qty;



                                        $sql_to_get_serail_number = mysqli_query($con, "select * from mtl_serial_number where lot_number = '$lot_number' and status='yes' and inventory_id = 1 limit $qty;");


                                        while ($row_serials = mysqli_fetch_assoc($sql_to_get_serail_number)) {

                                            $allocated_serial_number[] = $row_serials;
                                        }
                                    } else {

                                        echo mysqli_error($con);
                                        $response['message'] = "transaction is not something went wrong!!! ";

                                        exit(1);
                                    }




                                    $response['message_2'] = "need quantity is greater than quantity in store";
                                }


                                // break;
                            }











                            $response['success'] = true;
                        } else {
                            $response['message'] = "Error while inserting issue items";
                            $response['success'] = false;
                            $response['error'] = $stmt->error;
                        }
                    } else {
                        $response['message'] = "Error while inserting issue items";
                        $response['success'] = false;
                        $response['error'] = $stmt->error;
                    }
                } else {
                    $response['message'] = "data not found";
                }
            } else {
                $response['message'] = "error while fetching data";
            }
        } else {
            $response['message'] = "Invalid data please check";
            $response['success'] = false;

            exit;
        }




        if (count($allocated_serial_number) > 0) {

            $response['total_serial_number'] = count($allocated_serial_number);
            foreach ($allocated_serial_number as $key => $value) {


                $serial_number = $value['serial_number'];
                $sql = "UPDATE `mtl_serial_number` SET `status` = 'no', `so_number` = '$so_head_id', `so_line_number` = '$so_line_id' , `updated_date`='$current_date' ,`updated_by`='$current_user' WHERE (`serial_number` = '$serial_number');";

                if (mysqli_query($con, $sql)) {

                    $qury_to_make_transaction  = "INSERT INTO `move_order_item_header` (`so_number`, `so_line_number`, `serial_number`, `transaction_type`,  `item_code`,  `source_invetory`, `destination_inv`, `transaction_qty`,  `created_by`, `created_date`) 
                    VALUES ($so_head_id, $so_line_id, '$serial_number', 'Sale order allocation', '$item_code',  'STORE', 'ASSEMBLY', 2,  '$current_user', '$current_date');";



                    $result_stmt = mysqli_query($con, $qury_to_make_transaction);


                    if ($result_stmt) {

                        $response['success'] = true;
                        // $quantity_to_inserted++;
                    } else {
                        $response['message'] = "Error while making move order";
                        $response['success'] = false;
                        $response['error'] = mysqli_error($con);;
                        $response['num_of_created'] = $quantity_to_inserted;
                        $response['at_error'] = $value;
                        echo json_encode($response);
                        exit;
                    }
                } else {
                    $response['message'] = "Error while updating serial number";
                    $response['success'] = false;
                    $response['error'] = mysqli_error($con);
                    exit;
                }
            }
        }


        $response['data'] = $_POST;
        $response['allocated_data'] = $allocated_serial_number;

        echo json_encode($response);
    }



    if (isset($_POST['send_items_to_assembly_po'])) {
        // Get POST variables
        $serial_number = $_POST['serial_numbers'];
        $so_head_id = $_POST['so_head_id'];
        $so_line_id = $_POST['so_line_id'];


        $table_data = getTableDataById("sale_order_items_lines", "id", $so_line_id);


        $row  = $table_data['data'][0];



        $item_code = $row['item_code'];

        // Calculate the total quantity based on the number of serial numbers
        $total_qty = count($serial_number);

        // Initialize response variables
        $quantity_to_inserted = 0;

        // Ensure the total quantity is greater than 0
        if ($total_qty > 0) {
            // Insert a new inventory transaction record
            $sql_to_create_inventory = "INSERT INTO `mtl_inventory_transactions` 
                                        (`sub_inventory_name`, `sub_inventory_id`, `location_id`, `item_qty`, `item_code`, `so_head_id`, `created_date`, `created_by`) 
                                        VALUES ('ASSEMBLY', '2', '1', '$total_qty', '$item_code', '$so_head_id', '$current_date', '$current_user')";

            $result = mysqli_query($con, $sql_to_create_inventory);
            if (!$result) {
                $response['message'] = "Error while creating inventory transaction";
                $response['success'] = false;
                $response['error'] = mysqli_error($con);
                echo json_encode($response);
                exit;
            }

            // Get the last inserted ID for the transaction
            $mtnl_transaction_id = mysqli_insert_id($con);

            // Loop through each serial number and update the corresponding record
            foreach ($serial_number as $key => $value) {
                $s_number = $value;

                // Update query to set inventory ID and other fields
                $query = "UPDATE `mtl_serial_number` 
                          SET `inventory_id` = '2', `updated_date` = '$current_date', `updated_by` = '$current_user', `mtnl_transaction_id` = '$mtnl_transaction_id' 
                          WHERE `serial_number` = ?";

                // Prepare the query and bind parameters
                $stmt = $con->prepare($query);
                $stmt->bind_param('s', $s_number);

                // Execute the statement and check if it succeeded
                if ($stmt->execute()) {
                    $quantity_to_inserted++;
                } else {
                    $response['message'] = "Error while updating serial number";
                    $response['success'] = false;
                    $response['error'] = $stmt->error;
                    $response['num_of_created'] = $quantity_to_inserted;
                    $response['at_error'] = $value;
                    echo json_encode($response);
                    exit;
                }
            }

            // Send success response with the number of items inserted
            $response['success'] = true;
            $response['message'] = "Successfully updated inventory and serial numbers";
            $response['num_of_created'] = $quantity_to_inserted;
            echo json_encode($response);
        } else {
            $response['success'] = false;
            $response['message'] = "No serial numbers provided";
            echo json_encode($response);
        }
    }


    if (isset($_POST['send_item_to_qc'])) {
        // Get POST variables
        $serial_number = $_POST['serial_numbers'];
        $so_head_id = $_POST['so_head_id'];
        $so_line_id = $_POST['so_line_id'];
        $inventory_id = 9;
        $inventory_name = "QUALITY_CHECK";

        $source_inventory_name = $_POST['source_inventory_name'];
        $source_inventory_id = $_POST['source_inventory_id'];

        sendSerialsToAnother($serial_number, $so_head_id, $so_line_id, $inventory_id, $inventory_name, $source_inventory_name);



        // sendSerialsToAnother($serial_number, $so_head_id, $so_line_id, $inventory_id, $inventory_name);
    }


    if (isset($_POST['reject_item_assembly_to_store'])) {

        // Get POST variables
        $serial_number = $_POST['serial_numbers'];
        $so_head_id = $_POST['so_head_id'];
        $so_line_id = $_POST['so_line_id'];
        $inventory_id = 1;
        $inventory_name = "STORE";


        $source_inventory_name = $_POST['source_inventory_name'];
        $source_inventory_id = $_POST['source_inventory_id'];

        sendSerialsToAnother($serial_number, $so_head_id, $so_line_id, $inventory_id, $inventory_name, $source_inventory_name);
    }

    if (isset($_POST['reject_item_quality_check_to_assembly'])) {


        // Get POST variables
        $serial_number = $_POST['serial_numbers'];
        $so_head_id = $_POST['so_head_id'];
        $so_line_id = $_POST['so_line_id'];
        $inventory_id = 2;
        $inventory_name = "ASSEMBLY";


        $source_inventory_name = $_POST['source_inventory_name'];
        $source_inventory_id = $_POST['source_inventory_id'];

        sendSerialsToAnother($serial_number, $so_head_id, $so_line_id, $inventory_id, $inventory_name, $source_inventory_name);

        // sendSerialsToAnother($serial_number, $so_head_id, $so_line_id, $inventory_id, $inventory_name);
    }

    if (isset($_POST['send_item_quality_check_to_packaging'])) {



        // Get POST variables
        $serial_number = $_POST['serial_numbers'];
        $so_head_id = $_POST['so_head_id'];
        $so_line_id = $_POST['so_line_id'];
        $inventory_id = 4;
        $inventory_name = "PACKAGING";


        $source_inventory_name = $_POST['source_inventory_name'];
        $source_inventory_id = $_POST['source_inventory_id'];

        sendSerialsToAnother($serial_number, $so_head_id, $so_line_id, $inventory_id, $inventory_name, $source_inventory_name);


        // sendSerialsToAnother($serial_number, $so_head_id, $so_line_id, $inventory_id, $inventory_name);
    }

    if (isset($_POST['reject_item_packaging_to_quality_check'])) {



        // Get POST variables
        $serial_number = $_POST['serial_numbers'];
        $so_head_id = $_POST['so_head_id'];
        $so_line_id = $_POST['so_line_id'];
        $inventory_id = 9;
        $inventory_name = "QUALITY_CHECK";

        $source_inventory_name = $_POST['source_inventory_name'];
        $source_inventory_id = $_POST['source_inventory_id'];

        sendSerialsToAnother($serial_number, $so_head_id, $so_line_id, $inventory_id, $inventory_name, $source_inventory_name);

        // sendSerialsToAnother($serial_number, $so_head_id, $so_line_id, $inventory_id, $inventory_name);
    }

    if (isset($_POST['send_item_packaging_to_gate_exit'])) {



        // Get POST variables
        $serial_number = $_POST['serial_numbers'];
        $so_head_id = $_POST['so_head_id'];
        $so_line_id = $_POST['so_line_id'];
        $inventory_id = 5;
        $inventory_name = "GATE_EXIT";


        $source_inventory_name = $_POST['source_inventory_name'];
        $source_inventory_id = $_POST['source_inventory_id'];

        sendSerialsToAnother($serial_number, $so_head_id, $so_line_id, $inventory_id, $inventory_name, $source_inventory_name);

        // sendSerialsToAnother($serial_number, $so_head_id, $so_line_id, $inventory_id, $inventory_name);
    }
    if (isset($_POST['send_item_to_disemnetal'])) {



        // Get POST variables
        $serial_number = $_POST['serial_numbers'];
        $so_head_id = $_POST['so_head_id'];
        $so_line_id = $_POST['so_line_id'];
        $inventory_id = 3;
        $inventory_name = "DISAMENTAL";


        $source_inventory_name = $_POST['source_inventory_name'];
        $source_inventory_id = $_POST['source_inventory_id'];

        sendSerialsToAnother($serial_number, $so_head_id, $so_line_id, $inventory_id, $inventory_name, $source_inventory_name);

        // sendSerialsToAnother($serial_number, $so_head_id, $so_line_id, $inventory_id, $inventory_name);
    }






    if (isset($_POST['reject_item_gate_exit_to_packaging'])) {



        // Get POST variables
        $serial_number = $_POST['serial_numbers'];
        $so_head_id = $_POST['so_head_id'];
        $so_line_id = $_POST['so_line_id'];
        $inventory_id = 4;
        $inventory_name = "PACKAGING";

        $source_inventory_name = $_POST['source_inventory_name'];
        $source_inventory_id = $_POST['source_inventory_id'];

        sendSerialsToAnother($serial_number, $so_head_id, $so_line_id, $inventory_id, $inventory_name, $source_inventory_name);

        // sendSerialsToAnother($serial_number, $so_head_id, $so_line_id, $inventory_id, $inventory_name);
    }


    if (isset($_POST['send_item_gate_exit_to_installtion'])) {




        // Get POST variables
        $serial_number = $_POST['serial_numbers'];
        $so_head_id = $_POST['so_head_id'];
        $so_line_id = $_POST['so_line_id'];
        $inventory_id = 10;
        $inventory_name = "INSTALLION";


        $source_inventory_name = $_POST['source_inventory_name'];
        $source_inventory_id = $_POST['source_inventory_id'];

        sendSerialsToAnother($serial_number, $so_head_id, $so_line_id, $inventory_id, $inventory_name, $source_inventory_name);

        // sendSerialsToAnother($serial_number, $so_head_id, $so_line_id, $inventory_id, $inventory_name);
    }

    if (isset($_POST['reject_item_installtion_to_gate_exit'])) {




        // Get POST variables
        $serial_number = $_POST['serial_numbers'];
        $so_head_id = $_POST['so_head_id'];
        $so_line_id = $_POST['so_line_id'];
        $inventory_id = 5;
        $inventory_name = "GATE_EXIT";
        $source_inventory_name = $_POST['source_inventory_name'];
        $source_inventory_id = $_POST['source_inventory_id'];

        sendSerialsToAnother($serial_number, $so_head_id, $so_line_id, $inventory_id, $inventory_name, $source_inventory_name);
    }




        if(isset($_POST['move_item_serails'])) {



            $serial_number = $_POST['serial_numbers'];
            $so_head_id = $_POST['so_head_id'];
            $so_line_id = $_POST['so_line_id'];
            $inventory_id = $_POST['destination_inventory_id'] ;
            $inventory_name =$_POST['destination_inventory_name'];
            $source_inventory_name = $_POST['source_inventory_name'];
            $source_inventory_id = $_POST['source_inventory_id'];
    
            sendSerialsToAnother($serial_number, $so_head_id, $so_line_id, $inventory_id, $inventory_name, $source_inventory_name);





        }




    if (isset($_POST["createPurchaseOrder"])) {





        $vendor_code = 01;
        $supplier_name = "XYZ";
        $supplier_site_code = "ABC";
        $payment_term = "by check";
        $bill_to_location = "ABC";
        $shipTo = "XYZ";
        $current_date = date("Y-m-d H:i:s");
        $current_user = $_SESSION['username'];
        $so_id = $_POST['so_head_id'];
        $item_code = $_POST['item_code'];
        $r_qty = (int) $_POST['r_qty'];



        $table_data = getTableDataById("item_master_main", "item_code", $item_code);




        $item_row  = $table_data['data'][0];





        $query = "INSERT INTO `purchase_order_header` (`vendore_code`, `supplier_name`, `supplier_site_code`, `payment_term`, `bill_to_location`, `shipTo`, `createdBy`, `created_date`, `so_id`)
         VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);";

        $stmt = $con->prepare($query);
        $stmt->bind_param('sssssssss', $vendor_code, $supplier_name, $supplier_site_code, $payment_term, $bill_to_location, $shipTo, $current_user, $current_date, $so_id);



        if ($stmt->execute()) {



            $last_id = $con->insert_id;


            $total_price = $r_qty * (int) $item_row['Price'];


            $query = "INSERT INTO `purchase_order_line` (`po_number`, `item_code`, `item_shortdiscription`, `unit_price`, `quantity`, `total_price`,`balance`)
         VALUES (?,?,?,?,?,?,?);";
            $stmt = $con->prepare($query);
            $stmt->bind_param('sssiisi', $last_id, $item_code, $item_row['Long_Description'], $item_row['unit_price'], $r_qty, $total_price, $r_qty);










            if ($stmt->execute()) {



                $response['success'] = true;
                $response['message'] = "Purchase Order Created Successfully";
                $response['item_data'] = $item_row;
                $response['po_number'] = $last_id;
            } else {
                $response['success'] = false;
                $response['message'] = "Invalid data please check";
                $response['sql_error'] = mysqli_error($con);
            }
        } else {



            $response['success'] = false;
            $response['message'] = "Invalid data please check";
            $response['sql_error'] = mysqli_error($con);
        }



        echo json_encode($response);
    }







    if (isset($_POST["removeSerial"])) {

        $serial_number = $_POST['serial_numbers'];
        $so_head_id = $_POST['so_head_id'];
        $so_line_id = $_POST['so_line_id'];
        $current_date = date("Y-m-d H:i:s");
        $current_user = $_SESSION['username'];

        $response = [];
        $response['success'] = false;
        $response['message'] = "Error while removing serial number. Please try again.";

        foreach ($serial_number as $s_number) {

            $query = "UPDATE `mtl_serial_number` SET `status` = 'yes', `updated_date` = ?, `updated_by` = ? WHERE `serial_number` = ?";


            if ($stmt = $con->prepare($query)) {

                $stmt->bind_param('sss', $current_date, $current_user, $s_number);


                if ($stmt->execute()) {

                    $lot_query = "SELECT lot_number FROM `mtl_serial_number` WHERE `serial_number` = ?";

                    if ($lot_stmt = $con->prepare($lot_query)) {

                        $lot_stmt->bind_param('s', $s_number);
                        $lot_stmt->execute();
                        $lot_stmt->store_result();
                        $lot_stmt->bind_result($lot_number);
                        $lot_stmt->fetch(); // Fetch the lot number


                        $lot_stmt->close();

                        if ($lot_number) {

                            $update_qty_query = "UPDATE `mtl_inventory_transactions` SET `item_qty` = item_qty + 1 ,`hold_qty`=hold_qty-1 WHERE `lot_number` = ?";

                            if ($update_qty_stmt = $con->prepare($update_qty_query)) {

                                $update_qty_stmt->bind_param('s', $lot_number);



                                if ($update_qty_stmt->execute()) {

                                    mysqli_query($con, "UPDATE `sale_order_items_lines` SET `work_in_progress_qty` = work_in_progress_qty-1 WHERE (`id` = '$so_line_id');");

                                    $response['success'] = true;
                                    $response['message'] = "Serial number removed successfully.";
                                } else {
                                    $response['message'] = "Error while updating inventory transaction.";
                                }


                                $update_qty_stmt->close();
                            } else {
                                $response['message'] = "Error preparing inventory transaction update query.";
                            }
                        } else {
                            $response['message'] = "Lot number not found for serial number: $s_number.";
                        }
                    } else {
                        $response['message'] = "Error preparing query to fetch lot number.";
                    }
                } else {
                    $response['message'] = "Error while removing serial number: " . $stmt->error;
                }


                $stmt->close();
            } else {
                $response['message'] = "Error preparing query to remove serial number.";
            }
        }

        echo json_encode($response);
    }
}




if ($_SERVER['REQUEST_METHOD'] == 'GET') {


    if (isset($_GET['getSetSerialData'])) {



        $so_head_id = $_GET['so_head_id'];
        $so_line_id = $_GET['so_line_id'];
        $mode = $_GET['mode'];


        if ($mode == "issue_items") {
            $sql = "SELECT * FROM mtl_serial_number where  so_number= $so_head_id and so_line_number = $so_line_id and status='no' and inventory_id = 1 ;";
        } else if ($mode == "assembly_items") {
            //this is assembly items
            $sql = "SELECT * FROM mtl_serial_number where  so_number= $so_head_id and so_line_number = $so_line_id and status='no' and inventory_id = 2 ;";
        } else if ($mode == "qualitycheck_items") {
            //this is assembly items
            $sql = "SELECT * FROM mtl_serial_number where  so_number= $so_head_id and so_line_number = $so_line_id and status='no' and inventory_id = 9 ;";
        } else if ($mode == "packaging_items") {
            //this is assembly items
            $sql = "SELECT * FROM mtl_serial_number where  so_number= $so_head_id and so_line_number = $so_line_id and status='no' and inventory_id = 4 ;";
        } else if ($mode == "gate_exit_items") {
            //this is assembly items
            $sql = "SELECT * FROM mtl_serial_number where  so_number= $so_head_id and so_line_number = $so_line_id and status='no' and inventory_id = 5 ;";
        } else if ($mode == "installation_items") {
            //this is assembly items
            $sql = "SELECT * FROM mtl_serial_number where  so_number= $so_head_id and so_line_number = $so_line_id and status='no' and inventory_id = 10 ;";
        } else if ($mode == "disemntal_itmes") {
            //this is assembly items
            $sql = "SELECT * FROM mtl_serial_number where  so_number= $so_head_id and so_line_number = $so_line_id and status='no' and inventory_id = 3 ;";
        }
         else if ($mode == "refurbished_items") {
            //this is assembly items
            $sql = "SELECT * FROM mtl_serial_number where  so_number= $so_head_id and so_line_number = $so_line_id and status='no' and inventory_id = 6 ;";
        }







        $result = mysqli_query($con, $sql);
        $data = [];



        if (mysqli_num_rows($result) > 0) {


            while ($row = mysqli_fetch_assoc($result)) {

                $data[] = $row;
            }

            $response['data'] = $data;

            $response['success'] = true;
            $response['message'] = "data successfully found";
        } else {

            $response['success'] = true;
            $response['message'] = "data successfully found";
        }





        echo  json_encode($response);
    }
}









if(isset($_GET['getOptionsForInventory'])){


    $inv_id = $_GET['inv_id'];


    $sql = "SELECT * FROM mtl_sub_inventory where id !=  '$inv_id' and id !=  10    ; "   ;

    $result  = mysqli_query($con, $sql);


    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    $response['data'] = $data;
    $response['success'] = true;
    $response['message'] = "data successfully found";
    echo json_encode($response);






}











if (isset($_POST['send_item_to_qc'])) {


    // Get POST variables
    $serial_number = $_POST['serial_numbers'];
    $so_head_id = $_POST['so_head_id'];
    $so_line_id = $_POST['so_line_id'];
}
