console.log("hey")

let getUSerDataByUserName = () => {

    let recordNo = $("#record_no").val()



    console.log(recordNo)



    data = {
        recordNo: recordNo
        , getUSerDataByUserName: "getUSerDataByUserName"
    }


    console.log(data)


    $.get("./phpAJax/leadSearchAjax.php", data, function (data) {
        console.log(data)


        if (data.success) {

            let userdata = data.data[0]


            $("#created_by").val(userdata.created_by)
            $("#created_date").val(userdata.created_date)
            $("#form_status").val(userdata.form_status)
            $("#lead_source").val(userdata.lead_source)
            $("#ref_By").val(userdata.ref_By)
            $("#ref_phone_no").val(userdata.ref_phone_no)
            $("#lead_type").val(userdata.lead_type)
            $("#contact_person_name").val(userdata.contact_person_name)
            $("#contact_person_phone_no").val(userdata.contact_person_phone_no)
            $("#contact_person_email").val(userdata.contact_person_email)
            $("#contact_person_address").val(userdata.contact_person_address)
            $("#lead_received_date").val(userdata.lead_received_date)
            $("#assigned_to").val(userdata.assigned_to)
            $("#query_start_date").val(userdata.query_start_date)
            $("#follow_up").val(userdata.follow_up)
            $("#followup_reminder_frequency").val(userdata.followup_reminder_frequency)
            $("#no_of_times").val(userdata.no_of_times)
            $("#query_end_date").val(userdata.query_end_date)
            $("#installation_required").val(userdata.installation_required)
            $("#tentative_installation").val(userdata.tentative_installation)
            $("#tentative_delivery_date").val(userdata.tentative_delivery_date)








            // console.log(userdata.tentative_installation)
            console.log(userdata.created_by)








            let data1 = {
                getUSerDataByUserName: "getUSerDataByUserName",
                recordNo: recordNo
            }


            console.log("Here start my code")
            $.get("./phpAJax/leadSearchAjax.php", data1, function (data) {
                console.log(data);


                let rowData = data.data

                $("#searchTableTbody").html(" ")

                rowData.forEach(row => {



                    $("#searchTableTbody").append(`
                                    <tr class="border-b dark:border-gray-700">
                                    <td class="px-3 py-3 text-center">
                                        <input type="checkbox" value="" >
                                    </td>
                                    <td class="px-6 py-3">
                                        <input type="number" value="${row.id}" class="w-20">
                                    </td>
                                    <td class="px-6 py-3">
                                        <input type="number" value="${row.record_no}" class="w-20">    
                                    </td>
                                    <td class="px-6 py-3">
                                        <input type="text" value="${row.assigned_to}" class="w-40">    
                                    </td>
                                    <td class="px-6 py-3">
                                        <input type="date" value="${row.query_start_date}">  
                                    </td>
                                    <td class="px-6 py-3">
                                        <input type="text" value="${row.follow_up}" class="w-16">
                                    </td>
                                    <td class="px-6 py-3">
                                        <input type="date" value="${row.followup_reminder_frequency}" >
                                    </td>
                                    <td class="px-6 py-3">
                                        <input type="number" value="${row.no_of_times}" class="w-20">
                                    </td>
                                    <td class="px-6 py-3">
                                        <input type="date" value="${row.query_end_date}">
                                    </td>
                                    <td class="px-6 py-3">
                                        <input type="text" value="${row.installation_required}" class="w-16">              
                                    </td>
                                    <td class="px-6 py-3">
                                        <input type="date" value="${row.tentative_installation}">
                                    </td>
                                    <td class="px-6 py-3">
                                        <input type="date" value="${row.tentative_delivery_date}">
                                    </td>

                                </tr>`)

                });







            }, "json")


            console.log(userdata)
















        }









    }, "JSON").fail(error => {
        console.log(error)
    })


}