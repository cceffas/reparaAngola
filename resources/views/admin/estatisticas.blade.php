<?php
require __DIR__ . '/../../database/connection.php'; // ajuste manual como mencionou

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Consulta para contar resíduos por província (localização)
$query = "SELECT localizacao, COUNT(*) AS total FROM residuos GROUP BY localizacao ORDER BY total DESC";
$result = mysqli_query($connection, $query);

// Arrays para o gráfico
$labels = [];
$valores = [];

while ($row = mysqli_fetch_assoc($result)) {
    $labels[] = $row['localizacao'];
    $valores[] = (int) $row['total'];
}

// Transforma para JS
$labels_js = json_encode($labels);
$valores_js = json_encode($valores);
?>


<div class="flex w-full h-screen gap-1 bg-gray-300 text-gray-700">

    <aside class="flex items-center flex-col w-64 h-full bg-gray-50 p-4 ">

        <img src="public/Recicla.png" alt="logomark" class="size-12">
        <h1 class="text-gray-700">Admin</h1>
        <!-- end -->

        <nav class="mt-10 w-full">

            <ul class="flex flex-col gap-4 w-full">
                <li><a href="dashboard" class="transition-colors flex items-center gap-2 h-11 p-2 w-full rounded-2xl text-gray-700 bg-gray-500/10 capitalize hover:bg-primary hover:text-white group active:bg-blend-screen"><i class="group-hover:hidden ri-home-line"></i> painel <i class="group-hover:flex hidden ri-arrow-right-line ml-auto"></i> </a></li>
                <!-- end -->
                <li><a href="envios" class="transition-colors flex items-center gap-2 h-11 p-2 w-full rounded-2xl text-gray-700 bg-gray-500/10 capitalize hover:bg-primary hover:text-white group active:bg-blend-screen"><i class="group-hover:hidden ri-mail-line"></i> envios <i class="group-hover:flex hidden ri-arrow-right-line ml-auto"></i> </a></li>
                <!-- end -->
                <li><a href="estatisticas" class="bg-primary transition-colors flex items-center gap-2 h-11 p-2 w-full rounded-2xl text-white capitalize hover:bg-primary hover:text-white group active:bg-blend-screen"><i class="group-hover:hidden ri-global-line"></i>estatisticas<i class="group-hover:flex hidden ri-arrow-right-line ml-auto"></i> </a></li>
                <!-- end -->
                <li><a href="usuarios" class="transition-colors flex items-center gap-2 h-11 p-2 w-full rounded-2xl text-gray-700 bg-gray-500/10 capitalize hover:bg-primary hover:text-white group active:bg-blend-screen"><i class="group-hover:hidden ri-user-2-line"></i>usuarios<i class="group-hover:flex hidden ri-arrow-right-line ml-auto"></i> </a></li>
                <!-- end -->
                <li><a href="sair" class="mt-4 ransition-colors flex items-center gap-2 h-11 p-2 w-full rounded-2xl text-red-500 bg-gray-500/10 capitalize hover:bg-red-500/30 group active:bg-blend-screen"><i class="group-hover:hidden ri-logout-box-line"></i>terminar sessão<i class="group-hover:flex hidden ri-arrow-right-line ml-auto"></i> </a></li>
                <!-- end -->

            </ul>
        </nav>


    </aside>

    <!-- end -->


    <main class="flex flex-col grow w-full bg-gray-200 gap-1 overflow-hidden">


        <header class="flex items-center justify-between w-full h-16  shadow px-2 md:px-4 bg-gray-50">



            <a href="dashboard/notifications" class="relative flex items-center justify-center size-8 rounded-full bg-gray-200">
                <i class="ri-notification-line"></i>
                <span class="absolute flex items-center justify-center left-0 -top-1 rounded-full size-4 bg-red-500 text-white text-xs">5</span>
            </a>

            <span class=" flex items-center justify-center gap-2 p-2 shadow text-gray-500">
                <i class="ri-time-line"></i> <?= date('h:i') ?>
                <i class="ri-timedate-line"></i> <?= date('d/m/y') ?>
            </span>



        </header>
        <section class="flex items-center justify-center grow h-full p-4">
  <div class="w-full max-w-6xl bg-white p-6 rounded-2xl shadow-lg">
    <h2 class="text-xl font-semibold text-gray-700 mb-4">Usuários por Província de Angola (às 21h)</h2>
    <canvas id="userChart" class="w-full h-96"></canvas>
  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx = document.getElementById('userChart').getContext('2d');

  const userChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: <?= $labels_js ?>,
      datasets: [{
        label: 'Resíduos enviados ',
        data: <?= $valores_js ?>,
        backgroundColor: 'rgba(16, 185, 129, 0.8)',
        borderRadius: 5
      }]
    },
    options: {
      responsive: true,
      indexAxis: 'x',

      scales: {
        x: {
          beginAtZero: true,
          ticks: { color: '#4B5563' },
          grid: { color: '#E5E7EB' }
        },
        y: {
          ticks: { 
            stepSize:1,
            color: '#4B5563'
         },
          grid: { display: false }
        }
      },
      plugins: {
        legend: { display: false },
     
      }
    }
  });
</script>









    </main>

 

</div>