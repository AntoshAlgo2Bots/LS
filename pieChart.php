<?php
// Database connection
include("./dbconnection/db.php");


// Fetch total credit and debit amounts from transactions
$sql_credit = "SELECT SUM(credit_amt) AS total_credit FROM txn_book";
$sql_debit = "SELECT SUM(debit_amt) AS total_debit FROM txn_book";

$credit_result = $con->query($sql_credit);
$debit_result = $con->query($sql_debit);

$total_credit = $credit_result->fetch_assoc()['total_credit'] ?: 0;
$total_debit = $debit_result->fetch_assoc()['total_debit'] ?: 0;

// Calculate net balance
$net_balance = $total_credit - $total_debit;


// Fetch total credit and debit amounts from transactions
$sql_credit1 = "SELECT SUM(credit_amt) AS total_credit1 FROM txn_book WHERE form_status = 'SAVE'";
$sql_debit1 = "SELECT SUM(debit_amt) AS total_debit1 FROM txn_book WHERE form_status = 'SAVE'";

// Execute the queries
$credit_result1 = $con->query($sql_credit1);
$debit_result1 = $con->query($sql_debit1);

// Check for errors in the queries
if (!$credit_result1 || !$debit_result1) {
    die("Database query failed: " . $con->error);
}

// Fetch the results with a default value of 0 if null
$total_credit1 = $credit_result1->fetch_assoc()['total_credit1'] ?? 0;
$total_debit1 = $debit_result1->fetch_assoc()['total_debit1'] ?? 0;

// Calculate net balance
$net_balance1 = $total_credit1 - $total_debit1;

// Optionally, you can output the values for debugging
// echo "Total Credit: $total_credit1\n";
// echo "Total Debit: $total_debit1\n";
// echo "Net Balance: $net_balance1\n";


// Fetch total credit and debit amounts from transactions
$sql_credit2 = "SELECT SUM(credit_amt) AS total_credit2 FROM txn_book WHERE form_status = 'Submit'";
$sql_debit2 = "SELECT SUM(debit_amt) AS total_debit2 FROM txn_book WHERE form_status = 'Submit'";

// Execute the queries
$credit_result2 = $con->query($sql_credit2);
$debit_result2 = $con->query($sql_debit2);

// Check for errors in the queries
if (!$credit_result2 || !$debit_result2) {
    die("Database query failed: " . $con->error);
}

// Fetch the results with a default value of 0 if null
$total_credit2 = $credit_result2->fetch_assoc()['total_credit2'] ?? 0;
$total_debit2 = $debit_result2->fetch_assoc()['total_debit2'] ?? 0;

// Calculate net balance
$net_balance2 = $total_credit2 - $total_debit2;

// Optionally, you can output the values for debugging
// echo "Total Credit: $total_credit2\n";
// echo "Total Debit: $total_debit2\n";
// echo "Net Balance: $net_balance2\n";


// $transaction_no1 = "SELECT transaction_no FROM txn_book where amount_type = 'Credit'";
// $transaction_no2 = "SELECT transaction_no FROM txn_book where amount_type = 'Debit'";

$transaction_no1 = "SELECT transaction_no FROM txn_book WHERE amount_type = 'Credit'";

// $transaction_count = "SELECT amount_type, COUNT(transaction_no) AS transaction_count 
//                       FROM txn_book 
//                       WHERE amount_type IN ('Credit', 'Debit') 
//                       GROUP BY amount_type";



// Close connection
$con->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Net Balance Pie Chart</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="bg-gray-100 flex flex-wrap items-center gap-y-10 justify-center min-h-screen">
    <div class="bg-white shadow-lg rounded-lg p-8 max-w-64 mx-auto text-center border">
        <a href="./txn/txn_report.php">
            <h1 class="text-lg font-medium mb-4">All Credit &amp; Debit Txn</h1>
            <h2 class="text-sm mb-2">Total Save + Submit Txn</h2>
            <div class="flex">

                <canvas id="totalCreaditAndDebitChart" class="w-full h-auto"></canvas>
            </div>
        </a>
    </div>

    <div class="bg-white shadow-lg rounded-lg p-8 max-w-64 mx-auto text-center border">
        <h1 class="text-lg font-medium mb-4">Net Balance</h1>
        <h2 class="text-sm mb-2">Total Save + Submit Txn</h2>
        <div class="flex">

            <!-- <canvas id="totalCreaditAndDebitChart" class="w-full h-auto"></canvas> -->
            <canvas id="netBalanceChart" class="w-full h-auto bg-white"></canvas>
        </div>
    </div>


    <div class="bg-white shadow-lg rounded-lg p-8 max-w-64 mx-auto text-center border">
        <a href="./txn/txn_report_Save_Status.php">
            <h1 class="text-lg font-medium mb-4">Save Status</h1>
            <h2 class="text-sm mb-2">All Save Txn For Submit</h2>
            <div class="flex">
                
                <canvas id="totalSaveAndSaveChart" class="w-full h-auto"></canvas>
            </div>
        </a>
    </div>
    
    <div class="bg-white shadow-lg rounded-lg p-8 max-w-64 mx-auto text-center border">
        <h1 class="text-lg font-medium mb-4">Submit Status</h1>
        <h2 class="text-sm mb-2">All Submit Txn</h2>
        <div class="flex">

            <canvas id="SubmitChart" class="w-full h-auto"></canvas>
        </div>
    </div>





    <script>
        // PHP Variables into JavaScript
        const totalCredit = <?php echo $total_credit; ?>;
        const totalDebit = <?php echo $total_debit; ?>;
        const netBalance = <?php echo $net_balance; ?>;

        // --------------------------------------------------------------------------------------------------

        const totalCredit1 = <?php echo $total_credit1; ?>;
        const total_debit1 = <?php echo $total_debit1; ?>;
        console.log(totalCredit1)
        console.log(total_debit1)

        const totalCredit2 = <?php echo $total_credit2; ?>;
        const total_debit2 = <?php echo $total_debit2; ?>;
        console.log(totalCredit2)
        console.log(total_debit2)
        // console.log(transaction_count)


        // Chart.js - Pie Chart
        const ctx = document.getElementById('totalCreaditAndDebitChart').getContext('2d');
        const ctx1 = document.getElementById('netBalanceChart').getContext('2d');
        const ctx3 = document.getElementById('totalSaveAndSaveChart').getContext('2d');
        const ctx4 = document.getElementById('SubmitChart').getContext('2d');



        const netBalanceChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Credit', 'Debits'],
                datasets: [{
                    label: 'Balance',
                    data: [totalCredit, totalDebit],
                    backgroundColor: ['#4CAF50', '#FF6384'],
                    hoverOffset: 4
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Credit And Debit Distribution'
                    }
                }
            }
        });

        // const dataValues = [totalCredit1 || 0, total_debit1 || 0];
        // const labels = [];

        // if (totalCredit1) {
        //     labels.push('Save Credit');
        // } else {
        //     labels.push('No Credit');
        // }

        // if (total_debit1) {
        //     labels.push('Save Debits');
        // } else {
        //     labels.push('No Debits');
        // }


        const totalSaveAndSaveChart = new Chart(ctx3, {
            type: 'pie',
            data: {
                labels: ['Credit', 'Debits'],
                datasets: [{
                    label: 'Balance',
                    data: [totalCredit1, total_debit1],
                    backgroundColor: ['#4CAF50', '#FF6384'],
                    hoverOffset: 4
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Credit And Debit Distribution'
                    }
                }
            }
        });


        const SubmitChart = new Chart(ctx4, {
            type: 'pie',
            data: {
                labels: ['Credit', 'Debits'],
                datasets: [{
                    label: 'Balance',
                    data: [totalCredit2, total_debit2],
                    backgroundColor: ['#4CAF50', '#FF6384'],
                    hoverOffset: 4
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Credit And Debit Distribution'
                    }
                }
            }
        });




        const netBalanceColor = netBalance < 0 ? '#FF6384' : '#4CAF50'; // Red for negative, Green for positive

        const netBalanceChart1 = new Chart(ctx1, {
            type: 'pie',
            data: {
                labels: ['Current Net Balance'],
                datasets: [{
                    label: 'Balance',
                    data: [netBalance], // Use absolute value for the chart
                    backgroundColor: [netBalanceColor], // Set color based on netBalance
                    hoverOffset: 4
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Net Balance Distribution'
                    }
                }
            }
        });

    </script>
</body>

</html>