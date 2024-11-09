const setRequireFieldsFromCategory = (event) => {
  // document.getElementById("attrArea").innerText = "";
  // document.getElementById("attrArea").style.display="flex";

  let id = $(event.target).attr("cat-id");
  let cat_name = $(event.target).attr("cat-name");

  $("#sub-cat-attr-area").html("");

  $("#item_category").val(cat_name);

  data = {
    categoryFields: "categoryFields",
    catId: id,
  };

  $.ajax({
    url: "ajaxItemMaster.php",
    method: "GET",
    data,
    dataType: "json",
    success: function (data) {
      // document.getElementById("sub_catArea").innerText = ""
      let resData = data.data;

      if (data.success) {
        $("#sub-cat-area-field").html("");

        console.log(data);

        console.log(Object.keys(resData));

        Object.keys(resData).forEach((element) => {
          console.log(resData[element][0].SubcatId);
          $("#sub-cat-area-field").append(
            ` <h3 class="font-bold text-lg underline">${element} <button  sub-name='${element}' sub-id='${resData[element][0].SubcatId}' class="text-2xl focus:outline-none"
                                onclick="getRequiredAttreForSubCat(event)">+</button>
                        </h3>`
          );
        });
      }

      // addSubCatFields(resData)
    },
    error: function (error) {
      console.log(error);
    },
  });
};




function genRateItemCode() {
  // Get prefix from the input field (item_sub_category)
  const prefix = document.getElementById("item_sub_category").value.trim().toUpperCase();

  // Get current date
  let date = new Date();

  // Correctly format the suffix part: month + day of the month + full year
  const suffix = `${date.getMonth() + 1}${date.getDate()}${date.getFullYear()}`;

  // Generate the random part by concatenating the values from input fields inside "#sub-cat-attr-area"
  let randomPart = "";

  // Get all input elements inside the specified area
  let inputs = $("#sub-cat-attr-area")[0].querySelectorAll("input");

  inputs.forEach(input => {
      let inputValue = (input.value.trim().toUpperCase()); // Make the value uppercase and trim extra spaces
      randomPart += inputValue.substring(0, 2); // Add to the random part
  });
  let selects = $("#sub-cat-attr-area")[0].querySelectorAll("select");

  selects.forEach(input => {
      let inputValue = (input.value.trim().toUpperCase()); // Make the value uppercase and trim extra spaces
      randomPart += inputValue.substring(0, 2); // Add to the random part
      


  });

  // Validate the inputs (ensure prefix is not empty and randomPart is valid)
  if (!prefix || !randomPart) {
      alert("Please fill in all required fields!");
      return;
  }

  // Calculate the remaining space for the random part and suffix
  const maxLength = 25;
  const prefixLength = prefix.length;
  const suffixLength = suffix.length;
  const availableLength = maxLength - (prefixLength + suffixLength + 2); // 2 is for the hyphens

  if (availableLength <= 0) {
      alert("Prefix and suffix are too long! Ensure they fit within the 16 character limit.");
      return;
  }  

  // If the random part exceeds the available length, trim it
  if (randomPart.length > availableLength) {
      randomPart = randomPart.substring(0, availableLength);


      // Generate the final item code format: PREFIX-RANDOMPART-SUFFIX
      const itemCode = `${prefix}-${randomPart}-${suffix}`;

      // Log the generated item code for debugging
      console.log(itemCode);

      // Display the generated item code in the specified HTML element
      document.getElementById("item_code").textContent = itemCode;

      return itemCode;
  }
  
}









const getRequiredAttreForSubCat = (event) => {
  // document.getElementById("attrArea").innerText = "";
  // document.getElementById("attrArea").style.display="flex";
  $("#sub-cat-attr-area").html("");

  let subCatId = $(event.target).attr("sub-id");
  let sub_cat_name = $(event.target).attr("sub-name");

  $("#item_sub_category").val(sub_cat_name);
  $("#item_sub_category").attr("sub-id", subCatId);

  data = {
    getSubCatAttrs: "getSubCatAttrs",
    subCatId: subCatId,
  };

  $.ajax({
    url: "./phpAjax/itemMasterCreationAjax.php",
    method: "GET",
    data,
    dataType: "json",
    success: function (data) {
      // document.getElementById("sub_catArea").innerText = ""
      let resData = data.data;

      if (data.success) {
        console.log(resData);

        $("#sub-cat-attr-area").html("");

        resData.forEach((element) => {
          if (element.dropdown == "no") {
            console.log("hellduiedheuideuidheui");

            $("#sub-cat-attr-area").append(`
                   <div>
                            <label
                                class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">${element.name} :
                            </label>
                            <input type="text" name="${element.name}" 
                                class="w-44 rounded-md border text-xs border-gray-500 bg-white py-1 pl-2 text-[#6B7280] h-6 outline-none mb-3 focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                `);
          }

          if (element.dropdown == "yes") {
            let select = document.createElement("select");
            select.name = element.name;
            select.classList.add(
              "w-44",
              "rounded-md",
              "border",
              "text-xs",
              "border-gray-500",
              "bg-white",
              "py-1",
              "pl-2",
              "text-[#6B7280]",
              "h-6",
              "outline-none",
              "mb-3",
              "focus:border-[#6A64F1]",
              "focus:shadow-md"
            );

            select.innerHTML = `

               <option selected hidden  disabled  >Select</option>
            `;

            $.ajax({
              url: "ajaxItemMaster.php",
              method: "GET",
              dataType: "json",
              data: {
                getOptionAttr: "getOptionAttr",
                attr_id: element.attr_id,
              },
              success: function (data) {
                // console.log(data.data);

                data.data.forEach((element) => {
                  var option = document.createElement("option");

                  function capitalizeFirstLetter(string) {
                    return string.charAt(0).toUpperCase() + string.slice(1);
                  }

                  // option.innerText = element.description;
                  option.innerText = element.description;
                  option.value = element.description;

                  // console.log(element.description);

                  select.appendChild(option);
                });
              },
              error: function (error) {
                console.log(error);
              },
            });

            let div = document.createElement("div");

            div.innerHTML = `
             <label
                    
                
                
                class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">${element.name} :
                            </label>
            
            
        
            
                            `;

            $(div).append(select);
            $("#sub-cat-attr-area").append(div);
          }
        });
      }

      // addSubCatFields(resData)
    },
    error: function (error) {
      console.log(error.responseText);
    },
  });
};

const saveItemDataToTemp = () => {
  let attrData = {};
  let itemCodeGen = "";
  let shortDescription = $("#item_sub_category").val();

  itemCodeGen += $("#item_category").val().substring(0, 2);

  let sub_id = $("#item_sub_category").attr("sub-id");

  attrData["manCatId"] = $("#item_category").val();
  attrData["SubCatid"] = sub_id;

  let inputs = document.querySelectorAll("input");

  inputs.forEach((input, index) => {
    let attributeValue = input.value;
    attrData[input.name] = input.value;




    // if ((index > 0) & (index < 10)) {
    //   itemCodeGen += "-";
    //   itemCodeGen += attributeValue.trim().substring(0, 2);
    // }

    // if ((index > 0) & (index < 6)) {
    //   let attributeValue = input.value;
    //   shortDescription += "-";
    //   shortDescription += attributeValue.trim().substring(0, 4);
    //   console.log(attributeValue);
    // }

  

    console.log(`  name is  ${attributeValue} `);
  });
  let selects = document.querySelectorAll("select");

  selects.forEach((select) => {
    attrData[select.name] = select.value;
  });



let catDataInputs = document.querySelectorAll("#sub-cat-attr-area input,select")




catDataInputs.forEach((input,index) =>{

  let attributeValue = input.value;
  attrData[input.name] = input.value;


  attributeValue = attributeValue.toUpperCase()


  if(index < 6){

    
    
    if ((index > 0) & (index < 10)) {
      itemCodeGen += "-";
      itemCodeGen += attributeValue.trim().substring(0, 3);
    }
    
    
    
    if ((index > 0) & (index < 6)) {
      let attributeValue = input.value;
      shortDescription += "-";
      shortDescription += attributeValue.trim().substring(0, 4);
      console.log(attributeValue);
    }

    
    
  }





})
















  let data = {
    saveItemDataToTemp: "saveItemDataToTemp",
    attrData: attrData,
  };

  console.log(data);

  // itemCodeGen = genRateItemCode()






  attrData["itemCodeGenrated"] = itemCodeGen;
  attrData["Short_Description"] = shortDescription;
  attrData["finish_type"] = $("#finish_raw_material").val();

  let itemFilePath = "";

  let fileItem = document.querySelector('[name="itemImage"]');

  if (fileItem && fileItem.files.length > 0) {
    var formData = new FormData();
    formData.append("itemImage", fileItem.files[0]);

    // Assuming there are other fields in the form to append to formData

    $.ajax({
      url: "./phpAjax/itemMasterCreationAjax.php",
      type: "POST",
      data: formData,
      dataType: "JSON",
      contentType: false, // Prevent jQuery from setting Content-Type header
      processData: false, // Prevent jQuery from converting the data into a query string
      success: function (response) {
        if (response.success) {
          alert("Image uploaded successfully");

          itemFilePath = response.filePath;

          console.log("File path is :" + response.filePath);
          console.log(response);

          document.getElementById("uploaded_file_path").style.display = "block";
          document.getElementById(
            "uploaded_file_path"
          ).src = `./images/${itemFilePath}`;

          data["filePath"] = itemFilePath;

          $.post(
            "./phpAjax/itemMasterCreationAjax.php",
            data,
            function (data, textStatus, jqXHR) {
              console.log(data);

              if (data.success) {
                $("#item_code").val(data.ItemCode);
                $("#record_id").val(data.recordId);
                $("#item_name").val(data.shortDiscription);

                alert("Request created success fully");

                $("#save-item").fadeOut(1000);
              }
            },
            "json"
          ).fail((error) => {
            console.log(error);
          });
        }
      },
      error: function (error) {
        console.error(error);
      },
    });
  } else {
    alert("Please uplaod the picture and fill the valid fields");
    console.log("No file selected or file input not found.");
  }
};