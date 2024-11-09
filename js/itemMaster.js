
console.log("hello from item master");

let attrArray = []

const setRequireFieldsFromCategory = () => {


    // document.getElementById("attrArea").innerText = "";
    // document.getElementById("attrArea").style.display="flex";


    let id = document.getElementById("catId").value;

    data = {
        categoryFields: "categoryFields",
        catId: id
    }

    $.ajax({

        url: "ajaxItemMaster.php",
        method: "GET",
        data,
        dataType: "json",
        success: function (data) {
            document.getElementById("sub_catArea").innerText = ""
            let resData = data.data

            addSubCatFields(resData)


        }, error: function (error) {
            console.log(error)
        }


    })





}





let remquireFieldsObject = {};
const addRequireField = (data) => {



    //pass the array for the loop





    let mainBox = document.getElementById("attrArea")

    // mainBox.display="flex"


    let mainData = Array.from(data)



    mainData.forEach(element => {

        // console.log(element);


        console.log(element);

        var div = document.createElement("div")
        div.classList.add("mb-4", "md:mr-2", "max-w-1", "md:mb-0")
        console.log("heddededello");

        var lable = document.createElement("lable")
        lable.classList.add("block", "mb-2", "text-sm", "name", "font-bold", "text-gray-700", "dark:text-white")
        lable.innerText = element.name;


        var input = document.createElement("input")
        input.name = element.name
        input.classList.add("w-full", "px-3", "py-2", "text-sm", "leading-tight", "text-gray-700", "dark:text-white", "border", "rounded", "shadow", "appearance-none", "focus:outline-none", "focus:shadow-outline");
        input.setAttribute("catId", element.catId)
        input.placeholder = element.name

        //need to comment because due to get user input 
        // input.setAttribute("attribut-id",)

        div.appendChild(lable)
        div.appendChild(input)

        mainBox.appendChild(div);



    });
    div.appendChild(lable)
    div.appendChild(input)

    mainBox.appendChild(div);







    div.appendChild(lable)
    div.appendChild(input)

    mainBox.appendChild(div);






}


const hideData = (event) => {
    event.preventDefault();

    let mainBox = document.getElementById("attrArea")


    mainBox.style.display = "none"



}


let currentSubCatNameFor = "";

//object passs
const addSubCatFields = (data) => {




    let mainBox = document.getElementById("sub_catArea")



    // run with sub category base


    console.log(data);


    Object.keys(data).forEach((element, index) => {



        let h1 = document.createElement("h1");
        h1.classList.add("font-bold", "cursor-auto")
        h1.textContent = element
        let btn = document.createElement("a")
        btn.innerText = "+";
        btn.style.cursor = "pointer"
        btn.style.cursor = 'pointer'
        btn.setAttribute("sub-name", element)

        let tempId = `attr${index}`
        attrArray.push(tempId)
        btn.setAttribute("attr-id", tempId)


        // console.log(tempId);

        btn.onclick = function (event) {

            shoeOrHideattr(event)

            currentSubCatNameFor = event.target.getAttribute("sub-name")

        }


        var fileInput = document.createElement("input")
        fileInput.type = "file";
        fileInput.name = "itemImage";




                let select02 = document.createElement("select")
                select02.name = "finish_type"
                select02.classList.add( "px-3", "py-2", "text-sm", "leading-tight", "text-gray-700", "dark:text-white", "border", "rounded", "shadow", "appearance-none", "focus:outline-none", "focus:shadow-outline");




                select02.style.minWidth = "10rem"
                select02.classList.add("cursor-pointer")
                select02.required = true
                select02.style.cursor = "pointer"




            select02.innerHTML  = `
        
        

            <option selected hidden disabled>Select</option>
            <option value="finish_good">Finish good</option>
            <option value="row_item"> Raw item </option>`






            

            

        let attr = document.createElement("div");
        attr.classList.add("mb-4", "hidden", "mt-4", "transition-all", "border-2-black-600", "md:flex-wrap", "flex", "flex-wrap")
        attr.id = `attr${index}`


        attr.appendChild(fileInput)
        attr.appendChild(select02)

        mainBox.appendChild(h1)
        mainBox.appendChild(btn)

        // run with attr base

        data[element].forEach(element => {

            // console.log(element.name);

            // console.log(element.attr_id);


            var div = document.createElement("div")
            div.classList.add("mb-4", "md:mr-2", "max-w-1", "md:mb-0")


            var lable = document.createElement("lable")
            lable.classList.add("block", "mb-2", "text-sm", "name", "cursor-auto", "font-bold", "text-gray-700", "dark:text-white")
            lable.innerText = element.name;

            lable.setAttribute("dt_name", element.name)
            var input = document.createElement("input")
            input.name = element.name
            input.id = element.name
            input.classList.add("w-full", "px-3", "py-2", "text-sm", "hover:outline", "leading-tight", "text-gray-700", "dark:text-white", "border", "rounded", "shadow", "appearance-none", "focus:outline-none", "focus:shadow-outline");
            input.placeholder = element.name
            // input.value = element.name
            input.setAttribute("attr-id", element.attr_id)
            input.setAttribute("subCat-id", element.SubcatId)



            if (element.dropdown == "yes") {


                input = document.createElement("select");
                input.name = element.name;
                input.classList.add("w-full", "px-3", "py-2", "text-sm", "leading-tight", "text-gray-700", "dark:text-white", "border", "rounded", "shadow", "appearance-none", "focus:outline-none", "focus:shadow-outline");
                input.setAttribute("attr-id", element.attr_id)
                input.setAttribute("subCat-id", element.SubcatId)
                input.style.minWidth = "10rem"
                input.id = element.name
                input.value = element.name
                input.classList.add("cursor-pointer")
                input.required = true
                input.style.cursor = "pointer"



                var option = document.createElement("option")
                option.innerText = "select"
                option.hidden = "true"
                input.appendChild(option)

                $.ajax({

                    url: "ajaxItemMaster.php",
                    method: "GET",
                    dataType: "json",
                    data: {
                        getOptionAttr: "getOptionAttr",
                        attr_id: element.attr_id
                    },
                    success: function (data) {


                        // console.log(data.data);

                        data.data.forEach(element => {


                            var option = document.createElement("option")

                            function capitalizeFirstLetter(string) {
                                return string.charAt(0).toUpperCase() + string.slice(1);
                            }


                            // option.innerText = element.description;
                            option.innerText = capitalizeFirstLetter(element.description);
                            option.value = capitalizeFirstLetter(element.description);

                            // console.log(element.description);

                            input.appendChild(option)


                        })



                    }, error: function (error) {
                        console.log(error)
                    }



                })




                if (element.name === "Shape") {

                    input.onchange = function (event) {
                        let dt = event.target;





                        if (dt.value === "Circle") {
                            let length = document.getElementById("Length");
                            let breadth = document.getElementById("Breadth");


                            console.log(dt.parentElement)

                            let lables = ((dt.parentElement).parentElement).getElementsByTagName("lable");

                            Array.from(lables).forEach(element => {
                                console.log(element.getAttribute("dt_name"));

                                if (element.getAttribute("dt_name") == "Length") {
                                    element.setAttribute("dt_name", "Upper_Dia")

                                    element.innerText = "Upper_Dia"

                                }



                            })

                            Array.from(lables).forEach(element => {


                                if (element.getAttribute("dt_name") == "Breadth") {

                                    element.setAttribute("dt_name", "Bottom_Dia")
                                    element.innerText = "Bottom_Dia"


                                }

                            })






                            length.name = "Upper_Dia"
                            length.placeholder = "Upper_Dia"
                            // length.style.backgroundColor = "red"
                            // breadth.style.backgroundColor = "red"
                            breadth.name = "Bottom_Dia"
                            breadth.placeholder = "Bottom_Dia"

                            // length.remove()
                            // breadth.remove()




                            // console.log(height);
                        } else {

                            let length = document.getElementById("Length");
                            let breadth = document.getElementById("Breadth");
                            length.name = "Length"
                            length.placeholder = "Length"
                            breadth.name = "Breadth"
                            breadth.placeholder = "Breadth"

                            let lables = ((dt.parentElement).parentElement).getElementsByTagName("lable");

                            Array.from(lables).forEach(element => {
                                console.log(element.getAttribute("dt_name"));

                                if (element.getAttribute("dt_name") == "Upper_Dia") {

                                    element.setAttribute("dt_name", "Length")
                                    element.innerText = "Length"

                                }

                            })
                            Array.from(lables).forEach(element => {
                                console.log(element.getAttribute("dt_name"));
                                if (element.getAttribute("dt_name") == "Bottom_Dia") {

                                    element.setAttribute("dt_name", "Breadth")
                                    element.innerText = "Breadth"


                                }


                            })





                        }
                    };
                }



            }



            div.appendChild(lable)
            div.appendChild(input)

            attr.appendChild(div)
            // attr.classList.add()
        })



        var div = document.createElement("div")
            div.classList.add("mb-4", "md:mr-2", "max-w-1", "md:mb-0")


            var lable = document.createElement("lable")
            lable.classList.add("block", "mb-2", "text-sm", "name", "cursor-auto", "font-bold", "text-gray-700", "dark:text-white")
            lable.innerText = "Item type";



        div.appendChild(lable)
        div.appendChild(select02)
        attr.appendChild(div)
        mainBox.appendChild(attr)


    })





}


let selectedSubCat = 0;

const shoeOrHideattr = (event) => {


    // console.log(events);

    event.target.innerText = "-"

    let id = event.target.getAttribute("attr-id")

    // console.log(id);


    let openTheAttr = attrArray.filter(element => {

        if (element !== id) {
            return true
        }
    })

    // console.log(openTheAttr);

    // target.closest("div")

    // console.log(target.closest("div"));


    selectedSubCat = id

    div = document.getElementById(id)

    // div.style.display="block"

    if (div.classList.contains("hidden")) {

        // div.classList.add("blvo ")
        // div.style.display="block"

        div.classList.remove("hidden")

        // console.log("D");
    } else {
        div.classList.add("hidden")

        event.target.innerText = "+"

    }


    openTheAttr.forEach(element => {

        document.getElementById(element).classList.add("hidden")


    })






}








let currentItemStatus = "Save";




if (document.getElementById("itemSubmit")) {
    document.getElementById("itemSubmit").addEventListener("click", () => {

        console.log(currentItemStatus);
        currentItemStatus = "SUBMIT";
    })


    document.getElementById("itemSave").addEventListener("click", () => {

        currentItemStatus = "SAVE";
        console.log(currentItemStatus);
    })

}




const submitItemInfoToDb = async () => {


    let inputs = document.getElementById(selectedSubCat).querySelectorAll("input")
    let select = document.getElementById(selectedSubCat).querySelectorAll("select")



    let itemFilePath = "";

    let fileItem = document.getElementById(selectedSubCat).querySelector('[name="itemImage"]');

    if (fileItem && fileItem.files.length > 0) {
        var formData = new FormData();
        formData.append('itemImage', fileItem.files[0]);

        // Assuming there are other fields in the form to append to formData

        await $.ajax({
            url: 'ajaxItemMaster.php',
            type: 'POST',
            data: formData,
            dataType: "JSON",
            contentType: false, // Prevent jQuery from setting Content-Type header
            processData: false, // Prevent jQuery from converting the data into a query string
            success: function (response) {

                console.log("File path is :" + response.filePath);
                console.log(response);

                itemFilePath = response.filePath;

                document.getElementById("uploaded_file_path").style.display = "block"
                document.getElementById("uploaded_file_path").src = `./images/${itemFilePath}`

            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error('Error:', textStatus, errorThrown);
            }
        });
    } else {
        console.log("No file selected or file input not found.");
    }



    let withName = {}
    let itemCodeGen = "";

    let itemDataInfo = {}
    itemDataInfo["itemMasterSave"] = "itemMasterSave"


    itemDataInfo["manCatId"] = document.getElementById("catId").value


    itemCodeGen += catId.options[catId.selectedIndex].text.substring(0, 2)



    let attInfo = {};

    let fields_is_noteValid = false;

    let shortDescription = currentSubCatNameFor;
    let maxLenWord = 0;
    inputs.forEach((element, index) => {


        let attrName = element.getAttribute("name");
        let attributeValue = element.value

        // console.log(element);

        if (attributeValue.trim() == "") {
            fields_is_noteValid = true;
        }
        attInfo[attrName] = attributeValue

        itemDataInfo["SubCatid"] = element.getAttribute("subCat-id")


        if (index > 0 & index < 6) {
            shortDescription += "-"
            shortDescription += attributeValue.substring(0, 4)



        }

        if (index > 0 & index < 10) {
            itemCodeGen += "-"
            itemCodeGen += attributeValue.substring(0, 2)
            maxLenWord++;
        }

    })


    console.log(shortDescription.toUpperCase());
    if (fields_is_noteValid) {
        alert("please fill all the value")

        inputs.forEach(element => {


            let attributeValue = element.value

            if (attributeValue.trim() == "") {

                element.style.borderColor = "RED";
            }

        })

    } else {



        itemDataInfo["filePath"] = itemFilePath;

        select.forEach(element => {


            let attrName = element.getAttribute("name");
            let attributeValue = element.value



            attInfo[attrName] = attributeValue

        })



        attInfo["Short_Description"] = shortDescription.toUpperCase()

        shortDescription



        itemDataInfo["itemCodeGenrated"] = itemCodeGen.toUpperCase();


        itemDataInfo["currentItemStatus"] = currentItemStatus;
        itemDataInfo["attrData"] = attInfo;




        // console.log(itemDataInfo);

        let spiner = `<div role="status">
    <svg aria-hidden="true" class="inline w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
    </svg>
    <span class="sr-only">Loading...</span>
</div>

`

        $("#itemSave").html(spiner)

        await $.ajax({

            url: "ajaxItemMaster.php",
            method: "GET",
            dataType: "JSON",
            data: itemDataInfo,

            success: function (data) {

                $("#itemSave").html("Save")

                console.log(data);

                console.log(data.success);

                if (data.success) {

                    if (currentItemStatus == "SAVE") {
                        alert("data saved")

                        document.getElementById("recordId").innerText = `Rcord Id : ${data.recordId} .`
                        document.getElementById("recordId").style.display = "block"
                        document.getElementById("Item_code").innerText = `Item Code : ${data.ItemCode} .`
                        document.getElementById("Item_code").style.display = "block"
                        $("#short_discription").show()
                        $("#short_discription").text(`Short Description : ${data.shortDiscription} .`)

                    }
                }

                // if (data[success]) { 

                //     alert("data saved")

                //     document.getElementById("recordId").innerText = `Rcord Id : ${data.recordId} .`
                //     document.getElementById("recordId").style.display = "block"
                //     document.getElementById("Item_code").innerText = `Item Code : ${data.ItemCode} .`
                //     document.getElementById("Item_code").style.display = "block"
                // }
                if (currentItemStatus == "SUBMIT") {

                    alert("Data has been submited")


                    document.getElementById("recordId").innerText = `Rcord Id : ${data.recordId} .`
                    document.getElementById("recordId").style.display = "block"
                    document.getElementById("Item_code").innerText = `Item Code : ${data.ItemCode} .`
                    document.getElementById("Item_code").style.display = "block"


                    inputs.forEach(element => {


                        element.disabled = true

                        // document.getElementById("itemSubmit").hasAttribute
                        $("#itemSubmit").hide()
                        $("#itemSave").hide()


                    })

                }



                select.forEach(element => {


                    element.disabled = true
                })
            }


        })







    }


}









const sendDataToItemMasterMain = (event) => {

    //    console.log(event.target)\

    btn = event.target
    let row = btn.closest("tr")
    let inputs = btn.closest("tr").querySelectorAll("input")
    let select = btn.closest("tr").querySelectorAll("select")

    // console.log(object);

    // var formdata = new FormData();



    // if (select.value == "submitToItemMaster") {


    let inputFieldsData = {};
    let attrData = {};
    inputs.forEach(element => {

        // console.log(element);



        let itemName = element.name;
        let value = element.value;

        // console.log(element.type);

        attrData[itemName] = value;
        // 
    })
    select.forEach(element => {

        // console.log(element);



        let itemName = element.name;
        let value = element.value;

        // console.log(element.type);

        attrData[itemName] = value;
        // 
    })







    inputFieldsData["submitDataTOItemMaster"] = "submitToMainItemMas";
    inputFieldsData["attrData"] = attrData;



    // console.log(inputFieldsData)


    $.ajax({

        url: "ajaxItemMaster.php",
        method: "POST",
        dataType: "JSON",
        data: inputFieldsData,
        success: function (data) {

            console.log(data)



             if (data.Status=="Reject") {
                alert("Item rejected")
                btn.style.display = "none"
            }
            else if (data.success) {

                alert("Item has been successfully created")
                 btn.style.display = "none"

            }


            else if (!data.success) {
                alert("please try again")
            }


        }, error: function (error) {
            console.log(error);

        }




    })
    // console.log(fieldsData);

    // } else {
    // alert("plase change status to submit")
    // }


}


//this function ajax requesting and the response data to the setTableFormSubCat function

const setDataToItemManager = async () => {


    let selectedSubCatId = document.getElementById("ManagerRuleCatId").value

    // electrinicd id 



    // sub cat = 1 id name is bulb

    let spinner = `<div role="status">
    <svg aria-hidden="true" class="inline w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
    </svg>
    <span class="sr-only">Loading...</span>
</div>`


    let teadRow = document.getElementById("data_headTh");

    let tbody = document.getElementById("dataBodyTd")
    tbody.innerHTML = spinner
    teadRow.innerHTML = spinner



    await $.ajax({
        url: "ajaxItemMaster.php",
        method: "GET",
        dataType: "JSON",
        data: {
            getColumnInfo: "getColumnInfo",
            selectedSubCatId: selectedSubCatId
        },
        success: function (data) {
            // console.log(data.tbody_data);

            setTableFormSubCat(data.tbody_data)


        }
    })


}




//this function for to set table data for manager approval
const setTableFormSubCat = (data) => {

    // console.log(data);
    document.getElementById("dataBodyTd").innerText = "";

    let teadRow = document.getElementById("data_headTh");
    teadRow.innerText = "";


    Object.keys(data[0]).forEach(element => {
        let th = document.createElement("th")
        th.classList.add("px-5", "py-2")
        th.setAttribute("scope", "col")
        th.innerText = element
        teadRow.appendChild(th)

    })
    let th = document.createElement("th")
    th.classList.add("px-5", "py-2")
    th.setAttribute("scope", "col")
    th.innerText = "image"
    teadRow.appendChild(th)



    data.forEach(element => {

        let tbody = document.getElementById("dataBodyTd")

        // console.log(element.itemStatus);

        var tr = document.createElement("tr")

        var btn = document.createElement("button")
        btn.innerText = "Submit Updates"
        btn.name = "sendToItemToItemMaster"
        btn.classList.add("inline-flex", "mr-2", "items-center", "py-2.5", "px-5", "ms-2", "text-sm", "font-medium", "text-white", "bg-blue-700", "rounded-lg", "border", "border-blue-700", "hover:bg-blue-800", "focus:ring-4", "focus:outline-none", "focus:ring-blue-300,", "dark:bg-blue-600", "dark:hover:bg-blue-700", "dark:focus:ring-blue-800")
        btn.setAttribute("data-item-code", element['item_code'])
        btn.onclick = function (event) {
            sendDataToItemMasterMain(event)
        }



        // 
        // <button name="update_reqsuisition" onclick="sendElectricDataToItemMaster(event)"

        // data-item-code="<?php echo $row["item_code"];  ?>"
        // class=" inline-flex mr-2  items-center py-2.5 px-5 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" onclick="getDataOfEditIssuer(event)">
        // Update</button>

        Object.keys(element).forEach(mainData => {

            // console.log(mainData);


            // <input
            // name="subCatId"
            // disabled
            // class=" bg-transparent text-blue-gray-700 font-sans font-normal outline outline-0 focus:outline-0 disabled:bg-blue-gray-50 disabled:border-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 border focus:border-2 border-t-transparent focus:border-t-transparent text-sm px-5 py-2.5 rounded-[7px] border-blue-gray-200 focus:border-gray-900"
            // value="<?php echo $row["subCatId"] ?>"
            // placeholder=" ">

            var input = document.createElement("input")
            input.name = mainData
            input.classList.add("bg-transparent", "text-blue-gray-700", "font-sans", "font-bold", "outline", "outline-0", "focus:outline-0", "disabled:bg-blue-gray-50", "disabled:border-0", "transition-all", "placeholder-shown:border", "placeholder-shown:border-blue-gray-200", "placeholder-shown:border-t-blue-gray-200", "border", "focus:border-2", "border-t-transparent", "focus:border-t-transparent", "text-sm", "px-5", "py-2.5", "rounded-[7px]", "border-blue-gray-200", "focus:border-gray-900")
            input.disabled = true
            input.value = element[mainData]


            if (mainData == "itemStatus") {

                input = document.createElement("select")
                input.name = mainData
                input.classList.add("bg-transparent", "text-blue-gray-700", "font-sans", "font-bold", "outline", "outline-0", "focus:outline-0", "disabled:bg-blue-gray-50", "disabled:border-0", "transition-all", "placeholder-shown:border", "placeholder-shown:border-blue-gray-200", "placeholder-shown:border-t-blue-gray-200", "border", "focus:border-2", "border-t-transparent", "focus:border-t-transparent", "text-sm", "px-5", "py-2.5", "rounded-[7px]", "border-blue-gray-200", "focus:border-gray-900")
                input.value = element[mainData]


                var option = document.createElement("option")
                option.value = "SUBMIT"
                option.innerText = "SUBMIT"
                input.appendChild(option)
                if (element[mainData] === "SUBMIT") option.selected = true;


                var option2 = document.createElement("option")
                option2.value = "Approve"
                option2.innerText = "Approve"
                input.appendChild(option2)
                if (element[mainData] === "Approve") option2.selected = true;


                var option3 = document.createElement("option")
                option3.value = "Reject"
                option3.innerText = "Reject"
                input.appendChild(option3)
                if (element[mainData] === "Reject") option3.selected = true;

                var option4 = document.createElement("option")
                option4.value = "SAVE"
                option4.innerText = "SAVE"
                input.appendChild(option4)
                if (element[mainData] === "SAVE") option4.selected = true;



            }




            var td = document.createElement("td")
            td.classList.add("px-5", "py-2")
            td.appendChild(input)
            // td.innerText = element[mainData]
            // console.log(element[mainData]);


            tr.appendChild(td)

        })


        // console.log(element);

        var image = document.createElement("img")

        image.src = "./images/" + element['imagePath'];
        image.alt = "Dynamic Image";
        // image.width="10rem"
        image.style.maxWidth = "200px"
        image.style.borderRadius = "10px"
        var td = document.createElement("td")
        td.classList.add("px-5", "py-2")
        td.appendChild(image)



        tr.appendChild(td)

        if (element.itemStatus != "Approve" ) {
           console.log("this is approce item");  tr.appendChild(btn)
        }
        document.getElementById("dataBodyTd").appendChild(tr);

        console.log("Diej");

    })








}



//this function for to set table data for manager approval searchingbox
const setTableFormSubCatSearch = (data) => {

    // console.log(data);
    document.getElementById("dataBodyTd").innerText = "";

    let teadRow = document.getElementById("data_headTh");
    teadRow.innerText = "";


    Object.keys(data[0]).forEach(element => {
        let th = document.createElement("th")
        th.classList.add("px-5", "py-2")
        th.setAttribute("scope", "col")
        th.innerText = element
        teadRow.appendChild(th)

    })
    let th = document.createElement("th")
    th.classList.add("px-5", "py-2")
    th.setAttribute("scope", "col")
    th.innerText = "image"
    teadRow.appendChild(th)



    data.forEach(element => {

        let tbody = document.getElementById("dataBodyTd")




        var tr = document.createElement("tr")

        var btn = document.createElement("button")
        btn.innerText = "Submit Updates"
        btn.name = "sendToItemToItemMaster"
        btn.classList.add("inline-flex", "mr-2", "items-center", "py-2.5", "px-5", "ms-2", "text-sm", "font-medium", "text-white", "bg-blue-700", "rounded-lg", "border", "border-blue-700", "hover:bg-blue-800", "focus:ring-4", "focus:outline-none", "focus:ring-blue-300,", "dark:bg-blue-600", "dark:hover:bg-blue-700", "dark:focus:ring-blue-800")
        btn.setAttribute("data-item-code", element['item_code'])
        btn.onclick = function (event) {
            sendDataToItemMasterMain(event)
        }



        // console.log(btn);




        // 
        // <button name="update_reqsuisition" onclick="sendElectricDataToItemMaster(event)"

        // data-item-code="<?php echo $row["item_code"];  ?>"
        // class=" inline-flex mr-2  items-center py-2.5 px-5 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" onclick="getDataOfEditIssuer(event)">
        // Update</button>

        Object.keys(element).forEach(mainData => {

            // console.log(mainData);


            // <input
            // name="subCatId"
            // disabled
            // class=" bg-transparent text-blue-gray-700 font-sans font-normal outline outline-0 focus:outline-0 disabled:bg-blue-gray-50 disabled:border-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 border focus:border-2 border-t-transparent focus:border-t-transparent text-sm px-5 py-2.5 rounded-[7px] border-blue-gray-200 focus:border-gray-900"
            // value="<?php echo $row["subCatId"] ?>"
            // placeholder=" ">

            var input = document.createElement("input")
            input.name = mainData
            input.classList.add("bg-transparent", "text-blue-gray-700", "font-sans", "font-bold", "outline", "outline-0", "focus:outline-0", "disabled:bg-blue-gray-50", "disabled:border-0", "transition-all", "placeholder-shown:border", "placeholder-shown:border-blue-gray-200", "placeholder-shown:border-t-blue-gray-200", "border", "focus:border-2", "border-t-transparent", "focus:border-t-transparent", "text-sm", "px-5", "py-2.5", "rounded-[7px]", "border-blue-gray-200", "focus:border-gray-900")
            input.disabled = true
            input.value = element[mainData]






            var td = document.createElement("td")
            td.classList.add("px-5", "py-2")
            td.appendChild(input)
            // td.innerText = element[mainData]
            // console.log(element[mainData]);


            tr.appendChild(td)

        })


        console.log(element);

        var image = document.createElement("img")

        image.src = "./images/" + element['imagePath'];
        image.alt = "Dynamic Image";
        // image.width="10rem"
        image.style.maxWidth = "200px"
        image.style.borderRadius = "10px"
        var td = document.createElement("td")
        td.classList.add("px-5", "py-2")
        td.appendChild(image)

        var td2 = document.createElement("td")
        td2.classList.add("px-5", "py-2")



        tr.appendChild(td)

        if (element.itemStatus != "Approve`") {

            td2.appendChild(btn)
        }

        tr.appendChild(td2)

        document.getElementById("dataBodyTd").appendChild(tr);


    })








}


const setItemTableDataView = (data) => {
    document.getElementById("dataBodyTd").innerText = "";

    let teadRow = document.getElementById("data_headTh");
    teadRow.innerText = "";


    Object.keys(data[0]).forEach(element => {
        let th = document.createElement("th")
        th.classList.add("px-5", "py-2")
        th.setAttribute("scope", "col")
        th.innerText = element
        teadRow.appendChild(th)

    })
    let th = document.createElement("th")
    th.classList.add("px-5", "py-2")
    th.setAttribute("scope", "col")
    th.innerText = "image"
    teadRow.appendChild(th)



    data.forEach(element => {

        let tbody = document.getElementById("dataBodyTd")



        var tr = document.createElement("tr")

        // var btn = document.createElement("button")
        // btn.innerText = "Submit Updates"
        // btn.name = "sendToItemToItemMaster"
        // btn.classList.add("inline-flex", "mr-2", "items-center", "py-2.5", "px-5", "ms-2", "text-sm", "font-medium", "text-white", "bg-blue-700", "rounded-lg", "border", "border-blue-700", "hover:bg-blue-800", "focus:ring-4", "focus:outline-none", "focus:ring-blue-300,", "dark:bg-blue-600", "dark:hover:bg-blue-700", "dark:focus:ring-blue-800")
        // btn.setAttribute("data-item-code", element['item_code'])
        // btn.onclick = function (event) {
        //     sendDataToItemMasterMain(event)
        // }



        // 
        // <button name="update_reqsuisition" onclick="sendElectricDataToItemMaster(event)"

        // data-item-code="<?php echo $row["item_code"];  ?>"
        // class=" inline-flex mr-2  items-center py-2.5 px-5 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" onclick="getDataOfEditIssuer(event)">
        // Update</button>

        Object.keys(element).forEach(mainData => {

            // console.log(mainData);


            // <input
            // name="subCatId"
            // disabled
            // class=" bg-transparent text-blue-gray-700 font-sans font-normal outline outline-0 focus:outline-0 disabled:bg-blue-gray-50 disabled:border-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 border focus:border-2 border-t-transparent focus:border-t-transparent text-sm px-5 py-2.5 rounded-[7px] border-blue-gray-200 focus:border-gray-900"
            // value="<?php echo $row["subCatId"] ?>"
            // placeholder=" ">

            var input = document.createElement("input")
            input.name = mainData
            input.classList.add("bg-transparent", "text-blue-gray-700", "font-sans", "font-bold", "outline", "outline-0", "focus:outline-0", "disabled:bg-blue-gray-50", "disabled:border-0", "transition-all", "placeholder-shown:border", "placeholder-shown:border-blue-gray-200", "placeholder-shown:border-t-blue-gray-200", "border", "focus:border-2", "border-t-transparent", "focus:border-t-transparent", "text-sm", "px-5", "py-2.5", "rounded-[7px]", "border-blue-gray-200", "focus:border-gray-900")
            input.disabled = true
            input.value = element[mainData]






            var td = document.createElement("td")
            td.classList.add("px-5", "py-2")
            td.appendChild(input)
            // td.innerText = element[mainData]
            // console.log(element[mainData]);


            tr.appendChild(td)

        })

        var image = document.createElement("img")

        image.src = "./images/" + element['imagePath'];
        image.alt = "image not found please contact to manager";
        // image.width="10rem"
        image.style.maxWidth = "200px"
        image.style.borderRadius = "10px"
        var td = document.createElement("td")
        td.classList.add("px-5", "py-2")
        td.appendChild(image)



        tr.appendChild(td)

        // tr.appendChild(btn)  

        document.getElementById("dataBodyTd").appendChild(tr);


    })








}


//this function is for ajax request and set response data to setItemTableDataView
const setDataToAllItemview = async () => {


    let selectedSubCatId = document.getElementById("ManagerRuleCatId").value

    // electrinicd id 



    // sub cat = 1 id name is bulb

    let spinner = `<div role="status">
    <svg aria-hidden="true" class="inline w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
    </svg>
    <span class="sr-only">Loading...</span>
</div>`


    let teadRow = document.getElementById("data_headTh");

    let tbody = document.getElementById("dataBodyTd")
    tbody.innerHTML = spinner
    teadRow.innerHTML = spinner



    await $.ajax({
        url: "ajaxItemMaster.php",
        method: "GET",
        dataType: "JSON",
        data: {
            getAllItemInfo: "getAllItemInfo",
            selectedSubCatId: selectedSubCatId
        },
        success: function (data) {
            // console.log(data.tbody_data);

            setItemTableDataView(data.tbody_data)
            console.log(data);



        },error:error=>{
            console.log(error);
        }
    })


}



        

var itemManagerSearchbtn = document.getElementById("searchQueryBtnManagerItem")


itemManagerSearchbtn.addEventListener("click", function (event) {
    
    event.preventDefault();

    var text = $("#search_query").val()


    console.log("clieckd on query");


    searchDataInitemTampTable(text)

})






const searchDataInitemTampTable = (searchId) => {


    let id = searchId


            
    console.log("Clicked on search");

    $.ajax({
        url: "ajaxItemMaster.php",
        method: "GET",
        dataType: "JSON",
        data: {
            searchDataInitemTampTable: "searchDataInitemTampTable",
            searchData: id
        },
        success: function (data) {

            console.log(data);
            setTableFormSubCatSearch(data.tbody_data)
        },error:function (error) {


            console.log(error);


          }
    })




}




// var itemViewDataSearch = document.getElementById("searchQueryBtnForAllItemView")


// itemViewDataSearch.addEventListener("click", function (event) {

//     event.preventDefault();

//     var text = $("#search_query").val()


//     serchDataInAllItemView(text)

// })




const serchDataInAllItemView = (searchId) => {


    let id = searchId




    $.ajax({
        url: "ajaxItemMaster.php",
        method: "GET",
        dataType: "JSON",
        data: {
            searchDataInitemTampTable: "searchDataInitemTampTable",
            searchData: id
        },
        success: function (data) {

            console.log(data);
            setItemTableDataView(data.tbody_data)
        }
    })




}