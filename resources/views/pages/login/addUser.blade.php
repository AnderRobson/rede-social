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
    <form action="{{route('user.store')}}" method="post">
        {{--Mecanismo de proteção do Laravel--}}
        @csrf

        <label for="">Nome do Usuário:</label>
        <input type="text" name="name">

        <label for="">Sobrenome do Usuário:</label>
        <input type="text" name="apelido">

        <label for="">E-mail:</label>
        <input type="text" name="email">

        <label for="">Senha:</label>
        <input type="password" name="senha">

        <label for="">Data de Nascimento:</label>
        <input type="date" name="dataNascimento">

        <label for="">Graduação:</label>
        <input type="text" name="graduacao">

        <input type="submit" value="Cadastrar">
    </form>

    {{--Partes ocultas da página--}}
    <section class="overlay"></section><!--Efeito de fundo mais escuro-->
    <aside id="modal">
        <section class="row">
            <div class="btn-group-vertical">
                <h3 class="centralizar icone">Menu</h3>
                <a href="{{route('user.feed')}}" class="btnLateral icone"><i class="icon-home icone"> Home</i></a>
                <a href="{{route('user.show', ['usuarios' => $usuarioLogado['id']])}}" class="btnLateral icone"><i class="icon-person icone"> Meu Perfil</i></a>
                <a href="amigos.php" class="btnLateral icone"><i class="icon-organization icone"> Amigos</i></a>
                <a href="{{route('user.usuarios')}}" class="btnLateral icone"><i class="icon-organization icone"> Usuários</i></a>
                <a href="imagens.php" class="btnLateral icone"><i class="icon-file-media icone"> Imagens</i></a>
                <a href="arquivos.php" class="btnLateral icone"><i class="icon-file-directory icone"> Arquivos</i></a>
                <a href="" class="btnLateral icone btConfiguracao"><i class="icon-gear icone"> Configuração</i></a>
                <a href="{{route('user.logout')}}" class="btnLateralSair icone"><i class="icon-sign-out icone"> Sair</i></a>
            </div>
        </section>
    </aside>
    <!-- Menu configuração -->
    <aside id="menu-configuracao">
        <section class="row">
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Imagem Fundo
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#" id="fundo1">Academia</a>
                    <a class="dropdown-item" href="#" id="fundo2">Taekwondo</a>
                    <a class="dropdown-item" href="#" id="fundo3">Folhas</a>
                </div>
            </div>
        </section>
    </aside>
    <script src="{{ asset('js/jquery.js')}}"></script>
    <script src="{{ asset('js/bootstrap.js')}}"></script>
    <script src="{{ asset('js/app.js')}}"></script>
</body>
</html>
