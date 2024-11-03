<?php




include('./dbconnection/db.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {









    $grn_number = $_POST['grn_number'];


    // $query = "SELECT * FROM for_office.sale_order_items_lines where so_number = $grn_number;";
    $query = "SELECT a.item_qty as items_in_store,a.id as tr_id,a.*,b.*,c.* FROM for_office.mtl_inventory_transactions a join for_office.grn_goods_receipt_header  b on a.grn_id=b.id
join for_office.grn_line_items c on a.grn_line_number=c.id where a.grn_id=$grn_number;
";

    echo $query;



    $result_data = mysqli_query($con, $query);
}












?>




<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.4/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>

    <title>Move Order Form</title>
</head>

<body>
    <?php
    require("./navForLogged.php");


    ?>



    <div id="create_section" class="mt-3 border  p-5 rounded-lg mx-5">
        <h1 class="text-center  text-3xl mb-3 font-bold">Move Order </h1>
        <form class=" border  p-5 rounded-md">
            <div class="lg:w-5/6 w-auto mx-auto flex flex-wrap justify-between items-center">
                <div class="">



                    <div

                        style="min-width: 150px;max-width:200px"
                        class="w-full max-w-sm min-w-[200px]">
                        <label class="block mb-2 text-sm font-medium text-slate-600">
                            Record Id
                        </label>
                        <input name="reacord_id" class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow" placeholder="Record id" />
                    </div>





                    <div

                        style="min-width: 200px;max-width:200px"
                        class="w-full max-w-sm min-w-[200px]">
                        <label class="block mb-2 text-sm font-medium text-slate-600">
                            Status
                        </label>
                        <input
                            name="status"
                            class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow" placeholder="Status" />


                    </div>





                </div>
                <div class="">



                    <div

                        style="min-width: 150px;max-width:200px"
                        class="w-full max-w-sm min-w-[200px]">
                        <label class="block mb-2 text-sm font-medium text-slate-600">
                            Description
                        </label>
                        <input name="description" class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow" placeholder="Discription" />
                    </div>

                    <!-- <div class="">
                        <label
                            class="w-40 inline-block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Move
                            Order Type
                            : </label>
                        <input type="text" name="move_order_type"
                            class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div> -->


                    <div

                        style="min-width: 200px; max-width:200px"
                        class="w-full max-w-sm ">
                        <label class="block mb-2 text-sm font-medium text-slate-600">
                            Move order type
                        </label>
                        <input name="move_order_type" class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow" placeholder="Move order type" />
                    </div>


                </div>
            </div>


        </form>
        <form method="post" class=" border  p-5 mt-5 rounded-md">
            <div class="lg:w-5/6 w-auto mx-auto flex flex-wrap justify-between items-center">
                <div class="">
                    <!-- <div>
                        <label for="email"
                            class=" w-40 inline-block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">
                            Transaction Type :
                        </label>
                        <input type="text"
                            name="transaction_type"
                            class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div> -->

                    <div

                        style="min-width: 150px;max-width:200px"
                        class="w-full max-w-sm min-w-[200px]">
                        <label class="block mb-2 text-sm font-medium text-slate-600">
                            Transaction type :
                        </label>
                        <input name="transaction_type" class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow" placeholder="Transaction type ...." />
                    </div>
                    <div

                        style="min-width: 200px; max-width:200px"
                        class="w-full max-w-sm min-w-[200px]">
                        <label class="block mb-2 text-sm font-medium text-slate-600">
                            Source sub inventory :
                        </label>
                        <select
                            name="source_sub_invetory"
                            value="STORE"
                            readonly
                            class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow" placeholder="Source sub inventory....">


                            <?php

                            $sql = "SELECT * FROM for_office.mtl_sub_inventory;";
                            $result  = mysqli_query($con, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>


                                <option class="m-0" value="<?php echo $row['id'] ?>"> <?php echo $row['sub_inventory_name'] ?></option>




                            <?php

                            }

                            ?>


                        </select>
                    </div>

                    <!-- 

                    <div

                        style="min-width: 150px;max-width:200px"
                        class="w-full max-w-sm min-w-[200px]">
                        <label class="block mb-2 text-sm font-medium text-slate-600">
                            Add Members
                        </label>
                        <input class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow" placeholder="Type here..." />
                    </div> -->



                    <!-- 

                    <div class="">

                        <label
                            class="w-40 inline-block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">SO
                            Number : </label>
                        <input type="text" name="grn_number"
                            class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />










                    </div> -->



                    <div

                        style="min-width: 200px;max-width:200px"
                        class="w-full max-w-sm min-w-[200px]">
                        <label class="block mb-2 text-sm font-medium text-slate-600">
                            Enter GRN Number :
                        </label>


                        <div class="flex gap-1">

                            <input name="grn_number" class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow" placeholder="Type here..." />
                            <button type="submit">Search</button>
                        </div>
                    </div>










                </div>
                <div class="">
                    <!-- <div class="">
                        <label
                            class="w-40 inline-block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Location
                            : </label>
                        <input type="text"
                            class="w-40 rounded-md border text-xs  bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div> -->



                    <div>
                        <label class="block mb-2 text-sm font-medium text-slate-600">
                            Location :
                        </label>

                        <input style="min-width: 150px;max-width:200px" name="location" class=" bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow" placeholder="Enter location..." />
                    </div>


                    <!-- <div class="">
                        <label
                            class="w-40 inline-block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Destination
                            Subinv
                            : </label>
                        <input type="text" name="destination_sub_inventory"
                            class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    
                    
                     -->

                    <div

                        style="min-width: 150px;max-width:200px"
                        class="w-full max-w-sm min-w-[200px]">
                        <label class="block mb-2 text-sm font-medium text-slate-600">
                            Destination sub inventory
                        </label>
                        <select name="destination_sub_inventory" class="w-full cursor-pointer bg-transparent placeholder:text-slate-400 text-slate-700  border border-slate-200 rounded-md px-3 py-2 transition duration-300  focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow" placeholder="Enter destination sub inventory ">

                            <option selected disabled value="select"> SELECT
                            </option>

                            <?php

                            $sql = "SELECT * FROM for_office.mtl_sub_inventory;";
                            $result  = mysqli_query($con, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>


                                <option class="m-0" value="<?php echo $row['id'] ?>"> <?php echo $row['sub_inventory_name'] ?></option>




                            <?php

                            }

                            ?>

                        </select>
                    </div>



                    <!--                     
                    <div class="">
                        <label
                            class="w-40 inline-block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Date
                            Required
                            Subinv
                            : </label>
                        <input type="date"
                            name="date_required_sub_inventory"
                            class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />

                    </div> -->



                    <div

                        style="min-width: 150px;max-width:200px"
                        class="w-full max-w-sm min-w-[200px]">
                        <label class="block mb-2 text-sm font-medium text-slate-600">
                            Date Required Subinv :
                        </label>
                        <input name="date_required_sub_inventory" type="date" class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow" placeholder="required_sub_inventory" />
                    </div>


                </div>
            </div>


        </form>


        <div class="border  mt-5 p-5">
            <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-styled-tab"
                    data-tabs-toggle="#default-styled-tab-content"
                    data-tabs-active-classes="text-purple-600 hover:text-purple-600 dark:text-purple-500 dark:hover:text-purple-500 border-purple-600 dark:border-purple-500"
                    data-tabs-inactive-classes="dark:border-transparent text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300"
                    role="tablist">
                    <li class="me-2" role="presentation">
                        <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-styled-tab"
                            data-tabs-target="#styled-profile" type="button" role="tab" aria-controls="profile"
                            aria-selected="false">Item list's</button>
                    </li>

                </ul>
            </div>





















            <!-- <div class="p-4 md:p-5">
                                <form class="space-y-4" action="#">
                                    <div class="gap-x-5">
                                        <div id="pop_serial">

                                            <div>
                                                <label for="" id=""
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Serial
                                                    Number From</label>
                                                <input type="number" name="" id=""
                                                    class="bg-gray-50 border border-gray-300 mb-3 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                    required />
                                            </div>
                                            <div>
                                                <label for="" id=""
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Serial
                                                    Number To</label>
                                                <input type="number" name="" id=""
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                    required />
                                            </div>
                                        </div>
                                        <div>
                                            <button type="submit" onclick="add_field()" id="add_field_btn"
                                                class="w-1/4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mt-5">Add</button>
                                        </div>
                                    </div>
                                    <div id="lot_input" style="display: none;">
                                        <label for="" id="serial_to"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lot
                                            Number</label>
                                        <input type="number" name=""
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                            required />
                                    </div>
                                    <button type="submit"
                                        class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mt-5">Submit
                                        Now</button>
                                </form>
                            </div> -->


        </div>
    </div>
    </div>
    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="styled-dashboard" role="tabpanel"
        aria-labelledby="dashboard-tab">
        <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong
                class="font-medium text-gray-800 dark:text-white">Dashboard tab's associated
                content</strong>.
            Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript
            swaps
            classes to control the content visibility and styling.</p>
    </div>
    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="styled-settings" role="tabpanel"
        aria-labelledby="settings-tab">
        <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong
                class="font-medium text-gray-800 dark:text-white">Settings tab's associated
                content</strong>.
            Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript
            swaps
            classes to control the content visibility and styling.</p>
    </div>
    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="styled-contacts" role="tabpanel"
        aria-labelledby="contacts-tab">
        <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong
                class="font-medium text-gray-800 dark:text-white">Contacts tab's associated
                content</strong>.
            Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript
            swaps
            classes to control the content visibility and styling.</p>
    </div>
    </div>




    <?php
    if (isset($grn_number)) {



    ?>

        <div
            style="width: 95%;"
            class="relative mt-2 flex flex-col w-full mx-auto overflow-auto text-gray-700 bg-white shadow-md rounded-xl bg-clip-border">
            <table class="w-full text-left table-auto min-w-max">
                <thead>
                    <tr>
                        <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">

                        </th>
                        <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                            <p class="block font-bold text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                SO No.
                            </p>
                        </th>
                        <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                            <p class="block font-bold text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                Grn Line number
                            </p>
                        </th>
                        <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                            <p class="block font-bold text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                Item code
                            </p>
                        </th>
                        <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                            <p class="block font-bold text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                Qty in Store
                            </p>
                        </th>
                        <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                            <p class="block font-bold text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                Lot number
                            </p>
                        </th>
                        <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                            <p class="block font-bold text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                Work in progress qty
                            </p>
                        </th>
                        <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                            <p class="block font-bold text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                Sub inventory
                            </p>
                        </th>

                        
                        <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                            <p class="block font-bold text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                Destination inventory
                            </p>
                        </th>

                        <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                            <p class="block font-bold text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                Dispached Qty
                            </p>
                        </th>
                        <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                            <p class="block font-bold text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                Creted date
                            </p>
                        </th>
                        <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                            <p class="block font-bold text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                Enter quantity
                            </p>
                        </th>

                        <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                            <p class="block font-bold text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70"></p>
                        </th>
                    </tr>
                </thead>
                <tbody id="items_data_table">






                    <?php



                    $i = 0;
                    while ($row = mysqli_fetch_assoc($result_data)) {
                        $i++;
                    ?>


                        <tr>

                            <td class="p-4 border-b border-blue-gray-50">
                                <label class="flex items-center cursor-pointer relative">
                                    <input type="checkbox" class="peer h-5 w-5 cursor-pointer transition-all appearance-none rounded shadow hover:shadow-md border border-slate-300 checked:bg-slate-800 checked:border-slate-800" id="check" />
                                    <span class="absolute text-white opacity-0 peer-checked:opacity-100 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 20 20" fill="currentColor" stroke="currentColor" stroke-width="1">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                        </svg>
                                    </span>
                                </label>
                            </td>

                            <td class="p-4 border-b border-blue-gray-50">
                                <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                    <?php echo $i ?>
                            </td>
                            <td class="p-4 border-b border-blue-gray-50">


                                <div
                                    style="max-width: 200px;"
                                    class="w-full max-w-sm min-w-[150px]">
                                    <?php echo $row['grn_line_number'] ?>

                                </div>

                            </td>
                            <td class="p-4 border-b border-blue-gray-50">
                                <div

                                    class="w-full max-w-sm min-w-[150px]">
                                    <input
                                        style="max-width: 200px;"
                                        readonly
                                        placeholder="item_code"
                                        name="item_code"
                                        transaction-id=<?php echo $row['tr_id'] ?>
                                        value="<?php echo $row['item_code'] ?>"
                                        class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow">
                                </div>
                            </td>
                            <td class="p-4 border-b border-blue-gray-50">
                                <div
                                    style="max-width: 200px;"
                                    class="w-full max-w-sm min-w-[150px]">

                                    <?php echo $row['items_in_store'] ?>
                                </div>
                            </td>

                            <td class="p-4 border-b border-blue-gray-50">
                                <div
                                    style="max-width: 200px;"
                                    class="w-full max-w-sm min-w-[150px]">
                                    <input
                                        placeholder="Created date"
                                        readOnly
                                        name="lot_number"
                                        value="<?php echo $row['lot_number'] ?>"
                                        class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow">

                                </div>
                            </td>



                            
                            <td class="p-4 border-b border-blue-gray-50">
                                <?php echo $row['workinprogress_qty'] ?>
                            </td>
                            
                            <td class="p-4 border-b border-blue-gray-50">
                                <?php echo $row['sub_inventory_name'] ?>
                            </td>
  






                            <td class="p-4 border-b border-blue-gray-50">
                                <div
                                    style="max-width: 200px;"
                                    class="w-full max-w-sm min-w-[150px]">
                                    <select
                                        placeholder="Created date"

                                        name="destination_sub_inventory"

                                        class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow">






                                        <?php

                                        $sql = "SELECT * FROM for_office.mtl_sub_inventory;";
                                        $result3  = mysqli_query($con, $sql);
                                        while ($row2 = mysqli_fetch_assoc($result3)) {



                                            

                                            if ($row['sub_inventory_id'] != $row2['id']) {



                                        ?>





                                                <option class="m-0" value="<?php echo $row2['id'] ?>"> <?php echo $row2['sub_inventory_name'] ?></option>




                                        <?php
                                            }
                                        }

                                        ?>















                                    </select>

                                </div>
                            </td>



                            <td class="p-4 border-b border-blue-gray-50">

                                <?php echo $row['dispatched_qty'] ?>

                            </td>
                            <td class="p-4 border-b border-blue-gray-50">
                                <div
                                    style="max-width: 200px;"
                                    class="w-full max-w-sm min-w-[150px]">
                                    <input
                                        placeholder="Created date"
                                        readOnly
                                        value="<?php echo $row['created_date'] ?>"
                                        class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow">

                                </div>
                            </td>
                            <td class="p-4 border-b border-blue-gray-50">
                                <div
                                    style="max-width: 200px;"
                                    class="w-full max-w-sm min-w-[150px]">
                                    <input
                                        name="qty"
                                        type="number"
                                        placeholder="Enter quantity"

                                        value=" "
                                        class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow">

                                </div>
                            </td>

                        </tr>


                    <?php


                    }
                    ?>

                </tbody>
            </table>
        </div>
        </div>


        <div class="w-full mt-5 flex justify-around">
            <button type="reset"
                class="w-28 text-white border border-blue-700 bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-xs py-2.5 text-center me-2 mb-2 font-bold dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800 ">Clear
                Form</button>
            <button type="text"
                name="move_item"
                class="w-28 text-white border border-blue-700 bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-xs py-2.5 text-center me-2 mb-2 font-bold dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800 ">Move items</button>
            <div>
                <button type="text"
                    class="w-28 text-white border border-blue-700 bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-xs py-2.5 text-center me-2 font-bold dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800 ">Approve</button>
            </div>
        </div>
    <?php

    }
    ?>
    </div>


    <script>
        let x = `<div class="border-t border-gray-900 mt-4 pt-2">
                                            <label for="" id=""
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Serial
                                                Number From</label>
                                            <input type="number" name="" id=""
                                                class="bg-gray-50 border mb-3 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                required />
                                        </div>
                                        <div>
                                            <label for="" id=""
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Serial
                                                Number To</label>
                                            <input type="number" name="" id=""
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                required />
                                        </div>`


        function form_radio() {

            let y = document.getElementById("serial_txt")
            let z = document.getElementById("lot_no")
            let add_btn = document.getElementById("add_field_btn")
            let w = document.getElementById("lot_input")
            let v = document.getElementById("pop_serial")


            if (z.checked) {
                w.style.display = "block";
                v.style.display = "none"
                add_btn.style.display = "none"
            }

            if (y.checked) {
                v.style.display = "block"
                w.style.display = "none";
                add_btn.style.display = "block"
            }

            console.log("hey")
        }

        function add_field() {
            let y = document.getElementById("pop_serial")

            y.innerHTML += x;
        }
    </script>
</body>

<script src="./js/jquery.min.js"></script>
<script src="./js/moveOrderJs.js"></script>

</html>