<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
<div class="container text-center">
  <div class="row">
    <div class="col">
       <table class="table">
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
   <a href="/operators/create" class="btn btn-primary">Cadastrar Novo</a>
    </div>
  
  </div>
</div>
   
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>