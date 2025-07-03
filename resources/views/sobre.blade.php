@extends('layouts.site')

@section('content')

<main class="relative flex flex-col items-center w-full min-h-screen bg-primary text-white md:px-0 py-20">


    <div class="absolute left-0 bottom-0 h-[60%] w-full bg-conic-0 from-secondary rounded-t-full blur-xs"></div>

    <div class="flex absolute top-0 left-0 w-full h-96 overflow-hidden blur-sm">

        <img src="public/image/60a55040d0c5ef59894d2324_Para o Blog já reduzida.jpg" alt="image" class="w-full grow opacity-20">

    </div>



    <section class=" container flex flex-col items-center my-20 gap-48 z-10 ">




        <div class="flex flex-col items-center justify-center gap-2 w-full md:w-xl px-4 md:px-0">


            <h2 class="text-3xl font-bold capitalize text-white">sobre nós</h2>
            <p class="text-justify text-white indent-6">
                Lorem ipsum dolor sit am
                et consectetur adipisicing elit. Repellat error dignissimos deserunt ullam reprehenderit ea, aliquid quam ad repellendus perspiciatis. Inventore illo ex, vel eos voluptas dignissimos fuga dolores a.
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam, molestiae quos illum corrupti nisi exercitationem esse iure itaque culpa ullam, nemo architecto quaerat obcaecati corporis eius. Facere
            </p>



        </div>
        <!-- end -->
        <div class="flex flex-col items-center justify-center gap-12 w-full">

            <h2 class="text-3xl font-bold capitalize text-white">objectivos</h2>


            <div class="flex flex-wrap items-center justify-center gap-8 w-full px-4 md:px-0">

                <div class="flex flex-col h-60 w-full md:w-60 p-8 text-gray-700 bg-white rounded-2xl gap-2 hover:scale-105 transition-transform">
                    <i class="ri-service-line text-yellow-500 text-4xl"></i>
                    <p>Promover o bem estar do meio ambiente, com as praticas de reciclagem de residuos..</p>

                </div>
                <!-- end -->
                <div class="flex flex-col h-60 w-full md:w-60 p-8 text-gray-700 bg-white rounded-2xl gap-2 hover:scale-105 transition-transform">
                    <i class="ri-map-2-line text-yellow-500 text-4xl"></i>
                    <p>Expandir física e geograficamente para melhor servir o cliente.</p>

                </div>
                <!-- end -->
                <div class="flex flex-col h-60 w-full md:w-60 p-8 text-gray-700 bg-white rounded-2xl gap-2 hover:scale-105 transition-transform">
                    <i class="ri-hand-coin-line text-yellow-500 text-4xl"></i>
                    <p>
                        Aumentar receitas e lucros de forma sustentável.</p>

                </div>



            </div>


        </div>
        <!-- end -->
        <div class="flex flex-col items-center justify-center gap-12 w-full">

            <h2 class="text-3xl font-bold capitalize text-white">Contactos</h2>


            <div class="flex flex-wrap items-center justify-center gap-8 w-full px-4 md:px-0">


                <ul class="flex flex-col gap-4">
                    <li><a href="tel:934 456 984"><i class="ri-phone-line"></i> 934 456 984</a></li>
                    <li><a href="mailto:reaparaangola@gmail.com"><i class="ri-mail-line"></i> reaparaangola@gmail.com</a></li>
                </ul>


            </div>


        </div>
        <!-- end -->

    </section>

</main>

@endsection
