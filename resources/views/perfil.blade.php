<?php

require __DIR__ . '/../controller/userController.php';


?>


<?php include 'layouts/header.php' ?>

<main class="relative flex flex-col items-center w-full gap-4 min-h-screen bg-primary overflow-hidden px-2 md:px-0 py-20">

    <img src="public/image/Reciclagem-mecanica.jpg" alt="bg" class="fixed object-cover w-full h-[50%] opacity-5 z-0">




    <!-- end -->
    <section class="container flex flex-col h-80 bg-white rounded-2xl overflow-hidden z-10 mt-20">

        <div class="relative flex flex-col items-center justify-center gap-2 p-4 ">




            <div class="flex items-center justify-center size-24 border text-white rounded-full p-2 bg-slate-400 z-10 shadow">
                <i class="ri-user-line text-6xl text-white"></i>
            </div>

            <div class="flex flex-col items-center w-full text-gray-700 z-10">
                <h1><?= $dados['nome'] ?></h1>

                <h2 class="text-gray-500/50"><?= $dados['email'] ?></h2>
            </div>

        </div>


        <div class="flex justify-center gap-4 mt-auto ml-auto p-4  rounded-b-2xl">
            <a href="editar" class="btn primary">
                <i class="ri-edit-line mr-2"></i>editar
            </a>
        </div>
    </section>
    <!-- end -->

    <?php include __DIR__ . '/layouts/navbarProfile.php' ?>



</main>

<?php include 'layouts/footer.php' ?>