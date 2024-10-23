

let getUSerDataByUserName = () => {

    let txnNo = $("#transaction_no").val()



    console.log(txnNo)



    data = {
        txnNo: txnNo
        , getUSerDataByUserName: "getUSerDataByUserName"
    }





    $.get("../phpAJax/txnAjax.php", data, function (data) {
        console.log(data)



        if (data.success) {

            let userdata = data.data[0]


            $("#amount_type").val(userdata.amount_type)
            $("#credit_amt").val(userdata.credit_amt)
            $("#debit_amt").val(userdata.debit_amt)
            $("#particuler_to").val(userdata.particuler_to)
            $("#site").val(userdata.site)
            $("#main_head").val(userdata.main_head)
            $("#sub_head").val(userdata.sub_head)
            $("#bill_cheque_no").val(userdata.bill_cheque_no)
            $("#invoice_date").val(userdata.invoice_date)
            $("#invoice_no").val(userdata.invoice_no)
            $("#gst_no").val(userdata.gst_no)
            $("#remarks").val(userdata.remarks)
            $("#created_by").val(userdata.currentUser)
            $("#created_date").val(userdata.currentTime)








            console.log(userdata.currentUser)




            console.log(userdata)


        }









    }, "JSON").fail(error => {
        console.log(error)
    })


}