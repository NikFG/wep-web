<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar produtos</title>
</head>

<body>

    <form method="POST" action="/produtos/edit/{{$produto->id}}">
        @csrf
        <input type="text" name='descricao' maxlength="80" value="{{$produto->descricao}}">
        <input type="float" name='preco'  value="{{$produto->preco}}">
        <button type="submit">Editar</button>
    </form>

</body>

</html>
