<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Miscellaneous Issue Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 p-4 min-h-screen">
    <?php


    include("../navForLogged.php");



    ?>

    <div class="max-w-7xl mx-auto bg-white rounded-lg shadow-md p-6">
        <h1 class="text-2xl font-bold text-center mb-8 underline">Miscellaneous Issue Form</h1>

        <form id="miscForm" class="space-y-6">
            <!-- Header Form Section -->
            <!-- <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="space-y-2">
                    <label for="poNumber" class="block text-sm font-medium text-gray-700">PO Number:</label>
                    <input type="text" id="poNumber" name="poNumber"
                        class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div class="space-y-2">
                    <label for="vendorCode" class="block text-sm font-medium text-gray-700">Vendor Code:</label>
                    <input type="text" id="vendorCode" name="vendorCode"
                        class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div class="space-y-2">
                    <label for="vendorName" class="block text-sm font-medium text-gray-700">Vendor Name:</label>
                    <input type="text" id="vendorName" name="vendorName"
                        class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
            </div> -->

            <!-- Table Section -->
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">S. No</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Vendor Code</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Vendor Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Item Code</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Item name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Qty</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Unit price</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">total price</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>

                    <!-- Rows will be added here dynamically -->




                    <tbody id="tableBody" class="bg-white divide-y divide-gray-200">

                        <!-- Rows will be added here dynamically -->


                    </tbody>




                </table>
            </div>

            <!-- Button Section -->
            <div class="flex justify-between items-center pt-4">
                <button type="button" id="addRowBtn"
                    class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors">
                    Add New row +
                </button>
                <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors">
                    Submit Now
                </button>
            </div>
        </form>
    </div>

    <script src="../js/jquery.min.js"></script>

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
                "itemCodeInfoForPr": "itemCodeInfoForPr"
            }, function(data) {

                availableTags = JSON.parse(data);

                console.log(availableTags);


                let inputes_item_code = document.querySelectorAll("input[name='item_code']")

                inputes_item_code.forEach(input => {
                    
                    
                                    $(input).autocomplete({
                                        source: availableTags
                                    });
                    
                });

                    console.log(inputes_item_code);


            })

        }
    </script>




    <script>
        function exportToCSV(data, columnName, fileName) {
            // Add the column name as the first row
            const csvData = [
                [columnName], ...data.map(row => [row])
            ];

            // Convert the array into CSV format
            const csvContent = csvData.map(row => row.join(",")).join("\n");

            // Create a Blob from the CSV content
            const blob = new Blob([csvContent], {
                type: "text/csv;charset=utf-8;"
            });

            // Create a link element for downloading the file
            const link = document.createElement("a");

            // Set the download attribute with the provided filename
            link.download = fileName;

            // Create an object URL for the Blob and set it as the href of the link
            link.href = URL.createObjectURL(blob);

            // Append the link to the document, trigger the click, and then remove it
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }




        function calculateTotoal(event) {

            let currentRow = (event.target).closest("tr");


            let qty = currentRow.querySelectorAll("input[name='qty']")
            let unit_price = currentRow.querySelectorAll("input[name='unit_price']")
            let total_price = currentRow.querySelectorAll("input[name='total_price']")


            total_price[0].value = parseInt(qty[0].value) * parseInt(unit_price[0].value);




        }

        function removeRow(event) {


            console.log(this);

            let currentRow = (event.target).closest("tr");
            console.log(currentRow.remove());
        }
        document.addEventListener('DOMContentLoaded', function() {
            const tableBody = document.getElementById('tableBody');

            const addRowBtn = document.getElementById('addRowBtn');
            const form = document.getElementById('miscForm');
            let rowCount = (tableBody.querySelectorAll("tr")).length;

            // Function to create a new row

            function createNewRow() {
                rowCount++;
                const row = document.createElement('tr');
                row.id = `row_${rowCount}`;
                row.className = 'hover:bg-gray-50';

                const fields = ['serialNo', 'vendorCode', 'vendorName', 'itemCode',
                    'itemShortDesc', 'qty', 'slInvetory', 'subInvetory'
                ];




                $("#tableBody").append(`

                  <tr id="row_1" class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">
            ${rowCount}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <input type="text" name="vendorCode"  class="w-full p-1 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm">
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <input type="text" name="vendorName_1"  class="w-full p-1 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm">
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <input type="text" name="item_code"  class="w-full p-1 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm">
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <input type="text" name="item_name"  class="w-full p-1 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm">
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <input type="text" name="qty" onInput="calculateTotoal(event)"  class="w-full p-1 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm">
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <input type="text" name="unit_price" onInput="calculateTotoal(event)"   class="w-full p-1 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm">
                            </td>   
                            <td class="px-6 py-4 whitespace-nowrap">
                                <input type="text" name="total_price"  class="w-full p-1 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm">
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <button type="button" onclick="removeRow(event)" class="text-red-600 hover:text-red-800 focus:outline-none">🗑️</button>
                            </td>
                        </tr>
                
                
                `);


                toSetItemCode()
            }

            // Add initial row
            createNewRow();



            // Add row button click handler
            addRowBtn.addEventListener('click', createNewRow);

            // Form submit handler
            form.addEventListener('submit', function(e) {
                e.preventDefault();

                // Collect form data

                let trows = tableBody.querySelectorAll('tr');
                console.log(trows);


                let data = {
                    creating_reciept_of_miscelinius: "creating_reciept_of_miscelinius",
                    mislinius_items: []

                }



                trows.forEach(row => {
                    let dataObject = {}


                    row.querySelectorAll('input').forEach(input => {
                        dataObject[input.name] = input.value;
                    });

                    data.mislinius_items.push(dataObject);


                })

                console.log(data);



                // AJAX call to submit the form data to the server
                // Replace the following line with your AJAX call


                $.post("ajax/ajaxGrn.php", data,
                    function(data, textStatus, jqXHR) {

                        console.log(data);
                        if (data.success) {
                            console.log('Form submitted successfully');
                            // Clear the form

                            exportToCSV(data.serialNumbers, "serial number", "mislineriusserialnumber")
                            alert("item_success fully created in store")

                            form.reset();
                        }


                    },
                    "json"
                ).fail(error => {
                    console.log(error);
                })



                // Log the form data (replace with your submission logic)




            });
        });
    </script>
</body>

</html>