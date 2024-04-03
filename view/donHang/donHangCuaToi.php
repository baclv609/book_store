<div class="flex flex-col">
    <div class="-m-1.5 overflow-x-auto">
        <div class="p-1.5 min-w-full inline-block align-middle">
            <div class="border rounded-lg divide-y divide-gray-200 dark:border-gray-700">
                <div class="py-3 px-4">
                    <div class="relative max-w-xs">
                        <label for="hs-table-search" class="sr-only">Search</label>
                        <input type="text" name="hs-table-search" id="hs-table-search"
                            class="py-2 px-3 ps-9 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none "
                            placeholder="Search for items">
                        <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-3">
                            <svg class="size-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="11" cy="11" r="8" />
                                <path d="m21 21-4.3-4.3" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="overflow-hidden">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-white uppercase">
                                    Mã đơn hàng</th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-white uppercase">
                                    Sản phẩm</th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-white uppercase">
                                    Đại chỉ</th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-white uppercase">
                                    Thời gian</th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-white uppercase">
                                    Trạng thái</th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-white uppercase">
                                    Phương thức <br> thanh toán </th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-white uppercase">
                                    Tổng tiền</th>
                                <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-white uppercase">
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <?php
                            // echo '<pre>';
                            // print_r($select_Don_hang_cua_toi);
                            // die;
                            foreach ($select_Don_hang_cua_toi as $key => $value) {
                                // $gioHang = select_Don_hang_cua_toi_thanhtoan_where_id($_SESSION['user']['id']);
                                $gioHang = select_gio_hang_item_thanhtoan_where_id($value['id']);
                                $status = $value["status"];
                                $statusMessages = [
                                    1 => "Đơn hàng mới",
                                    2 => "Đang giao hàng",
                                    3 => "Đã giao hàng thành công",
                                    4 => "Giao hàng không thành công",
                                    5 => "Đơn hàng bị hủy"
                                ];
                                echo '
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap font-bold text-sm text-red-600">VNG0' . $value["id"] . '</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                            <div class="flex items-center">
                                                <img class="h-16 w-16 mr-4"
                                                    src="http://localhost:81/da1/Book_Store/uploads/v%C4%83n%20h%E1%BB%8Dc%202.jpg"
                                                    alt="Product image">
                                                <div class="flex flex-col">
                                                    <span class="font-medium text-[14px] w-[200px] line-clamp-1">' . $gioHang[0]["ten"] . '</span>
                                                    <p class="mt-1 text-[#929292] text-sm leading-4">' . $gioHang[0]["loai_bia"] . '</p>
                                                    <p class="mt-1 text-[#929292] text-sm leading-4"><span
                                                            class="font-medium text-black">Số lượng: </span>' . $gioHang[0]["so_luong"] . '</p>
                                                    <a href="index.php?act=ChiTietDonHangCuaToi&id=' . $value["id"] . '" class="mt-1 font-medium text-blue-600">Xem thêm</a>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                            <span class="font-medium text-black">Họ tên:</span> ' . $value["name"] . ' <br>
                                            <span class="font-medium text-black">Sdt:</span> ' . $value["phone"] . ' <br>
                                            <!-- <span class="font-medium text-black">Email:</span> ' . $value["email"] . ' <br> -->
                                            <span class="font-medium text-black">Địa chỉ:</span> ' . $value["adress"] . ' <br>
                                            <span class="font-medium text-black line-clamp-2">Ghi chú:</span> ' . $value["ghi_chu"] . '<br>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">' . $value["created_at"] . '</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">' . ($statusMessages[$status] ?? "Trạng thái không hợp lệ") . '</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">' . $value["payment"] . '</td>
                                        <td class="px-6 py-4 whitespace-nowrap font-bold text-sm text-red-600">' . $value["tong_tien"] . ',000đ</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                            <a href="index.php?act=ChiTietDonHang&id=' . $value["id"] . '"
                                                class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none">Cập nhật</a>
                                        </td>
                                    </tr>
                                ';
                            } ?>

                            <!-- <tr>
                                <td class="px-6 py-4 whitespace-nowrap font-bold text-sm text-red-600">VNG027</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 ">
                                    <div class="flex items-center">
                                        <img class="h-16 w-16 mr-4"
                                            src="http://localhost:81/da1/Book_Store/uploads/v%C4%83n%20h%E1%BB%8Dc%202.jpg"
                                            alt="Product image">
                                        <div class="flex flex-col">
                                            <span class="font-medium text-[14px] w-[200px] line-clamp-2">Combo Sách Ghi
                                                Chép Pháp Y - Những Cái Chết Bí Ẩn + Những Con Quái Vật Đội Lốt
                                                Người</span>
                                            <p class="mt-1 text-[#929292] text-sm leading-4">bia mem</p>
                                            <p class="mt-1 text-[#929292] text-sm leading-4"><span
                                                    class="font-medium text-black">Số lượng: </span>1</p>
                                            <p class="mt-1 text-[#929292] text-sm leading-4"><span
                                                    class="font-medium text-black">Số lượng: </span>1</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">
                                    <span class="font-medium text-black">Họ tên:</span> bacle <br>
                                    <span class="font-medium text-black">Sdt:</span> 01234567889 <br>
                                    <span class="font-medium text-black">Địa chỉ:</span> hà noi <br>
                                    <span class="font-medium text-black">Ghi chú:</span> Giao giờ hành chính <br>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">London No. 1 Lake Park
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">Đã đặt hàng
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">COD
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap font-bold text-sm text-red-600">129,000đ
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                    <button type="button"
                                        class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none  dark:hover:text-blue-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">Delete</button>
                                </td>
                            </tr> -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>