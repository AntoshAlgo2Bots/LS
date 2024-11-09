<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.4/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>

    <title>Project status</title>
</head>


<style>
    .input-acceptable {
        border: 2px solid green;
    }

    .input-exceeds {
        border: 2px solid red;
    }
</style>

<body class="">


    <?php

    include("./navForLogged.php");
    include("./dbconnection/db.php");;

    ?>

    <div id="create_section" class="mt-3 p-5 rounded-lg mx-5">
        <h1 class="text-center  text-3xl mb-3 font-bold"> MRP Summary Form</h1>
        <form method="POST" class="  p-5 rounded-md bg-gray-300">
            <div class="border-b border-gray-900 ">
                <label class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">SO
                    Number
                    :
                </label>
                <input type="text" name="so_number" id="so_number"
                    value="<?php echo $_POST['so_number'] ?? "" ?>" class="w-40 rounded-md border mb-3 text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                <button type="submit" name="button" class="bg-blue border-2 p-1 hover:bg-green-600  hover:text-white rounded">Search</button>
            </div>
            <div class="border-b border-gray-200 dark:border-gray-700 mt-4">
                <ul class="flex flex-wrap justify-between -mb-px text-sm font-medium text-center " id="default-styled-tab"
                    data-tabs-toggle="#default-styled-tab-content"
                    data-tabs-active-classes="text-gray-600 text-gray-600 dark:text-gray-500 bg-gray-50 dark:text-gray-500 border-gray-600 dark:border-gray-500"
                    data-tabs-inactive-classes="dark:border-transparent text-gray-500 text-gray-600 bg-gray-200 dark:text-gray-400 border-gray-100 border-gray-300 dark:border-gray-700 dark:text-gray-300"
                    role="tablist">
                    <!-- <li class="me-2" role="presentation">
                        <button
                            class="inline-block py-3 px-5 border-t border-r focus:outline-none border-l dark:hover:bg-gray-50 border-gray-500 rounded-t-lg"
                            id="profile-styled-tab" data-tabs-target="#styled-profile" type="button" role="tab"
                            aria-controls="profile" aria-selected="false">Drawing Item</button>
                    </li> -->
                    <!-- <li class="me-2" role="presentation">
                        <button
                            class="inline-block py-3 px-5 border-t border-r focus:outline-none border-l border-gray-500 rounded-t-lg"
                            id="dashboard-styled-tab" data-tabs-target="#styled-sample" type="button" role="tab"
                            aria-controls="dashboard" aria-selected="false">Sample Item</button>
                    </li> -->
                    <li class="me-2" role="presentation">
                        <button
                            class="inline-block py-3 px-5 border-t border-r focus:outline-none border-l border-gray-500 rounded-t-lg"
                            id="dashboard-styled-tab" data-tabs-target="#issue_item" type="button" role="tab"
                            aria-controls="dashboard" aria-selected="true">MRP Summary form</button>
                    </li>
                    <!-- <li class="me-2" role="presentation">
                        <button
                            class="inline-block py-3 px-5 border-t border-r focus:outline-none border-l border-gray-500 rounded-t-lg"
                            id="settings-styled-tab" data-tabs-target="#styled-settings" type="button" role="tab"
                            aria-controls="settings" aria-selected="false">Assemble Item</button>
                    </li>
                    <li class="me-2" role="presentation">
                        <button
                            class="inline-block py-3 px-5 border-t border-r focus:outline-none border-l border-gray-500 rounded-t-lg"
                            id="contacts-styled-tab" data-tabs-target="#styled-contacts" type="button" role="tab"
                            aria-controls="contacts" aria-selected="false">Quality Check</button>
                    </li>
                    <li class="me-2" role="presentation">
                        <button
                            class="inline-block py-3 px-5 border-t border-r focus:outline-none border-l border-gray-500 rounded-t-lg"
                            id="contacts-styled-tab" data-tabs-target="#styled-about" type="button" role="tab"
                            aria-controls="contacts" aria-selected="false">Dismantle Item</button>
                    </li>
                    <li class="me-2" role="presentation">
                        <button
                            class="inline-block py-3 px-5 border-t border-r focus:outline-none border-l border-gray-500 rounded-t-lg"
                            id="contacts-styled-tab" data-tabs-target="#styled-packaging" type="button" role="tab"
                            aria-controls="contacts" aria-selected="false">Packaging</button>
                    </li>
                    <li class="me-2" role="presentation">
                        <button
                            class="inline-block py-3 px-5 border-t border-r focus:outline-none border-l border-gray-500 rounded-t-lg"
                            id="contacts-styled-tab" data-tabs-target="#styled-gate" type="button" role="tab"
                            aria-controls="contacts" aria-selected="false">Gate Exit</button>
                    </li>
                    <li role="presentation">
                        <button
                            class="inline-block py-3 px-5 border-t border-r focus:outline-none border-l border-gray-500 rounded-t-lg"
                            id="contacts-styled-tab" data-tabs-target="#styled-installation" type="button" role="tab"
                            aria-controls="contacts" aria-selected="false">Installation</button>
                    </li> -->
                </ul>
            </div>
            <div id="default-styled-tab-content">
                <div class="hidden p-4 bg-gray-50 dark:bg-gray-200 border-x border-b border-gray-600 rounded-b-lg" id="styled-profile" role="tabpanel"
                    aria-labelledby="profile-tab">
                    <!-- <div class="flex gap-x-10 overflow-x-auto py-3">
                        <div>
                                <label class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Item
                                    Name :
                                </label>
                                <input type="text" name=""
                                    class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            </div>
                            <div>
                                <label
                                    class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Quantity
                                    :
                                </label>
                                <input type="text" name=""
                                    class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            </div>
                            <div>
                                <label
                                    class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Drawing
                                    Approval :
                                </label>
                                <input type="text" name=""
                                    class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            </div>
                            <div>
                                <label
                                    class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Drawing
                                    Approval Date :
                                </label>
                                <input type="date" name=""
                                    class="w-40 rounded-md border text-xs bor   der-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            </div>
                        </div> -->
                    <div>
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Item Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Quantity
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Drawing Approval Date
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Remarks if any
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <span class="sr-only">Submit</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="drawing_item_tbody">
                                <tr
                                    class="bg-white border-b dark:bg-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-600">
                                    <th scope="row"
                                        class="px-6 py-1 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <input type="text" name=""
                                            class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                    </th>
                                    <td class="px-6 py-1">
                                        <input type="text" name=""
                                            class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                    </td>
                                    <td class="px-6 py-1">
                                        <input type="date" name=""
                                            class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                    </td>
                                    <td class="px-6 py-1">
                                        <input type="text" name=""
                                            class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                    </td>
                                    <td class="px-6 py-1 text-right">
                                        <a href="#"
                                            class="font-medium text-blue-600 dark:text-blue-500 underline">Submit</a>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="hidden p-4 rounded-x-lg b   g-gray-50 dark:bg-gray-200 border-x border-b border-gray-600 rounded-b-lg" id="styled-sample"
                    role="tabpanel" aria-labelledby="dashboard-tab">
                    <!-- <div class="flex gap-x-10 overflow-x-auto py-3">
                            <div>
                                <label class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Item
                                    Name :
                                </label>
                                <input type="text" name=""
                                    class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            </div>
                            <div>
                                <label
                                    class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Quantity
                                    :
                                </label>
                                <input type="text" name=""
                                    class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            </div>
                            <div>
                                <label class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Sample
                                    Approval :
                                </label>
                                <input type="text" name=""
                                    class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            </div>
                            <div>
                                <label class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Sample
                                    Approval Date :
                                </label>
                                <input type="date" name=""
                                    class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            </div>
                        </div> -->
                    <div>
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Item Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Quantity
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Sample Approval Date
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Remarks if any
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <span class="sr-only">Submit</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    class="bg-white border-b dark:bg-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-600">
                                    <th scope="row"
                                        class="px-6 py-1 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <input type="text" name=""
                                            class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                    </th>
                                    <td class="px-6 py-1">
                                        <input type="text" name=""
                                            class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                    </td>
                                    <td class="px-6 py-1">
                                        <input type="date" name=""
                                            class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                    </td>
                                    <td class="px-6 py-1">
                                        <input type="text" name=""
                                            class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                    </td>
                                    <td class="px-6 py-1 text-right">
                                        <a href="#"
                                            class="font-medium text-blue-600 dark:text-blue-500 underline">Submit</a>
                                    </td>
                                </tr>
                                <tr
                                    class="bg-white border-b dark:bg-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-600">
                                    <th scope="row"
                                        class="px-6 py-1 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <input type="text" name=""
                                            class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                    </th>
                                    <td class="px-6 py-1">
                                        <input type="text" name=""
                                            class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                    </td>
                                    <td class="px-6 py-1">
                                        <input type="date" name=""
                                            class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                    </td>
                                    <td class="px-6 py-1">
                                        <input type="text" name=""
                                            class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                    </td>
                                    <td class="px-6 py-1 text-right">
                                        <a href="#"
                                            class="font-medium text-blue-600 dark:text-blue-500 underline">Submit</a>
                                    </td>
                                </tr>
                                <tr
                                    class="bg-white border-b dark:bg-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-600">
                                    <th scope="row"
                                        class="px-6 py-1 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <input type="text" name=""
                                            class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                    </th>
                                    <td class="px-6 py-1">
                                        <input type="text" name=""
                                            class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                    </td>
                                    <td class="px-6 py-1">
                                        <input type="date" name=""
                                            class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                    </td>
                                    <td class="px-6 py-1">
                                        <input type="text" name=""
                                            class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                    </td>
                                    <td class="px-6 py-1 text-right">
                                        <a href="#"
                                            class="font-medium text-blue-600 dark:text-blue-500 underline">Submit</a>
                                    </td>
                                </tr>
                                <tr
                                    class="bg-white border-b dark:bg-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-600">
                                    <th scope="row"
                                        class="px-6 py-1 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <input type="text" name=""
                                            class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                    </th>
                                    <td class="px-6 py-1">
                                        <input type="text" name=""
                                            class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                    </td>
                                    <td class="px-6 py-1">
                                        <input type="date" name=""
                                            class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                    </td>
                                    <td class="px-6 py-1">
                                        <input type="text" name=""
                                            class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                    </td>
                                    <td class="px-6 py-1 text-right">
                                        <a href="#"
                                            class="font-medium text-blue-600 dark:text-blue-500 underline">Submit</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="hidden p-4 rounded-b-lg bg-gray-50 dark:bg-gray-200 border-x border-b border-gray-600" id="issue_item" role="tabpanel"
                    aria-labelledby="dashboard-tab">


                    <div>
                        <table class="w-full text-sm whitespace-nowrap text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 whites uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        S .NO
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        SO number
                                    </th>

                                    <th scope="col" class="px-6 py-3">
                                        Line number
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Item Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Sale quantity
                                    </th>

                                    <th scope="col" class="px-6 py-3">
                                        Need quantity
                                    </th>

                                    <th scope="col" class="px-6 py-3">
                                        Quantity_in_store
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        PO Status's
                                    </th>
                                    <!-- <th scope="col" class="px-6 py-3">
                                        Quantity
                                    </th> -->
                                    <!-- <th scope="col" class="px-6 py-3">
                                        Issue Date
                                    </th> -->
                                    <th scope="col" class="px-6 py-3">
                                        Remarks if any
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <span class="sr-only">Submit</span>
                                    </th>
                                </tr>
                            </thead>



                            <tbody>



                                <?php

                                // if ($_SERVER['REQUEST_METHOD'] == 'POST') {


                                // $so_number = $_POST['so_number'];

                                // echo "so Number" . $so_number;

                                $sql = "   
                                                            SELECT *,item_code,qty- case 
                                                         when     (SELECT count(*) FROM for_office.mtl_serial_number where so_line_number = a.id  and status='no' group by item_code  ) > 0   
                                                         then  (SELECT count(*) FROM for_office.mtl_serial_number where so_line_number = a.id  and status='no' group by item_code  )
                                                          else 0
                                                          end as total_qty FROM for_office.sale_order_items_lines a ;
                                                            ";


                                if (isset($_POST['so_number'])) {

                                    $so_number_post = $_POST['so_number'];


                                    $sql = "   
                                                                SELECT *,item_code,qty- case 
                                                             when     (SELECT count(*) FROM for_office.mtl_serial_number where so_line_number = a.id  and status='no' group by item_code  ) > 0   
                                                             then  (SELECT count(*) FROM for_office.mtl_serial_number where so_line_number = a.id  and status='no' group by item_code  )
                                                              else 0
                                                              end as total_qty FROM for_office.sale_order_items_lines a 
                                                              where a.so_number = $so_number_post
                                                                ";
                                }




                                $result = mysqli_query($con, $sql);

                                if (mysqli_num_rows($result) > 0) {






                                    $i = 1;

                                    while ($row = mysqli_fetch_assoc($result)) {

                                        // var_dump($row);






                                        $item_code = $row['item_code'];
                                        $available_qty = 0;



                                        $query_check_available_qty = "
                                                            
                                                            SELECT item_code,(SELECT count(*) FROM for_office.mtl_serial_number where item_code = $item_code    group by item_code  ) as avilablle_serials,
                                                            sum(item_qty)-      
                                                            case 
                                                         when     (SELECT count(*) FROM for_office.mtl_serial_number where item_code = $item_code  and status='no' group by item_code  ) > 0   
                                                         then  (SELECT count(*) FROM for_office.mtl_serial_number where item_code = $item_code  and status='no' group by item_code  )
                                                          else 0
                                                          end
                                                          
                                                            as available_qty 
                                                            
                                                            
                                                            FROM for_office.mtl_inventory_transactions where item_code='El---lo-al-El-Bu--20-20'  group by item_code ;";

                                        $sql_check_quantity = mysqli_query($con, "SELECT item_code,sum(item_qty) as available_qty FROM for_office.mtl_inventory_transactions where item_code='$item_code'  group by item_code;");

                                        if (mysqli_num_rows($sql_check_quantity) > 0) {

                                            $rs_1 = mysqli_fetch_assoc($sql_check_quantity);
                                            // var_dump($rs_1);
                                            $available_qty = $rs_1['available_qty'];

                                            // echo $item_code;
                                            // echo "<br>";


                                            $n_qty = $row['total_qty'] - $available_qty;








                                            // echo $n_qty;





                                            // if ($n_qty > 0) {
                                            //     echo $n_qty . "<br>";
                                            // }



                                            $item_code = $row['item_code'];
                                            $rs_qty = 0;
                                            $so_number_1 = $row['so_number'];
                                            $sql_for_check_qty = "SELECT b.item_code, SUM(b.quantity) as po_created
                                                    FROM for_office.purchase_order_header a JOIN for_office.purchase_order_line b ON a.PO_number = b.po_number
                                                    WHERE a.so_id = $so_number_1 and b.item_code ='$item_code' GROUP BY b.item_code;";


                                            $result_rs = mysqli_query($con, $sql_for_check_qty);
                                            if (mysqli_num_rows($result_rs)  > 0) {

                                                $rs_qty = mysqli_fetch_assoc($result_rs);

                                                $rs_qty = (int) $rs_qty['po_created'];
                                            }



                                            $needtocreatpoqty = $row['total_qty'] - $available_qty - $rs_qty;






                                            if ($available_qty < $row['qty']) {


                                                if ($row['total_qty'] > $rs_qty) {


                                                    // echo $needtocreatpoqty;

                                                    if ($needtocreatpoqty > 0) {
                                                        // echo "<br>need qty".$row['total_qty']-$available_qty-$rs_qty;
                                                        // echo '<button type="button" so_id="' . (int) $row['so_number'] . '" nqty="' . (int) $row['total_qty'] - $available_qty - $rs_qty . '"  item_code="' . $row['item_code'] . '"  name="create-po" class="bg-white ml-4 hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
                                                        // Create po
                                                        // </button>';


                                ?>
                                                        <tr
                                                            main-id-so="<?php echo  $row['so_number'] ?>"
                                                            data-line-id="<?php echo  $row['id'] ?>"
                                                            class="bg-white border-b dark:bg-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-600">
                                                            <th scope="row"
                                                                name=""
                                                                class="px-6 py-1  font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                                <?php echo $i;
                                                                $i++; ?>
                                                            </th>
                                                            <th scope="row"
                                                                name=""
                                                                class="px-6 py-1  font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                                <?php echo $row['so_number']  ?>
                                                            </th>
                                                            <th scope="row"
                                                                class="px-6 py-1 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                                <?php echo $row['id']  ?>
                                                            </th>
                                                            <th scope="row"
                                                                class="px-6 py-1 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                                <?php echo $row['item_code']  ?>
                                                            </th>
                                                            <th scope="row"
                                                                name=""
                                                                class="px-6 py-1  font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                                <?php echo $row['qty']  ?>
                                                            </th>

                                                            <th scope="row"
                                                                name="need_qty_area"
                                                                class="px-6 py-1  font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                                <?php echo $row['total_qty']  ?>
                                                            </th>

                                                            <th scope="row"
                                                                name="avaliable_qty_area"
                                                                class="px-6 py-1 <?php echo ($available_qty < $row['qty']) ? "text-red-700" : "text-green-700"  ?> font-medium  whitespace-nowrap dark:text-white">
                                                                <?php echo $available_qty;



                                                                if ($available_qty < $row['qty']) {


                                                                    if ($row['total_qty'] > $rs_qty) {


                                                                        // echo $needtocreatpoqty;

                                                                        if ($needtocreatpoqty > 0) {
                                                                            // echo "<br>need qty".$row['total_qty']-$available_qty-$rs_qty;
                                                                            echo '<button type="button" so_id="' . (int) $row['so_number'] . '" nqty="' . (int) $row['total_qty'] - $available_qty - $rs_qty . '"  item_code="' . $row['item_code'] . '"  name="create-po" class="bg-white ml-4 hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
                                                                    Create po
                                                                    </button>';
                                                                        }
                                                                    }

                                                                    if ($rs_qty > 0) {

                                                                        echo '<p class="ml-2 text-xs">' . $rs_qty . ' quantity  already requested</p>';
                                                                    }

                                                                    // if ($needtocreatpoqty > 0) {
                                                                    //     echo "Need to remove";
                                                                    // }
                                                                }



                                                                ?>




                                                            </th>
                                                            <td class="px-6 py-1 ">


                                                                <table>

                                                                    <thead>
                                                                        <tr>
                                                                            <th class="px-6 py-1 ">po_number</th>
                                                                            <th class="px-6 py-1 ">status</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>



                                                                        <?php



$so_number = $row['so_number'];
$item_code = $row['item_code'];
$sql_for_check_p = "select *,a.status as po_status from for_office.purchase_order_header a join for_office.purchase_order_line b ON a.PO_number=b.PO_number   where a.so_id=$so_number and b.item_code = '$item_code' ";


                                                                        $result_for_check_p = mysqli_query($con, $sql_for_check_p);

                                                                        
                                                                        while ($row_po_check_001 = mysqli_fetch_array($result_for_check_p)){

                                                                        

?>





                                                                    <tr>
                                                                            <td class="px-6 py-1 ">#<?php  echo $row_po_check_001['PO_number']; ?></td>
                                                                            <td class="px-6 py-1 <?php echo ($row_po_check_001['po_status'] =='inProcess') ? "text-red-700" : "text-green-700"  ?> "><?php  echo $row_po_check_001['po_status']; ?></td>
                                                                        </tr>


                                                                        <?php
                                                    }
                                                                        ?>

                                                                    </tbody>

                                                                </table>



                                                            </td>
                                                            <!-- <td class="px-6 py-1 flex flex-col">
                                                                <input type="text" name="need_qty"
                                                                    value="<?php if ((int) $row['total_qty'] <= (int) $available_qty) {
                                                                                echo $row['total_qty'];
                                                                            } else {
                                                                                echo $available_qty;
                                                                            }  ?>"
                                                                    placeholder="please enter quantity"
                                                                    readonly
                                                                    oninput="checkInputValue( <?php echo $available_qty ?>,event)"
                                                                    class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280]     h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />


                                                                <a onClick="setSerialData(<?php echo $row['so_number'] ?>,<?php echo $row['id'] ?>)"
                                                                    class="font-medium text-blue-600 cursor-pointer dark:text-blue-500 underline">View allocated items</a>

                                                            </td> -->
                                                            <!-- <td class="px-6 py-1">
                                                                <input type="date" name=""
                                                                    class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                                            </td> -->
                                                            <td class="px-6 py-1">
                                                                <input type="text" name="remarks" placeholder="remarks"

                                                                    class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                                            </td>
                                                            <!-- <td class="px-6 py-1 text-right">
                                                                <a onClick="issueItems(event)"
                                                        class="font-medium text-blue-600 dark:text-blue-500 underline">Submit</a>

                                                                <button type="button" onClick="issueItems(event)" class="bg-white ml-4 hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
                                                                    Submit
                                                                </button>
                                                            </td> -->
                                                        </tr>
                                <?php


                                                    }
                                                }
                                            }
                                        }
                                    }
                                } else {
                                    echo "no data found";
                                }
                                // }


                                ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <div class="hidden p-4 rounded-b-lg bg-gray-50 dark:bg-gray-200 border-x border-b border-gray-600" id="styled-settings" role="tabpanel"
                aria-labelledby="settings-tab">
                <!-- <div class="flex gap-x-10 overflow-x-auto py-3">
                        <div>
                            <label class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Item
                                Name :
                            </label>
                            <input type="text" name=""
                                class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                        <div>
                            <label class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Quantity
                                :
                            </label>
                            <input type="text" name=""
                                class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                        <div>
                            <label class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Items
                                Assemble
                                :
                            </label>
                            <input type="text" name=""
                                class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                        <div>
                            <label class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Items
                                Assemble Date
                                :
                            </label>
                            <input type="date" name=""
                                class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                    </div> -->
                <div>
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Item Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Quantity
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Item Assemble Date
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Remarks if any
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <span class="sr-only">Submit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                class="bg-white border-b dark:bg-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-600">
                                <th></th>
                                <th scope="row"
                                    class="px-6 py-1 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <input type="text" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </th>
                                <td class="px-6 py-1">
                                    <input type="text" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </td>
                                <td class="px-6 py-1">
                                    <input type="date" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </td>
                                <td class="px-6 py-1">
                                    <input type="text" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </td>
                                <td class="px-6 py-1 text-right">
                                    <a href="#"
                                        class="font-medium text-blue-600 dark:text-blue-500 underline">Submit</a>
                                </td>
                            </tr>
                            <tr
                                class="bg-white border-b dark:bg-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-600">
                                <th scope="row"
                                    class="px-6 py-1 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <input type="text" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </th>
                                <td class="px-6 py-1">
                                    <input type="text" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </td>
                                <td class="px-6 py-1">
                                    <input type="date" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </td>
                                <td class="px-6 py-1">
                                    <input type="text" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </td>
                                <td class="px-6 py-1 text-right">
                                    <a href="#"
                                        class="font-medium text-blue-600 dark:text-blue-500 underline">Submit</a>
                                </td>
                            </tr>
                            <tr
                                class="bg-white border-b dark:bg-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-600">
                                <th scope="row"
                                    class="px-6 py-1 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <input type="text" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </th>
                                <td class="px-6 py-1">
                                    <input type="text" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </td>
                                <td class="px-6 py-1">
                                    <input type="date" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </td>
                                <td class="px-6 py-1">
                                    <input type="text" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </td>
                                <td class="px-6 py-1 text-right">
                                    <a href="#"
                                        class="font-medium text-blue-600 dark:text-blue-500 underline">Submit</a>
                                </td>
                            </tr>
                            <tr
                                class="bg-white border-b dark:bg-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-600">
                                <th scope="row"
                                    class="px-6 py-1 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <input type="text" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </th>
                                <td class="px-6 py-1">
                                    <input type="text" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </td>
                                <td class="px-6 py-1">
                                    <input type="date" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </td>
                                <td class="px-6 py-1">
                                    <input type="text" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </td>
                                <td class="px-6 py-1 text-right">
                                    <a href="#"
                                        class="font-medium text-blue-600 dark:text-blue-500 underline">Submit</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="hidden p-4 rounded-b-lg bg-gray-50 dark:bg-gray-200 border-x border-b border-gray-600" id="styled-contacts" role="tabpanel"
                aria-labelledby="contacts-tab">
                <!-- <div class="flex gap-x-10 overflow-x-auto py-3">
                        <div>
                            <label class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Item
                                Name :
                            </label>
                            <input type="text" name=""
                                class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                        <div>
                            <label class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Quantity :
                            </label>
                            <input type="text" name=""
                                class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                        <div>
                            <label class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Quality
                                Check :
                            </label>
                            <input type="text" name=""
                                class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                        <div>
                            <label class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Quality
                                Check Date :
                            </label>
                            <input type="date" name=""
                                class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                    </div> -->

                <div>
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Item Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Quantity
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Quality Check Date
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Remarks if any
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <span class="sr-only">Submit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                class="bg-white border-b dark:bg-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-600">
                                <th scope="row"
                                    class="px-6 py-1 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <input type="text" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </th>
                                <td class="px-6 py-1">
                                    <input type="text" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </td>
                                <td class="px-6 py-1">
                                    <input type="date" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </td>
                                <td class="px-6 py-1">
                                    <input type="text" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </td>
                                <td class="px-6 py-1 text-right">
                                    <a href="#"
                                        class="font-medium text-blue-600 dark:text-blue-500 underline">Submit</a>
                                </td>
                            </tr>
                            <tr
                                class="bg-white border-b dark:bg-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-600">
                                <th scope="row"
                                    class="px-6 py-1 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <input type="text" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </th>
                                <td class="px-6 py-1">
                                    <input type="text" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </td>
                                <td class="px-6 py-1">
                                    <input type="date" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </td>
                                <td class="px-6 py-1">
                                    <input type="text" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </td>
                                <td class="px-6 py-1 text-right">
                                    <a href="#"
                                        class="font-medium text-blue-600 dark:text-blue-500 underline">Submit</a>
                                </td>
                            </tr>
                            <tr
                                class="bg-white border-b dark:bg-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-600">
                                <th scope="row"
                                    class="px-6 py-1 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <input type="text" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </th>
                                <td class="px-6 py-1">
                                    <input type="text" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </td>
                                <td class="px-6 py-1">
                                    <input type="date" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </td>
                                <td class="px-6 py-1">
                                    <input type="text" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </td>
                                <td class="px-6 py-1 text-right">
                                    <a href="#"
                                        class="font-medium text-blue-600 dark:text-blue-500 underline">Submit</a>
                                </td>
                            </tr>
                            <tr
                                class="bg-white border-b dark:bg-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-600">
                                <th scope="row"
                                    class="px-6 py-1 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <input type="text" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </th>
                                <td class="px-6 py-1">
                                    <input type="text" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </td>
                                <td class="px-6 py-1">
                                    <input type="date" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </td>
                                <td class="px-6 py-1">
                                    <input type="text" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </td>
                                <td class="px-6 py-1 text-right">
                                    <a href="#"
                                        class="font-medium text-blue-600 dark:text-blue-500 underline">Submit</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="hidden p-4 rounded-b-lg bg-gray-50 dark:bg-gray-200 border-x border-b border-gray-600" id="styled-about" role="tabpanel"
                aria-labelledby="contacts-tab">
                <!-- <div class="flex gap-x-10 overflow-x-auto py-3">
                        <div>
                            <label class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Item
                                Name :
                            </label>
                            <input type="text" name=""
                                class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                        <div>
                            <label class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Quantity :
                            </label>
                            <input type="text" name=""
                                class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                        <div>
                            <label class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Items
                                Dismantle :
                            </label>
                            <input type="text" name=""
                                class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                        <div>
                            <label class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Items
                                Dismantle Date :
                            </label>
                            <input type="date" name=""
                                class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                    </div> -->
                <div>
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Item Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Quantity
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Item Dismantle Date
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Remarks if any
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <span class="sr-only">Submit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                class="bg-white border-b dark:bg-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-600">
                                <th scope="row"
                                    class="px-6 py-1 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <input type="text" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </th>
                                <td class="px-6 py-1">
                                    <input type="text" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </td>
                                <td class="px-6 py-1">
                                    <input type="date" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </td>
                                <td class="px-6 py-1">
                                    <input type="text" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </td>
                                <td class="px-6 py-1 text-right">
                                    <a href="#"
                                        class="font-medium text-blue-600 dark:text-blue-500 underline">Submit</a>
                                </td>
                            </tr>
                            <tr
                                class="bg-white border-b dark:bg-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-600">
                                <th scope="row"
                                    class="px-6 py-1 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <input type="text" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </th>
                                <td class="px-6 py-1">
                                    <input type="text" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </td>
                                <td class="px-6 py-1">
                                    <input type="date" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </td>
                                <td class="px-6 py-1">
                                    <input type="text" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </td>
                                <td class="px-6 py-1 text-right">
                                    <a href="#"
                                        class="font-medium text-blue-600 dark:text-blue-500 underline">Submit</a>
                                </td>
                            </tr>
                            <tr
                                class="bg-white border-b dark:bg-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-600">
                                <th scope="row"
                                    class="px-6 py-1 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <input type="text" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </th>
                                <td class="px-6 py-1">
                                    <input type="text" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </td>
                                <td class="px-6 py-1">
                                    <input type="date" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </td>
                                <td class="px-6 py-1">
                                    <input type="text" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </td>
                                <td class="px-6 py-1 text-right">
                                    <a href="#"
                                        class="font-medium text-blue-600 dark:text-blue-500 underline">Submit</a>
                                </td>
                            </tr>
                            <tr
                                class="bg-white border-b dark:bg-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-600">
                                <th scope="row"
                                    class="px-6 py-1 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <input type="text" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </th>
                                <td class="px-6 py-1">
                                    <input type="text" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </td>
                                <td class="px-6 py-1">
                                    <input type="date" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </td>
                                <td class="px-6 py-1">
                                    <input type="text" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </td>
                                <td class="px-6 py-1 text-right">
                                    <a href="#"
                                        class="font-medium text-blue-600 dark:text-blue-500 underline">Submit</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="hidden p-4 rounded-b-lg bg-gray-50 dark:bg-gray-200 border-x border-b border-gray-600" id="styled-packaging" role="tabpanel"
                aria-labelledby="contacts-tab">
                <!-- <div class="flex gap-x-10 overflow-x-auto py-3">
                        <div>
                            <label class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Item
                                Name :
                            </label>
                            <input type="text" name=""
                                class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                        <div>
                            <label class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Quantity :
                            </label>
                            <input type="text" name=""
                                class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                        <div>
                            <label class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Packaging
                                :
                            </label>
                            <input type="text" name=""
                                class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                        <div>
                            <label class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Packaging
                                Date :
                            </label>
                            <input type="date" name=""
                                class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                    </div> -->
                <div>
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Item Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Quantity
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Packaging Date
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Remarks if any
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <span class="sr-only">Submit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                class="bg-white border-b dark:bg-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-600">
                                <th scope="row"
                                    class="px-6 py-1 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <input type="text" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </th>
                                <td class="px-6 py-1">
                                    <input type="text" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </td>
                                <td class="px-6 py-1">
                                    <input type="date" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </td>
                                <td class="px-6 py-1">
                                    <input type="text" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </td>
                                <td class="px-6 py-1 text-right">
                                    <a href="#"
                                        class="font-medium text-blue-600 dark:text-blue-500 underline">Submit</a>
                                </td>
                            </tr>
                            <tr
                                class="bg-white border-b dark:bg-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-600">
                                <th scope="row"
                                    class="px-6 py-1 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <input type="text" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </th>
                                <td class="px-6 py-1">
                                    <input type="text" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </td>
                                <td class="px-6 py-1">
                                    <input type="date" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </td>
                                <td class="px-6 py-1">
                                    <input type="text" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </td>
                                <td class="px-6 py-1 text-right">
                                    <a href="#"
                                        class="font-medium text-blue-600 dark:text-blue-500 underline">Submit</a>
                                </td>
                            </tr>
                            <tr
                                class="bg-white border-b dark:bg-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-600">
                                <th scope="row"
                                    class="px-6 py-1 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <input type="text" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </th>
                                <td class="px-6 py-1">
                                    <input type="text" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </td>
                                <td class="px-6 py-1">
                                    <input type="date" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </td>
                                <td class="px-6 py-1">
                                    <input type="text" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </td>
                                <td class="px-6 py-1 text-right">
                                    <a href="#"
                                        class="font-medium text-blue-600 dark:text-blue-500 underline">Submit</a>
                                </td>
                            </tr>
                            <tr
                                class="bg-white border-b dark:bg-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-600">
                                <th scope="row"
                                    class="px-6 py-1 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <input type="text" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </th>
                                <td class="px-6 py-1">
                                    <input type="text" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </td>
                                <td class="px-6 py-1">
                                    <input type="date" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </td>
                                <td class="px-6 py-1">
                                    <input type="text" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </td>
                                <td class="px-6 py-1 text-right">
                                    <a href="#"
                                        class="font-medium text-blue-600 dark:text-blue-500 underline">Submit</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="hidden p-4 rounded-b-lg bg-gray-50 dark:bg-gray-200 border-x border-b border-gray-600" id="styled-gate" role="tabpanel"
                aria-labelledby="contacts-tab">
                <!-- <div class="flex gap-x-10 overflow-x-auto py-3">
                        <div>
                            <label class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Item
                                Name :
                            </label>
                            <input type="text" name=""
                                class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                        <div>
                            <label class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Quantity :
                            </label>
                            <input type="text" name=""
                                class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                        <div>
                            <label class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Gate Exit
                                :
                            </label>
                            <input type="text" name=""
                                class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                        <div>
                            <label class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Gate Exit
                                Date :
                            </label>
                            <input type="date" name=""
                                class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                    </div> -->
                <div>
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Item Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Quantity
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Gate Exit Date
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Remarks if any
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <span class="sr-only">Submit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                class="bg-white border-b dark:bg-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-600">
                                <th scope="row"
                                    class="px-6 py-1 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <input type="text" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </th>
                                <td class="px-6 py-1">
                                    <input type="text" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </td>
                                <td class="px-6 py-1">
                                    <input type="date" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </td>
                                <td class="px-6 py-1">
                                    <input type="text" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </td>
                                <td class="px-6 py-1 text-right">
                                    <a href="#"
                                        class="font-medium text-blue-600 dark:text-blue-500 underline">Submit</a>
                                </td>
                            </tr>
                            <tr
                                class="bg-white border-b dark:bg-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-600">
                                <th scope="row"
                                    class="px-6 py-1 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <input type="text" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </th>
                                <td class="px-6 py-1">
                                    <input type="text" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </td>
                                <td class="px-6 py-1">
                                    <input type="date" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </td>
                                <td class="px-6 py-1">
                                    <input type="text" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </td>
                                <td class="px-6 py-1 text-right">
                                    <a href="#"
                                        class="font-medium text-blue-600 dark:text-blue-500 underline">Submit</a>
                                </td>
                            </tr>
                            <tr
                                class="bg-white border-b dark:bg-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-600">
                                <th scope="row"
                                    class="px-6 py-1 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <input type="text" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </th>
                                <td class="px-6 py-1">
                                    <input type="text" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </td>
                                <td class="px-6 py-1">
                                    <input type="date" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </td>
                                <td class="px-6 py-1">
                                    <input type="text" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </td>
                                <td class="px-6 py-1 text-right">
                                    <a href="#"
                                        class="font-medium text-blue-600 dark:text-blue-500 underline">Submit</a>
                                </td>
                            </tr>
                            <tr
                                class="bg-white border-b dark:bg-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-600">
                                <th scope="row"
                                    class="px-6 py-1 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <input type="text" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </th>
                                <td class="px-6 py-1">
                                    <input type="text" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </td>
                                <td class="px-6 py-1">
                                    <input type="date" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </td>
                                <td class="px-6 py-1">
                                    <input type="text" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </td>
                                <td class="px-6 py-1 text-right">
                                    <a href="#"
                                        class="font-medium text-blue-600 dark:text-blue-500 underline">Submit</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="hidden p-4 rounded-b-lg bg-gray-50 dark:bg-gray-200 border-x border-b border-gray-600" id="styled-installation" role="tabpanel"
                aria-labelledby="contacts-tab">
                <div>
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Item Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Quantity
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Installation Date
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Remarks if any
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <span class="sr-only">Submit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                class="bg-white border-b dark:bg-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-600">
                                <th scope="row"
                                    class="px-6 py-1 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <input type="text" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </th>
                                <td class="px-6 py-1">
                                    <input type="text" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </td>
                                <td class="px-6 py-1">
                                    <input type="date" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </td>
                                <td class="px-6 py-1">
                                    <input type="text" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </td>
                                <td class="px-6 py-1 text-right">
                                    <a href="#"
                                        class="font-medium text-blue-600 dark:text-blue-500 underline">Submit</a>
                                </td>
                            </tr>
                            <tr
                                class="bg-white border-b dark:bg-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-600">
                                <th scope="row"
                                    class="px-6 py-1 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <input type="text" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </th>
                                <td class="px-6 py-1">
                                    <input type="text" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </td>
                                <td class="px-6 py-1">
                                    <input type="date" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </td>
                                <td class="px-6 py-1">
                                    <input type="text" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </td>
                                <td class="px-6 py-1 text-right">
                                    <a href="#"
                                        class="font-medium text-blue-600 dark:text-blue-500 underline">Submit</a>
                                </td>
                            </tr>
                            <tr
                                class="bg-white border-b dark:bg-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-600">
                                <th scope="row"
                                    class="px-6 py-1 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <input type="text" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </th>
                                <td class="px-6 py-1">
                                    <input type="text" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </td>
                                <td class="px-6 py-1">
                                    <input type="date" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </td>
                                <td class="px-6 py-1">
                                    <input type="text" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </td>
                                <td class="px-6 py-1 text-right">
                                    <a href="#"
                                        class="font-medium text-blue-600 dark:text-blue-500 underline">Submit</a>
                                </td>
                            </tr>
                            <tr
                                class="bg-white border-b dark:bg-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-600">
                                <th scope="row"
                                    class="px-6 py-1 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <input type="text" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </th>
                                <td class="px-6 py-1">
                                    <input type="text" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </td>
                                <td class="px-6 py-1">
                                    <input type="date" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </td>
                                <td class="px-6 py-1">
                                    <input type="text" name=""
                                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </td>
                                <td class="px-6 py-1 text-right">
                                    <a href="#"
                                        class="font-medium text-blue-600 dark:text-blue-500 underline">Submit</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
    </div>

    </form>


    <button
        data-dialog-target="animated-dialog"
        class="rounded-md bg-slate-800 py-2 px-4 border border-transparent text-center text-sm text-white transition-all shadow-md hover:shadow-lg focus:bg-slate-700 focus:shadow-none active:bg-slate-700 hover:bg-slate-700 active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none ml-2" type="button">
        Open Dialog
    </button>
    <div
        data-dialog-backdrop="animated-dialog"
        data-dialog-backdrop-close="true"
        class="pointer-events-none fixed inset-0 z-[999] grid h-screen w-screen place-items-center bg-black bg-opacity-60 opacity-0 backdrop-blur-sm transition-opacity duration-300">
        <div
            data-dialog="animated-dialog"
            data-dialog-mount="opacity-100 translate-y-0 scale-100"
            data-dialog-unmount="opacity-0 -translate-y-28 scale-90 pointer-events-none"
            data-dialog-transition="transition-all duration-300"
            class="relative m-4 p-4 w-2/5 min-w-[40%] max-w-[40%] rounded-lg bg-white shadow-sm">
            <div class="flex shrink-0 items-center pb-4 text-xl font-medium text-slate-800">
                Its a simple dialog.
            </div>
            <div class="relative border-t border-slate-200 py-4 leading-normal text-slate-600 font-light">
                The key to more success is to have a lot of pillows. Put it this
                way, it took me twenty five years to get these plants, twenty five
                years of blood sweat and tears, and I&apos;m never giving up,
                I&apos;m just getting started. I&apos;m up to something. Fan luv.
            </div>
            <div class="flex shrink-0 flex-wrap items-center pt-4 justify-end">
                <button data-dialog-close="true" class="rounded-md border border-transparent py-2 px-4 text-center text-sm transition-all text-slate-600 hover:bg-slate-100 focus:bg-slate-100 active:bg-slate-100 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button">
                    Cancel
                </button>
                <button data-dialog-close="true" class="rounded-md bg-green-600 py-2 px-4 border border-transparent text-center text-sm text-white transition-all shadow-md hover:shadow-lg focus:bg-green-700 focus:shadow-none active:bg-green-700 hover:bg-green-700 active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none ml-2" type="button">
                    Confirm
                </button>
            </div>
        </div>
    </div>


    <div id="modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
        <div

            style="height: 80%;"
            class="bg-white p-6 rounded-lg ">

            <h2 class="text-xl font-semibold text-center mb-4">Allocated Data</h2>


            <div


                style="    height: 85%;"

                class="relative h-full overflow-auto shadow-md sm:rounded-lg">
                <table class="w-full  overflow-auto text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">

                            </th>
                            <th scope="col" class="px-6 py-3">
                                S.No
                            </th>
                            <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                Item code
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Serial number
                            </th>
                            <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                Lot number
                            </th>

                        </tr>
                    </thead>
                    <tbody id="setAllocatedTbody">
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <td class="px-6 py-4">
                                1
                            </td>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                Apple MacBook Pro 17
                            </th>
                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                Serial number
                            </td>
                            <td class="px-6 py-4">
                                lot number
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>















            <div class="flex justify-center gap-4">
                <button id="closeModalBtn" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">Close</button>
                <button id="reject_serials" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-green-600">Reject the items</button>
            </div>
        </div>
    </div>



    <button id="openModalBtn" class="px-4 hidden py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
        Open Dialog
    </button>


</body>
<script>
    // Get references to modal and buttons
    const modal = document.getElementById('modal');
    const openModalBtn = document.getElementById('openModalBtn');
    const closeModalBtn = document.getElementById('closeModalBtn');

    // Open the modal
    openModalBtn.addEventListener('click', function() {
        modal.classList.remove('hidden');
    });

    // Close the modal
    closeModalBtn.addEventListener('click', function() {
        modal.classList.add('hidden');
    });

    // Close the modal if the user clicks outside the modal content
    window.addEventListener('click', function(e) {
        if (e.target === modal) {
            modal.classList.add('hidden');
        }
    });
</script>

<script src='./js/jquery.min.js'></script>
<script src="./js/projectStatus.js"></script>

</html>