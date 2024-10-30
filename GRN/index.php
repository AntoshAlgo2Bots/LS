<?php


include("../navForLogged.php");

// include('../db.php');
// include('../dbconnection/db.php');
include('../dbconnection/db.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    $po_number = $_POST['po_number'];


    echo '' . $po_number . '';




    $sql = "SELECT * 
FROM for_office.purchase_order_header  a 
JOIN purchase_order_line b
ON a.PO_number = b.po_number
WHERE a.PO_number = $po_number;   ";



    $result = mysqli_query($con, $sql);

    if ($result) {





        $result2 = mysqli_query($con, "SELECT * FROM for_office.purchase_order_header where PO_number = $po_number;");




        $row = mysqli_fetch_assoc($result2);


        $vendor_name = $row['supplier_name'];
        $warehouse_code = 1;
        $po_number;
    }
}









?>


<!DOCTYPE htmltext <html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.4/dist/tailwind.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <title>GRN Form</title>
</head>

<body>
    <div style="width:90%" class=" m-auto background-{#FF8A8A}">
        
        <div class="w-2/6 mt-5 flex justify-between">
            <button type="text" onclick="view_section()"
                class="text-white border border-blue-700 bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-xs px-5 py-2.5 text-center me-2 mb-2 font-medium dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">View
                GRN</button>
            <button onclick="create_section()" type="text"
                class="text-white border border-blue-700 bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-xs px-5 py-2.5 text-center me-2 mb-2 font-medium dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Create
                GRN</button>
        </div>






        <div id="create_section" class="mt-5  p-5 rounded-lg">
            <h1 class="text-center underline text-3xl mb-3 font-medium">Create GRN Form</h1>
            <div class="w-full border border-gray-300 p-3 rounded-md">
                <form method="post" class="flex flex-wrap">
                    <div>
                        <label for="email"
                            class="block w-40 mb-2 font-medium text-xs font-medium text-gray-900 dark:text-white">PO
                            Number : </label>
                        <input type="text"   required name="po_number" id="po_number"
                            value="<?php echo isset($po_number) ? $po_number : ""; ?>"
                            class="w-40 rounded-md border text-xs border-[#e0e0e0] bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="ml-20">
                        <label for="password"
                            class="block  w-40 mb-2 font-medium text-xs font-medium text-gray-900 dark:text-white">Enter
                            Gate Number : </label>
                        <input type="text" name="email" id="email"
                            class="w-40 rounded-md border text-xs border-[#e0e0e0] bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <button type="text" onclick=""
                        class="text-white border border-blue-700 bg-blue-800 focus:ring-4  focus:outline-none focus:ring-blue-300 font-medium rounded-md text-xs px-5 py-2.5 text-center me-2 mb-2 font-medium dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Search
                        PO</button>
                </form>
                <div id="grn-area" class="hidden">
                    <label for="Recipt number :"
                        class="block w-40 mb-2 font-medium text-xs font-medium text-gray-900 dark:text-white">GRN
                        number</label>
                    <input type="text" disabled name="grn_number" id="grn_numberGen" value=""
                        class="w-40 rounded-md border text-xs border-[#e0e0e0] bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>
            </div>


            <?php


            if (isset($po_number)) {




            ?>

                <div class=" mt-5">
                    <form class="w-full border p-3 border-gray-300 rounded-md">
                        <div class="flex flex-wrap">
                            <div>
                                <label for="email"
                                    class="block w-40 mb-2 font-medium text-xs font-medium text-gray-900 dark:text-white">Vendor
                                    Name :
                                </label>
                                <input type="text" name="po_vendor_name" id="po_vendor_name" disabled
                                    value="<?php echo $row['supplier_name'] ?>"
                                    class="w-40 rounded-md border text-xs border-[#e0e0e0] bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            </div>
                            <div class="ml-20">
                                <label for="password"
                                    class="block  w-40 mb-2 font-medium text-xs font-medium text-gray-900 dark:text-white">Ship
                                    to :
                                </label>
                                <input type="text" name="shipTo" id="shipTo" disabled value="<?php echo $row['shipTo'] ?>"
                                    class="w-40 rounded-md border text-xs border-[#e0e0e0] bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            </div>
                            <div class="ml-20">
                                <label for="password"
                                    class="block  w-40 mb-2 font-medium text-xs font-medium text-gray-900 dark:text-white">Bill
                                    to :
                                </label>
                                <input type="text" name="bill_to" id="bill_to" disabled
                                    value="<?php echo $row['bill_to_location'] ?>"
                                    class="w-40 rounded-md border text-xs border-[#e0e0e0] bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            </div>
                        </div>
                    </form>
                </div>
                <div class=" mt-5">
                    <form class="w-full border p-3 border-gray-300 rounded-md">
                        <div class="flex">
                            <div>
                                <label for="email"
                                    class="block w-40 mb-2 font-medium text-xs font-medium text-gray-900 dark:text-white">Gate
                                    Number :
                                </label>
                                <input type="text" name="email" id="email"
                                    class="w-40 rounded-md border text-xs border-[#e0e0e0] bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            </div>
                        </div>
                    </form>
                </div>

                <button type="text" onclick="genRateGrn()"
                id="grn-create-btn"
                    class="text-white border border-blue-700 bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-xs px-5 py-2.5 text-center me-2 mb-2 font-medium dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800 ">Genrate
                    GRN</button>
                <hr>
                <div id="grn-area-table" class=" hidden mt-5 mb-5">
                    <form class="w-full border p-3 border-gray-300 rounded-md">







                        <div class="flex flex-col">
                            <div class="-m-1.5 overflow-x-auto">
                                <div class="p-1.5 min-w-full inline-block align-middle">
                                    <div class="overflow-hidden">

                                        <table class="min-w-full whitespace-nowrap mx-auto divide-y divide-gray-200">

                                            <thead>
                                                <tr>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                                        S.no</th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                                        Item Code</th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                                        Item name</th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">
                                                        Unit
                                                        price</th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">
                                                        Balnce
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">
                                                        Recieved Qty
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">
                                                        Total
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">
                                                        Status</th>


                                                </tr>
                                            </thead>
                                            <tbody class="divide-y      divide-gray-200" id="poGrnBody">





                                                <?php


                                                $i = 1;

                                                while ($row = mysqli_fetch_assoc($result)) {






                                                ?>


                                                    <tr class="hover:bg-gray-200" PO-id="<?php echo $row['po_number']; ?>"
                                                        line-id="<?php echo $row['id']; ?>"
                                                        con-row-id="PO-<?php echo $row['id']; ?>">

                                                        <td
                                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                            <input id="default-checkbox"  type="checkbox"
                                                                value=" <?php echo $i; ?>" onchange="setLineTableToLine(event)"
                                                                class="w-4 cursor-pointer h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                        </td>
                                                        <td
                                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                            <input type="txt" id="input-email-label"
                                                                class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                                placeholder=1 value="<?php echo $i; ?>" disabled>
                                                        </td>
                                                        <td
                                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                            <input type="txt" id="input-email-label" name="item_code"
                                                                value="<?php echo $row['item_code'] ?>"
                                                                class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                                placeholder="item_code">
                                                        </td>
                                                        <td
                                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                            <input type="txt" id="input-email-label" name="item_name"
                                                                class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                                value="<?php echo $row['item_shortdiscription'] ?>"
                                                                placeholder="Item name">
                                                        </td>
                                                        <td
                                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                            <input type="number" id="input-email-label"
                                                                class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                                name="unit_Price" placeholder="Unit price"
                                                                value="<?php echo $row['unit_price'] ?>">
                                                        </td>
                                                        <td
                                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                            <input type="number" id="input-email-label" name="balance_qty"
                                                                class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:
                                                inter-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                                placeholder="Quantity" value="<?php echo $row['balance'] ?>">
                                                        </td>

                                                        <td
                                                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                                            <input type="number" id="input-email-label"
                                                                                name="recieved_qty" 
                                                                                class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                                                value="${recQty}"
                                                                                placeholder="Recieved QTY">
                                                                        </td>



                                                        <td
                                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                            <input type="number" id="input-email-label" name="total_price"
                                                                disabled value="<?php echo $row['total_price'] ?>"
                                                                class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                                placeholder="Total">
                                                        </td>
                                                        <td
                                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                            <input type="txt" id="input-email-label" name="need_by_date"
                                                                class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                                placeholder="need_by_date" value="inProcess">
                                                        </td>





                                                    </tr>
                                                    <tr class=" mb-2 hidden " line-row-id="PO-<?php echo $row['id']; ?>">

                                                        <td class="hover:bg-gray-600 " colspan="9" align="right">
                                                            <table style="width:90%;"
                                                                class=" whitespace-nowrap   divide-y divide-gray-200">


                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col"
                                                                            class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                                                        </th>
                                                                        <th scope="col"
                                                                            class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                                                            S.no</th>
                                                                        <th scope="col"
                                                                            class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                                                            Item Code</th>
                                                                        <th scope="col"
                                                                            class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                                                            Item name</th>
                                                                        <th scope="col"
                                                                            class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">
                                                                            Unit
                                                                            price</th>
                                                                        <th scope="col"
                                                                            class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">
                                                                            Total Qty</th>
                                                                        <th scope="col"
                                                                            class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">
                                                                            Balnce
                                                                        </th>
                                                                        <th scope="col"
                                                                            class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">
                                                                            Recived QTY
                                                                        </th>
                                                                        <th scope="col"
                                                                            class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">
                                                                            Total amount    
                                                                        </th>
                                                                        <th scope="col"
                                                                            class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">
                                                                            Status</th>


                                                                    </tr>
                                                                </thead>
                                                                <tbody class="  divide-gray-200"
                                                                    id="tbodyLine<?php echo $row['id'] ?>">






                                                                    <!-- <tr class="hover:bg-gray-600" con-id="001">

                                                                            <td
                                                                                class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                                                <input id="default-checkbox" type="checkbox"
                                                                                    value="1"
                                                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                                            </td>
                                                                            <td
                                                                                class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                                                <input type="txt" id="input-email-label"
                                                                                    class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                                                    placeholder=1 value="" disabled>
                                                                            </td>
                                                                            <td
                                                                                class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                                                <input type="txt" id="input-email-label"
                                                                                    name="item_code"
                                                                                    class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                                                    placeholder="item_code">
                                                                            </td>
                                                                            <td
                                                                                class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                                                <input type="txt" id="input-email-label"
                                                                                    name="item_name"
                                                                                    class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                                                    placeholder="Item name">
                                                                            </td>
                                                                            <td
                                                                                class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                                                <input type="number" id="input-email-label"
                                                                                    class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                                                    name="unit_Price" placeholder="Unit price"
                                                                                    value="${row.unit_price}">
                                                                            </td>
                                                                            <td
                                                                                class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                                                <input type="number" id="input-email-label"
                                                                                    name="Qty"
                                                                                    class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:
        inter-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                                                    placeholder="Quantity" value="${row.balance}">
                                                                            </td>
                                                                            <td
                                                                                class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                                                <input type="number" id="input-email-label"
                                                                                    name="total_price" disabled
                                                                                    class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                                                    placeholder="Recieved QTY">
                                                                            </td>
                                                                            <td
                                                                                class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                                                <input type="number" id="input-email-label"
                                                                                    name="total_price" disabled
                                                                                    class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                                                    placeholder="Total">
                                                                            </td>
                                                                            <td
                                                                                class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                                                <input type="txt" id="input-email-label"
                                                                                    name="need_by_date"
                                                                                    class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                                                    placeholder="need_by_date" value="inProcess">
                                                                            </td>





                                                                        </tr> -->


                                                                </tbody>
                                                            </table>
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



                <div class="w-full mt-5 flex justify-around" id="status-btn-area">
                    <button onclick="reciveTable(event)" type="text"
                        class="text-white border border-blue-700 bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-xs px-5 py-2.5 text-center me-2 mb-2 font-medium dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800 ">Recieved</button>
                    <div>
                        <button type="text" onclick="AcceptDataToGrnLine()"
                            class="text-white border border-blue-700 bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-xs px-5 py-2.5 text-center me-2 font-medium dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800 ">Accept</button>
                        <button type="text" onclick="rejectToGrn()"
                            class="text-white border ml-4 border-blue-700 bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-xs px-5 py-2.5 text-center me-2 font-medium dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800 ">Reject</button>
                    </div>
                    <button type="text"
                    onclick="deliverdItemToGrn()"
                        class="text-white border border-blue-700 bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-xs px-5 py-2.5 text-center me-2 mb-2 font-medium dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800 x">
                        Delivered</button>
                    <button type="text"
                    id="rtv-btn"
                        class="text-white border hidden border-blue-700 bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-xs px-5 py-2.5 text-center me-2 mb-2 font-medium dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800 x">
                        RTV</button>
                </div>
            </div>

            </div>
            
        <?php
            }
        ?>

</div>
</div>

<div id="view_section" class="mt-5  p-5 hidden rounded-lg">

<h1 class="text-center underline text-3xl mb-3 font-medium">Pending Grn</h1>
            <div class="w-full border border-gray-300 p-3 rounded-md">
                <form method="post" class="flex flex-wrap">
                    <div>
                        <label for="email"
                            class="block w-40 mb-2 font-medium text-xs font-medium text-gray-900 dark:text-white">PO
                            Number : </label>
                        <input type="text"   required name="po_number" id="po_number"
                            value="<?php echo isset($po_number) ? $po_number : ""; ?>"
                            class="w-40 rounded-md border text-xs border-[#e0e0e0] bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="ml-20">
                        <label for="password"
                            class="block  w-40 mb-2 font-medium text-xs font-medium text-gray-900 dark:text-white">Enter
                            Gate Number : </label>
                        <input type="text" name="email" id="email"
                            class="w-40 rounded-md border text-xs border-[#e0e0e0] bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <button type="text" onclick=""
                        class="text-white border border-blue-700 bg-blue-800 focus:ring-4  focus:outline-none focus:ring-blue-300 font-medium rounded-md text-xs px-5 py-2.5 text-center me-2 mb-2 font-medium dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Search
                        PO</button>
                </form>
                <div id="grn-area" class="hidden">
                    <label for="Recipt number :"
                        class="block w-40 mb-2 font-medium text-xs font-medium text-gray-900 dark:text-white">GRN
                        number</label>
                    <input type="text" disabled name="grn_number" id="grn_numberGen" value=""
                        class="w-40 rounded-md border text-xs border-[#e0e0e0] bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>
            </div>










                                    



</div>
    <script src="./js/script.js"></script>
    <script src="./js/grn.js"></script>
    <script src="../js/jquery-3.7.1.min.js"></script>
</body>

</html>