<?php

include("./navForLogged.php");

// include('./db.php');
include('./dbconnection/db.php');


$sql = "SELECT * FROM for_office.purchase_order_header  where status = 'inProcess'  order by PO_number DESC; ";





$result = mysqli_query($con, $sql);





$i = 1;













?>


<!DOCTYPE htmltext <html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.4/dist/tailwind.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <title>GRN Form</title>
</head>


<body class=" poppins-regular ">
    <!-- <div style="width:90%" class=" m-auto background-{#FF8A8A}">
        <h1 class="text-center underline text-3xl font-medium m-2">GRN Form</h1>
        <div class="w-2/6 mt-5 flex justify-between">
            <button type="text" onclick="view_section()"
                class="text-white border border-blue-700 bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-xs px-5 py-2.5 text-center me-2 mb-2 font-medium dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">View
                GRN</button>
            <button onclick="create_section()" type="text"
                class="text-white border border-blue-700 bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-xs px-5 py-2.5 text-center me-2 mb-2 font-medium dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Create
                GRN</button>
        </div> -->

    <div id="create_section" class="border bg-gray-100 border-gray-900 p-5 rounded-lg">
        <h1
            class="mb-2 text-xl text-center font-extrabold leading-none tracking-tight text-gray-900 md:text-1xl lg:text-6xl dark:text-white">
            PO Requests</h1>
        <div class=" border border-gray-300 p-3 rounded-md">
            <div class="flex flex-wrap">
                <div>
                    <label for="email"
                        class="block w-40 mb-2 font-medium text-xs font-medium text-gray-900 dark:text-white"> Total
                        Row : </label>
                    <input type="text" disabled name="po_number" id="po_number"
                        value="<?php echo mysqli_num_rows($result) ?>"
                        class="w-40 rounded-md border text-xs border-[#e0e0e0] bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />


                </div>
                <div class="ml-20">
                    <label for="password"
                        class="block  w-40 mb-2 font-medium text-xs font-medium text-gray-900 dark:text-white">Current
                        date and time : </label>
                    <?php echo date('Y-m-d h:i:s') ?>
                </div>
                <!-- <button type="text" onclick="searchPoInGrnFor()"
                    class="text-white border border-blue-700 bg-blue-800 focus:ring-4 mb-3 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-xs px-5 py-2.5 text-center me-2 mb-2 font-medium dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Search
                    GRN</button> -->
            </div>
        </div>

        <div class=" mt-5">
            <!-- <form class="w-full border p-3 border-gray-300 rounded-md">
                        <div class="flex flex-wrap">
                            <div>
                                <label for="email"
                                    class="block w-40 mb-2 font-medium text-xs font-medium text-gray-900 dark:text-white">Vendor
                                    Name :
                                </label>
                                <input type="text" name="po_vendor_name" id="po_vendor_name" disabled
                                    class="w-40 rounded-md border text-xs border-[#e0e0e0] bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            </div>
                            <div class="ml-20">
                                <label for="password"
                                    class="block  w-40 mb-2 font-medium text-xs font-medium text-gray-900 dark:text-white">Ship
                                    to :
                                </label>
                                <input type="text" name="shipTo" id="shipTo" disabled
                                    class="w-40 rounded-md border text-xs border-[#e0e0e0] bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            </div>
                            <div class="ml-20">
                                <label for="password"
                                    class="block  w-40 mb-2 font-medium text-xs font-medium text-gray-900 dark:text-white">Bill
                                    to :
                                </label>
                                <input type="text" name="bill_to" id="bill_to" disabled
                                    class="w-40 rounded-md border text-xs border-[#e0e0e0] bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            </div>
                        </div>
                    </form> -->
        </div>

        <div class=" mt-5 mb-5">
            <form class="w-full border p-3 border-gray-300 rounded-md">




                <div class="flex flex-col">
                    <div class="-m-1.5 overflow-x-auto">
                        <div class="p-1.5 min-w-full inline-block align-middle">
                            <div style="        height: 50vh;    overflow: auto;" class="overflow-hidden">

                                <table class="min-w-full 	shadow-2xl m-auto whitespace-nowrap mx-auto divide-y divide-gray-200">

                                    <thead >
                                        <tr >
                                            <th scope="col"
                                                class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                                S.no</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                                Po Number</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                                Vendore code</th>

                                            <th scope="col"
                                                class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">
                                                Supplier name
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">
                                                Supplier site code
                                            </th>

                                            <th scope="col"
                                                class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">
                                                Payment term
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">
                                                bill to
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">
                                                ship to</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">
                                                status</th>



                                        </tr>
                                    </thead>
                                    <tbody class="divide-y   shadow-inner    divide-gray-200" id="poGrnBody">


                                        <?php
                                        $i = 1;

                                        while ($row = mysqli_fetch_assoc($result)) {
                                            ?>

                                            <tr class="hover:bg-gray-600 ">

                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                    <input id="default-checkbox" type="checkbox" value="" name="checkbox"
                                                        onchange="setLineTableToLine(event)"
                                                        P-id="<?php echo $row['PO_number'] ?>"
                                                        class="w-4 h-4 text-center cursor-pointer text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                    <input type="txt" id="input-email-label"
                                                        class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                        placeholder=1 value="<?php echo $i ?>" disabled>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                    <input type="txt" id="input-email-label"
                                                        class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                        placeholder=1 value="<?php echo $row['PO_number'] ?>" disabled>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                    <input type="txt" id="input-email-label"
                                                        class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                        placeholder=1 value="<?php echo $row['vendore_code'] ?>" disabled>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                    <input type="txt" id="input-email-label"
                                                        class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                        placeholder=1 value="<?php echo $row['supplier_name'] ?>" disabled>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                    <input type="txt" id="input-email-label" name="item_code"
                                                        class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                        placeholder="item_code"
                                                        value="<?php echo $row['supplier_site_code'] ?>" disabled>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                    <input type="txt" id="input-email-label" name="item_name"
                                                        class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                        placeholder="Item name" value="<?php echo $row['payment_term'] ?>"
                                                        disabled>
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800"
                                                    disabled>
                                                    <input type="txt" id="input-email-label" name="Qty"
                                                        class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:
                                                inter-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                        onchange="setTotal(event)" placeholder="Quantity"
                                                        value="<?php echo $row['bill_to_location'] ?>" disabled>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                    <input type="txt" id="input-email-label" name="total_price" disabled
                                                        class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                        value="<?php echo $row['shipTo'] ?>" placeholder="Total">
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                    <input type="txt" id="input-email-label" name="need_by_date"
                                                        class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                        placeholder="need_by_date" value="<?php echo $row['status'] ?>"
                                                        disabled>
                                                </td>






                                            </tr>

                                            <?php

                                            $i++;
                                        }

                                        ?>
                                    </tbody>
                                </table>


                            </div>
                        </div>
                    </div>
                </div>





















            </form>
        </div>



        <div class="flex gap-3 mb-3">

            <div data-dialog-backdrop="dialog-lg" data-dialog-backdrop-close="true"
                class="pointer-events-none fixed inset-0 z-[999] grid h-screen w-screen place-items-center bg-black bg-opacity-60 opacity-0 backdrop-blur-sm transition-opacity duration-300">
                <div data-dialog="dialog-lg"
                    class="relative m-4 w-3/5 min-w-[60%] max-w-[60%] rounded-lg bg-white font-sans text-base font-light leading-relaxed text-blue-gray-500 antialiased shadow-2xl">
                    <div class="flex items-center p-4 font-sans text-2xl antialiased font-semibold leading-snug shrink-0 text-blue-gray-900"
                        id="diolog-textset">
                        Are you sure want to submit ?
                    </div>
                    <!-- <div
                            class="relative p-4    border-t border-b border-t-blue-gray-100 border-b-blue-gray-100 text-blue-gray-500">
                        
                        </div> -->
                    <div class="flex flex-wrap items-center justify-end p-4 shrink-0 text-blue-gray-500">
                        <button data-ripple-dark="true" data-dialog-close="true"
                            class="px-6 py-3 mr-1 font-sans text-xs font-bold text-red-500 uppercase transition-all rounded-lg middle none center hover:bg-red-500/10 active:bg-red-500/30 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                            Cancel
                        </button>
                        <button data-ripple-light="true" data-dialog-close="true" onclick="submiDataConfirmToPo()"
                            class="middle none center rounded-lg bg-gradient-to-tr from-green-600 to-green-400 py-3 px-6 font-sans text-xs font-bold uppercase text-white shadow-md shadow-green-500/20 transition-all hover:shadow-lg hover:shadow-green-500/40 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                            Confirm
                        </button>
                    </div>
                </div>
            </div>

        </div>



        <div data-dialog-backdrop="dialog" data-dialog-backdrop-close="true"
            class="pointer-events-none fixed inset-0 z-[999] grid h-screen w-screen place-items-center bg-black bg-opacity-60 opacity-0 backdrop-blur-sm transition-opacity duration-300">
            <div data-dialog="dialog"
                class="relative m-4 w-2/5 min-w-[40%] max-w-[40%] rounded-lg bg-white font-sans text-base font-light leading-relaxed text-blue-gray-500 antialiased shadow-2xl">
                <div
                    class="flex items-center p-4 font-sans text-2xl antialiased font-semibold leading-snug shrink-0 text-blue-gray-900">
                    Are you want to Reject ?...
                </div>

                <div class="flex flex-wrap items-center justify-end p-4 shrink-0 text-blue-gray-500">
                    <button data-ripple-dark="true" data-dialog-close="true"
                        class="px-6 py-3 mr-1 font-sans text-xs font-bold text-red-500 uppercase transition-all rounded-lg middle none center hover:bg-red-500/10 active:bg-red-500/30 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                        Cancel
                    </button>
                    <button data-ripple-light="true" data-dialog-close="true" onclick="submiDataRejectToPo()"
                        class="middle none center rounded-lg bg-gradient-to-tr from-green-600 to-green-400 py-3 px-6 font-sans text-xs font-bold uppercase text-white shadow-md shadow-green-500/20 transition-all hover:shadow-lg hover:shadow-green-500/40 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                        Confirm
                    </button>
                </div>
            </div>
        </div>



        <div class="w-full mt-5 flex justify-around">
           
            <div>
                <button data-ripple-light="true" data-dialog-target="dialog-lg"
                    class="select-none rounded-lg bg-gradient-to-tr from-gray-900 to-gray-800 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-gray-900/10 transition-all hover:shadow-lg hover:shadow-gray-900/20 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                    Accept
                </button>
                <button data-ripple-light="true" data-dialog-target="dialog"
                    class="select-none rounded-lg bg-gradient-to-tr from-gray-900 to-gray-800 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-gray-900/10 transition-all hover:shadow-lg hover:shadow-gray-900/20 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                    Reject
                </button>
            </div>
          
        </div>
    </div>




    </div>

    <!-- <script src="./js/script.js"></script> -->
    <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/ripple.js"></script>

    <!-- from node_modules -->
    <!-- <script src="node_modules/@material-tailwind/html@latest/scripts/dialog.js"></script> -->

    <!-- from cdn -->
    <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/dialog.js"></script>
    <script src="./js/jquery-3.7.1.min.js"></script>
    <script src="./js/po.js"></script>
</body>

</html>