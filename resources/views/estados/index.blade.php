<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Estados</title>
</head>

<body>

    @foreach ($estados as $e)
    {{$e->nome}}
    {{$e->sigla}}
    <a href="/estados/show/{{$e->id}}">Exibir</a>
    <a href="/estados/edit/{{$e->id}}">Editar</a>
    <form method="POST" action='/estados/delete/{{$e->id}}'>
        @csrf
        <input type="hidden" name="_method" value="delete">
        <button type="submit">Apagar</button>
    </form>
    <br>
    @endforeach
    <a href="{{'/estados/create'}}">Novo</a>

</body>

</html>
