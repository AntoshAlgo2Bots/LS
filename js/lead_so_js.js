console.log("Manish Poll");



$("#create-so-number").on("click", function () {



    // console.log(this)



    let username = $("#contact_person_name").val()
    let user_address = $("#contact_person_address").val()
    let user_phone_number = $("#contact_person_phone_no").val()
    let user_email = $("#contact_person_email").val()
    let installation_is_required = $("#installation_required").val()
    let tntative_installation = $("#installation_required").val()
    let tentative_installation_date = $("#tentative_installation").val()
    let lead_head_id = $("#record_no").val()









    const container = document.getElementById("itemRows");
    const container1 = document.getElementById("itemRows1");
    const rows1 = container1.querySelectorAll('tr'); // Select all rows   
    const rows = container.querySelectorAll('tr'); // Select all rows           




    let itemData = []
    rows.forEach((row, index) => {

        let items = {}

        items.item_name = row.querySelector('input[name="item_name"]').value;
        // items.item_serial_no = row.querySelector('input[name="item_serial_no"]').value;
        items.item_qty = row.querySelector('input[name="item_qty[]"]').value;
        items.item_rate = row.querySelector('input[name="item_rate"]').value;
        items.item_total = row.querySelector('input[name="item_total[]"]').value;
        items.item_so_number = row.querySelector('input[name="item_so_number"]').value;
        // items.created_by = row.querySelector('input[name="created_by"]').value;
        items.ImagePreview = row.querySelector('img[name="ImagePreview"]').src;
        items.item_type = "finish_good"

        console.log(items);


        itemData.push(items)






    });

    rows1.forEach((row, index) => {

        let items = {}

        items.item_name = row.querySelector('input[name="item_name"]').value;
        // items.item_serial_no = row.querySelector('input[name="item_serial_no"]').value;
        items.item_qty = parseInt(row.querySelector('input[name="item_qty[]"]').value);
        items.item_rate = row.querySelector('input[name="item_rate"]').value;
        items.item_total = row.querySelector('input[name="item_total[]"]').value;
        items.item_so_number = row.querySelector('input[name="item_so_number"]').value;
        // items.created_by = row.querySelector('input[name="created_by"]').value;
        items.ImagePreview = row.querySelector('img[name="ImagePreview"]').src;
        items.item_type = "row_item"

        console.log(items);


        itemData.push(items)






    });



    console.log(itemData);










    let userInputData = {

        username,
        user_address,
        user_phone_number,
        user_email,
        installation_is_required,
        tntative_installation,
        tentative_installation_date,
        lead_head_id

    }

    let data = {

        userInputData: userInputData,
        inItems: itemData



    }


    // console.log(data);




    $.post("./phpAjax/saleOrderAjax.php", data,
        function (data) {

            console.log(data);


            if(data.success){

                alert( `so created success fully ${data.so_number}`)






                



    const container = document.getElementById("itemRows");
    const container1 = document.getElementById("itemRows1");
    let rows1 = container1.querySelectorAll('tr input[name="item_so_number"]'); // Select all rows   
    let rows = container.querySelectorAll('tr input[name="item_so_number"]'); // Select all rows           


    console.log(rows1);
    console.log(rows);  

                

                rows.forEach(input => {
                    input.value=data.so_number
                    input.ariaReadOnly=true
                    
                });

                rows1.forEach(input => {
                    input.value=data.so_number
                    input.ariaReadOnly=true
                    
                });













                $("#saleorderinfo").fadeIn();
                $("#sale_order_number").text(data.so_number);
                $("#sale_order_number").attr("so_number",data.so_number);



            }
                


        },
        "json"
    ).fail(error => {
        console.log(error.responseText);
    })
















})