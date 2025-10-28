<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{route('alunos.update', $aluno -> id)}}" method="POST">
    @csrf
    @method('PUT')
    <h1>Alterar Aluno</h1>
    <label>Nome:</label>
    <input type="text" name="nome", value="{{$aluno->nome}}">
    <br>
    <label>Curso:</label>
    <input type="text" name="curso", value="{{$aluno->curso}}">
    <br>
    <label>Ano:</label>
    <input type="integer" name="ano", value="{{$aluno->ano}}">
    <br>

    <input type="submit" name="salvar">
    
    <a href="{{route('alunos.index')}}">Voltar</a>
    
</form>
</body>
</html>