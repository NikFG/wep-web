<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Produto específico</title>
</head>

<body>

    {{$produto->descricao}}
    {{$produto->preco}}
    <a href="/produtos/edit/{{$produto->id}}">Editar</a>

</body>

</html>
