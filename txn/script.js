
function verifyAnswer() {


    let select_amt = document.getElementById('select_amt')
    var result = select_amt.options[select_amt.selectedIndex].text;


    console.log(result)

    if (result === "Credit") {
        document.getElementById('credit_amt_field').disabled = false;
        document.getElementById('credit_amt_field').placeholder = "Enter Your Credit Amount";
        document.getElementById('debit_amt_field').disabled = true;
        document.getElementById('debit_amt_field').placeholder = "";
        document.getElementById('debit_amt_field').readOnly = true; // Ensures debit field is not editable
    } else if (result === "Debit") {
        document.getElementById('debit_amt_field').disabled = false;
        document.getElementById('debit_amt_field').placeholder = "Enter Your Debit Amount";
        document.getElementById('credit_amt_field').disabled = true;
        document.getElementById('credit_amt_field').placeholder = "";
        document.getElementById('debit_amt_field').readOnly = false; // Allows editing
    } else {
        // If neither Credit nor Debit is selected, disable both fields
        document.getElementById('credit_amt_field').disabled = true;
        document.getElementById('debit_amt_field').disabled = true;
        document.getElementById('credit_amt_field').readOnly = true; // Ensures it remains non-editable
        document.getElementById('debit_amt_field').readOnly = true; // Ensures it remains non-editable
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
            dataType: "JSON",
            success: function (response) {
                alert(response.message);
                let tbody = $("#searchTableTbody")[0];

                console.log(response)




                let data = response.data


                $("#searchTableTbody").append(


                    `
                      
                                <td scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <input id="checkbox"  type="checkbox"
                                        
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                </td>
                                <td scope="row" class="px-6 py-4">
                                    <input type="text" name="transaction_no" id="" disabled
                                        value="${data.transaction_no}" class="w-20">
                                </td>
                                <td class="px-6 py-4">
                                    <input type="text" name="transaction_date" id=""
                                        value="${data.transaction_date}" class="w-32">
                                </td>
                                <td class="px-6 py-4">
                                    <input type="text" name="amount_type" id="" value="${data.amount_type}"
                                        class="w-20">
                                </td>
                                <td class="px-6 py-4">
                                    <input type="text" name="credit_amt" id="" value="${data.credit_amt}"
                                        class="w-24">
                                </td>
                                <td class="px-6 py-4">
                                    <input type="text" name="debit_amt" id="" value="${data.debit_amt}"
                                        class="w-24">
                                </td>
                                <td class="px-6 py-4">

                                    <input type="text" name="net_balance" id="" value="${data.net_balance}"
                                        disabled class="w-28">
                                </td>
                                <td class="px-6 py-4">
                                    <input type="text" name="particuler_to" id=""
                                        value="${data.particuler_to}">

                                </td>
                                <td class="px-6 py-4">
                                    <input type="text" name="site" id="" value="${data.site}">

                                </td>
                                <td class="px-6 py-4">
                                    <input type="text" name="main_head" id="" value="${data.main_head}"
                                        class="w-40">

                                </td>
                                <td class="px-6 py-4">
                                    <input type="text" name="sub_head" id="" value="${data.sub_head}"
                                        class="w-40">

                                </td>
                                <td class="px-6 py-4">
                                    <input type="text" name="sub_head" id="" value="${data.from}"
                                        class="w-40">

                                </td>
                                <td class="px-6 py-4">
                                    <input type="text" name="sub_head" id="" value="${data.to}"
                                        class="w-40">

                                </td>
                                <td class="px-6 py-4">
                                    <input type="text" name="sub_head" id="" value="${data.startKm}"
                                        class="w-40">

                                </td>
                                <td class="px-6 py-4">
                                    <input type="text" name="sub_head" id="" value="${data.endKm}"
                                        class="w-40">

                                </td>
                                <td class="px-6 py-4">
                                    <input type="text" name="sub_head" id="" value="${data.totalKm}"
                                        class="w-40">

                                </td>
                                <td class="px-6 py-4">
                                    <input type="text" name="sub_head" id="" value="${data.rate}"
                                        class="w-40">

                                </td>
                                <td class="px-6 py-4">
                                    <input type="text" name="sub_head" id="" value="${data.curretuser}"
                                        disabled class="w-32">

                                </td>
                                <td class="px-6 py-4">
                                    <input type="text" name="" id="" value="${data.currectTime}" disabled>

                                </td>
                                <td class="px-6 py-4">
                                    <input type="text" name="bill_cheque_no" id=""
                                        value="${data.bill_cheque_no}">

                                </td>
                                <td class="px-6 py-4">
                                    <input type="text" name="invoice_date" id="" value="${data.invoice_date}"
                                        class="w-28">

                                </td>
                                <td class="px-6 py-4">
                                    <input type="text" name="invoice_no" id="" value="${data.invoice_no}">

                                </td>
                                <td class="px-6 py-4">
                                    <input type="text" name="gst_no" id="" value="${data.gst_no}"
                                        class="w-28">

                                </td>
                                <td class="px-6 py-4">
                                    <input type="text" name="remarks" id="" value="${data.remarks}">

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