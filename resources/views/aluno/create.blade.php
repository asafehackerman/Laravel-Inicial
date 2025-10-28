<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{route('alunos.store')}}" method="POST">
    @csrf
    
    <h1>Novo Aluno</h1>
    <label>Nome:</label>
    <input type="text" name="nome">
    <br>
    <label>Curso:</label>
    <input type="text" name="curso">
    <br>
    <label>Ano:</label>
    <input type="integer" name="ano">
    <br>
    <input type="submit" name="salvar">
    
</form>
</body>
</html>