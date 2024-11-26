
<?php
    include("./navForLogged.php");


    include('./dbconnection/db.php');
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.4/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    <title>Document</title>
</head>    


        <style>
        /* From Uiverse.io by Admin12121 */ 
.loader {
  --duration: 3s;
  --primary: rgba(39, 94, 254, 1);
  --primary-light: #2f71ff;
  --primary-rgba: rgba(39, 94, 254, 0);
  width: 200px;
  height: 320px;
  position: relative;
  transform-style: preserve-3d;
}

@media (max-width: 480px) {
  .loader {
    zoom: 0.44;
  }
}

.loader:before, .loader:after {
  --r: 20.5deg;
  content: "";
  width: 320px;
  height: 140px;
  position: absolute;
  right: 32%;
  bottom: -11px;
/* change the back groung color on switching from light to dark mood */
  background: #e8e8e8;
  transform: translateZ(200px) rotate(var(--r));
  -webkit-animation: mask var(--duration) linear forwards infinite;
  animation: mask var(--duration) linear forwards infinite;
}

.loader:after {
  --r: -20.5deg;
  right: auto;
  left: 32%;
}

.loader .ground {
  position: absolute;
  left: -50px;
  bottom: -120px;
  transform-style: preserve-3d;
  transform: rotateY(-47deg) rotateX(-15deg) rotateZ(15deg) scale(1);
}

.loader .ground div {
  transform: rotateX(90deg) rotateY(0deg) translate(-48px, -120px) translateZ(100px) scale(0);
  width: 200px;
  height: 200px;
  background: var(--primary);
  background: linear-gradient(45deg, var(--primary) 0%, var(--primary) 50%, var(--primary-light) 50%, var(--primary-light) 100%);
  transform-style: preserve-3d;
  -webkit-animation: ground var(--duration) linear forwards infinite;
  animation: ground var(--duration) linear forwards infinite;
}

.loader .ground div:before, .loader .ground div:after {
  --rx: 90deg;
  --ry: 0deg;
  --x: 44px;
  --y: 162px;
  --z: -50px;
  content: "";
  width: 156px;
  height: 300px;
  opacity: 0;
  background: linear-gradient(var(--primary), var(--primary-rgba));
  position: absolute;
  transform: rotateX(var(--rx)) rotateY(var(--ry)) translate(var(--x), var(--y)) translateZ(var(--z));
  -webkit-animation: ground-shine var(--duration) linear forwards infinite;
  animation: ground-shine var(--duration) linear forwards infinite;
}

.loader .ground div:after {
  --rx: 90deg;
  --ry: 90deg;
  --x: 0;
  --y: 177px;
  --z: 150px;
}

.loader .box {
  --x: 0;
  --y: 0;
  position: absolute;
  -webkit-animation: var(--duration) linear forwards infinite;
  animation: var(--duration) linear forwards infinite;
  transform: translate(var(--x), var(--y));
}

.loader .box div {
  background-color: var(--primary);
  width: 48px;
  height: 48px;
  position: relative;
  transform-style: preserve-3d;
  -webkit-animation: var(--duration) ease forwards infinite;
  animation: var(--duration) ease forwards infinite;
  transform: rotateY(-47deg) rotateX(-15deg) rotateZ(15deg) scale(0);
}

.loader .box div:before, .loader .box div:after {
  --rx: 90deg;
  --ry: 0deg;
  --z: 24px;
  --y: -24px;
  --x: 0;
  content: "";
  position: absolute;
  background-color: inherit;
  width: inherit;
  height: inherit;
  transform: rotateX(var(--rx)) rotateY(var(--ry)) translate(var(--x), var(--y)) translateZ(var(--z));
  filter: brightness(var(--b, 1.2));
}

.loader .box div:after {
  --rx: 0deg;
  --ry: 90deg;
  --x: 24px;
  --y: 0;
  --b: 1.4;
}

.loader .box.box0 {
  --x: -220px;
  --y: -120px;
  left: 58px;
  top: 108px;
}

.loader .box.box1 {
  --x: -260px;
  --y: 120px;
  left: 25px;
  top: 120px;
}

.loader .box.box2 {
  --x: 120px;
  --y: -190px;
  left: 58px;
  top: 64px;
}

.loader .box.box3 {
  --x: 280px;
  --y: -40px;
  left: 91px;
  top: 120px;
}

.loader .box.box4 {
  --x: 60px;
  --y: 200px;
  left: 58px;
  top: 132px;
}

.loader .box.box5 {
  --x: -220px;
  --y: -120px;
  left: 25px;
  top: 76px;
}

.loader .box.box6 {
  --x: -260px;
  --y: 120px;
  left: 91px;
  top: 76px;
}

.loader .box.box7 {
  --x: -240px;
  --y: 200px;
  left: 58px;
  top: 87px;
}

.loader .box0 {
  -webkit-animation-name: box-move0;
  animation-name: box-move0;
}

.loader .box0 div {
  -webkit-animation-name: box-scale0;
  animation-name: box-scale0;
}

.loader .box1 {
  -webkit-animation-name: box-move1;
  animation-name: box-move1;
}

.loader .box1 div {
  -webkit-animation-name: box-scale1;
  animation-name: box-scale1;
}

.loader .box2 {
  -webkit-animation-name: box-move2;
  animation-name: box-move2;
}

.loader .box2 div {
  -webkit-animation-name: box-scale2;
  animation-name: box-scale2;
}

.loader .box3 {
  -webkit-animation-name: box-move3;
  animation-name: box-move3;
}

.loader .box3 div {
  -webkit-animation-name: box-scale3;
  animation-name: box-scale3;
}

.loader .box4 {
  -webkit-animation-name: box-move4;
  animation-name: box-move4;
}

.loader .box4 div {
  -webkit-animation-name: box-scale4;
  animation-name: box-scale4;
}

.loader .box5 {
  -webkit-animation-name: box-move5;
  animation-name: box-move5;
}

.loader .box5 div {
  -webkit-animation-name: box-scale5;
  animation-name: box-scale5;
}

.loader .box6 {
  -webkit-animation-name: box-move6;
  animation-name: box-move6;
}

.loader .box6 div {
  -webkit-animation-name: box-scale6;
  animation-name: box-scale6;
}

.loader .box7 {
  -webkit-animation-name: box-move7;
  animation-name: box-move7;
}

.loader .box7 div {
  -webkit-animation-name: box-scale7;
  animation-name: box-scale7;
}

@-webkit-keyframes box-move0 {
  12% {
    transform: translate(var(--x), var(--y));
  }

  25%, 52% {
    transform: translate(0, 0);
  }

  80% {
    transform: translate(0, -32px);
  }

  90%, 100% {
    transform: translate(0, 188px);
  }
}

@keyframes box-move0 {
  12% {
    transform: translate(var(--x), var(--y));
  }

  25%, 52% {
    transform: translate(0, 0);
  }

  80% {
    transform: translate(0, -32px);
  }

  90%, 100% {
    transform: translate(0, 188px);
  }
}

@-webkit-keyframes box-scale0 {
  6% {
    transform: rotateY(-47deg) rotateX(-15deg) rotateZ(15deg) scale(0);
  }

  14%, 100% {
    transform: rotateY(-47deg) rotateX(-15deg) rotateZ(15deg) scale(1);
  }
}

@keyframes box-scale0 {
  6% {
    transform: rotateY(-47deg) rotateX(-15deg) rotateZ(15deg) scale(0);
  }

  14%, 100% {
    transform: rotateY(-47deg) rotateX(-15deg) rotateZ(15deg) scale(1);
  }
}

@-webkit-keyframes box-move1 {
  16% {
    transform: translate(var(--x), var(--y));
  }

  29%, 52% {
    transform: translate(0, 0);
  }

  80% {
    transform: translate(0, -32px);
  }

  90%, 100% {
    transform: translate(0, 188px);
  }
}

@keyframes box-move1 {
  16% {
    transform: translate(var(--x), var(--y));
  }

  29%, 52% {
    transform: translate(0, 0);
  }

  80% {
    transform: translate(0, -32px);
  }

  90%, 100% {
    transform: translate(0, 188px);
  }
}

@-webkit-keyframes box-scale1 {
  10% {
    transform: rotateY(-47deg) rotateX(-15deg) rotateZ(15deg) scale(0);
  }

  18%, 100% {
    transform: rotateY(-47deg) rotateX(-15deg) rotateZ(15deg) scale(1);
  }
}

@keyframes box-scale1 {
  10% {
    transform: rotateY(-47deg) rotateX(-15deg) rotateZ(15deg) scale(0);
  }

  18%, 100% {
    transform: rotateY(-47deg) rotateX(-15deg) rotateZ(15deg) scale(1);
  }
}

@-webkit-keyframes box-move2 {
  20% {
    transform: translate(var(--x), var(--y));
  }

  33%, 52% {
    transform: translate(0, 0);
  }

  80% {
    transform: translate(0, -32px);
  }

  90%, 100% {
    transform: translate(0, 188px);
  }
}

@keyframes box-move2 {
  20% {
    transform: translate(var(--x), var(--y));
  }

  33%, 52% {
    transform: translate(0, 0);
  }

  80% {
    transform: translate(0, -32px);
  }

  90%, 100% {
    transform: translate(0, 188px);
  }
}

@-webkit-keyframes box-scale2 {
  14% {
    transform: rotateY(-47deg) rotateX(-15deg) rotateZ(15deg) scale(0);
  }

  22%, 100% {
    transform: rotateY(-47deg) rotateX(-15deg) rotateZ(15deg) scale(1);
  }
}

@keyframes box-scale2 {
  14% {
    transform: rotateY(-47deg) rotateX(-15deg) rotateZ(15deg) scale(0);
  }

  22%, 100% {
    transform: rotateY(-47deg) rotateX(-15deg) rotateZ(15deg) scale(1);
  }
}

@-webkit-keyframes box-move3 {
  24% {
    transform: translate(var(--x), var(--y));
  }

  37%, 52% {
    transform: translate(0, 0);
  }

  80% {
    transform: translate(0, -32px);
  }

  90%, 100% {
    transform: translate(0, 188px);
  }
}

@keyframes box-move3 {
  24% {
    transform: translate(var(--x), var(--y));
  }

  37%, 52% {
    transform: translate(0, 0);
  }

  80% {
    transform: translate(0, -32px);
  }

  90%, 100% {
    transform: translate(0, 188px);
  }
}

@-webkit-keyframes box-scale3 {
  18% {
    transform: rotateY(-47deg) rotateX(-15deg) rotateZ(15deg) scale(0);
  }

  26%, 100% {
    transform: rotateY(-47deg) rotateX(-15deg) rotateZ(15deg) scale(1);
  }
}

@keyframes box-scale3 {
  18% {
    transform: rotateY(-47deg) rotateX(-15deg) rotateZ(15deg) scale(0);
  }

  26%, 100% {
    transform: rotateY(-47deg) rotateX(-15deg) rotateZ(15deg) scale(1);
  }
}

@-webkit-keyframes box-move4 {
  28% {
    transform: translate(var(--x), var(--y));
  }

  41%, 52% {
    transform: translate(0, 0);
  }

  80% {
    transform: translate(0, -32px);
  }

  90%, 100% {
    transform: translate(0, 188px);
  }
}

@keyframes box-move4 {
  28% {
    transform: translate(var(--x), var(--y));
  }

  41%, 52% {
    transform: translate(0, 0);
  }

  80% {
    transform: translate(0, -32px);
  }

  90%, 100% {
    transform: translate(0, 188px);
  }
}

@-webkit-keyframes box-scale4 {
  22% {
    transform: rotateY(-47deg) rotateX(-15deg) rotateZ(15deg) scale(0);
  }

  30%, 100% {
    transform: rotateY(-47deg) rotateX(-15deg) rotateZ(15deg) scale(1);
  }
}

@keyframes box-scale4 {
  22% {
    transform: rotateY(-47deg) rotateX(-15deg) rotateZ(15deg) scale(0);
  }

  30%, 100% {
    transform: rotateY(-47deg) rotateX(-15deg) rotateZ(15deg) scale(1);
  }
}

@-webkit-keyframes box-move5 {
  32% {
    transform: translate(var(--x), var(--y));
  }

  45%, 52% {
    transform: translate(0, 0);
  }

  80% {
    transform: translate(0, -32px);
  }

  90%, 100% {
    transform: translate(0, 188px);
  }
}

@keyframes box-move5 {
  32% {
    transform: translate(var(--x), var(--y));
  }

  45%, 52% {
    transform: translate(0, 0);
  }

  80% {
    transform: translate(0, -32px);
  }

  90%, 100% {
    transform: translate(0, 188px);
  }
}

@-webkit-keyframes box-scale5 {
  26% {
    transform: rotateY(-47deg) rotateX(-15deg) rotateZ(15deg) scale(0);
  }

  34%, 100% {
    transform: rotateY(-47deg) rotateX(-15deg) rotateZ(15deg) scale(1);
  }
}

@keyframes box-scale5 {
  26% {
    transform: rotateY(-47deg) rotateX(-15deg) rotateZ(15deg) scale(0);
  }

  34%, 100% {
    transform: rotateY(-47deg) rotateX(-15deg) rotateZ(15deg) scale(1);
  }
}

@-webkit-keyframes box-move6 {
  36% {
    transform: translate(var(--x), var(--y));
  }

  49%, 52% {
    transform: translate(0, 0);
  }

  80% {
    transform: translate(0, -32px);
  }

  90%, 100% {
    transform: translate(0, 188px);
  }
}

@keyframes box-move6 {
  36% {
    transform: translate(var(--x), var(--y));
  }

  49%, 52% {
    transform: translate(0, 0);
  }

  80% {
    transform: translate(0, -32px);
  }

  90%, 100% {
    transform: translate(0, 188px);
  }
}

@-webkit-keyframes box-scale6 {
  30% {
    transform: rotateY(-47deg) rotateX(-15deg) rotateZ(15deg) scale(0);
  }

  38%, 100% {
    transform: rotateY(-47deg) rotateX(-15deg) rotateZ(15deg) scale(1);
  }
}

@keyframes box-scale6 {
  30% {
    transform: rotateY(-47deg) rotateX(-15deg) rotateZ(15deg) scale(0);
  }

  38%, 100% {
    transform: rotateY(-47deg) rotateX(-15deg) rotateZ(15deg) scale(1);
  }
}

@-webkit-keyframes box-move7 {
  40% {
    transform: translate(var(--x), var(--y));
  }

  53%, 52% {
    transform: translate(0, 0);
  }

  80% {
    transform: translate(0, -32px);
  }

  90%, 100% {
    transform: translate(0, 188px);
  }
}

@keyframes box-move7 {
  40% {
    transform: translate(var(--x), var(--y));
  }

  53%, 52% {
    transform: translate(0, 0);
  }

  80% {
    transform: translate(0, -32px);
  }

  90%, 100% {
    transform: translate(0, 188px);
  }
}

@-webkit-keyframes box-scale7 {
  34% {
    transform: rotateY(-47deg) rotateX(-15deg) rotateZ(15deg) scale(0);
  }

  42%, 100% {
    transform: rotateY(-47deg) rotateX(-15deg) rotateZ(15deg) scale(1);
  }
}

@keyframes box-scale7 {
  34% {
    transform: rotateY(-47deg) rotateX(-15deg) rotateZ(15deg) scale(0);
  }

  42%, 100% {
    transform: rotateY(-47deg) rotateX(-15deg) rotateZ(15deg) scale(1);
  }
}

@-webkit-keyframes ground {
  0%, 65% {
    transform: rotateX(90deg) rotateY(0deg) translate(-48px, -120px) translateZ(100px) scale(0);
  }

  75%, 90% {
    transform: rotateX(90deg) rotateY(0deg) translate(-48px, -120px) translateZ(100px) scale(1);
  }

  100% {
    transform: rotateX(90deg) rotateY(0deg) translate(-48px, -120px) translateZ(100px) scale(0);
  }
}

@keyframes ground {
  0%, 65% {
    transform: rotateX(90deg) rotateY(0deg) translate(-48px, -120px) translateZ(100px) scale(0);
  }

  75%, 90% {
    transform: rotateX(90deg) rotateY(0deg) translate(-48px, -120px) translateZ(100px) scale(1);
  }

  100% {
    transform: rotateX(90deg) rotateY(0deg) translate(-48px, -120px) translateZ(100px) scale(0);
  }
}

@-webkit-keyframes ground-shine {
  0%, 70% {
    opacity: 0;
  }

  75%, 87% {
    opacity: 0.2;
  }

  100% {
    opacity: 0;
  }
}

@keyframes ground-shine {
  0%, 70% {
    opacity: 0;
  }

  75%, 87% {
    opacity: 0.2;
  }

  100% {
    opacity: 0;
  }
}

@-webkit-keyframes mask {
  0%, 65% {
    opacity: 0;
  }

  66%, 100% {
    opacity: 1;
  }
}

@keyframes mask {
  0%, 65% {
    opacity: 0;
  }

  66%, 100% {
    opacity: 1;
  }
}
</style>






<body>    

    








    <!-- <button >Export to CSV</button> -->

    <!-- <button  onclick="exportTableToCSV('data.csv')"        type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Default</button> -->







  



    <section class="bg-gray-50 dark:bg-gray-900  mt-6   p-3 sm:p-5">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <!-- Start coding here -->
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                    <div class="w-full md:w-1/2">
                        <form class="flex items-center">
                            <label for="simple-search" class="sr-only">Search</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input disabled type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search" required="">
                            </div>
                        </form>
                    </div>
                    <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                        <button onclick="exportTableToCSV('table.csv')" type="button" class="flex items-center justify-center  bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                            <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                            </svg>
                            Export to CSV
                        </button>
                        <div class="flex items-center space-x-3 w-full md:w-auto">
                            <!-- <button id="actionsDropdownButton" data-dropdown-toggle="actionsDropdown" class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" type="button">
                                <svg class="-ml-1 mr-1.5 w-5 h-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path clip-rule="evenodd" fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                </svg>
                                Actions
                            </button> -->
                            <div id="actionsDropdown" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="actionsDropdownButton">
                                    <li>
                                        <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Mass Edit</a>
                                    </li>
                                </ul>
                                <div class="py-1">
                                    <a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete all</a>
                                </div>
                            </div>
                            <button id="filterDropdownButton" data-dropdown-toggle="filterDropdown" class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="h-4 w-4 mr-2 text-gray-400" viewbox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z" clip-rule="evenodd" />
                                </svg>
                                Filter
                                <svg class="-mr-1 ml-1.5 w-5 h-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path clip-rule="evenodd" fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                </svg>
                            </button>
                            <div id="filterDropdown" class="z-10 hidden w-48 p-3 bg-white rounded-lg shadow dark:bg-gray-700">
                                <h6 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">Choose brand</h6>
                                <ul id="searchFilterArea" class="space-y-2 text-sm" aria-labelledby="filterDropdownButton">


                                <?php

    $sql = "SELECT sub_inventory_name as inv_name FROM for_office.mtl_inventory_transactions group by sub_inventory_name ;
";

$result = mysqli_query($con, $sql);

            while($row = mysqli_fetch_assoc($result)){

        

?>




                                    <li class="flex items-center">
                                        <input id="apple" type="checkbox" value="<?php   echo $row['inv_name'] ?>" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <label for="apple" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100"><?php   echo $row['inv_name'] ?></label>
                                    </li>

                    <?php
            }
                                    ?>
                                    
                                    <!-- <li class="flex items-center">
                                        <input id="benq" type="checkbox" value="" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <label for="benq" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">InComplete</label>
                                    </li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="overflow-auto">
                    <table id="dataTable" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">S.no </th>
                                <th scope="col" class="px-4 py-3">Item Code</th>
                                <th scope="col" class="px-4 py-3">sub_inventory_name</th>
                                <th scope="col" class="px-4 py-3">Item quantity</th>
                                <!-- <th scope="col" class="px-4 py-3">Total</th> -->
                                <th scope="col" class="px-4 py-3">lot_number</th>
                                <th scope="col" class="px-4 py-3">sub_inventory_id</th>
                                <th scope="col" class="px-4 py-3">location_id</th>
                                <th scope="col" class="px-4 py-3">po_number</th>
                                    <!-- <th scope="col" class="px-4 py-3">Created by</th>
                                    <th scope="col" class="px-4 py-3">Created date</th> -->
                                <!-- <th scope="col" class="px-4 py-3">Total Price</th> -->
                                
                                <th scope="col" class="px-4 py-3">
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody id="genDataTbody">
                            <tr class="border-b dark:border-gray-700">
                                <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">1</th>
                                <td class="px-4 py-3">Item code</td>
                                <td class="px-4 py-3">Recieved qty</td>
                                <td class="px-4 py-3">unit price</td>
                                <td class="px-4 py-3">created by</td>
                                <td class="px-4 py-3">created Date</td>
                                <td class="px-4 py-3">Price</td>

                                <td class="px-4 py-3">Status</td>
                                <td class="px-4 py-3 flex items-center justify-end">
                                    <button id="apple-imac-27-dropdown-button" data-dropdown-toggle="apple-imac-27-dropdown" class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100" type="button">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                        </svg>
                                    </button>
                                    <div id="apple-imac-27-dropdown" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="apple-imac-27-dropdown-button">
                                            <li>
                                                <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Show</a>
                                            </li>
                                            <li>
                                                <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                            </li>
                                        </ul>
                                        <div class="py-1">
                                            <a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4" aria-label="Table navigation">
                    <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                        Showing
                        <span class="font-semibold text-gray-900 dark:text-white">1-10</span>
                        of
                        <span class="font-semibold text-gray-900 dark:text-white">1000</span>
                    </span>
                    <ul class="inline-flex items-stretch -space-x-px">
                        <li>
                            <a href="#" class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                <span class="sr-only">Previous</span>
                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
                        </li>
                        <li>
                            <a href="#" aria-current="page" class="flex items-center justify-center text-sm z-10 py-2 px-3 leading-tight text-primary-600 bg-primary-50 border border-primary-300 hover:bg-primary-100 hover:text-primary-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">...</a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">100</a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-center h-full py-1.5 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                <span class="sr-only">Next</span>
                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </section>














</body>

<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
<script src="./js/jquery.min.js"></script>
<!-- <script src="./js/jquery.min.js"></script> -->
<script src="./js/moveOrderReport.js"></script>




<script>
    function exportTableToCSV(filename) {
        const table = document.getElementById('dataTable');
        let csvContent = '';

        // Extract table headers
        const headers = Array.from(table.querySelectorAll('thead th'))
            .map(th => th.innerText)
            .join(',');
        csvContent += headers + '\n';

        // Extract table rows
        const rows = table.querySelectorAll('tbody tr');
        rows.forEach(row => {
            const cells = Array.from(row.querySelectorAll('td'))
                .map(td => td.innerText)
                .join(',');
            csvContent += cells + '\n';
        });

        // Create a Blob and trigger a download
        const blob = new Blob([csvContent], {
            type: 'text/csv;charset=utf-8;'
        });
        const url = URL.createObjectURL(blob);
        const link = document.createElement('a');
        link.href = url;
        link.setAttribute('download', filename);
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }
</script>

</html>