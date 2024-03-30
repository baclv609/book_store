<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 1200px;
        margin: 20px auto;
        padding: 20px;
        /* border: 1px solid #ccc; */
    }
</style>
</head>

<body>
    <div class="container">
        <h2>Giỏ Hàng Của Bạn</h2>

        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 mt-5">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Tên sản phẩm
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Hình ảnh sản phẩm
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Giá Sản phẩm
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Số Lượng
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Thành tiền
                    </th>
                    <th scope="col" class="px-6 py-3">
                        xóa
                    </th>
                </tr>
            </thead>

            <tbody class="hover:bg-gray-100">
                <!-- <tr class="bg-white border-b px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            <td scope="row" class="px-6 py-4" ></td>
                            <td class="px-3 py-3" name="hinhAnh"><img src="' . $hinh . '" style="width: 110px;" alt="loading...">' . $value['hinhAnh'] . '</td>
                            <td class="px-6 py-4" name="gia">' . $value['gia'] . '</td>
                            
                            <td class="px-6 py-4"><form action="" method="post"><input type="number" name="so_luong" value="' . $value['so_luong'] . '"></form></td>                   
                      
                            <td class="px-6 py-4" name="thanhtien">' . $value['thanhtien'] . '</td>  
                            <td class="px-6 py-4"> <a href="index.php?act=deleteGioHang&id=' . $value['id'] . '" onclick="return confirm(\'Bạn muốn xóa ?\')"><input type="button" value="Xóa"  class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"></a></td>
                            </td>  

                        </tr> -->
                <?php
                foreach ($gioHang as $key => $value) {
                    // echo '<pre>';
                    // print_r($gioHang);
                    // echo '</pre>';
                    $hinh = "../uploads/" . $value['hinhAnh'];

                    echo '
                    <form action="them" method="post">
                     <tr class="bg-white border-b px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                     <td scope="row" class="px-6 py-4" ><input type="text" name="ten" value="' . $value['ten'] . '"></td>
                     <td scope="row" class="px-6 py-4" ><input type="text" name="hinhAnh" value="' . $value['hinhAnh'] . '"><img src="' . $hinh . '" style="width: 110px;" alt="loading..."></td>
                     <td scope="row" class="px-6 py-4" ><input type="text" name="gia" value="' . $value['gia'] . '"></td>
                     <td scope="row" class="px-6 py-4" ><input type="text" name="so_luong" value="' . $value['so_luong'] . '"></td>
                     <td scope="row" class="px-6 py-4" ><input type="text" name="thanhtien" value="' . $value['thanhtien'] . '"></td>
                     <td class="px-6 py-4"> <a href="index.php?act=deleteGioHang&id=' . $value['id'] . '" onclick="return confirm(\'Bạn muốn xóa ?\')"><input type="button" value="Xóa"  class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"></a></td> 
                       </tr>
                       </form>
                        ';
                }
                ?>


            </tbody>
        </table>
    </div>

    <div class="cart-summary">
        <?php
        //   foreach ($gioHang as  $value) {
        echo '<h3>Tổng số tiền :' . $value['tongsotien'] . ' </h3>';
        //   }      <td class="px-6 py-4">' . $value['so_luong'] . '</td>
        ?>

        <button>thanh toán</button>
    </div>


    </div>


</body>

</html>