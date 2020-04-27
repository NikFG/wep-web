<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Produtos de teste</title>
</head>

<body>
    <table border="1">
        <caption>Meus produtos</caption>
        <thead>
            <tr>
                <th>Descrição produto</th>
                <th>Preço</th>
                <th>Mostrar Produto</th>
                <th>Editar Produto</th>
                <th>Botão Apagar</th>
                <th>Botão Duplicar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produtos as $pr)
            <tr>
                <th>{{$pr->descricao}}</th>
                <td>{{$pr->preco}}</td>
                <td><a href="/produtos/show/{{$pr->id}}">Detalhes</a></td>
                <td><a href="/produtos/edit/{{$pr->id}}">Editar</a></td>
                <td>
                    <form method="POST" action='/produtos/delete/{{$pr->id}}'>
                        @csrf
                        <input type="hidden" name="_method" value="delete">
                        <button type="submit">Apagar</button>
                    </form>
                </td>
                <td>
                    <form method="POST" action='/produtos/duplicate/{{$pr->id}}'>
                        @csrf
                        <input type="hidden" name="_method" value="post">
                        <button type="submit">Duplicar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfooter>
            <tr>
                <td colspan="6"><a href="{{'/produtos/create'}}">Novo</a></td>
            </tr>
        </tfooter>
    </table>

</body>

</html>