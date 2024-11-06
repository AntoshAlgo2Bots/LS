<?php
session_start();
include '../controllers/db_functions.php';

$current_date = date('Y-m-d');
$current_user = $_SESSION['username'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {







    if ($_POST['issueItems']) {

        $so_line_id = $_POST['so_line_id'];


        $response['data'] = $_POST;


        //functiom to get data from database
        $table_data = getTableDataById("sale_order_items_lines", "id", $so_line_id);


        $allocated_serial_number = [];

        $so_head_id = 0;

        if ($table_data["success"]) {


            if ($table_data['data'] > 0) {

                $row  = $table_data['data'][0];


                $item_code  = $row['item_code'];
                $total_qty  = (int) $_POST['qty'];
                $so_head_id = (int) $row['so_number'];
                $remarks =  $_POST['remarks'];
                $so_head_id = $so_head_id;

                if (is_numeric($total_qty)) {












                    $query = "INSERT INTO `for_office`.`project_status_table` (`item_code`, `total_qty`, `so_head_id`, `so_line_id`,`created_date` ,`created_by` ,`remarks`) VALUES (?, ?, ?, ? , ? ,?,?);";



                    $stmt = $con->prepare($query);
                    $stmt->bind_param("siiisss", $item_code, $total_qty, $so_head_id, $so_line_id, $current_date, $current_user, $remarks);

                    if ($stmt->execute()) {

                        $quer_for_update_so_line =  "UPDATE `for_office`.`sale_order_items_lines` SET `work_in_progress_qty` = work_in_progress_qty+$total_qty WHERE (`id` = $so_line_id);";
                        mysqli_query($con, "commit;");
                        if (mysqli_query($con, $quer_for_update_so_line)) {


                            $response['message_so'] = "Issue item successfully updated in so";




                            $process_qty = $total_qty;
                            while ($process_qty > 0) {


                                $sql = mysqli_query($con, "SELECT  * FROM for_office.mtl_inventory_transactions  where item_code='$item_code'  order by item_qty desc limit 1");

                                $result = mysqli_fetch_assoc($sql);
                                $current_id = (int) $result['id'];
                                $lot_number = $result['lot_number'];

                                $qty = (int) $result['item_qty'];


                                if ($process_qty <= $qty) {






                                    $sql = "UPDATE `for_office`.`mtl_inventory_transactions` SET `item_qty` = item_qty-$process_qty, `hold_qty` = hold_qty+$process_qty WHERE (`id` = '$current_id')";

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



                                    $sql = "UPDATE `for_office`.`mtl_inventory_transactions` SET `item_qty` = item_qty-$qty, `hold_qty` = hold_qty+$qty WHERE (`id` = '$current_id')";




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

            foreach ($allocated_serial_number as $key => $value) {


                $serial_number = $value['serial_number'];
                $sql = "UPDATE `mtl_serial_number` SET `status` = 'no', `so_number` = '$so_head_id', `so_line_number` = '$so_line_id' WHERE (`serial_number` = '$serial_number');";

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
}




if ($_SERVER['REQUEST_METHOD'] == 'GET') {


    if (isset($_GET['getSetSerialData'])) {



        $so_head_id = $_GET['so_head_id'];
        $so_line_id = $_GET['so_line_id'];




        $sql = "SELECT * FROM for_office.mtl_serial_number where  so_number= $so_head_id and so_line_number = $so_line_id ;";



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