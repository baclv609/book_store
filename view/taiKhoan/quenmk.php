<section class="bg-gray-50 min-h-screen flex items-center justify-center">
    <!-- login container -->
    <div class="bg-gray-100 flex rounded-2xl shadow-lg max-w-3xl p-5 items-center">
        <!-- form -->
        <div class="md:w-1/2 px-8 md:px-16">
            <h2 class="font-bold text-2xl text-[#002D74]">Quên mật khẩu</h2>
            <p class="text-xs mt-4 text-[#002D74]">Nếu bạn chưa có tài khoản hãy đăng ký</p>

            <form action="index.php?act=quenmk" method="post" class="flex flex-col">
                <div class="flex flex-col">
                    <input class="p-2 mt-8 rounded-xl border" type="email" name="email" placeholder="Email"
                        value="<?= !empty($email) ? $email : null ?>">
                    <p class="text-red-500 text-[13px] pl-2 py-2">
                        <?= $errEmail ?><br>
                </div>

                <button name="guiemail" type="submit"
                    class="bg-[#002D74] rounded-xl text-white py-2 hover:scale-105 duration-300">Gửi mật khẩu</button>
            </form>
            <p class="text-red-500 text-[13px] pl-2">
                <?php
                if (isset($thongbao) && $thongbao != "") {
                    echo $thongbao;
                }
                ?>
            </p>

            <div class="mt-5 text-xs flex justify-between items-center text-[#002D74]">
                <p>Bạn đã có tài khoản?</p>
                <a href="index.php?act=dangnhap"
                    class="py-2 px-4 bg-white border rounded-xl hover:scale-110 duration-300">Đăng nhập ngay</a>
            </div>
        </div>

        <!-- image -->
        <div class="md:block hidden w-1/2">
            <img class="rounded-2xl"
                src="https://images.unsplash.com/photo-1616606103915-dea7be788566?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1887&q=80">
        </div>
    </div>
</section>