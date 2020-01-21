<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
</body>
</html>
