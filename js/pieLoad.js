$(document).ready(function () {
  function loadPie(divId, title, data_pie) {
    google.charts.load("current", { packages: ["corechart"] });

    async function dataChart() {
      var data =  await google.visualization.arrayToDataTable(data_pie);

      //   console.log(data);

      var options = {
        title: title,
        pieHole: 0.4,
        is3D: true,
        pieSliceTextStyle: {
          color: "white",
        },
        'width':500,
        'height':400,
      };

      var chart = new google.visualization.PieChart(
        document.getElementById(divId)
      );
      chart.draw(data, options);
    }

    google.charts.setOnLoadCallback(dataChart);

    //  function drawChart1() {
    //   var data =    google.visualization.arrayToDataTable([
    //     ["Task", "Hours per Day"],
    //     ["Work", 51],
    //     ["Eat", 2],
    //     ["Commute", 2],
    //     ["Watch TV", 2],
    //     ["Sleep", 7],
    //   ]);

    //   var options = {
    //     title: "My Daily Activities",
    //     // is3D: true,
    //   };
        
    //   //  var chart =  new  google.visualization.PieChart(
    //   //   document.getElementById("")
    //   // );
    //   chart.draw(data, options);
    // }

    // google.charts.setOnLoadCallback(drawChart1);
  }

  async function setDataOfPie(data, title, divId) {
    let arrForPie = [["name", "value"]];

    Object.keys(data).forEach((Element) => {
      let arr = [Element, data[Element]];
      arrForPie.push(arr);
    });

    await loadPie(divId, title, arrForPie);
  }

  $.get(
    "./phpAjax/dashboardAjax.php",
    {
      pieChartData: "pieChartData",
    },
    async function (data) { 
      console.log(data);

      let purchase_order = data.purchaseOrder.Indexes;
      let itemrequest = data.itemrequest.Indexes;
      let requisition_table = data.requisition_table.Indexes;
      let grnStatus = data.grnStatus.Indexes;
      let Lead_status = data.Lead_status.Indexes;

      //   console.log(purchase_order);

      await setDataOfPie(requisition_table, "PR Requests", "pr_requests");
      await setDataOfPie(purchase_order, "Purchase Order", "purchase_order");
      await setDataOfPie(itemrequest, "Item Request", "item_requests");
      await setDataOfPie(grnStatus, "GRN status", "GRN_status");
      await setDataOfPie(Lead_status, "Lead Status", "Lead_status_box");
    },
    "json"
  ).fail(error=>{
    console.log(error);
  })
});





