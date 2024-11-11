<?php include("./navForLogged.php"); ?>

<?php

include('./dbconnection/db.php');


$sql = "SELECT * FROM item_master_main";


$result = mysqli_query($con, $sql);

// include("./navForLogged.php");


if ($_SERVER['REQUEST_METHOD'] == "GET") {



    if (isset($_GET["search_query"])) {
        $query = $_GET["search_query"];

        $sql = "SELECT * FROM item_master_main where Item_Category = '$query'";




        $result = mysqli_query($con, $sql);

        // echo "QIURY";
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
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js">
    </script>
    <title>Get Enter Report</title>
</head>

<body>
    <section class="bg-gray-50 dark:bg-gray-900  mt-6   p-3 sm:p-5">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <!-- Start coding here -->
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div
                    class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                    <div class="w-full md:w-1/2">
                        <form class="flex items-center">
                            <label for="simple-search" class="sr-only">Search</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                        fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input type="text" id="search_query" name="search_query"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Search">
                            </div>
                        </form>
                    </div>
                    <div
                        class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                        <button onclick="exportTableToCSV('table.csv')" type="button"
                            class="flex items-center justify-center  bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                            <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd"
                                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                            </svg>
                            Export to CSV
                        </button>
                        <div class="flex items-center space-x-3 w-full md:w-auto">
                            <!-- <button id="actionsDropdownButton" data-dropdown-toggle="actionsDropdown" class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" type="button">
                                <svg class="-ml-1 mr-1.5 w-5 h-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path clip-rule="evenodd" fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                </svg>
                                Actions
                            </button> -->
                            <div id="actionsDropdown"
                                class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="actionsDropdownButton">
                                    <li>
                                        <a href="#"
                                            class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Mass
                                            Edit</a>
                                    </li>
                                </ul>
                                <div class="py-1">
                                    <a href="#"
                                        class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete
                                        all</a>
                                </div>
                            </div>
                            <button id="filterDropgitdownButton" data-dropdown-toggle="filterDropdown"
                                class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                                type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                                    class="h-4 w-4 mr-2 text-gray-400" viewbox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z"
                                        clip-rule="evenodd" />
                                </svg>
                                Filter
                                <svg class="-mr-1 ml-1.5 w-5 h-5" fill="currentColor" viewbox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path clip-rule="evenodd" fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                </svg>
                            </button>
                            <div id="filterDropdown"
                                class="z-10 hidden w-48 p-3 bg-white rounded-lg shadow dark:bg-gray-700">
                                <h6 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">Choose brand</h6>
                                <ul id="searchFilterArea" class="space-y-2 text-sm"
                                    aria-labelledby="filterDropdownButton">
                                    <li class="flex items-center">
                                        <input id="apple" type="checkbox" value="received"
                                            class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <label for="apple"
                                            class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Recieved</label>
                                    </li>
                                    <li class="flex items-center">
                                        <input id="fitbit" type="checkbox" value="Accepted"
                                            class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <label for="fitbit"
                                            class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Accepted</label>
                                    </li>
                                    <li class="flex items-center">
                                        <input id="razor" type="checkbox" value="Rejected"
                                            class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <label for="razor"
                                            class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Rejected</label>
                                    </li>
                                    <li class="flex items-center">
                                        <input id="nikon" type="checkbox" value="Delivered"
                                            class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <label for="nikon"
                                            class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Delivered</label>
                                    </li>
                                    <!-- <li class="flex items-center">
                                        <input id="benq" type="checkbox" value="" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <label for="benq" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">InComplete</label>
                                    </li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table id="dataTable"
                        class="w-full text-sm whitespace-nowrap text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">S No</th>
                                <th scope="col" class="px-6 py-3">item code</th>
                                <th scope="col" class="px-6 py-3">Item Category</th>
                                <th scope="col" class="px-6 py-3">item name</th>
                                <th scope="col" class="px-6 py-3">sub category</th>
                                <th scope="col" class="px-6 py-3">Price</th>
                                <th scope="col" class="px-6 py-3">SI unit</th>
                                <th scope="col" class="px-6 py-3">Material</th>
                                <th scope="col" class="px-6 py-3">Design</th>
                                <th scope="col" class="px-6 py-3">item type</th>
                                <th scope="col" class="px-6 py-3">Half Full Thread</th>
                                <th scope="col" class="px-6 py-3">Holder Thread</th>
                                <th scope="col" class="px-6 py-3">Holder type</th>
                                <th scope="col" class="px-6 py-3">Thread</th>
                                <th scope="col" class="px-6 py-3">Brand</th>
                                <th scope="col" class="px-6 py-3">Light Output colour</th>
                                <th scope="col" class="px-6 py-3">Colour</th>
                                <th scope="col" class="px-6 py-3">Cut</th>
                                <th scope="col" class="px-6 py-3">Height</th>
                                <th scope="col" class="px-6 py-3">Length</th>
                                <th scope="col" class="px-6 py-3">Breadth</th>
                                <th scope="col" class="px-6 py-3">Upper Dia</th>
                                <th scope="col" class="px-6 py-3">Bottom Dia</th>
                                <th scope="col" class="px-6 py-3">Centre Hole dia</th>
                                <th scope="col" class="px-6 py-3">Size</th>
                                <th scope="col" class="px-6 py-3">Watt</th>
                                <th scope="col" class="px-6 py-3">Shape</th>
                                <th scope="col" class="px-6 py-3">Side Hole dia</th>
                                <th scope="col" class="px-6 py-3">Top hole dia</th>
                                <th scope="col" class="px-6 py-3">No of ply</th>
                                <th scope="col" class="px-6 py-3">Style</th>
                                <th scope="col" class="px-6 py-3">Thickness</th>
                                <th scope="col" class="px-6 py-3">Weight</th>
                                <th scope="col" class="px-6 py-3">Depth</th>
                                <th scope="col" class="px-6 py-3">Bottom hole dia</th>
                                <th scope="col" class="px-6 py-3">Bottom hole</th>
                                <th scope="col" class="px-6 py-3">Core</th>
                                <th scope="col" class="px-6 py-3">Inner Outer thread</th>
                                <th scope="col" class="px-6 py-3">Upper thread</th>
                                <th scope="col" class="px-6 py-3">Lower thread</th>
                                <th scope="col" class="px-6 py-3">Thread length</th>
                                <th scope="col" class="px-6 py-3">Indian Imported</th>
                                <th scope="col" class="px-6 py-3">In built switch</th>
                                <th scope="col" class="px-6 py-3">Wire type</th>
                                <th scope="col" class="px-6 py-3">Vendor</th>
                                <th scope="col" class="px-6 py-3">standard npd</th>
                                <th scope="col" class="px-6 py-3">attribute1</th>
                                <th scope="col" class="px-6 py-3">attribute2</th>
                                <th scope="col" class="px-6 py-3">attribute3</th>
                                <th scope="col" class="px-6 py-3">itemmastercol</th>
                                <th scope="col" class="px-6 py-3">imagePath</th>
                                <th scope="col" class="px-6 py-3">createdBy</th>
                                <th scope="col" class="px-6 py-3">updatedBy</th>
                                <th scope="col" class="px-6 py-3">departement</th>
                                <th scope="col" class="px-6 py-3">updatedDate</th>
                                <th scope="col" class="px-6 py-3">Long Description</th>
                                <th scope="col" class="px-6 py-3">Pintop</th>
                                <th scope="col" class="px-6 py-3">Discount</th>
                                <th scope="col" class="px-6 py-3">itemStatus</th>
                                <th scope="col" class="px-6 py-3">createdDate</th>
                                <th scope="col" class="px-6 py-3">fabric</th>
                                <th scope="col" class="px-6 py-3">fabric colour</th>
                                <th scope="col" class="px-6 py-3">piping</th>
                                <th scope="col" class="px-6 py-3">piping color</th>
                                <th scope="col" class="px-6 py-3">acrylic sheet</th>
                                <th scope="col" class="px-6 py-3">gallery height</th>
                                <th scope="col" class="px-6 py-3">sheet</th>
                                <th scope="col" class="px-6 py-3">sheet color</th>
                                <th scope="col" class="px-6 py-3">powder coating</th>
                                <th scope="col" class="px-6 py-3">subCatId</th>
                                <th scope="col" class="px-6 py-3">colour temparature</th>
                                <th scope="col" class="px-6 py-3">Dimmable</th>
                                <th scope="col" class="px-6 py-3">Location</th>
                                <th scope="col" class="px-6 py-3">Collar</th>
                                <th scope="col" class="px-6 py-3">Diameter</th>
                                <th scope="col" class="px-6 py-3">Socket</th>
                                <th scope="col" class="px-6 py-3">Ink type</th>
                                <th scope="col" class="px-6 py-3">Transparent</th>
                                <th scope="col" class="px-6 py-3">piping length</th>
                                <th scope="col" class="px-6 py-3">Lining</th>
                                <th scope="col" class="px-6 py-3">Lining colour</th>
                                <th scope="col" class="px-6 py-3">gallery</th>
                                <th scope="col" class="px-6 py-3">Gallery type</th>
                            </tr>
                        </thead>
                        <tbody id="genDataTbody">
                            <?php
                            $i = 0;
                            while ($row = mysqli_fetch_assoc($result)) {
                                $i++;
                                ?>
                                <tr class="border-b dark:border-gray-700">
                                    <td class="px-6 py-4"><?php echo $row['S_No'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['item_code'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['Item_Category'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['item_name'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['sub_category'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['Price'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['SI_unit'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['Material'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['Design'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['item_type'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['Half_Full_Thread'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['Holder_Thread'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['Holder_type'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['Thread'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['Brand'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['Light_Output_colour'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['Colour'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['Cut'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['Height'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['Length'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['Breadth'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['Upper_Dia'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['Bottom_Dia'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['Centre_Hole_dia'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['Size'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['Watt'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['Shape'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['Side_Hole_dia'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['Top_hole_dia'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['No_of_ply'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['Style'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['Thickness'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['Weight'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['Depth'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['Bottom_hole_dia'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['Bottom_hole'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['Core'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['Inner_Outer_thread'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['Upper_thread'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['Lower_thread'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['Thread_length'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['Indian_Imported'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['In_built_switch'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['Wire_type'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['Vendor'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['standard_npd'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['attribute1'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['attribute2'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['attribute3'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['itemmastercol'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['imagePath'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['createdBy'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['updatedBy'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['departement'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['updatedDate'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['Long_Description'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['Pintop'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['Discount'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['itemStatus'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['createdDate'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['fabric'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['fabric_colour'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['piping'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['piping_color'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['acrylic_sheet'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['gallery_height'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['sheet'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['sheet_color'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['powder_coating'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['subCatId'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['colour_temparature'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['Dimmable'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['Location'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['Collar'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['Diameter'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['Socket'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['Ink_type'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['Transparent'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['piping_length'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['Lining'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['Lining_colour'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['gallery'] ?></td>
                                    <td class="px-6 py-4"><?php echo $row['Gallery_type'] ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </section>

    <script>
        function exportTableToCSV(filename) {
            const table = document.getElementById('dataTable');
            let csv = [];

            // Get table headers
            const headers = Array.from(table.querySelectorAll('th')).map(th => th.innerText);
            csv.push(headers.join(','));

            // Get table rows
            const rows = Array.from(table.querySelectorAll('tr')).slice(1); // Exclude header row
            rows.forEach(row => {
                const cells = Array.from(row.querySelectorAll('td')).map(td => td.innerText);
                csv.push(cells.join(','));
            });

            // Create a CSV file
            const csvContent = csv.join('\n');
            const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
            const url = URL.createObjectURL(blob);

            // Create a link to download the CSV
            const link = document.createElement('a');
            link.setAttribute('href', url);
            link.setAttribute('download', filename);
            link.style.display = 'none';

            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }
    </script>


</body>