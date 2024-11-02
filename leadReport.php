<?php

include('./dbconnection/db.php');
include("./navForLogged.php");

$sql = "SELECT a.*, b.*, c.item_so_number FROM lead_details_header_form a inner JOIN lead_details_middle_level_form b ON
 a.record_no=b.record_no inner JOIN lead_details_items c ON  b.record_no = c.record_id";


$result = mysqli_query($con, $sql);

// include("./navForLogged.php");


if ($_SERVER['REQUEST_METHOD'] == "GET") {



    if (isset($_GET["search_query"])) {
        $query = $_GET["search_query"];

        $sql = "SELECT * FROM lead_details_header_form a inner JOIN lead_details_middle_level_form b ON
 a.record_no=b.record_no where a.record_no ='$query' or a.created_by ='$query' or a.form_status='$query' ";

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
    <title>Query Information</title>
</head>

<body>
    <section class="bg-gray-50 dark:bg-gray-900  mt-6 p-3 sm:p-5">
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
                                    placeholder="Search" required="">
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
                            <button id="filterDropdownButton" data-dropdown-toggle="filterDropdown"
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
                                <th scope="col" class="px-6 py-3">Record Number </th>
                                <th scope="col" class="px-6 py-3">item so number </th>
                                <!-- <th scope="col" class="px-6 py-3">Record Number</th> -->
                                <th scope="col" class="px-6 py-3">Created By</th>
                                <th scope="col" class="px-6 py-3">Created Date</th>
                                <th scope="col" class="px-6 py-3">Status</th>
                                <th scope="col" class="px-6 py-3">Lead Source</th>
                                <th scope="col" class="px-6 py-3">Ref By</th>
                                <th scope="col" class="px-6 py-3">Ref Phone Number</th>
                                <th scope="col" class="px-6 py-3">Lead Type</th>
                                <th scope="col" class="px-6 py-3">Contact Person Name</th>
                                <th scope="col" class="px-6 py-3">Contact Person Phone No</th>
                                <th scope="col" class="px-6 py-3">Contact Person Email</th>
                                <!-- <th scope="col" class="px-6 py-3">Contact Person Email</th> -->
                                <th scope="col" class="px-6 py-3">Contact Person Address</th>
                                <th scope="col" class="px-6 py-3">Lead Receiving Date</th>
                                <th scope="col" class="px-6 py-3">Assigned To</th>
                                <th scope="col" class="px-6 py-3">Query Start Date</th>
                                <th scope="col" class="px-6 py-3">Follow Up</th>
                                <th scope="col" class="px-6 py-3">Follow Up Reminder</th>
                                <th scope="col" class="px-6 py-3">No of times</th>
                                <th scope="col" class="px-6 py-3">Query End Date</th>
                                <th scope="col" class="px-6 py-3">Installation required</th>
                                <th scope="col" class="px-6 py-3">Tentative Installation Date</th>
                                <th scope="col" class="px-6 py-3">Tentative Install. Delivery Date</th>
                                <th scope="col" class="px-6 py-3">
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody id="genDataTbody">

                            <!-- <?php

                            $i = 0;
                            while ($row = mysqli_fetch_assoc($result)) {
                                $i++;

                                ?> -->



                                    <!-- <tr class="border-b dark:border-gray-700">
                                    <td class="px-6 py-4">
                                        <?php echo $row['record_no'] ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?php echo $row['item_so_number'] ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?php echo $row['created_by'] ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?php echo $row['created_date'] ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?php echo $row['form_status'] ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?php echo $row['lead_source'] ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?php echo $row['ref_By'] ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?php echo $row['ref_phone_no'] ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?php echo $row['lead_type'] ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?php echo $row['contact_person_name'] ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?php echo $row['contact_person_phone_no'] ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?php echo $row['contact_person_email'] ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?php echo $row['contact_person_address'] ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?php echo $row['lead_received_date'] ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?php echo $row['assigned_to'] ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?php echo $row['query_start_date'] ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?php echo $row['follow_up'] ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?php echo $row['followup_reminder_frequency'] ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?php echo $row['no_of_times'] ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?php echo $row['query_end_date'] ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?php echo $row['installation_required'] ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?php echo $row['tentative_installation'] ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?php echo $row['tentative_delivery_date'] ?>
                                    </td>
                                    <td class="px-6 py-3 flex items-center justify-end">
                                        <button id="apple-imac-27-dropdown-button"
                                            data-dropdown-toggle="apple-imac-27-dropdown"
                                            class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100"
                                            type="button">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                            </svg>
                                        </button>
                                        <div id="apple-imac-27-dropdown"
                                            class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                                aria-labelledby="apple-imac-27-dropdown-button">
                                                <li>
                                                    <a href="#"
                                                        class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Show</a>
                                                </li>
                                                <li>
                                                    <a href="#"
                                                        class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                                </li>
                                            </ul>
                                            <div class="py-1">
                                                <a href="#"
                                                    class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr> -->


                                    <!-- <?php

                            }

                            ?> -->


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>




</body>





<script>


function getTableData(query) {
    $.get("./phpAjax/getDataFormLeadGen.php", { query: query }, function(data) {

        
        console.log(data);

        let resData = data.data

       
        $("#genDataTbody").empty(); 

        resData.forEach(element => {
            $("#genDataTbody").append(`
                <tr class="border-b dark:border-gray-700">
                    <td class="px-6 py-4">${element.record_no}</td>
                    <td class="px-6 py-4">${element.item_so_number}</td>
                    <td class="px-6 py-4">${element.created_by}</td>
                    <td class="px-6 py-4">${element.created_date}</td>
                    <td class="px-6 py-4">${element.form_status}</td>
                    <td class="px-6 py-4">${element.lead_source}</td>
                    <td class="px-6 py-4">${element.ref_By}</td>
                    <td class="px-6 py-4">${element.ref_phone_no}</td>
                    <td class="px-6 py-4">${element.lead_type}</td>
                    <td class="px-6 py-4">${element.contact_person_name}</td>
                    <td class="px-6 py-4">${element.contact_person_phone_no}</td>
                    <td class="px-6 py-4">${element.contact_person_email}</td>
                    <td class="px-6 py-4">${element.contact_person_address}</td>
                    <td class="px-6 py-4">${element.lead_received_date}</td>
                    <td class="px-6 py-4">${element.assigned_to}</td>
                    <td class="px-6 py-4">${element.query_start_date}</td>
                    <td class="px-6 py-4">${element.follow_up}</td>
                    <td class="px-6 py-4">${element.followup_reminder_frequency}</td>
                    <td class="px-6 py-4">${element.no_of_times}</td>
                    <td class="px-6 py-4">${element.query_end_date}</td>
                    <td class="px-6 py-4">${element.installation_required}</td>
                    <td class="px-6 py-4">${element.tentative_installation}</td>
                    <td class="px-6 py-4">${element.tentative_delivery_date}</td>
                </tr>
            `);
        });
    },"json").fail(function(error) {
        console.error('Error fetching data:', error);
        console.error(error.responseText);
    });
}

getTableData();




$("#search_query").on("input",function () {
    
    
    let value = this.value
    
    
    getTableData(value);

    // console.log(value);
    
})









// $(document).ready(function() {
//             $('#search_query').click(function() {
//                 const role = $('#search_query').val(); // Get the value from the input field
//                 getTableData(role); // Pass the input value to getTableData
//             });
//         });



// function getTableData(query) {



//     $.get("/phpAjax/",data,)



//     data.forEach(element => {


//         $("#tbody").append(`


        
        
//         `)

        
//     });


    
// }


// getTableData("Dealer")









</script>


</html>