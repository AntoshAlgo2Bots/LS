const getfulldataofponumber = (event) => {
  const po_number = $(event.target).attr("po-id");

  const data = {
    po_id: po_number,
    getLineDataByPoNumber: "getLineDataByPoNumber",
  };

  $.get(
    "./phpAJax/ajaxPurchaseOrder.php",
    data,
    function (data) {
      console.log(data);

      if (data.success) {
        $("#purchaseOrderLineDetails").html("");

        data.data.forEach((element, index) => {
          console.log(element);

          let tr = document.createElement("tr");

          tr.innerHTML = ` 
                                                            <td
                                                                class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                                ${index}
                                                            </td>
                                                            <td
                                                                class="px-6 font-medium py-4 whitespace-nowrap text-sm text-gray-800">
                                                                ${element.po_number}
                                                            </td>
                                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                               
                                                                ${element.item_code}
                                                            </td>
                                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                               
                                                                ${element.item_shortdiscription}
                                                            </td>
                                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                            ${element.unit_price}
                                                            </td>
                                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                                ${element.quantity}

                                                            </td>
                                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                            ${element.total_price}
                                                            </td>
                                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                            ${element.need_by_date}
                                                            </td>
                                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                                ${element.quantity_recevied}
                                                            </td>
                                                            <td
                                                                class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                                                ${element.balance}
                                                            </td>

                                                    `;
          $("#purchaseOrderLineDetails").append(tr);
        });
      }
    },
    "JSON"
  ).fail(error=>{
    console.log(error);
  })
};

const purchaseOrderDirect = () => {
  let trows = document.getElementById("poCreteTbody").querySelectorAll("tr");

  let po_number = document.getElementById("po_number").value;

  console.log(po_number);
  let inputData = {};

  let postInputData = {};

  postInputData["createDirectPurchaseOrder"] = "createDirectPurchaseOrder";

  trows.forEach((element, index) => {
    let inputNameValue = {};
    let inputs = element.querySelectorAll("input");

    element.setAttribute("id", `line${index}`);

    inputNameValue["line_id"] = `line${index}`;

    inputs.forEach((input) => {
      inputNameValue[input.name] = input.value;
    });

    inputData[index] = inputNameValue;
  });

  postInputData["inputsData"] = inputData;
  postInputData["po_number"] = po_number;

  console.log(postInputData);

  $.post(
    "phpAjax/ajaxPurchaseOrder.php",
    postInputData,
    function (data) {
      console.log(data);

      if (data.success) {
        let setDataToTr = data.lineSetData;

        console.log(setDataToTr);

        Object.keys(setDataToTr).forEach((element) => {
          console.log(element);

          $(`#${element}`).attr("line-id", setDataToTr[element]);
        });

        alert("Data succefully insetrted");

        // trows.forEach((element, index) => {
        //   let inputs = element.querySelectorAll("input");

        //   inputs.forEach((input) => {
        //     input.disabled = true;
        //   });
        // });
      } else {
        alert("Please try again");
      }

      // $("#po-submit-btn").fadeOut(1000);
      $("#po-save-btn").fadeOut(1000);
      $("#po-update-save-btn").fadeIn(1000);
    },
    "json"
  ).fail(error=>{
    console.log(error);
  })

  console.log(inputData);
};

const updatePurchaseOrderSave = () => {
  let trows = document.getElementById("poCreteTbody").querySelectorAll("tr");

  let po_number = document.getElementById("po_number").value;

  console.log(po_number);
  let inputData = {};

  let postInputData = {};

  postInputData["updatePoLineLable"] = "updatePoLineLable";

  trows.forEach((element, index) => {
    let inputNameValue = {};

    let inputs = element.querySelectorAll("input");

    if (!element.hasAttribute("line-id")) {
      $(element).attr("id", `line${index}`);

      inputNameValue["line_main_id"] = `line${index}`;
    }

    inputs.forEach((input) => {
      inputNameValue[input.name] = input.value;
    });
    inputNameValue["line_id"] = $(element).attr("line-id");

    inputData[index] = inputNameValue;
  });

  postInputData["inputsData"] = inputData;
  postInputData["po_number"] = po_number;

  console.log(postInputData);

  $.post(
    "phpAjax/ajaxPurchaseOrder.php",
    postInputData,
    function (data) {
      console.log(data);

      Object.keys(data.newGenRated).forEach((element) => {
        $(`#${element}`).attr("line-id", data.newGenRated[element]);
      });

      if (data.success) {
        alert("Data succefully updated");

        // trows.forEach((element, index) => {
        //   let inputs = element.querySelectorAll("input");

        //   // inputs.forEach((input) => {
        //   //   input.disabled = true;
        //   // });
        // });
      } else {
        alert("Please try again");
      }

      // $("#po-submit-btn").fadeOut(1000);
      $("#po-save-btn").fadeOut(1000);
      $("#po-update-save-btn").fadeIn(1000);
    },
    "json"
  ).fail(function (error) {
    console.log(error.responseText);
  });

  console.log(inputData);
};




const submiDataConfirmToPo = () => {
  let trows = document.getElementById("poGrnBody").querySelectorAll("tr");

  let data = {};

  let checkedData = [];

  trows.forEach((row) => {
    let checkbox = row.querySelector("input[name='checkbox']");

    if (checkbox.checked) {
      console.log(row);

      checkedData.push($(checkbox).attr("P-id"));
    }
  });

  data["updatePoStatus"] = "create";
  data["checkedData"] = checkedData;

  $.post(
    "phpAjax/ajaxPurchaseOrder.php",
    data,
    function (data) {

      console.log(data);



      if(data.success){



        alert(`${checkedData.length} is Accepetd !` )



        trows.forEach((row) => {
          let checkbox = row.querySelector("input[name='checkbox']");

      
          if (checkbox.checked) {
            row.style.filter="opacity(0.2);"

            row.classList.add("bg-green-100")

            $(checkbox).hide()

            checkbox.checked = false

            checkbox.disabled = true;
          }
        });








      }else{
        alert("Something went wrong please try again or reload")
      }




    },
    "JSON"
  ).fail((error) => {
    console.log(error.responseText);
  });

  console.log(checkedData);
};




const submiDataRejectToPo = () => {
  let trows = document.getElementById("poGrnBody").querySelectorAll("tr");

  let data = {};

  let checkedData = [];

  trows.forEach((row) => {
    let checkbox = row.querySelector("input[name='checkbox']");

    if (checkbox.checked) {
      console.log(row);

      checkedData.push($(checkbox).attr("P-id"));
    }
  });

  data["updatePoStatus"] = "reject";
  data["checkedData"] = checkedData;

  $.post(
    "phpAjax/ajaxPurchaseOrder.php",
    data,
    function (data) {

      console.log(data);



      if(data.success){



        alert(`${checkedData.length} is Rejected !` )



        trows.forEach((row) => {
          let checkbox = row.querySelector("input[name='checkbox']");

      
          if (checkbox.checked) {
            row.style.filter="opacity(0.2);"

            row.classList.add("bg-red-100")

            
            
            checkbox.checked = false
            $(checkbox).hide()
            
            checkbox.disabled = true;
          }
        });








      }else{
        alert("Something went wrong please try again or reload")
      }




    },
    "JSON"
  ).fail((error) => {
    console.log(error.responseText);
  });

  console.log(checkedData);
};







function hideSelf(event) {


$("button").fadeOut(1000)

  
  $(event.target).fadeOut(1000)

  }