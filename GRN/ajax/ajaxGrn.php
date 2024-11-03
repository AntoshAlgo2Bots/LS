<?php
session_start();



if ($_SERVER['REQUEST_METHOD'] == 'POST') {



    // echo json_encode($_POST);

    if (isset($_POST['grnDataInsert'])) {

        // include('../../dconnection/db.php');
        include('../../db.php');
        include('../dbconnection/db.php');
        include('../dbconnection/db.php');
        // $response["data"] = $_POST;




        // $amount=$_POST['amount'];
        // $approved=$_POST['approved'];
        // $box_detail=$_POST['box_detail'];
        // $checked_by=$_POST['checked_by'];
        // $finished=$_POST['finished'];
        // $grnDataInsert=$_POST['grnDataInsert'];
        // $inventory_id=$_POST['inventory_id'];
        // $invoice_date=$_POST['invoice_date'];
        // $invoice_num=$_POST['invoice_num'];
        // $item_code=$_POST['item_code'];
        // $item_discription=$_POST['item_discription'];
        // $item_id=$_POST['item_id'];
        // $mode_of_transport=$_POST['mode_of_transport'];
        // $purchase_order_date=$_POST['purchase_order_date'];
        // $purchase_order_id=$_POST['purchase_order_id'];
        // $purchase_order_line=$_POST['purchase_order_line'];
        // $received_quantity=$_POST['received_quantity'];
        // $receiving_item=$_POST['receiving_item'];
        // $recevied_date=$_POST['recevied_date'];
        // $remarks=$_POST['remarks'];
        // $serial_number_from=$_POST['serial_number_from'];
        // $serial_number_to=$_POST['serial_number_to'];
        // $vehical_detail=$_POST['vehical_detail'];
        // $vendor_name=$_POST['vendor_name'];
        // $warehouse_code=$_POST['warehouse_code'];
        // $warehouse_location=$_POST['warehouse_location'];


        $amount = isset($_POST['amount']) ? $_POST['amount'] : null;
        $approved = isset($_POST['approved']) ? $_POST['approved'] : null;
        $box_detail = isset($_POST['box_detail']) ? $_POST['box_detail'] : null;
        $box_no = isset($_POST['box_no']) ? $_POST['box_no'] : null;
        $checked_by = isset($_POST['checked_by']) ? $_POST['checked_by'] : null;
        $finished = isset($_POST['finished']) ? $_POST['finished'] : null;
        $grnDataInsert = isset($_POST['grnDataInsert']) ? $_POST['grnDataInsert'] : null;
        $inventory_id = isset($_POST['inventory_id']) ? $_POST['inventory_id'] : null;
        $invoice_date = isset($_POST['invoice_date']) ? $_POST['invoice_date'] : null;
        $invoice_num = isset($_POST['invoice_num']) ? $_POST['invoice_num'] : null;
        $item_code = isset($_POST['item_code']) ? $_POST['item_code'] : null;
        $item_discription = isset($_POST['item_discription']) ? $_POST['item_discription'] : null;
        $item_id = isset($_POST['item_id']) ? $_POST['item_id'] : null;
        $mode_of_transport = isset($_POST['mode_of_transport']) ? $_POST['mode_of_transport'] : null;
        $purchase_order_date = isset($_POST['purchase_order_date']) ? $_POST['purchase_order_date'] : null;
        $purchase_order_id = isset($_POST['purchase_order_id']) ? $_POST['purchase_order_id'] : null;
        $purchase_order_line = isset($_POST['purchase_order_line']) ? $_POST['purchase_order_line'] : null;
        $received_quantity = isset($_POST['received_quantity']) ? $_POST['received_quantity'] : null;
        $receiving_item = isset($_POST['receiving_item']) ? $_POST['receiving_item'] : null;
        $recevied_date = isset($_POST['recevied_date']) ? $_POST['recevied_date'] : null;
        $receiving_time = isset($_POST['receiving_time']) ? $_POST['receiving_time'] : null;
        $remarks = isset($_POST['remarks']) ? $_POST['remarks'] : null;
        $serial_number_from = isset($_POST['serial_number_from']) ? $_POST['serial_number_from'] : null;
        $serial_number_to = isset($_POST['serial_number_to']) ? $_POST['serial_number_to'] : null;
        $vehical_detail = isset($_POST['vehical_detail']) ? $_POST['vehical_detail'] : null;
        $vendor_name = isset($_POST['vendor_name']) ? $_POST['vendor_name'] : null;
        $warehouse_code = isset($_POST['warehouse_code']) ? $_POST['warehouse_code'] : null;
        $warehouse_location = isset($_POST['warehouse_location']) ? $_POST['warehouse_location'] : null;
        $weight = isset($_POST['weight']) ? $_POST['weight'] : null;
        $dimension = isset($_POST['dimension']) ? $_POST['dimension'] : null;






        $sql = "INSERT INTO `for_office`.`grn_goods_receipt` (`item_id`, `item_code`, `item_discription`, `warehouse_location`, `warehouse_code`, `receiving_item`, `purchase_order_id`, `purchase_order_date`, `purchase_order_line`, `received_quantity`, `recevied_date`, `receiving_time`, `finished`, `weight`, `dimension`, `box_no`, `box_detail`, `checked_by`, `approved`, `remarks`, `serial_number_to`, `serial_number_from`, `vendor_name`, `mode_of_transport`, `vehical_detail`, `invoice_num`, `invoice_date`, `amount`) VALUES ('$item_id',
         '$item_code',
         '$item_discription',
          '$warehouse_location',
          '$warehouse_code',
          '$receiving_item',
           '$purchase_order_id',
           '$purchase_order_date', 
           '$purchase_order_line', 
          '$received_quantity', 
          '$recevied_date', 
          '$receiving_time',
           '$finished', 
           '$weight',
            '$dimension', 
            '$box_no', 
            '$box_detail',
             '$checked_by', 
            '$approved', 
            '$remarks', 
            '$serial_number_to',
             '$serial_number_from', 
             '$vendor_name',
              '$mode_of_transport',
              '$vehical_detail',
             '$invoice_num', 
             '$invoice_date', 
             '$amount');";




        $result = mysqli_query($con, $sql);


        if ($result) {



            $response["success"] = true;
        } else {
            $response["success"] = false;
        }





        echo json_encode($response);
        // echo  "hellow";
    }







    if (isset($_POST['createGrn'])) {

        // include('../../db.php');
        // include('.../dbconnection/db.php');
        include('../../dbconnection/db.php');

        $po_number = $_POST['po_number'];
        $vendor_name = $_POST['vendor_name'];
        $warehouse_code = 1;








        $sql_grn = "INSERT INTO `for_office`.`grn_goods_receipt_header` (`warehouse_code`, `purchase_order_id`, `vendor_name`) 
    VALUES ( '$warehouse_code', '$po_number', '$vendor_name');";



        $resultGrn = mysqli_query($con, $sql_grn);



        // echo $resultGrn;

        if ($resultGrn) {




            $response['success'] = true;


            $grn_id = mysqli_insert_id($con);

            $response['grn_id'] = $grn_id;
        } else {
            $response['success'] = false;
            $response['error'] = mysqli_error($con);
        }


















        // $response['vendor_name'] = $vendor_name;
        // $response['po_number'] = $po_number;






        echo json_encode($response);
    }


    if (isset($_POST['setGrnLineRow'])) {


        // include('../../db.php');
        // include('../dbconnection/db.php');
        // include('../dbconnection/db.php');
        include('../../dbconnection/db.php');


        $item_code = $_POST['item_code'];
        $grnNumber = $_POST['grnNumber'];
        $recQty = $_POST['recieved_qty'];
        $po_lineid = $_POST['po_lineid'];
        $po_number = $_POST['po_number'];
        $unit_Price = $_POST['unit_Price'];
        $current_user = $_SESSION['username'];
        $current_date = date('Y-m-d H:i:s');

        $response["postData"] = $_POST;

        $query = "INSERT INTO `for_office`.`grn_line_items` (`grn_head_id`, `item_code`, `created_by`, `updated_by`, `po_line_id`,`po_number`,`price`) VALUES (?, ?, ?, ?, ? ,?,?)";

        $stmt = $con->prepare($query);
        $stmt->bind_param("sssssss", $grnNumber, $item_code, $current_user, $current_user, $po_lineid, $po_number, $unit_Price);




        if ($stmt->execute()) {


            $response['success'] = true;




            $lineId = mysqli_insert_id($con);
            // $response['data'] = $_POST;
            // $response['message'] = 'Data insreted succeefully';
            $response['insertId'] = $stmt->insert_id;





            $status = "received";

            $query = "INSERT INTO `for_office`.`grn_sub_line_status` (`grn_head_id`, `grn_line_id`, `recQty`, `status`, `createdBy`, `createdDate`, `item_code`) VALUES (?, ?, ? , ?, ?, ?, ?);";



            $stmt = $con->prepare($query);




            $stmt->bind_param("sssssss", $grnNumber, $lineId, $recQty, $status, $current_user, $current_date, $item_code);




            if ($stmt->execute()) {



                $response["success"] = true;
                $response['data'] = $_POST;
                $response['message'] = 'Item Recieved succeefully';
                $response['status'] = $status;
            } else {
                $response['success'] = false;
            }
        } else {
            $response['success'] = false;
            $response['error'] = $stmt->error;
        }



        echo json_encode($response);
    }


    if (isset($_POST['acceptData'])) {



        // include('../../db.php');
        // include('../dbconnection/db.php');
        include('../../dbconnection/db.php');


        $item_code = $_POST['item_code'];
        $grnNumber = $_POST['grnNumber'];
        $po_lineid = $_POST['po_lineid'];
        $recQty = $_POST['recieved_qty'];
        $grn_line_id = $_POST['grn_line_id'];
        $total = $_POST['total_price'];
        $current_user = $_SESSION['username'];
        $current_date = date('Y-m-d H:i:s');

        $query = "INSERT INTO `for_office`.`grn_line_items` (`grn_head_id`, `item_code`, `created_by`, `updated_by`, `po_line_id`) VALUES (?, ?, ?, ?, ?)";

        $stmt = $con->prepare($query);
        $stmt->bind_param("sssss", $grnNumber, $item_code, $current_user, $current_user, $po_lineid);



        // if ($stmt->execute()) {


        $response['success'] = true;




        $lineId = mysqli_insert_id($con);
        // $response['data'] = $_POST;
        // $response['message'] = 'Data insreted succeefully';
        $response['insertId'] = $stmt->insert_id;





        $status = "Accepted";

        $query = "INSERT INTO `for_office`.`grn_sub_line_status` (`grn_head_id`, `grn_line_id`, `recQty`, `status`, `createdBy`, `createdDate`, `item_code`) VALUES (?, ?, ? , ?, ?, ?, ?);";




        $stmt = $con->prepare($query);




        $stmt->bind_param("sssssss", $grnNumber, $grn_line_id, $recQty, $status, $current_user, $current_date, $item_code);




        if ($stmt->execute()) {



            $response["success"] = true;
            // $response['data'] = $_POST;
            $response['message'] = 'Item Accepted succeefully';
            $response['status'] = $status;
        } else {
            $response['success'] = false;
            $response['success'] = false;
            $response['error'] = $stmt->error;
        }
        // } else {
        // }





        $response['success'] = true;


        $response['message'] = $_POST;



        echo json_encode($response);
    }

    if (isset($_POST['rejectData'])) {



        // include('../../db.php');
        // include('../dbconnection/db.php');
        include('../../dbconnection/db.php');


        $item_code = $_POST['item_code'];
        $grnNumber = $_POST['grnNumber'];
        $po_lineid = $_POST['po_lineid'];
        $grn_line_id = $_POST['grn_line_id'];
        $recQty = $_POST['recieved_qty'];
        $total = $_POST['total_price'];
        $current_user = $_SESSION['username'];
        $current_date = date('Y-m-d H:i:s');

        $query = "INSERT INTO `for_office`.`grn_line_items` (`grn_head_id`, `item_code`, `created_by`, `updated_by`, `po_line_id`) VALUES (?, ?, ?, ?, ?)";

        $stmt = $con->prepare($query);
        $stmt->bind_param("sssss", $grnNumber, $item_code, $current_user, $current_user, $po_lineid);



        // if ($stmt->execute()) {


        $response['success'] = true;




        $lineId = mysqli_insert_id($con);
        // $response['data'] = $_POST;
        // $response['message'] = 'Data insreted succeefully';
        $response['insertId'] = $stmt->insert_id;





        $status = "Rejected";

        $query = "INSERT INTO `for_office`.`grn_sub_line_status` (`grn_head_id`, `grn_line_id`, `recQty`, `status`, `createdBy`, `createdDate`, `item_code`) VALUES (?, ?, ? , ?, ?, ?, ?);";




        $stmt = $con->prepare($query);




        $stmt->bind_param("sssssss", $grnNumber, $grn_line_id, $recQty, $status, $current_user, $current_date, $item_code);




        if ($stmt->execute()) {



            $response["success"] = true;
            // $response['data'] = $_POST;
            $response['message'] = 'Item Accepted succeefully';
            $response['status'] = $status;
        } else {
            $response['success'] = false;
            $response['error'] = $stmt->error;
            $response['success'] = false;
        }
        // } else {
        // }





        $response['success'] = true;


        $response['message'] = $_POST;



        echo json_encode($response);
    }



    if (isset($_POST['DeleiverdGrn'])) {




        // include('../../db.php');
        // include('../dbconnection/db.php');
        include('../../dbconnection/db.php');


        $item_code = $_POST['item_code'];
        $grnNumber = $_POST['grnNumber'];
        $po_lineid = $_POST['po_lineid'];
        $grn_line_id = $_POST['grn_line_id'];
        $recQty = $_POST['recieved_qty'];
        $total = $_POST['total_price'];
        $current_user = $_SESSION['username'];
        $current_date = date('Y-m-d H:i:s');

        $query = "INSERT INTO `for_office`.`grn_line_items` (`grn_head_id`, `item_code`, `created_by`, `updated_by`, `po_line_id`) VALUES (?, ?, ?, ?, ?)";

        $stmt = $con->prepare($query);
        $stmt->bind_param("sssss", $grnNumber, $item_code, $current_user, $current_user, $po_lineid);



        // if ($stmt->execute()) {






        $response['success'] = true;






        $lineId = mysqli_insert_id($con);
        // $response['data'] = $_POST;
        // $response['message'] = 'Data insreted succeefully';




        // $response['insertId'] = $stmt->insert_id;

        $status = "Delivered";

        $query = "INSERT INTO `for_office`.`grn_sub_line_status` (`grn_head_id`, `grn_line_id`, `recQty`, `status`, `createdBy`, `createdDate`, `item_code`) VALUES (?, ?, ? , ?, ?, ?, ?);";




        $stmt = $con->prepare($query);




        $stmt->bind_param("sssssss", $grnNumber, $grn_line_id, $recQty, $status, $current_user, $current_date, $item_code);




        if ($stmt->execute()) {


            $sql2 = "SELECT balance,po_number FROM for_office.purchase_order_line where id = $po_lineid;";




            $result2 = mysqli_query($con, $sql2);


            if ($result2) {


                $lot_name = "GRN_L" . $grnNumber . "_" . $recQty;


                $row2 = mysqli_fetch_assoc($result2);

                $realBalance = $row2['balance'];
                $po_number = $row2['po_number'];


                $sqlforinv = "INSERT INTO `for_office`.`mtl_inventory_transactions` (`grn_line_number`,`grn_id` , `sub_inventory_name`, `sub_inventory_id`, `location_id`, `item_qty`, `item_code`,`created_date`,`created_by`,`lot_number`) 
                VALUES ($grn_line_id,$grnNumber, 'STORE', '1', '1', '$recQty', '$item_code','$current_date','$current_user','$lot_name');";



                if (mysqli_query($con, $sqlforinv)) {


                    $mtnl_transaction_id = mysqli_insert_id($con);



                    for ($i = 1; $i < $recQty; $i++) {








                        $serial_number = "GRN_S_" . $grnNumber . "_" . $recQty . "_" . $i;


                        $sql = "INSERT INTO `for_office`.`mtl_serial_number` (`serial_number`, `grn_id`, `grn_line_id`, `po_number`, `po_line_number`, `item_code`, `created_by`, `created_date` ,`mtnl_transaction_id`,`lot_number` ) VALUES (?, ?, ?, ?, ?, ?, ?, ? ,? , ?);";


                        $stmt = $con->prepare($sql);

                        $stmt->bind_param('siiissssis', $serial_number, $grnNumber, $grn_line_id, $po_number, $po_lineid, $item_code, $current_user, $current_date,$mtnl_transaction_id,$lot_name);

                        $stmt->execute();
                    }













                    $sql = "INSERT INTO `for_office`.`mtl_lot_number` (`grn_number`, `grn_line_number`, `lot_name`, `quantity`, `created_date`, `created_by`, `updated_date`, `updated_by`,`item_code`)
                         VALUES ('$grnNumber', '$grn_line_id', '$lot_name', $recQty, '$current_date', '$current_user', 'update', 'updtesd by','$item_code');";

                    if (mysqli_query($con, $sql)) {

                        $response["messageforinvquery"] = 'Item created in store';
                    } else {
                        $response["messageforinvquery"] = 'Item not created in store';
                        $response["error_sql"] = mysqli_error($con);
                    }
                } else {

                    $response['success'] = false;
                    $response['error'] = mysqli_error(mysql: $con);
                    $response['error_sql'] = $sqlforinv;
                }












                $updateBalance = $realBalance - $recQty;


                $sql_forUpdateBalace  = "UPDATE `for_office`.`purchase_order_line` SET `balance` = '$updateBalance' WHERE (`id` = '$po_lineid');";


                $result_forUpdateBalace = mysqli_query($con, $sql_forUpdateBalace);


                if ($result_forUpdateBalace) {

                    $response['updateBalance'] = $updateBalance;
                    $response['message_for_balance'] = "Balace has bee updated";
                    $response['query updaye'] = $sql_forUpdateBalace;
                }
            }




            $response["success"] = true;
            // $response['data'] = $_POST;
            $response['message'] = 'Item Accepted succeefully';
            $response['status'] = $status;
            $response['line_id'] = $po_lineid;
        } else {
            $response['success'] = false;
            $response['success'] = false;
            $response['error'] = $stmt->error;
        }
        // } else {
        // }





        $response['success'] = true;


        $response['message'] = $_POST;



        echo json_encode($response);
    }
    if (isset($_POST['damagedGrn'])) {





        // include('../../db.php');
        // include('../dbconnection/db.php');
        include('../../dbconnection/db.php');


        $item_code = $_POST['item_code'];
        $grnNumber = $_POST['grnNumber'];
        $po_lineid = $_POST['po_lineid'];
        $grn_line_id = $_POST['grn_line_id'];
        $recQty = $_POST['recieved_qty'];
        $total = $_POST['total_price'];
        $current_user = $_SESSION['username'];
        $current_date = date('Y-m-d H:i:s');

        $query = "INSERT INTO `for_office`.`grn_line_items` (`grn_head_id`, `item_code`, `created_by`, `updated_by`, `po_line_id`) VALUES (?, ?, ?, ?, ?)";

        $stmt = $con->prepare($query);
        $stmt->bind_param("sssss", $grnNumber, $item_code, $current_user, $current_user, $po_lineid);



        // if ($stmt->execute()) {






        $response['success'] = true;






        $lineId = mysqli_insert_id($con);
        // $response['data'] = $_POST;
        // $response['message'] = 'Data insreted succeefully';




        // $response['insertId'] = $stmt->insert_id;

        $status = "Damaged";

        $query = "INSERT INTO `for_office`.`grn_sub_line_status` (`grn_head_id`, `grn_line_id`, `recQty`, `status`, `createdBy`, `createdDate`, `item_code`) VALUES (?, ?, ? , ?, ?, ?, ?);";




        $stmt = $con->prepare($query);




        $stmt->bind_param("sssssss", $grnNumber, $grn_line_id, $recQty, $status, $current_user, $current_date, $item_code);




        if ($stmt->execute()) {


            $sql2 = "SELECT balance,po_number FROM for_office.purchase_order_line where id = $po_lineid;";




            $result2 = mysqli_query($con, $sql2);


            if ($result2) {




                $row2 = mysqli_fetch_assoc($result2);

                $realBalance = $row2['balance'];
                $po_number = $row2['po_number'];



                $sqlforinv = "INSERT INTO `for_office`.`mtl_inventory_transactions` (`grn_line_number`,`grn_id` , `sub_inventory_name`, `sub_inventory_id`, `location_id`, `item_qty`, `item_code`,`created_date`,`created_by`,`po_line_number`,`po_number`) 
                VALUES ($grn_line_id,$grnNumber, 'Damage', '7', '1', '$recQty', '$item_code','$current_date','$current_user','$po_lineid','$po_number');";

                //  echo $sqlforinv;

                if (mysqli_query($con, $sqlforinv)) {

                    $sql = "INSERT INTO `for_office`.`mtl_lot_number` (`grn_number`, `grn_line_number`, `lot_name`, `quantity`, `created_date`, `created_by`, `updated_date`, `updated_by`) VALUES ('$grnNumber', '$grn_line_id', '$item_code', $recQty, '$current_date', '$current_user', 'update', 'updtesd by');";

                    if (mysqli_query($con, $sql)) {

                        $response["messageforinvquery"] = 'Item created in store';
                    } else {
                        $response["messageforinvquery"] = 'Item not created in store';
                        $response["error_sql"] = mysqli_error($con);
                    }
                } else {

                    $response['success'] = false;
                    $response['error'] = mysqli_error(mysql: $con);
                    $response['error_sql'] = $sqlforinv;
                }












                $updateBalance = $realBalance - $recQty;


                $sql_forUpdateBalace  = "UPDATE `for_office`.`purchase_order_line` SET `balance` = '$updateBalance' WHERE (`id` = '$po_lineid');";


                $result_forUpdateBalace = mysqli_query($con, $sql_forUpdateBalace);


                if ($result_forUpdateBalace) {

                    $response['updateBalance'] = $updateBalance;
                    $response['message_for_balance'] = "Balace has bee updated";
                    $response['query updaye'] = $sql_forUpdateBalace;
                }
            }




            $response["success"] = true;
            // $response['data'] = $_POST;
            $response['message'] = 'Item Accepted succeefully';
            $response['status'] = $status;
            $response['line_id'] = $po_lineid;
        } else {
            $response['success'] = false;
            $response['success'] = false;
            $response['error'] = $stmt->error;
        }
        // } else {
        // }





        $response['success'] = true;


        $response['message'] = $_POST;



        echo json_encode($response);
    }
}





if ($_SERVER['REQUEST_METHOD'] == 'GET') {



    if (isset($_GET['getDataForGrnPo'])) {


        // include('../../db.php');
        // include('../dbconnection/db.php');
        include('../../dbconnection/db.php');



        $po_number = $_GET['po_number'];





        $sql = "SELECT * FROM for_office.purchase_order_line a JOIN purchase_order_header b ON a.po_number = b.PO_number where a.PO_number =  $po_number;";




        $result = mysqli_query($con, $sql);



        if ($result) {



            $data = [];


            while ($row = mysqli_fetch_assoc($result)) {


                $data[] = $row;


                $response['sucess'] = true;
            }


            $response['data'] = $data;


            $response['success'] = true;
            $response['message'] = "data suucess fully fetch";
        } else {


            $response['success'] = false;
        }






        $response['return id'] = $po_number;



























        echo json_encode($response);
    }
}
