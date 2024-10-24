<?php include('./navbar.php') ?>


<?php

include('./dbconnection/db.php');

date_default_timezone_set("Asia/Kolkata");

$currentDateTime = date('Y-m-d H:i:s');


$sql = "SELECT * FROM lead_details_middle_level_form where id=54";


$result = mysqli_query($con, $sql);



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.0/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.14.0/jquery-ui.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="./js/jquery-3.7.1.min.js"></script>

    <title>te Lead Information</title>
</head>

<script>
    function addRow() {
        const container = document.getElementById("itemRows");
        const row = document.createElement("div");
        row.className = "flex flex-wrap items-center gap-x-5 w-full p-2 rounded-lg mt-2";
        row.innerHTML = `  <div>
                            <input id="default-checkbox" type="checkbox" value=""
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:border-gray-600">
                        </div>
                        <div>
                            <label class="block text-sm">S. No : </label>
                            <input type="text" name="item_serial_no"
                                class="w-12 rounded-md border text-xs border-gray-500 bg-white py-2 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                style="border-color: #C8A1E0;" /><br>
                        </div>
                        <div class="flex items-end gap-x-2">
                            <div>
                                <label class="block text-sm">Item Name : </label>
                                <input type="text" name="item_name" id="item_name"
                                    class="md:w-32 w-40 rounded-md border text-xs border-gray-500 bg-white py-2 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                    style="border-color: #C8A1E0;" /><br>
                            </div>
                            <div>
                                <button type="button" id="getPriceBtn"
                                    class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-1 focus:ring-gray-100 font-medium rounded-lg text-xs px-2 py-1 ">Get
                                    Price</button>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm">Item Qty : </label>
                            <input type="number" name="item_qty" id="item_qty"
                                class="w-24 rounded-md border text-xs border-gray-500 bg-white text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                style="border-color: #C8A1E0;" oninput="calculateTotal()" /><br>
                        </div>
                        <div>
                            <label class="block text-sm">Rate : </label>
                            <input type="number" name="item_rate" id="item_rate"
                                class="w-24 rounded-md border text-xs border-gray-500 bg-white text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                style="border-color: #C8A1E0;" oninput="calculateTotal()" readonly/><br>
                        </div>
                        <div>
                            <label class="block text-sm">Total : </label>
                            <input type="number" name="item_total" id="item_total"
                                class="w-28 rounded-md border text-xs border-gray-500 bg-white text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                style="border-color: #C8A1E0;" readonly /><br>
                        </div>

                        <div>

                            <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                                class="text-gray-900 mt-5  focus:outline-none border border-gray-900 px-1  font-medium rounded-lg text-xs py-1 text-center"
                                type="button">if Ship another address </button>
                        </div>
                        <div class="w-28 h-24 border border-gray-900 rounded-md">
                            <img class="w-28 h-24 rounded-md" src="" id="ImagePreview" alt="image preview">
                        </div>

                        <div>
                            <label class="block text-sm">SO Number : </label>
                            <input type="number" name="item_so_number"
                                class="w-24 rounded-md border text-xs border-gray-500 bg-white text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                style="border-color: #C8A1E0;" /><br>
                        </div>
                        <div>
                            <label class="block text-sm">Created By : </label>
                            <input type="text" name="created_by"
                                class="w-28 rounded-md border text-xs border-gray-500 bg-white text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                style="border-color: #C8A1E0;" /><br>
                        </div>
                        <div>
                            <label class="block text-sm">Status : </label>
                            <input type="text" name="status" value="SAVE"
                                class="w-24 rounded-md border text-xs border-gray-500 bg-white text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                style="border-color: #C8A1E0;" readonly/><br>
                        </div>
            `;
        container.appendChild(row);
    }

    function removeRow(button) {
        const row = button.parentElement.parentElement;
        row.remove();
    }
</script>
<script>
    function addRow1() {
        const container = document.getElementById("itemRows1");
        const row = document.createElement("div");
        row.className = "flex flex-wrap items-center gap-x-5 w-full p-2 rounded-lg mt-2";
        row.innerHTML = `
                <div>
                            <input id="default-checkbox" type="checkbox" value=""
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:border-gray-600">
                        </div>
                        <div>
                            <label class="block text-sm">S. No : </label>
                            <input type="text" name="item_serial_no"
                                class="w-12 rounded-md border text-xs border-gray-500 bg-white py-2 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                style="border-color: #C8A1E0;" /><br>
                        </div>
                        <div>
                            <label class="block text-sm">Item Name : </label>
                            <input type="text" name="item_name"
                                class="md:w-32 w-40 rounded-md border text-xs border-gray-500 bg-white py-2 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                style="border-color: #C8A1E0;" /><br>
                        </div>
                        <div>
                            <label class="block text-sm">Item Qty : </label>
                            <input type="number" name="item_qty"
                                class="w-24 rounded-md border text-xs border-gray-500 bg-white text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                style="border-color: #C8A1E0;" /><br>
                        </div>
                        <div>
                            <label class="block text-sm">Rate : </label>
                            <input type="number" name="item_rate"
                                class="w-24 rounded-md border text-xs border-gray-500 bg-white text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                style="border-color: #C8A1E0;" /><br>
                        </div>
                        <div>
                            <label class="block text-sm">Total : </label>
                            <input type="number" name="item_total"
                                class="w-28 rounded-md border text-xs border-gray-500 bg-white text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                style="border-color: #C8A1E0;" /><br>
                        </div>

                        <div>

                            <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                                class="text-gray-900 mt-5  focus:outline-none border border-gray-900 px-1  font-medium rounded-lg text-xs py-1 text-center"
                                type="button">if Ship another address </button>
                        </div>
                        <div class="w-28 h-24 border border-gray-900 rounded-md">
                            <img class="w-28 h-24 rounded-md" src="./images.png" alt="image preview">
                        </div>

                        <div>
                            <label class="block text-sm">SO Number : </label>
                            <input type="number" name="item_so_number"
                                class="w-24 rounded-md border text-xs border-gray-500 bg-white text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                style="border-color: #C8A1E0;" /><br>
                        </div>
                        <div>
                            <label class="block text-sm">Created By : </label>
                            <input type="text" name="createdBy"
                                class="w-28 rounded-md border text-xs border-gray-500 bg-white text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                style="border-color: #C8A1E0;" /><br>
                        </div>
                        <div>
                            <label class="block text-sm">Status : </label>
                            <input type="text" name="status"
                                class="w-24 rounded-md border text-xs border-gray-500 bg-white text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                style="border-color: #C8A1E0;" /><br>
                        </div>
                        <div>
                    <button type="button" onclick="removeRow(this)" class="text-red-600">Remove</button>
                </div>
            `;
        container.appendChild(row);
    }

    function removeRow1(button) {
        const row = button.parentElement.parentElement;
        row.remove();
    }
</script>

<script>
    function calculateTotal() {
        const qty = document.getElementById('item_qty').value || 0;
        const rate = document.getElementById('item_rate').value || 0;
        const total = qty * rate;

        document.getElementById('item_total').value = total.toFixed(2); // Format to 2 decimal places
    }
</script>

<body>

    <div class="mx-10" style="margin-top: 2rem">
        <h1 class="text-3xl font-bold  underline text-center">Create Lead Details Form</h1>
        <form action="" method="post" id="myForm">
            <h1 id="statusBar"></h1>
            <fieldset class="flex gap-x-10 border-2 border-gray-300 px-5 rounded-lg">
                <legend class="font-bold">Person Information</legend>
                <fieldset class="md:w-3/6 border-2 border-gray-300 p-5 rounded-lg mb-5">
                    <legend class="font-bold"> Information</legend>
                    <div class="flex flex-wrap gap-x-10 justify-center">

                        <div class="flex items-center">
                            <div>

                                <label for="record_no" class="block mb-2 text-sm font-bold text-gray-900">Record Number
                                    :
                                </label>
                                <input type="text" id="record_no" name="record_no"
                                    class="border mb-4 border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-52 p-1.5"
                                    placeholder="Auto Generated" disabled />
                            </div>
                            <!-- <div>

                                <button type="submit"
                                    class="p-2.5 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                    </svg>
                                    <span class="sr-only">Search</span>
                                </button>
                            </div> -->
                        </div>
                        <div>
                            <label for="created_by" class="block mb-2 text-sm font-bold text-gray-900">Created By
                                :
                            </label>
                            <input type="text" id="created_by" name="created_by" value="<?php echo $_SESSION["username"] ?>"
                                class="border mb-4 border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-52 p-1.5"
                                placeholder="Get Data" disabled />
                        </div>
                        <div>
                            <label for="created_date" class="block mb-2 text-sm font-bold text-gray-900">Created
                                Date :
                            </label>
                            <input type="datetime-local" id="created_date" name="created_date" value="<?php echo $currentDateTime; ?>"
                                class="border mb-4 border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-52 p-1.5"
                                placeholder="" disabled />
                        </div>
                        <div>
                            <label for="status" class="block mb-2 text-sm font-bold text-gray-900">Status :
                            </label>
                            <input type="text" id="form_status" name="form_status"
                                class="border mb-4 border-gray-900 text-gray-900 mb-5 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-52 p-1.5"
                                placeholder="" disabled />
                        </div>
                        <!-- <div>
                            <button
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-8 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Disqualified</button>
                        </div> -->
                    </div>
                </fieldset>
                <fieldset class="md:w-5/6 border-2 border-gray-300 p-4 rounded-lg mb-5">
                    <legend class="font-bold">Lead Information</legend>
                    <div class="flex flex-wrap gap-x-10 justify-center">
                        <div>
                            <label for="lead_source" class="block mb-2 text-sm font-bold text-gray-900">Lead Source :
                            </label>
                            <select id="lead_source" name="lead_source" onchange="verifyAnswer()"
                                class=" border mb-4 border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-52 p-1.5">
                                <option selected disabled hidden>Choose Lead</option>
                                <option value="Email">Email</option>
                                <option value="Direct_other">Direct-other</option>
                                <option value="References">References</option>
                            </select>
                        </div>
                        <div>
                            <label for="contact_person_details" class="block mb-2 text-sm font-bold text-gray-900">Ref
                                By : </label>
                            <input type="text" id="ref_By" name="ref_By"
                                class="border mb-4 border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-52 p-1.5"
                                placeholder="" />
                        </div>
                        <div>
                            <label for="contact_person_details" class="block mb-2 text-sm font-bold text-gray-900">Ref
                                Phone No : </label>
                            <input type="number" id="ref_phone_no" name="ref_phone_no"
                                class="border mb-4 border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-52 p-1.5"
                                placeholder="" />
                        </div>
                        <div>
                            <label for="lead_type" class="block mb-2 text-sm font-bold text-gray-900">Lead Type :
                            </label>
                            <select id="lead_type" name="lead_type"
                                class=" border mb-4 border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-52 p-1.5">
                                <option selected>Choose Lead Type</option>
                                <option value="Dealer">Dealer</option>
                                <option value="Distributor">Distributor</option>
                                <option value="Retailer">Retailer</option>
                                <option value="Individual">Individual</option>
                            </select>
                        </div>
                        <div>
                            <label for="contact_person_details"
                                class="block mb-2 text-sm font-bold text-gray-900">Contact
                                Person Name : </label>
                            <input type="text" id="contact_person_name" name="contact_person_name"
                                class="border mb-4 border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-52 p-1.5"
                                placeholder="Person name" required />
                        </div>
                        <div>
                            <label for="contact_person_details"
                                class="block mb-2 text-sm font-bold text-gray-900">Contact
                                Person Phone No : </label>
                            <input type="number" maxlength="10" onchange="validateInput()" id="contact_person_phone_no"
                                maxlength="10" name="contact_person_phone_no"
                                class="border mb-4 border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-52 p-1.5"
                                placeholder="Person Phone no" required />
                        </div>
                        <div>
                            <label for="contact_person_details"
                                class="block mb-2 text-sm font-bold text-gray-900">Contact
                                Person Email : </label>
                            <input type="email" id="contact_person_email" name="contact_person_email"
                                class="border mb-4 border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-52 p-1.5"
                                placeholder="Person Email" required />
                        </div>
                        <div>
                            <label for="contact_person_details"
                                class="block mb-2 text-sm font-bold text-gray-900">Contact
                                Person Address : </label>
                            <input type="text" id="contact_person_address" name="contact_person_address"
                                class="border mb-4 border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-52 p-1.5"
                                placeholder="Person Address" required />
                        </div>
                        <div>
                            <label for="query_received_date" class="block mb-2 text-sm font-bold text-gray-900">Lead
                                Receiving Date : </label>
                            <input type="date" id="lead_received_date" name="lead_received_date"
                                class="border mb-4 border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-52 p-1.5"
                                placeholder="" required />
                        </div>

                    </div>
                </fieldset>

            </fieldset>
            <div class="flex justify-center mt-4">
                <button type="submit" id="getData"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-8 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Save
                    Now</button>
            </div>
        </form>


    </div>


    <div class="mx-10 mt-4">
        <form action="./phpAjax/leadHeaderAjax.php" method="post" id="query_info_form">
            <fieldset class="border-2 border-gray-300 p-5 rounded-lg ">
                <legend class="font-bold">Query Information</legend>
                <div class="flex flex-wrap gap-x-16 md:mx-8">
                    <div>
                        <label for="assigned_to" class="block mb-2 text-sm font-bold text-gray-900">Assigned To :
                        </label>
                        <input type="text" id="assigned_to" name="assigned_to"
                            class="border mb-4 border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-52 p-1.5"
                            placeholder="" required/>
                    </div>

                    <div>
                        <label for="query_start_date" class="block mb-2 text-sm font-bold text-gray-900">Query Start
                            Date : </label>
                        <input type="date" id="query_start_date" name="query_start_date"
                            class="border mb-4 border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-52 p-1.5"
                            placeholder="" required />
                    </div>

                    <!-- 
                    <div>
                        <label for="re_query" class="block mb-2 text-sm font-bold text-gray-900">Re-query : </label>
                        <select id="countries" name="re_query"
                            class=" border mb-4 border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-52 p-1.5">
                            <option selected>Choose one</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div> -->

                    <div>
                        <label for="" class="block mb-2 text-sm font-bold text-gray-900">Follow Up :
                            <button data-modal-target="default-modal" data-modal-toggle="default-modal"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 ml-3 py-0.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                type="button">
                                Add Deatils
                            </button>

                        </label>
                        <select id="follow_up" name="follow_up" required
                            class=" border mb-4 border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-52 p-1.5">
                            <option selected disabled hidden>Choose One</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div>
                        <label for="followup_reminder_frequency" name="followup_reminder_frequency"
                            class="block mb-2 text-sm font-bold text-gray-900">Follow Up Reminder (In days) : </label>
                        <input type="date" id="followup_reminder_frequency" name="followup_reminder_frequency"
                            class="border mb-4 border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-52 p-1.5"
                            placeholder="" required />
                    </div>
                    <div>
                        <label for="no_of_times" class="block mb-2 text-sm font-bold text-gray-900">No of times :
                        </label>
                        <input type="number" name="no_of_times" id="no_of_times"
                            class="border mb-4 border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-52 p-1.5"
                            placeholder="" required />
                    </div>
                    <!-- <div>
                        <label for="re_query_closure_date" class="block mb-2 text-sm font-bold text-gray-900">Re-query
                            closure Date : </label>
                        <input type="date" name="re_query_closure_date"
                            class="border mb-4 border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-52 p-1.5"
                            placeholder="" required />
                    </div> -->
                    <!-- <div>
                        <label for="re_query_end_date" class="block mb-2 text-sm font-bold text-gray-900">Re-query End
                            Date : </label>
                        <input type="date" name="re_query_end_date"
                            class="border mb-4 border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-52 p-1.5"
                            placeholder="" required />
                    </div>   -->
                    <div>
                        <label for="query_end_date" class="block mb-2 text-sm font-bold text-gray-900">Query End Date :
                        </label>
                        <input type="date" id="query_end_date" name="query_end_date"
                            class="border mb-4 border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-52 p-1.5"
                            placeholder="" required />
                    </div>
                    <div>
                        <label for="installation_required"
                            class="block mb-2 text-sm font-bold text-gray-900">Installation
                            required :
                        </label>
                        <select id="installation_required" name="installation_required"
                            onchange="installationRequired()"
                            class=" border mb-4 border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-52 p-1.5">
                            <option selected disabled hidden>Choose one</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div>
                        <label for="tentative_installation" class="block mb-2 text-sm font-bold text-gray-900">Tentative
                            Installation Date :
                        </label>
                        <input type="date" name="tentative_installation" id="tentative_installation"
                            class="border mb-4 border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-52 p-1.5"
                            placeholder="" required disabled />
                    </div>
                    <div>
                        <label for="tentative_delivery_date"
                            class="block mb-2 text-sm font-bold text-gray-900">Tentative
                            Install. Delivery Date:
                        </label>
                        <input type="date" name="tentative_delivery_date" id="tentative_delivery_date"
                            class="border mb-4 border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-52 p-1.5"
                            placeholder="" required />
                    </div>
                </div>
                <!-- <div>
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-8 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Disqualified</button>
                </div> -->
                <div>



                    <!-- <div class="relative md:mx-8 mt-4">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">S No</th>
                                    <th scope="col" class="px-6 py-3">Record Number</th>
                                    <th scope="col" class="px-6 py-3">Assigned To</th>
                                    <th scope="col" class="px-6 py-3">Query Start Date</th>
                                    <th scope="col" class="px-6 py-3">Follow Up</th>
                                    <th scope="col" class="px-6 py-3">Follow Up Reminder</th>
                                    <th scope="col" class="px-6 py-3">No of times</th>
                                    <th scope="col" class="px-6 py-3">Query End Date</th>
                                    <th scope="col" class="px-6 py-3">Installation required</th>
                                    <th scope="col" class="px-6 py-3">Tentative Installation Date</th>
                                    <th scope="col" class="px-6 py-3">Tentative Install. Delivery Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $i = 0;
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $i++;

                                    ?>

                                    <tr class="border-b dark:border-gray-700">
                                        <td class="px-6 py-4">
                                            <?php echo $row['id'] ?>
                                        </td>
                                        <td class="px-6 py-4">
                                            <?php echo $row['record_no'] ?>
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

                                    </tr>





                                    <?php
                                }

                                ?>
                            </tbody>
                        </table>
                    </div> -->

                </div>
                <div class="flex justify-center mt-4">
                    <!-- <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-8 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Update
                        Details</button> -->
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-8 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Save
                        Now</button>
                </div>
            </fieldset>

            <!-- Main modal -->
            <div id="default-modal" tabindex="-1" aria-hidden="true"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-2xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div
                            class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Follow Up Details
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="default-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <form class="p-4 md:p-5 w-full m-auto border border-gray-700"
                            action="./phpAJax/LeadFollowupForm.php" id="followup_forms" method="post">
                            <div class="sm:ml-10 ">
                                <div>

                                    <label for="serial_no" class="block mb-2 text-sm font-bold text-gray-900">Serial No
                                        :
                                    </label>
                                    <input type="text" id="serial_no" name="serial_no"
                                        class="border mb-4 border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-60 p-1.5"
                                        placeholder="Auto Generated" disabled />
                                </div>
                            </div>
                            <hr class="border-b border-gray-400">
                            <div class="flex flex-wrap gap-x-10 justify-center mt-4">
                                <div>
                                    <label for="follow_up_start_date"
                                        class="block mb-2 text-sm font-bold text-gray-900"> Follow up Start Date
                                        :
                                    </label>
                                    <input type="date" id="follow_up_start_date" name="follow_up_start_date"
                                        class="border mb-4 border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-60 p-1.5"
                                        placeholder="" />
                                </div>
                                <div>
                                    <label for="follow_up_end_date"
                                        class="block mb-2 text-sm font-bold text-gray-900">Follow up End Date :
                                    </label>
                                    <input type="date" id="follow_up_end_date" name="follow_up_end_date"
                                        class="border mb-4 border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-60 p-1.5"
                                        placeholder="" />
                                </div>
                                <div>
                                    <label for="remarks" class="block mb-2 text-sm font-bold text-gray-900">Remarks :
                                    </label>
                                    <input type="text" id="remarks" name="remarks"
                                        class="border mb-4 border-gray-900 text-gray-900 mb-5 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-60 p-1.5"
                                        placeholder="" />
                                </div>
                                <div>
                                    <label for="remind_date" class="block mb-2 text-sm font-bold text-gray-900">Remind
                                        Date :
                                    </label>
                                    <input type="date" id="remind_date" name="remind_date"
                                        class="border mb-4 border-gray-900 text-gray-900 mb-5 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-60 p-1.5"
                                        placeholder="" />
                                </div>
                            </div>
                            <!-- Modal footer -->
                            <div
                                class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                <button data-modal-hide="default-modal" type="button" id="followupSubmitBtn"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-1 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                                <button data-modal-hide="default-modal" type="button"
                                    class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-1 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </form>
        <fieldset class="p-5 border-2 rounded-md border-gray-300 mt-5">
            <legend class="font-bold">Item Information</legend>
            <div class="flex justify-between flex-wrap">
                <div class="w-full">
                    <div>
                        <input type="radio" name="goods" checked id="">
                        <span class="text-xs font-bold">Finish Goods</span>
                    </div>

                    <form id="itemRows"
                        class="flex flex-wrap items-center border gap-x-5 border-gray-900 w-full p-2 rounded-lg mt-2">
                        <div>
                            <input id="default-checkbox" type="checkbox" value=""
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:border-gray-600">
                        </div>
                        <div>
                            <label class="block text-sm">S. No : </label>
                            <input type="text" name="item_serial_no"
                                class="w-12 rounded-md border text-xs border-gray-500 bg-white py-2 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                style="border-color: #C8A1E0;" /><br>
                        </div>
                        <div class="flex items-end gap-x-2">
                            <div>
                                <label class="block text-sm">Item Name : </label>
                                <input type="text" name="item_name" id="item_name"
                                    class="md:w-32 w-40 rounded-md border text-xs border-gray-500 bg-white py-2 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                    style="border-color: #C8A1E0;" /><br>
                            </div>
                            <div>
                                <button type="button" id="getPriceBtn"
                                    class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-1 focus:ring-gray-100 font-medium rounded-lg text-xs px-2 py-1 ">Get
                                    Price</button>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm">Item Qty : </label>
                            <input type="number" name="item_qty" id="item_qty"
                                class="w-24 rounded-md border text-xs border-gray-500 bg-white text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                style="border-color: #C8A1E0;" oninput="calculateTotal()" /><br>
                        </div>
                        <div>
                            <label class="block text-sm">Rate : </label>
                            <input type="number" name="item_rate" id="item_rate"
                                class="w-24 rounded-md border text-xs border-gray-500 bg-white text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                style="border-color: #C8A1E0;" oninput="calculateTotal()" readonly /><br>
                        </div>
                        <div>
                            <label class="block text-sm">Total : </label>
                            <input type="number" name="item_total" id="item_total"
                                class="w-28 rounded-md border text-xs border-gray-500 bg-white text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                style="border-color: #C8A1E0;" readonly /><br>
                        </div>

                        <div>

                            <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                                class="text-gray-900 mt-5  focus:outline-none border border-gray-900 px-1  font-medium rounded-lg text-xs py-1 text-center"
                                type="button">if Ship another address </button>
                        </div>
                        <div class="w-28 h-24 border border-gray-900 rounded-md">
                            <img class="w-28 h-24 rounded-md" src="" id="ImagePreview" alt="image preview">
                        </div>

                        <div>
                            <label class="block text-sm">SO Number : </label>
                            <input type="number" name="item_so_number"
                                class="w-24 rounded-md border text-xs border-gray-500 bg-white text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                style="border-color: #C8A1E0;" /><br>
                        </div>
                        <div>
                            <label class="block text-sm">Created By : </label>
                            <input type="text" name="created_by"
                                class="w-28 rounded-md border text-xs border-gray-500 bg-white text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                style="border-color: #C8A1E0;" /><br>
                        </div>
                        <div>
                            <label class="block text-sm">Status : </label>
                            <input type="text" name="status" value="SAVE"
                                class="w-24 rounded-md border text-xs border-gray-500 bg-white text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                style="border-color: #C8A1E0;" readonly /><br>
                        </div>
                        <div>
                            <!-- <button
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-1.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                type="button">
                                Create SO
                            </button> -->
                        </div>
                    </form>
                    <!-- <div class="mt-3">
                        <button data-modal-target="extralarge-modal" data-modal-toggle="extralarge-modal"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-1.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            type="button">
                            Update BOM
                        </button>
                    </div> -->

                    <div class="flex gap-x-3">
                        <div class="mt-2">
                            <button type="button" onclick="addRow()"
                                class="text-gray-900 focus:outline-none border border-gray-900 px-2 font-medium rounded-lg text-xs py-1 text-center">Add
                                Item</button>
                        </div>
                        <div class="mt-2">
                            <button type="submit" id="rowSubmitBtn" onclick="submitForm()"
                                class="text-gray-900 focus:outline-none border border-gray-900 px-2 font-medium rounded-lg text-xs py-1 text-center">Submit</button>
                        </div>
                    </div>
                    <!-- <div class="block">
                        <div id="finish_field"></div>
                    </div>
                    <div class="mt-2"><button onclick="finish_field()"
                            class="text-gray-900  focus:outline-none border border-gray-900 px-2  font-medium rounded-lg text-xs py-1 text-center"
                            type="button">Add Items</button>
                        <button onclick="remove_finish_field()" id="remove_btn"
                            class="text-gray-900  focus:outline-none border border-gray-900 px-2  font-medium rounded-lg text-xs py-1 text-center"
                            type="button">Remove Items</button>

                    </div> -->

                    <div class=" border-t border-gray-900 mt-4 pt-2">
                        <div>
                            <input type="radio" name="goods" onclick="radio_btn()">
                            <span class="text-xs font-bold">Raw Material</span>
                        </div>

                        <div class="border border-gray-900 w-full p-2 rounded-lg mt-2" id="raw_section"
                            style="display: none;">
                            <div class="flex flex-wrap items-center gap-x-5" id="itemRows1">
                                <div>
                                    <input id="default-checkbox" type="checkbox" value=""
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:border-gray-600">
                                </div>
                                <div>
                                    <label class="block text-sm">S. No : </label>
                                    <input type="text" name="item_serial_no"
                                        class="w-12 rounded-md border text-xs border-gray-500 bg-white py-2 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                        style="border-color: #C8A1E0;" /><br>
                                </div>
                                <div class="flex items-end gap-x-2">
                                    <div>
                                        <label class="block text-sm">Item Name : </label>
                                        <input type="text" name="item_name" id="item_name1"
                                            class="md:w-32 w-40 rounded-md border text-xs border-gray-500 bg-white py-2 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                            style="border-color: #C8A1E0;" /><br>
                                    </div>
                                    <div>
                                        <button type="button" id="getPriceBtn1"
                                            class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-1 focus:ring-gray-100 font-medium rounded-lg text-xs px-2 py-1 ">Get
                                            Price</button>
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-sm">Item Qty : </label>
                                    <input type="number" name="item_qty" id="item_qty"
                                        class="w-24 rounded-md border text-xs border-gray-500 bg-white text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                        style="border-color: #C8A1E0;" oninput="calculateTotal(this)" /><br>
                                </div>
                                <div>
                                    <label class="block text-sm">Rate : </label>
                                    <input type="number" name="item_rate" id="item_rate1"
                                        class="w-24 rounded-md border text-xs border-gray-500 bg-white text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                        style="border-color: #C8A1E0;" oninput="calculateTotal(this)" readonly /><br>
                                </div>
                                <div>
                                    <label class="block text-sm">Total : </label>
                                    <input type="number" name="item_total" id="item_total"
                                        class="w-28 rounded-md border text-xs border-gray-500 bg-white text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                        style="border-color: #C8A1E0;" readonly /><br>
                                </div>
                                <div>

                                    <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                                        class="text-gray-900 mt-5  focus:outline-none border border-gray-900 px-1  font-medium rounded-lg text-xs py-1 text-center"
                                        type="button">if Ship another address </button>
                                </div>
                                <div class="w-28 h-24 border border-gray-900 rounded-md">
                                    <img class="w-28 h-24 rounded-md" src="" id="ImagePreview1" alt="image preview">
                                </div>

                                <div>
                                    <label class="block text-sm">SO Number : </label>
                                    <input type="number" name="item_so_number"
                                        class="w-24 rounded-md border text-xs border-gray-500 bg-white text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                        style="border-color: #C8A1E0;" /><br>
                                </div>
                                <div>
                                    <label class="block text-sm">Created By : </label>
                                    <input type="text" name="item_so_number"
                                        class="w-28 rounded-md border text-xs border-gray-500 bg-white text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                        style="border-color: #C8A1E0;" /><br>
                                </div>
                                <div>
                                    <label class="block text-sm">Status : </label>
                                    <input type="text" name="status"
                                        class="w-24 rounded-md border text-xs border-gray-500 bg-white text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                        style="border-color: #C8A1E0;" /><br>
                                </div>
                                <div>
                                    <!-- <button
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-1.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                        type="button">
                                        Create SO
                                    </button> -->
                                </div>
                            </div><br>
                        </div>


                        <!-- Main modal -->
                        <div id="crud-modal" tabindex="-1" aria-hidden="true"
                            class="overflow-y-auto overflow-x-hidden hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-md max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white  rounded-lg shadow">
                                    <!-- Modal header -->
                                    <div
                                        class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                        <h3 class="text-lg font-semibold text-gray-900 ">
                                            Add Shipping Address
                                        </h3>
                                        <button type="button"
                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-toggle="crud-modal">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <form class="p-4 md:p-5">
                                        <div class="grid gap-4 mb-4 grid-cols-2 pb-5">
                                            <div class="col-span-2 w-3/4 m-auto mt-3">
                                                <label for="" class="block mb-2 text-sm font-medium text-gray-900">User
                                                    Name : </label>
                                                <input type="text" name="user_name" id=""
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:border-gray-500 dark:placeholder-gray-400 dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    required="">
                                            </div>
                                            <div class="col-span-2 w-3/4 m-auto">
                                                <label for="" class="block mb-2 text-sm font-medium text-gray-900">User
                                                    Address : </label>
                                                <input type="text" name="user_address" id=""
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:border-gray-500 dark:placeholder-gray-400 dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    required="">
                                            </div>
                                            <div class="col-span-2 w-3/4 m-auto">
                                                <label for="" class="block mb-2 text-sm font-medium text-gray-900">User
                                                    Email : </label>
                                                <input type="text" name="user_email" id=""
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:border-gray-500 dark:placeholder-gray-400  dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    required="">
                                            </div>
                                            <div class="col-span-2 w-3/4 m-auto">
                                                <label for="name"
                                                    class="block mb-2 text-sm font-medium text-gray-900">User
                                                    Phone Number : </label>
                                                <input type="text" name="user_phone_no" id=""
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:border-gray-500 dark:placeholder-gray-400 darkdark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    required="">
                                            </div>
                                            <div class="col-span-2 w-3/4 m-auto flex justify-center mt-3">
                                                <button
                                                    class="focus:outline-none font-medium border border-gray-900 px-5 py-3  font-medium rounded-lg text-xs py-1 text-center"
                                                    type="button">Add Address</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>

                        <div id="add_btn" style="display: none;">
                            <!-- <div>
                                <div id="raw_field"></div>
                            </div>
                            <div class="mt-2">
                                <button onclick="raw_field()"
                                    class="focus:outline-none font-medium border border-gray-900 px-2  font-medium rounded-lg text-xs py-1 text-center"
                                    type="button">Add Items</button>
                                <button id="raw_remove"
                                    class=" focus:outline-none font-medium border border-gray-900 px-2  font-medium rounded-lg text-xs py-1 text-center"
                                    type="button">Remove Items</button>
                            </div> -->
                            <div class="flex gap-x-3">
                                <div class="mt-2">
                                    <button type="button" onclick="addRow1()"
                                        class="text-gray-900 focus:outline-none border border-gray-900 px-2 font-medium rounded-lg text-xs py-1 text-center">Add
                                        Item</button>
                                </div>
                                <div class="mt-2">
                                    <button type="submit"
                                        class="text-gray-900 focus:outline-none border border-gray-900 px-2 font-medium rounded-lg text-xs py-1 text-center">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="w-40 h-40 mt-5 border border-gray-900 rounded-md">
                    <img src="" alt="item preview">
                </div> -->
            </div>


            <!-- <div class="flex justify-center mt-4">
                <button type="button" id=""
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-8 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Save
                    Now</button>
            </div> -->

        </fieldset>




        <div class="relative overflow-x-auto mt-4 mb-5">
            <!-- <table class="w-full text-sm text-left rtl:text-right text-gray-500 border border-gray-700 ">
                <thead class="text-xs text-gray-700 whitespace-nowrap uppercase bg-gray-50 border-b border-gray-900">
                    <tr>

                        <th scope="col" class="px-6 py-3">
                            Created By
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Created Lead
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Record Number
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Contact Person Deatils
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Lead Source
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Lead Type
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Assigned To
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Query Received Date
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Query Start Date
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Query End Date
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Follow Up
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Re-query
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Re-query closure Date
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Re-query End Date
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            admin
                        </th>
                        <td class="px-6 py-4">
                            user
                        </td>
                        <td class="px-6 py-4">
                            101
                        </td>
                        <td class="px-6 py-4">
                            92345654321
                        </td>
                        <td class="px-6 py-4">
                            xyz
                        </td>
                        <td class="px-6 py-4">
                            abc
                        </td>
                        <td class="px-6 py-4">
                            abh
                        </td>
                        <td class="px-6 py-4">
                            22/02/2021
                        </td>
                        <td class="px-6 py-4">
                            22/02/2022
                        </td>
                        <td class="px-6 py-4">
                            22/02/2023
                        </td>
                        <td class="px-6 py-4">
                            asdf
                        </td>
                        <td class="px-6 py-4">
                            Yes
                        </td>
                        <td class="px-6 py-4">
                            22/02/2025
                        </td>
                        <td class="px-6 py-4">
                            20/02/2025
                        </td>

                    </tr>
                </tbody>
            </table> -->

            <table class="w-full text-sm text-left rtl:text-right text-gray-500 border border-gray-700  my-5">
                <thead class="pt-5 border-b border-gray-900">
                    <tr class="text-xs text-gray-700 whitespace-nowrap uppercase bg-gray-50 ">
                        <th scope="col" class="px-6 py-3"></th>

                        </th>
                        <th scope="col" class="px-6 py-3">
                            Serial No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Item Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Item Qty
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Rate
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Total
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Image Preview
                        </th>
                        <th scope="col" class="px-6 py-3">
                            SO Number
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Creadted By
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b dark:border-gray-700">
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            <input id="default-checkbox" type="checkbox" value=""
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:border-gray-600">
                        </td>
                        <td scope="row" class="px-6 py-4 ">
                            101
                        </td>
                        <td class="px-6 py-4">
                            bulb
                        </td>
                        <td class="px-6 py-4">
                            40
                        </td>
                        <td class="px-6 py-4">
                            3000
                        </td>
                        <td class="px-6 py-4">
                            320000
                        </td>
                        <td class="px-6 py-4">
                            image
                        </td>
                        <td class="px-6 py-4">
                            132
                        </td>
                        <td class="px-6 py-4">
                            asdf
                        </td>
                    </tr>
                    <tr class="bg-white border-b dark:border-gray-700">
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            <input id="default-checkbox" type="checkbox" value=""
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:border-gray-600">
                        </td>
                        <td scope="row" class="px-6 py-4">
                            102
                        </td>
                        <td class="px-6 py-4">
                            wire
                        </td>
                        <td class="px-6 py-4">
                            30
                        </td>
                        <td class="px-6 py-4">
                            4000
                        </td>
                        <td class="px-6 py-4">
                            420000
                        </td>
                        <td class="px-6 py-4">
                            image
                        </td>
                        <td class="px-6 py-4">
                            170
                        </td>
                        <td class="px-6 py-4">
                            jkl
                        </td>
                    </tr>
                </tbody>

            </table>
        </div>


        <!-- <center>
            <button type="button"
                class="text-white bg-blue-600 hover:bg-blue-700  font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none ">Submit
                Now</button>
        </center> -->

    </div>



    <script>
        // $(document).ready(() => {
        //     $('#getData').on("click", function () {

        //         var lead_source = $("#lead_source").val();
        //         var ref_By = $("#ref_By").val();
        //         var ref_phone_no = $("#ref_phone_no").val();
        //         var lead_type = $("#lead_type").val();
        //         var contact_person_name = $("#contact_person_name").val();
        //         var contact_person_phone_no = $("#contact_person_phone_no").val();
        //         var contact_person_email = $("#contact_person_email").val();
        //         var contact_person_address = $("#contact_person_address").val();
        //         var lead_received_date = $("#lead_received_date").val();

        //         $.ajax({
        //             method: 'POST',
        //             url: './phpAjax/leadHeaderAjax.php',
        //             data: {
        //                 lead_source: lead_source,
        //                 ref_By: ref_By,
        //                 ref_phone_no: ref_phone_no,
        //                 lead_type: lead_type,
        //                 contact_person_name: contact_person_name,
        //                 contact_person_phone_no: contact_person_phone_no,
        //                 contact_person_email: contact_person_email,
        //                 contact_person_address: contact_person_address,
        //                 lead_received_date: lead_received_date
        //             },

        //             success: function (data) {
        //                 console.log(data);

        //                 let response = JSON.parse(data)

        //                 if (response.status == true) {
        //                     $("#statusBar").text("Data Inserted Sucessfully")
        //                 } else {
        //                     $("#statusBar").text("Data Not Inserted")

        //                 }
        //             },
        //         });
        //     });
        // });




        $(document).ready(function () {
            $('#myForm').submit(function (event) {
                event.preventDefault();
                var form = document.getElementById('myForm');
                // var formData = new FormData(form);

                var created_by = $("#created_by").val();
                var created_date = $("#created_date").val();
                var lead_source = $("#lead_source").val();
                var ref_By = $("#ref_By").val();
                var ref_phone_no = $("#ref_phone_no").val();
                var lead_type = $("#lead_type").val();
                var contact_person_name = $("#contact_person_name").val();
                var contact_person_phone_no = $("#contact_person_phone_no").val();
                var contact_person_email = $("#contact_person_email").val();
                var contact_person_address = $("#contact_person_address").val();
                var lead_received_date = $("#lead_received_date").val();

                $.ajax({
                    url: './phpAJax/leadHeaderAjax.php',
                    method: 'POST',
                    dataType: "JSON",
                    data: {
                        created_by: created_by,
                        created_date: created_date,
                        lead_source: lead_source,
                        ref_By: ref_By,
                        ref_phone_no: ref_phone_no,
                        lead_type: lead_type,
                        contact_person_name: contact_person_name,
                        contact_person_phone_no: contact_person_phone_no,
                        contact_person_email: contact_person_email,
                        contact_person_address: contact_person_address,
                        lead_received_date: lead_received_date,
                        leadGenReateToDbhHeader: "leadGenReateToDbhHeader"
                    },
                    success: function (response) {
                        let record_id = response.Record_Number

                        $("#record_no").val(record_id)

                        alert("Form Submited Sucessfully. Your Record Number is " + record_id)

                        console.log(response)
                    },
                    error: function (error) {
                        // alert('Your form was not sent successfully.');
                        console.log(error)
                    }
                });
                var form = document.getElementById('myForm').reset();
            });
        });


        $(document).ready(function () {
            $('#query_info_form').submit(function (event) {
                event.preventDefault();
                var form = document.getElementById('query_info_form');
                // var formData = new FormData(form);

                var assigned_to = $("#assigned_to").val();
                let record_no = $("#record_no").val();
                var query_start_date = $("#query_start_date").val();
                var follow_up = $("#follow_up").val();
                var followup_reminder_frequency = $("#followup_reminder_frequency").val();
                var no_of_times = $("#no_of_times").val();
                var query_end_date = $("#query_end_date").val();
                var installation_required = $("#installation_required").val();
                var tentative_installation = $("#tentative_installation").val();
                var tentative_delivery_date = $("#tentative_delivery_date").val();

                $.ajax({
                    url: './phpAJax/leadHeaderAjax.php',
                    method: 'POST',
                    dataType: "JSON",
                    data: {
                        assigned_to: assigned_to,
                        query_start_date: query_start_date,
                        record_no: record_no,
                        follow_up: follow_up,
                        followup_reminder_frequency: followup_reminder_frequency,
                        no_of_times: no_of_times,
                        query_end_date: query_end_date,
                        installation_required: installation_required,
                        tentative_installation: tentative_installation,
                        tentative_delivery_date: tentative_delivery_date,
                        leadGenReateToDbhMiddle: "leadGenReateToDbhMiddle"
                    },
                    success: function (response) {
                        alert(response.message);
                        console.log(response)
                    },
                    error: function (error) {
                        // alert('Your form was not sent successfully.');
                        console.log(error)
                    }
                });
                var form = document.getElementById('query_info_form').reset();
            });
        });


        $(document).ready(function () {
            $('#item_name').on("change",function () {
                var itemName = $('#item_name').val();
                $.ajax({
                    url: './phpAJax/getPriceFromItemMaster.php',
                    type: 'POST',
                    data: { action: 'get_price', item_name: itemName },
                    success: function (response) {
                        console.log(response)
                        // Set the fetched price into the item_rate input field
                        $('#item_rate').val(response.price);
                        $('#ImagePreview').attr('src', './Images/' + response.imagePath);
                        console.log(response.imagePath)
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        $('#item_rate').val('Error: ' + textStatus);
                        $('#ImagePreview').val('Error: ' + textStatus);
                    }
                });
            });
        });

        $(document).ready(function () {
            $('#getPriceBtn1').click(function () {
                var itemName = $('#item_name1').val();
                $.ajax({
                    url: './phpAJax/getPriceFromItemMaster.php',
                    type: 'POST',
                    data: { action: 'get_price', item_name: itemName },
                    success: function (response) {
                        console.log(response)
                        // Set the fetched price into the item_rate input field
                        $('#item_rate1').val(response.price);
                        $('#ImagePreview1').attr('src', './Images/' + response.imagePath);
                        console.log(response.imagePath)
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        $('#item_rate1').val('Error: ' + textStatus);
                        $('#ImagePreview1').val('Error: ' + textStatus);
                    }
                });
            });
        });

    </script>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function submitForm() {
            $.ajax({
                url: 'sales_order_backed.php', // Your PHP script that processes the form
                type: 'POST',
                data: $('#itemRows').serialize(),
                success: function (response) {
                    alert(response); // Display response from PHP
                    $('#itemRows')[0].reset(); // Reset form
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert('Error: ' + textStatus + ' - ' + errorThrown);
                }
            });
        }
    </script>




    <!-- <script src="./jquery-3.7.1.min.js"></script> -->
    <script src="./js/sale_order.js"></script>
    <!-- <script src="node_modules/@material-tailwind/html@latest/scripts/dialog.js"></script> -->

    <!-- from cdn -->
    <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/dialog.js"></script>
    <script src="./js/leadGnration.js"></script>
    <script>


        function validateInput() {
            var inputBox = document.getElementById("contact_person_phone_no");
            var input = inputBox.value;

            // Check if the input contains only digits and is exactly 10 characters long
            var isValid = /^\d{10}$/.test(input);

            if (isValid) {
                inputBox.style.border = "2px solid green"; // Outline in green if valid
            } else {
                inputBox.style.border = "2px solid red"; // Outline in red if invalid
            }
        }

    </script>
</body>

<!-- <script>
    let count = 1;

    function finish_field() {
        let y = document.getElementById("finish_field");

        if (y) {
            let x = `<div id="raw_field_${count}" class="flex flex-wrap items-center border gap-x-5 border-gray-900 w-full p-2 rounded-lg mt-2">
                        <div>
                            <input id="default-checkbox" type="checkbox" value=""
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:border-gray-600">
                        </div>
                        <div>
                            <label class="block text-sm">S. No : </label>
                            <input type="text" name="item_serial_no"
                                class="w-12 rounded-md border text-xs border-gray-500 bg-white py-2 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                style="border-color: #C8A1E0;" /><br>
                        </div>
                        <div>
                            <label class="block text-sm">Item Name : </label>
                            <input type="text" name="item_name"
                                class="md:w-32 w-40 rounded-md border text-xs border-gray-500 bg-white py-2 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                style="border-color: #C8A1E0;" /><br>
                        </div>
                        <div>
                            <label class="block text-sm">Item Qty : </label>
                            <input type="number" name="item_qty"
                                class="w-24 rounded-md border text-xs border-gray-500 bg-white text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                style="border-color: #C8A1E0;" /><br>
                        </div>
                        <div>
                            <label class="block text-sm">Rate : </label>
                            <input type="number" name="item_rate"
                                class="w-24 rounded-md border text-xs border-gray-500 bg-white text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                style="border-color: #C8A1E0;" /><br>
                        </div>
                        <div>
                            <label class="block text-sm">Total : </label>
                            <input type="number" name="item_total"
                                class="w-28 rounded-md border text-xs border-gray-500 bg-white text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                style="border-color: #C8A1E0;" /><br>
                        </div>

                        <div>

                            <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                                class="text-gray-900 mt-5  focus:outline-none border border-gray-900 px-1  font-medium rounded-lg text-xs py-1 text-center"
                                type="button">if Ship another address </button>
                        </div>
                        <div class="w-28 h-24 border border-gray-900 rounded-md">
                            <img class="w-28 h-24 rounded-md" src="./images.png" alt="image preview">
                        </div>

                        <div>
                            <label class="block text-sm">SO Number : </label>
                            <input type="number" name="item_so_number"
                                class="w-24 rounded-md border text-xs border-gray-500 bg-white text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                style="border-color: #C8A1E0;" /><br>
                        </div>
                        <div>
                            <label class="block text-sm">Created By : </label>
                            <input type="text" name="item_so_number"
                                class="w-28 rounded-md border text-xs border-gray-500 bg-white text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                style="border-color: #C8A1E0;" /><br>
                        </div>
                        <div>
                            <label class="block text-sm">Status : </label>
                            <input type="text" name="item_so_number"
                                class="w-24 rounded-md border text-xs border-gray-500 bg-white text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                style="border-color: #C8A1E0;" /><br>
                        </div>
                        <div>
                            // <button
                            //     class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-1.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            //     type="button">
                            //     Create SO
                            // </button>
                        </div>
                    </div>`;

            y.innerHTML += x;

            count++;
        } else {
            console.error("Element with ID 'finish_field' not found.");
        }
    }






    document.getElementById('remove_btn').addEventListener('click', function () {
        var finish_field = document.getElementById('finish_field');

        // Remove the last child of the container
        if (finish_field.lastElementChild) {
            finish_field.removeChild(finish_field.lastElementChild);
        }
    });


    function raw_field() {
        let y = document.getElementById("raw_field");

        if (y) {
            let x = `<div id="raw_field_${count}" class="flex flex-wrap items-center border gap-x-5 border-gray-900 w-full p-2 rounded-lg mt-2">
                        <div>
                            <input id="default-checkbox" type="checkbox" value=""
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:border-gray-600">
                        </div>
                        <div>
                            <label class="block text-sm">S. No : </label>
                            <input type="text" name="item_serial_no"
                                class="w-12 rounded-md border text-xs border-gray-500 bg-white py-2 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                style="border-color: #C8A1E0;" /><br>
                        </div>
                        <div>
                            <label class="block text-sm">Item Name : </label>
                            <input type="text" name="item_name"
                                class="md:w-32 w-40 rounded-md border text-xs border-gray-500 bg-white py-2 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                style="border-color: #C8A1E0;" /><br>
                        </div>
                        <div>
                            <label class="block text-sm">Item Qty : </label>
                            <input type="number" name="item_qty"
                                class="w-24 rounded-md border text-xs border-gray-500 bg-white text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                style="border-color: #C8A1E0;" /><br>
                        </div>
                        <div>
                            <label class="block text-sm">Rate : </label>
                            <input type="number" name="item_rate"
                                class="w-24 rounded-md border text-xs border-gray-500 bg-white text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                style="border-color: #C8A1E0;" /><br>
                        </div>
                        <div>
                            <label class="block text-sm">Total : </label>
                            <input type="number" name="item_total"
                                class="w-28 rounded-md border text-xs border-gray-500 bg-white text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                style="border-color: #C8A1E0;" /><br>
                        </div>

                        <div>

                            <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                                class="text-gray-900 mt-5  focus:outline-none border border-gray-900 px-1  font-medium rounded-lg text-xs py-1 text-center"
                                type="button">if Ship another address </button>
                        </div>
                        <div class="w-28 h-24 border border-gray-900 rounded-md">
                            <img class="w-28 h-24 rounded-md" src="./images.png" alt="image preview">
                        </div>

                        <div>
                            <label class="block text-sm">SO Number : </label>
                            <input type="number" name="item_so_number"
                                class="w-24 rounded-md border text-xs border-gray-500 bg-white text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                style="border-color: #C8A1E0;" /><br>
                        </div>
                        <div>
                            <label class="block text-sm">Created By : </label>
                            <input type="text" name="item_so_number"
                                class="w-28 rounded-md border text-xs border-gray-500 bg-white text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                style="border-color: #C8A1E0;" /><br>
                        </div>
                        <div>
                            <label class="block text-sm">Status : </label>
                            <input type="text" name="item_so_number"
                                class="w-24 rounded-md border text-xs border-gray-500 bg-white text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                style="border-color: #C8A1E0;" /><br>
                        </div>
                        <div>
                            // <button
                            //     class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-1.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            //     type="button">
                            //     Create SO
                            // </button>
                        </div>
                    </div>`;

            y.innerHTML += x;

            count++;
        } else {
            console.error("Element with ID 'finish_field' not found.");
        }
    }

    document.getElementById('raw_remove').addEventListener('click', function () {
        var raw_field = document.getElementById('raw_field');

        // Remove the last child of the container
        if (raw_field.lastElementChild) {
            raw_field.removeChild(raw_field.lastElementChild);
        }
    });


    function radio_btn() {
        let x = document.getElementById('add_btn')
        let y = document.getElementById('raw_section')

        y.style.display = "flex";
        x.style.display = "block";

    }

    function verifyAnswer() {


        let lead_source = document.getElementById('lead_source')
        var result = lead_source.options[lead_source.selectedIndex].text;

        console.log(result);

        if (result == "References") {

            document.getElementById('ref_By').disabled = false;
            document.getElementById('ref_By').placeholder = "Person Name";
            document.getElementById('ref_By').required = true;
            document.getElementById('ref_phone_no').disabled = false;
            document.getElementById('ref_phone_no').placeholder = "Person Phone No";
            document.getElementById('ref_phone_no').required = true;
        }
        // else {
        //     document.getElementById('ref_By').disabled = true;
        //     document.getElementById('ref_By').placeholder = " ";
        //     document.getElementById('ref_By').value = "";
        //     document.getElementById('ref_phone_no').disabled = true;
        //     document.getElementById('ref_phone_no').placeholder = " ";
        //     document.getElementById('ref_phone_no').value = "";

        // }

    }


    function installationRequired() {


        let installation_required = document.getElementById('installation_required')
        var result = installation_required.options[installation_required.selectedIndex].text;

        console.log(result);

        if (result == "Yes") {

            document.getElementById('tentative_installation').disabled = false;
            document.getElementById('tentative_installation').placeholder = "Enter Installtion";
            // document.getElementById('tentative_installation').value = "";
        } else {
            document.getElementById('tentative_installation').disabled = true;
            document.getElementById('tentative_installation').placeholder = "";
            document.getElementById('tentative_installation').value = "";



        }

    }
</script> -->

<script>
    // $(document).ready(function () {
    //     $('#followupSubmitBtn').click(function (e) {
    //         e.preventDefault();

    //         var formData = $('#followup_form').serialize();

    //         console.log(formData);

    //         // alert("Hello world");

    //         $.ajax({
    //             url: './phpAJax/LeadFollowupForm.php',
    //             type: "POST",
    //             dataType: "JSON",
    //             data: formData,
    //             success: function (response) {
    //                 alert(response.message);
    //                 console.log(response)
    //             },
    //             error: function (error) {
    //                 console.log(error);
    //             }
    //         });
    //     });
    // });

</script>

<script>
    $(document).ready(function () {
        $('#followupSubmitBtn').click(function () {
            var formData = {
                record_no: $('#record_no').val(),
                follow_up_start_date: $('#follow_up_start_date').val(),
                follow_up_end_date: $('#follow_up_end_date').val(),
                remarks: $('#remarks').val(),
                remind_date: $('#remind_date').val(),
            };

            $.ajax({
                type: 'POST',
                url: './phpAJax/LeadFollowupForm.php',
                data: formData,
                dataType: "JSON",
                success: function (response) {
                    alert(response.message);
                },
                error: function (xhr, status, error) {
                    alert('An error occurred: ' + xhr.responseText);
                }
            });
        });
    });
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


<!-- <script>
    let itemCount = 0;

    // Function to add a new row to the table
    function addItem() {
        const table = document.getElementById('itemTable');
        const row = table.insertRow(-1);
        row.setAttribute('data-row', itemCount);

        row.innerHTML = `
                <td><input type="text" name="sno[]" value="${itemCount + 1}" readonly class="w-20"></td>
                <td><input type="text" name="item_name[]"></td>
                <td><input type="number" name="item_qty[]" class="qty" oninput="calculateTotal(${itemCount})"></td>
                <td><input type="number" name="rate[]" class="rate" oninput="calculateTotal(${itemCount})"></td>
                <td><input type="text" name="total[]" class="total" readonly></td>
                <td><input type="text" name="so_number[]"></td>
                <td><input type="text" name="created_by[]"></td>
                <td><input type="text" name="status[]"></td>
                <td><button type="button" onclick="removeItem(this)">Remove</button></td>
            `;
        itemCount++;
    }

    // Function to remove the row from the table
    function removeItem(button) {
        const row = button.parentElement.parentElement;
        document.getElementById('itemTable').deleteRow(row.rowIndex);
    }

    // Function to calculate total for a given row based on Quantity and Rate
    function calculateTotal(index) {
        const row = document.querySelector(`tr[data-row="${index}"]`);
        const qty = row.querySelector('.qty').value || 0;
        const rate = row.querySelector('.rate').value || 0;
        const total = (qty * rate).toFixed(2);
        row.querySelector('.total').value = total;
    }

    // Function to send data to PHP using AJAX
    function submitForm() {
        // Get the form data
        const formData = new FormData(document.getElementById('goodsForm'));

        // Send the data using AJAX
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'save_items.php', true);
        xhr.onload = function () {
            if (xhr.status === 200) {
                alert('Data saved successfully!');
            } else {
                alert('Error saving data.');
            }
        };

        // Send the form data
        xhr.send(formData);
    }

    // Automatically add one row when the page loads
    window.onload = function () {
        addItem();
    };
</script> -->

<script>
    $(function () {

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
        $.get("ajax.php", {
            "itemCodeInfoForPr": "itemCodeInfoForPr"
        }, function (data) {

            availableTags = JSON.parse(data);

            console.log(availableTags);
            $("input[name='item_name']").autocomplete({
                source: availableTags
            });


        })

    });

</script>

</html>