<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <a href="{{route('alunos.create')}}">Criar Alunos</a>
    <table style="border: 1px solid black;">
        <thead>
            <th>NOME</th>
            <th>TURMA</th>
            <th>ANO</th>
            <th>AÇOES</th>
        </thead>
        <tbody>
            @foreach ($alunos as $item)
            <tr>
                <td>{{ $item->nome }}</td>
                <td>{{ $item->curso }}</td>
                <td>{{ $item->ano }}</td>
                <td>
                    <a href="{{route('alunos.edit', $item->id)}}">Alterar</a>
                    <form action="{{route('alunos.destroy', $item -> id)}}" method="POST">
                        @csrf
                        @method('delete')
                        <input type="submit", value="remover">
                    </form>
                    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>