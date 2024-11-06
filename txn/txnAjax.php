<?php

session_start();

include("../dbconnection/db.php");

date_default_timezone_set("Asia/Kolkata");

if (isset($_POST["userData"])) {
    $userData = $_POST["userData"];


    // Retrieve POST data
    $transaction_no = $userData['transaction_no'];
    $transaction_date = $userData['transaction_date'];
    $amount_type = $userData['amount_type'];
    $credit_amt = $userData['credit_amt'];
    $debit_amt = $userData['debit_amt'];
    $net_balance = $userData['net_balance'];
    $particuler_to = $userData['particuler_to'];
    $site = $userData['site'];
    $main_head = $userData['main_head'];
    $sub_head = $userData['sub_head'];
    $from = $userData['from'];
    $to = $userData['to'];
    $startKm = $userData['startKm'];
    $endKm = $userData['endKm'];
    $totalKm = $userData['totalKm'];
    $rate = $userData['rate'];
    $bill_cheque_no = $userData['bill_cheque_no'];
    $invoice_date = $userData['invoice_date'];
    $invoice_no = $userData['invoice_no'];
    $gst_no = $userData['gst_no'];
    $remarks = $userData['remarks'];
    $form_status = $userData['form_status'];
    $updatedBy = isset($_SESSION['username']) ? $_SESSION['username'] : '';
    $updatedDate = date("Y-m-d H:i:s");

    // Prepare and execute the UPDATE query
    $sql = "UPDATE txn_book SET 
                transaction_date = ?, 
                amount_type = ?, 
                credit_amt = ?, 
                debit_amt = ?, 
                net_balance = ?, 
                particuler_to = ?, 
                site = ?, 
                main_head = ?, 
                sub_head = ?, 
                `from` = ?, 
                `to` = ?, 
                startKm = ?, 
                endKm = ?, 
                totalKm = ?, 
                rate = ?, 
                bill_cheque_no = ?, 
                invoice_date = ?, 
                invoice_no = ?, 
                gst_no = ?, 
                remarks = ?, 
                form_status = ?, 
                updatedBy = ?, 
                updatedDate = ? 
            WHERE transaction_no = ?";

    if ($stmt = $con->prepare($sql)) {
        // Bind parameters
        $stmt->bind_param(
            "ssssssssssssssssssssssss",
            $transaction_date,
            $amount_type,
            $credit_amt,
            $debit_amt,
            $net_balance,
            $particuler_to,
            $site,
            $main_head,
            $sub_head,
            $from,
            $to,
            $startKm,
            $endKm,
            $totalKm,
            $rate,
            $bill_cheque_no,
            $invoice_date,
            $invoice_no,
            $gst_no,
            $remarks,
            $form_status,
            $updatedBy,
            $updatedDate,
            $transaction_no
        );

        // Execute the update
        if ($stmt->execute()) {
            $response['success'] = true;
            $response['message'] = "Record updated successfully for transaction_no: $transaction_no";
            // echo "Record updated successfully for transaction_no: $transaction_no<br>";
        } else {
            $response['success'] = false;
            $response['message'] = "Record Not Updateded";
            // echo "Error updating record for transaction_no: $transaction_no - " . $stmt->error . "<br>";
            return;
        }
    } else {
        echo "Error preparing the statement: " . $con->error . "<br>";
        return;
    }

    // Recalculate net balances for all transactions
    $net_balance = 0;
    $sql_all = "SELECT transaction_no, credit_amt, debit_amt FROM txn_book ORDER BY transaction_no";
    $result_all = $con->query($sql_all);

    if ($result_all) {
        while ($row = $result_all->fetch_assoc()) {
            $net_balance += $row['credit_amt'] - $row['debit_amt'];

            // Update the net balance for each transaction
            $update_sql = "UPDATE txn_book SET net_balance = ? WHERE transaction_no = ?";
            if ($stmt = $con->prepare($update_sql)) {
                $stmt->bind_param("di", $net_balance, $row['transaction_no']);
                if (!$stmt->execute()) {
                    echo "Error updating net balance for transaction_no {$row['transaction_no']}: " . $stmt->error . "<br>";
                }
            }
        }
        // echo "Net balances updated successfully.<br>";
        $response['sucess'] = true;
        $response['message'] = "Data updated successfully";

    } else {
        // echo "Error fetching transactions: " . $con->error . "<br>";
        $response['sucess'] = false;
        $response['message'] = "Data Not Updated";
    }
}


header('Content-Type: application/json');

echo json_encode($response);
?>