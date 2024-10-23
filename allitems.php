<?php
// include("../db.php");
include("./dbconnection/db.php");
include("./navForLogged.php");



// $sql =  "SELECT * FROM for_office.electrical_catinfo a
// join for_office.itemmastercategory b ON a.category_name = b.categoryId 
// join for_office.sub_category c ON a.sub_category = c.subCatId; ";


// $sql = "SELECT * FROM for_office.item_master_temp a
// join for_office.itemmastercategory b ON a.Item_Category = b.categoryId 
// join for_office.sub_category c ON a.sub_category = c.subCatId;";


$sql = "SELECT * FROM for_office.item_master_temp ;";



$result = mysqli_query($con, $sql);








if ($_SERVER['REQUEST_METHOD'] == 'GET') {


    if (isset($_GET["search_query"])) {


        $search_query = $_GET['search_query'];

        $sql = "SELECT * FROM for_office.item_master_temp where S_No=$search_query ";


        echo $search_query;
        $result = mysqli_query($con, $sql);
    }
}







?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.4/dist/tailwind.min.css" rel="stylesheet">
    <title>Document</title>
</head>

<body
    style=""
    class="font-sans ">

    

    <?php





    ?>

    <div>



        <div class="flex justify-between MT-20 mt-20 mb-4 ">

            <div class="flex items-center  mb-4  max-w-lg mx-auto">

                <label for="small" class="block  text-sm font-medium text-gray-900 dark:text-white"> Select sub Category </label> <br>
                <select id="ManagerRuleCatId" onchange="setDataToAllItemview()" class="block w-full p-2   cursor-pointer text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <?php

                    $sql1 = "SELECT * FROM for_office.sub_category;";
                    $result1 = mysqli_query($con, $sql1);

                    while ($row = mysqli_fetch_array($result1)) {
                    ?>
                        <option value="<?php echo $row["subCatId"] ?>" class="cursor-pointer"><?php echo $row["name"]; ?></option>

                    <?php

                    } ?>

                </select>

            </div>

            <div class="flex items-center  mb-4  max-w-lg mx-auto">
                <label for="voice-search" class="sr-only">Search</label>
                <div class="relative w-full mr-2">

                    <input type="text" id="search_query" name="search_query" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Details From Database..." required />

                </div>
                <button  name="search" id="searchQueryBtnForAllItemView"  class="inline-flex items-center py-2.5 px-3 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>Search
                </button>
            </div>
        </d>

    </div>


    <div
        style="width: 90%;"
        class="relative mx-auto  bg-gray-50 overflow-x-auto shadow-md sm:rounded-lg">
        <table class=" text-sm mx-auto text-left border-2-black rtl:text-right text-gray-500 dark:text-gray-400">
            <thead id="" class="text-xs text-gray-700 font-sans font-bold uppercase bg-blue-300 dark:bg-gray-700 dark:text-gray-400">
                <tr id="data_headTh" class="transition-all">
             
                    
                </tr>
            </thead>
            <tbody id="dataBodyTd">



            
            </tbody>
        </table>
    </div>










</body>





<script src="./js/itemMaster.js"></script>
<script src="./js/jquery-3.7.1.min.js"></script>












<script>









</script>

</html> 