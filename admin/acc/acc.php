<div class="relative overflow-x-auto">

    <div class="font-bold text-[30px]">
        Danh sách người dùng
    </div>
    <!-- input-->
    <div class="flex justify-between items-center mt-5">
        <form class="w-[500px]" action="index.php?act=account" method="post">
            <div class="relative ">
                <input type="search" id="search-dropdown"
                    class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500   "
                    placeholder="Tìm kiếm người dùng..." name="searchName" />

                <button type="submit" name="submit"
                    class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300  ">

                    <!-- icon search -->
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <span class="sr-only">Search</span>
                </button>
            </div>
        </form>

        <!-- <div class=""><a href="index.php?act=addDm"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2  focus:outline-none">Nhập
                thêm</a>
        </div> -->
    </div>


    <!-- list form -->
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 mt-5">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID người dùng
                </th>
                <th scope="col" class="px-6 py-3">
                    Tên Người dùng
                </th>
                <th scope="col" class="px-6 py-3">
                    Hình Ảnh người dùng
                </th>
                <th scope="col" class="px-6 py-3">
                    Số điện thoại
                </th>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
                <th scope="col" class="px-6 py-3">
                    vai trò
                </th>
                <th scope="col" class="px-6 py-3">
                    #
                </th>
            </tr>
        </thead>
        <tbody class="hover:bg-gray-100">

           

           

            <?php
            if (!empty ($listAcc)) {
                foreach ($listAcc as $value) {
                    echo ' <tr class="bg-white border-b px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    <td scope="row" class="px-6 py-4">' . $value['id'] . '</td>
                    <td class="px-6 py-4"> <div class="flex items-center gap-4">
   <img class="w-10 h-10 rounded-full" src="../uploads/' . $value['avatar'] . '" alt="">
   <div class="font-medium">
       <div>' . $value['name'] . '</div>
       <div class="text-sm text-gray-500 ">' . $value['email'] . '</div>
   </div>
</div></td>
                    <td class="px-6 py-4">' . $value['avatar'] . '</td>
                    <td class="px-6 py-4">' . $value['phone'] . '</td>
                    <td class="px-6 py-4">' . $value['email'] . '</td>
                    <td class="px-6 py-4">' . $value['is_admin'] . '</td>

                    <td class="px-6 py-4"><a href="index.php?act=editAcc&id=' . $value['id'] . '"><input type="button" value="Sửa" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"></a> 
                     <a href="index.php?act=deleteAcc&id=' . $value['id'] . '" onclick="return confirm(\'Bạn muốn xóa ?\')"><input type="button" value="Xóa"  class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"></a></td>
                </tr>';
                }
            } else {
                echo '<tr><td colspan="4" style="text-align: center">No data available</td></tr>';
            }
            ?>
        </tbody>
    </table>
</div>