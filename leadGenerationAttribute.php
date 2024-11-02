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

        <h1 class="text-center text-3xl underline mb-5 font-bold">Add Lead Generation Attributes Form</h1>

        <form class="max-w-8xl border p-8 mx-auto rounded-xl border-gray-300 shadow-lg" id="myForm">
            <div class="flex flex-wrap justify-between mt-4" id="inputFields">
                <div class="mb-3">
                    <label for="s_no" class="block mb-2 text-xs font-medium text-gray-900 dark:text-white">Serial
                        No</label>
                    <input type="text" id="s_no"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-xs mb-2 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-40 p-2"
                        placeholder="" disabled />
                </div>
                <div class="mb-3">
                    <label for="created_by" class="block mb-2 text-xs font-medium text-gray-900 dark:text-white">Created
                        By</label>
                    <input type="text" name="created_by" value="<?php echo $_SESSION["username"] ?>" id="created_by"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-44 p-2"
                        placeholder="Enter Person Name" required readonly/>
                </div>
                <div class="mb-3">
                    <label for="created_date"
                        class="block mb-2 text-xs font-medium text-gray-900 dark:text-white">Created
                        Date</label>
                    <input type="date" name="created_date" id="created_date"
                        class="bg-gray-50 border border-gray-300 text-gray-900 mb-2 text-xs rounded-lg focus:ring-1 focus:ring-blue-500 focus:border-blue-500 block w-44 p-2"
                        placeholder="" required readonly/>
                </div>
                <div class="mb-3">
                    <label for="lead_source"
                        class="block mb-2 text-xs font-medium text-gray-900 dark:text-white">Lead Source</label>
                    <input type="text" name="lead_source" id="lead_source"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-44 p-2" />
                </div>
                <div class="mb-3">
                    <label for="lead_type" class="block mb-2 text-xs font-medium text-gray-900 dark:text-white">Lead Type</label>
                    <input type="text" name="lead_type" id="lead_type"
                        class="bg-gray-50 border border-gray-300 text-gray-900 mb-2 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-44 p-2"
                        placeholder="" />
                </div>
                <div class="mb-3">
                    <label for="start_date" class="block mb-2 text-xs font-medium text-gray-900 dark:text-white">Start
                        Date</label>
                    <input type="date" name="start_date" id="start_date"
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

            <button type="button" id="addButton"
                class="text-white bg-blue-700 hover:bg-blue-800  focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xs w-full sm:w-auto px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add
                New Input Set</button>

            <div class="flex justify-center">
                <button type="submit"
                    class="block text-white bg-blue-700 hover:bg-blue-800 mt-5 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xs w-full sm:w-auto px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add
                    Attribute</button>
            </div>
        </form>

    </div>
</body>

<script>
    $(document).ready(function () {
        $('#myForm').submit(function (event) {
            event.preventDefault();
            var form = document.getElementById('myForm');
            var formData = new FormData(form);

            $.ajax({
                url: 'leadGenerationAttributeAction.php',
                method: 'POST',
                data: formData,
                processData: false, 
                contentType: false, 
                dataType: "JSON",
                success: function (response) {
                    alert(response.message)
                    console.log(response)
                    // alert('Your form has been sent successfully.');
                },
                error: function (xhr, status, error) {
                    alert('Your form was not sent successfully.');
                    console.error(error);
                }
            });

            form.reset();
        });
    });


    // Add button functionality
    $('#addButton').click(function () {
        var newInputSet = `
                <div class="mb-3">
                    <label for="s_no" class="block mb-2 text-xs font-medium text-gray-900 dark:text-white">Serial
                        No</label>
                    <input type="text" id="s_no"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-xs mb-2 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-40 p-2"
                        placeholder="" disabled />
                </div>
                <div class="mb-3">
                    <label for="created_by" class="block mb-2 text-xs font-medium text-gray-900 dark:text-white">Created
                        By</label>
                    <input type="text" name="created_by" id="created_by"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-44 p-2"
                        placeholder="Enter Person Name" required />
                </div>
                <div class="mb-3">
                    <label for="created_date"
                        class="block mb-2 text-xs font-medium text-gray-900 dark:text-white">Created
                        Date</label>
                    <input type="date" name="created_date" id="created_date"
                        class="bg-gray-50 border border-gray-300 text-gray-900 mb-2 text-xs rounded-lg focus:ring-1 focus:ring-blue-500 focus:border-blue-500 block w-44 p-2"
                        placeholder="" required />
                </div>
                <div class="mb-3">
                    <label for="main_head_name"
                        class="block mb-2 text-xs font-medium text-gray-900 dark:text-white">Main Head
                        Name</label>
                    <input type="text" name="main_head_name" id="main_head_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-44 p-2"
                        required />
                </div>
                <div class="mb-3">
                    <label for="sub_main_name" class="block mb-2 text-xs font-medium text-gray-900 dark:text-white">Sub
                        Main Name</label>
                    <input type="text" name="sub_main_name" id="sub_main_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 mb-2 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-44 p-2"
                        placeholder="" required />
                </div>
                <div class="mb-3">
                    <label for="start_date" class="block mb-2 text-xs font-medium text-gray-900 dark:text-white">Start
                        Date</label>
                    <input type="date" name="start_date" id="start_date"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-44 p-2"
                        required />
                </div>
                <div class="mb-3">
                    <label for="end_date" class="block mb-2 text-xs font-medium text-gray-900 dark:text-white">End
                        Date</label>
                    <input type="date" name="end_date" id="end_date"
                        class="bg-gray-50 border border-gray-300 text-gray-900 mb-2 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-44 p-2"
                        placeholder="" required />
                </div>`;
        $('#inputFields').append(newInputSet);
    });


    // Added By Antosh Kumar Pandey Date 23-10-2024 Time - 14:18
    function setCurrentDate() {
        const now = new Date();

        // Format the date to YYYY-MM-DD
        const year = now.getFullYear();
        const month = String(now.getMonth() + 1).padStart(2, '0'); // Months are 0-indexed
        const day = String(now.getDate()).padStart(2, '0');

        const formattedDate = `${year}-${month}-${day}`;
        document.getElementById('created_date').value = formattedDate;
    }

    // Set the current date when the page loads
    window.onload = setCurrentDate;

</script>

</html>