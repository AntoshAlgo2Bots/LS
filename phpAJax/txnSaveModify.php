<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("../dbconnection/db.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    foreach ($_POST['rows'] as $row) {
        $transaction_no = intval($row['transaction_no']); // Sanitize input
        $transaction_date = $con->real_escape_string($row['transaction_date']);
        $amount_type = $con->real_escape_string($row['amount_type']);
        $credit_amt = isset($row['credit_amt']) && is_numeric($row['credit_amt']) ? floatval($row['credit_amt']) : 0;
        $debit_amt = isset($row['debit_amt']) && is_numeric($row['debit_amt']) ? floatval($row['debit_amt']) : 0;
        $particuler_to = $con->real_escape_string($row['particuler_to']);
        $site = $con->real_escape_string($row['site']);
        $main_head = $con->real_escape_string($row['main_head']);
        $sub_head = $con->real_escape_string($row['sub_head']);
        $from = $con->real_escape_string($row['from']);
        $to = $con->real_escape_string($row['to']);
        $startKm = $con->real_escape_string($row['startKm']);
        $endKm = $con->real_escape_string($row['endKm']);
        $totalKm = $con->real_escape_string($row['totalKm']);
        $rate = $con->real_escape_string($row['rate']);
        $bill_cheque_no = $con->real_escape_string($row['bill_cheque_no']);
        $invoice_date = $con->real_escape_string($row['invoice_date']);
        $invoice_no = $con->real_escape_string($row['invoice_no']);
        $gst_no = $con->real_escape_string($row['gst_no']);
        $remarks = $con->real_escape_string($row['remarks']);

        $totalKm = $endKm - $startKm;

        $debit_amt = $totalKm * $rate;

        // Update the specific transaction
        $sql_update = "UPDATE txn_book SET 
                          transaction_date = '$transaction_date', 
                          amount_type = '$amount_type', 
                          credit_amt = '$credit_amt', 
                          debit_amt = '$debit_amt', 
                          particuler_to = '$particuler_to', 
                          site = '$site', 
                          main_head = '$main_head', 
                          sub_head = '$sub_head', 
                          `from` = '$from', 
                          `to`= '$to', 
                          startKm = '$startKm', 
                          endKm = '$endKm', 
                          totalKm = '$totalKm', 
                          rate = '$rate', 
                          bill_cheque_no = '$bill_cheque_no', 
                          invoice_date = '$invoice_date', 
                          invoice_no = '$invoice_no', 
                          gst_no = '$gst_no', 
                          remarks = '$remarks' 
                      WHERE transaction_no = $transaction_no";

        // Execute the update query for the specific transaction
        if ($con->query($sql_update) === TRUE) {
            echo "Record updated successfully for transaction_no: $transaction_no<br>";
        } else {
            echo "Error updating record for transaction_no: $transaction_no - " . $con->error . "<br>";
            continue; // Skip further processing for this transaction if it fails
        }

        // Recalculate net balances for all transactions
        $net_balance = 0;

        // Fetch all transactions in order to calculate net balances
        $sql_all = "SELECT transaction_no, credit_amt, debit_amt FROM txn_book ORDER BY transaction_no";
        $result_all = $con->query($sql_all);

        if ($result_all) {
            while ($row_all = $result_all->fetch_assoc()) {
                $net_balance += $row_all['credit_amt'] - $row_all['debit_amt'];

                // Update the net balance for each transaction
                $update_net_balance_sql = "UPDATE txn_book SET net_balance = '$net_balance' WHERE transaction_no = {$row_all['transaction_no']}";
                if ($con->query($update_net_balance_sql) !== TRUE) {
                    echo "Error updating net balance for transaction_no {$row_all['transaction_no']}: " . $con->error . "<br>";
                }
            }
            echo "Net balances updated successfully.<br>";
        } else {
            echo "Error fetching all transactions: " . $con->error . "<br>";
        }
    }
}

$con->close(); // Close the connection
?>
