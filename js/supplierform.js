function organization() {

    let x = document.getElementById('organization_deatils')

    x.style.display = "block";


    let y = document.getElementById('address_deatils')
    y.style.display = "none";

    let z = document.getElementById('bank_deatils')
    z.style.display = "none";
}


function address() {

    let x = document.getElementById('address_deatils')

    x.style.display = "block";

    let y = document.getElementById('organization_deatils')
    y.style.display = "none";

    let z = document.getElementById('bank_deatils')
    z.style.display = "none";
}


function bank() {

    let x = document.getElementById('bank_deatils')
    x.style.display = "block";

    let y = document.getElementById('organization_deatils')
    y.style.display = "none";

    let z = document.getElementById('address_deatils')
    z.style.display = "none";
}



let organization_txt = `<div class="flex flex-wrap gap-x-20 mt-2 border-t-2 pt-3 border-gray-900">
                <div>
                    <label for="email"
                        class="block  mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Oraganigation
                        Name :
                    </label>
                    <input type="text" placeholder="Enter oraganigation name"
                        class="w-60 rounded-md border text-xs mb-4 border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-7 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>

                <div>
                    <label for="countries"
                        class="block mb-2 text-xs font-medium text-gray-900 dark:text-white">Oraganigation Type :
                    </label>
                    <select id="countries"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-xs   rounded-md focus:ring-blue-500 focus:border-blue-500 block w-60 h-7 pl-2 pt-1 mb-4  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected disabled>Select One Type</option>
                        <option value="US">LLC</option>
                        <option value="CA">Corporation</option>
                        <option value="FR">Partnership</option>
                        <option value="DE">Sole Proprietorship</option>
                    </select>
                </div>

                <div>
                    <label for="email"
                        class="block  mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">GST Number :
                    </label>
                    <input type="text" placeholder="Enter GST number"
                        class="w-60 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-7 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>
            </div>

            <div class="flex flex-wrap gap-x-20">
                <div>
                    <label for="email"
                        class="block  mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Supplier Name :
                    </label>
                    <input type="text" placeholder="Enter supplier name"
                        class="w-60 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-7 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>

                <div>
                    <label for="email"
                        class="block  mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Supplier Type :
                    </label>
                    <input type="text" placeholder="Enter supplier type"
                        class="w-60 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-7 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>

                <div>
                    <label for="email"
                        class="block  mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Sub Supplier
                        Type :
                    </label>
                    <input type="text" placeholder="Enter sub supplier type"
                        class="w-60 rounded-md border text-xs mb-4 border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-7 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>

            </div>

            <div class="flex flex-wrap gap-x-20">
                <div>
                    <label for="email"
                        class="block  mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Supplier Status
                        :
                    </label>
                    <input type="text" placeholder="Enter supplier status"
                        class="w-60 rounded-md border text-xs mb-4 border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-7 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>
                <div>
                    <label for="email"
                        class="block  mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Starting Date :
                    </label>
                    <input type="date"
                        class="w-60 rounded-md border text-xs mb-4 border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-7 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>
                <div>
                    <label for="" class="block  mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Ending
                        Date :
                    </label>
                    <input type="date"
                        class="w-60 rounded-md border text-xs mb-4 border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-7 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>
            </div>

            <div class="flex flex-wrap gap-x-20">
                <div>
                    <label for=""
                        class="block  mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Contact Person
                        Name :
                    </label>
                    <input type="text" placeholder="Enter person name"
                        class="w-60 rounded-md border text-xs mb-4 border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-7 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>

                <div>
                    <label for=""
                        class="block  mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Contact Person
                        Email :
                    </label>
                    <input type="text" placeholder="Enter person email"
                        class="w-60 rounded-md border text-xs mb-4 border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-7 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>

                <div>
                    <label for="email"
                        class="block  mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Contact Person
                        Number :
                    </label>
                    <input type="text" placeholder="Enter person number"
                        class="w-60 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-7 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>
            </div>`






let address_txt = `<div class="flex flex-wrap gap-x-20 mt-2 border-t-2 pt-3 border-gray-900">
                <div>
                    <label for="" class="block  mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Site
                        Code :
                    </label>
                    <input type="text" placeholder="Enter person name"
                        class="w-60 rounded-md border text-xs mb-4 border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-7 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>

                <div>
                    <label for="" class="block  mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Site
                        Name :
                    </label>
                    <input type="text" placeholder="Enter person email"
                        class="w-60 rounded-md border text-xs mb-4 border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-7 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>

                <div>
                    <label for="email"
                        class="block  mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Site Description
                        :
                    </label>
                    <input type="text" placeholder="Enter person number"
                        class="w-60 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-7 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>

            </div>

            <div class="flex flex-wrap gap-x-20">
                <div>
                    <label for="email"
                        class="block  mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Address Line 1 :
                    </label>
                    <input type="text" placeholder="Enter address line 1"
                        class="w-60 rounded-md border text-xs mb-4 border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-7 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>

                <div>
                    <label for="countries" class="block mb-2 text-xs font-medium text-gray-900 dark:text-white">Address
                        Line 2 : </label>
                    <input type="text" placeholder="Enter address line 2"
                        class="w-60 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-7 outline-none focus:border-[#6A64F1] focus:shadow-md" />

                </div>

                <div>
                    <label for="email"
                        class="block  mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Postal Code :
                    </label>
                    <input type="text" placeholder="Enter postal code"
                        class="w-60 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-7 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>


            </div>
            <div class="flex flex-wrap gap-x-20">
                <div>
                    <label for="" class="block  mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">City :
                    </label>
                    <input type="text" placeholder="Enter city name"
                        class="w-60 rounded-md border text-xs mb-4 border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-7 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>

                <div>
                    <label for="" class="block  mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">State
                        :
                    </label>
                    <input type="text" placeholder="Enter state name"
                        class="w-60 rounded-md border text-xs mb-4 border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-7 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>

                <div>
                    <label for="email" class="block  mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">
                        Country :
                    </label>
                    <input type="text" placeholder="Enter country name"
                        class="w-60 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-7 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>
            </div>

            <div class="flex flex-wrap gap-x-20">
                <div>
                    <label for=""
                        class="block  mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Contact Person
                        Name :
                    </label>
                    <input type="text" placeholder="Enter person name"
                        class="w-60 rounded-md border text-xs mb-4 border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-7 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>

                <div>
                    <label for=""
                        class="block  mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Contact Person
                        Email :
                    </label>
                    <input type="text" placeholder="Enter person email"
                        class="w-60 rounded-md border text-xs mb-4 border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-7 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>

                <div>
                    <label for="email"
                        class="block  mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Contact Person
                        Number :
                    </label>
                    <input type="text" placeholder="Enter person number"
                        class="w-60 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-7 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>
            </div>`



let banking_txt = ` 
                    <div class="mt-2 border-b border-gray-900">
                <label for=""
                class="block  mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Site Code :
            </label>
            <input type="text" placeholder="Enter site code"
                class="w-60 rounded-md border text-xs mb-3 border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-7 outline-none focus:border-[#6A64F1] focus:shadow-md" />
            </div>


                <div class="flex flex-wrap gap-x-20 mt-3">
                <div>
                    <label for=""
                        class="block  mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Branch Name :
                    </label>
                    <input type="text" placeholder="Enter branch name"
                        class="w-60 rounded-md border text-xs mb-4 border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-7 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>

                <div>
                    <label for="countries" class="block mb-2 text-xs font-medium text-gray-900 dark:text-white">Branch
                        Number : </label>
                    <input type="text" placeholder="Enter brach number"
                        class="w-60 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-7 outline-none focus:border-[#6A64F1] focus:shadow-md" />

                </div>

                <div>
                    <label for=""
                        class="block  mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Branch Type :
                    </label>
                    <input type="text" placeholder="Enter brach type"
                        class="w-60 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-7 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>


            </div>
            <div class="flex flex-wrap gap-x-20">
                <div>
                    <label for="" class="block  mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Bank
                        Name :
                    </label>
                    <input type="text" placeholder="Enter bank name"
                        class="w-60 rounded-md border text-xs mb-4 border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-7 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>

                <div>
                    <label for="" class="block  mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Bank
                        Number
                        :
                    </label>
                    <input type="text" placeholder="Enter bank number"
                        class="w-60 rounded-md border text-xs mb-4 border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-7 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>

                <div>
                    <label for="" class="block  mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">
                        Bank Type :
                    </label>
                    <input type="text" placeholder="Enter bank type"
                        class="w-60 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-7 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>
            </div>
            <div class="flex flex-wrap gap-x-20">
                <div>
                    <label for=""
                        class="block  mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Account Name :
                    </label>
                    <input type="text" placeholder="Enter account name"
                        class="w-60 rounded-md border text-xs mb-4 border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-7 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>

                <div>
                    <label for=""
                        class="block  mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">Account Number
                        :
                    </label>
                    <input type="text" placeholder="Enter account number"
                        class="w-60 rounded-md border text-xs mb-4 border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-7 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>

                <div>
                    <label for="" class="block  mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">
                        Account Type :
                    </label>
                    <input type="text" placeholder="Enter account type"
                        class="w-60 rounded-md border text-xs border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-7 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>
            </div>
            <div class="flex flex-wrap gap-x-20">
                <div>
                    <a href="#bank_deatils" target="iframe_a">
                        <label for=""
                            class="block  mb-2 font-bold text-xs font-medium text-gray-900 dark:text-white">IFSC
                            Code :
                        </label>
                    </a>
                    <input type="text" placeholder="Enter IFSC code"
                        class="w-60 rounded-md border text-xs mb-4 border-gray-500 bg-white py-3 pl-2 text-[#6B7280] h-7 outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>
            </div>`


function oraganigation_duplicate() {

    let x = document.getElementById('oraganigation_duplicate');
    let y = document.getElementById('org_btn');

    x.innerHTML += organization_txt;
    y.style.display = "none"

}




function address_duplicate() {
    let y = document.getElementById('address_duplicate');

    y.innerHTML += address_txt;
}



function banking_duplicate() {
    let z = document.getElementById("banking_duplicate")

    z.innerHTML += banking_txt;
}