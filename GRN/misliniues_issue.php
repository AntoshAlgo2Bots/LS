<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Serial Number Management</title>
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.4/dist/tailwind.min.css" rel="stylesheet"> -->
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.4/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
        integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
        crossorigin="anonymous" />
    <link
        rel="stylesheet"
        href="https://unpkg.com/@material-tailwind/html@latest/styles/material-tailwind.css" />

    <!-- script -->
    <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/script-name.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link
        rel="stylesheet"
        href="https://unpkg.com/@material-tailwind/html@latest/styles/material-tailwind.css" />


</head>

<body class="bg-gray-100 p-6">
    <?php

            
            include "../navForLogged.php";

       

?>
    <div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg p-6">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Serial Number Management</h2>

        <div>
            <label class="block text-gray-700 mb-2">Name</label>
            <input
                type="text"
                id="userName"
                placeholder="Enter your name"
                required
                class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <hr class="my-10 border-1 shadow	">
        <form id="serialForm" class="grid grid-cols-2 gap-4 mb-6">
            <div>
                <label class="block text-gray-700 mb-2">Serial Number</label>
                <input
                    type="text"
                    id="serialNumber"
                    placeholder="Enter serial number"
                    required
                    class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- <hr class="w-fulls"> -->
            <div>


                <label class="block text-gray-700 mb-2">Item Code</label>
                <input
                    type="text"
                    id="itemCode"
                    placeholder="Enter item code"
                    readonly
                    required
                    class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-gray-700 mb-2">Created date</label>
                <input
                    type="text"
                    id="serialDetails"
                    readonly
                    placeholder="created date"
                    required
                    class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
            </div>
            <div class="col-span-2">
                <button
                    type="submit"
                    class="w-full bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                    Add Serial
                </button>

            </div>





        </form>


        <div>
            <label class="block text-gray-700 mb-2">Select serial from table</label>
            <button
                data-dialog-target="dialog-lg"
                type="button" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
                Show serial table
                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5 12h14"></path>
                    <path d="m12 5 7 7-7 7"></path>
                </svg>
            </button>
        </div>





        <div class="bg-white shadow-sm rounded">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="p-3 text-left">S.No</th>
                        <th class="p-3 text-left">Serial Number</th>
                        <th class="p-3 text-left">Item Code</th>
                        <th class="p-3 text-left">Created Date</th>
                        <th class="p-3 text-left">Action</th>
                    </tr>
                </thead>
                <tbody id="serialBody"></tbody>
            </table>
        </div>

        <div class="w-full">
            <button type="button" id="sendMisCeliniusToInstalltion" class="bg-white mt-4 m-auto hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
                Installation
            </button>
        </div>
    </div>




    <!-- 
    <button
        data-dialog-target="dialog-lg"
        class="rounded-md bg-slate-800 py-2 px-4 border border-transparent text-center text-sm text-white transition-all shadow-md hover:shadow-lg focus:bg-slate-700 focus:shadow-none active:bg-slate-700 hover:bg-slate-700 active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none ml-2" type="button">
        Open Dialog LG
    </button> -->
    <div
        data-dialog-backdrop="dialog-lg"
        data-dialog-backdrop-close="true"
        class="pointer-events-none fixed inset-0 z-[999] grid h-screen w-screen place-items-center bg-black bg-opacity-60 opacity-0 backdrop-blur-sm transition-opacity duration-300">
        <div
            data-dialog="dialog-lg"
            style="max-height: 90%;"
            class="relative m-4 p-4 w-3/5 overflow-scroll ] rounded-lg bg-white shadow-sm">



            <div

                style="height: 90%;    ;"
                class="bg-white p-6  rounded-lg ">

                <h2 class="text-xl font-semibold text-center mb-4">Allocated Data <span id="setTitleOfAllocatedSerial"></span></h2>


                <div


                    style="    max-height: 80%;"

                    class="relative h-full overflow-y-auto shadow-md sm:rounded-lg">
                    <table style="max-height: 100%;" class="w-full  overflow-y-auto text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">

                                    <div class="flex flex-col items-start ">
                                        <br>
                                        <label for="default-checkbox" class="ms-2   text-gray-900 dark:text-gray-300">Select all</label>
                                        <input id="selectAllCheckBox" type="checkbox" value="" class=" m-1  text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
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








            </div>








            <div class="flex shrink-0 flex-wrap items-center pt-4 justify-end">
                <button data-dialog-close="true" class="rounded-md border border-transparent py-2 px-4 text-center text-sm transition-all text-slate-600 hover:bg-slate-100 focus:bg-slate-100 active:bg-slate-100 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button">
                    Cancel
                </button>
                <button id="addSerialToBelow" class="rounded-md bg-green-600 py-2 px-4 border border-transparent text-center text-sm text-white transition-all shadow-md hover:shadow-lg focus:bg-green-700 focus:shadow-none active:bg-green-700 hover:bg-green-700 active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none ml-2" type="button">
                    add serial
                </button>
                <button data-dialog-close="true" class="rounded-md bg-green-600 py-2 px-4 border border-transparent text-center text-sm text-white transition-all shadow-md hover:shadow-lg focus:bg-green-700 focus:shadow-none active:bg-green-700 hover:bg-green-700 active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none ml-2" type="button">
                    Ok
                </button>
            </div>
        </div>
    </div>



    
    <script src="https://code.jquery.com/ui/1.14.0/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.0/themes/base/jquery-ui.css">
    <script>
        function toSetItemCode() {


            var availableTags = [
                "ActionScript",
                "AppleScript",
                "Asp",
                "BASIC",
                "C",
                "C++",
                "Clojure",
                "COBOL",
                "ColdFusion",
                "Erlang",
                "Fortran",
                "Groovy",
                "Haskell",
                "Java",
                "JavaScript",
                "Lisp",
                "Perl",
                "PHP",
                "Python",
                "Ruby",
                "Scala",
                "Scheme"
            ];


            console.log(availableTags);
            $.get("../ajax.php", {
                "getSerialNumber": "itemCodeInfoForPr"
            }, function(data) {

                availableTags = JSON.parse(data);

                console.log(availableTags);


                let inputes_item_code = document.querySelectorAll("#serialNumber")

                inputes_item_code.forEach(input => {


                    $(input).autocomplete({
                        source: availableTags
                    });

                });

                console.log(inputes_item_code);


            })

        }
        toSetItemCode()
    </script>
    <script src="js/mislinuies_issu.js"></script>
    <script>
        let data = {
            name: '',
            row_data: []
        };

        $('#serialForm').on('submit', function(e) {
            e.preventDefault();
            const userName = $('#userName').val();
            const serialNumber = $('#serialNumber').val();
            const itemCode = $('#itemCode').val();
            const serialDetails = $('#serialDetails').val();
            const createdDate = new Date().toLocaleDateString();

            // Update data object only once with name
            if (!data.name) {
                data.name = userName;
            }

            // Add row data
            data.row_data.push([
                data.row_data.length + 1,
                serialNumber,
                itemCode,
                serialDetails,
                createdDate
            ]);

            updateTable();

            // Log to console
            console.log(JSON.stringify(data));

            // Optional: Send to backend with AJAX
            $.ajax({
                url: '/your-backend-endpoint', // Replace with your actual backend endpoint
                type: 'POST',
                contentType: 'application/json',
                data: JSON.stringify(data),
                success: function(response) {
                    console.log('Data sent successfully', response);
                },
                error: function(xhr, status, error) {
                    console.error('Error sending data', error);
                }
            });

            // Reset form
            $('#serialForm')[0].reset();
        });

        function updateTable() {

            let total_number  = document.querySelectorAll("#serialBody tr").length +1

            const serialBody = $('#serialBody');
            // serialBody.empty();
            // data.row_data.forEach((rowData, index) => {

           let  serialNumber = $("#serialNumber").val();
           let  itemCode  =$( "#itemCode").val();
           let  createdTime = $("#serialDetails").val();
                serialBody.append(`
                    <tr serialnumber="${serialNumber}" class="border-b hover:bg-gray-50">
                        <td class="p-3">${total_number}</td>
                        <td class="p-3">${serialNumber}</td>
                        <td class="p-3">${itemCode}</td>
                        <td class="p-3">${createdTime}</td>
                        <td class="p-3">
                            <button 
                                onclick="deleteSerial(event)" 
                                class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition"
                            >
                                Delete
                            </button>
                        </td>
                    </tr>
                `);
            // });
        }
    </script>
</body>

<script src="https://unpkg.com/@material-tailwind/html@latest/scripts/dialog.js"></script>

</html>