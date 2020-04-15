<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Estados</title>
</head>

<body>

    {{$estado->nome}}
    {{$estado->sigla}}
    <a href="/estados/edit/{{$estado->id}}">Editar</a>

</body>

</html>
