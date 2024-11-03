<?php
session_start();
include("./navForLogged.php");

// include("./db.php");
include('./dbconnection/db.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    $user = $_SESSION['username'];
    $currentDateTime = date('Y-m-d H:i:s');
    $vendor_code = $_POST['vendore_code'];
    $vendore_name = $_POST['vendore_name'];
    $vendore_site_code = $_POST['vendore_site_code'];
    $ship_to = $_POST['ship_to'];
    $bill_to = $_POST['bill_to'];
    $payment_term = $_POST['payment_term'];
    $note_to_supplier = $_POST['note_to_supplier'];








    // $sql = "INSERT INTO `for_office`.`purchase_order_header` (`createdBy`, `created_date`) VALUES ('$user', '$currentDateTime');";

    $sql = "INSERT INTO `for_office`.`purchase_order_header` (`vendore_code`, `supplier_name`, `supplier_site_code`, `payment_term`, `bill_to_location`, `shipTo`, `createdBy`, `created_date`, `remarks_nots`) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?,?)";


    $stmt = $con->prepare($sql);

    $stmt->bind_param("sssssssss", $vendor_code, $vendore_name, $vendore_site_code, $payment_term, $bill_to, $ship_to, $user, $currentDateTime , $remarks_nots);







    if ($stmt->execute()) {
        $result = $stmt->get_result();
        echo "SUccess";

        $po_number = $con->insert_id;

        echo $po_number;


    } else {

        echo $stmt->error;
    }
}













?>


<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.4/dist/tailwind.min.css" rel="stylesheet">
    <title>Create PO Form</title>
</head>

<body>
    <div id="create_section" class="mt-5 bg-gray-100 border border-gray-900 p-5 rounded-lg mx-5">
        <h1 class="text-center underline text-3xl mb-3 font-bold">Create PO Form</h1>
        <form method="POST" class="w-full border border-gray-500 p-3 rounded-md">
            <div class="flex flex-wrap m-2 gap-20 ">
                <div>
                    <label for="email"
                        class="block  mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">PO
                        Number : </label>
                    <input id="po_number" type="text" value="<?php if (isset($po_number)) {
                        echo $po_number;
                    } ?>" disabled
                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />


                </div>

                <div class="">
                    <label class="block w-40 mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Vendore
                        code : </label>
                    <input type="text" name="vendore_code" required value="<?php if (isset($po_number)) {
                        echo $vendor_code;
                    } ?>"
                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>
                <div class="">
                    <label class="block w-40 mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Vendor
                        Name : </label>
                    <input type="text" name="vendore_name" required value="<?php if (isset($po_number)) {
                        echo $vendore_name;
                    } ?>"
                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />

                </div>
                <div class="">
                    <label class="block w-40 mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Vendor
                        Site Code : </label>
                    <input type="text" name="vendore_site_code" required value="<?php if (isset($po_number)) {
                        echo $vendore_site_code;
                    } ?>"
                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>
                <div class="">
                    <label class="block w-40 mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Buyer :
                    </label>
                    <input type="text" required
                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />


                </div>
                <div class="">
                    <label class="block w-40 mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Note To
                        Supplier : </label>
                    <input type="text" required value="" name="note_to_supplier"
                        class="w-40 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>
            </div>
            <div class="flex flex-wrap m-2 gap-20">
                <div class="">
                    <label class="block w-40 mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Ship to :
                    </label>
                    <input type="txt" name="ship_to" required value="<?php if (isset($po_number)) {
                        echo $ship_to;
                    } ?>"
                        class="w-40 rounded-md border text-xs border-gray-500 bg-white pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>
                <div class="">
                    <label class="block w-40 mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Bill to :
                    </label>
                    <input type="txt" name="bill_to" required value="<?php if (isset($po_number)) {
                        echo $bill_to;
                    } ?>"
                        class="w-40 rounded-md border text-xs border-gray-500 bg-white pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>
                <div class="">
                    <label class="block w-40 mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Total :
                    </label>
                    <input type="number" id="po_total" disabled
                        class="w-40 rounded-md border text-xs border-gray-500 bg-white pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>
                <div class="">
                    <label class="block w-40 mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Payment
                        Term : </label>
                    <input type="txt" name="payment_term" value="<?php if (isset($po_number)) {
                        echo $payment_term;
                    } ?>"
                        class="w-40 rounded-md border text-xs border-gray-500 bg-white pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>

                <button type="text"
                    class="w-20  bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 whitespace-nowrap font-medium text-white  rounded-md  py-2 text-center me-2 mb-2  dark:border-blue-500 dark:text-blue-500 hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800 ">Create
                    Po</button>
            </div>
        </form>

        <?php

if (isset($po_number)) {

    ?>
        <div class="mt-6">
            <!-- <form class="w-full border p-3 border-gray-500 rounded-md">
                <div class="flex flex-wrap items-center justify-between">
                    <div class="ml-2">
                        <label class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">S. No
                            :
                        </label>
                        <input type="text" name="email" id="email"
                            class="w-32 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="ml-2">
                        <label class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Item
                            Code:
                        </label>
                        <input type="text" name="email" id="email"
                            class="w-32 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="ml-2">
                        <label class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Item
                            Name :
                        </label>
                        <input type="text" name="email" id="email"
                            class="w-32 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="ml-2">
                        <label class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Unit Price
                            :
                        </label>
                        <input type="text" name="email" id="email"
                            class="w-32 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="ml-2">
                        <label class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Qty :
                        </label>
                        <input type="text" name="email" id="email"
                            class="w-32 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="ml-2">
                        <label class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Need By
                            Date :
                        </label>
                        <input type="date" name="email" id="email"
                            class="w-32 rounded-md border text-xs border-gray-500 bg-white pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="ml-2">
                        <label class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Qty Rec :
                        </label>
                        <input type="text" name="email" id="email"
                            class="w-32 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="ml-2">
                        <label class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Balance :
                        </label>
                        <input type="text" name="email" id="email"
                            class="w-32 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                </div>
                <div class="flex flex-wrap items-center border-gray-500 justify-between border-t mt-2">
                    <div class="ml-2 mt-2">
                        <input type="text" name="email" id="email"
                            class="w-32 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="ml-2 mt-2">
                        <input type="text" name="email" id="email"
                            class="w-32 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="ml-2 mt-2">
                        <input type="text" name="email" id="email"
                            class="w-32 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="ml-2 mt-2">
                        <input type="text" name="email" id="email"
                            class="w-32 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="ml-2 mt-2">
                        <input type="text" name="email" id="email"
                            class="w-32 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="ml-2 mt-2">
                        <input type="date" name="email" id="email"
                            class="w-32 rounded-md border text-xs border-gray-500 bg-white pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="ml-2 mt-2">
                        <input type="text" name="email" id="email"
                            class="w-32 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="ml-2 mt-2">
                        <input type="text" name="email" id="email"
                            class="w-32 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                </div>
                <div class="flex flex-wrap items-center border-gray-500 justify-between border-t mt-2">
                    <div class="ml-2 mt-2">
                        <input type="text" name="email" id="email"
                            class="w-32 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="ml-2 mt-2">
                        <input type="text" name="email" id="email"
                            class="w-32 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="ml-2 mt-2">
                        <input type="text" name="email" id="email"
                            class="w-32 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="ml-2 mt-2">
                        <input type="text" name="email" id="email"
                            class="w-32 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="ml-2 mt-2">
                        <input type="text" name="email" id="email"
                            class="w-32 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="ml-2 mt-2">
                        <input type="date" name="email" id="email"
                            class="w-32 rounded-md border text-xs border-gray-500 bg-white pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="ml-2 mt-2">
                        <input type="text" name="email" id="email"
                            class="w-32 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="ml-2 mt-2">
                        <input type="text" name="email" id="email"
                            class="w-32 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                </div>
                <div class="flex flex-wrap items-center border-gray-500 justify-between border-t mt-2">
                    <div class="ml-2 mt-2">
                        <input type="text" name="email" id="email"
                            class="w-32 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="ml-2 mt-2">
                        <input type="text" name="email" id="email"
                            class="w-32 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="ml-2 mt-2">
                        <input type="text" name="email" id="email"
                            class="w-32 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="ml-2 mt-2">
                        <input type="text" name="email" id="email"
                            class="w-32 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="ml-2 mt-2">
                        <input type="text" name="email" id="email"
                            class="w-32 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="ml-2 mt-2">
                        <input type="date" name="email" id="email"
                            class="w-32 rounded-md border text-xs border-gray-500 bg-white pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="ml-2 mt-2">
                        <input type="text" name="email" id="email"
                            class="w-32 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="ml-2 mt-2">
                        <input type="text" name="email" id="email"
                            class="w-32 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                </div>
            </form> -->


            <div class="flex flex-col">
                <div class="-m-1.5 overflow-x-auto">
                    <div class="p-1.5 min-w-full inline-block align-middle">
                        <div class="overflow-hidden">
                            <table class="min-w-full mx-auto divide-y divide-gray-200">
                                <thead>
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                            S.no</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                            Item Code</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                            Item name</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">Unit
                                            price</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">Qty
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">Total
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">Need
                                            by date</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">Sale
                                            order no.</th>

                                    </tr>
                                </thead>
                                <tbody class="divide-y      divide-gray-200" id="poCreteTbody">
                                    <tr class="hover:bg-gray-600">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                            <input type="txt" id="input-email-label"
                                                class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                placeholder=1 disabled>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                            <input type="txt" id="input-email-label" name="item_code"
                                                class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                placeholder="item_code">
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                            <input type="txt" id="input-email-label" name="item_name"
                                                class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                placeholder="Item name">
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                            <input type="number" id="input-email-label"
                                                class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                name="unit_Price" onchange="setTotal(event)" placeholder="Unit price">
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                            <input type="number" id="input-email-label" name="Qty"
                                                class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                onchange="setTotal(event)" placeholder="Quantity">
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                            <input type="number" id="input-email-label" name="total_price" disabled
                                                class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                placeholder="Total">
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                            <input type="date" id="input-email-label" name="need_by_date"
                                                class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                placeholder="need_by_date">
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                            <input type="txt" id="input-email-label" name="saleOrderNumber"
                                                class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                placeholder="Enter sale order number">
                                        </td>

                                    </tr>


                                </tbody>
                            </table>

                            <a href="#_" disabled="disabled" onclick="<?php if (isset($po_number)) {
                                echo 'addRowItem()';
                            } ?>" class="relative inline-block px-4 py-2 font-medium group">
                                <span
                                    class="absolute inset-0 w-full h-full transition duration-200 ease-out transform translate-x-1 translate-y-1 bg-black group-hover:-translate-x-0 group-hover:-translate-y-0"></span>
                                <span
                                    class="absolute inset-0 w-full h-full bg-white border-2 border-black group-hover:bg-black"></span>
                                <span onclick="" class="relative text-black group-hover:text-white">+Add item</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>



      

            <div class="w-full mt-5 flex flex-wrap justify-around">
                <button type="text"
                    class="text-white border border-blue-700 bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-xs px-5 py-2.5 text-center me-2 mb-2 font-bold dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800 ">Clear
                    Form</button>



                <!-- this button is for create direct po fressh inert query -->
                <button type="text" onclick="purchaseOrderDirect()" id="po-save-btn"
                    class="text-white border border-blue-700 bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-xs px-5 py-2.5 text-center me-2 mb-2 font-bold dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800 ">Save</button>


                <button type="text" onclick="updatePurchaseOrderSave()" id="po-update-save-btn"
                    class="text-white hidden border border-blue-700 bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-xs px-5 py-2.5 text-center me-2 mb-2 font-bold dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800 ">update
                    Save</button>



                <!-- this button is for create direct po fressh inert query -->

                <?php if (isset($po_number)) {

                    ?>

                    <button type="text" onclick="hideSelf(event)" id="po-submit-btn"
                        class="text-white border border-blue-700 bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-xs px-5 py-2.5 text-center me-2 mb-2 font-bold dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">


                        Submit</button>


                    <?php

                } ?>

            </div>
        <?php } ?>



    </div>
</body>





<script>








    const setTotal = (event) => {

        let unitPrice = event.target.closest("tr").querySelector('input[name="unit_Price"]').value
        let qty = event.target.closest("tr").querySelector('input[name="Qty"]').value



        console.log(unitPrice * qty);

        event.target.closest("tr").querySelector('input[name="total_price"]').value = unitPrice * qty

        setAmountToMainHeader();

    }




    const addRowItem = () => {


        let total = document.getElementById("poCreteTbody").querySelectorAll("tr").length


        total++

        let tr = document.createElement("tr")
        tr.classList.add("hover:bg-gray-600")

        tr.innerHTML = `       
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                            <input type="txt" id="input-email-label"
                                                class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                
                                                disabled
                                                placeholder=${total}>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                            <input type="txt" id="input-email-label" name="item_code"
                                                class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                placeholder="item_code">
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                            <input type="txt" id="input-email-label" name="item_name"
                                                class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                placeholder="Item name">
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                            <input type="number" id="input-email-label"
                                                class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                name="unit_Price" placeholder="Unit price">
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                            <input type="number" id="input-email-label" name="Qty"
                                                class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                onchange="setTotal(event)"
                                                placeholder="Quantity">
                                        </td>
                                           <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                            <input type="number" id="input-email-label" name="total_price"
                                            disabled
                                                class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                onchange="setTotal(event)"
                                                placeholder="Total">
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                            <input type="date" id="input-email-label" name="need_by_date"
                                                class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                placeholder="need_by_date">
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                            <input type="txt" id="input-email-label" name="saleOrderNumber"
                                                class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                placeholder="Enter sale order number">
                                        </td>

                                    

                                    `


        $("#poCreteTbody").append(tr)



    }




    const setAmountToMainHeader = () => {


        let trows = document.getElementById("poCreteTbody").querySelectorAll("tr")


        console.log(trows);

        let total_amount = 0;

        trows.forEach(Element => {


            console.log(Element);

            let unitPrice = Element.querySelector('input[name="unit_Price"]').value
            let qty = Element.querySelector('input[name="Qty"]').value


            let total = unitPrice * qty


            total_amount += total


            // console.log(total);

        })


        $("#po_total").val(total_amount)






    }









</script>



<script src="./js/jquery.min.js"></script>
<script src="./js/po.js"></script>




</html>