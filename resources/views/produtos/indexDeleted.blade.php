<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Produtos</title>
</head>

<body>

    @foreach ($produtos as $pr)
    {{$pr->descricao}}
    {{$pr->produto}}

    <a href="/produtos/show/{{$pr->id}}">Exibir</a>
    <a href="/produtos/edit/{{$pr->id}}">Editar</a>

    <form method="POST" action='/produtos/delete/{{$pr->id}}'>
        @csrf
        <input type="hidden" name="_method" value="delete">
        <button type="submit">Apagar</button>
    </form>
    
    <br>
    @endforeach
    <a href="{{'/produtos/create'}}">Novo</a>

</body>

</html>
