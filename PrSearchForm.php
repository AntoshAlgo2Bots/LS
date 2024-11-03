<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.4/dist/tailwind.min.css" rel="stylesheet">
    <title>Search Requisition Form</title>
</head>

<body>
    <div id="create_section" class="mt-5 border border-gray-900 p-5 rounded-lg mx-5">
        <h1 class="text-center underline text-3xl mb-3 font-bold">Search Requisition Form</h1>
        <div class="flex">

            <form class="w-full border border-gray-500 p-3 rounded-md">
                <div class="">
                    <div class="flex justify-between flex-wrap">

                        <!-- <div>
                            <label for="email"
                                class="block  mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">New BOM
                                :
                            </label>
                            <input type="text"
                                class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div> -->

                        <div>
                            <label for="s_no" class="block mb-2 font-bold text-xs font-medium text-gray-900">Record
                                Number:</label>
                            <input type="text" name="header_id" id="id" value=""
                                class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />

                            <button type="button" id="search"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-xs rounded-lg text-sm px-5 py-1 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Search</button>
                        </div>

                        <div class="">
                            <label
                                class="block w-40 mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Department Name: </label>
                            <input type="text" name="department_name" id="department_name"
                                class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                        <div class="">
                            <label
                                class="block w-40 mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Created By </label>
                            <input type="text" name="created_by" id="created_by"
                                class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                        <div class="">
                            <label
                                class="block w-40 mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Created Date:
                            </label>
                            <input type="text" name="created_date" id="created_date"
                                class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                        <!-- <div class="">
                            <label
                                class="block w-40 mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Products
                                :
                            </label>
                            <input type="text" name="products" id="products"
                                class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div> -->
                    </div>


                    <!-- <div class="flex justify-between flex-wrap mt-3 ">

                        <div class="">
                            <label
                                class="block w-40 mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">So Number : </label>
                            <input type="date" name="so_number" id="so_number"
                                class="w-40 rounded-md border text-xs border-gray-500 bg-white pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                        <div class="">
                            <label
                                class="block w-40 mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Item Name :
                            </label>
                            <input type="text" name="item_name" id="item_name"
                                class="w-40 rounded-md border text-xs border-gray-500 bg-white pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                        <div class="">
                            <label
                                class="block  mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Item Code : </label>
                            <input type="text" name="item_code" id="item_code"
                                class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                        <div class="">
                            <label
                                class="block w-40 mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Quantity : </label>
                            <input type="text" name="quantity" id="quantity"
                                class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                        <div class="">
                            <label
                                class="block w-40 mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">User Remarks : </label>
                            <input type="text" name="user_remarks" id="user_remarks"
                                class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                        <div class="">
                            <label
                                class="block w-40 mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Price : </label>
                            <input type="text" name="price" id="price"
                                class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                        <div class="">
                            <label
                                class="block w-40 mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Date Hand Hover : </label>
                            <input type="date" name="date_hand_hover" id="date_hand_hover"
                                class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                        <div class="">
                            <label
                                class="block w-40 mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Handover Over By : </label>
                            <input type="text" name="handover_over_by" id="handover_over_by"
                                class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
 -->


                        <!-- <div class="invisible">
                            <label
                                class="block w-40 mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Choose
                                Image : </label>
                            <input type="file" accept="image/*" id="uploadImageItem" onchange="previewImage(event)"
                                class="w-40 border-none text-xs border-gray-500 bg-white text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div> -->
                    </div>
                </div>
            </form>
            <!-- <div class="w-40 h-40 border border-gray-900 rounded-md ml-4"> -->
                <!-- <img class="w-40 h-40" id="preview" alt="Item image"> -->

                <!-- <img class="w-40 h-40" name="img_path" id="preview" alt="Item image"> -->

            </div>
        </div>

        <!-- <div class="mt-6">
            <form class="w-full border p-3 border-gray-500 rounded-md">
                <div class="flex flex-wrap items-center justify-between">
                    <div class="ml-2">
                        <label class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Item Seq
                            :
                        </label>
                        <input type="text" name="email" id="email"
                            class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="ml-2">
                        <label class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Process Seq:
                        </label>
                        <input type="text" name="email" id="email"
                            class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="ml-2">
                        <label class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Item code  :
                        </label>
                        <input type="text" name="email" id="email"
                            class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="ml-2">
                        <label class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">
                            Item Name :
                        </label>
                        <input type="text" name="email" id="email"
                            class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="ml-2">
                        <label class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Qty :
                        </label>
                        <input type="text" name="email" id="email"
                            class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="ml-2">
                        <label class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Percentage :
                        </label>
                        <input type="number" name="email" id="email"
                            class="w-40 rounded-md border text-xs border-gray-500 bg-white pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                </div>
                <div class="flex flex-wrap items-center border-gray-500 justify-between border-t mt-2">
                    <div class="ml-2 mt-2">
                        <input type="text" name="email" id="email"
                            class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="ml-2 mt-2">
                        <input type="text" name="email" id="email"
                            class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="ml-2 mt-2">
                        <input type="text" name="email" id="email"
                            class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="ml-2 mt-2">
                        <input type="text" name="email" id="email"
                            class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="ml-2 mt-2">
                        <input type="text" name="email" id="email"
                            class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="ml-2 mt-2">
                        <input type="number" name="email" id="email"
                            class="w-40 rounded-md border text-xs border-gray-500 bg-white pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                </div>
                <div class="flex flex-wrap items-center border-gray-500 justify-between border-t mt-2">
                    <div class="ml-2 mt-2">
                        <input type="text" name="email" id="email"
                            class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="ml-2 mt-2">
                        <input type="text" name="email" id="email"
                            class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="ml-2 mt-2">
                        <input type="text" name="email" id="email"
                            class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="ml-2 mt-2">
                        <input type="text" name="email" id="email"
                            class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="ml-2 mt-2">
                        <input type="text" name="email" id="email"
                            class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="ml-2 mt-2">
                        <input type="number" name="email" id="email"
                            class="w-40 rounded-md border text-xs border-gray-500 bg-white pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                </div>
                <div class="flex flex-wrap items-center border-gray-500 justify-between border-t mt-2">
                    <div class="ml-2 mt-2">
                        <input type="text" name="email" id="email"
                            class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="ml-2 mt-2">
                        <input type="text" name="email" id="email"
                            class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="ml-2 mt-2">
                        <input type="text" name="email" id="email"
                            class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="ml-2 mt-2">
                        <input type="text" name="email" id="email"
                            class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="ml-2 mt-2">
                        <input type="text" name="email" id="email"
                            class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="ml-2 mt-2">
                        <input type="number" name="email" id="email"
                            class="w-40 rounded-md border text-xs border-gray-500 bg-white pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                </div>
            </form>
        </div> -->

        <div class="relative overflow-x-auto mt-4 mb-5">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 border border-gray-700  my-5">
                <thead class="pt-5 border-b border-gray-900">
                    <tr class="text-xs text-gray-700 whitespace-nowrap uppercase bg-gray-50 ">
                        <!-- <th scope="col" class="px-6 py-3"></th>

                        </th> -->
                        <th scope="col" class="px-6 py-3">
                            S No . :
                        </th>
                        <th scope="col" class="px-6 py-3">
                        So. Number:
                        </th>
                        <th scope="col" class="px-6 py-3">
                        Item Name :
                        </th>
                        <th scope="col" class="px-6 py-3">
                        Item Code :
                        </th>
                        <th scope="col" class="px-6 py-3">
                        Quantity	 :
                        </th>
                        <th scope="col" class="px-6 py-3">
                        User Remarks:
                        </th>
                        <th scope="col" class="px-6 py-3">
                        Requisition Type	:
                        </th>
                        <th scope="col" class="px-6 py-3">
                        Price:
                        </th>
                        <th scope="col" class="px-6 py-3">
                        Date Hand Hover	:
                        </th>
                        <th scope="col" class="px-6 py-3">
                        Handover Over By:
                        </th>
                        <th scope="col" class="px-6 py-3">
                        Status:
                        </th>
                        <th scope="col" class="px-6 py-3">
                        Final Remarks:
                        </th>
                        <th scope="col" class="px-6 py-3">
                        Po Number:
                        </th>
                        <th scope="col" class="px-6 py-3">
                        PO Status:
                        </th>
                        <!-- <th scope="col" class="px-6 py-3">
                            SO Number
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Creadted By
                        </th> -->
                    </tr>
                </thead>
                <tbody id="BomLineDetail">
                    <!-- <tr class="bg-white border-b dark:border-gray-700">
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            <input id="default-checkbox" type="checkbox" value=""
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:border-gray-600"> -->
                    <!-- </td> -->




                    <tr>
                        <td scope="row" class="px-6 py-4 ">
                            <input type="text" name="so_number" id="so_number">

                        </td>
                        <td class="px-6 py-4">
                            <input type="text" name="item_name" id="item_name">

                        </td>
                        <td class="px-6 py-4">
                            <input type="text" name="item_code" id="item_code">

                        </td>
                        <td class="px-6 py-4">
                            <input type="text" name="quantity" id="quantity">

                        </td>
                        <td class="px-6 py-4">
                            <input type="text" name="user_remarks" id="user_remarks">

                        </td>

                        <td class="px-6 py-4">
                            <input type="text" name="price" id="price">

                        </td><td class="px-6 py-4">
                            <input type="text" name="date_hand_hover" id="date_hand_hover">

                        </td><td class="px-6 py-4">
                            <input type="text" name="handover_over_by" id="handover_over_by">

                        </td><td class="px-6 py-4">
                            <input type="text" name="status" id="status">

                        </td><td class="px-6 py-4">
                            <input type="text" name="final_remarks" id="final_remarks">

                        </td><td class="px-6 py-4">
                            <input type="text" name="po_number" id="po_number">

                        </td><td class="px-6 py-4">
                            <input type="text" name="po_status" id="po_status">

                        </td>
                    </tr>







                    <!-- <tr class="bg-white border-b dark:border-gray-700"> -->
                    <!-- <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            <input id="default-checkbox" type="checkbox" value=""
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:border-gray-600">
                        </td> -->
                    <!-- <td scope="row" class="px-6 py-4">
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
                    </tr> -->
                </tbody>

            </table>
        </div>
        <div class="w-full mt-5 flex justify-around">
            <!-- <button type="text"
                class="w-28 text-white border border-blue-700 bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-xs py-2.5 text-center me-2 mb-2 font-bold dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800 ">Clear
                Form</button> -->
            <button type="text"
                class="w-28 text-white border border-blue-700 bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-xs py-2.5 text-center me-2 mb-2 font-bold dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800 ">Search</button>
            <!-- <button type="text"
                class="w-28 text-white border border-blue-700 bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-xs  py-2.5 text-center me-2 mb-2 font-bold dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800 ">Save</button> -->
            <div>
                <button type="text"
                    class="w-28 text-white border border-blue-700 bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-xs py-2.5 text-center me-2 font-bold dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800 ">Create
                    BOM</button>
            </div>
        </div>
    </div>

    <script>
        function previewImage(event) {
            var input = event.target;
            var image = document.getElementById('preview');
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    image.src = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
            }

            console.log("Accept")
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#search').click(function(e) {
                e.preventDefault();
                var srch = $('#id').val();

                // Log to confirm the search was triggered
                console.log("Search initiated for:", srch);







                $.post("./phpAjax/PrsearchForm.php", {
                    srch
                }, function(data) {
                    console.log("Response received:", data);

                    // console.log( $("#dateInput").val(data.data.created_date || ''));

                    if (data.success) {
                        let resdata = data.data;



                        //  $("#preview").attr("src",`http://localhost/Luxxard/newbom/uploads/${resdata[0].img_path}`);

                        $("#BomLineDetail").html(" ")

                        resdata.forEach((element, index) => {

                            $("#BomLineDetail").append(`
                            
                                      <tr class="border-2 borer-black">
                            <td  class="px-6 py-4">
                       ${index}
                            </td>
                                      
                            <td class="px-6 py-4 ">
                                

                        ${element.so_number}



                            </td>
                            <td class="px-6 py-4">
                               ${element.item_name}

                            </td>
                            <td class="px-6 py-4">
                        ${element.item_code}

                            </td>
                            <td class="px-6 py-4">
                                ${element.quantity}

                            </td>
                            <td class="px-6 py-4">
                        ${element.user_remarks}

                            </td>
                            <td class="px-6 py-4">
                        ${element.price}

                            </td>
                            <td class="px-6 py-4">
                        ${element.date_hand_hover}

                            </td>
                            <td class="px-6 py-4">
                        ${element.handover_over_by}

                            </td>
                            <td class="px-6 py-4">
                        ${element.status}

                            </td>
                            <td class="px-6 py-4">
                        ${element.final_remarks}

                            </td>
                            <td class="px-6 py-4">
                        ${element.po_number}

                            </td>
                            <td class="px-6 py-4">
                        ${element.po_status}

                            </td>
                      
                        </tr>
                            
                            
                            
                            `)

                        });






                        $("#department_name").val(resdata[0].department_name );
                        $("#created_by").val(resdata[0].created_by || '');
                        $("#created_date").val(resdata[0].created_date || '');
                       
                        // $("#uploadImageItem").val(data.data.img_path || '');



                        // $("#so_number").val(data.data.so_number || '');
                        // $("#item_name").val(data.data.item_name || '');
                        // $("#item_code").val(data.data.item_code || '');
                        // $("#quantity").val(data.data.quantity || '');
                        // $("#user_remarks").val(data.data.user_remarks || '');
                        // $("#date_hand_hover").val(data.data.date_hand_hover || '');
                        // $("#handover_over_by").val(data.data.handover_over_by || '');
                        // $("#status").val(data.data.status || '');
                        // $("#po_number").val(data.data.po_number || '');
                        // $("#po_status").val(data.data.po_status || '');
                       


                    } else {
                        // Handle the case when the search is unsuccessful
                        alert(data.message || "No results found.");
                    }
                }, "json").fail(function(error) {
                    console.log(error)
                    alert("An error occurred while processing your request. Please try again.");
                });
            });
        });
    </script>
</body>

</html>