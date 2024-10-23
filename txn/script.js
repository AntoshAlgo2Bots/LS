
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
            success: function (response) {
                alert('Your form has been sent successfully.');
                console.log(response)
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