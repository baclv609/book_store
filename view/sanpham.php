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


                    <?php
                    foreach ($listSp as $key => $value) {
                        # code...
                        echo '<div class="hover:shadow-md md:p-4 p-2 text-sm leading-5 bg-white rounded-xl">
                <div>
                    <a href="index.php?act=sanphamct&idsp=' . $value["id"] . '" class="w-[190px] h-[190px] flex justify-center items-center"> <img src="./uploads/' . $value["img"] . '"
                    alt="loading" class="max-w-[190px] max-h-[190px]"></a>
                </div>

                <div class="mt-2">
                    <div class="overflow-hidden text-ellipsis  max-h-9 min-h-9 ">
                        <a href="index.php?act=sanphamct&idsp=' . $value["id"] . '"
                            class="leading-4 text-[#424242] text-sm text-left hover:text-[#ff379b] w-[184px]">' . $value["ten"] . '
                        </a>
                    </div>

                    <div class="mt-2">
                        <div>
                            <span class="font-bold text-[#097770] leading-6 text-left pr-2">
                            ' . $value["gia"] . '</span>
                            
                        </div>

                        <del class="mt-1 text-[#929292] text-sm leading-4 text-left">' . $value["gia_sale"] . '</del>
                       
                        <div class="mt-2 flex items-center">
                            <img src="../assets/image/categories_image/label_starstar.webp"
                                class="w-[18px] h-[18px]" alt="">
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