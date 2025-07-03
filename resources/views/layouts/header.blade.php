
    <header class="fixed top-0 left-0 h-16 flex items-center justify-center text-gray-800 z-20 w-full bg-white shadow">

        <div class="container flex items-center justify-between px-4 md:px-2">

            <a href="home">
                <img src="Recicla.png" alt="logomark" class="size-12">
            </a>

            <nav class="hidden md:flex items-center gap-10">
                <a class="hover:text-primary" href="sobre">Sobre</a>
                <a href="login" class="btn primary"><i class="ri-login-box-line"></i> login</a>
            </nav>




            <!-- menu android -->
            <button id="btn-menu" class="md:hidden hover:bg-gray-300 active:text-white active:bg-primary cursor-pointer p-2">
                <i class="ri-menu-line text-2xl"></i>
            </button>

            <nav class="hidden md:hidden absolute bg-white right-0 w-48 top-[100%] h-80 z-10 border-t p-4" id="menu-hamburger">

                <ul class="flex flex-col gap-4">

                    <li><a href="login" class="flex items-center p-2 gap-2 hover:bg-gray-300 "><i class="ri-login-box-line"></i>login</a></li>
                    <li><a href="sobre" class="flex items-center p-2 gap-2 hover:bg-gray-300 "><i class="ri-information-line"></i> Sobre</a></li>


                </ul>

            </nav>
        </div>
    </header>


