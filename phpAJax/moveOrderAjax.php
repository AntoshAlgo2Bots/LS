<?php

session_start();
include("../dbconnection/db.php");









if ($_SERVER['REQUEST_METHOD'] = 'POST') {


    // $last_id = 0 ;
    // $destination_sub_inventory   = $_POST['destination_sub_inventory'];
    $inputData  = $_POST['inputData'];









    function moveOrderBy($last_id, $subInventryId, $qty, $destinationId, $lot_number)
    {

        global $con;

        $created_date = date('Y-m-d H:i:s');
        $created_by = $_SESSION['username'];








        $check_subinventory_query = "SELECT * FROM for_office.mtl_inventory_transactions where lot_number= '$lot_number' and sub_inventory_id = $destinationId ";

        $check_subinventory = mysqli_query($con, $check_subinventory_query);

        if (mysqli_num_rows($check_subinventory) > 0) {

            $result = mysqli_fetch_assoc($check_subinventory);
            

            $response["there is already sub inventory with "] = "id $destinationId ";
            $response["query  "] = $check_subinventory_query;



            $return_qty = (int) $result['item_qty'];

            






            $qty = $return_qty+(int)$qty;








            $updating_qty_query = "UPDATE `for_office`.`mtl_inventory_transactions` SET `item_qty` = ? WHERE (lot_number= ? and sub_inventory_id = ?)";

            $stmt = $con->prepare($updating_qty_query);


            $stmt->bind_param("isi", $qty, $lot_number, $destinationId);


            if ($stmt->execute()) {
                $response["success"] = true;
                $response["message"] = "moved successfully and updated successfully and quantity_updated successfully";
            } else {
                $response["success"] = false;
                $response["message"] = "some thing went wrong errored";
                $response["error_sql"] = mysqli_error($con);
            }
        } else {











            $sql = "SELECT * FROM for_office.mtl_inventory_transactions where id=? and lot_number= '$lot_number'; ";

            $stmt = $con->prepare($sql);

            $stmt->bind_param("i", $last_id);

            $result = $stmt->execute();





            if ($result > 0) {


                $row = $stmt->get_result()->fetch_assoc();




                //getting tha name  of sub invetory
                $result_get_name = mysqli_query($con, "SELECT * FROM for_office.mtl_sub_inventory where id=$destinationId");




                $response['sub_inventory_id'] = $destinationId;


                $row_sub = mysqli_fetch_assoc($result_get_name);

                $response['row_id'] = $row_sub;



                //update quantity   


                // new quantity from last
                $item_qty = $qty;
                $sub_inventory_name = $row_sub['sub_inventory_name'];
                $sub_inventory_id = (int) $destinationId;


                $grn_line_number = (int)  isset($row['grn_line_number']) ? $row['grn_line_number'] : 0;
                $location_id = (int) $row['location_id'];
                $item_code = $row['item_code'];
                $so_head_id = (int) isset($row['so_head_id']) ? $row['so_head_id'] : 0;
                $grn_id = (int) isset($row['grn_id']) ? $row['grn_id'] : 0;
                $po_number = (int) isset($row['po_number']) ? $row['po_number'] : 0;
                $po_line_number = (int) isset($row['po_line_number']) ? $row['po_line_number'] : 0;
                $lot_number = $row['lot_number'];











                $query = "INSERT INTO `for_office`.`mtl_inventory_transactions` (`grn_line_number`, `sub_inventory_name`, `sub_inventory_id`, `location_id`, `item_qty`, `item_code`, `so_head_id`, `created_date`, `created_by`, `grn_id`, `po_number`, `po_line_number`, `lot_number`) 
                                            VALUES ('$grn_line_number', '$sub_inventory_name', '$sub_inventory_id', '$location_id', '$item_qty', '$item_code', '$so_head_id', '$created_date', '$created_by', '$grn_id', '$po_number', '$po_line_number', '$lot_number');";





                $stmt = $con->prepare($query);

                if ($stmt->execute()) {









                    $response['success'] = true;
                    $response['message'] = "Item moved successfully";
                    $response['new_id'] = mysqli_insert_id($con);
                } else {

                    $response['success'] = false;
                    $response['message'] = "Error occurred while moving item";

                    $response['sql_error'] = mysqli_error($con);
                }
            } else {



                $response['success'] = false;
                $response['message'] = "Error occurred while moving item";

                $response['sql_error'] = mysqli_error($con);
            }
        }









        $item_qty = (int) $qty;

        $update_quamtity = "UPDATE `for_office`.`mtl_inventory_transactions` SET `item_qty` = item_qty-?, `workinprogress_qty` = ? , updated_date='$created_date', updated_by='$created_by'  WHERE (`id` = ?);";

        $stmt  = $con->prepare($update_quamtity);

        $stmt->bind_param("iii", $qty, $qty, $last_id);



        if ($stmt->execute()) {



            $response['success'] = true;
            $response['message_2'] = "Item moved successfully quantity_updated successfully";
            $response['new_id'] = mysqli_insert_id($con);
        } else {
            $response['success'] = false;
            $response['message'] = "Error occurred while updating quantity item moved but not updating quantity";
        }




        echo json_encode($response);
    }

    foreach ($inputData as $key => $value) {

        $last_id = $value['transaction_id'];
        $source_sub_invetory = $value['source_sub_invetory'];
        $destination_sub_inventory = $value['destination_sub_inventory'];
        $quantity =  $value['qty'];
        $lot_number = $value['lot_number'];



        moveOrderBy($last_id, $source_sub_invetory, $quantity, $destination_sub_inventory, $lot_number);
    }
}
