<?php
session_start();
include '../controllers/db_functions.php';

date_default_timezone_set("Asia/Kolkata");

$current_date = date('Y-m-d H:i:s');

$current_user = $_SESSION['username'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {







    if (isset($_POST['issueItems'])) {

        $so_line_id = $_POST['so_line_id'];


        $response['data'] = $_POST;


        //functiom to get data from database
        $table_data = getTableDataById("sale_order_items_lines", "id", $so_line_id);


        $allocated_serial_number = [];

        $so_head_id = 0;

        if ($table_data["success"]) {


            if ($table_data['data'] > 0) {

                $row = $table_data['data'][0];


                $item_code = $row['item_code'];
                $total_qty = (int) $_POST['qty'];
                $so_head_id = (int) $row['so_number'];
                $remarks = $_POST['remarks'];
                $so_head_id = $so_head_id;

                if (is_numeric($total_qty)) {












                    $query = "INSERT INTO `project_status_table` (`item_code`, `total_qty`, `so_head_id`, `so_line_id`,`created_date` ,`created_by` ,`remarks`) VALUES (?, ?, ?, ? , ? ,?,?);";



                    $stmt = $con->prepare($query);
                    $stmt->bind_param("siiisss", $item_code, $total_qty, $so_head_id, $so_line_id, $current_date, $current_user, $remarks);

                    if ($stmt->execute()) {

                        $quer_for_update_so_line = "UPDATE `sale_order_items_lines` SET `work_in_progress_qty` = work_in_progress_qty+$total_qty WHERE (`id` = $so_line_id);";
                        mysqli_query($con, "commit;");
                        if (mysqli_query($con, $quer_for_update_so_line)) {


                            $response['message_so'] = "Issue item successfully updated in so";




                            $process_qty = $total_qty;
                            while ($process_qty > 0) {


                                $sql = mysqli_query($con, "SELECT  * FROM mtl_inventory_transactions  where item_code='$item_code'  order by item_qty desc limit 1");

                                $result = mysqli_fetch_assoc($sql);
                                $current_id = (int) $result['id'];
                                $lot_number = $result['lot_number'];

                                $qty = (int) $result['item_qty'];


                                if ($process_qty <= $qty) {






                                    $sql = "UPDATE `mtl_inventory_transactions` SET `item_qty` = item_qty-$process_qty, `hold_qty` = hold_qty+$process_qty WHERE (`id` = '$current_id')";

                                    if (mysqli_query($con, $sql)) {



                                        $sql_to_get_serail_number = mysqli_query($con, "select * from mtl_serial_number where lot_number = '$lot_number' and status='yes' limit $process_qty;");


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



                                        $sql_to_get_serail_number = mysqli_query($con, "select * from mtl_serial_number where lot_number = '$lot_number' and status='yes' limit $qty;");


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
                    $response['success'] = true;
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


    if (isset($_POST["createPurchaseOrder"])) {





        $vendor_code = 01;
        $supplier_name = "XYZ";
        $supplier_site_code = "ABC";
        $payment_term = "30";
        $bill_to_location = "ABC";
        $shipTo = "XYZ";
        $current_date = date("Y-m-d H:i:s");
        $current_user = $_SESSION['username'];
        $so_id = $_POST['so_head_id'];
        $item_code = $_POST['item_code'];
        $r_qty = (int) $_POST['r_qty'];



        $table_data = getTableDataById("item_master_main", "item_code", $item_code);




        $item_row = $table_data['data'][0];




        $form_ref ='MRP';

        $query = "INSERT INTO `purchase_order_header` (`vendore_code`, `supplier_name`, `supplier_site_code`, `payment_term`, `bill_to_location`, `shipTo`, `createdBy`, `created_date`, `so_id`, `form_ref`)
         VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?,?);";

        $stmt = $con->prepare($query);
        $stmt->bind_param('ssssssssss', $vendor_code, $supplier_name, $supplier_site_code, $payment_term, $bill_to_location, $shipTo, $current_user, $current_date, $so_id, $form_ref);



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

            $query = "UPDATE `mtl_serial_number` SET `status` = 'yes', `updated_date` = ?, `updated_by` = ? WHERE `serial_number` = ? AND `so_number` = ? AND `so_line_number` = ?";


            if ($stmt = $con->prepare($query)) {

                $stmt->bind_param('sssii', $current_date, $current_user, $s_number, $so_head_id, $so_line_id);


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

                            $update_qty_query = "UPDATE `mtl_inventory_transactions` SET `item_qty` = item_qty + 1 WHERE `lot_number` = ?";

                            if ($update_qty_stmt = $con->prepare($update_qty_query)) {

                                $update_qty_stmt->bind_param('s', $lot_number);


                                if ($update_qty_stmt->execute()) {
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




        $sql = "SELECT * FROM mtl_serial_number where  so_number= $so_head_id and so_line_number = $so_line_id and status='no' ;";




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





        echo json_encode($response);
    }
}
