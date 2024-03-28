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
                </tr>
            </thead>
            <tbody class="hover:bg-gray-100">
                <?php
                // foreach ($gioHang as $key=> $value) {
                    // echo '<pre>';
                    // print_r($gioHang);
                    // echo '</pre>';

                    echo '
                        <tr class="bg-white border-b px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            <td scope="row" class="px-6 py-4">' . $gioHang['ten'] . '</td>
                            <td class="px-6 py-4"><img src="' . $gioHang['hinhAnh'] . '" alt=""></td>
                            <td class="px-6 py-4">' . $gioHang['gia'] . '</td>
                            <td class="px-6 py-4">' . $gioHang['so_luong'] . '</td>
                            <td class="px-6 py-4">' . $gioHang['thanhtien'] . '</td>                   
                        </tr>
                        ';
                // }

                ?>

            </tbody>
        </table>
    </div>

    <div class="cart-summary">
        <?php
        //   foreach ($gioHang as  $value) {
            echo '<h3>Tổng số tiền :'.$gioHang['tongsotien'].' </h3>';
        //   }
        ?>
        
        <button>thanh toán</button>
    </div>


    </div>


</body>

</html>