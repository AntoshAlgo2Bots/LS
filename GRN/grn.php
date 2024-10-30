<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/grn.css">
    <title>Form 2</title>
</head>

<body>
    <div class="main_div">
        <form action="">
            <h1>GRN FORM</h1>
            <div class="main_form" id="inputFormDataGrn">
                <div class="section">
                    <!-- <label>Inventory Id : </label>
                    <input type="number" name="inventory_id" required> -->
                    <label>Item Id : </label>
                    <input type="number" name="item_id" required>
                    <label>Item Code : </label>
                    <input type="number" name="item_code" required>
                </div>
                <div class="section">
                    <label>Item Description : </label>
                    <input type="text" name="item_discription" required>
                    <label>Warehouse Location : </label>
                    <input type="text" name="warehouse_location" required>
                    <label>Warehouse Code : </label>
                    <input type="number" name="warehouse_code" required>
                </div>
                <div class="section">
                    <label>Receiving Item : </label>
                    <input type="text" name="receiving_item" id="" required>
                    <label>Purchase Order ID : </label>
                    <input type="number" name="purchase_order_id" required>
                    <label>Purchase Order Detail : </label>
                    <input type="text" name="purchase_order_date" required>
                </div>
                <div class="section">
                    <label>Purchanse Order Line : </label>
                    <input type="text" name="purchase_order_line" required>
                    <label>Received Quantity : </label>
                    <input type="text" name="received_quantity" required>
                    <label>Received Date : </label>
                    <input type="date" name="recevied_date" required>
                </div>
                <div class="section">
                    <label>Receiving Time : </label>
                    <input type="time" name="receiving_time" required>
                    <label>Finished : </label>
                    <input type="text" name="finished" required>
                    <label>Weight : </label>
                    <input type="text" placeholder="weight" name="weight" required>
                </div>
                <div class="section">
                    <label>Dimesion : </label>
                    <input type="text" class="dimension" required>
                    <label>Box No : </label>
                    <input type="text" name="box_no" required>
                    <label>Box Detail : </label>
                    <input type="text" name="box_detail" required>
                </div>
                <div class="section">
                    <label>Checked by : </label>
                    <input type="text" name="checked_by" required>
                    <label>Approved : </label>
                    <input type="text" name="approved" required>
                    <label>Remarks : </label>
                    <input type="text" name="remarks" required>
                </div>
                <div class="section">
                    <label>Serial Number To : </label>
                    <input type="number" name="serial_number_to" required>
                    <label>Serial Number From : </label>
                    <input type="number" name="serial_number_from" required>
                    <label>Vendor Name : </label>
                    <input type="text" name="vendor_name" required>
                </div>
                <div class="section">
                    <label>Mode of Transport : </label>
                    <input type="text" name="mode_of_transport" required>
                    <label>Vehicle Detail : </label>
                    <input type="text" name="vehical_detail" required>
                    <label>Invoice Num : </label>
                    <input type="number" name="invoice_num">
                </div>
                <div>
                    <div class="section">
                        <label>Invoice Date : </label>
                        <input type="date" name="invoice_date" required>
                        <label>Amount : </label>
                        <input type="number" name="amount" required>
                    </div>
                </div>
                <div class="btn">
                    <button onclick="grnDataInsert()" type="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
</body>
<script src="../js/jquery.min.js"></script>
<script src="./js/grn.js"></script>

</html>