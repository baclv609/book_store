  <!-- product -->
  <div class="bg-gray-100 py-8">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row -mx-4">
            <div class="md:flex-1 px-4">
                <div class="h-[460px] w-[428px] rounded-lg hover:shadow-md mb-4 flex justify-center items-center">
                    <img class="max-h-[460px] max-w-[428px]  object-cover" src="./uploads/<?php  echo $sanPhamCt["img"]; ?>" alt="Product Image">
                </div>
                <div class="flex -mx-2 mb-4">
                    <div class="w-1/2 px-2">
                        <button class="w-full bg-gray-900 text-white py-2 px-4 rounded-full font-bold hover:bg-gray-800 ">Mua ngay</button>
                    </div>
                    <div class="w-1/2 px-2">
                        <button class="w-full bg-gray-200 text-gray-800  py-2 px-4 rounded-full font-bold hover:bg-gray-300">Thêm vào gỏ hàng</button>
                    </div>
                </div>
            </div>
            <div class="md:flex-1 px-4">
                <!-- <h2 class="text-2xl font-bold text-gray-800  mb-2">Tên sách</h2> -->
                <h2 class=" font-bold mb-4 text-red-600">
                <?php  echo $sanPhamCt["ten"]; ?>
                </h2>
                <div class="flex mb-4">
                    <div class="mr-4">
                        <span class=" text-gray-700 ">Tác giả:</span>
                        <span class="text-gray-600 font-bold"><?php  echo $sanPhamCt["tac_gia_name"]; ?></span>
                    </div>
                    <div>
                        <span class=" text-gray-700 ">Nhà xuất bản:</span>
                        <span class="text-gray-600 font-bold"><?php  echo $sanPhamCt["nha_san_xua_name"]; ?></span>
                    </div>
                </div>
                <div class="flex mb-4">
                    <div class="mr-4">
                        <span class=" text-gray-700 ">Danh mục:</span>
                        <span class="text-gray-600 font-bold"><?php  echo $sanPhamCt["danh_muc_name"]; ?></span>
                    </div>
                </div>
                <div class="flex mb-4">
                    <div class="mr-4">
                        <span class=" text-gray-700 ">Giá:</span>
                        <span class="text-gray-600 font-bold"> <?php  echo $sanPhamCt["gia"]; ?>000 đ</span>
                    </div>
                    <?php
if (isset($sanPhamCt["gia_sale"])) {
    echo '<div>
        <span class="text-gray-700">Giá sale:</span>
        <del class="text-gray-600">' . $sanPhamCt["gia_sale"] . '000 đ</del>
    </div>';
} else {
    echo "";
}
?>
                   
                </div>
               

                <!-- <div class="mb-4">
                    <span class="font-bold text-gray-700 ">Select Color:</span>
                    <div class="flex items-center mt-2">
                        <button class="w-6 h-6 rounded-full bg-gray-800 mr-2"></button>
                        <button class="w-6 h-6 rounded-full bg-red-500 dark:bg-red-700 mr-2"></button>
                        <button class="w-6 h-6 rounded-full bg-blue-500 dark:bg-blue-700 mr-2"></button>
                        <button class="w-6 h-6 rounded-full bg-yellow-500 dark:bg-yellow-700 mr-2"></button>
                    </div>
                </div> -->
                <!-- <div class="mb-4">
                    <span class="font-bold text-gray-700 ">Select Size:</span>
                    <div class="flex items-center mt-2">
                        <button class="bg-gray-300 text-gray-700 dark:text-white py-2 px-4 rounded-full font-bold mr-2 hover:bg-gray-400 dark:hover:bg-gray-600">S</button>
                        <button class="bg-gray-300 text-gray-700 dark:text-white py-2 px-4 rounded-full font-bold mr-2 hover:bg-gray-400 dark:hover:bg-gray-600">M</button>
                        <button class="bg-gray-300 text-gray-700 dark:text-white py-2 px-4 rounded-full font-bold mr-2 hover:bg-gray-400 dark:hover:bg-gray-600">L</button>
                        <button class="bg-gray-300 text-gray-700 dark:text-white py-2 px-4 rounded-full font-bold mr-2 hover:bg-gray-400 dark:hover:bg-gray-600">XL</button>
                        <button class="bg-gray-300 text-gray-700 dark:text-white py-2 px-4 rounded-full font-bold mr-2 hover:bg-gray-400 dark:hover:bg-gray-600">XXL</button>
                    </div>
                </div> -->
                <div>
                    <span class="font-bold text-gray-700 ">Mô tả:</span>
                    <p class="text-gray-600  text-sm mt-2">
                    <?php  echo $sanPhamCt["mo_ta"]; ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

 <!-- Sản phẩm nổi bật  -->
 <section class="container-content my-5 ">

<div class="bg-white p-2  rounded-xl">
    <div class="flex justify-center gap-2 py-4">
        <h2 class="font-bold py-3 text-2xl">Sản phẩm cùng loại</h2>
    </div>

    <!--  -->
    <div class="grid md:grid-cols-3 lg:grid-cols-4  grid-cols-2 gap-4">

        <!-- items 1-->
        <?php
                    foreach ($sach_cungLoai as $key => $value) {
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

    <div class="flex justify-center items-center py-2"><a
            class="text-center w-[200px] rounded-xl text-sm text-[#C92127] font-bold border-2 border-solid border-[#C92127] leading-5 bg-white py-3 px-4"
            href="#">Xem thêm</a></div>
</div>
</section>