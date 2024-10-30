let received_txt = `<div class="flex flex-wrap items-center mt-3 border-black border-t pt-2">
                         <div>
                            <input id="link-checkbox" type="checkbox" value=""
                                class="w-3 h-4 text-blue-600 bg-gray-100 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:border-gray-600">
                        </div>
                        <div class="ml-2">
                            <label class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">S. No
                                :
                            </label>
                            <input type="text" name="email" id="email"
                                class="w-20 rounded-md border text-xs border-[#e0e0e0] bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                        <div class="ml-2">
                            <label class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Item
                                Code:
                            </label>
                            <input type="text" name="email" id="email"
                                class="w-28 rounded-md border text-xs border-[#e0e0e0] bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                        <div class="ml-2">
                            <label class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Item
                                Desc :
                            </label>
                            <input type="text" name="email" id="email"
                                class="w-40 rounded-md border text-xs border-[#e0e0e0] bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                        <div class="ml-2">
                            <label class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Qty :
                            </label>
                            <input type="text" name="email" id="email"
                                class="w-24 rounded-md border text-xs border-[#e0e0e0] bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                        <div class="ml-2">
                            <label class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Qty
                                Recv:
                            </label>
                            <input type="text" name="email" id="email"
                                class="w-24 rounded-md border text-xs border-[#e0e0e0] bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                        <div class="ml-2">
                            <label class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">SI
                                Unit :
                            </label>
                            <input type="text" name="email" id="email"
                                class="w-20 rounded-md border text-xs border-[#e0e0e0] bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                        <div class="ml-2">
                            <label class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Sub
                                Inveory:
                            </label>
                            <input type="text" name="email" id="email"
                                class="w-24 rounded-md border text-xs border-[#e0e0e0] bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                        <div class="ml-2">
                        <label class="block mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Status:
                            </label>
                            <input type="text" name="email" id="email" placeholder="Received" disabled
                            class="w-20 rounded-md border text-xs border-[#e0e0e0] bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md placeholder-black::placeholder" />
                        </div>
                    </div>`;

let reject_txt = `<div class="flex flex-wrap items-center mt-3 border-black border-t pt-2">
                        <div>
                            <input id="link-checkbox" type="checkbox" value="" class="w-3 h-4 text-blue-600 bg-gray-100 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:border-gray-600">
                        </div>
                        <div class="ml-2">
                            <input type="text" name="email" id="email"
                            class="w-20 rounded-md border text-xs border-[#e0e0e0] bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                        <div class="ml-2">
                            <input type="text" name="email" id="email"
                            class="w-28 rounded-md border text-xs border-[#e0e0e0] bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                        <div class="ml-2">
                            <input type="text" name="email" id="email"
                            class="w-40 rounded-md border text-xs border-[#e0e0e0] bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                        <div class="ml-2">
                            <input type="text" name="email" id="email"
                            class="w-24 rounded-md border text-xs border-[#e0e0e0] bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                        <div class="ml-2">
                            <input type="text" name="email" id="email"
                            class="w-24 rounded-md border text-xs border-[#e0e0e0] bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                        <div class="ml-2">
                            <input type="text" name="email" id="email"
                            class="w-20 rounded-md border text-xs border-[#e0e0e0] bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                        <div class="ml-2">
                            <input type="text" name="email" id="email" placeholder="Damage" disabled
                            class="w-24 rounded-md border text-xs border-[#e0e0e0] bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                        <div class="ml-2">
                            <input type="text" name="email" id="email" placeholder="Rejected" disabled
                            class="w-20 rounded-md border text-xs border-[#e0e0e0] bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md placeholder-black::placeholder" />
                        </div>
                    </div>`;

let accept_txt = `<div class="flex flex-wrap items-center mt-3 border-black border-t pt-2">
                                            <div>
                                                <input id="link-checkbox" type="checkbox" value="" class="w-3 h-4 text-blue-600 bg-gray-100 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:border-gray-600">
                                            </div>
                                            <div class="ml-2">
                                                <input type="text" name="email" id="email"
                                                class="w-20 rounded-md border text-xs border-[#e0e0e0] bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                            </div>
                                            <div class="ml-2">
                                                <input type="text" name="email" id="email"
                                                class="w-28 rounded-md border text-xs border-[#e0e0e0] bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                            </div>
                                            <div class="ml-2">
                                                <input type="text" name="email" id="email"
                                                class="w-40 rounded-md border text-xs border-[#e0e0e0] bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                            </div>
                                            <div class="ml-2">
                                                <input type="text" name="email" id="email"
                                                class="w-24 rounded-md border text-xs border-[#e0e0e0] bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                            </div>
                                            <div class="ml-2">
                                                <input type="text" name="email" id="email"
                                                class="w-24 rounded-md border text-xs border-[#e0e0e0] bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                            </div>
                                            <div class="ml-2">
                                                <input type="text" name="email" id="email"
                                                class="w-20 rounded-md border text-xs border-[#e0e0e0] bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                            </div>
                                            <div class="ml-2">
                                                <input type="text" name="email" id="email"
                                                class="w-24 rounded-md border text-xs border-[#e0e0e0] bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                            </div>
                                            <div class="ml-2">
                                                <input type="text" name="email" id="email" placeholder="Accepted" disabled
                                                class="w-20 rounded-md border text-xs border-[#e0e0e0] bg-white py-3 pl-2 text-[#6B7280] h-6 outline-none focus:border-[#6A64F1] focus:shadow-md placeholder-black::placeholder" />
                                            </div>
                                        </div>`;

function received() {
  let checkbox = document.getElementById("link-checkbox");
  let recieved_div = document.getElementById("recieved_div");

  if (checkbox.checked) {
    recieved_div.innerHTML += received_txt;
  } else {
    console.log("without check");
  }

  console.log("finish");
}

function accept() {
  let checkbox = document.getElementById("link-checkbox");
  let accept_div = document.getElementById("accept_div");

  if (checkbox.checked) {
    accept_div.innerHTML += accept_txt;
  } else {
    console.log("without check");
  }

  console.log("finish");
}

function reject() {
  let checkbox = document.getElementById("link-checkbox");
  let reject_div = document.getElementById("reject_div");

  if (checkbox.checked) {
    reject_div.innerHTML += reject_txt;
  } else {
    console.log("without check");
  }

  console.log("finish");
}

function create_section() {

  $("#view_section").slideUp(1000)
  $("#create_section").slideDown(1000)
}



function view_section() {
  
    $("#view_section").slideDown(1000)  
    $("#create_section").slideUp(1000)
}
