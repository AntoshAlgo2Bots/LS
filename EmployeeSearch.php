<?php
include("./navForLogged.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.4/dist/tailwind.min.css" rel="stylesheet">
    <title>Search Employee Form</title>
</head>

<body>
    <div id="search_section" class="mt-5 border border-gray-900 p-5 rounded-lg mx-5">
        <h1 class="text-center underline text-3xl mb-3 font-bold">Search Employee Form</h1>
        <div class="block md:flex gap-x-4">
            <fieldset class="w-full border border-gray-500 p-3 rounded-md">
                <legend class="font-bold text-sm">Employee Information</legend>
                <div class="">
                    <div class="flex">
                        <div>
                            <label
                                class="block w-40 mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">S.
                                No : </label>
                            <input type="text" name="id" placeholder="Enter serial number" id="id"
                                class="w-40 rounded-md border mb-3 text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                        <div class="mt-6 ml-2">
                            <button type="text" id="search"
                                class="w-16 text-white border border-blue-700 bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-xs py-1 text-center me-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800 ">Serach</button>
                        </div>
                    </div>
                    <div class="flex gap-x-9 flex-wrap">
                        <div>
                            <label for="email"
                                class="block  mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Joiner(New/Old)
                                :
                            </label>
                            <input type="text" name="joiner_info" placeholder="Enter joiner status" id="joiner_info" readonly
                                class="w-40 rounded-md border mb-3 text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                        <div class="">
                            <label
                                class="block w-40 mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Name
                                : </label>
                            <input type="text" name="emp_name" placeholder="Enter full name" id="emp_name" readonly
                                class="w-40 rounded-md border mb-3 text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                        <div class="">
                            <label
                                class="block w-40 mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">DOB
                                :
                            </label>
                            <input type="date" name="emp_dob" id="emp_dob" readonly
                                class="w-40 rounded-md border mb-3 text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                        <div class="">
                            <label
                                class="block w-40 mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Department
                                :
                            </label>
                            <input type="text" name="emp_department" placeholder="Enter department" id="emp_department" readonly
                                class="w-40 rounded-md border mb-3 text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                        <div class="">
                            <label
                                class="block w-40 mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Mobile
                                No : </label>
                            <input type="text" name="emp_mobile_no" placeholder="Enter mobile number" id="emp_mobile_no" readonly
                                class="w-40 rounded-md border mb-3 text-xs border-gray-500 bg-white pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                        <div class="">
                            <label
                                class="block w-40 mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Address
                                :
                            </label>
                            <input type="text" name="emp_address" placeholder="Enter address" id="emp_address" readonly
                                class="w-40 rounded-md border mb-3 text-xs border-gray-500 bg-white pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                        <div class="">
                            <label
                                class="block  mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">E-mail
                                Address : </label>
                            <input type="text" name="emp_email" placeholder="Enter email address" id="emp_email" readonly
                                class="w-40 rounded-md border mb-3 text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                        <div class="">
                            <label
                                class="block w-40 mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Pan
                                Card Number : </label>
                            <input type="text" name="emp_pan_card" placeholder="Enter Pan Card" id="emp_pan_card" readonly
                                class="w-40 rounded-md border mb-3 text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                        <!-- <div class="">
                                <label
                                    class="block w-40 mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Choose
                                    Image : </label>
                                <input type="file" name="emp_image" accept="image/*" onchange="previewImage(event)"
                                    class="w-40 border-none text-xs border-gray-500 bg-white text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            </div> -->
                    </div>

                </div>
            </fieldset>
            <div class="w-44 h-56 mt-3 border border-gray-900 rounded-md">
                <img class="h-56 rounded-md" id="preview" alt="Item image">
            </div>
        </div>

        <div class="mt-6">
            <fieldset class="w-full border p-4 border-gray-500 rounded-md">
                <legend class="font-bold text-sm">Organization Information</legend>
                <div class="flex flex-wrap items-center gap-x-9">
                    <div class="">
                        <label class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Old
                            Organization Name :
                        </label>
                        <input type="text" name="organization_name" placeholder="Enter organization"
                            id="organization_name" readonly
                            class="w-40 rounded-md border mb-3 text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="">
                        <label class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Deputed
                            to (Location) :
                        </label>
                        <input type="text" name="deputed_location" placeholder="Enter location" id="deputed_location" readonly
                            class="w-40 rounded-md border mb-3 text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="">
                        <label class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Last
                            CTC :
                        </label>
                        <input type="text" name="last_ctc" placeholder="Enter last CTC" id="last_ctc" readonly
                            class="w-40 rounded-md border mb-3 text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="">
                        <label class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Current
                            CTC Offered :
                        </label>
                        <input type="text" name="current_ctc" placeholder="Enter current CTC" id="current_ctc" readonly
                            class="w-40 rounded-md border  mb-3  text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="">
                        <label class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Tentative
                            Date of Joining :
                        </label>
                        <input type="date" name="tentative_date" id="tentative_date" readonly
                            class="w-40 rounded-md border  mb-3  text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="">
                        <label class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Exact
                            Date of Joining :
                        </label>
                        <input type="date" name="exact_date" id="exact_date" readonly
                            class="w-40 rounded-md border  mb-3  text-xs border-gray-500 bg-white pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                </div>


                <div class="flex flex-wrap items-center gap-x-9">
                    <div class="">
                        <label class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Notice
                            Period :
                        </label>
                        <input type="text" name="notice_period" placeholder="Enter notice period" id="notice_period" readonly
                            class="w-40 rounded-md border mb-3 text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="">
                        <label class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Notice
                            Served (Yes/No) :
                        </label>
                        <input type="text" name="notice_served" placeholder="Enter yes or no" id="notice_served" readonly
                            class="w-40 rounded-md border mb-3 text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="">
                        <label class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Job
                            Role :
                        </label>
                        <input type="text" name="job_role" placeholder="Enter role" id="job_role" readonly
                            class="w-40 rounded-md border mb-3 text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="">
                        <label class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Job
                            Description :
                        </label>
                        <input type="text" name="job_description" placeholder="Enter description" id="job_description" readonly
                            class="w-40 rounded-md border mb-3 text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="">
                        <label class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Date
                            of Anniversary :
                        </label>
                        <input type="date" name="date_of_anniversary" id="date_of_anniversary" readonly
                            class="w-40 rounded-md border mb-3 text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                </div>
                <div class="">
                    <div class="">
                        <label class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Offer
                            Letter Release Date :
                        </label>
                        <input type="date" name="offer_letter_date" id="offer_letter_date" readonly
                            class="w-40 rounded-md border mb-3 text-xs border-gray-500 bg-white pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        <!-- <input type="file" name="offer_letter_file" 
                            class="w-40 border-none text-xs border-gray-500 bg-white text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" /> -->
                    </div>
                    <div class="">
                        <label class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Date of
                            Leaving :
                        </label>
                        <input type="date" name="date_of_leaving" id="date_of_leaving" readonly
                            class="w-40 rounded-md border text-xs border-gray-500 bg-white pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        <!-- <input type="file" name="date_of_leaving_file" id="date_of_leaving_file"
                            class="w-40 border-none text-xs border-gray-500 bg-white    text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" /> -->
                    </div>
                </div>
            </fieldset>
        </div>

        <div class="w-full mt-5 flex justify-center gap-x-5">

        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

    <script>
        function previewImage(event) {
            var input = event.target;
            var image = document.getElementById('preview');
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    image.src = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
            }

            console.log("Accept")
        }



        $(document).ready(function () {
            $('#search').click(function (e) {
                e.preventDefault();
                var srch = $('#id').val();
                // Log to confirm the search was triggered
                console.log("Search initiated for:", srch);

                $.post("EmployeeSearchAction.php", { srch }, function (data) {
                    console.log("Response received:", data);

                    // Check if the response contains data
                    if (data && data.success) {
                        // Assuming data.data contains the result
                        
                        $("#joiner_info").val(data.data.joiner_new_old || '');
                        $("#emp_name").val(data.data.name || '');
                        $("#emp_dob").val(data.data.dob || '');
                        $("#emp_department").val(data.data.department || ''); // Corrected here
                        $("#emp_mobile_no").val(data.data.mobile_number || '');
                        $("#emp_address").val(data.data.address || '');
                        $("#emp_email").val(data.data.email_address || '');
                        $("#emp_pan_card").val(data.data.pan_card || '');
                        $("#organization_name").val(data.data.old_organization_name || '');
                        $("#deputed_location").val(data.data.deputed_to_location || '');
                        $("#last_ctc").val(data.data.last_ctc || '');
                        $("#current_ctc").val(data.data.current_ctc || '');
                        $("#tentative_date").val(data.data.tentative_date_of_joining || '');
                        $("#exact_date").val(data.data.exact_date_of_joining || '');
                        $("#notice_period").val(data.data.notice_period || '');
                        $("#job_role").val(data.data.job_role || '');
                        $("#job_description").val(data.data.job_description || '');
                        $("#date_of_anniversary").val(data.data.date_anniversary || '');
                        $("#offer_letter_date").val(data.data.offer_later_release_date || '');
                        $("#date_of_leaving").val(data.data.date_of_leaving || '');
                        $("#date_of_leaving_file").val(data.data.date_of_leaving_file || '');
                        $("#notice_served").val(data.data.notice_served || '');

                    } else {
                        // Handle the case when the search is unsuccessful
                        alert(data.message || "No results found.");
                    }
                }, "json").fail(function (error, data) {
                    // console.error("Request failed:", textStatus, errorThrown);
                    console.log(error)
                    console.log(data.message)
                    console.log(error.responseText)
                    alert("An error occurred while processing your request. Please try again.");
                });
            });
        });
    </script>
</body>

</html>