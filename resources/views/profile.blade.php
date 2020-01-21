<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/fontes.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.bundle.js"></script>
    <script src="../js/app.js"></script>
    <title>Perfil do Usuário</title>
    <style type="text/css">
        .fTopo{background-color:#000; width: 100%; height: 40px; margin:auto;}
        .topo input[type="text"]{color: #000; display: block; margin: auto; width: 100%; border: none; border-radius: 3px; background: #f7991ec9; height: 25px; padding-left: 10px; box-shadow: inset 0 0 6px #000; margin-top:7px;}
        p, span{color: #000;}
        h2{text-align: center; padding-top: 30px; color: #000;}
        h4{margin-top:auto; text-align: center; color: #000;}
        img#imgfundo{width:330px; height: 120px;display: block; margin: auto;border-radius: 5px 5px 0 0;}
        img#profile{width: 100px; height: 100px; display: block; margin: auto; margin-top: -100px; border: 5px solid #000; background-color: #000; border-radius: 10px; margin-bottom: -30px;}
        div#menu{width: 330px; height: 120px;display: block; margin: auto; border: none; border-radius: 5px; background-color: #f7991ec9; text-align: center;}
        div#menu input{height: 25px; border: none; border-radius: 3px; background-color: #000; cursor: pointer;}
        div#menu input[name="add"]{margin-right: 20px;}
        div#menu input[name="aceitar"]{margin-left: 0px; margin-right: 20px; width: 80px;}
        div#menu input[name="recusar"]{margin-right: 20px;width: 80px;}
        div#menu input[name="remover"]{margin-right: 20px;}
        div#menu input[name="cancelar"]{margin-right: 20px;}
        div#menu input[name="chat"]{margin-right: 20px;width: 80px;}
        div#menu input:hover{height: 25px; border: none; border-radius: 3px; background-color: transparent; cursor: pointer; color: #FFF;}
        div.pub{width: 330px; min-height: 70px; max-height: 1000px; display: block; margin: auto; border: none; border-radius: 5px; background-color: #FFF; box-shadow: 0 0 6px #A1A1A1; margin-top: 30px;}
        div.pub a{color: #666; text-decoration: none;}
        div.pub a:hover{color: #111; text-decoration: none;}
        div.pub p{margin-left: 10px; content: #666; padding-top: 10px;}
        div.pub span{display: block; margin: auto; width: 300px; margin-top: 10px;}
        div.pub img{display: block; margin: auto; width: 100%; margin-top: 10px; border-bottom-left-radius: 5px; border-bottom-right-radius: 5px;}
    </style>
</head>
<body>
<section class="row fTopo">
    <article class="col-1">
        <!--Classe "col" definir o tamanho da caixa-->
        <a href="javascript:history.back()" class="menuHamburguer"><i class="icon-chevron-left" style="color:#fff; margin: center;"></i></a>
        <!--Menu Hamburguer-->
    </article>
    <article class="col-8">
        <form method="GET" action="pesquisar.php" class="topo">
            <input type="text" placeholder="Pesquisa alguém..." name="query" autocomplete="off"><input type="submit" hidden>
        </form>
    </article>
    <article class="col-1">
        <!--Classe "col" definir o tamanho da caixa-->
        <a href="#" class="menuHamburguer" id="menuHamburguer"><i class="icon-three-bars" style="color:#fff;"></i></a>
        <!--Menu Hamburguer-->
    </article>
    <article class="col-1">
        <!--Classe "col" definir o tamanho da caixa-->
        <a href="config/sair.php" class="menuHamburguer"><i class="icon-sign-out" style="color:#fff;"></i></a>
    </article>
</section>
<main class="container">
    <section class="row box">
        <article class="col-12">
            <?php
                if (empty($usuarios["capa"])) {
                    echo '<img src="img/Academia-Oriente.png" id="imgfundo">';
                } else {
                    echo '<img src="upload/'.$usuarios["capa"].'" id="imgfundo">';
                }

                if (empty($usuarios["imagem"])) {
                    echo '<img src="img/user.png" id="profile">';
                } else {
                    echo '<img src="upload/'.$usuarios["imagem"].'" id="profile">';
                }
                $amizade = $amizades ?? '';
            ?>
            <div id="menu">
                @if(! empty($amizade))
                    <form action="{{route('amizades.solicitacao', ['amizades' => $amizades['id']])}}" method="POST">
                        @csrf
                        @method('PUT')
                        <h2><?php echo $usuarios['nome']." ".$usuarios['sobrenome']; ?></h2>
                        <h4><?php echo $usuarios['graduacao'];?></h4>

                        @if($amizades['aceite'] == 2)
                            <input type="submit" value="Remover amigo" name="remover"><input type="submit" name="chat" value="Conversar">
                        @elseif($amizades['aceite'] == 1)
                            <input type="submit" value="Aceitar" name="solicitacao"><input type="submit" name="solicitacao" value="Recusar"><input type="submit" name="solicitacao" value="Conversar">
                        @elseif($amizades['aceite'] == 3)
                            <input type="submit" value="Cancelar pedido" name="cancelar"><input type="submit" name="chat" value="Conversar">
                        @endif
                    </form>
                @else
                    <form action="{{route('amizades.store')}}" method="POST">
                        @csrf
                        <h2><?php echo $usuarios['nome']." ".$usuarios['sobrenome']; ?></h2>
                        <h4><?php echo $usuarios['graduacao'];?></h4>

                        <input type="submit" value="Adicionar amigo" name="Adicionar"><input type="submit" name="chat" value="Conversar">
                    </form>
                @endif
            </div>
        </article>
    </section>
{{--    <section class="row box">--}}
{{--        <?php--}}
{{--        $saberr = mysqli_query($mysqli, "SELECT * FROM users WHERE email='$email'");--}}
{{--        $saber = mysqli_fetch_assoc($saberr);--}}
{{--        $nome = $saber['nome']." ".$saber['apelido'];--}}
{{--        $amigoss = mysqli_query($mysqli, "SELECT * FROM amizades WHERE de='$login_cookie' AND para='$email' AND aceite='sim' OR para='$login_cookie' AND de='$email' AND aceite='sim'");--}}
{{--        $amigos = mysqli_num_rows($amigoss);--}}
{{--        if ($amigos==1) {--}}
{{--            while ($pub=mysqli_fetch_assoc($pubs)) {--}}
{{--                $email = $pub['user'];--}}
{{--                $id = $pub['id'];--}}

{{--                if ($pub['imagem']=="") {--}}
{{--                    echo '<div class="pub" id="'.$id.'">--}}
{{--                            <p><a href="#">'.$nome.'</a> - '.$pub["data"].'</p>--}}
{{--                            <span>'.$pub['texto'].'</span><br />--}}
{{--                        </div>';--}}
{{--                }else{--}}
{{--                    echo '<div class="pub" id="'.$id.'">--}}
{{--                            <p><a href="#">'.$nome.'</a> - '.$pub["data"].'</p>--}}
{{--                            <span>'.$pub['texto'].'</span>--}}
{{--                            <img src="upload/'.$pub["imagem"].'" />--}}
{{--                        </div>';--}}
{{--                }--}}
{{--            }--}}
{{--        }elseif ($amigos==0){--}}
{{--            echo '<div class="pub" id="'.$id.'">--}}
{{--                            <p>Aviso sobre as amizades...</p>--}}
{{--                            <span>Tens de ser amigo/a do/a '.$nome.' para poderes ver as suas publicações...</span><br />--}}
{{--                        </div>';--}}
{{--        }--}}
{{--        ?>--}}
{{--    </section>--}}
</main>
<section class="overlay"></section><!--Efeito de fundo mais escuro-->
<aside id="modal">
    <section class="row">
        <div class="btn-group-vertical">
            <h3 class="centralizar icone">Menu</h3>
            <a href="index-user.php" class="btnLateral icone"><i class="icon-home icone"> Home</i></a>
            <a href="#" class="btnLateral icone"><i class="icon-person icone"> Meu Perfil</i></a>
            <a href="amigos.php" class="btnLateral icone"><i class="icon-organization icone"> Amigos</i></a>
            <a href="{{route('user.index')}}" class="btnLateral icone"><i class="icon-organization icone"> Usuários</i></a>
            <a href="imagens.php" class="btnLateral icone"><i class="icon-file-media icone"> Imagens</i></a>
            <a href="arquivos.php" class="btnLateral icone"><i class="icon-file-directory icone"> Arquivos</i></a>
            <a href="#" class="btnLateral icone btConfiguracao"><i class="icon-gear icone"> Configuração</i></a>
            <a href="index.php" class="btnLateralSair icone"><i class="icon-sign-out icone"> Sair</i></a>
        </div>
    </section>
</aside>
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
</body>
</html>
