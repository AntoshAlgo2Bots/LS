<!DOCTYPE htmltext <html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.4/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <title>Miscellaneous Form</title>
</head>

<body style="counter-reset: Serial;">
    <div class="w-5/6 m-auto background-{#FF8A8A}">
        <h1 class="text-center underline text-3xl font-bold m-2 mb-5">Miscellaneous Receipt Form</h1>

        <div id="create_section" class="mt-2 border border-gray-900 p-5 rounded-lg">
            <form class="w-full border border-gray-900 p-3 rounded-md">
                <div class="flex flex-wrap gap-x-10">
                    <div>
                        <label for=""
                            class="block w-40 mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">PO
                            Number : </label>
                        <input type="text" name="po_number" id=""
                            class="w-40 rounded-md border text-xs border-gray-900 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="">
                        <label for=""
                            class="block  w-40 mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white"> Vandor Code : </label>
                        <input type="text" name="vendor_code" id=""
                            class="w-40 rounded-md border text-xs border-gray-900 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="">
                        <label for=""
                            class="block  w-40 mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white"> Vandor Name : </label>
                        <input type="text" name="vendor_name" id=""
                            class="w-40 rounded-md border text-xs border-gray-900 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                </div>
            </form>
            <div class="">
                <form class="w-full border p-3 border-gray-900 rounded-md">
                    <div class="flex flex-wrap items-center gap-x-3">
                        <div>
                            <input id="link-checkbox" type="checkbox" value=""
                                class="w-3 h-3 text-blue-600 bg-gray-100 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:border-gray-600">
                        </div>
                        <div class="">
                            <label class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">S. No
                                :
                            </label>
                            <input type="text" name="serial_no" id=""
                                class="w-16 rounded-md border text-xs border-gray-900 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                        <div class="">
                            <label class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Vendor
                                Code:
                            </label>
                            <input type="text" name="vendor_code" id=""
                                class="w-28 rounded-md border text-xs border-gray-900 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                        <div class="">
                            <label class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Vendor
                                Name :
                            </label>
                            <input type="text" name="vendor_name" id=""
                                class="w-28 rounded-md border text-xs border-gray-900 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                        <div class="">
                            <label class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Item Code :
                            </label>
                            <input type="text" name="item_code" id=""
                                class="w-28 rounded-md border text-xs border-gray-900 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                        <div class="">
                            <label class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Item Short Desc:
                            </label>
                            <input type="text" name="item_description" id=""
                                class="w-28 rounded-md border text-xs border-gray-900 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                        <div class="">
                            <label class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Qty :
                            </label>
                            <input type="text" name="qty" id=""
                                class="w-16 rounded-md border text-xs border-gray-900 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                        <div class="">
                            <label class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">SI
                                Inventory:
                            </label>
                            <input type="text" name="si_inventory" id=""
                                class="w-28 rounded-md border text-xs border-gray-900 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                        <div class="">
                            <label class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Sub Inventory:
                            </label>
                            <input type="text" name="sub_inventory" id=""
                                class="w-28 rounded-md border text-xs border-gray-900 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                        <div id="recieved_div"></div>
                        <div id="accept_div"></div>
                        <div id="reject_div"></div>
                    </div>
                </form>
            </div>

            <div class="w-full mt-5 flex flex-wrap justify-center gap-x-20">
                <button onclick="received()" type="button"
                    class="w-28 text-white border border-blue-700 bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-900 font-medium rounded-md text-xs py-2.5 text-center me-2 mb-2 font-bold dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800 ">Recieved</button>
                <button type="button" onclick="accept()"
                    class="w-28 text-white border border-blue-700 bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-900 font-medium rounded-md text-xs py-2.5 text-center me-2 mb-2 font-bold dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Accept</button>
                <button type="button" onclick="reject()"
                    class="w-28 text-white border border-blue-700 bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-900 font-medium rounded-md text-xs py-2.5 text-center me-2 mb-2 font-bold dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800 ">Reject</button>
                <button type="button"
                    class="w-28 text-white border border-blue-700 bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-900 font-medium rounded-md text-xs py-2 text-center me-2 mb-2 font-bold dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800 x">
                    Delivered</button>
            </div>
        </div>
        
    </div>
    </div>

    <script src="script.js"></script>
</body>

</html>