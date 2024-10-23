<?php

session_start();
include("../dbconnection/db.php");

date_default_timezone_set("Asia/Kolkata");

$transaction_date = $_POST["transaction_date"];
$amount_type = $_POST["amount_type"];
$credit_amt = isset($_POST['credit_amt']) && is_numeric($_POST['credit_amt']) ? floatval($_POST['credit_amt']) : 0;
$debit_amt = isset($_POST['debit_amt']) && is_numeric($_POST['debit_amt']) ? floatval($_POST['debit_amt']) : 0;
$particuler_to = $_POST["particuler_to"];
$site = $_POST["site"];
$main_head = $_POST["main_head"];
$sub_head = $_POST["sub_head"];
$from = $_POST["from"];
$to = $_POST["to"];
$startKm = $_POST["startKm"];
$endKm = $_POST["endKm"];
$totalKm = $_POST["totalKm"];
$rate = $_POST["rate"];
$bill_cheque_no = $_POST["bill_cheque_no"];
$invoice_date = $_POST["invoice_date"];
$invoice_no = $_POST["invoice_no"];
$gst_no = $_POST["gst_no"];
$remarks = $_POST["remarks"];
$currentUser = $_SESSION['username'];
$currentTime = date("Y-m-d H:i:s");

// $net_balace = $credit_amt - $debit_amt;

$sql2 = "SELECT net_balance FROM txn_book ORDER BY transaction_no DESC LIMIT 1";
$result = $conn->query($sql2);

if ($result && $result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $net_balance = $row['net_balance'];
} else {
  $net_balance = 0; // Set to 0 if there are no previous transactions
}

// Validate and sanitize input
$credit_amt = isset($_POST['credit_amt']) ? (float) $_POST['credit_amt'] : 0;
$debit_amt = isset($_POST['debit_amt']) ? (float) $_POST['debit_amt'] : 0;

// Update the net balance
if ($credit_amt > 0) {
  $net_balance += $credit_amt;
}

if ($debit_amt > 0) {
  $net_balance -= $debit_amt;
}

// Prepare the insert statement
// $stmt = $conn->prepare("INSERT INTO txn_book (net_balace) VALUES (?)");
// $stmt->bind_param("d", $net_balace); // "d" for double

// if ($stmt->execute()) {
//     echo "Transaction successful!";
// } else {
//     echo "Error: " . $stmt->error;
// }

$sql = "INSERT INTO daily_txn_book.txn_book 
(transaction_date, amount_type, credit_amt, debit_amt, net_balance, particuler_to, site, main_head, sub_head, `from`, `to`, startKm, endKm, totalKm, rate, bill_cheque_no, invoice_date, invoice_no, gst_no, remarks, currentUser, currentTime) 
VALUES ('$transaction_date', '$amount_type', '$credit_amt', '$debit_amt', '$net_balance', '$particuler_to', '$site', '$main_head', '$sub_head', '$from', '$to', '$startKm', '$endKm', '$totalKm', '$rate', '$bill_cheque_no', '$invoice_date', '$invoice_no', '$gst_no', '$remarks', '$currentUser', '$currentTime')";


if ($conn->query($sql) === TRUE) {
  $response["success"] = true;
  $response["message"] = "New record created successfully";
  // echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
  $response["success"] = false;
  $response["message"] = " record Not created ";
}

$conn->close();

?>