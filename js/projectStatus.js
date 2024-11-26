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

const setSerialData = (so_head_id, so_line_id, mode, inv_name, inv_id) => {
  let data = {
    getSetSerialData: "getSetSerialData",
    so_head_id: so_head_id,
    so_line_id: so_line_id,
    mode: mode,
  };

  $("#setTitleOfAllocatedSerial").text(mode);

  $("#DismentalItem").attr("data-id", mode);
  $("#send_serials_to_refurbished").attr("data-id", mode);
  $("#modal").attr("inv-name", inv_name);
  $("#modal").attr("inv-id", inv_id);

  console.log(mode);
  // (mode =="issue_stage")

  let buttons = document.querySelectorAll("#btn-are-carfully button");

  buttons.forEach((btn) => $(btn).hide());

  let btns_to_activate = document.querySelectorAll(`#${mode} button`);

  btns_to_activate.forEach((btn) => {
    $(btn).show();
    console.log(btn);

    $(`#${mode}`).show();
  });

  $("#closeModalBtn").show();
  $("#DismentalItem").show();
  $("#send_serials_to_refurbished").show();

  //TO SET OPTIONS FOR DIRECT TRANSFER INVENTIRY TO

  $("#directTranferoptions").html("");
  $.getJSON(
    "./phpAjax/mainProjectStatusAjax.php",
    {
      getOptionsForInventory: "getOptionsForInventory",
      inv_id: inv_id,
    },
    function (data, textStatus, jqXHR) {
      console.log(data);
      if (data.success) {
        let optdata = data.data;

        optdata.forEach((option) => {
          $("#directTranferoptions").append(`
                
                  <option value="${option.id}">${option.sub_inventory_name}</option>
                
                `);
        });
      }
    }
  ).fail(error => {

    console.log(error);

  }
  )

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
    <input id="default-checkbox" serial_number='${Element.serial_number}'  type="checkbox" value="" class="w-4 h-4 cursor-pointer rowCheckbox text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
    
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
        Window.location.reload();

        btn.disabled = true;
      }
    },
    "json"
  ).fail(function (error) {
    console.log(error);
  });
});

$("#reject_serials_issue").click(function (e) {
  e.preventDefault();

  // alert("done sir item removed")

  remove_srial_number_from_so();
});

const remove_srial_number_from_so = () => {
  let serial_numbers = [];

  let tbody = document.getElementById("setAllocatedTbody");

  let checke_input = tbody.querySelectorAll("tr input:checked");

  console.log(checke_input);

  let tr = checke_input[0].closest("tr");

  let so_line_id = tr.getAttribute("slid");
  let so_head_id = tr.getAttribute("so");

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
        setSerialData(so_head_id, so_line_id, "issue_items");
        Window.location.reload();
      }
    },
    "json"
  ).fail(function (error) {
    console.log(error);
  });

  console.log("Clicked on button");
};

$("#send_serials_to_assembly").click(function (e) {
  let serial_numbers = [];

  let tbody = document.getElementById("setAllocatedTbody");

  let checke_input = tbody.querySelectorAll("tr input:checked");

  console.log(checke_input);

  let tr = checke_input[0].closest("tr");

  let so_line_id = tr.getAttribute("slid");
  let so_head_id = tr.getAttribute("so");

  checke_input.forEach((check_box) => {
    let serial_number = $(check_box).attr("serial_number");

    serial_numbers.push(serial_number);
  });

  let data = {
    send_items_to_assembly_po: "send_items_to_assembly_po",
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
        alert("Serial success fully transfered to assembly ");
        setSerialData(so_head_id, so_line_id, "issue_items");
        Window.location.reload();
      }
    },
    "json"
  ).fail(function (error) {
    console.log(error);
  });
});

$("#send_serials_quality_check").click(function (e) {
  let serial_numbers = [];

  let tbody = document.getElementById("setAllocatedTbody");

  let checke_input = tbody.querySelectorAll("tr input:checked");

  console.log(checke_input);

  let tr = checke_input[0].closest("tr");

  let so_line_id = tr.getAttribute("slid");
  let so_head_id = tr.getAttribute("so");

  checke_input.forEach((check_box) => {
    let serial_number = $(check_box).attr("serial_number");

    serial_numbers.push(serial_number);
  });

  let data = {
    send_item_to_qc: "send_item_to_qc",
    so_line_id: so_line_id,
    so_head_id: so_head_id,
    serial_numbers: serial_numbers,
  };

  data["source_inventory_name"] = $("#modal").attr("inv-name");
  data["source_inventory_id"] = $("#modal").attr("inv-id");

  console.log(data);

  $.post(
    "./phpAjax/mainProjectStatusAjax.php",
    data,
    function (data, textStatus, jqXHR) {
      console.log(data);

      if (data.success) {
        alert("Serial number removed successfully");
        setSerialData(so_head_id, so_line_id, "assembly_items");
        Window.location.reload();
      }
    },
    "json"
  ).fail(function (error) {
    console.log(error);
  });
});
$("#reject_serials_to_issue").click(function (e) {
  let serial_numbers = [];

  let tbody = document.getElementById("setAllocatedTbody");

  let checke_input = tbody.querySelectorAll("tr input:checked");

  console.log(checke_input);

  let tr = checke_input[0].closest("tr");

  let so_line_id = tr.getAttribute("slid");
  let so_head_id = tr.getAttribute("so");

  checke_input.forEach((check_box) => {
    let serial_number = $(check_box).attr("serial_number");

    serial_numbers.push(serial_number);
  });

  let data = {
    reject_item_assembly_to_store: "reject_item_assembly_to_store",
    so_line_id: so_line_id,
    so_head_id: so_head_id,
    serial_numbers: serial_numbers,
  };

  
  data["source_inventory_name"] = $("#modal").attr("inv-name");
  data["source_inventory_id"] = $("#modal").attr("inv-id");



  console.log(data);

  $.post(
    "./phpAjax/mainProjectStatusAjax.php",
    data,
    function (data, textStatus, jqXHR) {
      console.log(data);

      if (data.success) {
        alert("Serial's issues items successfully rejected");

        setSerialData(so_head_id, so_line_id, "assembly_items");
        location.reload();
      }
    },
    "json"
  ).fail(function (error) {
    console.log(error);
  });
});

$("#reject_serials_to_assembly").click(function (e) {
  e.preventDefault();

  serialTransferBySerial(
    "reject_item_quality_check_to_assembly",
    "qualitycheck_items",
    "success fully items rejected and transfered to assembly"
  );
});

$("#send_serials_to_packaging").click(function (e) {
  e.preventDefault();

  serialTransferBySerial(
    "send_item_quality_check_to_packaging",
    "qualitycheck_items",
    "success fully items trsnsfered to packaging "
  );
});

$("#reject_serials_to_quality_check").click(function (e) {
  e.preventDefault();

  serialTransferBySerial(
    "reject_item_packaging_to_quality_check",
    "packaging_items",
    "success fully items rejected and transfered to quality_check "
  );
});

$("#send_serials_to_gate_exit").click(function (e) {
  e.preventDefault();

  serialTransferBySerial(
    "send_item_packaging_to_gate_exit",
    "packaging_items",
    "success fully items tranfered  transfered to gate exit "
  );
});

$("#reject_serials_to_packaging").click(function (e) {
  e.preventDefault();

  serialTransferBySerial(
    "reject_item_gate_exit_to_packaging",
    "gate_exit_items",
    "success fully  items rejeted tranfered   to gate exit "
  );
});

$("#send_serials_to_installion").click(function (e) {
  e.preventDefault();

  serialTransferBySerial(
    "send_item_gate_exit_to_installtion",
    "gate_exit_items",
    "success fully  items  tranfered gate exit to installation "
  );
});

$("#reject_serials_to_gate_exit").click(function (e) {
  e.preventDefault();

  serialTransferBySerial(
    "reject_item_installtion_to_gate_exit",
    "installation_items",
    "Success fully items rejeted transfer to gateway exit "
  );
});

$("#DismentalItem").click(function (e) {
  e.preventDefault();

  let inventor_name = $(this).attr("data-id");

  serialTransferBySerial(
    "send_item_to_disemnetal",
    inventor_name,
    "Success fully items  transfer  " + inventor_name + " to gateway exit "
  );
});

$("#send_serials_to_refurbished").click(function (e) {
  e.preventDefault();

  let inventor_name = $(this).attr("data-id");

  const destination_inventory_name = "REFURBISHENT";
  const destination_inventory_id = 6;

  diretct_serialTransferBySerial(
    "reject_item_installtion_to_gate_exit",
    inventor_name,
    "Success fully items " + inventor_name + " transfer to refurbished ",
    destination_inventory_id,
    destination_inventory_name
  );
});




$("#directTransfertoAnySubInventory").click(function (e) {

  e.preventDefault();

  let inventor_name = $("#send_serials_to_refurbished").attr("data-id");



  const destination_inventory_name = $("#directTranferoptions")[0].options[$("#directTranferoptions")[0].selectedIndex].text;
  const destination_inventory_id = $("#directTranferoptions").val();

  diretct_serialTransferBySerial(
    "reject_item_installtion_to_gate_exit",
    inventor_name,
    "Success fully items " + inventor_name + " transfer to " +destination_inventory_name,
    destination_inventory_id,
    destination_inventory_name
  );
});
















function serialTransferBySerial(transferName, invetoryName, message) {
  let serial_numbers = [];

  let tbody = document.getElementById("setAllocatedTbody");
  let checke_input = tbody.querySelectorAll("tr input:checked");

  // Check if any checkboxes are selected
  if (checke_input.length === 0) {
    alert("Please select at least one serial number.");
    return;
  }

  console.log(checke_input);

  let tr = checke_input[0].closest("tr");
  let so_line_id = tr.getAttribute("slid");
  let so_head_id = tr.getAttribute("so");

  checke_input.forEach((check_box) => {
    let serial_number = $(check_box).attr("serial_number");
    serial_numbers.push(serial_number);
  });

  let data = {
    so_line_id: so_line_id,
    so_head_id: so_head_id,
    serial_numbers: serial_numbers,
  };

  data["source_inventory_name"] = $("#modal").attr("inv-name");
  data["source_inventory_id"] = $("#modal").attr("inv-id");

  data[transferName] = transferName;

  console.log(data);

  $.post(
    "./phpAjax/mainProjectStatusAjax.php",
    data,
    function (data, textStatus, jqXHR) {
      console.log(data);

      if (data.success) {
        alert(message);
        setSerialData(so_head_id, so_line_id, invetoryName);
        location.reload();
      } else {
        alert("Error: " + data.message); // Assuming the response has a message field for errors
      }
    },
    "json"
  ).fail(function (error) {
    console.log(error);
    alert("An error occurred. Please try again.");
  });
}
function diretct_serialTransferBySerial(
  transferName,
  invetoryName,
  message,
  destination_inventory_id,
  destination_inventory_name
) {
  let serial_numbers = [];

  let tbody = document.getElementById("setAllocatedTbody");
  let checke_input = tbody.querySelectorAll("tr input:checked");

  // Check if any checkboxes are selected
  if (checke_input.length === 0) {
    alert("Please select at least one serial number.");
    return;
  }

  console.log(checke_input);

  let tr = checke_input[0].closest("tr");
  let so_line_id = tr.getAttribute("slid");
  let so_head_id = tr.getAttribute("so");

  checke_input.forEach((check_box) => {
    let serial_number = $(check_box).attr("serial_number");
    serial_numbers.push(serial_number);
  });

  let data = {
    so_line_id: so_line_id,
    so_head_id: so_head_id,
    serial_numbers: serial_numbers,
    move_item_serails: "move_item_serails",
  };

  data["source_inventory_name"] = $("#modal").attr("inv-name");
  data["source_inventory_id"] = $("#modal").attr("inv-id");
  data["destination_inventory_id"] = destination_inventory_id;
  data["destination_inventory_name"] = destination_inventory_name;

  console.log(data);













  $.post(
    "./phpAjax/mainProjectStatusAjax.php",
    data,
    function (data, textStatus, jqXHR) {
      console.log(data);

      if (data.success) {
        alert(message);
        setSerialData(so_head_id, so_line_id, invetoryName);
        // window.location.reload();  // Fixed typo here (Window -> window)
      } else {
        alert("Error: " + data.message); // Assuming the response has a message field for errors
      }
    },
    "json"
  ).fail(function (error) {
    console.log(error);
    alert("An error occurred. Please try again.");
  });
}

const selectAllCheckbox = document.getElementById("selectAllCheckBox");

selectAllCheckbox.addEventListener("change", function () {
  console.log("hello");
  let rowCheckboxes = document.querySelectorAll(
    '#setAllocatedTbody input[type="checkbox"]'
  );

  console.log(rowCheckboxes);
  rowCheckboxes.forEach((checkbox) => {
    checkbox.checked = selectAllCheckbox.checked;
    console.log("frj");
  });
});

rowCheckboxes.forEach((checkbox) => {
  checkbox.addEventListener("change", function () {
    selectAllCheckbox.checked =
      rowCheckboxes.length ===
      [...rowCheckboxes].filter((c) => c.checked).length;
  });
});
