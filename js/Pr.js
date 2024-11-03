console.log("hello ");

const createdBomb = () => {
  let trows = document.getElementById("poCreteTbody").querySelectorAll("tr");

  let po_number = document.getElementById("header_id").value;

  console.log(po_number);
  let inputData = {};

  let postInputData = {};

  postInputData["bom_creation_form"] = "bom_creation_form";

  trows.forEach((element, index) => {
    let inputNameValue = {};
    let inputs = element.querySelectorAll("input");

    inputs.forEach((input) => {
      inputNameValue[input.name] = input.value;
    });

    inputData[index] = inputNameValue;
  });

  postInputData["inputsData"] = inputData;
  postInputData["requisition_id"] = po_number;

  console.log(postInputData);

  $.post(
    "./phpAjax/bomAjax.php",
    postInputData,
    function (data) {
      console.log(data);

      if(data.success){

        alert("Data inserted success fully")


            let inputs = document.querySelectorAll("input")

            inputs.forEach(Element =>{

                Element.disabled=true;



            })


            let button  = document.querySelectorAll("button");

            button.forEach(element =>{
                $(element).fadeOut(1000);
            })



      }

  
    },"JSON"
  ).fail(function(error) {
    console.log(error.responseText);
  })

  console.log(inputData);
 };

 





//  let data1 = {
//   bom_creation_form: "bom_creation_form",
//   bom_id: bom_id
// }


// console.log("Here start my code")
// $.get("bomAjax.php", data1, function (data) {
//   console.log(data);


//   let rowData = data.data

//   $("#BomLineDetail").html(" ")

//   rowData.forEach(row => {



//       $("#BomLineDetail").append(`
//                       <tr class="border-b dark:border-gray-700">
//                       <td class="px-3 py-3 text-center">
//                           <input type="checkbox" value="" >
//                       </td>
//                       <td class="px-6 py-3">
//                           <input type="number" value="${row.process_seq}" class="w-20">
//                       </td>
//                       <td class="px-6 py-3">
//                           <input type="number" value="${row.item_code}" class="w-20">    
//                       </td>
//                       <td class="px-6 py-3">
//                           <input type="text" value="${row.item_name}" class="w-40">    
//                       </td>
//                       <td class="px-6 py-3">
//                           <input type="date" value="${row.quantity}">  
//                       </td>
//                       <td class="px-6 py-3">
//                           <input type="text" value="${row.percentage_line}" class="w-16">
//                       </td>
                     

//                   </tr>`)

//   });







// }, "json")


// console.log(userdata)
















