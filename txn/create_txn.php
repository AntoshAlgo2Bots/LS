<?php


// session_start();

include("../dbconnection/db.php");

$sql = "SELECT * 
FROM txn_book 
WHERE form_status = 'Save' 
ORDER BY transaction_no DESC 
LIMIT 10;
";
// $sql="SELECT * FROM txn_book where form_status = 'SAVE'";
// $sql = "SELECT * FROM daily_txn_book.txn_book;";


$result = mysqli_query($con, $sql);

$query = "SELECT main_head_name FROM add_attribute WHERE main_head_name IS NOT NULL AND main_head_name != ''";
$result1 = $con->query($query);

$options = [];
if ($result1->num_rows > 0) {
    while ($row = $result1->fetch_assoc()) {
        $options[] = $row['main_head_name'];
    }
}

$query2 = "SELECT sub_main_name FROM add_attribute WHERE sub_main_name IS NOT NULL AND sub_main_name != ''";
$result3 = $con->query($query2);

$options2 = [];
if ($result3->num_rows > 0) {
    while ($row = $result3->fetch_assoc()) {
        $options2[] = $row['sub_main_name'];
    }
}



?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
    <link rel="stylesheet"
        href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js">
    </script>

    <title>Daily Txn Book </title>
</head>




<body>
    <div>
        <?php






        session_start();

        if (!isset($_SESSION["username"])) {




            header("location:login.php");




        }




        ?>


        <nav class="bg-white dark:bg-gray-900  w-full z-20 top-0 start-0 border-b border-gray-200 dark:border-gray-600">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-around mx-auto p-4">
                <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">

                </a>
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">
                    Hello! <?php echo $_SESSION["username"] ?></span>
                <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                    <a href="../logout.php" type="button"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Logout</a>
                    <button data-collapse-toggle="navbar-sticky" type="button"
                        class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                        aria-controls="navbar-sticky" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 17 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 1h15M1 7h15M1 13h15" />
                        </svg>
                    </button>
                </div>
                <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
                    <ul
                        class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                        <li>
                            <a href="../dashboard.php"
                                class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500"
                                aria-current="page">Home</a>
                        </li>
                        <!--  <li>
                    <a href="#"
                        class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">About</a>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Services</a>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
                </li> -->
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <section class=" py-1 bg-blueGray-50">
        <div class="w-full lg:w-11/12 px-4 mx-auto mt-3">
            <div
                class="relative flex flex-col min-w-0 break-words w-full mb-5 shadow-lg rounded-lg bg-blueGray-100 border-0">
                <div class="rounded-t bg-white mb-0 px-6 py-6">
                    <div class="text-center flex justify-between">
                        <h6 class="text-blueGray-700 text-xl font-bold">
                            Daily Transaction Creation Book
                            <!-- <?php echo $_SESSION["username"]; ?> -->
                        </h6>
                        <!-- <button
                        class="bg-pink-500 text-white active:bg-pink-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
                            type="button">
                            As on 11 May 2024
                        </button>
                        <button
                        class="bg-pink-500 text-white active:bg-pink-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
                            type="button">
                            Year : 2024 - 25
                        </button> -->
                    </div>
                </div>
                <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                    <form action="action.php" method="post" id="myForm">
                        <h6 class="text-blueGray-400 text-sm mt-3 mb-5 font-bold uppercase">
                            Transaction Information
                        </h6>
                        <div class="mt-4">
                            <div class="flex flex-wrap justify-center md:justify-start relative w-full mb-3 gap-x-8">
                                <div>

                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                        Transaction No :
                                    </label>
                                    <input type="text" name="transaction_no"
                                        class="border-0 px-3 py-2 placeholder-blueGray-300 mb-4  text-blueGray-600 bg-white rounded text-sm w-56 shadow focus:outline-none focus:ring-1 ease-linear transition-all duration-150"
                                        placeholder="Auto Generated" disabled>
                                </div>

                                <div>
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                        Transaction Date :
                                    </label>
                                    <input type="date" id="dateInput" name="transaction_date" required
                                        class="border-0 px-3 py-2 placeholder-blueGray-300 mb-4  text-blueGray-600 bg-white rounded text-sm w-56 shadow focus:outline-none focus:ring-1 ease-linear transition-all duration-150">
                                </div>
                                <div>

                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                        Amount Type :
                                    </label>
                                    <select id="select_amt" name="amount_type" onchange="verifyAnswer()"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-56 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected hidden>Select one</option>
                                        <option value="Credit">Credit</option>
                                        <option value="Debit">Debit</option>
                                    </select>
                                </div>

                                <div>
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                        Credit Amount :
                                    </label>
                                    <input type="number" name="credit_amt" id="credit_amt_field"
                                        class="border-0 px-3 py-2 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm w-56 shadow focus:outline-none focus:ring-1 ease-linear transition-all duration-150"
                                        value="" readonly>
                                </div>

                                <div>
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                        Debit Amount :
                                    </label>
                                    <input type="number" name="debit_amt" id="debit_amt_field" value=""
                                        class="border-0 px-3 py-2 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm w-56 shadow focus:outline-none focus:ring-1 ease-linear transition-all duration-150"
                                        readonly>
                                </div>

                                <div>

                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                        GIVEN To / RECEIVED from :
                                    </label>
                                    <input type="text" name="particuler_to" required
                                        class="border-0 px-3 py-2 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm w-56 shadow focus:outline-none focus:ring-1 ease-linear transition-all duration-150">
                                </div>
                                <div>

                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                        Site :
                                    </label>
                                    <input type="text" name="site" required
                                        class="border-0 px-3 py-2 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm w-56 shadow focus:outline-none focus:ring-1 ease-linear transition-all duration-150">
                                </div>
                                <div>

                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                        Main Head :
                                    </label>
                                    <select name="main_head"
                                        class="bg-gray-50 border uppercase border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-56 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected hidden>Select one</option>
                                        <?php foreach ($options as $option) { ?>
                                            <option class="uppercase" value="<?php echo $option; ?>"><?php echo $option; ?>
                                            </option>
                                        <?php } ?>

                                    </select>
                                </div>

                                <div>

                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                        Sub Head :
                                    </label>
                                    <select name="sub_head" id="sub_head_select" onchange="subHeadSelect()"
                                        class="bg-gray-50 border uppercase border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-56 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected hidden>Select one</option>
                                        <?php foreach ($options2 as $option) { ?>
                                            <option class="uppercase" value="<?php echo $option; ?>"><?php echo $option; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div>
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                        From :
                                    </label>
                                    <input type="text" name="from" id="from"
                                        class="border-0 px-3 py-2 placeholder-blueGray-300 mb-4  text-blueGray-600 bg-white rounded text-sm w-56 shadow focus:outline-none focus:ring-1 ease-linear transition-all duration-150">
                                </div>

                                <div>
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                        To :
                                    </label>
                                    <input type="text" name="to" id="to"
                                        class="border-0 px-3 py-2 placeholder-blueGray-300 mb-4  text-blueGray-600 bg-white rounded text-sm w-56 shadow focus:outline-none focus:ring-1 ease-linear transition-all duration-150">
                                </div>

                                <div>
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                        Start KM :
                                    </label>
                                    <input type="number" id="startKm" name="startKm"
                                        class="border-0 px-3 py-2 placeholder-blueGray-300 mb-4 text-blueGray-600 bg-white rounded text-sm w-56 shadow focus:outline-none focus:ring-1 ease-linear transition-all duration-150"
                                        oninput="calculateTotalKm()">
                                </div>

                                <div>
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                        End KM :
                                    </label>
                                    <input type="number" id="endKm" name="endKm"
                                        class="border-0 px-3 py-2 placeholder-blueGray-300 mb-4 text-blueGray-600 bg-white rounded text-sm w-56 shadow focus:outline-none focus:ring-1 ease-linear transition-all duration-150"
                                        oninput="calculateTotalKm()">
                                </div>

                                <div>
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                        Total KM :
                                    </label>
                                    <input type="number" id="totalKm" name="totalKm"
                                        class="border-0 px-3 py-2 placeholder-blueGray-300 mb-4 text-blueGray-600 bg-white rounded text-sm w-56 shadow focus:outline-none focus:ring-1 ease-linear transition-all duration-150"
                                       readonly value="00.00" placeholder="00.00">
                                </div>
                                <div>
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                        Rate:
                                    </label>
                                    <input type="number" name="rate" id="rate"
                                        class="border-0 px-3 py-2 placeholder-blueGray-300 mb-4 text-blueGray-600 bg-white rounded text-sm w-56 shadow focus:outline-none focus:ring-1 ease-linear transition-all duration-150"
                                        oninput="calculateDebit()">
                                </div>
                            </div>
                        </div>

                        <hr class="mt-6 border-b-1 border-blueGray-300">

                        <h6 class="text-blueGray-400 text-sm mt-3 mb-5 font-bold uppercase">
                            Cheque Information
                        </h6>

                        <div class="flex flex-wrap justify-center md:justify-start relative w-full mb-3 gap-x-10">

                            <div>
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                    Bill / Cheque No :
                                </label>
                                <input type="number" name="bill_cheque_no"
                                    class="border-0 px-3 py-2 placeholder-blueGray-300 mb-4  text-blueGray-600 bg-white rounded text-sm w-56 shadow focus:outline-none focus:ring-1 ease-linear transition-all duration-150">
                            </div>
                            <div>

                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                    Invoice Dated :
                                </label>
                                <input type="date" name="invoice_date"
                                    class="border-0 px-3 py-2 placeholder-blueGray-300 mb-4  text-blueGray-600 bg-white rounded text-sm w-56 shadow focus:outline-none focus:ring-1 ease-linear transition-all duration-150">
                            </div>
                            <div>

                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                    Invoice No :
                                </label>
                                <input type="number" name="invoice_no"
                                    class="border-0 px-3 py-2 placeholder mb-4 text-blueGray-300 text-blueGray-600 bg-white rounded text-sm w-56 shadow focus:outline-none focus:ring-1 ease-linear transition-all duration-150">
                            </div>
                            <div>

                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                    GST No :
                                </label>
                                <input type="number" name="gst_no"
                                    class="border-0 px-3 py-2 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm w-56 shadow focus:outline-none focus:ring-1 ease-linear transition-all duration-150">
                            </div>
                            <div>
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                    Remarks :
                                </label>
                                <input type="text" name="remarks"
                                    class="border-0 px-3 py-2 placeholder-blueGray-300 mb-4  text-blueGray-600 bg-white rounded text-sm w-56 shadow focus:outline-none focus:ring-1 ease-linear transition-all duration-150">
                            </div>
                        </div>

                        <hr class="mt-6 border-b-1 border-blueGray-300 mb-4">
                        <div class="flex justify-center">
                            <button
                                class="bg-pink-700 text-white active:bg-pink-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
                                type="submit">
                                Save Details
                            </button>
                        </div>
                    </form>



                </div>

            </div>
            <div class="relative overflow-x-auto mt-4">
                <table
                    class="w-full text-sm text-left whitespace-nowrap rtl:text-right text-gray-500 dark:text-gray-400 mb-2">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">

                            </th>
                            <th scope="col" class="px-6 py-3">
                                Txn No
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Transaction Date
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Amount Type
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Credit Amount
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Debit Amount
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Net Balance
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Particulers / GIVEN To
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Site
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Main Head
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Sub Head
                            </th>
                            <th scope="col" class="px-6 py-3">
                                From
                            </th>
                            <th scope="col" class="px-6 py-3">
                                To
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Start KM
                            </th>
                            <th scope="col" class="px-6 py-3">
                                End KM
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Total KM
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Rate
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Created By
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Created Date
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Bill / Cheque No
                            </th>

                            <th scope="col" class="px-6 py-3">
                                Invoice Dated
                            </th>

                            <th scope="col" class="px-6 py-3">
                                Invoice No
                            </th>
                            <th scope="col" class="px-6 py-3">
                                GST No
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Remarks
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                            <!-- <th scope="col" class="px-6 py-3">

                            </th> -->

                        </tr>
                    </thead>
                    <tbody id="searchTableTbody">


                        <?php

                        while ($row = mysqli_fetch_assoc($result)) {

                            // echo print_r($row);
                        





                            ?>


                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <input id="checkbox" line-id="<?php echo $row['transaction_no'] ?>" type="checkbox"
                                        <?php if ($row['form_status'] == 'SUBMIT') {
                                            echo "disabled";
                                        } ?>
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                </th>
                                <td scope="row" class="px-6 py-4">
                                    <input type="text" name="transaction_no" id="" disabled
                                        value=" <?php echo $row['transaction_no'] ?>" class="w-20">
                                </td>
                                <td class="px-6 py-4">
                                    <input type="text" name="transaction_date" id=""
                                        value="<?php echo $row['transaction_date'] ?>" class="w-32">
                                </td>
                                <td class="px-6 py-4">
                                    <input type="text" name="amount_type" id="" value="<?php echo $row['amount_type'] ?>"
                                        class="w-20">
                                </td>
                                <td class="px-6 py-4">
                                    <input type="text" name="credit_amt" id="" value="<?php echo $row['credit_amt'] ?>"
                                        class="w-24">
                                </td>
                                <td class="px-6 py-4">
                                    <input type="text" name="debit_amt" id="" value="<?php echo $row['debit_amt'] ?>"
                                        class="w-24">
                                </td>
                                <td class="px-6 py-4">

                                    <input type="text" name="net_balance" id="" value="<?php echo $row['net_balance'] ?>"
                                        disabled class="w-28">
                                </td>
                                <td class="px-6 py-4">
                                    <input type="text" name="particuler_to" id=""
                                        value=" <?php echo $row['particuler_to'] ?>">

                                </td>
                                <td class="px-6 py-4">
                                    <input type="text" name="site" id="" value=" <?php echo $row['site'] ?>">

                                </td>
                                <td class="px-6 py-4">
                                    <input type="text" name="main_head" id="" value="<?php echo $row['main_head'] ?>"
                                        class="w-40">

                                </td>
                                <td class="px-6 py-4">
                                    <input type="text" name="sub_head" id="" value=" <?php echo $row['sub_head'] ?>"
                                        class="w-40">

                                </td>
                                <td class="px-6 py-4">
                                    <input type="text" name="sub_head" id="" value=" <?php echo $row['from'] ?>"
                                        class="w-40">

                                </td>
                                <td class="px-6 py-4">
                                    <input type="text" name="sub_head" id="" value=" <?php echo $row['to'] ?>"
                                        class="w-40">

                                </td>
                                <td class="px-6 py-4">
                                    <input type="text" name="sub_head" id="" value=" <?php echo $row['startKm'] ?>"
                                        class="w-40">

                                </td>
                                <td class="px-6 py-4">
                                    <input type="text" name="sub_head" id="" value=" <?php echo $row['endKm'] ?>"
                                        class="w-40">

                                </td>
                                <td class="px-6 py-4">
                                    <input type="text" name="sub_head" id="" value=" <?php echo $row['totalKm'] ?>"
                                        class="w-40">

                                </td>
                                <td class="px-6 py-4">
                                    <input type="text" name="sub_head" id="" value=" <?php echo $row['rate'] ?>"
                                        class="w-40">

                                </td>
                                <td class="px-6 py-4">
                                    <input type="text" name="sub_head" id="" value=" <?php echo $row['currentUser'] ?>"
                                        disabled class="w-32">

                                </td>
                                <td class="px-6 py-4">
                                    <input type="text" name="" id="" value=" <?php echo $row['currentTime'] ?>" disabled>

                                </td>
                                <td class="px-6 py-4">
                                    <input type="text" name="bill_cheque_no" id=""
                                        value="<?php echo $row['bill_cheque_no'] ?>">

                                </td>
                                <td class="px-6 py-4">
                                    <input type="text" name="invoice_date" id="" value="<?php echo $row['invoice_date'] ?>"
                                        class="w-28">

                                </td>
                                <td class="px-6 py-4">
                                    <input type="text" name="invoice_no" id="" value="<?php echo $row['invoice_no'] ?>">

                                </td>
                                <td class="px-6 py-4">
                                    <input type="text" name="gst_no" id="" value=" <?php echo $row['gst_no'] ?>"
                                        class="w-28">

                                </td>
                                <td class="px-6 py-4">
                                    <input type="text" name="remarks" id="" value="<?php echo $row['remarks'] ?>">

                                </td>
                                <td class="px-6 py-4">
                                    <input type="text" name="" id="" value=" <?php echo $row['form_status'] ?>" class="w-20"
                                        disabled>
                                </td>
                                <!-- <td class="px-6 py-4">
                                    <a href="#" class="text-blue-600">Edit</a>
                                </td> -->

                            </tr>

                            <?php


                        }

                        ?>
                    </tbody>
                </table>
            </div>
            <div class="flex justify-center gap-x-10 mb-5 mt-4">
                <button type="button" id="updateBtn"
                    class="bg-green-600 text-white active:bg-pink-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
                    type="button">
                    Update Now
                </button>
                <button onclick="getCheckedRowData()"
                    class="bg-pink-700 text-white active:bg-pink-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
                    type="button">
                    Submit Now
                </button>
            </div>
        </div>
    </section>

    <!-- <script>
    function updateDateTime() {
        const now = new Date();
        // Get UTC time and add 5 hours and 30 minutes for IST
        const istOffset = 5.5 * 60 * 60 * 1000; // 5 hours 30 minutes in milliseconds
        const istDate = new Date(now.getTime() + istOffset);
        
        // Format the date to YYYY-MM-DDTHH:MM
        const formattedDateTime = istDate.toISOString().slice(0, 16);
        document.getElementById('datetime').value = formattedDateTime;
        }
        
        // Update the input field when the page loads
        window.onload = updateDateTime;
    </script> -->

    <script src="./script.js"></script>
    <script>
        function setCurrentDate() {
            const now = new Date();

            // Format the date to YYYY-MM-DD
            const year = now.getFullYear();
            const month = String(now.getMonth() + 1).padStart(2, '0'); // Months are 0-indexed
            const day = String(now.getDate()).padStart(2, '0');

            const formattedDate = `${year}-${month}-${day}`;
            document.getElementById('dateInput').value = formattedDate;
        }

        // Set the current date when the page loads
        window.onload = setCurrentDate;







        $(document).ready(function () {
            $("#updateBtn").on("click", function () {
                const checkedRowsData = [];

                $("#searchTableTbody input[type='checkbox']").each(function () {
                    if ($(this).is(":checked")) {
                        const row = $(this).closest("tr");
                        const rowData = {
                            transaction_no: row.find('input[name="transaction_no"]').val() || '',
                            transaction_date: row.find('input[name="transaction_date"]').val() || '',
                            amount_type: row.find('input[name="amount_type"]').val() || '',
                            credit_amt: row.find('input[name="credit_amt"]').val() || '',
                            debit_amt: row.find('input[name="debit_amt"]').val() || '',
                            net_balance: row.find('input[name="net_balance"]').val() || '',
                            particuler_to: row.find('input[name="particuler_to"]').val() || '',
                            site: row.find('input[name="site"]').val() || '',
                            main_head: row.find('input[name="main_head"]').val() || '',
                            sub_head: row.find('input[name="sub_head"]').val() || '',
                            bill_cheque_no: row.find('input[name="bill_cheque_no"]').val() || '',
                            invoice_date: row.find('input[name="invoice_date"]').val() || '',
                            invoice_no: row.find('input[name="invoice_no"]').val() || '',
                            gst_no: row.find('input[name="gst_no"]').val() || '',
                            remarks: row.find('input[name="remarks"]').val() || ''
                        };
                        checkedRowsData.push(rowData);
                    }
                });


                if (checkedRowsData.length > 0) {
                    $.ajax({
                        url: '../phpAJax/txnSaveModify.php', // Replace with your actual PHP script
                        type: 'POST',
                        data: { rows: checkedRowsData },
                        success: function (response) {
                            alert("Data Updated Successfully");
                            console.log(response);
                        },
                        error: function (xhr, status, error) {
                            console.error(error);
                        }
                    });
                } else {
                    alert("Please select at least one checkbox.");
                }
            });
        });



        function calculateTotalKm() {
            const startKm = parseInt(document.getElementById('startKm').value) || 0;
            const endKm = parseInt(document.getElementById('endKm').value) || 0;
            const totalKm = endKm - startKm;
            document.getElementById('totalKm').value = totalKm >= 0 ? totalKm : 0; // Ensure total KM is not negative
        }

        //Update by Antosh Kumar Pandey Date - 
        //Convert All parseFloat in parseInt

        function calculateDebit() {
            const totalKm = parseInt(document.getElementById('totalKm').value) || 0;
            const rate = parseInt(document.getElementById('rate').value) || 0;
            const debitAmount = totalKm * rate;

            document.getElementById('debit_amt_field').value = debitAmount; 
            // document.getElementById('debit_amt_field').value = debitAmount.toFixed(2); // Format to 2 decimal places
        }



    </script>
</body>

</html>