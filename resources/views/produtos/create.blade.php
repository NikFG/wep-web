<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Estados</title>
</head>

<body>

    <form method="POST" action="/produtos/create">
        @csrf
        <input type="text" name='descricao' maxlength="80">
        <input type="float" name='preco'>
        <button type="submit">Cadastrar</button>
    </form>
</body>

</html>
