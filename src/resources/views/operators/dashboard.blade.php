<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Nº Matrícula</th>
                <th>Setor Atuação</th>
            </tr>
        </thead>
        <tbody>
            @foreach($operatorList as $operator)
            <tr>
                <td>{{$operator->name}}</td>
                <td>{{$operator->registration}}</td>
                <td>{{$operator->sector}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="/operators/create">Cadastrar Novo</a>
</body>
</html>