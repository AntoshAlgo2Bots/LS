let selectedRow = 0;

function grnDataInsert() {
  var inputsData = document
    .getElementById("inputFormDataGrn")
    .querySelectorAll("input");

  // console.log(inputsData);

  let inputFieldsData = {};

  inputFieldsData["grnDataInsert"] = "grnDataInsert";

  inputsData.forEach((Element) => {
    var inputName = Element.name;
    inputValue = Element.value;

    inputFieldsData[inputName] = inputValue;
  });

  // console.log(inputFieldsData);

  // console.log(inputData);

  console.log(inputFieldsData);
  $.ajax({
    url: "./ajax/ajaxGrn.php",
    method: "POST",
    dataType: "JSON",
    data: inputFieldsData,
    success: function (data) {
      console.log(data);
      if (data.success) {
        alert("receipt success fully genrated");
      } else {
        alert("Something went wrong");
      }
    },
  }).fail((error) => {
    console.log(error.responseText);
  });
}

function searchPoInGrnFor() {
  let po_number = $("#po_number").val();

  data = {
    getDataForGrnPo: "getDataForGrnPo",
    po_number: po_number,
  };

  $.getJSON("ajax/ajaxGrn.php", data, function (data) {
    console.log(data);

    if (data.success) {
      alert("Data Successfully fetch");

      let tbody = $("#poGrnBody");
      // tbody.innerHTML = "";
      // tbody.innerText = "";

      // $(tbody).text("");

      let rowData = data.data;

      let lineTable = `   
                                                    <td class="hover:bg-gray-600 " colspan="8">
                                                        <table
                                                        align="right"                                                            
                                                        style="width:80%;"
                                                        class=" whitespace-nowrap mx-auto divide-y divide-gray-200">
                                                            

                                                            <thead>
                                                                <tr>
                                                                    <th scope="col"
                                                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                                                    </th>
                                                                    <th scope="col"
                                                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                                                        S.no</th>
                                                                    <th scope="col"
                                                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                                                        Item Code</th>
                                                                    <th scope="col"
                                                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                                                        Item name</th>
                                                                    <th scope="col"
                                                                        class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">
                                                                        Unit
                                                                        price</th>
                                                                    <th scope="col"
                                                                        class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">
                                                                        Balnce
                                                                    </th>
                                                                    <th scope="col"
                                                                        class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">
                                                                        Total
                                                                    </th>
                                                                    <th scope="col"
                                                                        class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">
                                                                        Status</th>


                                                                </tr>
                                                            </thead>
                                                            <tbody class="divide-y      divide-gray-200" id="lineTbody">






                                                                <tr class="hover:bg-gray-600" con-id="001">

                                                                    <td
                                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                                        <input id="default-checkbox" type="checkbox"
                                                                            value=""
                                                                            onchange="setLineTableToLine(event)"
                                                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                                    </td>
                                                                    <td
                                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                                        <input type="txt" id="input-email-label"
                                                                            class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                                            placeholder=1 value="" disabled>
                                                                    </td>
                                                                    <td
                                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                                        <input type="txt" id="input-email-label"
                                                                            name="item_code"
                                                                            class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                                            placeholder="item_code">
                                                                    </td>
                                                                    <td
                                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                                        <input type="txt" id="input-email-label"
                                                                            name="item_name"
                                                                            class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                                            placeholder="Item name">
                                                                    </td>
                                                                    <td
                                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                                        <input type="number" id="input-email-label"
                                                                            class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                                            name="unit_Price" placeholder="Unit price"
                                                                            value="">
                                                                    </td>
                                                                    <td
                                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                                        <input type="number" id="input-email-label"
                                                                            name="Qty"
                                                                            class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:
    inter-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                                            placeholder="Quantity"
                                                                            value="">
                                                                    </td>
                                                                    <td
                                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                                        <input type="number" id="input-email-label"
                                                                            name="total_price" disabled
                                                                            class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                                            placeholder="Total">
                                                                    </td>
                                                                    <td
                                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                                        <input type="txt" id="input-email-label"
                                                                            name="need_by_date"
                                                                            class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                                            placeholder="need_by_date"
                                                                            value="inProcess">
                                                                    </td>





                                                                </tr>


                                                            </tbody>
                                                        </table>
                                                    </td>

`;

      $(tbody).append(lineTable);

      let lineTbody = document.getElementById("lineTbody");

      lineTbody.innerHTML = `


                                                                      





                                                                <tr class="hover:bg-gray-600" con-id="001">

                                                                    <td
                                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                                        <input id="default-checkbox" type="checkbox"
                                                                            value=""
                                                                            onchange="setLineTableToLine(event)"
                                                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                                    </td>
                                                                    <td
                                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                                        <input type="txt" id="input-email-label"
                                                                            class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                                            placeholder=1 value="" disabled>
                                                                    </td>
                                                                    <td
                                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                                        <input type="txt" id="input-email-label"
                                                                            name="item_code"
                                                                            class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                                            placeholder="item_code">
                                                                    </td>
                                                                    <td
                                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                                        <input type="txt" id="input-email-label"
                                                                            name="item_name"
                                                                            class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                                            placeholder="Item name">
                                                                    </td>
                                                                    <td
                                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                                        <input type="number" id="input-email-label"
                                                                            class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                                            name="unit_Price" placeholder="Unit price"
                                                                            value="">
                                                                    </td>
                                                                    <td
                                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                                        <input type="number" id="input-email-label"
                                                                            name="Qty"
                                                                            class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:
    inter-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                                            placeholder="Quantity"
                                                                            value="">
                                                                    </td>
                                                                    <td
                                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                                        <input type="number" id="input-email-label"
                                                                            name="total_price" disabled
                                                                            class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                                            placeholder="Total">
                                                                    </td>
                                                                    <td
                                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                                        <input type="txt" id="input-email-label"
                                                                            name="need_by_date"
                                                                            class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                                            placeholder="need_by_date"
                                                                            value="inProcess">
                                                                    </td>





                                                                </tr>


      
      
      
      
      `;

      $("#po_vendor_name").val(rowData[0].supplier_name);
      $("#shipTo").val(rowData[0].shipTo);
      $("#bill_to").val(rowData[0].bill_to_location);

      console.log(rowData);

      $(lineTbody).html("");

      rowData.forEach((row, index) => {
        console.log(row);
        console.log(row.status);

        index++;
        let tr = document.createElement("tr");
        tr.classList.add("hover:bg-gray-600");

        tr.innerHTML = `   


                                                                <tr class="hover:bg-gray-600" con-id="001">

                                                                    <td
                                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                                        <input id="default-checkbox" type="checkbox"
                                                                            value=""
                                                                            onchange="setLineTableToLine(event)"
                                                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                                    </td>
                                                                    <td
                                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                                        <input type="txt" id="input-email-label"
                                                                            class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                                            placeholder=1 value="" disabled>
                                                                    </td>
                                                                    <td
                                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                                        <input type="txt" id="input-email-label"
                                                                            name="item_code"
                                                                            class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                                            placeholder="item_code">
                                                                    </td>
                                                                    <td
                                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                                        <input type="txt" id="input-email-label"
                                                                            name="item_name"
                                                                            class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                                            placeholder="Item name">
                                                                    </td>
                                                                    <td
                                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                                        <input type="number" id="input-email-label"
                                                                            class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                                            name="unit_Price" placeholder="Unit price"
                                                                            value="">
                                                                    </td>
                                                                    <td
                                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                                        <input type="number" id="input-email-label"
                                                                            name="Qty"
                                                                            class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:
    inter-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                                            placeholder="Quantity"
                                                                            value="">
                                                                    </td>
                                                                    <td
                                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                                        <input type="number" id="input-email-label"
                                                                            name="total_price" disabled
                                                                            class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                                            placeholder="Total">
                                                                    </td>
                                                                    <td
                                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                                        <input type="txt" id="input-email-label"
                                                                            name="need_by_date"
                                                                            class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                                            placeholder="need_by_date"
                                                                            value="inProcess">
                                                                    </td>





                                                                </tr>

`;

        $(lineTbody).append(tr);
      });

      // $(tbody).append(lineTable)
    } else if (!data.success) {
      alert("Data not found ");

      $(tbody).text("Data not found  please try again");
    } else {
      alert("somethin went wronf");
    }
  }).fail((error) => {
    console.log(error.responseText);
  });
}

lastRowId = "";

const setLineTableToLine = (event) => {
  if (event.target.checked == 1) {
    let childTableId = $($(event.target).closest("tr")).attr("con-row-id");
    console.log(childTableId);

    $(`#${selectedRow}`).hide();

    selectedRow = childTableId;
  }
};

const trAdderForTbody = (
  sno,
  tbody_id,
  item_code,
  itemname,
  unitprice,
  total,
  balance,
  status,
  po_lineid,
  recQty,
  totalQty,
  grn_line_id
) => {
  let tbody = document.getElementById(tbody_id);

  let tr = document.createElement("tr");
  tr.setAttribute("line-id", po_lineid);
  tr.setAttribute("grn-line-id", grn_line_id);

  tr.innerHTML = `

                  
      


   
                                                                        <td
                                                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                                            <input id="default-checkbox" onclick="selectChildTable(event)" type="checkbox"
                                                                              
                                                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                                        </td>
                                                                        <td
                                                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                                            <input type="txt" id="input-email-label"
                                                                                class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                                                placeholder=1   value="${sno}" disabled>
                                                                        </td>
                                                                        <td
                                                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                                            <input type="txt" id="input-email-label"
                                                                                name="item_code"
                                                                                value="${item_code}"
                                                                                disabled
                                                                                class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                                                placeholder="item_code">
                                                                        </td>
                                                                        <td
                                                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                                            <input type="txt" id="input-email-label"
                                                                                name="item_name"
                                                                                value="${itemname}"
                                                                                class="py-3 w-full px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                                                placeholder="Item name" disabled>
                                                                        </td>
                                                                        <td
                                                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                                            <input type="number" id="input-email-label"
                                                                                class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                                                name="unit_Price" disabled placeholder="Unit price"
                                                                                value="${unitprice}"
                                                                                >
                                                                        </td>
                                                                        <td
                                                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                                            <input type="number" id="input-email-label"
                                                                                class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                                                name="total_qty" disabled placeholder="Unit price"
                                                                                value="${totalQty}"
                                                                                >
                                                                        </td>
                                                                        <td
                                                                            class="px-6 py-4 min-w-10 whitespace-nowrap text-sm font-medium text-gray-800">
                                                                            <input type="number" id="input-email-label"
                                                                                name="balance_qty"
                                                                                class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:
    inter-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                                                placeholder="Quantity" disabled value="${balance}">
                                                                        </td>
                                                                        <td
                                                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                                            <input type="number" id="input-email-label"
                                                                                name="recieved_qty" 
                                                                                class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                                                value="${recQty}"
                                                                                placeholder="Recieved QTY">
                                                                        </td>
                                                                        <td
                                                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                                            <input type="number" id="input-email-label"
                                                                                name="total_price" disabled
                                                                                class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                                                placeholder="Total"
                                                                                value=${total}
                                                                                >
                                                                        </td>
                                                                        <td
                                                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                                            <input type="txt" id="input-email-label"
                                                                                name="status"
                                                                                disabled
                                                                                class="py-3 px-4 block min-w-auto border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                                                placeholder="status" value="${status}">
                                                                        </td>





      
      
      
      
      
      
      
      
      `;

  $(tbody).append(tr);

  console.log(tbody);
};

function reciveTable(event) {
  if (window.confirm("are you sure")) {
    let currentTr = $(`tr[con-row-id='${selectedRow}']`)[0];

    console.log(currentTr);

    let item_code = currentTr.querySelector("input[name='item_code']").value;
    let item_name = currentTr.querySelector("input[name='item_name']").value;
    let recieved_qty = currentTr.querySelector(
      "input[name='recieved_qty']"
    ).value;
    let unit_Price = currentTr.querySelector("input[name='unit_Price']").value;
    let balance = currentTr.querySelector("input[name='balance_qty']").value;
    let total_price = currentTr.querySelector(
      "input[name='total_price']"
    ).value;
    let grnNumber = $("#grn_numberGen").val();
    let po_lineid = $(currentTr).attr("line-id");
    let childTbodyId = `tbodyLine${po_lineid}`;
    let po_number = $("#po_number").val()

    let isValidField = true;

    if (recieved_qty < 1) {
      isValidField = false;
    }


    if (isValidField) {
      let data = {
        setGrnLineRow: "setGrnLineRow",
        item_code: item_code,
        grnNumber: grnNumber,
        recieved_qty: recieved_qty,
        po_lineid: po_lineid,
        po_number:po_number
      };

      // console.log(data);

      $.post(
        "ajax/ajaxGrn.php",
        data,
        function (data) {
          console.log(data);

          if (data.success) {
            alert(`${recieved_qty} items is Accepted`);

            let rowTable = $(`tr[line-row-id=${selectedRow}`)[0];


            let grn_line_id = data.insertId 

            console.log(data.status);

            console.log(grn_line_id);

            trAdderForTbody(
              1.1,
              childTbodyId,
              item_code,
              item_name,
              unit_Price,
              total_price,
              recieved_qty,
              data.status,
              po_lineid,
              null,
              balance,
              grn_line_id
            );

            // rowTable.classList.remove("hidden")  ;
            // $(rowTable).fadeIn(1000);

            $(rowTable).fadeIn(1000);
            selectedRow = null;
          }
        },
        "json"
      ).fail((error) => {
        console.log(error.responseText);
      });
    } else {
      alert("Something went wrong");
    }
  }
}

const genRateGrn = () => {
  let po_number = $("#po_number").val();
  let vendor_name = $("#po_vendor_name").val();

  console.log("hello");

  let data = {
    createGrn: "createGrn",
    po_number: po_number,
    vendor_name: vendor_name,
  };

  // console.log(data);

  $.post(
    "ajax/ajaxGrn.php",
    data,
    function (response) {
      console.log(response);

      if (response.success) {
        $("#grn-area").fadeIn();

        // $(selector)
        $("#grn_numberGen").val(response.grn_id);
        $("#grn-create-btn").slideToggle(1000);
        // $("#grn-area-table").fadeIn(2000);
        $("#grn-area-table").slideToggle(2000);
      }
    },
    "json"
  ).fail(error=>{
    console.log(error.responseText);
  })
};

let rowSelect = null;

const selectChildTable = (event) => {
  console.log(rowSelect);
  rowSelect = event.target.closest("tr");

  console.log(rowSelect);
};

const AcceptDataToGrnLine = () => {
  console.log(rowSelect);
  

  let item_code = rowSelect.querySelector("input[name='item_code']").value;
  let item_name = rowSelect.querySelector("input[name='item_name']").value;
  let po_lineid = $(rowSelect).attr("line-id");
  let grn_line_id = $(rowSelect).attr("grn-line-id");
  let unit_Price = rowSelect.querySelector("input[name='unit_Price']").value;
  let total_qty = rowSelect.querySelector("input[name='total_qty']").value;
  let recieved_qty = rowSelect.querySelector(
    "input[name='recieved_qty']"
  ).value;
  let balance = rowSelect.querySelector("input[name='balance_qty']").value;
  let total_price = rowSelect.querySelector("input[name='total_price']").value;
  let grnNumber = $("#grn_numberGen").val();
  let childTbodyId = `tbodyLine${po_lineid}`;

  let inputs = rowSelect.querySelectorAll("input");

  let isValidField = true;

  if (recieved_qty < 1) {
    isValidField = false;
  }

  console.log(`Rec ${recieved_qty}`);
  console.log(`Balance ${balance}`);

  // if (recieved_qty > balance) {
  //   isValidField = false;
  // }
  if (isValidField) {
    let data = {
      acceptData: "acceptData",
      item_code: item_code,
      item_name: item_name,
      unit_Price: unit_Price,
      recieved_qty: recieved_qty,
      balance: balance,
      total_price: total_price,
      grnNumber: grnNumber,
      po_lineid: po_lineid,
      grn_line_id:grn_line_id
    };

    console.log(data);

    $.post(
      "ajax/ajaxGrn.php",
      data,
      function (data) {
        console.log(data);

        if (data.success) {
          alert(`${recieved_qty} items is Accepted`);

          trAdderForTbody(
            1.2,
            childTbodyId,
            item_code,
            item_name,
            unit_Price,
            total_price,
            recieved_qty,
            data.status,
            po_lineid,
            null,
            total_qty,
            grn_line_id
          );
        
        rowSelect=null
        }
      },
      "json"
    ).fail((error) => {
      console.log(error);
    });
  } else {
    alert("Something went wrong");
  }
  // console.log(item_code);
  // console.log(item_name);
  // console.log(unit_Price);
  // console.log(balance);
  // console.log(total_price);
  // console.log(recieved_qty);
};

const rejectToGrn = () => {
  console.log(rowSelect);

  let item_code = rowSelect.querySelector("input[name='item_code']").value;
  let item_name = rowSelect.querySelector("input[name='item_name']").value;
  let po_lineid = $(rowSelect).attr("line-id");
  let unit_Price = rowSelect.querySelector("input[name='unit_Price']").value;
  let recieved_qty = rowSelect.querySelector(
    "input[name='recieved_qty']"
  ).value;
  let balance = rowSelect.querySelector("input[name='balance_qty']").value;
  let grn_line_id = $(rowSelect).attr("grn-line-id");
  let total_price = rowSelect.querySelector("input[name='total_price']").value;
  let grnNumber = $("#grn_numberGen").val();
  let childTbodyId = `tbodyLine${po_lineid}`;

  let inputs = rowSelect.querySelectorAll("input");

  let isValidField = true;

  if (recieved_qty < 1) {
    isValidField = false;
  }

  if (isValidField) {
    let data = {
      rejectData: "rejectData",
      item_code: item_code,
      item_name: item_name,
      unit_Price: unit_Price,
      grn_line_id:grn_line_id,
      recieved_qty: recieved_qty,
      balance: balance,
      total_price: total_price,
      grnNumber: grnNumber,
      po_lineid: po_lineid
    };

    console.log(data);

    console.log(grn_line_id);



    $.post(
      "ajax/ajaxGrn.php",
      data,
      function (data) {
        console.log(data);

        if (data.success) {
          alert(`${recieved_qty} items is rejected`);



          $("#rtv-btn").fadeIn(2000);


          trAdderForTbody(
            1.3,
            childTbodyId,
            item_code,
            item_name,
            unit_Price,
            total_price,
            recieved_qty,
            data.status,
            po_lineid,
            null,
            total_price,
            grn_line_id
          
          );
        }
      },
      "json"
    ).fail((error) => {
      console.log(error);
    });
  } else {
    alert("Please fill the all details");
  }
  // console.log(item_code);
  // console.log(item_name);
  // console.log(unit_Price);
  // console.log(balance);
  // console.log(total_price);
  // console.log(recieved_qty);
};
const deliverdItemToGrn = () => {
  console.log(rowSelect);

  let item_code = rowSelect.querySelector("input[name='item_code']").value;
  let item_name = rowSelect.querySelector("input[name='item_name']").value;
  let po_lineid = $(rowSelect).attr("line-id");
  
  let unit_Price = rowSelect.querySelector("input[name='unit_Price']").value;
  let recieved_qty = rowSelect.querySelector(
    "input[name='recieved_qty']"
  ).value;
  let balance = rowSelect.querySelector("input[name='balance_qty']").value;
  let grn_line_id = $(rowSelect).attr("grn-line-id");
  let total_price = rowSelect.querySelector("input[name='total_price']").value;
  let grnNumber = $("#grn_numberGen").val();
  let childTbodyId = `tbodyLine${po_lineid}`;

  let inputs = rowSelect.querySelectorAll("input");

  let isValidField = true;

  if (recieved_qty < 1) {
    isValidField = false;
  }

  if (isValidField) {
    let data = {
      DeleiverdGrn: "DeleiverdGrn",
      item_code: item_code,
      item_name: item_name,
      unit_Price: unit_Price,
      recieved_qty: recieved_qty,
      balance: balance,
      total_price: total_price,
      grnNumber: grnNumber,
      po_lineid: po_lineid,
      grn_line_id:grn_line_id
    };

    console.log(data);

    $.post(
      "ajax/ajaxGrn.php",
      data,
      function (data) {
        console.log(data);

        if (data.success) {
          alert(`${recieved_qty} items is Deliverd`);



          $("#rtv-btn").fadeIn(2000);

          console.log(unit_Price);


          trAdderForTbody(
            1.3,
            childTbodyId,
            item_code,
            item_name,  
            unit_Price,
            total_price,
            recieved_qty,
            data.status,
            po_lineid,
            null,
            total_price,
            grn_line_id
          );
        }
      },
      "json"
    ).fail((error) => {
      console.log(error);
    });
  } else {
    alert("Please fill the all details");
  }
  // console.log(item_code);
  // console.log(item_name);
  // console.log(unit_Price);
  // console.log(balance);
  // console.log(total_price);
  // console.log(recieved_qty);
};








