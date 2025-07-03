{{-- @extends('layouts.site') --}}
@vite(['resources/css/app.css', 'resources/js/app.js'])
<link rel="stylesheet" href="{{ asset('fonts/remixicon.css') }}">
<link rel="stylesheet" href="/css/login.css">


<script>
    function trocar_form() {
        document.body.classList.toggle('trocar')
    }

    function togglePassword() {
        const input = document.getElementById('password');
        input.type = input.type === 'password' ? 'text' : 'password';
    }
</script>


<body>

    <!-- === login === -->
    <div class="container_principal">
        <div class="login_titulo flex flex-col items-center">

            <a href="/" title="">

                <img src="Recicla.png" alt="logo" class="size-16">
            </a>
            <p>inicie sessão</p>

        </div>



        <form method="POST" action="/usuario/logar">
            @csrf
            <input type="hidden" name="action" value="login">

            <div class="form_elementos">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" placeholder="exemplo@email.com" required>
            </div>

            <div class="form_elementos">
                <label for="password">Senha</label>
                <div style="position: relative;">
                    <input type="password" id="password" name="senha" placeholder="Digite sua senha" required>

                </div>
            </div>

            <button type="submit" class="botao_login">Entrar</button>
        </form>

        <div class="link_cadastro">
            Não tem uma conta? <a href="#" onclick="trocar_form()">Criar conta</a>
        </div>
    </div>



    <!-- === criar conta === -->
    <div class="container_principal2">
        <div class="criar_titulo flex flex-col items-center">
            <img src="Recicla.png" alt="logo" class="size-16">

            <p>Crie sua conta</p>
        </div>

        <form method="POST" action="/usuario/criar">
            @csrf
            <div class="form-elemntos2">
                <label>Nome Completo</label>
                <input type="text" name="nome" placeholder="Digite seu nome completo" required>
            </div>

            <div class="form-elemntos2">
                <label>E-mail</label>
                <input type="email" name="email" placeholder="Digite seu e-mail" required>
            </div>

            <div class="senhas">
                <div class="form-elemntos2">
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" placeholder="Digite sua senha" required>
                </div>

                <div class="form-elemntos2">
                    <label for="confirmar_senha">Confirmar Senha</label>
                    <input type="password" name="confirmar_senha" placeholder="Digite sua senha" required>
                </div>
            </div>

            <div class="form-elemntos2">
                <label for="location">Local</label>
                <select name="localizacao" id="location" required>
                    <option value="">Selecione a sua área</option>
                    <option value="Bengo">Bengo</option>
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

            <button type="submit" class="botao_criar">
                Criar Conta
            </button>
        </form>

        <div class="link_login">
            Já tem uma conta? <a href="#" onclick="trocar_form()">Fazer login</a>
        </div>
    </div>

    <script>
        function trocar_form() {
            document.body.classList.toggle('trocar')
        }
    </script>
</body>

</html>
