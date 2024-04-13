<section class="bg-gray-50 min-h-screen flex items-center justify-center">
    <!-- login container -->
    <div class="bg-gray-100 flex rounded-2xl shadow-lg max-w-3xl p-5 items-center">
        <!-- form -->
        <?php
        if (isset($_SESSION['user']) && (is_array($_SESSION['user']))) {
            extract($_SESSION['user']);
        }
        // var_dump($_SESSION['user']);
        // die;
        ?>
        <?php
        if (isset($_SESSION['thongbao'])) {
            $thongbao = $_SESSION['thongbao'];
            unset($_SESSION['thongbao']);
        }
        ?>
        <div class=" px-8 md:px-14">
            <h2 class="font-bold text-2xl text-[#002D74]">Cập nhật tài khoản</h2>
            <br>
            <form class="max-w-md mx-auto" action="index.php?act=edittk" method="post" enctype="multipart/form-data">
                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="text" name="name"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-non focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " required value="<?= $name ?>" />
                        <label for="floating_first_name"
                            class="peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">User
                            name</label>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="tel" name="phone" id="floating_phone" value="<?= $phone ?>"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-non focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " />
                        <label
                            class="peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Số
                            điện thoại</label>

                    </div>
                </div>

                <div class="relative z-0 w-full mb-5 group">
                    <input type="email" name="email" value="<?= $email ?>"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-non focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required />

                    <label for="floating_email"
                        class="peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email</label>
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <input type="password" name="password" value="<?= $password ?>"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-non focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required />
                    <label for="floating_password"
                        class="peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>
                </div>

                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="dia_chi" value="<?= $dia_chi ?>"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-non focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " />
                    <label for="floating_repeat_password"
                        class="peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Địa
                        chỉ</label>
                </div>

                <div class="grid md:grid-cols-2 md:gap-6">
                    <!-- image -->
                    <div class="w-full mb-5">
                        <input name="img"
                            class="block w-full h-full  text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50"
                            type="file">
                    </div>
                </div>
                <br>
                <div class="relative z-0 w-full mb-5 group">
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <button type="submit" name="submit"
                        class="bg-[#002D74] w-full rounded-xl text-white py-2 hover:scale-105 duration-300">Cập
                        nhật</button>
                </div>
            </form>
            <p class="text-red-500 text-[13px] pl-2">
                <?php
                if (isset($thongbao) && $thongbao != "") {
                    echo $thongbao;
                }
                ?>
            </p>
        </div>


    </div>
</section>