<?php
include('./dbconnection/db.php');

$query = "SELECT department_name FROM requisition_table WHERE department_name IS NOT NULL AND department_name != ''";
$result1 = $con->query($query);

$options = [];
if ($result1->num_rows > 0) {
    while ($row = $result1->fetch_assoc()) {
        $options[] = $row['department_name'];
    }
}

?>



<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.4/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.0/themes/base/jquery-ui.css">
    <!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
    <!-- <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

    <script src="https://code.jquery.com/ui/1.14.0/jquery-ui.js"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script> -->
    <!-- <script src="./js/jquery-3.7.1.min.js"></script> -->



    <title>Create Requisition Form</title>
</head>

<body>
    <div id="create_section" class="mt-5 bg-gray-100 border border-gray-900 p-5 rounded-lg mx-5">
        <h1 class="text-center underline text-3xl mb-3 font-bold">Create Requisition</h1>
        <form method="POST" class="w-full border border-gray-500 p-3 rounded-md" id="frmstore"
            enctype="multipart/form-data">
            <div class="flex">
                <div class="flex flex-wrap m-2 gap-24">
                    <div>
                        <label for="email"
                            class="block  mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Record
                            number :
                        </label>
                        <input id="header_id" type="text" name="header_id" value="" placeholder="Head id" disabled
                            class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />


                    </div>

                    <div class="">
                        <label
                            class="block w-40 mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Created
                            By :
                        </label>
                        <input type="text" name="created_by" onchange="setBomImage()" id="created_by"
                            class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="">
                        <label
                            class="block w-40 mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Created
                            Date : </label>
                        <input type="date" name="created_date"
                            class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />

                    </div>
                    <div class="">
                        <label
                            class="block w-40 mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Department
                            Name :
                        </label>
                        <select name="department_name"
                            class="bg-gray-50 border uppercase border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-40 p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected hidden>Select one</option>
                            <?php foreach ($options as $option) { ?>
                                <option class="uppercase" value="<?php echo $option; ?>"><?php echo $option; ?>
                                </option>
                            <?php } ?>

                        </select>

                    </div>


                  

                    <button type="submit"
                        class="w-20  h-10 bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 whitespace-nowrap font-medium text-white  rounded-md  py-2 text-center me-2 mb-2 mt-4  dark:border-blue-500 dark:text-blue-500 hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800 ">
                        Submit</button>
                </div>




                <!-- <div class="flex border-2 flex-wrap m-2 gap-20">

                    <img src="" name="bomMainImg" id="bomMainImg" alt="please uplaod" width="300px">

                </div> -->

            </div>
        </form>

        <?php

        if (isset($_POST)) {

            ?>
            <form action="" id="bomLinelevel">
                <div class="mt-6">
                    <div class="flex flex-col">
                        <div class="-m-1.5 overflow-x-auto">
                            <div class="p-1.5 min-w-full inline-block align-middle">
                                <div class="overflow-hidden">
                                    <table class="min-w-full whitespace-nowrap mx-auto divide-y divide-gray-200">
                                        <thead>
                                            <tr>
                                                <th scope="col"
                                                    class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                                    S.no</th>

                                                <th scope="col"
                                                    class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                                    So. Number </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                                    Item Name </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">
                                                    Item Code
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">
                                                    Quantity </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">
                                                    User Remarks </th>

                                                <th scope="col"
                                                    class="  py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                                    Requisition Type </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">
                                                    Price </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">
                                                    Date Hand Hover </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">
                                                    Handover Over By </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">
                                                    Status </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">
                                                    Final Remarks </th>

                                                    <th scope="col"
                                                    class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">
                                                    Po Number </th>

                                                    <th scope="col"
                                                    class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">
                                                    PO Status </th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y whitespace-nowrap divide-gray-200" id="poCreteTbody">
                                            <tr class="hover:bg-gray-600">


                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                    <input type="text" value="1"
                                                        class="py-3 px-4 block w-12 border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                                </td>

                                                <td class=" py-4 whitespace-nowrap text-sm mx-3 font-medium text-gray-800">
                                                    <input type="text" name="so_number"
                                                        class="py-3 px-4 block w-full border-gray-200 rounded-lg  focus:border-blue-500 focus:ring-blue-500"
                                                        placeholder="So. Number" required>
                                                </td>

                                                <td class=" py-4 whitespace-nowrap text-sm mx-3 font-medium text-gray-800">
                                                    <input type="text" name="item_name"
                                                        class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500"
                                                        placeholder="Item Name" required>
                                                </td>

                                                <td class=" py-4 whitespace-nowrap text-sm mx-3 font-medium text-gray-800">
                                                    <input type="text" name="item_code"
                                                        class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500"
                                                        placeholder="Item Code" required>
                                                </td>

                                                <td class="py-4 whitespace-nowrap text-sm mx-3 font-medium text-gray-800">
                                                    <input type="number" name="quantity"
                                                        class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500"
                                                        placeholder="Quantity" required>
                                                </td>

                                                <td class=" py-4 whitespace-nowrap text-sm mx-3 font-medium text-gray-800">
                                                    <input type="text" name="user_remarks"
                                                        class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500"
                                                        placeholder="User Remarks" required>
                                                </td>


                                                <td class=" py-4 whitespace-nowrap text-sm mx-3 font-medium text-gray-800">
                                                    <input type="text" name="requisition_type"
                                                        placeholder="Requisition Type"
                                                        class="py-3 px-5 block w-28  border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                        disabled>
                                                </td>
                                                <td class=" py-4 whitespace-nowrap text-sm mx-3 font-medium text-gray-800">
                                                    <input type="text" name="price"
                                                        class="py-3 px-4 block  w-28 mr-5 border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500"
                                                        placeholder="Price" disabled>
                                                </td>
                                                <td class=" py-4 whitespace-nowrap mx-3 text-sm font-medium text-gray-800">
                                                    <input type="date" name="date_hand_hover"
                                                        class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500"
                                                        placeholder="Date Hand Hover" disabled>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                    <input type="text" name="handover_over_by"
                                                        class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500"
                                                        placeholder="Handover Over By" disabled>
                                                </td>
                                                <td class="py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                    <input type="text" name="status"
                                                        class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500"
                                                        placeholder="Status" disabled>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                    <input type="text" name="final_remarks"
                                                        class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500"
                                                        placeholder="Final Remarks" disabled>
                                                </td>


                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                    <input type="text" name=" po_number"
                                                        class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500"
                                                        placeholder=" PO Number" disabled>
                                                </td>


                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                    <input type="text" name="po_status"
                                                        class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500"
                                                        placeholder="PO Status" disabled>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <a href="#_" onclick="addRowItem()"
                                        class="relative inline-block px-4 py-2 font-medium group">
                                        <span
                                            class="absolute inset-0 w-full h-full transition duration-200 ease-out transform translate-x-1 translate-y-1 bg-black group-hover:-translate-x-0 group-hover:-translate-y-0"></span>
                                        <span
                                            class="absolute inset-0 w-full h-full bg-white border-2 border-black group-hover:bg-black"></span>
                                        <span class="relative text-black group-hover:text-white">+ Add item</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="w-full mt-5 flex flex-wrap justify-around">
                        <button type="reset"
                            class="text-white border border-blue-700 bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-xs px-5 py-2.5 text-center me-2 mb-2 font-bold dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Clear
                            Form</button>
                        <!--  -->
                        <button type="submit" onclick="createdBomb()" id="po-save-btn"
                            class="text-white border border-blue-700 bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-xs px-5 py-2.5 text-center me-2 mb-2 font-bold dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Submit</button>
                    </div>
                </div>
            </form>



            <!-- this button is for create direct po fressh inert query -->

            <?php if (isset($po_number)) {

                ?>

                <button type="button" onclick="purchaseOrderDirect()" id="po-submit-btn"
                    class="text-white border border-blue-700 bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-xs px-5 py-2.5 text-center me-2 mb-2 font-bold dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">


                    Submit</button>


                <?php

            } ?>

        </div>
    <?php } ?>



    </div>
</body>





<script>









    const addRowItem = () => {


        let total = document.getElementById("poCreteTbody").querySelectorAll("tr").length


        total++

        let tr = document.createElement("tr")
        tr.classList.add("hover:bg-gray-600")

        tr.innerHTML = `       
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                <input type="txt" id="input-email-label"
                                                    class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                    value=${total}
                                                    placeholder=1 disabled>
                                            </td>
                                               
                                                <td class=" py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                    <input type="text" name="so_number"
                                                        class="py-3 px-4 block w-full border-gray-200 rounded-lg  focus:border-blue-500 focus:ring-blue-500"
                                                        placeholder="So. Number">
                                                </td>
                                                <td class=" py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                    <input type="text" name="item_name"
                                                        class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500"
                                                        placeholder="Item Name">
                                                </td>
                                                <td class=" py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                    <input type="text" name="item_code"
                                                        class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500"
                                                        placeholder="Item Code">
                                                </td>
                                                <td class="py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                    <input type="number" name="quantity"
                                                        class="py-3 mx-1 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500"
                                                        placeholder="Quantity">
                                                </td>
                                                <td class=" py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                    <input type="text" name="user_remarks"
                                                        class="py-3 mx-1 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500"
                                                        placeholder="User Remarks">
                                                </td>


                                                 <td class=" py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                    <input type="text" name="requisition_type"
                                                        placeholder="Requisition Type"
                                                        class="py-3 px-5 block w-28  border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" disabled>
                                                </td>
                                                <td class=" py-4 whitespace-nowrap text-sm  font-medium text-gray-800">
                                                    <input type="text" name="price"
                                                        class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500"
                                                        placeholder="Price" disabled>
                                                </td>
                                                <td class=" py-4 whitespace-nowrap mx-3 text-sm font-medium text-gray-800">
                                                    <input type="date" name="date_hand_hover"
                                                        class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500"
                                                        placeholder="Date Hand Hover" disabled>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                    <input type="text" name="handover_over_by"
                                                        class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500"
                                                        placeholder="Handover Over By" disabled>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                    <input type="text" name="status"
                                                        class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500"
                                                        placeholder="Status" disabled>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                    <input type="text" name="final_remarks"
                                                        class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500"
                                                        placeholder="Final Remarks" disabled>
                                                </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                    <input type="text" name=" po_number"
                                                        class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500"
                                                        placeholder=" PO Number" disabled>
                                                </td>


                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                    <input type="text" name="po_status"
                                                        class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500"
                                                        placeholder="PO Status" disabled>
                                    

                                    `


        $("#poCreteTbody").append(tr)



    }












</script>



<!-- <script src="./jquery.min.js"></script> -->
<script src="./js/Pr.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>

<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

<!-- <script src="./js/jquery-3.7.1.min.js"></script> -->

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
        $.get("./phpAjax/ajax.php", {
            "itemCodeInfoForPr": "itemCodeInfoForPr"
        }, function (data) {

            availableTags = JSON.parse(data);

            console.log(availableTags);
            $("input[name='item_name']").autocomplete({
                source: availableTags
            });




            $("input[name='Item_name']").autocomplete({
                source: availableTags
            });


            $("input[name='item_code']").autocomplete({
                source: availableTags
            });


        })

    });
</script>


 <script>





    function setUploadedImage(event) {




        const file = event.target.files[0];

        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();

            reader.onload = function (e) {
                const imagePreview = document.getElementById('bomMainImg');
                imagePreview.src = e.target.result;
            };

            reader.readAsDataURL(file);
        } else {
            alert('Please select a valid image file.');
        }





    }



    const setBomImage = () => {

        console.log("image selected");



    }



    $(document).ready(function () {
        
        $('#frmstore').submit( async function (e) {

            
            

            e.preventDefault(); // Prevent the default form submission
            
            var frmData = new FormData(this); // Create FormData object from the form
            
            
            
            let filename="" ;
            
        //    await  $.ajax({
        //         url: 'upload.php', // PHP file to handle upload
        //         type: 'POST',
        //         data: frmData,
        //         contentType: false,
        //         processData: false,
        //         success: function (response) {

        //             // console.log(response)
                    
        //             if(response.status){
        //                 console.log(response)
        //                         console.log("response file name is "+ response.filename);
                                
                               
        //                 filename = response.filename;
                        
                        
        //             }else{
        //                 alert("Error: "); // Show specific error message
        //                 return alert("Error: Something wrong "); // Show specific error message
        //             }    
                    
                    
                    
                    
                    
        //         },
        //         error: function (error) {
        //             // console.log(error.responseText);
        //         }
        //     });
            
            console.log("File name is"+filename);
            
            // Append additional data to FormData
            
            // Append additional data to FormData
            frmData.append("createBomHead", "createBomHead");

            console.log(filename)

            frmData.append("filename", filename);

               await $.ajax({
                url: "./phpAjax/bomAjax.php", // URL to send the request to
                type: "POST", // HTTP method
                dataType: "json", // Expected response format
                data: frmData, // Form data
                contentType: false, // Important for FormData
                processData: false, // Important for FormData
                success: function (response) {
                    console.log("This is from the success block");
                    console.log(response);

                    if (response && response.Record_no) {
                        console.log(response.Record_no);
                        $("#header_id").val(response.Record_no); // Set the value to response.Record_no
                            
                   



                        alert("Form submitted successfully! Your Record No is " + response.Record_no);

                        // Optionally reset the form here if needed
                        // $('#frmstore')[0].reset();
                    } else {
                        alert("Error: " + response.message); // Show specific error message
                    }
                },
                error: function (error) {
                    console.log(error.responseText); //
                     
                    alert("An error occurred: "); // Alert the user
                }
            });
        });

    });





    $(document).ready(function () {
        $('#bomLinelevel').submit(function (e) {
            e.preventDefault();
            var frmData = $(this).serialize();

            $.post("./phpAjax/bomAjax.php", frmData, function (data) {
                console.log("This is from success block");
                console.log(data);
                console.log(data.message);

                if (data.success) {
                    // let inserted_id = response.Record_no; // Use inserted_id instead of header_id
                    //console.log(response.Record_no);

                    // $("#header_id").val(response.Record_no); // Set the value to response.Record_no


                    alert("Form submitted successfully! Your Record No is " + data.Record_no);

                    // Reset form on success
                } else {
                    alert("Error: " + data.message); // Show specific error message
                }
                $('#bomLinelevel')[0].reset();
            }).fail(function (jqXHR, textStatus, errorThrown) {
                console.log("This is the error block");
                console.error("Error details:", textStatus, errorThrown);
                alert("An error occurred: " + textStatus);
            });
        });
    });


















    // $(document).ready(function () {
    //          $('#search').click(function (e) {
    //              e.preventDefault();
    //             var srch = $('#supplier_code').val();

    //             $.post("actionAslCreateForm.php", { srch }, function (data) {

    //                 console.log(data)
    //                 var res = data

    //                 console.log(data);
                    
    //                 $("#supplier_name").val(res.data.supplier_name);
                    
                    
                


    //             }, "json")
    //          })
    //     });

</script> 

<!-- <script>





    function setUploadedImage(event) {




        const file = event.target.files[0];

        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();

            reader.onload = function (e) {
                const imagePreview = document.getElementById('bomMainImg');
                imagePreview.src = e.target.result;
            };

            reader.readAsDataURL(file);
        } else {
            alert('Please select a valid image file.');
        }





    }



    const setBomImage = () => {





        console.log("image selected");



        // let item_code = $("#item_name").val()


        // let data = {
        //     item_code: item_code,
        //     getImgName: "getImgName"

        // }

        // $.get("ajax.php", data, function (data) {

        //     console.log(data);




        //     if(data.success){




        //         $("#bomMainImg").attr("src", `images/${data.imgpath}`);



        //     }




        // },"JSON").fail(error=>{
        //     console.log(error.responseText);
        // })
















    }

    $(document).ready(function () {
        // $('#frmstore').submit(function (e) {
        //     e.preventDefault();

        //      var frmData = new FormData(this);


        //      keys = Object.keys(frmData);


        //      console.log(keys);

        //     frmData += "&createBomHead=createBomHead";



        //         console.log(frmData);




        //     $.post("bomAjax.php", frmData, function (response) {
        //         console.log("This is from success block");
        //         console.log(response);
        //         console.log(response.message);

        //         if (response) {
        //             // let inserted_id = response.Record_no; // Use inserted_id instead of header_id
        //             console.log(response.Record_no);

        //             $("#header_id").val(response.Record_no); // Set the value to response.Record_no


        //             alert("Form submitted successfully! Your Record No is " + response.Record_no);

        //             // Reset form on success
        //         } else {
        //             alert("Error: " + response.message); // Show specific error message
        //         }
        //     }, "JSON").fail(function (jqXHR, textStatus, errorThrown) {
        //         console.log("This is the error block");
        //         console.error("Error details:", textStatus, errorThrown);
        //         alert("An error occurred: " + textStatus);
        //     });
        //     $('#frmstore')[0].reset();
        // });
        $('#frmstore').submit( async function (e) {

            
            

            e.preventDefault(); // Prevent the default form submission
            
            var frmData = new FormData(this); // Create FormData object from the form
            
            
            
            let filename="" ;
            
           await  $.ajax({
                url: 'upload.php', // PHP file to handle upload
                type: 'POST',
                data: frmData,
                contentType: false,
                processData: false,
                success: function (response) {

                    // console.log(response)
                    
                    if(response.status){
                        console.log(response)
                                console.log("response file name is "+ response.filename);
                                
                               
                        filename = response.filename;
                        
                        
                    }else{
                        alert("Error: "); // Show specific error message
                        return alert("Error: Something wrong "); // Show specific error message
                    }    
                    
                    
                    
                    
                    
                },
                error: function (error) {
                    // console.log(error.responseText);
                }
            });
            
            console.log("File name is"+filename);
            
            // Append additional data to FormData
            
            // Append additional data to FormData
            frmData.append("createBomHead", "createBomHead");

            console.log(filename)

            frmData.append("filename", filename);

            // Logging FormData for debugging


            // Send the FormData using $.ajax













               await $.ajax({
                url: "./phpAjax/bomAjax.php", // URL to send the request to
                type: "POST", // HTTP method
                dataType: "json", // Expected response format
                data: frmData, // Form data
                contentType: false, // Important for FormData
                processData: false, // Important for FormData
                success: function (response) {
                    console.log("This is from the success block");
                    console.log(response);

                    if (response && response.Record_no) {
                        console.log(response.Record_no);
                        $("#header_id").val(response.Record_no); // Set the value to response.Record_no
                            
                   



                        alert("Form submitted successfully! Your Record No is " + response.Record_no);

                        // Optionally reset the form here if needed
                        // $('#frmstore')[0].reset();
                    } else {
                        alert("Error: " + response.message); // Show specific error message
                    }
                },
                error: function (error) {
                    console.log(error.responseText); //
                     
                    alert("An error occurred: "); // Alert the user
                }
            });
        });

    });





    $(document).ready(function () {
        $('#bomLinelevel').submit(function (e) {
            e.preventDefault();
            var frmData = $(this).serialize();

            $.post("./phpAjax/bomAjax.php", frmData, function (response) {
                console.log("This is from success block");
                console.log(response);
                console.log(response.message);

                if (response) {
                    // let inserted_id = response.Record_no; // Use inserted_id instead of header_id
                    //console.log(response.Record_no);

                    // $("#header_id").val(response.Record_no); // Set the value to response.Record_no


                    alert("Form submitted successfully! Your Record No is " + response.Record_no);

                    // Reset form on success
                } else {
                    alert("Error: " + response.message); // Show specific error message
                }
            }).fail(function (jqXHR, textStatus, errorThrown) {
                console.log("This is the error block");
                console.error("Error details:", textStatus, errorThrown);
                alert("An error occurred: " + textStatus);
            });
            $('#bomLinelevel')[0].reset();
        });
    });

</script> -->



</html>