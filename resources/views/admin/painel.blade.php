<?php
require __DIR__ . '/../../database/connection.php';

// Total de usuários
$usuariosResult = mysqli_query($connection, "SELECT COUNT(*) as total FROM users");
$totalUsuarios = mysqli_fetch_assoc($usuariosResult)['total'] ?? 0;

// Total de solicitações: apenas resíduos com status pendente
$solicitacoesResult = mysqli_query($connection, "SELECT COUNT(*) as total FROM residuos WHERE status = 'pendente'");
$totalSolicitacoes = mysqli_fetch_assoc($solicitacoesResult)['total'] ?? 0;

// Materiais aceites: resíduos com status = aceite
$materiaisAceitesResult = mysqli_query($connection, "SELECT COUNT(*) as total FROM residuos WHERE status = 'aceite'");
$materiaisAceites = mysqli_fetch_assoc($materiaisAceitesResult)['total'] ?? 0;

// Materiais rejeitados: resíduos com status = rejeitado
$materiaisRejeitadosResult = mysqli_query($connection, "SELECT COUNT(*) as total FROM residuos WHERE status = 'rejeitado'");
$materiaisRejeitados = mysqli_fetch_assoc($materiaisRejeitadosResult)['total'] ?? 0;

// Últimas notificações (5 mais recentes)
$notificacoesResult = mysqli_query($connection, "SELECT mensagem FROM notificacoes ORDER BY created_at DESC LIMIT 5");
$notificacoes = [];
while ($row = mysqli_fetch_assoc($notificacoesResult)) {
    $notificacoes[] = $row['mensagem'];
}
?>

<div class="h-full w-full p-8 overflow-y-auto">
    <div class="flex flex-wrap justify-center w-full gap-8">

        <article class="flex flex-col items-center grow max-w-48 h-48 shadow p-4 bg-gray-50">
            <i class="ri-user-fill flex items-center justify-center text-2xl size-8 bg-indigo-600/30 text-indigo-600 rounded-full"></i>
            <h2 class="text-2xl font-bold text-indigo-600"><?= $totalUsuarios ?></h2>
            <p>usuários</p>
        </article>

        <article class="flex flex-col items-center grow max-w-48 h-48 shadow p-4 bg-gray-50">
            <i class="ri-message-fill flex items-center justify-center text-2xl size-8 bg-yellow-600/30 text-yellow-600 rounded-full"></i>
            <h2 class="text-2xl font-bold text-yellow-600"><?= $totalSolicitacoes ?></h2>
            <p>solicitações pendentes</p>
        </article>

        <article class="flex flex-col items-center grow max-w-48 h-48 shadow p-4 bg-gray-50">
            <i class="ri-recycle-fill flex items-center justify-center text-2xl size-8 bg-green-600/30 text-green-600 rounded-full"></i>
            <h2 class="text-2xl font-bold text-green-600"><?= $materiaisAceites ?></h2>
            <p>materiais aceites</p>
        </article>

        <article class="flex flex-col items-center grow max-w-48 h-48 shadow p-4 bg-gray-50">
            <i class="ri-close-fill flex items-center justify-center text-2xl size-8 bg-red-600/30 text-red-600 rounded-full"></i>
            <h2 class="text-2xl font-bold text-red-600"><?= $materiaisRejeitados ?></h2>
            <p>materiais rejeitados</p>
        </article>

    </div>
</div>
