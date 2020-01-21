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
    <title>Detalhe do Usuário</title>
</head>
<body>
    <h1>{{$user->nome}} {{$user->apelido}}</h1>
    <h1>{{$user->email}}</h1>
    <h1>{{date('d/m/Y', strtotime($user->created_at))}}</h1>
    <script src="{{ asset('js/jquery.js')}}"></script>
    <script src="{{ asset('js/bootstrap.js')}}"></script>
    <script src="{{ asset('js/app.js')}}"></script>
</body>
</html>
