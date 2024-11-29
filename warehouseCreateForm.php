<?php include("./navForLogged.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.4/dist/tailwind.min.css" rel="stylesheet">

    <title>Warehouse Form</title>
</head>

<body>


    <div id="create_section" class="mt-5 border border-gray-900 p-5 rounded-lg mx-5">
        <form action="#" id="formData">
            <h1 class=" text-center underline text-3xl mb-3 font-bold">Create Warehouse Form</h1>
            <div class="block md:flex gap-x-4">
                <fieldset class="w-full border border-gray-500 p-4 rounded-md">
                    <legend class="font-bold text-sm">Warehouse Information</legend>
                    <div class="">
                        <div class="flex gap-x-14 flex-wrap">
                        <div>
                            <label for=""
                                class="block  mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Warehouse
                                id :
                            </label>
                            <input type="text" name="warehouse_id" id="warehouse_id"
                            class="w-28 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md"
                             />

                                <button type="button" id="search"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-xs rounded-lg text-xs px-3.5 py-1 me-2 mb-1  dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"><img src="https://img.icons8.com/?size=100&id=59878&format=png&color=ffffff" alt="" class=" w-4 text-white "></button>

                        </div>


                            <div>
                                <label for="email"
                                    class="block  mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Organaization Name
                                    :
                                </label>
                                <input required type="text" name="organization_name" placeholder="Enter organaization name" id="organization_name"
                                    class="w-40 rounded-md border mb-3 text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            </div>
                            <div class="">
                                <label
                                    class="block w-40 mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Organaization_code
                                </label>
                                <input required type="number" name="organaization_code" placeholder="Enter organaization code" id="organaization_code"
                                    class="w-40 rounded-md border mb-3 text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            </div>

                            <div class="">
                                <label
                                    class="block w-40 mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Location
                                </label>
                                <input required type="text" name="location" placeholder="Enter location" id="location"
                                    class="w-40 rounded-md border mb-3 text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            </div>
                            <div class="">
                                <label
                                    class="block w-40 mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Start_date
                                </label>
                                <input required type="date" name="start_date" value="<?php echo date('Y-m-d'); ?>" id="start_date"
                                    class="w-40 rounded-md border mb-3 text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            </div>
                            <div class="">
                                <label
                                    class="block w-40 mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">End_date
                                </label>
                                <input type="date" name="end_date" id="end_date"
                                    class="w-40 rounded-md border mb-3 text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            </div>
                            <div class="">
                                <label
                                    class="block w-40 mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Status:
                                </label>
                                <input required type="text" name="status"  id="status"
                                    class="w-40 rounded-md border mb-3 text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            </div>
                            <div class="">
                                <label
                                    class="block w-40 mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">GST Number :
                                </label>
                                <input required type="text" name="gst_number"  id="gst_number"
                                    class="w-40 rounded-md border mb-3 text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            </div>
                            <div class="">
                                <label
                                    class="block w-40 mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">PAN Number:
                                </label>
                                <input required type="text" name="pan_number"  id="pan_number"
                                    class="w-40 rounded-md border mb-3 text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            </div>
                            <div class="">
                                <label
                                    class="block w-40 mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">TAN Number:
                                </label>
                                <input required type="text" name="tan_number"  id="tan_number"
                                    class="w-40 rounded-md border mb-3 text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            </div>
                            <div class="">
                                <label
                                    class="block w-40 mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Tin Number:
                                </label>
                                <input required type="text" name="tin_number"  id="tin_number"
                                    class="w-40 rounded-md border mb-3 text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            </div>
                            <div class="">
                                <label
                                    class="block w-40 mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">State:
                                </label>
                                <input required type="text" name="state"  id="state"
                                    class="w-40 rounded-md border mb-3 text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="flex justify-between flex-wrap">
                    
                     <div>



                         <input type="submit"  id="submitBtn"
                             class="w-28 text-white border border-blue-700 bg-blue-800 focus:ring-4 mt-3 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-xs py-2.5 text-center me-2 font-bold dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800 ">
                             </input>
                     </div>


                </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script>
        $(document).ready(function () {
            $('#formData').submit(function (e) {
                e.preventDefault();
                var frmData = $(this).serialize();

                $.post("./phpAjax/warehouseCreateAjax.php", frmData, function (response) {
                    console.log("This is from success block");
                    // console.log();
                    console.log(response);

                    if (response.success) {
                        let s_no = response.inserted_id;

                        $("#warehouse_id").val(s_no)

                        console.log(s_no)
                        alert("Form submitted successfully! Your Record No is " + s_no);
                    } else {
                        alert("Error: " + response.message);
                    }
                    // $('#formData')[0].reset();
                }, "json").fail(function (error) {
                    console.log("This is error block");
                    console.log(error.responseText);
                });
                $('#formData')[0].reset();
            });
        });
    </script>


<script type="text/javascript">
        $(document).ready(function () {
            $('#search').click(function (e) {
                e.preventDefault();
                var srch = $('#warehouse_id').val();
                document.getElementById('submitBtn').disabled = true;

                $.post("./phpAjax/warehouseCreateAjax.php", { srch }, function (data) {

                    // console.log(data)
                    var res = data

                    console.log(data);
                    $("#organization_name").val(res.data.organization_name);
                    $("#organaization_code").val(res.data.organaization_code);
                    $("#location").val(res.data.location);
                    $("#start_date").val(res.data.start_date);
                    $("#end_date").val(res.data.end_date);
                    $("#status").val(res.data.status);
                    $("#gst_number").val(res.data.gst_number);
                    $("#pan_number").val(res.data.pan_number);
                    $("#tan_number").val(res.data.tan_number);
                    $("#tin_number").val(res.data.tin_number);
                    $("#state").val(res.data.state);
                 

                   

                }, "json").fail(function (error) {
                    console.log("This is error block");
                    console.log(error.responseText);
                });
                
            })
        });
    </script>

</body>

</html>