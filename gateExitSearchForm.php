<?php include("./navForLogged.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.4/dist/tailwind.min.css" rel="stylesheet">
    <title>Gate Exit Search Form</title>
</head>

<body>
    <div id="create_section" class="mt-5 bg-gray-100 border border-gray-900 p-5 rounded-lg mx-5">
        <h1 class="text-center underline text-3xl mb-3 font-bold">Gate Entry Search Form</h1>
        <form class="w-full border border-gray-500 p-3 rounded-md" id="frmstore">
            <div class="w-full border border-gray-500 p-3 rounded-md">
                <div class="flex justify-between flex-wrap">
                    <div>
                        <label for="s_no" class="block mb-2 font-bold text-xs font-medium text-gray-900">Record
                            Number:</label>
                        <input type="text" name="s_no" id="id" value=""
                            class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />

                        <button type="button" id="search"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-xs rounded-lg text-xs px-4 py-1 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Search</button>
                    </div>
                    <div>
                        <label for="created_date"
                            class="block w-36 mb-2 font-bold text-xs font-medium text-gray-900">Created Date:</label>
                        <input type="date" name="created_date" id="created_date"
                            class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" disabled />
                    </div>
                    <div>
                        <label for="created_by"
                            class="block w-36 mb-2 font-bold text-xs font-medium text-gray-900">Created By:</label>
                        <input type="text" name="created_by" id="created_by"
                            class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" disabled />
                    </div>
                </div>
            </div>

            <div class="flex flex-wrap m-2 gap-x-20">
                <div>
                    <label for="po_number" class="block mb-2 font-bold text-xs font-medium text-gray-900">Enter PO
                        Number:</label>
                    <input name="po_number" id="po_number" type="text"
                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" disabled />
                </div>

                <div>
                    <label for="invoice_number"
                        class="block w-40 mb-2 font-bold text-xs font-medium text-gray-900">Invoice Number:</label>
                    <input type="text" name="invoice_number" id="invoice_number"
                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" disabled />
                </div>
                <div>
                    <label for="mode_of_transport"
                        class="block w-40 mb-2 font-bold text-xs font-medium text-gray-900">Mode of Transport:</label>
                    <input type="text" name="mode_of_transport" id="mode_of_transport"
                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" disabled />
                </div>
                <div>
                    <label for="vehicle_number"
                        class="block w-40 mb-2 font-bold text-xs font-medium text-gray-900">Vehicle Number:</label>
                    <input type="text" name="vehicle_number" id="vehicle_number"
                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" disabled />
                </div>
                <div>
                    <label for="no_of_boxes" class="block w-40 mb-2 font-bold text-xs font-medium text-gray-900">No. Of
                        Boxes:</label>
                    <input type="text" name="no_of_boxes" id="no_of_boxes"
                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" disabled />
                </div>
                <div>
                    <label for="weight"
                        class="block w-40 mb-2 font-bold text-xs font-medium text-gray-900">Weight:</label>
                    <input type="text" name="weight" id="weight"
                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" disabled />
                </div>
            </div>

            <div class="flex flex-wrap m-2 gap-x-20 mt-5">
                <div>
                    <label for="fireght_charges"
                        class="block w-40 mb-2 font-bold text-xs font-medium text-gray-900">Freight Charges:</label>
                    <input type="text" name="fireght_charges" id="fireght_charges"
                        class="w-40 rounded-md border text-xs border-gray-500 bg-white pl-2 text-[#6B7280] mb-5 h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" disabled />
                </div>
                <div>
                    <label for="dispatched_by"
                        class="block w-40 mb-2 font-bold text-xs font-medium text-gray-900">Dispatched By:</label>
                    <input type="text" name="dispatched_by" id="dispatched_by"
                        class="w-40 rounded-md border text-xs border-gray-500 bg-white pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" disabled />
                </div>
                <div>
                    <label for="vendor_name" class="block w-40 mb-2 font-bold text-xs font-medium text-gray-900">Vendor
                        Name:</label>
                    <input type="text" name="vendor_name" id="vendor_name"
                        class="w-40 rounded-md border text-xs border-gray-500 bg-white pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" disabled />
                </div>
                <div>
                    <label for="received_date"
                        class="block w-40 mb-2 font-bold text-xs font-medium text-gray-900">Dispatching Date &
                        Time:</label>
                    <input type="datetime-local" name="dispatching_date_time" id="dispatching_date_time"
                        class="w-40 rounded-md border text-xs border-gray-500 bg-white pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" disabled />
                </div>
                <div>
                    <label for="item_name" class="block w-40 mb-2 font-bold text-xs font-medium text-gray-900">Item
                        Name:</label>
                    <input type="text" name="item_name" id="item_name"
                        class="w-40 rounded-md border text-xs border-gray-500 bg-white pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" disabled />
                </div>
                <div>
                    <label for="finish"
                        class="block w-40 mb-2 font-bold text-xs font-medium text-gray-900">Finish:</label>
                    <input type="text" name="finish" id="finish"
                        class="w-40 rounded-md border text-xs border-gray-500 bg-white pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" disabled />
                </div>
                <div>
                    <label for="dimension"
                        class="block w-40 mb-2 font-bold text-xs font-medium text-gray-900">Dimension:</label>
                    <input type="text" name="dimension" id="dimension"
                        class="w-40 rounded-md border text-xs border-gray-500 bg-white pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" disabled />
                </div>
                <div>
                    <label for="box_detail" class="block w-40 mb-2 font-bold text-xs font-medium text-gray-900">Box
                        Detail:</label>
                    <input type="text" name="box_detail" id="box_detail"
                        class="w-40 rounded-md border text-xs border-gray-500 bg-white pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" disabled />
                </div>
                <div>
                    <label for="checked_by" class="block w-40 mb-2 font-bold text-xs font-medium text-gray-900">Checked
                        By:</label>
                    <input type="text" name="checked_by" id="checked_by"
                        class="w-40 rounded-md border text-xs border-gray-500 bg-white pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" disabled />
                </div>
                <div>
                    <label for="approved_by"
                        class="block w-40 mb-2 font-bold text-xs font-medium text-gray-900">Approved By:</label>
                    <input type="text" name="approved_by" id="approved_by"
                        class="w-40 rounded-md border text-xs border-gray-500 bg-white pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" disabled />
                </div>
                <div>
                    <label for="remarks"
                        class="block w-40 mb-2 font-bold text-xs font-medium text-gray-900">Remarks:</label>
                    <input type="text" name="remarks" id="remarks"
                        class="w-40 rounded-md border text-xs border-gray-500 bg-white pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" disabled />
                </div>
            </div>
            <!-- 
            <div class="flex justify-center items-center">
                <input type="submit" id="result" class="w-40 mt-3 bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 whitespace-nowrap font-medium text-white rounded-md py-2 text-center me-2 mb-3" value="Submit" />
            </div> -->
        </form>
    </div>


</body>

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#search').click(function (e) {
            e.preventDefault();
            var srch = $('#id').val();

            // Log to confirm the search was triggered
            console.log("Search initiated for:", srch);

            $.post("action_searchGateForm.php", { srch }, function (data) {
                console.log("Response received:", data);

                // console.log( $("#dateInput").val(data.data.created_date || ''));

                if (data.success) {
                    // Assuming data.data contains the result
                    $("#po_number").val(data.data.po_number || '');
                    $("#invoice_number").val(data.data.invoice_number || '');
                    $("#no_of_boxes").val(data.data.no_of_boxes || '');
                    $("#fireght_charges").val(data.data.fireght_charges || ''); // Corrected here
                    $("#weight").val(data.data.weight || '');
                    $("#vehicle_number").val(data.data.vehicle_number || '');
                    $("#dispatched_by").val(data.data.dispatched_by || '');
                    $("#remarks").val(data.data.remarks || '');
                    $("#created_date").val(data.data.created_date || '');
                    $("#created_by").val(data.data.created_by || '');
                    $("#vendor_name").val(data.data.vendor_name || '');
                    $("#dispatching_date_time").val(data.data.dispatching_date_time || '');
                    // $("#received_time").val(data.data.received_time || '');
                    $("#item_name").val(data.data.item_name || '');
                    $("#finish").val(data.data.finish || '');
                    $("#dimension").val(data.data.dimension || '');
                    $("#box_detail").val(data.data.box_detail || '');
                    $("#checked_by").val(data.data.checked_by || '');
                    $("#approved_by").val(data.data.approved_by || '');
                    $("#mode_of_transport").val(data.data.mode_of_transport || '');
                    // $("#updated_by").val(data.data.updated_by || '');
                    // $("#updated_date").val(data.data.updated_date || '');
                } else {
                    // Handle the case when the search is unsuccessful
                    alert(data.message || "No results found.");
                }
            }, "json").fail(function (jqXHR, textStatus, errorThrown) {
                console.error("Request failed:", textStatus, errorThrown);
                alert("An error occurred while processing your request. Please try again.");
            });
        });
    });
</script>


</html>