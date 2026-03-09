@extends("templates.layout")
@section("title")
Painel de Operadores
@endsection
@section("content")
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
@endsection