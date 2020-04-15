<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Estados</title>
</head>

<body>

    <form method="POST" action="/estados/create">
        @csrf
        <input type="text" name='nome' maxlength="50">
        <input type="text" name='sigla' maxlength="50">
        <button type="submit">Confirmar</button>
    </form>
</body>

</html>
