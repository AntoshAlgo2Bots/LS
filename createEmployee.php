<?php
// session_start();
include("./navForLogged.php");

// include("./db.php");
include('./dbconnection/db.php');






if ($_SERVER['REQUEST_METHOD'] == 'POST') {







    // $target_path = "./employee";
    // $target_path = $target_path.basename( $_FILES['fileToUpload']['name']);   

    // if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_path)) {  
    //     echo "File uploaded successfully!";  
    // } else{  
    //     echo "Sorry, file not uploaded, please try again!";  
    // }  





    $emp_name = $_POST['emp_name'];
    $emp_dob = $_POST['emp_dob'];
    $emp_department = $_POST['emp_department'];
    $emp_mobile_no = $_POST['emp_mobile_no'];
    $emp_address = $_POST['emp_address'];
    $emp_email = $_POST['emp_email'];
    $emp_pan_card = $_POST['emp_pan_card'];
    $emp_image = "Image path";
    $created_by = $_SESSION["username"];
    $created_date = date("Y-m-d H:i:s");



    $query = "INSERT INTO `employee_head` (`name`, `dob`, `department`, `mobile_number`, `address`, `email_address`, `pan_card`, `image_path`,`created_by`,`created_date`) 
        VALUES (?, ?,?, ?, ?, ?,?, ? ,?,?)";


    $stmt = $con->prepare($query);

    $stmt->bind_param("ssssssssss", $emp_name, $emp_dob, $emp_department, $emp_mobile_no, $emp_address, $emp_email, $emp_pan_card, $emp_image, $created_by, $created_date);


    if ($stmt->execute()) {


        echo "data insretd succxess fully";

        $emp_id = $con->insert_id;



        $query = "INSERT INTO `employee_info_line` (`employee_id`, `joiner_new_old`, `old_organization_name`, `deputed_to_location`, `last_ctc`, `current_ctc`, `tentative_date_of_joining`, `exact_date_of_joining`, `notice_period`, `notice_served`, `job_role`,`job_description`, `date_anniversary`, `offer_later_release_date`, `date_of_leaving`, `offer_letter_path`, `leave_letter_path`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);
";

        $stmt = $con->prepare($query);






        $joiner_new_old = $_POST['joiner_new_old'];
        $old_organize_name = $_POST['old_organization_name'];
        $deputed_location = $_POST['deputed_location'];
        $last_ctc = $_POST['last_ctc'];
        $current_ctc = $_POST['current_ctc'];
        $tentative_date_joining = $_POST['tentative_date'];
        $exact_date = $_POST['exact_date'];
        $notice_period = $_POST['notice_period'];
        $notice_served = $_POST['notice_served'];
        $job_role = $_POST['job_role'];
        $job_description = $_POST['job_description'];
        $date_of_anniversary = $_POST['date_of_anniversary'];
        $offer_letter_date = $_POST['offer_letter_date'];
        $date_of_leaving = $_POST['date_of_leaving'];
        $offer_letter_file = $_POST['offer_letter_file'];
        $leavnig_letter_file = $_POST['leavnig_letter_file'];






        $stmt->bind_param("sssssssssssssssss", $emp_id, $emp_name, $old_organize_name, $deputed_location, $last_ctc, $current_ctc, $tentative_date_joining, $exact_date, $notice_period, $notice_served, $job_role, $job_description, $date_of_anniversary, $offer_letter_date, $date_of_leaving, $offer_letter_file, $leavnig_letter_file);



        if ($stmt->execute()) {

            echo "Employee success fully created " . $emp_id;


        } else {
            echo $stmt->error;
        }









    } else {
        echo $con->error;
    }







}
















?>

<?php

$query = "SELECT department_name FROM add_emp_attribute WHERE department_name IS NOT NULL AND department_name != ''";
$result1 = $con->query($query);

$options = [];
if ($result1->num_rows > 0) {
    while ($row = $result1->fetch_assoc()) {
        $options[] = $row['department_name'];
    }
}

$query2 = "SELECT job_role FROM add_emp_attribute WHERE job_role IS NOT NULL AND job_role != ''";
$result3 = $con->query($query2);

$options2 = [];
if ($result3->num_rows > 0) {
    while ($row = $result3->fetch_assoc()) {
        $options2[] = $row['job_role'];
    }
}


?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.4/dist/tailwind.min.css" rel="stylesheet">
    <title>Create Employee Form</title>
</head>

<body>
    <div id="create_section" class="mt-5 border border-gray-900 p-5 rounded-lg mx-5">
        <form action="#" method="POST" enctype="multipart/form-data>">
            <h1 class="text-center underline text-3xl mb-3 font-bold">Create Employee Form</h1>
            <div class="block md:flex gap-x-4">
                <fieldset class="w-full border border-gray-500 p-4 rounded-md">
                    <legend class="font-bold text-sm">Employee Information</legend>
                    <div class="">
                        <div class="flex gap-x-9 flex-wrap">

                            <div>
                                <label for="email"
                                    class="block  mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Joiner(New/Old)
                                    :
                                </label>
                                <input required type="text" name="joiner_new_old" placeholder="Enter joiner status"
                                    class="w-40 rounded-md border mb-3 text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            </div>
                            <div class="">
                                <label
                                    class="block w-40 mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">S.
                                    No : </label>
                                <input required type="text" name="serial_no" placeholder="Enter serial number"
                                    class="w-40 rounded-md border mb-3 text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            </div>
                            <div class="">
                                <label
                                    class="block w-40 mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Name
                                    : </label>
                                <input required type="text" name="emp_name" placeholder="Enter full name"
                                    value="<?php echo isset($emp_name) ? $emp_name : ''; ?>"
                                    class="w-40 rounded-md border mb-3 text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            </div>
                            <div class="">
                                <label
                                    class="block w-40 mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">DOB
                                    :
                                </label>
                                <input required type="date" name="emp_dob"
                                    value="<?php echo isset($emp_dob) ? $emp_dob : ''; ?>"
                                    class="w-40 rounded-md border mb-3 text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            </div>
                            <div class="">
                                <label
                                    class="block w-40 mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Department
                                    :
                                </label>
                                <!-- <input required type="text" name="emp_department" placeholder="Enter department"
                                    value="<?php echo isset($emp_department) ? $emp_department : ''; ?>"
                                    class="w-40 rounded-md border mb-3 text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" /> -->
                                <select name="department_name"
                                    class="bg-gray-50 border  border-gray-300 text-gray-900 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-40 p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected hidden>Select one</option>
                                    <?php foreach ($options as $option) { ?>
                                        <option class="" value="<?php echo $option; ?>"><?php echo $option; ?>
                                        </option>
                                    <?php } ?>

                                </select>
                            </div>
                            <div class="">
                                <label
                                    class="block w-40 mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Mobile
                                    No : </label>
                                <input required type="number" name="emp_mobile_no" placeholder="Enter mobile number"
                                    value="<?php echo isset($emp_mobile_no) ? $emp_mobile_no : ''; ?>"
                                    class="w-40 rounded-md border mb-3 text-xs border-gray-500 bg-white pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            </div>
                            <div class="">
                                <label
                                    class="block w-40 mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Address
                                    :
                                </label>
                                <input required type="text" name="emp_address" placeholder="Enter address"
                                    value="<?php echo isset($emp_address) ? $emp_address : ''; ?>"
                                    class="w-40 rounded-md border mb-3 text-xs border-gray-500 bg-white pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            </div>
                            <div class="">
                                <label
                                    class="block  mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">E-mail
                                    Address : </label>
                                <input required type="text" name="emp_email" placeholder="Enter email address"
                                    value="<?php echo isset($emp_email) ? $emp_email : ''; ?>"
                                    class="w-40 rounded-md border mb-3 text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            </div>
                            <div class="">
                                <label
                                    class="block w-40 mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Pan
                                    Card Number : </label>
                                <input required type="text" name="emp_pan_card" placeholder="Enter Pan Card"
                                    class="w-40 rounded-md border mb-3 text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            </div>
                            <div class="">
                                <label
                                    class="block w-40 mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Choose
                                    Image : </label>
                                <input type="file" name="fileToUpload" id="fileInput" accept="image/*" />
                            </div>
                        </div>


                        <div class="flex justify-between flex-wrap">


                        </div>
                    </div>
                </fieldset>
                <div class="w-44 h-44 mt-3 border border-gray-900 rounded-md">
                    <img class="h-44 rounded-md" id="profile_image" alt="Item image">
                </div>
            </div>

            <div class="mt-4">
                <fieldset class="w-full border p-4 border-gray-500 rounded-md">
                    <legend class="font-bold text-sm">Organization Information</legend>
                    <div class="flex flex-wrap items-center gap-x-9">
                        <div class="">
                            <label class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Old
                                Organization Name :
                            </label>
                            <input required type="text" name="old_organization_name" placeholder="Enter organization"
                                value="<?php echo isset($old_organize_name) ? $old_organize_name : ''; ?>"
                                class="w-40 rounded-md border mb-3 text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                        <div class="">
                            <label
                                class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Deputed
                                to (Location) :
                            </label>
                            <input required type="text" name="deputed_location" placeholder="Enter location"
                                value="<?php echo isset($deputed_location) ? $deputed_location : ''; ?>"
                                class="w-40 rounded-md border mb-3 text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                        <div class="">
                            <label class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Last
                                CTC :
                            </label>
                            <input required type="text" name="last_ctc" placeholder="Enter last CTC"
                                value="<?php echo isset($last_ctc) ? $last_ctc : ''; ?>"
                                class="w-40 rounded-md border mb-3 text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                        <div class="">
                            <label
                                class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Current
                                CTC Offered :
                            </label>
                            <input required type="text" name="current_ctc" placeholder="Enter current CTC"
                                value="<?php echo isset($current_ctc) ? $current_ctc : ''; ?>"
                                class="w-40 rounded-md border  mb-3  text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                        <div class="">
                            <label
                                class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Tentative
                                Date of Joining :
                            </label>
                            <input required type="date" name="tentative_date"
                                value="<?php echo isset($tentative_date_joining) ? $tentative_date_joining : ''; ?>"
                                class="w-40 rounded-md border  mb-3  text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                        <div class="">
                            <label class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Exact
                                Date of Joining :
                            </label>
                            <input required type="date" name="exact_date"
                                value="<?php echo isset($exact_date) ? $exact_date : ''; ?>"
                                class="w-40 rounded-md border  mb-3  text-xs border-gray-500 bg-white pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                        <div class="">
                            <label class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Notice
                                Period :
                            </label>
                            <input required type="text" name="notice_period" placeholder="Enter notice period"
                                value="<?php echo isset($notice_period) ? $notice_period : ''; ?>"
                                class="w-40 rounded-md border mb-3 text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                    </div>


                    <div class="flex flex-wrap items-center gap-x-9">
                        <div class="">
                            <label class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Notice
                                Served (Yes/No) :
                            </label>
                            <input required type="text" name="notice_served" placeholder="Enter yes or no"
                                value="<?php echo isset($notice_served) ? $notice_served : ''; ?>"
                                class="w-40 rounded-md border mb-3 text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                        <div class="">
                            <label class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Job
                                Role :
                            </label>
                            <!-- <input required type="text" name="job_role" placeholder="Enter role"
                                value="<?php echo isset($job_role) ? $job_role : ''; ?>"
                                class="w-40 rounded-md border mb-3 text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" /> -->

                            <select name="sub_head" id="sub_head_select"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-40 p-1 mb-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected hidden>Select one</option>
                                <?php foreach ($options2 as $option) { ?>
                                    <option class="" value="<?php echo $option; ?>"><?php echo $option; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="">
                            <label class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Job
                                Description :
                            </label>
                            <input required type="text" name="job_description" placeholder="Enter description"
                                value="<?php echo isset($job_description) ? $job_description : ''; ?>"
                                class="w-40 rounded-md border mb-3 text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                        <div class="">
                            <label class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Date
                                of Anniversary :
                            </label>
                            <input required type="date" name="date_of_anniversary"
                                value="<?php echo isset($date_of_anniversary) ? $date_of_anniversary : ''; ?>"
                                class="w-40 rounded-md border mb-3 text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                        <div class="">
                            <label class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Offer
                                Letter Release Date :
                            </label>
                            <input required type="date" name="offer_letter_date"
                                value="<?php echo isset($offer_letter_date) ? $offer_letter_date : ''; ?>"
                                class="w-40 rounded-md border mb-3 text-xs border-gray-500 bg-white pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />

                        </div>
                        <div class="">
                            <label class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Upload
                                offer letter

                            </label>
                            <input type="file" name="offer_letter_file"
                                value="<?php echo isset($offer_letter_file) ? $offer_letter_file : ''; ?>"
                                class="w-40 border-none text-xs border-gray-500 bg-white text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                    </div>
                    <div class="flex gap-x-9 flex-wrap">
                        <div class="">
                            <label class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Date
                                of
                                Leaving :
                            </label>
                            <input required type="date" name="date_of_leaving"
                                value="<?php echo isset($date_of_leaving) ? $date_of_leaving : ''; ?>"
                                class="w-40 rounded-md border text-xs border-gray-500 bg-white pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />

                        </div>

                        <div class="">
                            <label class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Upload
                                leaving letter :
                            </label>
                            <input type="file" name="leavnig_letter_file"
                                value="<?php echo isset($leavnig_letter_file) ? $leavnig_letter_file : ''; ?>"
                                class="w-40 border-none text-xs border-gray-500 bg-white text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>


                    </div>
                </fieldset>
            </div>

            <div class="w-full mt-4 flex justify-center gap-x-5">
                <button type="text"
                    class="w-28 text-white border border-blue-700 bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-xs py-2.5 text-center me-2 font-bold dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800 ">Save</button>
                <!-- <button type="text"
                class="w-28 text-white border border-blue-700 bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-xs  py-2.5 text-center me-2 mb-2 font-bold dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800 ">Save</button> -->
                <div>



                    <button type="submit"
                        class="w-28 text-white border border-blue-700 bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-xs py-2.5 text-center me-2 font-bold dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800 ">Submit
                        Now</button>
                </div>
            </div>
        </form>
    </div>

    <script>

        //Update By Antosh Kumar Pandey 25-10-2024 16:42
        // function previewImage(event) {
        //     var input = event.target;
        //     var image = document.getElementById('profile_image');
        //     if (input.files && input.files[0]) {
        //         var reader = new FileReader();
        //         reader.onload = function (e) {
        //             image.src = e.target.result;
        //         }
        //         reader.readAsDataURL(input.files[0]);
        //     }

        //     console.log("Accept")

        // }

        document.getElementById('fileInput').addEventListener('change', function (event) {
            const file = event.target.files[0];
            const preview = document.getElementById('profile_image');

            if (file) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };

                reader.readAsDataURL(file);
            } else {
                preview.style.display = 'none';
            }
        });




    </script>




</body>

</html>