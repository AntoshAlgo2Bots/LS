<?php
// Database connection
include("./dbconnection/db.php");



// Query to sum credit and debit amounts by date
$sql = "
    SELECT 
        transaction_date, 
        SUM(credit_amt) AS total_credit,
        SUM(debit_amt) AS total_debit
    FROM 
        txn_book
    WHERE 
        transaction_date
    GROUP BY 
        transaction_date
    ORDER BY 
        transaction_date DESC limit 7
";

$result = $con->query($sql);

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = [
        'date' => $row['transaction_date'],
        'credit' => (float)$row['total_credit'],
        'debit' => (float)$row['total_debit']
    ];
}

$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Chart</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="p-6"> <!--max-w-3xl mx-auto-->
        <h1 class="text-xl font-medium text-center mb-4">Transaction Overview</h1>
        <h1 class="text-sm font-medium text-center mb-4">Last 7 Days Transaction</h1>
        <div class="bg-white shadow rounded-lg p-6 border">
             <canvas id="transactionChart" width="900" height="400"></canvas> <!--width - 400px height - 200 -->
        </div>
    </div>
    <script>
        const data = <?php echo json_encode($data); ?>;
        const labels = data.map(item => item.date);
        const creditData = data.map(item => item.credit);
        const debitData = data.map(item => item.debit);

        const ctx2 = document.getElementById('transactionChart').getContext('2d');
        const transactionChart = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: 'Credit',
                        data: creditData,
                        backgroundColor: 'rgba(16, 150, 24, 0.5)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Debit',
                        data: debitData,
                        backgroundColor: 'rgba(255, 0, 0, 0.5)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
