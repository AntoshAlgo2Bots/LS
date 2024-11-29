let count = 1;

function finish_field() {
    let y = document.getElementById("finish_field");

    if (y) {
        let x = `<div id="raw_field_${count}" class="flex flex-wrap items-center border gap-x-5 border-gray-900 w-full p-2 rounded-lg mt-2">
                        <div>
                            <input id="default-checkbox" type="checkbox" value=""
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:border-gray-600">
                        </div>
                        <div>
                            <label class="block text-sm">S. No : </label>
                            <input type="text" name="item_serial_no"
                                class="w-12 rounded-md border text-xs border-gray-500 bg-white py-2 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                style="border-color: #C8A1E0;" /><br>
                        </div>
                        <div>
                            <label class="block text-sm">Item Name : </label>
                            <input type="text" name="item_name"
                                class="md:w-32 w-40 rounded-md border text-xs border-gray-500 bg-white py-2 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                style="border-color: #C8A1E0;" /><br>
                        </div>
                        <div>
                            <label class="block text-sm">Item Qty : </label>
                            <input type="number" name="item_qty"
                                class="w-24 rounded-md border text-xs border-gray-500 bg-white text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                style="border-color: #C8A1E0;" /><br>
                        </div>
                        <div>
                            <label class="block text-sm">Rate : </label>
                            <input type="number" name="item_rate"
                                class="w-24 rounded-md border text-xs border-gray-500 bg-white text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                style="border-color: #C8A1E0;" /><br>
                        </div>
                        <div>
                            <label class="block text-sm">Total : </label>
                            <input type="number" name="item_total"
                                class="w-28 rounded-md border text-xs border-gray-500 bg-white text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                style="border-color: #C8A1E0;" /><br>
                        </div>

                        <div>

                            <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                                class="text-gray-900 mt-5  focus:outline-none border border-gray-900 px-1  font-medium rounded-lg text-xs py-1 text-center"
                                type="button">if Ship another address </button>
                        </div>
                        <div class="w-28 h-24 border border-gray-900 rounded-md">
                            <img class="w-28 h-24 rounded-md" src="./images.png" alt="image preview">
                        </div>

                        <div>
                            <label class="block text-sm">SO Number : </label>
                            <input type="number" name="item_so_number"
                                class="w-24 rounded-md border text-xs border-gray-500 bg-white text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                style="border-color: #C8A1E0;" /><br>
                        </div>
                        <div>
                            <label class="block text-sm">Created By : </label>
                            <input type="text" name="item_so_number"
                                class="w-28 rounded-md border text-xs border-gray-500 bg-white text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                style="border-color: #C8A1E0;" /><br>
                        </div>
                        <div>
                            <label class="block text-sm">Status : </label>
                            <input type="text" name="item_so_number"
                                class="w-24 rounded-md border text-xs border-gray-500 bg-white text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                style="border-color: #C8A1E0;" /><br>
                        </div>
                        <div>
                            <button
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-1.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                type="button">
                                Create SO
                            </button>
                        </div>
                    </div>`;

        y.innerHTML += x;

        count++;
    } else {
        console.error("Element with ID 'finish_field' not found.");
    }
}






document.getElementById('remove_btn').addEventListener('click', function () {
    var finish_field = document.getElementById('finish_field');

    // Remove the last child of the container
    if (finish_field.lastElementChild) {
        finish_field.removeChild(finish_field.lastElementChild);
    }
});


function raw_field() {
    let y = document.getElementById("raw_field");

    if (y) {
        let x = `<div id="raw_field_${count}" class="flex flex-wrap items-center border gap-x-5 border-gray-900 w-full p-2 rounded-lg mt-2">
                        <div>
                            <input id="default-checkbox" type="checkbox" value=""
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:border-gray-600">
                        </div>
                        <div>
                            <label class="block text-sm">S. No : </label>
                            <input type="text" name="item_serial_no"
                                class="w-12 rounded-md border text-xs border-gray-500 bg-white py-2 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                style="border-color: #C8A1E0;" /><br>
                        </div>
                        <div>
                            <label class="block text-sm">Item Name : </label>
                            <input type="text" name="item_name"
                                class="md:w-32 w-40 rounded-md border text-xs border-gray-500 bg-white py-2 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                style="border-color: #C8A1E0;" /><br>
                        </div>
                        <div>
                            <label class="block text-sm">Item Qty : </label>
                            <input type="number" name="item_qty"
                                class="w-24 rounded-md border text-xs border-gray-500 bg-white text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                style="border-color: #C8A1E0;" /><br>
                        </div>
                        <div>
                            <label class="block text-sm">Rate : </label>
                            <input type="number" name="item_rate"
                                class="w-24 rounded-md border text-xs border-gray-500 bg-white text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                style="border-color: #C8A1E0;" /><br>
                        </div>
                        <div>
                            <label class="block text-sm">Total : </label>
                            <input type="number" name="item_total"
                                class="w-28 rounded-md border text-xs border-gray-500 bg-white text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                style="border-color: #C8A1E0;" /><br>
                        </div>

                        <div>

                            <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                                class="text-gray-900 mt-5  focus:outline-none border border-gray-900 px-1  font-medium rounded-lg text-xs py-1 text-center"
                                type="button">if Ship another address </button>
                        </div>
                        <div class="w-28 h-24 border border-gray-900 rounded-md">
                            <img class="w-28 h-24 rounded-md" src="./images.png" alt="image preview">
                        </div>

                        <div>
                            <label class="block text-sm">SO Number : </label>
                            <input type="number" name="item_so_number"
                                class="w-24 rounded-md border text-xs border-gray-500 bg-white text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                style="border-color: #C8A1E0;" /><br>
                        </div>
                        <div>
                            <label class="block text-sm">Created By : </label>
                            <input type="text" name="item_so_number"
                                class="w-28 rounded-md border text-xs border-gray-500 bg-white text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                style="border-color: #C8A1E0;" /><br>
                        </div>
                        <div>
                            <label class="block text-sm">Status : </label>
                            <input type="text" name="item_so_number"
                                class="w-24 rounded-md border text-xs border-gray-500 bg-white text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                                style="border-color: #C8A1E0;" /><br>
                        </div>
                        <div>
                            <button
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-1.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                type="button">
                                Create SO
                            </button>
                        </div>
                    </div>`;

        y.innerHTML += x;

        count++;
    } else {
        console.error("Element with ID 'finish_field' not found.");
    }
}

document.getElementById('raw_remove').addEventListener('click', function () {
    var raw_field = document.getElementById('raw_field');

    // Remove the last child of the container
    if (raw_field.lastElementChild) {
        raw_field.removeChild(raw_field.lastElementChild);
    }
});


function radio_btn() {
    let x = document.getElementById('add_btn')
    let y = document.getElementById('raw_section')

    y.style.display = "flex";
    x.style.display = "block";

}

function verifyAnswer() {


    let lead_source = document.getElementById('lead_source')
    var result = lead_source.options[lead_source.selectedIndex].text;

    console.log(result);

    if (result == "References") {

        document.getElementById('ref_By').disabled = false;
        document.getElementById('ref_By').placeholder = "Person Name";
        document.getElementById('ref_By').required = true;
        document.getElementById('ref_phone_no').disabled = false;
        document.getElementById('ref_phone_no').placeholder = "Person Phone No";
        document.getElementById('ref_phone_no').required = true;
    } else {
        document.getElementById('ref_By').placeholder = " ";
        document.getElementById('ref_By').required = false;
        document.getElementById('ref_phone_no').placeholder = " ";
        document.getElementById('ref_phone_no').required = false;

    }

}


function installationRequired() {


    let installation_required = document.getElementById('installation_required')
    var result = installation_required.options[installation_required.selectedIndex].text;

    console.log(result);

    if (result == "Yes") {

        document.getElementById('tentative_installation').disabled = false;
        document.getElementById('tentative_installation').placeholder = "Enter Installtion";
        // document.getElementById('tentative_installation').value = "";
    } else {
        document.getElementById('tentative_installation').disabled = true;
        document.getElementById('tentative_installation').required = false;
        document.getElementById('tentative_installation').value = "";



    }

}


let x = ` <div
class="flex flex-wrap items-center border gap-x-5 border-gray-900 w-full p-2 rounded-lg mt-2">
<div>
    <label class="block text-sm">S. No : </label>
    <input type="text" name="item_serial_no"
        class="w-10 rounded-md border text-xs border-gray-500 bg-white py-2 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
        style="border-color: #C8A1E0;" /><br>
</div>
<div>
    <label class="block text-sm">Item Name : </label>
    <input type="text" name="item_name"
        class="md:w-36 w-36 rounded-md border text-xs border-gray-500 bg-white py-2 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
        style="border-color: #C8A1E0;" /><br>
</div>
<div>
    <label class="block text-sm">Item Qty : </label>
    <input type="number" name="item_qty"
        class="w-20 rounded-md border text-xs border-gray-500 bg-white py-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
        style="border-color: #C8A1E0;" /><br>
</div>
<div>
    <label class="block text-sm">Rate : </label>
    <input type="number" name="item_rate"
        class="w-24 rounded-md border text-xs border-gray-500 bg-white py-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
        style="border-color: #C8A1E0;" /><br>
</div>
<div>
    <label class="block text-sm">Total : </label>
    <input type="number" name="item_total"
        class="w-28 rounded-md border text-xs border-gray-500 bg-white py-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
        style="border-color: #C8A1E0;" /><br>
</div>
<div>

    <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
        class="text-gray-900 mt-5  focus:outline-none border border-gray-900 px-1  font-medium rounded-lg text-xs py-1 text-center"
        type="button">if Ship another address </button>
</div>
<div class="w-28 h-24 border border-gray-900 rounded-md">
    <img class="w-28 h-24 rounded-md" src="./images.png" alt="image preview">
</div>
</div>`

function finish_field() {
let y = document.getElementById("finish_field1")

y.innerHTML += x;
}

document.getElementById('remove_btn').addEventListener('click', function () {
var finish_field = document.getElementById('finish_field1');

// Remove the last child of the container
if (finish_field.lastElementChild) {
finish_field.removeChild(finish_field.lastElementChild);
}
});


function raw_field() {
let y = document.getElementById("raw_field1")

y.innerHTML += x;
}

document.getElementById('raw_remove').addEventListener('click', function () {
var raw_field = document.getElementById('raw_field1');

// Remove the last child of the container
if (raw_field.lastElementChild) {
raw_field.removeChild(raw_field.lastElementChild);
}
});


function radio_btn() {
let x = document.getElementById('add_btn')
let y = document.getElementById('raw_section')

y.style.display = "flex";
x.style.display = "block";

}

function radio_btn1() {
let x = document.getElementById('add_btn1')
let y = document.getElementById('raw_section1')

y.style.display = "flex";
x.style.display = "block";

}



