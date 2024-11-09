$("button[name='search_so']").on("click", function (event) {
  event.preventDefault();

  let sonumber = parseInt($("#sonumber").val());

  console.log(sonumber);

  let data = {
    sonumber: sonumber,
    getSoData: "getSoData",
  };

  $.getJSON(
    "./phpAjax/projectStatusAjax.php",
    data,
    function (data, textStatus, jqXHR) {
      console.log(data);
    }
  ).fail((error) => {
    console.log(error.responseText);
  });
});

function checkInputValue(maxAllowedValue, event) {
  let input = event.target;
  let inputValue = input.value;
  const value = parseInt(inputValue, 10); // Use radix 10 for parsing

  maxAllowedValue++;
  if (!isNaN(value) && value >= maxAllowedValue) {
    maxAllowedValue--;
    input.classList.add("input-exceeds");
    alert("CANT BE GREATER THEN " + maxAllowedValue);
    input.value = maxAllowedValue;
  } else {
    input.classList.remove("input-exceeds");
  }
}

async function issueItems() {
  let currentTr = event.target.closest("tr");

  let so_line_id = parseInt(currentTr.getAttribute("data-line-id"));
  let qty = parseInt(currentTr.querySelector('input[name="need_qty"]').value);
  let avaliable_qty_area_th = currentTr.querySelector(
    "th[name='avaliable_qty_area']"
  );
  let need_qty_area = currentTr.querySelector("th[name='need_qty_area']");
  let remarks = currentTr.querySelector("input[name='remarks']").value;

  console.log(avaliable_qty_area_th);

  let data = {
    issueItems: "issueItems",
    so_line_id: so_line_id,
    qty: qty,
    remarks: remarks,
  };

  await $.post(
    "./phpAjax/mainProjectStatusAjax.php",
    data,
    function (data, textStatus, jqXHR) {
      console.log(data);

      if (data.success) {
        alert("items successfully issued from store !! ");

        avaliable_qty_area_th.textContent =
          parseInt(avaliable_qty_area_th.textContent) - parseInt(qty);
        need_qty_area.textContent =
          parseInt(need_qty_area.textContent) - parseInt(qty);
        alert(`.${data.message_so} :${data.data.qty}`);

        let allocated_data = data.allocated_data;

        allocated_data.forEach((serial_data, index) => {
          $("#setAllocatedTbody").html("");
          $("#setAllocatedTbody")
            .append(`      <tr class="border-b border-gray-200 dark:border-gray-700">
                            <td class="px-6 py-4">
                                ${index}
                            </td>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                ${serial_data.item_code}
                            </th>
                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                Serial number
                            </td>
                            <td class="px-6 py-4">
                                lot number
                            </td>
                        </tr>`);
        });
      }
    },
    "json"
  ).fail((error) => {
    console.log(error.responseText);
  });

  console.log(currentTr);
}

const setSerialData = (so_head_id, so_line_id) => {
  let data = {
    getSetSerialData: "getSetSerialData",
    so_head_id: so_head_id,
    so_line_id: so_line_id,
  };

  $.getJSON(
    "./phpAjax/mainProjectStatusAjax.php",
    data,
    function (data, textStatus, jqXHR) {
      if (data.success) {
        let resData = data.data;

        $("#setAllocatedTbody").html("");

        $("#openModalBtn").click();

        if (resData.length > 0) {
          resData.forEach((Element, index) => {
            index++;
            $("#setAllocatedTbody")
              .append(`      <tr slid='${so_line_id}' so='${so_head_id}' class="border-b border-gray-200 dark:border-gray-700">
                          <td class="px-6 py-4">
                              <div class="flex items-center mb-4">
    <input id="default-checkbox" serial_number='${Element.serial_number}'  type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
    
</div>
                          </td>
                          <td class="px-6 py-4">
                              ${index}
                          </td>
                          <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                              ${Element.item_code}
                              </th>
                              <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                              
                              ${Element.serial_number}
                              </td>
                              <td class="px-6 py-4">
                              
                              ${Element.lot_number}
                          </td>
                      </tr>`);
          });
        }
      }

      console.log(data);
    }
  ).fail(function (error) {
    console.log(error);
  });
};

$('button[name="create-po"]').click(function () {
  console.log(this);

  let btn = this;

  let data = {
    createPurchaseOrder: "createPurchaseOrder",
    so_head_id: parseInt($(this).attr("so_id")),
    r_qty: parseInt($(this).attr("nqty")),
    item_code: $(this).attr("item_code"),
  };

  console.log(data);

  $.post(
    "./phpAjax/mainProjectStatusAjax.php",
    data,
    function (data, textStatus, jqXHR) {
      console.log(data);
      if (data.success) {
        alert(
          `Purchase Order created successfully !! PO number is :  ${data.po_number}  !`
        );

        btn.disabled = true;
      }
    },
    "json"
  ).fail(function (error) {
    console.log(error);
  });
});








$("#reject_serials").click(function (e) { 
  e.preventDefault();

  // alert("done sir item removed")
  

  remove_srial_number_from_so()


});



const remove_srial_number_from_so = () => {









  let serial_numbers = [];


  
  let tbody = document.getElementById("setAllocatedTbody")


  let checke_input = tbody.querySelectorAll("tr input:checked")

  console.log(checke_input);

let tr = checke_input[0].closest("tr")

  let so_line_id = tr.getAttribute("slid")
  let so_head_id = tr.getAttribute("so")
  

  checke_input.forEach((check_box) => {
    let serial_number = $(check_box).attr("serial_number");



    serial_numbers.push(serial_number);









  });


  


  let data = {
    removeSerial: "removeSerial",
    so_line_id: so_line_id,
    so_head_id: so_head_id,
    serial_numbers: serial_numbers,
  };

  console.log(data);

  $.post(
    "./phpAjax/mainProjectStatusAjax.php",
    data,
    function (data, textStatus, jqXHR) {
      console.log(data);

      if (data.success) {
        alert("Serial number removed successfully");
        setSerialData(so_head_id, so_line_id);
      }
    },
    "json"
  ).fail(function (error) {
    console.log(error);
  });

  console.log("Clicked on button");
};
