function addRowToTable(data) {
  let tbody = $("#genDataTbody")[0];

  tbody.innerHTML = "";

  data.forEach((row, index) => {
    let tr = document.createElement("tr");

    index++;
    tr.classList.add("border-b", "dark:border-gray-700");

    tr.innerHTML = ` 
                              <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">${index}</th>
                              <td class="px-4 py-3">${row.item_code}</td>
                              <td class="px-4 py-3">${row.sub_inventory_name}</td>
                              <td class="px-4 py-3">${row.item_qty}</td>
  
                              <td class="px-4 py-3">${row.lot_number}</td>
                              <td class="px-4 py-3">${row.sub_inventory_id}</td>
                              <td class="px-4 py-3">${row.location_id}</td>
  
                              
                              <td class="px-4 py-3">${row.po_number}</td>
                                                            <td class="px-4 py-3 flex items-center justify-end">
                                  <button id="apple-imac-27-dropdown-button" data-dropdown-toggle="apple-imac-27-dropdown" class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100" type="button">
                                      <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                          <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                      </svg>
                                  </button>
                                  <div id="apple-imac-27-dropdown" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                      <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="apple-imac-27-dropdown-button">
                                          <li>
                                              <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Show</a>
                                          </li>
                                          <li>
                                              <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                          </li>
                                      </ul>
                                      <div class="py-1">
                                          <a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete</a>
                                      </div>
                                  </div>
                              </td>
   `;

    $(tbody).append(tr);
  });
}

// console.log($);
$(document).ready(function () {
  const setDataToTable = (searchArra) => {
    $("#genDataTbody")[0].innerHTML = `<div class="loader">
    <div class=" mx-auto  box box0">
      <div></div>
    </div>
    <div class="box box1">
      <div></div>
    </div>
    <div class="box box2">
      <div></div>
    </div>
    <div class="box box3">
      <div></div>
    </div>
    <div class="box box4">
      <div></div>
    </div>
    <div class="box box5">
      <div></div>
    </div>
    <div class="box box6">
      <div></div>
    </div>
    <div class="box box7">
      <div></div>
    </div>
    <div class="ground">
      <div></div>
    </div>
  </div>`;

    let searchDataArr = ["received", "Accepted"];



    
    data = {
      getGrnReportData: "getGrnReportData",

      searchDataArr: searchArra,
    };

    $.getJSON("./phpAjax/moveOrderAjaxReport.php", data, function (data) {
      console.log(data);
      // console.log(data.sql);

      addRowToTable(data.Data);
    }).fail((error) => {
      console.log(error.responseText);
    });
  };

  setDataToTable(["___"]);

  $("#searchFilterArea").on("change", function (event) {
    let searchQuery = $(event.target).val();

    let inputs = this.querySelectorAll("input");

    let searchQueryData = [];

    inputs.forEach((input) => {
      if (input.checked) {
        // console.log(input);

        searchQueryData.push($(input).val());
      }
    });

    console.log(searchQueryData.length);

    if (searchQueryData.length == 0) {
      searchQueryData.push("___");
    }

    console.log(searchQueryData);

    // console.log(inputs);

    // console.log(this);

    setDataToTable(searchQueryData);
    // console.log(searchQuery);
  });
});
