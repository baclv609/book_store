<section class="bg-gray-50 min-h-screen flex items-center justify-center">
    <!-- login container -->
    <div class="bg-gray-100 flex rounded-2xl shadow-lg max-w-3xl p-5 items-center">
        <!-- form -->

        <!-- image -->
        <div class="md:block hidden w-1/2">
            <img class="rounded-2xl"
                src="https://images.unsplash.com/photo-1544947950-fa07a98d237f?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTB8fGJvb2t8ZW58MHx8MHx8fDA%3D">
        </div>
        <div class="md:w-1/2 px-8 md:px-14">
            <h2 class="font-bold text-2xl text-[#002D74]">Đăng ký</h2>
            <p class="text-xs mt-4 text-[#002D74]">Nếu bạn đã có tài khoản hãy đăng nhập</p>

            <form action="index.php?act=dangky" method="post" class="flex flex-col ">
                <input class="p-2 mt-8 rounded-xl border" type="text" name="name" placeholder="User name">
                <p class="text-red-500 text-[13px] pl-2">
                    <?= $errDangKyuser ?>
                </p> <br>
                <input class="p-2  rounded-xl border" type="email" name="email" placeholder="Email">
                <p class="text-red-500 text-[13px] pl-2">
                    <?= $errDangKyemail ?>
                </p> <br>
                <div class="relative">
                    <input class="p-2 rounded-xl border w-full" type="password" name="password" placeholder="Password">

                    <p class="text-red-500 text-[13px] pl-2">
                        <?= $errDangKypass ?>
                    </p> <br>
                </div>

                <button type="submit" name="submit"
                    class="bg-[#002D74] rounded-xl text-white py-2 hover:scale-105 duration-300">Đăng ký</button>
            </form>
            <p class="text-red-500 text-[13px] pl-2">
                <?php
                if (isset ($thongbao) && $thongbao != "") {
                    echo $thongbao;
                }
                ?>
            </p>

            <div class="mt-5 text-xs border-b border-[#002D74] py-4 text-[#002D74]">
                <a href="index.php?act=quenmk">Quên mật khẩu?</a>
            </div>

            <div class="mt-3 text-xs flex justify-between items-center text-[#002D74]">
                <p>Bạn đã có tài khoản?</p>
                <a href="index.php?act=dangnhap"
                    class="py-2 px-4 bg-white border rounded-xl hover:scale-110 duration-300">Đăng nhập
                    ngay</a>
            </div>
        </div>


    </div>
</section>
<script>

    // Support Me 🙏🥰 

    kofiWidgetOverlay.draw('mohamedghulam', {
        'type': 'floating-chat',
        'floating-chat.donateButton.text': 'Support me',
        'floating-chat.donateButton.background-color': '#323842',
        'floating-chat.donateButton.text-color': '#fff'
    });
</script>