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
                <!-- <div class="py-4">
                    <ul class="flex space-x-2 mdtext-lg text-sm ">
                        <li><label class="hover:text-[#ff379b] px-2 md:px-4" for="#">Mặc định</label></li>
                        <li><label class="hover:text-[#ff379b] px-2 md:px-4" for="#">Từ A-Z</label></li>
                        <li><label class="hover:text-[#ff379b] px-2 md:px-4" for="#">Từ Z-A</label></li>
                        <li><label class="hover:text-[#ff379b] px-2 md:px-4" for="#">Giá tăng dần</label></li>
                        <li><label class="hover:text-[#ff379b] px-2 md:px-4" for="#">Giá giảm dần</label></li>
                        <li><label class="hover:text-[#ff379b] px-2 md:px-4" for="#">Cũ nhất</label></li>
                        <li><label class="hover:text-[#ff379b] px-2 md:px-4" for="#">Mới nhất</label></li>

                    </ul>
                </div> -->

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