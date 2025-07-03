<?php
require __DIR__ . '/../../database/connection.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Atualizar status
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['residuo_id'], $_POST['novo_status'])) {
    $id = $_POST['residuo_id'];
    $visualStatus = $_POST['novo_status'];

    $statusMap = [
        'pendente' => 'pendente',
        'aceite' => 'aceite',
        'rejeitado' => 'rejeitado'
    ];

    $status = $statusMap[$visualStatus] ?? 'pendente';

    $stmt = $connection->prepare("UPDATE residuos SET status = ? WHERE id = ?");
    $stmt->bind_param("si", $status, $id);
    $stmt->execute();
    $stmt->close();
}

// Buscar resíduos
$residuos = [];
$result = mysqli_query($connection, "SELECT * FROM residuos");
while ($row = mysqli_fetch_assoc($result)) {
    $residuos[] = $row;
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Admin - Resíduos</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
</head>
<body class="bg-gray-300 text-gray-700">

<div class="flex w-full h-screen gap-1 overflow-hidden">

    <!-- Sidebar -->
    <aside class="flex flex-col w-64 h-full bg-gray-50 p-4 overflow-y-auto">
        <img src="public/Recicla.png" alt="logomark" class="size-12 mb-2">
        <h1 class="text-gray-700 text-xl mb-6">Admin</h1>
        <nav class="w-full">
            <ul class="flex flex-col gap-4">
                <li><a href="dashboard" class="flex items-center gap-2 p-2 rounded-2xl bg-gray-500/10 hover:bg-primary hover:text-white"><i class="ri-home-line"></i> Painel</a></li>
                <li><a href="envios" class="flex items-center gap-2 p-2 rounded-2xl bg-gray-500/10 hover:bg-primary hover:text-white"><i class="ri-mail-line"></i> Envios</a></li>
                <li><a href="dashboard" class="flex items-center gap-2 p-2 rounded-2xl bg-gray-500/10 hover:bg-primary hover:text-white"><i class="ri-global-line"></i> Estatísticas</a></li>
                <li><a href="dashboard" class="flex items-center gap-2 p-2 rounded-2xl bg-gray-500/10 hover:bg-primary hover:text-white"><i class="ri-user-2-line"></i> Usuários</a></li>
                <li><a href="sair" class="flex items-center gap-2 p-2 rounded-2xl text-red-500 bg-gray-500/10 hover:bg-red-500/30"><i class="ri-logout-box-line"></i> Terminar sessão</a></li>
            </ul>
        </nav>
    </aside>

    <!-- Main -->
    <main class="flex flex-col grow bg-gray-200 overflow-hidden">

        <!-- Header -->
        <header class="flex items-center justify-between h-16 shadow px-4 bg-gray-50">
            <a href="#" class="relative flex items-center justify-center size-8 rounded-full bg-gray-200">
                <i class="ri-notification-line"></i>
                <span class="absolute left-0 -top-1 size-4 text-xs flex items-center justify-center rounded-full bg-red-500 text-white">5</span>
            </a>
            <span class="flex items-center gap-2 text-gray-500">
                <i class="ri-time-line"></i> <?= date('H:i') ?>
                <i class="ri-timer-flash-line"></i> <?= date('d/m/y') ?>
            </span>
        </header>

        <!-- Tabela -->
        <section class="flex-1 p-4 overflow-auto">
            <div class="rounded-md shadow border border-gray-200 overflow-y-auto max-h-[600px]">
                <table class="w-full min-w-[800px] text-sm">
                    <thead class="bg-gray-50 sticky top-0 z-10">
                        <tr class="h-11">
                            <th class="text-left p-2">Código</th>
                            <th class="text-left p-2">Tipo</th>
                            <th class="text-left p-2">Status</th>
                            <th class="text-left p-2">Quantidade</th>
                            <th class="text-left p-2">Localização</th>
                            <th class="text-left p-2">Data</th>
                            <th class="text-left p-2">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($residuos as $residuo): ?>
                            <?php
                            $status = $residuo['status'] ?? 'pendente';
                            $cor = match ($status) {
                                'pendente' => 'bg-yellow-100 text-yellow-700',
                                'aceite' => 'bg-green-100 text-green-700',
                                'rejeitado' => 'bg-red-100 text-red-700',
                                default => 'bg-gray-100 text-gray-700'
                            };
                            ?>
                            <tr class="bg-gray-100 hover:bg-gray-200 transition">
                                <td class="p-2"><?= $residuo['id'] ?></td>
                                <td class="p-2"><?= $residuo['tipo_material'] ?></td>
                                <td class="p-2"><span class="px-2 py-1 text-xs rounded-full font-semibold <?= $cor ?>"><?= ucfirst($status) ?></span></td>
                                <td class="p-2"><?= $residuo['quantidade_estimada_kg'] ?> kg</td>
                                <td class="p-2"><?= $residuo['localizacao'] ?></td>
                                <td class="p-2"><?= $residuo['created_at'] ?></td>
                                <td class="p-2">
                                    <button onclick='abrirModal(<?= json_encode($residuo) ?>)' class="text-blue-500 flex items-center gap-1">
                                        <i class="ri-eye-line"></i> Ver
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
</div>

<!-- Modal -->
<div id="modal" class="fixed inset-0 bg-black/50 z-50 flex items-center justify-center hidden">
    <div class="bg-white rounded-lg p-6 w-full max-w-md">
        <h2 class="text-xl font-semibold mb-4">Detalhes do Resíduo</h2>
        <div class="space-y-2 mb-4 text-sm">
            <p><strong>Tipo:</strong> <span id="modal-tipo"></span></p>
            <p><strong>Estado:</strong> <span id="modal-estado" class="px-2 py-1 text-xs rounded-full font-semibold inline-block"></span></p>
            <p><strong>Quantidade:</strong> <span id="modal-quantidade"></span> kg</p>
            <p><strong>Localização:</strong> <span id="modal-localizacao"></span></p>
        </div>
        <form method="POST" class="flex flex-col gap-2">
            <input type="hidden" name="residuo_id" id="modal-id">
            <label for="novo_status">Novo status:</label>
            <select name="novo_status" id="modal-status" class="border rounded p-2"></select>
            <div class="flex justify-between mt-4">
                <button id="modal-submit" type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Atualizar</button>
                <button type="button" onclick="fecharModal()" class="text-gray-600 hover:underline">Fechar</button>
            </div>
        </form>
    </div>
</div>

<script>
function abrirModal(residuo) {
    const corMap = {
        'pendente': 'bg-yellow-100 text-yellow-700',
        'aceite': 'bg-green-100 text-green-700',
        'rejeitado': 'bg-red-100 text-red-700'
    };

    const status = residuo.status || 'pendente';
    const cor = corMap[status];

    document.getElementById('modal-id').value = residuo.id;
    document.getElementById('modal-tipo').textContent = residuo.tipo_material;
    document.getElementById('modal-quantidade').textContent = residuo.quantidade_estimada_kg || '0';
    document.getElementById('modal-localizacao').textContent = residuo.localizacao || '---';

    const estadoSpan = document.getElementById('modal-estado');
    estadoSpan.textContent = status.charAt(0).toUpperCase() + status.slice(1);
    estadoSpan.className = 'px-2 py-1 text-xs rounded-full font-semibold inline-block ' + cor;

    const select = document.getElementById('modal-status');
    select.innerHTML = `
        <option value="pendente">Pendente</option>
        <option value="aceite">Aceite</option>
        <option value="rejeitado">Rejeitado</option>
    `;
    select.value = status;
    select.disabled = (status !== 'pendente');

    const submitBtn = document.getElementById('modal-submit');
    submitBtn.disabled = (status !== 'pendente');
    submitBtn.classList.toggle('opacity-50', status !== 'pendente');
    submitBtn.classList.toggle('cursor-not-allowed', status !== 'pendente');

    document.getElementById('modal').classList.remove('hidden');
}

function fecharModal() {
    document.getElementById('modal').classList.add('hidden');
}
</script>

</body>
</html>