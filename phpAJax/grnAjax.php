<?php
include("../dbconnection/db.php");



if ($_SERVER['REQUEST_METHOD'] == 'POST') {




    if (isset($_POST['grnDataInsert'])) {


        // $response["data"] = $_POST;







        $response["success"] = true;




        echo  json_encode($response);
    }
}






if ($_SERVER['REQUEST_METHOD'] == 'GET') {




    if (isset($_GET['getGrnReportData'])) {



        $searchDataArr = $_GET['searchDataArr'];


        $search_query = isset($_GET['search_query']) ? $_GET['search_query'] : '';




        // $sql = "SELECT * FROM for_office.grn_sub_line_status;";
//         $sql = "SELECT * FROM for_office.grn_sub_line_status a join for_office.grn_line_items b on a.po_line_id=b.id 
// join for_office.grn_goods_receipt_header c on a.grn_head_id = c.id inner JOIN purchase_order_line d ON a.po_line_id = d.id WHERE a.status LIKE ''";
        $sql = "SELECT  a.* ,d.quantity,d.po_number,c.* FROM for_office.grn_sub_line_status a join for_office.grn_line_items b on a.grn_line_id=b.id 
join for_office.grn_goods_receipt_header c on a.grn_head_id = c.id inner JOIN purchase_order_line d ON a.grn_line_id = d.id WHERE a.status LIKE '$search_query'";












        foreach ($searchDataArr as $key => $value) {
            $sql .= " or a.status LIKE '%$value%'";
        }



        $response["sql"] = $sql;






        $result = mysqli_query($con, $sql);




        // echo $sql;

        $data  = [];

        while ($row = mysqli_fetch_assoc($result)) {


            $data[] = $row;
        }







        $response['success'] = true;


        $response['Requested Data']  = $_GET;


        $response['Data'] = $data;


        echo json_encode($response);
    }



    if (isset($_GET['getGrnReportDataWithSearch'])) {



        $searchDataArr = $_GET['searchDataArr'];


        $search_query = isset($_GET['search_query']) ? $_GET['search_query'] : '';




        // $sql = "SELECT * FROM for_office.grn_sub_line_status;";
        $sql = "SELECT * FROM for_office.grn_sub_line_status a join for_office.grn_line_items b on a.po_line_id=b.id 
join for_office.grn_goods_receipt_header c on a.grn_head_id = c.id WHERE status LIKE ''";












        foreach ($searchDataArr as $key => $value) {
            $sql .= " or status LIKE '%$value%'";
        }



        $response["sql"] = $sql;






        $result = mysqli_query($con, $sql);





        $data  = [];

        while ($row = mysqli_fetch_assoc($result)) {


            $data[] = $row;
        }







        $response['success'] = true;


        $response['Requested Data']  = $_GET;


        $response['Data'] = $data;


        echo json_encode($response);
    }



}
