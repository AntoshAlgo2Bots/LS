$("#saleOrderSavebtn").on("click", function () {
  console.log("clicked on save button");

  let inputs = document.querySelectorAll("input");

  let inputsData = {};

  inputs.forEach((input ,index) => {

    let name = input.name
    let value = input.value


    inputsData[name]=value
  });



  let data = {}

  data["userInputData"] = inputsData ;
  data["createdSaleOrder"] = "createdSaleOrder" ;


    $.post("./phpAjax/saleOrderAjax.php", data,
        function (data) {


            if(data.success){
                alert("Success")
            }
                    
            

        },
        "json"
    ).fail(error=>{
        console.log(error);
    })









  console.log(inputsData);
});
