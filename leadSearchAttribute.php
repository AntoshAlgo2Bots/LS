<?php

session_start();

include("./navForLogged.php");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <title>Document</title>
</head>

<body>

    <div>
        <?php






        // session_start();
        
        if (!isset($_SESSION["username"])) {




            header("location:login.php");




        }




        ?>


    </div>



    <div class="mt-10">

        <h1 class="text-center text-3xl underline mb-5 font-bold">Search Lead Generation Attributes Form</h1>

        <form class="max-w-8xl border p-8 mx-auto rounded-xl border-gray-300 shadow-lg" id="myForm">
            <div class="mb-3">


                <label for="s_no" class="block mb-2 text-xs font-medium text-gray-900 dark:text-white">Serial
                    No</label>
                <input type="text" id="s_no"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-xs mb-2 rounded-lg focus:ring-blue-500 focus:border-blue-500 w-44 p-2"
                    placeholder="" />
                <button type="button" id="search"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xs w-full sm:w-auto px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>


            </div>
            <div class="flex flex-wrap justify-between mt-4" id="inputFields">
                <div class="mb-3">
                    <label for="created_by" class="block mb-2 text-xs font-medium text-gray-900 dark:text-white">Created
                        By</label>
                    <input type="text" name="created_by" value="" id="created_by"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-44 p-2"
                        placeholder="" required readonly />
                </div>
                <div class="mb-3">
                    <label for="created_date"
                        class="block mb-2 text-xs font-medium text-gray-900 dark:text-white">Created
                        Date</label>
                    <input type="date" name="created_date" id="created_date"
                        class="bg-gray-50 border border-gray-300 text-gray-900 mb-2 text-xs rounded-lg focus:ring-1 focus:ring-blue-500 focus:border-blue-500 block w-44 p-2"
                        placeholder="" required readonly />
                </div>
                <div class="mb-3">
                    <label for="lead_source" class="block mb-2 text-xs font-medium text-gray-900 dark:text-white">Lead
                        Source</label>
                    <input type="text" name="lead_source" id="lead_source" readonly
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-44 p-2" />
                </div>
                <div class="mb-3">
                    <label for="lead_type" class="block mb-2 text-xs font-medium text-gray-900 dark:text-white">Lead
                        Type</label>
                    <input type="text" name="lead_type" id="lead_type" readonly
                        class="bg-gray-50 border border-gray-300 text-gray-900 mb-2 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-44 p-2"
                        placeholder="" />
                </div>
                <div class="mb-3">
                    <label for="start_date" class="block mb-2 text-xs font-medium text-gray-900 dark:text-white">Start
                        Date</label>
                    <input type="date" name="start_date" id="start_date" readonly
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-44 p-2"
                        required />
                </div>
                <div class="mb-3">
                    <label for="end_date" class="block mb-2 text-xs font-medium text-gray-900 dark:text-white">End
                        Date</label>
                    <input type="date" name="end_date" id="end_date"
                        class="bg-gray-50 border border-gray-300 text-gray-900 mb-2 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-44 p-2"
                        placeholder="" />
                </div>
            </div>

            <!-- <button type="button" id="addButton"
                class="text-white bg-blue-700 hover:bg-blue-800  focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xs w-full sm:w-auto px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add
                New Input Set</button> -->


        </form>

    </div>
</body>

<script type="text/javascript">
    $(document).ready(function () {
        $('#search').click(function (e) {
            e.preventDefault();
            var srch = $('#s_no').val();

            // Log to confirm the search was triggered
            console.log("Search initiated for:", srch);

            var requestData = {
                srch: srch,
                section: "SearchSection" // Adding the additional parameter
            };

            $.post("leadSearchAttributeAction.php", requestData , function (data) {
                console.log("Response received:", data);

                if (data.success) {
                    $("#created_by").val(data.data.created_by || '');
                    $("#created_date").val(data.data.created_date || '');
                    $("#lead_source").val(data.data.lead_source || '');
                    $("#lead_type").val(data.data.lead_type || '');
                    $("#start_date").val(data.data.start_date || '');

                } else {

                    alert(data.message || "No results found.");
                }
            }, "json").fail(function (error) {
                console.error("Request failed:", error);
                console.error("Request failed:", error.contextType);
                alert("An error occurred while processing your request. Please try again.");
            });
        });


        $('#update').click(function (e) {
            e.preventDefault();
            var srch = $('#s_no').val();
            var updatedData = {
                end_date: $("#end_date").val()
                // updateRow: "updatedRow";
            };

            // Log to confirm the update was triggered
            console.log("Update initiated for:", srch, "with data:", updatedData);

            $.post("leadUpdateAction.php", { srch, updatedData }, function (data) {
                console.log("Update response received:", data);

                if (data.success) {
                    alert("Update successful!");
                } else {
                    alert(data.message || "Update failed.");
                }
            }, "json").fail(function (jqXHR, textStatus, errorThrown) {
                console.error("Update request failed:", textStatus, errorThrown);
                alert("An error occurred while processing your update request. Please try again.");
            });
        });
    });
</script>

</html>