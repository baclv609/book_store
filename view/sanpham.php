<div class="container-content bg-white rounded-xl p-2 lg:p-3 mb-3 mt-5">Tất cả sản phẩm </div>
<!-- All sản phẩm -->
<section class="mt-5 container-content">
    <div class="grid grid-cols-12">
        <div class="md:block col-span-3 hidden pr-3">
            <div class=" rounded-xl">
                <div class="rounded-xl bg-white p-3 mb-4">
                    <p class="mb-4 text-lg font-medium leading-6 my-2">Lọc giá</p>
                    <form action="#">
                        <div class="flex items-center mb-2">
                            <input id="default-radio-1" type="radio" value="" name="default-radio"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                            <label for="default-radio-1"
                                class="ms-2 text-sm font-medium hover:text-[#ff379b] text-gray-900">Dưới
                                100.000đ</label>
                        </div>
                        <div class="flex items-center mb-2">
                            <input id="default-radio-1" type="radio" value="" name="default-radio"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                            <label for="default-radio-1"
                                class="ms-2 text-sm font-medium hover:text-[#ff379b] text-gray-900">100.000đ -
                                200.000đ</label>
                        </div>

                        <div class="flex items-center mb-2">
                            <input id="default-radio-1" type="radio" value="" name="default-radio"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                            <label for="default-radio-1"
                                class="ms-2 text-sm font-medium hover:text-[#ff379b] text-gray-900">500.000đ -
                                1.000.000đ</label>
                        </div>
                    </form>

                </div>

             
            </div>
        </div>

        <!--  -->
        <div class="md:col-span-9 col-span-12  mb-3">
            <div class="bg-white rounded-xl h-auto">
            </div>

            <div class="bg-white rounded-xl mt-5">
            <form action="index.php?act=sach" method="post" class="w-[700px]">
            <div class="flex">

                <select id="countries" name="danh_muc_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">
                    <option selected value="">Chọn Nhà Danh mục</option>
                    <?php
                    foreach ($listDm as $key => $value) {
                        echo '<option value="' . $value["id"] . '">' . $value["name"] . '</option>';
                    }
                    ?>
                </select>
                <select id="countries" name="tacGia_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">
                    <option selected value="">Chọn Tác Giả</option>
                    <?php
                    foreach ($listTg as $key => $value) {
                        print_r($listTg);
                        echo '<option value="' . $value["id"] . '">' . $value["name"] . '</option>';
                    }
                    ?>
                </select>
                <div class="relative w-full">
                    <input type="search" id="search-dropdown"
                        class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Nhập để tìm kiếm" name="searchSP" />

                    <button name="submit" type="submit"
                        class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 ">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                        <span class="sr-only">Search</span>
                    </button>
                </div>
            </div>
        </form>

                <div class="grid md:grid-cols-3 lg:grid-cols-4  grid-cols-2 gap-4">
                    <!-- item 2 -->
                    <!-- <div class="hover:shadow-md md:p-4 p-2 text-sm leading-5 bg-white rounded-xl">
                        <div>
                            <a href="#" class="w-[190px] h-[190px] flex justify-center items-center"><img class="max-w-[190px] max-h-[190px]"
                                    src="https://product.hstatic.net/200000785527/product/vien-uong-bo-sung-canxi-cho-me-bau-avisure-hi-cal-60-vien-2_1160dd6a488d4383b0378ebab9b29020_large.jpg"
                                    alt="" /></a>
                        </div>

                        <div>
                            <div class="overflow-hidden text-ellipsis  max-h-9 min-h-9 ">
                                <a href="#"
                                    class="leading-4 text-[#424242] text-sm text-left hover:text-[#ff379b] w-[184px]">
                                    Bô vệ sinh tựa trẻ em Hokori 5460
                                </a>
                            </div>

                            <div class="mt-2">
                                <div>
                                    <span class="font-bold text-[#097770] leading-6 text-left pr-2">
                                        478,000₫</span>
                                    <div
                                        class=" inline bg-[#ffaa2d] rounded-br-12 rounded-bl-12 rounded-tl-lg rounded-tr-lg rounded-b-lg text-[#097770] text-left text-sm font-bold grid-auto line-height-18px p-1">
                                        20%
                                    </div>
                                </div>

                                <del class="mt-1 text-[#929292] text-sm leading-4 text-left">299,000d</del>
                                <div class=" flex mt-1">
                                    <StarOutlined />
                                    <StarOutlined />
                                    <StarOutlined />
                                    <StarOutlined />
                                    <StarOutlined />
                                </div>
                                <div class="mt-2 flex items-center">
                                    <img src="../assets/image/categories_image/label_starstar.webp"
                                        class="w-[18px] h-[18px]" alt="">
                                    <div class="text-[#d42611] font-bold leading-[15px] text-xs ml-1">Flashsale
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->

                    <!-- <a href="index.php?act=sanphamct&idsp=' . $value["id"] . '" class="w-[190px] h-[190px] flex justify-center items-center"> <img src="./uploads/' . $value["img"] . '"
                    alt="loading" class="max-w-[190px] max-h-[190px]"></a> -->
                    <?php
                foreach ($listSp as $key => $value) {
                    // print_r($value);
                    // die();
                
                    # code...
                    echo '<div class="hover:shadow-md md:p-4 p-2 text-sm leading-5 bg-white rounded-xl">
                        <div>
                            <a href="index.php?act=sanphamct&idsp=' . $value["id"] . '" class="w-[190px] h-[190px] flex justify-center items-center">';
                
                    if (!empty($value["images"])) {
                        echo '<img src="./uploads/' . $value["images"][0] . '" alt="loading" class="max-w-[190px] max-h-[190px]">';
                    } else{
                        echo '<img src="data:image/jpeg;base64,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" alt="loading" class="max-w-[190px] max-h-[190px]">';
                    }
                
                    echo '</a>
                        </div>
                
                        <div class="mt-2">
                            <div class="overflow-hidden text-ellipsis  max-h-9 min-h-9 ">
                                <a href="index.php?act=sanphamct&idsp=' . $value["id"] . '" class="leading-4 text-[#424242] text-sm text-left hover:text-[#ff379b] w-[184px]">' . $value["ten"] . '
                                </a>
                            </div>
                
                            <div class="mt-2">
                                <div>
                                    <span class="font-bold text-[#097770] leading-6 text-left pr-2">
                                    ' . $value["gia"] . '</span>
                                    
                                </div>
                
                                <del class="mt-1 text-[#929292] text-sm leading-4 text-left">' . $value["gia_sale"] . '</del>
                               
                                <div class="mt-2 flex items-center">
                                    <div class="text-[#d42611] font-bold leading-[15px] text-xs ml-1">Flashsale
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
                }
                    ?>
                </div>

                <div> <a-pagination v-model:current="current" :total="50" show-less-items /></div>
            </div>
        </div>
    </div>
</section>