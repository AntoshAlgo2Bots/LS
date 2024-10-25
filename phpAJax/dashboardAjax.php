<?php



if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if (isset($_GET['pieChartData'])) {
        include("../controllers/getData.php");

        $table_name = "purchase_order_header";
        $column_name = "status";
        $id = 28;
        $searchColumn = "PO_number";

        $purchaseOrder = StatusAndValue("purchase_order_header",  "status");
        $itemMasterRequets = StatusAndValue("item_master_temp",  "itemStatus");
        $requisition_table = StatusAndValue("requisition_table",  "status");
        $grnStatus = StatusAndValue("grn_sub_line_status",  "status");
        $Lead_status = StatusAndValue("create_query_form",  "status");












        $response['requisition_table'] = $requisition_table;
        $response['Lead_status'] = $Lead_status;
        $response['itemrequest'] = $itemMasterRequets;
        $response['purchaseOrder'] = $purchaseOrder;
        $response['grnStatus'] = $grnStatus;



        // echo print_r($data);
        echo json_encode($response);
    }
}
