<html>
    <head>
        <title>Laravel PDF</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    </head>
    <body>
        <div class="container mt-5">
            <a href="{{ route('produto.pdf') }}">
                <button class='btn btn-primary'>Generate PDF</button>
            </a>
            &nbsp;
            <a href="{{ route('produto.export')}}">
                <button class='btn btn-success'>Excel</button>
            </a>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Descrição</th>
                <th scope="col">Situação</th>
                <th scope="col">Quantiade</th>
                <th scope="col">Categoria</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data as $row)
                  <tr>
                      <td>{{$row->id}}</td>
                      <td>{{$row->nome}}</td>
                      <td>{{$row->ativo}}</td>
                      <td>{{$row->quantidade}}</td>
                      <td>{{$row->categoria->nome}}</td>
                  </tr>
              @endforeach
            </tbody>
          </table>
    </body>
</html>
