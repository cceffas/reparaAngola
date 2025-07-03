<?php 
require __DIR__.'/../controller/userController.php';

include 'layouts/header.php';
 ?>



<main class=" flex items-center flex-col w-full bg-primary gap-16 py-20 px-2 md:px-0">


    <section class="container mt-10">
        <div class=" flex items-center justify-between ">
            <a href="perfil" class="btn secondary">
                <i class="ri-arrow-left-s-line"></i> Voltar
            </a>
            <h1 class="text-white text-2xl font-bold">
                <i class="ri-user-line"></i> editar perfil
            </h1>
        </div>

    </section>


    <section class="container flex flex-col  items-center min-h-screen p-4 ">




        <div class="bg-white rounded-3xl p-6 w-full max-w-lg shadow-2xl text-gray-700">

            <div class="text-center mb-6">
                <h1 class="text-2xl font-bold text-gray-800 mb-2">Editar Perfil</h1>
                <p class="text-gray-400 text-sm"> Atualize suas informações </p>
            </div>

            <!-- Formulario -->
            <form class="space-y-4" method="post" action="auth">

                <input type="hidden" name="action" value="update">

                <div class="space-y-1">
                    <label for="name" class="flex items-center gap-2 text-gray-700 font-medium text-sm">
                        <i class="ri-user-line"></i>
                        Nome Completo
                    </label>
                    <input name='nome'
                        type="text" class="w-full p-3 bg-gray-200 rounded-xl text-gray-800 placeholder-gray-400 focus:outline-none focus:border-green-500 text-sm" placeholder="Digite seu nome completo" value="<?= $dados['nome'] ?>">
                </div>

                <div class="space-y-1">
                    <label for="email" class="flex items-center gap-2 text-gray-700 font-medium text-sm">
                        <i class="ri-mail-line"></i>
                        Email
                    </label>
                    <input name="email"
                        type="email" class="w-full p-3 bg-gray-200 rounded-xl text-gray-800 placeholder-gray-400 focus:outline-none focus:border-green-500 text-sm" placeholder="Digite seu email" value="<?= $dados['email'] ?>">
                </div>

                <div class="space-y-1">
                    <label for="phone" class="flex items-center gap-2 text-gray-700 font-medium text-sm">
                        <i class="ri-phone-line"></i>
                        Telefone
                    </label>
                    <input
                        name="telefone"
                        type="tel"
                        class="w-full p-3 bg-gray-200 rounded-xl text-gray-800 placeholder-gray-400 focus:outline-none focus:border-green-500 text-sm" placeholder="Digite seu número de telefone" value="<?= $dados['telefone'] ?? 99999999 ?>">
                </div>

                <div class="space-y-1">
                    <label for="location" class="flex items-center gap-2 text-gray-700 font-medium text-sm">
                        <i class="ri-map-pin-line"></i>
                        Província
                    </label>
                    <select 
                    name="local" class="w-full p-3 bg-gray-200 rounded-xl text-gray-800 focus:outline-none focus:border-green-500 text-sm">
                        <option value="">Selecione uma província</option>
                        <option value="Bengo">Bengo</option>

                        <option value="<?= $dados['localizacao'] ?>" selected>
                            <?= $dados['localizacao'] ?>
                        </option>

                        <option value="Benguela">Benguela</option>
                        <option value="Bié">Bié</option>
                        <option value="Cabinda">Cabinda</option>
                        <option value="Cuando Cubango">Cuando Cubango</option>
                        <option value="Cuanza Norte">Cuanza Norte</option>
                        <option value="Cuanza Sul">Cuanza Sul</option>
                        <option value="Cunene">Cunene</option>
                        <option value="Huambo">Huambo</option>
                        <option value="Huíla">Huíla</option>
                        <option value="Luanda">Luanda</option>
                        <option value="Lunda Norte">Lunda Norte</option>
                        <option value="Lunda Sul">Lunda Sul</option>
                        <option value="Malanje">Malanje</option>
                        <option value="Moxico">Moxico</option>
                        <option value="Namibe">Namibe</option>
                        <option value="Uíge">Uíge</option>
                        <option value="Zaire">Zaire</option>
                    </select>
                </div>

                <!-- Botões -->
                <div class="flex gap-3 pt-4">

                    <button
                        type="submit"
                        class="btn primary ml-auto">
                        salvar alterações
                    </button>
                </div>
            </form>
        </div>
    </section>
</main>

<?php include 'layouts/footer.php'; ?>