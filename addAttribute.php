<?php

session_start();

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


        <nav class="bg-white dark:bg-gray-900  w-full z-20 top-0 start-0 border-b border-gray-200 dark:border-gray-600">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
                </a>
                <div>

                    <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">
                        Hello! <?php echo $_SESSION["username"] ?></span>
                </div>
                <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                    <a href="../logout.php" type="button"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Logout</a>
                    <button data-collapse-toggle="navbar-sticky" type="button"
                        class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                        aria-controls="navbar-sticky" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 17 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 1h15M1 7h15M1 13h15" />
                        </svg>
                    </button>
                </div>
                <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
                    <ul
                        class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                        <li>
                            <a href="./dashboard.php"
                                class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500"
                                aria-current="page">Home</a>
                        </li>
                        <!--  <li>
                    <a href="#"
                        class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">About</a>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Services</a>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
                </li> -->
                    </ul>
                </div>
            </div>
        </nav>
    </div>



    <div class="mt-10">

        <h1 class="text-center text-3xl underline mb-5 font-bold">Add Attributes Form</h1>

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
                    <input type="text" name="created_by" value="admin" id="created_by"
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
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-44 p-2" />
                </div>
                <div class="mb-3">
                    <label for="sub_main_name" class="block mb-2 text-xs font-medium text-gray-900 dark:text-white">Sub
                        Main Name</label>
                    <input type="text" name="sub_main_name" id="sub_main_name"
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
                url: 'addAttributeAction.php',
                method: 'POST',
                data: formData,
                processData: false, // Important
                contentType: false, // Important
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