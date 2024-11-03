console.log("Hello worldededmeiodmd!");

$("button[name='move_item']").click(function (e) {
  e.preventDefault();





  
  
  let tbody = $("#items_data_table")[0]
      
  tbody = tbody.querySelectorAll("tr")
  // console.log(tbody);
  

  let inputData = [];





  tbody.forEach(tr => {

        var  move_item = {}


        
        
        
        let checkbox = tr.querySelector("input[type='checkbox']")

        
        if(checkbox.checked) {
          
          // console.log(tr);
          
          

          move_item.transaction_id =tr.querySelector("input[name='item_code']").getAttribute("transaction-id")  ;


          console.log(move_item);



          //data object from last to next transaction
        move_item.destination_sub_inventory = parseInt(tr.querySelector("select[name='destination_sub_inventory']").value)
        move_item.source_sub_invetory = parseInt(document.querySelector("select[name='source_sub_invetory']").value)
        move_item.qty =  parseInt(tr.querySelector("input[name='qty']").value)
        move_item.lot_number = tr.querySelector("input[name='lot_number']").value


        inputData.push(move_item) ;

        }

          

    
  });



























  let data = {
    move_order: "move_order",
    inputData: inputData,
  };

  console.log(data);








  $.post(
    "./phpAjax/moveOrderAjax.php",
    data,
    function (data) {
      console.log(data);  

        console.log("succss request");


      if (data.success) {
        alert("Data created successfully ");
      } else {
        alert(data.message);
      } 
    },
    "json"
  ).fail(error => {

    console.log(error);

    console.log(error.responseText);

  }




  )

  console.log("CLicked on button");
});
