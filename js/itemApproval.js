

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
    "phpAjax/ajaxItemApproval.php",
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
    "phpAjax/ajaxItemApproval.php",
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



const create_item_in_main  =()=>{




  let checkBox = document.getElementById("poGrnBody").querySelectorAll("tr input:checked");



  let items_to_main = [];

console.log(items_to_main);

  checkBox.forEach(Element =>{

    let item_code = $(Element).attr("item_code")


    items_to_main.push(item_code)









  })



  let data = {
    create_items_to_main:"create_items_to_main",
    items_to_main:items_to_main
  }


  console.log(data);



  $.post("phpAjax/ajaxCreateItem.php", data,
    function (data) {

      console.log(data);

      if(data.succcess ){

        alert("Item Accepted successfully")
      }
    
    },
    "json"
  ).fail(error=>{
    console.log(error);
  })







}









function hideSelf(event) {


$("button").fadeOut(1000)

  
  $(event.target).fadeOut(1000)

  }