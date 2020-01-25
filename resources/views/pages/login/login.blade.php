<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('sass/bootstrap.scss')}}">
    <link rel="stylesheet" href="{{asset('css/fontes.css')}}">
    <link rel="stylesheet" href="{{asset('css/estilo.css')}}">
    <title>Document</title>
</head>
<body>
    <main class="container">
        <div class="fundo-login">
            <section class="row box">
                <!--Primeira caixa-->
                <article class="col-12">
                    <img src="{{asset("img/Logo-Oriente-Taekwondo.png")}}" alt="Logo Academia Oriente"
                         class="img-responsiva Bloco-Centralizado">
                </article>
            </section>
            <section class="row box">
                <form class="container loginform" action="{{route('user.login')}}" method="post">
                    @csrf
                    <div class="form-label-group">
                        <label for="inputText">E-mail</label>
                        <input type="email" class="form-control login-user" name="email" maxlength="200" required autofocus>
                    </div>
                    <div class="form-label-group">
                        <label for="inputPassword">Senha</label>
                        <input type="password" class="form-control login-user" name="password" maxlength="30"
                               required>
                    </div>
                    <a href="#" class="criar-usuario">Ainda não é inscrito? Cadastre-se</a>
                    <a ><button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="entrar"><i
                                class="icon-sign-out btnAcessar" >Entrar</i></button></a>
                </form>
            </section>
        </div>
    </main>
    <!-- Criar Usuário -->
    <section class="overlay"></section>
    <!--Efeito de fundo mais escuro-->
    <aside id="menu-Cadastro">
        <section class="row">
            <form class="container" method="POST" name="form1" action="config/add.php">
                <h3 class="centralizar icone">Cadastro</h3>
                <div class="form-label-group">
                    <label for="inputText">Nome</label>
                    <input type="text" class="form-control login-user" name="nome" required autofocus maxlength="50">
                </div>
                <div class="form-label-group">
                    <label for="inputText">Sobrenome</label>
                    <input type="text" class="form-control login-user" name="apelido" required autofocus maxlength="50">
                </div>
                <div class="form-label-group">
                    <label for="inputText">Data de Nascimento</label>
                    <input type="text" class="form-control login-user" name="dataNascimento" placeholder="Ano-Mês-Dia" required autofocus maxlength="10">
                </div>
                <div class="form-label-group">
                    <label for="inputText">Graduação</label>
                    <input type="text" class="form-control login-user" name="graduacao" required autofocus maxlength="30">
                </div>
                <div class="form-label-group">
                    <label for="inputText">E-mail</label>
                    <input type="email" class="form-control login-user" name="email" required autofocus maxlength="200">
                </div>
                <div class="form-label-group">
                    <label for="inputPassword">Digite sua Senha</label>
                    <input type="password" class="form-control login-user" name="pass" required maxlength="30">
                </div>
                <a><button id="btnLogar" class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="Submit" ><i
                            class="icon-sign-out btnAcessar">Cadastrar</i></button></a>

            </form>
        </section>
    </aside>
    <script src="{{ asset('js/jquery.js')}}"></script>
    <script src="{{ asset('js/bootstrap.js')}}"></script>
    <script src="{{ asset('js/app.js')}}"></script>
</body>
</html>
