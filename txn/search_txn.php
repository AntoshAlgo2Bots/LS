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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
                            <!-- </li>
                <li>
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
                            Daily Transaction Search Book
                        </h6>
                    </div>
                </div>
                <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                    <form action="" method="post" id="">
                        <h6 class="text-blueGray-400 text-sm mt-3 mb-5 font-bold uppercase">
                            Transaction Information
                        </h6>
                        <div class="mt-4">
                            <div class="flex flex-wrap justify-center md:justify-start relative w-full mb-3 gap-x-10">
                                <div>

                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2 ">
                                        Transaction No :
                                    </label>
                                    <input type="number" id="transaction_no" name="transaction_no"
                                        class="border-0 px-3 py-2 placeholder-blueGray-300 mb-4  text-blueGray-600 bg-white rounded text-sm w-56 shadow focus:outline-none focus:ring-1 ease-linear transition-all duration-150"
                                        placeholder="Enter Txn Number">
                                    <button type="button" onclick="getUSerDataByUserName()"
                                        class="py-3 px-5 ms- text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                        </svg>
                                        <span class="sr-only">Search</span>
                                    </button>
                                </div>

                                <!-- <div>
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                        Transaction Date :
                                    </label>
                                    <input type="date" id="transaction_date" name="transaction_date"
                                        class="border-0 px-3 py-2 placeholder-blueGray-300 mb-4  text-blueGray-600 bg-white rounded text-sm w-56 shadow focus:outline-none focus:ring-1 ease-linear transition-all duration-150">
                                    <button type="button"
                                        class="py-3 px-5 ms-text-sm font-medium text-white bg-blue-700 rounded-lg ml-1 border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                        </svg>
                                        <span class="sr-only">Search</span>
                                    </button>
                                </div> -->

                            </div>

                            <hr class="mt-2 border-b-1 border-blueGray-300 mb-5">

                            <div class="flex flex-wrap justify-center md:justify-start relative w-full mb-3 gap-x-10">
                                <div>

                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                        Amount Type :
                                    </label>
                                    <input type="text" name="amount_type" id="amount_type"
                                        class="border-0 px-3 py-2 placeholder-blueGray-300 text-blueGray-600 mb-3 bg-white rounded text-sm w-56 shadow focus:outline-none focus:ring-1 ease-linear transition-all duration-150"
                                        disabled>
                                </div>

                                <div>
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                        Credit Amount :
                                    </label>
                                    <input type="number" name="credit_amt" id="credit_amt"
                                        class="border-0 px-3 py-2 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm w-56 shadow focus:outline-none focus:ring-1 ease-linear transition-all duration-150"
                                        disabled>
                                </div>

                                <div>
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                        Debit Amount :
                                    </label>
                                    <input type="number" name="debit_amt" id="debit_amt"
                                        class="border-0 px-3 py-2 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm w-56 shadow focus:outline-none focus:ring-1 ease-linear transition-all duration-150"
                                        disabled>
                                </div>

                                <div>

                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                        Particulers / GIVEN To :
                                    </label>
                                    <input type="text" id="particuler_to" name="particuler_to" disabled
                                        class="border-0 px-3 py-2 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm w-56 shadow focus:outline-none focus:ring-1 ease-linear transition-all duration-150">
                                </div>
                                <div>

                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                        Site :
                                    </label>
                                    <input type="text" id="site" name="site" disabled
                                        class="border-0 px-3 py-2 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm w-56 shadow focus:outline-none focus:ring-1 ease-linear transition-all duration-150">
                                </div>
                                <div>

                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                        Main Head :
                                    </label>
                                    <input type="text" id="main_head" name="main_head" disabled
                                        class="border-0 px-3 py-2 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm w-56 shadow focus:outline-none focus:ring-1 ease-linear transition-all duration-150">

                                </div>
                                <div>

                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                        Sub Head :
                                    </label>
                                    <input type="text" id="sub_head" name="sub_head" disabled
                                        class="border-0 px-3 py-2 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm w-56 shadow focus:outline-none focus:ring-1 ease-linear transition-all duration-150">
                                </div>
                                <div>

                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                        Creted By :
                                    </label>
                                    <input type="text" id="created_by" name="created_by" disabled
                                        class="border-0 px-3 py-2 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm w-56 shadow focus:outline-none focus:ring-1 ease-linear transition-all duration-150">
                                </div>
                                <div>

                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                        Created Date :
                                    </label>
                                    <input type="datetime-local" id="created_date" name="created_date" disabled
                                        class="border-0 px-3 py-2 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm w-56 shadow focus:outline-none focus:ring-1 ease-linear transition-all duration-150">
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
                                <input type="number" id="bill_cheque_no" name="bill_cheque_no" disabled
                                    class="border-0 px-3 py-2 placeholder-blueGray-300 mb-4  text-blueGray-600 bg-white rounded text-sm w-56 shadow focus:outline-none focus:ring-1 ease-linear transition-all duration-150">
                            </div>
                            <div>

                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                    Invoice Dated :
                                </label>
                                <input type="date" id="invoice_date" name="invoice_date" disabled
                                    class="border-0 px-3 py-2 placeholder-blueGray-300 mb-4  text-blueGray-600 bg-white rounded text-sm w-56 shadow focus:outline-none focus:ring-1 ease-linear transition-all duration-150">
                            </div>
                            <div>

                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                    Invoice No :
                                </label>
                                <input type="number" id="invoice_no" name="invoice_no" disabled
                                    class="border-0 px-3 py-2 placeholder mb-4 text-blueGray-300 text-blueGray-600 bg-white rounded text-sm w-56 shadow focus:outline-none focus:ring-1 ease-linear transition-all duration-150">
                            </div>
                            <div>

                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                    GST No :
                                </label>
                                <input type="number" id="gst_no" name="gst_no" disabled
                                    class="border-0 px-3 py-2 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm w-56 shadow focus:outline-none focus:ring-1 ease-linear transition-all duration-150">
                            </div>
                            <div>
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                    Remarks :
                                </label>
                                <input type="text" id="remarks" name="remarks" disabled
                                    class="border-0 px-3 py-2 placeholder-blueGray-300 mb-4  text-blueGray-600 bg-white rounded text-sm w-56 shadow focus:outline-none focus:ring-1 ease-linear transition-all duration-150">
                            </div>
                        </div>

                        <hr class="mt-6 border-b-1 border-blueGray-300 mb-4">
                        <!-- <div class="flex justify-center">
                                <button
                                    class="bg-pink-700 text-white active:bg-pink-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
                                    type="submit">
                                    Save Details
                                </button>
                            </div> -->
                    </form>



                </div>

            </div>
            <div class="flex justify-center mb-5 mt-4">
                <!-- <button onclick="getCheckedRowData()"
                    class="bg-pink-700 text-white active:bg-pink-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
                    type="button">
                    Submit Now
                </button> -->
            </div>
        </div>
    </section>


    <!-- <script src="./script.js"></script> -->
    <script src="./js/script.js"></script>

</body>

</html>