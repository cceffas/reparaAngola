<?php

require __DIR__ . '/../../database/connection.php';
require_once __DIR__ . '/../../database/orm.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$users = findAll('users', $connection);

?>

<div class="flex w-full h-screen gap-1 bg-gray-300 text-gray-700">
    <aside class="flex items-center flex-col w-64 h-full bg-gray-50 p-4">
        <img src="public/Recicla.png" alt="logomark" class="size-12">
        <h1 class="text-gray-700">Admin</h1>

        <nav class="mt-10 w-full">
            <ul class="flex flex-col gap-4 w-full">
                <li><a href="dashboard" class="transition-colors flex items-center gap-2 h-11 p-2 w-full rounded-2xl text-gray-700 bg-gray-500/10 capitalize hover:bg-primary hover:text-white group"><i class="ri-home-line"></i> painel</a></li>
                <li><a href="envios" class="transition-colors flex items-center gap-2 h-11 p-2 w-full rounded-2xl text-gray-700 bg-gray-500/10 capitalize hover:bg-primary hover:text-white group"><i class="ri-mail-line"></i> envios</a></li>
                <li><a href="estatisticas" class="transition-colors flex items-center gap-2 h-11 p-2 w-full rounded-2xl text-gray-700 bg-gray-500/10 capitalize hover:bg-primary hover:text-white group"><i class="ri-global-line"></i> estatísticas</a></li>
                <li><a href="usuarios" class="transition-colors flex items-center gap-2 h-11 p-2 w-full rounded-2xl bg-primary text-white group"><i class="ri-user-2-line"></i> usuários</a></li>
                <li><a href="sair" class="mt-4 transition-colors flex items-center gap-2 h-11 p-2 w-full rounded-2xl text-red-500 bg-gray-500/10 capitalize hover:bg-red-500/30 group"><i class="ri-logout-box-line"></i> terminar sessão</a></li>
            </ul>
        </nav>
    </aside>

    <main class="flex flex-col grow w-full bg-gray-200 gap-1 overflow-hidden">
        <header class="flex items-center justify-between w-full h-16 shadow px-4 bg-gray-50">
            <a href="dashboard/notifications" class="relative flex items-center justify-center size-8 rounded-full bg-gray-200">
                <i class="ri-notification-line"></i>
                <span class="absolute flex items-center justify-center left-0 -top-1 rounded-full size-4 bg-red-500 text-white text-xs">5</span>
            </a>

            <span class="flex items-center gap-2 p-2 shadow text-gray-500">
                <i class="ri-time-line"></i> <?= date('H:i') ?>
                <i class="ri-timedate-line"></i> <?= date('d/m/y') ?>
            </span>
        </header>

        <section class="flex items-center justify-center grow p-4">
            <div class="flex flex-col h-full w-full gap-4 p-8">
                <div class="overflow-y-auto max-h-[500px] rounded-md shadow border border-gray-200">
                    <table class="w-full border-separate text-sm">
                        <thead class="bg-gray-50 sticky top-0 z-10">
                            <tr class="h-11 text-left">
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Tipo</th>
                                <th>Telefone</th>
                                <th>Localização</th>
                                <th>Criado em</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($users)): ?>
                                <?php foreach ($users as $user): ?>
                                    <tr class="h-11 bg-gray-100 hover:bg-gray-200 transition">
                                        <td><?= htmlspecialchars($user['id']) ?></td>
                                        <td><?= htmlspecialchars($user['nome']) ?></td>
                                        <td><?= htmlspecialchars($user['email']) ?></td>
                                        <td><?= htmlspecialchars($user['tipo_usuario']) ?></td>
                                        <td><?= htmlspecialchars($user['telefone'] ?? '-') ?></td>
                                        <td><?= htmlspecialchars($user['localizacao'] ?? '-') ?></td>
                                        <td><?= htmlspecialchars(date('d/m/Y H:i', strtotime($user['created_at']))) ?></td>
                                        <td>
                                            <a href="#" class="text-blue-500 flex items-center gap-1"><i class="ri-eye-line"></i> Ver</a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            <?php else: ?>
                                <tr class="h-24 text-center">
                                    <td colspan="9" class="p-4">Nenhum usuário encontrado.</td>
                                </tr>
                            <?php endif ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>
</div>