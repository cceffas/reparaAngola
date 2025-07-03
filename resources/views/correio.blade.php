<?php
$connection = null;

try {
    $connection = mysqli_connect("localhost", "root", "", "sr");

} catch (\Throwable $th) {

    echo "404";
}
session_start();
include 'layouts/header.php';

// Buscar mensagens para o usuário logado
$sql = "SELECT * FROM mensagens WHERE user_id = ? ORDER BY created_at DESC";
$stmt = $connection->prepare($sql);
$stmt->bind_param('i', $userId);
$stmt->execute();
$result = $stmt->get_result();
?>

<main class="relative flex flex-col items-center w-full gap-4 min-h-screen bg-teal-800 overflow-hidden pb-10 px-2 md:px-0">
    <img src="public/image/Reciclagem-mecanica.jpg" alt="bg" class="fixed object-cover h-[50%] opacity-5 z-0">

    <section class="container flex flex-col gap-4 min-h-96 z-10 mt-20 rounded-2xl">
        <div class="flex">
            <a href="perfil" class="btn secondary mr-auto"> <i class="ri-arrow-left-s-line"></i> Voltar</a>
        </div>

        <div class="rounded-2xl overflow-hidden">
            <table class="bg-white text-gray-500 h-32 w-full">
                <thead class="text-left bg-gray-400 text-white">
                    <tr class="h-11">
                        <th class="p-2">Mensagem</th>
                        <th class="p-2">Data</th>
                        <th class="p-2">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result->num_rows > 0): ?>
                        <?php while ($mensagem = $result->fetch_assoc()): ?>
                            <tr class="odd:bg-gray-100 even:bg-gray-200 hover:bg-blue-500/30 group">
                                <td class="p-2 text-gray-700 group-hover:text-blue-500">
                                    <i class="ri-mail-line mr-1"></i>
                                    <?= htmlspecialchars($mensagem['mensagem']) ?><br>
                                    <small class="text-xs text-gray-500">Local: <?= htmlspecialchars($mensagem['local_coleta']) ?> | Coleta: <?= $mensagem['data_coleta'] ?> às <?= $mensagem['hora_coleta'] ?></small>
                                </td>

                                <td class="p-2"><?= date('d-m-Y H:i:s', strtotime($mensagem['created_at'])) ?></td>

                                <td class="p-2">
                                    <form action="apagar-correio.php" method="POST">
                                        <input type="hidden" name="id" value="<?= $mensagem['id'] ?>">
                                        <button class="text-red-500 hover:bg-rose-500/50"><i class="ri-delete-bin-line"></i></button>
                                    </form>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="3" class="text-center p-4 text-gray-400">Nenhuma mensagem recebida até agora.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>
</main>

<?php include 'layouts/footer.php'; ?>
