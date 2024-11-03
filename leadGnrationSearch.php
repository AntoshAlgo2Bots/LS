<?php include("./navForLogged.php"); ?>


<?php

include('./dbconnection/db.php');

// echo $_POST['record_no'];





$sql = "SELECT * FROM lead_details_middle_level_form";


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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Query Information</title>
</head>

<body>

    <?php






    //  session_start();
    
    // if (!isset($_SESSION["username"])) {
    



    // header("location:login.php");
    



    // }
    



    ?>




    <div class="mx-10" style="margin-top: 5rem;">
        <h1 class="text-3xl font-bold  underline text-center">Search Lead Details Form</h1>
        <form action="./phpAjax/leadSerchModify.php" method="post" id="form_update">

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
                                    class="border mb-4 border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-40 p-1.5"
                                    placeholder="Auto Generated" />
                            </div>
                            <div>

                                <button type="button" onclick="getUSerDataByUserName()"
                                    class="p-2.5 mt-3 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                    </svg>
                                    <span class="sr-only">Search</span>
                                </button>
                            </div>
                        </div>
                        <div>
                            <label for="created_by" class="block mb-2 text-sm font-bold text-gray-900">Created By
                                :
                            </label>
                            <input type="text" id="created_by" name="created_by"
                                class="border mb-4 border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-52 p-1.5"
                                placeholder="Get Data" disabled />
                        </div>
                        <div>
                            <label for="created_date" class="block mb-2 text-sm font-bold text-gray-900">Created
                                Date :
                            </label>
                            <input type="datetime" id="created_date" name="created_date"
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
                            <button type="submit"
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
                            <input type="text" id="lead_source" name="lead_source"
                                class="border mb-4 border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-52 p-1.5"
                                placeholder="" />
                            <!-- <select id="lead_source" name="lead_source" onchange="verifyAnswer()"
                                class=" border mb-4 border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-52 p-1.5">
                                <option selected disabled hidden>Choose Lead</option>
                                <option value="Email">Email</option>
                                <option value="Direct_other">Direct-other</option>
                                <option value="References">References</option>
                            </select> -->
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
                            <input type="text" id="ref_phone_no" name="ref_phone_no"
                                class="border mb-4 border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-52 p-1.5"
                                placeholder="" />
                        </div>
                        <div>
                            <label for="lead_type" class="block mb-2 text-sm font-bold text-gray-900">Lead Type :
                            </label>
                            <input type="text" id="lead_type" name="lead_type"
                                class="border mb-4 border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-52 p-1.5"
                                placeholder="" />
                            <!-- <select id="lead_type" name="lead_type"
                                class=" border mb-4 border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-52 p-1.5">
                                <option selected>Choose Lead Type</option>
                                <option value="Dealer">Dealer</option>
                                <option value="Distributor">Distributor</option>
                                <option value="Retailer">Retailer</option>
                                <option value="Individual">Individual</option>
                            </select> -->
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
                            <input type="text" id="contact_person_phone_no" name="contact_person_phone_no"
                                class="border mb-4 border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-52 p-1.5"
                                placeholder="Person Phone no" required />
                        </div>
                        <div>
                            <label for="contact_person_details"
                                class="block mb-2 text-sm font-bold text-gray-900">Contact
                                Person Email : </label>
                            <input type="text" id="contact_person_email" name="contact_person_email"
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
    </div>


    <div class="px-10 mt-4">
        <fieldset class="border-2 border-gray-300 p-5 rounded-lg ">
            <legend class="font-bold">Query Information</legend>
            <div class="flex flex-wrap gap-x-16 md:mx-8">
                <div>
                    <label for="assigned_to" class="block mb-2 text-sm font-bold text-gray-900">Assigned To :
                    </label>
                    <input type="text" id="assigned_to" name="assigned_to"
                        class="border mb-4 border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-52 p-1.5"
                        placeholder="" required />
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
                    <label for="follow_up" class="block mb-2 text-sm font-bold text-gray-900">Follow Up : </label>
                    <input type="text" id="follow_up" name="follow_up"
                        class="border mb-4 border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-52 p-1.5"
                        placeholder="" required />
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
                    <label for="installation_required" class="block mb-2 text-sm font-bold text-gray-900">Installation
                        required :
                    </label>
                    <select id="installation_required" name="installation_required" onchange="installationRequired()"
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
                        placeholder="" required />
                </div>
                <div>
                    <label for="tentative_delivery_date" class="block mb-2 text-sm font-bold text-gray-900">Tentative
                        Install. Delivery Date:
                    </label>
                    <input type="date" name="tentative_delivery_date" id="tentative_delivery_date"
                        class="border mb-4 border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-52 p-1.5"
                        placeholder="" required />
                </div>
            </div>
            <div>
                <button type="button" id="addNowBtn"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-8 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 ml-8">Add
                    Now</button>
            </div>



            <div>



                <div class="relative md:mx-8 mt-4 overflow-x-auto " style="width: 1290px">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-3 py-3"></th>
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
                                <th scope="col" class="px-6 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody id="searchTableTbody">


                            <!-- <tr class="border-b dark:border-gray-700">
                                    <td class="px-6 py-4">
                                        Serial
                                    </td>
                                    <td class="px-6 py-4">
                                        record_no
                                    </td>
                                    <td class="px-6 py-4">
                                        assigned_to
                                    </td>
                                    <td class="px-6 py-4">
                                        query_start_date
                                    </td>
                                    <td class="px-6 py-4">
                                        follow_up
                                    </td>
                                    <td class="px-6 py-4">
                                       followup_reminder_frequency
                                    </td>
                                    <td class="px-6 py-4">
                                        no_of_times
                                    </td>
                                    <td class="px-6 py-4">
                                       query_end_date
                                    </td>
                                    <td class="px-6 py-4">
                                        installation_required
                                    </td>
                                    <td class="px-6 py-4">
                                        tentative_installation
                                    </td>
                                    <td class="px-6 py-4">
                                       tentative_delivery_date
                                    </td>

                                </tr> -->




                        </tbody>
                    </table>
                </div>
                
                <div class="flex justify-center mt-4">
                    <button type="button" id="updateBtn"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-8 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Update
                    Details</button>
                </div>
                <div class="relative md:mx-8 mt-4 overflow-x-auto " style="width: 1290px">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-3 py-3"></th>
                                <th scope="col" class="px-6 py-3">S No</th>
                                <th scope="col" class="px-6 py-3">Record Number</th>
                                <th scope="col" class="px-6 py-3">Item Name</th>
                                <th scope="col" class="px-6 py-3">Item Qty</th>
                                <th scope="col" class="px-6 py-3">Item Rate</th>
                                <th scope="col" class="px-6 py-3">Total</th>
                                <th scope="col" class="px-6 py-3">Item Images</th>
                                <th scope="col" class="px-6 py-3">Item Type</th>
                                <th scope="col" class="px-6 py-3">Item So Number</th>
                                <th scope="col" class="px-6 py-3">Created By</th>
                                <th scope="col" class="px-6 py-3">Status</th>
                                <th scope="col" class="px-6 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody id="searchTableTbody1">


                            <!-- <tr class="border-b dark:border-gray-700">
                                    <td class="px-6 py-4">
                                        Serial
                                    </td>
                                    <td class="px-6 py-4">
                                        record_no
                                    </td>
                                    <td class="px-6 py-4">
                                        assigned_to
                                    </td>
                                    <td class="px-6 py-4">
                                        query_start_date
                                    </td>
                                    <td class="px-6 py-4">
                                        follow_up
                                    </td>
                                    <td class="px-6 py-4">
                                       followup_reminder_frequency
                                    </td>
                                    <td class="px-6 py-4">
                                        no_of_times
                                    </td>
                                    <td class="px-6 py-4">
                                       query_end_date
                                    </td>
                                    <td class="px-6 py-4">
                                        installation_required
                                    </td>
                                    <td class="px-6 py-4">
                                        tentative_installation
                                    </td>
                                    <td class="px-6 py-4">
                                       tentative_delivery_date
                                    </td>

                                </tr> -->




                        </tbody>
                    </table>
                </div>
            </div>
        </fieldset>
        </form>
        <!-- <fieldset class="p-5 border-2 rounded-md border-gray-300 mt-5">
            <legend class="font-bold">Item Information</legend>
            <div class="flex justify-between flex-wrap">
                <div class="w-full">
                    <div>
                        <input type="radio" name="goods" checked id="">
                        <span class="text-xs font-bold">Finish Goods</span>
                    </div>

                    <div class="flex flex-wrap items-center border gap-x-5 border-gray-900 w-full p-2 rounded-lg mt-2">
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
                            <button
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-1.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                type="button">
                                Create SO
                            </button>
                        </div>
                    </div>
                    <div class="block">
                        <div id="finish_field"></div>
                    </div>
                    <div class="mt-2"><button onclick="finish_field()"
                            class="text-gray-900  focus:outline-none border border-gray-900 px-2  font-medium rounded-lg text-xs py-1 text-center"
                            type="button">Add Items</button>
                        <button onclick="remove_finish_field()" id="remove_btn"
                            class="text-gray-900  focus:outline-none border border-gray-900 px-2  font-medium rounded-lg text-xs py-1 text-center"
                            type="button">Remove Items</button>

                    </div>

                    <div class=" border-t border-gray-900 mt-4 pt-2">
                        <div>
                            <input type="radio" name="goods" onclick="radio_btn()">
                            <span class="text-xs font-bold">Raw Material</span>
                        </div>

                        <div class="border border-gray-900 w-full p-2 rounded-lg mt-2" id="raw_section"
                            style="display: none;">
                            <div class="flex flex-wrap items-center gap-x-5 ">
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
                                    <button
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-1.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                        type="button">
                                        Create SO
                                    </button>
                                </div>
                            </div><br>
                        </div>


   
                        <div id="crud-modal" tabindex="-1" aria-hidden="true"
                            class="overflow-y-auto overflow-x-hidden hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-md max-h-full">
                            
                                <div class="relative bg-white  rounded-lg shadow">
                                
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
                            <div>
                                <div id="raw_field"></div>
                            </div>
                            <div class="mt-2">
                                <button onclick="raw_field()"
                                    class="focus:outline-none font-medium border border-gray-900 px-2  font-medium rounded-lg text-xs py-1 text-center"
                                    type="button">Add Items</button>
                                <button id="raw_remove"
                                    class=" focus:outline-none font-medium border border-gray-900 px-2  font-medium rounded-lg text-xs py-1 text-center"
                                    type="button">Remove Items</button>
                            </div>
                        </div>
                    </div>
                </div>
              
            </div>
        </fieldset> -->

        <!-- <div id="extralarge-modal" tabindex="-1"
            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-7xl max-h-full">
               
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                   
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                            BOM Form
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="extralarge-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    
                    <div class="p-4 md:p-5 space-y-4">
                        <div class="flex gap-x-4">
                            <form class="w-full p-3">
                                <div class="border border-gray-500 p-3 rounded-md">
                                    <div class="flex gap-x-9 flex-wrap">

                                        <div>
                                            <label for=""
                                                class="block  mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">New
                                                BOM
                                                :
                                            </label>
                                            <input type="text" name="new_bom"
                                                class="w-40 rounded-md mb-3 border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                                style="border-color: #C8A1E0;" />
                                        </div>
                                        <div class="">
                                            <label
                                                class="block w-40 mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Item
                                                Name : </label>
                                            <input type="text" name="bom_item_name"
                                                class="w-40 rounded-md mb-3  border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                                style="border-color: #C8A1E0;" />
                                        </div>
                                        <div class="">
                                            <label
                                                class="block w-40 mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Revison
                                                : </label>
                                            <input type="text" name="bom_revision"
                                                class="w-40 rounded-md mb-3  border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                                style="border-color: #C8A1E0;" />
                                        </div>
                                        <div class="">
                                            <label
                                                class="block w-40 mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Percentage:
                                            </label>
                                            <input type="text" name="bom_percentage"
                                                class="w-40 rounded-md mb-3  border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                                style="border-color: #C8A1E0;" />
                                        </div>
                                        <div class="">
                                            <label
                                                class="block w-40 mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Products
                                                :
                                            </label>
                                            <input type="text" name="bom_products"
                                                class="w-40 rounded-md mb-3  border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                                style="border-color: #C8A1E0;" />
                                        </div>
                                        <div class="">
                                            <label
                                                class="block w-40 mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Created
                                                Date : </label>
                                            <input type="date" name="bom_created_date"
                                                class="w-40 rounded-md mb-3  border text-xs border-gray-500 bg-white pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                                style="border-color: #C8A1E0;" />
                                        </div>
                                        <div class="">
                                            <label
                                                class="block w-40 mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Created
                                                By :
                                            </label>
                                            <input type="text" name="bom_created_by"
                                                class="w-40 rounded-md mb-3  border text-xs border-gray-500 bg-white pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                                style="border-color: #C8A1E0;" />
                                        </div>
                                        <div class="">
                                            <label
                                                class="block  mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Organization
                                                Mapping : </label>
                                            <input type="text" name="bom_organization_mapping"
                                                class="w-40 rounded-md mb-3 border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                                style="border-color: #C8A1E0;" />
                                        </div>
                                        <div class="">
                                            <label
                                                class="block w-40 mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Warehouse
                                                Location : </label>
                                            <input type="text" name="bom_warehouse_location"
                                                class="w-40 rounded-md mb-3 border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                                style="border-color: #C8A1E0;" />
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="w-40 h-40 border border-gray-900 rounded-md ml-4">
                                <img class="w-40 h-40" id="preview" alt="Item image">
                            </div>
                        </div>

                        <div class="mt-6">
                            <form class="w-full border p-3 border-gray-500 rounded-md">
                                <div class="flex flex-wrap items-center justify-between">
                                    <div class="ml-2">
                                        <label
                                            class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Item
                                            Seq
                                            :
                                        </label>
                                        <input type="text" name="bom_item_seq" id=""
                                            class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                            style="border-color: #C8A1E0;" />
                                    </div>
                                    <div class="ml-2">
                                        <label
                                            class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Process
                                            Seq:
                                        </label>
                                        <input type="text" name="bom_proccess_seq" id=""
                                            class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                            style="border-color: #C8A1E0;" />
                                    </div>
                                    <div class="ml-2">
                                        <label
                                            class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Item
                                            code :
                                        </label>
                                        <input type="text" name="bom_item_code" id=""
                                            class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                            style="border-color: #C8A1E0;" />
                                    </div>
                                    <div class="ml-2">
                                        <label
                                            class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">
                                            Item Name :
                                        </label>
                                        <input type="text" name="bom_item_name" id=""
                                            class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                            style="border-color: #C8A1E0;" />
                                    </div>
                                    <div class="ml-2">
                                        <label
                                            class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Qty
                                            :
                                        </label>
                                        <input type="text" name="bom_qty" id=""
                                            class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                            style="border-color: #C8A1E0;" />
                                    </div>
                                    <div class="ml-2">
                                        <label
                                            class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Percentage
                                            :
                                        </label>
                                        <input type="number" name="bom_item_percentage" id=""
                                            class="w-40 rounded-md border text-xs border-gray-500 bg-white pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                            style="border-color: #C8A1E0;" />
                                    </div>
                                </div>
                                <div class="flex flex-wrap items-center border-gray-500 justify-between border-t mt-2">
                                    <div class="ml-2 mt-2">
                                        <input type="text" name="" id=""
                                            class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                            style="border-color: #C8A1E0;" />
                                    </div>
                                    <div class="ml-2 mt-2">
                                        <input type="text" name="" id=""
                                            class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                            style="border-color: #C8A1E0;" />
                                    </div>
                                    <div class="ml-2 mt-2">
                                        <input type="text" name="" id=""
                                            class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                            style="border-color: #C8A1E0;" />
                                    </div>
                                    <div class="ml-2 mt-2">
                                        <input type="text" name="" id=""
                                            class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                            style="border-color: #C8A1E0;" />
                                    </div>
                                    <div class="ml-2 mt-2">
                                        <input type="text" name="" id=""
                                            class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                            style="border-color: #C8A1E0;" />
                                    </div>
                                    <div class="ml-2 mt-2">
                                        <input type="number" name="" id=""
                                            class="w-40 rounded-md border text-xs border-gray-500 bg-white pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                            style="border-color: #C8A1E0;" />
                                    </div>
                                </div>
                                <div class="flex flex-wrap items-center border-gray-500 justify-between border-t mt-2">
                                    <div class="ml-2 mt-2">
                                        <input type="text" name="" id=""
                                            class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                            style="border-color: #C8A1E0;" />
                                    </div>
                                    <div class="ml-2 mt-2">
                                        <input type="text" name="" id=""
                                            class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                            style="border-color: #C8A1E0;" />
                                    </div>
                                    <div class="ml-2 mt-2">
                                        <input type="text" name="" id=""
                                            class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                            style="border-color: #C8A1E0;" />
                                    </div>
                                    <div class="ml-2 mt-2">
                                        <input type="text" name="" id=""
                                            class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                            style="border-color: #C8A1E0;" />
                                    </div>
                                    <div class="ml-2 mt-2">
                                        <input type="text" name="" id=""
                                            class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                            style="border-color: #C8A1E0;" />
                                    </div>
                                    <div class="ml-2 mt-2">
                                        <input type="number" name="" id=""
                                            class="w-40 rounded-md border text-xs border-gray-500 bg-white pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                            style="border-color: #C8A1E0;" />
                                    </div>
                                </div>
                                <div class="flex flex-wrap items-center border-gray-500 justify-between border-t mt-2">
                                    <div class="ml-2 mt-2">
                                        <input type="text" name="" id=""
                                            class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                            style="border-color: #C8A1E0;" />
                                    </div>
                                    <div class="ml-2 mt-2">
                                        <input type="text" name="" id=""
                                            class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                            style="border-color: #C8A1E0;" />
                                    </div>
                                    <div class="ml-2 mt-2">
                                        <input type="text" name="" id=""
                                            class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                            style="border-color: #C8A1E0;" />
                                    </div>
                                    <div class="ml-2 mt-2">
                                        <input type="text" name="" id=""
                                            class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                            style="border-color: #C8A1E0;" />
                                    </div>
                                    <div class="ml-2 mt-2">
                                        <input type="text" name="" id=""
                                            class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                            style="border-color: #C8A1E0;" />
                                    </div>
                                    <div class="ml-2 mt-2">
                                        <input type="number" name="" id=""
                                            class="w-40 rounded-md border text-xs border-gray-500 bg-white pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                            style="border-color: #C8A1E0;" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                
                    <div
                        class="flex items-center p-4 md:p-5 space-x-3 rtl:space-x-reverse border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button data-modal-hide="extralarge-modal" type="button"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save
                            Changes</button>
                        <button data-modal-hide="extralarge-modal" type="button"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button>
                    </div>
                </div>
            </div>
        </div> -->


        <!-- <div class="relative overflow-x-auto mt-4 mb-5">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 border border-gray-700 ">
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
            </table>

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
        </div> -->


        <!-- <center>
            <button type="button"
                class="text-white bg-blue-600 hover:bg-blue-700  font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none ">Submit
                Now</button>
        </center> -->

    </div>


</body>


<script src="./js/leadGnrationSeach.js"></script>


<script>



    $('#addNowBtn').on('click', function (e) {
        e.preventDefault();

        // alert("Hellow workd")
        var formData = $('#form_update').serialize();

        $.ajax({
            url: './phpAjax/leadMiddleAddAjax.php',
            type: 'POST',
            dataType: 'JSON',
            data: formData,
            success: function (response) {
                alert(response.message);
            },
            error: function (error) {
                console.log(error);
            }
        });
    });


    // $(document).ready(function () {
    //     $('#form_update').submit(function (event) {
    //         event.preventDefault();

    //         var formData = $(this).serialize(); // Serialize form data

    //         $.ajax({
    //             url: './phpAjax/leadSerchModify.php',
    //             type: 'POST',
    //             dataType: 'JSON',
    //             data: formData,
    //             success: function (response) {
    //                 alert(response.message);
    //             },
    //             error: function (error) {
    //                 // alert('Your form was not sent successfully.');
    //                 console.log(error)
    //             }
    //         });
    //     });
    // });
    $(document).ready(function () {
        $("#updateBtn").on("click", function () {
            const checkedRowsData = [];

            $("#searchTableTbody input[type='checkbox']").each(function () {
                if ($(this).is(":checked")) {
                    const row = $(this).closest("tr");
                    const rowData = {
                        id: row.find('input[type="number"]').eq(0).val(),
                        record_no: row.find('input[type="number"]').eq(1).val(),
                        assigned_to: row.find('input[type="text"]').eq(0).val(),
                        query_start_date: row.find('input[type="date"]').eq(0).val(),
                        follow_up: row.find('input[type="text"]').eq(1).val(),
                        followup_reminder_frequency: row.find('input[type="date"]').eq(1).val(),
                        no_of_times: row.find('input[type="number"]').eq(2).val(),
                        query_end_date: row.find('input[type="date"]').eq(1).val(),
                        installation_required: row.find('input[type="text"]').eq(2).val(),
                        tentative_installation: row.find('input[type="date"]').eq(2).val(),
                        tentative_delivery_date: row.find('input[type="date"]').eq(3).val()
                    };
                    checkedRowsData.push(rowData);
                }
            });

            if (checkedRowsData.length > 0) {
                $.ajax({
                    url: './phpAjax/leadSerchModify.php', // Replace with your actual PHP script
                    type: 'POST',
                    data: { rows: checkedRowsData },
                    success: function (response) {
                        alert("Data Updated Successfully");
                        console.log(response);
                    },
                    error: function (xhr, status, error) {
                        console.error(error);
                    }
                });
            } else {
                alert("Please select at least one checkbox.");
            }
        });
    });


</script>

</html>