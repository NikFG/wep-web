<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cidades</title>
</head>

<body>

    @foreach ($cidades as $c)
    {{$c->nome}}
    {{$c->codigo_ibge}}
    {{$c->estado->nome}}    
    <a href="/cidades/show/{{$c->id}}">Exibir</a>
    <a href="/cidades/edit/{{$c->id}}">Editar</a>
    <form method="POST" action='/cidades/delete/{{$c->id}}'>
        @csrf
        <input type="hidden" name="_method" value="delete">
        <button type="submit">Apagar</button>
    </form>
    <br>
    @endforeach
    <a href="{{'/cidades/create'}}">Novo</a>

</body>

</html>
