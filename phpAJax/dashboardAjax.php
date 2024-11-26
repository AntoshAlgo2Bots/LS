<?php

include("../dbconnection/db.php");


if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if (isset($_GET['pieChartData'])) {
        include("../controllers/getData.php");

        $table_name = "purchase_order_header";
        $column_name = "status";
        $id = 28;
        $searchColumn = "PO_number";

        $purchaseOrder = StatusAndValue("purchase_order_header", "status");
        $itemMasterRequets = StatusAndValue("item_master_temp", "itemStatus");
        $requisition_table = StatusAndValue("requisition_table_header", "status");
        $grnStatus = StatusAndValue("grn_sub_line_status", "status");
        $Lead_status = StatusAndValue("create_query_form", "status");
        $emp_status = StatusAndValue("employee_head", "status");
        $invetory_items = StatusAndValue("mtl_sub_inventory", "sub_inventory_name");



        $sql = "SELECT sub_inventory_name,sum(item_qty) as qty FROM mtl_inventory_transactions  group by sub_inventory_name;";



        $result_2 = mysqli_query($con, $sql);

        $invetory_items = [];


        $total = 0;

        while ($row = mysqli_fetch_assoc($result_2)) {


            $invetory_items[$row['sub_inventory_name']] = (int) $row['qty'];

            $total += (int) $row['qty'];


        }

        $let_data = [];

        $let_data["total"] = $total;
        $let_data["Indexes"] = $invetory_items;







        $response['requisition_table'] = $requisition_table;
        $response['Lead_status'] = $Lead_status;
        $response['itemrequest'] = $itemMasterRequets;
        $response['purchaseOrder'] = $purchaseOrder;
        $response['grnStatus'] = $grnStatus;
        $response['empStatus'] = $emp_status;
        $response['invetory_items'] = $let_data;



        // echo print_r($data);
        echo json_encode($response);
    }
}
