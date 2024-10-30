<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.4/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <title>User Dashboard</title>

    <script>
        function toggleDropdown() {
            const dropdown = document.getElementById('dropdown');
            dropdown.classList.toggle('hidden');
        }

        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('hidden');
        }


    </script>
</head>


<body class="font" style="font-family: 'Poppins', sans-serif;">


    <div>

        <?php






        session_start();

        if (!isset($_SESSION["username"])) {




            header("location:login.php");




        }




        ?>
        <!-- bg-gray-300 -->
        <header class="text-white shadow p-4 flex items-center justify-between max-w-8xl mx-auto"
            style="background-color: #7695FF;">
            <div class="flex items-center">
                <button onclick="toggleSidebar()" class="lg:hidden p-2 text-gray-600 hover:bg-gray-200 rounded">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
                <h2 class="text-xl font-base ml-2"> Hello! <?php echo $_SESSION["username"] ?></span>
                </h2>
                <!-- <h2 class="text-xl font-base ml-2"> Hello! Antosh</span></h2> -->

                <div class="hidden  w-full md:flex md:w-auto md:order-1 ml-20" id="navbar-sticky">
                    <a href="./dashboard.php" class="font-base text-md">Home</a>
                </div>
            </div>
            <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                <a href="logout.php" type="button"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Logout</a>
            </div>


        </header>


        <div class="flex flex-col lg:flex-row max-w-8xl mx-auto">
            <!-- Sidebar -->

            <aside id="sidebar"
                class="bg-orange-100 text-gray-700 w-72 lg:w-64 p-5 lg:static lg:h-auto hidden lg:block">
                <h1 class="text-lg border-b  border-gray-800 pb-1 mt-2 text-center text-2xl font-medium mb-5">Roles</h1>
                <nav>
                    <div class="relative block w-full">
                        <div role="button"
                            class="flex items-center w-full p-0 leading-tight transition-all rounded-lg outline-none bg-blue-gray-50/50 text-start text-blue-gray-700 hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                            <button type="button" name="head_cat_btn"
                                class="flex items-center justify-between w-full p-2  text-xl antialiased font-base leading-snug text-left transition-colors border-b-0 select-none border-b-blue-gray-100 text-blue-gray-900 hover:text-blue-gray-900">
                                <div class="grid mr-4 place-items-center">
                                    <i class="fa-solid fa-cart-shopping text-lg pt-1"></i>
                                    <path fill-rule="evenodd"
                                        d="M2.25 2.25a.75.75 0 000 1.5H3v10.5a3 3 0 003 3h1.21l-1.172 3.513a.75.75 0 001.424.474l.329-.987h8.418l.33.987a.75.75 0 001.422-.474l-1.17-3.513H18a3 3 0 003-3V3.75h.75a.75.75 0 000-1.5H2.25zm6.04 16.5l.5-1.5h6.42l.5 1.5H8.29zm7.46-12a.75.75 0 00-1.5 0v6a.75.75 0 001.5 0v-6zm-3 2.25a.75.75 0 00-1.5 0v3.75a.75.75 0 001.5 0V9zm-3 2.25a.75.75 0 00-1.5 0v1.5a.75.75 0 001.5 0v-1.5z"
                                        clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <p
                                    class="block mr-auto font-sans text-base antialiased font-normal leading-relaxed text-blue-gray-900">
                                    Item Master
                                </p>
                                <span class="ml-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2.5" stroke="currentColor" aria-hidden="true"
                                        class="w-4 h-4 mx-auto transition-transform rotate-0">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 8.25l-7.5 7.5-7.5-7.5"></path>
                                    </svg>
                                </span>

                            </button>

                        </div>
                        <div class="overflow-hidden hidden" name="li_area" id="fees-li-area">
                            <div class="block w-full py-1  text-sm antialiased font-light leading-normal text-gray-700">
                                <nav name="nav"
                                    class="flex flex-col gap-1 p-0  text-base font-normal text-blue-gray-700">

                                    <a href="./itemMasterCreation.php"
                                        class="flex items-center w-full p-2 text-sm text-gray-700 leading-tight transition-all rounded-lg outline-none text-start hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                                        <div class="grid mr-4 place-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="3" stroke="currentColor" aria-hidden="true"
                                                class="w-5 h-3">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                            </svg>
                                        </div>
                                        Item Request Creation
                                    </a>

                                    <a href="./mangerApprove.php"
                                        class="flex items-center w-full p-2 text-sm leading-tight text-gray-700 transition-all rounded-lg outline-none text-start hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                                        <div class="grid mr-4 place-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="3" stroke="currentColor" aria-hidden="true"
                                                class="w-5 h-3">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                            </svg>
                                        </div>
                                        Item Request Creation and Approval Report
                                    </a>


                                    <a href="./allitems.php"
                                        class="flex items-center w-full p-2 text-sm leading-tight text-gray-700 transition-all rounded-lg outline-none text-start hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                                        <div class="grid mr-4 place-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="3" stroke="currentColor" aria-hidden="true"
                                                class="w-5 h-3">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                            </svg>
                                        </div>
                                        Item Master Details Report
                                    </a>

                                </nav>
                            </div>
                        </div>
                    </div>


                    <nav>
                        <div class="relative block w-full mt-1">
                            <div role="button"
                                class="flex items-center w-full p-0 leading-tight transition-all rounded-lg outline-none bg-blue-gray-50/50 text-start text-blue-gray-700 hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                                <button type="button" name="head_cat_btn"
                                    class="flex items-center justify-between w-full p-2  text-xl antialiased font-base leading-snug text-left transition-colors border-b-0 select-none border-b-blue-gray-100 text-blue-gray-900 hover:text-blue-gray-900">
                                    <div class="grid mr-4 place-items-center text-lg pt-1 pl-1">
                                        <i class="fa-solid fa-cart-arrow-down"></i>
                                        <path fill-rule="evenodd"
                                            d="M2.25 2.25a.75.75 0 000 1.5H3v10.5a3 3 0 003 3h1.21l-1.172 3.513a.75.75 0 001.424.474l.329-.987h8.418l.33.987a.75.75 0 001.422-.474l-1.17-3.513H18a3 3 0 003-3V3.75h.75a.75.75 0 000-1.5H2.25zm6.04 16.5l.5-1.5h6.42l.5 1.5H8.29zm7.46-12a.75.75 0 00-1.5 0v6a.75.75 0 001.5 0v-6zm-3 2.25a.75.75 0 00-1.5 0v3.75a.75.75 0 001.5 0V9zm-3 2.25a.75.75 0 00-1.5 0v1.5a.75.75 0 001.5 0v-1.5z"
                                            clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                    <p
                                        class="block mr-auto font-sans text-base antialiased font-normal leading-relaxed text-blue-gray-900">
                                        Bom Form
                                    </p>
                                    <span class="ml-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="2.5" stroke="currentColor" aria-hidden="true"
                                            class="w-4 h-4 mx-auto transition-transform rotate-0">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 8.25l-7.5 7.5-7.5-7.5"></path>
                                        </svg>
                                    </span>

                                </button>

                            </div>
                            <div class="overflow-hidden hidden" name="li_area" id="fees-li-area">
                                <div
                                    class="block w-full py-1  text-sm antialiased font-light leading-normal text-gray-700">
                                    <nav name="nav"
                                        class="flex flex-col gap-1 p-0  text-base font-normal text-blue-gray-700">

                                        <a href="./bom/BomNewCreateForm.php"
                                            class="flex items-center w-full p-2 text-sm text-gray-700 leading-tight transition-all rounded-lg outline-none text-start hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                                            <div class="grid mr-4 place-items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="3" stroke="currentColor" aria-hidden="true"
                                                    class="w-5 h-3">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                                </svg>
                                            </div>
                                            BOM Creation Form
                                        </a>

                                        <a href="./bom/BomSearchForm.php"
                                            class="flex items-center w-full text-sm p-2 leading-tight text-gray-700 transition-all rounded-lg outline-none text-start hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                                            <div class="grid mr-4 place-items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="3" stroke="currentColor" aria-hidden="true"
                                                    class="w-5 h-3">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                                </svg>
                                            </div>
                                            BOM Search Form
                                        </a>


                                        <a href="./bom/BomReportForm.php"
                                            class="flex items-center w-full p-2 text-sm leading-tight text-gray-700 transition-all rounded-lg outline-none text-start hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                                            <div class="grid mr-4 place-items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="3" stroke="currentColor" aria-hidden="true"
                                                    class="w-5 h-3">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                                </svg>
                                            </div>
                                            Bom Report
                                        </a>

                                    </nav>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="relative block w-full">
                            <div role="button"
                                class="flex items-center w-full p-0 leading-tight transition-all rounded-lg outline-none bg-blue-gray-50/50 text-start text-blue-gray-700 hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                                <button type="button" name="head_cat_btn"
                                    class="flex items-center justify-between w-full p-2  text-xl antialiased font-base leading-snug text-left transition-colors border-b-0 select-none border-b-blue-gray-100 text-blue-gray-900 hover:text-blue-gray-900">
                                    <div class="grid mr-4 place-items-center">
                                        <i class="fa-solid fa-gear"></i>
                                        <path fill-rule="evenodd"
                                            d="M2.25 2.25a.75.75 0 000 1.5H3v10.5a3 3 0 003 3h1.21l-1.172 3.513a.75.75 0 001.424.474l.329-.987h8.418l.33.987a.75.75 0 001.422-.474l-1.17-3.513H18a3 3 0 003-3V3.75h.75a.75.75 0 000-1.5H2.25zm6.04 16.5l.5-1.5h6.42l.5 1.5H8.29zm7.46-12a.75.75 0 00-1.5 0v6a.75.75 0 001.5 0v-6zm-3 2.25a.75.75 0 00-1.5 0v3.75a.75.75 0 001.5 0V9zm-3 2.25a.75.75 0 00-1.5 0v1.5a.75.75 0 001.5 0v-1.5z"
                                            clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                    <p
                                        class="block mr-auto  border-gray-800  text-base antialiased font-base leading-relaxed text-blue-gray-900 border-b">
                                        Add - Main / Sub
                                    </p>
                                    <span class="ml-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="2.5" stroke="currentColor" aria-hidden="true"
                                            class="w-4 h-4 mx-auto transition-transform rotate-0">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 8.25l-7.5 7.5-7.5-7.5"></path>
                                        </svg>
                                    </span>

                                </button>

                            </div>
                            <div class="overflow-hidden hidden" name="li_area" id="fees-li-area">
                                <div
                                    class="block w-full py-1  text-sm antialiased font-light leading-normal text-gray-700">
                                    <nav name="nav"
                                        class="flex flex-col gap-1 p-0  text-base font-normal text-blue-gray-700">

                                        <a href="./addAttribute.php"
                                            class="flex items-center w-full p-2 text-gray-700 leading-tight transition-all rounded-lg outline-none text-start hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                                            <div class="grid mr-4 place-items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="3" stroke="currentColor" aria-hidden="true"
                                                    class="w-5 h-3">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                                </svg>
                                            </div>
                                            Add Txn Attributes - Main and Sub Head
                                        </a>

                                    </nav>
                                </div>
                            </div>
                        </div> -->
                    </nav>

                    <nav>
                        <div class="relative block w-full mt-1">
                            <div role="button"
                                class="flex items-center w-full p-0 leading-tight transition-all rounded-lg outline-none bg-blue-gray-50/50 text-start text-blue-gray-700 hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                                <button type="button" name="head_cat_btn"
                                    class="flex items-center justify-between w-full p-2  text-xl antialiased font-base leading-snug text-left transition-colors border-b-0 select-none border-b-blue-gray-100 text-blue-gray-900 hover:text-blue-gray-900">
                                    <div class="grid mr-4 place-items-center text-lg pt-1 pl-1">
                                        <i class="fa-solid fa-book"></i>
                                        <path fill-rule="evenodd"
                                            d="M2.25 2.25a.75.75 0 000 1.5H3v10.5a3 3 0 003 3h1.21l-1.172 3.513a.75.75 0 001.424.474l.329-.987h8.418l.33.987a.75.75 0 001.422-.474l-1.17-3.513H18a3 3 0 003-3V3.75h.75a.75.75 0 000-1.5H2.25zm6.04 16.5l.5-1.5h6.42l.5 1.5H8.29zm7.46-12a.75.75 0 00-1.5 0v6a.75.75 0 001.5 0v-6zm-3 2.25a.75.75 0 00-1.5 0v3.75a.75.75 0 001.5 0V9zm-3 2.25a.75.75 0 00-1.5 0v1.5a.75.75 0 001.5 0v-1.5z"
                                            clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                    <p
                                        class="block mr-auto font-sans text-base antialiased font-normal leading-relaxed text-blue-gray-900">
                                        Daily Txn Book
                                    </p>
                                    <span class="ml-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="2.5" stroke="currentColor" aria-hidden="true"
                                            class="w-4 h-4 mx-auto transition-transform rotate-0">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 8.25l-7.5 7.5-7.5-7.5"></path>
                                        </svg>
                                    </span>

                                </button>

                            </div>
                            <div class="overflow-hidden hidden" name="li_area" id="fees-li-area">
                                <div
                                    class="block w-full py-1  text-sm antialiased font-light leading-normal text-gray-700">
                                    <nav name="nav"
                                        class="flex flex-col gap-1 p-0  text-base font-normal text-blue-gray-700">

                                        <a href="./txn/create_txn.php"
                                            class="flex items-center w-full p-2 text-sm text-gray-700 leading-tight transition-all rounded-lg outline-none text-start hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                                            <div class="grid mr-4 place-items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="3" stroke="currentColor" aria-hidden="true"
                                                    class="w-5 h-3">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                                </svg>
                                            </div>
                                            Daily Txn Creation Form
                                        </a>

                                        <a href="./txn/search_txn.php"
                                            class="flex items-center w-full text-sm p-2 leading-tight text-gray-700 transition-all rounded-lg outline-none text-start hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                                            <div class="grid mr-4 place-items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="3" stroke="currentColor" aria-hidden="true"
                                                    class="w-5 h-3">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                                </svg>
                                            </div>
                                            Daily Txn Search Form
                                        </a>


                                        <a href="./txn/txn_report.php"
                                            class="flex items-center w-full p-2 text-sm leading-tight text-gray-700 transition-all rounded-lg outline-none text-start hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                                            <div class="grid mr-4 place-items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="3" stroke="currentColor" aria-hidden="true"
                                                    class="w-5 h-3">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                                </svg>
                                            </div>
                                            Daily Txn Report
                                        </a>

                                    </nav>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="relative block w-full">
                            <div role="button"
                                class="flex items-center w-full p-0 leading-tight transition-all rounded-lg outline-none bg-blue-gray-50/50 text-start text-blue-gray-700 hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                                <button type="button" name="head_cat_btn"
                                    class="flex items-center justify-between w-full p-2  text-xl antialiased font-base leading-snug text-left transition-colors border-b-0 select-none border-b-blue-gray-100 text-blue-gray-900 hover:text-blue-gray-900">
                                    <div class="grid mr-4 place-items-center">
                                        <i class="fa-solid fa-gear"></i>
                                        <path fill-rule="evenodd"
                                            d="M2.25 2.25a.75.75 0 000 1.5H3v10.5a3 3 0 003 3h1.21l-1.172 3.513a.75.75 0 001.424.474l.329-.987h8.418l.33.987a.75.75 0 001.422-.474l-1.17-3.513H18a3 3 0 003-3V3.75h.75a.75.75 0 000-1.5H2.25zm6.04 16.5l.5-1.5h6.42l.5 1.5H8.29zm7.46-12a.75.75 0 00-1.5 0v6a.75.75 0 001.5 0v-6zm-3 2.25a.75.75 0 00-1.5 0v3.75a.75.75 0 001.5 0V9zm-3 2.25a.75.75 0 00-1.5 0v1.5a.75.75 0 001.5 0v-1.5z"
                                            clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                    <p
                                        class="block mr-auto  border-gray-800  text-base antialiased font-base leading-relaxed text-blue-gray-900 border-b">
                                        Add - Main / Sub
                                    </p>
                                    <span class="ml-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="2.5" stroke="currentColor" aria-hidden="true"
                                            class="w-4 h-4 mx-auto transition-transform rotate-0">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 8.25l-7.5 7.5-7.5-7.5"></path>
                                        </svg>
                                    </span>

                                </button>

                            </div>
                            <div class="overflow-hidden hidden" name="li_area" id="fees-li-area">
                                <div
                                    class="block w-full py-1  text-sm antialiased font-light leading-normal text-gray-700">
                                    <nav name="nav"
                                        class="flex flex-col gap-1 p-0  text-base font-normal text-blue-gray-700">

                                        <a href="./addAttribute.php"
                                            class="flex items-center w-full p-2 text-gray-700 leading-tight transition-all rounded-lg outline-none text-start hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                                            <div class="grid mr-4 place-items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="3" stroke="currentColor" aria-hidden="true"
                                                    class="w-5 h-3">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                                </svg>
                                            </div>
                                            Add Txn Attributes - Main and Sub Head
                                        </a>

                                    </nav>
                                </div>
                            </div>
                        </div> -->
                    </nav>

                    <div class="relative block w-full mt-1">
                        <div role="button"
                            class="flex items-center w-full p-0 leading-tight transition-all rounded-lg outline-none bg-blue-gray-50/50 text-start text-blue-gray-700 hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                            <button type="button" name="head_cat_btn"
                                class="flex items-center justify-between w-full p-2  text-xl antialiased font-base leading-snug text-left transition-colors border-b-0 select-none border-b-blue-gray-100 text-blue-gray-900 hover:text-blue-gray-900">
                                <div class="grid mr-4 place-items-center text-lg pt-1 pl-1">
                                    <i class="fa-solid fa-users"></i>
                                    <path fill-rule="evenodd"
                                        d="M2.25 2.25a.75.75 0 000 1.5H3v10.5a3 3 0 003 3h1.21l-1.172 3.513a.75.75 0 001.424.474l.329-.987h8.418l.33.987a.75.75 0 001.422-.474l-1.17-3.513H18a3 3 0 003-3V3.75h.75a.75.75 0 000-1.5H2.25zm6.04 16.5l.5-1.5h6.42l.5 1.5H8.29zm7.46-12a.75.75 0 00-1.5 0v6a.75.75 0 001.5 0v-6zm-3 2.25a.75.75 0 00-1.5 0v3.75a.75.75 0 001.5 0V9zm-3 2.25a.75.75 0 00-1.5 0v1.5a.75.75 0 001.5 0v-1.5z"
                                        clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <p
                                    class="block mr-auto font-sans text-base antialiased font-normal leading-relaxed text-blue-gray-900">
                                    Customer Form
                                </p>
                                <span class="ml-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2.5" stroke="currentColor" aria-hidden="true"
                                        class="w-4 h-4 mx-auto transition-transform rotate-0">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 8.25l-7.5 7.5-7.5-7.5"></path>
                                    </svg>
                                </span>

                            </button>

                        </div>
                        <div class="overflow-hidden hidden" name="li_area" id="fees-li-area">
                            <div class="block w-full py-1  text-sm antialiased font-light leading-normal text-gray-700">
                                <nav name="nav"
                                    class="flex flex-col gap-1 p-0  text-base font-normal text-blue-gray-700">

                                    <a href="./customer_create_form.php"
                                        class="flex items-center w-full p-2 text-sm text-gray-700 leading-tight transition-all rounded-lg outline-none text-start hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                                        <div class="grid mr-4 place-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="3" stroke="currentColor" aria-hidden="true"
                                                class="w-5 h-3">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                            </svg>
                                        </div>
                                        Customer Creation Form
                                    </a>

                                    <a href="./customer_search_form.php"
                                        class="flex items-center w-full text-sm p-2 leading-tight text-gray-700 transition-all rounded-lg outline-none text-start hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                                        <div class="grid mr-4 place-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="3" stroke="currentColor" aria-hidden="true"
                                                class="w-5 h-3">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                            </svg>
                                        </div>
                                        Customer Search Form
                                    </a>


                                    <a href="./customer_report.php"
                                        class="flex items-center w-full p-2 text-sm leading-tight text-gray-700 transition-all rounded-lg outline-none text-start hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                                        <div class="grid mr-4 place-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="3" stroke="currentColor" aria-hidden="true"
                                                class="w-5 h-3">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                            </svg>
                                        </div>
                                        Customer Report
                                    </a>

                                </nav>
                            </div>
                        </div>
                    </div>

                    <div class="relative block w-full mt-1">
                        <div role="button"
                            class="flex items-center w-full p-0 leading-tight transition-all rounded-lg outline-none bg-blue-gray-50/50 text-start text-blue-gray-700 hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                            <button type="button" name="head_cat_btn"
                                class="flex items-center justify-between w-full p-2  text-xl antialiased font-base leading-snug text-left transition-colors border-b-0 select-none border-b-blue-gray-100 text-blue-gray-900 hover:text-blue-gray-900">
                                <div class="grid mr-4 place-items-center text-lg pt-1 pl-1">
                                    <i class="fa-solid fa-boxes-packing"></i>
                                    <path fill-rule="evenodd"
                                        d="M2.25 2.25a.75.75 0 000 1.5H3v10.5a3 3 0 003 3h1.21l-1.172 3.513a.75.75 0 001.424.474l.329-.987h8.418l.33.987a.75.75 0 001.422-.474l-1.17-3.513H18a3 3 0 003-3V3.75h.75a.75.75 0 000-1.5H2.25zm6.04 16.5l.5-1.5h6.42l.5 1.5H8.29zm7.46-12a.75.75 0 00-1.5 0v6a.75.75 0 001.5 0v-6zm-3 2.25a.75.75 0 00-1.5 0v3.75a.75.75 0 001.5 0V9zm-3 2.25a.75.75 0 00-1.5 0v1.5a.75.75 0 001.5 0v-1.5z"
                                        clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <p
                                    class="block mr-auto font-sans text-base antialiased font-normal leading-relaxed text-blue-gray-900">
                                    Supplier Form
                                </p>
                                <span class="ml-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2.5" stroke="currentColor" aria-hidden="true"
                                        class="w-4 h-4 mx-auto transition-transform rotate-0">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 8.25l-7.5 7.5-7.5-7.5"></path>
                                    </svg>
                                </span>

                            </button>

                        </div>
                        <div class="overflow-hidden hidden" name="li_area" id="fees-li-area">
                            <div class="block w-full py-1  text-sm antialiased font-light leading-normal text-gray-700">
                                <nav name="nav"
                                    class="flex flex-col gap-1 p-0  text-base font-normal text-blue-gray-700">

                                    <a href="./supplier_creation_form.php"
                                        class="flex items-center w-full p-2 text-sm text-gray-700 leading-tight transition-all rounded-lg outline-none text-start hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                                        <div class="grid mr-4 place-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="3" stroke="currentColor" aria-hidden="true"
                                                class="w-5 h-3">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                            </svg>
                                        </div>
                                        Supplier Creation Form
                                    </a>

                                    <a href="./Supplier_search.php"
                                        class="flex items-center w-full text-sm p-2 leading-tight text-gray-700 transition-all rounded-lg outline-none text-start hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                                        <div class="grid mr-4 place-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="3" stroke="currentColor" aria-hidden="true"
                                                class="w-5 h-3">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                            </svg>
                                        </div>
                                        Supplier Search Form
                                    </a>


                                    <a href="./supplier_report_form.php"
                                        class="flex items-center w-full p-2 text-sm leading-tight text-gray-700 transition-all rounded-lg outline-none text-start hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                                        <div class="grid mr-4 place-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="3" stroke="currentColor" aria-hidden="true"
                                                class="w-5 h-3">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                            </svg>
                                        </div>
                                        Supplier Report
                                    </a>

                                </nav>
                            </div>
                        </div>
                    </div>

                    <div class="relative block w-full mt-1">
                        <div role="button"
                            class="flex items-center w-full p-0 leading-tight transition-all rounded-lg outline-none bg-blue-gray-50/50 text-start text-blue-gray-700 hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                            <button type="button" name="head_cat_btn"
                                class="flex items-center justify-between w-full p-2  text-xl antialiased font-base leading-snug text-left transition-colors border-b-0 select-none border-b-blue-gray-100 text-blue-gray-900 hover:text-blue-gray-900">
                                <div class="grid mr-4 place-items-center text-lg pt-1 pl-1">
                                    <i class="fa-solid fa-lightbulb"></i>
                                    <path fill-rule="evenodd"
                                        d="M2.25 2.25a.75.75 0 000 1.5H3v10.5a3 3 0 003 3h1.21l-1.172 3.513a.75.75 0 001.424.474l.329-.987h8.418l.33.987a.75.75 0 001.422-.474l-1.17-3.513H18a3 3 0 003-3V3.75h.75a.75.75 0 000-1.5H2.25zm6.04 16.5l.5-1.5h6.42l.5 1.5H8.29zm7.46-12a.75.75 0 00-1.5 0v6a.75.75 0 001.5 0v-6zm-3 2.25a.75.75 0 00-1.5 0v3.75a.75.75 0 001.5 0V9zm-3 2.25a.75.75 0 00-1.5 0v1.5a.75.75 0 001.5 0v-1.5z"
                                        clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <p
                                    class="block mr-auto font-sans text-base antialiased font-normal leading-relaxed text-blue-gray-900">
                                    Lead Generation
                                </p>
                                <span class="ml-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2.5" stroke="currentColor" aria-hidden="true"
                                        class="w-4 h-4 mx-auto transition-transform rotate-0">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 8.25l-7.5 7.5-7.5-7.5"></path>
                                    </svg>
                                </span>

                            </button>

                        </div>
                        <div class="overflow-hidden hidden" name="li_area" id="fees-li-area">
                            <div class="block w-full py-1  text-sm antialiased font-light leading-normal text-gray-700">
                                <nav name="nav"
                                    class="flex flex-col gap-1 p-0  text-base font-normal text-blue-gray-700">

                                    <a href="./leadGnration.php"
                                        class="flex items-center w-full p-2 text-sm text-gray-700 leading-tight transition-all rounded-lg outline-none text-start hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                                        <div class="grid mr-4 place-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="3" stroke="currentColor" aria-hidden="true"
                                                class="w-5 h-3">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                            </svg>
                                        </div>
                                        Lead Creation Form
                                    </a>

                                    <a href="./leadGnrationSearch.php"
                                        class="flex items-center w-full text-sm p-2 leading-tight text-gray-700 transition-all rounded-lg outline-none text-start hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                                        <div class="grid mr-4 place-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="3" stroke="currentColor" aria-hidden="true"
                                                class="w-5 h-3">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                            </svg>
                                        </div>
                                        Lead Search Form
                                    </a>


                                    <a href="./leadReport.php"
                                        class="flex items-center w-full p-2 text-sm leading-tight text-gray-700 transition-all rounded-lg outline-none text-start hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                                        <div class="grid mr-4 place-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="3" stroke="currentColor" aria-hidden="true"
                                                class="w-5 h-3">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                            </svg>
                                        </div>
                                        Lead Report
                                    </a>

                                </nav>
                            </div>
                        </div>
                    </div>

                    <div class="relative block w-full mt-1">
                        <div role="button"
                            class="flex items-center w-full p-0 leading-tight transition-all rounded-lg outline-none bg-blue-gray-50/50 text-start text-blue-gray-700 hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                            <button type="button" name="head_cat_btn"
                                class="flex items-center justify-between w-full p-2  text-xl antialiased font-base leading-snug text-left transition-colors border-b-0 select-none border-b-blue-gray-100 text-blue-gray-900 hover:text-blue-gray-900">
                                <div class="grid mr-4 place-items-center text-lg pt-1 pl-1">
                                    <i class="fa-solid fa-user-gear"></i>
                                    <path fill-rule="evenodd"
                                        d="M2.25 2.25a.75.75 0 000 1.5H3v10.5a3 3 0 003 3h1.21l-1.172 3.513a.75.75 0 001.424.474l.329-.987h8.418l.33.987a.75.75 0 001.422-.474l-1.17-3.513H18a3 3 0 003-3V3.75h.75a.75.75 0 000-1.5H2.25zm6.04 16.5l.5-1.5h6.42l.5 1.5H8.29zm7.46-12a.75.75 0 00-1.5 0v6a.75.75 0 001.5 0v-6zm-3 2.25a.75.75 0 00-1.5 0v3.75a.75.75 0 001.5 0V9zm-3 2.25a.75.75 0 00-1.5 0v1.5a.75.75 0 001.5 0v-1.5z"
                                        clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <p
                                    class="block mr-auto font-sans text-base antialiased font-normal leading-relaxed text-blue-gray-900">
                                    Employee Form
                                </p>
                                <span class="ml-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2.5" stroke="currentColor" aria-hidden="true"
                                        class="w-4 h-4 mx-auto transition-transform rotate-0">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 8.25l-7.5 7.5-7.5-7.5"></path>
                                    </svg>
                                </span>

                            </button>

                        </div>
                        <div class="overflow-hidden hidden" name="li_area" id="fees-li-area">
                            <div class="block w-full py-1  text-sm antialiased font-light leading-normal text-gray-700">
                                <nav name="nav"
                                    class="flex flex-col gap-1 p-0  text-base font-normal text-blue-gray-700">

                                    <a href="./createEmployee.php"
                                        class="flex items-center w-full p-2 text-sm text-gray-700 leading-tight transition-all rounded-lg outline-none text-start hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                                        <div class="grid mr-4 place-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="3" stroke="currentColor" aria-hidden="true"
                                                class="w-5 h-3">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                            </svg>
                                        </div>
                                        Employee Creation Form
                                    </a>

                                    <a href="./searchEmployee.php"
                                        class="flex items-center w-full text-sm p-2 leading-tight text-gray-700 transition-all rounded-lg outline-none text-start hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                                        <div class="grid mr-4 place-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="3" stroke="currentColor" aria-hidden="true"
                                                class="w-5 h-3">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                            </svg>
                                        </div>
                                        Employee Search Form
                                    </a>


                                    <a href="./createEmployeeReport.php"
                                        class="flex items-center w-full p-2 text-sm leading-tight text-gray-700 transition-all rounded-lg outline-none text-start hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                                        <div class="grid mr-4 place-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="3" stroke="currentColor" aria-hidden="true"
                                                class="w-5 h-3">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                            </svg>
                                        </div>
                                        Employee Report
                                    </a>

                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="relative block w-full mt-1">
                        <div role="button"
                            class="flex items-center w-full p-0 leading-tight transition-all rounded-lg outline-none bg-blue-gray-50/50 text-start text-blue-gray-700 hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                            <button type="button" name="head_cat_btn"
                                class="flex items-center justify-between w-full p-2  text-xl antialiased font-base leading-snug text-left transition-colors border-b-0 select-none border-b-blue-gray-100 text-blue-gray-900 hover:text-blue-gray-900">
                                <div class="grid mr-4 place-items-center text-lg pt-1 pl-1">
                                    <i class="fa-solid fa-torii-gate"></i>
                                    <path fill-rule="evenodd"
                                        d="M2.25 2.25a.75.75 0 000 1.5H3v10.5a3 3 0 003 3h1.21l-1.172 3.513a.75.75 0 001.424.474l.329-.987h8.418l.33.987a.75.75 0 001.422-.474l-1.17-3.513H18a3 3 0 003-3V3.75h.75a.75.75 0 000-1.5H2.25zm6.04 16.5l.5-1.5h6.42l.5 1.5H8.29zm7.46-12a.75.75 0 00-1.5 0v6a.75.75 0 001.5 0v-6zm-3 2.25a.75.75 0 00-1.5 0v3.75a.75.75 0 001.5 0V9zm-3 2.25a.75.75 0 00-1.5 0v1.5a.75.75 0 001.5 0v-1.5z"
                                        clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <p
                                    class="block mr-auto font-sans text-base antialiased font-normal leading-relaxed text-blue-gray-900">
                                    Gate Entry Form
                                </p>
                                <span class="ml-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2.5" stroke="currentColor" aria-hidden="true"
                                        class="w-4 h-4 mx-auto transition-transform rotate-0">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 8.25l-7.5 7.5-7.5-7.5"></path>
                                    </svg>
                                </span>

                            </button>

                        </div>
                        <div class="overflow-hidden hidden" name="li_area" id="fees-li-area">
                            <div class="block w-full py-1  text-sm antialiased font-light leading-normal text-gray-700">
                                <nav name="nav"
                                    class="flex flex-col gap-1 p-0  text-base font-normal text-blue-gray-700">

                                    <a href="./gateEnteryForm.php"
                                        class="flex items-center w-full p-2 text-sm text-gray-700 leading-tight transition-all rounded-lg outline-none text-start hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                                        <div class="grid mr-4 place-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="3" stroke="currentColor" aria-hidden="true"
                                                class="w-5 h-3">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                            </svg>
                                        </div>
                                        Gate Entry Creation Form
                                    </a>

                                    <a href="./gateEntrySearchForm.php"
                                        class="flex items-center w-full text-sm p-2 leading-tight text-gray-700 transition-all rounded-lg outline-none text-start hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                                        <div class="grid mr-4 place-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="3" stroke="currentColor" aria-hidden="true"
                                                class="w-5 h-3">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                            </svg>
                                        </div>
                                        Gate Entry Search Form
                                    </a>


                                    <a href="./gate_entery_report_form.php"
                                        class="flex items-center w-full p-2 text-sm leading-tight text-gray-700 transition-all rounded-lg outline-none text-start hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                                        <div class="grid mr-4 place-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="3" stroke="currentColor" aria-hidden="true"
                                                class="w-5 h-3">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                            </svg>
                                        </div>
                                        Gate Entry Report
                                    </a>

                                </nav>
                            </div>
                        </div>
                    </div>

                    <div class="relative block w-full mt-1">
                        <div role="button"
                            class="flex items-center w-full p-0 leading-tight transition-all rounded-lg outline-none bg-blue-gray-50/50 text-start text-blue-gray-700 hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                            <button type="button" name="head_cat_btn"
                                class="flex items-center justify-between w-full p-2  text-xl antialiased font-base leading-snug text-left transition-colors border-b-0 select-none border-b-blue-gray-100 text-blue-gray-900 hover:text-blue-gray-900">
                                <div class="grid mr-4 place-items-center text-lg pt-1 pl-1">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                    <path fill-rule="evenodd"
                                        d="M2.25 2.25a.75.75 0 000 1.5H3v10.5a3 3 0 003 3h1.21l-1.172 3.513a.75.75 0 001.424.474l.329-.987h8.418l.33.987a.75.75 0 001.422-.474l-1.17-3.513H18a3 3 0 003-3V3.75h.75a.75.75 0 000-1.5H2.25zm6.04 16.5l.5-1.5h6.42l.5 1.5H8.29zm7.46-12a.75.75 0 00-1.5 0v6a.75.75 0 001.5 0v-6zm-3 2.25a.75.75 0 00-1.5 0v3.75a.75.75 0 001.5 0V9zm-3 2.25a.75.75 0 00-1.5 0v1.5a.75.75 0 001.5 0v-1.5z"
                                        clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <p
                                    class="block mr-auto font-sans text-base antialiased font-normal leading-relaxed text-blue-gray-900">
                                    Sales Order Form
                                </p>
                                <span class="ml-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2.5" stroke="currentColor" aria-hidden="true"
                                        class="w-4 h-4 mx-auto transition-transform rotate-0">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 8.25l-7.5 7.5-7.5-7.5"></path>
                                    </svg>
                                </span>

                            </button>

                        </div>
                        <div class="overflow-hidden hidden" name="li_area" id="fees-li-area">
                            <div class="block w-full py-1  text-sm antialiased font-light leading-normal text-gray-700">
                                <nav name="nav"
                                    class="flex flex-col gap-1 p-0  text-base font-normal text-blue-gray-700">

                                    <a href="#"
                                        class="flex items-center w-full p-2 text-sm text-gray-700 leading-tight transition-all rounded-lg outline-none text-start hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                                        <div class="grid mr-4 place-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="3" stroke="currentColor" aria-hidden="true"
                                                class="w-5 h-3">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                            </svg>
                                        </div>
                                        Sales Order Creation Form
                                    </a>

                                    <a href="#"
                                        class="flex items-center w-full text-sm p-2 leading-tight text-gray-700 transition-all rounded-lg outline-none text-start hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                                        <div class="grid mr-4 place-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="3" stroke="currentColor" aria-hidden="true"
                                                class="w-5 h-3">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                            </svg>
                                        </div>
                                        Sales Order Search Form
                                    </a>


                                    <a href="./sale_order_report.php"
                                        class="flex items-center w-full p-2 text-sm leading-tight text-gray-700 transition-all rounded-lg outline-none text-start hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                                        <div class="grid mr-4 place-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="3" stroke="currentColor" aria-hidden="true"
                                                class="w-5 h-3">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                            </svg>
                                        </div>
                                        Sales Order Report
                                    </a>

                                </nav>
                            </div>
                        </div>
                    </div>

                    <div class="relative block w-full mt-1">
                        <div role="button"
                            class="flex items-center w-full p-0 leading-tight transition-all rounded-lg outline-none bg-blue-gray-50/50 text-start text-blue-gray-700 hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                            <button type="button" name="head_cat_btn"
                                class="flex items-center justify-between w-full p-2  text-xl antialiased font-base leading-snug text-left transition-colors border-b-0 select-none border-b-blue-gray-100 text-blue-gray-900 hover:text-blue-gray-900">
                                <div class="grid mr-4 place-items-center text-lg pt-1 pl-1">
                                    <i class="fa-solid fa-money-bill"></i>
                                    <path fill-rule="evenodd"
                                        d="M2.25 2.25a.75.75 0 000 1.5H3v10.5a3 3 0 003 3h1.21l-1.172 3.513a.75.75 0 001.424.474l.329-.987h8.418l.33.987a.75.75 0 001.422-.474l-1.17-3.513H18a3 3 0 003-3V3.75h.75a.75.75 0 000-1.5H2.25zm6.04 16.5l.5-1.5h6.42l.5 1.5H8.29zm7.46-12a.75.75 0 00-1.5 0v6a.75.75 0 001.5 0v-6zm-3 2.25a.75.75 0 00-1.5 0v3.75a.75.75 0 001.5 0V9zm-3 2.25a.75.75 0 00-1.5 0v1.5a.75.75 0 001.5 0v-1.5z"
                                        clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <p
                                    class="block mr-auto font-sans text-base antialiased font-normal leading-relaxed text-blue-gray-900">
                                    GRN Form
                                </p>
                                <span class="ml-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2.5" stroke="currentColor" aria-hidden="true"
                                        class="w-4 h-4 mx-auto transition-transform rotate-0">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 8.25l-7.5 7.5-7.5-7.5"></path>
                                    </svg>
                                </span>

                            </button>

                        </div>
                        <div class="overflow-hidden hidden" name="li_area" id="fees-li-area">
                            <div class="block w-full py-1  text-sm antialiased font-light leading-normal text-gray-700">
                                <nav name="nav"
                                    class="flex flex-col gap-1 p-0  text-base font-normal text-blue-gray-700">

                                    <a href="./GRN/index.php"
                                        class="flex items-center w-full p-2 text-sm text-gray-700 leading-tight transition-all rounded-lg outline-none text-start hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                                        <div class="grid mr-4 place-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="3" stroke="currentColor" aria-hidden="true"
                                                class="w-5 h-3">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                            </svg>
                                        </div>
                                        GRN Creation Form
                                    </a>

                                    <a href="#"
                                        class="flex items-center w-full text-sm p-2 leading-tight text-gray-700 transition-all rounded-lg outline-none text-start hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                                        <div class="grid mr-4 place-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="3" stroke="currentColor" aria-hidden="true"
                                                class="w-5 h-3">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                            </svg>
                                        </div>
                                        GRN Search Form
                                    </a>


                                    <a href="#" 
                                        class="flex items-center w-full p-2 text-sm leading-tight text-gray-700 transition-all rounded-lg outline-none text-start hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                                        <div class="grid mr-4 place-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="3" stroke="currentColor" aria-hidden="true"
                                                class="w-5 h-3">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                            </svg>
                                        </div>
                                        GRN Report
                                    </a>

                                </nav>
                            </div>
                        </div>
                    </div>

                    <div class="relative block w-full mt-1">
                        <div role="button"
                            class="flex items-center w-full p-0 leading-tight transition-all rounded-lg outline-none bg-blue-gray-50/50 text-start text-blue-gray-700 hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                            <button type="button" name="head_cat_btn"
                                class="flex items-center justify-between w-full p-2  text-xl antialiased font-base leading-snug text-left transition-colors border-b-0 select-none border-b-blue-gray-100 text-blue-gray-900 hover:text-blue-gray-900">
                                <div class="grid mr-4 place-items-center text-lg pt-1 pl-1">
                                    <i class="fa-solid fa-door-open"></i>
                                    <path fill-rule="evenodd"
                                        d="M2.25 2.25a.75.75 0 000 1.5H3v10.5a3 3 0 003 3h1.21l-1.172 3.513a.75.75 0 001.424.474l.329-.987h8.418l.33.987a.75.75 0 001.422-.474l-1.17-3.513H18a3 3 0 003-3V3.75h.75a.75.75 0 000-1.5H2.25zm6.04 16.5l.5-1.5h6.42l.5 1.5H8.29zm7.46-12a.75.75 0 00-1.5 0v6a.75.75 0 001.5 0v-6zm-3 2.25a.75.75 0 00-1.5 0v3.75a.75.75 0 001.5 0V9zm-3 2.25a.75.75 0 00-1.5 0v1.5a.75.75 0 001.5 0v-1.5z"
                                        clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <p
                                    class="block mr-auto font-sans text-base antialiased font-normal leading-relaxed text-blue-gray-900">
                                    Gate Exit Form
                                </p>
                                <span class="ml-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2.5" stroke="currentColor" aria-hidden="true"
                                        class="w-4 h-4 mx-auto transition-transform rotate-0">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 8.25l-7.5 7.5-7.5-7.5"></path>
                                    </svg>
                                </span>

                            </button>

                        </div>
                        <div class="overflow-hidden hidden" name="li_area" id="fees-li-area">
                            <div class="block w-full py-1  text-sm antialiased font-light leading-normal text-gray-700">
                                <nav name="nav"
                                    class="flex flex-col gap-1 p-0  text-base font-normal text-blue-gray-700">

                                    <a href="./GateExitCreateForm.php"
                                        class="flex items-center w-full p-2 text-sm text-gray-700 leading-tight transition-all rounded-lg outline-none text-start hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                                        <div class="grid mr-4 place-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="3" stroke="currentColor" aria-hidden="true"
                                                class="w-5 h-3">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                            </svg>
                                        </div>
                                        Gate Exit Creation Form
                                    </a>

                                    <a href="./gateExitSearchForm.php"
                                        class="flex items-center w-full text-sm p-2 leading-tight text-gray-700 transition-all rounded-lg outline-none text-start hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                                        <div class="grid mr-4 place-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="3" stroke="currentColor" aria-hidden="true"
                                                class="w-5 h-3">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                            </svg>
                                        </div>
                                        Gate Exit Search Form
                                    </a>


                                    <a href="./gate_exit_report_form.php"
                                        class="flex items-center w-full p-2 text-sm leading-tight text-gray-700 transition-all rounded-lg outline-none text-start hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                                        <div class="grid mr-4 place-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="3" stroke="currentColor" aria-hidden="true"
                                                class="w-5 h-3">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                            </svg>
                                        </div>
                                        Gate Exit Report
                                    </a>

                                </nav>
                            </div>
                        </div>
                    </div>


                    <div class="relative block w-full mt-1">
                        <div role="button"
                            class="flex items-center w-full p-0 leading-tight transition-all rounded-lg outline-none bg-blue-gray-50/50 text-start text-blue-gray-700 hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                            <button type="button" name="head_cat_btn"
                                class="flex items-center justify-between w-full p-2  text-xl antialiased font-base leading-snug text-left transition-colors border-b-0 select-none border-b-blue-gray-100 text-blue-gray-900 hover:text-blue-gray-900">
                                <div class="grid mr-4 place-items-center text-lg pl-1">
                                    <i class="fa-solid fa-gear"></i>
                                    <path fill-rule="evenodd"
                                        d="M2.25 2.25a.75.75 0 000 1.5H3v10.5a3 3 0 003 3h1.21l-1.172 3.513a.75.75 0 001.424.474l.329-.987h8.418l.33.987a.75.75 0 001.422-.474l-1.17-3.513H18a3 3 0 003-3V3.75h.75a.75.75 0 000-1.5H2.25zm6.04 16.5l.5-1.5h6.42l.5 1.5H8.29zm7.46-12a.75.75 0 00-1.5 0v6a.75.75 0 001.5 0v-6zm-3 2.25a.75.75 0 00-1.5 0v3.75a.75.75 0 001.5 0V9zm-3 2.25a.75.75 0 00-1.5 0v1.5a.75.75 0 001.5 0v-1.5z"
                                        clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <p
                                    class="block mr-auto font-sans text-base antialiased font-normal leading-relaxed text-blue-gray-900">
                                    Setup
                                </p>
                                <span class="ml-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2.5" stroke="currentColor" aria-hidden="true"
                                        class="w-4 h-4 mx-auto transition-transform rotate-0">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 8.25l-7.5 7.5-7.5-7.5"></path>
                                    </svg>
                                </span>

                            </button>

                        </div>
                        <div class="overflow-hidden hidden" name="li_area" id="fees-li-area">
                            <div class="block w-full py-1  text-sm antialiased font-light leading-normal text-gray-700">
                                <nav name="nav"
                                    class="flex flex-col gap-1 p-0  text-base font-normal text-blue-gray-700">

                                    <a href="./categoryManagement.php"
                                        class="flex items-center w-full p-2 text-sm text-gray-700  leading-tight transition-all rounded-lg outline-none text-start hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                                        <div class="grid mr-4 place-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="3" stroke="currentColor" aria-hidden="true"
                                                class="w-5 h-3">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                            </svg>
                                        </div>
                                        Category Management
                                    </a>

                                    <a href="./itemCategoryReports.php"
                                        class="flex items-center w-full p-2 text-gray-700 text-sm leading-tight transition-all rounded-lg outline-none text-start hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                                        <div class="grid mr-4 place-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="3" stroke="currentColor" aria-hidden="true"
                                                class="w-5 h-3">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                            </svg>
                                        </div>
                                        Category Management Report
                                    </a>




                                    <a href="./addAttribute.php"
                                        class="flex items-center w-full p-2 text-gray-700 text-sm leading-tight transition-all rounded-lg outline-none text-start hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                                        <div class="grid mr-4 place-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="3" stroke="currentColor" aria-hidden="true"
                                                class="w-5 h-3">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                            </svg>
                                        </div>
                                        Add Txn Attribute - Main and Sub Head
                                    </a>

                                    <a href="./addEmpAttribute.php"
                                        class="flex items-center w-full p-2 text-gray-700 text-sm leading-tight transition-all rounded-lg outline-none text-start hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                                        <div class="grid mr-4 place-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="3" stroke="currentColor" aria-hidden="true"
                                                class="w-5 h-3">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                            </svg>
                                        </div>
                                        Add Employee Department and Job Roles
                                    </a>



                                </nav>
                            </div>
                        </div>
                    </div>
                </nav>
            </aside>

            <!-- Main Content -->
            <div class="flex-1 flex flex-col">
                <!-- Navbar -->


                <!-- Content Area -->
                <main class="flex-1 p-6 bg-gray-100">
                    <h3 class="text-lg text-2xl font-medium mb-4 text-center border-b border-gray-600 pb-2">Management
                        Dashboard</h3>
                    <div class="forPieCHart w-full flex mx-auto flex-wrap " style="">


                        <!-- <h1 class="w-full shadow-md mb-2  h-10 text-xl font-medium text-center ">Management Dashboard -->
                        </h1>



                        <div class="h-full w-full  flex mx-auto  justify-around flex-wrap ">
                            <div class="mb-10">

                                <a href="./query_report.php">
                                    <div class="datachart bg-gray-100 " id="Lead_status_box"></div>
                                </a>
                            </div>

                            <!-- <div>

                                <a href="./purchaseorder.php">
                                    <div class="datachart bg-gray-100 " style="width:26rem; height:17rem"
                                        id="purchase_order"></div>
                                </a>
                            </div> -->

                            <div>

                                <a href="./mangerApprove.php">
                                    <div class="datachart bg-gray-100 " id="item_requests"></div>
                                </a>
                            </div>


                            <div class="mb-10">

                                <!-- <a href="./requisition.php">
                                    <div class="datachart bg-gray-100 "
                                        id="pr_requests">
                                    </div>
                                </a> -->

                                <a href="./createEmployeeReport.php">
                                    <div class="datachart bg-gray-100 " style="width:26rem; height:17rem"
                                        id="empStatus">
                                    </div>
                                </a>
                            </div>




                            <div>


                                <!-- <a href="./grnReport.php">
                                    <div class="datachart bg-gray-100 "
                                        id="GRN_status">
                                    </div>
                                </a> -->
                            </div>

                            <!-- <div class="datachart bg-gray-100 " style="width:26rem; height:17rem" id="daily_txn_book"></div> -->






                            <!-- <a href="./grnReport.php">
<div class="datachart bg-gray-100 " style="width:26rem; height:17rem" id="testChart"></div>
</a> -->
                            <!-- <div class="datachart" style="width:26rem; height:17rem" id="Sales_order"></div>
<div class="datachart" style="width:26rem; height:17rem" id="GRN"></div>
<div class="datachart" style="width:26rem; height:17rem" id="po_tatreport"></div> -->
                        </div>



                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-1 gap-4 mt-32">
                        <div class="flex flex-wrap bg-white p-4 rounded shadow">
                            <?php include("./pieChart.php") ?>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-1 lg:grid-cols-1 gap-4 mt-5">
                        <div class="bg-white gap-y-10 p-4 rounded shadow">
                            <?php include("./barChart.php") ?>
                        </div>
                    </div>
                </main>
            </div>
        </div>





        <!-- 
            <div class="w-full flex border border-gray-700" style=" ">
                <div class="w-1/4  custom-main-dash">

                    <div style=" background-color: #FF9874; min-height:100vh;"
                        class="p-4 whitespace-nowrap 	mx-3 flex flex-col rounded">


                        <h1 class="font-base text-2xl border-b-2 text-center uppercase"> Forms </h1>

                        <div>
                            <button type="button"
                                class="text-gray-700 w-full mt-3 bg-white flex justify-between focus:outline-none font-medium rounded-t-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                aria-controls="dropdown-example1" data-collapse-toggle="dropdown-example1">
                                <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">User Form</span>
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </button>
                            <ul id="dropdown-example1" class="hidden py-2 space-y-2 bg-gray-100 w-full rounded-b-lg">
                                <li>
                                    <a href="./User/create_User.php"
                                        class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-5 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">User
                                        Creation Form </a>
                                </li>
                                <li>
                                    <a href="./User/search_User.php"
                                        class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-5 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">User
                                        Search Report</a>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <button type="button"
                                class="text-gray-700 w-full mt-3 bg-white flex justify-between focus:outline-none font-medium rounded-t-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                aria-controls="dropdown-example2" data-collapse-toggle="dropdown-example2">
                                <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Membership Form</span>
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </button>
                            <ul id="dropdown-example2" class="hidden py-2 space-y-2 bg-gray-100 w-full rounded-b-lg">
                                <li>
                                    <a href="./membership/create_Membership.php"
                                        class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-5 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Membership
                                        Creation Form </a>
                                </li>
                                <li>
                                    <a href="./membership/search_Membership.php"
                                        class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-5 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Membership
                                        Search Report</a>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <button type="button"
                                class="text-gray-700 w-full mt-3 bg-white flex justify-between focus:outline-none font-medium rounded-t-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                aria-controls="dropdown-example3" data-collapse-toggle="dropdown-example3">
                                <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Membership Receipt
                                </span>
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </button>
                            <ul id="dropdown-example3" class="hidden py-2 space-y-2 bg-gray-100 w-full rounded-b-lg">
                                <li>
                                    <a href="./Receipt/create_Receipt.php"
                                        class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-5 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Receipt
                                        Creation Form </a>
                                </li>
                                <li>
                                    <a href="./Receipt/search_Receipt.php"
                                        class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-5 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Receipt
                                        Search Report</a>
                                </li>
                            </ul>
                        </div>
                        <div>

                            <button type="button"
                                class="text-gray-700 w-full mt-3 bg-white flex justify-between focus:outline-none font-medium rounded-t-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                aria-controls="dropdown-example4" data-collapse-toggle="dropdown-example4">
                                <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Define fees
                                </span>
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </button>
                            <ul id="dropdown-example4" class="hidden py-2 space-y-2 bg-gray-100 w-full rounded-b-lg">
                                <li>
                                    <a href="./search_year_table.php"
                                        class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-5 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                                        Search Year Table </a>
                                </li>
                                <li>
                                    <a href="./year_table.php"
                                        class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-5 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Year
                                        fees creation</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>

                <div class="w-3/4 border border-gray-700">
                    <div id="divId"></div>
                    <div class="datachart bg-gray-100 " style="width:26rem; height:17rem" id="receipt_details"></div>
                </div>
            </div> -->
    </div>

</body>

<!-- <script src="./js/pieLoad.js"></script> -->
<!-- <script src="node_modules/@material-tailwind/html@latest/scripts/ripple.js"></script> -->

<script src="https://unpkg.com/@material-tailwind/html@latest/scripts/ripple.js"></script>

<script src="./js/dashboard.js"></script>

<script>
    $("button[name='head_cat_btn']").click(function () {
        let main_div = $(this).closest("div").parent("div");
        let li_area = main_div.find("div[name='li_area']");
        let allOpens = document.querySelectorAll("div[name='li_area']");

        console.log(allOpens);

        allOpens.forEach(element => {
            if (li_area[0] !== element) { // Compare with the DOM element
                $(element).slideUp();
            }
        });

        $(li_area).slideToggle();

        console.log(li_area);
    });
</script>


<script src="./js/pieLoad.js"></script>

</html>