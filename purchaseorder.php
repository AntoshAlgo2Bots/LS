<?php

// include("./db.php");
include('./dbconnection/db.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.4/dist/tailwind.min.css" rel="stylesheet">
    <title>Document</title>

</head>


<style>

</style>



<body>
    <?php
    include("./navForLogged.php");



    ?>


    <div class="mainContent mt-24">



        <div class="flex flex-col  float-right">
            <div class="-m-1.5 overflow-x-auto overflow-y-auto">
                <div style="height:50vh;" class="p-1.5  inline-block align-middle">
                    <div class="border rounded-lg divide-y divide-gray-200">
                        <div class="py-3   px-4">
                            <div class="relative max-w-xs">
                                <label class="sr-only">Search</label>
                                <input type="text" name="hs-table-with-pagination-search"
                                    id="hs-table-with-pagination-search"
                                    class="py-2 px-3 ps-9 block w-full  ml-10 border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                    placeholder="Search for items">
                                <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-3">
                                    <svg class="size-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="11" cy="11" r="8"></circle>
                                        <path d="m21 21-4.3-4.3"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="overflow-hidden">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class=" bg-gray-50">
                                    <tr>
                                        <!-- <th scope="col" class="py-3 px-4 pe-0">
                                            <div class="flex items-center h-5">
                                                <input id="hs-table-pagination-checkbox-all" type="checkbox"
                                                    class="border-gray-200 rounded text-blue-600 focus:ring-blue-500">
                                                <label for="hs-table-pagination-checkbox-all"
                                                    class="sr-only">Checkbox</label>
                                            </div>
                                        </th> -->
                                        <th scope="col"
                                            class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                            S .no
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">PO
                                            number
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                            Supplier name
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                            Created By
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">
                                            Ship to
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">
                                            Bill to
                                        </th>

                                        <th scope="col"
                                            class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">
                                            Status
                                        </th>

                                        <th scope="col"
                                            class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">

                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y overflow-y-auto overflow-x-auto divide-gray-200">

                                    <?php


                                    $i = 1;


                                    $sql = "SELECT * FROM for_office.purchase_order_header ORDER BY PO_number desc ;";

                                    $result = mysqli_query($con, $sql);

                                    while ($row = mysqli_fetch_assoc($result)) {




                                        ?>

                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                <?php echo $i ?>
                                            </td>
                                            <td class="px-6 font-medium py-4 whitespace-nowrap text-sm text-gray-800">
                                                <?php echo $row['PO_number']; ?>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                <?php echo $row['supplier_name']; ?>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                <?php echo $row['createdBy']; ?>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                <?php echo $row['shipTo']; ?>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                <?php echo $row['bill_to_location']; ?>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                <?php echo $row['status']; ?>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                                <button type="button" 
                                                onclick="getfulldataofponumber(event)"

                                                po-id=" <?php echo $row['PO_number']; ?>"
                                                
                                                data-modal-target="poDetailsallbyponumber"
                                                    data-modal-toggle="poDetailsallbyponumber"
                                                    class="inline-flex cursor-pointer items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 focus:outline-none focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400 dark:focus:text-blue-400">View
                                                    all</button>
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
        </div>





    </div>











    <!--  line model -->


    <div id="poDetailsallbyponumber" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">


        <div class="relative p-4   max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Purchase orders : <span id="purchase_order_id" po-id=""></span>
                    </h3>
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-white">

                    </h2>
                    <button type="button" id="purchseorderclosebtn"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="poDetailsallbyponumber">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>

                    </button>
                </div>
                <!-- Modal body -->


                <!-- component -->
                <div class="flex  mx-auto  items-center justify-center" style="width:95%;">
                    <div class="">

                        <div class="flex flex-col  float-right">
                            <div class="-m-1.5 overflow-x-auto overflow-y-auto">
                                <div style="height:50vh;" class="p-1.5  inline-block align-middle">
                                    <div class="border rounded-lg divide-y divide-gray-200">
                                        <div class="py-3   px-4">
                                            <div class="relative max-w-xs">
                                                <label class="sr-only">Search</label>
                                                <input type="text" name="hs-table-with-pagination-search"
                                                    id="hs-table-with-pagination-search"
                                                    class="py-2 px-3 ps-9 block w-full  ml-10 border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                                    placeholder="Search for items">
                                                <div
                                                    class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-3">
                                                    <svg class="size-4 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                                        width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <circle cx="11" cy="11" r="8"></circle>
                                                        <path d="m21 21-4.3-4.3"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="overflow-hidden">
                                            <table class="min-w-full divide-y divide-gray-200">
                                                <thead class=" bg-gray-50">
                                                    <tr>
                                                      
                                                        <th scope="col"
                                                            class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                                            S .no
                                                        </th>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                                            PO
                                                            number
                                                        </th>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                                            item_code
                                                        </th>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                                            item_shortdiscription
                                                        </th>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">
                                                            unit_price
                                                        </th>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">
                                                            quantity
                                                        </th>

                                                        <th scope="col"
                                                            class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">
                                                            total_price
                                                        </th>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">
                                                            need_by_date
                                                        </th>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">
                                                            quantity_recevied
                                                        </th>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">
                                                            Balance
                                                        </th>

                                                        <th scope="col"
                                                            class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">

                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody id="purchaseOrderLineDetails" class="divide-y overflow-y-auto overflow-x-auto divide-gray-200">


                                                        <tr>
                                                            <td
                                                                class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                                s.no
                                                            </td>
                                                            <td
                                                                class="px-6 font-medium py-4 whitespace-nowrap text-sm text-gray-800">
                                                                po number
                                                            </td>
                                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                                item code
                                                            </td>
                                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                                short discription
                                                            </td>
                                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                                unit price
                                                            </td>
                                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                                quantity
                                                            </td>
                                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                                Total price
                                                            </td>
                                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                                Need by date
                                                            </td>
                                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                                Quantity recieved
                                                            </td>
                                                            <td
                                                                class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                                               balnce
                                                            </td>

                                                        </tr>


                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>






</body>

<script src="./js/po.js"></script>
<script src="./js/jquery.min.js"></script>
<script>

    let lineTable = document.getElementById("poDetailsallbyponumber")


</script>


</html>