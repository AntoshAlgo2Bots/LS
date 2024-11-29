<?php

include("./navForLogged.php");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.4/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
    <title>Create Supplier Form</title>
</head>

<body>

    <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar"
        type="button"
        class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd"
                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
            </path>
        </svg>
    </button>

    <aside id="default-sidebar"
        class="fixed top-0 left-0 z-40 w-60 h-screen transition-transform -translate-x-full sm:translate-x-0"
        aria-label="Sidebar" style="margin-top:68px">
        <div class="h-full px-3 py-4 overflow-y-auto bg-gray-100 dark:bg-gray-800">
            <h1 class="text-xl font-bold border-b border-gray-900 text-center py-3">Supplier Details</h1>
            <ul class="space-y-2 font-medium mt-3">
                <li class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-200 cursor-pointer group"
                    onclick="organization()">
                    <span class="ms-3">Organization Details</span>
                </li>
                <li class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-200 cursor-pointer group"
                    onclick="address()">
                    <span class="ms-3">Address Details</span>

                </li>
                <li class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-200 cursor-pointer group"
                    onclick="bank()">
                    <span class="ms-3">Banking Details</span>

                </li>

            </ul>
        </div>
    </aside>
    <form action="" id="formData">
        <div class="p-4 sm:ml-64">
            <h1 class="text-3xl font-bold text-center border-b border-gray-600 pb-4 mb-4">Create Supplier Form</h1>
            <div class="p-4 border-2 border-gray-400 border-dashed rounded-lg dark:border-gray-700"
                id="organization_deatils">
                <h1 class="text-xl font-medium border-b border-gray-700 text-center pb-3">Organization Details</h1>
                <div id="oraganigation_duplicate">
                    <div>
                        <div class="border-b border-gray-700 py-4 ">
                            <label for=""
                                class="block  mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Supplier
                                Code :
                            </label>
                            <input type="text" name="supplier_code" id="supplier_code" placeholder="Enter supplier name"
                                class="w-60 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-7 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            <button type="button" id="search"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-1 focus:ring-blue-300 font-xs rounded-lg text-xs px-3 py-1.5 me-2">Search</button>


                        </div>
                    </div>
                    <div class="flex flex-wrap gap-x-20 mt-5">
                        <div>
                            <label for=""
                                class="block  mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Oraganigation
                                Name :
                            </label>
                            <input type="text" name="oraganigation_name" id="oraganigation_name" placeholder="Enter oraganigation name"
                                class="w-60 rounded-md border text-xs mb-4 border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-7 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>

                        <div>
                            <label for="oraganigation_type"
                                class="block mb-2 text-xs font-medium text-gray-900 dark:text-white">Oraganigation Type
                                :
                            </label>
                            <select id="oraganigation_type" name="oraganigation_type"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-xs   rounded-md focus:ring-blue-500 focus:border-blue-500 block w-60 h-7 pl-2 pt-1 mb-4  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="" selected hidden>Select One Type</option>
                                <option value="LLC">LLC</option>
                                <option value="Corporation">Corporation</option>
                                <option value="Partnership">Partnership</option>
                                <option value="Sole Proprietorship">Sole Proprietorship</option>
                            </select>
                        </div>

                        <div>
                            <label for=""
                                class="block  mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">GST
                                Number :
                            </label>
                            <input type="text" name="gst_number" id="gst_number" placeholder="Enter GST number"
                                class="w-60 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-7 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>

                        <div>
                            <label for=""
                                class="block  mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Supplier
                                Name :
                            </label>
                            <input type="text" name="supplier_name" id="supplier_name" placeholder="Enter supplier name"
                                class="w-60 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-7 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>

                        <div>
                            <label for=""
                                class="block  mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Supplier
                                Type :
                            </label>
                            <input type="text" name="supplier_type" id="supplier_type" placeholder="Enter supplier type"
                                class="w-60 rounded-md border mb-4 text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-7 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>


                        <div>
                            <label for=""
                                class="block  mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Sub
                                Supplier
                                Type :
                            </label>
                            <input type="text" name="sub_supplier_type" id="sub_supplier_type" placeholder="Enter sub supplier type"
                                class="w-60 rounded-md border text-xs mb-4 border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-7 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                        <div>
                            <label for=""
                                class="block  mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Supplier
                                Status
                                :
                            </label>
                            <input type="text" name="supplier_status" id="supplier_status" placeholder="Enter supplier status"
                                class="w-60 rounded-md border text-xs mb-4 border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-7 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                        <div>
                            <label for=""
                                class="block  mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Starting
                                Date :
                            </label>
                            <input type="date" name="starting_date" id="starting_date"
                                class="w-60 rounded-md border text-xs mb-4 border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-7 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>

                        <div>
                            <label for=""
                                class="block  mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Ending
                                Date :
                            </label>
                            <input type="date" name="ending_date" id="ending"
                                class="w-60 rounded-md border text-xs mb-4 border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-7 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                        <div>
                            <label for=""
                                class="block  mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Contact Person Name :
                            </label>
                            <input type="text" name="person_name" id="contact_person_name" placeholder="Enter person name"
                                class="w-60 rounded-md border text-xs mb-4 border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-7 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>

                        <div>
                            <label for=""
                                class="block  mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Contact Person Email :
                            </label>
                            <input type="text" name="person_email" id="contact_person_email" placeholder="Enter person email"
                                class="w-60 rounded-md border text-xs mb-4 border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-7 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                        <div>
                            <label for=""
                                class="block  mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Contact Person Number :
                            </label>
                            <input type="text" name="person_number" id="contact_person_number" placeholder="Enter person number"
                                class="w-60 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-7 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                    </div>


                </div>
                <!-- <div class="text-center">
                    <button type="button" onclick="oraganigation_duplicate()"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add</button>
                </div> -->
            </div>


            <!-----------------------------------Address Details----------------------------------------->

            <div class="p-4 border-2 border-gray-400 border-dashed rounded-lg dark:border-gray-700" id="address_deatils"
                style="display: none;">
                <h1 class="text-xl font-medium border-b border-gray-700 text-center pb-3">Address Details</h1>
                <div id="address_duplicate">
                    <div class="flex flex-wrap gap-x-20 mt-5">
                        <div>
                            <label for=""
                                class="block  mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Site
                                Code :
                            </label>
                            <input type="text" name="site_code" id="site_code" placeholder="Enter person name"
                                class="w-60 rounded-md border text-xs mb-4 border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-7 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>

                        <div>
                            <label for=""
                                class="block  mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Site
                                Name :
                            </label>
                            <input type="text" name="site_name" id="site_number" placeholder="Enter person "
                                class="w-60 rounded-md border text-xs mb-4 border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-7 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>

                        <div>
                            <label for=""
                                class="block  mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Site
                                Description
                                :
                            </label>
                            <input type="text" name="site_description" id="site_description" placeholder="Enter person number"
                                class="w-60 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-7 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>

                    </div>

                    <div class="flex flex-wrap gap-x-20">
                        <div>
                            <label for=""
                                class="block  mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Address
                                Line
                                1 :
                            </label>
                            <input type="text" name="address_line_1" id="address_line_1" placeholder="Enter address line 1"
                                class="w-60 rounded-md border text-xs mb-4 border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-7 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>

                        <div>
                            <label for="countries"
                                class="block mb-2 text-xs font-medium text-gray-900 dark:text-white">Address
                                Line 2 : </label>
                            <input type="text" name="address_line_2" id="address_line_2" placeholder="Enter address line 2"
                                class="w-60 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-7 outline-none focus:border-[#6A64F1] focus:shadow-md" />

                        </div>

                        <div>
                            <label for=""
                                class="block  mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Postal
                                Code
                                :
                            </label>
                            <input type="text" name="postal_code" id="postal_code" placeholder="Enter postal code"
                                class="w-60 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-7 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>


                    </div>
                    <div class="flex flex-wrap gap-x-20">
                        <div>
                            <label for=""
                                class="block  mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">City :
                            </label>
                            <input type="text" name="city" id="city" placeholder="Enter city name"
                                class="w-60 rounded-md border text-xs mb-4 border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-7 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>

                        <div>
                            <label for=""
                                class="block  mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">State
                                :
                            </label>
                            <input type="text" name="state" id="state" placeholder="Enter state name"
                                class="w-60 rounded-md border text-xs mb-4 border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-7 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>

                        <div>
                            <label for=""
                                class="block  mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">
                                Country :
                            </label>
                            <input type="text" name="country" id="country" placeholder="Enter country name"
                                class="w-60 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-7 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                    </div>

                    <div class="flex flex-wrap gap-x-20">
                        <div>
                            <label for=""
                                class="block  mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Contact
                                Person
                                Name :
                            </label>
                            <input type="text" name="person_name" id="person_name" placeholder="Enter person name"
                                class="w-60 rounded-md border text-xs mb-4 border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-7 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>

                        <div>
                            <label for=""
                                class="block  mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Contact
                                Person Email
                                :
                            </label>
                            <input type="text" name="person_email" id="person_email" placeholder="Enter person email"
                                class="w-60 rounded-md border text-xs mb-4 border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-7 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>

                        <div>
                            <label for=""
                                class="block  mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Contact
                                Person
                                Number :
                            </label>
                            <input type="text" name="person_number" id="person_number" placeholder="Enter person number"
                                class="w-60 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-7 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>




                    </div>
                </div>
                <!-- <div class="text-center">
                    <button type="button" onclick="address_duplicate()"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add</button>
                </div> -->
            </div>



            <!--------------------------------Bank Details--------------------------------------------->

            <div class="p-4 border-2 border-gray-400 border-dashed rounded-lg dark:border-gray-700" id="bank_deatils"
                style="display: none;">
                <h1 class="text-xl font-medium border-b border-gray-700 text-center pb-3">Banking Details</h1>
                <div id="banking_duplicate">

                    <div class="mt-2 border-b border-gray-900">
                        <label for=""
                            class="block  mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Site
                            Code :
                        </label>
                        <input type="text" name="site_code" id="site_codes" placeholder="Enter site code"
                            class="w-60 rounded-md border text-xs mb-3 border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-7 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>


                    <div class="flex flex-wrap gap-x-20 mt-3">
                        <div>
                            <label for=""
                                class="block  mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Branch
                                Name
                                :
                            </label>
                            <input type="text" name="branch_name_" id="branch_name" placeholder="Enter branch name"
                                class="w-60 rounded-md border text-xs mb-4 border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-7 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>

                        <div>
                            <label for="countries"
                                class="block mb-2 text-xs font-medium text-gray-900 dark:text-white">Branch
                                Number : </label>
                            <input type="text" name="brach_number" id="branch_number" placeholder="Enter brach number"
                                class="w-60 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-7 outline-none focus:border-[#6A64F1] focus:shadow-md" />

                        </div>

                        <div>
                            <label for=""
                                class="block  mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Branch
                                Type
                                :
                            </label>
                            <input type="text" name="brach_type" id="branch_type" placeholder="Enter brach type"
                                class="w-60 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-7 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>


                    </div>
                    <div class="flex flex-wrap gap-x-20">
                        <div>
                            <label for=""
                                class="block  mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Bank
                                Name :
                            </label>
                            <input type="text" name="bank_name" id="bank_name" placeholder="Enter bank name"
                                class="w-60 rounded-md border text-xs mb-4 border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-7 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>

                        <div>
                            <label for=""
                                class="block  mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Bank
                                Number
                                :
                            </label>
                            <input type="text" name="bank_number" id="bank_number" placeholder="Enter bank number"
                                class="w-60 rounded-md border text-xs mb-4 border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-7 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>

                        <div>
                            <label for=""
                                class="block  mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">
                                Bank Type :
                            </label>
                            <input type="text" name="bank_type" id="bank_type" placeholder="Enter bank type"
                                class="w-60 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-7 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                    </div>
                    <div class="flex flex-wrap gap-x-20">
                        <div>
                            <label for=""
                                class="block  mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Account
                                Name
                                :
                            </label>
                            <input type="text" name="account_name" id="account_name" placeholder="Enter account name"
                                class="w-60 rounded-md border text-xs mb-4 border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-7 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>

                        <div>
                            <label for=""
                                class="block  mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Account
                                Number
                                :
                            </label>
                            <input type="text" name="account_number" id="account_number" placeholder="Enter account number"
                                class="w-60 rounded-md border text-xs mb-4 border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-7 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>

                        <div>
                            <label for=""
                                class="block  mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">
                                Account Type :
                            </label>
                            <input type="text" name="account_type" id="account_type" placeholder="Enter account type"
                                class="w-60 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-7 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                    </div>
                    <div class="flex flex-wrap gap-x-20">
                        <div>
                                <label for=""
                                    class="block  mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">IFSC
                                    Code :
                                </label>
                            <input type="text" name="ifsc_code" id="ifsc_code" placeholder="Enter IFSC code"
                                class="w-60 rounded-md border text-xs mb-4 border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-7 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                    </div>

                </div>



                <div class="text-center">
                    <button type="submit" id="resetButton"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Create
                        Supplier</button>
                </div>
            </div>
        </div>
    </form>

    <script src="./js/supplierform.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script>
        $(document).ready(function () {
            $('#formData').submit(function (e) {
                e.preventDefault();
                var frmData = $(this).serialize();

                $.post("./phpAjax/supplierAjaxCreate.php", frmData, function (response) {
                    console.log("This is from success block");

                    $('#supplier_code').val(response.inserted_id)
                    console.log(response);

                    alert("Supplier Created Sucessfully. Your Code is " + response.inserted_id);


                    document.getElementById('resetButton').disabled = true;
                }, "json").fail(function (error) {
                    console.log("This is error block");
                    console.log(error.responseText);
                });
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#search').click(function (e) {
                e.preventDefault();


                var srch = $('#supplier_code').val();
                document.getElementById('resetButton').disabled = true;

                if (srch !== "") {
                    $.post("Supplier_Search_action.php", { srch }, function (data) {

                        console.log(data)
                        var res = data

                        console.log(data);
                        $("#supplier_name").val(res.data.supplier_name);
                        $("#oraganigation_name").val(res.data.oraganigation_name);
                        $("#oraganigation_type").val(res.data.oraganigation_type);
                        $("#gst_number").val(res.data.gst_number);
                        $("#supplier_type").val(res.data.supplier_type);
                        $("#sub_supplier_type").val(res.data.sub_supplier_type);
                        $("#supplier_status").val(res.data.supplier_status);
                        $("#starting_date").val(res.data.starting_date);
                        $("#ending").val(res.data.ending_date);
                        $("#contact_person_name").val(res.data.person_name);
                        $("#contact_person_email").val(res.data.person_email);
                        $("#contact_person_number").val(res.data.person_number);


                        $("#site_code").val(res.data.site_code);
                        $("#site_number").val(res.data.site_name);
                        $("#site_description").val(res.data.site_description);
                        $("#address_line_1").val(res.data.address_line_1);
                        $("#address_line_2").val(res.data.address_line_2);
                        $("#postal_code").val(res.data.postal_code);
                        $("#city").val(res.data.city);
                        $("#state").val(res.data.state);
                        $("#country").val(res.data.country);
                        $("#person_name").val(res.data.person_name);
                        $("#perosns_email").val(res.data.person_email);
                        $("#person_number").val(res.data.person_number);



                        $("#site_codes").val(res.data.site_code);
                        $("#branch_name").val(res.data.branch_name_);
                        $("#branch_number").val(res.data.brach_number);
                        $("#branch_type").val(res.data.brach_type);
                        $("#bank_name").val(res.data.bank_name);
                        $("#bank_number").val(res.data.bank_number);
                        $("#bank_type").val(res.data.bank_type);
                        $("#account_name").val(res.data.account_name);
                        $("#account_number").val(res.data.account_number);
                        $("#account_type").val(res.data.account_type);
                        $("#ifsc_code").val(res.data.ifsc_code);


                    }, "json")
                } else {
                    alert("Please Enter Supplier Code")
                }
            })
        });
    </script>

</body>

</html>