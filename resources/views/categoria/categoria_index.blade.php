@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card m-5 p-3">
                    <div class="d-flex justify-content-end">
                        <a class="btn btn-success col-3 m-2" href="{{ url('/categoria/create') }}" role="button">Criar</a>
                    </div>
                    @if (@session('mensagem'))
                        <br>
                        <div class="alert alert-success">
                            {{ session('mensagem') }}
                        </div>
                    @endif

                    <script>
                        function ConfirmDelete() {
                            return confirm('Tem certeza que gostaria de excluir este registro?');
                        }
                    </script>

                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Ações</th>
                        </tr>

                        @foreach ($categorias as $value)
                            <tr>
                                <td>{{ $value->id }}</td>
                                <td>{{ $value->nome }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a class="btn btn-primary m-2" href="{{ url('/categoria/' . $value->id) }}"
                                            role="button">Visualizar</a>

                                        <a class="btn btn-warning m-2"
                                            href="{{ url('/categoria/' . $value->id . '/edit') }}" role="button">Editar</a>

                                        <form method="POST" action="{{ url('/categoria/' . $value->id) }}"
                                            onsubmit="return ConfirmDelete()">
                                            @method('DELETE')
                                            @csrf
                                            <input type="submit" class="btn btn-danger m-2" value="Excluir">
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </table>


                </div>
            </div>
        </div>
    </div>
@endsection
