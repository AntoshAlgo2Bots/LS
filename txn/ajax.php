<?php

session_start();


include("../db/db.php");



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // 


    //if user login
    // require to inserte data from user


    if (isset($_POST['login'])) {


        $username = $_POST['username'];
        $password = $_POST['password'];


        $sql = "SELECT * from user_info where user_name='$username' ;";

        $result = mysqli_query($conn, $sql);



        if (mysqli_num_rows($result) > 0) {


            echo "user found<br>";

            $row = mysqli_fetch_assoc($result);

            echo "Success user found\n";
        
            echo $row['password']."\n";
            
            if ($row["password"] == $password) {
                // echo $row["mobile_number"];

                // header("location:dashboard.php");
                $respone["loggedIn"] = "true";
                $respone["message"] = "success";
                $_SESSION["username"] = $row["user_name"];
                $_SESSION["user_id"] = $row["id"];
 
                $user_id = $row["id"];


                $sql = "SELECT * FROM for_office.admin_roles WHERE admin_id = $user_id;";

                $result = mysqli_query($conn, $sql);


                $row = mysqli_fetch_assoc($result);

                // Convert values to integers
                // $_SERVER["user_viewOnly"] = (int) $row["user_viewOnly"];
                // $_SERVER["user_write"] = (int) $row["user_write"];
                // $_SESSION["admin_viewOnly"] = (int) $row["admin_viewOnly"];
                // $_SESSION["admin_write"] = (int) $row["admin_write"];
                // $_SESSION["admin_write"] = (int) $row["admin_write"];
                // $_SESSION["store_manager"] = (int) $row["store_manager"];
                // $_SESSION["store_isseuer"] = (int) $row["store_isseuer"];
                // $_SESSION["store_genrate"] = (int) $row["store_genrate"];
                // $_SESSION["PO_appover"] = (int) $row["PO_appover"];

                // $yes = $_SERVER["user_viewOnly"];
                // $user_write = (int) $row["user_write"];
                // $admin_viewOnly = (int) $row["admin_viewOnly"];
                // $admin_write = (int) $row["admin_write"];
                // $store_manager = (int) $row["store_manager"];
                // $store_isseuer = (int) $row["store_isseuer"];
                // $store_genrate = (int) $row["store_genrate"];

                // echo "<script>alert(")</script>"

                // Display the values
                header("location:create_txn.php");












            } else {

                echo "Password not match";
                header("location:login.php");
            }
            $respone["loggedIn"] = "False";
            $respone["message"] = "User not found";
        } else {
            header("location:login.php");
            echo mysqli_error($conn);
            echo "Get erro";
        }

        // echo $respone;
    } else {

        echo "user not found";
    }











    if (isset($_POST["newGenrate"])) {




        if ($_POST["type"] == "newGenrate") {


            $sql = "insert into requisition_table_header (created_by,created_date,updated_by,updated_date) values('user_1',CURRENT_DATE,'user1',CURRENT_DATE);";


            try {
                $result = mysqli_query($conn, $sql);
            } catch (\Throwable $th) {
                echo "new record genration gailed";
            }


            if ($result) {

                echo "new record gereated success fully";
                $record_id = mysqli_insert_id($conn);
                $_SESSION["record_id"] = $record_id;
            } else {
                header("location:home.php");
            }






            $created_by = "System";
            $created_date = date("y-m-d");
            $department = "SCH";
            $item_name = "BULB";
            $item_id = 2;
            $user_remarks = "need";
            $department_id = 1;
            $requisitionType = "SCH";
            $requisitionId = 1;
            $item_name = "BULB";
            $item_Code = 1;
            $project_id = "";
            $Quantity = 1;
            $user_remarks = "";

            $record_id = $_SESSION["record_id"];


            $sql = "INSERT INTO requisition_table (created_by,created_date, department_name,department_id,item_name, item_code, quantity, user_remarks,requisition_id) VALUES ('$created_by', '$created_date', '$department', $department_id,'$item_name', $item_Code, $Quantity,'$user_remarks',$record_id)";



            $result = mysqli_query($conn, $sql);



            if ($result) {


                echo "\nitem requisition is  is created is success fully";


                $sql = "INSERT into requisition_table_heade";
            }
        }
    }
}



if ($_SERVER['REQUEST_METHOD'] == 'GET') {


    if (isset($_GET['itemCodeInfoForPr'])) {

        include('db_connection.php');

        $sql = "SELECT item_code FROM for_office.item_master_main;";

        $result = mysqli_query($conn, $sql);


        $data = [];

        while ($row = mysqli_fetch_assoc($result)) {

            $data[] = $row["item_code"];
        }

        echo json_encode($data);
    } else if (isset($_GET['getShortDiscriptionWithItemCode'])) {

        $item_Code = $_GET['itemcode'];


        include('db_connection.php');

        $sql = "SELECT Short_Description FROM for_office.item_master_main where item_code= '$item_Code';";

        $result = mysqli_query($conn, $sql);




        $row = mysqli_fetch_assoc($result);

        $sDiscription = $row["Short_Description"];


        $respone["sDiscription"] = $sDiscription;


        echo json_encode($respone);



    }



    if (isset($_GET["getImgName"])) {


        include("./db.php");

        $item_code = $_GET["item_code"];


        $sql = "SELECT imagePath FROM for_office.item_master_main where item_code = '$item_code' ; ";


        $result = mysqli_query($conn, $sql);


        if ($result) {



            $row = mysqli_fetch_assoc($result);
            $imagePath = $row['imagePath'];


            $respone['success'] = true;
            $respone['imgpath'] = $imagePath;

        } else {

            $respone['success'] = false;
            $respone['message'] = 'Something went wrong';
            $respone['error'] = mysqli_error($conn);
            $respone['sql_error'] = $sql;


        }















        echo json_encode($respone);




    }



}