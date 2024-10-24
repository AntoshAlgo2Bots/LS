
function verifyAnswer() {


    let select_amt = document.getElementById('select_amt')
    var result = select_amt.options[select_amt.selectedIndex].text;


    console.log(result)

    if (result == "Credit") {
        document.getElementById('credit_amt_field').disabled = false;
        document.getElementById('credit_amt_field').placeholder = "Enter Your Credit Amount";
        document.getElementById('debit_amt_field').disabled = true;
        document.getElementById('debit_amt_field').placeholder = "";
    } else {
        document.getElementById('credit_amt_field').disabled = true;
        document.getElementById('debit_amt_field').disabled = false;
    }

    if (result == "Debit") {
        document.getElementById('debit_amt_field').disabled = false;
        document.getElementById('debit_amt_field').placeholder = "Enter Your Debit Amount";
        document.getElementById('credit_amt_field').disabled = true;
        document.getElementById('credit_amt_field').placeholder = "";
    } else {
        document.getElementById('credit_amt_field').disabled = false;
    }


}

//Updated By Antosh Kumar Pandey 15:25
function subHeadSelect() {
    let select_amt = document.getElementById('sub_head_select');
    var result = select_amt.options[select_amt.selectedIndex].text;

    console.log(result);

    if (result === "Travelling" ||
        result === "Travelling with Car" ||
        result === "Travelling with Bike" ||
        result === "Travelling with Auto") {

        document.getElementById('from').disabled = false;
        document.getElementById('from').placeholder = "Enter From Place Name";
        document.getElementById('to').disabled = false;
        document.getElementById('to').placeholder = "Enter To Place Name";
        document.getElementById('startKm').disabled = false;
        document.getElementById('startKm').placeholder = "Enter Start KM Reading";
        document.getElementById('endKm').disabled = false;
        document.getElementById('endKm').placeholder = "Enter End KM Reading";
        document.getElementById('rate').disabled = false;
        document.getElementById('rate').placeholder = "Enter Rate";

        if (!fromField.value || !toField.value || !startKmField.value || !endKmField.value || !rateField.value) {
            alert("Please fill in all required fields.");
            return; // Prevent further actions if fields are not filled
        }

    } else {
        document.getElementById('from').disabled = true;
        document.getElementById('from').placeholder = "";
        document.getElementById('from').value = "";
        document.getElementById('to').disabled = true;
        document.getElementById('to').placeholder = "";
        document.getElementById('to').value = "";
        document.getElementById('startKm').disabled = true;
        document.getElementById('startKm').placeholder = "";
        document.getElementById('startKm').value = "";
        document.getElementById('endKm').disabled = true;
        document.getElementById('endKm').placeholder = "";
        document.getElementById('endKm').value = "";
        document.getElementById('totalKm').disabled = true;
        document.getElementById('totalKm').value = "";
        document.getElementById('rate').disabled = true;
        document.getElementById('rate').placeholder = "";
        document.getElementById('rate').value = "";
        document.getElementById('debit_amt_field').value = "";
    }
}

// function subHeadSelect() {
//     let select_amt = document.getElementById('sub_head_select');
//     var result = select_amt.options[select_amt.selectedIndex].text;

//     console.log(result);

//     const fromField = document.getElementById('from');
//     const toField = document.getElementById('to');
//     const startKmField = document.getElementById('startKm');
//     const endKmField = document.getElementById('endKm');
//     const rateField = document.getElementById('rate');

//     if (result === "Travelling" ||
//         result === "Travelling with Car" ||
//         result === "Travelling with Bike" ||
//         result === "Travelling with Auto") {

//         fromField.disabled = false;
//         fromField.placeholder = "Enter From Place Name";
//         fromField.required = true; // Set as required

//         toField.disabled = false;
//         toField.placeholder = "Enter To Place Name";
//         toField.required = true; // Set as required

//         startKmField.disabled = false;
//         startKmField.placeholder = "Enter Start KM Reading";
//         startKmField.required = true; // Set as required

//         endKmField.disabled = false;
//         endKmField.placeholder = "Enter End KM Reading";
//         endKmField.required = true; // Set as required

//         rateField.disabled = false;
//         rateField.placeholder = "Enter Rate";
//         rateField.required = true; // Set as required

//     } else {
//         fromField.disabled = true;
//         fromField.placeholder = "";
//         fromField.value = "";
//         fromField.required = false; // Remove required

//         toField.disabled = true;
//         toField.placeholder = "";
//         toField.value = "";
//         toField.required = false; // Remove required

//         startKmField.disabled = true;
//         startKmField.placeholder = "";
//         startKmField.value = "";
//         startKmField.required = false; // Remove required

//         endKmField.disabled = true;
//         endKmField.placeholder = "";
//         endKmField.value = "";
//         endKmField.required = false; // Remove required

//         document.getElementById('totalKm').disabled = true;
//         document.getElementById('totalKm').value = "";
//         document.getElementById('totalKm').required = false; // Remove required

//         rateField.disabled = true;
//         rateField.placeholder = "";
//         rateField.value = "";
//         rateField.required = false; // Remove required

//         document.getElementById('debit_amt_field').value = "";

//         console.log("say sorry")
//     }
// }




$(document).ready(function () {
    $('#myForm').submit(function (event) {
        event.preventDefault();
        var form = document.getElementById('myForm');
        var formData = new FormData(form);
        
        $.ajax({
            url: 'action.php',
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            dataType:"JSON",
            success: function (response) {
                alert('Your form has been sent successfully.');
                let tbody = $("#searchTableTbody")[0];
                
                console.log(response)
                

                $("searchTableTbody").html(
                    
                    
                    `
                      
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <input id="checkbox" line-id="<?php echo $row['transaction_no'] ?>" type="checkbox"
                                        <?php if ($row['form_status'] == 'SUBMIT') {
                                            echo "disabled";
                                        } ?>
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                </th>
                                <td scope="row" class="px-6 py-4">
                                    <input type="text" name="transaction_no" id="" disabled
                                        value=" <?php echo $row['transaction_no'] ?>" class="w-20">
                                </td>
                                <td class="px-6 py-4">
                                    <input type="text" name="transaction_date" id=""
                                        value="<?php echo $row['transaction_date'] ?>" class="w-32">
                                </td>
                                <td class="px-6 py-4">
                                    <input type="text" name="amount_type" id="" value="<?php echo $row['amount_type'] ?>"
                                        class="w-20">
                                </td>
                                <td class="px-6 py-4">
                                    <input type="text" name="credit_amt" id="" value="<?php echo $row['credit_amt'] ?>"
                                        class="w-24">
                                </td>
                                <td class="px-6 py-4">
                                    <input type="text" name="debit_amt" id="" value="<?php echo $row['debit_amt'] ?>"
                                        class="w-24">
                                </td>
                                <td class="px-6 py-4">

                                    <input type="text" name="net_balance" id="" value="<?php echo $row['net_balance'] ?>"
                                        disabled class="w-28">
                                </td>
                                <td class="px-6 py-4">
                                    <input type="text" name="particuler_to" id=""
                                        value=" <?php echo $row['particuler_to'] ?>">

                                </td>
                                <td class="px-6 py-4">
                                    <input type="text" name="site" id="" value=" <?php echo $row['site'] ?>">

                                </td>
                                <td class="px-6 py-4">
                                    <input type="text" name="main_head" id="" value="<?php echo $row['main_head'] ?>"
                                        class="w-40">

                                </td>
                                <td class="px-6 py-4">
                                    <input type="text" name="sub_head" id="" value=" <?php echo $row['sub_head'] ?>"
                                        class="w-40">

                                </td>
                                <td class="px-6 py-4">
                                    <input type="text" name="sub_head" id="" value=" <?php echo $row['from'] ?>"
                                        class="w-40">

                                </td>
                                <td class="px-6 py-4">
                                    <input type="text" name="sub_head" id="" value=" <?php echo $row['to'] ?>"
                                        class="w-40">

                                </td>
                                <td class="px-6 py-4">
                                    <input type="text" name="sub_head" id="" value=" <?php echo $row['startKm'] ?>"
                                        class="w-40">

                                </td>
                                <td class="px-6 py-4">
                                    <input type="text" name="sub_head" id="" value=" <?php echo $row['endKm'] ?>"
                                        class="w-40">

                                </td>
                                <td class="px-6 py-4">
                                    <input type="text" name="sub_head" id="" value=" <?php echo $row['totalKm'] ?>"
                                        class="w-40">

                                </td>
                                <td class="px-6 py-4">
                                    <input type="text" name="sub_head" id="" value=" <?php echo $row['rate'] ?>"
                                        class="w-40">

                                </td>
                                <td class="px-6 py-4">
                                    <input type="text" name="sub_head" id="" value=" <?php echo $row['currentUser'] ?>"
                                        disabled class="w-32">

                                </td>
                                <td class="px-6 py-4">
                                    <input type="text" name="" id="" value=" <?php echo $row['currentTime'] ?>" disabled>

                                </td>
                                <td class="px-6 py-4">
                                    <input type="text" name="bill_cheque_no" id=""
                                        value="<?php echo $row['bill_cheque_no'] ?>">

                                </td>
                                <td class="px-6 py-4">
                                    <input type="text" name="invoice_date" id="" value="<?php echo $row['invoice_date'] ?>"
                                        class="w-28">

                                </td>
                                <td class="px-6 py-4">
                                    <input type="text" name="invoice_no" id="" value="<?php echo $row['invoice_no'] ?>">

                                </td>
                                <td class="px-6 py-4">
                                    <input type="text" name="gst_no" id="" value=" <?php echo $row['gst_no'] ?>"
                                        class="w-28">

                                </td>
                                <td class="px-6 py-4">
                                    <input type="text" name="remarks" id="" value="<?php echo $row['remarks'] ?>">

                                </td>
                                <td class="px-6 py-4">
                                    <input type="text" name="" id="" value=" <?php echo $row['form_status'] ?>" class="w-20"
                                        disabled>
                                </td>
                                <!-- <td class="px-6 py-4">
                                <a href="#" class="text-blue-600">Edit</a>
                                </td> -->

                            
                    `
                )



                console.log(formData)

            },
            error: function (xhr, status, error) {
                alert('Your form was not sent successfully.');
                console.error(error);
            }
        });
        var form = document.getElementById('myForm').reset();
    });
});






const getCheckedRowData = () => {

    let tbody = $("#searchTableTbody")[0]

    let rows = tbody.querySelectorAll("tr")




    let chekedRow = []
    let rowIdToSubmit = []


    rows.forEach(row => {


        let checkbox = row.querySelector("input[type='checkbox']")


        if (checkbox.checked) {


            chekedRow.push(row)


            let line_id = checkbox.getAttribute("line-id")

            rowIdToSubmit.push(parseInt(line_id))


        }






        // data['recordIds']  = rowIdToSubmit  
        // data['recordIds']  = rowIdToSubmit  







    });


    let data = {

        recordIds: rowIdToSubmit,
        rowIdToSubmit: "rowIdToSubmit"

    };


    $.get("../phpAjax/txnAjaxData.php", data, function (data) {



        console.log(data);

        alert(data.message)


        rows.forEach(row => {

            let checkbox = row.querySelector("input[type='checkbox']")


            if (checkbox.checked) {



                checkbox.disabled = true;
                $(checkbox).slideToggle(2000)

                checkbox.checked = false

            }





        })



        console.log("jdfiej");

    }, "json").fail(error => {
        console.log(error);
    })




    // console.log(chekedRow);
    console.log(rowIdToSubmit);



    // console.log(rows);









}