var data_v = {
    getSerialData: "getSerialData",
  };
  let serialData = [];
  $.getJSON("./ajax/ajaxGrn.php", data_v, function (data, textStatus, jqXHR) {
    console.log(data);
    if (data.success) {
      let resData = data.data;
  
      serialData = resData;
  
      $("#setAllocatedTbody").html("");
  
      if (resData.length > 0) {
        resData.forEach((Element, index) => {
          index++;
          $("#setAllocatedTbody")
            .append(`      <tr item_code="${Element.item_code}" created_date="${Element.created_date}"  serial_number="${Element.serial_number}" class="border-b border-gray-200 dark:border-gray-700">
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
  }).fail(function (error) {
    console.log(error);
  });
  
  function deleteSerial(event) {
    console.log(event.target);
    let tr = event.target.closest("tr");
  
    tr.remove();
  
    console.log(this);
  }
  $("#addSerialToBelow").click(function (e) {
    e.preventDefault();
  
    console.log(this);
    let check_boxs = document.querySelectorAll(
      "#setAllocatedTbody input:checked"
    );
  
    check_boxs.forEach((check, index) => {
      let currentTr = check.closest("tr");
  
      let serialNumber = currentTr.getAttribute("serial_number");
      let itemCode = currentTr.getAttribute("item_code");
      let created_date = currentTr.getAttribute("created_date");
  
      let total_number  = document.querySelectorAll("#serialBody tr").length +1
  
      $("#serialBody").append(`
          <tr serialnumber="${serialNumber}"  class="border-b hover:bg-gray-50">
              <td class="p-3">${total_number}</td>
              <td class="p-3">${serialNumber}</td>
              <td class="p-3">${itemCode}</td>
              <td class="p-3">${created_date}</td>
              <td class="p-3">oj</td>
              <td class="p-3">
                  <button 
                      onclick="deleteSerial(event)" 
                      class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition"
                  >
                      Delete
                  </button>
              </td>
          </tr>
      `);
  
      check.checked = false;
      check.disabled = true;
    });
  });
  
  $("#sendMisCeliniusToInstalltion").click(function (e) {
    e.preventDefault();
  
    let tr = document.querySelectorAll("#serialBody tr");
    let serialNumbers = [];
    tr.forEach((trow, index) => {
      serialNumbers.push($(trow).attr("serialnumber"));
    });
    console.log(serialNumbers);
    let data = {
      send_misliniuestoInstallation: "send_misliniuestoInstallation",
      serialNumbers: serialNumbers,
    };
  
    console.log(data);
    $.post(
      "./ajax/ajaxGrn.php",
      data,
      function (data, textStatus, jqXHR) {
        console.log(data);
        if (data.success) {
          alert("Success fully items send to installtion");
          location.reload();
        }
      },
      "json"
    ).fail((error) => {
      console.log(error);
    });
  });
  
  
  
  
  
  
  
  
  $("#serialNumber").on("change", function () {
  
      let serialNumber = $(this).val();
      console.log(serialNumber);
  
      let data_v = {
          getSerialDatabySerialNumber: "getSerialDatabySerialNumber",
          serialNumber: serialNumber,
      };
      $.getJSON("./ajax/ajaxGrn.php", data_v, function (data, textStatus, jqXHR) {
          console.log(data);
          if (data.success) {
              let resData = data.data;
  
              $("#itemCode").val(resData[0].item_code);
              $("#serialDetails").val(resData[0].created_date );
  
              
          }
  
      }).fail(error=>{
          console.log(error);
      })
  
      
  });
  
  