<?php




if ($_SERVER['REQUEST_METHOD'] == 'POST') {




    if (isset($_POST['getPoLineDataForGrn'])) {



        $po_number = $_POST['po_number'];









        // include("../db.php");
        include('../dbconnection/db.php');








        //GET ALL DATA FROM PO ORDERS QUERY HERE .


        $stmt = $con->prepare("SELECT * FROM for_office.purchase_order_line");


        $stmt->bind_param("", $$po_number);




        $result =   $stmt->execute();



        $stmt->close();





    }


















}






?>