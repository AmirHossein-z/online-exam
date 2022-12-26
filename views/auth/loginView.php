<main>
    <section class="relative w-full h-full py-40 min-h-screen">
        <div class="absolute top-0 w-full h-full bg-blueGray-800 bg-full bg-no-repeat"
            style="background-image: url(<?php echo URL ?>public/images/register_bg_2.png)"></div>
        <div class="container mx-auto px-4 h-full">
            <div class="flex content-center items-center justify-center h-full">
                <div class="w-full lg:w-6/12 px-4">
                    <div
                        class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-200 border-0">
                        <div class="flex justify-center gap-6 rounded-t mb-0 px-6 py-6">
                            <div class="text-center cursor-pointer">
                                <h6 class="text-blueGray-200 bg-blueGray-800 text-sm font-bold p-2 rounded-md transition-all duration-150"
                                    id="signup_student">
                                    ورود دانشجو
                                </h6>
                            </div>
                            <div class="text-center cursor-pointer">
                                <h6 class="text-blueGray-800 text-sm font-bold p-2 rounded-md transition-all duration-150"
                                    id="signup_teacher">
                                    ورود استاد
                                </h6>
                            </div>
                            <hr class="mt-6 border-b-1 border-blueGray-300" />
                        </div>
                        <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                            <form method="post" action="<?php echo URL ?>auth/login_user" id="signup_form_student"
                                class="transition-all duration-150 ease-linear">
                                <div class="relative w-full mb-3">
                                    <label class="block text-blueGray-600 text-xs font-bold mb-2" htmlFor="email">
                                        ایمیل
                                    </label>
                                    <input type="email" name="email" required
                                        class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                        placeholder="ایمیل" />
                                </div>
                                <div class="relative w-full mb-3">
                                    <label class="block text-blueGray-600 text-xs font-bold mb-2"
                                        htmlFor="grid-password">
                                        پسورد
                                    </label>
                                    <input type="password" name="password" required
                                        class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                        placeholder="پسورد" />
                                </div>
                                <div class="relative w-full mb-3">
                                    <input type="text" name="type" value="student" hidden>
                                </div>
                                <div class="text-center mt-6">
                                    <button
                                        class="bg-blueGray-800 text-white active:bg-blueGray-600 text-sm font-bold px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full ease-linear transition-all duration-150"
                                        type="submit">
                                        ورود به عنوان دانشجو
                                    </button>
                                </div>
                            </form>

                            <form method="post" action="<?php echo URL ?>auth/login_user" id="signup_form_teacher"
                                class="hidden">
                                <div class="relative w-full mb-3">
                                    <label class="block text-blueGray-600 text-xs font-bold mb-2" htmlFor="email">
                                        ایمیل
                                    </label>
                                    <input type="email" name="email"
                                        class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                        placeholder="ایمیل" />
                                </div>

                                <div class="relative w-full mb-3">
                                    <label class="block text-blueGray-600 text-xs font-bold mb-2"
                                        htmlFor="grid-password">
                                        پسورد
                                    </label>
                                    <input type="password" name="password"
                                        class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                        placeholder="پسورد" />
                                </div>
                                <div class="relative w-full mb-3">
                                    <input type="text" name="type" value="master" hidden>
                                </div>
                                <div class="text-center mt-6">
                                    <button
                                        class="bg-blueGray-800 text-white active:bg-blueGray-600 text-sm font-bold px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full ease-linear transition-all duration-150"
                                        type="submit">
                                        ورود به عنوان استاد
                                    </button>
                                </div>
                            </form>
                            <div>
                                <h2 class="block text-blueGray-600 text-sm text-center my-4">
                                    حساب کاربری ندارید؟
                                    <a class="underline font-bold hover:text-blueGray-800 transition-all duration-300 cursor-pointer"
                                        href="<?php echo URL . 'auth/register' ?>"> ثبت نام کنید</a>
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class=" absolute w-full bottom-0 bg-blueGray-800 pb-6">
            <div class="container mx-auto px-4">
                <hr class="mb-6 border-b-1 border-blueGray-600" />
                <div class="flex flex-wrap items-center md:justify-between justify-center">
                    <div class="w-full md:w-4/12 px-4">
                        <div class="text-sm text-white font-semibold py-1 text-center md:text-left">
                            Copyright © <span id="get-current-year"></span>
                            <a href="https://www.creative-tim.com?ref=njs-register"
                                class="text-white hover:text-blueGray-300 text-sm font-semibold py-1">Creative
                                Tim</a>
                        </div>
                    </div>
                    <div class="w-full md:w-8/12 px-4">
                        <ul class="flex flex-wrap list-none md:justify-end justify-center">
                            <li>
                                <a href="https://www.creative-tim.com?ref=njs-register"
                                    class="text-white hover:text-blueGray-300 text-sm font-semibold block py-1 px-3">Creative
                                    Tim</a>
                            </li>
                            <li>
                                <a href="https://www.creative-tim.com/presentation?ref=njs-register"
                                    class="text-white hover:text-blueGray-300 text-sm font-semibold block py-1 px-3">About
                                    Us</a>
                            </li>
                            <li>
                                <a href="http://blog.creative-tim.com?ref=njs-register"
                                    class="text-white hover:text-blueGray-300 text-sm font-semibold block py-1 px-3">Blog</a>
                            </li>
                            <li>
                                <a href="https://github.com/creativetimofficial/notus-js/blob/main/LICENSE.md?ref=njs-register"
                                    class="text-white hover:text-blueGray-300 text-sm font-semibold block py-1 px-3">MIT
                                    License</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </section>
</main>