<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap"
        rel="stylesheet">
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

    <!-- font -->
    <!-- <link rel="stylesheet" href="css/fontawesome/css/all.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css -->
    <link rel="stylesheet" href="css/view/index.css">

    <!-- slide -->

</head>

<!-- font-[Poppins] -->

<body class="">
    <header class="bg-white">
        <nav class="container-content flex justify-between items-center">
            <div>
                <img class="w-16 cursor-pointer" src="https://cdn-icons-png.flaticon.com/512/5968/5968204.png"
                    alt="...">
            </div>
            <div
                class="nav-links duration-500 md:static absolute bg-white  md:min-h-fit min-h-[60vh] left-0 top-[-100%] md:w-auto  flex items-center px-5">
                <ul class="flex md:flex-row flex-col md:items-center md:gap-7 gap-4">
                    <li>
                        <a class="hover:text-gray-500" href="index.php">Trang chủ</a>
                    </li>
                    <li>
                        <a class="hover:text-gray-500" href="index.php?act=sanpham">sanpham</a>
                    </li>
                    <li>
                        <a class="hover:text-gray-500" href="index.php?act=tacgia">Tác giả</a>
                    </li>
                    <li>
                        <a class="hover:text-gray-500" href="index.php?act=nhaxuatban">Nhà xuất bản</a>
                    </li>
                    <li>
                        <div class="relative ">
                            <!-- <a id="dropdownButton" class=" cursor-pointer m-7 md:m-0 hover:text-cyan-400 hover:underline 
                            transition duration-400 ease-in">Danh Mục <i class="fa-solid fa-chevron-down"></i></a> -->

                            <select id="countries" name="nha_san_xuat_id" class="cursor-pointer m-7 md:m-0 hover:text-cyan-400 hover:underline 
                            transition duration-400 ease-in">
                                <option selected>Danh mục</option>
                                <?php
                                foreach ($listDm as $key => $value) {
                                    echo '<option value="' . $value["id"] . '">' . $value["name"] . '</option>';
                                } ?>
                            </select>
                            <!-- <ul id="dropdownMenu"
                                class="absolute hidden mt-2 py-2 w-32 bg-white rounded-md shadow-md z-10">
                                <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Option 1</a>
                                </li>
                                <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Option 2</a>
                                </li>
                                <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Option 3</a>
                                </li>
                            </ul> -->
                        </div>
                    </li>
                </ul>
            </div>
            <div class="flex items-center gap-6">
                <form action="index.php?act=sanpham" method="post">
                    <input type="text" name="kyw" placeholder="Tìm kiếm"
                        class="border border-gray-400 p-2 rounded-md text-xs">
                    <input type="submit" name="submit" value="Tìm"
                        class="bg-red-500 text-white px-2 text-sm py-1 rounded ">
                </form>
                <div>
                    <a href="#" class="flex flex-col justify-center items-center"><i
                            class="fa-solid fa-cart-shopping"></i>
                        <div class="text-xs mt-1">Giỏ hàng</div>
                    </a>
                </div>
                <div>
                    <a href="#" class="flex flex-col justify-center items-center"><i class="fa-regular fa-user"></i>
                        <div class="text-xs mt-1">Đăng nhập</div>
                    </a>
                </div>
            </div>
    </header>