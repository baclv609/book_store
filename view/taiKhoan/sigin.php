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

            <form action="index.php?act=dangky" method="post" class="flex flex-col gap-4">
                <input class="p-2 mt-8 rounded-xl border" type="text" name="name" placeholder="User name">
                <span style="color: red">
                    <?= $errDangKyuser ?>
                </span> <br>
                <input class="p-2  rounded-xl border" type="email" name="email" placeholder="Email">
                <span style="color: red">
                    <?= $errDangKyemail ?>
                </span> <br>
                <div class="relative">
                    <input class="p-2 rounded-xl border w-full" type="password" name="password" placeholder="Password">
                    <span style="color: red">
                    <?= $errDangKyemail ?>
                </span> <br>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="gray"
                        class="bi bi-eye absolute top-1/2 right-3 -translate-y-1/2" viewBox="0 0 16 16">
                        <path
                            d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                        <path
                            d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                    </svg>
                </div>
                
                <button type="submit" name="submit"
                    class="bg-[#002D74] rounded-xl text-white py-2 hover:scale-105 duration-300">Đăng ký</button>
            </form>
            <h4 style="color:red">
                <?php if (isset ($thongBao)) {
                    echo $thongBao;
                } ?>
            </h4>
            <!-- <div class="mt-6 grid grid-cols-3 items-center text-gray-400">
                <hr class="border-gray-400">
                <p class="text-center text-sm">HOẶC</p>
                <hr class="border-gray-400">
            </div> -->

            <div class="mt-5 text-xs border-b border-[#002D74] py-4 text-[#002D74]">
                <a href="#">Quên mật khẩu?</a>
            </div>

            <div class="mt-3 text-xs flex justify-between items-center text-[#002D74]">
                <p>Bạn đã có tài khoản?</p>
                <button class="py-2 px-4 bg-white border rounded-xl hover:scale-110 duration-300">Đăng nhập
                    ngay</button>
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